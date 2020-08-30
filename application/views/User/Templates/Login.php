	<div class="modal fade" id="myModal88" tabindex="-1" role="dialog" aria-labelledby="myModal88" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						&times;</button>
					<h4 class="modal-title" id="myModalLabel">Don't Wait, Login now!</h4>
				</div>
				<div class="modal-body modal-body-sub">
					<div class="row">
						<div class="col-md-8 modal_body_left modal_body_left1" style="border-right: 1px dotted #C2C2C2;padding-right:3em;">
							<div class="sap_tabs">
								<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
									<ul>
										<li class="resp-tab-item" aria-controls="tab_item-0"><span>Sign in</span></li>
										<li class="resp-tab-item" aria-controls="tab_item-1"><span>Sign up</span></li>
									</ul>
									<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
										<div class="facts">
											<div class="register">
												<form id="formLogin">
													<input name="LEmail" id="LEmail" placeholder="Email Address" type="text" required="">
													<input name="LPassword" id="LPassword"  placeholder="Password" type="password" required="">
													<div class="sign-up">
														<input type="submit" id="loginBtn" value="Sign in" />
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
										<div class="facts">
											<div class="register">
												<form id="formRegister">
													<input placeholder="Name" name="Name" id="Name" type="text" required="">
													<input placeholder="Email Address" name="Email" type="email" id="email" required="">
													<input placeholder="Password" name="Password" id="password" type="password" required="">
													<input placeholder="Confirm No Telp" name="no_phone" id="no_phone" type="text" required="">

													<div class="sign-up">
														<input type="submit"  id="registerBtn" value="Create Account" />
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
							<script src="<?php echo base_url() . "templates/user/"; ?>js/easyResponsiveTabs.js" type="text/javascript"></script>
							<script type="text/javascript">
								$(document).ready(function() {
									$('#horizontalTab').easyResponsiveTabs({
										type: 'default', //Types: default, vertical, accordion           
										width: 'auto', //auto or any width like 600px
										fit: true // 100% fit in a container
									});
								});
							</script>
							<div id="OR" class="hidden-xs"></div>
						</div>
						<div class="col-md-4 modal_body_right modal_body_right1">
							<div class="row text-center sign-with">
								<div class="col-md-12">
									<img src="https://i.pinimg.com/564x/1e/29/77/1e2977ca1225981e307ad8d2c26a9040.jpg" alt="" srcset="" style="
												max-width: 90%;
											">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

	<script>
		$(document).ready(function() {

			var bu = '<?= base_url(); ?>';

			// console.log("dddd");
			$('#registerBtn').on('click', function() {

				$("#formRegister").trigger('submit');
				return false;

			});
			$('#loginBtn').on('click', function() {

				var email = $("#LEmail").val();
				var password = $("#LPassword").val();
				// console.log(email,password);
				$("#formLogin").trigger('submit');
				// return false;
			});

			$("#formLogin").submit(function(e) {				
				var email = $("#LEmail").val();
				var password = $("#LPassword").val();
				if (email.length == "") {
					Swal.fire({
						type: 'warning',
						title: 'Oops...',
						text: 'Email Wajib Diisi !'
					});

				} else if (password.length == "") {
					Swal.fire({
						type: 'warning',
						title: 'Oops...',
						text: 'Password Wajib Diisi !'
					});
				}
				$.ajax({
					type: 'POST',
					url: bu + 'Register/loginUser',
					dataType: 'json',
					data: new FormData(this),
					processData: false,
					contentType: false,
					cache: false,
					async: false,
				}).done(function(e) {
					// console.log('berhasil');
					console.log(e);
					if (!e.error) {

						// resetForm();
						setTimeout(() => {
						window.location = bu + 'user';
						}, 4100);
						Swal.fire({
							type: 'success',
							title: 'Hello',
							text: 'Berhasil Login  !'
						});
					} else {
						Swal.fire({
							type: 'warning',
							title: 'Oops...',
							text: e.message,
						});
					}
				}).fail(function(e) {
					if (e.responseText == false) {
						Swal.fire({
							type: 'succes',
							title: 'Oops...',
							text: 'Berhasil regis : !'
						});
					} else {
						console.log(e)
						Swal.fire({
							type: 'warning',
							title: 'Oops...',
							text: "Coba Beberapa saat",
						});

					}
				})
				return false;
			});



			$("#formRegister").submit(function(e) {
				var nama_lengkap = $("#Name").val();
				var email = $("#email").val();
				var password = $("#password").val();
				var no_hp = $("#no_phone").val();

				if (nama_lengkap.length == "") {

					Swal.fire({
						type: 'warning',
						title: 'Oops...',
						text: 'Nama Lengkap Wajib Diisi !'
					});

				} else if (email.length == "") {

					Swal.fire({
						type: 'warning',
						title: 'Oops...',
						text: 'Username Wajib Diisi !'
					});

				}

				$.ajax({
					type: 'POST',
					url: bu + 'Register/registerUser',
					dataType: 'json',
					data: new FormData(this),
					processData: false,
					contentType: false,
					cache: false,
					async: false,
				}).done(function(e) {
					// console.log('berhasil');
					console.log(e);
					if (!e.error) {

						// resetForm();
						setTimeout(() => {
						window.location = bu + 'user';
						}, 4100);
						Swal.fire({
							type: 'success',
							title: 'Oops...',
							text: 'Berhasil regis  !'
						});
					} else {

						Swal.fire({
							type: 'warning',
							title: 'Oops...',
							text: 'Coba Lagi Lain Waktu !'
						});
						// console.log(e);

						$('#alertNotif').html('<div class="alert alert-danger alert-dismissible show" role="alert"><span>' + e.message + '</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					}
				}).fail(function(e) {
					// console.log(e.responseText == false)
					// console.log(e)
					// console.log(e.responseText)
					if (e.responseText == false) {
						Swal.fire({
							type: 'succes',
							title: 'Oops...',
							text: 'Berhasil regis : !'
						});
					} else {

						Swal.fire({
							type: 'warning',
							title: 'Oops...',
							text: 'Coba Lagi Lain waddddddktu !'
						});

					}


					// console.log(e.responseText);

					// console.log('gagal');
					// console.log(e);
					var message = 'Terjadi Kesalahan.';
					$('#alertNotif').html('<div class="alert alert-danger alert-dismissible show" role="alert"><span>' + message + '</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				})
				return false;
			});

		});
	</script>
