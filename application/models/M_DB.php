<?php
defined('BASEPATH') or exit ('No Direct Script Access Allowed');

class M_DB extends CI_Model{

	function edit_data($where,$table){
		return $this->db->get_where($table,$where);
	}

	function get_data($table){
		return $this->db->get($table);
	}

	function insert_data($data,$table){
		$this->db->insert($table,$data);
	}

	function update_data($table,$data,$where){
		$this->db->update($table,$data,$where);
	}

	function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function deleteAll($table){
		$this->db->where_in('Id_Soal', $table);
		$this->db->delete('tbl_jawaban');
		$this->db->delete('banksoal');
	}

	function kosongkan_data($table){
		return $this->db->truncate($table);
	}

	function kodeAnggota($length){
		$str        = date("Ymd");//Y-m-d
		$characters = '0123456789';
		$max        = strlen($characters) - 1;
		for ($i = 0; $i < $length; $i++) {
			$rand = mt_rand(0, $max);
			$str .= $characters[$rand];
		}
		return $str;
	}

}