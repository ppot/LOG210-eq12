<?php
	require_once('partial/header.php');
?>
<div>
	<?php
			if(isset($_SESSION['username']) && !empty($_SESSION['username']))
			{
				$user =  $_SESSION['username'];
				echo "logged in as $user";
				echo "<a href='javascript:app.user.oOut()'>logout</a>";
			}
			
			if(!isset($_SESSION['username']))
			{
			}

	?>
		<div class="registerForm">
	  	<span>Modifications d'informations personnelles: <a href="javascript:fillValue()">remplir autrement</a></span>
		<span>Mot de passe : <input id="password" type="password" name="password" max="20"></span>
		<span>Adresse : <input type="text" id="address" name="address" max="50"></span>
		<span>Ville : <input id="city" type="text" name="city" max="50"></span>
		<span>Code postal : <input id="postalcode" type="text" name="potalCode" max="6"></span>
		<span>Téléphone : <input id="phone" type="text" name="telephone" max="10"></span>
		<a href='javascript:app.user.user_update()'>update address</a>
		</div>
</div>

<script type="text/javascript">
	
			$.ajax({
			    type: "GET",
			    url: "/LOG210-eq12/action/api.php",
			    data:{
			    	action: 'current',
				},
			    dataType: "html",
			    success: function(result){
			    	console.log(result);
			    	// response = $.parseJSON(result);
			    }        
			});	



			$(document).ready(function(){
				app.user.user_infos();
			});

			function fillValue(){
				$('#password').val('bacon1234');
				$('#no_maison').val('2444');
				$('#street').val('Rue Notre-Dame Ouest');
				$('#city').val('Montreal');
				$('#phone').val('5145151525');
				$('#postalcode').val('H3J1N5');
			}
</script>





<?php
	require_once('partial/footer.php');