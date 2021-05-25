<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/login/style.sass">
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	#btnLogin {
		font-size: 12px;
		text-transform: uppercase;
		padding: 5px 30px;
		background: #f95959;
		color: #fff;
		border-radius: 30px;
		margin-right: 20px;
		border: none;
		font-family: "Montserrat", sans-serif;
	}

	#btnRegis {
		font-size: 12px;
		text-transform: uppercase;
		padding: 5px 30px;
		background: #f95959;
		color: #fff;
		border-radius: 30px;
		margin-right: 20px;
		border: none;
		font-family: "Montserrat", sans-serif;
	}
</style>

<div class="container">
	<section id="formHolder">
		<div class="row">
			<!-- Brand Box -->
			<div class="col-sm-6 brand">
				<a href="#" class="logo">VR <span>.</span></a>
				<div class="heading Veronica">
					<h2 class="Veronica">Veronica <h3>cloth</h3>
					</h2>
					<p>Your Right Choice</p>
				</div>
				<div class="success-msg">
					<p>Great! You are one of our members now</p>
					<a href="#" class="profile">Your Profile</a>
				</div>
			</div>

			<!-- Form Box -->
			<div class="col-sm-6 form">
				<!-- Login Form -->
				<div class="login form-peice switched">
					<form class="login-form" action="#" method="post">
						<div class="form-group">
							<label for="loginemail">Email Adderss</label>
							<input type="text" name="loginemail" id="loginemail" required>
						</div>

						<div class="form-group">
							<label for="loginPassword">Password</label>
							<input type="password" name="loginPassword" id="loginPassword" required>
						</div>

						<div class="CTA">
							<!-- <input type="submit" value="Login" id> -->
							<button class="btn btn-primary" type="button" id="btnLogin">Login</button>
							<a href="#" class="switch">I'm New</a>
						</div>
					</form>
				</div><!-- End Login Form -->


				<!-- Signup Form -->
				<div class="signup form-peice">
					<form class="signup-form" action="#" method="post">

						<div class="form-group">
							<label for="name">Full Name</label>
							<input type="text" name="username" id="name" class="name">
							<span class="error"></span>
						</div>

						<div class="form-group">
							<label for="email">Email Adderss</label>
							<input type="email" name="emailAdress" id="email" class="email">
							<span class="error"></span>
						</div>

						<div class="form-group">
							<label for="phone">Phone Number - <small>Optional</small></label>
							<input type="text" name="phone" id="phone">
						</div>

						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" id="password" class="pass">
							<span class="error"></span>
						</div>

						<div class="form-group">
							<label for="passwordCon">Confirm Password</label>
							<input type="password" name="passwordCon" id="passwordCon" class="passConfirm">
							<span class="error"></span>
						</div>

						<div class="CTA"> <button class="btn btn-primary" type="button" id="btnRegis">Register</button>
							<a href="#" class="switch">I have an account</a>
						</div>
					</form>
				</div><!-- End Signup Form -->

			</div>
		</div>

	</section>


	<footer>
		<p>
			Form made by: <a href="heyiamhasan.com" target="_blank">Hasan @ <?= date('Y') ?></a>
		</p>
	</footer>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
<script>
	/*global $, document, window, setTimeout, navigator, console, location*/
	document.addEventListener("DOMContentLoaded", function(event) {
		$('#btnLogin').click(function(e) {
			var username = $('#loginemail').val()
			var password = $('#loginPassword').val()
			if (email.length == "") {
				Swal.fire({
					type: 'warning',
					title: 'Oops...',
					text: 'Email Wajib Diisi !',
					position: 'top-end',
				});

			} else if (password.length == "") {
				Swal.fire({
					type: 'warning',
					title: 'Oops...',
					text: 'Password Wajib Diisi !',
					position: 'top-end',

				});
			}else{
				$.ajax({
					type: "post",
					url: "<?= base_url() ?>Register/loginUser",
					data: {
						'LEmail': username,
						'LPassword': password,
					},
					dataType: "json",
					success: function(e) {
						if (e.error) {
							Swal.fire({
								type: 'warning',
								title: 'Oops...',
								text: e.message,
								position: 'top-end',
	
							});
						} else {
	
							Swal.fire({
								type: 'success',
								title: 'Hai...',
								text: e.message,
								position: 'top-end',
	
							});
							setTimeout(() => {
								window.location = '<?= base_url() ?>user';
							}, 2100);
						}
	
					}
				});

			}
			return false;

		});
		$('#btnRegis').click(function(e) {
			var name = $('#name').val()
			var email = $('#email').val()
			var phone = $('#phone').val()
			var password = $('#password').val()
			if (email.length == "") {
				Swal.fire({
					type: 'warning',
					title: 'Oops...',
					text: 'Email Wajib Diisi !',
					position: 'top-end',
				});
			} else if (password.length == "") {
				Swal.fire({
					type: 'warning',
					title: 'Oops...',
					text: 'Password Wajib Diisi !',
					position: 'top-end',

				});
			} else if (name.length == "") {
				Swal.fire({
					type: 'warning',
					title: 'Oops...',
					text: 'Nama Wajib Diisi !',
					position: 'top-end',

				});
			} else if (phone.length == "") {
				Swal.fire({
					type: 'warning',
					title: 'Oops...',
					text: 'HP Wajib Diisi !',
					position: 'top-end',

				});
			}else{
				$.ajax({
					type: "post",
					url: "<?= base_url() ?>Register/registerUser",
					data: {
						'Name': name,
						'password': password,
						'no_phone': phone,
						'Email': email,
					},
					dataType: "json",
					success: function(e) {
	
						console.log(e)
						// return false
						if (e.error) {
							Swal.fire({
								type: 'warning',
								title: 'Oops...',
								text: e.message,
								position: 'top-end',
	
							});
						} else {
	
							Swal.fire({
								type: 'success',
								title: 'Hai...',
								text: e.message,
								position: 'top-end',
	
							});
							setTimeout(() => {
								window.location = '<?= base_url() ?>user';
							}, 2100);
						}
	
					}
				});

			}
			return false;

		});

		$('.Veronica').click(function(e) {
			window.location = '<?= base_url() ?>user';

		});

		'use strict';

		var usernameError = true,
			emailError = true,
			passwordError = true,
			passConfirm = true;

		// Detect browser for css purpose
		if (navigator.userAgent.toLowerCase().indexOf('firefox') > -1) {
			$('.form form label').addClass('fontSwitch');
		}

		// Label effect
		$('input').focus(function() {

			$(this).siblings('label').addClass('active');
		});

		// Form validation
		$('input').blur(function() {

			// User Name
			if ($(this).hasClass('name')) {
				if ($(this).val().length === 0) {
					$(this).siblings('span.error').text('Please type your full name').fadeIn().parent('.form-group').addClass('hasError');
					usernameError = true;
				} else if ($(this).val().length > 1 && $(this).val().length <= 6) {
					$(this).siblings('span.error').text('Please type at least 6 characters').fadeIn().parent('.form-group').addClass('hasError');
					usernameError = true;
				} else {
					$(this).siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
					usernameError = false;
				}
			}
			// Email
			if ($(this).hasClass('email')) {
				if ($(this).val().length == '') {
					$(this).siblings('span.error').text('Please type your email address').fadeIn().parent('.form-group').addClass('hasError');
					emailError = true;
				} else {
					$(this).siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
					emailError = false;
				}
			}

			// PassWord
			if ($(this).hasClass('pass')) {
				if ($(this).val().length < 8) {
					$(this).siblings('span.error').text('Please type at least 8 charcters').fadeIn().parent('.form-group').addClass('hasError');
					passwordError = true;
				} else {
					$(this).siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
					passwordError = false;
				}
			}

			// PassWord confirmation
			if ($('.pass').val() !== $('.passConfirm').val()) {
				$('.passConfirm').siblings('.error').text('Passwords don\'t match').fadeIn().parent('.form-group').addClass('hasError');
				passConfirm = false;
			} else {
				$('.passConfirm').siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
				passConfirm = false;
			}

			// label effect
			if ($(this).val().length > 0) {
				$(this).siblings('label').addClass('active');
			} else {
				$(this).siblings('label').removeClass('active');
			}
		});


		// form switch
		$('a.switch').click(function(e) {
			$(this).toggleClass('active');
			e.preventDefault();

			if ($('a.switch').hasClass('active')) {
				$(this).parents('.form-peice').addClass('switched').siblings('.form-peice').removeClass('switched');
			} else {
				$(this).parents('.form-peice').removeClass('switched').siblings('.form-peice').addClass('switched');
			}
		});


		// Form submit
		$('form.signup-form').submit(function(event) {
			event.preventDefault();

			if (usernameError == true || emailError == true || passwordError == true || passConfirm == true) {
				$('.name, .email, .pass, .passConfirm').blur();
			} else {
				$('.signup, .login').addClass('switched');

				setTimeout(function() {
					$('.signup, .login').hide();
				}, 700);
				setTimeout(function() {
					$('.brand').addClass('active');
				}, 300);
				setTimeout(function() {
					$('.heading').addClass('active');
				}, 600);
				setTimeout(function() {
					$('.success-msg p').addClass('active');
				}, 900);
				setTimeout(function() {
					$('.success-msg a').addClass('active');
				}, 1050);
				setTimeout(function() {
					$('.form').hide();
				}, 700);
			}
		});

		// Reload page
		$('a.profile').on('click', function() {
			location.reload(true);
		});


	});
</script>
