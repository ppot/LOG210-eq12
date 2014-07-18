<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sticky-footer-navbar.css" rel="stylesheet">
    <script src="../script/jquery.js"></script>
    <script src="../script/plat.js"></script>
    <script src="../script/cartItem.js"></script>
    <script src="../script/cart.js"></script>
    <script src="../script/order.js"></script>
    <script src="../script/app.js"></script>
	
  </head>

  <body>
       	<div class="header">
    <div class="container">
        <ul class="nav navbar-nav pull-right">
        	<?php
        		$user = $_SESSION['user'];
        		echo "<li><h5 class='text-muted'>$user</h5></li>";
        	?>
            <li class="user-signout"><h5 class="text-muted"><a href='javascript:app.user.oOut()'>deconnection</a></h5></li>
        </ul>
        <h5 class="text-muted"><a href="../index.php">Quick Menu</a></h5>
              	</div>
      </div>
    <div class="container">
