package com.example.dinusforum;

import android.content.Intent;
import android.os.Bundle;

import androidx.fragment.app.Fragment;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ImageButton;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.Toast;


/**
 * A simple {@link Fragment} subclass.
 */
public class SearchFragment extends Fragment {
    private LinearLayout fik;
    private LinearLayout feb;
    private  LinearLayout ft;
    private  LinearLayout fkes;
    private  LinearLayout fib;
    private LinearLayout olahraga;
    private  LinearLayout oto;
    private  LinearLayout alam;
    private  LinearLayout hewan;
    private  LinearLayout foto;
    private  LinearLayout game;
    public SearchFragment() {




    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        View rootView = inflater.inflate(R.layout.fragment_search, container, false);

        fik = (LinearLayout) rootView.findViewById(R.id.fik);
        feb = (LinearLayout) rootView.findViewById(R.id.feb);
        ft = (LinearLayout) rootView.findViewById(R.id.ft);
        fkes = (LinearLayout) rootView.findViewById(R.id.fkes);
        fib = (LinearLayout) rootView.findViewById(R.id.fib);
        olahraga = (LinearLayout) rootView.findViewById(R.id.olagraga);
        oto = (LinearLayout) rootView.findViewById(R.id.oto);
        alam = (LinearLayout) rootView.findViewById(R.id.alam);
        hewan = (LinearLayout) rootView.findViewById(R.id.hewan);
        foto = (LinearLayout) rootView.findViewById(R.id.foto);
        game = (LinearLayout) rootView.findViewById(R.id.game);




        fik.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Toast.makeText(getActivity(), "FORUM FIK", Toast.LENGTH_SHORT).show();
            }
        });

        feb.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Toast.makeText(getActivity(), "FORUM FEB", Toast.LENGTH_SHORT).show();
            }
        });

        fkes.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Toast.makeText(getActivity(), "FORUM FKES", Toast.LENGTH_SHORT).show();
            }
        });

        ft.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Toast.makeText(getActivity(), "FORUM FT", Toast.LENGTH_SHORT).show();
            }
        });

        oto.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Toast.makeText(getActivity(), "FORUM OTOMOTIF", Toast.LENGTH_SHORT).show();
            }
        });

        alam.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Toast.makeText(getActivity(), "FORUM PENCINTA ALAM", Toast.LENGTH_SHORT).show();
            }
        });

        hewan.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Toast.makeText(getActivity(), "FORUM PENCINTA HEWAN", Toast.LENGTH_SHORT).show();
            }
        });

        foto.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Toast.makeText(getActivity(), "FORUM FOTOGRAFI", Toast.LENGTH_SHORT).show();
            }
        });

        game.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Toast.makeText(getActivity(), "FORUM GAME", Toast.LENGTH_SHORT).show();
            }
        });

        olahraga.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Toast.makeText(getActivity(), "FORUM OLAHRAGA", Toast.LENGTH_SHORT).show();
            }
        });

        fib.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Toast.makeText(getActivity(), "FORUM FIB", Toast.LENGTH_SHORT).show();
            }
        });







        // Inflate the layout for this fragment
        return rootView;
    }
}
