package com.example.tp1jonathanlamontagne;

import androidx.annotation.RequiresApi;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Build;
import android.os.Bundle;
import android.view.KeyEvent;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.Collections;
import java.util.LinkedHashSet;
import java.util.List;


@RequiresApi(api = Build.VERSION_CODES.O)
public class AfficherReservationActivity extends AppCompatActivity {

    private ReservationAdapter adapter;

    TextView tv_restaurant_name;
    Spinner sp_selectDate;
    ListView lv_reservation;

    String nomRestaurant;

    ArrayList<Reservation> listReservation = new ArrayList<>();
    ArrayList<Reservation> listReservationForSelectDate = new ArrayList<>();
    ArrayList<String> listDate = new ArrayList<>();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_afficher_reservation);

        tv_restaurant_name = findViewById(R.id.tv_restaurant_name);
        sp_selectDate = findViewById(R.id.sp_selectDate);
        lv_reservation = findViewById(R.id.lv_reservation);

        Bundle mySend = getIntent().getExtras();
        nomRestaurant = mySend.getString("nomRestaurant");
        listReservation = mySend.getParcelableArrayList("myList");

        if(listReservation.size() > 0) {
            for (int i = 0; i < listReservation.size();i++) {
                listDate.add(listReservation.get(i).getDateReservation());
            }

            List<String> dateUnique = new ArrayList<>(new LinkedHashSet<>(listDate));

            Collections.sort(dateUnique);

            sp_selectDate.setAdapter(new ArrayAdapter<String>(AfficherReservationActivity.this, android.R.layout.simple_spinner_dropdown_item, dateUnique));

        }

        sp_selectDate.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
                if (position >= 0 && position < listReservation.size()) {
                    getListReservationForSelectDate();
                }
            }

            @Override
            public void onNothingSelected(AdapterView<?> parent) {

            }
        });

        tv_restaurant_name.setText(nomRestaurant);

        lv_reservation.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                Toast.makeText(AfficherReservationActivity.this,"Numéro de réservation: " + String.valueOf(listReservationForSelectDate.get(position).getNoReservation())
                + "\nNuméro de téléphone: " + listReservationForSelectDate.get(position).getTelPersonne(),Toast.LENGTH_LONG).show();
            }
        });

    }

    private void getListReservationForSelectDate() {
        listReservationForSelectDate.clear();

        for ( Reservation reservation : listReservation) {
            if(sp_selectDate.getSelectedItem().toString().equals(reservation.getDateReservation())) {
                listReservationForSelectDate.add(reservation);
            }
        }

        Collections.sort(listReservationForSelectDate,Reservation.ResHeureDebutComparator);
        adapter = new ReservationAdapter(AfficherReservationActivity.this,listReservationForSelectDate);

        lv_reservation.setAdapter(adapter);

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
        bundle.putParcelableArrayList(nomRestaurant,listReservation);

        myReturn.putExtras(bundle);

        setResult(RESULT_OK, myReturn);
        finish();

        super.onBackPressed();
    }
}