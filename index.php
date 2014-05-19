<!DOCTYPE html>
<?php
	//debug usage
	error_reporting(E_ALL);
	ini_set('display_errors', True);
	//==============================
	require_once('action/IndexAction.php');
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
		<a href="profile.php">Profile Page</a>
		<?php
			if(isset($_SESSION['username']) && !empty($_SESSION['username']))
			{
				$user =  $_SESSION['username'];
				echo "logged in as $user";
				echo "<a href='javascript:app.user.oOut()'>logout</a>";
				echo "<br/>";
				echo "<a href='javascript:app.user.user_update()'>update address</a>";
			}
			
			if(!isset($_SESSION['username']))
			{
				echo "<a href='javascript:app.user.oauth()'>login</a>";
			}

		?>
		<div class="authentificationSpace">
				<div id="connectPage">
					<h4>Connexion</h4>
					<p>Afin de vous connecter, veuillez remplir les champs ci-dessous.</p>
					<form method="POST" action="" class="loginForm">
						<span>Votre nom d'utilisateur : <input type="text" name="username" max="30"></span>
						<span>Mot de passe : <input type="password" name="password" max="20"></span>
						<input type="submit" name="send" class="submit" value="Connexion">
						<p><a href="javascript:app.general.hideLogin()">Inscription</a></p>
						<div class="clear"></div>
					</form>
				</div>
				
				<div id="registerPage">
					<h4>Inscription</h4>
					<p>Afin de vous inscrire, veuillez remplir les champs ci-dessous.</p>
					<form method="POST" action="" class="registerForm">
						<span>Votre nom d'utilisateur : <input type="text" name="username" max="30"></span>
						<span>Mot de passe : <input type="password" name="password" max="20"></span>
						<span>Votre prénom : <input type="text" name="firstname" max="30"></span>
						<span>Votre nom : <input type="text" name="lastname" max="30"></span>
						<span>Votre courriel : <input type="email" name="email"></span>
						<span>Date de naissance : <input type="text" name="birthday"></span>
						<span>Adresse : <input type="text" name="address" max="50"></span>
						<span>Ville : <input type="text" name="town" max="50"></span>
						<span>Code postal : <input type="text" name="potalCode" max="6"></span>
						<span>Téléphone : <input type="text" name="telephone" max="10"></span>
						<input type="submit" name="send" class="submit" value="S'inscrire">
						<p><a href="javascript:app.general.hideRegister()">Retour à connexion</a></p>
						<div class="clear"></div>
					</form>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function(){
				app.general.hideRegister();
			});
		</script>
	</body>
</html>
