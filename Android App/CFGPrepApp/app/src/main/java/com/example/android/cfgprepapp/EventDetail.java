package com.example.android.cfgprepapp;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.example.android.cfgprepapp.data.HttpHandler;
import com.example.android.cfgprepapp.view.cpb.CircularProgressButton;
import com.google.firebase.messaging.FirebaseMessaging;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class EventDetail extends AppCompatActivity implements View.OnClickListener{

    private WebView wv1;
    String event_id;
    private EventDetail.UpdateTask mUpdateTask=null;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_event_detail);
        wv1=(WebView)findViewById(R.id.webView);
        wv1.setWebViewClient(new MyBrowser());
        wv1.getSettings().setLoadsImagesAutomatically(true);
        wv1.getSettings().setJavaScriptEnabled(true);
        wv1.setScrollBarStyle(View.SCROLLBARS_INSIDE_OVERLAY);
        Intent intent=new Intent();
        Bundle b=getIntent().getExtras();
        String lat=(String)b.get("lat");
        String longi=(String)b.get("longi");
        String phone=(String)b.get("phone");
        event_id=(String)b.get("event_id");
        String mapurl="http://"+getString(R.string.ipadd)+"/CFGAPI/mapmarker.php?lat="+lat+"&longi="+longi;
        Log.d("msg",mapurl);
        wv1.loadUrl(mapurl);

        TextView phoneNo=(TextView)findViewById(R.id.list_item_google_cards_social_forum_name);
        phoneNo.setText("Phone No:"+phone);

        Button cpb=(CircularProgressButton)findViewById(R.id.circular_progress_bar2);
        cpb.setOnClickListener(this);
    }

    @Override
    public void onClick(View v) {
        mUpdateTask = new UpdateTask(event_id);
        mUpdateTask.execute();
    }

    private class MyBrowser extends WebViewClient {
        @Override
        public boolean shouldOverrideUrlLoading(WebView view, String url) {
            view.loadUrl(url);
            return true;
        }
    }

    public class UpdateTask extends AsyncTask<Void, Void, Boolean> {

        private final String mEvent_id;
        String jsonStr;
        JSONObject jsonObj = null;

        UpdateTask(String event_id) {
            mEvent_id=event_id;
        }

        @Override
        protected Boolean doInBackground(Void... params) {
            // TODO: attempt authentication against a network service.

            HttpHandler sh = new HttpHandler();
            String ipadd = getResources().getString(R.string.ipadd);
            String url = "/CFGAPI/eventcollect.php";
            String headurl = "http://";
            url=headurl+ipadd+url;
            Log.d("url",url);

            //Creating a Hashmap for storing parameters for POST Method.
            HashMap<String, String> postparam = new HashMap<>();

            // adding each child node to HashMap key => value
            postparam.put("event_id", mEvent_id);
            for (Map.Entry<String,String> entry : postparam.entrySet()) {
                String key = entry.getKey();
                String value = entry.getValue();
                //Log.e(key,value);
            }

            // Making a request to url and getting response
            jsonStr = sh.makeServiceCallPost(url,postparam);
            Log.d("Debugg(LoginAct)", "Response from url: " + jsonStr); //The Output of First Page

            //JSON Parsing
            if (jsonStr != null) {

                String resp="";
                try {
                    jsonObj = new JSONObject(jsonStr);
                    //Log.e("doInBackgroundl", jsonObj.getString("status"));
                    resp=jsonObj.getString("status");

                } catch (final JSONException e) {
                    Log.e("Error", "Json parsing error: " + e.getMessage());
                    runOnUiThread(new Runnable() {
                        @Override
                        public void run() {
                            Toast.makeText(EventDetail.this,
                                    "Json parsing error: " + e.getMessage(),
                                    Toast.LENGTH_LONG)
                                    .show();
                        }
                    });
                }
                if(resp.equals("1"))
                {
                    //If Status Returned true then login is successful
                    return true;
                }

            } else {
                Log.e("Error", "Couldn't get json from server.");
                runOnUiThread(new Runnable() {
                    @Override
                    public void run() {
                        Toast.makeText(EventDetail.this,
                                "Couldn't get json from server. Check LogCat for possible errors!",
                                Toast.LENGTH_LONG)
                                .show();

                    }
                });
            }

            //If Status returned false then login error
            return false;
        }

        @Override
        protected void onPostExecute(final Boolean success) {
            mUpdateTask = null;

            if (success) {
                //JSON Data
                JSONObject Data=null;

                Intent intent =new Intent(EventDetail.this, RegisterActivity.class);
                startActivity(intent);
                finish();

            } else {
                //Error no data found
            }
        }

        @Override
        protected void onCancelled() {
            mUpdateTask = null;
        }
    }
}
