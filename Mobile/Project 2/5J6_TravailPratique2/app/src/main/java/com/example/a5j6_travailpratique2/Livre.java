package com.example.a5j6_travailpratique2;

public class Livre {

    private String code;
    private String titre;
    private String autheur;
    private String genre;
    private String summary;

    public Livre() {
    }

    public Livre(String code, String titre, String autheur, String genre, String summary) {
        this.code = code;
        this.titre = titre;
        this.autheur = autheur;
        this.genre = genre;
        this.summary = summary;
    }

    public String getCode() {
        return code;
    }

    public String getTitre() {
        return titre;
    }

    public String getAutheur() {
        return autheur;
    }

    public String getGenre() {
        return genre;
    }

    public String getSummary() {
        return summary;
    }

    public void setCode(String code) {
        this.code = code;
    }

    public void setTitre(String titre) {
        this.titre = titre;
    }

    public void setAutheur(String autheur) {
        this.autheur = autheur;
    }

    public void setGenre(String genre) {
        this.genre = genre;
    }

    public void setSummary(String summary) {
        this.summary = summary;
    }

    @Override
    public String toString() {
        return code;
    }

}
