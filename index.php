<!DOCTYPE html>
<?php
	session_start();
	//debug usage
	error_reporting(E_ALL);
	ini_set('display_errors', True);
	//==============================
	// require_once('action/IndexAction.php');
?>
<html lang="fr">
    <head>
		<meta charset="utf-8">
		<link href="css/global.css" rel="stylesheet" type="text/css"/>
		<link href="css/index.css" rel="stylesheet" type="text/css"/>
		<script src="script/jquery.js"></script>
		<script src="script/app.js"></script>
	</head>
	<body>
		<div class="container">
		<?php
			if(isset($_SESSION['username']) && !empty($_SESSION['username']))
			{
				$user =  $_SESSION['username'];
				echo "logged in as $user";
				echo "<a href='javascript:app.user.oOut()'>logout</a>";
				echo "<br/>";
				echo "<a href='profile.php'>Profile Page</a>";
			}
			
			if(!isset($_SESSION['username']))
			{

				?>

				<div class="authentificationSpace">
					<div id="connectPage">
						<h4>Connexion</h4>
						<p>Afin de vous connecter, veuillez remplir les champs ci-dessous.</p>
						<form method="POST" action="" class="loginForm">
							<span>Votre nom d'utilisateur : <input id="username" type="text" name="username" max="30"></span>
							<span>Mot de passe : <input id="password" type="password" name="password" max="20"></span>
							<a href="javascript:app.user.oauth()" class="submit">Connexion</a>
							<p><a href="javascript:app.general.hideLogin()">Inscription</a></p>
							<div class="clear"></div>
						</form>
					</div>
				
					<div id="registerPage">
						<h4>Inscription</h4>
						<p>Afin de vous inscrire, veuillez remplir les champs ci-dessous.</p>
						<form method="POST" action="" class="registerForm">
							<span>Votre nom d'utilisateur : <input id="rUsername" type="text" name="username" max="30"></span>
							<span>Mot de passe : <input id="rPassword" type="password" name="password" max="20"></span>
							<span>Votre prénom : <input id="firstname" type="text" name="firstname" max="30"></span>
							<span>Votre nom : <input id="lastname" type="text" name="lastname" max="30"></span>
							<span>Votre courriel : <input id="mail" type="email" name="email"></span>
							<span>Date de naissance : <input id="birthdate" type="text" name="birthday"></span>
							<span>Adresse : <input type="text" id="no_maison" name="no_maison" max="50"></span>
							<span>rue : <input id="street" type="text"  name="street" max="50"></span>
							<span>Ville : <input id="city" type="text" name="city" max="50"></span>
							<span>Code postal : <input id="postalcode" type="text" name="potalCode" max="6"></span>
							<span>Téléphone : <input id="phone" type="text" name="telephone" max="10"></span>
							<a href="javascript:app.user.register()" class="submit" >S'inscrire</a>
							<p><a href="javascript:app.general.hideRegister()">Retour à connexion</a></p>
							<div class="clear"></div>
						</form>
					</div>
				</div>
		<script type="text/javascript">
			$(document).ready(function(){
				app.general.hideRegister();
				fillValue();
			});

			function fillValue(){
				$('#firstname').val('Philippe');
				$('#lastname').val('Potvin');
				$('#rUsername').val('Test');
				$('#rPassword').val('bacon');
				$('#mail').val('ph.potvin@gmail.com');
				$('#birthdate').val('1992-09-22');
				$('#no_maison').val('639');
				$('#street').val('ave.Victoria');
				$('#city').val('Saint-Lambert');
				$('#phone').val('5145151525');
				$('#postalcode').val('J4P2J7');
			}
		</script>

		<?php
			}
		?>
		</div>
	</body>
</html>
