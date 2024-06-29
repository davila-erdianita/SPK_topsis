<div class="card mb-5">
  <div class="card-body">
    <div class="container" style="min-height: 420px">
    	<div class="row mt-4">
    		<div class="col">
    			<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
				  <div class="card-header">Data Alternatif</div>
				  <div class="card-body">
				    <h5 class="card-title"><?php if($alternatif) $alternatif;
				    							 else echo"0";?> Data</h5>
				    <p class="card-text"></p>
				    <a href="<?=base_url()?>data-alternatif" style="padding-left:70%;color: white">Detail > </a>
				  </div>
				</div>
    		</div>

    		<div class="col">
    			<div class="card bg-light mb-3" style="max-width: 18rem;">
				  <div class="card-header">Data Kriteria</div>
				  <div class="card-body">
				    <h5 class="card-title"><?php if($kriteria) $kriteria;
				    							 else echo"0";?> Data</h5>
				    <p class="card-text"></p>
				    <a href="<?=base_url()?>data-kriteria" style="padding-left:70%;color: black">Detail > </a>
				  </div>
				</div>
    		</div>
 
       		<div class="col">
    			<div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
				  <div class="card-header">Data Penilaian</div>
				  <div class="card-body">
				    <h5 class="card-title"><?php if($penilaian) $penilaian;
				    							 else echo"0";?> Data</h5>
				    <p class="card-text"></p>
				    <a href="<?=base_url()?>data-penilaian" style="padding-left:70%;color: white">Detail > </a>
				  </div>
				</div>
    		</div>
    	</div>

    	
    </div>
  </div>
</div>

