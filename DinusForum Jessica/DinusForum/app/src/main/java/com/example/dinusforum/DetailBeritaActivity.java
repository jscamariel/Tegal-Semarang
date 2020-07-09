package com.example.dinusforum;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.androidnetworking.AndroidNetworking;
import com.androidnetworking.common.Priority;
import com.androidnetworking.error.ANError;
import com.androidnetworking.interfaces.JSONObjectRequestListener;
import com.squareup.picasso.Picasso;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class DetailBeritaActivity extends AppCompatActivity {
    EditText editTextComment;
    TextView editTextNamaThread;
    ImageButton btnAddComment;
    String nama_thread, comment;

    TextView detail_nama_thread, detail_isi;
    ImageView detail_gambar;
    String detailNamaThread, detailIsi, detailGambar;

    Context context;
    String id_thread;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detail_berita);
        // let's set the statue bar to transparent

        final DataUser user = SharedPrefManager.getInstance(this).getDataUser();

        // ini Views
        editTextNamaThread = findViewById(R.id.nama_thread);
        detail_nama_thread = findViewById(R.id.detail_nama_thread);
        detail_isi =  findViewById(R.id.detail_isi);
        detail_gambar = findViewById(R.id.detail_gambar);


        //intent
        Intent data = getIntent();
        id_thread =data.getStringExtra("id_thread");
        detailNamaThread = data.getStringExtra("nama_thread");
        detailIsi = data.getStringExtra("isi");
        detailGambar = data.getStringExtra("gambar");
        detail_nama_thread.setText(detailNamaThread);
        detail_isi.setText(detailIsi);
        Picasso.get().load(detailGambar).into(detail_gambar);


    }

}