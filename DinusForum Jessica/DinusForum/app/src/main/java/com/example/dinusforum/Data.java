package com.example.dinusforum;

import android.media.Image;

public class Data {
    public String username;
    public String id_thread;
    public String isi;
    public String nama_thread ;
    public String gambar;
    //timestamp

    public String getGambar(){
        return gambar;
    }

    public void setGambar(String gambar){
        this.gambar=gambar;
    }

    public String getUsername() {
        return username;
    }

    public String getId_thread() {
        return id_thread;
    }

    public String getIsi() {
        return isi;
    }

    public String getNama_thread() {
        return nama_thread;
    }

    public Data(String id_thread, String username, String nama_thread, String isi, String gambar){
        this.id_thread = id_thread;
        this.username = username;
        this.nama_thread = nama_thread;
        this.isi = isi;
        this.gambar = gambar;
    }

    public void setUsername(String username) {
        this.username = username;
    }

    public void setId_thread(String id_thread) {
        this.id_thread = id_thread;
    }

    public void setIsi(String isi) {
        this.isi = isi;
    }

    public void setNama_thread(String nama_thread) {
        this.nama_thread = nama_thread;
    }
}
