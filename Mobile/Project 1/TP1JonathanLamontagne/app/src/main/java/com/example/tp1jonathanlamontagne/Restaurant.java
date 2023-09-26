package com.example.tp1jonathanlamontagne;

public class Restaurant {

    private int noRestaurant,nbPlacesMax,nbPlacesRestantes;
    private String nomRestaurant;

    public Restaurant(int noRestaurant, int nbPlacesMax, int nbPlacesRestantes, String nomRestaurant) {
        this.noRestaurant = noRestaurant;
        this.nbPlacesMax = nbPlacesMax;
        this.nbPlacesRestantes = nbPlacesRestantes;
        this.nomRestaurant = nomRestaurant;
    }

    public int getNoRestaurant() {
        return noRestaurant;
    }

    public void setNoRestaurant(int noRestaurant) {
        this.noRestaurant = noRestaurant;
    }

    public int getNbPlacesMax() {
        return nbPlacesMax;
    }

    public void setNbPlacesMax(int nbPlacesMax) {
        this.nbPlacesMax = nbPlacesMax;
    }

    public int getNbPlacesRestantes() {
        return nbPlacesRestantes;
    }

    public void setNbPlacesRestantes(int nbPlacesRestantes) {
        this.nbPlacesRestantes = nbPlacesRestantes;
    }

    public String getNomRestaurant() {
        return nomRestaurant;
    }

    public void setNomRestaurant(String nomRestaurant) {
        this.nomRestaurant = nomRestaurant;
    }

    @Override
    public String toString() {
        return nomRestaurant;
    }
}
