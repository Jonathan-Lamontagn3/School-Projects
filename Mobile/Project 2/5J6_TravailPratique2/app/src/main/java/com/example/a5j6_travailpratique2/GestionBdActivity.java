package com.example.a5j6_travailpratique2;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;

public class GestionBdActivity extends AppCompatActivity {

    EditText et_codeLivre, et_titreLivre, et_auteurLivre, et_genreLivre, et_summary;
    Button btn_sauvegarder, btn_afficherBD;

    FirebaseDatabase bd;
    DatabaseReference databaseReference;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_gestion_bd);

        et_codeLivre = findViewById(R.id.et_codeLivre);
        et_titreLivre = findViewById(R.id.et_titreLivre);
        et_auteurLivre = findViewById(R.id.et_auteurLivre);
        et_genreLivre = findViewById(R.id.et_genreLivre);
        et_summary = findViewById(R.id.et_summary);

        btn_sauvegarder = findViewById(R.id.btn_sauvegarder);
        btn_afficherBD = findViewById(R.id.btn_afficherBD);

        btn_sauvegarder.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (allIsValid()) {
                    Livre myBook = new Livre(et_codeLivre.getText().toString(), et_titreLivre.getText().toString(),
                            et_auteurLivre.getText().toString(), et_genreLivre.getText().toString(), et_summary.getText().toString());

                    bd = FirebaseDatabase.getInstance();
                    databaseReference = bd.getReference("Livres");

                    databaseReference.child(et_codeLivre.getText().toString()).setValue(myBook)
                            .addOnCompleteListener(new OnCompleteListener<Void>() {
                        @Override
                        public void onComplete(@NonNull Task<Void> task) {
                            if (task.isSuccessful()){
                                et_codeLivre.getText().clear();
                                et_titreLivre.getText().clear();
                                et_auteurLivre.getText().clear();
                                et_genreLivre.getText().clear();
                                et_summary.getText().clear();

                                Toast.makeText(GestionBdActivity.this, getString(R.string.msg_save_successfully), Toast.LENGTH_LONG).show();

                            } else {
                                Toast.makeText(GestionBdActivity.this, getString(R.string.error_bdSave), Toast.LENGTH_LONG).show();
                            }

                        }
                    });

                } else {
                    Toast.makeText(GestionBdActivity.this, getString(R.string.error_invalid_data), Toast.LENGTH_LONG).show();
                }
            }
        });

        btn_afficherBD.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(GestionBdActivity.this, ReadBdActivity.class);
                startActivity(intent);
            }
        });

    }

    private boolean allIsValid() {
        return (codeIsValid() && titleIsValid() && authorIsValid() && genreIsValid() && summaryIsValid());
    }

    private boolean codeIsValid() {
        boolean myCodeIsValid = false;
        String myCodeInput = et_codeLivre.getText().toString().trim();

        if (!myCodeInput.isEmpty()) {
            myCodeIsValid = true;
        }

        return  myCodeIsValid;
    }

    private boolean titleIsValid() {
        boolean myTitleIsValid = false;
        String myTitleInput = et_titreLivre.getText().toString().trim();

        if (!myTitleInput.isEmpty()) {
            myTitleIsValid = true;
        }

        return  myTitleIsValid;
    }

    private boolean authorIsValid() {
        boolean myAuthorIsValid = false;
        String myAuthorInput = et_auteurLivre.getText().toString().trim();

        if (!myAuthorInput.isEmpty()) {
            myAuthorIsValid = true;
        }

        return  myAuthorIsValid;
    }

    private boolean genreIsValid() {
        boolean myGenreIsValid = false;
        String myGenreInput = et_genreLivre.getText().toString().trim();

        if (!myGenreInput.isEmpty()) {
            myGenreIsValid = true;
        }

        return  myGenreIsValid;
    }

    private boolean summaryIsValid() {
        boolean mySummaryIsValid = false;
        String mySummaryInput = et_summary.getText().toString().trim();

        if (!mySummaryInput.isEmpty()) {
            mySummaryIsValid = true;
        }

        return  mySummaryIsValid;
    }

    public boolean mockValidAll(String code, String titre, String autheur, String genre, String summary) {
        et_codeLivre.setText(code);
        et_titreLivre.setText(titre);
        et_auteurLivre.setText(autheur);
        et_genreLivre.setText(genre);
        et_summary.setText(summary);

        return allIsValid();
    }
}