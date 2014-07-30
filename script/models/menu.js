function Menu(){
	this.id = null;
	this.restaurantId = null;
	this.name = null;
	this.plats = new Array();
}
Menu.prototype.setId = function(id) {
	this.id = id;
};

Menu.prototype.setName = function(name) {
	this.name = name;
};

Menu.prototype.get = function(id) {
	$.ajax({
	    type: "GET",
	    url: app.config.getContext()+"action/api.php",
	    data:{
	    	action: 'getMenu',
	    	id:id,
		},
	    dataType: "html",
	    success: function(result){
	    	menu = $.parseJSON(result);
	    	$('#menuUpdateName').val(menu.name);
	    	plat = new Plat();
	    	plat.gets(id,'restaurateur');
	    }        
	});
};

Menu.prototype.create = function(name,menu) {
 	$.ajax({
	    type: "GET",
	    url: app.config.getContext()+"action/api.php",
	    data:{
	    	action: 'addMenu',
	    	name: name,
		},
	    dataType: "html",
	    success: function(result){
	    	console.log(result);
	    	response = $.parseJSON(result);
			for (var i = 0; i < menu.plats.length; i++) {
				plat = menu.plats[i];
				console.log(plat);
				plat.create(response.id);
				app.restaurateur.getMenus();
			}
	    	
	    }        
	}); 
};

Menu.prototype.update = function() {
     $.ajax({
	    type: "GET",
	    url: app.config.getContext()+"action/api.php",
	    data:{
	    	action: 'updateMenu',
	    	id:this.id,
	    	name: this.name,
		},
	    dataType: "html",
	    success: function(result){
	    	console.log(result);
	    	if(result == "true"){
				$('#menu-update-success').show();
				$('#menu-update-error').hide();
				app.restaurateur.getMenus();
	    	}
	    	else{
				$('#menu-update-success').hide();
				$('#menu-update-error').show();
	    	}
	    }        
	}); 
};

Menu.prototype.addPlat = function(plat) {
	this.plats.push(plat);
};

Menu.prototype.removePlat = function() {

};

Menu.prototype.gets = function() {

};