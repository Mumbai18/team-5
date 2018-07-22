package com.example.android.cfgprepapp;

import android.content.Intent;
import android.net.Uri;
import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.View;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import com.example.android.cfgprepapp.adapter.CrowdAdapter;
import com.example.android.cfgprepapp.adapter.CrowdAdapter;
import com.example.android.cfgprepapp.data.HttpHandler;
import com.example.android.cfgprepapp.CrowdList;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

public class CrowdList extends AppCompatActivity implements CrowdAdapter.CrowdAdapterOnClickHandler {

    String [][] UserListData = new String[1000][3];

    private TextView mErrorMessageDisplay;
    private ProgressBar mLoadingIndicator;
    private RecyclerView mRecyclerView;

    private CrowdAdapter mCrowdAdapter;

    UserListTask userListTask=null;

    String ipadd,url,headurl;
    int count=0;
    String lat,longi;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_crowd_list);

        Intent intent=new Intent();
        Bundle b=getIntent().getExtras();
        lat=(String)b.get("lat");
        longi=(String)b.get("longi");

        mRecyclerView = (RecyclerView)findViewById(R.id.recycler_user_list);
        mErrorMessageDisplay = (TextView) findViewById(R.id.error_mess);
        mLoadingIndicator = (ProgressBar) findViewById(R.id.loadbar);


        mRecyclerView = (RecyclerView)findViewById(R.id.recycler_user_list);
        mErrorMessageDisplay = (TextView) findViewById(R.id.error_mess);
        mLoadingIndicator = (ProgressBar)findViewById(R.id.loadbar);

        LinearLayoutManager layoutManager
                = new LinearLayoutManager(CrowdList.this, LinearLayoutManager.VERTICAL, false);

        //Setting Recycler Views Layout and Adapter
        mRecyclerView.setLayoutManager(layoutManager);
        mRecyclerView.setHasFixedSize(true);
        mCrowdAdapter = new CrowdAdapter((CrowdAdapter.CrowdAdapterOnClickHandler) this);
        mRecyclerView.setAdapter(mCrowdAdapter);

        showUserListView();

        userListTask=new UserListTask(lat,longi);
        userListTask.execute();

    }

    @Override
    public void onClick(String lat,String longi) {
        Toast.makeText(CrowdList.this,"Hii",Toast.LENGTH_SHORT).show();
        Intent intent = new Intent(android.content.Intent.ACTION_VIEW,
                Uri.parse("http://maps.google.com/maps?saddr=19.180,72.831&daddr="+lat+","+longi));
        startActivity(intent);
        //Intent intent =new Intent(CrowdList.this, RegisterActivity.class);
        //startActivity(intent);
    }



    private void showUserListView() {
        /* First, make sure the error is invisible */
        mErrorMessageDisplay.setVisibility(View.INVISIBLE);
        /* Then, make sure the weather data is visible */
        mRecyclerView.setVisibility(View.VISIBLE);
    }

    private void showErrorMessage() {
        /* First, hide the currently visible data */
        mRecyclerView.setVisibility(View.INVISIBLE);
        /* Then, show the error */
        mErrorMessageDisplay.setVisibility(View.VISIBLE);
    }

    private class UserListTask extends AsyncTask<String, Void, Void> {

        private static final String TAG = "Msg";
        String mLat;
        String mLong;

        UserListTask(String lat,String longi){
            mLat=lat;
            mLong=longi;
        }
        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            mLoadingIndicator.setVisibility(View.VISIBLE);
        }

        @Override
        protected Void doInBackground(String... strings) {

            ipadd = getString(R.string.ipadd);
            HttpHandler sh = new HttpHandler();
            url = "/CFGAPI/location.php?lat="+mLat+"&long="+mLong;
            headurl = "http://";
            url=headurl+ipadd+url;
            Log.e("url",url);

            // Making a request to url and getting response
            String jsonStr = sh.makeServiceCall(url);

            Log.e(TAG, "Response from url: " + jsonStr); //The Output of First Page

            if (jsonStr != null) {
                try {
                    JSONArray names = new JSONArray(jsonStr);
                    for (int i = 0; i < names.length(); i++) {
                        JSONObject c = names.getJSONObject(i);
                        String lat1 = c.getString("Latitude");
                        String long1=c.getString("Longitude");
                        UserListData[i][0]=lat1;
                        UserListData[i][1]=long1;
                        count++;
                    }
                } catch (final JSONException e) {
                    Log.e(TAG, "Json parsing error: " + e.getMessage());
                    runOnUiThread(new Runnable() {
                        @Override
                        public void run() {
                            Toast.makeText(CrowdList.this,
                                    "Json parsing error: " + e.getMessage(),
                                    Toast.LENGTH_LONG)
                                    .show();
                        }
                    });

                }
            } else {
                Log.e(TAG, "Couldn't get json from server.");
            }
            return null;
        }

        @Override
        protected void onPostExecute(Void result) {
            super.onPostExecute(result);

            mLoadingIndicator.setVisibility(View.INVISIBLE);
            showUserListView();

            if(count>0) {
                //Call the Recycler View Adapter
                mCrowdAdapter.setUserListData(UserListData,count);
            }else {
                showErrorMessage();
            }
        }

    }
}
