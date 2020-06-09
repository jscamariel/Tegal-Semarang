package com.example.dinusforum;

import android.app.AlertDialog;
import android.app.Dialog;
import android.content.Context;
import android.content.DialogInterface;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.widget.EditText;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatDialogFragment;

public class UpdateDataDialog extends AppCompatDialogFragment {
    private EditText edit_nama_thread;
    private EditText edit_isi;
    private EditText edit_id_thread;
    private UpdateDataDialogListener listener;

    @Override
    public Dialog onCreateDialog(Bundle savedInstanceState) {
        AlertDialog.Builder builder = new AlertDialog.Builder(getActivity());
        LayoutInflater inflater = getActivity().getLayoutInflater();
        View view = inflater.inflate(R.layout.update_data_dialog, null);
        builder.setView(view)
                .setTitle("Update Data")
                .setNegativeButton("Cancel", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {

                    }
                })
                .setPositiveButton("Submit", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        String id_thread = edit_id_thread.getText().toString();
                        String nama_thread = edit_nama_thread.getText().toString();
                        String isi = edit_isi.getText().toString();
                        listener.update(id_thread, nama_thread, isi);

                    }
                });
        edit_id_thread = view.findViewById(R.id.edit_id_thread);
        edit_nama_thread = view.findViewById(R.id.edit_nama_thread);
        edit_isi = view.findViewById(R.id.edit_isi);
        return builder.create();
    }

    @Override
    public  void onAttach(Context context){
        super.onAttach(context);
        try {
            listener = (UpdateDataDialogListener) context;
        }catch (ClassCastException e){

        }
    }

    public interface UpdateDataDialogListener{
        void update(String id_thread, String nama_thread, String isi);
    }

}
