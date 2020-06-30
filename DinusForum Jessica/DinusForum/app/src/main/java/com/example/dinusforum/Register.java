package com.example.dinusforum;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class Register extends AppCompatActivity {
    EditText editText_username, editText_nim , editText_email, editText_password , editText_id;
    Button btn_register;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);

        //if the user is already logged in we will directly start the MainActivity (profile) activity
        if (SharedPrefManager.getInstance(this).isLoggedIn()) {
            finish();
            startActivity(new Intent(this, MainActivity.class));
            return;
        }

        editText_username = findViewById(R.id.username);
        editText_nim = findViewById(R.id.nim);
        editText_email = findViewById(R.id.email);
        editText_password = findViewById(R.id.password);
        editText_id = findViewById(R.id.id);

        findViewById(R.id.register).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                //if user pressed on button register
                //here we will register the user to server
                registerUser();
            }
        });
    }

    private void registerUser() {
        final String id = this.editText_id.getText().toString().trim();
        final String username = this.editText_username.getText().toString().trim();
        final String nim = this.editText_nim.getText().toString().trim();
        final String email = this.editText_email.getText().toString().trim();
        final String password = this.editText_password.getText().toString().trim();

        //first we will do the validations
        if (TextUtils.isEmpty(username)) {
            editText_username.setError("Please enter username");
            editText_username.requestFocus();
            return;
        }

        if (TextUtils.isEmpty(nim)) {
            editText_nim.setError("Please enter nim");
            editText_nim.requestFocus();
            return;
        }

        if (TextUtils.isEmpty(email)) {
            editText_email.setError("Please enter your email");
            editText_email.requestFocus();
            return;
        }

        if (!android.util.Patterns.EMAIL_ADDRESS.matcher(email).matches()) {
            editText_email.setError("Enter a valid email");
            editText_email.requestFocus();
            return;
        }

        if (TextUtils.isEmpty(password)) {
            editText_password.setError("Enter a password");
            editText_password.requestFocus();
            return;
        }

        StringRequest stringRequest = new StringRequest(Request.Method.POST, DbContract.SERVER_REGISTER_URL, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                try {
                    //converting response to json object
                    JSONObject obj = new JSONObject(response);
                    //String success = obj.getString("success");
                    //if no error in response
                    if (response.contains("true")) {
                        Toast.makeText(getApplicationContext(), obj.getString("message"), Toast.LENGTH_SHORT).show();
                        //shared preferences
                        //getting the user from the response
                        JSONObject userJson = obj.getJSONObject("status");

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
                        startActivity(new Intent(getApplicationContext(), MainActivity.class));
                    } else {
                        Toast.makeText(getApplicationContext(), obj.getString("message"), Toast.LENGTH_SHORT).show();
                    }
                } catch (JSONException e) {
                    e.printStackTrace();
                    Toast.makeText(getApplicationContext(), "Register error"+e.toString(), Toast.LENGTH_SHORT).show();
                }
            }
        },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(getApplicationContext(), "Register error"+error.toString(), Toast.LENGTH_SHORT).show();
                    }
                }) {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("id",id);
                params.put("username", username);
                params.put("nim", nim);
                params.put("email", email);
                params.put("password", password);

                return params;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);
    }
}