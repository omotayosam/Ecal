<?php include_once("inc/connectinc.php"); ?>

<?php
    //Variable declaration to avoid errors 
    $Uem = "";

    //Initialize a new session data
    session_start();

    //If A user is logged-in
    if(isset($_SESSION["user_login"])){
        $user1 = $_SESSION["user_login"];
        
        //Get users information: title, username, lastname, firstname and email; from the database 
	    $sql = "SELECT * FROM `users` WHERE `email`='$user1'";
	    $sqli = mysqli_query($connect, $sql);
        $get_name = mysqli_fetch_assoc($sqli);
        $Uem = $get_name['email']; #Get users email

    } else {
        $Uem = "";
    }

    $remCart_sql = "DELETE FROM `cart` WHERE `user` = '$Uem'";
    $remCart_sqli = mysqli_query($connect, $remCart_sql);
    session_start();
    session_destroy();
    header("location: redirect_index?next=logout");
    echo"logout successful"
?>