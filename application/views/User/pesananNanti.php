<?php
defined('BASEPATH') or exit('No direct script access allowed');

$bu = base_url();
$bu_user = $bu . 'user/';
if (isset($_SESSION['id_user'])) {
	$id_user = $_SESSION['id_user'];
}

?>


<style>
	.fade-scale {
		transform: scale(0);
		opacity: 0;
		-webkit-transition: all .25s linear;
		-o-transition: all .25s linear;
		transition: all .25s linear;
	}

	.fade-scale.in {
		opacity: 1;
		transform: scale(1);
	}

	.kotak {
		margin-top: 1rem;
		margin-bottom: 1rem;
		border: 0;
		border-top: 1px solid rgba(0, 0, 0, 0.1);
		max-width: 100%;
		border-radius: 5px;
		box-shadow: 1px 4px 19px 5px #888888;
		padding: 21px;
	}

	a:hover,
	a:focus {
		text-decoration: none;
		outline: none;
	}

	.tab {
		font-family: 'Nunito', sans-serif;
	}

	.tab .nav-tabs {
		background-color: #fff;
		padding: 0 0 1px;
		margin: 0 0 10px;
		border: none;
		border-radius: 30px;
		box-shadow: 3px 3px 15px rgba(0, 0, 0, 0.15);
	}

	.tab .nav-tabs li a {
		color: #555;
		background: #fff;
		font-size: 17px;
		font-weight: 700;
		text-transform: uppercase;
		padding: 8px 20px 6px;
		margin: 0 5px 0 0;
		border: none;
		border-radius: 30px;
		overflow: hidden;
		position: relative;
		z-index: 1;
		transition: all 0.3s ease 0.3s;
	}

	.tab .nav-tabs li.active a,
	.tab .nav-tabs li a:hover,
	.tab .nav-tabs li.active a:hover {
		color: #fff;
		background: #fff;
		border: none;
	}

	.tab .nav-tabs li a:before,
	.tab .nav-tabs li a:after {
		content: "";
		background-color: #1890E0;
		width: 100%;
		height: 100%;
		border-radius: 30px;
		opacity: 0.5;
		transform: scaleX(0);
		position: absolute;
		top: 0;
		left: 0;
		z-index: -1;
		transition: all 0.4s ease 0s;
	}

	.tab .nav-tabs li a:after {
		background-color: #7A10EB;
		transform: scaleX(0);
		transition: all 0.4s ease 0.2s;
	}

	.tab .nav-tabs li.active a:before,
	.tab .nav-tabs li a:hover:before {
		opacity: 0;
		transform: scaleX(1);
	}

	.tab .nav-tabs li.active a:after,
	.tab .nav-tabs li a:hover:after {
		opacity: 1;
		transform: scaleX(1);
		background: linear-gradient(to right, #1890E0, #7A10EB);
	}

	.tab .tab-content {
		color: #999;
		background-color: #fff;
		font-size: 17px;
		letter-spacing: 1px;
		line-height: 30px;
		padding: 20px;
		box-shadow: 3px 3px 15px rgba(0, 0, 0, 0.15);
		border-radius: 20px;
		position: relative;
	}

	@media only screen and (max-width: 479px) {
		.tab .nav-tabs {
			padding: 0;
			border-radius: 20px;
		}

		.tab .nav-tabs li {
			width: 100%;
			text-align: center;
			margin: 0 0 5px;
		}

		.tab .nav-tabs li:last-child {
			margin-bottom: 0;
		}

		.tab .nav-tabs li a {
			margin: 0;
		}
	}

	.nav-tabs>li {
		float: none;
		display: inline-block;
		zoom: 1;
	}

	.nav-tabs {
		text-align: center;
	}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="tab" role="tabpanel">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#Section1" id="pilihan1" aria-controls="home" role="tab" data-toggle="tab">Belum Bayar</a></li>

					<li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" id="pilihan2" data-toggle="tab">Sudah Bayar</a></li>

					<li role="presentation"><a href="#Section3" id="pilihan3" aria-controls="messages" role="tab" data-toggle="tab">Transaksi Selesai</a></li>
				</ul>


				<!-- Tab panes -->
				<div class="tab-content tabs">
					<div role="tabpanel" class="tab-pane fade in active" id="Section1">

					</div>
					<div role="tabpanel" class="tab-pane fade" id="Section2">


					</div>
					<div role="tabpanel" class="tab-pane fade" id="Section3">

					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- modal detail -->
<div class="modal" id="detailModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table id="tableProduk" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>No.</th>
							<th style="width: 260px;">Nama Produk </th>
							<th>QTY</th>
							<th style="width: 60px;">Harga</th>
						</tr>
					</thead>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- modal detail -->



<script>
	$(document).ready(function() {

		$('#pilihan1').on('click', function() {

			loadProduk("#Section1", 0)
			$('#Section2').remove();
			$('#Section3').remove();

			$('<div role="tabpanel" class="tab-pane fade in active" id="Section1">').appendTo(".tab-content");
		});
		$('#pilihan2').on('click', function() {
			$('#Section1').remove();
			$('#Section3').remove();

			$('<div role="tabpanel" class="tab-pane fade in active" id="Section2">').appendTo(".tab-content");
			loadProduk("#Section2", 1)
		});
		$('#pilihan3').on('click', function() {
			loadProduk("#Section3", 2)
			$('#Section1').remove();
			$('#Section2').remove();

			$('<div role="tabpanel" class="tab-pane fade in active" id="Section3">').appendTo(".tab-content");
		});
		loadProduk("#Section1", 0)

		function loadProduk(tipe_select, status) {
			var id_user = '<?= $id_user ?>'
			$.ajax({
				type: "POST",
				dataType: 'json',
				url: "<?= $bu; ?>user/getAllTransaksiByIdUser",
				data: {
					status: status,
					id_user: id_user,
					search: $('#_bizSearch').val(),
					page: $('#_page').val(),

				},
			}).done(function(e) {
				if (e.status) {
					if (e.data.data.length < 1) {
						generateNoProduk(tipe_select);
					}
					$.each(e.data.data, function(key, val) {
						$(tipe_select).append(generateTransaksi(val, status, val.id_transaksi_bundling));
					});
				} else {
					generateNoProduk(tipe_select);
				}
			}).fail(function(e) {
				generateNoProduk(tipe_select);
			});
		}

		function formatUang(str, withRp = 0) {
			var rp = str
				.replace(/\D/g, "")
				.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
			if (withRp == 1)
				return 'Rp. ' + rp;
			else
				return rp;
		}

		function generateTransaksi(produk, status, id) {
			var id_trans = produk.id_transaksi
			var url = '<?= $bu_user; ?>metode_pembayaran/';
			var info2 = '<?= $bu_user; ?>transaksi2/' + id;
			var carry = '<?= $bu_user; ?>transfer_carry/';
			// url = url + produk.link;
			url = url + id;
			var output = '<!-- row -->' +
				' <div class="row px-3 py-2 kotak">' +
				'		<div class="col biz-bg-w-2 biz-rad-10 p-3 box-shadow mb-4">' +
				'			<div class="">' +
				'				<span class="biz-text-17 biz-text-w-5 font-weight-bold">' +
				'				<br><span>' +
				produk.created_at +
				'<br><span>' +
				'					Kode:' +
				produk.kode_transaksi +
				'			<div>' +
				'Harga : Rp.' +
				formatUang(produk.jumlah) +
				'			</div>' +
				'				<span>' +
				'					Metode Transfer - Ambil Barang' +
				'				</span>';
			'				</span>' +
			'			</div>' +
			'			<div><br>' +
			'			</div><br>'
			if (produk.status == 0) {
				output +=
					'				<span>' +
					'					<button type="button" class="btn-border btn btn-block biz-bg-w-1 text-uppercase biz-text-w-2 biz-text-17 py-1  BayarSekarang" data-id="' + id_trans + '">Bayar Sekarang</button>' +
					'				</span> <br>' +

					'				<span>' +
					'					<button type="button" class="btn btn-primary btn-border btn btn-block biz-bg-w-1 text-uppercase biz-text-w-2 biz-text-17 py-1 detail" data-id="' + id_trans + '">Detail </button>' +
					'				</span>';
			} else if (produk.status == 1) {
				output +=

					'				<span>' +
					'					<button type="button" class="btn btn-primary btn-border btn btn-block biz-bg-w-1 text-uppercase biz-text-w-2 biz-text-17 py-1 detail">Detail </button>' +
					'				</span><br>' +
					'				<span>' +
					'					<button type="button" class="btn btn-primary btn-border btn btn-block biz-bg-w-1 text-uppercase biz-text-w-2 biz-text-17 py-1 detail">Lacak </button>' +
					'				</span>';
			} else if (produk.status == 2) {
				// console.log(produk.metode);
				output +=

					'				<span>' +
					'					<button type="button" class="btn btn-primary btn-border btn btn-block biz-bg-w-1 text-uppercase biz-text-w-2 biz-text-17 py-1 detail">Detail </button>' +
					'				</span>';
			}
			'				</button>';
			output +=
				'			</div>' +
				'		</div>' +
				'	</div>';
			return output;
		}

		function generateNoProduk(tipe_bid_selector) {
			var html = '<!-- no produk -->' +
				'	<div class="row px-3 py-2">' +
				'		<div class="col biz-bg-w-2 biz-rad-10 p-3 mb-4 box-shadow">' +
				'			<div class="text-center">' +
				'				<span class="biz-text-17 biz-text-w-5 font-weight-bold">Belum Ada Data</span>' +
				'			</div>' +
				'		</div>' +
				'	</div>';
			$(tipe_bid_selector).html(html);
		}
		var bu = '<?=base_url() ?>'
		$('body').on('click', '.BayarSekarang', function() {
			var o = $(this).data('id')
			window.location = '<?= base_url(); ?>user/pembayaran/' + o;
		});
		$('body').on('click', '.detail', function() {

			var o = $(this).data('id')
			$('#detailModal').modal('show')
			var datatable = $('#tableProduk').DataTable({
				'lengthMenu': [
					[5, 10, 25, 50, -1],
					[5, 10, 25, 50, 'All']
				],
				'pageLength': 10,
				"processing": true,
				"language": {
					processing: '....loading<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>loading....<span class="sr-only">Loading...</span> '
				},
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
				],
				"order": [
					[1, "desc"]
				],
				'ajax': {
					url: bu + 'user/getAllProdukBeli',
					type: 'POST',
					"data": function(d) {
						d.id_transaksi = o;
						d.id_user = '<?= $id_user?>';
						return d;
					}
				},
			});

		});





	})
</script>
