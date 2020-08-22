				<div class="app-main__inner">


					<div class="row">
						<div class="col-md-12">
							<div class="main-card mb-3 card">
								<div class="card-header">Produk
									<div class="btn-actions-pane-right">

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

				<script type="text/javascript">
					document.addEventListener("DOMContentLoaded", function(event) {

						var bu = '<?= base_url(); ?>';
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
								url: bu + 'produk/getAllProduk',
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




					});
				</script>
