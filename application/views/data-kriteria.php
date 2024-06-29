

<div class="container" style="min-height: 500px">
	<div class="row">
		<div class="col">
			<div class="card mb-5 pl-5 pr-5 pb-5">
				<div class="card-body">
					<h5 class="card-title" id="card-title">Daftar Data Kriteria</h5>
					<!-- <div class="row pt-2"> -->
               			<?php if($this->session->flashdata('status_kriteria')){?>
	                        <div class="alert alert-success">
	                                <?= $this->session->flashdata('status_kriteria')?>
	                        </div>
                      	<?php }elseif($this->session->flashdata('gagal_kriteria')){?>
	                        <div class="alert alert-danger">
	                                <?= $this->session->flashdata('gagal_kriteria')?>
	                        </div>
                       	<?php }?> 
    			<!-- 	</div>	 -->
    				<a href="<?php echo base_url()."insert-form-kriteria"?>" class="btn btn-sm btn-outline-info">tambah data</a>
					<div class="table-responsive">
						<table class="table mt-3">
							<thead>
								<tr>
									<th>No</th>
									<th>Kode</th>
									<th>Nama Jenis</th>
									<th>keterangan</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1; foreach($kriteria as $data):?>
								<tr>
									<td><?= $i++?></td>
									<td><?=$data['kode_kriteria']?></td>
									<td><?=$data['nama_jenis']?></td>
									<td><?=$data['keterangan']?></td>
									<!-- <td><?=$data['']?></td> -->
									<td><a href="<?php echo base_url()."kriteria/delete_data/".$data['kode_kriteria'];?>" id="del" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
	                                  <a href="<?php echo base_url()."kriteria/UpdateForm/".$data['kode_kriteria'];?>" id="edit" class="btn btn-sm btn-outline-info"><i class="fas fa-edit"></i></a>
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