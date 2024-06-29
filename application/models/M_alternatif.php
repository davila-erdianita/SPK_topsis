<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_alternatif extends CI_Model {

	public function getAll($tabel){
		return $this->db->order_by('length(kode_alternatif),kode_alternatif','ASC')->get($tabel)->result_array();
	}

	public function insert_data($tabel, $data){
        $query= $this->db->insert($tabel,$data);
        return $query;
    }

	public function FindBy_id($kode_alternatif){
		$this->db->select('*');
		$this->db->from('tbl_alternatif');
		$this->db->where('kode_alternatif',$kode_alternatif);
		$query = $this->db->get();
		return $query->result_array();
	} 

	public function delete_data($table,$where){
		$query = $this->db->delete($table,$where);
		return $query;
	}

	public function cek_tabel_nilai($table,$kode_alternatif){
		return $this->db->get_where($table,$kode_alternatif)->result_array();
	}

	public function update_data($table,$data,$where){
		return $this->db->update($table,$data,$where);
	}
	
}