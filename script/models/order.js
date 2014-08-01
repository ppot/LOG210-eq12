function Order () {
	this.id = null;
	this.clientId = null;
	this.addressId = null;
	this.restaurantId = null;
	this.livreurId = null;
	this.noConfirmation = null;
	this.date = null;
	this.temps = null;
	this.state = null;
	this.total =null;
}

Order.prototype.setClientId = function(id) {
	this.clientId = id;
};

Order.prototype.setAddressId = function(id) {
	this.addressId = id;
};
Order.prototype.setRestaurantId = function(id) {
	this.restaurantId = id;
};
Order.prototype.setLivreurId = function(id) {
	this.livreurId = id;
};

Order.prototype.setNoConfirmation = function(no) {
	this.noConfirmation = no;
};

Order.prototype.setDate = function(date) {
	this.date = date;
};

Order.prototype.setTime = function(time) {
	this.temps = time;
};

Order.prototype.setState = function(state) {
	this.state = state;
};

Order.prototype.setTotal = function(total) {
	this.total = total;
};

Order.prototype.get = function(id) {
	$.ajax({
	    type: "GET",
	    url: app.config.getContext()+"action/api.php",
	    data:{
	    	action: 'getOrder',
	    	order_id:id,
		},
	    dataType: "html",
	    success: function(result){
	    	order = $.parseJSON(result);
	    	$('#orderId').text(order.no_confirmation);
	    	$('#order_total').text(order.total);
	    }        
	});
};

Order.prototype.getItems = function(id) {
 	$.ajax({
	    type: "GET",
	    url: app.config.getContext()+"action/api.php",
	    data:{
	    	action: 'getOrderItems',
	    	order_id:id,				
		},
	    dataType: "html",
	    success: function(result){
			$.each($.parseJSON(result), function(idx, obj) {
	    	 	$.ajax({
				    type: "GET",
				    url: app.config.getContext()+"action/api.php",
				    data:{
				    	action: 'getPlat',
				    	id:obj.plat_id,				
					},
				    dataType: "html",
				    success: function(result){
				    	plat = $.parseJSON(result);
				    	$('#order-items').html('');
				    	$('#order-items').append('<tr id="cart_item"'+plat.id+'>><td>'+plat.name+'</td><td>'+plat.price+'$</td><td class="pull-right" id="qte_"'+plat.id+'>'+obj.quantity+'</td></tr>');
				    }        
				});	
			});


	    }        
	}); 
};

Order.prototype.ready = function(id) {
	$.ajax({
	    type: "GET",
	    url: app.config.getContext()+"action/api.php",
	    data:{
	    	action: 'orderReady',
	    	order_id:id,
		},
	    dataType: "html",
	    success: function(result){
	    	order = $.parseJSON(result);
			$('#order'+id).remove();
			var socket = io('http://localhost:3000');
			socket.emit('newDeliveryOrder',order.id);
			socket.emit('disconnect');
	    }        
	});
};

Order.prototype.deliver = function(id) {
	$.ajax({
	    type: "GET",
	    url: app.config.getContext()+"action/api.php",
	    data:{
	    	action: 'orderDeliver',
	    	order_id:id,
		},
	    dataType: "html",
	    success: function(result){
	    	order = $.parseJSON(result);
			$('#order'+id).remove();
	    }        
	});
};


Order.prototype.setClientAddress = function(id) {
	$(document).ready(function(){
		$.ajax({
		    type: "GET",
		    url: app.config.getContext()+"action/api.php",
		    data:{
		    	action: 'getDeliveryAddressByUserId',
		    	id: id				
			},
		    dataType: "html",
		    success: function(result){
		     	address = $.parseJSON(result);
		    	$('#route_de_livraison_client').val(address.postalcode);     	
		    }        
		});   		
	});
};

Order.prototype.setRestaurantAddress = function(id) {
	$.ajax({
	    type: "GET",
	    url: app.config.getContext()+"action/api.php",
	    data:{
	    	action: 'getOrder',
	    	order_id:id,
		},
	    dataType: "html",
	    success: function(result){
	    	order = $.parseJSON(result);

	    	$.ajax({
			    type: "GET",
			    url: app.config.getContext()+"action/api.php",
			    data:{
			    	action: 'getRestaurant',
			    	id: order.id,
				},
			    dataType: "html",
			    success: function(result){
			    	restaurant = $.parseJSON(result);
			    	$('#route_de_livraison_restaurant').val(restaurant.address.postalcode);
			    }        
			});
	    }        
	});
};

