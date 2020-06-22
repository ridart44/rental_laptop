<div class="container-fluid">
	<div class="card">
	  <h5 class="card-header">
	    Detail Laptop
	  </h5>
	  <div class="card-body">

	  	<?php foreach ($laptop as $lpt) :  ?>
	    <div class="row">
	    	<div class="col-md-4">
	    		<img src="<?php echo base_url().'/upload/'.$lpt->gambar ?>" class="card-img-top" >
	    	</div>	
	    	<div class="col-md-8">
	    		<table class="table">	
    				<tr>
    					<td>Nama Laptop</td>
    					<td><strong><?php echo $lpt->nama_laptop ?></strong></td>
    				</tr>
    				<tr>
    					<td>Merek</td>
    					<td><strong><?php echo $lpt->merek ?></strong></td>
    				</tr>
    				<tr>
    					<td>Ketersediaan</td>
    					<td><strong><?php echo $lpt->ketersediaan ?></strong></td>
    				</tr>
    				<tr>
    					<td>Harga</td>
    					<td><strong><div class="btn btn-sm btn-success">Rp.<?php echo number_format($lpt->harga,0,',','.') ?></div></strong></td>
    				</tr>
	    			
	    		</table>

	    		<?php echo anchor('dashboard/tambah_book/' .$lpt->id_laptop, '<div class="btn  btn-primary">Book</div>') ?>

	    		<?php echo anchor('welcome/index/' , '<div class="btn  btn-danger">Kembali</div>') ?>



	    	</div>
	    </div>
	    <?php endforeach; ?>
	  </div>
	</div>

</div>