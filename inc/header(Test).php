<?php include("connectinc.php"); ?>
<!DOCTYPE html>
<html>

	<!--[ Meta, Title, Stylesheets & Scripts ]-->
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Nice</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Title Bar Icon -->
		<link rel="icon" type="img/png" href="./img/icon.png">
	
		
		<!-- Icon CSS Link -->
		<link rel="stylesheet" type="text/css" href="./css/font-awesome.min.css" />

		<!-- Extra Styling -->
		<link rel="stylesheet" type="text/css" href="./css/main.css" />
		<link rel="stylesheet" type="text/css" href="./css/sidenav.css" />
		
		<!-- Bootstrap -->
		<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css" />
		
		<!-- JScripts -->
		<script src="./js/popper.min.js"></script>
		<script src="./js/jquery.min.js"></script>
		<script src="./js/bootstrap.min.js"></script>
	</head>

	<!--[ Embedded Styling For Navbar & its Items ]-->
	<style>
		.nav1{
			height: 50px;
		}
		.nav1 h4{
			color: white
		}
		.navbar{
			background-color: rgb(28, 30, 31) !important
		}
		.nav1 .btn,
		.nav1 .btn-dark{
			background-color: rgb(28, 30, 31) !important
		}
		.btn:hover,
		.nav1 button:focus,
		.btn-dark:hover{
			color: grey !important
		}
		.nav-item a:link{
			color: white !important
		}
		.nav-item a:hover{
			color: grey !important
		}
		.dropdown-menu a:link{
			color: black !important;
		}
		.dropdown-menu a:hover{
			color: white !important;
			background-color: rgb(48, 40, 41) !important
		}
	</style>
	
	<!--================ Navbar Area ================-->
	<header>
		<br /><br />
		<!-- Nav2; Bottom Nav: Page links --> 
		<nav class="pt-3 nav2 navbar navbar-expand navbar-dark"> <!-- Navbar Properties -->
			<button class="navbar-toggler justify-content-end" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    			<span class="navbar-toggler-icon"></span>
  			</button>

  			<!-- Navbar links -->
  			<div class="collapse navbar-collapse" id="collapsibleNavbar">
    			<ul class="navbar-nav m-auto">
					<li class="nav-item">
						<a class="nav-link mr-5" href="index.php"><i class="fa fa-home"></i> Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link mr-5" href="wish.php"><i class="fa fa-heart"></i> Saved</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a>
					</li>    
				</ul>
			</div>
		</nav>
	</header>
	<body>