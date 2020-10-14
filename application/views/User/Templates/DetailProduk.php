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
						<li data-thumb="<?= base_url() ."upload/images/produk/".$produk->foto  ?>">
							<div class="thumb-image"> <img src="<?= base_url() ."upload/images/produk/".$produk->foto  ?>"  data-imagezoom="true" class="img-responsive" alt=""> </div>
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
						<h5>Quality :</h5>
						 <div class="quantity"> 
							<div class="quantity-select">                           
								<div class="entry value-minus1">&nbsp;</div>
								<div class="entry value1"><span>1</span></div>
								<div class="entry value-plus1 active">&nbsp;</div>
							</div>
						<!--quantity-->
								<script>
								$('.value-plus1').on('click', function(){
									var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)+1;
									divUpd.text(newVal);
								});

								$('.value-minus1').on('click', function(){
									var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)-1;
									if(newVal>=1) divUpd.text(newVal);
								});
								</script>
							<!--quantity-->

					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="simpleCart_shelfItem">
					<p> <i class="item_price">Rp.<?= formatUang($produk->harga) ?></i></p>
					<form action="#" method="post">
						<input type="hidden" name="cmd" value="_cart">
						<input type="hidden" name="add" value="1"> 
						<input type="hidden" name="w3ls_item" value="Smart Phone"> 
						<input type="hidden" name="amount" value="<?= $produk->harga ?>">   
						<button type="submit" class="w3ls-cart">Add to cart</button>
					</form>
				</div> 
			</div>
			<div class="clearfix"> </div>
		</div>
	</div> 
	<!-- //newsletter -->