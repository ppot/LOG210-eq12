function Restaurateur () {}

Restaurateur.prototype.create = function(firstname,lastname,password,mail,restaurant_id) {
	var rePassword =/^(?=.{5,19}$)(?=.*[a-zA-Z]).*/;
	var reFirstname =/^[A-Za-z\s]{1,}[\.-]{0,1}[A-Za-z\s]{0,}$/;
	var reLastname =/^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$/;
    var reMail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

	var validFirstname = reFirstname.test(firstname);
	var validLastname = reLastname.test(lastname);
	var validPassword = rePassword.test(password);
	var validMail = reMail.test(mail);

	if(!validFirstname || !validLastname || !validPassword || !validMail){
	 	$('#restaurateur-create-error').show();
		$('#restaurateur-create-success').hide();
		$('#restaurateur-create-error-message').text('');
		if(!validFirstname)
		{
			$('#restaurateur-create-error-message').append('<span>firstname non conforme</span></br>');
		}
		if(!validLastname)
		{
			$('#restaurateur-create-error-message').append('<span>lastname non conforme</span></br>');
		}		
		if(!validPassword)
		{
			$('#restaurateur-create-error-message').append('<span>password non conforme</span></br>');
		}
		if(!validMail)
		{
			$('#restaurateur-create-error-message').append('<span>mail non conforme</span></br>');
		}

	}
	else{
		$.ajax({
		    type: "GET",
		    url: app.config.getContext()+"action/api.php",
		    data:{
		    	action: 'createRestaurateur',
		    	firstname: firstname,
		    	lastname:  lastname,
		    	password: password,
		    	mail: mail,
		    	restaurant: restaurant_id,
			},
		    dataType: "html",
		    success: function(result){
		    	response = $.parseJSON(result);
		    	if(response === 1){
		    		if(restaurant_id == -1){
						$('#restaurateur-create-warning').show();
		    		}
		    		else{
			    		$('#restaurateur-create-success').show();
			    		$('#restaurateur-create-error').hide();			    			
		    		}
		     		$('#firstname').val('');
					$('#lastname').val('');
					$('#password').val('');
					$('#mail').val('');
					$("#option_restaurant").val(-1);
		    	}
		    	else{
					$('#restaurateur-create-warning').hide();
		    		$('#restaurateur-create-success').hide();
		    		$('#restaurateur-create-error').show();			    		
		    	}
		    }        
		});
	}
};

Restaurateur.prototype.get = function(id) {

	$.ajax({
	    type: "GET",
	    url: app.config.getContext()+"action/api.php",
	    data:{
	    	action: 'getRestaurateur',
	    	id: id,
		},
	    dataType: "html",
	    success: function(result){
	    	obj = $.parseJSON(result);
	    	$('#updateMail').text(obj.mail);
	    	$('#updateFirstname').text(obj.firstname);
	    	$('#updateLastname').text(obj.lastname);
	    	$("#restaurateur_mod-password-action").attr("href","javascript:app.entrepreneur.updateRestaurateurPassword("+obj.id+")");
			$("#restaurateur_mod-restaurant-action").attr("href","javascript:app.entrepreneur.updateRestaurateurRestaurant("+obj.id+")");
	    }        
	});
};

Restaurateur.prototype.updatePassword = function(id,password) {
	var rePassword =/^(?=.{5,19}$)(?=.*[a-zA-Z]).*/;

	if(!rePassword.test(password))
	{
	 	$('#restaurateur-update-error').show();
		$('#restaurateur-update-success').hide();
		$('#restaurateur-update-error-message').text(' ');
		$('#restaurateur-update-error-message').append('<span>password non conforme</span></br>');
	}
	else{
		$.ajax({
		    type: "GET",
		    url: app.config.getContext()+"action/api.php",
		    data:{
		    	action: 'updateRestaurateurPassword',
		    	id: id,
		    	password: password,
			},
		    dataType: "html",
		    success: function(result){
		    	response = $.parseJSON(result);
		    	if(response === 1){
		    		$('#restaurateur-update-success').show();
		    		$('#restaurateur-update-error').hide();
		    		$('#restaurateur-update-success-message').text('le mot de passe a ete changer');
		    	}
		    	else{
		    		$('#restaurateur-update-success').hide();
		    		$('#restaurateur-update-error').show();
		    		$('#restaurateur-update-error-message').text('erreur dans le changement du mot de passe');			    		
		    	}
		    }        
		});
	}
};

Restaurateur.prototype.updateRestaurant = function(id,restaurant_id) {
	$.ajax({
	    type: "GET",
	    url: app.config.getContext()+"action/api.php",
	    data:{
	    	action: 'updateRestaurateurRestaurant',
	    	id: id,
	    	restaurantId: restaurant_id,
		},
	    dataType: "html",
	    success: function(result){
	    	response = $.parseJSON(result);
	    	console.log(response);
	    	if(response != null || response == 1){
	    		if(restaurant_id == -1){
					$('#restaurateur-update-warning').show();
	    		}
	    		else{
		    		$('#restaurateur-update-success').show();
		    		$('#restaurateur-update-error').hide();	
		    		$('#restaurateur-update-success-message').text('le restaurant a ete modifier');		    			
	    		}
	    	}
	    	else{
	    		$('#restaurateur-update-success').hide();
				$('#restaurateur-update-warning').hide();			    		
	    		$('#restaurateur-update-error').show();
	    		$('#restaurateur-update-error-message').text('erreur dans le changement du restaurant');			    		
	    	}
	    }        
	});
};

Restaurateur.prototype.getRestaurant = function(id) {
	$.ajax({
	    type: "GET",
	    url: app.config.getContext()+"action/api.php",
	    data:{
	    	action: 'getRestaurateurRestaurant',
	    	id: id,
		},
	    dataType: "html",
	    success: function(result){
	    	obj = $.parseJSON(result);
	    	$("#option_restaurant-update").val(obj);
	    }        
	});
};

Restaurateur.prototype.del = function(id) {
	$.ajax({
    	type: "GET",
	    url: app.config.getContext()+"action/api.php",
	    data:{
	    	action: 'delRestaurateur',
	    	id: id,
		},
	    dataType: "html",
	    success: function(result){
	    	$('#restaurateur'+id).remove();
	    }        
	}); 
};