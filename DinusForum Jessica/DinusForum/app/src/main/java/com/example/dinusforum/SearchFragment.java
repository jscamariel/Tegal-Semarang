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
        // Required empty public constructor



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
                Intent moving = new Intent(getActivity(),ForumFik.class);
                startActivity(moving);
            }
        });

        feb.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent moving2 = new Intent(getActivity(),ForumFeb.class);
                startActivity(moving2);
            }
        });

        fkes.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent moving4 = new Intent(getActivity(),ForumFkes.class);
                startActivity(moving4);
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
                Intent moving10 = new Intent(getActivity(),ForumOtomotif.class);
                startActivity(moving10);
            }
        });

        alam.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent moving8 = new Intent(getActivity(),ForumPecintaalam.class);
                startActivity(moving8);
            }
        });

        hewan.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent moving9 = new Intent(getActivity(),ForumPecintahewan.class);
                startActivity(moving9);
            }
        });

        foto.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent moving6 = new Intent(getActivity(),ForumFotografi.class);
                startActivity(moving6);
            }
        });

        game.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent moving7 = new Intent(getActivity(),ForumGame.class);
                startActivity(moving7);
            }
        });

        olahraga.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent moving5 = new Intent(getActivity(),ForumOlahraga.class);
                startActivity(moving5);
            }
        });

        fib.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent moving3 = new Intent(getActivity(),ForumFib.class);
                startActivity(moving3);
            }
        });







        // Inflate the layout for this fragment
        return rootView;
    }
}
