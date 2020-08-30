<body>
	<!-- for bootstrap working -->
	<script type="text/javascript" src="<?php echo base_url() . "templates/user/"; ?>js/bootstrap-3.1.1.min.js"></script>
	<!-- //for bootstrap working -->
	<!-- header modal -->

	<?php $this->load->view('User/Templates/Login') ?>
	<script>
		$('#transaksi').on('click', function() {

				// var email = $("#LEmail").val();
				// var password = $("#LPassword").val();
				console.log("ssss");
				return false;
				$("#formLogin").trigger('submit');
			});

	</script>
	<!-- header modal -->
	<!-- header -->
