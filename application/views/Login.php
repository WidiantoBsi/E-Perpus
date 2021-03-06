<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Perpus</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<!-- <link rel="icon" type="image/png" href="images/icons/favicon.ico"/> -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" href="<?php echo base_url()?>assets/fonts/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/fonts/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/animate/animate.css">
	
	<link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/css-hamburgers/hamburgers.min.css">

	<link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/animsition/css/animsition.min.css">

	<link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/select2/select2.min.css">
	
	<link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/daterangepicker/daterangepicker.css">

	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/util.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/main.css">

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<form action="<?php echo base_url('login/').'Cek'; ?>" method="post" enctype="multipart/form-data">
					<span class="login100-form-title p-b-51">
						Login
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "email is required">
						<input class="input100" type="email" name="email" placeholder="E-Mail" autofocus>
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
					</div>
					
					<div class="flex-sb-m w-full p-t-3 p-b-24">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	

	<script src="<?php echo base_url()?>assets/vendor/jquery/jquery-3.2.1.min.js"></script>

	<script src="<?php echo base_url()?>assets/vendor/animsition/js/animsition.min.js"></script>

	<script src="<?php echo base_url()?>assets/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="<?php echo base_url()?>assets/vendor/select2/select2.min.js"></script>

	<script src="<?php echo base_url()?>assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url()?>assets/vendor/daterangepicker/daterangepicker.js"></script>

	<script src="<?php echo base_url()?>assets/vendor/countdowntime/countdowntime.js"></script>

	<script src="<?php echo base_url()?>assets/js/main.js"></script>

</body>
</html>