<?php

	class Anggota_model extends CI_Model {
		function __construct() {
			parent::__construct();
		}
		
		var $table = 'perpustakaan_anggota';
		var $primaryKey = 'anggota_id';


		//untuk data anggota
		#8*********************************************#


		function get_all()
		{
			$this->db->order_by('anggota_nama','ASC');
			return $this->db->get($this->table);
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
		
		
		function get_all_data_anggota_by_id($id) {
			$query = $this->db->query("select anggota_id from perpustakaan_anggota where anggota_id = '$id'");
			return $query->num_rows();
		}
		
		function get_data_by_id($id) {
			$query = $this->db->query("select *from perpustakaan_anggota where anggota_id = '$id'");
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