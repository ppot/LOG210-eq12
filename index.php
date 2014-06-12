<?php
	session_start();
	$_SESSION["page"] = "index";
	require_once('partial/header.php');
?>
	<?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])) { ?>
		<a href='javascript:app.user.oOut()'>logout</a>
		<br/>
		<?php if($_SESSION['user'] != 'entrepreneur@gmail.com') { ?>
			<a href='profile.php'>Profile Page</a>
		<?php } else { ?>
			<a href="entrepreneur.php">Votre page d'entrepreneur</a>
		<?php } ?>
	<?php } if(!isset($_SESSION['user']) || empty($_SESSION['user'])) { ?>
	<div class="authentificationSpace">
		<div id="connectPage">
			<h4>Connexion</h4>
			<p>Afin de vous connecter, veuillez remplir les champs ci-dessous.</p>
			<div class="loginForm">
				<span>Votre courriel : <input id="lMail" type="email" name="email"></span>
				<span>Mot de passe : <input id="password" type="password" name="password" max="20"></span>
				<a href="javascript:app.user.oauth()" class="submit">Connexion</a>
				<p><a href="javascript:app.general.hideLogin()">Inscription</a></p>
				<div class="clear"></div>
			</div>
		</div>
	
		<div id="registerPage">
			<h4>Inscription</h4>
			<p>Afin de vous inscrire, veuillez remplir les champs ci-dessous.</p>
			<div class="registerForm">
				<span>Votre courriel : <input id="rMail" type="email" name="email"></span>
				<span>Mot de passe : <input id="rPassword" type="password" name="password" max="20"></span>
				<span>Votre prénom : <input id="firstname" type="text" name="firstname" max="30"></span>
				<span>Votre nom : <input id="lastname" type="text" name="lastname" max="30"></span>
				<span>Date de naissance : <input id="birthdate" type="text" name="birthday"></span>
				<span>Adresse : <input type="text" id="address" name="address" max="50"></span>
				<span>Ville : <input id="city" type="text" name="city" max="50"></span>
				<span>Code postal : <input id="postalcode" type="text" name="potalCode" max="6"></span>
				<span>Téléphone : <input id="phone" type="text" name="telephone" max="10"></span>
				<a href="javascript:app.user.register()" class="submit" >S'inscrire</a>
				<p><a href="javascript:app.general.hideRegister()">Retour à connexion</a></p>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<script>
		fillValue();
		$(document).ready(function(){
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

	<?php
		} 
	?>
<?php
	require_once('partial/footer.php');
