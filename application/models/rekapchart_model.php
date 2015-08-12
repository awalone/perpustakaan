<?php

		class Rekapchart_model extends CI_Model {
			function __construct() {
				parent::__construct();
			}
			
			
			function get_stat($jenis_izin=NULL, $mulai=NULL, $selesai=NULL) {
				$plus = NULL;

				if ($jenis_izin != NULL && $jenis_izin != "") {
					$plus[] = "b.id_jnsizin = '$jenis_izin'";
				}

				if(!is_null($mulai) && !is_null($selesai) && $mulai != '' && $selesai != '')
				{
					$plus[] = "a.tgl_reg BETWEEN '$mulai' AND '$selesai'";
				}
				
				if(is_array($plus))
					$where = "where ".implode(" AND ",$plus);
				else
					$where = '';
					
				$query = $this->db->query("SELECT 
					a.no_reg, a.status_reg, a.tgl_reg,
					e.nm_kel,e.id_kec,e.id_kel,
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
				$where
				
				");
				return $query;
			}
			
			function get_query_grap() {
				$query = $this->db->execute_multi_query("
						SET group_concat_max_len = 5024; SET @SQL := NULL; 
						SELECT GROUP_CONCAT(DISTINCT(CONCAT('IF(nm_kec = ''',nm_kec,''',jml_reg,0) AS ''',nm_kec,'_reg'',','IF(nm_kec = ''',nm_kec,''',jml_arsip,0) AS ''',nm_kec,'_arsip''')))
						INTO @SQL
						FROM
						(
							SELECT kec.`nm_kec` AS nm_kec, izin.`id_jnsizin` ,
							(
						
							 SELECT COUNT(*) FROM tbl_registrasi AS reg
								LEFT JOIN tbl_bdnusaha AS usaha ON usaha.id_bdnusaha = reg.id_bdnusaha
								LEFT JOIN tbl_kelurahan AS kel ON kel.id_kel = usaha.kel_bdnusaha
							 WHERE 
								kel.id_kec = kec.`id_kec` AND reg.status_reg = 0 AND izin.`id_jnsizin` = reg.id_jnsizin
								
							)
							AS jml_reg,
							(
						
							 SELECT COUNT(*) FROM tbl_registrasi AS reg
								LEFT JOIN tbl_bdnusaha AS usaha ON usaha.id_bdnusaha = reg.id_bdnusaha
								LEFT JOIN tbl_kelurahan AS kel ON kel.id_kel = usaha.kel_bdnusaha
							 WHERE 
								kel.id_kec = kec.`id_kec` AND reg.status_reg = 3  AND izin.`id_jnsizin` = reg.id_jnsizin
								
							)
							AS jml_arsip
							FROM tbl_kecamatan AS kec, tbl_jnsizin AS izin
						)
						AS DATA;
						
						SET @SQL = CONCAT('select nm_izin, data2.id_jnsizin , ',@SQL,'
						
						FROM
						(
							SELECT kec.`nm_kec` AS nm_kec, izin.`id_jnsizin` , izin.nm_izin,
							(
						
							 SELECT COUNT(*) FROM tbl_registrasi AS reg
								LEFT JOIN tbl_bdnusaha AS usaha ON usaha.id_bdnusaha = reg.id_bdnusaha
								LEFT JOIN tbl_kelurahan AS kel ON kel.id_kel = usaha.kel_bdnusaha
							 WHERE 
								kel.id_kec = kec.`id_kec` AND reg.status_reg = 0 AND izin.`id_jnsizin` = reg.id_jnsizin
								
							)
							AS jml_reg,
							(
						
							 SELECT COUNT(*) FROM tbl_registrasi AS reg
								LEFT JOIN tbl_bdnusaha AS usaha ON usaha.id_bdnusaha = reg.id_bdnusaha
								LEFT JOIN tbl_kelurahan AS kel ON kel.id_kel = usaha.kel_bdnusaha
							 WHERE 
								kel.id_kec = kec.`id_kec` AND reg.status_reg = 3  AND izin.`id_jnsizin` = reg.id_jnsizin
								
							)
							AS jml_arsip
							FROM tbl_kecamatan AS kec, tbl_jnsizin AS izin
						) 
						AS data2
						GROUP BY `id_jnsizin`
						');
						
						PREPARE stmt_1 FROM @SQL;
						EXECUTE stmt_1;
						DEALLOCATE PREPARE stmt_1
				");
				return $query;
			}
			
			
		}

?>