function Restaurateur () {}

Restaurateur.prototype.create = function(firstname,lastname,password,mail,restaurant_id) {
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