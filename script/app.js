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
			    		console.log("worng username or password");
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
			    	console.log(result);
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
		
		function user_update(){
			$.ajax({
			    type: "GET",
			    url: "/LOG210-eq12/action/api.php",
			    data:{
			    	action: 'updateUser',
			    	password: $('#password').val(),
			    	address: $('#address').val(),
			    	city: $('#city').val(),
			    	phone: $('#phone').val(),
			    	postalcode: $('#postalcode').val(),
				},
			    dataType: "html",
			    success: function(result){
			    	console.log(result);
			    }        
			});	
		}

    	return{
			init:init,
			oauth:oauth,
			oOut:oOut,
			register:register,
			user_update:user_update,
			user_infos:user_infos,
	    }
	})();

	return{
		init:init,
		general:general,
		user:user,
	}
})();