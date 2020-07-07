package com.example.dinusforum;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentTransaction;

import android.os.Bundle;
import android.view.MenuItem;
import android.widget.TextView;

import com.google.android.material.bottomnavigation.BottomNavigationView;

public class MainActivity extends AppCompatActivity {
    TextView welcome_name ;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        //welcome_name = findViewById(R.id.welcome);
        DataUser user = SharedPrefManager.getInstance(this).getDataUser();
        //welcome_name.setText("Welcome: "+user.getUsername());
        BottomNavigationView bottomNav = findViewById(R.id.bottom_navigation);
        bottomNav.setOnNavigationItemSelectedListener(navListerner);


    }

    private BottomNavigationView.OnNavigationItemSelectedListener navListerner = new BottomNavigationView.OnNavigationItemSelectedListener() {
        @Override
        public boolean onNavigationItemSelected(@NonNull MenuItem item) {
            Fragment selectedFragment = null;

            switch (item.getItemId()){
                case R.id.nav_home:
                    selectedFragment = new HomeFragment();
                    break;
                case R.id.nav_MyAccount:
                    selectedFragment = new MyAccountFragment();
                    break;
                case R.id.nav_notification:
                    selectedFragment = new NotificationFragment();
                    break;
                case R.id.nav_posting:
                    selectedFragment = new PostingFragment();
                    break;
                case R.id.nav_search:
                    selectedFragment = new SearchFragment();
                    break;


            }

            getSupportFragmentManager().beginTransaction().replace(R.id.fragment_container,selectedFragment).commit();

            return true;
        }
    };
}
