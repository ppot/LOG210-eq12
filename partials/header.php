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
    <link href="http://localhost:8888/210/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost:8888/210/css/main.css" rel="stylesheet">
    <script src="http://localhost:8888/210/script/jquery.js"></script>
    <script src="http://localhost:3000/socket.io/socket.io.js"></script>
  <?php
    require_once('requireJS.php');
  ?>
  </head>

  <body>
    <div id="header">
      <div class="container-fluid">
        <div class="col-md-11 col-md-offset-1">
          <span><span class="web-tile">210</span>
          <?php
            if(isset($_SESSION['user']) && !empty($_SESSION['user'])) 
            {
            ?>
              <span class="user">
                 <?php 
                  if(isset($_SESSION['type']) && !empty($_SESSION['type']))
                  {
                    $type = $_SESSION['type'];
                    if($type == "client")
                    {
                    ?>
                    <span id="header-cart">

                    </span>

                    <?php
                    }
                  }
              ?>
             <?php echo $_SESSION['user']; ?><a href="javascript:app.users.out()" class="aspace">out</a></span>
            <?php
            }
            if(!isset($_SESSION['user']) || empty($_SESSION['user'])) 
            {
            ?>
              <span class="user"><a href="javascript:app.general.index.login_hash()" class="aspace">sign in</a><a href="javascript:app.general.index.register_hash()" class="aspace">register</a></span>
            <?php
            }
            ?>
          </span>
        </div>
        <div class="col-md-11 col-md-offset-1">
            <ul class="navigation">
              <li><a href="/210/index.php">menu</a></li>
              <?php 
              if(isset($_SESSION['type']) && !empty($_SESSION['type']))
              {
                $type = $_SESSION['type'];
                if($type == "client")
                {
                  ?>
                    <li><a href="/210/views/profile.php">profile</a></li>
                  <?php
                }
                if($type == "entrepreneur")
                {
                  ?>
                    <li><a href="/210/views/entrepreneur.php">entrepreneur</a></li>
                  <?php
                }
                if($type == "restaurateur")
                {
                  ?>
                    <li><a href="/210/views/restaurateur.php">restaurateur</a></li>
                  <?php
                }
                if ($type =="livreur") 
                {
                  ?>
                    <li><a href="/210/views/livraison.php">livraisons</a></li>
                  <?php
                }
              }
              ?>
            </ul>
        </div>
    </div>
  </div>
    <div class="container-fluid">
