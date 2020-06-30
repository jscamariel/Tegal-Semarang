package com.example.dinusforum;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import java.util.ArrayList;
import java.util.List;

public class CommentRecyclerAdapter extends RecyclerView.Adapter<CommentRecyclerAdapter.CommentViewHolder> {

    private Context mContext;
    private ArrayList<Comment> mData;

    public CommentRecyclerAdapter(Context mContext, ArrayList<Comment> mData) {
        this.mContext = mContext;
        this.mData = mData;
    }

    @NonNull
    @Override
    public CommentRecyclerAdapter.CommentViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View row = LayoutInflater.from(mContext).inflate(R.layout.activity_comment_recycler_adapter,parent,false);
        return new CommentViewHolder(row);
    }

    @Override
    public void onBindViewHolder(CommentRecyclerAdapter.CommentViewHolder holder, int position) {

        //Glide.with(mContext).load(mData.get(position).getUimg()).into(holder.img_user);
        mData.get(position).getId_komentar();
        mData.get(position).getId_thread();
        mData.get(position).getNama_thread();

        holder.tv_username.setText(mData.get(position).getUsername());
        holder.tv_comment.setText(mData.get(position).getIsi_komentar());

    }

    @Override
    public int getItemCount() {
        return mData.size();
    }

    public class CommentViewHolder extends RecyclerView.ViewHolder{

        TextView tv_username, tv_comment;

        public CommentViewHolder(View itemView) {
            super(itemView);
            tv_username = itemView.findViewById(R.id.tv_username);
            tv_comment = itemView.findViewById(R.id.tv_comment);
        }
    }


}