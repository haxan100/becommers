<?php $this->load->view('User/Templates/header') ?>
<?php $this->load->view('User/Templates/head') ?>
<?php $this->load->view('User/Templates/HeaderNav') ?>


<!-- //navigation -->


<!-- banner -->


<!-- //banner -->
<!-- banner-bottom -->
<?php $this->load->view('User/Templates/Isi') ?>

<!-- //banner-bottom -->
<!-- banner-bottom1 -->

<!-- //banner-bottom1 -->
<!-- footer -->

<?php $this->load->view('User/Templates/Footer') ?>
<!-- //footer -->
<!-- cart-js -->
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
<!-- //cart-js -->
</body>

</html>
