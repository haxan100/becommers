					<?php

					$bu = base_url();
					$bu_user = $bu . 'user/';


					?>


					<div class="clearfix"> </div>
					<style>
						.agile_ecommerce_tab_left {
							border-radius: 25px;
							background-color: #edeef1;
							margin-bottom: 15px;
						}
					</style>

					<div class="w3ls_mobiles_grid_right_grid2">
						<div class="w3ls_mobiles_grid_right_grid2_left">
							<!-- <h3>Showing Results: 0-1</h3> -->
						</div>
							<div class="banner">
								<div class="container">
									<h3>Electronic Store, <span>Special Offers</span></h3>
								</div>
							</div>
						<div class="w3ls_mobiles_grid_right_grid2_right">
							<select name="select_item" class="select_item">
								<option value="0">Default sorting</option>
								<option value="1">Sort by popularity</option>
								<option value="2">A-Z</option>
								<option value="3">Z-A</option>
								<option value="4">0-9</option>
								<option value="5">9-0</option>
							</select>
						</div>
						<div class="clearfix"> </div>
					</div>
					
					<div id="prodak">
					<?php
					foreach ($produk as $k) {
					?>

						<div class="w3ls_mobiles_grid_right_grid3">
							<div class="col-md-4 agileinfo_new_products_grid agileinfo_new_products_grid_mobiles">
								<div class="agile_ecommerce_tab_left mobiles_grid">
									<div class="hs-wrapper hs-wrapper2">
										<img src="<?php echo base_url() . "upload/images/produk/"; ?><?php echo $k->foto; ?>" alt=" " class="img-responsive" />
										<img src="<?php echo base_url() . "upload/images/produk/"; ?><?php echo $k->foto; ?>" alt=" " class="img-responsive" />
										<img src="<?php echo base_url() . "upload/images/produk/"; ?><?php echo $k->foto; ?>" alt=" " class="img-responsive" />
										<img src="<?php echo base_url() . "upload/images/produk/"; ?><?php echo $k->foto; ?>" alt=" " class="img-responsive" />
										<img src="<?php echo base_url() . "upload/images/produk/"; ?><?php echo $k->foto; ?>" alt=" " class="img-responsive" />
										<div class="w3_hs_bottom w3_hs_bottom_sub1">
											<ul>
												<li>
													<a href="#" data-toggle="modal" data-target="#myModal<?php echo $k->id_produk; ?>""><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
												</li>
											</ul>
										</div>
									</div>
									<h5><a href="single.html"> <?php echo $k->nama_produk; ?> </a></h5> <i class="item_price"><?php echo $k->harga; ?></i></p>
									<form action="#" method="post">
										<input type="hidden" name="cmd" value="_cart" />
										<input type="hidden" name="add" value="1" />
										<input type="hidden" name="w3ls_item" value="<?php echo $k->nama_produk; ?>" />
										<input type="hidden" name="amount" value="<?php echo $k->harga; ?>" />
										<button type="submit" class="w3ls-cart">Add to cart</button>

										 <button class="add_cart btn btn-success btn-block" data-produkid="<?php echo $k->id_produk;?>" data-produknama="<?php echo $k->nama_produk;?>" data-produkharga="<?php echo $k->harga;?>">Add To Cart</button>
                        
									</form>
								</div>

									<!-- modal-video -->
							<div class="modal video-modal fade" id="myModal<?php echo $k->id_produk; ?>" tabindex="-1" role="dialog" aria-labelledby="myModal<?php echo $k->id_produk; ?>">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
										</div>
										<section>
											<div class="modal-body">
												<div class="col-md-8 modal_body_left">
													<img src="<?php echo base_url() . "upload/images/produk/"; ?><?php echo $k->foto; ?>" alt=" " class="img-responsive" style="
															max-width: 200px;" />
												</div>
												<div class="col-md-4 modal_body_right">
													<h4><?php echo $k->nama_produk; ?></h4>
													<p><?php echo $k->deskripsi; ?></p>
													<div class="rating">
														<div class="rating-left">

														</div>
														<div class="clearfix"> </div>
													</div>
													<div class="modal_body_right_cart simpleCart_shelfItem">
														<p><i class="item_price"><?php echo $k->harga; ?></i></p>
														<form action="#" method="post">
															<input type="hidden" name="cmd" value="_cart">
															<input type="hidden" name="add" value="1"> 
															<input type="hidden" name="w3ls_item" value="<?php echo $k->nama_produk; ?>"> 
															<input type="hidden" name="amount" value="<?php echo $k->harga; ?>">   
															<button type="submit" class="w3ls-cart">Add to cart</button>
														</form>
													</div>
												</div>
												<div class="clearfix"> </div>
											</div>
										</section>
									</div>
								</div>
							</div>
							<!-- akhir modal -->






								<div class="mobiles_grid_pos">
									<h6>New</h6>
								</div>
							</div>
						</div>
						</div>
					<?php 	}



					?>
					</div>
					<div class="clearfix"> </div>
					<div class="text-center">
						<?php
						echo $this->pagination->create_links();
						?>
					</div>
					</div>
					</div>
					</div>


					</div>

					<script>
						var bu_user = '<?= $bu_user ?>';

						$(document).ready(function() {

							        $('.add_cart').click(function(){
											var produk_id    = $(this).data("produkid");
											var produk_nama  = $(this).data("produknama");
											var produk_harga = $(this).data("produkharga");
											var quantity     = $('#' + produk_id).val();

											console.log(produk_id,produk_nama,produk_harga,quantity);
											return false;
											$.ajax({
												url : "<?php echo base_url();?>index.php/cart/add_to_cart",
												method : "POST",
												data : {produk_id: produk_id, produk_nama: produk_nama, produk_harga: produk_harga, quantity: quantity},
												success: function(data){
													$('#detail_cart').html(data);
												}
											});
										});


							// var html = $(htmlString);
							// var body =  $('#prodak').html("ssss");
							// console.log(body)


							// // var bu = '<?= base_url(); ?>';
							// console.log(bu);
							loadProduk();

							$(".select_item").change(function() {
								var s = $('.select_item').val();
								// alert(s);
								// console.log(s)
								loadProduk()


							});
							var s = $('.select_item').val();

							// console.log(s)

							// function loadProduk() {
							// 	$.ajax({
							// 		type: "POST",
							// 		dataType: 'json',
							// 		url: "<?= $bu; ?>user/index",
							// 		data: {				
							// 			sort: $('.select_item').val(),					
							// 		},
							// 	}).done(function(e) {
							// 		console.log(e);
							// 		$('.w3ls_mobiles_grid_right_grid3').html('');

							// 	}).fail(function(e) {
							// 		// console.log(e);
							// 		// $('.w3ls_mobiles_grid_right_grid3').innerHTML(e);


									
							// 	});
							// }




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
