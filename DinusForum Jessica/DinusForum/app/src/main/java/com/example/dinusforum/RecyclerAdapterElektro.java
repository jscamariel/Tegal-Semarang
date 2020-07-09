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

public class RecyclerAdapterElektro extends RecyclerView.Adapter<RecyclerAdapterElektro.MyViewHolder> {
    private Context context;
    private ArrayList<Data> arrayList ;
    //private Activity activity;
    public RecyclerAdapterElektro(Context context, ArrayList<Data> arrayList){
        this.context=context;
        this.arrayList = arrayList;

    }

    @Override
    public RecyclerAdapterElektro.MyViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.activity_layout_row_elektro, parent, false);
        return new MyViewHolder(view);
    }

    @Override
    public void onBindViewHolder(final RecyclerAdapterElektro.MyViewHolder holder, final int position) {
        Data model = arrayList.get(position);

        holder.id_thread.setText(model.getId_thread());
        holder.username.setText(model.getUsername());
        holder.nama_thread.setText(model.getNama_thread());
        holder.isi.setText(model.getIsi());

        if(model.getGambar().isEmpty()){
            holder.gambar.setImageResource(R.drawable.ic_add_black_24dp);
        }else{
            Picasso.get().load(model.getGambar()).into(holder.gambar);
        }



        if(model.getUsername().equals(holder.user.getUsername()) ){
            holder.btn_update.setVisibility(View.VISIBLE);
            holder.btn_delete.setVisibility(View.VISIBLE);
        }else {
            holder.btn_update.setVisibility(View.GONE);
            holder.btn_delete.setVisibility(View.GONE);
        }

        holder.btn_delete.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                holder.hapusData();
                arrayList.remove(position);
                notifyItemRemoved(position);
                notifyItemRangeChanged(position, arrayList.size());
                notifyDataSetChanged();
            }
        });



        holder.model = model;
    }

    @Override
    public int getItemCount() {
        return arrayList.size();
    }


    public class MyViewHolder extends RecyclerView.ViewHolder{
        TextView id_thread, username, nama_thread, isi;
        ImageView gambar;
        Button btn_update, btn_delete;
        Data model;
        Comment model2;
        DataUser user = SharedPrefManager.getInstance(context).getDataUser();

        public MyViewHolder(View itemView) {
            super(itemView);
            id_thread = (TextView) itemView.findViewById(R.id.id_thread);
            username = (TextView) itemView.findViewById(R.id.username);
            nama_thread = (TextView) itemView.findViewById(R.id.nama_thread);
            isi = (TextView) itemView.findViewById(R.id.isi);
            gambar = (ImageView) itemView.findViewById(R.id.image);
            btn_update = (Button) itemView.findViewById(R.id.btn_update);
            btn_delete = (Button) itemView.findViewById(R.id.btn_delete);



            btn_update.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    Intent lempar = new Intent(context, EditData.class);
                    lempar.putExtra("id_thread", model.getId_thread());
                    lempar.putExtra("username", model.getUsername());
                    lempar.putExtra("nama_thread", model.getNama_thread());
                    lempar.putExtra("isi", model.getIsi());
                    lempar.putExtra("gambar",model.getGambar());
                    context.startActivity(lempar);
                }
            });

            itemView.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    Intent moving = new Intent(context, DetailActivity.class);
                    moving.putExtra("id_thread",model.getId_thread());
                    moving.putExtra("username", model.getUsername());
                    moving.putExtra("nama_thread",model.getNama_thread());
                    moving.putExtra("isi",model.getIsi());
                    moving.putExtra("gambar",model.getGambar());
                    context.startActivity(moving);
                }
            });
        }
        public void hapusData(){
            AndroidNetworking.delete(DbContract.SERVER_GET_URL)
                    .addBodyParameter("id_thread", model.getId_thread())
                    .setTag("test")
                    .setPriority(Priority.MEDIUM)
                    .build()
                    .getAsJSONObject(new JSONObjectRequestListener() {
                        @Override
                        public void onResponse(JSONObject response) {
                            // do anything with response
                            try {
                                if(response.getString("status").equals("true") ){
                                    Toast.makeText(context, "Data berhasil dihapus..."
                                            ,Toast.LENGTH_LONG).show();

                                }else {
                                    Toast.makeText(context, "Data gagal dihapus!"
                                            ,Toast.LENGTH_LONG).show();
                                }
                            }catch (JSONException e){
                                Toast.makeText(context, "Kesalahan hapus, Kode 1"
                                        ,Toast.LENGTH_LONG).show();
                            }
                        }
                        @Override
                        public void onError(ANError error) {
                            // handle error
                            Log.d("ErrorHapusData",""+error.getErrorDetail());
                        }
                    });
        }
    }

}

