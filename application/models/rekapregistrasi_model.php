<?php

	class Rekapregistrasi_model extends CI_Model {
		function __construct() {
			parent::__construct();
		}
		
		function get_all($limit=NULL,$offset=NULL) {
			
			
			
			$query = $this->db->query("
			
			
				SELECT 
						a.no_reg, a.tgl_reg, a.jenis_reg,a.status_reg,
						b.nm_izin, b.id_group,
						c.nm_pemohon, c.alm_pemohon,
						d.nm_bdnusaha,d.alm_bdnusaha, d.atr_usaha , d.id_katusaha,d.`tlp_bdnusaha`,
						e.akr_def,
						f.`nm_kel`,
						g.nm_kec
						
					FROM
						tbl_registrasi a 
					LEFT JOIN tbl_jnsizin b ON a.id_jnsizin = b.id_jnsizin 
					LEFT JOIN tbl_pemohon c ON a.id_pemohon = c.id_pemohon 
					LEFT JOIN tbl_bdnusaha d ON a.id_bdnusaha = d.id_bdnusaha 
					LEFT JOIN tbl_katusaha e ON d.id_katusaha = e.id_katusaha
					LEFT JOIN tbl_kelurahan f ON d.kel_bdnusaha = f.id_kel
					LEFT JOIN tbl_kecamatan g ON f.id_kec = g.id_kec
					ORDER BY a.tgl_reg DESC
			
					LIMIT $offset, $limit
				");
			
			return $query;
			
		}
		
		function get_all_data() {
			
			
		
			$query = $this->db->query("select 
						a.no_reg, a.tgl_reg, a.jenis_reg,a.status_reg,
						b.nm_izin, b.id_group,
						c.nm_pemohon, 
						d.nm_bdnusaha,d.alm_bdnusaha, d.atr_usaha , d.id_katusaha,
						e.akr_def
					from
						tbl_registrasi a 
					left join tbl_jnsizin b ON a.id_jnsizin = b.id_jnsizin 
					left join tbl_pemohon c ON a.id_pemohon = c.id_pemohon 
					left join tbl_bdnusaha d ON a.id_bdnusaha = d.id_bdnusaha 
					left join tbl_katusaha e ON d.id_katusaha = e.id_katusaha
					ORDER BY a.tgl_reg DESC
				");
			
			return $query->num_rows();
			
		}
		
		
		
		
		function get_all_search($jenis_izin="", $status_izin="", $mulai=NULL, $selesai=NULL) {
			
			$where = "";
			
			
			
			if ($jenis_izin != "") {
				$where .= " AND a.id_jnsizin = '$jenis_izin'";
			}
			
			if ($status_izin != "")
			{
				$where .= " AND a.status_reg = '$status_izin'";
			}
			
			if ($mulai != NULL AND $selesai != NULL) {
				$where .= "AND a.tgl_reg BETWEEN '$mulai' AND '$selesai'";
			}
			
			

			
			
			
			
			
			
		
			$query = $this->db->query("
			
					SELECT 
						a.no_reg, a.tgl_reg, a.jenis_reg,a.status_reg,
						b.nm_izin, b.id_group,
						c.nm_pemohon, c.alm_pemohon,
						d.nm_bdnusaha,d.alm_bdnusaha, d.atr_usaha , d.id_katusaha,d.`tlp_bdnusaha`,
						e.akr_def,
						f.`nm_kel`,
						g.nm_kec
						
					FROM
						tbl_registrasi a 
					LEFT JOIN tbl_jnsizin b ON a.id_jnsizin = b.id_jnsizin 
					LEFT JOIN tbl_pemohon c ON a.id_pemohon = c.id_pemohon 
					LEFT JOIN tbl_bdnusaha d ON a.id_bdnusaha = d.id_bdnusaha 
					LEFT JOIN tbl_katusaha e ON d.id_katusaha = e.id_katusaha
					LEFT JOIN tbl_kelurahan f ON d.kel_bdnusaha = f.id_kel
					LEFT JOIN tbl_kecamatan g ON f.id_kec = g.id_kec
					
					WHERE a.no_reg != '' 
					$where
					ORDER BY a.tgl_reg DESC
					
				
			");
			
			return $query;
			
		}
		
		
		
		
		
		
		
		
		
		
		function get_all_data_search($jenis_izin="", $status_izin="", $mulai=NULL, $selesai=NULL) {
			
			$where = "";
			if ($jenis_izin != "") {
				$where .= " AND a.id_jnsizin = '$jenis_izin'";
			}
			
			if ($status_izin != "")
			{
				$where .= " AND a.jenis_reg = '$status_izin'";
			}
			
			if ($mulai != NULL AND $selesai != NULL) {
				$where .= "AND a.tgl_reg BETWEEN '$mulai' AND '$selesai'";
			}
			
			
			
		
			$query = $this->db->query("
								
				SELECT 
						a.no_reg, a.tgl_reg, a.jenis_reg,a.status_reg,
						b.nm_izin, b.id_group,
						c.nm_pemohon, c.alm_pemohon,
						d.nm_bdnusaha,d.alm_bdnusaha, d.atr_usaha , d.id_katusaha,d.`tlp_bdnusaha`,
						e.akr_def,
						f.`nm_kel`,
						g.nm_kec
						
					FROM
						tbl_registrasi a 
					LEFT JOIN tbl_jnsizin b ON a.id_jnsizin = b.id_jnsizin 
					LEFT JOIN tbl_pemohon c ON a.id_pemohon = c.id_pemohon 
					LEFT JOIN tbl_bdnusaha d ON a.id_bdnusaha = d.id_bdnusaha 
					LEFT JOIN tbl_katusaha e ON d.id_katusaha = e.id_katusaha
					LEFT JOIN tbl_kelurahan f ON d.kel_bdnusaha = f.id_kel
					LEFT JOIN tbl_kecamatan g ON f.id_kec = g.id_kec
					
					WHERE a.no_reg != '' 
					$where
					ORDER BY a.tgl_reg DESC
					
				
			
			");
			
			return $query->num_rows();
			
		}
		
		
		
		
		
		
	}

?>