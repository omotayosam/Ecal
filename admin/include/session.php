<?php include "connectinc.php";
    //Variable declaration to avoid errors 
    $Uem = "";
    $admin = "";
    $admin_main = "";

    //Initialize a new session data
    session_start();

    //If An admin is logged-in
    if (isset($_SESSION["admin_login"])) {
        $admin1 = $_SESSION["admin_login"];
            
        //Get admins information: title, username, lastname, firstname and email; from the database 
        $sql = "SELECT * FROM `admin` WHERE `email`='$admin1' OR `username` = '$admin1'";
        $sqli = mysqli_query($connect, $sql);
        $get_name = mysqli_fetch_assoc($sqli);
        $uId = $get_name['id']; #Get admins' ID
        $admin_main = $get_name['username']; #Get admins' username
        $Uem = $get_name['email']; #Get admins' email
        $adminE = $Uem; #Assign email to variable $adminE
        $admin = $admin_main; #Assign username to variable $admin   
    }
?>