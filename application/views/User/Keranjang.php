	<!-- banner -->
	<div class="banner banner10">
		<div class="container">
			<h2>Tentang Kami</h2>
		</div>
	</div>
	<!-- //banner -->
	<!-- breadcrumbs -->
	<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="<?php echo base_url() . "templates/user/"; ?>index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>Tentang Kami</li>
			</ul>
		</div>
	</div>
	<!-- //breadcrumbs -->
	<!-- about -->
	<div class="about">
		<div class="container">
			<div class="w3ls_about_grids">
				<ul class="products">
					<?php
						// var_dump($products);


					 foreach ($products as $p) :
						// var_dump($products);

						
					 
					 ?>
						<li>
							<h3><?php echo $p->id_produk; ?></h3>

							<small>&euro;<?php echo $p->harga; ?></small>
							<?php echo form_open('cart/add_cart_item'); ?>
							<fieldset>
								<label>Quantity</label>
					
							</fieldset>
							<?php echo form_close(); ?>
						</li>
					<?php endforeach; ?>
				</ul>



		
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>

	<!-- //newsletter -->
