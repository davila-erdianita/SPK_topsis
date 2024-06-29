<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penilaian extends CI_Model {

	public function getAll_data($table,$data){
		return $this->db->order_by("length($data),$data",'ASC')->get($table)->result_array();
	}

	public function getAll(){
		$this->db->select('tbl_hasil_penilaian.id_data,tbl_alternatif.keterangan,tbl_hasil_penilaian.kode_kriteria,tbl_hasil_penilaian.kode_alternatif,tbl_hasil_penilaian.nilai');
		$this->db->from('tbl_hasil_penilaian');
		$this->db->join('tbl_alternatif','tbl_alternatif.kode_alternatif = tbl_hasil_penilaian.kode_alternatif','inner');
		$this->db->order_by('length(tbl_alternatif.kode_alternatif),tbl_alternatif.kode_alternatif','ASC');
		$this->db->order_by('length(tbl_hasil_penilaian.kode_kriteria),tbl_hasil_penilaian.kode_kriteria','ASC');
		$query = $this->db->get();
		return $query->result_array();
	} 

	public function kode_alternatif(){
		$this->db->select('distinct(kode_alternatif)');
		$this->db->from('tbl_hasil_penilaian');
		$this->db->order_by('length(kode_alternatif),kode_alternatif','asc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function insert_data($table,$data){
		return $this->db->insert($table,$data);
	}

	public function FindBy_id($kode){
		$this->db->select('*');
		$this->db->from('tbl_hasil_penilaian');
		$this->db->where('kode_alternatif',$kode);
		// $this->db->order_by('length(kode_alternatif),kode_alternatif','asc');
		$this->db->order_by('length(kode_kriteria),kode_kriteria','asc');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_id($kode){
		$this->db->select('id_data');
		$this->db->from('tbl_hasil_penilaian');
		$this->db->where('kode_alternatif',$kode);
		// $this->db->order_by('length(kode_alternatif),kode_alternatif','asc');
		$this->db->order_by('length(kode_kriteria),kode_kriteria','asc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function cek_data($id){
		$this->db->select('kode_alternatif');
		$this->db->from('tbl_hasil_penilaian');
		$this->db->where('id_data',$id);
		$this->db->order_by('length(kode_kriteria),kode_kriteria','asc');
		$query = $this->db->get();
		return $query->row();
	}

	public function cek_kode($kode){
		$this->db->select('kode_alternatif');
		$this->db->from('tbl_hasil_penilaian');
		$this->db->where('kode_alternatif',$kode);
		$this->db->order_by('length(kode_kriteria),kode_kriteria','asc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function update_data($tabel, $data, $where){
		// $query= $this->db->update($tabel, $data, $where);
		// return $query;
		$this->db->set($data);
		$this->db->where($where);
		$this->db->update($tabel);
		
	}

	public function delete_data($table,$where){
		$query = $this->db->delete($table,$where);
		return $query;
	}
}