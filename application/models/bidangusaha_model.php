<?php

	class Bidangusaha_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		##untuk data tbl_bidusaha
		function add_bidang_usaha($data) {
			$this->db->insert('tbl_kegusaha', $data);
		}
		
		function get_bidang_usaha_by_izin($id) {
			$query = $this->db->query("select * from tbl_bidusaha AS b LEFT JOIN tbl_kbligol AS k ON k.id_gol = b.id_gol  where b.no_izin ='$id'");
			return $query;
		}
		
		function cek_bidang_usaha_by_no_izin($noIzin){
			$query = $this->db->query("select * from tbl_kegusaha where no_izin ='$noIzin'");
			if($query->num_rows() > 0)
			{
				return TRUE;
			}
			else
				return FALSE;
		
		}
		
		function delete_bidang_usaha($noIzin) {
			$this->db->delete('tbl_kegusaha', array('no_izin' => $noIzin));
		}
		
		function update_bidang_usaha($id, $data) {
			$this->db->where('no_izin', $id);
			$this->db->update('tbl_kegusaha', $data);
		}
		
		
		
		
	}

?>