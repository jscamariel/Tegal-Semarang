package com.example.dinusforum;

public class Data {
    private String username;
    private String id_thread;
    private String isi;
    private String nama_thread ;
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

    Data(String id_thread, String username, String nama_thread, String isi){
        this.setId_thread(id_thread);
        this.setUsername(username);
        this.setNama_thread(nama_thread);
        this.setIsi(isi);
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
