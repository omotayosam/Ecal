<?php include("include/headerinc.php"); 
$date = date('Y-m-d');
?>

<style>
    body{
        width: 100% !important;
        margin: 0 auto 0 auto !important
    }
    .main a{
        color: black !important
    }
    .main a:link{
        text-decoration: none
    }
    .main hr{
        margin: 0 !important
    }
    .main .bg-grey{
        font-weight: 700;
        background-color: lightgrey;
    }
    .main .bg-grey-hover{
        font-weight: 400;
    }
    .main .bg-grey-hover:hover{
        background-color: darkgrey;
    }
    .profile .bg-grey{
        font-weight: 700;
        background-color: lightgrey;
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
    $page = "";
    if (isset($_GET['page'])) {
        # code...
        $page = @$_GET['page'];
    }
?>

<body>
    <?php
        if ($page == "main") {
            # code...
            ?>
            <div class="container-fluid mt-5 main">
                <div class="row">
                    <div class="col-12 offset-md-2 col-md-8 p-0">
                        <div class="page-item bg-grey p-3 m-0">Account Settings</div>
                        <a href="myaccount?page=profile"><div class="bg-grey-hover col-12 py-3">My Profile</div><hr></a>
                        <a href="myaccount?page=address"><div class="bg-grey-hover col-12 py-3">My Addresses</div><hr></a>
                        <a href="myaccount?page=ratings"><div class="bg-grey-hover col-12 py-3">My ratings</div><hr></a>
                        <a href="myaccount?page=country"><div class="bg-grey-hover col-12 py-3">Country</div><hr></a>
                    </div>
                </div>
            </div>
            <style>
                footer{
                    left: 0;
                    right: 0;
                    bottom: 0;
                    z-index: 0;
                    position: fixed
                }
            </style>
            <?php

        } elseif ($page == "profile") {
            
            if ($user == "Guest") { ?>
                <meta http-equiv="refresh" content="0; url=login">
            <?php } ?>

            <div class="container-fluid mt-5 profile">
                <div class="row">
                    <div class="offset-md-2 col-md-8 p-0">
                        <div class="page-item bg-grey p-3 m-0">EDIT YOUR PERSONAL DATA</div>
                            <form action="" method="POST" class="p-2 needs-validation" id="bio-form" validate>
                                <div class="row">
                                    <div class="form col-12 mb-3">
                                        <label class="label" for="validationFname">First Name</label><br>
                                        <div class="input-group input-group-sm input-group-append">
                                            <span class="myinput-group-text"><i class="fa fa-user-circle"></i></span>
                                            <input type="text" name="fname" class="form-control" id="validationFname" placeholder="First Name" required/>
                                            <h4 class="input-group-append text-primary">*</h4>
                                        </div>
                                        <small id="fnameHelp" class="form-text text-muted">This field must be 3 characters or longer.</small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form col-12 mb-3">
                                        <label class="label" for="validationLname">Last Name</label><br>
                                        <div class="pl-3 input-group input-group-sm input-group-append">
                                            <!--<span class="input-group-text"><i class="fa fa-user-circle"></i></span>-->
                                            <input type="text" name="lname" class="form-control" id="validationLname" placeholder="Last Name" required/>
                                            <h4 class="input-group-append text-primary">*</h4>
                                        </div>
                                        <small id="lnameHelp" class="form-text text-muted">This field must be 3 characters or longer.</small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form col-12 mb-3">
                                        <label class="label" for="validationEmail">E-mail</label><br>
                                        <div class="input-group input-group-sm input-group-append">
                                            <span class="myinput-group-text"><i class="fa fa-envelope-o"></i></span>
                                            <input type="email" name="email" class="form-control" id="validationEmail" placeholder="name@example.com" required/>
                                            <div class="valid-feedback">Looks Good!</div>
                                            <h4 class="input-group-append text-primary">*</h4>
                                        </div>
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form col-12 mb-3">
                                        <label class="label" for="validationEmail">Gender</label><br />
                                        <div class="input-group input-group-sm">
                                            <span><i class="fa fa-transgender"></i></span>
                                            <div class="pl-4 ml-1 custom-control-radio-lg">
                                                <input type="radio" name="gender" id="validationMale" value="male" required/><label class="pl-2 custom-label">MALE</span>
                                                <input type="radio" class="ml-5" name="gender" id="validationFemale" value="female" required/><label class="pl-2 custom-label">FEMALE</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form col-12 mb-3">
                                        <div class="input-group input-group-sm input-group-append">
                                            <div class="col-5 col-sm-2 col-md-3 col-lg-2 p-0">
                                                <div class="input-group">
                                                    <span class="myinput-group-text"><i class="fa fa-phone"></i></span>
                                                    <input type="text" class="form-control form-control-sm" value="+234" readonly>
                                                </div>
                                                <small id="passwordHelp" class="pl-3 form-text text-muted">Dial Code</small>
                                            </div>
                                            <div class="m-0 p-0 col-7 col-sm-10 col-md-9 col-lg-10 pl-2">
                                                <div class="input-group input-group-sm">
                                                    <input type="text" pattern="^[1-9]\d*$" minlength="10" maxlength="10" name="pnum" class="form-control" id="validationPassword" placeholder="Phone" required/>
                                                    <h4 class="input-group-prepend text-primary">*</h4>
                                                </div>
                                                <small id="passwordHelp" class="form-text text-muted">Phone shouldn't start with <k class="text-primary">'0'</k> after the dialing code</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form col-12 mt-3 mb-3 pr-4">
                                        <div class="input-group input-group-sm input-group-append">
                                            <span class="myinput-group-text"><i class="far fa-calendar"></i></span>
                                            <input type="date" name="bday" min="1958-01-01" max="2003-01-01" class="form-control" id="validationFname" />
                                        </div>
                                        <small id="bdayHelp" class="form-text text-muted">16yrs to 61yrs</small>
                                    </div>
                                </div>
                                <div class="row">
                                    <span class="col-sm-10 col-md-12">
                                        <button class="w-100 py-3 btn btn-primary" id="bio-submit" type="submit" name="save" value="login"><b>SAVE</b></button>
                                        <br /><br />
                                        <div id="mess" class="animated flash"></div>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(document).ready(function(){
                    $("#bio-form").submit(function(event){
                        event.preventDefault();
                        $.ajax({
                            url: "profile_actions/bio_update.php",
                            method: "post",
                            data: $("#bio-form").serialize(),
                            success: function(result) {
                                $("#mess").show('fast',function(){
                                    $("#mess").html(result);
                                    setTimeout(slideUp, 5000);
                                })
                            }
                        });
                        function slideUp(){
                            $("#mess").slideUp(5000);
                        }
                    });
                });
            </script>
            <style>
                footer{
                    position: relative
                }
            </style>
            <?php
        }
    ?>
</body>
<br />

<?php include("include/footerinc.php"); ?>