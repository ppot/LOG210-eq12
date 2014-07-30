function Order () {
	this.id = null;
	this.clientId = null;
	this.addressId = null;
	this.restaurantId = null;
	this.livreurId = null;
	this.noConfirmation = null;
	this.date = null;
	this.time = null;
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
	this.setTime = time;
};

Order.prototype.setState = function(state) {
	this.state = state;
};

Order.prototype.setTotal = function(total) {
	this.total = total;
};

Order.prototype.getOrders = function() {
	$.ajax({
		type: "GET",
		url: app.config.getContext()+"action/api.php",
		data:{
			action: 'getAllOrders',
		},
		dataType: "html",
		success: function(result){
			$('#arrayOrders').html('');
			orders = $.parseJSON(result);
			$.each($.parseJSON(result), function(idx, obj) {
				$("#arrayOrders").append('<tr><td>'+obj.restaurant_id+'</td><td>'+obj.no_confirmation+'</td><td>'+obj.total+'</td><td> <a href="javascript:app.entrepreneur.getLivreur('+obj.id+')" class="a-link">Afficher details</a> <a href="javascript:app.livreur.changeStateToDelivered('+obj.id+')" class="a-link">Livrer</a></td></tr>');
			});
		}        
	}); 
};

//Order.prototype.changeStateDelivered = function(id) {
//	$.ajax({
//	    type: "GET",
//	    url: app.config.getContext()+"action/api.php",
//	    data:{
//	    	action: 'changeStateDelivered',	    	
//	    	id:id
//		},
//	    dataType: "html",
//	    success: function(result){
//			res = $.parseJSON(result);
//	     	
//	    }        
//	}); 
//}

// order.prototype.save = function() {
//  	$.ajax({
// 	    type: "GET",
// 	    url: "/LOG210-eq12/action/api.php",
// 	    data:{
// 	    	action: 'createOrder',	
// 		},
// 	    dataType: "html",
// 	    success: function(result){
 									 	
// 	    }        
// 	});  
// };
