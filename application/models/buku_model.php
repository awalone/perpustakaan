<?php

	class Buku_model extends CI_Model {
		function __construct() {
			parent::__construct();
		}
		
		var $table = 'perpustakaan_buku';
		var $primaryKey = 'buku_id';


		//untuk data pegawai
		#8*********************************************#


		function get_all()
		{
			$query = $this->db->query("SELECT a.*, b.jenis_buku_nama FROM perpustakaan_buku a LEFT JOIN perpustakaan_jenis_buku b ON a.buku_jenis = b.jenis_buku_id");
			return $query;
		}
		
		function get_all_data()
		{
			return $this->db->count_all($this->table);
		}
		

		function add($data) {
			$this->db->insert($this->table, $data);
		}
		
		function delete($id)
		{
			$this->db->delete($this->table, array($this->primaryKey=> $id));
		}
		
		
		function get_all_data_buku_by_id($id) {
			$query = $this->db->query("select buku_id from perpustakaan_buku where buku_id = '$id'");
			return $query->num_rows();
		}
		
		function get_data_by_id($id) {
			$query = $this->db->query("SELECT a.*, b.jenis_buku_nama FROM perpustakaan_buku a LEFT JOIN perpustakaan_jenis_buku b ON a.buku_jenis = b.jenis_buku_id WHERE a.buku_id = '$id'");
			return $query->row();
		}		

		function update($id, $data)
		{
			$this->db->where($this->primaryKey, $id);
			if ($this->db->update($this->table, $data))
			{
				return TRUE;				
				}
			else {
				return FALSE;				
				}
			
		}
	}
	
?>