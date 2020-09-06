	<!-- banner -->
	<div class="banner banner10">
		<div class="container">
			<h2>Tentang Kami</h2>
		</div>
	</div>
	<?php
	$ongkir = 15000;
	?>
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
<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Harga</th>
                            <th scope="col" class="text-right">Harga Total</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
					<?php 
					if(empty($products)){ 
						?>
						 <h1 class="jumbotron-heading text-center">Tidak Ada Produk Di Keranjang</h1> 
						 <?php 
					}else{
						 $subtotal = 0;
					foreach ($products as $k ) {

						$total = $k->harga * $k->qty;	

						$subtotal += $total;
					

				
						
					?>
	
                        <tr>
                            <td><img src="https://dummyimage.com/50x50/55595c/fff" /> </td>
                            <td> <?= $k->nama_produk?></td>
                            <td><input class="form-control" type="text" value="<?= $k->qty?>" /></td>
                            <td class="text-right"><?= $k->harga?></td>
                            <td class="text-right"><?= $total?></td>
                            <td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>
						</tr>

						<?php 
								}								
							?>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Sub-Total</td>
                            <td class="text-right"><?= $subtotal; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Ongkir</td>
                            <td class="text-right"><?= $ongkir; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong><?= $ongkir + $subtotal ?></strong></td>
                        </tr>
							
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <button class="btn btn-block btn-light">Continue Shopping</button>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <button class="btn btn-lg btn-block btn-success text-uppercase">Checkout</button>
                </div>
				<?php } ?>
            </div>
        </div>
    </div>
</div>



		
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>

	<!-- //newsletter -->
