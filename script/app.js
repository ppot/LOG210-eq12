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

<<<<<<< HEAD
=======
		function hideRegister() {
			$('#registerPage').hide();
			$('#connectPage').show();
		}

		function hideLogin() {
			$('#registerPage').show();
			$('#connectPage').hide();
		}

		var entrepreneur = (function(){

			function restaurateurs(){
				entrepreneur.hide();
				app.entrepreneur.getRestaurateurs();
				$('#listRestaurateurs').show();
			}

			function restaurateurCreation(){
				entrepreneur.hide();
	     		$.ajax({
				    type: "GET",
				    url: "/LOG210-eq12/action/api.php",
				    data:{
				    	action: 'getRestaurantsNoRestaurateur',
					},
				    dataType: "html",
				    success: function(result){
				    	$("#option_restaurant").html('');
				    	$("#option_restaurant").append('<option value="-1">aucun</option>');
						$.each($.parseJSON(result), function(idx, obj) {
							$("#option_restaurant").append('<option value="'+obj.id+'">'+obj.name+'</option>');
						});
						$('option_restaurant').val('-1');
				    }        
				});

				$('#restaurateurCreation').show();
			}

			function restaurateurUpdate(){
				entrepreneur.hide();
	     		$.ajax({
				    type: "GET",
				    url: "/LOG210-eq12/action/api.php",
				    data:{
				    	action: 'getRestaurants',
					},
				    dataType: "html",
				    success: function(result){
				    	$("#option_restaurant-update").html('');
				    	$("#option_restaurant-update").append('<option value="-1">aucun</option>');
						$.each($.parseJSON(result), function(idx, obj) {
							$("#option_restaurant-update").append('<option value="'+obj.id+'">'+obj.name+'</option>');
						});
						$('option_restaurant-update').val('-1');
				    }        
				});
				$('#restaurateurUpdate').show();
			}

			function restaurants(){
				entrepreneur.hide();
				app.entrepreneur.getRestaurants();
				$('#listRestaurants').show();
			}			

			function restaurantCreation(){
				entrepreneur.hide();

	     		$.ajax({
				    type: "GET",
				    url: "/LOG210-eq12/action/api.php",
				    data:{
				    	action: 'getRestaurateursNotInRestaurants',
					},
				    dataType: "html",
				    success: function(result){
				    	$("#option_restaurateur").html('');
				    	$("#option_restaurateur").append('<option value="-1">aucun</option>');
						$.each($.parseJSON(result), function(idx, obj) {
							$("#option_restaurateur").append('<option value="'+obj.id+'">'+obj.mail+'</option>');
						});
						$('option_restaurateur').val('-1');
				    }        
				});

				$('#restaurantCreation').show();
			}

			function restaurantUpdate(){
				entrepreneur.hide();
	     		$.ajax({
				    type: "GET",
				    url: "/LOG210-eq12/action/api.php",
				    data:{
				    	action: 'getRestaurateurs',
					},
				    dataType: "html",
				    success: function(result){
				    	$("#option_restaurateur-update").html('');
				    	$("#option_restaurateur-update").append('<option value="-1">aucun</option>');
						$.each($.parseJSON(result), function(idx, obj) {
							$("#option_restaurateur-update").append('<option value="'+obj.id+'">'+obj.mail+'</option>');
						});
						$('option_restaurateur-update').val('-1');
				    }        
				});				
				$('#restaurantUpdate').show();
			}	

			function  hide(){
				$('#listRestaurateurs').hide();
				$('#restaurateurCreation').hide();
				$('#restaurateurUpdate').hide();
				$('#listRestaurants').hide();
				$('#restaurantCreation').hide();
				$('#restaurantUpdate').hide();	
			}		

		return{
			restaurateurs:restaurateurs,
			restaurateurCreation:restaurateurCreation,
			restaurateurUpdate:restaurateurUpdate,
			restaurants:restaurants,
			restaurantCreation:restaurantCreation,
			restaurantUpdate:restaurantUpdate,
			hide:hide,
		}
		})();

		var restaurateur = (function(){

			function menuCreation(){
				restaurateur.hide();
				$('#menuCreation').show();
				$('#menu-create-error').hide();
				$('#menu-create-success').hide();
				$('#plat-assign-error').hide();
				$('#plat-assign-warning').hide();
				$('#plat-assign-success').hide();		
			}

			function menuUpdate(id){
				restaurateur.hide();
				$('#menu-update-error').hide();
				$('#menu-update-warning').hide();
				$('#menu-update-success').hide();
				$('#menuUpdate').show();
				$('#herfmenuUpdate').attr("href","javascript:app.restaurateur.updateMenu("+id+")");	
				$('#herefNewPlat').attr("href","javascript:app.general.restaurateur.newPlat("+id+")");	
				app.restaurateur.getMenu(id);
				app.restaurateur.getPlats(id);
			}

			function newPlat(id){
				$('#plat-create-error').hide();
				$('#plat-create-warning').hide();
				$('#plat-create-success').hide();
				$('#menuPlat').show();
				$('#updatePlat').hide();
				$('#hrefNewPlat').attr("href","javascript:app.restaurateur.menuNewPlat("+id+")");

			}

			function updatePlat(id){
				$('#plat-update-error').hide();
				$('#plat-update-warning').hide();
				$('#plat-update-success').hide();
				$('#menuPlat').hide();
				$('#updatePlat').show();
				$('#hrefUpdatePlat').attr("href","javascript:app.restaurateur.menuUpdatePlat("+id+")");
				app.restaurateur.getPlat(id);
			}

			function hide(){
				$('#herfmenuUpdate').attr("href","#");	
				$('#menuCreation').hide();
				$('#menuUpdate').hide();
				$('#menuPlat').hide();
				$('#updatePlat').hide();		
			}

		return {
			menuCreation:menuCreation,
			menuUpdate:menuUpdate,
			newPlat:newPlat,
			updatePlat:updatePlat,
			hide:hide,
		}

		})();

>>>>>>> ADD CU1/CU8 + CU5 to complete
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

		    	return{
		    		init:init,
		    		addRestaurateur:addRestaurateur,
		    		restaurateurs:restaurateurs,
		    		updateRestaurateur:updateRestaurateur,
		    		addRestaurant:addRestaurant,
		    		restaurants:restaurants,
		    		updateRestaurant:updateRestaurant,
			    }
			})();

		return{
	    	init:init,
	    	redirect:redirect,
<<<<<<< HEAD
	    	index:index,
	    	profile:profile,
	    	entrepreneur:entrepreneur,
=======
	    	hideRegister:hideRegister,
	    	hideLogin:hideLogin,
	    	entrepreneur:entrepreneur,
	    	restaurateur:restaurateur,
>>>>>>> ADD CU1/CU8 + CU5 to complete
    	}
	})();

	var users = (function(){
		var user = new User(); 

    	function init(){
<<<<<<< HEAD
    	}
=======
    		$('#auth-error').hide();
    		$('#register-error').hide();
			$('#register-success').hide();

    		$('#update-password-error').hide();
    		$('#update-password-success').hide();
			$('#update-address-error').hide();
			$('#update-address-success').hide();
>>>>>>> ADD bootstrap / restyling

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
<<<<<<< HEAD
			    	$("#arrayRestaurateurs").html('');
					$.each($.parseJSON(result), function(idx, obj) {
			    		$("#arrayRestaurateurs").append('<tr id="restaurateur'+obj.id+'"><td>'+obj.mail+'</td><td>'+obj.firstname+'</td><td>'+obj.lastname+'</td><td> <a href="javascript:app.entrepreneur.getRestaurateur('+obj.id+')" class="a-link">Modifier</a> <a href="javascript:app.entrepreneur.delRestautateur('+obj.id+')" class="a-link">delete</a></td></tr>');
					});
=======
			    	response = $.parseJSON(result);
			    	if(response === 1){
			    		general.redirect("/LOG210-eq12/index.php");
			    	}
			    	else{
			    		$('#auth-error').show();
			    	}
>>>>>>> ADD bootstrap / restyling
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
	    }
	})();

	var restaurateur = (function(){
		var restaurant = new Restaurant();
		var menu = new Menu();
		function init(){
    		$('#menuCreate').hide();
    		$('#menuUpdate').hide();

		}

		function getMenus(){
			restaurant.getMenus(null,'restaurateur');
		}	

		function addMenu(){
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

		return{
			init:init,
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

			for (var i = 0; i <  cart.items.length; i++) {
				item = cart.items[i];
				$('#cart-items').append('<tr id="cart_item'+item.id+'"><td>'+item.plat.name+'</td><td>'+Number(item.plat.price).toFixed(2)+'$</td><td class="pull-right" id="qte_'+item.id+'">'+item.qte+'</td></tr>');
			}

			$.ajax({
			    type: "GET",
			    url: app.config.getContext()+"action/api.php",
			    data:{
			    	action: 'getDeliveryAddress',				
				},
			    dataType: "html",
			    success: function(result){
<<<<<<< HEAD
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
=======
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

>>>>>>> ADD bootstrap / restyling
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
    		createOrder();

			 $('#header-cart').html('');
 			// $('#isCart').hide();
			$('#qte-error').hide();
			$('#confirmRequest').hide();
    	}

    	function createOrder(){
	     	$.ajax({
			    type: "GET",
			    url: app.config.getContext()+"action/api.php",
			    data:{
			    	action: 'createOrder',
			    	client_id: command.clientId,
			    	restaurant_id: command.restaurantId,
			    	address_id: command.addressId,
			    	livreur_id:command.livreurId,
			    	date: command.date,
			    	time:command.time,
			    	state:command.state,
			    	total:command.total,

				},
			    dataType: "html",
			    success: function(result){
			    	response = $.parseJSON(result);
					for (var i = 0; i <  cart.items.length; i++) {
						item = cart.items[i];
						createOrderItems(response.id,item.id,item.qte);
					}

					$('#order-success').show();
					$('#order-not-confirm').hide();
					$('#showNewAddress').hide();
					$('#list-addr').hide();
					$('#confirmationNumber').text(response.no_confirmation);

		    		command = new Order();
		    		cart = null;
			    }        
			});   	
    	}

    	function createOrderItems(order_id,plat_id,quantity){
 	     	$.ajax({
			    type: "GET",
			    url: app.config.getContext()+"action/api.php",
			    data:{
			    	action: 'createOrderItems',
			    	order_id: order_id,
			    	plat_id: plat_id,
			    	quantity: quantity,

				},
			    dataType: "html",
			    success: function(result){
			    	console.log(result);
			    }        
			});   		
    	}

		function user_new_deliveryAddress(){

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

					$('#newAddress').hide();
			    }        
			});				
		}
<<<<<<< HEAD

    	function setAddress(id){
			$('#newAddress').hide();

=======
		
		function user_update_password(){
>>>>>>> ADD bootstrap / restyling
			$.ajax({
			    type: "GET",
			    url: app.config.getContext()+"action/api.php",
			    data:{
<<<<<<< HEAD
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
=======
			    	action: 'updateUserPassword',
			    	password: $('#password').val(),
				},
			    dataType: "html",
			    success: function(result){
			    	response = $.parseJSON(result);
			    	if(response === 0){
			    		$('#update-password-error').show();
			    		$('#update-password-success').hide();
			    	}
			    	else if(response === 1){
			    		$('#update-password-error').hide();
			    		$('#update-password-success').show();
			    	}
			    	console.log(result);
			    }        
			});	
		}

		function user_update_address(){
			$.ajax({
			    type: "GET",
			    url: "/LOG210-eq12/action/api.php",
			    data:{
			    	action: 'updateUserAddress',
			    	address: $('#address').val(),
			    	city: $('#city').val(),
			    	phone: $('#phone').val(),
			    	postalcode: $('#postalcode').val(),
				},
			    dataType: "html",
			    success: function(result){
			    	response = $.parseJSON(result);
			    	if(response === 0){
			    		$('#update-address-error').show();
			    		$('#update-address-success').hide();
			    	}
			    	if(response === 1){
			    		$('#update-address-error').hide();
			    		$('#update-address-success').show();
			    	}
			    	console.log(result);
>>>>>>> ADD bootstrap / restyling
			    }        
			});	
    	}

		return {
			init:init,
<<<<<<< HEAD
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
			createOrder:createOrder,
			showNewAddress:showNewAddress,	
			process:process,
		}

=======
			oauth:oauth,
			oOut:oOut,
			register:register,
			user_update_password:user_update_password,
			user_update_address:user_update_address,
			user_infos:user_infos,
	    }
>>>>>>> ADD bootstrap / restyling
	})();

	var entrepreneur = (function(){ 
    	function init(){
    		$('#restaurateur-create-success').hide();
    		$('#restaurateur-create-error').hide();	    		
			$('#restaurateur-update-success').hide();
			$('#restaurateur-update-error').hide();   		
    		$('#update-restaurant-success').hide();
    		$('#update-restaurant-error').hide();
    		$('#create-restaurant-error').hide();
    		$('#create-restaurant-success').hide();	
			$('#update-restaurant-warning').hide();
			$('#create-restaurant-warning').hide();	
			$('#restaurateur-update-warning').hide();	
			$('#restaurateur-create-warning').hide();								
    	}

    	function getRestaurateur(id){
    		app.general.entrepreneur.restaurateurUpdate();
    		app.entrepreneur.getRestaurateurRestaurant(id);

    		$.ajax({
			    type: "GET",
			    url: "/LOG210-eq12/action/api.php",
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
			
			    	console.log(result);
			    }        
			});
    	}

    	function getRestaurateurs(){
    		$.ajax({
			    type: "GET",
			    url: "/LOG210-eq12/action/api.php",
			    data:{
			    	action: 'getRestaurateurs',
				},
			    dataType: "html",
			    success: function(result){
			    	$("#arrayRestaurateurs").html('');
					$.each($.parseJSON(result), function(idx, obj) {
			    		$("#arrayRestaurateurs").append('<tr id="restaurateur'+obj.id+'"><td>'+obj.mail+'</td><td>'+obj.firstname+'</td><td>'+obj.lastname+'</td><td> <a href="javascript:app.entrepreneur.getRestaurateur('+obj.id+')" class="glyphicon glyphicon-pencil"></a> <a href="javascript:app.entrepreneur.delRestaurateur('+obj.id+')" class="glyphicon glyphicon-trash"></a></td></tr>');
					});
			    }        
			});
    	}

     	function createRestaurateur(){
     		restaurant_id = $("#option_restaurant option:selected").val();

    		$.ajax({
			    type: "GET",
			    url: "/LOG210-eq12/action/api.php",
			    data:{
			    	action: 'createRestaurateur',
			    	firstname: $('#firstname').val(),
			    	lastname:  $('#lastname').val(),
			    	password: $('#password').val(),
			    	mail: $('#mail').val(),
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

     	function updateRestaurateurPassword(id){
    		$.ajax({
			    type: "GET",
			    url: "/LOG210-eq12/action/api.php",
			    data:{
			    	action: 'updateRestaurateurPassword',
			    	id: id,
			    	password: $('#updatePassword').val(),
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

     	function updateRestaurateurRestaurant(id){
     		restaurant_id = $("#option_restaurant-update option:selected").val();	

    		$.ajax({
			    type: "GET",
			    url: "/LOG210-eq12/action/api.php",
			    data:{
			    	action: 'updateRestaurateurRestaurant',
			    	id: id,
			    	restaurantId: restaurant_id,
				},
			    dataType: "html",
			    success: function(result){
			    	response = $.parseJSON(result);
			    	if(response === true){
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
    	} 

    	function getRestaurateurRestaurant(id){
    		$.ajax({
			    type: "GET",
			    url: "/LOG210-eq12/action/api.php",
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
    	}  	

    	function delRestaurateur(remove_id){
     		$.ajax({
			    type: "GET",
			    url: "/LOG210-eq12/action/api.php",
			    data:{
			    	action: 'delRestaurateur',
			    	id: remove_id,
				},
			    dataType: "html",
			    success: function(result){
			    	$('#restaurateur'+remove_id).remove();
			    }        
			});   		
    	}

    	function getRestaurant(id){
    		app.general.entrepreneur.restaurantUpdate();
    		$.ajax({
			    type: "GET",
			    url: "/LOG210-eq12/action/api.php",
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
    	}

    	function getRestaurants(){
    		$.ajax({
			    type: "GET",
			    url: "/LOG210-eq12/action/api.php",
			    data:{
			    	action: 'getRestaurants',
				},
			    dataType: "html",
			    success: function(result){
					$("#arrayRestaurants").html('');
					$.each($.parseJSON(result), function(idx, obj) {
			    		$("#arrayRestaurants").append('<tr id="restaurant'+obj.id+'"><td>'+obj.name+'</td><td>'+obj.restaurateur_id+'</td><td><address><strong>'+obj.address.address+'</strong><br>'+obj.address.city+','+obj.address.postalcode+'<br>'+obj.address.phone+'</address></td><td> <a href="javascript:app.entrepreneur.getRestaurant('+obj.id+')" class="glyphicon glyphicon-pencil"></a> <a href="javascript:app.entrepreneur.delRestaurant('+obj.id+')" class="glyphicon glyphicon-trash"></a></td></tr>');
					});
			    }        
			});
    	}

     	function createRestaurant(){
     		restaurateur_id = $("#option_restaurateur option:selected").val();

      		$.ajax({
			    type: "GET",
			    url: "/LOG210-eq12/action/api.php",
			    data:{
			    	action: 'createRestaurant',
			    	name: $('#name').val(),
			    	restaurateur_id:  restaurateur_id,
			    	address: $('#address').val(),
			    	city: $('#city').val(),
			    	phone: $('#phone').val(),
			    	postalcode: $('#postalcode').val(),
				},
			    dataType: "html",
			    success: function(result){
			    	response = $.parseJSON(result);
			    	if(response === 1){
			    		if(restaurateur_id == -1){
							$('#create-restaurant-warning').show();	
			    		}
			    		else{
							$('#create-restaurant-warning').hide();	
			    			$('#create-restaurant-success').show();
			    			$('#create-restaurant-error').hide();	
			    		}
    		     		$('#name').val('');
				    	$('#address').val('');
				    	$('#city').val('');		
				    	$('#phone').val('');
				    	$('#postalcode').val('');
				    	$("#option_restaurateur").val(-1); 		    		
			    	}
			    	else{
			    		$('#create-restaurant-success').hide();
    					$('#create-restaurant-warning').hide();	
			    		$('#create-restaurant-error').show();			    		
			    	}
			    }        
			});  		
    	}   	



    	function updateRestaurant(id){
    		restaurateur_id = -1;
      		$.ajax({
			    type: "GET",
			    url: "/LOG210-eq12/action/api.php",
			    data:{
			    	action: 'updateRestaurant',
			    	id:id,
			    	name: $('#updateName').val(),
			    	restaurateur_id:  restaurateur_id,
			    	address: $('#updateAddress').val(),
			    	city: $('#updateCity').val(),
			    	phone: $('#updatePhone').val(),
			    	postalcode: $('#updatePostalcode').val(),
			    	restaurateur_id: $("#option_restaurateur-update option:selected" ).val(),
				},
			    dataType: "html",
			    success: function(result){
			    	response = $.parseJSON(result);

			    	if(response === 1){
			    		if(restaurateur_id == -1){
			    			$('#update-restaurant-warning').show();
			    		}
			    		else{
			    			$('#update-restaurant-success').show();
			    		}
			    		$('#update-restaurant-error').hide();			    		
			    	}
			    	else{
			    		$('#update-restaurant-success').hide();
		    			$('#update-restaurant-warning').hide();
			    		$('#update-restaurant-error').show();			    		
			    	}
			    }        
			});
    	}   

    	function delRestaurant(remove_id){
     		$.ajax({
			    type: "GET",
			    url: "/LOG210-eq12/action/api.php",
			    data:{
			    	action: 'delRestaurant',
			    	id: remove_id,
				},
			    dataType: "html",
			    success: function(result){
			    	$('#restaurant'+remove_id).remove();
			    }        
			}); 
    	} 	


    	return{
			init:init,
			getRestaurateur:getRestaurateur,
			getRestaurateurRestaurant:getRestaurateurRestaurant,
			getRestaurateurs:getRestaurateurs,
			createRestaurateur:createRestaurateur,
			updateRestaurateurPassword:updateRestaurateurPassword,
			updateRestaurateurRestaurant:updateRestaurateurRestaurant,
			delRestaurateur:delRestaurateur,
			getRestaurant:getRestaurant,
			getRestaurants:getRestaurants,
			createRestaurant:createRestaurant,
			updateRestaurant:updateRestaurant,
			delRestaurant:delRestaurant,
	    }
	})();

	var restaurateur = (function(){
		var menu = null;

		function getRestaurant(){
     		$.ajax({
			    type: "GET",
			    url: "/LOG210-eq12/action/api.php",
			    data:{
			    	action: 'getRestaurantRestaurateur',
				},
			    dataType: "html",
			    success: function(result){
			    	console.log(result);
			    	restaurant = $.parseJSON(result);
			    	if(!restaurant.id){
			    		$('#hasOrNotRestaurant').html('<span class="authentication-header text-muted">aucun restaurant associez</span>');
			    	}
			    	else{
			    		$('#hasOrNotRestaurant').html('<span><a class="authentication-header" href="javascript:app.general.restaurateur.menuCreation()">ajouter menu</a></span>');
			    		getMenus();
			    	}
			    }        
			}); 			
		}

		function getMenu(id){
     		$.ajax({
			    type: "GET",
			    url: "/LOG210-eq12/action/api.php",
			    data:{
			    	action: 'getMenu',
			    	id:id,
				},
			    dataType: "html",
			    success: function(result){
			    	menu = $.parseJSON(result);
			    	$('#menuUpdateName').val(menu.name);
			    }        
			});
		}

		function getMenus(){
     		$.ajax({
			    type: "GET",
			    url: "/LOG210-eq12/action/api.php",
			    data:{
			    	action: 'getMenus',
				},
			    dataType: "html",
			    success: function(result){
			    	$('#listMenus').html('');
			    	menus = $.parseJSON(result);
					$.each($.parseJSON(result), function(idx, obj) {
			    		$('#listMenus').append('<div class="col-md-3"><div class="auth-box"><strong>'+obj.name+'</strong></br><a href="javascript:app.general.restaurateur.menuUpdate('+obj.id+')">modifier</a></div></div>');
					});
			    }        
			}); 			
		}

		function addMenu(){
			name = $('#menuName').val();
			if(!name){
				$('#menu-create-error').show();			
			}	
			else{
		     	$.ajax({
				    type: "GET",
				    url: "/LOG210-eq12/action/api.php",
				    data:{
				    	action: 'addMenu',
				    	name: name,
					},
				    dataType: "html",
				    success: function(result){
				    	console.log(result);
				    	response = $.parseJSON(result);
				    	if(menu){
					    	for (var i = 0; i < menu.plats.length; i++) {
					    		plat = menu.plats[i];
					    		createPlat(response.id,plat.name,plat.price,plat.description);
					    	}				    		
				    	}
				    	menu = null;
				    }        
				}); 
				$('#menu-create-success').show();
			}		
		}

		function updateMenu(id){
			name = $('#menuUpdateName').val();
			if(!name){
				$('#menu-update-error').show();			
			}
			else{
			     $.ajax({
				    type: "GET",
				    url: "/LOG210-eq12/action/api.php",
				    data:{
				    	action: 'updateMenu',
				    	id:id,
				    	name: $('#menuUpdateName').val(),
					},
				    dataType: "html",
				    success: function(result){
				    	console.log(result);
				    	if(result == "true"){
							$('#menu-update-success').show();
							$('#menu-update-error').hide();
							getMenus();
				    	}
				    	else{
							$('#menu-update-success').hide();
							$('#menu-update-error').show();
				    	}
				    }        
				}); 			
			}
	
		}

		function initAssignPlat()
		{
			if(menu == null){
				menu = new menuPlats();
			}
		}

		function assignPlat(){
			initAssignPlat();
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
					menu.addPlat(new plat(name,price,description));
					$('#plat-assign-warning').show();
				}
				else{
					menu.addPlat(new plat(name,price,description));
					$('#plat-assign-success').show();
				}

				$('#assignPlatName').val("");
				$('#assignPlatPrice').val("");
				$('#assignPlatDescription').val("");
			}
			console.log(menu);
		}

		function getPlats(menu_id){
	     	$.ajax({
			    type: "GET",
			    url: "/LOG210-eq12/action/api.php",
			    data:{
			    	action: 'getPlats',
			    	menu_id:menu_id,				
				},
			    dataType: "html",
			    success: function(result){
			    	$('#menuPlats').html('');
					$.each($.parseJSON(result), function(idx, obj) {
			    		$("#menuPlats").append('<tr id="plat'+obj.id+'"><td>'+obj.name+'</td><td>'+Number(obj.price).toFixed(2)+'</td><td>'+obj.description+'</td><td> <a href="javascript:app.general.restaurateur.updatePlat('+obj.id+')" class="glyphicon glyphicon-pencil"></a> <a href="javascript:app.restaurateur.delPlat('+obj.id+')" class="glyphicon glyphicon-trash"></a></td></tr>');
					
					});			    	
			    }        
			}); 
		}

		function getPlat(id){
	     	$.ajax({
			    type: "GET",
			    url: "/LOG210-eq12/action/api.php",
			    data:{
			    	action: 'getPlat',
			    	id:id,				
				},
			    dataType: "html",
			    success: function(result){
			    	plat = $.parseJSON(result);
					$('#platNameUpdate').val(plat.name);
					$('#platPriceUpdate').val(plat.price);
					$('#platDescriptionUpdate').val(plat.description);
			    }        
			}); 
		}

		function createPlat(menu_id,name,price,description){
	     	$.ajax({
			    type: "GET",
			    url: "/LOG210-eq12/action/api.php",
			    data:{
			    	action: 'createPlat',
			    	menu_id:menu_id,
			    	name: name,
			    	price: price,			    	
			    	description: description,				
				},
			    dataType: "html",
			    success: function(result){
			    	console.log(result);
			    	plat = $.parseJSON(result);
			    }        
			}); 
		}

		function menuCreatePlat(menu_id,name,price,description){
	     	$.ajax({
			    type: "GET",
			    url: "/LOG210-eq12/action/api.php",
			    data:{
			    	action: 'createPlat',
			    	menu_id:menu_id,
			    	name: name,
			    	price: price,			    	
			    	description: description,				
				},
			    dataType: "html",
			    success: function(result){
			    	plat = $.parseJSON(result);
			    	getPlats(plat.menu_id);

					$('#platName').val("");
					$('#platPrice').val("");
					$('#platDescription').val("");
			    }        
			}); 
		}

		function menuNewPlat(id){
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
				if(!description){
					menuCreatePlat(id,name,price,description);
					$('#plat-create-warning').show();
				}
				else{
					menuCreatePlat(id,name,price,description);
					$('#plat-create-success').show();
				}
			}			
		}

		function menuUpdatePlat(id){
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
				if(!description){
					updatePlat(id,name,price,description);
					$('#plat-update-warning').show();
				}
				else{
					updatePlat(id,name,price,description);
					$('#plat-update-success').show();
				}
			}			
		}

		function updatePlat(id,name,price,description){
	     	$.ajax({
			    type: "GET",
			    url: "/LOG210-eq12/action/api.php",
			    data:{
			    	action: 'updatePlat',
			    	id:id,
			    	name: name,
			    	price: price,			    	
			    	description: description,				
				},
			    dataType: "html",
			    success: function(result){
			    	plat = $.parseJSON(result);
			    	getPlats(plat.menu_id);
			    }        
			}); 			
		}

		function delPlat(id){
	     	$.ajax({
			    type: "GET",
			    url: "/LOG210-eq12/action/api.php",
			    data:{
			    	action: 'delPlat',
			    	id:id,			
				},
			    dataType: "html",
			    success: function(result){
			    	plat = $.parseJSON(result);
			    	$('#plat'+id).remove();
			    }        
			}); 
		}

		return{
			init:init,
			getRestaurant:getRestaurant,
			getMenu:getMenu,
			addMenu:addMenu,
			updateMenu:updateMenu,
			assignPlat:assignPlat,
			getPlats:getPlats,
			getPlat:getPlat,
			menuNewPlat:menuNewPlat,
			menuUpdatePlat:menuUpdatePlat,
			delPlat:delPlat,
		}
	})();
	return{
		init:init,
		config:config,
		general:general,
<<<<<<< HEAD
		users:users,
		entrepreneur:entrepreneur,
		restaurateur:restaurateur,
		order:order,
=======
		user:user,
		entrepreneur:entrepreneur,
<<<<<<< HEAD
>>>>>>> ADD bootstrap / restyling
	}
})();
=======
		restaurateur:restaurateur,
	}
})();


function menuPlats(){
	this.plats = new Array();
}
menuPlats.prototype.addPlat = function(plat){
	this.plats.push(plat);
}

function plat(name,price,description){
	this.name = name;
	this.price = price;
	this.description = description;
}
>>>>>>> ADD CU1/CU8 + CU5 to complete
