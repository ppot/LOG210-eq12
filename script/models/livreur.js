function Livreur () {}

Livreur.prototype.create = function(firstname,lastname,password,mail) {
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