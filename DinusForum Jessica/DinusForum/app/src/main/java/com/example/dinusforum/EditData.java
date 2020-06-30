package com.example.dinusforum;

import android.app.DatePickerDialog;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.androidnetworking.AndroidNetworking;
import com.androidnetworking.common.Priority;
import com.androidnetworking.error.ANError;
import com.androidnetworking.interfaces.JSONObjectRequestListener;

import org.json.JSONException;
import org.json.JSONObject;

import java.text.DecimalFormat;
import java.text.NumberFormat;

public class EditData extends AppCompatActivity {
    EditText editText_nama_thread, editText_isi, editText_username, editText_id_thread;
    Button btn_simpan;
    String nama_thread, isi, username, id_thread;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_edit_data);

        editText_nama_thread         = findViewById(R.id.ubah_nama_thread);
        editText_isi     = findViewById(R.id.ubah_isi);
        editText_username        = findViewById(R.id.ubah_username);
        editText_id_thread = findViewById(R.id.ubah_id_thread);
        btn_simpan          = findViewById(R.id.btn_simpan);

        AndroidNetworking.initialize(this);

        Intent data = getIntent();
        id_thread = data.getStringExtra("id_thread");
        nama_thread  = data.getStringExtra("nama_thread");
        isi = data.getStringExtra("isi");
        username  = data.getStringExtra("username");

        editText_id_thread.setText(id_thread);
        editText_nama_thread.setText(nama_thread);
        editText_isi.setText(isi);
        editText_username.setText(username);

        btn_simpan.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if(editText_id_thread.getText().toString().equals("")){
                    Toast.makeText(getApplicationContext(), "Data tidak boleh kosong...", Toast.LENGTH_LONG).show();
                }else {
                    update();
                }
            }
        });
    }
    public void update(){
        AndroidNetworking.put(DbContract.SERVER_PUT_URL)
                .addBodyParameter("id_thread", editText_id_thread.getText().toString())
                .addBodyParameter("nama_thread",editText_nama_thread.getText().toString())
                .addBodyParameter("isi", editText_isi.getText().toString())
                .addBodyParameter("username", editText_username.getText().toString())
                .setTag("test")
                .setPriority(Priority.MEDIUM)
                .build()
                .getAsJSONObject(new JSONObjectRequestListener() {
                    @Override
                    public void onResponse(JSONObject response) {
                        // do anything with response
                        try {
                            if(response.getString("status").equals("true") ){
                                Toast.makeText(getApplicationContext(), "Data berhasil di update..."
                                        ,Toast.LENGTH_LONG).show();
                                Bundle bundle = new Bundle();
                                HomeFragment fragmentB = new HomeFragment();
                                bundle.putString("text", "berhasil");
                                fragmentB.setArguments(bundle);
                            }else {
                                Toast.makeText(getApplicationContext(), "Data gagal di update!"
                                        ,Toast.LENGTH_LONG).show();
                            }
                        }catch (JSONException e){
                            Toast.makeText(getApplicationContext(), "Kesalahan update, Kode 1"
                                    ,Toast.LENGTH_LONG).show();
                        }
                    }
                    @Override
                    public void onError(ANError error) {
                        // handle error
                        Log.d("ErrorEditData",""+error.getErrorDetail());
                    }
                });
    }
}
