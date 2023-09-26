package com.example.tp1jonathanlamontagne;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.text.Editable;
import android.text.TextWatcher;
import android.util.Log;
import android.view.KeyEvent;
import android.view.View;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.SeekBar;
import android.widget.TextView;
import android.widget.TimePicker;
import android.widget.Toast;

import java.sql.Time;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.Date;
import java.util.regex.Pattern;

public class ReservationActivity extends AppCompatActivity {

    TimePicker tp_horaire;
    TextView tv_time, tv_placeReserver,tv_restaurant_name,tv_restaurant_nbPlace;
    SeekBar sb_placeReserver;
    DatePicker dp_dateReservation;
    EditText et_nomReservattion, et_telephone;
    Button btn_bookTable;

    int nbPlacesRestantes, noReservation;
    String nomRestaurant;

    Reservation myReservation;

    ArrayList<Reservation> listReservation = new ArrayList<>();

    private static final Pattern PHONE = Pattern.compile("^[1-9]\\d{2}-\\d{3}-\\d{4}$");


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_reservation);

        // Initialisation composant
        tv_restaurant_name = findViewById(R.id.tv_restaurant_name);
        tv_restaurant_nbPlace = findViewById(R.id.tv_restaurant_nbPlace);
        dp_dateReservation = findViewById(R.id.dp_dateReservation);
        et_nomReservattion = findViewById(R.id.et_nomReservattion);
        et_telephone = findViewById(R.id.et_telephone);
        btn_bookTable = findViewById(R.id.btn_bookTable);

        // Contrôle et vue de l'heure d'arrivé et de départ
        tp_horaire = findViewById(R.id.tp_horaire);
        tp_horaire.setIs24HourView(true);
        tv_time = findViewById(R.id.tv_time);

        heureFin(tp_horaire.getCurrentHour(), tp_horaire.getCurrentMinute());

        tp_horaire.setOnTimeChangedListener(new TimePicker.OnTimeChangedListener() {
            @Override
            public void onTimeChanged(TimePicker view, int hourOfDay, int minute) {
                heureFin(hourOfDay,minute);
            }
        });

        // SeekBar pour afficher le nombre de place réserver
        tv_placeReserver = findViewById(R.id.tv_placeReserver);
        sb_placeReserver = findViewById(R.id.sb_placeReserver);

        sb_placeReserver.setProgress(1);

        tv_placeReserver.setText(sb_placeReserver.getProgress() + " place réservée");

        sb_placeReserver.setOnSeekBarChangeListener(new SeekBar.OnSeekBarChangeListener() {
            int nbPlace;
            @Override
            public void onProgressChanged(SeekBar seekBar, int progress, boolean fromUser) {
                nbPlace = progress;
                if(nbPlace <= 1){
                    tv_placeReserver.setText(nbPlace + " place réservée");
                }
                else {
                    tv_placeReserver.setText(nbPlace + " places réservées");
                }
            }

            @Override
            public void onStartTrackingTouch(SeekBar seekBar) {

            }

            @Override
            public void onStopTrackingTouch(SeekBar seekBar) {
                if(nbPlace <= 1){
                    tv_placeReserver.setText(nbPlace + " place réservée");
                }
                else {
                    tv_placeReserver.setText(nbPlace + " places réservées");
                }
            }
        });

        // Récupération de mon intention et mon bundle
        Bundle mySend = getIntent().getExtras();

        //Récupèration des données du restaurant sélectionné
        noReservation = mySend.getInt("noReservation");
        nbPlacesRestantes = mySend.getInt("nbPlacesRestantes");
        nomRestaurant = mySend.getString("nomRestaurant");
        listReservation = mySend.getParcelableArrayList(nomRestaurant);

        tv_restaurant_name.setText(nomRestaurant);

        nbPlaceIs();

        et_telephone.addTextChangedListener(new TextWatcher() {
           int length_before = 0;

           @Override
           public void beforeTextChanged(CharSequence s, int start, int count, int after) {
               length_before = s.length();
           }

           @Override
           public void onTextChanged(CharSequence s, int start, int before, int count) {

           }

           @Override
           public void afterTextChanged(Editable s) {
               if (length_before < s.length()) {
                   if (s.length() == 3 || s.length() == 7)
                       s.append("-");
                   if (s.length() > 3) {
                       if (Character.isDigit(s.charAt(3)))
                           s.insert(3, "-");
                   }
                   if (s.length() > 7) {
                       if (Character.isDigit(s.charAt(7)))
                           s.insert(7, "-");
                   }
               }
           }
       });

        btn_bookTable.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if(!nbPlaceReserverIsValid()){
                    Toast.makeText(ReservationActivity.this,getString(R.string.erreurnbPlace),Toast.LENGTH_LONG).show();
                } else if(allIsValid()){
                    String myDate = dp_dateReservation.getYear() + "-" + String.format("%02d",dp_dateReservation.getMonth()) + "-" + String.format("%02d",dp_dateReservation.getDayOfMonth());
                    String myTime = tp_horaire.getCurrentHour() + ":" + String.format("%02d",tp_horaire.getCurrentMinute());

                    noReservation++;

                    myReservation = new Reservation(noReservation,sb_placeReserver.getProgress(),myDate,myTime,tv_time.getText().toString()
                            ,et_nomReservattion.getText().toString(), et_telephone.getText().toString());

                    nbPlacesRestantes -= myReservation.getNbPlace();

                    listReservation.add(myReservation);

                    nbPlaceIs();

                    clearAll();

                    Log.i("info_reservation","\nNuméro de réservation: " + String.valueOf(myReservation.getNoReservation())
                    + "\nnombre de place réserver: " + String.valueOf(myReservation.getNbPlace())
                    + "\nDate de réservation: " + myReservation.getDateReservation()
                    + "\nHeure réservation débute: " + myReservation.getBlocReservationDebut());

                    Toast.makeText(ReservationActivity.this,getString(R.string.SAVE),Toast.LENGTH_LONG).show();
                }
            }
        });
    }

    private void heureFin(int hourOfDay, int minute){
        int hourEnding = hourOfDay + 1;
        if (hourEnding >= 24){
            hourEnding = 0;
        }
        int minuteEnding = minute + 29;

        if(minuteEnding >= 60){
            hourEnding += 1;
            if(hourEnding >= 24){
                hourEnding = 0;
            }
            minuteEnding -= 60;
        }

        tv_time.setText(hourEnding + ":" + String.format("%02d",minuteEnding));
    }

    private boolean allIsValid(){
        boolean allIsValid = false;

        if(!nameIsValid() || !phoneIsValid() || !dateIsValid()){
            allIsValid = false;
        } else {
            allIsValid = true;
        }

        return allIsValid;
    }

    private  boolean nbPlaceReserverIsValid(){
        boolean myNbplaceReserverIsValid = false;

        if(sb_placeReserver.getProgress() <= nbPlacesRestantes && nbPlacesRestantes != 0 && sb_placeReserver.getProgress() != 0){
            myNbplaceReserverIsValid = true;
        } else {
            myNbplaceReserverIsValid = false;
        }
        return myNbplaceReserverIsValid;
    }

    private boolean nameIsValid(){
        String myNameInput = et_nomReservattion.getText().toString().trim();
        boolean myNameIsValid = false;

        if(myNameInput.isEmpty()){
            myNameIsValid = false;
            et_nomReservattion.setError(getString(R.string.erreurNoName));
        }
        else {
            myNameIsValid = true;
        }
        return myNameIsValid;
    }

    private boolean phoneIsValid(){
        String myPhoneInput = et_telephone.getText().toString().trim();
        boolean myPhoneIsValid = false;

        if(myPhoneInput.isEmpty()){
            myPhoneIsValid = false;
            et_telephone.setError(getString(R.string.erreurNoPhone));
        } else if (!PHONE.matcher(myPhoneInput).matches()) {
            myPhoneIsValid = false;
            et_telephone.setError(getString(R.string.erreurPhoneFormat));
        } else {
            myPhoneIsValid = true;
        }
        return myPhoneIsValid;
    }

    private boolean dateIsValid() {
        boolean myDateIsValid = false;
        Date currentDate = Calendar.getInstance().getTime();

        if(dp_dateReservation.getYear() > (currentDate.getYear() + 1900)) {
            myDateIsValid = true;
        } else if (dp_dateReservation.getYear() == (currentDate.getYear() + 1900)) {
            if (dp_dateReservation.getMonth() > currentDate.getMonth()) {
                myDateIsValid = true;
            } else if( dp_dateReservation.getMonth() == currentDate.getMonth()) {
                if(dp_dateReservation.getDayOfMonth() > currentDate.getDate()) {
                    myDateIsValid = true;
                } else if (dp_dateReservation.getDayOfMonth() == currentDate.getDate()) {
                    if(tp_horaire.getCurrentHour() > currentDate.getHours()) {
                        myDateIsValid = true;
                    } else if (tp_horaire.getCurrentHour() == currentDate.getHours()) {
                        if (tp_horaire.getCurrentMinute() > currentDate.getMinutes()) {
                            myDateIsValid = true;
                        }
                    }
                }
            }
        }

        if (!myDateIsValid){
            Toast.makeText(ReservationActivity.this, getString(R.string.erreurDate) + " " + currentDate.toString(), Toast.LENGTH_LONG).show();
        }

        return myDateIsValid;
    }

    private void clearAll() {
        Calendar calendar = Calendar.getInstance();

        tp_horaire.setCurrentHour(calendar.get(Calendar.HOUR_OF_DAY));
        tp_horaire.setCurrentMinute(calendar.get(Calendar.MINUTE));

        dp_dateReservation.updateDate(calendar.get(Calendar.YEAR), calendar.get(Calendar.MONTH), calendar.get(Calendar.DAY_OF_MONTH));

        sb_placeReserver.setProgress(1);

        et_nomReservattion.getText().clear();
        et_telephone.getText().clear();
    }

    private void nbPlaceIs() {
        if(nbPlacesRestantes <= 4){
            tv_restaurant_nbPlace.setTextColor(getResources().getColor(R.color.red));
        }else {
            tv_restaurant_nbPlace.setTextColor(getResources().getColor(R.color.green));
        }

        if(nbPlacesRestantes > 1){
            tv_restaurant_nbPlace.setText(nbPlacesRestantes + " places restantes");
        }else {
            tv_restaurant_nbPlace.setText(nbPlacesRestantes + " place restante");
        }
    }

    @Override
    public boolean onKeyDown(int keyCode, KeyEvent event) {
        if(keyCode == event.KEYCODE_BACK) {
            onBackPressed();
            return true;
        }

        return super.onKeyDown(keyCode, event);
    }

    @Override
    public void onBackPressed() {
        Intent myReturn = new Intent();
        Bundle bundle = new Bundle();
        bundle.putString("nomRestaurant", nomRestaurant);
        bundle.putInt("nbPlacesRestantes", nbPlacesRestantes);
        bundle.putParcelableArrayList(nomRestaurant,listReservation);
        bundle.putInt("noReservation", noReservation);

        myReturn.putExtras(bundle);

        setResult(RESULT_OK, myReturn);
        finish();

        super.onBackPressed();
    }
}