package com.example.android.cfgprepapp;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;

public class SuperMainActivity extends AppCompatActivity {


    Button btnDonor,btnVolunteer,btnAdmin;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_super_main);

        //btnAdmin=(Button)findViewById(R.id.btnAdmin);
        btnDonor=(Button)findViewById(R.id.btnDonor);
        btnVolunteer=(Button)findViewById(R.id.btnVolunteer);


        btnDonor.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent i1 = new Intent(SuperMainActivity.this, DonorActivity.class);
                startActivity(i1);

            }
        });

        btnVolunteer.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i1 = new Intent(SuperMainActivity.this, LoginActivity.class);
                startActivity(i1);
            }
        });
    }
}
