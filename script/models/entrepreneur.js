// #addRestaurateur,
// #listRestaurateurs,
// #updateRestaurateur,
// #addRestaurant,
// #listRestaurants,
// #updateRestaurant{

function Entrepreneur() {
}

User.prototype.register = function(firstname,lastname,password,mail,birthdate,address,city,phone,postalcode) {
	$.ajax({
	    type: "GET",
	    url: app.config.getContext()+"action/api.php",
	    data:{
	    	action: 'register',
	    	firstname: firstname,
	    	lastname:  lastname,
	    	password: password,
	    	mail: mail,
	    	birthdate: birthdate,
	    	address: address,
	    	city: city,
	    	phone: phone,
	    	postalcode: postalcode,
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
};

User.prototype.oauth = function(mail,password) {
	$.ajax({
	    type: "GET",
	    url: app.config.getContext()+"action/api.php",
	    data:{
	    	action: 'oauth',
	    	mail : mail,
	    	password : password,
		},
	    dataType: "html",
	    success: function(result){
	    	response = $.parseJSON(result);
	    	console.log(response);
	    	if(response != null){
	    		if(response.type == "client"){
	    			app.general.redirect( app.config.getContext()+"index.php");
	    		}
	    		else if(response.type == "restaurateur"){
	    			app.general.redirect( app.config.getContext()+"views/restaurateur.php");

	    		}
	    		else if(response.type == "entrepreneur"){
	    			app.general.redirect( app.config.getContext()+"views/entrepreneur.php");
	    		}
	    	}
	    	else{
	    		$('#auth-error').show();
	    	}
	    }        
	});	
};

User.prototype.out = function() {
	$.ajax({
	    type: "GET",
	    url:  app.config.getContext()+"action/api.php",
	    data:{
	    	action: 'out',
		},
	    dataType: "html",
	    success: function(result){
	    	console.log(result);
	    	app.general.redirect( app.config.getContext()+"index.php");
	    }        
	});
};

User.prototype.get = function(id) {

};