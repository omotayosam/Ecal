<?php include("include/headerinc.php"); ?>

<?php if ($user !== 'Guest') { ?>
    <div class="main container-fluid bg-white mt-5 pt-2 itembox offset-lg-2 col-lg-8">
        <div class="row">
            <div class="col-12">
                <div class="mt-2 container alert alert-danger bg-light">
                    <span class="fa fa-exclamation-triangle"></span> Sorry you must  <a href="logout" class="text-primary">Signout</a> to view this page...
                </div>
            </div>
        </div>
    </div>
<?php exit(); } ?>


<style>
    .signup-body{
        margin: 0 auto 0 auto;
        width: 100%
    }
    .header{
        color: grey
    
    }
    input[class="form-control"]{
        border: none !important;
        outline: none !important;
        border-radius: 0 !important;
        border-bottom: solid 2px grey !important
    }
    input[class="form-control"]:focus{
        border: none !important;
        outline: none !important;
        border-bottom: solid 2px blue !important;
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
    $reg = @$_POST['reg'];
    $mess = '';
    
    //declaring variables to prevent errors
    $err = "";
    $success = "";
    $fn = ""; //First Name
    $ln = ""; //Last Name
    $gender = ""; //Gender
    $em = ""; //Email
    $dCode = "";//Dial Code
    $pnum = ""; //Phone Number
    $pwrd = ""; //Password
    $d = ""; //Sign up Date
    $u_check = ""; // Check if user: Firstname and Lastname exists
    $u_check = ""; // Check if email exists
    
    //Registration Form
    $fn = trim(strip_tags(@$_POST['fname']));
    $ln = trim(strip_tags(@$_POST['lname']));
    $em = trim(strip_tags(@$_POST['email']));
    $gender = trim(strip_tags(@$_POST['gender']));
    $dCode = trim(strip_tags(@$_POST['dCode']));
    $pnum = trim(strip_tags(@$_POST['pnum']));
    $pwrd = trim(strip_tags(@$_POST['pword']));
    $d = date("Y-m-d h:i:sa"); //Year - Month - Day    
?>
<?php
    if($reg){
        // Check if user already exists
        $u_check = $connect->query("SELECT `fname`, `lname` FROM `users` WHERE `fname` = '$fn' AND `lname`='$ln'");
        // Count amount of rows where first & last _name  = $fn and $ln
        $u_check_rows = $u_check->num_rows;

        // Check if user email already exists
        $e_check = $connect->query("SELECT `email` FROM `users` WHERE `email` = '$em'");
        // Count number of rows where email = $em
        $e_check_rows = $e_check->num_rows;

        //If User and email doesn't exist
        if($u_check_rows == 0 || $e_check_rows == 0){
        
            //Check all of the fields have been filled in
            if($fn && $ln && $em && $pnum && $pwrd != ""){
                
                // Check that the maximum length of first name and last name is 25 characters
                $pwrd = md5($pwrd);

                $regQuery = $connect->query("INSERT INTO `users` VALUES ('', '', '$fn', '$ln', '$em', '$pwrd', '$dCode $pnum', '$gender', '$d', 'No')");
                
                $mess = "
                    <div class='alert alert-success'>
                        <span class='fa fa-check-double'></span> Registration successful, Welcome to EKAL...<br>
                        <a href='login'>Continue to login page</a>
                    </div>
                ";

            } else {
                $mess = "
                    <div class='alert alert-danger'>
                        <span class='fa fa-exclamation-triangle'></span> Please fill in all required fields!!!
                    </div>
                ";
            }
        }
        else{
            $mess = "
                <div class='alert alert-danger'>
                    <span class='fa fa-exclamation-circle'></span> Name and email exists already!!!
                </div>
            ";
        }
    }    
?>

<div class="signup-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-10 offset-sm-1 offset-md-2 offset-lg-3 col-md-8 col-lg-6">
                <div class="header">
                    <h5>Create a new account</h5>
                </div>
                <br />
                <div class="logMess animated slideInDown"><h6><?php echo $mess; ?></div>
                <br />
                <form action="#logMess" method="POST" validate>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="label" for="validationFname">First Name</label><br>
                            <div class="input-group">
                                <span class="myinput-group-text"><i class="fa fa-user-circle"></i></span>
                                <input type="text" minlength="3" maxlength="25" name="fname" class="form-control" id="validationFname" placeholder="First Name" required/>
                            </div>
                            <small id="fnameHelp" class="form-text text-muted">This field must be 3-25 characters long.</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="label" for="validationLname">Last Name</label><br>
                            <div class="pl-3 input-group">
                                <input type="text" minlength="3" maxlength="25" name="lname" class="form-control" id="validationLname" placeholder="Last Name" required/>
                            </div>
                            <small id="lnameHelp" class="form-text text-muted">This field must be 3-25 characters long.</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="label" for="validationEmail">Gender</label><br />
                            <div class="input-group">
                                <span><i class="fa fa-transgender"></i></span>
                                <div class="col-2">
                                    <input type="radio" name="gender" id="male" value="Male" class="custom-radio" checked />
                                    <span class="custom-control-indicator" style="position:relative">Male</span>
                                </div>
                                <div class="col-2">
                                    <input type="radio" name="gender" id="female" value="Female" class="custom-radio" />
                                    <span class="custom-control-description">Female</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="label" for="validationEmail">E-mail</label><br>
                            <div class="input-group">
                                <span class="myinput-group-text"><i class="fa fa-envelope"></i></span>
                                <input type="email" name="email" class="form-control" id="validationEmail" placeholder="name@example.com" required/>
                                <div class="valid-feedback">Looks Good!</div>
                            </div>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="validationPassword">Password</label>
                            <div class="input-group">
                                <span class="myinput-group-text"><i class="fa fa-unlock-alt"></i></span>
                                <input type="password" minlength="8" maxlength="32" name="pword" class="form-control" id="validationPassword" placeholder="Password" required/>
                            </div>
                            <small id="passwordHelp" class="form-text text-muted">Your Password must be 8-32 characters long!!!</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="validationPhone">Phone</label>
                            <div class="input-group input-group-sm input-group-append">
                                <div class="col-5 col-sm-3 col-md-3 col-lg-2 p-0">
                                    <div class="input-group">
                                        <span class="myinput-group-text"><i class="fa fa-phone"></i></span>
                                        <select class="custom-select" name="dCode">
                                            <option>+234</option>
                                            <!-- <option>+1</option>
                                            <option>+44</option>
                                            <option>+234</option>
                                            <option>+234</option>
                                            <option>+234</option>
                                            <option>+234</option>
                                            <option>+234</option>
                                            <option>+234</option> -->
                                        </select>
                                    </div>
                                </div>
                                <div class="m-0 p-0 col-7 col-sm-7 col-md-9 col-lg-10 pl-2">
                                    <div class="input-group input-group-sm">
                                        <input type="text" pattern="^[1-9]\d*$" maxlength="10" name="pnum" class="form-control" id="validationPhone" placeholder="Phone" required/>
                                    </div>
                                    <small id="phoneHelp" class="form-text text-muted">Phone shouldn't start with <k class="text-primary">'0'</k> after the dialing code</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <span class="col-12 mb-3">
                            <button class="w-100 pt-3 pb-3 btn btn-primary" type="submit" name="reg" value="login"><b>CREATE</b></button>
                            <br /><br />
                            <div class="logMess animated slideInDown"><h6><?php echo $mess; ?></div>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('.logMess').delay(5800).slideUp();
    });
</script>

<?php include "include/footerinc.php"; ?>