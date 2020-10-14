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
								<div class="card-header">Produk
									<div class="btn-actions-pane-right">
									</div>
								</div>

								<div class="row">
									<div class="col sm-6 ml-3 pb-1 pt-1">
										<button type="button" class="btn btn-primary btn_tambah" data-toggle="modal" data-target=".bs-example-modal-lg">Tambah</button>

									</div>

								</div>
								<div class="table-responsive">
									<table id="datatable_produk" class="table table-striped table-bordered" style="width:100%">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama</th>
												<th>Kategori</th>
												<th>Harga</th>
												<th>QTY</th>
												<th>Status</th>
												<th>Deskripsi</th>
												<th>Foto</th>
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
				<div class="modal fade bs-example-modal-lg" id="modal-detail" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<form id="form">
							<div class="modal-content">
								<div class="modal-header">
									<input type="text" id="id_produk" name="id_produk" hidden>
									<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
									</button>
								</div>
								<div class="modal-body">
									<h4>Detail Produk</h4>
									<?php echo validation_errors(); ?>

									<div class="row">
										<div class="col-md-12 col-sm-12 ">
											<div class="x_panel">

												<div class="x_content">
													<br />
													<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
														<div class="item form-group">
															<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> Nama Produk <span class="required">*</span>
															</label>
															<div class="admincol-md-12  col-sm-12 ">
																<input id="nama" name="nama" class="form-control " placeholder="Isikan Nama" type="text" class="form-control">

															</div>
														</div>
														<div class="item form-group">
															<label class="col-form-label col-md-12 col-sm-12 label-align" for="last-name">Kategori <span class="required">*</span>
															</label>
															<?php echo form_error('kategori'); ?>
															<div class="col-sm-12">
																<select class="form-control select col-md-12 col-sm-12" name="kategori" id="kategori">
																	<option value=0 desable>Pilih Kategori</option>
																	<?php
																	foreach ($listKategori as $r) {
																		echo '
																		<option value="' . $r->id_kategori . '">' . $r->nama_kategori . '</option>
																			';
																	}
																	?>
																</select>
															</div>

															<div class="item form-group">
																<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Harga<span class="required">*</span>
																</label>
																<div class="admincol-md-12  col-sm-12 ">
																	<input id="harga" name="harga" class="form-control " placeholder="Isikan Harga" type="text" class="form-control">

																</div>
															</div>
															<div class="item form-group">
																<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">QTY <span class="required">*</span>
																</label>
																<div class="admincol-md-12  col-sm-12 ">
																	<input id="qty" name="qty" class="form-control " placeholder="Isikan QTY" type="text" class="form-control">

																</div>
															</div>

															<div class="item form-group">
																<label class="col-form-label col-md-12 col-sm-12 label-align" for="last-name">Status <span class="required">*</span>
																</label>
																<div class="col-sm-12">
																	<select class="form-control select col-md-12 col-sm-12 " id="status" name="status">
																		<option value=1>Aktiv</option>
																		<option value=0>Draft</option>
																	</select>
																</div>
															</div>


															<div class="item form-group">
																<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Deskripsi <span class="required">*</span>
																</label>
																<div class="admincol-md-12  col-sm-12 ">
																	<input id="deskripsi" name="deskripsi" class="form-control " placeholder="Isikan deskripsi" type="text" class="form-control">

																</div>
															</div>

															<div class="item form-group">
																<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Foto <span class="required">*</span>
																</label>
																<div class="admincol-md-12  col-sm-12 ">
																	<img style="width: 100px; display: block;" src="<?php echo base_url() . "upload/"; ?>images/" id="image" alt="image">
																	<div id="foto_wrappers" class="mb-2">

																		<div class="col-xs-12">
																			<label for="photo">Photo Profile</label>
																			<input type="file" accept="image/x-png,image/gif,image/jpeg,image/jpg;" name="foto" id="foto">
																		</div>
																	</div>
																</div>
															</div>

															<div class="ln_solid"></div>
															<div class="item form-group">
															</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary" id="Edit">Save changes</button>

									<button type="button" class="btn btn-success" id="tambah_act">Tambah</button>
								</div>
							</div>
						</form>

					</div>
				</div>
				<!-- modal akhir  -->

				<script type="text/javascript">
					document.addEventListener("DOMContentLoaded", function(event) {




						$("body").children().first().before($(".modal"));

						var bu = '<?= base_url(); ?>';
						var url_form_tambah = bu + 'admin/tambah_produk_proses';
						var url_form_ubah = bu + 'admin/ubah_produk_proses';

						$('body').on('click', '.btn_tambah', function() {
							url_form = url_form_tambah;
							console.log(url_form);
							$('#Edit').hide();
						});

						$('#tambah_act').on('click', function() {
							var nama = $('#nama').val();
							var kategori = $('#kategori').val();
							var harga = $('#harga').val();
							var qty = $('#qty').val();
							var status = $('#status').val();
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
									$('#modal-detail').modal('hide');
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


						var datatable = $('#datatable_produk').DataTable({
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
								}, {
									"targets": 4,
									"className": "dt-head-center"
								}, {
									"targets": 5,
									"className": "dt-head-center"
								}, {
									"targets": 6,
									"className": "dt-head-center"
								}, {
									"targets": 7,
									"className": "dt-head-center"
								}, {
									"targets": 8,
									"className": "dt-head-center"
								},
							],
							"order": [
								[1, "desc"]
							],
							'ajax': {
								url: bu + 'Admin/getAllProduk',
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
							var id_produk = $(this).data('id_produk');
							var nama_produk = $(this).data('nama_produk');

							var id_kategori = $(this).data('id_kategori');
							var harga = $(this).data('harga');
							var qty = $(this).data('qty');
							var status_produk = $(this).data('status_produk');
							var deskripsi = $(this).data('deskripsi');
							var foto = $(this).data('foto');
							console.log(id_kategori, status_produk, foto);
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





					});
				</script>
