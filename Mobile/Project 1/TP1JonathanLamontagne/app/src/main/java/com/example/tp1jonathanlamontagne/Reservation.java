package com.example.tp1jonathanlamontagne;

import android.os.Parcel;
import android.os.Parcelable;

import java.util.Comparator;

public class Reservation implements Parcelable {

    private int noReservation,nbPlace;
    private String dateReservation,blocReservationDebut,blocReservationFin,nomPersonne,telPersonne;

    public Reservation(int noReservation, int nbPlace, String dateReservation, String blocReservationDebut, String blocReservationFin, String nomPersonne, String telPersonne) {
        this.noReservation = noReservation;
        this.nbPlace = nbPlace;
        this.dateReservation = dateReservation;
        this.blocReservationDebut = blocReservationDebut;
        this.blocReservationFin = blocReservationFin;
        this.nomPersonne = nomPersonne;
        this.telPersonne = telPersonne;
    }

    public int getNoReservation() {
        return noReservation;
    }

    public void setNoReservation(int noReservation) {
        this.noReservation = noReservation;
    }

    public int getNbPlace() {
        return nbPlace;
    }

    public void setNbPlace(int nbPlace) {
        this.nbPlace = nbPlace;
    }

    public String getDateReservation() {
        return dateReservation;
    }

    public void setDateReservation(String dateReservation) {
        this.dateReservation = dateReservation;
    }

    public String getBlocReservationDebut() {
        return blocReservationDebut;
    }

    public void setBlocReservationDebut(String blocReservationDebut) {
        this.blocReservationDebut = blocReservationDebut;
    }

    public String getBlocReservationFin() {
        return blocReservationFin;
    }

    public void setBlocReservationFin(String blocReservationFin) {
        this.blocReservationFin = blocReservationFin;
    }

    public String getNomPersonne() {
        return nomPersonne;
    }

    public void setNomPersonne(String nomPersonne) {
        this.nomPersonne = nomPersonne;
    }

    public String getTelPersonne() {
        return telPersonne;
    }

    public void setTelPersonne(String telPersonne) {
        this.telPersonne = telPersonne;
    }

    protected Reservation(Parcel in) {
        noReservation = in.readInt();
        nbPlace = in.readInt();
        dateReservation = in.readString();
        blocReservationDebut = in.readString();
        blocReservationFin = in.readString();
        nomPersonne = in.readString();
        telPersonne = in.readString();
    }

    @Override
    public int describeContents() {
        return 0;
    }

    @Override
    public void writeToParcel(Parcel parcel, int i) {
        parcel.writeInt(noReservation);
        parcel.writeInt(nbPlace);
        parcel.writeString(dateReservation);
        parcel.writeString(blocReservationDebut);
        parcel.writeString(blocReservationFin);
        parcel.writeString(nomPersonne);
        parcel.writeString(telPersonne);
    }

    public static Creator<Reservation> CREATOR = new Creator<Reservation>() {
        @Override
        public Reservation createFromParcel(Parcel parcel) {
            return new Reservation(parcel);
        }

        @Override
        public Reservation[] newArray(int i) {
            return new Reservation[i];
        }
    };

    public static Comparator<Reservation> ResHeureDebutComparator = new Comparator<Reservation>() {

        public int compare(Reservation r1, Reservation r2) {
            String heureDebutReservation1 = r1.getBlocReservationDebut();
            String heureDebutReservation2 = r2.getBlocReservationDebut();

            //ascending order
            return heureDebutReservation1.compareTo(heureDebutReservation2);

        }};
}

