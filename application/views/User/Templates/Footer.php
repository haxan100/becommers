<div class="footer">

<script src="<?php echo base_url() . "templates/user/"; ?>js/minicart.js"></script>
<script>
	w3ls.render();

	w3ls.cart.on('w3sb_checkout', function(evt) {
		var items, len, i;

		if (this.subtotal() > 0) {
			items = this.items();

			for (i = 0, len = items.length; i < len; i++) {}
		}
	});
</script>

	<div class="container">
		<div class="w3_footer_grids">
			<div class="col-md-6 w3_footer_grid">
				<h3>Contact</h3>
				<p>Untuk Informasi, Hubungi kami Di</p>
				<ul class="address">
					<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Pasar cengkareng, <span>jakarta Barat.</span></li>
					<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="<?p	hp echo base_url() . "templates/user/"; ?>mailto:info@example.com">info@cengkareng.com</a></li>
					<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 567</li>
				</ul>
			</div>
			<div class="col-md-6 w3_footer_grid">
				<h3>Information</h3>
				<ul class="info">
					<li><a href="<?php echo base_url().  "user/about"; ?>">Tentang Kami</a></li>


					<li><a href="<?php echo base_url() . "user/"; ?>hubungi">Hubungi Kami</a></li>

					<!-- <li><a href="<?php echo base_url() . "templates/user/"; ?>faq.html">FAQ's</a></li> -->
					
				</ul>
			</div>

			<!-- <div class="col-md-3 w3_footer_grid">
				<h3>Category</h3>
				<ul class="info">
					<li><a href="<?php echo base_url() . "templates/user/"; ?>products.html">Mobiles</a></li>
					<li><a href="<?php echo base_url() . "templates/user/"; ?>products1.html">Laptops</a></li>
					<li><a href="<?php echo base_url() . "templates/user/"; ?>products.html">Purifiers</a></li>
					<li><a href="<?php echo base_url() . "templates/user/"; ?>products1.html">Wearables</a></li>
					<li><a href="<?php echo base_url() . "templates/user/"; ?>products2.html">Kitchen</a></li>
				</ul>
			</div>
			<div class="col-md-3 w3_footer_grid">
				<h3>Profile</h3>
				<ul class="info">
					<li><a href="<?php echo base_url() . "templates/user/"; ?>index.html">Home</a></li>
					<li><a href="<?php echo base_url() . "templates/user/"; ?>products.html">Today's Deals</a></li>
				</ul>
				<h4>Follow Us</h4>
				<div class="agileits_social_button">
					<ul>
						<li><a href="<?php echo base_url() . "templates/user/"; ?>#" class="facebook"> </a></li>
						<li><a href="<?php echo base_url() . "templates/user/"; ?>#" class="twitter"> </a></li>
						<li><a href="<?php echo base_url() . "templates/user/"; ?>#" class="google"> </a></li>
						<li><a href="<?php echo base_url() . "templates/user/"; ?>#" class="pinterest"> </a></li>
					</ul>
				</div>
			</div> -->

			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="footer-copy">
		<div class="footer-copy1">
			<div class="footer-copy-pos">
				<a href="<?php echo base_url() . "templates/user/"; ?>#home1" class="scroll"><img src="<?php echo base_url() . "templates/user/"; ?>images/arrow.png" alt=" " class="img-responsive" /></a>
			</div>
		</div>
	</div>
</div>
