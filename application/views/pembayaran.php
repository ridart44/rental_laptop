<div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="btn btn-sm btn-success">
				<?php 
				$grand_total = 0;
				if($book_list = $this->cart->contents()) 
				{
					foreach ($book_list as $item) 
					{
						$grand_total = $grand_total + $item['subtotal'];
					}
				echo "<h4>Total Bayar : Rp.".number_format($grand_total,0,',','.');
				

				?>
				</div>
				<br><br><br>
				<h3>Input Pembayaran</h3>
				<form method="post" action="<?php echo base_url() ?>dashboard/proses_bayar">
					
					<div class="form-group">
						<label>Metode Bayar</label>
						<select>
							<option>BNI - 984847</option>
							<option>BCA - 372837</option>
							<option>BRI - 876895</option>
							<option>OVO - 668857</option>
						</select>

					</div>

					<button type="submit" class="mb-3 btn btn-sm btn-primary">Bayar</button>
					<?php echo anchor('dashboard/detail_booking' , '<div class="btn btn-sm mb-3 btn-danger">Kembali</div>') ?>					
				</form>
				<?php  
				}
				else
				{
					echo "<h3>Anda Belum Booking Apapun</h4>";
				}
				?>

				</div>
		<div class="col-md-8"></div>
	</div>
</div>