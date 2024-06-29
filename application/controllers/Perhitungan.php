<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perhitungan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url','form');
	    $this->load->library(array('form_validation','session'));
		$this->load->model('M_topsis');
		
	}
	public function index()
	{	$data = $this->M_topsis->hitung();
		// $data['judul'] = 'Data Perhitungan';
		//$data['hasil_topsis'] = $this->M_topsis->hitung();
		$this->load->view('templates/header',$data);
		$this->load->view('data-perhitungan',$data);
		$this->load->view('templates/footer');
		// echo "<pre>";
  //               print_r($data);
  //               echo "</pre>";

	}
}
