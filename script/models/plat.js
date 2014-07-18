function Plat () {
	this.id = null;
	this.menuId = null;
	this.name = null;
	this.price = null;
	this.description = null;
}

Plat.prototype.assign = function(name,price,description) {
	this.name = name;
	this.price = price;
	this.description = description;
};

Plat.prototype.setId = function(id) {
	this.id = id;
};

Plat.prototype.setMenuId = function(menuId) {
	this.menuId = menuId;
};

Plat.prototype.get = function(id,callback) {
 	$.ajax({
	    type: "GET",
	    url: app.config.getContext()+"action/api.php",
	    data:{
	    	action: 'getPlat',
	    	id:id,				
		},
	    dataType: "html",
	    success: function(result){
	    	plat = $.parseJSON(result);
	    	if(callback == 'restaurateur'){
				$('#platNameUpdate').val(plat.name);
				$('#platPriceUpdate').val(plat.price);
				$('#platDescriptionUpdate').val(plat.description);
	    	}

	    }        
	}); 
};

Plat.prototype.create = function(menuId) {
	this.menuId = menuId;

	$.ajax({
	    type: "GET",
	    url:  app.config.getContext()+"action/api.php",
	    data:{
	    	action: 'createPlat',
	    	menu_id: menuId,
	    	name: this.name,
	    	price: this.price,			    	
	    	description: this.description,				
		},
	    dataType: "html",
	    success: function(result){
	    	console.log(result);
	    	plat = $.parseJSON(result);
	    }        
	}); 
};

Plat.prototype.update = function(menuId) {
	$.ajax({
	    type: "GET",
	    url: app.config.getContext()+"action/api.php",
	    data:{
	    	action: 'updatePlat',
	    	id:menuId,
	    	name: this.name,
	    	price: this.price,			    	
	    	description: this.description,				
		},
	    dataType: "html",
	    success: function(result){
	    	response = $.parseJSON(result);
	    	plat = new Plat();
	    	plat.gets(response.menu_id,'restaurateur');
	    }        
	}); 		
};

Plat.prototype.del = function(id) {
 	$.ajax({
	    type: "GET",
	    url: app.config.getContext()+"action/api.php",
	    data:{
	    	action: 'delPlat',
	    	id:id,			
		},
	    dataType: "html",
	    success: function(result){
	    	response = $.parseJSON(result);
	    	$('#plat'+id).remove();
	    	plat = new Plat();
	    	plat.gets(response.menu_id,'restaurateur');
	    }        
	}); 

};

Plat.prototype.gets = function(menuId,callback) {
	$.ajax({
	    type: "GET",
	    url:  app.config.getContext()+"action/api.php",
	    data:{
	    	action: 'getPlats',
	    	menu_id:menuId,				
		},
	    dataType: "html",
	    success: function(result){
	    	if(callback == 'restaurateur'){
		    	$('#menuPlats').html('');
				$.each($.parseJSON(result), function(idx, obj) {
		    		$("#menuPlats").append('<tr id="plat'+obj.id+'"><td>'+obj.name+'</td><td>'+Number(obj.price).toFixed(2)+'</td><td>'+obj.description+'</td><td> <a href="javascript:app.restaurateur.displayUpdatePlat('+obj.id+')" class="a-link">modifier</a> <a href="javascript:app.restaurateur.delPlat('+obj.id+')" class="a-link">delete</a></td></tr>');
				});
	    	}

	    	if(callback == 'clients'){
		    	$('#plats-index').html('');
				$.each($.parseJSON(result), function(idx, obj) {
		    		$('#plats-index').append('<div class="col-md-4"><div  class="box restaurants main-content-hover plats-opa" ><strong>'+obj.name+'</strong><span class="pull-right">'+Number(obj.price).toFixed(2)+'$  <a href="javascript:app.order.order('+obj.id+')"> commander </a></span></br><span>'+obj.description+'</span></div></div>');
				});
	    	}

	    	if(callback == 'others'){
		    	$('#plats-index').html('');
				$.each($.parseJSON(result), function(idx, obj) {
		    		$('#plats-index').append('<div class="col-md-4"><div  class="box restaurants main-content-hover plats-opa" ><strong>'+obj.name+'</strong><span class="pull-right">'+Number(obj.price).toFixed(2)+'$</span></br><span>'+obj.description+'</span></div></div>');
				});
	    	}
			    	
	    }        
	}); 
};