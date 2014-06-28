<?php
	require_once('../partial/header.php');
?>
<?php 
	$type = $_SESSION['type'];
	if($type != "entrepreneur"){
		?>
		<script type="text/javascript">
			app.general.redirect("/LOG210-eq12/index.php");
		</script>
		<?php
	}
?>
        <div class="row authentication">
		      	<div class="col-md-8 col-md-offset-2">
		                <div class="page-header">
		                    <div class="">
		                      <h3>Gestion rapide</h3>
		                    </div>
		              </div>
		          <div class="col-md-3">
		            <div class="auth-box">
		            	<a href='javascript:app.general.entrepreneur.restaurateurs()'>restaurateurs</a>
		            </div>
		            <div class="auth-box">
		          	<a href='javascript:app.general.entrepreneur.restaurateurCreation()'>ajouter restaurateur</a>
		            </div>
		          </div>
		          <div class="col-md-3">
		            <div class="auth-box">
		            	<a href='javascript:app.general.entrepreneur.restaurants()'>restaurants</a>
		            </div>
		            <div class="auth-box">
		          	<a href='javascript:app.general.entrepreneur.restaurantCreation()'>ajouter restaurant</a>
		            </div>
		          </div>
		          <div class="col-md-3">
		            <div class="auth-box">
		            </div>
		        </div>
      		</div>
      	</div>
    <div class="container-fluid">
<div class="col-md-12 col-md-offset-0 main">

          <div class="row"  id="restaurateurCreation">
           	<div class="col-md-6 login-content col-md-offset-3">
            	<div>
	            	<div class="page-header">
	            	  	<div class="authentication-header">
				        	<h3>Ajouter un restaurateur</h3>
				        	<p><a href="javascript:app.entrepreneur.createRestaurateur()" class="submit">Ajouter</a></p>
	            	  	</div>
			      	</div>
	 				<div class="col-md-8">
	 					<div class="auth-box">
							<input id="mail" type="email" name="email" class="col-md-10 auth-input" placeholder="courriel">
						 	<input id="password" type="password" name="password" max="20" class="col-md-10 auth-input" placeholder="mot de passe">
							<input id="firstname" type="text" name="firstname" max="30" class="col-md-10 auth-input" placeholder="prénom ">
							<input id="lastname" type="text" name="lastname" max="30" class="col-md-10 auth-input" placeholder="nom">
							<select id="option_restaurant">
							</select>
						</div>
						<div class="row" id="restaurateur-create-error">
						    <div class="col-md-10 alert-danger text-center">
	                			<span id="restaurateur-create-error-message">remplir tout les champs</span>
	                		</div>
						</div>
						<div class="row" id="restaurateur-create-success">
						    <div class="col-md-10 alert-success text-center">
	                			<span id="restaurateur-create-success-message">le compte a ete creee</span>
	                		</div>
                		</div>
						<div class="row" id="restaurateur-create-warning">
						    <div class="col-md-10 alert-warning text-center">
	                			<span id="restaurateur-create-warning-message">restaurateur creee / aucun restaurant fournis</span>
	                		</div>
            			</div>
	 				</div>
            	</div>
        	</div>
          </div>

        <div class="row" id="listRestaurateurs">
        	<div class="page-header">
        	  	<div class="authentication-header">
			    <h3>Liste des restaurateurs</h3>
        	  	</div>
	      	</div>	           	
       		<div class="table-responsive">
	            <table class="table table-striped">
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
       	<div class="row"  id="restaurateurUpdate">
           	<div class="col-md-6 login-content col-md-offset-3">
            	<div>
	            	<div class="page-header">
	            	  	<div class="authentication-header">
				        	<h3>Modifier un restaurateur</h3>
	            	  	</div>
			      	</div>
	 				<div class="col-md-8">
	 					<div class="auth-box">
	 						<span>courriel: <label id="updateMail"></label></span> </br>
	 						<span>prenom: <label id="updateFirstname"></label></span></br>
	 						<span>nom de famille: <label id="updateLastname"></label></span></br>
						 	<span><input id="updatePassword" type="password" name="password" max="20" class="col-md-8 auth-input" placeholder="Mot de passe"><a id="restaurateur_mod-password-action" href="#" class="submit authentication-header">Modifier</a></span>
							<span><select id="option_restaurant-update"></select><a id="restaurateur_mod-restaurant-action" href="#" class="submit authentication-header">Modifier</a></span>

							
						</div>
						<div class="row" id="restaurateur-update-error">
						    <div class="col-md-10 alert-danger text-center">
	                			<span id="restaurateur-update-error-message">remplir tout les champs</span>
	                		</div>
						</div>
						<div class="row" id="restaurateur-update-success">
						    <div class="col-md-10 alert-success text-center">
	                			<span id="restaurateur-update-success-message">le compte a ete modifier</span>
	                		</div>
                		</div>
						<div class="row" id="restaurateur-update-warning">
						    <div class="col-md-10 alert-warning text-center">
	                			<span id="restaurateur-update-warning-message">restaurateur modifier / aucun restaurant fournis</span>
	                		</div>
            			</div>	
	 				</div>
            	</div>
        	</div>
        </div>
        <div class="row"  id="restaurantCreation">
           	<div class="col-md-6 login-content col-md-offset-3">
            	<div>
	            	<div class="page-header">
	            	  	<div class="authentication-header">
				        	<h3>Ajouter un restaurant</h3>
				        	<p><a href="javascript:app.entrepreneur.createRestaurant()" class="submit">Ajouter</a></p>
	            	  	</div>
			      	</div>
	 				<div class="col-md-8">
	 					<div class="auth-box">
							<input id="name" type="text" name="name" class="col-md-10 auth-input" placeholder="nom du restaurant">
							<input  id="address" type="text" name="address" max="50" class="col-md-10 auth-input"  placeholder="adresse">
							<input id="city" type="text" name="city" max="50" class="col-md-10 auth-input"  placeholder="ville">
							<input id="postalcode" type="text" name="potalCode" max="6" class="col-md-10 auth-input"  placeholder="code postal">
							<input id="phone" type="text" name="telephone" max="10" class="col-md-10 auth-input"  placeholder="téléphone">
							<select id="option_restaurateur">
							</select>
						</div>
						<div class="row" id="create-restaurant-error">						
						    <div class="col-md-10 alert-danger text-center">
	                			<span id="create-restaurant-error-message">remplir tout les champs</span>
	                		</div>
                  		</div>              		
 						<div class="row" id="create-restaurant-success">               		
						    <div class="col-md-10 alert-success text-center">
	                			<span id="create-restaurant-success-message">le restaurant a bien ete creee</span>
	                		</div>
                		</div>
						<div class="row" id="create-restaurant-warning">
						    <div class="col-md-10 alert-warning text-center">
	                			<span id="create-restaurant-warning-message">restaurant creer / aucun restaurateur fournis</span>
	                		</div>
            			</div>		
	 				</div>
            	</div>
        	</div>
          </div>
         <div class="row" id="listRestaurants">
         	<div class="page-header">
        	  	<div class="authentication-header">
			    <h3>Liste des restaurants</h3>
        	  	</div>
	      	</div>
       		<div class="table-responsive">
	            <table class="table table-striped">
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

       	<div class="row"  id="restaurantUpdate">
           	<div class="col-md-6 login-content col-md-offset-3">
            	<div>
	            	<div class="page-header">
	            	  	<div class="authentication-header">
				        	<h3>Modifier un restaurant</h3>
				        	<p><a id="restaurant_mod-action" href="#" class="submit">Modifier</a></p>
	            	  	</div>
			      	</div>
	 				<div class="col-md-8">
	 					<div class="auth-box">
							<input id="updateName" type="text" name="name" class="col-md-10 auth-input" placeholder="nom du restaurant">
							<input  id="updateAddress" type="text" name="address" max="50" class="col-md-10 auth-input"  placeholder="adresse">
							<input id="updateCity" type="text" name="city" max="50" class="col-md-10 auth-input"  placeholder="ville">
							<input id="updatePostalcode" type="text" name="potalCode" max="6" class="col-md-10 auth-input"  placeholder="code postal">
							<input id="updatePhone" type="text" name="telephone" max="10" class="col-md-10 auth-input"  placeholder="téléphone">
						
							<span><select id="option_restaurateur-update"></select></span>
						</div>
						<div class="row" id="update-restaurant-error">						
						    <div class="col-md-10 alert-danger text-center">
	                			<span id="update-restaurant-error-message">remplir tout les champs</span>
	                		</div>
                  		</div>              		
 						<div class="row" id="update-restaurant-success">               		
						    <div class="col-md-10 alert-success text-center">
	                			<span id="update-restaurant-success-message">les modifications ont bien ete faites</span>
	                		</div>
                		</div>
						<div class="row" id="update-restaurant-warning">
						    <div class="col-md-10 alert-warning text-center">
	                			<span id="update-restaurant-warning-message">restaurant modifier / aucun restaurateur fournis</span>
	                		</div>
            			</div>		    		
	 				</div>
            	</div>
        	</div>       
</div>
      </div>
    </div>
		<script type="text/javascript">
		app.general.entrepreneur.hide();
		app.entrepreneur.init();
		</script>
<?php
	require_once('../partial/footer.php');
?>
