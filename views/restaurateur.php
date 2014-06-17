<?php
	require_once('../partial/header.php');
?>
        <div class="row authentication">
		      	<div class="col-md-8 col-md-offset-2">
		                <div class="page-header">
		                    <div class="">
		                    	<h3>Gestion rapide</h3>
		                    </div>
		                    <div id="hasOrNotRestaurant">
		                   </div>
		              </div>
		              <div id="listMenus">
		              </div>
      		</div>
      	</div>
    <div class="container-fluid">
<div class="col-md-12 col-md-offset-0 main">
          <div class="row"  id="menuCreation">
           	<div class="col-md-4 login-content col-md-offset-2">
            	<div>
	            	<div class="page-header">
	            	  	<div class="authentication-header">
				        	<h3>Ajouter un menu</h3>
				        	<p><a href="javascript:app.restaurateur.addMenu()" class="submit">Ajouter</a></p>
	            	  	</div>
			      	</div>
	 				<div class="col-md-8">
	 					<div class="auth-box">
							<input id="menuName" type="text" name="name" max="30" class="col-md-10 auth-input" placeholder="nom du menu ">
						</div>
						<div class="row" id="menu-create-error">
						    <div class="col-md-10 alert-danger text-center">
	                			<span id="menu-create-error-message">le nom est oubligatoire</span>
	                		</div>
						</div>
						<div class="row" id="menu-create-success">
						    <div class="col-md-10 alert-success text-center">
	                			<span id="menu-create-success-message">le menu a ete creee</span>
	                		</div>
                		</div>
	 				</div>
            	</div>
        	</div>
           	<div class="col-md-4 login-content col-md-offset-1">
            	<div>
	            	<div class="page-header">
	            	  	<div class="authentication-header">
				        	<h3>Assigner un plat</h3>
				        	<p><a href="javascript:app.restaurateur.assignPlat()" class="submit">Assigner</a></p>
	            	  	</div>
			      	</div>
	 				<div class="col-md-8">
	 					<div class="auth-box">
							<input id="assignPlatName" type="text" name="name" max="30" class="col-md-10 auth-input" placeholder="nom du plat">
							<input id="assignPlatPrice" type="number"  step="0.01" name="name" max="30" class="col-md-10 auth-input" placeholder="prix du plat">
							<textarea rows="2" id="assignPlatDescription" type="text" name="name" max="30" class="form-control col-md-12 auth-input" placeholder="description du plat"></textarea>
						</div>
						<div class="row" id="plat-assign-error">
						    <div class="col-md-10 alert-danger text-center">
	                			<span id="plat-assign-error-message">le prix et le nom sont oubligatoire</span>
	                		</div>
						</div>
						<div class="row" id="plat-assign-warning">
						    <div class="col-md-10 alert-warning text-center">
	                			<span id="plat-assign-warning-message">plat assignee / aucune description fournis</span>
	                		</div>
                		</div>
						<div class="row" id="plat-assign-success">
						    <div class="col-md-10 alert-success text-center">
	                			<span id="plat-assign-success-message">le plat a ete assignee</span>
	                		</div>
                		</div>
	 				</div>
            	</div>
        	</div>
          </div>
         <div class="row"  id="menuUpdate">
           	<div class="col-md-4  col-md-offset-2">
            	<div class="col-md-12 login-content">
	            	<div class="page-header">
	            	  	<div class="authentication-header">
				        	<h3>Modifier un menu</h3>
				        	<p><a id="herfmenuUpdate" href="" class="submit">modifier</a><span class="authentication-header"><a id="herefNewPlat" href="">ajouter un plat</a></span></p>
	            	  	</div>
			      	</div>
	 				<div class="col-md-8">
	 					<div class="auth-box">
							<input id="menuUpdateName" type="text" name="name" max="30" class="col-md-10 auth-input" placeholder="nom du menu ">
						</div>
						<div class="row" id="menu-update-error">
						    <div class="col-md-10 alert-danger text-center">
	                			<span id="menu-update-error-message">remplir tout les champs</span>
	                		</div>
						</div>
						<div class="row" id="menu-update-success">
						    <div class="col-md-10 alert-success text-center">
	                			<span id="menu-update-success-message">le menu a ete modifier</span>
	                		</div>
                		</div>
	 				</div>
            	</div>
		      <div id="menuPlat" class="col-md-12 login-content add-plat">
            	<div class="page-header">
            	  	<div class="authentication-header">
			        	<h3>Ajouter un plat</h3>
			        	<p><a  id="hrefNewPlat" href="#" class="submit">Ajouter</a></p>
            	  	</div>
		      	</div>
 				<div class="col-md-8">
 					<div class="auth-box">
						<input id="platName" type="text" name="name" max="30" class="col-md-10 auth-input" placeholder="nom du plat">
						<input id="platPrice" type="number"  step="0.01" name="name" max="30" class="col-md-10 auth-input" placeholder="prix du plat">
						<textarea rows="2" id="platDescription" type="text" name="name" max="30" class="form-control col-md-12 auth-input" placeholder="description du plat"></textarea>
					</div>
					<div class="row" id="plat-create-error">
					    <div class="col-md-10 alert-danger text-center">
                			<span id="plat-create-error-message">le prix et le nom sont oubligatoire</span>
                		</div>
					</div>
					<div class="row" id="plat-create-warning">
					    <div class="col-md-10 alert-warning text-center">
                			<span id="plat-create-warning-message">plat ajouter / aucune description fournis</span>
                		</div>
            		</div>
					<div class="row" id="plat-create-success">
					    <div class="col-md-10 alert-success text-center">
                			<span id="plat-create-success-message">le plat a ete ajouter</span>
                		</div>
            		</div>
 				</div>
        	</div>
        	</div>
        	<div class="col-md-4 login-content col-md-offset-1">
	        	<div class="page-header">
	        	  	<div class="authentication-header">
				    <h3>Liste des plats</h3>
	        	  	</div>
		      	</div>	           	
	       		<div class="table-responsive">
		            <table class="table">
			            <thead>
							<tr>
								<th>nom</th>
								<th>prix</th>
								<th>description</th>
								<th>options</th>
							</tr>
		            	</thead>
		            	<tbody id="menuPlats">
		            	</tbody>
		            </table>
	        	</div>
	      </div>	
        	<div id="updatePlat" class="col-md-4 login-content col-md-offset-7 plat-header">
            	<div class="page-header">
            	  	<div class="authentication-header">
			        	<h3>Modifier un plat</h3>
			        	<p><a id="hrefUpdatePlat" href="#" class="submit">Modifier</a></p>
            	  	</div>
		      	</div>
 				<div class="col-md-8">
 					<div class="auth-box">
						<input id="platNameUpdate" type="text" name="name" max="30" class="col-md-10 auth-input" placeholder="nom du plat">
						<input id="platPriceUpdate" type="number"  step="0.01" name="name" max="30" class="col-md-10 auth-input" placeholder="prix du plat">
						<textarea rows="2" id="platDescriptionUpdate" type="text" name="name" max="30" class="form-control col-md-12 auth-input" placeholder="description du plat"></textarea>
					</div>
					<div class="row" id="plat-update-error">
					    <div class="col-md-10 alert-danger text-center">
                			<span id="plat-update-error-message">le prix et le nom sont oubligatoire</span>
                		</div>
					</div>
					<div class="row" id="plat-update-warning">
					    <div class="col-md-10 alert-warning text-center">
                			<span id="plat-update-warning-message">plat modifier / aucune description fournis</span>
                		</div>
            		</div>
					<div class="row" id="plat-update-success">
					    <div class="col-md-10 alert-success text-center">
                			<span id="plat-update-success-message">le plat a ete modifier</span>
                		</div>
            		</div>
 				</div>
	      </div>
	  </div>
        	</div>
          </div>	       
      </div>
    </div>
    	<script type="text/javascript">
		$(document).ready(function(){
			app.general.restaurateur.hide();
			app.restaurateur.getRestaurant();
		});
	</script>
<?php
	require_once('../partial/footer.php');
?>
