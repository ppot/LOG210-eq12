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
			    	username : 'Test',
			    	password : 'bacon1234',
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
			    	general.redirect("/LOG210-eq12/out.php");
			    }        
			});
		}

		function register(){
			$.ajax({
			    type: "GET",
			    url: "/LOG210-eq12/action/api.php",
			    data:{
			    	action: 'register',
			    	firstname: 'Philippe',
			    	lastname:  'Potvin',
			    	username: 'Test',
			    	password: 'bacon',
			    	mail: 'ph.potvin@gmail.com',
			    	birthdate: '1992-09-22',
			    	no_maison: '639',
			    	street: 'ave.Victoria',
			    	city: 'Saint-Lambert',
			    	phone: '5145151525',
			    	postalcode: 'J4P2J7',

				},
			    dataType: "html",
			    success: function(result){
			    	console.log(result);
			    }        
			});	
		}
		
		function user_update(){
			$.ajax({
			    type: "GET",
			    url: "/LOG210-eq12/action/api.php",
			    data:{
			    	action: 'updateUser',
			    	password: 'bacon1234',
			    	no_maison: '2444',
			    	street: ' Rue Notre-Dame Ouest',
			    	city: 'Montreal',
			    	phone: '5145151525',
			    	postalcode: 'H3J1N5',
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
	    }
	})();

	return{
		init:init,
		general:general,
		user:user,
	}
})();