package com.example.dinusforum;

public class DataUser {
    private int id;
    private String username, nim, email, password;

    public DataUser(int id, String username, String nim, String email, String password) {
        this.id = id;
        this.username = username;
        this.nim = nim;
        this.email = email;
        this.password = password;
    }

    public int getId() {
        return id;
    }

    public String getUsername() {
        return username;
    }

    public String getNim() {
        return nim;
    }

    public String getEmail() {
        return email;
    }

    public String getPassword() {
        return password;
    }

    public void setId(int id) {
        this.id = id;
    }

    public void setUsername(String username) {
        this.username = username;
    }

    public void setNim(String nim) {
        this.nim = nim;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public void setPassword(String password) {
        this.password = password;
    }
}
