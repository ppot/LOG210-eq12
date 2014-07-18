function Restaurant(){}

Restaurant.prototype.get = function(id) {
	$.ajax({
	    type: "GET",
	    url: app.config.getContext()+"action/api.php",
	    data:{
	    	action: 'getRestaurant',
	    	id: id,
		},
	    dataType: "html",
	    success: function(result){
	    	obj = $.parseJSON(result);
	    	$('#updateName').val(obj.name);
	    	$('#updateAddress').val(obj.address.address);
	    	$('#updateCity').val(obj.address.city);		
	    	$('#updatePostalcode').val(obj.address.postalcode);
	    	$('#updatePhone').val(obj.address.phone);    	
	    	$("#option_restaurateur-update").val(obj.restaurateur_id);
	    	$("#restaurant_mod-action").attr("href","javascript:app.entrepreneur.updateRestaurant("+obj.id+")");
	    }        
	});
};

Restaurant.prototype.create = function(name,restaurateur_id,address,city,phone,postalcode) {
      		$.ajax({
			    type: "GET",
			    url: app.config.getContext()+"action/api.php",
			    data:{
			    	action: 'createRestaurant',
			    	name: name,
			    	restaurateur_id:  restaurateur_id,
			    	address: address,
			    	city: city,
			    	phone: phone,
			    	postalcode: postalcode,
				},
			    dataType: "html",
			    success: function(result){
			    	response = $.parseJSON(result);
			    	if(response === 1){
			    		if(restaurateur_id == -1){
							$('#restaurant-create-warning').show();	
			    		}
			    		else{
							$('#restaurant-create-warning').hide();	
			    			$('#restaurant-create-success').show();
			    			$('#restaurant-create-error').hide();	
			    		}
    		     		$('#name').val('');
				    	$('#address').val('');
				    	$('#city').val('');		
				    	$('#phone').val('');
				    	$('#postalcode').val('');
				    	$("#option_restaurateur").val(-1); 		    		
			    	}
			    	else{
			    		$('#restaurant-create-success').hide();
    					$('#restaurant-create-warning').hide();	
			    		$('#restaurant-create-error').show();			    		
			    	}
			    }        
			});  		
};

Restaurant.prototype.update = function(id,name,restaurateur_id,address,city,phone,postalcode) {
      		$.ajax({
			    type: "GET",
			    url: app.config.getContext()+"action/api.php",
			    data:{
			    	action: 'updateRestaurant',
			    	id:id,
			    	name: name,
			    	address: address,
			    	city: city,
			    	phone: phone,
			    	postalcode: postalcode,
			    	restaurateur_id: restaurateur_id,
				},
			    dataType: "html",
			    success: function(result){
			    	response = $.parseJSON(result);
			    	if(response === 1){
			    		if(restaurateur_id == -1){
			    			$('#restaurant-update-warning').show();
			    		}
			    		else{
			    			$('#restaurant-update-success').show();
			    		}
			    		$('#restaurant-update-error').hide();
		    			app.entrepreneur.getRestaurants();			    		
			    	}
			    	else{
			    		$('#restaurant-update-success').hide();
		    			$('#restaurant-update-warning').hide();
			    		$('#restaurant-update-error').show();			    		
			    	}
			    }        
			});
};

Restaurant.prototype.del = function(id) {
	$.ajax({
		type: "GET",
		url:  app.config.getContext()+"action/api.php",
		data:{
			action: 'delRestaurant',
			id: id,
		},
		dataType: "html",
		success: function(result){
			$('#restaurant'+id).remove();
		}        
	});
};

Restaurant.prototype.getMenus = function(id,callback) {
	if(callback == 'restaurateur'){
		$.ajax({
			type: "GET",
			url: app.config.getContext()+"action/api.php",
			data:{
				action: 'getMenus',
			},
			dataType: "html",
			success: function(result){
				$('#menus').html('');
				menus = $.parseJSON(result);
				$.each($.parseJSON(result), function(idx, obj) {
					$('#menus').append('<li><a href="javascript:app.restaurateur.getMenu('+obj.id+')">'+obj.name+'</a></li>');
				});
			}        
		}); 
	}
	if(callback == 'orders'){
		$.ajax({
	    type: "GET",
	    url: app.config.getContext()+"action/api.php",
	    data:{
	    	action: 'getRestaurantMenus',
	    	id:id,
		},
	    dataType: "html",
	    success: function(result){
	    	menu = $.parseJSON(result);
			$('#menus').html('');
			menus = $.parseJSON(result);
			$.each($.parseJSON(result), function(idx, obj) {
				$('#menus').append('<li><a href="javascript:app.order.getPlats('+obj.id+')">'+obj.name+'</a></li>');
			});	
	    }        
	});
	}
};

Restaurant.prototype.gets = function() {
	$.ajax({
	    type: "GET",
	    url: app.config.getContext()+"action/api.php",
	    data:{
	    	action: 'getRestaurants',
		},
	    dataType: "html",
	    success: function(result){
	    	$("#restaurants").html('');
			$.each($.parseJSON(result), function(idx, obj) {
				$("#restaurants").append('<li><a href="javascript:app.order.getMenus('+obj.id+')">'+obj.name+'</a></li>');
			});
	    }        
	});			
};