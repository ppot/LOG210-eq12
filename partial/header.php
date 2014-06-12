<!DOCTYPE html>
<html lang="fr">
    <head>
		<meta charset="utf-8">
		<link href="css/global.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.min.css">
		<?php if($_SESSION["page"] == "index") {?>
			<link href="css/index.css" rel="stylesheet" type="text/css"/>
		<?php } else if ($_SESSION['page'] == 'entrepreneur') { ?>
			<link href="css/entrepreneur.css" rel="stylesheet" type="text/css"/>
		<?php } ?>
		<script src="script/jquery.js"></script>
		<script src="script/app.js"></script>
		<script type="text/javascript" src="script/jquery-ui-1.10.3.custom.min.js"></script>
	</head>
	
	<body>
		<div class="container">