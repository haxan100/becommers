	<!-- banner -->
	<div class="banner banner10">
		<div class="container">
			<h2>Tentang Kami</h2>
		</div>
	</div>
	<?php
	$ongkir = 15000;	
	$bu = base_url();
	$bu_user = $bu . 'user/';
	?>
	<style>
	img{
		
    max-width: 100px;


	}
	.dataTables_filter,.dataTables_paginate {
		display: none;
		}
	.formInput {
    display: table-caption;
    max-width: 35%;
    height: 33px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}
	
	</style>
	<!-- //banner -->
	<!-- breadcrumbs -->
	<div class="breadcrumb_dress">
		<div class="container mb-7">
			<ul>
				<li><a href="<?php echo base_url() . "templates/user/"; ?>index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>Tentang Kami</li>
			</ul>
		</div>
	</div>
	<!-- //breadcrumbs -->
	<!-- about -->
<div class="container  mt-4 mb-7">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped mt-4" id="keranjang">
                    <thead>
                        <tr>
                            <th scope="col"> No</th>
                            <th scope="col">Foto </th>
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
                            <td><img src="<?= base_url() ?>upload/images/produk/<?= $k->foto?>" /> </td>
                            <td> <?= $k->nama_produk?></td>

                            <td><button class="btn btn-primary" type="button">-</button>
							
							<input class="formInput" type="text" value="<?= $k->qty?>" />

							<button class="btn btn-primary" type="button">+</button></td>

						
                            <td class="text-right">
							<?= $k->harga?>
							</td>

                            <td class="text-right"><?= $total?></td>
                            <td class="text-right"><button class="btn btn-sm btn-danger btnHapus"><i class="fa fa-trash"></i> </button> </td>
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
					<tfoot>
                            <tr>
                                <th colspan="6" style="text-align:right">Totalnya <?= $ongkir + $subtotal ?></th>
                                <th ></th>
                            </tr>
                        </tfoot>
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

	<script type="text/javascript">
	document.addEventListener("DOMContentLoaded", function(event) {
			var bu_user = '<?= $bu_user ?>';
			var bu = '<?= base_url(); ?>';

			var datatable = $('#keranjang').DataTable({
				dom: "Bfrltip",
				// 'pageLength': 10,
				 "lengthChange":false,
				"responsive": true,
				"processing": true,
				"bProcessing": true,
				"autoWidth": false,
				"serverSide": true,
				    //  "paging":   false,
					"ordering": false,
					"info":     false,
				"columnDefs": [{
						"targets": 0,
						"className": "dt-body-center dt-head-center",
						"width": "20px",
						"orderable": false
					},
					{
						"targets": 1,
						"className": "dt-head-center"
					},
					{
						"targets": 2,
						"className": "dt-head-center"
					}
				],
				"order": [
					[1, "desc"]
				],
				'ajax': {
					url: bu + 'Cart/getAllCartByUser',
					type: 'POST',
					"data": function(d) {
						return d;
					}
				},

			});


		$('body').on('click', '.btnMinus', function() {
				var id_keranjang = $(this).data('id_keranjang');
				var qty = 1;
				var stat = 0;
				// console.log(harga)
				$('.btn-tawar').html('<i class="fas fa-spinner fa-spin"></i>');
				$('.btn-tawar').prop('disabled', true);
				$.ajax({
					type: "POST",
					dataType: 'json',
					url: "<?= $bu; ?>Cart/updateQtyCart",
					data: {
						id_keranjang: id_keranjang,
						stat: stat,
						qty: qty,
					},
				}).done(function(e) {
					if (e.status) {
					datatable.ajax.reload();
					} else {
						
					Swal.fire(
						'error',
							e.msg,
							'error'
						);
					}
				});
		});
		$('body').on('click', '.btnPlus', function() {
			var id_keranjang = $(this).data('id_keranjang');
			var qty = 1;
			var stat = 1;
			// console.log(harga)
			$('.btn-tawar').html('<i class="fas fa-spinner fa-spin"></i>');
			$('.btn-tawar').prop('disabled', true);
			$.ajax({
				type: "POST",
				dataType: 'json',
				url: "<?= $bu; ?>Cart/updateQtyCart",
				data: {
					id_keranjang: id_keranjang,
					stat: stat,
					qty: qty,
				},
			}).done(function(e) {
				if (e.status) {
				datatable.ajax.reload();
				} else {
					
				Swal.fire(
					'error',
						e.msg,
						'error'
					);
				}
			});
		});

		$('body').on('click', '.btnHapus', function() {
				var id_keranjang = $(this).data('id_keranjang');
				Swal.fire({
					title: 'Apakah Anda Yakin ?',
					text: "Anda akan Menghapus item dari keranjang ? ",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes, delete it!'
				}).then((result) => {
					if (result.value) {
						$.ajax({
							type: "POST",
							dataType: 'json',
							url: "<?= $bu; ?>Cart/hapusQtyCart",
							data: {
								id_keranjang: id_keranjang
							}
						}).done(function(e) {
							// console.log(e);
							Swal.fire(
								'Deleted!',
								e.message,
								'success'
							)							
								datatable.ajax.reload();
							
						}).fail(function(e) {
							console.log('gagal');
							console.log(e);
							var message = 'Terjadi Kesalahan. #JSMP01';
						});




					}
				})




			});








	});	
	</script>

	<!-- //newsletter -->
