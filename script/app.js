app = (function(){

	var config = (function(){

		var context = "/210/";

		function getContext(){
			return context;
		}
    	return{
    		getContext:getContext,
	    }
	})();

	function init(){

	}

	var general = (function(){
		function init(){

		}

		function redirect(path){
			window.location.href =  path;
		}

			var index = (function(){ 
				function init(){
					$('#login').show();
					$('#register').hide();
					$('#auth-error').hide();
		    		$('#register-error').hide();
					$('#register-success').hide();
				}

				function login_hash(){
					$('#login').show();
					$('#register').hide();
					$('html, body').animate({scrollTop:$('#auth').position().top}, 'slow');

				}

				function register_hash(){
					$('#login').hide();
					$('#register').show();
					$('html, body').animate({scrollTop:$('#auth').position().top}, 'slow');
				}

		    	return{
		    		init:init,
					login_hash:login_hash,
					register_hash:register_hash,
			    }
			})();

			var profile = (function(){ 
				function init(){
		    		$('#update-password-error').hide();
		    		$('#update-password-success').hide();
		    		$('#update-address-error').hide();
		    		$('#update-address-success').hide();		    		
				}
		    	return{
		    		init:init,
			    }
			})();

			var entrepreneur = (function(){ 

				function init(){
					hide();
				}

				function hide(){
		    		$('#addRestaurateur').hide();
		    		$('#listRestaurateurs').hide();
		    		$('#updateRestaurateur').hide();
		    		$('#addRestaurant').hide();
		    		$('#listRestaurants').hide();
		    		$('#updateRestaurant').hide();	
		    		$('#addLivreur').hide();
		    		$('#listLivreurs').hide();
		    		$('#updateLivreur').hide();


		    		$('#restaurateur-create-success').hide();
		    		$('#restaurateur-create-error').hide();	    		
					$('#restaurateur-update-success').hide();
					$('#restaurateur-update-error').hide();   		
		    		$('#restaurant-update-success').hide();
		    		$('#restaurant-update-error').hide();
		    		$('#restaurant-create-error').hide();
		    		$('#restaurant-create-success').hide();	
					$('#restaurant-update-warning').hide();
					$('#restaurant-create-warning').hide();	
					$('#restaurateur-update-warning').hide();	
					$('#restaurateur-create-warning').hide();

		    		$('#livreur-create-error').hide();	 
		    		$('#livreur-create-success').hide();	  
		    		$('#livreur-update-success').hide();
					$('#livreur-update-error').hide();  				
				}

				function addRestaurateur(){
					hide();
					$('#addRestaurateur').show();

		     		$.ajax({
					    type: "GET",
					    url: app.config.getContext()+"action/api.php",
					    data:{
					    	action: 'getRestaurantsNoRestaurateur',
						},
					    dataType: "html",
					    success: function(result){
					    	$("#option_restaurant").html('');
					    	$("#option_restaurant").append('<option value="-1">aucun</option>');
							$.each($.parseJSON(result), function(idx, obj) {
								$("#option_restaurant").append('<option value="'+obj.id+'">'+obj.id+" : "+obj.name+'</option>');
							});
							$('option_restaurant').val('-1');
					    }        
					});					
					// $('html, body').animate({scrollTop:$('#auth').position().top}, 'slow');
				}

				function restaurateurs(){
					hide();
					app.entrepreneur.getRestaurateurs();
					$('#listRestaurateurs').show();
					// $('html, body').animate({scrollTop:$('#auth').position().top}, 'slow');
				}

				function updateRestaurateur(){
					// hide();
					$('#updateRestaurateur').show();

		     		$.ajax({
					    type: "GET",
					    url: app.config.getContext()+"action/api.php",
					    data:{
					    	action: 'getRestaurants',
						},
					    dataType: "html",
					    success: function(result){
					    	$("#option_restaurant-update").html('');
					    	$("#option_restaurant-update").append('<option value="-1">aucun</option>');
							$.each($.parseJSON(result), function(idx, obj) {
								$("#option_restaurant-update").append('<option value="'+obj.id+'">'+obj.id+" : "+obj.name+'</option>');
							});
							$('option_restaurant-update').val('-1');
					    }        
					});

					$('html, body').animate({scrollTop:$('#updateRestaurateur').position().top}, 'slow');
				}

				function addRestaurant(){
					hide();
					$('#addRestaurant').show();

		     		$.ajax({
					    type: "GET",
					    url: app.config.getContext()+"action/api.php",
					    data:{
					    	action: 'getRestaurateursNotInRestaurants',
						},
					    dataType: "html",
					    success: function(result){
					    	$("#option_restaurateur").html('');
					    	$("#option_restaurateur").append('<option value="-1">aucun</option>');
							$.each($.parseJSON(result), function(idx, obj) {
								$("#option_restaurateur").append('<option value="'+obj.id+'">'+obj.id+" : " + obj.firstname+" "+obj.lastname+" : "+obj.mail+'</option>');
							});
							$('option_restaurateur').val('-1');
					    }        
					});

					// $('html, body').animate({scrollTop:$('#auth').position().top}, 'slow');
				}

				function restaurants(){
					hide();
					app.entrepreneur.getRestaurants();
					$('#listRestaurants').show();

					// $('html, body').animate({scrollTop:$('#auth').position().top}, 'slow');
				}

				function updateRestaurant(){
					// hide();
					$('#updateRestaurant').show();

		     		$.ajax({
					    type: "GET",
					    url: app.config.getContext()+"action/api.php",
					    data:{
					    	action: 'getRestaurateurs',
						},
					    dataType: "html",
					    success: function(result){
					    	$("#option_restaurateur-update").html('');
					    	$("#option_restaurateur-update").append('<option value="-1">aucun</option>');
							$.each($.parseJSON(result), function(idx, obj) {
								$("#option_restaurateur-update").append('<option value="'+obj.id+'">'+obj.id+" : " +obj.firstname+" "+obj.lastname+" : "+obj.mail+'</option>');
							});
							$('option_restaurateur-update').val('-1');
					    }        
					});	

					$('html, body').animate({scrollTop:$('#updateRestaurant').position().top}, 'slow');
				}

				function livreurs(){
					hide();
					app.entrepreneur.getLivreurs();
					$('#listLivreurs').show();
				}				

				function addLivreur(){
					hide();
					$('#addLivreur').show();
				}

				function updateLivreur(){
					$('#updateLivreur').show();
					$('html, body').animate({scrollTop:$('#updateLivreur').position().top}, 'slow');
				}

		    	return{
		    		init:init,
		    		addRestaurateur:addRestaurateur,
		    		restaurateurs:restaurateurs,
		    		updateRestaurateur:updateRestaurateur,
		    		addRestaurant:addRestaurant,
		    		restaurants:restaurants,
		    		updateRestaurant:updateRestaurant,
		    		addLivreur:addLivreur,
		    		livreurs:livreurs,
		    		updateLivreur:updateLivreur,		    		
			    }
			})();

		return{
	    	init:init,
	    	redirect:redirect,
	    	index:index,
	    	profile:profile,
	    	entrepreneur:entrepreneur,
    	}
	})();

	var users = (function(){
		var user = new User(); 

    	function init(){
    	}

    	function register(){
			user.register(
				$('#r-firstname').val(),
		    	$('#r-lastname').val(),
		    	$('#r-password').val(),
		    	$('#r-mail').val(),
		    	$('#r-birthdate').val(),
		    	$('#r-address').val(),
		    	$('#r-city').val(),
		    	$('#r-phone').val(),
		    	$('#r-postalcode').val()
			);
    	}

    	function updatePassword(){
    		user.update($('#md-password').val());
    	}

     	function updateAddress(){
    		user.updateAddress($('#md-address').val(),$('#md-city').val(),$('#md-postalcode').val(),$('#md-phone').val());
    	}   	

    	function oauth(){
    		user.oauth(
    			$('#l-mail').val(),
    			$('#l-password').val()
    		);
    	}

    	function out(){
    		user.out();
    	}

		function getAddress(){
			user.getAddress();
		}

		function get(){
			user.get();
			user.address();
		}

    	return{
			init:init,
			register:register,
			oauth:oauth,
			out:out,
			getAddress:getAddress,
			get:get,
			updatePassword:updatePassword,
			updateAddress:updateAddress,
	    }
	})();

	var entrepreneur = (function(){
		var restaurateur = new Restaurateur();
		var restaurant = new Restaurant();
		var livreur = new Livreur();
    	function init(){}

    	function createRestaurateur(){
			$('#restaurateur-create-warning').hide();
			$('#restaurateur-create-success').hide();
			$('#restaurateur-create-error').hide();	

    		restaurateur.create(
    			$('#firstname').val(),
    			$('#lastname').val(),
    			$('#password').val(),
    			$('#mail').val(),
    			$("#option_restaurant option:selected").val()
    		);
    	}

    	function delRestautateur(id){
    		restaurateur.del(id);
    	}

		function createRestaurant(){

			$('#restaurant-create-warning').hide();	
			$('#restaurant-create-success').hide();
			$('#restaurant-create-error').hide();	

			restaurant.create(
				$('#name').val(),
				$("#option_restaurateur option:selected").val(),
				$('#address').val(),
				$('#city').val(),
				$('#phone').val(),
				$('#postalcode').val()
			);
    	}

    	function getRestaurateurs(){
    		$.ajax({
			    type: "GET",
			    url: app.config.getContext()+"action/api.php",
			    data:{
			    	action: 'getRestaurateurs',
				},
			    dataType: "html",
			    success: function(result){
			    	$("#arrayRestaurateurs").html('');
					$.each($.parseJSON(result), function(idx, obj) {
			    		$("#arrayRestaurateurs").append('<tr id="restaurateur'+obj.id+'"><td>'+obj.mail+'</td><td>'+obj.firstname+'</td><td>'+obj.lastname+'</td><td> <a href="javascript:app.entrepreneur.getRestaurateur('+obj.id+')" class="a-link">Modifier</a> <a href="javascript:app.entrepreneur.delRestautateur('+obj.id+')" class="a-link">delete</a></td></tr>');
					});
			    }        
			});
    	}

    	function getRestaurants(){
    		$.ajax({
			    type: "GET",
			    url:  app.config.getContext()+"action/api.php",
			    data:{
			    	action: 'getRestaurants',
				},
			    dataType: "html",
			    success: function(result){
					$("#arrayRestaurants").html('');
					$.each($.parseJSON(result), function(idx, obj) {
			    		$("#arrayRestaurants").append('<tr id="restaurant'+obj.id+'"><td>'+obj.name+'</td><td>'+obj.restaurateur_id+'</td><td><address><strong>'+obj.address.address+'</strong><br>'+obj.address.city+','+obj.address.postalcode+'<br>'+obj.address.phone+'</address></td><td> <a href="javascript:app.entrepreneur.getRestaurant('+obj.id+')" class="a-link">modifier</a> <a href="javascript:app.entrepreneur.delRestaurant('+obj.id+')" class="a-link">delete</a></td></tr>');
					});
			    }        
			});
    	} 

    	function updateRestaurateurPassword(id){
      		$('#restaurateur-update-success').hide();
			$('#restaurateur-update-warning').hide();			    		
    		$('#restaurateur-update-error').hide();
    		  		
    		restaurateur.updatePassword(
    			id,			
    			$('#updatePassword').val()
    		);
    	}  

    	function updateRestaurateurRestaurant(id){
    		$('#restaurateur-update-success').hide();
			$('#restaurateur-update-warning').hide();			    		
    		$('#restaurateur-update-error').hide();

    		restaurateur.updateRestaurant(
    			id,
    			$("#option_restaurant-update option:selected").val()
    			);
    	} 

		function updateRestaurant(id){
    		$('#restaurant-update-success').hide();
			$('#restaurant-update-warning').hide();
    		$('#restaurant-update-error').hide();

    		restaurant.update(
    			id,
				$('#updateName').val(),
				$("#option_restaurateur-update option:selected" ).val(),
				$('#updateAddress').val(),
				$('#updateCity').val(),
				$('#updatePhone').val(),
				$('#updatePostalcode').val()
    		); 		
    	}

    	function delRestaurant(id){
    		restaurant.del(id);
    	}
 	

    	function getRestaurateur(id){
    		app.general.entrepreneur.updateRestaurateur();
    		restaurateur.get(id);
    		restaurateur.getRestaurant(id);
    	}

    	function getRestaurant(id){
    		app.general.entrepreneur.updateRestaurant();
    		restaurant = new Restaurant();
    		restaurant.get(id);
    	}

    	function createLivreur(){
			$('#livreur-create-warning').hide();
			$('#livreur-create-success').hide();
			$('#livreur-create-error').hide();	

    		livreur.create(
    			$('#livFirstname').val(),
    			$('#livLastname').val(),
    			$('#livPassword').val(),
    			$('#livMail').val()
    		);
    	}

    	function updateLivreur(id){
      		$('#livreur-update-success').hide();
			$('#livreur-update-warning').hide();			    		
    		$('#livreur-update-error').hide();
    		  		
    		livreur.updatePassword(
    			id,			
    			$('#updateLivPassword').val()
    		);
    	}


       	function delLivreur(id){
    		livreur.del(id);
    	}
    	
	   	function getLivreurs(){
    		$.ajax({
			    type: "GET",
			    url: app.config.getContext()+"action/api.php",
			    data:{
			    	action: 'getLivreurs',
				},
			    dataType: "html",
			    success: function(result){
			    	$("#arrayLivreurs").html('');
					$.each($.parseJSON(result), function(idx, obj) {
			    		$("#arrayLivreurs").append('<tr id="livreur'+obj.id+'"><td>'+obj.mail+'</td><td>'+obj.firstname+'</td><td>'+obj.lastname+'</td><td> <a href="javascript:app.entrepreneur.getLivreur('+obj.id+')" class="a-link">Modifier</a> <a href="javascript:app.entrepreneur.delLivreur('+obj.id+')" class="a-link">delete</a></td></tr>');
					});
			    }        
			});
    	}  
    	
	   	function getLivreur(id){
    		app.general.entrepreneur.updateLivreur();
    	   	livreur.get(id);
    	}	 	


    	return{
			init:init,
			createRestaurateur:createRestaurateur,
			createRestaurant:createRestaurant,
			getRestaurateurs:getRestaurateurs,
			getRestaurateur:getRestaurateur,
			getRestaurants:getRestaurants,
			getRestaurant:getRestaurant,
			updateRestaurateurPassword:updateRestaurateurPassword,
			updateRestaurateurRestaurant:updateRestaurateurRestaurant,
			updateRestaurant:updateRestaurant,
			delRestautateur:delRestautateur,
			delRestaurant:delRestaurant,
			createLivreur:createLivreur,
			getLivreurs:getLivreurs,
			getLivreur:getLivreur,
			updateLivreur:updateLivreur,
			delLivreur:delLivreur,
	    }
	})();

	var restaurateur = (function(){
		var restaurant = new Restaurant();
		var menu = new Menu();
		function init(){
    		$('#menuCreate').hide();
    		$('#menuUpdate').hide();
     		$('#lstorders').hide();   		
			$('#updateOrder').hide();	


		}

		function menus(){
			$('#menu').show();
    		$('#menuCreate').hide();
    		$('#menuUpdate').hide();
			$('#odr').hide();
		}

		function getMenus(){
			restaurant.getMenus(null,'restaurateur');
		}	

		function addMenu(){
			$('#menu').show();	
			$('#odr').hide();	
    		$('#menuCreate').show();
    		$('#menuUpdate').hide();


			$('#menu-create-error').hide();
			$('#menu-create-success').hide();

			$('#plat-assign-error').hide();
			$('#plat-assign-warning').hide();
			$('#plat-assign-success').hide();			
		}

		function updateMenu(id){
			name = $('#menuUpdateName').val();
			if(!name){
				$('#menu-update-error').show();	
				$('#menu-update-success').hide();		
			}
			else{
				menu.setId(id);
				menu.setName(name);
				menu.update();
				menu = new Menu();
			}			
		}

		function getMenu(id){
			$('#menu').show();	
    		$('#menuCreate').hide();
    		$('#menuUpdate').show();
    		$('#plats').hide();
			$('#addPlat').hide();
			$('#updatePlat').hide();
			$('#menu-update-success').hide();
			$('#menu-update-error').hide();

    		menu.get(id);

			$('#herfmenuUpdate').attr("href","javascript:app.restaurateur.updateMenu("+id+")");	
			$('#newPlat').attr("href","javascript:app.restaurateur.displayAddPlat()");	
			$('#hrefNewPlat').attr("href","javascript:app.restaurateur.addPlat("+id+")");	
			$('#getPlats').attr("href","javascript:app.restaurateur.displayPlats()");
		}

		function displayPlats(){
			$('#plats').show();
			$('#addPlat').hide();
			$('#updatePlat').hide();
		}

		function displayAddPlat(){
			$('#plats').hide();
			$('#addPlat').show();
			$('#updatePlat').hide();	

			$('#plat-create-error').hide();
			$('#plat-create-warning').hide();
			$('#plat-create-success').hide();			
		}

		function displayUpdatePlat(id){		
			$('#updatePlat').show();

			$('#plat-update-error').hide();
			$('#plat-update-success').hide();
			$('#plat-update-warning').hide();


			$('#hrefUpdatePlat').attr("href","javascript:app.restaurateur.updatePlat("+id+")");
			plat = new Plat();
			plat.get(id,'restaurateur');			
		}


		function createMenu(){
			menu.setName($('#menuName').val());

			$('#menu-create-error').hide();
			$('#menu-create-success').hide();


			name = $('#menuName').val();

			if(!name){
				$('#menu-create-error').show();		
				$('#menu-create-error-message').text('le nom est oubligatoire');	

			}

			if(menu.plats.length<1){
				$('#menu-create-error').show();
				$('#menu-create-error-message').text('il doit y avoir au moins un plat d\'assigner');	
						
			}
			else{
				menu.create(name,menu);
				menu = new Menu();
				$('#menu-create-success').show();
			}		
		}

		function assignPlat(){
			$('#plat-assign-error').hide();
			$('#plat-assign-warning').hide();
			$('#plat-assign-success').hide();

			name = $('#assignPlatName').val();
			price = $('#assignPlatPrice').val();
			description = $('#assignPlatDescription').val();
			if(!name || !price){
				$('#plat-assign-error').show();
			}
			else {
				if(!description){
					plat = new Plat();
					plat.assign(
						$('#assignPlatName').val(),
						$('#assignPlatPrice').val(),
						$('#assignPlatDescription').val()
					);

					menu.addPlat(plat);
					$('#plat-assign-warning').show();
				}
				else{
					plat = new Plat();
					plat.assign(
						$('#assignPlatName').val(),
						$('#assignPlatPrice').val(),
						$('#assignPlatDescription').val()
					);

					menu.addPlat(plat);
					$('#plat-assign-success').show();
				}

				$('#assignPlatName').val("");
				$('#assignPlatPrice').val("");
				$('#assignPlatDescription').val("");
			}
		}

		function addPlat(id){
			$('#plat-create-error').hide();
			$('#plat-create-warning').hide();
			$('#plat-create-success').hide();

			name = $('#platName').val();
			price = $('#platPrice').val();
			description = $('#platDescription').val();

			if(!name || !price){
				$('#plat-create-error').show();
			}
			else {
				plat = new Plat();
				plat.assign(name,price,description);
				if(!description){
					plat.create(id);
					$('#plat-create-warning').show();
				}
				else{
					plat.create(id)
					$('#plat-create-success').show();
				}
			}		
		}

		function updatePlat(id){
			$('#plat-update-error').hide();
			$('#plat-update-success').hide();
			$('#plat-update-warning').hide();

			name = $('#platNameUpdate').val();
			price = $('#platPriceUpdate').val();
			description = $('#platDescriptionUpdate').val();

			if(!name || !price){
				$('#plat-update-error').show();
			}
			else {
				plat = new Plat();
				plat.assign(name,price,description);
				if(!description){
					plat.update(id);
					$('#plat-update-warning').show();
				}
				else{
					plat.update(id);
					$('#plat-update-success').show();
				}
			}
		}

		function delPlat(id){
			plat = new Plat();
			plat.del(id);
		}

		function orders(){
			$('#menu').hide();
			$('#odr').show();			
			$('#lstorders').show();	
			$('html, body').animate({scrollTop:$('#lstorders').position().top}, 'slow');
		}

		function displayPlatPreparation(id){
			order = new Order();
			order.get(id);
			order.getItems(id);
			$('#updateOrder').show();	
			$('html, body').animate({scrollTop:$('#updateOrder').position().top}, 'slow');
			$('#ready-order').attr("href","javascript:app.order.ready("+id+")"); 	
		}

		return{
			init:init,
			menus:menus,
			getMenus:getMenus,
			getMenu:getMenu,
			addMenu:addMenu,
			createMenu:createMenu,
			assignPlat:assignPlat,
			updateMenu:updateMenu,
			displayPlats:displayPlats,
			displayAddPlat:displayAddPlat,
			addPlat:addPlat,
			displayUpdatePlat:displayUpdatePlat,
			updatePlat:updatePlat,
			delPlat:delPlat,
			orders:orders,
			displayPlatPreparation:displayPlatPreparation,

		}
	})();

	var order = (function(){
		var restaurant = new Restaurant();
		var menu = new Menu();
		var cart = null;
		var viewType = null;
		var command = new Order();

		function getRestaurants(){
	    	$('#plats-index').html('');

			restaurant.gets();
		}

		function getMenus(id){
			restaurant.getMenus(id,'orders');
			command.setRestaurantId(id);
	    	$('#plats-index').html('');

		}

		function getPlats(id){
			plat = new Plat();
			plat.gets(id,viewType);
		}

		function setViewType(type){
			viewType = type;
			if(type =='clients'){
	 			// $('#isCart').hide();
	 			$('#cart').hide();	
				$('#qte-error').hide();
	 			$('#confirmRequest').hide();
			}
		}

		function isCart(){
 			$('#cart').show();	
			$('#order-success').hide();
			$('#order-not-confirm').show();
			$('#showNewAddress').show();
			$('#list-addr').show();
			$('#newAddress-error').hide();

	    	$('#process-link').show();
	    	$('#paypal-link').hide();

			$('#cart-items').html('');
			$('#paypal_item').html('');
			for (var i = 0; i <  cart.items.length; i++) {
				item = cart.items[i];
				id = i+1;
				$('#cart-items').append('<tr id="cart_item'+item.id+'"><td>'+item.plat.name+'</td><td>'+Number(item.plat.price).toFixed(2)+'$</td><td class="pull-right" id="qte_'+item.id+'">'+item.qte+'</td></tr>');
				$('#paypal_item').append('<div id = "item_'+id+'" class = "itemwrap"> <input name = "item_name_'+id+'" value = "'+item.plat.name+'" type = "hidden"> <input name = "quantity_'+id+'" value = "'+item.qte+'" type = "hidden"><input name = "amount_'+id+'" value = "'+Number(item.plat.price).toFixed(2)+'" type = "hidden"></div>');
			}

			$.ajax({
			    type: "GET",
			    url: app.config.getContext()+"action/api.php",
			    data:{
			    	action: 'getDeliveryAddress',				
				},
			    dataType: "html",
			    success: function(result){
			     	address = $.parseJSON(result);

			     	command.setAddressId(address.id);
			     	command.setClientId(address.addressebleId);

	 				$('#address').text(address.address);	
 					$('#postalcode').text(address.postalcode);
 					$('#city').text(address.city); 	
 					$('#phone').text(address.phone);

					    var now     = new Date(); 
					    var year    = now.getFullYear();
					    var month   = now.getMonth()+1; 
					    var day     = now.getDate();
					    var hour    = now.getHours();
					    var minute  = now.getMinutes();
					    var second  = now.getSeconds();

 	 				$('#orderDate').val(year+'-'+month+'-'+day);	
 	 				$('#orderTime').val(hour+':'+minute+':'+second);	
			    }        
			});   		
		 	$('#cart_total').text(cart.total());

			app.users.getAddress();

			$('#newAddress').hide();

			$('html, body').animate({scrollTop:$('#cart').position().top}, 'slow');
		}

		function confirmRequestItem(id){
			qte = $('#confirmQTE').val();
			if(qte<=0){
				$('#qte-error').show();
			}
			else{
				if(cart == null ){
					 cart = new Cart();
					 $('#header-cart').append('<a id="isCart" href="javascript:app.order.isCart()" class="cart glyphicon glyphicon-shopping-cart"></a>');
					 // $('#isCart').show();
				}
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
				    	item = cart.find(plat.id);
				    	if(item == null){
				    		pModel = new Plat();
				    		pModel.setId(plat.id);
				    		pModel.setMenuId(plat.menu_id);
				    		pModel.assign(plat.name,Number(plat.price).toFixed(2),plat.description);
							cart.add(new cartItem(plat.id,pModel,qte));
				    	}
				    	else{
	    		 			cart.items[item].updateQTE(qte);
				    	}
		 				$('#confirmRequest').hide();
				    }        
				}); 						
			}
		}

		function orderConfirmQteClose(){
 			$('#confirmRequest').hide();
		}

		function order(id){
		$('#confirmRequest').show();	
		$('#qte-error').hide();
		// $('#cart').hide();	

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
	    			$('#confirmName').text(plat.name);
	    			$('#confirmPrice').text(Number(plat.price).toFixed(2)+"$");
	    			$('#confirmDescription').text(plat.description);
					$('#confirmRequestItem').attr("href","javascript:app.order.confirmRequestItem("+id+")");
			    }        
			}); 			
		}

		function showNewAddress(){
			$('#newAddress').show();
		}

		function process(){
    		command.setDate($('#orderDate').val());
    		command.setTime($('#orderTime').val());
    		command.setState(false);
    		command.setTotal(cart.total());
			
			$('#ordeDate-success').text($('#orderDate').val());
			$('#ordeTime-success').text($('#orderTime').val());			

			$.ajax({
			    type: "GET",
			    url: app.config.getContext()+"action/api.php",
			    data:{
			    	action : "processCart",
			    	cart : JSON.stringify(cart.items),
			    	command: JSON.stringify(command),
				},
			    dataType: "html",
			    success: function(result){
			    	$('#process-link').hide();
			    	$('#paypal-link').show();
			    }        
			});	



			// $('#header-cart').html('');
			$('#qte-error').hide();
			$('#confirmRequest').hide();
    	}

		function user_new_deliveryAddress(){
			var rePhone =/^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/;
			var reAddress = /^([0-9]+)([A-Z])?,\s(?:(.*?)\s(?:APP|APT)\s(.*)|(.*))$/mgi;	
			var rCity =/^[A-Za-z\s]{1,}[\-]{0,1}[A-Za-z\s]{0,}$/;
			var rePostal = /(^[ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ]\d[ABCEGHJKLMNPRSTVWXYZ]\d$)/;

			var validPhone = rePhone.test($('#n_phone').val());
			var validAddress = reAddress.test($('#n_address').val());
			var validCity = rCity.test($('#n_city').val());
			var validPostal = rePostal.test($('#n_postalcode').val());


			if(!validPhone || !validAddress || !validCity || !validPostal){
				$('#newAddress-error').show();
				$('#newAddress-error-message').text(' ');
				if(!validPhone )
				{
					$('#newAddress-error-message').append('<span>phone non conforme</span></br>');
				}
				if(!validAddress)
				{
					$('#newAddress-error-message').append('<span>address non conforme</span></br>');
				}
				if(!validCity )
				{
					$('#newAddress-error-message').append('<span>city non conforme</span></br>');
				}
				if(!validPostal)
				{
					$('#newAddress-error-message').append('<span>postalcode non conforme</span></br>');
				}
			}
			else{
				$.ajax({
				    type: "GET",
				    url: app.config.getContext()+"action/api.php",
				    data:{
				    	action: 'newDeliveryAddress',
				    	address: $('#n_address').val(),
				    	city: $('#n_city').val(),
				    	phone: $('#n_phone').val(),
				    	postalcode: $('#n_postalcode').val(),
					},
				    dataType: "html",
				    success: function(result){
				    	res = $.parseJSON(result);
				     	command.setAddressId(res.id);
		 				$('#address').text(res.address);	
	 					$('#postalcode').text(res.postalcode);
	 					$('#city').text(res.city); 	
	 					$('#phone').text(res.phone);
						$('#newAddress-error').hide();
						$('#newAddress').hide();
				    }        
				});		
			}		
					
		}

    	function setAddress(id){
			$('#newAddress').hide();

			$.ajax({
			    type: "GET",
			    url: app.config.getContext()+"action/api.php",
			    data:{
			    	action: 'changeDeliveryAddress',
			    	id: id,
				},
			    dataType: "html",
			    success: function(result){
			    	res = $.parseJSON(result);
			     	command.setAddressId(res.id);
	 				$('#address').text(res.address);	
 					$('#postalcode').text(res.postalcode);
 					$('#city').text(res.city); 	
 					$('#phone').text(res.phone);
			    }        
			});	
    	}

    	function ready(id){
    		order = new Order();
    		order.ready(id); 
			$('html, body').animate({scrollTop:$('#lstorders').position().top}, 'slow');
			$('#ready-order').attr("href","");  
			$('#updateOrder').hide();
    	}

    	function deliver(id){
    		order = new Order();
    		order.deliver(id); 
  			$('html, body').animate({scrollTop:$('#lstorders').position().top}, 'slow');
			$('#ready-order').attr("href","");  
			$('#ggl').hide();  		   		
    	}

		return {
			init:init,
			getRestaurants:getRestaurants,
			getMenus:getMenus,
			setViewType:setViewType,
			getPlats:getPlats,
			order:order,
			isCart:isCart,
			orderConfirmQteClose:orderConfirmQteClose,
			confirmRequestItem:confirmRequestItem,
			user_new_deliveryAddress:user_new_deliveryAddress,
			setAddress:setAddress,
			showNewAddress:showNewAddress,	
			process:process,
			ready:ready,
			deliver:deliver,
		}

	})();

	var livreur = (function(){

			function init(){
				$('#ggl').hide(); 	
			}

		    function afficher_commande_details(id,restaurant_id,clientId) {
				$('#ggl').show(); 	
				order = new Order();
				order.get(id);
				order.getItems(id);
				order.setRestaurantAddress(restaurant_id);
				order.setClientAddress(clientId);

				$('html, body').animate({scrollTop:$('#updateOrder').position().top}, 'slow');
				$('#order-delivery').attr("href","javascript:app.order.deliver("+id+")"); 	
		    }

		return{
			init:init,
			afficher_commande_details:afficher_commande_details,
		}
	})();

	return{
		init:init,
		config:config,
		general:general,
		users:users,
		entrepreneur:entrepreneur,
		restaurateur:restaurateur,
		order:order,
		livreur:livreur,
	}
})();
