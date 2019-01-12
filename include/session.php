<?php include "connectinc.php";
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
	    $sql = "SELECT * FROM `users` WHERE `email` = '$user1' OR `phone` = '$user1'";
	    $sqli = mysqli_query($connect, $sql);
        $get_name = mysqli_fetch_assoc($sqli);
        $uId = $get_name['id']; #Get users ID
        // $title = $get_name['title']; #Get users title
        $user_main = $get_name['lname']; #Get users last name
        $Fname = $get_name['fname']; #Get users first name
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

?>