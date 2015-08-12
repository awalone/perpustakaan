<?php

	class Daftarrekomendasi_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		var $table = 'daftarrekomendasi';
		var $primaryKey = 'idRekomendasi';
		
		
		function get_all($limit=NULL,$offset=NULL)
		{
			$this->db->order_by('idRekomendasi','DESC');
			$this->db->limit($limit,$offset);
			return $this->db->get($this->table);
		}
		
		function get_all_data()
		{
			return $this->db->count_all($this->table);
		}
		
		
		
		function add($data)
		{
			if ($this->db->insert($this->table, $data)) {
				return TRUE;				
				}	
				else {
				return FALSE;					
					}
		}
		
		function delete($id)
		{
			$this->db->delete($this->table, array('nomorRegistrasiIzin'=> $id));
		}
		
		
		function get_data_by_id($id=NULL)
		{
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
		
		
		//untuk pencarian
		function search_data_paging($limit, $offset, $keyword) {
				return $this->db->query("select *from ref_kecamatan where ref_kecamatan_nama LIKE '%$keyword%' OR ref_kecamatan_kode LIKE '%$keyword%' LIMIT $offset,$limit");	
		}
		
		function search_data($keyword) {
			return $this->db->query("select *from ref_kecamatan where ref_kecamatan_nama LIKE '%$keyword%' OR ref_kecamatan_kode LIKE '%$keyword%'");	
		}
		
		
		
		
	}

?>