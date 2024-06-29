<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alternatif extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url','form');
	    $this->load->library(array('form_validation','session'));
		$this->load->model('M_alternatif');
		
	}
	public function index()
	{
		$data['alternatif_list'] = $this->M_alternatif->getAll('tbl_alternatif');
		$data['judul'] = 'Data Alternatif';
		$this->load->view('templates/header',$data);
		$this->load->view('data-alternatif',$data);
		$this->load->view('templates/footer');

		// echo"<pre>";
		// print_r($data);
		// echo"</pre>";

	}

	public function InsertForm(){
		$data['judul'] = 'Tambah Data Alternatif';
		$this->load->view('templates/header',$data);
		$this->load->view('insert-form-alternatif',$data);
		$this->load->view('templates/footer');
	}

	public function insert_data(){
		$this->form_validation->set_rules('kode_alternatif','kode_alternatif','required');
		$this->form_validation->set_rules('keterangan','keterangan','required');
		if ($this->form_validation->run() == false) {
           $this->session->set_flashdata('gagal_alternatif','Tidak berhasil tambah data');
	  		redirect(base_url('data-alternatif'), 'refresh');
        } else {
        	$kode_alternatif = $this->input->post('kode_alternatif',true);
        	$kode = ['kode_alternatif' => $kode_alternatif];
        	$cek = count($this->M_alternatif->cek_tabel_nilai('tbl_alternatif',$kode));

        	if($cek > 0){
        		$this->session->set_flashdata('gagal_alternatif','Data tidak berhasil ditambah. Duplikat kode alternatif!');
        	}else{
				$data = [
						'kode_alternatif' => $kode_alternatif,
	        			'keterangan' => $this->input->post('keterangan',true)
	        			];

	        	$insert = $this->M_alternatif->insert_data('tbl_alternatif',$data);
		        if($insert){
	        		$this->session->set_flashdata('status_alternatif','Data berhasil ditambah');
	        	}else{
	        		$this->session->set_flashdata('gagal_alternatif','Data tidak berhasil ditambah.');
	        	}
        	}
        	redirect(base_url('data-alternatif'), 'refresh');
        }
	}

	public function UpdateForm($kode_alternatif){
		$data['judul'] = 'Ubah Data Alternatif';
		$data['alternatif'] = $this->M_alternatif->FindBy_id($kode_alternatif);
		$this->load->view('templates/header',$data);
		$this->load->view('update-form-alternatif',$data);
		$this->load->view('templates/footer');

		// echo"<pre>";
		// print_r($data);
		// echo"</pre>";

		//var_dump($data);
	}

	public function update_data(){
		$this->form_validation->set_rules('keterangan','keterangan','required');
		if ($this->form_validation->run() == false) {
           $this->session->set_flashdata('gagal_alternatif','Tidak berhasil ubah data');
	  		redirect(base_url('data-alternatif'), 'refresh');
        } else {
        	$data = [
        			'keterangan' => $this->input->post('keterangan',true)
        			];
        	$kode_alternatif = [
        						'kode_alternatif' => $this->input->post('kode_alternatif',true)
        	];

        	$update = $this->M_alternatif->update_data('tbl_alternatif',$data,$kode_alternatif);
        	if($update){
        		$this->session->set_flashdata('status_alternatif','Data berhasil diubah');
        	}else{
        		$this->session->set_flashdata('gagal_alternatif','Data tidak berhasil diubah.');
        	}
        	redirect(base_url('data-alternatif'), 'refresh');
        }

	}

	public function delete_data($kode_alternatif){
		$kode = ['kode_alternatif' => $kode_alternatif];
		$cek_data = count($this->M_alternatif->cek_tabel_nilai('tbl_hasil_penilaian',$kode));
		print_r($cek_data);
		if($cek_data > 0){
			$this->session->set_flashdata('gagal_alternatif','Data tidak berhasil dihapus. Data berelasi dengan data nilai');
	  		redirect(base_url('data-alternatif'), 'refresh');
		}else{
			$delete = $this->M_alternatif->delete_data('tbl_alternatif',$kode);
			$this->session->set_flashdata('status_alternatif','Data berhasil dihapus');
		 	redirect(base_url('data-alternatif'), 'refresh');
		}
	}
}
