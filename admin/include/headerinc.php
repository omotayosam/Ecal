<?php include "session.php";

    //Send request to server to get http or https address
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

	//Set $currentURL as the http or https address
    $currentURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . $_SERVER['QUERY_STRING'];

    // Text to be displayed in Browser Title Bar
	$title = 'E-KAL';
	if ((($currentURL) == "http://localhost/ecal/admin/")!==false){$title = 'Login';}
	if((strpos($currentURL, "/index"))!==false){$title = 'Login';}
	if((strpos($currentURL, "/home"))!==false){$title = 'Home';}
	if((strpos($currentURL, "/item_upload"))!==false){$title = 'Upload Items';}
	if((strpos($currentURL, "/settings"))!==false){$title = 'Settings';}
	if((strpos($currentURL, "/recent_search"))!==false){$title = 'Recent-Search';}
	if((strpos($currentURL, "/cart"))!==false){$title = 'Shopping Cart';}
?>

<!DOCTYPE html>
<html>

<!--[ Meta, Title, Stylesheets & Scripts ]-->

<head>
    <!-- Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, chrome=1" />
    <meta name="description" content="Shop with style online on the best online shop in Calabar" />
    <meta name="keywords" content="kal, ekal, e-kal, ecommerce, e-commerce, shop, online shop, shoes, electronics, fashion, food, drink, automobile" />
    <meta name="author" content="SAMBOLT" />

    <!-- Title Bar Text -->
    <title>
        <?php echo 'E-Kal Admin - ' . $title; ?>
    </title>

    <!-- Title Bar Icon -->
    <link rel="icon" type="img/png" href="../wwwroot/img/fav-icon.png" />

    <!-- Icon CSS Link (Font Awesome) -->
    <link rel="stylesheet" type="text/css" href="../wwwroot/css/fontawesome.min.css" />

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="../wwwroot/bootstrap/css/bootstrap.min.css" />

    <!-- Owl Carousel -->
    <link rel="stylesheet" type="text/css" href="../wwwroot/owlcarousel/assets/style.css" />
    <link rel="stylesheet" type="text/css" href="../wwwroot/owlcarousel/assets/owl.carousel.min.css" />
    <link rel="stylesheet" type="text/css" href="../wwwroot/owlcarousel/assets/owl.theme.default.min.css" />

    <!-- Slider -->
    <link rel="stylesheet" type="text/css" href="../wwwroot/slider/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="../wwwroot/slider/css/style.css" />
    <link rel="stylesheet" type="text/css" href="../wwwroot/slider/css/custom.css" />
    <noscript>
			<link rel="stylesheet" type="text/css" href="../wwwroot/slider/css/styleNoJS.css" />
		</noscript>

    <!-- Extra Styling -->
    <link rel="stylesheet" type="text/css" href="./css/site.css" />
    <link rel="stylesheet" type="text/css" href="../wwwroot/css/animate.css" />

    <!-- JScripts -->
    <script type="text/javascript" src="../wwwroot/jquery/popper.min.js"></script>
    <script type="text/javascript" src="../wwwroot/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="../wwwroot/jquery/jquery.form.js"></script>
    <script type="text/javascript" src="./js/site.js"></script>
    <script type="text/javascript" src="../wwwroot/owlcarousel/owl.carousel.min.js"></script>
    <script type="text/javascript" src="../wwwroot/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../wwwroot/slider/js/modernizr.custom.79639.js"></script>
</head>

<header>
    <?php if ($admin) { ?>
        <style>
			.body {
				width: 100% !important;
				margin-top: 50px;
				background-color: #efefef !important
			}

			.nav1.fixed-top {
				z-index: 2100 !important
			}
					
			/* .nav1 {
				transition: top 0.5s;
			}
					
			#indexbody {
				transition: margin-top 1.0s;
			} */
					
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

        <nav class="nav1 navbar navbar-expand navbar-light bg-light fixed-top" id="indexnavbar">
            <h4 class="mt-auto navbar-brand">
                <a href="home"><i class="fa fa-home"></i> E-KAL</a>
            </h4>
            <ul class="ml-auto navbar-nav justify-content-end">
                <a class="nav-link" href="myaccount?page=main">
                    <button class="btn btn-dark"><i class="fa fa-user"></i></button>
                </a>

                <!-- Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbardrop" data-toggle="dropdown">
                        <button class="btn btn-dark"><i class="fa fa-ellipsis-v"></i></button>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right py-0">

                        <?php if (!$admin) { ?>
                            <a class="dropdown-item p-2" href="home"><i class="ml-2 mr-3 fa fa-home"></i> Home</a>
                            <hr class="m-0 p-0" />
                            
                            <?php if (strpos($currentURL, "/cart") !== false) { ?>
                                <a class="dropdown-item p-3" href="login?prev=cart"><i class="mr-3 fa fa-lock"></i> Sign in</a>
                                <hr class="m-0 p-0" />
                            <?php } elseif (strpos($currentURL, "/wish") !== false) { ?>
                                <a class="dropdown-item p-3" href="login?prev=wish"><i class="mr-3 fa fa-lock"></i> Sign in</a>
                                <hr class="m-0 p-0" />
                            <?php } else { ?>
                                <a class="dropdown-item p-3" href="login"><i class="mr-3 fa fa-lock"></i> Sign in</a>
                                <hr class="m-0 p-0" />
                            <?php } ?>

                            <a class="dropdown-item p-3" href="wish"><i class="mr-3 far fa-heart"></i> Saved</a>
                            <hr class="m-0 p-0" />
                            <a class="dropdown-item p-3" href="myaccount?page=main"><i class="mr-3 far fa-user"></i> My Account</a>
                            <hr class="m-0 p-0" />
                            <a class="dropdown-item p-3" href="recent_search"><i class="mr-3 far fa-clock"></i> Recent Searches</a>
                            <hr class="m-0 p-0" />
                            <a class="dropdown-item p-3" href="#"><i class="mr-3 fa fa-th-large"></i> Recently Viewed</a>
                            <hr class="m-0 p-0" />
                            <a class="dropdown-item p-2" href="#"><i class="ml-2 mr-3 fa fa-truck"></i> My Orders</a>

                        <?php } elseif ($admin) { ?>
                            <a class="dropdown-item p-2" href="logout"><i class="ml-2 mr-3 fa fa-lock"></i> Sign Out</a>
                            <hr class="m-0 p-0" />
                            <a class="dropdown-item p-3" href="recent_search"><i class="mr-3 far fa-clock"></i> Recent Searches</a>
                            <hr class="m-0 p-0" />
                            <a class="dropdown-item p-3" href="#"><i class="mr-3 fa fa-th-large"></i> Recently Viewed</a>
                            <hr class="m-0 p-0" />
                            <a class="dropdown-item p-2" href="#"><i class="ml-2 mr-3 fa fa-truck"></i> My Orders</a>
                        <?php } ?>

                    </div>
                </li>
            </ul>

            <!-- Navbar Properties -->
            <div class="body fixed-top bg-light pt-2 pb-0" id="indexbody">

                <!-- Navbar links -->
                <div class="container nav-bottom-links">
                    <div class="row">
                        <div class="nav-item text-center col">
                            <a class="nav-link text-center" href="home">
                                <i class="fa fa-home"></i>
                                <br />
                                <span class="home">Home</span>
                            </a>
                        </div>
                        <div class="nav-item text-center col">
                            <a class="nav-link text-center wish-text" href="item_upload">
                                <i id="fa" class="fa fa-file-upload"></i>
                                <br />
                                <span class="item_upload">Item Upload</span>
                            </a>
                        </div>
                        <div class="nav-item text-center col">
                            <a class="nav-link text-center settings-text" href="settings">
                                <i class="fa fa-cogs"></i>
                                <br />
                                <span class="settings">Manage</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <?php if (strpos($currentURL, "/home") !== false) { ?>
                <style>
                    .home{
                        color: rgb(7, 7, 7) !important;
                        border-bottom: 2px solid red !important
                    }
                </style>
                            
            <?php  } elseif (strpos($currentURL, "/item_upload") !== false) { ?>
                <style>
                    .item_upload{
                        color: rgb(7, 7, 7) !important;
                        border-bottom: 2px solid red !important
                    }

                    .nav-item .wish-text a:hover>.badge i {
                        color: white !important
                    }
                </style>

            <?php  } elseif (($currentURL) == 'http://localhost/ecal/admin') { ?>
                <style>
                    .home{
                        color: rgb(7, 7, 7) !important;
                        border-bottom: 2px solid red !important
                    }
                </style>
            <?php } ?>

            <?php if (strpos($currentURL, "/settings") !== false) { ?>
                <style>
                    .settings{
                        color: rgb(7, 7, 7) !important;
                        border-bottom: 2px solid red !important
                    }

                    .nav-item .settings-text .badge i {
                        color: white !important
                    }
                </style>
            <?php } ?>
    
        </nav>
    <?php } ?>
</header>
<body>
    <br />