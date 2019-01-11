<?php 
    //Include Header file bar
    include("include/headerinc.php"); 
?>

<!-- ========[ Embedded styling for Cart page ]======== -->
<style>
    a:link{
        text-decoration: none
    }

    body{
        background-color: rgba(210, 210, 210, 0.521);
    }
    
    .main{
        width: 97%;
        margin-top: 60px;
    }
    
    .main .btn-sm{
        margin-bottom: 10px;
        padding: .0.20rem .0.20rem !important;
    }
    
    .itembox{
        min-height: 20px;
        padding: 19px;
        margin-bottom: 20px;
        background-color: white;
        /* border: 1px solid #e3e3e3; */
        border-radius: 6px;
        /* -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05) */
    }
    
    /* Styling for top part of cart item */
    .top img {
        opacity: 0.95;
        -webkit-transition: 0.5s opacity;
        -webkit-transform: scale(0.97);
        -ms-transform: scale(0.97);
        transform: scale(0.97);
        transition: 0.5s opacity;
        transition: 0.5s -webkit-transform;
        transition: 0.5s transform;
        transition: 0.5s transform, 0.5s -webkit-transform;
        
    }

    .top img:hover {
        opacity: 1;
        -webkit-transform: scale(1.1);
        -ms-transform: scale(1.1);
        transform: scale(1);
    }

    .top div>a:hover {
        color: blue !important
    }
    
    .top a:link,
    .top a:active{
        text-decoration: none !important;
        color: black !important;
    }
    
    .top a:visited{
        color: rgb(0, 15, 0) !important
    }

    @media screen and (min-width: 768px){
        .top img{
            height: 300px !important
        }
    }
    
    /*--> End of Styling for top part of cart item <--*/
    
    /* Styling for down part of cart item */
    .down{
        margin-bottom: -20px;
        padding-bottom: 10px;
        /*border: 1px solid black*/
    }
    
    .num{
        line-height: 0;
        color: darkred
    }
    
    .btn-sm{
        font-size: 1.3rem !important;
    }
    
    .down hr{
        border-bottom: 1px solid lightgrey;
    }
    
    .down button{
        color: rgb(228, 134, 13) !important
    }
    
    .down .binborder{
        border-right: 1px solid lightgrey;
    }
    
    .down .fa-plus-circle:hover{
        color: darkgreen !important
    }
    
    .down .trash:hover,
    .down .fa-minus-circle:hover{
        color: #dc3545 !important
    }
    /*--> End of Styling for down part of cart item <--*/

    /* Styling for Comlete button */
    .complete button{
        background-color: rgb(228, 134, 13) !important
    }
    /*--> End of Styling for complete button <--*/
    
    /* Responsive */
    @media screen and (max-width: 600px){
        .top .h5{
            font-size: 14px !important
        }
        .down button{
            font-weight: 400;
            line-height: 1rem;
            font-size: 14px !important
        }
    }
    
    @media screen and (max-width: 800px){
        .top img{
            height: 200px !important;
        }
    }
</style>
<!-- ========[ End of embedded styling ]======== -->

<!-- ========[ Main body of cart page ]======== -->
<body>
    <?php
        $errmsg = "";
        $rem_cart_alert = "";
    ?>

    <?php
        $get_uid_sqli = $connect->query("SELECT `user_id` FROM `cart` WHERE `user_id` = '$uId'");
        $get_uid = $get_uid_sqli->fetch_array();
        $cart_uid = $get_uid['user_id'];

        $get_price_sqli = $connect->query("SELECT SUM(`total_price`) As Total from `cart` WHERE `user_id` = '$uId'");
        $getP = $get_price_sqli->fetch_array();
        $mPrice = $getP['Total'];

        $get_price_sqli = $connect->query("SELECT SUM(`subtotal`) As Total from `cart` WHERE `user_id` = '$uId'");
        $getP = $get_price_sqli->fetch_array();
        $nPrice = $getP['Total'];

        $get_cItems_sqli = $connect->query("SELECT * FROM `cart` WHERE `user_id` = '$uId'");
        $check = $get_cItems_sqli->num_rows;

        if ($check == 0) {
            ?>
            <div class="main container-fluid bg-light pt-2 itembox offset-lg-2 col-lg-8">
                <div class="row">
                    <div class="col-12">
                        <br />
                        <div class="container alert alert-danger bg-white">
                            <span class='fa fa-exclamation-triangle'></span> Sorry you have no items in the cart...<br>
                        </div>

                        <?php if ($user == 'Guest') { ?>
                            <div class="container alert alert-info bg-white">
                                <span class='fa fa-exclamation-triangle'></span> Please <a href="login?prev=cart" class="text-primary">Login</a> to add items to cart...
                            </div>
                        <?php } else { ?>
                            <div class="container alert alert-info bg-white">
                                <span class="fa fa-exclamation-triangle"></span> Add items to cart for them to display here
                            </div>
                        <?php } ?>
                        
                    </div>
                </div>
            </div>
            <style>
                footer {
                    position: fixed;
                    right: 0;
                    bottom: 0;
                    left: 0;
                    z-index: 1030
                }
            </style>
            <?php include("include/footerinc.php"); ?>
            <?php
            exit();
        }
        
        while($call = $get_cItems_sqli->fetch_assoc()) {

            $itemID = $call['item_id'];
            $countI = $call['item_count'];
            $Tprice = $call['total_price'];
            
            $get_Items_sqli = $connect->query("SELECT * FROM `items` WHERE `id` = '$itemID'");

            while($check = $get_Items_sqli->fetch_array()){

                $pic = $check['item_pic'];
                $name = $check['item_name'];
                $details = $check['item_info'];
                $cSign = $check['currency'];
                $price = $check['price'];
                $item_left = $check['no_item_left'];

                if ((($item_left) == 0) || ($item_left) > 1) {
                    # code...
                    $item_left .= ' Items Left';

                } else {
                    # code...
                    $item_left .= ' Item Left';
                }
                // `colour` = '$colour' and `size` = '$size'
                // $get_IndItems = "SELECT `item_count` FROM `cart` WHERE `user_id` = '$uId'";
                // $get_IndItems_sqli = mysqli_query($connect, $get_IndItems);
                // $get = mysqli_fetch_assoc($get_IndItems_sqli);
                // $checkIndItems = $get['item_count'];

                
                if(@$_POST['minus_'. $itemID . '']) {
                    # code...
                    // $cart_check_sql = "SELECT `item_count`, `total_price` FROM `cart` WHERE `item_id` = '$itemID'";
                    // $cart_check = mysqli_query($connect, $cart_check_sql);
                    // $get = mysqli_fetch_array($cart_check);
                    // $countI = $get['item_count'];
                    // $Tprice = $get['total_price'];

                    $i = intval($countI);
                    $i--;
                    $TCprice = intval($Tprice);
                    $Cprice = intval($price);
                                
                    if($TCprice == ($Cprice)) {
                        $remCart_sql = "DELETE FROM `cart` WHERE `item_id` = '$itemID'";
                        $remCart_sqli = mysqli_query($connect,$remCart_sql);
                        $errmsg = "
                            <div class='container alert alert-danger bg-light'>
                                <span class='fa fa-exclamation-triangle'></span> Item Successfully removed from cart!!! $count
                            </div>
                        ";
                        echo "<meta http-equiv =\"refresh\" content=\"1.5; url = cart\">";

                    } else {
                        $TCprice = intval($Tprice - $price);
                                    
                        $remCart_sql = "UPDATE `cart` SET `item_count` = '$i', `total_price` = '$TCprice' WHERE `item_id` = '$itemID'";
                        $remCart_sqli = mysqli_query($connect, $remCart_sql);
                        $errmsg = "
                            <div class='container alert alert-warning bg-light'>
                                <span class='fa fa-exclamation-triangle'></span> Item Successfully removed from cart!!!
                            </div>
                        ";
                        echo "<meta http-equiv =\"refresh\" content=\"1.5; url = cart\">";
                    }
                }

                if(@$_POST['plus_'. $itemID . '']) {
                    # code...
                    $cart_check_sql = "SELECT `item_count`, `total_price` FROM `cart` WHERE `item_id` = '$itemID'";
                    $cart_check = mysqli_query($connect, $cart_check_sql);
                    $get = mysqli_fetch_array($cart_check);
                    $count = $get['item_count'];
                    $Tprice = $get['total_price'];
                                
                    $i = intval($count);
                    $i++;
                                
                    $Tprice = intval($Tprice + $price);

                    $addCart_sql = "UPDATE `cart` SET `item_count` = '$i', `total_price` = '$Tprice' WHERE `item_id` = '$itemID'";
                    $addCart_sqli = mysqli_query($connect, $addCart_sql);
                    $errmsg = "
                        <div class='container alert alert-success bg-light'>
                            <span class='fa fa-exclamation-triangle'></span> Item Successfully Added!!!
                        </div>
                    ";
                    echo "<meta http-equiv =\"refresh\" content=\"1; url = cart\">";
                }

                if(@$_POST['remCart_'. $itemID . '']) {
                    # code...
                    $remCart_sql = "DELETE FROM `cart` WHERE `item_id` = '$itemID'";
                    $remCart_sqli = mysqli_query($connect,$remCart_sql);
                    $errmsg = "
                        <div class='container alert alert-success bg-light'>
                            <span class='fa fa-exclamation-triangle'></span> Item Successfully removed from cart!!!
                        </div>
                    ";
                    echo "<meta http-equiv =\"refresh\" content=\"2; url = cart\">";
                }

                if(@$_POST['view_'. $itemID . '']) {
                    echo "<meta http-equiv =\"refresh\" content=\"1; url = preview?id=$itemID\">";
                }
                            
                if(@$_POST['contCheck']) {
                    # code...
                    if($user !== "Guest") {
                        # code...
                        $errmsg = "";
                        if($Ugender == "Male") {
                            echo "<meta http-equiv =\"refresh\" content=\"1; url = men\">";

                        } elseif($Ugender == "Female") {
                            # code...
                            echo "<meta http-equiv =\"refresh\" content=\"1; url = women\">";
                        }

                    } else{
                        echo "<meta http-equiv =\"refresh\" content=\"1; url = index\">";
                    }
                }    
                ?>
                <!-- ========[ Cart Item Container ]======== -->
                <div class="main container-fluid pt-2 itembox shadow-lg offset-lg-2 col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <?php echo $errmsg; ?>
                            <!-- ========[ Top row: Item image, name, details & price ]======== -->
                            <div class="top row">
                                <div class="cart-img col-4">
                                    <a href="<?php echo $pic; ?>" target="_blank">
                                        <img class="img-fluid" src="<?php echo $pic; ?>" alt="<?php echo "$name"; ?>" title="<?php echo "$details"; ?>" style="width:100%" />
                                    </a>
                                </div>
                                <br /><br />
                                <div class="mt-md-5 col px-5">
                                    <div>
                                        <a href="<?php echo "preview?id=$itemID"; ?>">
                                            <span class="h5"><?php echo $name; ?></span>
                                            <h6 style="line-height:0;"><?php echo $details; ?></h6><br />
                                            <span class="h5"><i style="font-weight:300">KAL Express_<sup>_</sup></i> <span class="text-danger fa fa-fighter-jet"></span></span>
                                            <h5><b><?php echo $cSign.$price; ?></b></h5>
                                        </a>
                                    </div>
                                    <div class="mt-5 pt-5 text-right text-muted"><small><?php echo "$item_left";?></small></div>
                                    <!-- </a> -->
                                </div>
                            </div>
                            <!-- ========[ End of Top row ]======== -->
                            <hr>

                            <!-- ========[ Down row: Wishlist button, Remove item button & Decrement/Increment item button ]======== -->
                            <div class="down row">
                                <div class="text-center binborder pt-2 col-2">
                                    <form action="#" method="POST">
                                        <button type="submit" class="mr-1 bg-white btn btn-sm wish" name="<?php echo "addWish_$itemID"; ?>" value="wish"><i class="heart text-danger far fa-heart"></i></button>
                                    </form>
                                </div>
                                <div class="mt-2 col-5 col-sm-7">
                                    <form action="#" method="POST">
                                        <button type="submit" class="mr-1 bg-white btn btn-sm trash" name="<?php echo "remCart_$itemID"; ?>" value="remove"><i class="fas fa-trash-alt"></i> <span class="trashtext">REMOVE</span></button>
                                    </form>
                                </div>
                                <div class="text-right col-4 col-sm-3">
                                    <form action="" method="POST" class="mt-sm-1">
                                        <span class="d-inline-flex">
                                            <button type="submit" class="mr-1 rounded-circle bg-white btn btn-sm" name="<?php echo "minus_$itemID"; ?>" value="minus"><i class="fa fa-minus-circle"></i></button>
                                            <i class="h5 num mt-3"><?php echo $countI; ?><hr></i>
                                            <button type="submit" class="ml-1 rounded-circle bg-white btn btn-sm" name="<?php echo "plus_$itemID"; ?>" value="plus"><i class="fa fa-plus-circle"></i></button>
                                        </span>
                                    </form>
                                </div>
                            </div>
                            <!-- ========[ End of Down row ]======== -->
                        </div>
                    </div>
                </div>
                <!-- ========[ End of cart item container ]======== -->  
                <?php 
            }
        } 
    ?>
    <br />
    <div class="itembox container-fluid offset-lg-2 col-lg-8 mb-0">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-4">
                        Subtotal:
                    </div>
                    <div class="text-right col-8">
                        <b><?php echo $cSign.$nPrice; ?></b>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-4">
                        Total:
                    </div>
                    <div class="text-right col-8">
                        <b><?php echo $cSign.$mPrice; ?></b>
                    </div>
                </div>
                <div class="row">
                    <div class="complete col-12">
                        <form action="" method="POST">
                            <button type="submit" class="w-100 mt-4 pt-3 pb-3 text-white btn btn-default" name="" value="complete"><b>COMPLETE YOUR ORDER</b></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br />
</body>
<!-- ========[ End of body ]======== -->

<?php include "include/footerinc.php"; ?>