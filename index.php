<?php
	session_start();
?>
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
			}

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
			});
			function fillValue(){
				$('#firstname').val('Philippe');
				$('#lastname').val('Potvin');
				$('#rUsername').val('Test');
				$('#rPassword').val('bacon');
				$('#rMail').val('ph.potvin@gmail.com');
				$('#birthdate').val('1992-09-22');
				$('#address').val('639 ave.Victoria');
				$('#city').val('Saint-Lambert');
				$('#phone').val('5145151525');
				$('#postalcode').val('J4P2J7');
			}	
	</script>

