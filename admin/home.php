<?php include "include/headerinc.php"; ?>

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
    .home-body {
        margin-top: 105px;
    }
</style>


<div class="home-body">

	<!-- <div id="" class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<div class="shadow h-100 p-2">
					<div class="p-0">
						Test Text<br />Test Text
					</div>
				</div>
			</div>
			
			<div class="col-md-8">
				<div class="shadow h-100 p-2">
					<div class="p-0">
						Test Text
					</div>
				</div>
			</div>
		</div>
	</div>
	<br /> -->

	<div class="side container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-2">
                <div class="card bg-light shadow mb-3 h-100">
                    <div class="card-header">HOW TO USE</div>
                    <div class="card-body p-0">
                        <!--<h5 class="card-title"></h5>-->
                        <p class=" p-3 card-text">Once you have created an account with cashflow you can follow the steps below to get 50% profit for every N4000 You pay</p>
                        <hr>
                        <p class=" p-3 card-text">- Go to your dashboard and make a pay request <br> - You will be merged with who you are to pay a sum of 4000 naira only within 24hrs <br> - Once your payment is confirmed you are legible to receive your initial payment with a 50% interest <br></p>
                    </div>
                </div>
            </div>
			
			<div class="col-lg-3 col-md-6 mb-2">
                <div class="card bg-light shadow mb-3 h-100">
                    <div class="card-header">HOW IT WORKS</div>
                    <div class="card-body">
                        <!--<h5 class="card-title"></h5>-->
                        <p class="card-text">Once you have created an account with cashflow you can follow the steps below to get 50% profit for every N4000 You pay</p>
                        <hr>
                        <p>- Go to your dashboard and make a pay request <br> - You will be merged with who you are to pay a sum of 4000 naira only within 24hrs <br> - Once your payment is confirmed you are legible to receive your initial payment with a 50% interest <br></p>
                    </div>
                </div>
            </div>
                    
            <div class="col-lg-3 col-md-6 mb-2">
                <div class="card bg-light shadow mb-3 h-100">
                    <div class="card-header">CUSTOMER CARE SERVICE</div>
                    <div class="card-body">
                        <!--<h5 class="card-title">Light card title</h5>-->
                        <p class="card-text">We have a 24hours, round the clock customer service personnels to help you with any complains or problems you might have or come across while using our service. <hr> You can easily contact us by sending us a message through a provided medium on our contact page. <hr> Get in touch with us directly: support@cashflow.com</p>
                    </div>
                </div>
            </div>                    
			
			<div class="col-lg-3 col-md-6 mb-2">
                <div class="card bg-light shadow mb-3 h-100">
                    <div class="card-header">INFO UPDATES</div>
                    <div class="card-body">
                        <!--<h5 class="card-title">Light card title</h5>-->
                        <p class="card-text">- If you are willing to understand more on how to increase your income using cashlow you can contact us through our contact link <hr>- There is only one payment package available at the moment, which is the N4000 package, Some localities will be legible for more packages in due time</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- <div class="side container-fluid">
	<div class="row">
		<div class="col-sm-4 card shadow">.col-sm-4<br />w</div>
		<div class="col-sm-4 card shadow">.col-sm-4</div>
		<div class="col-sm-4 card shadow">.col-sm-4</div>
	</div>
</div> -->

<?php include "include/footerinc.php"; ?>