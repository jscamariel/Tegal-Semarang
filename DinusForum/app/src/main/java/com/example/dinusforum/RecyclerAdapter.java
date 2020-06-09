package com.example.dinusforum;

import android.os.Handler;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

public class RecyclerAdapter extends RecyclerView.Adapter<RecyclerAdapter.MyViewHolder> implements UpdateDataDialog.UpdateDataDialogListener{
    private ArrayList<Data> arrayList = new ArrayList<>();
    public RecyclerAdapter(ArrayList<Data> arrayList){
        this.arrayList = arrayList;
    }

    @Override
    public MyViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.layout_row, parent, false);
        return new MyViewHolder(view);
    }

    @Override
    public void onBindViewHolder(MyViewHolder holder, int position) {
        holder.id_thread.setText(arrayList.get(position).getId_thread());
        holder.username.setText(arrayList.get(position).getUsername());
        holder.nama_thread.setText(arrayList.get(position).getNama_thread());
        holder.isi.setText(arrayList.get(position).getIsi());



        holder.btn_update.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openUpdateDialog();
            }
        });

    }

    @Override
    public int getItemCount() {
        return arrayList.size();
    }

    @Override
    public void update(String id_thread, String nama_thread, String isi) {
        updateDataToServer(id_thread, nama_thread,isi);
    }

    public static class MyViewHolder extends RecyclerView.ViewHolder{
        TextView id_thread, username, nama_thread, isi;
        Button btn_update, btn_delete;

        public MyViewHolder(View itemView) {
            super(itemView);
            id_thread = (TextView) itemView.findViewById(R.id.id_thread);
            username = (TextView) itemView.findViewById(R.id.username);
            nama_thread = (TextView) itemView.findViewById(R.id.nama_thread);
            isi = (TextView) itemView.findViewById(R.id.isi);
            btn_update = (Button) itemView.findViewById(R.id.btn_update);
            btn_delete = (Button) itemView.findViewById(R.id.btn_delete);
        }
    }

    public void openUpdateDialog() {
        UpdateDataDialog updateDataDialog = new UpdateDataDialog();
        updateDataDialog.show(getFragmentManager(), "update dialog");
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
}

