package com.ppl.java_dinus_forum;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;

import android.support.v7.app.ActionBarActivity;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

import com.squareup.okhttp.FormEncodingBuilder;
import com.squareup.okhttp.MediaType;
import com.squareup.okhttp.OkHttpClient;
import com.squareup.okhttp.Request;
import com.squareup.okhttp.RequestBody;
import com.squareup.okhttp.Response;

import java.io.IOException;

import com.ppl.java_dinus_forum.R;


public class LoginActivity extends ActionBarActivity implements View.OnClickListener, Runnable{

    private EditText username;
    private EditText password;
    private Button login;

    OkHttpClient client = new OkHttpClient();

    // 10.0.2.2 adalah alias alamat localhost
    private final String loginurl = "http://192.168.100.6/ci-dinus-forum/index.php/android/loginapi";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
    }
}






public class LoginActivity extends ActionBarActivity implements View.OnClickListener, Runnable {

    private EditText username;
    private EditText password;
    private Button login;

    OkHttpClient client = new OkHttpClient();

    // 10.0.2.2 adalah alias alamat localhost
    private final String loginurl = "http://10.0.2.2/beafit/index.php/android/loginapi";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.login);
        getSupportActionBar().hide();
        username = (EditText) findViewById(R.id.username);
        password = (EditText) findViewById(R.id.password);
        login = (Button) findViewById(R.id.buttonlogin);
        login.setOnClickListener(this);

    }

    @Override
    public void onClick(View v) {
        new Thread(this).start();
    }

    @Override
    public void run() {
        RequestBody formBody = new FormEncodingBuilder()
                .add("username", username.getText().toString())
                .add("password", password.getText().toString())
                .build();
        Request request = new Request.Builder()
                .url(loginurl)
                .post(formBody)
                .build();

        try {
            Response response = client.newCall(request).execute();
            if (!response.isSuccessful()){
                throw new IOException("Unexpected code " + response);
            }
            System.out.println(response.body().string());
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
}
