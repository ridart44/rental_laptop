<div  class="ml-5 mr-5 container-flui">
	<button class="mb-3 btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_tambah_barang">
		<i class="fas fa-plus fa-sm"></i>Tambah Laptop
	</button>

	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Nama Laptop</th>
			<th>Merek</th>
			<th>Harga</th>
			<th>Ketersediaan</th>
			<th colspan="3">Aksi</th>
		</tr>
		<?php 
		$no=1;
		foreach ($laptop as $lpt) :  ?>
			<tr>
				<td><?php echo $no++?></td>
				<td><?php echo $lpt->nama_laptop ?></td>
				<td><?php echo $lpt->merek ?></td>
				<td><?php echo $lpt->harga ?></td>
				<td><?php echo $lpt->ketersediaan ?></td>
				<td><?php echo anchor('admin/data_laptop/edit/' .$lpt->id_laptop, '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>') ?>
        </td>
				<td><?php echo anchor('admin/data_laptop/hapus/' .$lpt->id_laptop, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>') ?></td>
			</tr>

		<?php endforeach; ?>
	</table>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'admin/data_laptop/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
        	
        	<div class="form-group">
        		<label>Nama Laptop</label>
        		<input type="text" name="nama_laptop" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>Merek</label>
        		<input type="text" name="merek" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>Harga</label>
        		<input type="text" name="harga" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>Ketersediaan</label>
        		<input type="text" name="ketersediaan" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>Gambar Laptop</label><br>
        		<input type="file" name="gambar" class="form-control">
        	</div>

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>

      </form>

    </div>
  </div>
</div>