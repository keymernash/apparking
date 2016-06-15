<!-- rincondelcodigo.com -->
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include('conexion.php');
?>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
  <link href="styles.css" rel="stylesheet">
</head>
<body>
      <?php 
        $lat = "8.7552329";
        $lng = "-75.8799528";
        $pos = "8.7552329,-75.8799528";
      ?>
      <div class='titular'>Capturar coordenadas</div>
      <div id='info'><?php echo $pos; ?></div>
      <input type="text" name="coordenada X"  id="x">
      <input type="text" name="coordenada Y"  id="y">
      <div id='googleMap'></div>
      <button type='submit' id='enviar' class='btn btn-alert'>Guardar</button><br>
      <div id='respuesta'></div>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
      lat = "<?php echo $lat; ?>" ;
      lng = "<?php echo $lng; ?>" ;
      var map;
      function initialize() {
        var myLatlng = new google.maps.LatLng(lat,lng);
        var mapOptions = {
          zoom: 16,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);
        var marker = new google.maps.Marker({
          position: myLatlng,
          draggable:true,
          animation: google.maps.Animation.DROP,
          web:"Localización geográfica!",
          icon: "marker.png"
        });
        google.maps.event.addListener(marker, 'dragend', function(event) {
          var myLatLng = event.latLng;
          lat = myLatLng.lat();
          lng = myLatLng.lng();
          document.getElementById('info').innerHTML = [
          lat,
          lng
          ].join(', ');
          document.getElementById('x').value = [lat];
          document.getElementById('y').value = [lng];
        });
        marker.setMap(map);
      }
      google.maps.event.addDomListener(window, 'load', initialize);
      $("#enviar").click(function() { 
        var url = "cargar.php";
        $("#respuesta").html('<img src="cargando.gif" />');
        $.ajax({
         type: "POST",
         url: url,
         data: 'lat=' + lat + '&lng=' + lng,
         success: function(data)
         {
           $("#respuesta").html(data);
         }
       });
      }); 
    });
</script>
</body>
</html>