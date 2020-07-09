package com.example.dinusforum;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.media.Image;
import android.os.Handler;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.androidnetworking.AndroidNetworking;
import com.androidnetworking.common.Priority;
import com.androidnetworking.error.ANError;
import com.androidnetworking.interfaces.JSONObjectRequestListener;
import com.squareup.picasso.Picasso;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

public class RecyclerAdapter extends RecyclerView.Adapter<RecyclerAdapter.MyViewHolder> {
    private Context context;
    private ArrayList<DataPapan> arrayList ;
    private Activity activity;
    public RecyclerAdapter(Activity activity, ArrayList<DataPapan> arrayList){
        this.activity=activity;
        this.arrayList = arrayList;

    }

    @Override
    public RecyclerAdapter.MyViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.layout_row, parent, false);
        return new MyViewHolder(view);
    }

    @Override
    public void onBindViewHolder(final RecyclerAdapter.MyViewHolder holder, final int position) {
        DataPapan model = arrayList.get(position);

        holder.id_thread.setText(model.getId());
        holder.nama_thread.setText(model.getJudul());
        holder.isi.setText(model.getIsi());

        if(model.getGambar().isEmpty()){
            holder.gambar.setImageResource(R.drawable.ic_add_black_24dp);
        }else{
            Picasso.get().load(model.getGambar()).into(holder.gambar);
        }





        holder.model = model;
    }

    @Override
    public int getItemCount() {
        return arrayList.size();
    }


    public class MyViewHolder extends RecyclerView.ViewHolder{
        TextView id_thread, nama_thread, isi;
        ImageView gambar;

        DataPapan model;
        Comment model2;
        DataUser user = SharedPrefManager.getInstance(activity).getDataUser();

        public MyViewHolder(View itemView) {
            super(itemView);
            id_thread = (TextView) itemView.findViewById(R.id.id_thread);
            nama_thread = (TextView) itemView.findViewById(R.id.nama_thread);
            isi = (TextView) itemView.findViewById(R.id.isi);
            gambar = (ImageView) itemView.findViewById(R.id.image);


            itemView.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    Intent moving = new Intent(activity, DetailBeritaActivity.class);
                    moving.putExtra("id_thread",model.getId());
                    moving.putExtra("nama_thread",model.getJudul());
                    moving.putExtra("isi",model.getIsi());
                    moving.putExtra("gambar",model.getGambar());
                    activity.startActivity(moving);
                }
            });
        }

    }

}

