

<div class="container" style="min-height: 420px">
	<div class="row">
		<div class="col">
			<div class="card mb-5 pl-5 pr-5 pb-5">
				<div class="card-body">
					<h5 class="card-title" id="card-title">Daftar Data Alternatif</h5>
					<!-- <div class="row pt-2"> -->
               			<?php if($this->session->flashdata('status_alternatif')){?>
	                        <div class="alert alert-success">
	                                <?= $this->session->flashdata('status_alternatif')?>
	                        </div>
                      	<?php }elseif($this->session->flashdata('gagal_alternatif')){?>
	                        <div class="alert alert-danger">
	                                <?= $this->session->flashdata('gagal_alternatif')?>
	                        </div>
                       	<?php }?> 
    				<!-- </div>	 -->
    				<!-- <div class="row"> -->
    					<a href="<?php echo base_url()."insert-form-alternatif"?>" class="btn btn-sm btn-outline-info">tambah data</a>
    				<!-- </div> -->
					<div class="table-responsive">
						<table class="table mt-3">
							<thead>
								<tr>
									<th>No</th>
									<th>Kode</th>
									<th>Keterangan</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1; foreach($alternatif_list as $data):?>
								<tr>
									<td><?= $i++?></td>
									<td><?=$data['kode_alternatif']?></td>
									<td><?=$data['keterangan']?></td>
									<td><a href="<?php echo base_url()."delete-data-alternatif/".$data['kode_alternatif'];?>" id="del" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
	                                  <a href="<?php echo base_url()."update-form-alternatif/".$data['kode_alternatif'];?>" id="edit" class="btn btn-sm btn-outline-info"><i class="fas fa-edit"></i></a>
	                              </td>
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