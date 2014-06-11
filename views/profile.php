<?php
<<<<<<< HEAD
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
=======
	require_once('../partial/header.php');
?>
              <div class="row authentication" id="registerPage">
      <div class="col-md-8 col-md-offset-2">
               <div class="">
                <div class="page-header">
                    <div class="authentication-header">
                      <h3>Modification du profil</h3>
                    </div>
              </div>
          <div class="col-md-6">
            <div class="auth-box">
              <input id="password" type="password" name="password" max="20" class="col-md-10 auth-input" placeholder="Mot de passe">
            </div>
          </div>
          <div class="col-md-6">
            <div class="auth-box">
                <input type="text" id="address" name="address" max="50" class="col-md-10 auth-input"  placeholder="Adresse">
                <input id="city" type="text" name="city" max="50" class="col-md-10 auth-input"  placeholder="Ville">
                <input id="postalcode" type="text" name="potalCode" max="6" class="col-md-10 auth-input"  placeholder="Code postal">
                <input id="phone" type="text" name="telephone" max="10" class="col-md-10 auth-input"  placeholder="Téléphone">
            </div>
          </div>
                  <div class="clearfix">
                  	<div class="row">
                  		<div class="col-md-6">
                  			<div class="row" id="update-password-error">
	                    		<div class="col-md-7 col-md-offset-1 alert-danger text-center">
	                    			<span id="register-error-message">erreur dans la modification</span>
	                    		</div>
	                    	</div>
	                    	<div class="row" id="update-password-success">
	                    		<div class="col-md-7 col-md-offset-1 alert-success text-center">
	                    			<span id="register-error-message">le mot de passe a ete modifier</span>
	                    		</div>
		                    </div>
                  		</div>
                  		<div class="col-md-6">
                   			<div class="row"  id="update-address-error">
	                    		<div class="col-md-7 col-md-offset-1 alert-danger text-center">
	                    			<span id="register-error-message">erreur dans la modification</span>
	                    		</div>
	                    	</div>                 			
		                   	<div class="row" id="update-address-success">
	                    		<div class="col-md-7 col-md-offset-1 alert-success text-center">
	                    			<span id="register-error-message">l'addresse a ete modifier</span>
	                    		</div>
		                    </div>
                  		</div>

	                    </div>

                  <div class="row">
                    <div class="col-md-4 col-md-offset-1"><a href='javascript:app.user.user_update_password()'>modifier mot de passe</a></div>
                    <div class="col-md-4 col-md-offset-1"><a href='javascript:app.user.user_update_address()'>modifier l'address</a></div>
                  </div>
                </div>
            </div>
        </div>
      </div>

<?php
	require_once('../partial/footer.php');

?>
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
				app.user.init();
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
>>>>>>> ADD bootstrap / restyling
