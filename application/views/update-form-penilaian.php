<div class="card mb-5">
  <div class="card-body">
    <div class="container" style="min-height: 420px">
    	<!-- <div class="row m-4" style="width: 100%"> -->
    		<form action="<?php echo base_url()."update-penilaian";?>" method="POST">
    		<!-- 	<div class="row"> -->
    			<!-- <?php foreach ($id as $data) : ?>
    			<input type="hidden" name="id_data<?=$i?>" id="id_data<?=$i?>" value="<?=$data['id_data'];?>">
    			<?php endforeach; ?> -->
    			<div class="form-group">
    				<label for="kode_alternatif">Alternatif</label>
    				<select name="kode_alternatif" class="form-control" id="kode_alternatif">
    					<?php foreach ($alternatif as $d) : ?>
                            <option value="<?= $d['kode_alternatif'];?>"
                            	<?php if ($d['kode_alternatif'] == $kode_alternatif) : ?> selected<?php endif; ?>
                            	><?= $d['keterangan'];?></option>
                        <?php endforeach; ?>
                    </select>
                    <small><?php echo form_error('kode_alternatif');?></small>
    			</div>
    	<!-- 	</div> -->
    			<div class="row">
    				
	    			<?php $i=1;foreach($nilai as $data):?>
                    <input type="hidden" name="id_data<?=$i?>" id="id_data<?=$i?>" value="<?=$data['id_data'];?>">
                    
		    			<div class="col">
			    			<div class="form-group">
			    				<label for="nilai"><?=$data['kode_kriteria']?></label>
			    				<!-- <input type="text" class="form-control" name="nilai_C<?=$i?>" id="nilai_C<?=$i?>" value="<?=$data['nilai']?>"> -->
                                <select name="nilai_C<?=$i?>" class="form-control" id="nilai_C<?=$i?>">
                                
                                    <option value="3" <?php if($data['nilai'] == 3) echo "selected";?> >Sangat Bagus</option>
                                    <option value="2" <?php if($data['nilai'] == 2) echo "selected";?> >Bagus</option>
                                    <option value="1" <?php if($data['nilai'] == 1) echo "selected";?> >Cukup Bagus</option>
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
    	<!-- </div> -->

    </div>
  </div>
</div>

