package com.example.a5j6_travailpratique2;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;

import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.view.KeyEvent;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;

import java.util.HashMap;

public class WriteBdActivity extends AppCompatActivity {

    private EditText et_book_title, et_book_author, et_book_genre, et_book_summary;
    private TextView tv_book_code;
    private Button btn_update, btn_delete;

    String code, titre, autheur, genre, summary;

    DatabaseReference databaseReference;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_write_bd);

        tv_book_code = findViewById(R.id.tv_book_code);
        et_book_title = findViewById(R.id.et_book_title);
        et_book_author = findViewById(R.id.et_book_author);
        et_book_genre = findViewById(R.id.et_book_genre);
        et_book_summary = findViewById(R.id.et_book_summary);
        btn_update = findViewById(R.id.btn_update);
        btn_delete = findViewById(R.id.btn_delete);

        Bundle bundle = getIntent().getExtras();

        code = bundle.getString("code");
        titre = bundle.getString("titre");
        autheur = bundle.getString("autheur");
        genre = bundle.getString("genre");
        summary = bundle.getString("summary");

        initBookInfo();

        btn_update.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (allIsValid()) {
                    updateData(et_book_title.getText().toString(), et_book_author.getText().toString(), et_book_genre.getText().toString(),
                            et_book_summary.getText().toString());
                } else {
                    Toast.makeText(WriteBdActivity.this, getString(R.string.error_invalid_data), Toast.LENGTH_LONG).show();
                }
            }
        });

        btn_delete.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                AlertDialog.Builder alertDialog = new AlertDialog.Builder(WriteBdActivity.this);
                alertDialog.setMessage(getString(R.string.confirm_delete));

                alertDialog.setPositiveButton(getString(R.string.option_yes), new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialogInterface, int i) {
                        deleteData();
                    }
                });

                alertDialog.setNegativeButton(getString(R.string.option_no), new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialogInterface, int i) {
                        Toast.makeText(WriteBdActivity.this, getString(R.string.option_no_selected), Toast.LENGTH_LONG).show();
                    }
                });

                AlertDialog alert = alertDialog.create();
                alert.show();
            }
        });

    }

    private void initBookInfo() {
        tv_book_code.setText(code);
        et_book_title.setText(titre);
        et_book_author.setText(autheur);
        et_book_genre.setText(genre);
        et_book_summary.setText(summary);
    }

    private boolean allIsValid() {
        return (titleIsValid() && authorIsValid() && genreIsValid() && summaryIsValid());
    }

    private boolean titleIsValid() {
        boolean myTitleIsValid = false;
        String myTitleInput = et_book_title.getText().toString().trim();

        if (!myTitleInput.isEmpty()) {
            myTitleIsValid = true;
        }

        return  myTitleIsValid;
    }

    private boolean authorIsValid() {
        boolean myAuthorIsValid = false;
        String myAuthorInput = et_book_author.getText().toString().trim();

        if (!myAuthorInput.isEmpty()) {
            myAuthorIsValid = true;
        }

        return  myAuthorIsValid;
    }

    private boolean genreIsValid() {
        boolean myGenreIsValid = false;
        String myGenreInput = et_book_genre.getText().toString().trim();

        if (!myGenreInput.isEmpty()) {
            myGenreIsValid = true;
        }

        return  myGenreIsValid;
    }

    private boolean summaryIsValid() {
        boolean mySummaryIsValid = false;
        String mySummaryInput = et_book_summary.getText().toString().trim();

        if (!mySummaryInput.isEmpty()) {
            mySummaryIsValid = true;
        }

        return  mySummaryIsValid;
    }

    private void updateData(String titre_mod, String autheur_mod, String genre_mod, String summary_mod) {
        HashMap livre = new HashMap();
        livre.put("titre", titre_mod);
        livre.put("autheur", autheur_mod);
        livre.put("genre", genre_mod);
        livre.put("summary", summary_mod);

        databaseReference = FirebaseDatabase.getInstance().getReference("Livres");
        databaseReference.child(code).updateChildren(livre)
                .addOnCompleteListener(new OnCompleteListener() {
                    @Override
                    public void onComplete(@NonNull Task task) {
                        if (task.isSuccessful()){
                            Toast.makeText(WriteBdActivity.this, getString(R.string.msg_update_successfully), Toast.LENGTH_SHORT).show();
                        } else {
                            Toast.makeText(WriteBdActivity.this, getString(R.string.error_update), Toast.LENGTH_SHORT).show();
                        }
                    }
                });

    }

    private void deleteData(){
        databaseReference = FirebaseDatabase.getInstance().getReference("Livres");
        databaseReference.child(code).removeValue()
                .addOnCompleteListener(new OnCompleteListener<Void>() {
                    @Override
                    public void onComplete(@NonNull Task<Void> task) {
                        if (task.isSuccessful()){
                            Toast.makeText(WriteBdActivity.this, getString(R.string.msg_delete_successfully), Toast.LENGTH_SHORT).show();
                            tv_book_code.setText("");
                            et_book_title.getText().clear();
                            et_book_author.getText().clear();
                            et_book_genre.getText().clear();
                            et_book_summary.getText().clear();
                        }else {
                            Toast.makeText(WriteBdActivity.this, getString(R.string.error_delete), Toast.LENGTH_SHORT).show();
                        }
                    }
                });
    }

    @Override
    public boolean onKeyDown(int keyCode, KeyEvent event) {
        if(keyCode == event.KEYCODE_BACK){
            onBackPressed();
            return true;
        }
        return super.onKeyDown(keyCode, event);
    }



    @Override
    public void onBackPressed() {
        Intent intent = new Intent(WriteBdActivity.this, ReadBdActivity.class);
        startActivity(intent);
        finish();
        super.onBackPressed();
    }

}