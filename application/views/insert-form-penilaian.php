<div class="card mb-5">
  <div class="card-body">
    <div class="container" style="min-height: 420px">
    	<!-- <div class="row m-4" style="width: 100%"> -->
    		<!-- <form action="<?php echo base_url()."insert-penilaian";?>" method="POST">
    			<div class="form-group">
    				<label for="kode_alternatif">Alternatif</label>
    				<select name="kode_alternatif" class="form-control" id="kode_alternatif">
                        <option value="" selected>--pilih--</option>
    					<?php foreach ($alternatif as $d) : ?>
                            <option value="<?= $d['kode_alternatif'];?>"><?= $d['keterangan'];?></option>
                        <?php endforeach; ?>
                    </select>
                    <small><?php echo form_error('kode_alternatif');?></small>
    			</div>
    		</div>
    			<div class="row">
    				
	    			<?php $i=1;foreach($kriteria as $data):?>
		    			<div class="col">
			    			<div class="form-group">
			    				<label for="nilai"><?=$data['kode_kriteria']?></label>
			    				<input type="text" class="form-control" name="nilai_C<?=$i?>" id="nilai_C<?=$i?>">
			    				<small><?php echo form_error('nilai_C'.$i);
			    				$i++;
			    				?></small>
			    			</div>
		    			</div>
		    		<?php endforeach;?>
    			</div>
    			<button type="submit" class="btn btn-primary">Simpan</button>
    			<button type="reset" class="btn btn-secondary">Batal</button>
    		</form> -->
    	<!-- </div> -->

        <form action="<?php echo base_url()."insert-penilaian";?>" method="POST">
                <div class="form-group">
                    <label for="kode_alternatif">Alternatif</label>
                    <select name="kode_alternatif" class="form-control" id="kode_alternatif">
                        <option value="" selected>--pilih--</option>
                        <?php foreach ($alternatif as $d) : ?>
                            <option value="<?= $d['kode_alternatif'];?>"><?= $d['keterangan'];?></option>
                        <?php endforeach; ?>
                    </select>
                    <small><?php echo form_error('kode_alternatif');?></small>
                </div>
        <!--    </div> -->
                <div class="row">
                    
                    <?php $i=1;foreach($kriteria as $data):?>
                        <div class="col">
                            <div class="form-group">
                                <label for="nilai"><?=$data['keterangan']?></label>
                                <!-- <input type="text" class="form-control" name="nilai_C<?=$i?>" id="nilai_C<?=$i?>"> -->
                                <select name="nilai_C<?=$i?>" class="form-control" id="nilai_C<?=$i?>">
                                <option value="" selected>--pilih--</option>
                                <option value="3">Sangat Bagus</option>
                                <option value="2">Bagus</option>
                                <option value="1">Cukup Bagus</option>

                                </select>
                                <small><?php echo form_error('nilai_C'.$i);
                                $i++;
                                ?></small>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-secondary">Batal</button>
            </form>

    </div>
  </div>
</div>

