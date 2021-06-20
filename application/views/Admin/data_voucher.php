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
								<div class="card-header">Data Voucher
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
												<th>Kode Voucher</th>
												<th>Harga</th>
												<th>QTY</th>
												<th>Expired</th>
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
									<h4 class="modal-title modalProdukTitleTambah"><strong>Tambah</strong> Voucher Baru</h4>
									<h4 class="modal-title modalProdukTitleUbah" style="display: none"><strong>Ubah</strong> Voucher</h4>
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
													<input type="hidden" name="id_vocher" id="id_vocher">
													<label for="kode_vocher">Kode Voucher</label>
													<input id="kode_vocher" name="kode_vocher" type="text" class="form-control">
													<small></small>
												</div>
												<div class="row">
													<div class="col-6 form-group">
														<label for="harga">Harga</label>
														<div class="input-group">
															<span class="input-group-prepend">
															</span>
															<input id="harga" name="harga" type="text" class="form-control inputEmail">
															<small></small>
														</div>
													</div>
													<div class="col-6 form-group">
														<label for="qty">qty</label>
														<div class="input-group">
															<span class="input-group-prepend">
															</span>
															<input id="qty" name="qty" type="number" class="form-control inputPassword">
															<small></small>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-6 form-group">
														<label for="noTelp">Expired</label>
														<div class="input-group">
															<span class="input-group-prepend">
															</span>
															<input id="expired" name="expired" type="date" class="form-control inputNoTelp">
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
						// $('#modalUser').modal('show');
						$("body").children().first().before($(".modal"));
						var bu = '<?= base_url(); ?>';
						var url_form_tambah = bu + 'admin/tambah_voucher_proses';
						var url_form_ubah = bu + 'admin/ubah_vocher_proses';

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
								url: bu + 'Admin/getAllVoucher',
								type: 'POST',
								"data": function(d) {

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
							console.log(password)

							$('#nama').val(nama_lengkap);
							$('#Email').val(email);
							$('#noTelp').val(no_phone);
							$('#status').val(status);
							$('#password').val(password);
							$('#id_user').val(id_user);
							// $('#status').val(status_produk);
							// $('#deskripsi').val(deskripsi);
							// $('#id_kategori').val(id_kategori);

							$('#modalUser').modal('show');



							$('#tambah_act').hide();
							$('#Edit').show();
						});

						$('#Edit').on('click', function() {
							var id_user = $('#id_user').val()
							var nama_lengkap = cekNama()
							var email = cekEmail();
							var no_phone = cekNoTelp();
							var status = $('#status').val();
							var password = cekPassword();
							if (
								nama_lengkap
							) {
								$("#form").submit();
							}
							// return false;
						});

						$('body').on('click', '.hapus', function() {

							var id_vocher = $(this).data('id_vocher');
							var nama = $(this).data('kode_vocher');
							Swal.fire({
								title: 'Apakah Anda Yakin ?',
								text: "Anda akan Menghapus Vocher: " + nama,
								icon: 'warning',
								showCancelButton: true,
								confirmButtonColor: '#3085d6',
								cancelButtonColor: '#d33',
								confirmButtonText: 'Yes, delete it!'
							}).then((result) => {

								if (result.value) {
									$.ajax({
										url: bu + 'Admin/hapusVocher',
										dataType: 'json',
										method: 'POST',
										data: {
											id_vocher: id_vocher
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

							var _kode_vocher = cekKode();
							var _harga = cekHarga();
							var _qty = cekQTY();

							if (
								_kode_vocher && _harga && _qty
							) {
								$('#draft').val("1");
								$("#form").submit();

							}
							$('#btnTambah').show();
							return false;

						});

						function cekKode() {
							var nama = $('#kode_vocher').val();
							if (nama == '') {
								validasi('#kode_vocher', false, 'Silahkan isi !');
								$('#kode_vocher')
									.parent()
									.find('.input-group-text')
									.addClass('form-control is-invalid');
								return false;
							} else {
								validasi('#kode_vocher', true);
								$('#kode_vocher')
									.parent()
									.find('.input-group-text')
									.removeClass('form-control is-invalid');
								return true;
							}
						}

						function cekHarga() {
							var nama = $('#harga').val();
							if (nama == '') {
								validasi('#harga', false, 'Silahkan isi ');
								$('#harga')
									.parent()
									.find('.input-group-text')
									.addClass('form-control is-invalid');
								return false;
							} else {
								validasi('#harga', true);
								$('#harga')
									.parent()
									.find('.input-group-text')
									.removeClass('form-control is-invalid');
								return true;
							}
						}

						function cekQTY() {
							var nama = $('#qty').val();
							if (nama == '') {
								validasi('#qty', false, 'Silahkan isi');
								$('#qty')
									.parent()
									.find('.input-group-text')
									.addClass('form-control is-invalid');
								return false;
							} else {
								validasi('#qty', true);
								$('#qty')
									.parent()
									.find('.input-group-text')
									.removeClass('form-control is-invalid');
								return true;
							}
						}

					});
				</script>
