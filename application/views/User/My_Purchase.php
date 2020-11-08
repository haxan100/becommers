	<!-- banner -->
	<div class="banner banner10">
		<div class="container">
			<h2>My Purchase</h2>
		</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css"></script>
	<?php
	$bu = base_url('user');
	?>


	<style>
		:root {
			--font-1: 'Nunito';
			--warna-1: #0067C7;
			--warna-2: #FFFFFF;
			--warna-3: #EEEFF0;
			--warna-4: #707070;
			--warna-5: #333333;
			--warna-6: #FF8D3E;
			--warna-7: #FB4E61;
			--warna-8: #69BE51;
			--warna-9: #3E8AD0;
			--warna-10: #CCE0F3;
			--warna-11: #A7A7A7;
		}

		.biz-pr-5r {
			padding-right: 5rem !important;
		}

		.biz-bg-w-3 {
			/* background-color: #e1f2fd; */
			background-color: #EEEFF0;
		}

		.biz-bg-w-2 {
			/* background-color: #00ffff; */
			background-color: #FFFFFF;

		}

		.containers {
			/* max-width: 90%; */
			border-radius: 10px;
			box-shadow: 1px 4px 19px 5px #888888;
			padding-bottom: 5%;
			padding-left: 12%;
			padding-right: 12%;
			margin-bottom: 5%;
		}

		.box-shadow {
			box-shadow: 0px 0px 9px 1px #CDCDCDCD;
			border-radius: 9px;
			/* height: 140px; */
			margin-bottom: 5px;
			margin-top: 9px;
			margin-right: 2%;
			margin-left: 10%;
		}

		.biz-rad-10 {
			border-radius: 10px !important;
		}

		.cards {
			padding-top: 5%;
			padding-bottom: 5%;
		}

		.card-body {
			padding-top: 5%;
			padding-bottom: 5%;
			padding-left: 5%;
		}

		.dropdown-menu {
			background-color: #3C43A4;
		}

		.biz-text-17 {
			font-size: 17px !important;
		}

		.biz-text-w-5 {
			color: var(--warna-5) !important;
		}

		.biz-text-13 {
			font-size: 13px !important;
		}

		.biz-float-right {
			position: absolute;
			top: 1rem;
			right: 1rem;
		}

		.biz-width-60 {
			width: 60px !important;
		}

		.biz-bg-w-10 {
			background-color: var(--warna-10) !important;
		}

		.biz-border-w-1 {
			border: 1px solid var(--warna-1) !important;
		}

		.biz-text-w-1 {
			color: var(--warna-1) !important;
		}

		.biz-bg-w-1 {
			background-color: var(--warna-1) !important;
		}
	</style>
	<!-- //banner -->
	<!-- breadcrumbs -->
	<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="<?php echo base_url() . "templates/user/"; ?>index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>My Purchase</li>
			</ul>
		</div>
	</div>
	<div class=" biz-bg-w-3">
		<div class="containers biz-bg-w-2">
			<div class="about">
				<hr>
				<div class="clearfix"> </div>
				<?php
				foreach ($purchase as $key) {
					// var_dump($key->kode_t/ransaksi);

				?>
					<div class="row px-3 py-2">
						<div class="col biz-bg-w-2 biz-rad-10 p-3 box-shadow mb-4">
							<div class="biz-pr-5r">
								<span class="biz-text-17 biz-text-w-5 font-weight-bold">
									Kode : <?= $key->kode_transaksi;  ?>

								</span>
							</div>
							<div>
								<span class="biz-text-13 biz-text-w-5">Status:
									<?= $key->status;  ?>
									<br>
								</span>
							</div>
							<div class="pt-2">
								<span class="biz-text-13 biz-text-w-5"> Harga Total: Rp.<?= $key->jumlah;  ?>
								</span>
							</div>

							<div class="mt-5">
								<button class="btn-border modalDetailTransaksi btn btn-block biz-bg-w-1 text-uppercase biz-text-w-2 biz-text-17 py-1" data-toggle="modal" data-target="#exampleModal" data-id_transaksi="<?= $key->id_transaksi;  ?>"> Detail Produk List</button>
							</div>
							<!-- <div class="mt-2"> <button class="btn-border btn btn-block biz-bg-w-1 text-uppercase biz-text-w-2 biz-text-17 py-1 bayarSekarang" data-link="http://localhost/biz/biding/user/metode_pembayaran/TX2035320001LSL">Bayar Sekarang </button> </div> -->
							</span>
						</div>
					</div>
				<?php } 	?>
				<center>
				
				<?php 
				echo $this->pagination->create_links();
				?>
				</center>


			</div>

		</div>
		<div class="clearfix"> </div>
		<hr>

		<head>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
		</head>
