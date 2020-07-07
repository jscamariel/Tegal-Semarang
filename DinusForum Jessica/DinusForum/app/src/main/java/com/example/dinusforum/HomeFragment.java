package com.example.dinusforum;

import android.app.ProgressDialog;
import android.content.Context;
import android.net.CaptivePortal;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.AsyncTask;
import android.os.Bundle;

import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.os.Handler;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.LinearLayout;
import android.widget.ProgressBar;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.androidnetworking.AndroidNetworking;
import com.androidnetworking.common.Priority;
import com.androidnetworking.error.ANError;
import com.androidnetworking.interfaces.JSONObjectRequestListener;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;


/**
 * A simple {@link Fragment} subclass.
 */
public class HomeFragment extends Fragment {
    private final static  String STATUS = "Data Thread";
    RecyclerView recycler;
    RecyclerView.LayoutManager layoutManager;
    RecyclerView.Adapter adapter;
    ArrayList<Data> arrayList ;

    View view;

    public HomeFragment() {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        view = inflater.inflate(R.layout.fragment_home, container, false);
        recycler = (RecyclerView) view.findViewById(R.id.recycler);

        recycler.setHasFixedSize(true);
        arrayList = new ArrayList<>();
        AndroidNetworking.initialize(getActivity());

        readDataFromServer();

        layoutManager = new LinearLayoutManager(getActivity(), LinearLayoutManager.VERTICAL,false);
        recycler.setLayoutManager(layoutManager);
        adapter = new RecyclerAdapter(getActivity(),arrayList);
        recycler.setAdapter(adapter);

        //REad Data



        return view;
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
                                Toast.makeText(getActivity(), "Data gagal di load!",Toast.LENGTH_LONG).show();
                            }
                        }catch (JSONException e){
                            Toast.makeText(getActivity(), "Error load 1",Toast.LENGTH_LONG).show();
                        }
                        adapter.notifyDataSetChanged();
                    }
                    @Override
                    public void onError(ANError error) {
                        // handle error
                        Toast.makeText(getActivity(), "Error load 2",Toast.LENGTH_LONG).show();
                    }
                });
    }
}
