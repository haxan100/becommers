					<?php

					$bu = base_url();
					$bu_user = $bu . 'user/';


					?>

					<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

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
						<div id="tes-carousel" class="carousel slide" data-ride="carousel">
							<!-- indikator -->
							<!-- <ol class="carousel-indicators">
								<li data-target="#tes-carousel" data-slide-to="0" class="active"></li>
								<li data-target="#tes-carousel" data-slide-to="1"></li>
								<li data-target="#tes-carousel" data-slide-to="2"></li>
							</ol> -->

							<div class="carousel-inner">
								<div class="item active">
									<img class="imagescourse" src="<?= base_url() ?>upload/images/banner/b1.jpg" alt="Demo 1">
								</div>

								<div class="item">
									<img class="imagescourse" src="<?= base_url() ?>upload/images/banner/bg1.jpg" alt="Demo 2">
								</div>

								<div class="item">
									<img class="imagescourse" src="<?= base_url() ?>upload/images/banner/bg2.jpg" alt="Demo 3">
								</div>
							</div>

							<!-- kontrol-->
							<a class="carousel-control left" href="#tes-carousel" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control right" href="#tes-carousel" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>
						<!-- <div class="banner">
							<div class="container">
								<h3>Electronic Store, <span>Special Offers</span></h3>
							</div>
						</div> -->
						<!-- <div class="w3ls_mobiles_grid_right_grid2_right">
							<select name="select_item" class="select_item">
								<option value="0">Default sorting</option>
								<option value="1">Sort by popularity</option>
								<option value="2">A-Z</option>
								<option value="3">Z-A</option>
								<option value="4">0-9</option>
								<option value="5">9-0</option>
							</select>
						</div> -->
						<div class="clearfix"> </div>
					</div>

					<div id="prodak">
						<?php
						foreach ($produk as $k) {
							// var_dump($k);
							// die;

						?>

							<div class="w3ls_mobiles_grid_right_grid3">
								<div class="col-md-4 agileinfo_new_products_grid agileinfo_new_products_grid_mobiles">
									<div class="agile_ecommerce_tab_left mobiles_grid">
										<div class="hs-wrapper hs-wrapper2">
											<?php
											if ($k->link_foto != null) {
												$makelink = true;
											?>
												<img src="<?php echo $k->link_foto; ?>" alt=" " class="img-responsive" />
												<img src="<?php echo $k->link_foto; ?>" alt=" " class="img-responsive" />
												<img src="<?php echo $k->link_foto; ?>" alt=" " class="img-responsive" />
												<img src="<?php echo $k->link_foto; ?>" alt=" " class="img-responsive" />
												<img src="<?php echo $k->link_foto; ?>" alt=" " class="img-responsive" />
											<?php } else {
												$makelink = false;

											?>
												<img src="<?php echo base_url() . "upload/images/produk/"; ?><?php echo $k->foto; ?>" alt=" " class="img-responsive" />
												<img src="<?php echo base_url() . "upload/images/produk/"; ?><?php echo $k->foto; ?>" alt=" " class="img-responsive" />
												<img src="<?php echo base_url() . "upload/images/produk/"; ?><?php echo $k->foto; ?>" alt=" " class="img-responsive" />
												<img src="<?php echo base_url() . "upload/images/produk/"; ?><?php echo $k->foto; ?>" alt=" " class="img-responsive" />
											<?php }

											?>


											<div class="w3_hs_bottom w3_hs_bottom_sub1">
												<ul>
													<li>
														<a href="#" data-toggle="modal" data-target="#myModal<?php echo $k->id_produk; ?>""><span class=" glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
													</li>
												</ul>
											</div>
										</div>
										<h5><a href="<?= base_url(); ?>user/detailproduk/<?php echo $k->link; ?>">
												<?php echo $k->nama_produk; ?> </a></h5> <i class="item_price">Rp.<?php echo formatUang($k->harga); ?></i>
										</p>

										<button class="btn btn-primary biz-bg-w-1 text-white biz-rad-10 px-2 biz-text-15 py-2 btn-tawar" data-produkid="<?php echo $k->id_produk; ?>" data-produknama="<?php echo $k->nama_produk; ?>" data-produkharga="<?php echo $k->harga; ?>">
											Tambah Ke Keranjang
										</button>
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
															<?php
															if ($makelink) {
															
															?>
															<img src="<?php echo $k->link_foto; ?>" alt=" " class="img-responsive" style=" max-width: 200px;" />
															<?php
															}else{															
															?>
															<img src="<?php echo base_url() . "upload/images/produk/"; ?><?php echo $k->foto; ?>" alt=" " class="img-responsive" style="
															max-width: 200px;" />
															<?php } ?>

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
																<p><i class="item_price">Rp.<?php echo formatUang($k->harga); ?></i></p>
																<form action="#" method="post">
																	<input type="hidden" name="cmd" value="_cart">
																	<input type="hidden" name="add" value="1">
																	<input type="hidden" name="w3ls_item" value="<?php echo $k->nama_produk; ?>">
																	<input type="hidden" name="amount" value="<?php echo $k->harga; ?>">

																	<button class="btn btn-primary biz-bg-w-1 text-white biz-rad-10 px-2 biz-text-15 py-2 btn-tawar" data-produkid="<?php echo $k->id_produk; ?>" data-produknama="<?php echo $k->nama_produk; ?>" data-produkharga="<?php echo $k->harga; ?>">
																		Tambah Ke Keranjang
																	</button>
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

						function formatUang($str, $withRp = 0)
						{
							return $withRp == 1
								? 'Rp. ' . number_format($str, 0, '.', ',')
								: number_format($str, 0, '.', ',');
						}

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
							$('.btn-tawar').on('click', function() {
								var id_produk = $(this).data('produkid');
								var harga = $(this).data('produkharga');
								var qty = 1;
								// console.log(harga)
								$('.btn-tawar').html('<i class="fas fa-spinner fa-spin"></i>');
								$('.btn-tawar').prop('disabled', true);
								$.ajax({
									type: "POST",
									dataType: 'json',
									url: "<?= $bu; ?>Cart/setBid",
									data: {
										id_produk: id_produk,
										harga: harga,
										qty: qty,
									},
								}).done(function(e) {
									// console.log(e);
									if (e.belumLogin) {
										setTimeout(() => {
											window.location = "<?= $bu; ?>loginUser";
										}, 2000);
									}
									if (e.status) {
										Swal.fire(
											':)',
											e.msg,
											'success'
										);
										setTimeout(function() {
											location.reload();
										}, 2000);

									} else {
										Swal.fire(
											'error',
											e.msg,
											'error'
										);
									}
								}).fail(function(e) {
									Swal.fire(
										'error',
										e.msg,
										'error'
									);

								}).always(function(e) {
									setTimeout(() => {
										$('.btn-tawar').html('Tambah Ke Keranjang');
										$('.btn-tawar').prop('disabled', false);
									}, 100);
								});
							})

							$('#post').submit(function(event) {

								var postingData = $(this).serializeArray();
								event.preventDefault();
								console.log(postingData)
								return false

								$.ajax({
									url: '<?= base_url(); ?>Cart/addCarst',
									type: "POST",
									data: postingData,
									dataType: 'json',
									success: function(data) {
										console.log(data);
									}
								});
							});

							$('.add_cart').click(function() {
								var id = $(this).data('produkid');
								var nama = $(this).data('produknama');
								var harga = $(this).data('produkharga');
								var qty = 1;

								console.log(id, nama, harga, qty);
								// return false;
								$.ajax({
									url: '<?= base_url(); ?>Cart/addCart',
									dataType: 'json',
									method: 'POST',
									data: {
										nama: nama,
										id: id,
										harga: harga,
										qty: qty,
									}
								}).done(function(e) {
									console.log('berhasil');
									// console.log(e);
									if (e.status) {
										console.log(e);

									} else {
										console.log(e);

										// notifikasi('#alertNotifModal', e.message, true);

									}

								}).fail(function(e) {

									// console.log(e);

									// resetForm($('#modalAdmin'));

									// $('#modalAdmin').modal('show');

									// notifikasi('#alertNotif', 'Terjadi kesalahan!', true);

								});

							});


							// var html = $(htmlString);
							// var body =  $('#prodak').html("ssss");
							// console.log(body)


							// // var bu = '<?= base_url(); ?>';
							// console.log(bu);
							// loadProduk();

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
