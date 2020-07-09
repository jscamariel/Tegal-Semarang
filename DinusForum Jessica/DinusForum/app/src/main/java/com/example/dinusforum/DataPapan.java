package com.example.dinusforum;

public class DataPapan {
    public String id;
    public String judul ;
    public String gambar;
    public String isi;

    public DataPapan(String id, String judul, String isi, String gambar) {
        this.id = id;
        this.judul = judul;
        this.isi = isi;
        this.gambar = gambar;
    }

    public String getId() {
        return id;
    }

    public String getIsi() {
        return isi;
    }

    public String getJudul() {
        return judul;
    }

    public String getGambar() {
        return gambar;
    }


    public void setId(String id) {
        this.id = id;
    }

    public void setIsi(String isi) {
        this.isi = isi;
    }

    public void setJudul(String judul) {
        this.judul = judul;
    }

    public void setGambar(String gambar) {
        this.gambar = gambar;
    }


}
