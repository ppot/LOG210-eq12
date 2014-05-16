<?php
	require_once('action/IndexAction.php');
	require_once('partial/header.php');
?>
<div class="createAccount">
	<form method="POST" action="">
		Nouveau mot de passe : <input type="password" name="password"><br>
		Date de naissance <br>
		Jour : <input type="number" value="1" min="1" max="31" name="birthday_day">
		Month : <input type="number" value="1" min="1" max="12" name="birthday_month">
		Année : <input type="number" value="2014" min="1900" max="2014" name="birthday_year"><br>
		Numéro de maison : <input type="text" name="username"><br>
		Téléphone : <input type="" name="username"><br>
		<input type="submit" name="send">
	</form>
</div>




<?php
	require_once('partial/footer.php');