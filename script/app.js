app = (function(){
	function init(){

	}

	var general = (function(){
		function init(){

		}

		function hideRegister() {
			$('#registerPage').hide();
			$('#connectPage').show();
		}

		function hideLogin() {
			$('#registerPage').show();
			$('#connectPage').hide();
		}

		function redirect(path){
			window.location.href =  path;
		}

		return{
	    	init:init,
	    	redirect:redirect,
	    	hideRegister:hideRegister,
	    	hideLogin:hideLogin,
    	}
	})();

	var user = (function(){ 
    	function init(){
    		$('#auth-error').hide();
    		$('#register-error').hide();
			$('#register-success').hide();

    		$('#update-password-error').hide();
    		$('#update-password-success').hide();
			$('#update-address-error').hide();
			$('#update-address-success').hide();

    	}

    	function oauth(){
			$.ajax({
			    type: "GET",
			    url: "/LOG210-eq12/action/api.php",
			    data:{
			    	action: 'oauth',
			    	mail : $('#lMail').val(),
			    	password : $('#password').val(),
				},
			    dataType: "html",
			    success: function(result){
			    	response = $.parseJSON(result);
			    	if(response === 1){
			    		general.redirect("/LOG210-eq12/index.php");
			    	}
			    	else{
			    		$('#auth-error').show();
			    	}
			    }        
			});
		}

		function oOut(){
			$.ajax({
			    type: "GET",
			    url: "/LOG210-eq12/action/api.php",
			    data:{
			    	action: 'oauthOut',
				},
			    dataType: "html",
			    success: function(result){
			    	console.log(result);
			    	general.redirect("/LOG210-eq12/index.php");
			    }        
			});
		}

		function register(){
			$.ajax({
			    type: "GET",
			    url: "/LOG210-eq12/action/api.php",
			    data:{
			    	action: 'register',
			    	firstname: $('#firstname').val(),
			    	lastname:  $('#lastname').val(),
			    	password: $('#rPassword').val(),
			    	mail: $('#rMail').val(),
			    	birthdate: $('#birthdate').val(),
			    	address: $('#address').val(),
			    	city: $('#city').val(),
			    	phone: $('#phone').val(),
			    	postalcode: $('#postalcode').val(),

				},
			    dataType: "html",
			    success: function(result){
			    	response = $.parseJSON(result);

			    	if(response === 0 ){
			    		$('#register-error').show();
			    		$('#register-error-message').text('remplir tout les champs');
			    	}
			    	else if(response === 2){
			    		$('#register-error').show();
			    		$('#register-error-message').text('le courriel existe deja');
			    	}
			    	else if(response === 1){
			    		$('#register-error').hide();
			    		$('#register-success').show();
			    	}

			    }        
			});	
		}

		function user_infos(){
			$.ajax({
			    type: "GET",
			    url: "/LOG210-eq12/action/api.php",
			    data:{
			    	action: 'user_infos',
				},
			    dataType: "html",
			    success: function(result){
			    	response = $.parseJSON(result);
			    	if(response!=null){
			    		$('#password').val(response.password);
				    	$('#address').val(response.address);
						$('#city').val(response.city);
						$('#phone').val(response.phone);
						$('#postalcode').val(response.postalcode);
					}
			    }        
			});	
		}
		
		function user_update_password(){
			$.ajax({
			    type: "GET",
			    url: "/LOG210-eq12/action/api.php",
			    data:{
			    	action: 'updateUserPassword',
			    	password: $('#password').val(),
				},
			    dataType: "html",
			    success: function(result){
			    	response = $.parseJSON(result);
			    	if(response === 0){
			    		$('#update-password-error').show();
			    		$('#update-password-success').hide();
			    	}
			    	else if(response === 1){
			    		$('#update-password-error').hide();
			    		$('#update-password-success').show();
			    	}
			    	console.log(result);
			    }        
			});	
		}

		function user_update_address(){
			$.ajax({
			    type: "GET",
			    url: "/LOG210-eq12/action/api.php",
			    data:{
			    	action: 'updateUserAddress',
			    	address: $('#address').val(),
			    	city: $('#city').val(),
			    	phone: $('#phone').val(),
			    	postalcode: $('#postalcode').val(),
				},
			    dataType: "html",
			    success: function(result){
			    	response = $.parseJSON(result);
			    	if(response === 0){
			    		$('#update-address-error').show();
			    		$('#update-address-success').hide();
			    	}
			    	if(response === 1){
			    		$('#update-address-error').hide();
			    		$('#update-address-success').show();
			    	}
			    	console.log(result);
			    }        
			});	
		}

    	return{
			init:init,
			oauth:oauth,
			oOut:oOut,
			register:register,
			user_update_password:user_update_password,
			user_update_address:user_update_address,
			user_infos:user_infos,
	    }
	})();

	var entrepreneur = (function(){ 
    	function init(){

    	}
    	return{
			init:init,
	    }
	})();


	return{
		init:init,
		general:general,
		user:user,
		entrepreneur:entrepreneur,
	}
})();