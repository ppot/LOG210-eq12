function Livreur () {}

Livreur.prototype.create = function(firstname,lastname,password,mail) {
	var rePassword =/^(?=.{5,19}$)(?=.*[a-zA-Z]).*/;
	var reFirstname =/^[A-Za-z\s]{1,}[\.-]{0,1}[A-Za-z\s]{0,}$/;
	var reLastname =/^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$/;
    var reMail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

	var validFirstname = reFirstname.test(firstname);
	var validLastname = reLastname.test(lastname);
	var validPassword = rePassword.test(password);
	var validMail = reMail.test(mail);

	if(!validFirstname || !validLastname || !validPassword || !validMail){
	 	$('#livreur-create-error').show();
		$('#livreur-create-success').hide();
		$('#livreur-create-error-message').text('');
		if(!validFirstname)
		{
			$('#livreur-create-error-message').append('<span>firstname non conforme</span></br>');
		}
		if(!validLastname)
		{
			$('#livreur-create-error-message').append('<span>lastname non conforme</span></br>');
		}		
		if(!validPassword)
		{
			$('#livreur-create-error-message').append('<span>password non conforme</span></br>');
		}
		if(!validMail)
		{
			$('#livreur-create-error-message').append('<span>mail non conforme</span></br>');
		}

	}
	else{
		$.ajax({
		    type: "GET",
		    url: app.config.getContext()+"action/api.php",
		    data:{
		    	action: 'createLivreur',
		    	firstname: firstname,
		    	lastname:  lastname,
		    	password: password,
		    	mail: mail,
			},
		    dataType: "html",
		    success: function(result){
		    	response = $.parseJSON(result);
		    	if(response === 1){

			    	$('#livreur-create-success').show();
			    	$('#livreur-create-error').hide();
		     		$('#livFirstname').val('');
					$('#livLastname').val('');
					$('#livPassword').val('');
					$('#livMail').val('');
		    	}
		    	else{
					$('#livreur-create-warning').hide();
		    		$('#livreur-create-success').hide();
		    		$('#livreur-create-error').show();			    		
		    	}
		    }        
		});
	}	
};

Livreur.prototype.get = function(id) {

	$.ajax({
	    type: "GET",
	    url: app.config.getContext()+"action/api.php",
	    data:{
	    	action: 'getLivreur',
	    	id: id,
		},
	    dataType: "html",
	    success: function(result){
	    	obj = $.parseJSON(result);
	    	$('#updateLivMail').text(obj.mail);
	    	$('#updateLivFirstname').text(obj.firstname);
	    	$('#updateLivLastname').text(obj.lastname);
	    	$("#livreur_mod-password-action").attr("href","javascript:app.entrepreneur.updateLivreur("+obj.id+")");
	    }        
	});
};

Livreur.prototype.updatePassword = function(id,password) {
	var rePassword =/^(?=.{5,19}$)(?=.*[a-zA-Z]).*/;

	if(!rePassword.test(password))
	{
	 	$('#livreur-update-error').show();
		$('#livreur-update-success').hide();
		$('#livreur-update-error-message').text(' ');
		$('#livreur-update-error-message').append('<span>password non conforme</span></br>');
	}
	else{
		$.ajax({
		    type: "GET",
		    url: app.config.getContext()+"action/api.php",
		    data:{
		    	action: 'updateLivreurPassword',
		    	id: id,
		    	password: password,
			},
		    dataType: "html",
		    success: function(result){
		    	response = $.parseJSON(result);
		    	if(response === 1){
		    		$('#livreur-update-success').show();
		    		$('#livreur-update-error').hide();
		    		$('#livreur-update-success-message').text('le mot de passe a ete changer');
		    	}
		    	else{
		    		$('#livreur-update-success').hide();
		    		$('#livreur-update-error').show();
		    		$('#livreur-update-error-message').text('erreur dans le changement du mot de passe');			    		
		    	}
		    }        
		});	
	}	
};

Livreur.prototype.del = function(id) {
	$.ajax({
    	type: "GET",
	    url: app.config.getContext()+"action/api.php",
	    data:{
	    	action: 'delLivreur',
	    	id: id,
		},
	    dataType: "html",
	    success: function(result){
	    	$('#livreur'+id).remove();
	    }        
	}); 
};