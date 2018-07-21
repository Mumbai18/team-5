package com.example.android.cfgprepapp.adapter;

import android.content.Context;
import android.os.AsyncTask;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.android.cfgprepapp.R;
import com.example.android.cfgprepapp.util.ImageUtil;
import com.example.android.cfgprepapp.view.cpb.CircularProgressButton;

public class UserListAdapter extends RecyclerView.Adapter<UserListAdapter.UserListAdapterViewHolder> {

    private String[][] mUserListData;
    private int mCount;

    //onClick Listener for each List Item
    private final UserListAdapterOnClickHandler mClickHandler;

    //Interface for onClickListener Functionality
    public interface UserListAdapterOnClickHandler {
        void onClick(String UserListID, String UserListName,String phone,String event_id);
    }

    //Constructor
    public UserListAdapter(UserListAdapterOnClickHandler clickHandler) {
        mClickHandler = clickHandler;
    }

    //View Holder Class
    public class UserListAdapterViewHolder extends RecyclerView.ViewHolder implements View.OnClickListener {
        public final TextView mFoodNew;
        public final TextView mUsername;
        CircularProgressButton follow_cbp;
        public final TextView mQuantity;
        public final TextView mFresh;


        public UserListAdapterViewHolder(View view) {
            super(view);
            mFoodNew = (TextView) view.findViewById(R.id.list_item_google_cards_social_uname);
            mUsername=(TextView)view.findViewById(R.id.list_item_google_cards_social_pdate);
            follow_cbp=(CircularProgressButton)view.findViewById(R.id.circular_progress_bar2);
            mQuantity=(TextView)view.findViewById(R.id.list_item_google_cards_social_forum_name);
            mFresh=(TextView)view.findViewById(R.id.list_item_google_cards_social_text);

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
                int adapterPosition = getAdapterPosition();
                String lat = mUserListData[adapterPosition][4];
                String longi=mUserListData[adapterPosition][5];
                String phone=mUserListData[adapterPosition][6];
                String event_id=mUserListData[adapterPosition][7];
                mClickHandler.onClick(lat, longi,phone,event_id);
            }
            else {
                //Opening the Profile of the user by passing user's id

            }
        }
    }

    @Override
    public UserListAdapterViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        //Inflating the ListItem Layout to the Parent Layout thus creating ViewHolder
        Context context = parent.getContext();
        int layoutIdForListItem = R.layout.list_item_google_cards_mainforum;
        LayoutInflater inflater = LayoutInflater.from(context);
        boolean shouldAttachToParentImmediately = false;
        View view = inflater.inflate(layoutIdForListItem, parent, shouldAttachToParentImmediately);

        return new UserListAdapterViewHolder(view);
    }

    @Override
    public void onBindViewHolder(UserListAdapterViewHolder holder, int position) {
        //Bind Data to the ViewHolder
        String user_id=mUserListData[position][0];
        String foodname=mUserListData[position][1];
        String quantity=mUserListData[position][2];
        String fresh=mUserListData[position][3];
        holder.mFoodNew.setText(foodname);
        holder.mUsername.setText("From User"+ user_id);
        holder.mQuantity.setText("Quantity: "+quantity+" Person");
        holder.mFresh.setText("Cooked "+fresh+" hrs before");
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
