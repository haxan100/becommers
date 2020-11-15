<?php
defined('BASEPATH') or exit('No direct script access allowed');
$bahasa = $ci->session->userdata('language');
$ci->lang->load('user', $bahasa);
$bu = base_url();
$bu_user = $bu . 'user/';
$in = array(
	'title' => 'Bundling di Tutup',
	'loggedIn' => 0,
	'backIcon' => 0,
	'backLink' => $bu_user . 'profile/' . $id_tipe_produk,
	'includeJS' => array(
		$bu . 'assets/js/user/_search_sort_filter.js',
	),
);
echo $ci->myHeaderMobile($in);

$now = new DateTime();
$tomorrow = $now->modify('+1 day')->format('d/m/Y');
?>

<style>
	.pagination {
		display: flex;
		justify-content: center;
	}

	.paginations {
		display: flex;
		justify-content: center;
	}

	.example {
		padding-top: 5%;
	}

	a {
		height: 100%;
	}

	.container {
		/* padding-top: 11px;
		max-width: 80%;
		border-radius: 10px; */
		padding-bottom: 5% !important;
		box-shadow: 1px 4px 19px 5px #888888;
	}

	.kotak {
		box-shadow: 0px 0px 9px 1px #CDCDCDCD;
		border-radius: 9px;
		/* height: 140px; */
		margin-bottom: 5px;
		margin-top: 9px;
		margin-left: 0%;
		margin-right: 1%;

	}
</style>
<!-- CONTENT -->
<div class="container biz-bg-w-2">

	<div class="row pt-4">
		<div class="col biz-bg-w-2 px-3 pt-3">
			<div class="biz-text-17 biz-text-w-5 text-center font-weight-bold">
				<span>
					Pilih Status!
				</span>
			</div>
			<div>
				<ul class="nav nav-tabs row" id="myTab" role="tablist">
					<li class="nav-item col px-0 text-center">
						<a class="nav-link active" id="hasil-penawaran-tab" data-toggle="tab" href="#hasil-penawaran" role="tab" aria-controls="hasil-penawaran" aria-selected="true">
							Pesanan<br>Belum Terbayar
						</a>
					</li>
					<li class="nav-item col px-0 text-center">
						<a class="nav-link" id="hasil-sebelumnya-tab" data-toggle="tab" href="#hasil-sebelumnya" role="tab" aria-controls="hasil-sebelumnya" aria-selected="false">
							Pesanan<br>Terbayar
						</a>
					</li>
					<li class="nav-item col px-0 text-center">
						<a class="nav-link" id="hasil-gagal-tab" data-toggle="tab" href="#hasil-gagal" role="tab" aria-controls="hasil-gagal" aria-selected="false">
							Pesanan<br>Selesai
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<?php
	$filter = array();
	$nos = 1;
	foreach ($barang as $row) {
		if ($nos == 1) {
			array_push($filter, array(
				'text' => "Semua",
				'value' => "default",
				'id_tipe_produk' => $row->id_transaksi,
			));
			$nos++;
		}
		$data_row = array(
			'text' => $row->kode_transaksi,
			'value' => $row->id_transaksi,
			'id_tipe_produk' => $row->id_transaksi,
		);
		array_push($filter, $data_row);
		// var_dump($data_row);echo"<br>--<br>";
	}
	$sort = array(
		'0' => array(
			'text' => 'Harga: 0-9',
			'value' => 'h-1',
		),
		'1' => array(
			'text' => 'Harga: 9-0',
			'value' => 'h-0',
		),
		'2' => array(
			'text' => 'Produk: A-Z',
			'value' => 'p-1',
		),
		'3' => array(
			'text' => 'Produk: Z-A',
			'value' => 'p-0',
		),
		'4' => array(
			'text' => 'Terbaru',
			'value' => 'w-1',
		),
		'5' => array(
			'text' => 'Terlama',
			'value' => 'w-0',
		),
	);
	// var_dump($filter);die();
	$in2 = array(
		// 'all' => 1,
		'search' => 1,
		'sort' => 0,
		'arrSort' => $sort,
		'filter' => 0,
		'arrFilter' => $filter,
		// 'date' => 1,
	);
	$ci->load->view('user/templates/search_sort_filter', $in2);
	?>

	<div class="tab-content my-3" id="myTabContent">
		<div class="tab-pane fade show active" id="hasil-penawaran" role="tabpanel" aria-labelledby="home-tab">
		</div>

		<div class="tab-pane fade" id="hasil-sebelumnya" role="tabpanel" aria-labelledby="profile-tab">
		</div>


		<div class="tab-pane fade" id="hasil-gagal" role="tabpanel" aria-labelledby="profile-tab">
		</div>

	</div>

	<!-- MODALS -->
	<!-- Full Height Modal Right -->
	<div class="modal fade bottom" id="modalPertanyaan" tabindex="-1" role="dialog" aria-labelledby="modalPertanyaanTitle" aria-hidden="true">

		<!-- Add class .modal-full-height and then add class .modal-right (or other classes from list above) to set a position to the modal -->
		<div class="modal-dialog modal-bottom" role="document">


			<div class="modal-content biz-bg-w-8">
				<!-- <div class="modal-header">
						<h4 class="modal-title w-100" id="modalPertanyaanTitle">Modal title</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div> -->
				<div class="modal-body">
					<span id="pertanyaanIsi"></span>
				</div>
				<!-- <div class="modal-footer justify-content-center">
						<button type="button" class="btn biz-bg-w-8" data-dismiss="modal">Tutup</button>
					</div> -->
			</div>

			<!-- Full Height Modal Right -->

		</div>
	</div>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Detail Produk List</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="tab-pane fade active show" id="tabBidder" role="tabpanel">
					<div class="table-responsive">
						<table id="bidderlist" class="table table-striped table-bordered" style="margin-left: 20px;width: 90%;">
							<thead>
								<tr>
									<th>No</th>
									<th>Judul</th>
									<th>Imei</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Full Height Modal Right -->

	<nav aria-label="Page navigation example" class="example">
		<input id="_page" type="hidden" value=1></input>
		<ul class="pagination" id="pagination-wrapper">

		</ul>
	</nav>
	<!-- Full Height Modal Right -->
	<nav aria-label="Page navigation example" class="example">
		<input id="_page1" type="hidden" value=1></input>
		<ul class="paginations" id="pagination-wrappers">

		</ul>
	</nav>
</div>


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

<script>
	$(document).ready(function() {


		function tabcoba() {
			// $('#hasil-penawaran-tab').click();
			$('#hasil-penawaran-tab').addClass('active');
			$('#hasil-penawaran-tab').attr("aria-selected") == "true";
		}

		tabcoba()

		$('body').on('click', '.page-link', function() {
			var hal = $(this).attr('data-page');
			$('#_page').val(hal);
			// console.log(hal)
			// loadProduk('#hasil-penawaran', 0);

			loadProduk('#hasil-sebelumnya', 1);
			loadProduk('#hasil-gagal', 4);

		});
		$('body').on('click', '.page-links', function() {
			var hal = $(this).attr('data-page');
			$('#_page').val(hal);
			// console.log(hal)
			// loadProduk('#hasil-penawaran', 0);

			loadProduk('#hasil-sebelumnya', 1);
			loadProduk('#hasil-gagal', 4);

		});
		$('#hasil-gagal-tab').on('click', function() {
			$("#jumlahtotal").hide();
			$("#_pages").hide();
			$(".pagination").hide();
			$(".paginations").show();
			// generatePagination().hide()

		});

		$('#hasil-sebelumnya-tab').on('click', function() {
			$("#jumlahtotal").hide();
			$(".pagination").show();
			$("#_pages").show();

			$(".paginations").hide();
			console.log('Terbayar');


			// $("#_page").hide();

		});


		var filter = 'default';
		var sort = 'default';

		loadProdukBerhasil('#hasil-penawaran', 0);
		// loadProduk('#hasil-penawaran', 0);
		loadProduk('#hasil-sebelumnya', 1);
		loadProduk('#hasil-gagal', 4);
		$('body').on('click', '.bayarSekarang', function() {
			console.log("adas");
			var url = $(this).data('link');
			// console.log(url);
			window.location = $(this).data('link');
		});
		$('.pertanyaan').on('click', function() {
			$('#pertanyaanIsi').html($(this).find('.d-none').html());
			$('#modalPertanyaan').modal('show');
		});

		function loadProduk(tipe_bid_selector, status) {
			$.ajax({
				type: "POST",
				dataType: 'json',
				url: "<?= $bu; ?>user/getMyBidBundlingList",
				data: {
					status: status,
					search: $('#_bizSearch').val(),
					sort: sort,
					page: $('#_page').val(),
					filter: filter,
				},
			}).done(function(e) {
				$(tipe_bid_selector).html('');
				if (e.status) {
					$.each(e.data, function(key, val) {

						// console.log(val)

						if (status == 4) {
							$(tipe_bid_selector).append(generateProdukGagal(val));

							generatePaginations(e.page);
						} else {
							// console.log(tipe_bid_selector);
							// console.log(val);
							// console.log(status);
							// $(tipe_bid_selector).append(generateProduk(val, status));


							$(tipe_bid_selector).append(generateTransaksi(val, status, val.id_transaksi_bundling));

							generatePagination(e.page);
						}
					});
				} else {
					// console.log("profile"+e);
					generateNoProduk(tipe_bid_selector);
				}
			}).fail(function(e) {
				// console.log(e);
				// alert('Terjadi kendala. Silahkan reload halaman ini.');
				generateNoProduk(tipe_bid_selector);
			});
		}

		hidePag();

		function hidePag(e) {
			// console.log("produk");

			$("#_pages").hide();
			$(".pagination").hide();
			$(".paginations").hide();
			// /return(false);

		}

		$('#_bizSearch').on('keyup', function() {

			loadProdukBerhasil('#hasil-penawaran', 0);
			// loadProduk('#hasil-penawaran', 0);
			loadProduk('#hasil-sebelumnya', 1);
			loadProduk('#hasil-gagal', 4);
		});
		$('._bizSortPil').on('click', function() {

			var d = $(this).attr('data-value');
			sort = d;

			loadProdukBerhasil('#hasil-penawaran', 0);
			// loadProduk('#hasil-penawaran', 0);
			loadProduk('#hasil-sebelumnya', 1);
			loadProduk('#hasil-gagal', 4);
		});
		$('._bizFilterPil').on('click', function() {
			var d = $(this).attr('data-value');
			filter = d;

			loadProdukBerhasil('#hasil-penawaran', 0);
			// loadProduk('#hasil-penawaran', 0);
			loadProduk('#hasil-sebelumnya', 1);
			loadProduk('#hasil-gagal', 4);
		});

		function generatePaginations(e) {
			// console.log(produk);return(false);

			var pag = '';
			// var pag = '';
			var max_page = 5;

			if (e.halaman <= 1) {
				pag += '<button disabled data-page="1" class="page-links button btn-outline-secondary px-2 rounded mr-2 pg border-0"><i class="fas fa-arrow-left"></i></button> ';
			} else {
				pag += '<button data-page="' + (e.halaman - 1) + '" class="page-links button btn-primary px-2 rounded mr-2 pg border-0"><i class="fas fa-arrow-left"></i></button> ';
			}
			// console.log(p.total_halaman <= max_page);
			if (e.total_halaman <= max_page) {
				for (var i = 1; i <= e.total_halaman; i++) {
					if (i == e.halaman) {
						pag += '<button disabled data-page="' + i + '" class="page-links button btn-secondary px-2 rounded mr-2 text-center pg border-primary" disabled> ' + i + ' </button> ';
					} else {
						pag += '<button data-page="' + i + '" class="page-links button btn-primary px-2 rounded mr-2 text-center pg border-0"> ' + i + ' </button> ';
					}
				}
			} else {
				if (e.halaman - 2 > 1) {
					pag += '.. ';
				}
				for (var i = e.halaman - 2; i <= e.halaman + 2; i++) {
					// console.log(i);
					if (i == e.halaman) {
						pag += '<button disabled data-page="' + i + '" class="page-links button btn-secondary px-2 rounded mr-2 text-center pg border-primary" disabled> ' + i + ' </button> ';
					} else if (i >= 1 && i <= e.total_halaman) {
						pag += '<button data-page="' + i + '" class="page-links button btn-primary px-2 rounded mr-2 text-center pg border-0"> ' + i + ' </button> ';
					}
				}
				if (e.halaman + 2 < e.total_halaman) {
					pag += '.. ';
				}
			}

			if (e.halaman >= e.total_halaman) {
				pag += ' <button disabled data-page="' + e.total_halaman + '" class="page-links button btn-outline-secondary px-2 rounded mr-2 pg border-0"><i class="fas fa-arrow-right"></i></button>';
			} else {
				pag += ' <button data-page="' + (e.halaman + 1) + '" class="page-links button btn-primary px-2 rounded mr-2 pg border-0"><i class="fas fa-arrow-right"></i></button>';
			}


			// for (let i = 1; i <= e.total_halaman ; i++) {

			// html +='	<li class="page-item"><a class="page-link" data-page=" ' + i + ' " href="#">' + i + '</a></li> ';

			// }

			$('#pagination-wrappers').html(pag);
		}

		function loadProdukBerhasil(tipe_bid_selector, status) {
			var hasil = 0;
			$.ajax({
				type: "POST",
				dataType: 'json',
				url: "<?= $bu; ?>user/getMyBidBundlingListSukses",
				data: {
					status: 0,
					search: $('#_bizSearch').val(),
					sort: sort,
					filter: filter,
				},
			}).done(function(e) {
				// console.log(e.data)
				var i = 0;
				$.each(e.data, function(k, v) {
					/// do stuff
					// console.log(generateProdukSukses(v,0))

					$(tipe_bid_selector).append(generateProdukSukses(v, 0));
					//  console.log(v)

				});
			})
		}


		function generateTransaksi(produk, status, id) {
			// console.log(produk, status, id);
			// return false;
			var url = '<?= $bu_user; ?>metode_pembayaran/';
			var info2 = '<?= $bu_user; ?>transaksi2/' + id;
			var carry = '<?= $bu_user; ?>transfer_carry/';
			// url = url + produk.link;
			url = url + id;
			// info2 = info2 + produk.kode;
			// carry = carry + produk.link;
			// console.log(produk);
			// return false;
			var output = '<!-- row -->' +
				' <div class="row px-3 py-2 kotak">' +
				'		<div class="col biz-bg-w-2 biz-rad-10 p-3 box-shadow mb-4">' +
				'			<div class="">' +
				'				<span class="biz-text-17 biz-text-w-5 font-weight-bold">' +
				'				<br><span>' +
				produk.updated_at +
				'<br><span>' +
				'					Kode Transaksi:' +
				produk.kode_transaksi +
				'			<div>' +
				'Harga : ' +
				formatUang(produk.harga_total, 1) +
				'			</div>'
			'				</span>' +
			'				<span class="biz-text-13 biz-width-60 border rounded py-0 text-uppercase biz-float-right biz-text-w-1 biz-border-w-1 text-center biz-bg-w-10">' +
			produk.grade +
				'				</span>' +
				'			</div>' +
				'			<div>' +
				'			</div>'
			if (produk.metode == 1) {
				// console.log(produk.metode);
				output +=
					'				<span>' +
					'					Metode Transfer- Kirim Barang' +
					'				</span>';
			} else if (produk.metode == 2) {
				// console.log(produk.metode);
				output +=

					'				<span>' +
					'					Metode Cash & Carry' +
					'				</span>';
			} else if (produk.metode == 3) {
				// console.log(produk.metode);
				output +=

					'				<span>' +
					'					Metode Transfer - Ambil Barang' +
					'				</span>';
			}
			'				</button>';
			if (status == 1 || status == 2) {
				var metode = "";
				if (produk.metode == 1) {
					var resi = produk.resi;
					var metode = "Transfer";
				} else if (produk.metode == 2) {
					var metode = "Cash And Carry";
					resi = "-";

				} else {
					var metode = "Transfer And Carry";
					resi = "-";


				}
				// console.log(produk);
				// output +=


				// 	'				</span> <br>' +
				// 	'					Metode Pembayaran : ' +
				// 	metode +
				'				</span><br>' +
				'					Resi : ' +
				resi +
					'				</span><br>';

				output +=
					'			<div class="mt-5">' +
					'				<button class="btn-border btn btn-block biz-bg-w-1 text-uppercase biz-text-w-2 biz-text-17 py-1 modalDetailTransaksi detail "  ' +

					'data-target = "#exampleModal" ' +
					'data-toggle = "modal" ' +
					'data-id_transaksi =' + id + ' " ';

				if (produk.metode == 1) {
					output +=
						info2 +
						'">' +
						'Lihat Transaksi';
				} else if (produk.metode == 2) {
					output +=
						info2 +
						'">' +
						'Lihat Detail';
				} else if (produk.metode == 3) {
					output +=
						info2 +
						'">' +
						'Lihat Transaksi';
				}
				output +=
					'				</button>';
			}
			output +=
				'			</div>' +
				'		</div>' +
				'	</div>';
			return output;
		}


		function generateProdukSukses(produk, status) {
			var url = '<?= $bu_user; ?>metode_pembayaran_bundling/';
			var info = '<?= $bu_user; ?>transaksi_bundling/';
			var carry = '<?= $bu_user; ?>transfer_carry/';
			url = url + produk.kode_transaksi;
			info = info + produk.kode_transaksi;
			carry = carry + produk.kode_transaksi;
			console.log(url)
			// return false;
			var output = '<!-- row -->' +
				' <div class="row px-3 py-2 kotak">' +
				'		<div class="col biz-bg-w-2 biz-rad-10 p-3 box-shadow mb-4">' +
				'			<div class="biz-pr-5r">' +
				'				<span class="biz-text-17 biz-text-w-5 font-weight-bold">' +
				produk.judul +
				'				</span>' +
				'				<span class="biz-text-13 biz-width-20 border rounded py-0 text-uppercase biz-float-right biz-text-w-1 biz-border-w-1 text-center biz-bg-w-10">' +
				produk.grade +
				'				</span>' +
				'			</div>' +
				'			<div>' +
				'				<span class="biz-text-13 biz-text-w-5">' +
				produk.sort_detail + '<br>' +
				'				</span>' +
				'			</div>' +

				'			<div class="pt-2">' +
				'				<span class="biz-text-13 biz-text-w-5"> QTY : ' +
				produk.qty +
				'				</span">' +
				'			</div>' +

				'			<div class="pt-2">' +
				'				<span class="biz-text-13 biz-text-w-5">' +
				'					Harga Total: ' +
				formatUang(produk.harga_total, 1) +
				// '<br>' +
				'				</span>' +
				'			</div>'
			'			<div class="pt-2">' +
			'				<span class="biz-text-13 biz-text-w-5">QTY' +
			produk.qty +
				'<br>' +
				'				</span>' +
				'			</div>';
			if (status == 0) {
				output +=

					'			<div class="mt-5">' +
					'				<button class="btn-border modalDetailTransaksi btn btn-block biz-bg-w-1 text-uppercase biz-text-w-2 biz-text-17 py-1" data-toggle="modal" data-target="#exampleModal" data-id_transaksi="' + produk.id_transaksi + '" >' +
					'				Detail Produk List</button></div>' +

					'			<div class="mt-2">' +
					'				<button class="btn-border btn btn-block biz-bg-w-1 text-uppercase biz-text-w-2 biz-text-17 py-1 bayarSekarang" data-link="';
				if (produk.metode == 0) {
					output +=
						url +
						'">' +
						'Bayar Sekarang';
				} else if (produk.metode == 1) {
					output +=
						info +
						'">' +
						'Lihat Transaksi';
				} else if (produk.metode == 2) {
					output +=
						info +
						'">' +
						'Lihat Detail';
				} else if (produk.metode == 3) {
					output +=
						info +
						'">' +
						'Lihat Transaksi';
				}
				output +=
					'				</button>';
			} else if (status == 1 || status == 2) {
				var metode = "";
				if (produk.metode == 1) {
					var resi = produk.resi;
					var metode = "Transfer";
				} else if (produk.metode == 2) {
					var metode = "Cash And Carry";
					resi = "-";

				} else {
					var metode = "Transfer And Carry";
					resi = "-";
				}
				output +=

					'				<br><span>' +
					'					Kode Transaksi:' +
					produk.kode_transaksi +
					'				</span> <br>' +
					'					Metode Pembayaran : ' +
					metode +
					'				</span><br>' +
					'					Resi : ' +
					resi +
					'				</span><br>';

				output +=
					'			<div class="mt-5">' +
					'				<button class="btn-border btn btn-block biz-bg-w-1 text-uppercase biz-text-w-2 biz-text-17 py-1 bayarSekarang" data-link="';
				if (produk.metode == 1) {
					output +=
						info +
						'">' +
						'Lihat Transaksi';
				} else if (produk.metode == 2) {
					output +=
						info +
						'">' +
						'Lihat Detail';
				} else if (produk.metode == 3) {
					output +=
						info +
						'">' +
						'Lihat Transaksi';
				}
				output +=
					'				</button>';
			}
			output +=
				'			</div>' +
				'		</div>' +
				'	</div>';
			return output;
		}
		// lihat transaksi
		$('body').on('click', '.modalDetailTransaksi', function() {
			var id_transaksi = $(this).attr('data-id_transaksi');
			console.log(id_transaksi)
			// return false 
			var datatable = $('#bidderlist').DataTable({
				'sDom': 'lrtip',
				// "paging": false,
				// "ordering": false,
				"info": false,
				"searching": false,
				"lengthChange": true,
				// 'sDom': 'lrtip',
				'lengthMenu': [
					[5, 10, 25, 50, -1],
					[5, 10, 25, 50, 'All']
				],
				'pageLength': 100,
				"processing": true,
				"serverSide": true,
				"columnDefs": [{
						"targets": 0,
						"className": "dt-body-center dt-head-center",
						"orderable": false
					},
					{
						"targets": 1,
						"className": "dt-body-center dt-head-center"
					},
				],
				"order": [
					[1, "desc"]
				],
				'ajax': {
					url: '<?= base_url('user/getBidderBundling'); ?>',
					type: 'POST',
					"data": function(d) {
						d.id_transaksi = id_transaksi;
						return d;
					},
				},
			});
			$('#bidderlist').DataTable().destroy();



		})

		function generatePagination(e) {
			// console.log(e);
			// return (false);

			var pag = '';
			// var pag = '';
			var max_page = 5;

			if (e.halaman <= 1) {
				pag += '<button disabled data-page="1" class="page-link button btn-outline-secondary px-2 rounded mr-2 pg border-0"><i class="fas fa-arrow-left"></i></button> ';
			} else {
				pag += '<button data-page="' + (e.halaman - 1) + '" class="page-link button btn-primary px-2 rounded mr-2 pg border-0"><i class="fas fa-arrow-left"></i></button> ';
			}
			// console.log(p.total_halaman <= max_page);
			if (e.total_halaman <= max_page) {
				for (var i = 1; i <= e.total_halaman; i++) {
					if (i == e.halaman) {
						pag += '<button disabled data-page="' + i + '" class="page-link button btn-secondary px-2 rounded mr-2 text-center pg border-primary" disabled> ' + i + ' </button> ';
					} else {
						pag += '<button data-page="' + i + '" class="page-link button btn-primary px-2 rounded mr-2 text-center pg border-0"> ' + i + ' </button> ';
					}
				}
			} else {
				if (e.halaman - 2 > 1) {
					pag += '.. ';
				}
				for (var i = e.halaman - 2; i <= e.halaman + 2; i++) {
					// console.log(i);
					if (i == e.halaman) {
						pag += '<button disabled data-page="' + i + '" class="page-link button btn-secondary px-2 rounded mr-2 text-center pg border-primary" disabled> ' + i + ' </button> ';
					} else if (i >= 1 && i <= e.total_halaman) {
						pag += '<button data-page="' + i + '" class="page-link button btn-primary px-2 rounded mr-2 text-center pg border-0"> ' + i + ' </button> ';
					}
				}
				if (e.halaman + 2 < e.total_halaman) {
					pag += '.. ';
				}
			}

			if (e.halaman >= e.total_halaman) {
				pag += ' <button disabled data-page="' + e.total_halaman + '" class="page-link button btn-outline-secondary px-2 rounded mr-2 pg border-0"><i class="fas fa-arrow-right"></i></button>';
			} else {
				pag += ' <button data-page="' + (e.halaman + 1) + '" class="page-link button btn-primary px-2 rounded mr-2 pg border-0"><i class="fas fa-arrow-right"></i></button>';
			}


			// for (let i = 1; i <= e.total_halaman ; i++) {

			// html +='	<li class="page-item"><a class="page-link" data-page=" ' + i + ' " href="#">' + i + '</a></li> ';

			// }

			$('#pagination-wrapper').html(pag);
		}

		function generateNoProduk(tipe_bid_selector) {
			var html = '<!-- no produk -->' +
				'	<div class="row px-3 py-2 kotak">' +
				'		<div class="col biz-bg-w-2 biz-rad-10 p-3 mb-4">' +
				'			<div class="text-center">' +
				'				<span class="biz-text-17 biz-text-w-5 font-weight-bold">Belum Ada Data</span>' +
				'			</div>' +
				'		</div>' +
				'	</div>';
			$(tipe_bid_selector).html(html);
		}

		function generateProdukGagal(produk) {
			return '<!-- row -->' +
				'  <div class="row px-3 py-2 kotak">' +
				'		<div class="col biz-bg-w-2 biz-rad-10 p-3">' +
				'			<div class="" style="padding-right: 4.5rem!important">' +
				'				<span class="biz-text-17 biz-text-w-5 font-weight-bold">' +
				produk.judul +
				'				</span>' +
				'				<span class="biz-text-13 biz-width-80 border rounded py-0 text-uppercase biz-float-right biz-text-w-1 biz-border-w-1 text-center">Bundling' +
				'				</span>' +
				'			</div>' +
				'			<div>' +
				'				<span class="biz-text-13 biz-text-w-5">' +
				produk.sort_detail + '<br>' +
				'				</span>' +
				'			</div>' +
				'			<div class="pt-2">' +
				'				<span class="biz-text-13 biz-text-w-5">' +
				'					Penawaran Awal: ' + formatUang(produk.harga_awal, 1) + '<br>' +
				'					Penawaran Anda: ' + formatUang(produk.harga_bid, 1) + '<br>' +
				'					Penawaran Tertinggi: ' + formatUang(produk.harga_terbaik, 1) + '<br>' +
				'				</span>' +
				'			</div>' +
				'		</div>' +
				'	</div>'
			'';
		}

		function generateProduk(produk, status) {
			var url = '<?= $bu_user; ?>metode_pembayaran_bundling/';
			var info = '<?= $bu_user; ?>transaksi_bundling/';
			var carry = '<?= $bu_user; ?>transfer_carry/';
			url = url + produk.link;
			info = info + produk.link;
			carry = carry + produk.link;
			console.log("ada " + produk.metode);
			var output = '<!-- row -->' +
				' <div class="row px-3 py-2 kotak">' +
				'		<div class="col biz-bg-w-2 biz-rad-10 p-3 mb-4">' +
				'			<div class="biz-pr-5r">' +
				'				<span class="biz-text-17 biz-text-w-5 font-weight-bold">' +
				produk.judul +
				'				</span>' +
				'				<span class="biz-text-13 biz-width-90 border rounded py-0 text-uppercase biz-float-right biz-text-w-1 biz-border-w-1 text-center">Bundling' +
				'				</span>' +
				'			</div>' +
				'			<div>' +
				'				<span class="biz-text-13 biz-text-w-5">' +
				produk.jumlah_produk + '<br>' +
				'				</span>' +
				'			</div>' +
				'			<div class="pt-2">' +
				'				<span class="biz-text-13 biz-text-w-5">' +
				'					Harga:' +
				formatUang(produk.harga_total, 1) +
				'<br>' +
				'				</span>' +
				'			</div>'
			if (produk.metode == 1) {
				// console.log(produk.metode);
				output +=

					'				<span>' +
					'					Metode Transfer' +
					'				</span>';
			} else if (produk.metode == 2) {
				// console.log(produk.metode);
				output +=

					'				<span>' +
					'					Metode Cash & Carry' +
					'				</span>';
			}
			if (status == 0) {
				output +=
					'			<div class="mt-5">' +
					'				<button class="btn btn-block biz-bg-w-1 text-uppercase biz-text-w-2 biz-text-17 py-1 bayarSekarang" data-link="';
				if (produk.metode == 0) {
					output +=
						url +
						'">' +
						'Bayar Sekarang';
				} else if (produk.metode == 1) {
					output +=
						info +
						'">' +
						'Lihat Transaksi';
				} else if (produk.metode == 2) {
					output +=
						info +
						'">' +
						'Lihat Detail';
				} else if (produk.metode == 3) {
					output +=
						info +
						'">' +
						'Lihat Detail';
				}
				output +=
					'				</button>';
			} else if (status == 1 || status == 2) {
				output +=
					'			<div class="mt-5">' +
					'				<button class="btn btn-block biz-bg-w-1 text-uppercase biz-text-w-2 biz-text-17 py-1 bayarSekarang" data-link="';
				if (produk.metode == 1) {
					output +=
						info +
						'">' +
						'Lihat Transaksi';
				} else if (produk.metode == 2) {
					output +=
						info +
						'">' +
						'Lihat Detail';
				} else if (produk.metode == 3) {
					output +=
						info +
						'">' +
						'Lihat Detail';
				}
				output +=
					'				</button>';
			}
			output +=
				'			</div>' +
				'		</div>' +
				'	</div>';
			return output;
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

	});
</script>
<?php
echo $ci->myFooterMobile();
?>
