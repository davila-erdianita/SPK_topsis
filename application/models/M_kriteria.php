<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kriteria extends CI_Model {

	public function getAll_data($tabel,$data){
		// printf($data);
		return $this->db->order_by("length($data),$data",'ASC')->get($tabel)->result_array();
	} 
	public function getAll(){
		$this->db->select('*');
		$this->db->from('tbl_kriteria');
		$this->db->join('tbl_jenis','tbl_kriteria.id_jenis = tbl_jenis.id_jenis','inner');
		$this->db->order_by('length(kode_kriteria),kode_kriteria','ASC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function cek_tabel($table,$where){
		return $this->db->get_where($table,$where)->result_array();
	}

	public function insert_data($table,$data){
		return $this->db->insert($table,$data);
	}

	public function update_data($table,$data,$where){
		return $this->db->update($table,$data,$where);
	}

	public function delete_data($table,$where){
		return $this->db->delete($table,$where);
	}
	
}