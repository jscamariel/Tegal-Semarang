package com.example.dinusforum;


import androidx.appcompat.app.AppCompatActivity;
import android.os.Bundle;

import androidx.fragment.app.Fragment;

import android.content.Intent;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.NetworkResponse;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.ServerError;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.HttpHeaderParser;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.UnsupportedEncodingException;
import java.util.HashMap;
import java.util.Map;

public class Login extends AppCompatActivity {
    private EditText username;
    private EditText password;
    private Button login;
    private TextView register_now ;

    private View view;

    @Override
    protected void onCreate(Bundle savedInstanceState){
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        if (SharedPrefManager.getInstance(this).isLoggedIn()) {
            finish();
            startActivity(new Intent(this, MainActivity.class));
        }

        username = findViewById(R.id.username);
        password = findViewById(R.id.password);
        login = findViewById(R.id.login);
        register_now = findViewById(R.id.register_now);

        login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String mUsername = username.getText().toString().trim();
                String mPassword = password.getText().toString().trim();
                if(!mUsername.isEmpty() || !mPassword.isEmpty() ){
                    Login();
                }else{
                    username.setError("Please Insert Username");
                    password.setError("Please Insert Password");
                }

            }
        });

        register_now.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(getApplicationContext(),Register.class));
            }
        });
    }

    public void Login(){
        StringRequest request = new StringRequest(Request.Method.POST, DbContract.SERVER_LOGIN_URL,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            //converting response to json object
                            JSONObject obj = new JSONObject(response);

                            if(response.contains("true")){
                                Toast.makeText(getApplicationContext(),"Hello! "+response, Toast.LENGTH_SHORT).show();
                                //shared preferences
                                //getting the user from the response
                                JSONObject userJson = obj.getJSONObject("response");

                                //creating a new user object
                                DataUser user = new DataUser(
                                        userJson.getInt("id"),
                                        userJson.getString("username"),
                                        userJson.getString("nim"),
                                        userJson.getString("email"),
                                        userJson.getString("password")
                                );
                                //storing the user in shared preferences
                                SharedPrefManager.getInstance(getApplicationContext()).userLogin(user);
                                //starting the profile activity
                                finish();

                                startActivity(new Intent(getApplicationContext(),MainActivity.class));

                            }else{
                                Toast.makeText(getApplicationContext(),"Wrong username or password ", Toast.LENGTH_SHORT).show();
                            }
                        }catch (JSONException e){
                            e.printStackTrace();
                        }


                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        NetworkResponse response = error.networkResponse;
                        if (error instanceof ServerError && response != null) {
                            try {
                                String res = new String(response.data,
                                        HttpHeaderParser.parseCharset(response.headers, "utf-8"));
                                // Now you can use any deserializer to make sense of data
                                //JSONObject obj = new JSONObject(res);
                            } catch (UnsupportedEncodingException e1) {
                                // Couldn't properly decode data to string
                                e1.printStackTrace();
                            }
                            //} catch (JSONException e2) {
                                // returned data is not JSONObject?
                            //    e2.printStackTrace();
                            //}
                        }
                    }
                })
        {
            @Override
            protected Map<String,String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("username",username.getText().toString());
                params.put("password",password.getText().toString());

                return params;
            }
        };
        Volley.newRequestQueue(getApplicationContext()).add(request);
    }
}