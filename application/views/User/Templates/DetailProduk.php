	<!-- breadcrumbs -->
	<?php

	function formatUang($str, $withRp = 0)
	{
		return $withRp == 1
			? 'Rp. ' . number_format($str, 0, '.', ',')
			: number_format($str, 0, '.', ',');
	}

	?>
	<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>Detail Produk</li>
			</ul>
		</div>
	</div>
	<span></span>
	<div class="single">
		<div class="container">
			<div class="col-md-4 single-left">
				<div class="flexslider">
					<ul class="slides">
						<li data-thumb="<?= base_url() . "upload/images/produk/" . $produk->foto  ?>">
							<div class="thumb-image"> <img src="<?= base_url() . "upload/images/produk/" . $produk->foto  ?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
						</li>
					</ul>
				</div>
				<!-- flexslider -->
				<script defer src="<?php echo base_url() . "templates/user/"; ?>js/jquery.flexslider.js"></script>
				<link rel="stylesheet" href="<?php echo base_url() . "templates/user/"; ?>css/flexslider.css" type="text/css" media="screen" />
				<script>
					// Can also be used with $(document).ready()
					$(window).load(function() {
						$('.flexslider').flexslider({
							animation: "slide",
							controlNav: "thumbnails"
						});
					});
				</script>
				<!-- flexslider -->
				<!-- zooming-effect -->
				<script src="<?php echo base_url() . "templates/user/"; ?>js/imagezoom.js"></script>
				<!-- //zooming-effect -->
			</div>
			<div class="col-md-8 single-right">
				<h3><?= $produk->nama_produk ?></h3>
				<div class="description">
					<h5><i>Description</i></h5>
					<p><?= $produk->deskripsi ?></p>
				</div>
				<div class="color-quality">
					<h5>QTY :</h5>
					<div class="quantity">
						<div class="quantity-select">
							<div class="entry value-minus1">&nbsp;</div>
							<div class="entry value1" id="QTY"><span>1</span></div>
							<div class="entry value-plus1 active">&nbsp;</div>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="simpleCart_shelfItem">
					<p> <i class="item_price">Rp.<?= formatUang($produk->harga) ?></i></p>
					<button class="btn btn-primary biz-bg-w-1 text-white biz-rad-10 px-2 biz-text-15 py-2 btn-tawar" data-produkid="<?php echo $produk->id_produk; ?>" data-produknama="<?php echo $produk->nama_produk; ?>" data-produkharga="<?php echo $produk->harga; ?>">
						Tambah Ke Keranjang
					</button>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //newsletter -->
	<?php
	$bu = base_url();
	?>

	<script>
		var bu_user = '<?= base_url(); ?>/user';
		var qty = document.getElementById('QTY');
		var newQTY = qty.textContent;
		var q = 1;
		$('.value-plus1').on('click', function() {
			var divUpd = $(this).parent().find('.value1'),
				newVal = parseInt(divUpd.text(), 10) + 1;
			divUpd.text(newVal);
			q = newVal;
			console.log(divUpd, newVal,q)


		});

		$('.value-minus1').on('click', function() {
			var divUpd = $(this).parent().find('.value1'),
				newVal = parseInt(divUpd.text(), 10) - 1;
			if (newVal >= 1) divUpd.text(newVal);
		});

		// console.log(qty.textContent);
		// console.log(newQTY)
		$(document).ready(function() {
			$('.btn-tawar').on('click', function() {
				var id_produk = $(this).data('produkid');
				var harga = $(this).data('produkharga');
				var qty = q;
				// console.log(harga)
				$('.btn-tawar').html('<i class="fas fa-spinner fa-spin"></i>');
				$('.btn-tawar').prop('disabled', true);
				$.ajax({
					type: "POST",
					dataType: 'json',
					url: "<?= $bu; ?>Cart/setBid",
					data: {
						id_produk: id_produk,
						harga: harga,
						qty: qty,
					},
				}).done(function(e) {
					if (e.status) {
						// console.log(e)
						Swal.fire(
							':)',
							e.msg,
							'success'
						);
						setTimeout(function() {
							location.reload();
						}, 2000);

					} else {
						Swal.fire(
							'error',
							e.msg,
							'error'
						);
					}
				}).fail(function(e) {
					Swal.fire(
						'error',
						e.msg,
						'error'
					);

				}).always(function(e) {
					setTimeout(() => {
						$('.btn-tawar').html('Tambah Ke Keranjang');
						$('.btn-tawar').prop('disabled', false);
					}, 100);
				});
			})

			$('#post').submit(function(event) {

				var postingData = $(this).serializeArray();
				event.preventDefault();
				console.log(postingData)
				return false

				$.ajax({
					url: '<?= base_url(); ?>Cart/addCarst',
					type: "POST",
					data: postingData,
					dataType: 'json',
					success: function(data) {
						console.log(data);
					}
				});
			});

			$('.add_cart').click(function() {
				var id = $(this).data('produkid');
				var nama = $(this).data('produknama');
				var harga = $(this).data('produkharga');
				var qty = 1;

				console.log(id, nama, harga, qty);
				// return false;
				$.ajax({
					url: '<?= base_url(); ?>Cart/addCart',
					dataType: 'json',
					method: 'POST',
					data: {
						nama: nama,
						id: id,
						harga: harga,
						qty: qty,
					}
				}).done(function(e) {
					console.log('berhasil');
					// console.log(e);
					if (e.status) {
						console.log(e);

					} else {
						console.log(e);

						// notifikasi('#alertNotifModal', e.message, true);

					}

				}).fail(function(e) {

				});

			});

			$(".select_item").change(function() {
				var s = $('.select_item').val();
				// alert(s);
				// console.log(s)
				loadProduk()


			});
			var s = $('.select_item').val();


			function formatUang(str, withRp = 0) {
				var rp = str
					.replace(/\D/g, "")
					.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
				if (withRp == 1)
					return 'Rp. ' + rp;
				else
					return rp;
			}




		});
	</script>
