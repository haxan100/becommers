				<div class="app-main__inner">
					<style>
						#image {
							max-width: 100px;
							max-height: 100px;
						}
					</style>


					<div class="row">
						<div class="col-md-12">
							<div class="main-card mb-3 card">
								<div class="card-header">Data User
									<div class="btn-actions-pane-right">
									</div>
								</div>

								<div class="row">
									<div class="col sm-6 ml-3 pb-1 pt-1">
										<button type="button" class="btn btn-primary btn_tambah" data-toggle="modal" data-target="#modalUser">Tambah</button>

									</div>

								</div>
								<div class="table-responsive">
									<table id="datatable_user" class="table table-striped table-bordered" style="width:100%">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama</th>
												<th>Email</th>
												<th>No Telp</th>
												<th>Status</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>

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
									<h4 class="modal-title modalProdukTitleTambah"><strong>Tambah</strong> User Baru</h4>
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
												<div class="form-group">
													<label for="nama">Nama</label>
													<input id="nama" name="nama" type="text" class="form-control">
													<small></small>
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
															<input id="password" name="password" type="text" class="form-control inputPassword">
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
																<option value=2>Banned</option>
															</select>
															<small></small>
														</div>
													</div>
												</div>
											</div>
										</div>

									</div>
									<div class="modal-footer">
										<button id="btnTambah" class="btn btn-primary"><i class="fas fa-save"></i> Tambah</button>
										<button id="btnUbah" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
										<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
									</div>
							</form>
						</div>
					</div>
				</div>
				<!-- modal akhir  -->

				<script type="text/javascript">
					document.addEventListener("DOMContentLoaded", function(event) {





						$("body").children().first().before($(".modal"));

						var bu = '<?= base_url(); ?>';
						var url_form_tambah = bu + 'admin/tambah_user_proses';
						var url_form_ubah = bu + 'admin/ubah_produk_proses';

						$('body').on('click', '.btn_tambah', function() {
							url_form = url_form_tambah;
							console.log(url_form);
							$('#Edit').hide();
							$('#btnUbah').hide();

						});

						$('#tambah_act').on('click', function() {
							var nama = $('#nama').val();
							// var kategori = $('#kategori').val();
							// var harga = $('#harga').val();
							// var qty = $('#qty').val();
							// var status = $('#status').val();
							// console.log(nama,kategori,harga,qty,status);return false;
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
								console.log(e);
								if (e.status) {
									// notifikasi('#alertNotif', e.message, false);
									Swal.fire(
										':)',
										e.message,
										'success'
									);
									$('#modalUser').modal('hide');
									$('.modal-backdrop').hide();
									datatable.ajax.reload();
									resetForm();

								} else {

									// notifikasiModal('#modalProduk', '#alertNotifModal', e.message, true);
									// $.each(e.errorInputs, function(key, val) {
									// 	// console.log(val[0], val[1]);
									// 	validasi(val[0], false, val[1]);
									// 	$(val[0])
									// 		.parent()
									// 		.find('.input-group-text')
									// 		.addClass('form-control is-invalid');
									// });
									Swal.fire({
										icon: 'error',
										title: 'Oops...',
										text: e.errorInputs,

									})
								}
							}).fail(function(e) {
								console.log(e)
								Swal.fire({
									icon: 'error',
									title: 'Oops...',
									text: e.errorInputs,

								})

								notifikasi('#alertNotif', e.message, false);
								// notifikasiModal('#alertNotif', 'Terjadi kesalahan!', true);
							});

							notifikasi('#alertNotif', e.message, false);
							return false;
						});

						function resetForm() {
							// console.log('reset');
							// $('#alertNotifModal').html('');
							$('#form').trigger('reset');
							validasi('#nama', true);
							validasi('#kategori', true);
							validasi('#harga', true);
							validasi('#qty', true);
							validasi('#status', true);
							validasi('#foto', true);

						}

						function validasi(id, valid, message = '') {
							if (valid) {
								$(id)
									// .addClass('is-valid')
									.removeClass('is-invalid')
									.parent()
									.find('small')
									// .addClass('valid-feedback')
									.removeClass('invalid-feedback')
									.html(message);
							} else {
								$(id)
									// .removeClass('is-valid')
									.addClass('is-invalid')
									.parent()
									.find('small')
									// .removeClass('valid-feedback')
									.addClass('invalid-feedback')
									.html(message);
							}
						}

						function notifikasi(sel, msg, err) {
							var alert_type = 'alert-success ';
							if (err) alert_type = 'alert-danger ';
							var html = '<div class="alert ' + alert_type + ' alert-dismissible show p-4">' + msg + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
							$(sel).html(html);
							$('html, body').animate({
								// scrollTop: $(sel).offset().top - 75
							}, 500);
						}


						function notifikasiModal(modal, sel, msg, err) {
							var alert_type = 'alert-success ';
							if (err) alert_type = 'alert-danger ';
							var html = '<div class="alert ' + alert_type + ' alert-dismissible show p-4">' + msg + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
							$(sel).html(html);
							$(modal).animate({
								scrollTop: $(sel).offset().top - 75
							}, 500);
						}


						var datatable = $('#datatable_user').DataTable({
							dom: "Bfrltip",
							'pageLength': 10,
							"responsive": true,
							"processing": true,
							"bProcessing": true,
							"autoWidth": false,
							"serverSide": true,


							"columnDefs": [{
									"targets": 0,
									"className": "dt-body-center dt-head-center",
									"width": "20px",
									"orderable": false
								},
								{
									"targets": 1,
									"className": "dt-head-center"
								},
								{
									"targets": 2,
									"className": "dt-head-center"
								}, {
									"targets": 3,
									"className": "dt-head-center"
								},
							],
							"order": [
								[1, "desc"]
							],
							'ajax': {
								url: bu + 'Admin/getAllUser',
								type: 'POST',
								"data": function(d) {
									// d.id_kelas = id_kelas;

									return d;
								}
							},

							buttons: [

								// 'excelHtml5',
								// 'pdfHtml5'
								{
									text: "Excel",
									extend: "excelHtml5",
									className: "btn btn-round btn-info",

									title: 'Data Siswa',
									exportOptions: {
										columns: [1, 2, 3, 4, 5, 6, 7]
									}
								}, {
									text: "PDF",
									extend: "pdfHtml5",
									className: "<br>btn btn-round btn-danger",
									title: 'Data Siswa',
									exportOptions: {
										columns: [1, 2, 3, 4, 5, 6, 7]
									}
								}
							],
							language: {
								searchPlaceholder: "Cari..",

							},
							"lengthMenu": [
								[10, 25, 50, 1000],
								[10, 25, 50, 1000]
							]

						});

						$('body').on('click', '.btn_edit', function() {
							url_form = url_form_ubah;
							var id_user = $(this).data('id_user');
							var nama_lengkap = $(this).data('nama_lengkap');

							var email = $(this).data('email');
							var no_phone = $(this).data('no_phone');
							var password = $(this).data('password');
							var status = $(this).data('status');
							console.log(id_user,nama_lengkap, email, no_phone);
							// return false;

							$('#id_produk').val(id_produk);
							$('#nama').val(nama_produk);
							$('#kategori').val(id_kategori);
							$('#harga').val(harga);
							$('#qty').val(qty);
							$('#status').val(status_produk);
							$('#deskripsi').val(deskripsi);
							// $('#id_kategori').val(id_kategori);



							$('#tambah_act').hide();
							$('#Edit').show();
						});

						$('#Edit').on('click', function() {

							var id_kategori = $('#id_kategori').val();
							var nama_kategori = $('#nama').val();
							if (
								nama_kategori
							) {
								$("#form").submit();
							}
							// return false;
						});

						$('body').on('click', '.hapus', function() {

							var id_produk = $(this).data('id_produk');
							var nama = $(this).data('nama_produk');
							Swal.fire({
								title: 'Apakah Anda Yakin ?',
								text: "Anda akan Menghapus Produk: " + nama,
								icon: 'warning',
								showCancelButton: true,
								confirmButtonColor: '#3085d6',
								cancelButtonColor: '#d33',
								confirmButtonText: 'Yes, delete it!'
							}).then((result) => {

								if (result.value) {
									$.ajax({
										url: bu + 'Admin/hapusProduk',
										dataType: 'json',
										method: 'POST',
										data: {
											id_produk: id_produk
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
										}, 4000);

										datatable.ajax.reload();
										resetForm();

									}).fail(function(e) {
										console.log('gagal');
										console.log(e);
										var message = 'Terjadi Kesalahan. #JSMP01';
									});




								}
							})




						});

						$('#btnTambah').on('click', function() {

							var _nama = cekNama();
							var _email = cekEmail();
							var _password = cekPassword();
							var _no_telp = cekNoTelp();

							if (

								_nama && _email && _password && _no_telp
							) {
								// console.log("disini");
								$('#draft').val("1");
								$("#form").submit();
								// $("#form").reset();

							}
							$('#btnTambah').show();
							return false;

						});

						function cekNama() {
							var nama = $('#nama').val();
							if (nama == '') {
								validasi('#nama', false, 'Silahkan isi Nama');
								$('#nama')
									.parent()
									.find('.input-group-text')
									.addClass('form-control is-invalid');
								return false;
							} else {
								validasi('#nama', true);
								$('#nama')
									.parent()
									.find('.input-group-text')
									.removeClass('form-control is-invalid');
								return true;
							}
						}

						function cekEmail() {
							var Email = $('#Email').val();
							if (Email == '') {
								validasi('#Email', false, 'Silahkan isi Email');
								$('#Email')
									.parent()
									.find('.input-group-text')
									.addClass('form-control is-invalid');
								return false;
							} else {
								validasi('#Email', true);
								$('#Email')
									.parent()
									.find('.input-group-text')
									.removeClass('form-control is-invalid');
								return true;
							}
						}

						function cekPassword() {
							var password = $('#password').val();
							if (password == '') {
								validasi('#password', false, 'Silahkan isi password');
								$('#password')
									.parent()
									.find('.input-group-text')
									.addClass('form-control is-invalid');
								return false;
							} else {
								validasi('#password', true);
								$('#password')
									.parent()
									.find('.input-group-text')
									.removeClass('form-control is-invalid');
								return true;
							}
						}

						function cekNoTelp() {
							var noTelp = $('#noTelp').val();
							if (noTelp == '') {
								validasi('#noTelp', false, 'Silahkan isi noTelp');
								$('#noTelp')
									.parent()
									.find('.input-group-text')
									.addClass('form-control is-invalid');
								return false;
							} else {
								validasi('#noTelp', true);
								$('#noTelp')
									.parent()
									.find('.input-group-text')
									.removeClass('form-control is-invalid');
								return true;
							}
						}






					});
				</script>
