<?php

	class Kbli_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		var $table = 'tbl_kbligol';
		var $primaryKey = 'id_gol';
		
		
		
		
		
		function get_all()
		{
			
			return $this->db->get($this->table);
		}
		
		function get_all_data($id=NULL)
		{
			if ($id==NULL)
				return $this->db->count_all($this->table);
			else {
				$query = $this->db->get_where($this->table, array('id_gol' => $id));
				return $query->num_rows();
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
			return $this->db->get_where($this->table, array('nm_gol' => $id), 1)->row();
		}
		
		function update($id, $data)
		{
			$this->db->where($this->primaryKey, $id);
			$this->db->update($this->table, $data);
		}
		
		
		
	}

?> 
