function User() {
	this.id = null;
	this.password = null;
	this.firstname = null;
	this.lastname = null;
	this.mail = null;
	this.birthdate = null;
}

User.prototype.setId = function(id) {
	this.id = null;
};

User.prototype.firstname = function(firstname) {
	this.firstname = null;
};

User.prototype.lastname = function(lastname) {
	this.lastname = null;
};

User.prototype.mail = function(mail) {
	this.mail = null;
};

User.prototype.birthdate = function(birthdate) {
	this.birthdate = null;
};

User.prototype.register = function(firstname,lastname,password,mail,birthdate,address,city,phone,postalcode) {
	var rePassword =/^(?=.{5,19}$)(?=.*[a-zA-Z]).*/;
	var reFirstname =/^[A-Za-z\s]{1,}[\.-]{0,1}[A-Za-z\s]{0,}$/;
	var reLastname =/^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$/;
    var reMail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	var reBirthdate =/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/;
	var rePhone =/^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/;
	var reAddress = /^([0-9]+)([A-Z])?,\s(?:(.*?)\s(?:APP|APT)\s(.*)|(.*))$/mgi;	
	var rCity =/^[A-Za-z\s]{1,}[\-]{0,1}[A-Za-z\s]{0,}$/;
	var rePostal = /(^[ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ]\d[ABCEGHJKLMNPRSTVWXYZ]\d$)/;
	



	var validFirstname = reFirstname.test(firstname);
	var validLastname = reLastname.test(lastname);
	var validPassword = rePassword.test(password);
	var validMail = reMail.test(mail);
	var validBirthdate = reBirthdate.test(birthdate);
	var validPhone = rePhone.test(phone);
	var validAddress = reAddress.test(address);
	var validCity = rCity.test(city);
	var validPostal = rePostal.test(postalcode);

	if(!validFirstname || !validLastname || !validPassword || !validMail){
	 	$('#register-error').show();
		$('#register-error-message').text(' ');
		if(validFirstname)
		{
			$('#register-error-message').append('<span>firstname non conforme</span></br>');
		}
		if(!validLastname)
		{
			$('#register-error-message').append('<span>lastname non conforme</span></br>');
		}		
		if(!validPassword)
		{
			$('#register-error-message').append('<span>password non conforme</span></br>');
		}
		if(!validBirthdate)
		{
			$('#register-error-message').append('<span>birthdate non conforme</span></br>');
		}		
		if(!validMail)
		{
			$('#register-error-message').append('<span>mail non conforme</span></br>');
		}
		if(!validPhone )
		{
			$('#register-error-message').append('<span>phone non conforme</span></br>');
		}
		if(!validAddress)
		{
			$('#register-error-message').append('<span>address non conforme</span></br>');
		}
		if(!validCity )
		{
			$('#register-error-message').append('<span>city non conforme</span></br>');
		}
		if(!validPostal)
		{
			$('#register-error-message').append('<span>postalcode non conforme</span></br>');
		}
	}
	else{
		$.ajax({
		    type: "GET",
		    url: app.config.getContext()+"action/api.php",
		    data:{
		    	action: 'register',
		    	firstname: firstname,
		    	lastname:  lastname,
		    	password: password,
		    	mail: mail,
		    	birthdate: birthdate,
		    	address: address,
		    	city: city,
		    	phone: phone,
		    	postalcode: postalcode,
			},
		    dataType: "html",
		    success: function(result){
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
		    }        
		});		
	}
};

User.prototype.oauth = function(mail,password) {
	$.ajax({
	    type: "GET",
	    url: app.config.getContext()+"action/api.php",
	    data:{
	    	action: 'oauth',
	    	mail : mail,
	    	password : password,
		},
	    dataType: "html",
	    success: function(result){
	    	response = $.parseJSON(result);
	    	console.log(response);
	    	if(response != null){
	    		if(response.type == "client"){
	    			app.general.redirect( app.config.getContext()+"index.php");
	    		}
	    		else if(response.type == "restaurateur"){
	    			app.general.redirect( app.config.getContext()+"views/restaurateur.php");

	    		}
	    		else if(response.type == "entrepreneur"){
	    			app.general.redirect( app.config.getContext()+"views/entrepreneur.php");
	    		}
	    		else if(response.type == "livreur"){
	    			app.general.redirect( app.config.getContext()+"views/livraison.php");
	    		}
	    	}
	    	else{
	    		$('#auth-error').show();
	    	}
	    }        
	});	
};

User.prototype.out = function() {
	$.ajax({
	    type: "GET",
	    url:  app.config.getContext()+"action/api.php",
	    data:{
	    	action: 'out',
		},
	    dataType: "html",
	    success: function(result){
	    	console.log(result);
	    	app.general.redirect( app.config.getContext()+"index.php");
	    }        
	});
};

User.prototype.getAddress = function() {
	$.ajax({
	    type: "GET",
	    url: app.config.getContext()+"action/api.php",
	    data:{
	    	action: 'getAddress',
		},
	    dataType: "html",
	    success: function(result){
			$.each($.parseJSON(result), function(idx, obj) {
				console.log(obj);
				$("#address-list").append('<li class="menus"><a href="javascript:app.order.setAddress('+obj.id+')">'
					+'<address>'
						+'<span id="address">'+obj.address+'</span>,<span id="postalcode">'+obj.postalcode+'</span><br>'
						+'<span id="city">'+obj.city+'</span></br>'	  
						+'<span id="phone">'+obj.phone+'</span>'
					+'</address></a></li>');
			});
	    }        
	});
};

User.prototype.get = function() {
	$.ajax({
	    type: "GET",
	    url: app.config.getContext()+"action/api.php",
	    data:{
	    	action: 'getUser',
		},
	    dataType: "html",
	    success: function(result){
	    	response = $.parseJSON(result);
	    	console.log(response);
	    	if(response!=null){
		    	$('#mail').text(response.mail);
				$('#firstname').text(response.firstname);
				$('#lastname').text(response.lastname);
				$('#birthdate').text(response.birthdate);
					    		
		    	$('#address').val(response.address);
				$('#city').val(response.city);
				$('#phone').val(response.phone);
				$('#postalcode').val(response.postalcode);
			}
	    }        
	});		
};

User.prototype.update = function(password) {
	var rePassword =/^(?=.{5,19}$)(?=.*[a-zA-Z]).*/;

	if(!rePassword.test(password))
	{
	 	$('#update-password-error').show();
		$('#update-password-error-message').text(' ');
		$('#update-password-error-message').append('<span>password non conforme</span></br>');
	}
	else{
		$.ajax({
		    type: "GET",
		    url: app.config.getContext()+"action/api.php",
		    data:{
		    	action: 'updateUserPassword',
		    	password: password,
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
		    		$('#md-password').val('');
		    	}
		    	console.log(result);
		    }        
		});		
	}
};

User.prototype.updateAddress = function(addr,city,postalcode,phone) {
	var rePhone =/^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/;
	var reAddress = /^([0-9]+)([A-Z])?,\s(?:(.*?)\s(?:APP|APT)\s(.*)|(.*))$/mgi;	
	var rCity =/^[A-Za-z\s]{1,}[\-]{0,1}[A-Za-z\s]{0,}$/;
	var rePostal = /(^[ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ]\d[ABCEGHJKLMNPRSTVWXYZ]\d$)/;

	var validPhone = rePhone.test(phone);
	var validAddress = reAddress.test(addr);
	var validCity = rCity.test(city);
	var validPostal = rePostal.test(postalcode);


	if(!validPhone || !validAddress || !validCity || !validPostal){
		$('#update-address-error').show();
		$('#update-address-success').hide();
		$('#update-address-error-message').text(' ');
		if(!validPhone )
		{
			$('#update-address-error-message').append('<span>phone non conforme</span></br>');
		}
		if(!validAddress)
		{
			$('#update-address-error-message').append('<span>address non conforme</span></br>');
		}
		if(!validCity )
		{
			$('#update-address-error-message').append('<span>city non conforme</span></br>');
		}
		if(!validPostal)
		{
			$('#update-address-error-message').append('<span>postalcode non conforme</span></br>');
		}
	}
	else{
		$.ajax({
		    type: "GET",
		    url: app.config.getContext()+"action/api.php",
		    data:{
		    	action: 'updateUserAddress',
		    	address: addr,
		    	city: city,
		    	postalcode: postalcode,
		    	phone: phone,
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

			    	$('#address').text(addr);
					$('#city').text(city);
					$('#phone').text(phone);
					$('#postalcode').text(postalcode);

	    			$('#md-address').val('');
	    			$('#md-city').val('');
	    			$('#md-postalcode').val('');
	    			$('#md-phone').val('');
		    	}
		    	console.log(result);
		    }        
		});		
	}		
};

User.prototype.address = function() {
	$.ajax({
	    type: "GET",
	    url: app.config.getContext()+"action/api.php",
	    data:{
	    	action: 'mainAddress',
		},
	    dataType: "html",
	    success: function(result){
	    	response = $.parseJSON(result);
	    	console.log(response);
	    	if(response!=null){
		    	$('#address').text(response.address);
				$('#city').text(response.city);
				$('#phone').text(response.phone);
				$('#postalcode').text(response.postalcode);
			}
	    }        
	});	
};