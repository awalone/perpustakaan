<?php

	class Rekap_model extends CI_Model {
	
		function __construct() {
			parent::__construct();
		}
		
		
			function get_stat() {
				$query = $this->db->query("SELECT 
					a.id_jnsizin,
					b.nm_izin,
					SUM(CASE WHEN (e.id_kec = '737101') && (status_reg = '0') THEN 1 ELSE 0 END) AS mariso_registrasi,
					SUM(CASE WHEN (e.id_kec = '737101') && (status_reg = '3') THEN 1 ELSE 0 END) AS mariso_arsip,
					SUM(CASE WHEN (e.id_kec = '737102') && (status_reg = '0') THEN 1 ELSE 0 END) AS mamajang_registrasi,
					SUM(CASE WHEN (e.id_kec = '737102') && (status_reg = '3') THEN 1 ELSE 0 END) AS mamajang_arsip,
					SUM(CASE WHEN (e.id_kec = '737103') && (status_reg = '0') THEN 1 ELSE 0 END) AS makassar_registrasi,
					SUM(CASE WHEN (e.id_kec = '737103') && (status_reg = '3') THEN 1 ELSE 0 END) AS makassar_arsip,
					SUM(CASE WHEN (e.id_kec = '737104') && (status_reg = '0') THEN 1 ELSE 0 END) AS ujungpandang_registrasi,
					SUM(CASE WHEN (e.id_kec = '737104') && (status_reg = '3') THEN 1 ELSE 0 END) AS ujungpandang_arsip,
					SUM(CASE WHEN (e.id_kec = '737105') && (status_reg = '0') THEN 1 ELSE 0 END) AS wajo_registrasi,
					SUM(CASE WHEN (e.id_kec = '737105') && (status_reg = '3') THEN 1 ELSE 0 END) AS wajo_arsip,
					SUM(CASE WHEN (e.id_kec = '737106') && (status_reg = '0') THEN 1 ELSE 0 END) AS bontoala_registrasi,
					SUM(CASE WHEN (e.id_kec = '737106') && (status_reg = '3') THEN 1 ELSE 0 END) AS bontoala_arsip,
					SUM(CASE WHEN (e.id_kec = '737107') && (status_reg = '0') THEN 1 ELSE 0 END) AS tallo_registrasi,
					SUM(CASE WHEN (e.id_kec = '737107') && (status_reg = '3') THEN 1 ELSE 0 END) AS tallo_arsip,
					SUM(CASE WHEN (e.id_kec = '737108') && (status_reg = '0') THEN 1 ELSE 0 END) AS ujungtanah_registrasi,
					SUM(CASE WHEN (e.id_kec = '737108') && (status_reg = '3') THEN 1 ELSE 0 END) AS ujungtanah_arsip,
					SUM(CASE WHEN (e.id_kec = '737109') && (status_reg = '0') THEN 1 ELSE 0 END) AS panakkukang_registrasi,
					SUM(CASE WHEN (e.id_kec = '737109') && (status_reg = '3') THEN 1 ELSE 0 END) AS panakkukang_arsip,
					SUM(CASE WHEN (e.id_kec = '737110') && (status_reg = '0') THEN 1 ELSE 0 END) AS tamalate_registrasi,
					SUM(CASE WHEN (e.id_kec = '737110') && (status_reg = '3') THEN 1 ELSE 0 END) AS tamalate_arsip,
					SUM(CASE WHEN (e.id_kec = '737111') && (status_reg = '0') THEN 1 ELSE 0 END) AS biringkanaya_registrasi,
					SUM(CASE WHEN (e.id_kec = '737111') && (status_reg = '3') THEN 1 ELSE 0 END) AS biringkanaya_arsip,
					SUM(CASE WHEN (e.id_kec = '737112') && (status_reg = '0') THEN 1 ELSE 0 END) AS manggala_registrasi,
					SUM(CASE WHEN (e.id_kec = '737112') && (status_reg = '3') THEN 1 ELSE 0 END) AS manggala_arsip,
					SUM(CASE WHEN (e.id_kec = '737113') && (status_reg = '0') THEN 1 ELSE 0 END) AS rappocini_registrasi,
					SUM(CASE WHEN (e.id_kec = '737113') && (status_reg = '3') THEN 1 ELSE 0 END) AS rappocini_arsip,
					SUM(CASE WHEN (e.id_kec = '737114') && (status_reg = '0') THEN 1 ELSE 0 END) AS tamalanrea_registrasi,
					SUM(CASE WHEN (e.id_kec = '737114') && (status_reg = '3') THEN 1 ELSE 0 END) AS tamalanrea_arsip

				FROM 
						tbl_registrasi a 
							LEFT JOIN tbl_jnsizin b ON a.id_jnsizin = b.id_jnsizin 
							LEFT JOIN tbl_pemohon c ON a.id_pemohon = c.id_pemohon 
							LEFT JOIN tbl_bdnusaha d ON a.id_bdnusaha = d.id_bdnusaha
							LEFT JOIN tbl_kelurahan e ON d.kel_bdnusaha = e.id_kel
						GROUP BY a.id_jnsizin
				
				
				");
				return $query;
			}
		
		
	
	}

?>