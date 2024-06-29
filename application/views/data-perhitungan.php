<div class="container">
	<div class="row">
		<div class="col">
			<div class="card mb-5">
			  <div class="card-body m-3">
			  	<h4>Bobot</h4>
			  	<div class="table-responsive">
				    <table class="table">
				    	<thead>
				    		<tr>
				    			<th>No</th>
				    			<th>Bobot</th>
				    		</tr>
				    	</thead>
				    	<tbody>
				    		<?php $i=1;foreach($bobot as $data):?>
				    		<tr>
				    			<td><?=$i++;?></td>
				    			<td><?=$data;?></td>
				    		</tr>
				    	<?php endforeach;?>
				    	</tbody>
				    </table>
				</div>
			  </div>
			</div>
		</div>
	</div>

	
 
	<div class="row">
		<div class="col">
			<div class="card mb-5">
			  <div class="card-body m-3">
			  	<h4>Matriks Normalisasi</h4>
			  	<div class="table-responsive">
				    <table class="table">
				    	<thead>
				    		<tr>
				    			<th>No</th>
				    			<?php foreach($kriteria as $data):?>
				    				<th><?=$data;?></th>
				    			<?php endforeach;?>
				    		</tr>
				    	</thead>
				    	<!-- <tbody>
				    		<?php $no=1;
				    				$keys = array_keys($matriks_normalisasi);
				    				for($i=0;$i<count($matriks_normalisasi);$i++):
				    			?>
				    		<tr>
				    			<td><?=$no++;?></td>
				    			<?php foreach($matriks_normalisasi[$keys[$i]] as $key => $data):?>
				    			<td><?=$data;?></td>
				    		<?php endforeach;?>
				    		</tr>
				    		
				    	<?php endfor;?>
				    	</tbody> -->
				    	<tbody>
				    	
				    		<?php $i=1; foreach($matriks_normalisasi as $matriks):?>
				    			<tr>
				    				<td><?=$i++;?></td>
					    			<?php foreach($matriks as $key => $data):?>
					    						<td><?=round($data,4)?></td>
					    			<?php endforeach;?>
				    			</tr>
				    		<?php endforeach;?>

				    	</tbody>

				    </table>
				</div>
			  </div>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="col">
			<div class="card mb-5">
			  <div class="card-body m-3">
			  	<h4>Matriks Bobot</h4>
			  	<div class="table-responsive">
				    <table class="table mt-2">
				    	<thead>
				    		<tr>
				    			<th>No</th>
				    			<?php foreach($kriteria as $data):?>
				    				<th><?=$data;?></th>
				    			<?php endforeach;?>
				    		</tr>
				    	</thead>				    	
				    		<?php $i=1; foreach($matriks_bobot as $matriks):?>
				    			<tr>
				    				<td><?=$i++;?></td>
					    			<?php foreach($matriks as $key => $data):?>
					    						<td><?=round($data,4)?></td>
					    			<?php endforeach;?>
				    			</tr>
				    		<?php endforeach;?>

				    			<tr>
				    				<td style="font-weight: bolder;color: blue;">Positif Ideal :</td>
				    				<?php foreach($positif_ideal as $data):?>
				    					<td><?=round($data,4)?></td>
				    				<?php endforeach;?>
				    			</tr>

				    			<tr>
				    				<td style="font-weight: bolder;color: blue;">Negatif Ideal :</td>
				    				<?php foreach($negatif_ideal as $data):?>
				    					<td><?=round($data,4)?></td>
				    				<?php endforeach;?>
				    			</tr>
				    	</tbody>

				    </table>
				</div>
			  </div>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="col">
			<div class="card mb-5">
			  <div class="card-body m-3"><h4 style="margin-bottom: 0;">Jarak Alternatif</h4><br>
			  	<p style="margin-top: 0;">Solusi ideal bernilai positif dan negatif.</p>
			  	<div class="row">
				  	<div class="col" style="width: 50%">
					  	<div class="table-responsive">
						    <table class="table mt-2">
						    	<thead>
						    		<tr>
						    			<th>No</th>
						    			<th>D+</th>
						    		</tr>
						    	</thead>
						    	<tbody>
						    	
						    		<?php $i=1; foreach($D_positif as $data):?>
						    			<tr>
						    				<td><?=$i++;?></td>
						    				<td><?=round($data,4);?></td>
						    			</tr>
						    		<?php endforeach;?>

						    	</tbody>

						    </table>
						</div>
					</div>

					<div class="col" style="width: 50%">
					  	<!-- <h4>Jarak Alternatif(Solusi ideal bernilai negatif)</h4> -->
					  	<div class="table-responsive">
						    <table class="table mt-2">
						    	<thead>
						    		<tr>
						    			<th>No</th>
						    			<th>D-</th>
						    		</tr>
						    	</thead>
						    	<tbody>
						    	
						    		<?php $i=1; foreach($D_negatif as $data):?>
						    			<tr>
						    				<td><?=$i++;?></td>
						    				<td><?=round($data,4);?></td>
						    			</tr>
						    		<?php endforeach;?>

						    	</tbody>

						    </table>
						</div>
					</div>
				</div>


			  </div>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="col">
			<div class="card mb-5">
			  <div class="card-body m-3">
			  	<h4>Hasil Nilai Preferensi</h4>
			  	<div class="table-responsive">
				    <table class="table">
				    	<thead>
				    		<tr>
				    			<th>No</th>
				    			<th>Alternatif</th>
				    			<th>Keterangan</th>
				    			<th>Nilai Topsis</th>
				    		</tr>
				    	</thead>
				    	<tbody>
				    	
				    		<?php $i=1; foreach($hasil as $data):?>
				    			<tr>
				    				<td><?=$i++;?></td>
					    			<td><?=$data['kode_alternatif'];?></td>
					    			<td><?=$data['keterangan'];?></td>
					    			<td><?=round($data['nilai_topsis'],6);?></td>
				    			</tr>
				    		<?php endforeach;?>

				    	</tbody>

				    </table>
				</div>
			  </div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<div class="card mb-5">
			  <div class="card-body m-3">
			  	<h4>Hasil Nilai Peringkat</h4>
			  	<div class="table-responsive">
				    <table class="table">
				    	<thead>
				    		<tr>
				    			<th>No</th>
				    			<th>Alternatif</th>
				    			<th>Keterangan</th>
				    			<th>Nilai Topsis</th>
				    		</tr>
				    	</thead>
				    	<tbody>
				    	
				    		<?php $i=1; foreach($pengurutan as $data):?>
				    			<tr>
				    				<td><?=$i++;?></td>
					    			<td><?=$data['kode_alternatif'];?></td>
					    			<td><?=$data['keterangan'];?></td>
					    			<td><?=round($data['nilai_topsis'],6);?></td>
				    			</tr>
				    		<?php endforeach;?>

				    	</tbody>

				    </table>
				</div>
			  </div>
			</div>
		</div>
	</div>

 
</div>