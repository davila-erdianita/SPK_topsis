

<div class="container" style="min-height: 420px">
	<div class="row">
		<div class="col">
			<div class="card mb-5 pl-5 pr-5 pb-5">
				<div class="card-body">
					<h5 class="card-title" id="card-title">Daftar Data Penilaian</h5>
					<!-- <div class="row pt-2"> -->
               			<?php if($this->session->flashdata('status_nilai')){?>
	                        <div class="alert alert-success">
	                                <?= $this->session->flashdata('status_nilai')?>
	                        </div>
                      	<?php }elseif($this->session->flashdata('gagal_nilai')){?>
	                        <div class="alert alert-danger">
	                                <?= $this->session->flashdata('gagal_nilai')?>
	                        </div>
                       	<?php }?> 
    			<!-- 	</div>	 -->
    				<a href="<?php echo base_url()."insert-form-penilaian"?>" class="btn btn-sm btn-outline-info">tambah data</a>
					<?php $awal=0;?>
					<div class="table-responsive">
						<table class="table mt-3">
							<thead>
								<tr>
									<th>No</th>
									<th>Alternatif</th>
									<?php $j = 0; foreach($kriteria as $data):
										if($j != $jml_kriteria){?>
											<th><?=$data['kode_kriteria']?></th>
											<?php $j++?>
										<?php } endforeach;?>								 
									<th></th>
									<!-- <th>keterangan</th> -->
								</tr>
							</thead>
							<tbody>
								<?php $i=1; foreach($nilai as $data):?>
								<tr>
									<td><?= $i++?></td>
									<!-- <td><?=$data['keterangan']?></td> -->
									<?php
										if($awal == 0){
											$j= $awal;
											$akhir=$jml_kriteria;
										}else if($awal == $akhir){
											$akhir = $awal+$jml_kriteria;
											$j = $awal;
										}
										if($awal % $jml_kriteria == 0):?>
										 	<td><?=$nilai[$awal]['keterangan']?></td>
										 <?php endif;

										for ($k=$awal; $k < $akhir; $k++):?>
											<td><?=$nilai[$k]['nilai']?></td>
											<!-- <td><?=$k;?></td> -->
									<?php
											$awal++;
										endfor;

										
									?>
									<td><a href="<?php echo base_url()."delete-data-penilaian/".$nilai[$j]['kode_alternatif'];?>" id="del" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
	                                  <!-- <a href="<?php echo base_url()."update-form-penilaian/".$nilai[$j]['kode_alternatif'];?>" id="edit" class="btn btn-sm btn-outline-info"><i class="fas fa-edit"></i></a> -->
	                                  <a href="<?php echo base_url("update-form-penilaian/".$nilai[$j]['kode_alternatif']);?>" id="edit" class="btn btn-sm btn-outline-info"><i class="fas fa-edit"></i></a>
	                              </td>
								</tr>
							<?php 	if($i == $jml_alternatif+1){
										break;
									}
								endforeach;?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>