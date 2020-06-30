package com.example.dinusforum;

import android.content.Intent;
import android.os.Bundle;

import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentTransaction;

import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.androidnetworking.AndroidNetworking;
import com.androidnetworking.common.Priority;
import com.androidnetworking.error.ANError;
import com.androidnetworking.interfaces.JSONObjectRequestListener;

import org.json.JSONException;
import org.json.JSONObject;


/**
 * A simple {@link Fragment} subclass.
 */
public class PostingFragment extends Fragment {
    View view ;
    EditText editText_nama_thread;
    EditText editText_isi;
    Button done;
    String nama_thread, isi ;
    EditText editText_username;
    String username;

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


        done.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                username= editText_username.getText().toString();
                nama_thread=editText_nama_thread.getText().toString();
                isi= editText_isi.getText().toString();

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
    private void simpanData(){
        AndroidNetworking.post(DbContract.SERVER_POST_URL)
                .addBodyParameter("username", ""+username)
                .addBodyParameter("nama_thread", ""+nama_thread)
                .addBodyParameter("isi", ""+isi)
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
