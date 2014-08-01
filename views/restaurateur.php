<?php
	require_once("../controller/Restaurateur.php");
	require_once("../partials/header.php");
?>

<?php
	$restaurant = Restaurateur::getRestaurantNotEncoded();
?>
		<script>
			var restoId = <?php echo $restaurant->id ?>;
			var socket = io('http://localhost:3000');
			socket.emit('getOrders',restoId);
	      	socket.on('orders', function(restaurantId,data){
	      		if(restaurantId == restoId){
		      		for (var i = 0; i < data.length; i++) {
		      			date = data[i].date;
		      			$('#orders').append('<tr id="order'+data[i].id+'"><td>'+data[i].id+'</td><td>'+data[i].no_confirmation+'</td><td>'+date.substring(0,10)+' : '+data[i].time+'</td><td><a href="javascript:app.restaurateur.displayPlatPreparation('+data[i].id+')" class="a-link">preparer</a></td></tr>');
		      		};
	      		}
      		});

	      	socket.on('singleNewOrder', function(data){
	      		console.log(data);
	      		for (var i = 0; i < data.length; i++) {
		      		if( data[i].restaurant_id == restoId){
		      			date = data[i].date;
		      			$('#orders').append('<tr id="order'+data[i].id+'"><td>'+data[i].id+'</td><td>'+data[i].no_confirmation+'</td><td>'+date.substring(0,10)+' : '+data[i].time+'</td><td><a href="javascript:app.restaurateur.displayPlatPreparation('+data[i].id+')" class="a-link">preparer</a></td></tr>');
		      		}
	      		};
      		});
		</script>
<?php 
	$type = $_SESSION['type'];
	if($type != "restaurateur"){
		?>
		<script type="text/javascript">
			app.general.redirect(app.config.getContext()+"index.php");
			$(document).ready(function (){
				('html, body').animate({scrollTop:$('#header').position().top}, 'slow');
			});
		</script>
		<?php
	}
?>

	<div id="restaurateur">
	    <?php
	    	$value = Restaurateur::getRestaurantNotEncoded();
	    	if($value->id == null)
	    	{
	    		echo "<div class='col-md-4 col-md-offset-4'><h4>Aucun restaurant n'est associe</h4></div>";
	    	}
	    	else
	    	{
	    ?>

	    <div class="col-md-11 col-md-offset-1">
	        <ul class="navigation">
	          <li><a href="javascript:app.restaurateur.menus()">menus</a></li>
	          <li><a href="javascript:app.restaurateur.addMenu()">Ajouter menu</a></li>
  	          <li><a href="javascript:app.restaurateur.orders()">commandes</a></li>
	        </ul>
	    </div>

		<div id="menu">

	    <div class="col-md-2 col-md-offset-1">
	    	<h4>List de menu</h4>
	    	<ul id="menus" class="menus"></ul>
	    </div>


		<div id="menuCreate">
			<div  class="col-md-4">
			    <div class="login-content opa">
			    	  <div>
			        	<div class="authentication-header">
			        		<h4>Ajouter un menu</h4>
							<p class="info"><a href="javascript:app.restaurateur.createMenu()">Ajouter</a></p>
			        	</div>
			    	</div>
			    	<span class="box">
						<input id="menuName" type="text" max="30" class="col-md-8 space" placeholder="nom du menu ">
			    	</span>
			     	 <div class="clearfix">
						<div id="menu-create-error">
						    <div class="col-md-8  alert-danger text-center space">
		            			<span id="menu-create-error-message">le nom est oubligatoire</span>
		            		</div>
						</div>
						<div id="menu-create-success">
						    <div class="col-md-8 alert-success text-center space">
		            			<span id="menu-create-success-message">le menu a ete creee</span>
		            		</div>
		        		</div>
				    </div>
			    </div>
			</div>

			<div  class="col-md-4">
			    <div class="login-content opa">
			    	  <div>
			        	<div class="authentication-header">
			        		<h4>Assigner un plat</h4>
							<p><a href="javascript:app.restaurateur.assignPlat()" class="submit">Assigner</a></p>
			        	</div>
			    	</div>
			    	<span class="box">
						<input id="assignPlatName" type="text" max="30" class="col-md-8 space" placeholder="nom du plat">
						<input id="assignPlatPrice" type="number"  step="0.01" max="30" class="col-md-8 space" placeholder="prix du plat">
						<textarea rows="2" id="assignPlatDescription" type="text" max="30" class="col-md-8 space" placeholder="description du plat"></textarea>
			    	</span>
			     	 <div class="clearfix">
						<div id="plat-assign-error">
						    <div class="col-md-8  alert-danger text-center space">
	                			<span id="plat-assign-error-message">le prix et le nom sont oubligatoire</span>
		            		</div>
						</div>

						<div id="plat-assign-warning">
						    <div class="col-md-8 alert-warning text-center space">
	                			<span id="plat-assign-warning-message">plat assignee / aucune description fournis</span>
		            		</div>
		        		</div>

						<div id="plat-assign-success">
						    <div class="col-md-8 alert-success text-center space">
	                			<span id="plat-assign-success-message">le plat a ete assignee</span>
		            		</div>
		        		</div>
				    </div>
			    </div>
			</div>
		</div>

	    <div id="menuUpdate" class"col-md-9">
	    	<div class="col-md-4">
			    <div class="">
			    	  <div>
			        	<div class="authentication-header">
			        		<h4>Modifier un menu</h4>
		    					<ul class="navigation"><li><a id="herfmenuUpdate"  href="">modifier</a></li></ul>
			        	</div>
			    	</div>
			    	<span class="box">
						<input id="menuUpdateName" type="text" max="30" class="col-md-8 space" placeholder="nom du menu">
			    	</span>
			     	 <div class="clearfix">
						<div id="menu-update-error">
						    <div class="col-md-8  alert-danger text-center space">
		            			<span id="menu-update-error-message">remplir tout les champs</span>
		            		</div>
						</div>
						<div id="menu-update-success">
						    <div class="col-md-8 alert-success text-center space">
		            			<span id="menu-update-success-message">le menu a ete modifier</span>
		            		</div>
		        		</div>
				    </div>
			    </div>
	    	</div>



		    <div class"col-md-12">
		    	<ul class="navigation"><li><a id="newPlat" href="">ajouter plat</a></li><li><a id="getPlats" href="">plats</a> </li></ul>
		    </div>

		    <div id="plats" class="col-md-9 col-md-offset-3">
				<div >
				    <div class="login-content opa">
				    	  <div>
				        	<div class="authentication-header">
				        		<h4>Liste des plats</h4>
				        	</div>
				    	</div>
			       		<div class="table-responsive col-md-10">
				            <table class="table">
					            <thead>
									<tr>
										<th>nom</th>
										<th>prix</th>
										<th>description</th>
										<th>options</th>
									</tr>
				            	</thead>
				            	<tbody id="menuPlats">
				            	</tbody>
				            </table>
			        	</div>
				    </div>
				</div>		    	
		    </div>

			<div class="col-md-4">
				<div id="menuPlat">
				    <div id="addPlat" class="login-content opa">
				    	<div>
				        	<div class="authentication-header">
				        	<h4>Ajouter un plat</h4>
		    					<ul class="navigation"><li><a id="hrefNewPlat"  href="">Ajouter</a></li></ul>
				        	</div>
				    	</div>
				    	<span class="box">
							<input id="platName" type="text" max="30" class="col-md-8 space" placeholder="nom du plat">
							<input id="platPrice" type="number"  step="0.01" max="30" class="col-md-8 space" placeholder="prix du plat">
							<textarea rows="2" id="platDescription" type="text" max="30" class="col-md-8 space" placeholder="description du plat"></textarea>
				    	</span>
				     	 <div class="clearfix">
							<div id="plat-create-error">
							    <div class="col-md-8  alert-danger text-center space">
		                			<span id="plat-create-error-message">le prix et le nom sont oubligatoire</span>
			            		</div>
							</div>

							<div id="plat-create-warning">
							    <div class="col-md-8 alert-warning text-center space">
		                			<span id="plat-create-warning-message">plat ajouter / aucune description fournis</span>
			            		</div>
			        		</div>

							<div id="plat-create-success">
							    <div class="col-md-8 alert-success text-center space">
		                			<span id="plat-create-success-message">le plat a ete ajouter</span>
			            		</div>
			        		</div>
					    </div>
				    </div>
				</div>
			</div>

	    	<div id="updatePlat" class="col-md-4 col-md-offset-1">
	        	<div>
	        	  	<div class="authentication-header">
			        	<h4>Modifier un plat</h4>
    					<ul class="navigation"><li><a id="hrefUpdatePlat"  href="">Modifier</a></li></ul>
	        	  	</div>
		      	</div>
		    	<span class="box">
					<input id="platNameUpdate" type="text" max="30" class="col-md-8 space" placeholder="nom du plat">
					<input id="platPriceUpdate" type="number"  step="0.01" max="30" class="col-md-8 space" placeholder="prix du plat">
					<textarea rows="2" id="platDescriptionUpdate" type="text" max="30" class="col-md-8 space" placeholder="description du plat"></textarea>
		    	</span>
		     	<div class="clearfix">
					<div id="plat-update-error">
					    <div class="col-md-8  alert-danger text-center space">
	            			<span id="plat-update-error-message">le prix et le nom sont oubligatoire</span>
	            		</div>
					</div>

					<div id="plat-update-warning">
					    <div class="col-md-8 alert-warning text-center space">
	            			<span id="plat-update-warning-message">plat modifier / aucune description fournis</span>
	            		</div>
	        		</div>

					<div id="plat-update-success">
					    <div class="col-md-8 alert-success text-center space">
	            			<span id="plat-update-success-message">le plat a ete modifier</span>
	            		</div>
	        		</div>
				</div>
	  		</div>
	    </div>

	</div>
	<div id="odr">
	    <div id="lstorders" class="col-md-9 col-md-offset-3">
			<div >
			    <div class="login-content opa">
			    	  <div>
			        	<div class="authentication-header">
			        		<h4>Liste des commandes</h4>
			        	</div>
			    	</div>
		       		<div class="table-responsive col-md-10">
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


	    	<div id="updateOrder" class="col-md-5 col-md-offset-4">
	    <div  class="login-content opa">
	    	  <div>
	        	<div class="authentication-header">
	        		<h3>ORDER #<label id="orderId"></label></h3>
	        		<span class="alert-warning">preparation</span>
						<p class="info">Details de la commande<a id="ready-order" href="" class="a-link">completer</a></p>
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
		$(document).ready(function(){
			app.restaurateur.init();
			app.restaurateur.getMenus();
		});
		</script>
	   	<?php	
	    	}	
	    ?>
	</div>

<?php
	require_once("../partials/footer.php");
?>