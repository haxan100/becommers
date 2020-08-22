				<div class="app-main__inner">


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
									<table id="datatable_kategori" class="table table-striped table-bordered" style="width:100%">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Kategori</th>
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
									<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
									</button>
								</div>

								<div class="modal-body">
									<h4>Detail Kategori</h4>

									<div class="row">

										<div class="col-md-12 col-sm-12 ">

											<div class="x_panel">

												<div class="x_content">
													<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
														<div class="item form-group">
															<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> Nama <span class="required">*</span>
															</label>
															<div class="col-md-12 col-sm-12 ">
																<input id="nama" name="nama" class="form-control " placeholder="Isikan Nama" type="text" class="form-control">

															</div>
														</div>
														<div class="ln_solid"></div>
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
						var url_form_tambah = bu + 'produk/tambah_kategori_proses';
						var url_form_ubah = bu + 'produk/ubah_kategori_proses';

						$('body').on('click', '.btn_tambah', function() {
							url_form = url_form_tambah;
							console.log(url_form);
							$('#Edit').hide();



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
								console.log(e);
								if (e.status) {
									// notifikasi('#alertNotif', e.message, false);
									Swal.fire(
										':)',
										e.message,
										'success'
									);


									// $('.bs-example-modal-lg').hide();
									// $("#modal-detail").modal({
									// 	backdrop: "false"
									// });
									$('#modal-detail').modal('hide');
									$('.modal-backdrop').hide();
									// $("body").children().first().before($(".modal"));

									// setTimeout(function() {
									// 	location.reload();
									// }, 4000);
									datatable.ajax.reload();
									// window.location.reload();
									// resetForm();
								} else {
									Swal.fire({
										icon: 'error',
										title: 'Oops...',
										text: 'terjadi kesalahan!',

									})
								}
							}).fail(function(e) {
								notifikasi('#alertNotif', 'Terjadi kesalahan!', true);
							});
							return false;
						});

						var datatable = $('#datatable_kategori').DataTable({
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
								}
							],
							"order": [
								[1, "desc"]
							],
							'ajax': {
								url: bu + 'produk/getAllKategori',
								type: 'POST',
								"data": function(d) {
									return d;
								}
							},

							buttons: [{
								text: "Excel",
								extend: "excelHtml5",
								className: "btn btn-round btn-info",

								title: 'Data Siswa',
								exportOptions: {
									columns: [1, 2]
								}
							}, {
								text: "PDF",
								extend: "pdfHtml5",
								className: "<br>btn btn-round btn-danger",
								title: 'Data Siswa',
								exportOptions: {
									columns: [1, 2]
								}
							}],
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
							// console.log(url_form);
							var id_kategori = $(this).data('id_kategori');
							var nama_kategori = $(this).data('nama_kategori');

							$('#tambah_act').hide();
							$('#nama_kategori').val(nama_kategori);
							$('#Edit').show();
						});

						$('#Edit').on('click', function() {

							var id_kategori = $('#id_kategori').val();
							var nama_kategori = $('#nama_kategori').val();
							if (
								nama_kategori
							) {
								$("#form").submit();
							}
							// return false;
						});




					});
				</script>
