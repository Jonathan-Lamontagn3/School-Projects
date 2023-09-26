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

public class SignInActivity extends AppCompatActivity {

    TextView tv_inscription;
    TextInputLayout til_email, til_password, til_confirmPassword;
    TextInputEditText tiet_email, tiet_password, tiet_confirmPassword;
    Button btn_log, btn_signIn;

    FirebaseAuth firebaseAuth;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_sign_in);

        firebaseAuth = FirebaseAuth.getInstance();

        tv_inscription = findViewById(R.id.tv_inscription);
        til_email = findViewById(R.id.til_email);
        til_password = findViewById(R.id.til_password);
        til_confirmPassword = findViewById(R.id.til_confirmPassword);
        tiet_email = findViewById(R.id.tiet_email);
        tiet_password = findViewById(R.id.tiet_password);
        tiet_confirmPassword = findViewById(R.id.tiet_confirmPassword);
        btn_log = findViewById(R.id.btn_log);
        btn_signIn = findViewById(R.id.btn_signIn);

        btn_log.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(SignInActivity.this, MainActivity.class);

                startActivity(intent);
                finish();

            }
        });

        btn_signIn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String email = tiet_email.getText().toString();
                String password = tiet_password.getText().toString();
                String confirmationMDP = tiet_confirmPassword.getText().toString();

                if (Patterns.EMAIL_ADDRESS.matcher(email).matches()){
                    if (password.matches(confirmationMDP) && password.length() >= 6){
                        firebaseAuth.createUserWithEmailAndPassword(email, password)
                                .addOnCompleteListener(new OnCompleteListener<AuthResult>() {
                                    @Override
                                    public void onComplete(@NonNull Task<AuthResult> task) {
                                        if (task.isSuccessful()){
                                            Toast.makeText(SignInActivity.this, getString(R.string.user_cree), Toast.LENGTH_LONG).show();
                                            FirebaseUser user = firebaseAuth.getCurrentUser();

                                            if (user != null){
                                                Intent intent = new Intent(SignInActivity.this, LoginActivity.class);
                                                startActivity(intent);
                                                finish();
                                            }
                                        } else {
                                            Toast.makeText(SignInActivity.this, getString(R.string.error_authentification),
                                                    Toast.LENGTH_LONG).show();
                                        }
                                    }
                                });

                    } else if (password.length() < 6){
                        tiet_password.setError(getString(R.string.error_password));
                        tiet_password.requestFocus();
                    } else {
                        tiet_password.setError(getString(R.string.error_confirmPassword));
                        tiet_password.requestFocus();
                    }

                } else {
                    tiet_email.setError(getString(R.string.error_email));
                }
            }
        });
    }
}