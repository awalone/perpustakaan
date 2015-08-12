<?php

	class Rules_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		var $table = 'rules';
		
		
		
		
		
		
		function get_all()
		{
			
			return $this->db->get($this->table);
		}
		
		function get_all_data($id=NULL)
		{
			if ($id==NULL)
				return $this->db->count_all($this->table);
			else {
				$query = $this->db->get_where($this->table, array('levelUser' => $id));
				return $query->num_rows();
			}
		}
		
		function get_data_by_idLevel_module($id,$module) {
			$query = $this->db->get_where($this->table, array('levelUser' => $id, 'idSubModule' => $module));
			return $query->num_rows();
		}		
		
		
		
		
		
		
		function add($data)
		{
			$this->db->insert($this->table, $data);	
		}
		
		function delete($id)
		{
			$this->db->delete($this->table, array('levelUser' => $id));
		}
		
		
		
		
		function get_data_by_id($id=NULL)
		{
			return $this->db->get_where($this->table, array('levelUser' => $id))->row();
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
