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
import android.widget.Toast;

import com.androidnetworking.AndroidNetworking;
import com.androidnetworking.common.Priority;
import com.androidnetworking.error.ANError;
import com.androidnetworking.interfaces.JSONObjectRequestListener;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class DetailActivity extends AppCompatActivity {
    EditText editTextComment;
    EditText editTextUsername;
    EditText editTextNamaThread;
    ImageButton btnAddComment;
    String username, nama_thread, comment;

    RecyclerView RvComment;
    ArrayList<Comment> listComment;
    RecyclerView.LayoutManager layoutManager;
    RecyclerView.Adapter adapter;
    static String COMMENT_KEY = "Comment" ;
    Context context;
    String id_thread;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detail);
        // let's set the statue bar to transparent

        // ini Views
        RvComment = findViewById(R.id.comment);
        editTextNamaThread = findViewById(R.id.nama_thread);
        editTextUsername = findViewById(R.id.username);
        editTextComment = findViewById(R.id.edit_comment);
        btnAddComment = findViewById(R.id.add_comment);

        // add Comment button click listner
        btnAddComment.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                username = editTextUsername.getText().toString();
                nama_thread = editTextNamaThread.getText().toString();
                comment = editTextComment.getText().toString();
                addComment();


            }
        });


        // now we need to bind all data into those views
        // firt we need to get post data
        // we need to send post detail data to this activity first ...
        // now we can get post data


        // setcomment user image


        RvComment.setHasFixedSize(true);
        listComment = new ArrayList<>();
        AndroidNetworking.initialize(getApplicationContext());

        //intent
        Intent data = getIntent();
        id_thread =data.getStringExtra("id_thread");
        iniRvComment(id_thread);

        layoutManager = new LinearLayoutManager(getApplicationContext(), LinearLayoutManager.VERTICAL,false);
        RvComment.setLayoutManager(layoutManager);
        adapter = new CommentRecyclerAdapter(getApplicationContext(), listComment);
        RvComment.setAdapter(adapter);

    }
    public void iniRvComment(String id_thread) {
        AndroidNetworking.get("http://192.168.100.6/ci-dinus-forum-server/api/komentar/komentar?id_thread="+id_thread)
                //.addPathParameter("idthread", id_thread)
                .setTag("komentar")
                .setPriority(Priority.MEDIUM)
                .build()
                .getAsJSONObject(new JSONObjectRequestListener() {
                    @Override
                    public void onResponse(JSONObject response) {
                        Log.d(COMMENT_KEY, "response : "+response.toString());
                        // do anything with response
                        try {
                            if(response.getString("status").equals("true")){
                                JSONArray jsonArray = response.getJSONArray("data");
                                for (int i =0; i < jsonArray.length(); i++){
                                    JSONObject data = jsonArray.getJSONObject(i);
                                    Comment item = new Comment(
                                            data.getInt("id_komentar"),
                                            data.getInt("id_thread"),
                                            data.getString("username"),
                                            data.getString("nama_thread"),
                                            data.getString("isi_komentar")
                                    );
                                    listComment.add(item);
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

    private void addComment(){
        AndroidNetworking.post(DbContract.SERVER_KOMENTAR_URL)
                .addBodyParameter("id_thread",""+id_thread) //ini pake Data
                .addBodyParameter("username",""+username)
                .addBodyParameter("nama_thread",""+nama_thread)
                .addBodyParameter("isi_komentar", ""+comment)
                .setPriority(Priority.MEDIUM)
                .setTag("Tambah Komentar")
                .build()
                .getAsJSONObject(new JSONObjectRequestListener() {
                    @Override
                    public void onResponse(JSONObject response) {
                        // do anything with response
                        try {
                            if(response.getString("status").equals("true")){
                                Toast.makeText(getApplicationContext(),"Berhasil diSimpan",Toast.LENGTH_LONG).show();

                            }else {
                                Toast.makeText(getApplicationContext(),"Gagal disimpan",Toast.LENGTH_LONG).show();
                            }
                        }catch (JSONException e){
                            e.printStackTrace();
                        }
                    }
                    @Override
                    public void onError(ANError error) {
                        // handle error
                        Log.d("ErrorTambahKomentar",""+error.getErrorDetail());
                    }
                });
    }

}