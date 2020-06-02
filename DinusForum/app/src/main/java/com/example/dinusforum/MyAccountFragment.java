package com.example.dinusforum;

import android.content.Context;
import android.content.Intent;
import android.nfc.Tag;
import android.os.Bundle;

import androidx.fragment.app.Fragment;

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

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;


/**
 * A simple {@link Fragment} subclass.
 */

public class MyAccountFragment extends Fragment {

    EditText editTextUsername;
    EditText editTextPassword;
    Button btnLogin;
    Context context;
    View view ;

    public MyAccountFragment() {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        //inflater = LayoutInflater.from(requireParentFragment().getContext());

        // Inflate the layout for this fragment
        //AndroidNetworking.initialize(context);
        view =  inflater.inflate(R.layout.fragment_my_account, container, false);
        editTextUsername =  (EditText) view.findViewById(R.id.username);
        editTextPassword =  (EditText) view.findViewById(R.id.password);
        btnLogin = (Button) view.findViewById(R.id.login);
        btnLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                userLogin(editTextUsername,editTextPassword);
            }
        });


        return  view;
    }

    private void userLogin(EditText editTextUsername, EditText editTextPassword){
        AndroidNetworking.post("http://192.168.100.6/ci-dinus-forum/user/login")
                .addBodyParameter("username",editTextUsername.getText().toString())
                .addBodyParameter("password",editTextPassword.getText().toString())
                .setTag(context)
                .setPriority(Priority.HIGH)
                .build()
                .getAsJSONObject(new JSONObjectRequestListener() {
                    @Override
                    public void onResponse(JSONObject response) {
                        try{
                            Boolean status = response.getBoolean("status");
                            String message = response.getString("message");
                            if(status){
                                JSONArray ja = response.getJSONArray("response");
                                Log.d("username",ja.getJSONObject(0).getString("username"));
                                Log.d("email",ja.getJSONObject(0).getString("email"));
                                showMessage(message);
                            }else {
                                showMessage(message);
                            }
                        }catch (JSONException e){
                            e.printStackTrace();
                        }
                    }

                    @Override
                    public void onError(ANError anError) {

                    }
                });


    }

    private  void showMessage(String message){
        Toast.makeText(context,message,Toast.LENGTH_LONG).show();
    }
}
