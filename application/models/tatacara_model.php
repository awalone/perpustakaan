<?php

	class Tatacara_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		var $table = 'tbl_syarat';
		
		function get_all($jenisReg, $jenisIzin)
		{
			$query = $this->db->query("SELECT a.uraian, b.nm_izin FROM tbl_syarat a LEFT JOIN tbl_jnsizin b ON a.`id_jnsizin` = b.`id_jnsizin` WHERE a.id_jnsizin = '$jenisIzin' AND jenis_reg = $jenisReg");
			
			return $query;
			
		}
		
		function get_all_data($jenisReg, $jenisIzin)
		{
			$query = $this->db->query("
			select *from tbl_syarat where id_jnsizin = '$jenisIzin' AND jenis_reg = $jenisReg
			");
			return $query->num_rows();
		}
		
		
		function get_data_jenis_izin($id=NULL) {
				$where = "";
				if ($id != NULL) {
					$where .= "WHERE a.id_loket = '$id'";
				}
				
				
				$query = $this->db->query("SELECT 
					a.id_loket, 
					a.nm_loket,
					c.`nm_izin`, c.id_jnsizin
						FROM tbl_loket a
					LEFT JOIN tbl_loketizin b ON a.`id_loket` = b.`id_loket`
					LEFT JOIN tbl_jnsizin c ON b.`id_jnsizin` = c.`id_jnsizin`
						$where");
				return $query;
		}
		
	}