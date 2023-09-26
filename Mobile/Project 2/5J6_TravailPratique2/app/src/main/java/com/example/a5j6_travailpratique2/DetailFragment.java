package com.example.a5j6_travailpratique2;

import android.os.Bundle;

import androidx.fragment.app.Fragment;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

public class DetailFragment extends Fragment {

    private String title, author, genre, summary;
    private TextView tv_book_title, tv_book_author, tv_book_genre, tv_book_summary;

    private View view;

    public DetailFragment() {
        // Required empty public constructor
    }

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        view = inflater.inflate(R.layout.fragment_detail, container, false);

        tv_book_title = view.findViewById(R.id.tv_book_title);
        tv_book_author = view.findViewById(R.id.tv_book_author);
        tv_book_genre = view.findViewById(R.id.tv_book_genre);
        tv_book_summary = view.findViewById(R.id.tv_book_summary);

        Bundle bundle = getArguments();

        if (bundle != null) {
            title = bundle.getString("titre");
            author = bundle.getString("autheur");
            genre = bundle.getString("genre");
            summary = bundle.getString("summary");
        }

        tv_book_title.setText(title);
        tv_book_author.setText(author);
        tv_book_genre.setText(genre);
        tv_book_summary.setText(summary);

        return view;
    }
}