<?php include("connectinc.php"); ?>
<?php
    //Variable declaration to avoid errors 
    $Uem = "";
    $user = "";
    $user_main = "";

    //Initialize a new session data
    session_start();

    //If A user is logged-in
    if(isset($_SESSION["user_login"])) {
        $user1 = $_SESSION["user_login"];
        
        //Get users information: title, username, lastname, firstname and email; from the database 
	    $sql = "SELECT * FROM `users` WHERE `email`='$user1'";
	    $sqli = mysqli_query($connect, $sql);
        $get_name = mysqli_fetch_assoc($sqli);
        $uId = $get_name['id']; #Get users ID
        $title = $get_name['title']; #Get users title
        $user_main = $get_name['last_name']; #Get users last name
        $Fname = $get_name['first_name']; #Get users first name
        $Ugender = $get_name['gender']; #Get Users gender
        $Uem = $get_name['email']; #Get users email
        $userE = $Uem; #Assign email to variable $userE
        $user = $user_main; #Assign lastname to variable $user
        $aUser = "$user_main" . "$Fname"; #Assign lastname.firstname(Full name) to variable $aUser
		$name = "$user_main "  .  "$Fname"; #Assign lastname.firstname(Full name) to variable $name
		
    } else {
        //If user is not logged-in
        $uId = "";
        $userE = "Guest"; #Assign Guest to variable $userE
		$user = "Guest"; #Assign Guest to variable $user
    }

	//Select all from table `cart` where column `user` = 'Users email'
    $cart_sql = "SELECT SUM(`count`) As Total from `cart` WHERE `user` = '$userE'";
    $cart_sqli = mysqli_query($connect, $cart_sql);
    $get_count = mysqli_fetch_array($cart_sqli);
    //Count number of rows where users email repeated
    $nCart = $get_count['Total'];
	
	if($nCart == 0) {
        $nCart = 0;
    }

    //Select all from table `cart` where column `user` = 'Users email'
    $wish_sql = "SELECT * FROM `wishlist` WHERE `user` = '$Uem'";
    $wish_sqli = mysqli_query($connect, $wish_sql);
    //Count number of rows where users email repeated
    $nWish = mysqli_num_rows($wish_sqli);
?>

<!DOCTYPE html>
<html>

	<!--[ Meta, Title, Stylesheets & Scripts ]-->
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Nice</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Fullscreen Slit Slider with CSS3 and jQuery" />
        <meta name="keywords" content="slit slider, plugin, css3, transitions, jquery, fullscreen, autoplay" />
        <meta name="author" content="Codrops" />
		<!-- Title Bar Icon -->
		<link rel="icon" type="img/png" href="./img/icon.png">
	
		
		<!-- Icon CSS Link -->
		<link rel="stylesheet" type="text/css" href="./wwwroot/css/fontawesome.min.css" />

		<!-- Extra Styling -->
		<!--<link rel="stylesheet" type="text/css" href="./css/w3.css" />-->
		<link rel="stylesheet" type="text/css" href="./wwwroot/css/site.css" />
		<link rel="stylesheet" type="text/css" href="./wwwroot/css/animate.css" />
		<!-- <link rel="stylesheet" type="text/css" href="./css/sidenav.css" /> -->
		
		<!-- Bootstrap -->
		<link rel="stylesheet" type="text/css" href="./wwwroot/bootstrap/css/bootstrap.min.css" />
		
		<!-- Owl Carousel -->
		<!-- <link type="text/css" rel="stylesheet" href="./wwwroot/css/style.css" /> -->
		<link rel="stylesheet" type="text/css" href ="./wwwroot/owlcarousel/assets/owl.carousel.css">
		<link rel="stylesheet" type="text/css" href="./wwwroot/owlcarousel/assets/owl.carousel.min.css">
		<link rel="stylesheet" type="text/css" href="./wwwroot/owlcarousel/assets/owl.theme.default.min.css">

		<!-- slider -->
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/custom.css" /> 

		<!-- Slider Script -->
		<script type="text/javascript" src="js/modernizr.custom.79639.js"></script>
		<noscript>
			<link rel="stylesheet" type="text/css" href="css/styleNoJS.css" />
		</noscript>

		<!-- JScripts -->
		<script src="./wwwroot/jquery/popper.min.js"></script>
		<script src="./wwwroot/jquery/jquery.min.js"></script>
		<!-- <script src="./wwwroot/owlcarousel/jquery.min.js"></script> -->
		
		<script src="./wwwroot/bootstrap/js/bootstrap.min.js"></script>
		
		

	</head>
	
	<header>
		<?php
			$s_query = @$_POST['q'];
			if($s_query) {
				header("location: search.php?q=$s_query");
			}
		?>
		
		<!--================ Search Input Area ================-->
		<div class="container-fluid search fixed-top navbar-dark shadow" style="display:none;padding:0">
			<div class="row p-0">
				<div class="offset-1 col-10">
					<form action="search.php?q=<?php echo $s_query; ?>" method="POST" class="bg-transparent shadow">
						<div class="input-group-md input-group-append">
							<input type="text" class="form-control h-auto" name="q" placeholder="Search..." />&nbsp;&nbsp;
							<a href="javascript:void(0)" onclick="search_close()" class="display-5 search-closenav">&times;</a>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!--================ End of Search Input Area ================-->

		<!--================ Navbar Area ================-->
		<?php 
			//Send request to server to get http or https address
			$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

			//Set $currentURL as the http or https address
			$currentURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . $_SERVER['QUERY_STRING'];
			
			//If any of the following links is true do nothing
			if (strpos($currentURL, "/signup")!==false ||
				strpos($currentURL, "/login")!==false ||
				strpos($currentURL, "/myaccount")!==false ||
				strpos($currentURL, "/men")!==false ||
				strpos($currentURL, "/women")!==false) {
				
			}
			//Else if the below link is true
			else
			if (($currentURL) == "http://localhost/ecal/" ||
				strpos($currentURL, "nice")!==false ||
				strpos($currentURL, "/index")!==false ||
				strpos($currentURL, "/wish")!==false ||
				strpos($currentURL, "/search")!==false ||
				strpos($currentURL, "/cart")!==false) {
				?>
				
				<script src="./assets/onScrollIndex.js"></script>
				<script src="./assets/searchIndex.js"></script>

				<style>
					.body {
						width: 100% !important;
						margin-top: 50px;
						background-color: #ffffff !important
					}

					.fixed-top {
						z-index: 98 !important
					}
					
					.nav1 {
						transition: top 0.5s;
					}
					
					.nav-link {
						color: white
					}

					@media only screen and (max-width: 400px) {
						.nav-link {
							font-size: 12.3px;
							font-weight: 200;
        					line-height: 1.2;
						}
					}

					@media only screen and (max-width: 310px) {
						.nav-link {
							font-size: 9.9px;
							font-weight: 200;
        					line-height: 1.2;
						}
					}
				</style>

				<!-- ## Top nav for index page ## -->
				<!-- Nav1; Top Nav-fixed: Toggler & Brand, Search Icon, User Icon, Ellipsis-v Menu --> 
				<nav class="nav1 navbar navbar-expand navbar-light bg-light fixed-top" id="indexnavbar">
					<h4 class="mt-3">
						<a href="#" data-target="#sidebar" data-toggle="collapse" aria-expanded="false"><i class="fa fa-home"></i></a>
						E-CAL
					</h4>
					<ul class="ml-auto navbar-nav justify-content-end">
						<a href="javascript:void(0)" class="nav-link search-opennav" onclick="search_open()">
							<button class="btn btn-dark"><i class="fa fa-search"></i></button>
						</a>
						<a class="nav-link" href="myaccount?page=main">
							<button class="btn btn-dark"><i class="fa fa-user"></i></button>
						</a>
						
						<!-- Dropdown -->
						<li class="nav-item dropdown">
							<a class="nav-link" href="#" id="navbardrop" data-toggle="dropdown">
								<button class="btn btn-dark"><i class="fa fa-ellipsis-v"></i></button>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<?php 
									if($user == "Guest") {
										?>
										<a class="dropdown-item p-2" href="index"><i class="ml-2 mr-3 fa fa-home"></i> Home</a><hr class="m-0 p-0" />
										<?php
											if(strpos($currentURL, "/cart")!==false) {
												?>
												<a class="dropdown-item p-3" href="login?prev=cart"><i class="mr-3 fa fa-lock"></i> Sign in</a><hr class="m-0 p-0" />
												<?php

											}elseif(strpos($currentURL, "/wish")!==false) {
												?>
												<a class="dropdown-item p-3" href="login?prev=wish"><i class="mr-3 fa fa-lock"></i> Sign in</a><hr class="m-0 p-0" />
												<?php

											} else {
												?>
												<a class="dropdown-item p-3" href="login"><i class="mr-3 fa fa-lock"></i> Sign in</a><hr class="m-0 p-0" />
												<?php
											}
										?>
										<a class="dropdown-item p-3" href="wish"><i class="mr-3 fa fa-heart-o"></i> Saved</a><hr class="m-0 p-0" />
										<a class="dropdown-item p-3" href="myaccount?page=main"><i class="mr-3 fa fa-user-o"></i> My Account</a><hr class="m-0 p-0" />
										<a class="dropdown-item p-3" href="#"><i class="mr-3 fa fa-clock-o"></i> Recent Searches</a><hr class="m-0 p-0" />
										<a class="dropdown-item p-3" href="#"><i class="mr-3 fa fa-th-large"></i> Recently Viewed</a><hr class="m-0 p-0" />
										<a class="dropdown-item p-2" href="#"><i class="ml-2 mr-3 fa fa-truck"></i> My Orders</a>
										<?php

									} elseif($user !== "Guest") {
										?>
										<a class="dropdown-item p-2" href="logout"><i class="ml-2 mr-3 fa fa-lock"></i> Sign Out</a><hr class="m-0 p-0" />
										<a class="dropdown-item p-3" href="#"><i class="mr-3 fa fa-clock-o"></i> Recent Searches</a><hr class="m-0 p-0" />
										<a class="dropdown-item p-3" href="#"><i class="mr-3 fa fa-th-large"></i> Recently Viewed</a><hr class="m-0 p-0" />
										<a class="dropdown-item p-2" href="#"><i class="ml-2 mr-3 fa fa-truck"></i> My Orders</a>
										<?php
									}
								?>
							</div>
						</li>
					</ul>

					<!-- Navbar Properties -->
					<div class="body fixed-top bg-light pt-2 pb-0" id="indexbody">
						<button class="navbar-toggler justify-content-end" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
							<span class="navbar-toggler-icon"></span>
						</button>

						<!-- Navbar links -->
						<div class="container">
							<div class="row">
								<div class="nav-item text-center col-4">
									<a class="nav-link text-center" href="index">
										<i class="fa fa-home"></i>
										<br /> 
										<span class="home">Home</span>
									</a>
								</div>
								<div class="nav-item text-center col-4">
									<a class="nav-link text-center" href="wish">
										<i class="far fa-heart"></i> 
										<span class="badge bg-danger"><?php echo $nWish; ?></span>
										<br /> 
										<span class="saved">Saved</span>
									</a>
								</div>
								<div class="nav-item text-center col-4">
									<a class="nav-link text-center" href="cart">
										<i class="fa fa-shopping-bag"></i> 
										<span class="badge bg-danger"><?php echo $nCart; ?></span>
										<br /> 
										<span class="cart">Cart</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</nav>
				<br /><br />
				<?php

			} else {
				//Else use the below top nav for other unspecified pages in this script
				?>
				<script src="./assets/searchIndex.js"></script>

				<!-- Nav1; Top Nav-fixed: Toggler & Brand, Search Icon, User Icon, Ellipsis-v Menu --> 
				<nav class="nav1 navbar navbar-expand navbar-dark fixed-top p-5" id="indexnavbar">
					<h4 class="navbar-brand mt-3">
						<a href="index"><img class="img-fluid img-thumbnail" src="./wwwroot/img/icon.png" /></a>
						NICE
					</h4>
					<ul class="ml-auto navbar-nav justify-content-end">
						<a href="javascript:void(0)" class="nav-link search-opennav" onclick="search_open()">
							<i class="btn btn-md btn-dark fa fa-search"></i>
						</a>
						<a class="nav-link" href="">
							<i class="btn btn-dark fa fa-user"></i>
						</a>
						
						<!-- Dropdown -->
						<li class="nav-item dropdown">
							<a class="nav-link" href="#" id="navbardrop" data-toggle="dropdown">
								<i class="btn btn-dark fa fa-ellipsis-v"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<?php
									if($user !== "Guest") {
										?>
										<a class="dropdown-item p-2" href="logout"><i class="ml-2 mr-3 fa fa-lock"></i> Sign Out</a><hr class="m-0 p-0" />
										<a class="dropdown-item p-3" href="#"><i class="mr-3 fa fa-clock-o"></i> Recent Searches</a><hr class="m-0 p-0" />
										<a class="dropdown-item p-3" href="#"><i class="mr-3 fa fa-th-large"></i> Recently Viewed</a><hr class="m-0 p-0" />
										<a class="dropdown-item p-2" href="#"><i class="ml-2 mr-3 fa fa-truck"></i> My Orders</a>
										<?php

									} elseif($user == "Guest") {
										?>
										<a class="dropdown-item p-2" href="index"><i class="ml-2 mr-3 fa fa-home"></i> Home</a><hr class="m-0 p-0" />
										<a class="dropdown-item p-3" href="login"><i class="mr-3 fa fa-lock"></i> Sign in</a><hr class="m-0 p-0" />
										<a class="dropdown-item p-3" href="wish"><i class="mr-3 fa fa-heart-o"></i> Saved</a><hr class="m-0 p-0" />
										<a class="dropdown-item p-3" href="myaccount?page=main"><i class="mr-3 fa fa-user-o"></i> My Account</a><hr class="m-0 p-0" />
										<a class="dropdown-item p-3" href="#"><i class="mr-3 fa fa-clock-o"></i> Recent Searches</a><hr class="m-0 p-0" />
										<a class="dropdown-item p-3" href="#"><i class="mr-3 fa fa-th-large"></i> Recently Viewed</a><hr class="m-0 p-0" />
										<a class="dropdown-item p-2" href="#"><i class="ml-2 mr-3 fa fa-truck"></i> My Orders</a>
										<?php
									}
								?>
							</div>
						</li>
					</ul>
				</nav><br />
				<?php
			}

			// 1. If any of the following links is true perform the tasks belows
			if (strpos($currentURL, "/signup")!==false ||
				strpos($currentURL, "/login")!==false ||
				strpos($currentURL, "/men")!==false ||
				strpos($currentURL, "/women")!==false ||
				strpos($currentURL, "/myaccount")!==false) {
				?>

				<!-- 1.1  Nav with Page links for the above listed pages --> 
				<!--  Nav: Page links --> 
				<nav class="pt-3 nav2 navbar navbar-expand navbar-dark"> <!-- Navbar Properties -->
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
						<span class="navbar-toggler-icon"></span>
					</button>

					<!-- Navbar links -->
					<div class="collapse navbar-collapse" id="collapsibleNavbar">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item">
								<?php 
									if(strpos($currentURL, "/signup")!==false) {
										?>
										<!-- ## nav for signup page ## -->
										<span class="nav-link ml-sm-5 mr-auto">
											<a href="login"><font size="5px"><i class="fa fa-arrow-left mr-5"></i></font></a>
											<font size="5px">Create Account</font>
										</span>
										<?php 

									} elseif(strpos($currentURL, "/login")!==false) {
										$prev = "";
										//If 'prev' is set in the url
										if (isset($_GET['prev'])) { 
											# code...
											//Set $prev for the value of 'prev'
											$prev = @$_GET['prev']; 
										}

										//If $prev = men
										if ($prev == "men") { 
											//$prev_men = men.php
											$prev_link = "men"; 

										//ElseIf $prev = women
										} elseif ($prev == "women") { 
											//$prev_men = women.php
											$prev_link = "women"; 

										//ElseIf $prev = cart
										} elseif ($prev == "cart") { 
											//$prev_men = women.php
											$prev_link = "cart"; 

										//ElseIf $prev = wish
										} elseif ($prev == "wish") { 
											//$prev_men = women.php
											$prev_link = "wish"; 

										} else {
											//else $prev_link = index.php
											$prev_link = "index"; 
										}
															
										?>

										<!-- ## nav for login page ## -->
										<span class="nav-link ml-sm-5 mr-auto">
											<a href="<?php echo $prev_link; ?>"><font size="5px"><i class="fa fa-arrow-left mr-5"></i></font></a>
											<font size="5px">Login</font>
										</span>
										<?php 

									} elseif (strpos($currentURL, "/men")!==false) {
										?>
										<style>
											.fixed-top {
												z-index: 98 !important
											}

											@media only screen and (max-width: 480px) {
												.info{
													font-size: 15px
												}
											}

											@media only screen and (max-width: 400px) { 
												.info{
													font-size: 14px
												}
											}

											@media only screen and (max-width: 330px) {
												.info{
													font-size: 12px
												}
											}
										</style>

										<!-- ## Top nav for men page ## -->
										<!-- Nav1; Top Nav-fixed: Toggler & Brand, Search Icon, User Icon, Ellipsis-v Menu --> 
										<nav class="nav1 navbar navbar-expand navbar-dark fixed-top  pt-5 pb-5" id="navbar">
											<h4 class="mt-1">
												<a href="#" data-target="#sidebar" data-toggle="collapse" aria-expanded="false"><i class="fa fa-navicon"></i></a>
											</h4>
											<span class="nav-link mt-3 ml-sm-5 mr-auto">
												<a href="index"><font size="5px"><i class="fa fa-arrow-left mr-5"></i></font></a>
												<font size="5px" class="info">Men's Sandals</font>
												<br /><br />
											</span>
											<ul class="ml-auto navbar-nav justify-content-end">
												<a href="javascript:void(0)" class="nav-link search-opennav" onclick="search_open()">
													<i class="btn btn-md btn-dark fa fa-search"></i>
												</a>
												<a class="nav-link" href="">
													<i class="btn btn-dark fa fa-user"></i>
												</a>
												
												<!-- Dropdown -->
												<li class="nav-item dropdown">
													<a class="nav-link" href="#" id="navbardrop" data-toggle="dropdown">
														<i class="btn btn-dark fa fa-ellipsis-v"></i>
													</a>
													<div class="dropdown-menu dropdown-menu-right">
														<?php
															//If user isn't signed in display the following options 
															if($user == "Guest") {
																?>
																<a class="dropdown-item p-2" href="index"><i class="ml-2 mr-3 fa fa-home"></i> Home</a><hr class="m-0 p-0" />
																<a class="dropdown-item p-3" href="login?prev=men"><i class="mr-3 fa fa-lock"></i> Sign in</a><hr class="m-0 p-0" />
																<a class="dropdown-item p-3" href="wish"><i class="mr-3 fa fa-heart-o"></i> Saved</a><hr class="m-0 p-0" />
																<a class="dropdown-item p-3" href="#"><i class="mr-3 fa fa-user-o"></i> My Account</a><hr class="m-0 p-0" />
																<a class="dropdown-item p-3" href="#"><i class="mr-3 fa fa-clock-o"></i> Recent Searches</a><hr class="m-0 p-0" />
																<a class="dropdown-item p-3" href="#"><i class="mr-3 fa fa-th-large"></i> Recently Viewed</a><hr class="m-0 p-0" />
																<a class="dropdown-item p-2" href="#"><i class="ml-2 mr-3 fa fa-truck"></i> My Orders</a>
																<?php

															} else
															//If user is loggedin display the following options
															if($user !== "Guest") {
																?>
																<a class="dropdown-item p-2" href="logout"><i class="ml-2 mr-3 fa fa-lock"></i> Sign Out</a><hr class="m-0 p-0" />
																<a class="dropdown-item p-3" href="#"><i class="mr-3 fa fa-clock-o"></i> Recent Searches</a><hr class="m-0 p-0" />
																<a class="dropdown-item p-3" href="#"><i class="mr-3 fa fa-th-large"></i> Recently Viewed</a><hr class="m-0 p-0" />
																<a class="dropdown-item p-2" href="#"><i class="ml-2 mr-3 fa fa-truck"></i> My Orders</a>
																<?php
															}
														?>
													</div>
												</li>
											</ul>
										</nav>
										<?php 

									} elseif (strpos($currentURL, "/women")!==false) {
										?>
										<style>
											.fixed-top {
												z-index: 98 !important
											}

											@media only screen and (max-width: 480px) {
												.info{
													font-size: 15px
												}
											}

											@media only screen and (max-width: 400px) {
												.info{
													font-size: 9px
												}
											}
										</style>

										<!-- ## Top nav for women page ## -->
										<!-- Nav1; Top Nav-fixed: Toggler & Brand, Search Icon, User Icon, Ellipsis-v Menu --> 
										<nav class="nav1 navbar navbar-expand navbar-dark fixed-top  pt-5 pb-5" id="navbar">
											<h4 class="mt-1">
												<a href="#" data-target="#sidebar" data-toggle="collapse" aria-expanded="false"><i class="fa fa-navicon"></i></a>
											</h4>
											<span class="nav-link ml-sm-5 mr-auto">
												<a href="index"><font size="5px"><i class="fa fa-arrow-left mr-5"></i></font></a>
												<font size="5px" class="info">Women's Sandals</font>
											</span>
											<ul class="ml-auto navbar-nav justify-content-end">
												<a href="javascript:void(0)" class="nav-link search-opennav" onclick="search_open()">
													<i class="btn btn-md btn-dark fa fa-search"></i>
												</a>
												<a class="nav-link" href="">
													<i class="btn btn-dark fa fa-user"></i>
												</a>
												
												<!-- Dropdown -->
												<li class="nav-item dropdown">
													<a class="nav-link" href="#" id="navbardrop" data-toggle="dropdown">
														<i class="btn btn-dark fa fa-ellipsis-v"></i>
													</a>
													<div class="dropdown-menu dropdown-menu-right">
														<?php 
															//If user isn't signed in display the following options 
															if($user == "Guest") {
																?>
																<a class="dropdown-item p-2" href="index"><i class="ml-2 mr-3 fa fa-home"></i> Home</a><hr class="m-0 p-0" />
																<a class="dropdown-item p-3" href="login?prev=women"><i class="mr-3 fa fa-lock"></i> Sign in</a><hr class="m-0 p-0" />
																<a class="dropdown-item p-3" href="wish"><i class="mr-3 fa fa-heart-o"></i> Saved</a><hr class="m-0 p-0" />
																<a class="dropdown-item p-3" href="myaccount?page=main"><i class="mr-3 fa fa-user-o"></i> My Account</a><hr class="m-0 p-0" />
																<a class="dropdown-item p-3" href="#"><i class="mr-3 fa fa-clock-o"></i> Recent Searches</a><hr class="m-0 p-0" />
																<a class="dropdown-item p-3" href="#"><i class="mr-3 fa fa-th-large"></i> Recently Viewed</a><hr class="m-0 p-0" />
																<a class="dropdown-item p-2" href="#"><i class="ml-2 mr-3 fa fa-truck"></i> My Orders</a>
																<?php

															} else
															//If user is loggedin display the following options
															if($user !== "Guest") {
																?>
																<a class="dropdown-item p-2" href="logout"><i class="ml-2 mr-3 fa fa-lock"></i> Sign Out</a><hr class="m-0 p-0" />
																<a class="dropdown-item p-3" href="#"><i class="mr-3 fa fa-clock-o"></i> Recent Searches</a><hr class="m-0 p-0" />
																<a class="dropdown-item p-3" href="#"><i class="mr-3 fa fa-th-large"></i> Recently Viewed</a><hr class="m-0 p-0" />
																<a class="dropdown-item p-2" href="#"><i class="ml-2 mr-3 fa fa-truck"></i> My Orders</a>
																<?php
															}
														?>
													</div>
												</li>
											</ul>
										</nav>
										<?php

									} elseif (strpos($currentURL, "/myaccount")!==false) {
										?>
										<style>
											@media only screen and (max-width: 480px) {
												.info{
													font-size: 15px
												}
											}

											@media only screen and (max-width: 400px) {
												.info{
													font-size: 9px
												}
											}
										</style>

										<!-- ## Top nav for women page ## -->
										<!-- Nav1; Top Nav-fixed: Toggler & Brand, Search Icon, User Icon, Ellipsis-v Menu --> 
										<nav class="nav1 navbar navbar-expand navbar-dark fixed-top pt-5 pb-5" id="navbar">
											<span class="nav-link ml-sm-5 pt-0 mr-auto">
												<?php
													if (strpos($currentURL, "/myaccount?page=main")!==false) {
														?>
														<a href="index"><font size="5px"><i class="fa fa-arrow-left mr-5"></i></font></a>
														<font size="5px" class="info">My Account</font>
														<?php

													} elseif (strpos($currentURL, "/myaccount?page=profile")!==false) {
														?>
														<a href="myaccount?page=main"><font size="5px"><i class="fa fa-arrow-left mr-5"></i></font></a>
														<font size="5px" class="info">My Profile</font>
														<?php

													} elseif (strpos($currentURL, "/myaccount?page=address")!==false) {
														?>
														<a href="myaccount?page=main"><font size="5px"><i class="fa fa-arrow-left mr-5"></i></font></a>
														<font size="5px" class="info">My Address(s)</font>
														<?php
														
													} elseif (strpos($currentURL, "/myaccount?page=ratings")!==false) {
														?>
														<a href="myaccount?page=main"><font size="5px"><i class="fa fa-arrow-left mr-5"></i></font></a>
														<font size="5px" class="info">My Rating(s)</font>
														<?php

													} elseif (strpos($currentURL, "/myaccount?page=country")!==false) {
														?>
														<a href="myaccount?page=main"><font size="5px"><i class="fa fa-arrow-left mr-5"></i></font></a>
														<font size="5px" class="info">My Country</font>
														<?php
													}
												?>
											</span>
											<ul class="ml-auto navbar-nav justify-content-end">
												<form action="#" method="POST" class="ml-auto form-inline">
													<button type="submit" class="nav-link btn btn-dark" name="search" value="search">
														<i class="btn-dark fa fa-search"></i></a>
													</button>
												</form>
												<a class="nav-link" href="cart">
													<i class="btn btn-dark fa fa-shopping-cart">
														<span class="badge bg-danger"><?php echo $nCart; ?></span>
													</i>
												</a>
												
												<!-- Dropdown -->
												<li class="nav-item dropdown">
													<a class="nav-link" href="#" id="navbardrop" data-toggle="dropdown">
														<i class="btn btn-dark fa fa-ellipsis-v"></i>
													</a>
													<div class="dropdown-menu dropdown-menu-right">
														<?php 
															//If user isn't signed in display the following options 
															if($user == "Guest") {
																?>
																<a class="dropdown-item p-2" href="index"><i class="ml-2 mr-3 fa fa-home"></i> Home</a><hr class="m-0 p-0" />
																<a class="dropdown-item p-3" href="login"><i class="mr-3 fa fa-lock"></i> Sign in</a><hr class="m-0 p-0" />
																<a class="dropdown-item p-3" href="wish"><i class="mr-3 fa fa-heart-o"></i> Saved</a><hr class="m-0 p-0" />
																<a class="dropdown-item p-3" href="#"><i class="mr-3 fa fa-clock-o"></i> Recent Searches</a><hr class="m-0 p-0" />
																<a class="dropdown-item p-3" href="#"><i class="mr-3 fa fa-th-large"></i> Recently Viewed</a><hr class="m-0 p-0" />
																<a class="dropdown-item p-2" href="#"><i class="ml-2 mr-3 fa fa-truck"></i> My Orders</a>
																<?php

															} else
															//If user is loggedin display the following options
															if($user !== "Guest") {
																?>
																<a class="dropdown-item p-2" href="logout"><i class="ml-2 mr-3 fa fa-lock"></i> Sign Out</a><hr class="m-0 p-0" />
																<a class="dropdown-item p-3" href="#"><i class="mr-3 fa fa-clock-o"></i> Recent Searches</a><hr class="m-0 p-0" />
																<a class="dropdown-item p-3" href="#"><i class="mr-3 fa fa-th-large"></i> Recently Viewed</a><hr class="m-0 p-0" />
																<a class="dropdown-item p-2" href="#"><i class="ml-2 mr-3 fa fa-truck"></i> My Orders</a>
																<?php
															}
														?>
													</div>
												</li>
											</ul>
										</nav>
										<br />
										<?php 
									}
								?>
							</li>    
						</ul>
					</div>
				</nav>
				<?php

			} else {
				
				//Display red border below the active link; Current page: Home, wish or cart
				if (strpos($currentURL, "/index")!==false) {
					echo "
						<style>
							.home{
								border-bottom: 2px solid red !important
							}
						</style>
					";

				} elseif (strpos($currentURL, "/wish")!==false) {
					echo "
						<style>
							.saved{
								border-bottom: 2px solid red !important
							}
						</style>
					";

				} elseif (($currentURL) == 'http://localhost/ecal/') {
					echo "
						<style>
							.home{
								border-bottom: 2px solid red !important
							}
						</style>
					";
				}

				if (strpos($currentURL, "/cart")!==false) {
					echo "
						<style>
							.cart{
								border-bottom: 2px solid red !important
							}
						</style>
					";
				}
				?>
				<!-- Display the following bottom nav if page not any mentioned in 1. above -->
				<!--  Nav2; Bottom Nav: Page links   
					<button class="navbar-toggler justify-content-end" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
						<span class="navbar-toggler-icon"></span>
					</button>

					<!-- Navbar links  
					<div class="collapse navbar-collapse" id="collapsibleNavbar">
						<ul class="navbar-nav m-auto">
							<li class="nav-item">
								<a class="nav-link mr-4  mr-sm-5 text-center" href="index.php">
									<i class="fa fa-home"></i>
									<br /> 
									<span class="home">Home</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link mr-4 mr-sm-5 text-center" href="wish.php">
									<i class="fa fa-heart"></i> 
									<span class="badge bg-danger">100</span>
									<br /> 
									<span class="saved">Saved</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-center" href="cart.php">
									<i class="fa fa-shopping-cart"></i> 
									<span class="badge bg-danger">100</span>
									<br /> 
									<span class="cart">Cart</span>
								</a>
							</li>    
						</ul>
					</div>
				</nav>-->
				<?php
			}
		?>
	</header>
<body>
<br />