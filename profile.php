<?php
	require_once('action/IndexAction.php');
	require_once('partial/header.php');
?>
<div>
	<form method="POST" action="">
	    <p>Modifications d'informations personnelles:</p>
		<p>Nouveau mot de passe : <input id="password" type="password" name="password"></p>
		<p>Numéro de maison : <input id="username" type="text" name="username"> </p>
		<p>Rue : <input id="street" type="text" name="street"> </p>
		<p>Code postal : <input id="PostalCode" type="text" name="PostalCode"> </p>
		<p>Ville : <input id="city" type="text" name="city"> </p>
		<p>Téléphone : <input id="phoneNumber" type="number" name="phoneNumber"> </p>
		<input type="submit" name="send">
	</form>
</div>




<?php
	require_once('partial/footer.php');