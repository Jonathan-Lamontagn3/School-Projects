package com.example.a5j6_travailpratique2;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;
import androidx.fragment.app.FragmentTransaction;

import android.content.Intent;
import android.os.Bundle;
import android.view.KeyEvent;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ListView;

import com.google.firebase.database.ChildEventListener;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;

import java.util.ArrayList;

public class ReadBdActivity extends AppCompatActivity {

    String code, titre, autheur, genre, summary;
    private ListView lv_books;
    private ArrayList<Livre> list_books = new ArrayList<>();;
    private Button btn_update;

    DatabaseReference databaseReference;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_read_bd);

        lv_books = findViewById(R.id.lv_books);
        btn_update = findViewById(R.id.btn_update);

        btn_update.setEnabled(false);

        initList();

        lv_books.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {

                code = list_books.get(position).getCode();
                titre = list_books.get(position).getTitre();
                autheur = list_books.get(position).getAutheur();
                genre = list_books.get(position).getGenre();
                summary = list_books.get(position).getSummary();

                DetailFragment detailFragment = new DetailFragment();
                FragmentTransaction fragmentTransaction = getSupportFragmentManager().beginTransaction();

                Bundle mySend = new Bundle();
                mySend.putString("titre", titre);
                mySend.putString("autheur", autheur);
                mySend.putString("genre", genre);
                mySend.putString("summary", summary);

                detailFragment.setArguments(mySend);
                fragmentTransaction.replace(R.id.ll_detail, detailFragment).commit();

                btn_update.setEnabled(true);
            }
        });

        btn_update.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent intent = new Intent(ReadBdActivity.this, WriteBdActivity.class);
                Bundle mySend = new Bundle();

                mySend.putString("code", code);
                mySend.putString("titre", titre);
                mySend.putString("autheur", autheur);
                mySend.putString("genre", genre);
                mySend.putString("summary", summary);

                intent.putExtras(mySend);
                startActivity(intent);

            }
        });

    }

    private void initList() {
        final ArrayAdapter<Livre> adapter = new ArrayAdapter<Livre>(this,
                android.R.layout.simple_list_item_1, list_books);

        databaseReference = FirebaseDatabase.getInstance().getReference("Livres");

        databaseReference.addChildEventListener(new ChildEventListener() {
            @Override
            public void onChildAdded(@NonNull DataSnapshot snapshot, @Nullable String previousChildName) {

                list_books.add(snapshot.getValue(Livre.class));
                adapter.notifyDataSetChanged();
            }

            @Override
            public void onChildChanged(@NonNull DataSnapshot snapshot, @Nullable String previousChildName) {

                adapter.notifyDataSetChanged();
            }

            @Override
            public void onChildRemoved(@NonNull DataSnapshot snapshot) {

                list_books.remove(snapshot.getValue(Livre.class));
                adapter.notifyDataSetChanged();
            }

            @Override
            public void onChildMoved(@NonNull DataSnapshot snapshot, @Nullable String previousChildName) {

            }

            @Override
            public void onCancelled(@NonNull DatabaseError error) {

            }
        });

        lv_books.setAdapter(adapter);
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
        Intent intent = new Intent(ReadBdActivity.this, GestionBdActivity.class);
        startActivity(intent);
        finish();
        super.onBackPressed();
    }

}