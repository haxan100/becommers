	<!-- banner -->

	<div class="banner banner10">
		<div class="container">
			<h2>Keranjang Saya</h2>
		</div>
	</div>
	<?php
	$ongkir = 15000;
	$bu = base_url();
	$bu_user = $bu . 'user/';
	$id_user = "null";
	if (isset($_SESSION['id_user'])) {
		$id_user = $_SESSION['id_user'];
	}

	?>
	<style>
		img {
			max-width: 100px;
		}

		.dataTables_filter,
		.dataTables_paginate {
			display: none;
		}

		.formInput {
			display: table-caption;
			max-width: 35%;
			height: 33px;
			padding: 6px 12px;
			font-size: 14px;
			line-height: 1.42857143;
			color: #555;
			background-color: #fff;
			background-image: none;
			border: 1px solid #ccc;
			border-radius: 4px;
			-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
			box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
			-webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
			-o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
			transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
		}


		@media only screen and (max-width: 600px) {
			img {
				max-width: 50px;
			}

			table {
				border-collapse: collapse;
				border-spacing: 0;
				width: 100%;
				border: 1px solid #ddd;
			}

			th,
			td {
				text-align: left;
				padding: 8px;
			}

			/* .tbFoto {
				display: none !important;
			} */

		}
	</style>
	<!-- //banner -->
	<!-- breadcrumbs -->
	<div class="breadcrumb_dress">
		<div class="container mb-7">
			<ul>
				<li><a href="<?php echo base_url() . "templates/user/"; ?>index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>Keranjang Saya</li>
			</ul>
		</div>
	</div>
	<!-- //breadcrumbs -->
	<!-- about -->
	<?php
	if (empty($products)) {
	?>
		<h1 class="jumbotron-heading text-center">Tidak Ada Produk Di Keranjang</h1>
	<?php
	} else { ?>
		<div class="container  mt-4 mb-7">
			<div class="row">
				<div class="col mb-10">
					<div class="table-responsive-sm" style=" overflow-x: auto; ">
						<table class="table table-striped mt-4 table-responsive-sm" id="keranjang">
							<thead>

								<tr>
									<th> No</th>
									<th class="tbFoto">Foto </th>
									<th>Nama Produk</th>
									<th>Quantity</th>
									<th>Harga</th>
									<th>Harga Total</th>
									<th> </th>
								</tr>
							</thead>
							<tbody>
								<?php
								$subtotal = 0;
								foreach ($products as $k) {
									$total = $k->harga * $k->qty;
									$subtotal += $total;
								?>

									<tr>
										<td><img class="tbFoto" src="<?= base_url() ?>upload/images/produk/<?= $k->foto ?>" /> </td>
										<td> <?= $k->nama_produk ?></td>

										<td><button class="btn btn-primary" type="button">-</button>

											<input class="formInput" type="text" value="<?= $k->qty ?>" />

											<button class="btn btn-primary" type="button">+</button>
										</td>


										<td class="text-right">
											<?= $k->harga ?>
										</td>

										<td class="text-right"><?= $total ?></td>
										<td class="text-right"><button class="btn btn-sm btn-danger btnHapus"><i class="fa fa-trash"></i> </button> </td>
									</tr>

								<?php
								}
								?>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>Sub-Total</td>
								<td class="text-right"><?= $subtotal; ?></td>
								</tr>
								<tr>
							</tbody>
							<tfoot>
								<tr>
									<th colspan="6" style="text-align:right">Totalnya</th>
									<th></th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
				<div class="col mb-2">
					<div class="row">
						<div class="col-sm-12  col-md-6">

							<!-- <button class="btn btn-block btn-light" href="<?php echo base_url() . "user/"; ?>">Continue Shopping</button> -->

							<a type="button" class="btn btn-block btn-primary text-uppercase" href="<?php echo base_url() ?>user/produk/">Lanjutkan Belanja</a>

						</div>
						<div class="col-sm-12 col-md-6 text-right">
							<!-- <button class="btn btn-lg btn-block btn-success text-uppercase">Checkout</button> -->

							<a type="button" class="btn btn-block  btn-success  text-uppercase" href="<?php echo base_url() ?>user/cekout/">Checkout</a>
						</div>
					<?php } ?>
					</div>
				</div>
			</div>
		</div>




		<div class="clearfix"> </div>
		</div>
		</div>

		<script type="text/javascript">
			document.addEventListener("DOMContentLoaded", function(event) {
				var bu_user = '<?= $bu_user ?>';
				var bu = '<?= base_url(); ?>';


				var datatable = $('#keranjang').DataTable({
					// dom: "Bfrltip",
					// // 'pageLength': 10,
					"lengthChange": false,
					// "responsive": true,
					// "processing": true,
					// "bProcessing": true,
					"autoWidth": true,
					// "serverSide": true,
					// "ordering": false,
					// "info": false,
					// "deferRender": false,
					// data: dataSet,
					// pageLength: 100,
					// "deferRender": false,
					"footerCallback": function(tfoot, data, start, end, display) {

						var intVal = function(i) {

							return typeof i === 'string' ?
								i.replace(/[\$,]/g, '') * 1 :
								typeof i === 'number' ?
								i : 0;
						};

						var api = this.api();
						// console.log(api.column(5).data());
						var p = api.column(5).data().reduce(function(a, b) {
							return intVal(a) + intVal(b);
						}, 0)
						$(api.column(3).footer()).html("<b>Total</b> : ");
						$(api.column(6).footer()).html("Rp." + formatUang(p));
					},

					"columnDefs": [{
							"targets": 0,
							"className": "dt-body-center dt-head-center",
							// "width": "10px",
							"orderable": false
						},
						{
							"targets": 1,
							"className": "dt-head-center tbFoto"
						},
						{
							"targets": 2,
							"className": "dt-head-center"
						},
						{
							"targets": 3,
							"className": "dt-head-center InputTeks"
						},
						{
							"targets": 4,
							"className": "dt-head-center"
						},
						{
							"targets": 5,
							"className": "dt-head-center"
						},
						{
							"targets": 6,
							"className": "dt-head-center"
						}
					],

					"order": [
						[1, "desc"]
					],
					'ajax': {
						url: bu + 'Cart/getAllCartByUser',
						type: 'POST',
						"data": function(d) {
							return d;
						}
					},

				});

				jQuery('body').on('keyup', '.TexMasuk', function() {
					var qty = $(this).val();
					var id = $(this).data('id_keranjang');
					if (qty <= 0) {
						Swal.fire(
							'error',
							'Input Tidak Boleh Kurang Dari 1',
							'error'
						);
						$(this).val(1);

					}
					// console.log($(this).val(), $(this).data('id_keranjang'))

					$.ajax({
						type: "POST",
						dataType: 'json',
						url: "<?= $bu; ?>Cart/updateCartByQTY",
						data: {
							id_keranjang: id,
							qty: qty,
						},
					}).done(function(e) {
						if (e.status) {
							datatable.ajax.reload();
							loadCart()
							console.log("s")

						} else {

							Swal.fire(
								'error',
								e.msg,
								'error'
							);
						}
					});

				});

				$('body').on('click', '.btnMinus', function() {
					var id_keranjang = $(this).data('id_keranjang');
					var qty = 1;
					var stat = 0;
					// console.log(harga)
					$('.btn-tawar').html('<i class="fas fa-spinner fa-spin"></i>');
					$('.btn-tawar').prop('disabled', true);
					$.ajax({
						type: "POST",
						dataType: 'json',
						url: "<?= $bu; ?>Cart/updateQtyCart",
						data: {
							id_keranjang: id_keranjang,
							stat: stat,
							qty: qty,
						},
					}).done(function(e) {
						if (e.status) {
							datatable.ajax.reload();
							loadCart()
						} else {

							Swal.fire(
								'error',
								e.msg,
								'error'
							);
						}
					});
				});
				$('body').on('click', '.btnPlus', function() {
					var id_keranjang = $(this).data('id_keranjang');
					var qty = 1;
					var stat = 1;
					// console.log(harga)
					$('.btn-tawar').html('<i class="fas fa-spinner fa-spin"></i>');
					$('.btn-tawar').prop('disabled', true);
					$.ajax({
						type: "POST",
						dataType: 'json',
						url: "<?= $bu; ?>Cart/updateQtyCart",
						data: {
							id_keranjang: id_keranjang,
							stat: stat,
							qty: qty,
						},
					}).done(function(e) {
						if (e.status) {
							datatable.ajax.reload();

							loadCart()
						} else {

							Swal.fire(
								'error',
								e.msg,
								'error'
							);
						}
					});
				});

				$('body').on('click', '.btnHapus', function() {
					var id_keranjang = $(this).data('id_keranjang');
					Swal.fire({
						title: 'Apakah Anda Yakin ?',
						text: "Anda akan Menghapus item dari keranjang ? ",
						icon: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'Yes, delete it!'
					}).then((result) => {
						if (result.value) {
							$.ajax({
								type: "POST",
								dataType: 'json',
								url: "<?= $bu; ?>Cart/hapusQtyCart",
								data: {
									id_keranjang: id_keranjang
								}
							}).done(function(e) {
								// console.log(e);
								Swal.fire(
									'Deleted!',
									e.message,
									'success'
								)
								datatable.ajax.reload();
								loadCart()

							}).fail(function(e) {
								console.log('gagal');
								console.log(e);
								var message = 'Terjadi Kesalahan. #JSMP01';
							});




						}
					})




				});
				loadCart()

				function loadCart() {
					var id_user = '<?= $id_user ?>'
					$.ajax({
						type: "POST",
						dataType: 'json',
						url: "<?= $bu; ?>User/getCartById",
						data: {
							id_user: id_user
						},
					}).done(function(e) {
						console.log(e);
						if (e.status) {
							$('.keranjing').html(e.data);
						} else {
							$('.keranjing').html(0);

						}
					}).fail(function(e) {
						console.log(e);
					});
				}



				function formatUang(str) {
					// console.log(str);
					var rp = str.toString()
						.replace(/\D/g, "")
						.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
					// return 'Rp. ' + rp;
					if (str < 0) rp += ' (rugi)';
					return rp;
				}







			});
		</script>

		<!-- //newsletter -->
