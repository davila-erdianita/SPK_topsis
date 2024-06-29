<div class="card mb-5">
  <div class="card-body">
    <div class="container" style="min-height: 420px">
    	<!-- <div class="row m-4" style="width: 100%"> -->
    		<form action="<?php echo base_url()."update-alternatif";?>" method="POST">
    			<div class="form-group">
    				<label for="keterangan">Keterangan</label>
    				<input type="hidden" name="kode_alternatif" id="kode_alternatif" value="<?=$alternatif[0]['kode_alternatif'];?>">
                    <input type="text" class="form-control" name="keterangan" id="keterangan" value="<?=$alternatif[0]['keterangan'];?>">
                    <small><?php echo form_error('keterangan');?></small>
    			</div>
    	<!-- 	</div> -->
    			<button type="submit" class="btn btn-primary">Simpan</button>
    			<button type="reset" class="btn btn-secondary">Batal</button>
    		</form>
    	<!-- </div> -->

    </div>
  </div>
</div>

