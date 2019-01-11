<?php include "include/headerinc.php";

// $item_pics = $_POST['item_image'];
// print_r($item_pics);
?>

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
    .upload-body {
        margin-top: 105px;
    }

    .upload-body .upload-item .card-body {
        font-size: 18px
    }
</style>


<div class="upload-body">

    <div class="container-fluid">
        <div class="row">
            <div class="upload-item col-md-6 col-lg-8">
                <div class="card bg-dark shadow-lg">
                    <div class="card-header text-white text-center border-bottom h4"><b><i class="fa fa-cloud-upload-alt"></i> UPLOAD ITEM SECTION</b></div>
                    <div class="card-body bg-secondary text-light shadow-lg">
						<form action="" method="post" enctype="multipart/form-data" id="upload-form" novalidate>
						<div class="row">
                            <div class="col-lg-6 mb-2">
								<label for="">Item Name:</label>
                                <div class="input-group input-group-sm">
                                    <input class="form-control" minlength="3" type="text" name="item_name" id="item_name" placeholder="Item Name" required />
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
								<label for="">Item Category:</label>
                                <div class="input-group input-group-sm">
                                    <select class="form-control form-control-sm" name="item_category" id="item_category" required>
										<option disabled value="Select Item Category" selected>Select Item Category...</option>
										<option id="1" value="Automobile"><b>Automobile</b></option>
										<option id="2" value="Baby Products">Baby Products</option>
										<option id="3" value="Beauty N Health">Beauty N Health</option>
										<option id="4" value="Electronics">Electronics</option>
										<option id="5" value="Fashion">Fashion</option>
										<option id="6" value="Food N Drinks">Food N Drinks</option>
										<option id="7" value="Grocery">Grocery</option>
									</select>
                                </div>
							</div>
						</div>

                        <div class="row">
							<div class="col-lg-6 mb-2" id="item_class_field" style="display:none">
								<label for="">Item Class:</label>
                                <div class="input-group input-group-sm">
									<select class="form-control form-control-sm" name="item_class" id="item_class"></select>
								</div>
							</div>
                        	<div class="col-lg-6 mb-2" id="item_gender_field" style="display:none">
								<label for="">Item Gender:</label>
                                <div class="input-group input-group-sm">
									<select class="form-control form-control-sm" name="item_gender" id="item_gender">
										<option disabled value="Select Item Category" selected>Select Item Gender...</option>
										<option id="1" value="Male">Male</option>
										<option id="2" value="Female">Female</option>
										<option id="3" value="Unisex">Unisex</option>
									</select>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-lg-6 mb-2">
								<label for="">Item Price:</label>
                                <div class="input-group input-group-sm">
									<input class="form-control" type="number" min="5" name="item_price" id="item_price" placeholder="Item price" required />
								</div>
							</div>
                        	<div class="col-lg-6 mb-2">
								<label for="">Item Type <small>(For Fashion Category only!!!)</small>:</label>
                                <div class="input-group input-group-sm" id="item_type_field">
									<select class="form-control form-control-sm" name="item_type" id="item_type" disabled>
										<option disabled value="Select Item Category" selected>Please Select Item Category, Item Class And Gender First...</option>
									</select>
								</div>
							</div>
                        </div>
						
						<div class="row">
							<div class="col-lg-6 mb-2">
								<label for="">Item Colour <br /><small>(Optional...But neccessary for Fashion Category!!!)</small>:</label>
                                <div class="input-group input-group-sm">
									<input class="form-control" list="colours" name="item_colour" id="item_colour" placeholder="Type in Item Colour or Select from the List" required >
									<datalist id="colours">
										<option id="1" value="Black">Black</option>
										<option id="2" value="White">White</option>
										<option id="3" value="Red">Red</option>
										<option id="1" value="Green">Green</option>
										<option id="2" value="Blue">Blue</option>
										<option id="3" value="Yellow">Yellow</option>
									</datalist>
								</div>
							</div>
                        	<div class="col-lg-6 mb-2">
								<label for="">Item Size <small>(For Fashion Category only!!!)</small>:</label>
                                <div class="input-group input-group-sm" id="item_size_field">
									<select class="form-control form-control-sm" name="item_size" id="item_size" disabled>
										<option disabled value="Select Item Size" selected>Please Select Item Category, Item Class And Gender First...</option>
										<option id="1" value="Xtra Small">XS</option>
										<option id="2" value="Small">S</option>
										<option id="3" value="Medium">M</option>
										<option id="1" value="Large">L</option>
										<option id="2" value="Xtra Large">XL</option>
										<option id="3" value="Xtra-Xtra Large">XXL</option>
									</select>
								</div>
							</div>
                        </div>
						
						<div class="row">
							<div class="col-lg-6 mb-2">
								<div class="mb-1">
									<label for="">Item Image(s):</label>
									<div class="input-group input-group-sm">
										<input class="form-control" name="item_image[]" id="item_image" type="file" required multiple />
									</div>
									<small><i>Hover to view name of files</i></small>
								</div>
							
								<label for="">Item Details:</label>
                                <div class="input-group input-group-sm">
									<textarea class="form-control form-control-sm" name="item_details" id="item_details" cols="30" rows="5" placeholder="PowerPoint Description Of Item..."></textarea>
								</div>
							</div>
                        	<div class="col-lg-6 mb-2">
								<label for="">Item Description:</label>
                                <div class="input-group input-group-sm">
									<textarea class="form-control form-control-sm" name="item_description" id="item_description" cols="30" rows="10" placeholder="Full Description Of Item..."></textarea>
								</div>
							</div>
                        </div>
					
						<div class="row">
							<span class="col-12">
                                <button class="w-100 btn btn-info" type="submit" name="upload_item" id="upload_item" value="upload"><i class="fa fa-upload"></i> Upload Item </button>
                                <!-- Code to display messages in variable $mess when required -->
                                <small><div id="mess" class="text-center mt-3" style="display:none"></div></small>
                            </span>
						</div>
					</div>
                </div>
			</div>
			</form>
            <div class="col-md-6 col-lg-4">
                <div class="card bg-dark shadow"></div>
            </div>
        </div>
	</div>
	
</div>

<!-- To be put in JS file -->
<script>
	$(document).ready(function() {
		$('#item_category').on({
			change: function(){
				var category_id = $(this.options[this.selectedIndex]).attr('id');
				
				$.post("include/category.php?cat_id=" + category_id, function(data) {
                    $("#item_class").html(data);
					
                    if ((category_id) !== 5) {
						$('#item_gender_field').hide('1000');
						$('#item_type').attr('disabled','disabled');
						$('#item_size').attr('disabled','disabled');
                    }

					$("#item_class_field").show('slow', function() {
						
						$("#item_class_field").removeClass('col-lg-12').addClass('col-lg-6');

						if ((category_id) !== 5) {
							$("#item_class_field").removeClass('col-lg-6').addClass('col-lg-12');
						}

						$('#item_class').on({
							change: function(){
							
								if ((category_id) !== 5) {
									$("#item_class_field").removeClass('col-lg-6').addClass('col-lg-12');
									$('#item_gender_field').hide();
									$('#item_type').attr('disabled','disabled');
									$('#item_size').attr('disabled','disabled');
								}
							
								if ((category_id) == 5) {
									$("#item_class_field").removeClass('col-lg-12').addClass('col-lg-6');
									$('#item_gender_field').slideDown('1000');

									var class_id = $(this.options[this.selectedIndex]).attr('id');
									
									$.post("include/category.php?class_id=" + class_id, function(data) {
										$('#item_type').html(data)
									})
								}
								$('#item_gender_field').change(function(){
									$('#item_type').removeAttr('disabled');
									$('#item_size').removeAttr('disabled');
								})
							},
						});
					});
				});

			},
		});

		function getFormData() {
			var inputs = $('input,select');
			var array = [];

			for (let index = 0; index < inputs.length; index++) {
				var inputNameValue = '['+inputs[index].name+'] ' + '=> ' + inputs[index].value;
				array.push(inputNameValue);
			}
			join = array.join('\n');
			alert(join)
		}

		$('#upload-form').submit(function(event) {
			event.preventDefault();
			
			$(this).ajaxSubmit({
				url: 'actions/upload_item.php',
				method: 'POST',
				success: function(result) {
					$('#mess').html(result);
					$('#mess').show('1000',function(){
						$('#mess').delay('9000');
						$('#mess').hide('1000');
					});
					console.log(result);
				}
			});
		});
	});
</script>
<br />
<br />
<br />
<style>
	/* footer {
		position: fixed;
		bottom: 0;
		right: 0;
		left: 0;
	} */
</style>
<?php include "include/footerinc.php";?>