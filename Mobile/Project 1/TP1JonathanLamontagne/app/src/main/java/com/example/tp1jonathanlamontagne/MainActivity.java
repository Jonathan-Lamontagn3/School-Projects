package com.example.tp1jonathanlamontagne;

import androidx.activity.result.ActivityResult;
import androidx.activity.result.ActivityResultCallback;
import androidx.activity.result.ActivityResultLauncher;
import androidx.activity.result.contract.ActivityResultContracts;
import androidx.appcompat.app.AppCompatActivity;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import java.util.ArrayList;

public class MainActivity extends AppCompatActivity {

    Button btn_reserver,btn_afficher_reservation;
    TextView tv_nbPlaceRestant;
    Spinner spn_restaurant;

    final String RESTAURANT1 = "Chez Joe Blo";
    final String RESTAURANT2 = "Chez Gepetto";
    final String RESTAURANT3 = "Chez Charlo";
    final String RESTAURANT4 = "Chez Small Bob";
    final String RESTAURANT5 = "Chez Unique";

    int noReservation = 0;

    Bundle myListsOfReservation = new Bundle();

    ArrayList<Reservation> listReservation = new ArrayList<>();
    ArrayList<Restaurant> listRestaurant = new ArrayList<>();

    ActivityResultLauncher<Intent> activityResultLauncher = registerForActivityResult(
            new ActivityResultContracts.StartActivityForResult(),
            new ActivityResultCallback<ActivityResult>() {
                @Override
                public void onActivityResult(ActivityResult result) {
                    if(result.getResultCode() == Activity.RESULT_OK) {

                        try{
                            Bundle myReturn = result.getData().getExtras();

                            String nomRestaurant = myReturn.getString("nomRestaurant");
                            noReservation = myReturn.getInt("noReservation");
                            int position = 0;

                            switch(nomRestaurant) {
                                case RESTAURANT1:
                                    position = 0;
                                    listRestaurant.get(position).setNbPlacesRestantes(myReturn.getInt("nbPlacesRestantes"));
                                    break;
                                case RESTAURANT2:
                                    position = 1;
                                    listRestaurant.get(position).setNbPlacesRestantes(myReturn.getInt("nbPlacesRestantes"));
                                    break;
                                case RESTAURANT3:
                                    position = 2;
                                    listRestaurant.get(position).setNbPlacesRestantes(myReturn.getInt("nbPlacesRestantes"));
                                    break;
                                case RESTAURANT4:
                                    position = 3;
                                    listRestaurant.get(position).setNbPlacesRestantes(myReturn.getInt("nbPlacesRestantes"));
                                    break;
                                case RESTAURANT5:
                                    position = 4;
                                    listRestaurant.get(position).setNbPlacesRestantes(myReturn.getInt("nbPlacesRestantes"));
                                    break;
                            }

                            if(listRestaurant.get(position).getNbPlacesRestantes() <= 4){
                                tv_nbPlaceRestant.setTextColor(getResources().getColor(R.color.red));
                            }else {
                                tv_nbPlaceRestant.setTextColor(getResources().getColor(R.color.green));
                            }

                            if(listRestaurant.get(position).getNbPlacesRestantes() > 1){
                                tv_nbPlaceRestant.setText(listRestaurant.get(position).getNbPlacesRestantes() + " places restantes");
                            }else {
                                tv_nbPlaceRestant.setText(listRestaurant.get(position).getNbPlacesRestantes() + " place restante");
                            }

                            if(myListsOfReservation.containsKey(nomRestaurant)) {
                                listReservation = myReturn.getParcelableArrayList(nomRestaurant);
                                myListsOfReservation.putParcelableArrayList(nomRestaurant, listReservation);
                            }

                        } catch (Exception e){
                            Toast.makeText(MainActivity.this,getString(R.string.erreurDataTransfert), Toast.LENGTH_LONG).show();
                        }

                    }
                }
            }
    );

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        btn_reserver = findViewById(R.id.btn_reserver);
        btn_afficher_reservation = findViewById(R.id.btn_afficher_reservation);
        tv_nbPlaceRestant = findViewById(R.id.tv_nbPlaceRestant);
        spn_restaurant = findViewById(R.id.spn_restaurant);

        listRestaurant.add(new Restaurant(1,30,30,RESTAURANT1));
        listRestaurant.add(new Restaurant(2,16,16,RESTAURANT2));
        listRestaurant.add(new Restaurant(3,12,12,RESTAURANT3));
        listRestaurant.add(new Restaurant(4,4,4,RESTAURANT4));
        listRestaurant.add(new Restaurant(5,1,1,RESTAURANT5));

        myListsOfReservation.putParcelableArrayList("Chez Joe Blo", listReservation);
        myListsOfReservation.putParcelableArrayList("Chez Gepetto", listReservation);
        myListsOfReservation.putParcelableArrayList("Chez Charlo", listReservation);
        myListsOfReservation.putParcelableArrayList("Chez Small Bob", listReservation);
        myListsOfReservation.putParcelableArrayList("Chez Unique", listReservation);

        ArrayAdapter<Restaurant> adapteur = new ArrayAdapter<Restaurant>(this, android.R.layout.simple_spinner_item,listRestaurant);
        adapteur.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spn_restaurant.setAdapter(adapteur);

        btn_reserver.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent reserve_intent = new Intent(MainActivity.this, ReservationActivity.class);
                Restaurant myResto = getSelectedRestaurant(spn_restaurant);

                Bundle mySend = new Bundle();

                mySend.putInt("nbPlacesRestantes", myResto.getNbPlacesRestantes());
                mySend.putInt("noReservation", noReservation);
                mySend.putString("nomRestaurant", myResto.getNomRestaurant());
                mySend.putParcelableArrayList(myResto.getNomRestaurant(),myListsOfReservation.getParcelableArrayList(myResto.getNomRestaurant()));

                reserve_intent.putExtras(mySend);

                activityResultLauncher.launch(reserve_intent);
            }
        });

        btn_afficher_reservation.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent afficher_intent = new Intent(MainActivity.this,AfficherReservationActivity.class);
                String nomRestaurantSelect = getSelectedRestaurant(spn_restaurant).getNomRestaurant();

                Bundle mySend = new Bundle();
                mySend.putString("nomRestaurant",nomRestaurantSelect);
                mySend.putParcelableArrayList("myList", myListsOfReservation.getParcelableArrayList(nomRestaurantSelect));

                afficher_intent.putExtras(mySend);

                startActivity(afficher_intent);

            }
        });

        spn_restaurant.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
                Restaurant myResto = (Restaurant) parent.getSelectedItem();

                if(myResto.getNbPlacesRestantes() <= 4){
                    tv_nbPlaceRestant.setTextColor(getResources().getColor(R.color.red));
                }else {
                    tv_nbPlaceRestant.setTextColor(getResources().getColor(R.color.green));
                }

                if(myResto.getNbPlacesRestantes() > 1){
                    tv_nbPlaceRestant.setText(myResto.getNbPlacesRestantes() + " places restantes");
                }else {
                    tv_nbPlaceRestant.setText(myResto.getNbPlacesRestantes() + " place restante");
                }

            }

            @Override
            public void onNothingSelected(AdapterView<?> parent) {

            }
        });
    }

    public Restaurant getSelectedRestaurant (View v) {
        Restaurant restaurant = (Restaurant) spn_restaurant.getSelectedItem();
        return restaurant;
    }
}