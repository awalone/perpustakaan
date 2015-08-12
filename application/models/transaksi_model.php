<?php

	class Transaksi_model extends CI_Model {
		function __construct() {
			parent::__construct();
		}
		
		var $table = 'pos_produk';
		var $primaryKey = 'id';


		//untuk data pegawai
		#8*********************************************#


		function get_all()
		{
			$this->db->order_by('nama_produk','DESC');
			return $this->db->get($this->table);
		}
		
		function get_all_data()
		{
			return $this->db->count_all($this->table);
		}
		

		function add($data) {
			$this->db->insert('pos_produk', $data);
		}
		
		function delete($id)
		{
			$this->db->delete($this->table, array($this->primaryKey=> $id));
		}
		
		
		function get_all_data_pegawai_by_id($id) {
			$query = $this->db->query("select id_produk from pos_produk where id_produk = '$id'");
			return $query->num_rows();
		}
		
		function get_data_by_id($id) {
			$query = $this->db->query("select *from pos_produk where id_produk = '$id'");
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