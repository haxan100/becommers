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
															<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Review
																Your Order</a>
														</h4>
													</div>
													<div id="collapseOne" class="panel-collapse collapse in">
														<div class="panel-body">
															<div class="items">
																<div class="">
																</div>
																<div class="">
																	<div style="text-align: center;">
																		<h3>Silahkan transfer sejumlah</h3>
																	</div>

																	<div style="text-align: center;">
																		<h3>Order Total</h3>
																		<h3><span style="color:green;">
																				<?= $transaksi->jumlah ?></span></h3>
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
				<!--REVIEW ORDER END-->
			</div>




		</div>
		<div id="hasil"></div>
		<div class="row cart-footer">

		</div>
	</div>
	<hr>
	<script type="text/javascript">
		$('#btnSubmit').on('click', function() {
			var subTot = $('#subtotal').data('sub');
			var alamat = $('#alamat').val();
			var provinsi = $('#sel1').find(':selected').data('prov');
			var kota = $('#sel2').find(':selected').data('kota');
			var kode_pos = $('#kode_pos').val();
			var kurir = $('#kurir').val();
			var bank = $('#bank').val();
			var total = subTot;
			var ongkir = $('#rajaOngkir').val();
			var id_user = $('#id_user').val();

			// console.log(subTot)
			// return false;
			if (kurir == "") {
				// alert("Kurir harus di Pilih!")
				Swal.fire(
					'error',
					'Kurir harus di Pilih!',
					'error'
				);
				return false;
			}
			if (bank == "") {
				Swal.fire(
					'error',
					'Bank Hrus Di Pilih',
					'error'
				);
				return false;
			}

			$.ajax({
				type: "POST",
				dataType: 'json',
				url: "<?= $bu; ?>Cart/setPayment",
				data: {
					alamat: alamat,
					provinsi: provinsi,
					kota: kota,
					kurir: kurir,
					bank: bank,
					total: total,
					ongkir: ongkir,
					id_user: id_user,
					kode_pos: kode_pos,
				},
			}).done(function(data) {
				if (data.status) {
					Swal.fire(
						'succes',
						'oke!',
						'succes'
					);
					location.href = "<?= $bu; ?>User/pembayaran";

				}

				console.log(data)
				Swal.fire(
					'error',
					data.msg,
					'error'
				);
				// console.log(data);
				// return false;

			});

		});

		var bu_user = '<?= $bu_user ?>';
		var bu = '<?= base_url(); ?>';
		var subtotal = $('#subtotal').data('sub');

		var OrderTotal = $(".OrderTotal");
		// console.log(subtotal);
		OrderTotal.html(subtotal);

		function getSpekFromPortal(id = '') {
			var $op = $("#sel1"),
				$op1 = $("#sel11");
			$.ajax({
				url: bu + 'User/provinsi',
				method: 'post',
				dataType: 'json',
			}).done(function(data) {
				// console.log(data);
				$.each(data, function(i, field) {

					$op.append('<option value="' + field.province_id + ' " data-prov="' + field.province + '" >' + field.province + '</option>');

					$op1.append('<option value="' + field.province_id + ' >' + field.province + '</option>');

				});
			}).fail(function(data) {
				// console.log(data);
			});
		}
		getSpekFromPortal();

		$("#sel1").on("change", function(e) {
			e.preventDefault();
			var option = $('option:selected', this).val();
			$('#sel2 option:gt(0)').remove();
			$('#kurir').val('');

			if (option === '') {
				alert('null');
				$("#sel2").prop("disabled", true);
				// $("#kurir").prop("disabled", true);
			} else {
				$("#sel2").prop("disabled", false);
				getKota(option);
			}
		});

		$("#sel2").on("change", function(e) {
			e.preventDefault();
			var option = $('option:selected', this).val();
			$('#kurir').val('');

			if (option === '') {
				alert('null');
				$("#kurir").prop("disabled", true);
			} else {
				$("#kurir").prop("disabled", false);
			}
		});
		$("#kurir").on("change", function(e) {
			// console.log("w")
			e.preventDefault();
			var option = $('option:selected', this).val();
			var origin = $("#sel2").val();
			var des = $("#sel22").val();
			var qty = $("#berat").val();
			// console.log(des, option, origin, qty)

			if (qty === '0' || qty === '') {
				alert('null');
			} else if (option === '') {
				alert('null');
			} else {
				getOrigin(origin, des, qty, option);
			}
		});

		function getOrigin(origin, des, qty, cour) {
			var $tarif = $(".ongkosKirim");
			var $kurir = $(".Logistik");
			// console.log(origin, des, qty, OrderTotal);
			var i, j, x = "";
			$.ajax({
				url: bu + 'User/tarif/',
				type: 'POST',
				dataType: 'json',
				data: {
					origin: origin,
					cour: cour,
				},
			}).done(function(data) {
				// console.log(data)
				var kurir = data[0].code;
				var nama_kurir = data[0].name;
				var tarif = data[0].costs[0].cost[0].value;
				x += "<p class='mb-0'><b>(" + kurir + " )</b> : " + nama_kurir + "</p>";
				x += tarif + "<br>";
				$tarif.html(tarif);
				$kurir.html(nama_kurir);
				OrderTotal.html(tarif + subtotal);
				$("#rajaOngkir").val(tarif);

			}).fail(function(data) {
				// console.log(data);
			});
		}

		function getKota(idpro) {
			var $op = $("#sel2");
			$.ajax({
				url: bu + 'User/kota/' + idpro,
				method: 'post',
				dataType: 'json',
			}).done(function(data) {
				// console.log(data);
				$.each(data, function(i, field) {

					$op.append('<option  data-kota="' + field.city_name + ' " value="' + field.city_id + '">' + field.type + ' ' + field.city_name + '</option>');

				});
			}).fail(function(data) {
				// console.log(data);
			});
		}
	</script>
