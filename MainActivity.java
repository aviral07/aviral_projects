package com.example.weather_app_aviral;

import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

import org.json.JSONArray;
import org.json.JSONObject;


import android.os.AsyncTask;
import android.os.Bundle;
import android.app.Activity;
import android.util.Log;
import android.view.Menu;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

public class MainActivity extends Activity {
	 Button show;
	class WeatherInfo extends AsyncTask<String,Void,String>{
		
		
	@Override
	protected String doInBackground(String... params) {
		try{
		
			URL url=new URL(params[0]);
			HttpURLConnection connection=(HttpURLConnection)url.openConnection();
			connection.connect();
			InputStream is=connection.getInputStream();
			InputStreamReader reader=new InputStreamReader(is);
			int data=reader.read();
			String apiDetails="";
			char current;
			
			while(data!=-1){
				current=(char)data;
				apiDetails +=current;
				data=reader.read();
			}
			
			return apiDetails;
		}catch(Exception e){
			e.printStackTrace();
		}
		return null;
	}
	}
	public void getWeatherInfo(View view){
		
	}
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
		show =(Button) findViewById(R.id.btn1);
		show.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View v) {
				WeatherInfo weatherInfo=new WeatherInfo();
				
				EditText cityName=(EditText)findViewById(R.id.cityEditText);
				TextView  weatherTextView=(TextView)findViewById(R.id.weatherTextView);
				try{
					String weatherApiDetails= weatherInfo.execute("http://api.openweathermap.org/data/2.5/weather?q="
							+ cityName.getText().toString()+"&appid=6759e8e1a6f8e3cbb0267f3b7283202b").get();
				  Log.i("Weather Api Info",weatherApiDetails);
				  
				  JSONObject jsonObject=new JSONObject(weatherApiDetails);
				  
				  String weather=jsonObject.getString("weather");
			    JSONObject subobj=jsonObject.getJSONObject("main");
				  Log.i("weather details",weather);
				  //Log.i("weather details",temp);
				  JSONArray array=new JSONArray(weather);
				  //JSONArray array1=new JSONArray(temp);
				  String main="";
				  String description="";
				  //int temp_min = 0;
				  String temp = subobj.getString("temp");
				  String humidity = subobj.getString("humidity");
				  for(int i=0;i<array.length();i++){
					  JSONObject arrayObject=array.getJSONObject(i);
					  main=arrayObject.getString("main");
					  description=arrayObject.getString("description");
				  }
				 /* for(int i=0;i<array1.length();i++){
					  JSONObject arrayObject=array1.getJSONObject(i);
					  temp_min=arrayObject.getInt("temp_min");
					 
				  }*/
				  double t1=Double.parseDouble(temp);  
				  double t2=t1-273.15;
				  weatherTextView.setText("Main:"+ main+"\n" + "Desc :" +description+"\n"+"Temp:" +t2+"°C"+"\n" + "Humidity :" +humidity+"%");
				  
				  
				}catch(Exception e){
					e.printStackTrace();
					
				}
				// TODO Auto-generated method stub
				
			}
		});
		
		
		
	}
}
