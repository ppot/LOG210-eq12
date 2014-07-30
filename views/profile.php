<?php
	require_once("../partials/header.php");
?>
<?php 
	$type = $_SESSION['type'];
	if($type != "client"){
		?>
		<script type="text/javascript">
			app.general.redirect(app.config.getContext()+"index.php");
			$(document).ready(function (){
				('html, body').animate({scrollTop:$('#header').position().top}, 'slow');
			});
		</script>
		<?php
	}
?>	
	<div id="entrepreneur">

		<div class="col-md-12">
       		<div class="authentication-header">
	    		<h3 class="title">Profile</h3>
	    	</div>
		</div>

		<div class="col-md-3 col-md-offset-1">
		    	<span class="box">
		    		<span>courriel: <label id="mail"></label></span></br>
		    		<span>prenom, nom: <label id="firstname"></label>,  <label id="lastname"></label></span></br>
		    		<span>date de naissance: <label id="birthdate"></label></span>
			    	<span class="box">
						<address>
						  <strong><span>address</span></strong><br>
						  <span id="address">adresse</span>,<span id="postalcode">code postal</span><br>
						  <span id="city">ville</span></br>	  
						  <span id="phone">telephone</span>
						</address>
			    	</span>
		    	</span>
		</div>
		<div class="col-md-4">
			<div class="form-horizontal">
			<h6>Modifier</h6> 
			<h7>le mot de passe<a href="javascript:app.users.updatePassword()" class="col-md-offset-4">modifier</a></h7>
			  <div class="form-group">
			    <label class="col-md-4 control-label">mot de passe </label>
			    <div class="col-md-6">
					<input id="md-password" type="password" max="20" class="col-md-10" placeholder="mot de passe">
			    </div>
			  </div>
			  <div class="form-group">
	  			<div id="update-password-error">
            		<div class="col-md-7 col-md-offset-1 alert-danger text-center">
            			<span id="update-password-error-message">erreur dans la modification</span>
            		</div>
            	</div>
            	<div id="update-password-success">
            		<div class="col-md-7 col-md-offset-1 alert-success text-center">
            			<span id="update-password-success-message">le mot de passe a ete modifier</span>
            		</div>
                </div>            	
			  </div>
			</div>

	    	<span class="box">
				<div class="form-horizontal">
				<h7>l'address <a href="javascript:app.users.updateAddress()" class="col-md-offset-5">modifier</a></h7>
				  <div class="form-group">
				    <label class="col-md-4 control-label">address </label>
				    <div class="col-md-6">
			     	<input type="text" id="md-address" max="50" class="col-md-10"  placeholder="adresse">
				    </div>
				  </div>

				  <div class="form-group">
				    <label class="col-md-4 control-label">ville </label>
				    <div class="col-md-6">
	            		<input id="md-city" type="text" max="50" class="col-md-10"  placeholder="ville">
				    </div>
				  </div>

				  <div class="form-group">
				    <label class="col-md-4 control-label">code postal </label>
				    <div class="col-md-6">
	            		 <input id="md-postalcode" type="text"  max="6" class="col-md-10"  placeholder="code postal">
				    </div>
				  </div>

				  <div class="form-group">
				    <label class="col-md-4 control-label">telephone</label>
				    <div class="col-md-6">
	            		 <input id="md-phone" type="text"  max="10" class="col-md-10"  placeholder="telephone">
				    </div>
				  </div>

				  <div class="form-group">
		  			<div id="update-address-error">
	            		<div class="col-md-7 col-md-offset-1 alert-danger text-center">
	            			<span id="update-address-error-message">erreur dans la modification</span>
	            		</div>
	            	</div>
	            	<div id="update-address-success">
	            		<div class="col-md-7 col-md-offset-1 alert-success text-center">
	            			<span id="update-address-success-message">l'address a ete modifier</span>
	            		</div>
	                </div>            	
				  </div>
				</div>
			</span>	
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function (){
			app.general.profile.init();
			app.users.get();
		});
	</script>

<?php
	require_once("../partials/footer.php");
?>