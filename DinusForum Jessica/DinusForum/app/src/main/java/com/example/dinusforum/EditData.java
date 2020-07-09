package com.example.dinusforum;

import android.app.DatePickerDialog;
import android.content.Intent;
import android.database.Cursor;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.net.Uri;
import android.os.Bundle;
import android.os.Environment;
import android.provider.MediaStore;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.Toast;
import android.widget.Toolbar;

import androidx.appcompat.app.AppCompatActivity;

import com.androidnetworking.AndroidNetworking;
import com.androidnetworking.common.Priority;
import com.androidnetworking.error.ANError;
import com.androidnetworking.interfaces.JSONObjectRequestListener;
import com.squareup.picasso.Picasso;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.ByteArrayInputStream;
import java.io.ByteArrayOutputStream;
import java.io.File;
import java.io.IOException;
import java.text.DecimalFormat;
import java.text.NumberFormat;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.Locale;

public class EditData extends AppCompatActivity {
    private static final String TAG = EditData.class.getSimpleName();
    Toolbar toolbar;
    EditText editText_nama_thread, editText_isi, editText_username, editText_id_thread;
    Button btn_simpan, ubah_image;
    ImageView get_image;
    String nama_thread, isi, username, id_thread, gambar;
    int success;
    int PICK_IMAGE_REQUEST = 1;
    int bitmap_size = 60; // range 1 - 100
    Bitmap bitmap, decoded;

    private static final String TAG_SUCCESS = "success";
    private static final String TAG_MESSAGE = "message";
    private String KEY_IMAGE = "image";
    private String KEY_NAME = "name";

    String tag_json_obj = "json_obj_req";
    Uri fileUri;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_edit_data);

        editText_nama_thread         = findViewById(R.id.ubah_nama_thread);
        editText_isi     = findViewById(R.id.ubah_isi);
        editText_username        = findViewById(R.id.ubah_username);
        editText_id_thread = findViewById(R.id.ubah_id_thread);
        btn_simpan          = findViewById(R.id.btn_simpan);
        get_image = findViewById(R.id.get_image);
        ubah_image = findViewById(R.id.ubah_image);

        AndroidNetworking.initialize(this);

        Intent data = getIntent();
        id_thread = data.getStringExtra("id_thread");
        nama_thread  = data.getStringExtra("nama_thread");
        isi = data.getStringExtra("isi");
        username  = data.getStringExtra("username");
        gambar = data.getStringExtra("gambar");

        editText_id_thread.setText(id_thread);
        editText_nama_thread.setText(nama_thread);
        editText_isi.setText(isi);
        editText_username.setText(username);
        Picasso.get().load(gambar).into(get_image);

        ubah_image.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                choose();
                //Intent keHome = new Intent(getApplicationContext(),HomeFragment.class);
                //startActivity(keHome);
            }
        });
        btn_simpan.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if(editText_id_thread.getText().toString().equals("")){
                    Toast.makeText(getApplicationContext(), "Data tidak boleh kosong...", Toast.LENGTH_LONG).show();
                }else {
                    update();
                    updateFik();
                    updateFeb();
                    updateFib();
                    updateFkes();
                    updateOlahraga();
                    updateFotografi();
                    updateGame();
                    updatePecintaalam();
                    updatePecintahewan();
                    updateOtomotif();

                }
            }
        });
    }

    public void choose(){
        Intent intent = new Intent();
        intent.setType("image/*");
        intent.setAction(Intent.ACTION_GET_CONTENT);
        startActivityForResult(Intent.createChooser(intent, "Select Picture"), PICK_IMAGE_REQUEST);

    }


    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);

        if (requestCode == PICK_IMAGE_REQUEST && resultCode == RESULT_OK && data != null && data.getData() != null) {
            Uri filePath = data.getData();
            try {
                //mengambil fambar dari Gallery
                bitmap = MediaStore.Images.Media.getBitmap(getContentResolver(), filePath);
                // 512 adalah resolusi tertinggi setelah image di resize, bisa di ganti.
                setToImageView(getResizedBitmap(bitmap, 512));
            } catch (IOException e) {
                e.printStackTrace();
            }
        }
    }

    private void kosong() {
        get_image.setImageResource(0);

    }

    private void setToImageView(Bitmap bmp) {
        //compress image
        ByteArrayOutputStream bytes = new ByteArrayOutputStream();
        bmp.compress(Bitmap.CompressFormat.JPEG, bitmap_size, bytes);
        decoded = BitmapFactory.decodeStream(new ByteArrayInputStream(bytes.toByteArray()));

        //menampilkan gambar yang dipilih dari camera/gallery ke ImageView
        get_image.setImageBitmap(decoded);
    }

    // fungsi resize image
    public Bitmap getResizedBitmap(Bitmap image, int maxSize) {
        int width = image.getWidth();
        int height = image.getHeight();

        float bitmapRatio = (float) width / (float) height;
        if (bitmapRatio > 1) {
            width = maxSize;
            height = (int) (width / bitmapRatio);
        } else {
            height = maxSize;
            width = (int) (height * bitmapRatio);
        }
        return Bitmap.createScaledBitmap(image, width, height, true);
    }

    public void update(){
        AndroidNetworking.put(DbContract.SERVER_PUT_URL)
                .addBodyParameter("id_thread", editText_id_thread.getText().toString())
                .addBodyParameter("nama_thread",editText_nama_thread.getText().toString())
                .addBodyParameter("isi", editText_isi.getText().toString())
                .addBodyParameter("username", editText_username.getText().toString())
                .addBodyParameter("gambar",get_image.getDrawable().toString())
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
    public void updateFik(){
        AndroidNetworking.put(DbContract.SERVER_GET_FIK_URL)
                .addBodyParameter("id_thread", editText_id_thread.getText().toString())
                .addBodyParameter("nama_thread",editText_nama_thread.getText().toString())
                .addBodyParameter("isi", editText_isi.getText().toString())
                .addBodyParameter("username", editText_username.getText().toString())
                .addBodyParameter("gambar",get_image.getDrawable().toString())
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
    public void updateFeb(){
        AndroidNetworking.put(DbContract.SERVER_GET_FEB_URL)
                .addBodyParameter("id_thread", editText_id_thread.getText().toString())
                .addBodyParameter("nama_thread",editText_nama_thread.getText().toString())
                .addBodyParameter("isi", editText_isi.getText().toString())
                .addBodyParameter("username", editText_username.getText().toString())
                .addBodyParameter("gambar",get_image.getDrawable().toString())
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
    public void updateFib(){
        AndroidNetworking.put(DbContract.SERVER_GET_FIB_URL)
                .addBodyParameter("id_thread", editText_id_thread.getText().toString())
                .addBodyParameter("nama_thread",editText_nama_thread.getText().toString())
                .addBodyParameter("isi", editText_isi.getText().toString())
                .addBodyParameter("username", editText_username.getText().toString())
                .addBodyParameter("gambar",get_image.getDrawable().toString())
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
    public void updateFkes(){
        AndroidNetworking.put(DbContract.SERVER_GET_FKES_URL)
                .addBodyParameter("id_thread", editText_id_thread.getText().toString())
                .addBodyParameter("nama_thread",editText_nama_thread.getText().toString())
                .addBodyParameter("isi", editText_isi.getText().toString())
                .addBodyParameter("username", editText_username.getText().toString())
                .addBodyParameter("gambar",get_image.getDrawable().toString())
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
    public void updateOlahraga(){
        AndroidNetworking.put(DbContract.SERVER_GET_OLAHRAGA_URL)
                .addBodyParameter("id_thread", editText_id_thread.getText().toString())
                .addBodyParameter("nama_thread",editText_nama_thread.getText().toString())
                .addBodyParameter("isi", editText_isi.getText().toString())
                .addBodyParameter("username", editText_username.getText().toString())
                .addBodyParameter("gambar",get_image.getDrawable().toString())
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
    public void updateFotografi(){
        AndroidNetworking.put(DbContract.SERVER_GET_FOTOGRAFI_URL)
                .addBodyParameter("id_thread", editText_id_thread.getText().toString())
                .addBodyParameter("nama_thread",editText_nama_thread.getText().toString())
                .addBodyParameter("isi", editText_isi.getText().toString())
                .addBodyParameter("username", editText_username.getText().toString())
                .addBodyParameter("gambar",get_image.getDrawable().toString())
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
    public void updateGame(){
        AndroidNetworking.put(DbContract.SERVER_GET_GAME_URL)
                .addBodyParameter("id_thread", editText_id_thread.getText().toString())
                .addBodyParameter("nama_thread",editText_nama_thread.getText().toString())
                .addBodyParameter("isi", editText_isi.getText().toString())
                .addBodyParameter("username", editText_username.getText().toString())
                .addBodyParameter("gambar",get_image.getDrawable().toString())
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
    public void updatePecintaalam(){
        AndroidNetworking.put(DbContract.SERVER_GET_PECINTAALAM_URL)
                .addBodyParameter("id_thread", editText_id_thread.getText().toString())
                .addBodyParameter("nama_thread",editText_nama_thread.getText().toString())
                .addBodyParameter("isi", editText_isi.getText().toString())
                .addBodyParameter("username", editText_username.getText().toString())
                .addBodyParameter("gambar",get_image.getDrawable().toString())
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
    public void updatePecintahewan(){
        AndroidNetworking.put(DbContract.SERVER_GET_PECINTAHEWAN_URL)
                .addBodyParameter("id_thread", editText_id_thread.getText().toString())
                .addBodyParameter("nama_thread",editText_nama_thread.getText().toString())
                .addBodyParameter("isi", editText_isi.getText().toString())
                .addBodyParameter("username", editText_username.getText().toString())
                .addBodyParameter("gambar",get_image.getDrawable().toString())
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
    public void updateOtomotif(){
        AndroidNetworking.put(DbContract.SERVER_GET_OTOMOTIF_URL)
                .addBodyParameter("id_thread", editText_id_thread.getText().toString())
                .addBodyParameter("nama_thread",editText_nama_thread.getText().toString())
                .addBodyParameter("isi", editText_isi.getText().toString())
                .addBodyParameter("username", editText_username.getText().toString())
                .addBodyParameter("gambar",get_image.getDrawable().toString())
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
