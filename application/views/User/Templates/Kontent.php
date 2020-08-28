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
                 <?php
                    $this->load->view('User/Templates/About') 
                    ?>
                    
					<div class="clearfix"> </div>
					<div class="text-center">
					</div>
					</div>
					</div>
					</div>


					</div>

					<script>
						var bu_user = '<?= $bu_user ?>';

						$(document).ready(function() {
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

							function loadProduk() {
								$.ajax({
									type: "POST",
									dataType: 'json',
									url: "<?= $bu; ?>user/index",
									data: {				
										sort: $('.select_item').val(),					
									},
								}).done(function(e) {
									console.log(e);
									$('.w3ls_mobiles_grid_right_grid3').html('');

								}).fail(function(e) {
									console.log(e);

									
								});
							}




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
