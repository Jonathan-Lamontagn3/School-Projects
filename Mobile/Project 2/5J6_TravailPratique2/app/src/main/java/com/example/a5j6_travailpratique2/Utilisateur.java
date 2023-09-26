package com.example.a5j6_travailpratique2;

public class Utilisateur {

    private String userName, userPassword;

    public Utilisateur() {
    }

    public Utilisateur(String userName, String userPassword) {
        this.userName = userName;
        this.userPassword = userPassword;
    }

    public String getUserName() {
        return userName;
    }

    public String getUserPassword() {
        return userPassword;
    }

    public void setUserName(String userName) {
        this.userName = userName;
    }

    public void setUserPassword(String userPassword) {
        this.userPassword = userPassword;
    }
}
