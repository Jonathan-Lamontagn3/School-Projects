package com.example.a5j6_travailpratique2;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;

import com.bumptech.glide.Glide;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;

public class LoginActivity extends AppCompatActivity {

    TextView tv_user;
    ImageView iv_profile;
    Button btn_logout, btn_modifier_profile, btn_gestionBD;

    FirebaseAuth firebaseAuth;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        firebaseAuth = FirebaseAuth.getInstance();

        tv_user = findViewById(R.id.tv_user);
        iv_profile = findViewById(R.id.iv_profile);
        btn_logout = findViewById(R.id.btn_logout);
        btn_modifier_profile = findViewById(R.id.btn_modifier_profile);
        btn_gestionBD = findViewById(R.id.btn_gestionBD);

        setProfile();

        btn_logout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                firebaseAuth.signOut();
                Intent intent = new Intent(LoginActivity.this, MainActivity.class);
                startActivity(intent);
                finish();
            }
        });

        btn_modifier_profile.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(LoginActivity.this, ProfileActivity.class);
                startActivity(intent);
                finish();
            }
        });

        btn_gestionBD.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(LoginActivity.this, GestionBdActivity.class);
                startActivity(intent);
                finish();
            }
        });
    }

    private void setProfile(){
        FirebaseUser user = firebaseAuth.getCurrentUser();
        //String photo = user.getPhotoUrl().toString();
        String name = null;
        if (user.getDisplayName() != null) {
            name = user.getDisplayName().toString();
        }

        String email = user.getEmail().toString();

        if (name != null) {
            tv_user.setText(name);
        } else {
            tv_user.setText(email);
        }

    }

    public String getUserToken() {
        SharedPreferences prefs = getSharedPreferences("UserToken", MODE_PRIVATE);
        return "SuperTokenIdentityUser";
    }
}