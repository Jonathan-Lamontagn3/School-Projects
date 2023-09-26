package com.example.a5j6_travailpratique2;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.Toast;

import com.bumptech.glide.Glide;
import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.android.material.textfield.TextInputEditText;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;
import com.google.firebase.auth.UserProfileChangeRequest;

public class ProfileActivity extends AppCompatActivity {

    TextInputEditText tiet_email, tiet_name;
    ImageView iv_profile;
    Button btn_modifier_profile, btn_return;

    FirebaseAuth firebaseAuth;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_profile);

        firebaseAuth = FirebaseAuth.getInstance();

        tiet_email = findViewById(R.id.tiet_email);
        tiet_name = findViewById(R.id.tiet_name);
        iv_profile = findViewById(R.id.iv_profile);
        btn_modifier_profile = findViewById(R.id.btn_modifier_profile);
        btn_return = findViewById(R.id.btn_return);

        setProfile();

        btn_return.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(ProfileActivity.this, LoginActivity.class);
                startActivity(intent);
                finish();
            }
        });

        btn_modifier_profile.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                FirebaseUser user = firebaseAuth.getCurrentUser();

                if (user != null) {

                    if (valid_name() && valid_email()) {
                        UserProfileChangeRequest profile = new UserProfileChangeRequest.Builder()
                                .setDisplayName(tiet_name.getText().toString())
                                .build();

                        user.updateProfile(profile)
                                .addOnCompleteListener(new OnCompleteListener<Void>() {
                                    @Override
                                    public void onComplete(@NonNull Task<Void> task) {
                                        if (task.isSuccessful()) {
                                            Toast.makeText(ProfileActivity.this, getString(R.string.profile_change_successfully), Toast.LENGTH_LONG).show();
                                        }
                                    }
                                });
                        user.updateEmail(tiet_email.getText().toString());
                    } else {
                        Toast.makeText(ProfileActivity.this, getString(R.string.error_invalid_data), Toast.LENGTH_LONG).show();
                    }
                }
            }
        });
    }

    private void setProfile(){
        FirebaseUser user = firebaseAuth.getCurrentUser();
        String photo = null;
        String name = null;
        String email = user.getEmail().toString();

        if (user.getPhotoUrl() != null) {
            photo = user.getPhotoUrl().toString();
        }
        if (user.getDisplayName() != null) {
           name = user.getDisplayName().toString();
        }

        try {
            if (photo != null) {
                Glide.with(this).load(photo).into(iv_profile);
            }
        }
        catch (Exception e) {
            e.printStackTrace();
        }

        if (email != null) {
            tiet_email.setText(email);
        }

        if (name != null) {
            tiet_name.setText(name);
        }

    }

    private boolean valid_name() {
        boolean myNameValid = false;
        String myNameInput = tiet_name.getText().toString().trim();

        if (!myNameInput.isEmpty()) {
            myNameValid = true;
        }

        return  myNameValid;
    }

    private boolean valid_email() {
        boolean myEmailValid = false;
        String myEmailInput = tiet_email.getText().toString().trim();

        if (!myEmailInput.isEmpty()) {
            myEmailValid = true;
        }

        return  myEmailValid;
    }
}