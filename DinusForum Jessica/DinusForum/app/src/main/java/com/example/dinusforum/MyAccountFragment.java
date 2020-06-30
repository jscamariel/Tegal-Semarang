package com.example.dinusforum;

import android.content.Context;
import android.os.Bundle;

import androidx.fragment.app.Fragment;

import android.text.InputType;
import android.util.Log;
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
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.ServerError;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.HttpHeaderParser;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.androidnetworking.AndroidNetworking;
import com.androidnetworking.common.Priority;
import com.androidnetworking.error.ANError;
import com.androidnetworking.interfaces.JSONObjectRequestListener;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.UnsupportedEncodingException;
import java.util.HashMap;
import java.util.Map;


/**
 * A simple {@link Fragment} subclass.
 */
public class MyAccountFragment extends Fragment {

    private Button logout;
    private Button edit_profile;
    private EditText show_nim;
    private EditText show_username;
    private EditText show_password;
    private EditText show_email;
    String nim, username, password, email ;
    private View view;

    public MyAccountFragment() {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment

        view = inflater.inflate(R.layout.fragment_my_account, container, false);

        logout = (Button) view.findViewById(R.id.logout);
        edit_profile = (Button) view.findViewById(R.id.edit_profile);
        show_nim = (EditText) view.findViewById(R.id.edit_nim);
        show_username= (EditText) view.findViewById(R.id.edit_username);
        show_password= (EditText) view.findViewById(R.id.edit_password);
        show_email= (EditText) view.findViewById(R.id.edit_email);
        DataUser user = SharedPrefManager.getInstance(getActivity()).getDataUser();
        AndroidNetworking.initialize(getActivity());

        show_nim.setEnabled(false);

        show_nim.setText(""+user.getNim());
        show_username.setText(""+user.getUsername());
        show_password.setInputType(InputType.TYPE_CLASS_TEXT | InputType.TYPE_TEXT_VARIATION_PASSWORD);
        show_password.setText(""+user.getPassword());
        show_email.setText(""+user.getEmail());

        logout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                SharedPrefManager.getInstance(getActivity()).logout();
            }
        });

        edit_profile.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //username=show_username.getText().toString();
                //password=show_password.getText().toString();
                //email=show_email.getText().toString();

                editProfile();
            }
        });
        return view;
    }
    public void editProfile(){
        AndroidNetworking.put(DbContract.SERVER_USER_URL)
                .addBodyParameter("nim",show_nim.getText().toString())
                .addBodyParameter("username",show_username.getText().toString())
                .addBodyParameter("password", show_password.getText().toString())
                .addBodyParameter("email", show_email.getText().toString())
                .setTag("edit")
                .setPriority(Priority.MEDIUM)
                .build()
                .getAsJSONObject(new JSONObjectRequestListener() {
                    @Override
                    public void onResponse(JSONObject response) {
                        // do anything with response
                        try {
                            if(response.getString("status").equals("true") ){
                                Toast.makeText(getActivity(), "Data berhasil di update..."
                                        ,Toast.LENGTH_LONG).show();

                            }else {
                                Toast.makeText(getActivity(), "Data gagal di update!"
                                        ,Toast.LENGTH_LONG).show();
                            }
                        }catch (JSONException e){
                            Toast.makeText(getActivity(), "Kesalahan update, Kode 1"
                                    ,Toast.LENGTH_LONG).show();
                        }
                    }
                    @Override
                    public void onError(ANError error) {
                        // handle error
                        Log.d("ErrorEditDataUser",""+error.getErrorDetail());
                    }
                });
    }

}
