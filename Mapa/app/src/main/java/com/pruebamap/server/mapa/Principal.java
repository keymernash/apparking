package com.pruebamap.server.mapa;

import android.app.Activity;
import android.content.pm.PackageManager;
import android.os.AsyncTask;
import android.support.v4.app.ActivityCompat;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.Toast;

import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.SupportMapFragment;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.MarkerOptions;

import org.apache.http.NameValuePair;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.HttpClient;
import org.apache.http.client.ResponseHandler;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.BasicResponseHandler;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;


import java.io.IOException;
import java.io.UnsupportedEncodingException;
import java.util.ArrayList;
import java.util.List;
import java.util.regex.Pattern;

public class Principal extends AppCompatActivity implements OnMapReadyCallback {

    private GoogleMap mMap;

    EditText Latitud ,Longitud;
    Button Insert, p;
    HttpClient cliente;
    HttpPost post;
    List<NameValuePair> listnvp;
    List<Datos> listaDatos = null;
    List<String> item = null;
    ListView lista;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_principal);
        // Obtain the SupportMapFragment and get notified when the map is ready to be used.
        SupportMapFragment mapFragment = (SupportMapFragment) getSupportFragmentManager()
                .findFragmentById(R.id.mapa);
        mapFragment.getMapAsync(this);


        Latitud = (EditText) findViewById(R.id.editText_Latitud);
        Longitud = (EditText) findViewById(R.id.editText_Longitud);
        Insert = (Button) findViewById(R.id.button_Insertar);

        lista = (ListView) findViewById(R.id.listView_Lista);
        item = new ArrayList<String>();



        Insert.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if(Latitud.getText().toString().equals("")){
                    Toast.makeText(Principal.this, "Ingrese los datos", Toast.LENGTH_LONG).show();
                    Latitud.requestFocus();
                }else{
                    if(Longitud.getText().toString().equals("")){
                        Toast.makeText(Principal.this, "Ingrese los datos", Toast.LENGTH_LONG).show();
                        Longitud.requestFocus();
                    }else{
                        new EnviarDatos(Principal.this).execute();
                    }
                }
            }
        });
        new Mostrar().execute();

    }

    private boolean enviarDatos(){
        cliente = new DefaultHttpClient();
        post = new HttpPost("http://apparking.dvloper.co/insertArchivos.php");
        listnvp = new ArrayList<NameValuePair>(2);
        listnvp.add(new BasicNameValuePair("latitud",Latitud.getText().toString().trim()));
        listnvp.add(new BasicNameValuePair("longitud",Longitud.getText().toString().trim()));
        try {
             post.setEntity(new UrlEncodedFormEntity(listnvp));
            cliente.execute(post);
            return true;
        } catch (UnsupportedEncodingException e){
            e.printStackTrace();
        } catch (ClientProtocolException e){
            e.printStackTrace();
        } catch (IOException e){
            e.printStackTrace();
        }
        return  false;
    }

    class EnviarDatos extends AsyncTask<String,String,String>{

        private Activity context;
        EnviarDatos (Activity context){
                this.context=context;
        }

        @Override
        protected String doInBackground(String... params) {
            if(enviarDatos()){
                context.runOnUiThread(new Runnable() {
                    @Override
                    public void run() {
                        Toast.makeText(context, "Datos Enviados con éxito", Toast.LENGTH_LONG).show();

                        Latitud.setText("");
                        Longitud.setText("");
                        new Mostrar().execute();
                    }
                });
            }else{
                context.runOnUiThread(new Runnable() {
                    @Override
                    public void run() {
                        Toast.makeText(context, "Datos No enviados", Toast.LENGTH_LONG).show();
                    }
                });
            }

            return null;
        }
    }

    private String obtenerDatos(){
        String resquest="";
        HttpClient httpclient;
        HttpPost httppost;
        httpclient = new DefaultHttpClient();
        httppost = new HttpPost("http://apparking.dvloper.co/SelectDatos.php");
        try{
            ResponseHandler<String> responseHandler = new BasicResponseHandler();
            resquest = httpclient.execute(httppost, responseHandler);

        } catch (UnsupportedEncodingException e){
            e.printStackTrace();
        }catch (ClientProtocolException e){
            e.printStackTrace();
        } catch (IOException e){
            e.printStackTrace();
        }
        return resquest;
    }

    private boolean filtrarDatos(){
        listaDatos = new ArrayList<Datos>();
        listaDatos.clear();
        if (!obtenerDatos().equalsIgnoreCase("")) {

            String cargarDatos,patron;
            cargarDatos = obtenerDatos();
            patron = "/";
            //clase de expresiones regularer
            Pattern p =Pattern.compile(patron);
            String[] items = p.split(cargarDatos);
            for (int i =  0; i < items.length; i++){
                Datos objDatos = new Datos();
                objDatos.setVarLL(items[i]);

                listaDatos.add(objDatos);
            }
            return true;

        }
        return false;
    }


    private void agregarDatos(){
        runOnUiThread(new Runnable() {
            @Override
            public void run() {
                item.clear();;
                String var;
                for (int j = 0; j < listaDatos.size(); j++){
                    Datos datos = listaDatos.get(j);
                    var = datos.getVarLL();
                    item.add(var);
                }
                mostrarDatos();
            }
        });
    }


    private void mostrarDatos(){
        ArrayAdapter<String> adaptador =
                new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1, item);
        lista.setAdapter(adaptador);
    }

    class Mostrar extends AsyncTask<String,String,String>{

        @Override
        protected String doInBackground(String... params) {
            if(filtrarDatos())
                agregarDatos();
            return null;
        }
    }

    @Override
    public void onMapReady(GoogleMap googleMap) {

        mMap = googleMap;

        //ArrayList<String> nArrayList = new ArrayList<String>();
        //nArrayList.add(1, "8.894499");
        //nArrayList.add(2, "-75.783827");

       /* String array[] = new String[item.size()];
        for(int j =0;j<item.size();j++){
            array[j] = item.get(j);
        }*/

        double lat = 8.894499;
        double lon = -75.783827;
       // double lat = Double.parseDouble("8.894499");
       // double lon = Double.parseDouble(array[1]);
        // Add a marker in Sydney and move the camera
        LatLng sydney = new LatLng(lat, lon);
        mMap.addMarker(new MarkerOptions().position(sydney).title("Parqueadero N° 1"));
        mMap.moveCamera(CameraUpdateFactory.newLatLng(sydney));

        if (ActivityCompat.checkSelfPermission(this, android.Manifest.permission.ACCESS_FINE_LOCATION) != PackageManager.PERMISSION_GRANTED && ActivityCompat.checkSelfPermission(this, android.Manifest.permission.ACCESS_COARSE_LOCATION) != PackageManager.PERMISSION_GRANTED) {
            // TODO: Consider calling
            //    ActivityCompat#requestPermissions
            // here to request the missing permissions, and then overriding
            //   public void onRequestPermissionsResult(int requestCode, String[] permissions,
            //                                          int[] grantResults)
            // to handle the case where the user grants the permission. See the documentation
            // for ActivityCompat#requestPermissions for more details.
            return;
        }
        mMap.setMyLocationEnabled(true);
    }
}
