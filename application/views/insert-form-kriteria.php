<div class="card mb-5">
  <div class="card-body">
    <div class="container" style="min-height: 420px">
    	<!-- <div class="row m-4" style="width: 100%"> -->
    		<form action="<?php echo base_url()."insert-kriteria";?>" method="POST">
                <div class="form-group">
                    <label for="kode_kriteria">Kode Kriteria</label>
                    <input type="text" class="form-control" name="kode_kriteria" id="kode_kriteria">
                    <small><?php echo form_error('kode_kriteria');?></small>
                </div>

                <div class="form-group">
                    <label for="id_jenis">Jenis</label>
                    <select name="id_jenis" class="form-control" id="id_jenis">
                        <option value="" selected="selected" hidden="hidden">--Pilih--</option>
                        <?php foreach ($jenis as $data): ?>
                            <option value="<?=$data['id_jenis']?>"><?=$data['nama_jenis']?></option>
                        <?php endforeach ?>
                    </select>
                    <small><?php echo form_error('id_jenis');?></small>
                </div>

    			<div class="form-group">
    				<label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" id="keterangan">
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

