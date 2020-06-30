package com.example.dinusforum;

public class Comment {
    private int id_komentar;
    private int id_thread;
    private String username,nama_thread,isi_komentar;

    public Comment() {
    }

    public Comment(int id_komentar, int id_thread, String username, String nama_thread, String isi_komentar) {
        this.id_komentar = id_komentar;
        this.id_thread = id_thread;
        this.username = username;
        this.nama_thread = nama_thread;
        this.isi_komentar = isi_komentar;
    }

    public int getId_thread(){
        return  id_thread;
    }

    public void setId_thread(int id_thread){
        this.id_thread = id_thread;
    }

    public int getId_komentar() {
        return id_komentar;
    }

    public void setId_komentar(int id_komentar) {
        this.id_komentar = id_komentar;
    }

    public String getUsername() {
        return username;
    }

    public void setUsername(String username) {
        this.username = username;
    }

    public String getNama_thread() {
        return nama_thread;
    }

    public void setNama_thread(String nama_thread) {
        this.nama_thread=nama_thread;
    }

    public String getIsi_komentar() {
        return isi_komentar;
    }

    public void setIsi_komentar(String isi_komentar) {
        this.isi_komentar = isi_komentar;
    }

}
