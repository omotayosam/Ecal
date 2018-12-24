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
    
    .main input[type="text"]{
        border: none !important;
        outline: none !important;
        border-radius: 0 !important;
        border-bottom: solid 1px lightgrey !important;
    }
    
    .itembox{
        min-height: 20px;
        padding: 19px;
        margin-bottom: 20px;
        background-color: white;
        border: 1px solid #e3e3e3;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05)
    }
    
    /* Styling for top part of cart item */
    .top img {
        opacity: 0.9;
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

    .top a>div:hover {
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
        color: red
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
    
    .down .fa-trash:hover,
    .down .fa-minus-circle:hover{
        color: darkred !important
    }
    
    .down .fa-trash:hover::before {
        content: "\f014" !important;
        color: darkred !important
    }
    
    .down .fa-heart-o:hover::before{
        content: "\f004" !important;
        color: darkred !important
    }
    /*--> End of Styling for down part of cart item <--*/

    /* Styling for Comlete button */
    .complete button{
        background-color: rgb(228, 134, 13) !important
    }
    /*--> End of Styling for top part of cart item <--*/
    
    @media screen and (max-width: 600px){
        .top h5{
            font-size: 14px !important
        }
        .down button{
            font-weight: 400;
            line-height: 1rem;
            font-size: 14px !important
        }
    }
    
    @media screen and (min-width: 800px){
        .top img{
            height: 200px;
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

        $get_price_sqli = $connect->query("SELECT SUM(`price`) As Total from `items` WHERE `id` = '$cart_uid'");
        $getP = $get_price_sqli->fetch_array();
        $nPrice = $getP['Total'];

        $get_cItems_sqli = $connect->query("SELECT * FROM `cart` WHERE `user_id` = '$uId'");
        $check = $get_cItems_sqli->num_rows;

        if($check == 0) {
            ?>
            <div class="main container-fluid bg-light pt-2 itembox offset-lg-2 col-lg-8">
                <div class="row">
                    <div class="col-12">
                        <br />
                        <div class='container alert alert-danger bg-white'>
                            <span class='fa fa-exclamation-triangle'></span> Sorry you have no items in the cart...<br>
                        </div>
                        <div class='container alert alert-info bg-white'>
                            <span class='fa fa-exclamation-triangle'></span> Add items to cart for them to display here
                        </div>
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

        } elseif ($check == 1) {
            ?>
            <style>
                footer {
                    position: fixed;
                    right: 0;
                    bottom: 0;
                    left: 0;
                    z-index: 1030
                }
            </style>
            <?php include("include/footerinc.php");
        }
        
        while($call = mysqli_fetch_assoc($get_cItems_sqli)) {

            $id = $call['id'];

            $get_Items_sqli = $connect->query("SELECT * FROM `items` WHERE `id` = '$id'");
            $check = $get_Items_sqli->fetch_array();

            $itemID = $call['item_id'];
            $pic = $check['item_pic'];
            $name = $check['item_name'];
            $details = $check['item_info'];
            // $gender = $call['gender'];
            // $colour = $call['colour'];
            // $size = $call['size'];
            $cSign = $check['currency'];
            $price = $check['price'];
            $countI = $call ['item_count'];
            $Tprice = $call['total_price'];

            // `colour` = '$colour' and `size` = '$size'
            $get_IndItems = "SELECT `item_count` FROM `cart` WHERE `user_id` = '$uId'";
            $get_IndItems_sqli = mysqli_query($connect, $get_IndItems);
            $get = mysqli_fetch_assoc($get_IndItems_sqli);
            $checkIndItems = $get['item_count'];

                    
            if(@$_POST['minus_'. $id . '']) {
                # code...
                $cart_check_sql = "SELECT `item_count`, `total_price` FROM `cart` WHERE `item_id` = '$itemID'";
                $cart_check = mysqli_query($connect, $cart_check_sql);
                $get = mysqli_fetch_array($cart_check);
                $count = $get['item_count'];
                $Tprice = $get['total_price'];

                $i = intval($count);
                $i--;
                $TCprice = intval($Tprice);
                $Cprice = intval($price);
                            
                if($TCprice == ($Cprice)){
                    $remCart_sql = "DELETE FROM `cart` WHERE `item_id` = '$itemID'";
                    $remCart_sqli = mysqli_query($connect,$remCart_sql);
                    $errmsg = "
                        <div class='container alert alert-danger bg-light'>
                            <span class='fa fa-warning'></span> Item Successfully removed from cart!!!
                        </div>
                    ";
                    echo "<meta http-equiv =\"refresh\" content=\"1.5; url = cart\">";

                } else {
                    $TCprice = intval($Tprice - $price);
                                
                    $remCart_sql = "UPDATE `cart` SET `item_count` = '$i', `total_price` = '$TCprice' WHERE `item_id` = '$itemID'";
                    $remCart_sqli = mysqli_query($connect, $remCart_sql);
                    $errmsg = "
                        <div class='container alert alert-warning bg-light'>
                            <span class='fa fa-warning'></span> Item Successfully removed from cart!!!
                        </div>
                    ";
                    echo "<meta http-equiv =\"refresh\" content=\"1.5; url = cart\">";
                }
            }
            if(@$_POST['plus_'. $id . '']) {
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
                        <span class='fa fa-warning'></span> Item Successfully Added!!!
                    </div>
                ";
                echo "<meta http-equiv =\"refresh\" content=\"1; url = cart\">";
            }

            if(@$_POST['remCart_'. $id . '']) {
                # code...
                $remCart_sql = "DELETE FROM `cart` WHERE `item_id` = '$itemID'";
                $remCart_sqli = mysqli_query($connect,$remCart_sql);
                $errmsg = "
                    <div class='container alert alert-warning bg-light'>
                        <span class='fa fa-warning'></span> Item Successfully removed from cart!!!
                    </div>
                ";
                echo "<meta http-equiv =\"refresh\" content=\"2; url = cart\">";
            }

            if(@$_POST['view_'. $itemID . '']) {
                echo "<meta http-equiv =\"refresh\" content=\"1; url = http://localhost/nice/preview?id=$itemID\">";
            }
                        
            if(@$_POST['contCheck']) {
                # code...
                if($user !== "Guest") {
                    # code...
                    $errmsg = "";
                    if($Ugender == "Male") {
                        echo "<meta http-equiv =\"refresh\" content=\"1; url = http://localhost/nice/men\">";
                    }
                    else
                    if($Ugender == "Female") {
                        # code...
                        echo "<meta http-equiv =\"refresh\" content=\"1; url = http://localhost/nice/women\">";
                    }
                }
                else{
                    echo "<meta http-equiv =\"refresh\" content=\"1; url = http://localhost/nice/index\">";
                }
            }    
            ?>
            <!-- ========[ Cart Item Container ]======== -->
            <div class="main container-fluid pt-2 itembox offset-lg-2 col-lg-8">
                <div class="row">
                    <div class="col-12">
                        <?php echo $errmsg; ?>
                        <!-- ========[ Top row: Item image, name, details & price ]======== -->
                        <div class="top row">
                            <div class="img col-4">
                                <a href="<?php echo $pic; ?>">
                                    <img class="img-fluid" src="<?php echo $pic; ?>" style="width:100%" />
                                </a>
                            </div>
                            <br /><br />
                            <div class="mt-md-5 col px-5">
                                <a href="<?php echo "preview?id=$itemID"; ?>">
                                    <div>
                                        <h5 class="pb-2"><?php echo $name; ?></h5>
                                        <h6 style="line-height:0;"><?php echo $details; ?></h6><br />
                                        <h5><i style="font-weight:300">KAL Express_<sup>_</sup></i> <span class="text-danger fa fa-fighter-jet"></span></h5>
                                        <h5><b><?php echo $cSign.$price; ?></b></h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- ========[ End of Top row ]======== -->
                        <hr>

                        <!-- ========[ Down row: Wishlist button, Remove item button & Decrement/Increment item button ]======== -->
                        <div class="down row">
                            <div class="text-center binborder pt-2 col-2">
                                <form action="#" method="POST">
                                    <button type="submit" class="fa fa-heart mr-1 bg-white btn btn-sm" name="<?php echo "addWish_$id"; ?>" value="wish"></button>
                                </form>
                            </div>
                            <div class="mt-2 col-5 col-sm-7">
                                <form action="#" method="POST">
                                    <button type="submit" class="fas fa-trash-alt mr-1 bg-white btn btn-sm" name="<?php echo "remCart_$id"; ?>" value="remove"> <span class="trashtext" style="font-family:sans-serif">REMOVE</span></button>
                                </form>
                            </div>
                            <div class="text-right col-4 col-sm-3">
                                <form action="#" method="POST" class="mt-sm-1">
                                    <span class="d-inline-flex">
                                        <button type="submit" class="mr-1 rounded-circle bg-white btn btn-sm" name="<?php echo "minus_$id"; ?>" value="minus"><i class="fa fa-minus-circle"></i></button>
                                        <i class="num mt-3"><?php echo $checkIndItems; ?><hr></i>
                                        <button type="submit" class="ml-1 rounded-circle bg-white btn btn-sm" name="<?php echo "plus_$id"; ?>" value="plus"><i class="fa fa-plus-circle"></i></button>
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
</body>
<!-- ========[ End of body ]======== -->

<?php
    //Include Footer
    include("include/footerinc.php"); 
?>