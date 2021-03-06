<?php

	class Referensi_jabatan_model extends CI_Model {
		function __construct() {
			parent::__construct();
		}
		
		var $table = 'referensi_jabatan';
		var $primaryKey = 'id_ref_jabatan';


		//untuk data jabatan
		#8*********************************************#


		function get_all()
		{
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
		
		
		function get_all_data_jabatan_by_id($id) {
			return $this->db->get_where($this->table, array($this->primaryKey => $id), 1)->num_rows();
		}
		
		function get_data_by_id($id) {
			return $this->db->get_where($this->table, array($this->primaryKey => $id), 1)->row();
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