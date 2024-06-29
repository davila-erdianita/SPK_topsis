<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url','form');
	    $this->load->library(array('form_validation','session'));
		$this->load->model('M_alternatif');
		$this->load->model('M_kriteria');
		$this->load->model('M_penilaian');
		
	}
	public function index()
	{
		$data['judul'] = 'Dashboard';
		$data['alternatif'] = count($this->M_alternatif->getAll('tbl_alternatif'));
		$data['kriteria'] = count($this->M_kriteria->getAll());

		if($data['kriteria'] == 0) $data['penilaian'] = 0;
		else $data['penilaian'] = count($this->M_penilaian->getAll())/$data['kriteria'];
		
		$this->load->view('templates/header',$data);
		$this->load->view('dashboard',$data);
		$this->load->view('templates/footer');

		// echo"<pre>";
		// print_r($data);
		// echo"</pre>";

	}
}
