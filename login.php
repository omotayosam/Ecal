<?php include("include/headerinc.php"); ?>
<br />

<!-- <script src="assets/form.js"></script> -->

<!--[ Embedded Styling For Login Page ]-->
<style>
    .body{
        margin: 0 auto 0 auto;
        width: 100%
    }

    .header{
        color: grey
    
    }
    
    input[class="form-control"]{
        border: none !important;
        outline: none !important;
        border-radius: 0;
        border-bottom: solid 2px grey !important
    }
    
    input[class="form-control"]:focus{
        border: none !important;
        outline: none !important;
        border-bottom: solid 2.5px blue !important;
        box-shadow: none !important;
    }
    
    .signText a:link{
        text-decoration: none
    }
    
    .myinput-group-text{
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        margin-bottom: 0;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        text-align: center;
        white-space: nowrap;
    }
</style>

<?php
    $log = @$_POST['login'];
    $err="";

	if($log) {
		if(isset($_POST["user_login"]) && isset($_POST["password_login"])){
			$user_login = $_POST["user_login"];// filter everything but members and letters
			$password_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password_login"]);
			$password_login_md5 = md5($password_login);
			$query = $connect->query("SELECT * FROM `users` WHERE `email` = '$user_login' AND  `password` = '$password_login_md5' Limit 1");
            
            ##Check for number of rows where inputted email and password occur in the database
            //Count number of rows returned
            $userCount = $query->num_rows;
            
			if($userCount == 1) {
				while($row = $query->fetch_array()){
                    $id = $row["id"];
                    $name = $row["last_name"];
                    $email = $row["email"];
				}
				$_SESSION["user_login"] = $user_login; //Start a session using "user_login" --> Email
                
                $err = '
                    <div class="alert alert-success">
                        <span class="fa fa-check-circle"></span> Login Successful...<br />
                        Please wait... <i class="fa fa-spinner fa-spin"></i>
                    </div>                    
                ';
                ?>
                <meta http-equiv ="refresh" content="2; url = redirect_index?page=login&&next=<?php echo $prev_link; ?>">
                <?php

			} else {
                $err = '
                    <div class="alert alert-danger">
                        <i class="fa fa-exclamation-circle"></i> The given Login detail is incorrect!!, Please try again...
                    </div>                    
                ';
			}
	    }
    }
    ?>
    <?php if($user !== "Guest") { ?>
        <meta http-equiv ="refresh" content="0; url = redirect_index?next=<?php echo $prev_link; ?>">
    <?php }
?>

<div class="body">
    <div class="container-fluid">
        <div class="">
            <div class="col-sm-10 offset-sm-1 offset-md-2 offset-lg-3 col-md-8 col-lg-6">
                <div class="header">
                    <h5>Login to your account</h5>
                </div>
                <br />
                <form action="#" method="POST" class="needs-validation" validate>
                    <div class="row">
                        <div class="form col-12 mb-3">
                            <label class="label" for="validationEmail">E-mail</label><br>
                            <div class="input-group">
                                <span class="myinput-group-text"><i class="fa fa-envelope"></i></span>
                                <input type="email" name="user_login" class="form-control" id="validationEmail" placeholder="name@example.com" required/>
                                <div class="valid-feedback">Looks Good!</div>
                            </div>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form form-group col-12">
                            <label for="validationPassword">Password</label>
                            <div class="input-group">
                                <span class="myinput-group-text"><i class="fa fa-unlock-alt"></i></span>
                                <input type="password" name="password_login" class="form-control" id="validationPassword" placeholder="Password" required/>
                            </div>
                            <small id="passwordHelp" class="form-text text-muted">Your Password must be 8-20 characters long!!!</small>
                            <div class="">
                                <div class="float-right">
                                    <a href="" class="nav-link"><span class="mr-2"><b>FORGOT PASSWORD?<b></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <span class="col-12">
                            <button class="w-100 pt-3 pb-3 btn btn-primary" type="submit" name="login" value="login"><b>LOGIN</b></button>
                            <br /><br />
                            <span class="text-center">
                                <h6>
                                    <div class="signText col-sm-12">
                                        <b>New to Nice?</b> &nbsp;
                                        <b><a href="signup">CREATE AN ACCOUNT</a></b>
                                    </div>
                                </h6>
                            </span>
                            <span id="logMess"><h6><?php echo $err; ?></h6></span>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#logMess').delay(5800).fadeOut();
    });
</script>
            