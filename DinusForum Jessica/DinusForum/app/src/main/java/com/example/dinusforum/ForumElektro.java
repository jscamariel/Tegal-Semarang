package com.example.dinusforum;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Toast;

import com.androidnetworking.AndroidNetworking;
import com.androidnetworking.common.Priority;
import com.androidnetworking.error.ANError;
import com.androidnetworking.interfaces.JSONObjectRequestListener;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class ForumElektro extends AppCompatActivity {
    private final static  String STATUS = "Data Thread";
    RecyclerView recycler_elektro;
    RecyclerView.LayoutManager layoutManager;
    RecyclerView.Adapter adapter;
    ArrayList<Data> arrayList ;

    View view;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_forum_elektro);

        recycler_elektro = findViewById(R.id.recycler_elektro);

        recycler_elektro.setHasFixedSize(true);
        arrayList = new ArrayList<>();
        AndroidNetworking.initialize(getApplicationContext());

        readDataFromServer();

        layoutManager = new LinearLayoutManager(getApplicationContext(), LinearLayoutManager.VERTICAL,false);
        recycler_elektro.setLayoutManager(layoutManager);
        adapter = new RecyclerAdapterElektro(getApplicationContext(),arrayList);
        recycler_elektro.setAdapter(adapter);

    }
    public void readDataFromServer(){
        AndroidNetworking.get(DbContract.SERVER_GET_URL)
                .setTag("test")
                .setPriority(Priority.MEDIUM)
                .build()
                .getAsJSONObject(new JSONObjectRequestListener() {
                    @Override
                    public void onResponse(JSONObject response) {
                        Log.d(STATUS, "response : "+response.toString());
                        // do anything with response
                        try {
                            if(response.getString("status").equals("true")){
                                JSONArray jsonArray = response.getJSONArray("data");
                                for (int i =0; i < jsonArray.length(); i++){
                                    JSONObject data = jsonArray.getJSONObject(i);
                                    Data item = new Data(
                                            data.getString("id_thread"),
                                            data.getString("username"),
                                            data.getString("nama_thread"),
                                            data.getString("isi"),
                                            data.getString("gambar")
                                    );
                                    arrayList.add(item);
                                }
                            }else {
                                Toast.makeText(getApplicationContext(), "Data gagal di load!",Toast.LENGTH_LONG).show();
                            }
                        }catch (JSONException e){
                            Toast.makeText(getApplicationContext(), "Error load 1",Toast.LENGTH_LONG).show();
                        }
                        adapter.notifyDataSetChanged();
                    }
                    @Override
                    public void onError(ANError error) {
                        // handle error
                        Toast.makeText(getApplicationContext(), "Error load 2",Toast.LENGTH_LONG).show();
                    }
                });
    }
}
