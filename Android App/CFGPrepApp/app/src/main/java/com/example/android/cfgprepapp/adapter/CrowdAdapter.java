package com.example.android.cfgprepapp.adapter;

import android.content.Context;
import android.media.Image;
import android.os.AsyncTask;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.webkit.WebView;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.android.cfgprepapp.EventDetail;
import com.example.android.cfgprepapp.R;
import com.example.android.cfgprepapp.util.ImageUtil;
import com.example.android.cfgprepapp.view.cpb.CircularProgressButton;

public class CrowdAdapter extends RecyclerView.Adapter<CrowdAdapter.CrowdAdapterViewHolder> {

    private String[][] mUserListData;
    private int mCount;

    //onClick Listener for each List Item
    private final CrowdAdapterOnClickHandler mClickHandler;

    //Interface for onClickListener Functionality
    public interface CrowdAdapterOnClickHandler {
        void onClick(String lati, String longi);
    }

    //Constructor
    public CrowdAdapter(CrowdAdapterOnClickHandler clickHandler) {
        mClickHandler = clickHandler;
    }

    //View Holder Class
    public class CrowdAdapterViewHolder extends RecyclerView.ViewHolder implements View.OnClickListener {
        CircularProgressButton follow_cbp;
        public final TextView mName;
        public final ImageView mImage;

        public CrowdAdapterViewHolder(View view) {
            super(view);
            mName=(TextView)view.findViewById(R.id.list_item_google_cards_social_forum_name);
            follow_cbp=(CircularProgressButton)view.findViewById(R.id.circular_progress_bar2);
            mImage=(ImageView)view.findViewById(R.id.list_item_google_cards_social_image);
            //Set onclick listener to the elements you want to make clickable
            view.setOnClickListener(this);
            follow_cbp.setOnClickListener(this);
        }

        @Override
        public void onClick(View v) {
            if(v instanceof CircularProgressButton)
            {
                //Code for Follow Button
                /*if(((CircularProgressButton) v).getText().toString().equals("Follow"))
                    new FalseProgress((CircularProgressButton) v,1).execute(100);
                else {
                    new FalseProgress((CircularProgressButton) v, 0).execute(0);
                }*/
                Log.d("msg","Clicked");
                int adapterPosition = getAdapterPosition();
                String lat = mUserListData[adapterPosition][0];
                String longi=mUserListData[adapterPosition][1];
                mClickHandler.onClick(lat, longi);
            }
            else {
                //Opening the Profile of the user by passing user's id

            }
        }
    }

    @Override
    public CrowdAdapterViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        //Inflating the ListItem Layout to the Parent Layout thus creating ViewHolder
        Context context = parent.getContext();
        int layoutIdForListItem = R.layout.list_item_google_cards_mainforum2;
        LayoutInflater inflater = LayoutInflater.from(context);
        boolean shouldAttachToParentImmediately = false;
        View view = inflater.inflate(layoutIdForListItem, parent, shouldAttachToParentImmediately);

        return new CrowdAdapterViewHolder(view);
    }

    @Override
    public void onBindViewHolder(CrowdAdapterViewHolder holder, int position) {
        //Bind Data to the ViewHolder
        String lat=mUserListData[position][0];
        String longi=mUserListData[position][1];
        holder.mName.setText("Needy People 1"+lat+" "+longi);
        ImageUtil.displayImage(holder.mImage, "http://192.168.43.156/CFGAPI/CFGApp/needy.jpg", null);
    }

    @Override
    public int getItemCount() {
        if (null == mUserListData) return 0;
        return mCount;
    }

    public void setUserListData(String[][] Data,int count) {
        mUserListData = Data;
        mCount=count;
        notifyDataSetChanged();
    }


    //Code for Circular Button Click Listener
    private class FalseProgress extends AsyncTask<Integer, Integer, Integer> {

        private CircularProgressButton cpb;
        private int mode;

        public FalseProgress(CircularProgressButton cpb,int mode) {
            this.cpb = cpb;
            this.mode=mode;
        }

        @Override
        protected Integer doInBackground(Integer... params) {
            if(mode==1) {
                for (int progress = 0; progress < 100; progress += 5) {
                    publishProgress(progress);
                    try {
                        Thread.sleep(100);
                    } catch (InterruptedException e) {
                        e.printStackTrace();
                    }
                }
            }
            else {
                try {
                    Thread.sleep(100);
                }
                catch (InterruptedException e) {
                    e.printStackTrace();
                }
            }

            //Will Return value passed from execute function
            return params[0];
        }

        @Override
        protected void onPostExecute(Integer result) {
            cpb.setProgress(result);
        }

        @Override
        protected void onProgressUpdate(Integer... values) {
            int progress = values[0];
            cpb.setProgress(progress);
        }
    }
}
