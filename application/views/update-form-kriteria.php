<div class="card mb-5">
  <div class="card-body">
    <div class="container" style="min-height: 420px">
    	<!-- <div class="row m-4" style="width: 100%"> -->
    		<form action="<?php echo base_url()."update-kriteria";?>" method="POST">
                <?php foreach($kriteria as $data):?>
                    <div>
                        <label>Kode Kriteria : <span style="color: blue;font-weight: bold;"><?=$data['kode_kriteria']?></span> </label>
                    </div>
                    <input type="hidden" class="form-control" name="kode_kriteria" id="kode_kriteria" value="<?=$data['kode_kriteria']?>">

                <div class="form-group">
                    <label for="id_jenis">Jenis</label>
                    <select name="id_jenis" class="form-control" id="id_jenis">
                        <?php foreach ($jenis as $item): ?>
                            <option value="<?=$item['id_jenis']?>"<?php if ($item['id_jenis'] == $data['id_jenis']):?>selected<?php endif;?> ><?=$item['nama_jenis']?></option>
                        <?php endforeach ?>
                    </select>
                    <small><?php echo form_error('id_jenis');?></small>
                </div> 

    			<div class="form-group">
    				<label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" id="keterangan" value="<?=$data['keterangan']?>">
                    <small><?php echo form_error('keterangan');?></small>
    			</div>
    	<!-- 	</div> -->
    			<button type="submit" class="btn btn-primary">Simpan</button>
    			<button type="reset" class="btn btn-secondary">Batal</button>
            <?php endforeach;?>
    		</form>
    	<!-- </div> -->

    </div>
  </div>
</div>

