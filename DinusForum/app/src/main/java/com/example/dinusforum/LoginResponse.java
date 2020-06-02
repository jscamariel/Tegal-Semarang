package com.example.dinusforum;

public class LoginResponse {
    private boolean status;
    private String message;
    private User response;

    public LoginResponse(boolean status, String message, User response) {
        this.status = status;
        this.message = message;
        this.response = response;
    }

    public boolean isStatus() {
        return status;
    }

    public String getMessage() {
        return message;
    }

    public User getResponse() {
        return response;
    }
}
