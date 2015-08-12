<?php

	class AksesModule_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		var $table = 'tbl_aksesmodule';
		var $primaryKey = 'id_akses';
		
		
		function get_all_login() {
			$query = $this->db->query("SELECT 
				a.id_user,a.nm_user, 
				b.id_login
			
					FROM tbl_login b 
				LEFT JOIN tbl_user a ON b.id_user = a.id_user 
				WHERE b.passwd != ''");
			return $query;
		}
		
		
		function get_all_module() {
			$query = $this->db->query("select *from tbl_module");
			return $query;
		}
		
		function get_all()
		{
			$query = $this->db->query("SELECT a.id_module, a.nama_module, a.link_module , 
					b.id_akses, b.id_login,
					c.id_user
				FROM tbl_module a LEFT JOIN tbl_aksesmodule b ON b.id_module = a.`id_module` 
					LEFT JOIN tbl_login c ON c.id_login = b.`id_login` 
					WHERE b.id_akses IS NOT NULL
					GROUP BY a.id_module");
			return $query;
		}
		
		function get_all_data($id=NULL)
		{
			if ($id==NULL){
				$query = $this->db->query("SELECT a.id_module, a.nama_module, a.link_module , 
	b.id_akses, b.id_login,
	c.id_user
FROM tbl_module a LEFT JOIN tbl_aksesmodule b ON b.id_module = a.`id_module` 
LEFT JOIN tbl_login c ON c.id_login = b.`id_login` 
WHERE b.id_akses IS NOT NULL");
				return $query->num_rows();
			}
				
			else {
				$query = $this->db->query("SELECT a.id_login, a.id_module, 
				b.nama_module
				FROM tbl_aksesmodule a
				LEFT JOIN
				tbl_module b ON a.id_module = b.`id_module`");
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

		
		
		function update($id, $data)
		{
			$this->db->where($this->primaryKey, $id);
			$this->db->update($this->table, $data);
		}
		
		
		
		function get_akses_by_id($id_login, $id_module) {
			$query = $this->db->query("SELECT 
						a.id_login , a.id_module, 
						b.link_module FROM tbl_aksesmodule a 
							LEFT JOIN tbl_module b ON a.id_module = b.id_module
						WHERE 
							a.id_login = '$id_login' AND b.link_module = '$id_module'");
			return $query->num_rows();
		}
		
		
		
	}

?> 
