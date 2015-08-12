<?php

	class Registrasi_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		var $table = 'tbl_registrasi';
		var $primaryKey = 'no_reg';
		
		
		function get_all($idLoket = NULL)
		{
			
			if ($idLoket != NULL) {
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
					WHERE b.id_group = $idLoket
					ORDER BY a.tgl_reg DESC
				");
			}
			else {
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
			}
			
			return $query;
			
		}
		
		function get_all_data($idLoket = NULL)
		{
			if ($idLoket != NULL) {
				$query = $this->db->query("select 
						a.no_reg, a.tgl_reg, a.jenis_reg,a.status_reg,
						b.nm_izin, b.id_group,
						c.nm_pemohon, 
						d.nm_bdnusaha,d.alm_bdnusaha, d.atr_usaha 
					from
						tbl_registrasi a left join tbl_jnsizin b ON a.id_jnsizin = b.id_jnsizin left join tbl_pemohon c ON a.id_pemohon = c.id_pemohon left join tbl_bdnusaha d ON a.id_bdnusaha = d.id_bdnusaha 
					WHERE b.id_group = $idLoket
					ORDER BY a.tgl_reg DESC
				");
			}
			else {
				$query = $this->db->query("select 
						a.no_reg, a.tgl_reg, a.jenis_reg,a.status_reg,
						b.nm_izin, b.id_group,
						c.nm_pemohon, 
						d.nm_bdnusaha,d.alm_bdnusaha, d.atr_usaha 
					from
						tbl_registrasi a left join tbl_jnsizin b ON a.id_jnsizin = b.id_jnsizin left join tbl_pemohon c ON a.id_pemohon = c.id_pemohon left join tbl_bdnusaha d ON a.id_bdnusaha = d.id_bdnusaha 
					 ORDER BY a.tgl_reg DESC
				");
			}
			return $query->num_rows();
		}
		
		
		
		function get_all_search($reg =NULL, $jenis=NULL, $mulai=NULL, $selesai=NULL, $idGroup=NULL) {
			$where = "";
			if ($reg != "" OR $jenis != "" OR $mulai != "" OR $selesai != "") {
				if ($reg != "") {
					$where .= "a.no_reg LIKE  '%$reg%' OR d.nm_bdnusaha LIKE '%$reg%'";
				}
				if ($jenis != "") {
					if ($where != "")
						$where .= "AND a.status_reg = '$jenis'";
					else {
						$where .= "a.status_reg = '$jenis'";
					}
				}
				if ($mulai != "" AND $selesai != "")
				{
					if ($where != "") {
						$where .= "AND tgl_reg BETWEEN '$mulai' AND '$selesai'";
												
					}
					else {
						$where .= "tgl_reg BETWEEN '$mulai' AND '$selesai'";
					}
						
				}
				
				if ($idGroup != NULL) {
					if ($where != "") {
						$where .= "AND b.id_group =$idGroup";
					}
					else {
						$where .= "b.id_group = $idGroup";
					}
				}


				$query = $this->db->query("select 
				a.no_reg, a.tgl_reg, a.jenis_reg,a.status_reg,
				b.nm_izin, b.id_group,
				c.nm_pemohon, 
				d.nm_bdnusaha,d.alm_bdnusaha, d.atr_usaha 
				from
					tbl_registrasi a left join tbl_jnsizin b ON a.id_jnsizin = b.id_jnsizin left join tbl_pemohon c ON a.id_pemohon = c.id_pemohon left join tbl_bdnusaha d ON a.id_bdnusaha = d.id_bdnusaha where $where ORDER BY a.tgl_reg DESC
			");
				return $query;

				



			}
			
			else {
				$query = $this->db->query("select 
				a.no_reg, a.tgl_reg, a.jenis_reg,a.status_reg,
				b.nm_izin, b.id_group,
				c.nm_pemohon, 
				d.nm_bdnusaha,d.alm_bdnusaha, d.atr_usaha 
				from
					tbl_registrasi a left join tbl_jnsizin b ON a.id_jnsizin = b.id_jnsizin left join tbl_pemohon c ON a.id_pemohon = c.id_pemohon left join tbl_bdnusaha d ON a.id_bdnusaha = d.id_bdnusaha ORDER BY a.tgl_reg DESC
			");
				return $query;
			}

		}

		function get_all_data_search($reg =NULL, $jenis=NULL, $mulai=NULL, $selesai=NULL) {
			$where = "";
			if ($reg != "" OR $jenis != "" OR $mulai != "" OR $selesai != "") {
				if ($reg != "") {
					$where .= "a.no_reg LIKE  '%$reg%' OR d.nm_bdnusaha LIKE '%$reg%'";
				}
				if ($jenis != "") {
					if ($where != "")
						$where .= "AND a.status_reg = '$jenis'";
					else {
						$where .= "a.status_reg = '$jenis'";
					}
				}
				if ($mulai != "")
				{
					if ($where != "") {
						$where .= "AND tgl_reg BETWEEN '$mulai' AND '$selesai'";
												
					} else {
						$where .= "tgl_reg BETWEEN '$mulai' AND '$selesai'";
					}

						
				}

				

				$query = $this->db->query("select 
				a.no_reg, a.tgl_reg, a.jenis_reg,a.status_reg,
				b.nm_izin, 
				c.nm_pemohon, 
				d.nm_bdnusaha,d.alm_bdnusaha, d.atr_usaha 
				from
					tbl_registrasi a left join tbl_jnsizin b ON a.id_jnsizin = b.id_jnsizin left join tbl_pemohon c ON a.id_pemohon = c.id_pemohon left join tbl_bdnusaha d ON a.id_bdnusaha = d.id_bdnusaha where $where ORDER BY a.tgl_reg DESC
			");
				return $query->num_rows();

				
			}
			else {
				$query = $this->db->query("select 
				a.no_reg, a.tgl_reg, a.jenis_reg,a.status_reg,
				b.nm_izin, 
				c.nm_pemohon, 
				d.nm_bdnusaha,d.alm_bdnusaha, d.atr_usaha 
				from
					tbl_registrasi a left join tbl_jnsizin b ON a.id_jnsizin = b.id_jnsizin left join tbl_pemohon c ON a.id_pemohon = c.id_pemohon left join tbl_bdnusaha d ON a.id_bdnusaha = d.id_bdnusaha ORDER BY a.tgl_reg DESC
			");
				return $query->num_rows();

			}

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
			$this->db->delete($this->table, array($this->primaryKey => $id));
		}
		
		
		function get_data_registrasi_by_id($id) {
			$query = $this->db->query("SELECT 
							a.no_reg, a.jenis_reg,a.status_reg, a.tgl_reg,
							b.nm_izin, 
							c.id_pemohon, c.nm_pemohon,c.ktp_pemohon, c.alm_pemohon, c.hp_pemohon,
							d.nm_bdnusaha, d.atr_usaha, d.jab_pengurus , d.id_bdnusaha, d.alm_bdnusaha ,d.tlp_bdnusaha, d.fax_bdnusaha,
							e.nm_kel,e.id_kec,e.id_kel,RIGHT(e.id_kec,2) AS kecamatan,
							f.id_stausaha,
							g.id_katusaha, g.akr_def
					FROM
							tbl_registrasi a 
							LEFT JOIN tbl_jnsizin b ON a.id_jnsizin = b.id_jnsizin 
							LEFT JOIN tbl_pemohon c ON a.id_pemohon = c.id_pemohon 
							LEFT JOIN tbl_bdnusaha d ON a.id_bdnusaha = d.id_bdnusaha
							LEFT JOIN tbl_kelurahan e ON d.kel_bdnusaha = e.id_kel
							LEFT JOIN tbl_stausaha f ON d.id_stausaha = f.id_stausaha
							LEFT JOIN tbl_katusaha g ON d.id_katusaha = g.id_katusaha
				WHERE no_reg = '$id'
			");
			return $query->row();
		}
		
		
		function get_data_by_ktp($id) {
			$query = $this->db->query("select *from tbl_pemohon where ktp_pemohon = '$id'");
			return $query->num_rows();
		}
		
		function update_registrasi($id, $data) {
			$this->db->where('no_reg', $id);
			$this->db->update('tbl_registrasi', $data);
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
		
		function update_pemohon_by_ktp($id, $data) {
			$this->db->where('ktp_pemohon', $id);
			$this->db->update('tbl_pemohon', $data);
		}
		
		
		
		
		/*
			untuk menampilkan jenis izin
		*/
		function get_data_jenis_izin() {
				$query = $this->db->get('tbl_jnsizin');
				return $query;
		}
		
		function get_data_jenis_izin_by_id($id) {
				$query = $this->db->query("select *from tbl_jnsizin where id_jnsizin = '$id'");
				return $query->row();
		}
		

		function get_data_jenis_izin_by_loket($id) {
				$query = $this->db->query("SELECT 
					a.id_loket, 
					a.nm_loket,
					c.`nm_izin`, c.id_jnsizin
						FROM tbl_loket a
					LEFT JOIN tbl_loketizin b ON a.`id_loket` = b.`id_loket`
					LEFT JOIN tbl_jnsizin c ON b.`id_jnsizin` = c.`id_jnsizin`
						WHERE a.id_loket = '$id'");
				return $query;
		}

		function get_end_record(){
				$query = $this->db->query("
					SELECT CONCAT(depan,akhir) AS endRecord
					FROM
					(
						SELECT IF(LENGTH(akhir) = 3, '0',IF(LENGTH(akhir)=2,'00','000')) AS depan, akhir AS akhir
						FROM
						(
							SELECT (MAX(SUBSTR(no_reg,7))+1) AS akhir  
							FROM `tbl_registrasi`
						)
						AS selek
					)
					AS MAX					
				");
				return $query->row();
		
		}
		
		
		
		/***********************
		UNTUK DATA KATEGORI BADAN USAHA
		*******************************/
		function get_all_kategori() {
			return $this->db->get('tbl_katusaha');
		}
		
		
		
		
		/********************
			UNTUK DATA PEMOHON
		********************/
		function get_data_pemohon_by_id($id,$arg=NULL)
		{
			if ($arg == "jumlah") {
				$query = $this->db->query("select *from tbl_pemohon where id_pemohon = '$id'");
				return $query->num_rows();
			}
			else {
				return $this->db->get_where('tbl_pemohon', array('id_pemohon' => $id), 1)->row();
			}
		}
		
		function update_pemohon($id, $data) {
			$this->db->where('id_pemohon', $id);
			if ($this->db->update('tbl_pemohon', $data))
			{
				return TRUE;				
			}
			else {
				return FALSE;				
			}
		}
		
		function addPemohon($data)
		{
			if ($this->db->insert('tbl_pemohon', $data)) {
					return TRUE;				
			}	
			else {
				return FALSE;					
			}
		}
		/************* AKHRI DATA DATA PEMOHON *****************8 */
		
		
		/****** UNTUK DATA BADAN USAHA **************/
		function get_data_badanusaha_by_id($id, $arg=NULL)
		{
			if ($arg == "jumlah") {
				$query = $this->db->query("select *from tbl_bdnusaha where id_bdnusaha = '$id'");
				return $query->num_rows();
			}
			else {
				return $this->db->get_where('tbl_bdnusaha', array('id_bdnusaha' => $id), 1)->row();
			}
		}
		
		
		function update_badanusaha($id, $data) {
			$this->db->where('id_bdnusaha', $id);
			if ($this->db->update('tbl_bdnusaha', $data))
			{
				return TRUE;				
			}
			else {
				return FALSE;				
			}
		}
		
		
		
		function addbadanusaha($data) {
			if ($this->db->insert('tbl_bdnusaha', $data)) {
					return TRUE;				
			}	
			else {
				return FALSE;					
			}
		}
		
	}

?>