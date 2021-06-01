<style>
	.dropdown-menu.columns-3s {
		min-width: 238px;
		padding: 30px 30px;
		/* left: -130%; */
		border-radius: 11px;
	}

	.multi-column-dropdown li a {
		display: block !important;
		clear: both !important;
		line-height: 1.428571429 !important;
		color: #fff !important;
		white-space: normal !important;
		font-weight: 500 !important;
		text-decoration: none !important;
	}

	.notif {
		z-index: -1;
		position: absolute;
		right: 7%;
		top: -3%;
		width: 35px;
		height: 35px;
		background: #ff6650;
		border-radius: 50px;
		-webkit-border-radius: 43px;
	}

	.badge {
		position: absolute;
		top: 1px;
		right: 7px;
		padding: 8px 10px;
		border-radius: 50%;
		background: red;
		color: white;
		z-index: -1;

	}
</style>

<div class="header" id="home1">
	<div class="container">
		<div class="w3l_login">
			<?php
			// var_dump($_SESSION);

			if (!empty($_SESSION['login_user'])) {
			} else {

			?>

				<a href="<?php echo base_url() . "templates/user/"; ?>#" data-toggle="modal" data-target="#myModal88"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>


			<?php
			}
			?>

		</div>
		<div class="w3l_logo">
			<h1><a href="<?php echo base_url() . "templates/user/"; ?>index.html">Electronic Store<span>Your stores. Your place.</span></a></h1>
		</div>
		<div class="search">
			<input class="search_box" type="checkbox" id="search_box">
			<label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
			<div class="search_form">

				<form action="<?php echo base_url() . "user/"; ?>" method="post">

					<input type="text" name="Search" id="cari" placeholder="Search...">

					<input type="submit" value="Send">

				</form>


			</div>
		</div>
		<div class="cart cart box_1">
			<!-- <form action="#" method="post" class="last"> -->
			<form method="post" class="last">
				<input type="hidden" name="cmd" value="_cart" />
				<input type="hidden" name="display" value="1" />
				<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
			</form>
		</div>
	</div>
</div>
<!-- //header -->
<!-- navigation -->
<div class="navigation">
	<div class="container">
		<nav class="navbar navbar-default">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header nav_2">
				<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
				<ul class="nav navbar-nav">
					<li><a href="<?php echo base_url() .  "user/"; ?>" class="act">Home</a></li>
					<!-- Mega Menu -->
					<li class="dropdown">
						<a href="<?php echo base_url() . "templates/user/"; ?>#" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
						<ul class="dropdown-menu multi-column columns-3">
							<div class="row">
								<div class="col-sm-6">
									<ul class="multi-column-dropdown">
										<h6>Top Kategori</h6>
										<?php
										$sql = "SELECT * FROM kategori limit 5";

										$res = $this->db->query($sql);
										foreach ($res->result() as $k) {
										?>
											<li><a href="<?php echo base_url() . "user/produk/" . $k->id_kategori; ?>"> <?= $k->nama_kategori ?> </a></li>

										<?php } ?>


									</ul>
								</div>
								<div class="col-sm-6">
									<ul class="multi-column-dropdown">
										<h6>Paling Baru</h6>
										<?php
										$sql = "SELECT * FROM `kategori` ORDER BY `kategori`.`created_at` DESC LIMIT 5";

										$res = $this->db->query($sql);
										foreach ($res->result() as $k) {
										?>

											<li><a href="<?php echo base_url() . "user/produk/" . $k->id_kategori; ?>"> <?= $k->nama_kategori ?> </a></li>

										<?php } ?>
									</ul>
								</div>
								<div class="clearfix"></div>
							</div>
						</ul>
					</li>
					<li><a href="<?php echo base_url() .  "user/about"; ?>">Tentang Kami</a></li>

					<?php
					// var_dump($jml);


					?>

					<li><a href="<?php echo base_url() . "user/"; ?>hubungi">Hubungi Kami</a></li>

					<?php 
					// var_dump($jml);die;
					if($jml>0){
					?>

					<li><a href="<?php echo base_url() . "user/"; ?>keranjang"><i class="fa fa-cart-arrow-down" aria-hidden="true">Cart <span class="badge keranjing"><?= $jml ?></span></i></a></li>


					<?php
						}
					if (!empty($_SESSION['login_user'])) {

					?>
						<li>
						<li class="dropdown">
							<a href="<?php echo base_url() . "templates/user/"; ?>#" class="dropdown-toggle" data-toggle="dropdown">Profile <b class="caret"></b></a>
							<ul class="dropdown-menu multi-column columns-3s">
								<div class="row">
									<ul class="multi-column-dropdown">
										<li><a type="button" class="btn 		btn-primary" href="<?php echo base_url() . "User/"; ?>Profile">
												<p class="text-white">Profile</p>
											</a>
										</li>

										<li><a type="button" class="btn 		btn-info" href="<?php echo base_url() . "User/"; ?>Pesanan">
												<p class="text-white">Pesanan</p>
											</a>
										</li>

										<li><a type="button" class="btn 		btn-danger" href="<?php echo base_url() . "Register/"; ?>logout">
												<p class="text-white">Logout</p>
											</a>
										</li>


									</ul>
									<div class="clearfix"></div>
								</div>
							</ul>
						</li>

						</li>


						<!-- <li><a href="<?php echo base_url() . "Register/"; ?>logout">Logout</a></li> -->
					<?php }
					?>


				</ul>
			</div>
		</nav>
	</div>
</div>
<script>

</script>
