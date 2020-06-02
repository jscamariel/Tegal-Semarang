package com.example.dinusforum;

import androidx.fragment.app.Fragment;

import android.content.Context;
import android.os.Bundle;
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
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;


/**
 * A simple {@link Fragment} subclass.
 */

public class MyAccountFragment extends Fragment {

    EditText editTextUsername;
    EditText editTextPassword;
    Button btnLogin;
    Context context;
    View view ;

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
                //userLogin(editTextUsername,editTextPassword);
            }
        });
        return  view;
    }

}
