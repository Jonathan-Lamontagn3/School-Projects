package com.example.a5j6_travailpratique2;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.util.Patterns;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.android.material.textfield.TextInputEditText;
import com.google.android.material.textfield.TextInputLayout;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;

public class MainActivity extends AppCompatActivity {

    TextView tv_connexion;
    TextInputLayout til_email, til_password;
    TextInputEditText tiet_email, tiet_password;
    Button btn_login, btn_create_user;

    FirebaseAuth firebaseAuth;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        firebaseAuth = FirebaseAuth.getInstance();

        tv_connexion = findViewById(R.id.tv_connexion);
        til_email = findViewById(R.id.til_email);
        til_password = findViewById(R.id.til_password);
        tiet_email = findViewById(R.id.tiet_email);
        tiet_password = findViewById(R.id.tiet_password);
        btn_login = findViewById(R.id.btn_login);
        btn_create_user = findViewById(R.id.btn_create_user);

        btn_login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String email = tiet_email.getText().toString();
                String password = tiet_password.getText().toString();

                if (Patterns.EMAIL_ADDRESS.matcher(email).matches() && password.length() >= 10) {
                    firebaseAuth.signInWithEmailAndPassword(email, password)
                            .addOnCompleteListener(new OnCompleteListener<AuthResult>() {
                                @Override
                                public void onComplete(@NonNull Task<AuthResult> task) {
                                    if (task.isSuccessful()) {
                                        FirebaseUser usager = firebaseAuth.getCurrentUser();
                                        Intent intent = new Intent(MainActivity.this, LoginActivity.class);
                                        startActivity(intent);
                                        finish();
                                    } else {
                                        Toast.makeText(MainActivity.this, getString(R.string.error_connexion),
                                                Toast.LENGTH_LONG).show();
                                    }
                                }
                            });

                } else if (!Patterns.EMAIL_ADDRESS.matcher(email).matches()) {
                    tiet_email.setError(getString(R.string.error_email));
                    tiet_email.requestFocus();
                } else {
                    tiet_password.setError(getString(R.string.error_password));
                    tiet_password.requestFocus();
                }
            }

        });

        btn_create_user.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(MainActivity.this, SignInActivity.class);

                startActivity(intent);
                finish();
            }
        });
    }
}