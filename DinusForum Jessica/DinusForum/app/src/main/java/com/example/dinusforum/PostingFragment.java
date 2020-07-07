package com.example.dinusforum;

import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.net.Uri;
import android.os.Bundle;

import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentTransaction;

import android.provider.MediaStore;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.ImageView;
import android.widget.Toast;

import com.androidnetworking.AndroidNetworking;
import com.androidnetworking.common.Priority;
import com.androidnetworking.error.ANError;
import com.androidnetworking.interfaces.JSONObjectRequestListener;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.ByteArrayInputStream;
import java.io.ByteArrayOutputStream;
import java.io.IOException;

import static android.app.Activity.RESULT_OK;


/**
 * A simple {@link Fragment} subclass.
 */
public class PostingFragment extends Fragment {
    View view ;
    EditText editText_nama_thread;
    EditText editText_isi;
    Button done;
    String nama_thread, isi , gambar;
    EditText editText_username;
    String username;
    ImageButton tambah_gambar;

    int PICK_IMAGE_REQUEST = 1;
    Bitmap bitmap, decoded;
    int bitmap_size = 60;

    ImageView tampilkan_gambar;

    public PostingFragment() {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        view = inflater.inflate(R.layout.fragment_posting, container, false);
        editText_username = (EditText) view.findViewById(R.id.username);
        editText_nama_thread = (EditText) view.findViewById(R.id.nama_thread);
        editText_isi = (EditText) view.findViewById(R.id.isi);
        done = (Button) view.findViewById(R.id.done);
        tambah_gambar = (ImageButton) view.findViewById(R.id.tambah_gambar);
        tampilkan_gambar = (ImageView) view.findViewById(R.id.tampilkan_gambar);

        tambah_gambar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                choosefile();
            }
        });

        done.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                username= editText_username.getText().toString();
                nama_thread=editText_nama_thread.getText().toString();
                isi= editText_isi.getText().toString();
                gambar = tampilkan_gambar.getDrawable().toString();
                simpanData();
                Fragment homeFragment = new HomeFragment();
                FragmentTransaction transaction = getFragmentManager().beginTransaction();
                transaction.replace(R.id.fragment_container, homeFragment);
                transaction.addToBackStack(null);
                transaction.commit();
            }
        });
        return view;
    }

    public  void choosefile(){
        Intent intent = new Intent();
        intent.setType("image/*");
        intent.setAction(Intent.ACTION_GET_CONTENT);
        startActivityForResult(Intent.createChooser(intent, "Select Picture"), PICK_IMAGE_REQUEST);
    }

    @Override
    public void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);

        if (requestCode == PICK_IMAGE_REQUEST && resultCode == RESULT_OK && data != null && data.getData() != null) {
            Uri filePath = data.getData();
            try {
                //mengambil fambar dari Gallery
                bitmap = MediaStore.Images.Media.getBitmap(getActivity().getContentResolver(), filePath);
                // 512 adalah resolusi tertinggi setelah image di resize, bisa di ganti.
                setToImageView(getResizedBitmap(bitmap, 512));
            } catch (IOException e) {
                e.printStackTrace();
            }
        }
    }
    public void setToImageView(Bitmap bmp) {
        //compress image
        ByteArrayOutputStream bytes = new ByteArrayOutputStream();
        bmp.compress(Bitmap.CompressFormat.JPEG, bitmap_size, bytes);
        decoded = BitmapFactory.decodeStream(new ByteArrayInputStream(bytes.toByteArray()));

        //menampilkan gambar yang dipilih dari camera/gallery ke ImageView
        tampilkan_gambar.setImageBitmap(decoded);
    }

    private void kosong() {
        tampilkan_gambar.setImageResource(0);

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
    private void simpanData(){
        AndroidNetworking.post(DbContract.SERVER_POST_URL)
                .addBodyParameter("username", ""+username)
                .addBodyParameter("nama_thread", ""+nama_thread)
                .addBodyParameter("isi", ""+isi)
                .addBodyParameter("gambar",""+gambar)
                .setPriority(Priority.MEDIUM)
                .setTag("Tambah Data")
                .build()
                .getAsJSONObject(new JSONObjectRequestListener() {
                    @Override
                    public void onResponse(JSONObject response) {
                        // do anything with response
                        try {
                            if(response.getString("status").equals("true")){
                                Toast.makeText(getActivity(),"Berhasil diSimpan",Toast.LENGTH_LONG).show();

                            }else {
                                Toast.makeText(getActivity(),"Gagal disimpan",Toast.LENGTH_LONG).show();
                            }
                        }catch (JSONException e){
                            e.printStackTrace();
                        }
                    }
                    @Override
                    public void onError(ANError error) {
                        // handle error
                        Log.d("ErrorTambahData",""+error.getErrorDetail());
                    }
                });
    }
}
