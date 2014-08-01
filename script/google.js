var google_map=(function(){ 

    function init(){
    	directionsService = new google.maps.DirectionsService();
    	directionsDisplay = new google.maps.DirectionsRenderer();
    	google.maps.event.addDomListener(window, 'load', initialize);
    }
   
	function initialize() {

		var mapOptions = {
		  zoom: 10,
		  center: new google.maps.LatLng(45.5086, -73.5539)
		};
		var map = new google.maps.Map(map_canvas, mapOptions);
		directionsDisplay.setMap(map);
		directionsDisplay.setPanel(document.getElementById('directions-panel'));
	}

	function calcRoute(commande_zip, restaurant_zip, current_place) {

		var request = {
		  origin: current_place,   //code postale du livreur
		  destination: commande_zip,  //code postale de la commande
		  waypoints: [{location: restaurant_zip}],	//le restaurant est un point intermédiaire dans la trajectoire
		  travelMode: google.maps.TravelMode.DRIVING
		};
		directionsService.route(request, function(response, status) {
		  if (status == google.maps.DirectionsStatus.OK) {
		    directionsDisplay.setDirections(response);
		  }
		});
	}

	function validation_calcRoute() {
		$('#route_de_livraison_error').html('');
		var commande_zip = $('#route_de_livraison_client').val();
		var restaurant_zip = $('#route_de_livraison_restaurant').val();
		var current_place = $('#route_de_livraison_livreur').val();
		var reg = new RegExp("([a-zA-Z]\\d){3}");	//validation du code postal
		if(commande_zip != '0' && restaurant_zip != '0' && reg.test(restaurant_zip)) {
			calcRoute(commande_zip, restaurant_zip, current_place);	
		} else {
			$('#route_de_livraison_error').html('Veuillez sélectionner une commande et insérer un code postal');
		}
	}

    return{
      init:init,
      initialize:initialize,
      calcRoute:calcRoute,
      validation_calcRoute:validation_calcRoute,
    }
  })();