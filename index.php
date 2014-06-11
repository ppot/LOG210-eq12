<?php
	require_once("partials/header.php");
?>
<<<<<<< HEAD
<div class="back">
	<div>
		<div class="col-md-12">
			<div class="col-md-8 col-md-offset-2">
				<ul id="restaurants" class="restaurants main-content-hover main-opa"></ul>
			</div>
		</div>

		<div class="col-md-12 ">
			<div class="col-md-8 col-md-offset-2">
				<ul id="menus" class="restaurants main-content-hover main-opa"></ul>
			</div>
		</div>

		<div class="col-md-12 ">
			<div class="col-md-8 col-md-offset-2">
				<div id="plats-index" class="restaurants main-content-hover main-opa"></div>
			</div>
			<?php
			  if(isset($_SESSION['type']) && !empty($_SESSION['type'])) 
			  {
					$type = $_SESSION['type'];
					if($type == "client"){
						?>			
					<div id="confirmRequest" class="col-md-2 main-content-hover main-opa">
				<h5>Valider le plat ajouter <a class="confirmCancel" href="javascript:app.order.orderConfirmQteClose()"> X </a></h5>
	    	<span class="box">
					<span><label id="confirmName" class="space"></label><label id="confirmPrice" class="space right"></label></span>
					</br>
					<label id="confirmDescription" class="space"></label></br>
					<input id="confirmQTE" type="number"  step="1" max="30" class="col-md-8 space" placeholder="quantite">
	    	</span>
	      <div class="clearfix">
	      	<div id="qte-error">
	      		<div class="col-md-12 alert-danger text-center space">
	      			<span>confirmer avec plus qu'un ou annuler avec le x</span>
	      		</div> 
	      	</div>
		    	<span class="box">
		    		<div class="col-md-12"><a id="confirmRequestItem" class="a-link" href="">confirmer</a></div>
		    	</span>
		    </div>
			</div>
							<?php
=======
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
  		<?php
			if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {
				?>

	            <div class="row authentication quick-menu">
			      	<div class="col-md-8 col-md-offset-2">
				<a href="javascript:app.user.oOut();" class="pull-right">deconnection</a>

			                <div class="page-header">
			                    <div class="authentication-header">
			                      <h3>Menu rapide <span class="pull-right user">
			                      	<?php
			                      	$user = $_SESSION['user'];
			                      	echo $user;
			                      	?>
			                      </span></h3>
			                    </div>
			              </div>
			          <div class="col-md-3">
			          	<a href='views/profile.php'>profil</a>
			            <div class="auth-box">
			            </div>
			          </div>
			          <div class="col-md-3">
			          	<!-- <a href='javascript:app.user.user_update()'>modifier mot de passe</a> -->
			            <div class="auth-box">
			            </div>
			          </div>
			          <div class="col-md-3">
			          	<!-- <a href='javascript:app.user.user_update()'>modifier mot de passe</a> -->
			            <div class="auth-box">
			            </div>
			        </div>
	      		</div>
	      	</div>
              <?php
>>>>>>> ADD bootstrap / restyling
			}
	  }
	?>
		</div>
	</div>
</div>
	<?php 
	  if(isset($_SESSION['type']) && !empty($_SESSION['type'])) 
	  {
			$type = $_SESSION['type'];
			if($type == "client"){
				?>

	<div id="cart">
		<div id="login" class="col-md-9 col-md-offset-3">
	    <div  class="login-content opa">
	    	  <div>
	        	<div class="authentication-header">
	        		<h3>Cart</h3>
							<p class="info">completer votre achat <a class="a-link" id="showNewAddress" href="javascript:app.order.showNewAddress()">nouvelle address</a></p>
	        	</div>
	    	</div>
	    	<span class="box">
  				<div class="col-md-6">
  					<div id="order-preview">
						<span><h5>Details de la commande</h5><h6 class="pull-right">qte</h6></span>
						<div class="table-responsive">
							<table class="table">
								<tbody id="cart-items"></tbody>
								<tr><td>total</td><td></td><td class="pull-right"><span  id="cart_total"></span>$</td></tr>
							</table>

             	<div class="" id="order-success">
             		<span>livraison le :   <label id="ordeDate-success"></label></span>
             		<span>pour :   <label id="ordeTime-success"></label></span>
								<span class="box">
		          		<div class="col-md-7 col-md-offset-2 alert-success text-center space">
		          			<span id="order-success-message">votre numero de confirmation est le  <label id="confirmationNumber"></label></span>
		          		</div>
								</span>
              </div>

<<<<<<< HEAD
		    			<div id="order-not-confirm" class="col-md-12">
								<span>
									<span class="pull-right"><a class="a-link"  href="javascript:app.order.process()">confirmer</a> </span>
									<h5>Details de livraison</h5>
								</span>
							

								<span class="box col-md-6">
			    				<input id="orderDate" class="col-md-12 space" placeholder="date"></br>
			    				<input id="orderTime" class="col-md-12 space" placeholder="heure"></br>
								</span>
		    			</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<span><h5>Adresse de livraison</h5></span>
					<address>
					  <strong><span>principale</span></strong><br>
					  <span id="address">adresse</span>,<span id="postalcode">code postal</span><br>
					  <span id="city">ville</span></br>	  
					  <span id="phone">telephone</span>
					</address>
					<div id="newAddress">
						<h5>nouvelle address</h5>
						<span class="box">
							<input type="text" id="n_address" name="address" max="50" class="col-md-10 space"  placeholder="Adresse">
							<input id="n_city" type="text" name="city" max="50" class="col-md-10 space"  placeholder="Ville">
							<input id="n_postalcode" type="text" name="potalCode" max="6" class="col-md-10 space"  placeholder="Code postal">
							<input id="n_phone" type="text" name="telephone" max="10" class="col-md-10 space"  placeholder="Téléphone">
    					<a class="a-link"href="javascript:app.order.user_new_deliveryAddress()">ajouter</a>
						</span>
					</div>
    			</div>
    			<div id="list-addr" class="col-md-3">
						<h5>Addresse enregistrer	</h5>
    				<ul class="menus" id="address-list">
    				</ul>
    			</div>
				</div>
			</div>
	    	</span>
	  </div>
	</div>
</div>
				<script type="text/javascript">
					$(document).ready(function (){
						app.order.setViewType('clients');
						app.order.getRestaurants();
					});
				</script>
				<?php
			}
			else {
				?>		
				<script type="text/javascript">
					$(document).ready(function (){
						app.order.setViewType('others');
						app.order.getRestaurants();
					});
				</script>
				<?php
			}
	  }
		else {
		?>		
				<script type="text/javascript">
					$(document).ready(function (){
						app.order.setViewType('others');
						app.order.getRestaurants();
					});
				</script>
				<?php
			}
	?>
<?php
  if(isset($_SESSION['user']) && !empty($_SESSION['user'])) 
  {
  ?>
  <?php
  }
  if(!isset($_SESSION['user']) || empty($_SESSION['user'])) 
  {
  ?>
		<div id="auth">
			<div id="login" class="col-md-4 col-md-offset-4">
		    <div  class="login-content opa">
		    	  <div>
		        	<div class="authentication-header">
		        		<h3>Connexion</h3>
								<p class="info">Afin de vous connecter, veuillez remplir les champs ci-dessous.</p>
		        	</div>
		    	</div>
		    	<span class="box">
		            <input id="l-mail" type="email" class="col-md-10 col-md-offset-1 space" placeholder="courriel">
		            <input id="l-password" type="password" max="20" required="required" class="col-md-10 col-md-offset-1 space" placeholder="mot de passe">
		    	</span>
		      <div class="clearfix">
		      	<div  id="auth-error">
		      		<div class="col-md-8 col-md-offset-2 alert-danger text-center space">
		      			<span>mauvais utilisateur ou mot de passe</span>
		      		</div>
		      	</div>
			    	<span class="box">
			    		<div class="col-md-4 col-md-offset-1"><a class="a-link" href="javascript:app.general.index.register_hash()">Inscription</a></div>
							<div class="col-md-4 col-md-offset-1"><a class="a-link" href="javascript:app.users.oauth()" class="pull-right">Connexion</a></div>
			    	</span>
			    </div>
		    </div>
		  </div>

				<div id="register" class="col-md-7 col-md-offset-3">
			       <div class="login-content">
			        	<div>
			        	  	<div class="authentication-header">
					        	<h3>Inscription</h3>
								<p class="info">Afin de vous inscrire, veuillez remplir les champs ci-dessous.</p>
			        	  	</div>
				      	</div>
							<div class="col-md-6">
								<span class="box">
									<input id="r-mail" type="email"  class="col-md-10 space" placeholder="Votre courriel" />
								 	<input id="r-password" type="password"  max="20" class="col-md-10 space" placeholder="Mot de passe" />
									<input id="r-firstname" type="text"  max="30" class="col-md-10 space" placeholder="Votre prénom" />
									<input id="r-lastname" type="text"  max="30" class="col-md-10 space" placeholder="Votre nom" />
								</span>
							</div>
							<div class="col-md-6">
								<span class="box">
									<input id="r-birthdate" type="text" class="col-md-10 space"  placeholder="Date de naissance" />
									<input id="r-address" type="text"  max="50" class="col-md-10 space"  placeholder="Adresse" />
									<input id="r-city" type="text" max="50" class="col-md-10 space"  placeholder="Ville" />
									<input id="r-postalcode" type="text"  max="6" class="col-md-10 space"  placeholder="Code postal" />
									<input id="r-phone" type="text"  max="10" class="col-md-10 space"  placeholder="Téléphone" />
								</span>
							</div>
			            <div class="clearfix">
			            	<div class="" id="register-error">
			            		<div class="col-md-7 col-md-offset-2 alert-danger text-center space">
			            			<span id="register-error-message">remplir tout les champs</span>
			            		</div>
			                </div>
			               	<div class="" id="register-success">
			            		<div class="col-md-7 col-md-offset-2 alert-success text-center space">
			            			<span id="register-success-message">votre compte a ete creer</span>
			            		</div>
			                </div>
			            	<div class="">
			            		<div class="col-md-4 col-md-offset-1"><a class="a-link" href="javascript:app.general.index.login_hash()">Retour à connexion</a></div>
											<div class="col-md-4 col-md-offset-2"><a class="a-link" href="javascript:app.users.register()" class="submit" >S'inscrire</a></div>
			            	</div>
			   			</div>
				    </div>
				</div>      
		</div>
  <script>
			fillValue();
			$(document).ready(function(){
				app.general.index.init();
=======
			if(!isset($_SESSION['user']) || empty($_SESSION['user'])) {
		?>
       	<div class="row authentication"  id="connectPage">
 			<div class="col-md-5 col-md-offset-3">
	                <div class="login-content">
	                	  <div class="page-header">
		                	  	<div class="authentication-header">
						        	<h3>Connexion</h3>
									<p class="info">Afin de vous connecter, veuillez remplir les champs ci-dessous.</p>
		                	  	</div>
					      	</div>
					      	<div class="auth-box">
		                        <div class="auth-box">
		                                <input id="lMail" type="email" class="col-md-10 col-md-offset-1 auth-input" placeholder="courriel">
		                        </div>
		                        <div class="auth-box">
	                                <input id="password" type="password" max="20" required="required" class="col-md-10 col-md-offset-1 auth-input" placeholder="mot de passe">
	                        	</div>
	                        </div>
	                        <div class="clearfix">
	                        	<div class="row" id="auth-error">
	                        		<div class="col-md-7 col-md-offset-2 alert-danger text-center">
	                        			<span >mauvais utilisateur ou mot de passe</span>
	                        		</div>
	                        	</div>
	                        	<div class="row">
	                        		<div class="col-md-4 col-md-offset-1"><a href="javascript:app.general.hideLogin()">Inscription</a></div>
									<div class="col-md-4 col-md-offset-1"><a href="javascript:app.user.oauth()" class="pull-right">Connexion</a></div>
	                        	</div>
	                        </div>
	                </div>
            </div>
        </div>
        <div class="row authentication" id="registerPage">
 			<div class="col-md-8 col-md-offset-2">
               <div class="login-content">
	            	<div class="page-header">
	            	  	<div class="authentication-header">
				        	<h3>Inscription</h3>
							<p class="info">Afin de vous inscrire, veuillez remplir les champs ci-dessous.</p>
	            	  	</div>
			      	</div>
	 				<div class="col-md-6">
	 					<div class="auth-box">
							<input id="rMail" type="email" name="email" class="col-md-10 auth-input" placeholder="Votre courriel">
						 	<input id="rPassword" type="password" name="password" max="20" class="col-md-10 auth-input" placeholder="Mot de passe">
							<input id="firstname" type="text" name="firstname" max="30" class="col-md-10 auth-input" placeholder="Votre prénom ">
							<input id="lastname" type="text" name="lastname" max="30" class="col-md-10 auth-input" placeholder="Votre nom">
						</div>
	 				</div>
	 				<div class="col-md-6">
	 					<div class="auth-box">
								<input id="birthdate" type="text" name="birthday" class="col-md-10 auth-input"  placeholder="Date de naissance">
								<input type="text" id="address" name="address" max="50" class="col-md-10 auth-input"  placeholder="Adresse">
								<input id="city" type="text" name="city" max="50" class="col-md-10 auth-input"  placeholder="Ville">
								<input id="postalcode" type="text" name="potalCode" max="6" class="col-md-10 auth-input"  placeholder="Code postal">
								<input id="phone" type="text" name="telephone" max="10" class="col-md-10 auth-input"  placeholder="Téléphone">
	 					</div>
	 				</div>
	                <div class="clearfix">
	                	<div class="row" id="register-error">
                    		<div class="col-md-7 col-md-offset-2 alert-danger text-center">
                    			<span id="register-error-message">remplir tout les champs</span>
                    		</div>
	                    </div>
	                   	<div class="row" id="register-success">
                    		<div class="col-md-7 col-md-offset-2 alert-success text-center">
                    			<span id="register-error-message">votre compte a ete creer</span>
                    		</div>
	                    </div>
		            	<div class="row">
		            		<div class="col-md-4 col-md-offset-1"><a href="javascript:app.general.hideRegister()">Retour à connexion</a></div>
							<div class="col-md-4 col-md-offset-1"><a href="javascript:app.user.register()" class="submit" >S'inscrire</a></div>
		            	</div>
           			</div>
            </div>
        </div>
    </div>
<?php
	}
?>
    </div>
    <div id="footer">
      <div class="container">
        	<div class="row">
        		<div class="col-md-6 col-md-offset-3"><p class="text-muted">12&#0153;    @Philippe Potvin, @Samuel Ryc, @Marc-Andre Viau, @Rodd Steel</p></div>
        	</div>
      </div>
    </div>    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="script/jquery.js"></script>
	<script src="script/app.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>

    <script>
		fillValue();
			$(document).ready(function(){
				app.user.init();
				app.general.hideRegister();
>>>>>>> ADD bootstrap / restyling
			});
			function fillValue(){
				$('#r-firstname').val('Philippe');
				$('#r-lastname').val('Potvin');
				$('#r-password').val('bacon');
				$('#r-mail').val('ph.potvin@gmail.com');
				$('#r-birthdate').val('1992-09-22');
				$('#r-address').val('639 ave.Victoria');
				$('#r-city').val('Saint-Lambert');
				$('#r-phone').val('5145151525');
				$('#r-postalcode').val('J4P2J7');
			}	
	</script>
<<<<<<< HEAD
<?php
  }
?>
<?php
	require_once("partials/footer.php");
?>
=======

>>>>>>> ADD bootstrap / restyling
