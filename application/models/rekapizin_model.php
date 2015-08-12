<?php

	class Rekapizin_model extends CI_Model {
		function __construct() {
			parent::__construct();
		}
		
		function get_all($limit,$offset) {
			
			
			$query = $this->db->query("
					(SELECT 
								a.no_izin, a.tgl_izin, 
								c.status_reg,
								d.nm_pemohon,d.hp_pemohon,
								e.nm_bdnusaha,
								f.nm_izin
									FROM tbl_simb a 
								LEFT JOIN tbl_registrasi c ON a.no_reg = c.no_reg
								LEFT JOIN tbl_pemohon d ON c.id_pemohon = d.id_pemohon
								LEFT JOIN tbl_bdnusaha e ON c.id_bdnusaha = e.id_bdnusaha
								LEFT JOIN tbl_jnsizin f ON c.id_jnsizin = f.id_jnsizin)
								
					UNION
					
					(SELECT 
								a.no_izin, a.tgl_izin, 
								c.status_reg,  
								d.nm_pemohon,d.hp_pemohon,
								e.nm_bdnusaha,
								f.nm_izin
									FROM tbl_sig a 
								LEFT JOIN tbl_registrasi c ON a.no_reg = c.no_reg
								LEFT JOIN tbl_pemohon d ON c.id_pemohon = d.id_pemohon
								LEFT JOIN tbl_bdnusaha e ON c.id_bdnusaha = e.id_bdnusaha
								LEFT JOIN tbl_jnsizin f ON c.id_jnsizin = f.id_jnsizin)
								
								
					UNION

					(SELECT 
								a.no_izin, a.tgl_izin, 
								c.status_reg,  
								d.nm_pemohon,d.hp_pemohon,
								e.nm_bdnusaha,
								f.nm_izin
									FROM tbl_siup a 
								LEFT JOIN tbl_registrasi c ON a.no_reg = c.no_reg
								LEFT JOIN tbl_pemohon d ON c.id_pemohon = d.id_pemohon
								LEFT JOIN tbl_bdnusaha e ON c.id_bdnusaha = e.id_bdnusaha
								LEFT JOIN tbl_jnsizin f ON c.id_jnsizin = f.id_jnsizin)
								
								
					UNION

					(SELECT 
								a.no_izin, a.tgl_izin, 
								c.status_reg,  
								d.nm_pemohon,d.hp_pemohon,
								e.nm_bdnusaha,
								f.nm_izin
									FROM tbl_tdi a 
								LEFT JOIN tbl_registrasi c ON a.no_reg = c.no_reg
								LEFT JOIN tbl_pemohon d ON c.id_pemohon = d.id_pemohon
								LEFT JOIN tbl_bdnusaha e ON c.id_bdnusaha = e.id_bdnusaha
								LEFT JOIN tbl_jnsizin f ON c.id_jnsizin = f.id_jnsizin)
							
								
					UNION

					(SELECT 
								a.no_izin, a.tgl_izin, 
								c.status_reg,  
								d.nm_pemohon,d.hp_pemohon,
								e.nm_bdnusaha,
								f.nm_izin
									FROM tbl_siui a 
								LEFT JOIN tbl_registrasi c ON a.no_reg = c.no_reg
								LEFT JOIN tbl_pemohon d ON c.id_pemohon = d.id_pemohon
								LEFT JOIN tbl_bdnusaha e ON c.id_bdnusaha = e.id_bdnusaha
								LEFT JOIN tbl_jnsizin f ON c.id_jnsizin = f.id_jnsizin)
								
								
					UNION

					(SELECT 
								a.no_izin, a.tgl_izin, 
								c.status_reg,  
								d.nm_pemohon,d.hp_pemohon,
								e.nm_bdnusaha,
								f.nm_izin
									FROM tbl_tdp a 
								LEFT JOIN tbl_registrasi c ON a.no_reg = c.no_reg
								LEFT JOIN tbl_pemohon d ON c.id_pemohon = d.id_pemohon
								LEFT JOIN tbl_bdnusaha e ON c.id_bdnusaha = e.id_bdnusaha
								LEFT JOIN tbl_jnsizin f ON c.id_jnsizin = f.id_jnsizin)
								
								
					UNION

					(SELECT 
								a.no_izin, a.tgl_izin, 
								c.status_reg,  
								d.nm_pemohon,d.hp_pemohon,
								e.nm_bdnusaha,
								f.nm_izin
									FROM tbl_sipl a 
								LEFT JOIN tbl_registrasi c ON a.no_reg = c.no_reg
								LEFT JOIN tbl_pemohon d ON c.id_pemohon = d.id_pemohon
								LEFT JOIN tbl_bdnusaha e ON c.id_bdnusaha = e.id_bdnusaha
								LEFT JOIN tbl_jnsizin f ON c.id_jnsizin = f.id_jnsizin)
					
					ORDER BY tgl_izin DESC
								
								
								
					LIMIT $offset, $limit
			
			");
			
			return $query;
			
		}
		
		function get_all_data() {
			
			
		
			$query = $this->db->query("
				SELECT 
								a.no_izin, a.tgl_izin, 
								c.status_reg,
								d.nm_pemohon,d.hp_pemohon,
								e.nm_bdnusaha,
								f.nm_izin
									FROM tbl_simb a 
								LEFT JOIN tbl_registrasi c ON a.no_reg = c.no_reg
								LEFT JOIN tbl_pemohon d ON c.id_pemohon = d.id_pemohon
								LEFT JOIN tbl_bdnusaha e ON c.id_bdnusaha = e.id_bdnusaha
								LEFT JOIN tbl_jnsizin f ON c.id_jnsizin = f.id_jnsizin
								WHERE c.status_reg != 0
					UNION

					SELECT 
								a.no_izin, a.tgl_izin, 
								c.status_reg,  
								d.nm_pemohon,d.hp_pemohon,
								e.nm_bdnusaha,
								f.nm_izin
									FROM tbl_sig a 
								LEFT JOIN tbl_registrasi c ON a.no_reg = c.no_reg
								LEFT JOIN tbl_pemohon d ON c.id_pemohon = d.id_pemohon
								LEFT JOIN tbl_bdnusaha e ON c.id_bdnusaha = e.id_bdnusaha
								LEFT JOIN tbl_jnsizin f ON c.id_jnsizin = f.id_jnsizin
								WHERE c.`status_reg` != 0
								
					UNION

					SELECT 
								a.no_izin, a.tgl_izin, 
								c.status_reg,  
								d.nm_pemohon,d.hp_pemohon,
								e.nm_bdnusaha,
								f.nm_izin
									FROM tbl_siup a 
								LEFT JOIN tbl_registrasi c ON a.no_reg = c.no_reg
								LEFT JOIN tbl_pemohon d ON c.id_pemohon = d.id_pemohon
								LEFT JOIN tbl_bdnusaha e ON c.id_bdnusaha = e.id_bdnusaha
								LEFT JOIN tbl_jnsizin f ON c.id_jnsizin = f.id_jnsizin
								WHERE c.`status_reg` != 0
								
					UNION

					SELECT 
								a.no_izin, a.tgl_izin, 
								c.status_reg,  
								d.nm_pemohon,d.hp_pemohon,
								e.nm_bdnusaha,
								f.nm_izin
									FROM tbl_tdi a 
								LEFT JOIN tbl_registrasi c ON a.no_reg = c.no_reg
								LEFT JOIN tbl_pemohon d ON c.id_pemohon = d.id_pemohon
								LEFT JOIN tbl_bdnusaha e ON c.id_bdnusaha = e.id_bdnusaha
								LEFT JOIN tbl_jnsizin f ON c.id_jnsizin = f.id_jnsizin
								WHERE c.`status_reg` != 0
								
					UNION

					SELECT 
								a.no_izin, a.tgl_izin, 
								c.status_reg,  
								d.nm_pemohon,d.hp_pemohon,
								e.nm_bdnusaha,
								f.nm_izin
									FROM tbl_siui a 
								LEFT JOIN tbl_registrasi c ON a.no_reg = c.no_reg
								LEFT JOIN tbl_pemohon d ON c.id_pemohon = d.id_pemohon
								LEFT JOIN tbl_bdnusaha e ON c.id_bdnusaha = e.id_bdnusaha
								LEFT JOIN tbl_jnsizin f ON c.id_jnsizin = f.id_jnsizin
								WHERE c.`status_reg` != 0
								
					UNION

					SELECT 
								a.no_izin, a.tgl_izin, 
								c.status_reg,  
								d.nm_pemohon,d.hp_pemohon,
								e.nm_bdnusaha,
								f.nm_izin
									FROM tbl_tdp a 
								LEFT JOIN tbl_registrasi c ON a.no_reg = c.no_reg
								LEFT JOIN tbl_pemohon d ON c.id_pemohon = d.id_pemohon
								LEFT JOIN tbl_bdnusaha e ON c.id_bdnusaha = e.id_bdnusaha
								LEFT JOIN tbl_jnsizin f ON c.id_jnsizin = f.id_jnsizin
								WHERE c.`status_reg` != 0
								
					UNION

					SELECT 
								a.no_izin, a.tgl_izin, 
								c.status_reg,  
								d.nm_pemohon,d.hp_pemohon,
								e.nm_bdnusaha,
								f.nm_izin
									FROM tbl_sipl a 
								LEFT JOIN tbl_registrasi c ON a.no_reg = c.no_reg
								LEFT JOIN tbl_pemohon d ON c.id_pemohon = d.id_pemohon
								LEFT JOIN tbl_bdnusaha e ON c.id_bdnusaha = e.id_bdnusaha
								LEFT JOIN tbl_jnsizin f ON c.id_jnsizin = f.id_jnsizin
								WHERE c.`status_reg` != 0
								
								
			
			");
			
			return $query->num_rows();
			
		}
		
		
		
		
		function get_all_search($no_izin = "", $jenis_izin="", $status_izin="", $mulai=NULL, $selesai=NULL) {
			
			$where = "";
			
			if ($no_izin != "") {
				$where .= " AND a.no_izin = '$no_izin'";
			}
			
			if ($jenis_izin != "") {
				$where .= " AND f.id_jnsizin = '$jenis_izin'";
			}
			
			if ($status_izin != "")
			{
				$where .= " AND c.jenis_reg = '$status_izin'";
			}
			
			if ($mulai != NULL AND $selesai != NULL) {
				$where .= "AND a.tgl_izin BETWEEN '$mulai' AND '$selesai'";
			}
			
			
			
		
			$query = $this->db->query("
			
					(SELECT 
								a.no_izin, a.tgl_izin, a.no_reg, a.no_reko,
								c.status_reg,
								d.nm_pemohon,d.hp_pemohon,
								e.nm_bdnusaha,
								f.nm_izin
									FROM tbl_simb a 
								LEFT JOIN tbl_registrasi c ON a.no_reg = c.no_reg
								LEFT JOIN tbl_pemohon d ON c.id_pemohon = d.id_pemohon
								LEFT JOIN tbl_bdnusaha e ON c.id_bdnusaha = e.id_bdnusaha
								LEFT JOIN tbl_jnsizin f ON c.id_jnsizin = f.id_jnsizin
								WHERE a.no_izin != '' $where )
					UNION

					(SELECT 
								a.no_izin, a.tgl_izin, a.no_reg, a.no_reko,
								c.status_reg,  
								d.nm_pemohon,d.hp_pemohon,
								e.nm_bdnusaha,
								f.nm_izin
									FROM tbl_sig a 
								LEFT JOIN tbl_registrasi c ON a.no_reg = c.no_reg
								LEFT JOIN tbl_pemohon d ON c.id_pemohon = d.id_pemohon
								LEFT JOIN tbl_bdnusaha e ON c.id_bdnusaha = e.id_bdnusaha
								LEFT JOIN tbl_jnsizin f ON c.id_jnsizin = f.id_jnsizin
								WHERE a.no_izin != '' $where )
								
					UNION

					(SELECT 
								a.no_izin, a.tgl_izin, a.no_reg, a.no_reko,
								c.status_reg,  
								d.nm_pemohon,d.hp_pemohon,
								e.nm_bdnusaha,
								f.nm_izin
									FROM tbl_siup a 
								LEFT JOIN tbl_registrasi c ON a.no_reg = c.no_reg
								LEFT JOIN tbl_pemohon d ON c.id_pemohon = d.id_pemohon
								LEFT JOIN tbl_bdnusaha e ON c.id_bdnusaha = e.id_bdnusaha
								LEFT JOIN tbl_jnsizin f ON c.id_jnsizin = f.id_jnsizin
								WHERE a.no_izin != '' $where )
								
					UNION

					(SELECT 
								a.no_izin, a.tgl_izin, a.no_reg, a.no_reko,
								c.status_reg,  
								d.nm_pemohon,d.hp_pemohon,
								e.nm_bdnusaha,
								f.nm_izin
									FROM tbl_tdi a 
								LEFT JOIN tbl_registrasi c ON a.no_reg = c.no_reg
								LEFT JOIN tbl_pemohon d ON c.id_pemohon = d.id_pemohon
								LEFT JOIN tbl_bdnusaha e ON c.id_bdnusaha = e.id_bdnusaha
								LEFT JOIN tbl_jnsizin f ON c.id_jnsizin = f.id_jnsizin
								WHERE a.no_izin != '' $where )
								
					UNION

					(SELECT 
								a.no_izin, a.tgl_izin, a.no_reg, a.no_reko,
								c.status_reg,  
								d.nm_pemohon,d.hp_pemohon,
								e.nm_bdnusaha,
								f.nm_izin
									FROM tbl_siui a 
								LEFT JOIN tbl_registrasi c ON a.no_reg = c.no_reg
								LEFT JOIN tbl_pemohon d ON c.id_pemohon = d.id_pemohon
								LEFT JOIN tbl_bdnusaha e ON c.id_bdnusaha = e.id_bdnusaha
								LEFT JOIN tbl_jnsizin f ON c.id_jnsizin = f.id_jnsizin
								WHERE a.no_izin != '' $where )
								
					UNION

					(SELECT 
								a.no_izin, a.tgl_izin, a.no_reg, a.no_reko,
								c.status_reg,  
								d.nm_pemohon,d.hp_pemohon,
								e.nm_bdnusaha,
								f.nm_izin
									FROM tbl_tdp a 
								LEFT JOIN tbl_registrasi c ON a.no_reg = c.no_reg
								LEFT JOIN tbl_pemohon d ON c.id_pemohon = d.id_pemohon
								LEFT JOIN tbl_bdnusaha e ON c.id_bdnusaha = e.id_bdnusaha
								LEFT JOIN tbl_jnsizin f ON c.id_jnsizin = f.id_jnsizin
								WHERE a.no_izin != '' $where )
								
					UNION

					(SELECT 
								a.no_izin, a.tgl_izin, a.no_reg, a.no_reko,
								c.status_reg,  
								d.nm_pemohon,d.hp_pemohon,
								e.nm_bdnusaha,
								f.nm_izin
									FROM tbl_sipl a 
								LEFT JOIN tbl_registrasi c ON a.no_reg = c.no_reg
								LEFT JOIN tbl_pemohon d ON c.id_pemohon = d.id_pemohon
								LEFT JOIN tbl_bdnusaha e ON c.id_bdnusaha = e.id_bdnusaha
								LEFT JOIN tbl_jnsizin f ON c.id_jnsizin = f.id_jnsizin
								WHERE a.no_izin != '' $where )
								
								
					ORDER BY tgl_izin DESC
			");
			
			return $query;
			
		}
		
		
		
		
		
		
		
		
		
		
		function get_all_data_search($no_izin = "" , $jenis_izin="", $status_izin="", $mulai=NULL, $selesai=NULL) {
			
			$where = "";
			
			if ($no_izin != "") {
				$where .= " AND a.no_izin = '$no_izin'";
			}
			if ($jenis_izin != "") {
				$where .= " AND f.id_jnsizin = '$jenis_izin'";
			}
			
			if ($status_izin != "")
			{
				$where .= " AND c.jenis_reg = '$status_izin'";
			}
			
			if ($mulai != NULL AND $selesai != NULL) {
				$where .= "AND a.tgl_izin BETWEEN '$mulai' AND '$selesai'";
			}
			
			
			
		
			$query = $this->db->query("SELECT 
								a.no_izin, a.tgl_izin, 
								c.status_reg,
								d.nm_pemohon,d.hp_pemohon,
								e.nm_bdnusaha,
								f.nm_izin
									FROM tbl_simb a 
								LEFT JOIN tbl_registrasi c ON a.no_reg = c.no_reg
								LEFT JOIN tbl_pemohon d ON c.id_pemohon = d.id_pemohon
								LEFT JOIN tbl_bdnusaha e ON c.id_bdnusaha = e.id_bdnusaha
								LEFT JOIN tbl_jnsizin f ON c.id_jnsizin = f.id_jnsizin
								WHERE a.no_izin != '' $where
					UNION

					SELECT 
								a.no_izin, a.tgl_izin, 
								c.status_reg,  
								d.nm_pemohon,d.hp_pemohon,
								e.nm_bdnusaha,
								f.nm_izin
									FROM tbl_sig a 
								LEFT JOIN tbl_registrasi c ON a.no_reg = c.no_reg
								LEFT JOIN tbl_pemohon d ON c.id_pemohon = d.id_pemohon
								LEFT JOIN tbl_bdnusaha e ON c.id_bdnusaha = e.id_bdnusaha
								LEFT JOIN tbl_jnsizin f ON c.id_jnsizin = f.id_jnsizin
								WHERE a.no_izin != '' $where
								
					UNION

					SELECT 
								a.no_izin, a.tgl_izin, 
								c.status_reg,  
								d.nm_pemohon,d.hp_pemohon,
								e.nm_bdnusaha,
								f.nm_izin
									FROM tbl_siup a 
								LEFT JOIN tbl_registrasi c ON a.no_reg = c.no_reg
								LEFT JOIN tbl_pemohon d ON c.id_pemohon = d.id_pemohon
								LEFT JOIN tbl_bdnusaha e ON c.id_bdnusaha = e.id_bdnusaha
								LEFT JOIN tbl_jnsizin f ON c.id_jnsizin = f.id_jnsizin
								WHERE a.no_izin != '' $where
								
					UNION

					SELECT 
								a.no_izin, a.tgl_izin, 
								c.status_reg,  
								d.nm_pemohon,d.hp_pemohon,
								e.nm_bdnusaha,
								f.nm_izin
									FROM tbl_tdi a 
								LEFT JOIN tbl_registrasi c ON a.no_reg = c.no_reg
								LEFT JOIN tbl_pemohon d ON c.id_pemohon = d.id_pemohon
								LEFT JOIN tbl_bdnusaha e ON c.id_bdnusaha = e.id_bdnusaha
								LEFT JOIN tbl_jnsizin f ON c.id_jnsizin = f.id_jnsizin
								WHERE a.no_izin != '' $where
								
					UNION

					SELECT 
								a.no_izin, a.tgl_izin, 
								c.status_reg,  
								d.nm_pemohon,d.hp_pemohon,
								e.nm_bdnusaha,
								f.nm_izin
									FROM tbl_siui a 
								LEFT JOIN tbl_registrasi c ON a.no_reg = c.no_reg
								LEFT JOIN tbl_pemohon d ON c.id_pemohon = d.id_pemohon
								LEFT JOIN tbl_bdnusaha e ON c.id_bdnusaha = e.id_bdnusaha
								LEFT JOIN tbl_jnsizin f ON c.id_jnsizin = f.id_jnsizin
								WHERE a.no_izin != '' $where
								
					UNION

					SELECT 
								a.no_izin, a.tgl_izin, 
								c.status_reg,  
								d.nm_pemohon,d.hp_pemohon,
								e.nm_bdnusaha,
								f.nm_izin
									FROM tbl_tdp a 
								LEFT JOIN tbl_registrasi c ON a.no_reg = c.no_reg
								LEFT JOIN tbl_pemohon d ON c.id_pemohon = d.id_pemohon
								LEFT JOIN tbl_bdnusaha e ON c.id_bdnusaha = e.id_bdnusaha
								LEFT JOIN tbl_jnsizin f ON c.id_jnsizin = f.id_jnsizin
								WHERE a.no_izin != '' $where
								
					UNION

					SELECT 
								a.no_izin, a.tgl_izin, 
								c.status_reg,  
								d.nm_pemohon,d.hp_pemohon,
								e.nm_bdnusaha,
								f.nm_izin
									FROM tbl_sipl a 
								LEFT JOIN tbl_registrasi c ON a.no_reg = c.no_reg
								LEFT JOIN tbl_pemohon d ON c.id_pemohon = d.id_pemohon
								LEFT JOIN tbl_bdnusaha e ON c.id_bdnusaha = e.id_bdnusaha
								LEFT JOIN tbl_jnsizin f ON c.id_jnsizin = f.id_jnsizin
								WHERE a.no_izin != '' $where
								
								
			
			");
			
			return $query->num_rows();
			
		}
		
		
		
		
		
		
	}

?>