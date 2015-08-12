<?php

	class Module_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		var $table = 'tbl_module';
		var $primaryKey = 'id_module';
		
		
		
		
		
		function get_all()
		{
			
			return $this->db->get($this->table);
		}
		
		function get_all_data($id=NULL)
		{
			if ($id==NULL)
				return $this->db->count_all($this->table);
			else {
				$query = $this->db->get_where($this->table, array('idModule' => $id));
				return $query->num_rows();
			}
		}
		
		function valid_entry($data) {
				$query = 	$this->db->get_where($this->table, array('namModule' => $data), 1)->num_rows();
				if ($query > 0)
				{
						return FALSE;	
				}
				else {
						return TRUE;
				}
		}		
		
		
		
		
		
		
		function add($data)
		{
			$this->db->insert($this->table, $data);	
		}
		
		function delete($id)
		{
			$this->db->delete($this->table, array($this->primaryKey => $id));
		}
		
		
		
		
		function get_data_by_id($id=NULL)
		{
			return $this->db->get_where($this->table, array($this->primaryKey => $id), 1)->row();
		}

		function get_data_by_name($id=NULL)
		{
			return $this->db->get_where($this->table, array('namaModule' => $id), 1)->row();
		}
		
		function update($id, $data)
		{
			$this->db->where($this->primaryKey, $id);
			$this->db->update($this->table, $data);
		}
		
		
		
	}

?> 
