<!-- partial -->
<style>
	img {
		max-width: 50px;
	}
</style>
<?php $bu = base_url(); ?>
<div class="content-wrapper">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card mt-3">
			<div class="card-body">
				<div>
					<!-- <a class="btn btn-info" href="<?= base_url(); ?>Admin/tambah"> -->
					<!-- <i class="mdi mdi-plus-circle-outline"></i>Tambah Admin</a> -->
					<button type="button" class="btn btn-primary btn_tambah" data-toggle="modal" data-target="#modalUser">Tambah</button>
				</div>
				<br>
				<?php if ($this->session->flashdata('demo') or $this->session->flashdata('hapus')) : ?>
					<div class="alert alert-danger" role="alert">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<?php echo $this->session->flashdata('demo'); ?>
						<?php echo $this->session->flashdata('hapus'); ?>
					</div>
				<?php endif; ?>
				<?php if ($this->session->flashdata('ubah') or $this->session->flashdata('tambah')) : ?>
					<div class="alert alert-success" role="alert">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<?php echo $this->session->flashdata('ubah'); ?>
						<?php echo $this->session->flashdata('tambah'); ?>
					</div>
				<?php endif; ?>
				<h4 class="card-title">User</h4>
				<div class="tab-minimal tab-minimal-success">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="tab-2-1" data-toggle="tab" href="#allusers-2-1" role="tab" aria-controls="allusers-2-1" aria-selected="true">
								<i class="mdi mdi-account"></i>Semua Admin</a>
						</li>
					</ul>
					<div class="tab-content">

						<!-- all users -->
						<div class="tab-pane fade show active" id="allusers-2-1" role="tabpanel" aria-labelledby="tab-2-1">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Semua Admin</h4>
									<div class="row">
										<div class="col-12">
											<div class="table-responsive">
												<table id="order-listing" class="table">
													<thead>
														<tr>
															<th>No</th>
															<th>Admin Id</th>
															<th>Photo Profil</th>
															<th>Nama</th>
															<th>No HP</th>
															<th>Email</th>
															<th>Username</th>
															<th>Status Aktif</th>
															<th>Admin Ver</th>
															<th>Tindakan</th>
														</tr>
													</thead>
													<tbody>
														<?php $i = 1;
														foreach ($admin as $us) { ?>
															<tr>
																<td><?= $i ?></td>
																<td><?= $us['id_admin'] ?></td>
																<td>
																	<img src="<?= base_url('upload/images/admin/') . $us['image']; ?>">
																</td>
																<td><?= $us['nama_admin'] ?></td>
																<td><?= $us['no_telepon'] ?></td>
																<td><?= $us['email'] ?></td>
																<td><?= $us['username'] ?></td>
																<td>
																	<?php if ($us['status'] == 1) { ?>
																		<label class="badge badge-success">Aktiv</label>
																	<?php } else { ?>
																		<label class="badge badge-dark">Non Aktif</label>
																	<?php } ?>
																</td>

																<td>
																	<?php if ($us['id_role'] == 1) { ?>
																		<label class="badge badge-success">Super Admin</label>
																	<?php } else { ?>
																		<label class="badge badge-dark">Admin</label>
																	<?php } ?>
																</td>
																<td>
																	<a href="<?= base_url(); ?>Admin/detail/<?= $us['id_admin'] ?>">
																		<button class="btn btn-outline-primary mr-2">Lihat</button>
																	</a>

																	<?php if ($us['status'] == 0) { ?>
																		<a href="<?= base_url(); ?>Admin/ubahAktivAdmin/<?= $us['id_admin'] ?>">
																			<button class="btn btn-outline-success text-red mr-2">aktiv</button>
																		</a>
																	<?php } else { ?>
																		<a href="<?= base_url(); ?>Admin/ubahNonAktivAdmin/<?= $us['id_admin'] ?>">
																			<button class="btn btn-outline-dark text-dark mr-2"> Non Aktif</button>
																		</a>
																	<?php } ?>


																	<?php if ($us['id_role'] == 0) { ?>
																		<a href="<?= base_url(); ?>Admin/ubahSuperAdmin/<?= $us['id_admin'] ?>">
																			<button class="btn btn-outline-success text-red mr-2">Super Admin</button>
																		</a>
																	<?php } else { ?>
																		<a href="<?= base_url(); ?>Admin/ubahNonSuperAdmin/<?= $us['id_admin'] ?>">
																			<button class="btn btn-outline-dark text-dark mr-2">Admin</button>
																		</a>
																	<?php } ?>



																	<!-- <a href="<?= base_url(); ?>AdminMenu/hapusAdmin/<?= $us['id_admin'] ?>"> -->
																	<button class="btn btn-outline-danger text-red mr-2 hapus" data-nama="<?= $us['nama_admin'] ?>" data-id="<?= $us['id_admin'] ?>">Hapus</button>
																	<!-- </a> -->
																</td>
															<?php $i++;
														} ?>
															</tr>

													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- end of all users -->

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- modal awal -->
	<div class="modal fade none-border" id="modalUser">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<form id="form">
					<div class="modal-header">
						<h4 class="modal-title modalProdukTitleTambah"><strong>Tambah</strong> Admin Baru</h4>
						<h4 class="modal-title modalProdukTitleUbah" style="display: none"><strong>Ubah</strong> User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<p id="alertNotifModal" class="mt-2"></p>
						<div class="row ">
							<div class="col p-4">
								<div class="row">
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-6 form-group">
											<!-- <input type="hidden" name="id_user" id="id_user"> -->
											<label for="nama">Nama</label>
											<input id="nama" name="nama" type="text" class="form-control">
											<small></small>
										</div>
										<div class="col-6 form-group">
											<label for="nama">User Name</label>
											<input id="username" name="username" type="text" class="form-control">
											<small></small>
										</div>
									</div>
									<div class="row">
										<div class="col-6 form-group">
											<label for="Email">Email</label>
											<div class="input-group">
												<span class="input-group-prepend">
												</span>
												<input id="Email" name="Email" type="text" class="form-control inputEmail">
												<small></small>
											</div>
										</div>
										<div class="col-6 form-group">
											<label for="password">Password</label>
											<div class="input-group">
												<span class="input-group-prepend">
												</span>
												<input id="password" name="password" type="password" class="form-control inputPassword">
												<small></small>
											</div>
										</div>
									</div>
									<div class="row">

										<div class="col-6 form-group">
											<label for="noTelp">No Telp</label>
											<div class="input-group">
												<span class="input-group-prepend">
												</span>
												<input id="noTelp" name="noTelp" type="text" class="form-control inputNoTelp">
												<small></small>
											</div>
										</div>
										<div class="col-6 form-group">
											<label for="noTelp">Status</label>
											<div class="input-group">
												<span class="input-group-prepend">
												</span>

												<select class="form-control select col-12" id="status" name="status">
													<option value=0>Belum Aktiv</option>
													<option value=1>Aktiv</option>
												</select>
												<small></small>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-6 form-group">
											<label for="noTelp">Admin Ver</label>
											<div class="input-group">
												<span class="input-group-prepend">
												</span>


												<select class="form-control select col-12" id="admin_ver" name="admin_ver">
													<option value=0>Admin</option>
													<option value=1>Super Admin</option>
												</select>
												<small></small>
											</div>
										</div>
										<div class="col-6 form-group">
											<label for="noTelp">Foto</label>
											<div class="input-group">
												<span class="input-group-prepend">
												</span>
												<input type="file" class="form-control" name="fotopelanggan" id="fotopelanggan" class="dropify" data-max-file-size="3mb">

												<small></small>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
						<div class="modal-footer">
							<button id="btnTambah" class="btn btn-primary"><i class="fas fa-save"></i> Tambah</button>
							<!-- <button id="btnUbah" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button> -->
							<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
						</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- modal akhir  -->
<!-- content-wrapper ends -->
<script>
	document.addEventListener("DOMContentLoaded", function(event) {
		$("body").children().first().before($(".modal"));
		var bu = '<?= $bu ?>';
		$('#order-listing').DataTable();
		var url_form_tambah = bu + 'admin/tambah_admin_proses';
		var datatable = $('#order-listing').DataTable();
		$('body').on('click', '.btn_tambah', function() {
			url_form = url_form_tambah;
			console.log(url_form);
			$('#Edit').hide();
			$('#btnUbah').hide();

		});
		$('#tambah_act').on('click', function() {
			var nama = $('#nama').val();

			if (
				nama
			) {
				$("#form").submit();
			}
		});
		$("#form").submit(function(e) {
			console.log('form submitted');
			// return false;

			$.ajax({
				url: url_form,
				method: 'post',
				dataType: 'json',
				data: new FormData(this),
				processData: false,
				contentType: false,
				cache: false,
				async: false,
			}).done(function(e) {
				console.log(e.status);
				// return false;
				if (e.status) {
					console.log(e);
					// return false;

					// notifikasi('#alertNotif', e.message, false);
					Swal.fire(
						':)',
						e.message,
						'success'
					);
					setTimeout(function() {
						location.reload();
					}, 2000);
					$('#modalUser').modal('hide');
					// $('.modal-backdrop').hide();
					// datatable.ajax.reload();
					// resetForm();

				} else {

					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: e.errorInputs,

					});
					setTimeout(function() {
						location.reload();
					}, 2500);
				}
			}).fail(function(e) {
				console.log(e)
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: e.errorInputs,

				})
				// console.log("gagal");

				// notifikasi('#alertNotif', e.message, false);
			});
			// console.log("gagal");

			// notifikasi('#alertNotif', e.message, false);
			return false;
		});

		$('.hapus').on("click", function(e) {
			id = $(this).data('id');
			nama = $(this).data('nama');
			// console.log(d);

			Swal.fire({
				title: 'Apakah Anda Yakin ?',
				text: "Anda akan Menghapus Admin: " + nama,
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
			}).then((result) => {

				if (result.value) {
					$.ajax({
						url: bu + 'Admin/hapusAdmin',
						dataType: 'json',
						method: 'POST',
						data: {
							id: id
						}
					}).done(function(e) {
						// console.log(e);
						Swal.fire(
							'Deleted!',
							e.message,
							'success'
						)
						$('#modal-detail').modal('hide');
						setTimeout(function() {
							location.reload();
						}, 2500);

						// datatable.ajax.reload();
						// resetForm();

					}).fail(function(e) {
						console.log('gagal');
						console.log(e);
						var message = 'Terjadi Kesalahan. #JSMP01';
					});




				}
			})


		});

	});
</script>
