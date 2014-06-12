app = (function(){
	function init(){

	}

	var general = (function(){
		function init(){

		}

		function hideRegister() {
			$('#registerPage').hide();
			$('#connectPage').fadeIn("slow");
		}

		function hideLogin() {
			$('#connectPage').hide();
			$('#registerPage').fadeIn("slow");
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

	var entrepreneur = (function(){
		function init(){}

		function displayCreateRest() {
			$('#manageRest').hide();
			$('#createRestorer').hide();
			$('#manageRestorer').hide();
			$('#createRest').fadeIn("slow")();
		}

		function displayManageRest() {
			$('#createRest').hide();
			$('#createRestorer').hide();
			$('#manageRestorer').hide();
			$('#manageRest').fadeIn("slow");
		}

		function displayCreateRestorer() {
			$('#createRest').hide();
			$('#manageRest').hide();
			$('#manageRestorer').hide();
			$('#createRestorer').fadeIn("slow");
		}

		function displayManageRestorer() {
			$('#createRest').hide();
			$('#manageRest').hide();
			$('#createRestorer').hide();
			$('#manageRestorer').fadeIn("slow");
		}

		function createRest() {
			$.ajax({
			    type: "GET",
			    url: "/LOG210-eq12/action/api.php",
			    data:{
			    	action: 'createRest',
			    	name: $('#cRestName').val(),
			    	address: $('#cRestAddress').val(),
			    	city: $('#cRestCity').val(),
			    	postalCode: $('#cRestPostCode').val(),
			    	telephone: $('#cRestPhone').val(),
				},
			    dataType: "html",
			    success: function(result){
			    	console.log(result);
			    }        
			});	
		}

		function resto_infos(){
			$.ajax({
			    type: "GET",
			    url: "/LOG210-eq12/action/api.php",
			    data:{
			    	action: 'resto_infos',
				},
			    dataType: "html",
			    success: function(result){
			    	response = $.parseJSON(result);
			    	if(response!=null){
			    		$('#mRestName').val(response.name);
				    	$('#mRestAddress').val(response.address);
						$('#mRestCity').val(response.city);
						$('#mRestPostCode').val(response.postalcode);
						$('#mRestPhone').val(response.phone);
					}
			    }        
			});	
		}

		return{
			init:init,
			displayCreateRest:displayCreateRest,
			displayManageRest:displayManageRest,
			displayCreateRestorer:displayCreateRestorer,
			displayManageRestorer:displayManageRestorer,
			createRest:createRest,
			resto_infos:resto_infos,
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
		entrepreneur:entrepreneur,
	}
})();