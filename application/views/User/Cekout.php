	<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-XwNv-ueoMrwrHhgW"></script>

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
				<li>Tentang Kami</li>
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
		<div class="row cart-body">
			<form class="form-horizontal">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
					<input type="hidden" name="id_user" id="id_user" value="<?= $_SESSION['id_user'] ?>">


					<div class="panel panel-info">
						<div class="panel-heading">
							Review Order <div class="pull-right"><small><a class="afix-1" href="<?php echo base_url() . "user/keranjang"; ?>">Edit Cart</a></small></div>
						</div>
						<div class="panel-body">
							<?php
							// var_dump($products);
							$subtotal = 0;
							foreach ($products as $key) {
								$total = $key->harga * $key->qty;

								$subtotal += $total;

							?>
								<div class="form-group">
									<div class="col-sm-3 col-xs-3">
										<!-- <input type="text" class="id_produk" name="idProduk" value="<?= $key->id_produk ?>"> -->
										<?php
										if ($key->foto == null) {
											// die("s");
										?>
											<td><img class="tbFoto" src="<?= $key->link_foto ?>" /> </td>
										<?php } else {
											// die("s");

										?>
											<td><img class="tbFoto" src="<?= base_url() ?>upload/images/produk/<?= $key->foto ?>" /> </td>
										<?php }
										?>

									</div>
									<div class="col-sm-6 col-xs-6">
										<div name="<?= $key->nama_produk ?> " class="col-xs-12"><?= $key->nama_produk ?></div>
										<div class="col-xs-12" name="<?= $key->qty ?>"><small>Quantity:<span><?= $key->qty ?></span></small></div>
									</div>
									<div class="col-sm-3 col-xs-3 text-right" name="<?= $total ?>">
										<h6><span>Rp.</span><?= $total ?></h6>
									</div>
								</div>
							<?php
							}
							?>

							<hr>
							<hr>
							<!-- // shipping -->

							<div class="form-group">
								<div class="col-xs-12">
									<strong>Subtotal</strong>
									<div class="pull-right" id="subtotal" name="<?= $subtotal ?>" data-sub="<?= $subtotal ?>"><span>Rp.</span><span><?= $subtotal ?></span></div>
								</div>
								<div class="col-xs-12">
									<small>Shipping</small>
									<div class="pull-right ongkosKirim"><span></span></div>
								</div>
								<div class="col-xs-12">
									<small>Kurir</small>
									<div class="pull-right Logistik"><span></span></div>
								</div>
								<div class="col-xs-12">
									<small>Potongan Harga</small>
									<div class="pull-right potongan"><span></span></div>
								</div>
							</div>
							<div class="form-group">
								<hr />
							</div>
							<div class="form-group">
								<div class="col-xs-12">
									<strong>Order Total</strong>
									<div class="pull-right OrderTotal" name="<?= $subtotal ?>">
										<span>RP. <?= $subtotal ?></span>
									</div>
								</div>
							</div>

							<!-- // shipping -->
						</div>
					</div>
					<!--REVIEW ORDER END-->
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
					<!--SHIPPING METHOD-->
					<div class="panel panel-info">
						<div class="panel-heading">Alamat </div>
						<div class="panel-body">
							<div class="form-group">
								<div class="col-md-12">
									<h4>Alamat Pengiriman</h4>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12"><strong>Alamat:</strong></div>
								<div class="col-md-12">
									<input type="text" name="alamat" class="form-control" value="" id="alamat" />
								</div>
							</div>
							<div class="">
								<div class="col-md-12"><strong>Provinsi :</strong></div>
								<select class="form-control" id="sel1">
									<option value=""> Pilih Provinsi</option>
								</select>
							</div>
							<div class="col-md-12"><strong>Kota:</strong></div>
							<div class="">
								<select class="form-control" id="sel2" disabled>
									<option value=""> Pilih Kota</option>
								</select>
							</div>
							<div class="form-group">
								<div class="col-md-12"><strong>Kode Pos:</strong></div>
								<div class="col-md-12">
									<input type="text" name="kode_pos" class="form-control" id="kode_pos" value="" />
								</div>
							</div>
							<div class="">
								<select class="form-control" id="kurir" disabled>
									<option value=""> Pilih Kurir</option>
									<option value="jne">JNE</option>
									<option value="tiki">TIKI</option>
									<option value="pos">POS Indonesia</option>
								</select>
							</div>
						</div>
					</div>
					<ul class="nav nav-pills nav-stacked">
						<select class="form-control" id="bank">
							<option value=""> Pilih Pembayaran</option>
							<option value="1">BCA</option>
							<option value="2">BNI</option>
							<option value="3">MANDIRI</option>
							<option value="4">BRI</option>
						</select>
						</li>
					</ul>
					<input type="hidden" id="rajaOngkir" value="">
					<input type="hidden" id="Potongan" value="">
					<input type="hidden" id="totalSementara" value="">
					<br />

					<div class="">
						<div class="panel panel-info">
							<div class="panel-heading">Kode Voucher</div>
							<div class="panel-body">
								<div class="form-group">
									<div class="col-md-12">
										<h4>Masukan Kode Voucher</h4>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<input type="text" name="kode_voucher" class="form-control" value="" id="kode_voucher" />
									</div>
								</div>
						<button href="" id="btnKodeVocher" type="button" class="btn btn-success btn-lg btn-block" role="button">Cek</button>
							</div>
						</div>
					</div>

					<br />


					<button href="" id="btnSubmit" type="button" class="btn btn-success btn-lg btn-block" role="button">Pay</button>
					<!--SHIPPING METHOD END-->

				</div>

			

			</form>
		</div>
		<div id="hasil"></div>
		<div class="row cart-footer">

		</div>
	</div>
	<hr>
	<script type="text/javascript">

	$('#btnKodeVocher').click(function (e) { 
		
		var kode_voucher = $('#kode_voucher').val();
		$.ajax({
			type: "POST",
			url: "<?= base_url()?>/User/kode_voucher",
			data: {
				kode_voucher	
			},
			dataType: "json",
			success: function (e) {
				if(e.status){
					Swal.fire(
						'Kode Voucher Terpasang',
						e.pesan,
						'success'
					)
					var p = e.data.harga; 	
					$("#kode_voucher").attr("disabled", true);					
					$("#btnKodeVocher").hide();	
					// $('.potongan').val(e.data.harga)
					$('.potongan').html("Rp."+ e.data.harga)
					var totalSe = $('#totalSementara').val()
					OrderTotal.html("Rp." + (totalSe - p));				
				}else{
					Swal.fire(
						'Maaf...!',
						e.pesan,
						'error'
					)
				}

				
			}
		});

		

	});
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
			var kode_v = $('#kode_voucher').val();
			var potongan = $('#Potongan').val();
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
				// url: '<?= site_url() ?>/snap/token',
				type: 'POST',
				dataType: 'json',
				url: "<?= $bu; ?>Cart/setPayment",
				data: {
					total: total,
					ongkir: ongkir,
					id_user: id_user,
					subTot: subTot,
					alamat: alamat,
					provinsi: provinsi,
					kota: kota,
					kode_pos: kode_pos,
					kurir: kurir,
					bank: bank,
					kode_v: kode_v,
					potongan: potongan,
				},
				cache: false,
				success: function(d) {
					if (d.status) {
						var id = d.id_transaksi;
						Swal.fire(
							'Good job!',
							d.msg,
							'success'
						)
						setTimeout(() => {
							window.location.href = "<?= $bu ?>user/pembayaran/"+id;							
						}, 2000);

					} else {
						Swal.fire(
							'Maaf...!',
							d.msg,
							'error'
						)
					}

				},
				error: function(data) {
					console.log(data)
					alert("Status: " + data);
				}

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
			var $potongan = $(".potongan");
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
				var potongan = $("#Potongan").val()
				x += "<p class='mb-0'><b>(" + kurir + " )</b> : " + nama_kurir + "</p>";
				x += tarif + "<br>";
				$tarif.html("Rp." + tarif);
				$potongan.html("Rp." + potongan);
				$kurir.html(nama_kurir);
				OrderTotal.html("Rp." + (tarif + subtotal));
				$("#rajaOngkir").val("Rp." + tarif);
				console.log(tarif, subtotal, tarif)
				$('#totalSementara').val(subtotal+tarif)

			}).fail(function(data) {
				console.log(data);
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
