		<link href="<?php echo base_url() . "templates/user/"; ?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
		<script src="<?php echo base_url() . "templates/"; ?>vendors/jquery/dist/jquery.min.js"></script>
		<!-- Bootstrap -->
		<script src="<?php echo base_url() . "templates/"; ?>vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


		<link href="<?php echo base_url() . "templates/vendors/"; ?>login/login.css" rel="stylesheet">

		<script src="<?php echo base_url() . "templates/"; ?>/vendors/login/login.js"></script>


		<!------ Include the above in your HEAD tag ---------->

		<div class="container">
			<div class="login-container">
				<div id="output"></div>
				<div class="avatar"></div>
				<div class="form-box">
					<form action="" method="">
						<input name="username"  id="username" type="text" placeholder="username">
						<input type="password" placeholder="password" id="password">
						<!-- <button class="btn btn-info btn-block login" type="submit">Login</button> -->
						<a class="btn btn-info btn-block login" type="submit" id="loginBtn">Log in</a>
					</form>
				</div>
			</div>

		</div>
				<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
		<script>
			document.addEventListener("DOMContentLoaded", function(event) {
				console.log("re"); 

				<?php $bu = base_url() ?>
				$('#loginBtn').on('click', function() {
					var username = $('#username').val();
					var password = $('#password').val();
				console.log(username.length,password); 

					// return false;

					if (username.length < 1 || password.length < 1) {
							Swal.fire(
								'Gagal!',
								"Harap Lengkapi Form",
								'error'
							);

					} else {
						$('#loginBtn').html('<i class="fas fa-spinner fa-spin"></i> Tunggu..');
						$('#loginBtn').prop('disabled', true);
						// alert("gagal-")
						$.ajax({
							type: "POST",
							dataType: 'json',
							url: "<?php echo $bu; ?>Admin/login_proses",
							data: {
								username: username,
								password: password,
							},
						}).done(function(e) {
							console.log(e);
							// return false;
							if (e.status) {
								$('#username').val('');
								$('#password').val('');

								Swal.fire(
									'Login Berhasil!',
									e.message,
									'success'
								)

								$('#alertNotif').html('<div class="alert alert-success alert-dismissible show" role="alert"><span>' + e.message + '</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
								setTimeout(() => {
									window.location = '<?= $bu ?>Admin';
								}, 1250);
							} else {
								Swal.fire(
									'Gagal!',
									e.message,
									'error'
								);

								$('#alertNotif').html('<div class="alert alert-danger alert-dismissible show" role="alert"><span>' + e.message + '</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
							}
						}).fail(function(e) {
							var message = 'Terjadi Kesalahan.';
							$('#alertNotif').html('<div class="alert alert-danger alert-dismissible show" role="alert"><span>' + message + '</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						}).always(function() {
							// toAlert();
							// resetButton()
						});
					}
					// return false;;
				});
			});


			
		</script>