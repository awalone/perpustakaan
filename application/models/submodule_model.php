<?php

	class Submodule_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		var $table = 'submodule';
		var $primaryKey = 'idSubModule';
		
		
		
		
		
		function get_all($id)
		{	
			return $this->db->get_where($this->table, array('idModule' => $id));
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
		
		function get_all_tampil($id) {
			return $this->db->get_where($this->table, array('idModule' => $id, 'statusTampil' => 'Y'));
		}
		
		function add($data)
		{
			$this->db->insert($this->table, $data);	
		}
		
		function delete($id)
		{
			$this->db->delete($this->table, array($this->primaryKey => $id));
		}
		
		function another_where($id) {
			return $this->db->get_where($this->table, array('namaSubmodule' => $id),1)->row();
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
