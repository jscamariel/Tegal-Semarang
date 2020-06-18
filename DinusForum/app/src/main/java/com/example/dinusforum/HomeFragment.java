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
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ProgressBar;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;

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
public class HomeFragment extends Fragment implements UpdateDataDialog.UpdateDataDialogListener,DeleteDataDialog.DeleteDataDialogListener {
    RecyclerView recycler;
    RecyclerView.LayoutManager layoutManager;
    RecyclerAdapter adapter;
    ArrayList<Data> arrayList = new ArrayList<>();
    String DATA_JSON_STRING , data_json_string;
    ProgressBar progressBar;
    int countData = 0;
    View view;

    public HomeFragment() {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        view = inflater.inflate(R.layout.fragment_home, container, false);
        recycler = (RecyclerView) view.findViewById(R.id.recycler);
        layoutManager = new LinearLayoutManager(getActivity());
        recycler.setLayoutManager(layoutManager);
        recycler.setHasFixedSize(true);
        adapter = new RecyclerAdapter(arrayList);
        recycler.setAdapter(adapter);
        progressBar = new ProgressBar(getActivity());

        //REad Data
        getJSON();
        new Handler().postDelayed(new Runnable() {
            @Override
            public void run() {
                readDataFromServer();

            }
        },1000);

        // Update Data


        return view;
    }



    public void updateDataToServer(final String id_thread, final String nama_thread, final String isi){
        if (checkNetworkConnection()) {
            //progressBar.showContextMenu();
            getJSON();
            StringRequest stringRequest = new StringRequest(Request.Method.POST, DbContract.SERVER_PUT_URL,
                    new Response.Listener<String>() {
                        @Override
                        public void onResponse(String response) {
                            try {
                                getJSON();
                                JSONObject jsonObject = new JSONObject(response);
                                String resp = jsonObject.getString("status");
                                if (resp.equals("true")) {
                                    getJSON();
                                    Toast.makeText(getActivity(), "Berhasil update Data", Toast.LENGTH_SHORT).show();
                                } else {
                                    getJSON();
                                    Toast.makeText(getActivity(), resp, Toast.LENGTH_SHORT).show();
                                }
                            } catch (JSONException e) {
                                e.printStackTrace();
                            }
                        }
                    }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {
                    getJSON();
                    Toast.makeText(getActivity(), "ERROR", Toast.LENGTH_SHORT).show();
                }
            }) {
                @Override
                protected Map<String, String> getParams() throws AuthFailureError {
                    Map<String, String> params = new HashMap<>();
                    params.put("id_thread", id_thread);
                    params.put("nama_thread", nama_thread);
                    params.put("isi", isi);
                    return params;
                }
            };

            VolleySingleton.getInstance(getActivity()).addToRequestQueue(stringRequest);

            getJSON();
            new Handler().postDelayed(new Runnable() {
                @Override
                public void run() {
                    readDataFromServer();
                    //progressBar.cancelDragAndDrop();
                }
            }, 2000);
        } else {
            Toast.makeText(getActivity(), "Tidak ada koneksi Internet", Toast.LENGTH_SHORT).show();
        }
    }

    public void readDataFromServer(){
        if(checkNetworkConnection()){
            arrayList.clear();
            try {
                JSONObject object = new JSONObject(data_json_string);
                JSONArray serverResponse = object.getJSONArray("data"); ////inii
                String id_thread;
                String username, nama_thread, isi;
                while (countData < serverResponse.length()){
                    JSONObject jsonObject = serverResponse.getJSONObject(countData);
                    id_thread = jsonObject.getString("id_thread");
                    username = jsonObject.getString("username");
                    nama_thread = jsonObject.getString("nama_thread");
                    isi = jsonObject.getString("isi");
                    arrayList.add(new Data(id_thread,username,nama_thread,isi));
                    countData++;
                }
                countData = 0;
                adapter.notifyDataSetChanged();
            }catch (JSONException e){
                e.printStackTrace();
            }
        }
    }

    public boolean checkNetworkConnection(){
        ConnectivityManager connectivityManager = (ConnectivityManager) getActivity().getSystemService(Context.CONNECTIVITY_SERVICE);
        NetworkInfo networkInfo = connectivityManager.getActiveNetworkInfo();
        return (networkInfo != null  && networkInfo.isConnected() );
    }

    public void getJSON(){
        new BackgroundTask().execute();
    }



    @Override
    public void update(String id_thread, String nama_thread, String isi) {
        //progressDialog.setMessage("Please wait...");
        //progressBar.setMax(100);
        //progressDialog.setCancelable(false);
        updateDataToServer(id_thread, nama_thread,isi);
    }

    @Override
    public void delete(String id_thread) {

    }

    class BackgroundTask extends AsyncTask<Void,Void,String> {

        String json_url;

        @Override
        protected void onPreExecute(){
            json_url = DbContract.SERVER_GET_URL;
        }

        @Override
        protected String doInBackground(Void... voids) {
            try {
                URL url = new URL(json_url);
                HttpURLConnection httpURLConnection = (HttpURLConnection) url.openConnection();
                InputStream inputStream = httpURLConnection.getInputStream();
                BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(inputStream));
                StringBuilder stringBuilder = new StringBuilder();

                while ((DATA_JSON_STRING = bufferedReader.readLine()) != null){
                    stringBuilder.append(DATA_JSON_STRING + "\n");
                }
                bufferedReader.close();
                inputStream.close();
                httpURLConnection.disconnect();
                return stringBuilder.toString().trim();

            }catch (MalformedURLException e) {
                e.printStackTrace();
            } catch (IOException e) {
                e.printStackTrace();
            }
            return null;
        }

        @Override
        protected void onProgressUpdate(Void... values){
            super.onProgressUpdate(values);
        }

        @Override
        protected void onPostExecute(String result){
            data_json_string = result;
        }

    }
}
