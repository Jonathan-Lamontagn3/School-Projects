package com.example.tp1jonathanlamontagne;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.TextView;

import java.util.ArrayList;
import java.util.List;

public class ReservationAdapter extends BaseAdapter {

    private Context myContext;
    private List<Reservation> listReservation = new ArrayList<>();
    private TextView tv_nomReservation,tv_nbPlaceReserver,tv_heureDebut,tv_heureFin;

    public ReservationAdapter(Context myContext, List<Reservation> listReservation) {
        this.myContext = myContext;
        this.listReservation = listReservation;
    }

    @Override
    public int getCount() {
        return listReservation.size();
    }

    @Override
    public Object getItem(int position) {
        return position;
    }

    @Override
    public long getItemId(int position) {
        return position;
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {

        String place;
       View ligneView = convertView;
       if(ligneView == null) {
           ligneView = LayoutInflater.from(myContext).inflate(R.layout.reservation_list_view_row, parent,false);
       }

       tv_nomReservation = ligneView.findViewById(R.id.tv_nomReservation);
       tv_nbPlaceReserver = ligneView.findViewById(R.id.tv_nbPlaceReserver);
       tv_heureDebut = ligneView.findViewById(R.id.tv_heureDebut);
       tv_heureFin = ligneView.findViewById(R.id.tv_heureFin);

       tv_nomReservation.setText(listReservation.get(position).getNomPersonne());
       if (listReservation.get(position).getNbPlace() > 1) {
           place = "places";
       } else {
           place = "place";
       }
       tv_nbPlaceReserver.setText(listReservation.get(position).getNbPlace() + " " + place);
       tv_heureDebut.setText(listReservation.get(position).getBlocReservationDebut() + " - ");
       tv_heureFin.setText(listReservation.get(position).getBlocReservationFin());

        return ligneView;
    }
}
