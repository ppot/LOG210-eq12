<?php
	$_SESSION["page"] = "entrepreneur";
	require_once('partial/header.php');
?>
	<div class="title-space">
		<h2>Menu d'entrepreneur</h2>
	</div>

	<div class="side-bar">
		<a href="javascript:app.entrepreneur.displayCreateRest()">Créer un restaurant</a>
		<a href="javascript:app.entrepreneur.displayManageRest()">Modifier un restaurant</a>
		<a href="javascript:app.entrepreneur.displayCreateRestorer()">Créer un restaurateur</a>
		<a href="javascript:app.entrepreneur.displayManageRestorer()">Modifier un restaurateur</a>
	</div>

	<div class="data">

		<div id="createRest">
			<h4>Créer un restaurant</h4>
			<p>Pour créer un restaurant, veuillez remplir les champs ci-dessous.</p>
			<span>Nom du restaurant : <input id="cRestName" type="text" name="restName" max="30"></span>
			<span>Adresse : <input id="cRestAddress" type="text" name="restAddress" max="50"></span>
			<span>Ville : <input id="cRestCity" type="text" name="restCity" max="50"></span>
			<span>Code postal : <input id="cRestPostCode" type="text" name="restPostCode" max="6"></span>
			<span>Téléphone : <input id="cRestPhone" type="text" name="restPhone" max="10"></span>
			<span>Assignation de restaurateur : 
				<select>
					<option value="Restorateur1">Restorateur 1</option>
				</select>
			</span>
			<a href="javascript:app.entrepreneur.createRest()" class="submit">Créer restaurant</a>
		</div>

		<div id="manageRest">
			<h4>Modifer un restaurant</h4>
			<p>Pour modifier un restaurant, veuillez en choisir un parmi ceux ci-dessous.</p>
			<div id="accordion">
				<h3 id="mRestName"></h3>
				<div>
					<span>Nom du restaurant : <input id="mRestName" type="text" name="restName" max="30"></span>
					<span>Adresse : <input id="mRestAddress" type="text" name="restAddress" max="50"></span>
					<span>Ville : <input id="mRestCity" type="text" name="restCity" max="50"></span>
					<span>Code postal : <input id="mRestPostCode" type="text" name="restPostCode" max="6"></span>
					<span>Téléphone : <input id="mRestPhone" type="text" name="restPhone" max="10"></span>
					<span>Assignation de restaurateur : 
						<select>
							<option value="Restorateur1">Restorateur 1</option>
						</select>
					</span>
					<a href="javascript:app.entrepreneur.manageRest()" class="submit">Modifier restaurant</a>
					<a href="" class="submit">Suivant</a>
					<a href="" class="submit">Précédent</a>
				</div>
			</div>
		</div>

		<div id="createRestorer">
		</div>

		<div id="manageRestorer">
		</div>
	</div>
	<div class="clear"></div>
	<script>
		$(function() {
			$("#accordion").accordion({
				heightStyle: "content",
				collapsible:false,
				active:0,
				event:"click"
			});
		});

		$(document).ready(function(){
			app.entrepreneur.displayCreateRest();
		});
	</script>

<?php
	require_once('partial/footer.php');