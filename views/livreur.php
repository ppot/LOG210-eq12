<?php
	require_once('../controller/Livreur.php');
	require_once('../partials/header.php');

	$type = $_SESSION['type'];
	if($type != 'livreur'){
		?>
		<script type="text/javascript">
			app.general.redirect(app.config.getContext()+'index.php');
			$(document).ready(function (){
				('html, body').animate({scrollTop:$('#header').position().top}, 'slow');
			});
		</script>
		<?php
	}
?>
<div id="livreur">
	<div class="col-md-11 col-md-offset-1">
        <ul class="navigation">
          <li><a href="javascript:app.livreur.getAllOrders()">Afficher les commandes</a></li>
        </ul>
    </div>
    <div class="login-content opa">
		<div>
	    	<div class="authentication-header">
	    		<h3>Commandes prêtes à livrer</h3>
	    	</div>
		</div>
		<div class="table-responsive">
	        <table class="table">
	            <thead>
					<tr>
						<th>Nom du restaurant</th>
						<th>Numéro de confirmation</th>
						<th>Total</th>
					</tr>
	        	</thead>
	        	<tbody id="arrayOrders">
	        	</tbody>
	        </table>
		</div>
	</div>
</div>
<?php
	require_once("../partials/footer.php");
?>
