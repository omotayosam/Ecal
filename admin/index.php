<?php include("include/headerinc.php"); ?>
<br />

<!--[ Embedded Styling For Login Page ]-->
<style>
    
</style>

<?php
    $log = @$_POST['login'];
    $err="";

	if($log) {
		if(isset($_POST["admin_login"]) && isset($_POST["password_login"])){
			$admin_login = $_POST["admin_login"];
			$password_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password_login"]); ## filter everything but members and letters
            $password_login_md5 = md5($password_login); ## Convert Password using md5 Hash
            
            $password = "(`password` = '{$password_login_md5}')";
            $username = "(`username` = '{$admin_login}')";
            $email = "(`email` = '{$admin_login}')";

			$query = $connect->query("SELECT * FROM `admin` WHERE $email OR $username AND $password Limit 1");
            
            ## Check for number of rows where inputted email and password occur in the database
            $adminCount = $query->num_rows; ## Count number of rows returned

            ## If number of rows returned = 1
			if($adminCount == 1) {

				$_SESSION["admin_login"] = $admin_login; ## Start a session using "admin_login" --> Email or Username
                
                $err = '
                    <div class="alert alert-success">
                        <span class="fa fa-check-circle"></span> Login Successful...<br />
                        Please wait... <i class="fa fa-spinner fa-spin"></i>
                    </div>                    
                ';
                ?>
                <meta http-equiv ="refresh" content="2; url = index">
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
    <?php if($admin) { ?>
        <meta http-equiv ="refresh" content="0; url = home">
    <?php }
?>
<body style="background: black">
<style>
    .login_body{
        height: 100%;
        width: 100%;
        right: 0%;
        left: 0%;
        top: 0%;
        position:fixed;
        overflow-x: hidden;
        overflow-y: auto
    }

    .login_body .log{
        position:absolute;
        top:20%
    }
</style>
<div class="login_body">
    <div class="log container-fluid">
        <div class="">
            <div class="col-sm-10 offset-sm-1 offset-md-2 offset-lg-3 col-md-8 col-lg-6 p-4 shadow bg-white" style="border-radius:10px;">
                <div class="header">
                    <span class="nav-link ml-sm-2 mr-auto">
						<a href="../index.php"><font size="5px"><i class="fa fa-arrow-left mr-5"></i></font></a>
						<b><font size="5px">Admin Login</font></b>
					</span>
                </div>
                <br />
                <form action="#" method="POST" class="needs-validation" validate>
                    <div class="row">
                        <div class="form col-12 mb-3">
                            <label class="label" for="validationEmail">Email or Username</label><br>
                            <div class="input-group">
                                <span class="myinput-group-text"><i class="fa fa-user"></i></span>
                                <input type="text" name="admin_login" class="form-control" id="validationEmail" placeholder="Email or Username" required/>
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
</body>