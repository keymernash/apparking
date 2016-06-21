$( document ).ready(function(){
	$(".button-collapse").sideNav();
	$(".dropdown-button").dropdown();   
	$('ul.tabs').tabs(); 
	$('select').material_select();
	$('.modal-trigger').leanModal();

	$(".parqueaderos").hide();
	$("#valet").change(function(){
	$(".parqueaderos").hide();
	    $("#parqueaderos_" + $(this).val()).show();
	});

	//Dibujar mapa y obtener coordenadas
	lat = "8.7552329";
	lng = "-75.8799528";
	var map;
	document.getElementById('latitud').value = 0;
	document.getElementById('longitud').value = 0;
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
		  icon: "./Public/image/marker2.png"
		});
		google.maps.event.addListener(marker, 'dragend', function(event) {
			var myLatLng = event.latLng;
			lat = myLatLng.lat();
			lng = myLatLng.lng();
			document.getElementById('latitud').value = [lat];
			document.getElementById('longitud').value = [lng];
		});
		marker.setMap(map);
	}
	google.maps.event.addDomListener(window, 'load', initialize);	
	
}) 