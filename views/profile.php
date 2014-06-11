<?php
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