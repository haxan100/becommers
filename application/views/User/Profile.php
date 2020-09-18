	<!-- banner -->
	<div class="banner banner10">
		<div class="container">
			<h2>Profile User</h2>
		</div>
	</div>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.lite.min.css">

	<!-- jQuery library -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css"></script>
	<?php
	$bu = base_url('user');
	// var_dump($bu);


	?>


	<style>
		.biz-bg-w-3 {
			background-color: #EEEFF0;
		}

		.biz-bg-w-2 {
			background-color: #FFFFFF;
		}

		.containers {
			/* max-width: 90%; */
			border-radius: 10px;
			box-shadow: 1px 4px 19px 5px #888888;
			padding-bottom: 5%;
			padding-left: 12%;
			padding-right: 12%;
			margin-bottom: 5%;
		}

		.box-shadow {
			box-shadow: 0px 0px 9px 1px #CDCDCDCD;
			border-radius: 9px;
			/* height: 140px; */
			margin-bottom: 5px;
			margin-top: 9px;
			margin-right: 2%;
			margin-left: 10%;
		}

		.biz-rad-10 {
			border-radius: 10px !important;
		}

		.cards {
			padding-top: 5%;
			padding-bottom: 5%;
		}

		.card-body {
			padding-top: 5%;
			padding-bottom: 5%;
			padding-left: 5%;
		}
	</style>
	<!-- //banner -->
	<!-- breadcrumbs -->
	<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="<?php echo base_url() . "templates/user/"; ?>index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>Profile User</li>
			</ul>
		</div>
	</div>
	<input type="hidden" name="id_user" id="id_user" value="<?= $user->id_user; ?>">
	<input type="hidden" name="nama_lengkap" id="nama_lengkap" value="<?= $user->nama_lengkap; ?>">
	<input type="hidden" name="email" id="email" value="<?= $user->email; ?>">
	<input type="hidden" name="phone" id="phone" value="<?= $user->no_phone; ?>">

	<!-- <?php var_dump($user) ?> -->
	<!-- //breadcrumbs -->
	<!-- about -->
	<div class=" biz-bg-w-3" style="padding-top: 11px; padding-bottom: 50px;">
		<div class="containers biz-bg-w-2 ">
			<div class="about">
				<div class="container">
					<div class="w3ls_about_grids">
						<center> <strong> <b> Profile</b></strong></center>
						<hr>
						<div class="col-md-6 w3ls_about_grid_left">
							<div class="col  biz-rad-10 px-3 py-2 biz-text-20 ">
								<br>
							</div>


							<div class="container">
								<div class="main-body">
									<div class="row gutters-sm">
										<div class="col-md-4 mb-3">
											<div class="card cards">
												<div class="card-body">
													<div class="d-flex flex-column align-items-center text-center">
														<img src="<?= base_url(); ?>upload/images/user/default.png" alt="Admin" class="rounded-circle" width="150">
														<div class="mt-3 mb-3" style="margin-top: 14px;">
															<h4><?= $user->nama_lengkap ?></h4>
															<!-- <p class="text-secondary mb-1">Full Stack Developer</p> -->
															<!-- <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p> -->

														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-md-8">
											<div class="card mb-3">
												<div class="card-body">
													<div class="row">
														<div class="col-sm-3">
															<h6 class="mb-0">Nama Lengkap : </h6>
														</div>
														<div class="col-sm-9 text-secondary">
															<?= $user->nama_lengkap ?>
														</div>
													</div>
													<hr>
													<div class="row">
														<div class="col-sm-3">
															<h6 class="mb-0">Email</h6>
														</div>
														<div class="col-sm-9 text-secondary">
															<?= $user->email ?>
														</div>
													</div>
													<hr>
													<div class="row">
														<div class="col-sm-3">
															<h6 class="mb-0">Phone</h6>
														</div>
														<div class="col-sm-9 text-secondary">
															<?= $user->no_phone ?>
														</div>
													</div>
													<hr>
													<hr>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>


							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
			<center>

				<button class="BtnEdit btn btn-primary data-id_user=<?= $user->id_user ?>
				data-nama_lengkap=<?= $user->nama_lengkap ?>
				data-email=<?= $user->email ?>
				data-no_phone=<?= $user->no_phone ?>
				
				
				
				
				">Edit Profil</button>
			</center>
		</div>
		<div class="clearfix"> </div>
		<hr>

		<div class="modal fade" id="modalSubscriptionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header text-center">
						<h4 class="modal-title w-100 font-weight-bold">Profile</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<input type="hidden" name="id_user" id="id_user" value="<?= $user->id_user; ?>">

					<div class="modal-body mx-3">
						<div class="md-form mb-5">
							<i class="glyphicon glyphicon-user prefix grey-text"></i>
							<input type="text" id="nama" name="nama" class="form-control validate">
							<label data-error="wrong" data-success="right" for="form3">Your name</label>
						</div>

						<div class="md-form mb-4">
							<i class="glyphicon glyphicon-envelope prefix grey-text"></i>
							<input type="text" id="emails" name="emails" class="form-control validate">
							<label data-error="wrong" data-success="right" for="form2">Your email</label>
						</div>

						<div class="md-form mb-4">
							<i class="glyphicon glyphicon-earphone prefix grey-text"></i>
							<input type="number" id="no_phones" name="no_phones" class="form-control validate">
							<label data-error="wrong" data-success="right" for="form3">Your Phone</label>
						</div>

						<div class="md-form mb-4">
							<i class="glyphicon glyphicon-eye-open prefix grey-text"></i>
							<input type="password" id="passwords" name="passwords" class="form-control validate">
							<label data-error="wrong" data-success="right" for="form2">Your Password</label>
						</div>

					</div>
					<div class="modal-footer d-flex justify-content-center">
						<button type="button" class="btn btn-indigo btnSave">Edit <i class="glyphicon glyphicon-edit ml-1"></i></button>
					</div>
				</div>
			</div>
		</div>



		<head>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
		</head>


		<script type="text/javascript">
			document.addEventListener("DOMContentLoaded", function(event) {

				$('body').on('click', '.BtnEdit', function() {

					var id_user = $('#id_user').val();
					var email = $('#email').val();
					var nama = $('#nama_lengkap').val();
					var no = parseInt($('#phone').val());

					console.log(id_user, email, nama, no);

					$('#nama').val(nama);
					$('#emails').val(email);
					$('#no_phones').val(no);

					$('#modalSubscriptionForm').modal('show')
					// return false
				});

				$('.btnSave').on('click', function() {

					var id_user = $('#id_user').val();
					var nama = $('#nama').val();
					var no_phone = $('#no_phones').val();
					var email = $('#emails').val();
					var password = $('#passwords').val();

					if (nama == "") {
						alert("Mohon Nama Di Isi");
					}
					if (no_phone == "") {
						alert("Mohon No Di Isi");
					} else if (email == "") {
						alert("Mohon Email Di Isi");
					} else {
						$.ajax({
							type: "POST",
							dataType: 'json',
							url: "<?= $bu; ?>/editProfile",
							data: {
								id_user: id_user,
								nama: nama,
								no_phone: no_phone,
								email: email,
								password: password,
							}
						}).done(function(e) {
							Swal.fire(
								':)',
								e.message,
								'success'
							);
							$('#nomor_resi').val('');
							var alert = '';
							if (e.status) {
								console.log(e);
								// notifikasi('#alertNotif', e.message, false);
								$('#dt_user').modal('hide');
								datatable.ajax.reload();
							} else {
								console.log(e);
								// notifikasi('#alertNotif', e.message, true);
							}
						}).fail(function(e) {
							var message = 'Terjadi Kesalahan. #JSMP01';
							// notifikasi('#alertNotif', message, true);
						});
					}

					// console.log(id_user);
					// console.log(nama);
					// console.log(no_phone);
					// console.log(email);
					// console.log(password);
					// // $('#modalSubscriptionForm').modal('show')
					// return false
					// $('#modalSubscriptionForm').modal('show')
					// return false
				});

			});
		</script>
