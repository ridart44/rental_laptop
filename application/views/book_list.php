<div class="container-fluid">
	<h4>Daftar Booking Anda</h4>

	<table class="table table-borderd table-striped table-hover">
		<tr >
			<th>No</th>
			<th>Nama Laptop</th>
			<th>Durasi</th>
			<th>Harga</th>
			<th>Sub-Total</th>
		</tr>

		<?php 
		$no = 1;
		foreach ($this->cart->contents() as $items ) : ?>

			<tr>
				<td ><?php echo $no++ ?></td>
				<td><?php echo $items['name'] ?></td>
				<td align="right"><?php echo $items['qty'] ?> Jam</td>
				<td align="right">Rp. <?php echo number_format($items['price'],0,',','.') ?></td>
				<td align="right">Rp. <?php echo number_format($items['subtotal'],0,',','.') ?></td>
			</tr>

		<?php endforeach; ?>

			<tr>
				<td colspan="4"></td>
					<td align="right">Rp. <?php echo number_format($this->cart->total(),0,',','.') ?></td>
			</tr>
		
	</table>

	<div align="right">
		<a href="<?php echo base_url('dashboard/hapus_book') ?>"><div class="btn btn-sm btn-danger">Hapus Booking</div></a>
		<a href="<?php echo base_url('dashboard/index') ?>"><div class="btn btn-sm btn-primary">Lanjut Tambah Laptop</div></a>
		<a href="<?php echo base_url('dashboard/pembayaran') ?>"><div class="btn btn-sm btn-success">Pebayaran</div></a>

	</div>
</div>