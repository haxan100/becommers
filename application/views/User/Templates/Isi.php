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
							<h3>Showing Results: 0-1</h3>
						</div>
						<div class="w3ls_mobiles_grid_right_grid2_right">
							<select name="select_item" class="select_item">
								<option selected="selected">Default sorting</option>
								<option>Sort by popularity</option>
								<option>Sort by average rating</option>
								<option>Sort by newness</option>
								<option>Sort by price: low to high</option>
								<option>Sort by price: high to low</option>
							</select>
						</div>
						<div class="clearfix"> </div>
					</div>


					<?php
					foreach ($produk as $k) {
						// echo $k->nama_produk;
						# code...
					?>

						<div class="w3ls_mobiles_grid_right_grid3">
							<div class="col-md-4 agileinfo_new_products_grid agileinfo_new_products_grid_mobiles">
								<div class="agile_ecommerce_tab_left mobiles_grid">
									<div class="hs-wrapper hs-wrapper2">
										<img src="<?php echo base_url() . "templates/user/"; ?>images/31.jpg" alt=" " class="img-responsive" />
										<img src="<?php echo base_url() . "templates/user/"; ?>images/30.jpg" alt=" " class="img-responsive" />
										<img src="<?php echo base_url() . "templates/user/"; ?>images/27.jpg" alt=" " class="img-responsive" />
										<img src="<?php echo base_url() . "templates/user/"; ?>images/28.jpg" alt=" " class="img-responsive" />
										<img src="<?php echo base_url() . "templates/user/"; ?>images/29.jpg" alt=" " class="img-responsive" />
										<div class="w3_hs_bottom w3_hs_bottom_sub1">
											<ul>
												<li>
													<a href="#" data-toggle="modal" data-target="#myModal9"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
												</li>
											</ul>
										</div>
									</div>
									<h5><a href="single.html"> <?php echo $k->nama_produk; ?> </a></h5> <i class="item_price">$245</i></p>
									<form action="#" method="post">
										<input type="hidden" name="cmd" value="_cart" />
										<input type="hidden" name="add" value="1" />
										<input type="hidden" name="w3ls_item" value="Smart Phone" />
										<input type="hidden" name="amount" value="245.00" />
										<button type="submit" class="w3ls-cart">Add to cart</button>
									</form>
								</div>
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
					</div>
					</div>
					</div>
