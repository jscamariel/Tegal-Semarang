package com.example.dinusforum;

public class Data {
    public String username;
    public String id_thread;
    public String isi;
    public String nama_thread ;
    //timestamp

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

    public Data(String id_thread, String username, String nama_thread, String isi){
        this.id_thread = id_thread;
        this.username = username;
        this.nama_thread = nama_thread;
        this.isi = isi;
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
