<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url','form');
	    $this->load->library(array('form_validation','session'));
		$this->load->model('M_kriteria');
		
	}
	public function index()
	{
		$data['kriteria'] = $this->M_kriteria->getAll('tbl_kriteria');
		$data['judul'] = 'Data Kriteria';
		$this->load->view('templates/header',$data);
		$this->load->view('data-kriteria',$data);
		$this->load->view('templates/footer');

		// echo"<pre>";
		// print_r($data);
		// echo"</pre>";

	}

	public function InsertForm(){
		$data['jenis'] = $this->M_kriteria->getAll_data('tbl_jenis','id_jenis');
		$data['judul'] = 'Insert Data Kriteria';
		$this->load->view('templates/header',$data);
		$this->load->view('insert-form-kriteria',$data);
		$this->load->view('templates/footer');
	}

	public function insert_data(){
		$this->form_validation->set_rules('kode_kriteria','kode_kriteria','required|min_length[2]|alpha_numeric');
		$this->form_validation->set_rules('id_jenis','id_jenis','required|max_length[1]|numeric');
		$this->form_validation->set_rules('keterangan','keterangan','required|max_length[20]');

		if ($this->form_validation->run() == false) {
           $this->session->set_flashdata('gagal_kriteria','Tidak berhasil tambah data');
	  		redirect(base_url('data-kriteria'), 'refresh');
        } else {
        	$kode_kriteria = $this->input->post('kode_kriteria',true);
         	$kode = ['kode_kriteria' => $kode_kriteria];
        	$cek = count($this->M_kriteria->cek_tabel('tbl_kriteria',$kode));

        	if($cek > 0){
        		$this->session->set_flashdata('gagal_kriteria','Data tidak berhasil ditambah. Duplikat kode kriteria!');
        	}else{
				$data = [
						'kode_kriteria' => $kode_kriteria,
						'id_jenis' => $this->input->post('id_jenis',true),
	        			'keterangan' => $this->input->post('keterangan',true)
	        			];

	        	$insert = $this->M_kriteria->insert_data('tbl_kriteria',$data);
		        if($insert){
	        		$this->session->set_flashdata('status_kriteria','Data berhasil ditambah');
	        	}else{
	        		$this->session->set_flashdata('gagal_kriteria','Data tidak berhasil ditambah.');
	        	}
        	}
        	redirect(base_url('data-kriteria'), 'refresh');
        }
	}

	public function UpdateForm($kode_kriteria){
		$kode = ['kode_kriteria' => $kode_kriteria];
		$data['kriteria'] = $this->M_kriteria->cek_tabel('tbl_kriteria',$kode);
		$data['jenis'] = $this->M_kriteria->getAll_data('tbl_jenis','id_jenis');
		$data['judul'] = 'Update Data Kriteria';
		$this->load->view('templates/header',$data);
		$this->load->view('update-form-kriteria',$data);
		$this->load->view('templates/footer');
		// echo"<pre>";
		// print_r($data);
		// echo"</pre>";
	}

	public function update_data(){
		// $this->form_validation->set_rules('kode_kriteria','kode_kriteria','required|min_length[2]|alpha_numeric');
		$this->form_validation->set_rules('id_jenis','id_jenis','required|max_length[1]|numeric');
		$this->form_validation->set_rules('keterangan','keterangan','required|max_length[20]');

		if ($this->form_validation->run() == false) {
           $this->session->set_flashdata('gagal_kriteria','Tidak berhasil ubah data');
	  		redirect(base_url('data-kriteria'), 'refresh');
        } else {
        	$kode_kriteria = $this->input->post('kode_kriteria',true);
         	$kode = ['kode_kriteria' => $kode_kriteria];
        	// $cek = count($this->M_kriteria->cek_tabel('tbl_kriteria',$kode));

        	// if($cek > 0){
        	// 	$this->session->set_flashdata('gagal_kriteria','Data tidak berhasil diubah. Duplikat kode kriteria!');
        	// }else{
				$data = [
						// 'kode_kriteria' => $kode_kriteria,
						'id_jenis' => $this->input->post('id_jenis',true),
	        			'keterangan' => $this->input->post('keterangan',true)
	        			];

	        	$update = $this->M_kriteria->update_data('tbl_kriteria',$data,$kode);
		        if($update){
	        		$this->session->set_flashdata('status_kriteria','Data berhasil diubah');
	        	}else{
	        		$this->session->set_flashdata('gagal_kriteria','Data tidak berhasil diubah.');
	        	}
        	// }
        	redirect(base_url('data-kriteria'), 'refresh');
        }
	}


	public function delete_data($kode_kriteria){
		$kode = ['kode_kriteria' => $kode_kriteria];
		$cek = count($this->M_kriteria->cek_tabel('tbl_hasil_penilaian',$kode));
		if($cek == 0){
			$delete = $this->M_kriteria->delete_data('tbl_kriteria',$kode);
			if($delete){
				$this->session->set_flashdata('status_kriteria','Data berhasil dihapus');
			}else{
				$this->session->set_flashdata('gagal_kriteria','Data tidak berhasil dihapus.');
			}
		}else{
			$this->session->set_flashdata('gagal_kriteria','Data tidak berhasil dihapus. Data kriteria berelasi dengan Data penilaian');
		}
		
		 redirect(base_url('data-kriteria'), 'refresh');
	}
}
