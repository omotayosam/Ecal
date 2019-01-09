<?php include("include/headerinc.php"); ?>
<br><br><br><br>
<?php
    $red_mess = "";
    $prev = "";
    if (isset($_GET['next']) || isset($_GET['page'])) {
        # code...
        $prev = @$_GET['next'];
        $page = @$_GET['page'];
    }
    
    if ($prev == "men") {
        $next_link = "men";

    } elseif ($prev == "women") {
        $next_link = "women";

    } elseif ($prev == "cart") {
        $next_link = "cart";

    } elseif ($prev == "wish") {
        $next_link = "wish";

    } elseif ($prev == "logout") {
        $red_mess = "Logging Out...";
        $next_link = "login";

    } else {
        $red_mess = "Please Wait...";
        $next_link = "index";
    }    

    if ($page == "login") {
        $red_mess = "Signing In";
    }
?>
    <!-- <div class="text-center display-3">
    <span class="fa fa-spin fa fa-chevron-right"></span><span class="fa fa-spin fa fa-chevron-left"></span> -->
    <div class="spn_hol">
        <div class="text"><h5><?php echo $red_mess; ?></h5></div>
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    
    <div class="zoom-anim-dialog">Redirecting</div>
        <meta http-equiv ="refresh" content="2; url = <?php echo $next_link; ?>">
    </div>
</body>
</html>