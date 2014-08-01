<?php
	require_once("../partials/header.php");
?>
<?php 
	$type = $_SESSION['type'];
	if($type != "entrepreneur"){
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

	<div id="entrepreneur">
	    <div class="col-md-11 col-md-offset-1">
	        <ul class="navigation">
	          <li><a href="javascript:app.general.entrepreneur.addRestaurateur()">Ajouter restaurateur</a></li>
	          <li><a href="javascript:app.general.entrepreneur.addRestaurant()">Ajouter restaurant</a></li>
	          <li><a href="javascript:app.general.entrepreneur.restaurateurs()">restaurateurs</a></li>
	           <li><a href="javascript:app.general.entrepreneur.restaurants()">restaurants</a></li> 
   	           <li><a href="javascript:app.general.entrepreneur.addLivreur()">Ajouter livreur</a></li>  
	           <li><a href="javascript:app.general.entrepreneur.livreurs()">livreurs</a></li>	                 
	        </ul>
	    </div>

		<div id="addRestaurateur" class="col-md-4 col-md-offset-4">
		    <div class="login-content opa">
		    	  <div>
		        	<div class="authentication-header">
		        		<h3>Ajouter un restaurateur</h3>
						<p class="info"><a href="javascript:app.entrepreneur.createRestaurateur()">Ajouter</a></p>
		        	</div>
		    	</div>
		    	<span class="box">
					<input id="mail" type="email" class="col-md-10 col-md-offset-1 space" placeholder="courriel">
				 	<input id="password" type="password" max="20" class="col-md-10 col-md-offset-1 space" placeholder="mot de passe">
					<input id="firstname" type="text"  max="30" class="col-md-10 col-md-offset-1 space" placeholder="prénom ">
					<input id="lastname" type="text" max="30" class="col-md-10 col-md-offset-1 space" placeholder="nom">
					<select id="option_restaurant" class="col-md-10 col-md-offset-1 option  space"></select>
		    	</span>
		     	 <div class="clearfix">
					<div id="restaurateur-create-error">
					    <div class="col-md-8 col-md-offset-2 alert-danger text-center space">
	            			<span id="restaurateur-create-error-message">remplir tout les champs</span>
	            		</div>
					</div>
					<div id="restaurateur-create-success">
					    <div class="col-md-8 col-md-offset-2 alert-success text-center space">
	            			<span id="restaurateur-create-success-message">le compte a ete creee</span>
	            		</div>
	        		</div>
					<div id="restaurateur-create-warning">
					    <div class="col-md-8 col-md-offset-2 alert-warning text-center space">
	            			<span id="restaurateur-create-warning-message">restaurateur creee / aucun restaurant fournis</span>
	            		</div>
	    			</div>
			    </div>
		    </div>
		</div>

		<div id="listRestaurateurs" class="col-md-8 col-md-offset-2">
		    <div class="login-content opa">
		    	  <div>
		        	<div class="authentication-header">
		        		<h3>Restaurateurs</h3>
		        	</div>
		    	</div>
		    	<div class="table-responsive">
		            <table class="table">
			            <thead>
							<tr>
								<th>courriel</th>
								<th>prenom</th>
								<th>nom de famille</th>
								<th>options</th>
							</tr>
		            	</thead>
		            	<tbody id="arrayRestaurateurs">
		            	</tbody>
		            </table>
        		</div>
		    </div>
		</div>

		<div id="updateRestaurateur" class="col-md-4 col-md-offset-4">
		    <div class="login-content opa">
		    	  <div>
		        	<div class="authentication-header">
		        		<h3>Modifier un restaurateur</h3>
		        	</div>
		    	</div>
		    	<span>
					<span>courriel: <label id="updateMail"></label></span> </br>
					<span>prenom: <label id="updateFirstname"></label></span></br>
					<span>nom de famille: <label id="updateLastname"></label></span></br>
				 	<div class="space">
				 		<input id="updatePassword" type="password" name="password" max="20" class="col-md-8" placeholder="mot de passe">
				 		<a id="restaurateur_mod-password-action" href="#" class="a-link">Modifier</a>
				 	</div>
					<div class="space">
						<select id="option_restaurant-update" class="col-md-8 option"></select>
						<a id="restaurateur_mod-restaurant-action" href="#" class="a-link ">Modifier</a>
					</div>
		    	</span>

		     	 <div class="clearfix">
					<div id="restaurateur-update-error">
					    <div class="col-md-8 col-md-offset-2 alert-danger text-center space">
	            			<span id="restaurateur-update-error-message">remplir tout les champs</span>
	            		</div>
					</div>
					<div id="restaurateur-update-success">
					    <div class="col-md-8 col-md-offset-2 alert-success text-center space">
	            			<span id="restaurateur-update-success-message">le restaurateur a ete modifier</span>
	            		</div>
	        		</div>
					<div id="restaurateur-update-warning">
					    <div class="col-md-8 col-md-offset-2 alert-warning text-center space">
	            			<span id="restaurateur-update-warning-message">restaurateur modifier / aucun restaurant fournis</span>
	            		</div>
	    			</div>
			    </div>
		    </div>
		</div>	

		<div id="addRestaurant" class="col-md-4 col-md-offset-4">
		    <div class="login-content opa">
		    	  <div>
		        	<div class="authentication-header">
		        		<h3>Ajouter un restaurant</h3>
						<p class="info"><a href="javascript:app.entrepreneur.createRestaurant()">Ajouter</a></p>
		        	</div>
		    	</div>
		    	<span class="box">
					<input id="name" type="text" class="col-md-10 col-md-offset-1 option  space" placeholder="nom du restaurant">
					<input  id="address" type="text" max="50" class="col-md-10 col-md-offset-1 option  space"  placeholder="adresse">
					<input id="city" type="text" max="50" class="col-md-10 col-md-offset-1 option  space"  placeholder="ville">
					<input id="postalcode" type="text" max="6" class="col-md-10 col-md-offset-1 option  space"  placeholder="code postal">
					<input id="phone" type="text"  max="10" class="col-md-10 col-md-offset-1 option  space"  placeholder="téléphone">
					<select id="option_restaurateur" class="col-md-10 col-md-offset-1 option  space"></select>
		    	</span>

		     	 <div class="clearfix">
					<div id="restaurant-create-error">
					    <div class="col-md-8 col-md-offset-2 alert-danger text-center space">
	            			<span id="restaurant-create-error-message">remplir tout les champs</span>
	            		</div>
					</div>
					<div id="restaurant-create-success">
					    <div class="col-md-8 col-md-offset-2 alert-success text-center space">
	            			<span id="restaurant-create-success-message">le restaurant a ete creee</span>
	            		</div>
	        		</div>
					<div id="restaurant-create-warning">
					    <div class="col-md-8 col-md-offset-2 alert-warning text-center space">
	            			<span id="restaurant-create-warning-message">restaurant creee / aucun restaurateur fournis</span>
	            		</div>
	    			</div>
			    </div>
		    </div>
		</div>	

		<div id="listRestaurants" class="col-md-8 col-md-offset-2">
		    <div class="login-content opa">
		    	  <div>
		        	<div class="authentication-header">
		        		<h3>Restaurants</h3>
		        	</div>
		    	</div>
		    	<div class="table-responsive">
		            <table class="table">
			            <thead>
							<tr>
								<th>nom</th>
								<th>restaurateur_id</th>
								<th>adresse</th>												
								<th>options</th>
							</tr>
		            	</thead>
		            	<tbody id="arrayRestaurants">
		            	</tbody>
		            </table>
        		</div>
		    </div>
		</div>

		<div id="updateRestaurant" class="col-md-4 col-md-offset-4">
		    <div class="login-content opa">
		    	  <div>
		        	<div class="authentication-header">
		        		<h3>Modifier un restaurant</h3>
						<p class="info"><a id="restaurant_mod-action" href="">Modifier</a></p>
		        	</div>
		    	</div>
		    	<span class="box">
					<input id="updateName" type="text" class="col-md-10 col-md-offset-1 option space" placeholder="nom du restaurant">
					<input  id="updateAddress" type="text" max="50" class="col-md-10 col-md-offset-1 option space"  placeholder="adresse">
					<input id="updateCity" type="text" max="50" class="col-md-10 col-md-offset-1 option space"  placeholder="ville">
					<input id="updatePostalcode" type="text" max="6" class="col-md-10 col-md-offset-1 option space"  placeholder="code postal">
					<input id="updatePhone" type="text"  max="20" class="col-md-10 col-md-offset-1 option space"  placeholder="téléphone">
					<select id="option_restaurateur-update" class="col-md-10 col-md-offset-1 option space"></select>
		    	</span>
		     	 <div class="clearfix">
					<div id="restaurant-update-error">
					    <div class="col-md-8 col-md-offset-2 alert-danger text-center space">
	            			<span id="restaurant-update-error-message">remplir tout les champs</span>
	            		</div>
					</div>
					<div id="restaurant-update-success">
					    <div class="col-md-8 col-md-offset-2 alert-success text-center space">
	            			<span id="restaurant-update-success-message">le restaurant a ete modifier</span>
	            		</div>
	        		</div>
					<div id="restaurant-update-warning">
					    <div class="col-md-8 col-md-offset-2 alert-warning text-center space">
	            			<span id="restaurant-update-warning-message">restaurant modifier / aucun restaurateur fournis</span>
	            		</div>
	    			</div>
			    </div>
		    </div>
		</div>
		
		 <div id="addLivreur" class="col-md-4 col-md-offset-4">
		    <div class="login-content opa">
		    	  <div>
		        	<div class="authentication-header">
		        		<h3>Ajouter un Livreur</h3>
						<p class="info"><a href="javascript:app.entrepreneur.createLivreur()">Ajouter</a></p>
		        	</div>
		    	</div>
		    	<span class="box">
					<input id="livMail" type="email" class="col-md-10 col-md-offset-1 space" placeholder="courriel">
				 	<input id="livPassword" type="password" max="20" class="col-md-10 col-md-offset-1 space" placeholder="mot de passe">
					<input id="livFirstname" type="text"  max="30" class="col-md-10 col-md-offset-1 space" placeholder="prénom ">
					<input id="livLastname" type="text" max="30" class="col-md-10 col-md-offset-1 space" placeholder="nom">
		    	</span>
		     	 <div class="clearfix">
					<div id="livreur-create-error">
					    <div class="col-md-8 col-md-offset-2 alert-danger text-center space">
	            			<span id="livreur-create-error-message">remplir tout les champs</span>
	            		</div>
					</div>
					<div id="livreur-create-success">
					    <div class="col-md-8 col-md-offset-2 alert-success text-center space">
	            			<span id="livreur-create-success-message">le compte a ete creee</span>
	            		</div>
	        		</div>
			    </div>
		    </div>
		</div>

		<div id="listLivreurs" class="col-md-8 col-md-offset-2">
		    <div class="login-content opa">
		    	  <div>
		        	<div class="authentication-header">
		        		<h3>Livreurs</h3>
		        	</div>
		    	</div>
		    	<div class="table-responsive">
		            <table class="table">
			            <thead>
							<tr>
								<th>courriel</th>
								<th>prenom</th>
								<th>nom de famille</th>
							</tr>
		            	</thead>
		            	<tbody id="arrayLivreurs">
		            	</tbody>
		            </table>
        		</div>
		    </div>
		</div>

		<div id="updateLivreur" class="col-md-4 col-md-offset-4">
		    <div class="login-content opa">
		    	  <div>
		        	<div class="authentication-header">
		        		<h3>Modifier un livreur</h3>
		        	</div>
		    	</div>
		    	<span>
					<span>courriel: <label id="updateLivMail"></label></span> </br>
					<span>prenom: <label id="updateLivFirstname"></label></span></br>
					<span>nom de famille: <label id="updateLivLastname"></label></span></br>
				 	<div class="space">
				 		<input id="updateLivPassword" type="password" name="password" max="20" class="col-md-8" placeholder="mot de passe">
				 		<a id="livreur_mod-password-action" href="#" class="a-link">Modifier</a>
				 	</div>
		    	</span>

		     	 <div class="clearfix">
					<div id="livreur-update-error">
					    <div class="col-md-8 col-md-offset-2 alert-danger text-center space">
	            			<span id="livreur-update-error-message">remplir tout les champs</span>
	            		</div>
					</div>
					<div id="livreur-update-success">
					    <div class="col-md-8 col-md-offset-2 alert-success text-center space">
	            			<span id="livreur-update-success-message">le livreur a ete modifier</span>
	            		</div>
	        		</div>
			    </div>
		    </div>
		</div>	

	</div>
		<script type="text/javascript">
		app.general.entrepreneur.init();
		</script>
<?php
	require_once("../partials/footer.php");
?>