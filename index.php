<?php include "include/headerinc.php"; ?>

<?php
    $red_mess = '';
    if (!isset($_GET['next']) || !isset($_GET['page'])) {
            # code...
        $red_mess = 'Please Wait';
    }
?>

<div class="spn_hol">
    <div class="text">
        <h5><?php echo $red_mess; ?></h5>
    </div>
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>

<style>
</style>

<!-- sl-slider Container -->
<div class="container-fluid demo-2" style="width:98%">
    <br />
    <br />

    <!-- sl-slider wrapper -->
    <div id="slider" class="sl-slider-wrapper">

        <!-- sl-slider  -->
        <div class="sl-slider">

            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
                <div class="sl-slide-inner">
                    <div class="bg-img bg-img-1"></div>
                    <h2>Your Favourites For Less.</h2>
                    <blockquote>
                        <p>Discover Our deal of the day.</p>
                    </blockquote>
                </div>
            </div>

            <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
                <div class="sl-slide-inner">
                    <div class="bg-img bg-img-2"></div>
                    <h2>Shop With 100%</h2>
                    <blockquote>
                        <p>confidence on KALshop.</p>
                    </blockquote>
                </div>
            </div>

            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
                <div class="sl-slide-inner">
                    <div class="bg-img bg-img-3"></div>
                    <h2>Sales & Deals</h2>
                    <blockquote>
                        <p>Automobile</p>
                    </blockquote>
                </div>
            </div>
            
            <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="-5" data-slice2-rotation="25" data-slice1-scale="2" data-slice2-scale="1">
                <div class="sl-slide-inner">
                    <div class="bg-img bg-img-4"></div>
                    <h2>Guaranteed Same day DELIVERY</h2>
                    <blockquote>
                        <p>Gadgets & Electronics</p>
                    </blockquote>
                </div>
            </div>
            
            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
                <div class="sl-slide-inner">
                    <div class="bg-img bg-img-5"></div>
                    <h2>Don't Starve! order now</h2>
                    <blockquote>
                        <p>food & drinks</p>
                    </blockquote>
                </div>
            </div>

        </div>
        <!-- /sl-slider -->

        <!-- sl-slider Nav -->
        <nav id="nav-arrows" class="nav-arrows">
            <span class="nav-arrow-prev">Previous</span>
            <span class="nav-arrow-next">Next</span>
        </nav>
        <nav id="nav-dots" class="nav-dots">
            <span class="nav-dot-current"></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </nav>
        <!-- /sl-slider Nav -->

    </div>
    <!-- /sl-slider Wrapper -->

</div>
<!-- /sl-slider Container -->
<br /><br /><br />

<!-- Div Container For Body Contents[1]-->
<div class="container-fluid" style="width:98%">
    
    <div class="section-title">
        <h2 class="title">| Featured <span>Products |</span></h2>
    </div>
    
    <!-- Owl-Carousel-1 -->
    <div class="owl-carousel owl-theme owl-loaded center-owl-nav owl-carousel-6">
        
        <div class="item">
            <article class="article thumb-article">
                <div class="article-img">
                    <a href="#"><img src="wwwroot/img/blouse.jpg" class="img-fluid" alt="5"></a>
                </div>
            </article>
            <div class="product-details"><a href="#"><button class="salebutton" id="prod" style="vertical-align:middle"><span>Dress | &#8358;1200</span> <i id="fa" class="text-white fa"></i></button></a></div>
        </div>

        <div class="item">
            <article class="article thumb-article">
                <div class="article-img">
                    <a href="#"><img src="wwwroot/img/denim.jpg" class="img-fluid" alt="4"></a>
                </div>
            </article>
            <div class="product-details"> <a href="#"><button class="salebutton" style="vertical-align:middle"><span>Denim Jacket | &#8358;11200 </span> <i id="fa" class="text-white fa"></i></button></a> </div>
        </div>

        <div class="item">
            <article class="article thumb-article">
                <div class="article-img">
                    <a href="#"><img src="wwwroot/img/hat.jpg" class="img-fluid" alt="3"></a>
                </div>
            </article>
            <div class="product-details"> <a href="go"><button class="salebutton" style="vertical-align:middle"><span>Beautiful Lady| &#8358;1.5mil </span><i id="fa" class="text-white fa"></i></button></a> </div>
        </div>

        <div class="item">
            <article class="article thumb-article">
                <div class="article-img">
                    <a href=""><img src="wwwroot/img/redcoat.jpg" class="img-fluid" alt="2"></a>
                </div>
            </article>
            <div class="product-details"> <a href="#"><button class="salebutton" style="vertical-align:middle"><span>Red Coat | &#8358;15000 </span><i id="fa" class="text-white fa"></i></button></a> </div>
        </div>

        <div class="item">
            <article class="article thumb-article">
                <div class="article-img">
                    <a href=""><img src="wwwroot/img/trenchcoat.jpg" class="img-fluid" alt="1"></a>
                </div>
            </article>
            <div class="product-details"> <a href="#"><button class="salebutton" style="vertical-align:middle"><span>Trench Coat | &#8358;1200 </span><i id="fa" class="text-white fa"></i></button></a> </div>
        </div>

    </div>
    <!-- /Owl-Carousel-1 -->

</div>
<!-- /Div Container For Body Contents[1]-->

<!-- Div Container For Body Contents[2]-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 p-0">
            <div id="kalshop-section-1" class="kalshop-section index-section">

                <!-- hot deal start -->
                <section class="theme-bg text-center text-white" id="">
                    <div class="timer-container">
                        <div class="section-title2 mb-0">
                            <br />
                            <br />
                            <h2 class="title mb-3">| Hot Deal Of <span> the week |</span></h2>
                            <h4 class="text-white text-capitalize mb-0">Hurry Up Offer ends in:</h4>
                        </div>
                        <br />
                        <div class="py-5">
                            <div id="clockdiv">
                                <div>
                                    <span class="days"></span>
                                    <div class="smalltext">Days</div>
                                </div>
                                <div>
                                    <span class="hours"></span>
                                    <div class="smalltext">Hours</div>
                                </div>
                                <div>
                                    <span class="minutes"></span>
                                    <div class="smalltext">Minutes</div>
                                </div>
                                <div>
                                    <span class="seconds"></span>
                                    <div class="smalltext">Seconds</div>
                                </div>
                            </div>
                        </div>
                        <a class="shopbtn w3-btn w3-white w3-border w3-border-green w3-round-xxlarge w3-hover-green" href="#"><span>Shop now<span></a>
                        <br />
                        <br />
                    </div>
                </section>
                <!-- /hot deal start -->

            </div>
        </div>
    </div>

    <!-- Owl-Carousel-2 -->
    <div class="mt-4 owl-carousel owl-theme owl-loaded center-owl-nav owl-carousel-6">
        
        <div class="item">
            <article class="article thumb-article">
                <div class="article-img">
                    <a href="#"><img src="wwwroot/img/blouse.jpg" class="img-fluid" alt="5"></a>
                </div>
            </article>
            <div class="product-details"> <a href="#"><button class="salebutton" style="vertical-align:middle"><span>Denim Jacket | &#8358;11200 </span> <i id="fa" class="text-white fa"></i></button></a> </div>
        </div>

        <div class="item">
            <article class="article thumb-article">
                <div class="article-img">
                    <a href="#"><img src="wwwroot/img/denim.jpg" class="img-fluid" alt="4"></a>
                </div>
            </article>
            <div class="product-details"> <a href="#"><button class="salebutton" style="vertical-align:middle"><span>Denim Jacket | &#8358;11200 </span> <i id="fa" class="text-white fa"></i></button></a> </div>
        </div>

        <div class="item">
            <article class="article thumb-article">
                <div class="article-img">
                    <a href="#"><img src="wwwroot/img/hat.jpg" class="img-fluid" alt="3"></a>
                </div>
            </article>
            <div class="product-details"> <a href="#"><button class="salebutton" style="vertical-align:middle"><span>Beautiful Lady| &#8358;1.5mil </span><i id="fa" class="text-white fa"></i></button></a> </div>
        </div>

        <div class="item">
            <article class="article thumb-article">
                <div class="article-img">
                    <a href=""><img src="wwwroot/img/redcoat.jpg" class="img-fluid" alt="2"></a>
                </div>
            </article>
            <div class="product-details"> <a href="#"><button class="salebutton" style="vertical-align:middle"><span>Red Coat | &#8358;15000 </span><i id="fa" class="text-white fa"></i></button></a> </div>
        </div>

        <div class="item">
            <article class="article thumb-article">
                <div class="article-img">
                    <a href=""><img src="wwwroot/img/trenchcoat.jpg" class="img-fluid" alt="1"></a>
                </div>
            </article>
            <div class="product-details"> <a href="#"><button class="salebutton" style="vertical-align:middle"><span>Trench Coat | &#8358;1200 </span><i id="fa" class="text-white fa"></i></button></a> </div>
        </div>

        <div class="item">
            <article class="article thumb-article">
                <div class="article-img">
                    <a href=""><img src="wwwroot/img/lot.jpg" class="img-fluid" alt="2"></a>
                </div>
            </article>
            <div class="product-details"> <a href="#"><button class="salebutton" style="vertical-align:middle"><span>Items | &#8358;15000 </span><i id="fa" class="text-white fa"></i></button></a> </div>
        </div>

        <div class="item">
            <article class="article thumb-article">
                <div class="article-img">
                    <a href=""><img src="wwwroot/img/mo.jpg" class="img-fluid" alt="1"></a>
                </div>
            </article>
            <div class="product-details"> <a href="#"><button class="salebutton" style="vertical-align:middle"><span>Arab lady | &#8358;16 Mil </span><i id="fa" class="text-white fa"></i></button></a> </div>
        </div>

    </div>
    <!-- /Owl-Carousel-2 -->

    <div id="kal-section-2" class="kalshop-section">
        <section class="" id="">
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-8 col-md-12 mb-2 ml-auto mr-auto">
                        <div class="section-title">
                            <h2 class="title">| New <span>Arrivals |</span></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="grid row columns-3">
                            
                            
                            <div class="col-lg-4 mb-5">
                                <div class="row">
                                    <!--1 -->
                                    <div class="mb-2 col-lg-12 col-md-6">
                                        <div class="imgcontainer img">
                                            <a target="_self" href="#">
                                                <img src="wwwroot/img/mo.jpg" alt="#" class="image img-fluid" width="300" height="200">
                                            </a>
                                            <div class="desc">Add product description and price &#8358; here </div>
                                            <div class="overlay">
                                                <a href="#" class="icon" title="ADD TO CART">
                                                    <i class="fa fa-shopping-bag"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--2 -->
                                    <div class="mb-2 col-lg-12 col-md-6">
                                        <div class="imgcontainer img">
                                            <a target="_self" href="#">
                                                <img src="wwwroot/img/lot.jpg" alt="#" class="image img-fluid" width="300" height="200">
                                            </a>
                                            <div class="desc">Add product description and price &#8358; here </div>
                                            <div class="overlay">
                                                <a href="#" class="icon" title="ADD TO CART">
                                                    <i class="fa fa-shopping-bag"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                
                            <div class="col-lg-4 mb-5">
                                <div class="row">
                                    <!--3 -->
                                    <div class="mb-2 col-lg-12 col-md-6">
                                        <div class="imgcontainer img">
                                            <a target="_self" href="#">
                                                <img src="wwwroot/img/skate.jpg" alt="#" class="image img-fluid" width="300" height="200">
                                            </a>
                                            <div class="desc">Add product description and price &#8358; here </div>
                                            <div class="overlay">
                                                <a href="#" class="icon" title="ADD TO CART">
                                                    <i class="fa fa-shopping-bag"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--4 -->
                                    <div class="mb-2 col-lg-12 col-md-6">
                                        <div class="imgcontainer img">
                                            <a target="_self" href="#">
                                                <img src="wwwroot/img/trenchcoat.jpg" alt="#" class="image img-fluid" width="300" height="200">
                                            </a>
                                            <div class="desc">Brown Trench Coat. &#8358;7,000 </div>
                                            <div class="overlay">
                                                <a href="#" class="icon" title="ADD TO CART">
                                                    <i class="fa fa-shopping-bag"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 mb-5">
                                <div class="row">
                                    <!--5 -->
                                    <div class="mb-2 col-lg-12 col-md-6">
                                        <div class="imgcontainer img">
                                            <a target="_self" href="#">
                                                <img src="wwwroot/img/hat.jpg" alt="#" class="image img-fluid" width="300" height="200">
                                            </a>
                                            <div class="desc">Add product description and price &#8358; here </div>
                                            <div class="overlay">
                                                <a href="#" class="icon" title="ADD TO CART">
                                                    <i class="fa fa-shopping-bag"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--6 -->
                                    <div class="mb-2 col-lg-12 col-md-6">
                                        <div class="imgcontainer img">
                                            <a target="_self" href="#">
                                                <img src="wwwroot/img/redcoat.jpg" alt="#" class="image img-fluid" width="300" height="200">
                                            </a>
                                            <div class="desc">Add product description and price &#8358; here </div>
                                            <div class="overlay">
                                                <a href="#" class="icon" title="ADD TO CART">
                                                    <i class="fa fa-shopping-bag"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <style>
    </style>
    <br />
    <br />
    
    <!-- tiny product section -->
    <div id="tiny-product section" class="kalshop-section">
        <section class="product-left-side">
            <div class="container">
                <div class="row p-0">
                    
                    <div class="col-lg-4 mb-5">
                        <h4 class="mb-2 title">| TOP <span>MEN|</span></h4>
                        <div class="row">
                            <div class="product product-left mb-2 col-lg-12 col-md-6">
                                <div class="smallimg">
                                    <div class="img">
                                        <a target="_self" href="img_mountains.jpg">
                                            <img class="img-fluid" src="wwwroot/img/skate.jpg" alt="Mountains" width="600" height="400">
                                        </a>
                                        <div class="desc">Add a description of the image here</div>
                                    </div>
                                </div>
                            </div>
                            <div class="product product-left mb-2 col-lg-12 col-md-6">
                                <div class="smallimg">
                                    <div class="img">
                                        <a target="_self" href="img_mountains.jpg">
                                            <img class="img-fluid" src="wwwroot/img/skate.jpg" alt="Mountains" width="600" height="400">
                                        </a>
                                        <div class="desc">Add a description of the image here</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-5">
                        <h4 class="mb-2 title">| MOST <span>POPULAR|</span></h4>
                        <div class="row">
                            <div class="product product-left mb-2 col-lg-12 col-md-6">
                                <div class="smallimg">
                                    <div class="img">
                                        <a target="_self" href="img_mountains.jpg">
                                            <img class="img-fluid" src="wwwroot/img/skate.jpg" alt="Mountains">
                                        </a>
                                        <div class="desc">Add a description of the image here</div>
                                    </div>
                                </div>
                            </div>
                            <div class="product product-left mb-2 col-lg-12 col-md-6">
                                <div class="smallimg">
                                    <div class="img">
                                        <a target="_self" href="img_mountains.jpg">
                                            <img class="img-fluid" src="wwwroot/img/skate.jpg" alt="Mountains" width="600" height="400">
                                        </a>
                                        <div class="desc">Add a description of the image here</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 mb-5">
                        <h4 class="mb-2 title">| WOMEN <span>COLLECTION|</span></h4>
                        <div class="row">
                            <div class="product product-left mb-2 col-lg-12 col-md-6">
                                <div class="smallimg">
                                    <div class="img">
                                        <a target="_self" href="img_mountains.jpg">
                                            <img class="img-fluid" src="wwwroot/img/skate.jpg" alt="Mountains">
                                        </a>
                                        <div class="desc">Add a description of the image here</div>
                                    </div>
                                </div>
                            </div>
                            <div class="product product-left mb-2 col-lg-12 col-md-6">
                                <div class="smallimg">
                                    <div class="img">
                                        <a target="_self" href="img_mountains.jpg">
                                            <img class="img-fluid" src="wwwroot/img/skate.jpg" alt="Mountains" width="600" height="400">
                                        </a>
                                        <div class="desc">Add a description of the image here</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
                    
                        <!-- <div class="col-lg-4 col-md-12 mb-4">
                        <div class="shadow h-100 px-0">
                            <h4 class="mb-4 title">| WOMEN <span>COLLECTION |</span></h4>
                            <div class="product product-left mb-4">
                                <div class="smallimg">
                                    <div class="img">
                                        <a target="_self" href="img_mountains.jpg">
                                            <img src="wwwroot/img/skate.jpg" alt="Mountains" width="600" height="400">
                                        </a>
                                        <div class="desc">Add a description of the image here</div>
                                    </div>
                                </div>
                            </div>
                            <div class="product product-left mb-4">
                                <div class="smallimg">
                                    <div class="img">
                                        <a target="_self" href="img_mountains.jpg">
                                            <img src="wwwroot/img/skate.jpg" alt="Mountains" width="600" height="400">
                                        </a>
                                        <div class="desc">Add a description of the image here</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                    <!-- <div class="col-lg-4 col-md-12">
                        <h4 class="mb-4 title">| TOP <span>MEN|</span></h4>
                        <div class="product product-left mb-4">
                            <div class="smallimg">
                                <div class="img">
                                    <a target="_self" href="img_mountains.jpg">
                                        <img src="wwwroot/img/skate.jpg" alt="Mountains" width="600" height="400">
                                    </a>
                                    <div class="desc">Add a description of the image here</div>
                                </div>
                            </div>
                        </div>
                        <div class="product product-left mb-4">
                            <div class="smallimg">
                                <div class="img">
                                    <a target="_self" href="img_mountains.jpg">
                                        <img src="wwwroot/img/skate.jpg" alt="Mountains" width="600" height="400">
                                    </a>
                                    <div class="desc">Add a description of the image here</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <h4 class="mb-4 title">| MOST <span>POPULAR |</span></h4>
                        <div class="product product-left mb-4">
                            <div class="smallimg">
                                <div class="img">
                                    <a target="_self" href="img_mountains.jpg">
                                        <img src="wwwroot/img/skate.jpg" alt="Mountains" width="600" height="400">
                                    </a>
                                    <div class="desc">Add a description of the image here</div>
                                </div>
                            </div>
                        </div>
                        <div class="product product-left mb-4">
                            <div class="smallimg">
                                <div class="img">
                                    <a target="_self" href="img_mountains.jpg">
                                        <img src="wwwroot/img/skate.jpg" alt="Mountains" width="600" height="400">
                                    </a>
                                    <div class="desc">Add a description of the image here</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <h4 class="mb-4 title">| WOMEN <span>COLLECTION |</span></h4>
                        <div class="product product-left mb-4">
                            <div class="smallimg">
                                <div class="img">
                                    <a target="_self" href="img_mountains.jpg">
                                        <img src="wwwroot/img/skate.jpg" alt="Mountains" width="600" height="400">
                                    </a>
                                    <div class="desc">Add a description of the image here</div>
                                </div>
                            </div>
                        </div>
                        <div class="product product-left mb-4">
                            <div class="smallimg">
                                <div class="img">
                                    <a target="_self" href="img_mountains.jpg">
                                        <img src="wwwroot/img/skate.jpg" alt="Mountains" width="600" height="400">
                                    </a>
                                    <div class="desc">Add a description of the image here</div>
                                </div>
                            </div>
                        </div> -->

                    </div>
                </div>
        </section>
    </div>
    <br />
    <br />

    <div id="kalshop-section" class="section">
        <section class="grey-bg " id="">
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-8 col-md-12 ml-auto mr-auto">
                        <div class="section-title">
                            <h2 class="title">| <b>Best <span>Sellers |</span></h2>
                    </div>
                </div>
            </div>
            <br />
            <br />
            <div class="owl-carousel owl-theme custom1">
                <div class="item">
                    <a href="#"><img src="wwwroot/img/autoM.jpg" /></a>
                </div>
                <div class="item">
                    <a href="#"><img src="wwwroot/img/julian-o-hayon-143085-unsplash.jpg" /></a>
                    <div class="sl-slide-inner">
                        <div class="bg-img bg-img-4"></div>
                        <h2>Guaranteed Same day DELIVERY</h2>
                        <blockquote>
                            <p>Gadgets & Electronics</p>
                        </blockquote>
                    </div>
                </div>
                <div class="item">
                    <a href="#"><img src="wwwroot/img/julian-o-hayon-143085-unsplash.jpg" /></a>
                </div> 
                <div class="item">
                    <a href="#"><img src="wwwroot/img/julian-o-hayon-143085-unsplash.jpg" /></a> 
                </div>
            </div>
        </section>
    </div>

</div> 
<!-- /Div Container For Body Contents[2]-->

<!--=== Scripts section ====->
    1. Slider scripts
    2. Owl-Carousel scripts
    3. Timer
    4. Spinner
<--========================-->

<!-- 1. Slider scripts -->
<script type="text/javascript" src="wwwroot/slider/js/jquery.ba-cond.min.js"></script>
<script type="text/javascript" src="wwwroot/slider/js/jquery.slitslider.js"></script>

<!-- 2. Owl-Carousel scripts -->
<script src="./wwwroot/owlcarousel/main.js"></script>
<script src="./wwwroot/owlcarousel/owl.carousel.min.js"></script>
<script src="./wwwroot/owlcarousel/jquery.mousewheel.min.js"></script>

<!-- 3. Timer -->
<script type="text/javascript">
    function getTimeRemaining(endtime) {
        var t = Date.parse(endtime) - Date.parse(new Date());
        var seconds = Math.floor((t / 1000) % 60);
        var minutes = Math.floor((t / 1000 / 60) % 60);
        var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
        var days = Math.floor(t / (1000 * 60 * 60 * 24));
        return {
            'total': t,
            'days': days,
            'hours': hours,
            'minutes': minutes,
            'seconds': seconds
        };
    }

    function initializeClock(id, endtime) {
        var clock = document.getElementById(id);
        var daysSpan = clock.querySelector('.days');
        var hoursSpan = clock.querySelector('.hours');
        var minutesSpan = clock.querySelector('.minutes');
        var secondsSpan = clock.querySelector('.seconds');

        function updateClock() {
            var t = getTimeRemaining(endtime);

            daysSpan.innerHTML = t.days;
            hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
            minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
            secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);
            if (t.total <= 0) {
                clearInterval(timeinterval);
            }
        }

    updateClock();
    var timeinterval = setInterval(updateClock, 1000);
    }

    var deadline = new Date(Date.parse(new Date()) + 15 * 24 * 60 * 60 * 1000);
    initializeClock('clockdiv', deadline);
</script>

<!-- 4. Spinner script -->
<script src="./wwwroot/js/script.js"></script>