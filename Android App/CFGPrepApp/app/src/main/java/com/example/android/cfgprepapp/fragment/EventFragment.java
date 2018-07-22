package com.example.android.cfgprepapp.fragment;


import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.webkit.WebView;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import com.example.android.cfgprepapp.EventDetail;
import com.example.android.cfgprepapp.R;
import com.example.android.cfgprepapp.RegisterActivity;
import com.example.android.cfgprepapp.UserListActivity;
import com.example.android.cfgprepapp.UserProfileActivity;
import com.example.android.cfgprepapp.adapter.UserListAdapter;
import com.example.android.cfgprepapp.data.HttpHandler;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

/**
 * A simple {@link Fragment} subclass.
 */
public class EventFragment extends Fragment implements UserListAdapter.UserListAdapterOnClickHandler {
    String [][] UserListData = new String[1000][9];

    private TextView mErrorMessageDisplay;
    private ProgressBar mLoadingIndicator;
    private RecyclerView mRecyclerView;

    private UserListAdapter mUserListAdapter;

    String ipadd,url,headurl;
    int count=0;


    public EventFragment() {
        // Required empty public constructor
    }

    public static EventFragment newInstance() {
        EventFragment fragment = new EventFragment();
        return fragment;
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        View view= inflater.inflate(R.layout.fragment_event, container, false);
        mRecyclerView = (RecyclerView)view.findViewById(R.id.recycler_user_list);
        mErrorMessageDisplay = (TextView) view.findViewById(R.id.error_mess);
        mLoadingIndicator = (ProgressBar) view.findViewById(R.id.loadbar);


        mRecyclerView = (RecyclerView)view.findViewById(R.id.recycler_user_list);
        mErrorMessageDisplay = (TextView) view.findViewById(R.id.error_mess);
        mLoadingIndicator = (ProgressBar) view.findViewById(R.id.loadbar);

        LinearLayoutManager layoutManager
                = new LinearLayoutManager(getActivity(), LinearLayoutManager.VERTICAL, false);

        //Setting Recycler Views Layout and Adapter
        mRecyclerView.setLayoutManager(layoutManager);
        mRecyclerView.setHasFixedSize(true);
        mUserListAdapter = new UserListAdapter(this);
        mRecyclerView.setAdapter(mUserListAdapter);

        showUserListView();

        new EventFragment.UserListTask().execute();

        return view;
    }

    @Override
    public void onClick(String lat,String longi,String phone,String event_id) {
        //Starting a new Activity to show user profile
        Intent intent=new Intent(getActivity(),EventDetail.class);
        intent.putExtra("lat",lat);
        intent.putExtra("longi",longi);
        intent.putExtra("phone",phone);
        intent.putExtra("event_id",event_id);
        startActivity(intent);
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

        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            mLoadingIndicator.setVisibility(View.VISIBLE);

        }

        @Override
        protected Void doInBackground(String... strings) {

            ipadd = getString(R.string.ipadd);
            HttpHandler sh = new HttpHandler();
            url = "/CFGAPI/userlist.php";
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
                        String foodname = c.getString("foodname");
                        String quantity=c.getString("quantity");
                        String fresh=c.getString("fresh");
                        String user_id=c.getString("user_id");
                        //String donor=c.getString("donor");
                        Log.d("Msg",String.valueOf(c.getString("user_id")));
                        UserListData[i][0]=user_id;
                        UserListData[i][1]=foodname;
                        UserListData[i][2]=quantity;
                        UserListData[i][3]=fresh;
                        UserListData[i][4]=c.getString("latitude");
                        UserListData[i][5]=c.getString("longitude");
                        UserListData[i][6]=c.getString("phone");
                        UserListData[i][7]=c.getString("id");
                        UserListData[i][8]=c.getString("donar_name");
                        Log.d("msg",fresh);
                        count++;
                    }
                } catch (final JSONException e) {
                    Log.e(TAG, "Json parsing error: " + e.getMessage());
                    getActivity().runOnUiThread(new Runnable() {
                        @Override
                        public void run() {
                            Toast.makeText(getActivity(),
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
                mUserListAdapter.setUserListData(UserListData,count);
            }else {
                showErrorMessage();
            }
        }

    }

}
