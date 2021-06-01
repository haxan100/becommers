<div class="breadcrumb_dress" style="
    margin-bottom: 30px;
">
	<style>
		img {

			max-width: 100px;
			max-height: 100px;


		}

		.panel-body {
			padding: 2em 2em 23px 2em !important;
		}

		/* Container */
		/* Preview */
		.preview {
			width: 100px;
			height: 100px;
			border: 1px solid black;
			margin: 0 auto;
			background: white;
		}

		.preview img {
			display: none;
		}

		/* Button */
		.button {
			border: 0px;
			background-color: deepskyblue;
			color: white;
			padding: 5px 15px;
			margin-left: 10px;
		}
	</style>
	<div class="container mb">
		<ul>
			<?php
			$ongkir = 15000;
			$bu = base_url();
			$bu_user = $bu . 'user/';
			// var_dump($_SESSION['id_user']);
			?>
			<li><a href="http://localhost/becommers/templates/user/index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
			<li>Pembayaran</li>
		</ul>
	</div>
</div>
<div class="container wrapper">

	<div class="row cart-head">
		<div class="container">
			<div class="row">
				<p></p>
			</div>
			<div class="row">
				<p></p>
			</div>
		</div>
	</div>
	<div class="row ">

		<div class="">
			<input type="hidden" name="id_user" id="id_user" value="<?= $_SESSION['id_user'] ?>">


			<div class="panel panel-info">
				<div class="panel-heading text-center">
					Pembayaran
				</div>
				<!------ Include the above in your HEAD tag ---------->

				<div class='container'>
					<div class='row' style='padding-top:25px; padding-bottom:25px;'>
						<div class='col-md-12'>
							<div id='mainContentWrapper'>
								<div class="col-md-8 col-md-offset-2">
									<h2 style="text-align: center;">
										Review Your Order & Complete Checkout
									</h2>
									<hr />
									<div class="shopping_cart">
										<form class="form-horizontal" role="form" action="" method="post" id="payment-form">
											<div class="panel-group" id="accordion">
												<div class="panel panel-default">
													<div class="panel-heading">
														<h4 class="panel-title">
															<a data-toggle="collapse" data-parent="#accordion" href="#collapseZero">Review Produk Anda</a>
														</h4>
													</div>
													<div id="collapseZero" class="panel-collapse collapse in">
														<div class="panel-body">


															<div class="card-body pt-0">
																<?php
																foreach ($detailProduk as $key => $v) {

																?>

																	<div class="row justify-content-between">
																		<div class="col-auto col-md-7">
																			<div class="media flex-column flex-sm-row"> <img class=" img-fluid" src="https://i.imgur.com/6oHix28.jpg" width="62" height="62">

																				<div class="media-body my-auto">
																					<div class="row ">
																						<div class="col-auto">
																							<p class="mb-0"><b><?= $v->nama_produk ?></b></p>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class=" pl-0 flex-sm-col col-auto my-auto">
																			<p class="boxed-1"><?= $v->qty ?></p>
																		</div>
																		<div class=" pl-0 flex-sm-col col-auto my-auto ">
																			<p><b>179 SEK</b></p>
																		</div>
																	</div>
																<?php } ?>


															</div>




														</div>
													</div>

												</div>
											</div>
											<div class="panel panel-default">
												<div class="panel-heading">
													<h4 class="panel-title">

													</h4>
												</div>
											</div>
											<div class="panel panel-default">
												<div class="panel-heading">
													<h4 class="panel-title">
														<div style="text-align: center;"><a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class=" btn   btn-success" id="payInfo" style="width:100%;display: none;" onclick="$(this).fadeOut();  
                   document.getElementById('collapseThree').scrollIntoView()">Enter Payment Information »</a>
														</div>
													</h4>
												</div>
											</div>
											<div class="panel panel-default">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
															<b>Informasi Pembayaran</b>
														</a>
													</h4>
												</div>
												<div id="collapseThree" class="panel-collapse collapse">
													<div class="row">
														<div class="col">
															<table class="table table-light">
																<tbody>
																	<tr>
																		<td>Bank</td>
																		<td>: BCA</td>
																	</tr>
																	<tr>
																		<td>No Rek</td>
																		<td>: 5660448961</td>
																	</tr>
																	<tr>
																		<td>Nama</td>
																		<td>: ENB MOBILE CARE PT</td>
																	</tr>
																	<tr>
																		<td>Jumlah</td>
																		<td>: Rp. <?= $uang ?></td>
																	</tr>
																	<tr>
																		<td>Cabang</td>
																		<td>: BCA Panglima Polim</td>
																	</tr>
																	<tr>
																		<td>Whatsap</td>
																		<td>: Admin 089602350857</td>
																	</tr>
																</tbody>
															</table>

														</div>

													</div>


												</div>
											</div>
									</div>
								</div>
								</form>
							</div>
						</div>
					</div>




				</div>

				<div class='container'>
					<div class='row' style='padding-top:25px; padding-bottom:25px;'>
						<div class='col-md-12'>
							<div id='mainContentWrapper'>
								<div class="col-md-8 col-md-offset-2">
									<hr />
									<div class="shopping_cart">
										<div class="panel-group" id="accordion">
											<div class="panel panel-default">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Review
															Your Order</a>
													</h4>
												</div>
												<div id="collapseOne" class="panel-collapse collapse in">
													<div class="panel-body">
														<div class="items">
															<div class="">
																<div class="">
																	<div style="text-align: center;">
																		<h3>Kode Transaksi</h3>
																	</div>
																	<div style="text-align: center;">
																		<h3><?= $transaksi->kode_transaksi ?></h3>
																	</div>
																</div>
															</div>
															<hr>
															<div class="">
																<div style="text-align: center;">
																	<h3>Silahkan transfer sejumlah</h3>
																</div>

																<div style="text-align: center;">
																	<h3>Order Total</h3>
																	<h3><span style="color:green;">Rp.
																			<?= $uang ?></span></h3>
																</div>
															</div>
														</div>
													</div>
												</div>

											</div>
										</div>
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title">

												</h4>
											</div>
										</div>
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title">
													<div style="text-align: center;"><a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class=" btn   btn-success" id="payInfo" style="width:100%;display: none;" onclick="$(this).fadeOut();  
      											             document.getElementById('collapseThree').scrollIntoView()">Enter Payment Information »</a>
													</div>
												</h4>
											</div>
										</div>
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
														<b>Upload Bukti</b>
													</a>
												</h4>
											</div>
											<div id="collapseFour" class="panel-collapse collapse">
												<div class="row">
													<div class="col">
														<div class="container">

															<form method="post" action="uploasssd.php" enctype="multipart/form-data" id="myform">
																<div class='preview'>
																	<img src="" id="img" width="100" height="100">
																</div>
																<div>
																	<input class="form-control" type="hidden" name="id_transaksi" id="id_transaksi" value="<?= $transaksi->id_transaksi ?>">

																	<input type="file" id="file" name="file" />
																	<input type="button" class="button" value="Upload" id="but_upload">
																</div>
															</form>
														</div>

													</div>

												</div>


											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>




				</div>
				<!--REVIEW ORDER END-->
			</div>




		</div>
		<div id="hasil"></div>
		<div class="row cart-footer">

		</div>
	</div>
	<hr>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#but_upload").click(function() {
				var fd = new FormData();
				var files = $('#file')[0].files;
				var id_trans = $('#id_transaksi').val();
				Swal.fire({
					title: 'Apakah Anda Yakin ?',
					text: "Bukti Transfer Akan Di Kirim!",
					icon: 'warning',
					type: 'info',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes, Kirim!'
				}).then((result) => {
					if (result) {
						if (files.length > 0) {
							fd.append('file', files[0]);
							var id_transaksi = id_trans;
							fd.append('id_transaksi', id_transaksi);
							$.ajax({
								url: '<?= base_url() ?>/User/uploadBukti',
								type: 'post',
								data: fd,
								contentType: false,
								processData: false,
								success: function(response) {
									console.log(response)

									if (response != 0) {
										
									} else {
										alert('file not uploaded');
									}
								},

							}).done(function(e) {
								Swal.fire({
									type: 'success',
									title: "Foto Bukti Sudah Di Upload, Muhon Tunggu Sesaat...",
									showConfirmButton: false,
									timer: 1500
								});
							}).fail(function(e) {
								console.log(e);
							});

						} else {
							Swal.fire({
								type: 'error',
								title: "Foto Bukti Harus Di Upload!",
								showConfirmButton: false,
								timer: 1500
							});
						}
					}
				});
			})
		});
	</script>
