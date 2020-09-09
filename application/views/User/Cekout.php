<div class="breadcrumb_dress" style="
    margin-bottom: 30px;
">
	<div class="container mb">
		<ul>
			<?php
			$ongkir = 15000;
			$bu = base_url();
			$bu_user = $bu . 'user/';
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
		<form class="form-horizontal" method="post" action="">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
				<!--REVIEW ORDER-->
				<div class="panel panel-info">
					<div class="panel-heading">
						Review Order <div class="pull-right"><small><a class="afix-1" href="#">Edit Cart</a></small></div>
					</div>
					<div class="panel-body">
						<div class="form-group">
							<div class="col-sm-3 col-xs-3">
								<img class="img-responsive" src="//c1.staticflickr.com/1/466/19681864394_c332ae87df_t.jpg" />
							</div>
							<div class="col-sm-6 col-xs-6">
								<div class="col-xs-12">Product name</div>
								<div class="col-xs-12"><small>Quantity:<span>1</span></small></div>
							</div>
							<div class="col-sm-3 col-xs-3 text-right">
								<h6><span>$</span>25.00</h6>
							</div>
						</div>
						<div class="form-group">
							<hr />
						</div>
						<div class="form-group">
							<div class="col-sm-3 col-xs-3">
								<img class="img-responsive" src="//c1.staticflickr.com/1/466/19681864394_c332ae87df_t.jpg" />
							</div>
							<div class="col-sm-6 col-xs-6">
								<div class="col-xs-12">Product name</div>
								<div class="col-xs-12"><small>Quantity:<span>1</span></small></div>
							</div>
							<div class="col-sm-3 col-xs-3 text-right">
								<h6><span>$</span>25.00</h6>
							</div>
						</div>
						<div class="form-group">
							<hr />
						</div>
						<div class="form-group">
							<div class="col-sm-3 col-xs-3">
								<img class="img-responsive" src="//c1.staticflickr.com/1/466/19681864394_c332ae87df_t.jpg" />
							</div>
							<div class="col-sm-6 col-xs-6">
								<div class="col-xs-12">Product name</div>
								<div class="col-xs-12"><small>Quantity:<span>2</span></small></div>
							</div>
							<div class="col-sm-3 col-xs-3 text-right">
								<h6><span>$</span>50.00</h6>
							</div>
						</div>
						<div class="form-group">
							<hr />
						</div>
						<div class="form-group">
							<div class="col-xs-12">
								<strong>Subtotal</strong>
								<div class="pull-right"><span>$</span><span>200.00</span></div>
							</div>
							<div class="col-xs-12">
								<small>Shipping</small>
								<div class="pull-right"><span>-</span></div>
							</div>
						</div>
						<div class="form-group">
							<hr />
						</div>
						<div class="form-group">
							<div class="col-xs-12">
								<strong>Order Total</strong>
								<div class="pull-right"><span>$</span><span>150.00</span></div>
							</div>
						</div>
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
								<input type="text" name="alamat" class="form-control" value="" />
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
								<input type="text" name="kode_pos" class="form-control" value="" />
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
	var bu_user = '<?= $bu_user ?>';
	var bu = '<?= base_url(); ?>';

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

				$op.append('<option value="' + field.province_id + '">' + field.province + '</option>');
				$op1.append('<option value="' + field.province_id + '">' + field.province + '</option>');

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
		var $op = $("#hasil");
		console.log(origin, des, qty, cour);
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
			var kurir = data[0].code;
			var nama_kurir = data[0].name;
			var tarif = data[0].costs[0].cost[0].value;
			x += "<p class='mb-0'><b>(" + kurir + " )</b> : " + nama_kurir + "</p>";
			x += tarif + "<br>";
			$op.html(x);

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

				$op.append('<option value="' + field.city_id + '">' + field.type + ' ' + field.city_name + '</option>');

			});
		}).fail(function(data) {
			// console.log(data);
		});
	}
</script>
