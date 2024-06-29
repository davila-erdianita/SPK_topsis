<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url','form');
	    $this->load->library(array('form_validation','session'));
		$this->load->model('M_penilaian');
		$this->load->model('M_alternatif');
		$this->load->model('M_kriteria');
		
	}
	public function index()
	{
		$data['nilai'] = $this->M_penilaian->getAll();
		//$data['jml_alternatif'] = count($this->M_alternatif->getAll('tbl_alternatif'));
		$data['jml_alternatif'] = count($this->M_penilaian->kode_alternatif());
		$data['jml_kriteria'] = count($this->M_kriteria->getAll('tbl_kriteria'));
		$data['kriteria'] = $this->M_kriteria->getAll('tbl_kriteria');
		$data['judul'] = 'Data Penilaian';
		$this->load->view('templates/header',$data);
		$this->load->view('data-penilaian',$data);
		$this->load->view('templates/footer');

		// echo"<pre>";
		// print_r($data['nilai'][6]['keterangan']);
		// echo"</pre>";

		// echo"<pre>";
		// print_r($data);
		// echo"</pre>";

	}

	public function InsertForm(){
		$data['judul'] = 'Insert Data Penilaian';
		$data['alternatif'] = $this->M_penilaian->getAll_data('tbl_alternatif','kode_alternatif');
		$data['kriteria'] = $this->M_penilaian->getAll_data('tbl_kriteria','kode_kriteria');
		
		$this->load->view('templates/header',$data);
		$this->load->view('insert-form-penilaian',$data);
		$this->load->view('templates/footer');
	}

	public function insert_data(){
		$data['kriteria'] = $this->M_kriteria->getAll('tbl_kriteria');

		$this->form_validation->set_rules('kode_alternatif','kode_alternatif','required');

		for($i=1;$i<=count($data['kriteria']);$i++){
			$this->form_validation->set_rules('nilai_C'.$i,'nilai_C'.$i,'required');
		}

		if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('gagal_nilai','Tidak dapat tambah data.');
			redirect(base_url('data-penilaian'), 'refresh');
        }else{
        	$kode_alternatif = $this->input->post('kode_alternatif',true);
        	// $id_data = $this->input->post('id_data1',true);
        	// $cek = $this->M_penilaian->cek_data($id_data);//kode alternatif lama
			$cek2 = $this->M_penilaian->cek_kode($kode_alternatif);//kode alternatif sudah ada di tabel hasil atau belum,kalau belum baru bisa update;agar data tidak 
        

        	if(count($cek2) == 0){
        		$j=0;
	        	for($i=1;$i<=count($data['kriteria']);$i++){

		        	$data_nilai = [
		        					"kode_alternatif" => $kode_alternatif,
		        					"kode_kriteria" => $data['kriteria'][$j++]['kode_kriteria'],
		        					"id_user" => 1,
		        					"nilai" => $this->input->post('nilai_C'.$i,true)
		        	];

		        	

			 		$insert_data = $this->M_penilaian->insert_data('tbl_hasil_penilaian', $data_nilai);
// echo"<pre>";
// 		print_r($id_data);
// 		echo"</pre>";
			 	}
				
    		 }else{
    		 	//printf("error");
    		 	$this->session->set_flashdata('gagal_nilai','Tidak dapat tambah data.Duplikat Alternatif!');
	 			 redirect(base_url('data-penilaian'), 'refresh');
    		 }


        	$this->session->set_flashdata('status_nilai','Data berhasil disimpan');
			redirect(base_url('data-penilaian'), 'refresh');
        } 
	}
	


	public function UpdateForm($kode_alternatif){
		$data['judul'] = 'Ubah Data Penilaian';
		$data['kode_alternatif'] = $kode_alternatif;
		$data['nilai'] = $this->M_penilaian->FindBy_id($kode_alternatif);
		$data['alternatif'] = $this->M_alternatif->getAll('tbl_alternatif');
		$data['id'] = $this->M_penilaian->get_id($kode_alternatif);
		$this->load->view('templates/header',$data);
		$this->load->view('update-form-penilaian',$data);
		$this->load->view('templates/footer');
		// echo"<pre>";
		// print_r($data);
		// echo"</pre>";
		// var_dump($kode_alternatif);
	}

	public function update_data(){
		$data['kriteria'] = $this->M_kriteria->getAll('tbl_kriteria');

		$this->form_validation->set_rules('kode_alternatif','kode_alternatif','required');

		for($i=1;$i<=count($data['kriteria']);$i++){
			$this->form_validation->set_rules('nilai_C'.$i,'nilai_C'.$i,'required');
		}

		if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('gagal_nilai','Tidak dapat ubah data.');
			redirect(base_url('data-penilaian'), 'refresh');
        }else{
        	$kode_alternatif = $this->input->post('kode_alternatif',true);
        	$id_data = $this->input->post('id_data1',true);
        	$cek = $this->M_penilaian->cek_data($id_data);//kode alternatif lama
			$cek2 = $this->M_penilaian->cek_kode($kode_alternatif);//kode alternatif sudah ada di tabel hasil atau belum,kalau belum baru bisa update;agar data tidak 
        

        	if(($cek->kode_alternatif == $kode_alternatif)||(count($cek2) == 0)){


	        	for($i=1;$i<=count($data['kriteria']);$i++){

		        	$data_nilai = [
		        					"kode_alternatif" => $kode_alternatif,
		        					"nilai" => $this->input->post('nilai_C'.$i,true)
		        	];

		        	$id_data = [
						'id_data' => $this->input->post('id_data'.$i,true)
					];

			 		$update_data = $this->M_penilaian->update_data("tbl_hasil_penilaian", $data_nilai, $id_data);
// echo"<pre>";
// 		print_r($id_data);
// 		echo"</pre>";
			 	}
				
    		 }else{
    		 	//printf("error");
    		 	$this->session->set_flashdata('gagal_nilai','Tidak dapat ubah data.');
	 			 redirect(base_url('data-penilaian'), 'refresh');
    		 }


        	$this->session->set_flashdata('status_nilai','Data berhasil disimpan');
			redirect(base_url('data-penilaian'), 'refresh');
        } 
	}

	public function delete_data($kode_alternatif){
		$kode =[
						'kode_alternatif' => $kode_alternatif
		];

		$delete = $this->M_penilaian->delete_data('tbl_hasil_penilaian',$kode);
		if($delete){
			$this->session->set_flashdata('status_nilai','Data berhasil dihapus');
			redirect(base_url('data-penilaian'), 'refresh');
		}else{
			$this->session->set_flashdata('gagal_nilai','Data tidak berhasil dihapus.');
	 		redirect(base_url('data-penilaian'), 'refresh');
		}
	}
	
}
