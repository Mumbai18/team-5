package com.example.android.cfgprepapp.fragment;


import android.annotation.SuppressLint;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageButton;

import com.example.android.cfgprepapp.R;
import com.example.android.cfgprepapp.util.SendMail;

/**
 * A simple {@link Fragment} subclass.
 */
public class ContactFragment extends Fragment implements View.OnClickListener{

    //Declaring EditText
    private EditText editTextEmail;
    private EditText editTextSubject;
    private EditText editTextMessage;

    //Send button
    private Button buttonSend;
    ImageButton ibCall;

    public ContactFragment() {
        // Required empty public constructor
    }

    public static ContactFragment newInstance() {
        ContactFragment fragment = new ContactFragment();
        return fragment;
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View view= inflater.inflate(R.layout.fragment_contact, container, false);

        ibCall=(ImageButton)view.findViewById(R.id.ibCall);
        editTextEmail = (EditText) view.findViewById(R.id.et_to);
        editTextSubject = (EditText) view.findViewById(R.id.et_sub);
        editTextMessage = (EditText) view.findViewById(R.id.et_msg);

        buttonSend = (Button) view.findViewById(R.id.btn_submit);

        //Adding click listener
        buttonSend.setOnClickListener(this);


        ibCall.setOnClickListener(new View.OnClickListener() {
            @SuppressLint("MissingPermission")
            @Override
            public void onClick(View view) {

                Intent i=new Intent(Intent.ACTION_CALL);
                i.setData(Uri.parse("tel:"+ "9821279741"));
                startActivity(i);

            }


        });

        return view;
    }


    private void sendEmail() {
        //Getting content for email
        String email = editTextEmail.getText().toString().trim();
        String subject = editTextSubject.getText().toString().trim();
        String message = editTextMessage.getText().toString().trim();
        String myemail="annadhanngo@gmail.com";

        //Creating SendMail object
        SendMail sm = new SendMail(getActivity(), myemail, subject, message);

        //Executing sendmail to send email
        sm.execute();

        String message1 = "Your feedback was succesfully taken";
        String message2 = "Your complain is :"+ message+"\n We will contact you shortly";
        SendMail sm1 = new SendMail(getActivity(), email ,message1, message2);

        //Executing sendmail to send email
        sm1.execute();

    }

    @Override
    public void onClick(View v) {
        sendEmail();
    }

}
