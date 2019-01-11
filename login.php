<?php include("include/headerinc.php"); ?>
<br />

<!--[ Embedded Styling For Login Page ]-->
<style>
    
</style>

<?php
    $log = @$_POST['login'];
    $err="";

	if($log) {
		if(isset($_POST["user_login"]) && isset($_POST["password_login"])){
			$user_login = $_POST["user_login"];
			$password_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password_login"]); ## filter everything but members and letters
            $password_login_md5 = md5($password_login); ## Convert Password using md5 Hash
            
            $password = "(`password` = '$password_login_md5')";
            $phone_WO_dCode = "(`phone` = '+234 $user_login'))";
            $email_phone_W_dCode = "((`email` = '{$user_login}' or `phone` = '{$user_login}')";

			$query = $connect->query("SELECT * FROM `users` WHERE $email_phone_W_dCode OR $phone_WO_dCode AND $password Limit 1");
            
            ## Check for number of rows where inputted email and password occur in the database
            $userCount = $query->num_rows; ## Count number of rows returned

            ## If number of rows returned = 1
			if($userCount == 1) {

				$_SESSION["user_login"] = $user_login; ## Start a session using "user_login" --> Email or Phone
                
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

<div class="login_body">
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
                            <label class="label" for="validationEmail">User Login</label><br>
                            <div class="input-group">
                                <span class="myinput-group-text"><i class="fa fa-user"></i></span>
                                <input type="text" name="user_login" class="form-control" placeholder="Email or Phone" required/>
                            </div>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your information with anyone else.</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form form-group col-12">
                            <label for="validationPassword">Password</label>
                            <div class="input-group">
                                <span class="myinput-group-text"><i class="fa fa-unlock-alt"></i></span>
                                <input type="password" minlength="8" maxlength="32" name="password_login" class="form-control" placeholder="Password" required/>
                            </div>
                            <small id="passwordHelp" class="form-text text-muted">Your Password must be 8-32 characters long!!!</small>
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
                                        <b>New to E-Kal?</b> &nbsp;
                                        <b><a href="signup">CREATE AN ACCOUNT</a></b>
                                    </div>
                                </h6>
                            </span>
                            <div id="logMess" class="animated slideInDown"><h6><?php echo $err; ?></h6></div>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#logMess').delay(5800).slideUp();
    });
</script>

<?php include "include/footerinc.php"; ?>
</div>