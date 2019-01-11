<?php include "include/headerinc.php";?>

<?php if (!$admin) { ?>
    <div class="container">
        <div class="pt-3 px-3 bg-dark animated slideInDown" style="border:1px solid black">
            <div class="alert alert-danger text-center animated flash">
                <h4><i class="fa fa-exclamation-triangle"></i> Access Denied...You Must <a href="index" class="text-primary alert-link">Signin As ADMIN</a> To View this page!!!</h4>
            </div>
        </div>
    </div>
<?php exit(); } ?>

<style>
    footer{
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0
    }
</style>
<?php include "include/footerinc.php";?>