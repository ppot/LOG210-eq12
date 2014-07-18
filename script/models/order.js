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
