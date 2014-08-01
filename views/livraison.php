<?php
	require_once('../partials/header.php');
?>
	<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
	<script>
		var socket = io('http://localhost:3000');
		socket.emit('getOrdersReady');
      	socket.on('ordersReady', function(data){
      		$('#orders').html('');
      		for (var i = 0; i < data.length; i++) {
      			date = data[i].date;
      			$('#orders').append('<tr id="order'+data[i].id+'"><td>'+data[i].id+'</td><td>'+data[i].no_confirmation+'</td><td>'+date.substring(0,10)+' : '+data[i].time+'</td><td><a href="javascript:app.livreur.afficher_commande_details('+data[i].id+','+data[i].restaurant_id+','+data[i].client_id+')" class="a-link">livrer</a></td></tr>');
      		};
  		});

      	socket.on('singleOrderReady', function(data){
      		for (var i = 0; i < data.length; i++) {
      			date = data[i].date;
      			$('#orders').append('<tr id="order'+data[i].id+'"><td>'+data[i].id+'</td><td>'+data[i].no_confirmation+'</td><td>'+date.substring(0,10)+' : '+data[i].time+'</td><td><a href="javascript:app.livreur.afficher_commande_details('+data[i].id+','+data[i].restaurant_id+','+data[i].client_id+')" class="a-link">livrer</a></td></tr>');
      		};
  		});
	</script>

    <div id="lstorders" class="col-md-9 col-md-offset-2">
		<div>
		    <div class="login-content opa">
		    	  <div>
		        	<div class="authentication-header">
		        		<h4>Liste des commandes</h4>
		        	</div>
		    	</div>
	       		<div class="table-responsive col-md-12">
		            <table class="table">
			            <thead>
							<tr>
								<th>id</th>
								<th>token</th>
								<th>total</th>
								<th>options</th>
							</tr>
		            	</thead>
		            	<tbody id="orders">
		            	</tbody>
		            </table>
	        	</div>
		    </div>
		</div>		    	
    </div>

	 <div id="google" class="col-md-5 col-md-offset-2">
		<div>
		    <div class="login-content opa">
		    	  <div>
		        	<div class="authentication-header">
		        		<h4>livrer</h4>
		        	</div>
		    	</div>
				 <div>
			 	<span>Votre position en code postal:</span>
			      <div>
			        <form accept-charset="UTF-8" action="javascript:google_map.validation_calcRoute(); void(0);"class="col-md-12" id="route_de_livraison">
			              <input id="route_de_livraison_client" type="hidden" value="0" />
			              <input id="route_de_livraison_restaurant" type="hidden" value="0" />
			              <input class="large-8 columns" id="route_de_livraison_livreur" placeholder="Lieu actuel" />
			              <input class="admin-btn-style" name="commit" type="submit" value="Afficher route" />  
			              <label class="error"   class="large-8 columns" id="route_de_livraison_error"></label>
			        </form>
			      </div>
			     </div><br/>
		    </div>
		</div>
	    <div id="directionsPanel" style="float:right;" class="col-md-12"></div>
	    <div id="map_canvas" style="height:400px" class="col-md-12"></div>			    	
    </div>

    <div id="ggl">
		<div id="updateOrder" class="col-md-5">
		    <div  class="login-content opa">
		    	  <div>
		        	<div class="authentication-header">
		        		<h3>ORDER #<label id="orderId"></label></h3>
		        		<span><a id="order-delivery" href="" class="a-link">confirmer</a></span>
		        	</div>
		    	</div>
		    	<span class="box">
	  				<div class="col-md-10">
	  					<div id="order-preview">
							<span><h5>commande</h5><h6 class="pull-right">qte</h6></span>
							<div class="table-responsive">
								<table class="table">
									<tbody id="order-items">
									</tbody>
									<tr><td>total</td><td></td><td class="pull-right"><span  id="order_total"></span>$</td></tr>
								</table>
							</div>
						</div>
					</div>
		    	</span>
			</div>
		</div>
    </div>

	<script type="text/javascript">
		app.livreur.init();
		google_map.init();
	</script>
<?php
	require_once('../partials/footer.php');
?>