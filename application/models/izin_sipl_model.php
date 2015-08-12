<?php

	class Izin_sipl_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		var $table = 'tbl_sipl';
		var $primaryKey = 'no_izin';
		
		
		##UNTUK DATA PEMOHON DAN BADAN USAHA###
		function update_pemohon($id, $data)
		{
			$this->db->where('id_pemohon', $id);
			if ($this->db->update('tbl_pemohon', $data))
			{
				return TRUE;				
				}
			else {
				return FALSE;				
				}
			
		}
		function update_bdnusaha($id, $data)
		{
			$this->db->where('id_bdnusaha', $id);
			if ($this->db->update('tbl_bdnusaha', $data))
			{
				return TRUE;				
				}
			else {
				return FALSE;				
				}
			
		}
		
		
		
		
		
		
		/********************************************************/
		/******************* UNTUK DATA REGISTRASI **************/
		/********************************************************/
		
		//fungsi untuk menampilkan data registrasi dengan jenis izin IMB (kode = 01)
		function get_all_registrasi() {
			$query = $this->db->query("select 
				a.no_reg,a.tgl_reg, 
				b.nm_izin, 
				c.nm_pemohon, 
				d.nm_bdnusaha, d.atr_usaha , d.alm_bdnusaha
				from
					tbl_registrasi a left join tbl_jnsizin b ON a.id_jnsizin = b.id_jnsizin left join tbl_pemohon c ON a.id_pemohon = c.id_pemohon left join tbl_bdnusaha d ON a.id_bdnusaha = d.id_bdnusaha WHERE a.id_jnsizin = '07' AND status_reg=0
			");
			return $query;
		}
		
		
		function get_all_registrasi_by_id($id) {
			$where = "";
			$where .= "AND (d.nm_bdnusaha LIKE '%$id%' OR c.nm_pemohon LIKE '%$id%' OR a.no_reg LIKE '%$id%')";
			$query = $this->db->query("select a.no_reg,a.tgl_reg, b.nm_izin, c.nm_pemohon, d.nm_bdnusaha, d.atr_usaha , d.alm_bdnusaha
				from
					tbl_registrasi a left join tbl_jnsizin b ON a.id_jnsizin = b.id_jnsizin left join tbl_pemohon c ON a.id_pemohon = c.id_pemohon left join tbl_bdnusaha d ON a.id_bdnusaha = d.id_bdnusaha WHERE a.id_jnsizin = '07' AND status_reg=0
				$where
				ORDER BY a.tgl_reg DESC
			");
			return $query;
		}
		
		//untuk menampilkan jumlah data registrasi dengan jenis izin IMB
		function get_all_data_registrasi($id=NULL) {
			$where = "";
			if ($id != NULL) {
				$where .= "AND (d.nm_bdnusaha LIKE '%$id%' OR c.nm_pemohon LIKE '%$id%' OR a.no_reg LIKE '%$id%')";
			}
			$query = $this->db->query("select a.no_reg, b.nm_izin, c.nm_pemohon, d.nm_bdnusaha, d.atr_usaha 
				from
					tbl_registrasi a left join tbl_jnsizin b ON a.id_jnsizin = b.id_jnsizin left join tbl_pemohon c ON a.id_pemohon = c.id_pemohon left join tbl_bdnusaha d ON a.id_bdnusaha = d.id_bdnusaha WHERE a.id_jnsizin = '07' AND status_reg = 0
				$where
			");
			return $query->num_rows();
		}
		function get_data_registrasi_by_id($id) {
			$query = $this->db->query("SELECT 
							a.no_reg, a.jenis_reg,a.status_reg,a.tgl_reg,
							b.nm_izin, 
							c.id_pemohon, c.nm_pemohon,c.ktp_pemohon, c.alm_pemohon, c.hp_pemohon,
							d.nm_bdnusaha, d.atr_usaha, d.jab_pengurus , d.id_bdnusaha, d.alm_bdnusaha , d.tlp_bdnusaha, d.fax_bdnusaha,d.npwp,
							e.nm_kel, e.id_kel, e.id_kec,
							f.id_stausaha,
							g.id_katusaha
					FROM
							tbl_registrasi a 
							LEFT JOIN tbl_jnsizin b ON a.id_jnsizin = b.id_jnsizin 
							LEFT JOIN tbl_pemohon c ON a.id_pemohon = c.id_pemohon 
							LEFT JOIN tbl_bdnusaha d ON a.id_bdnusaha = d.id_bdnusaha
							LEFT JOIN tbl_kelurahan e ON d.kel_bdnusaha = e.id_kel
							LEFT JOIN tbl_stausaha f ON d.id_stausaha = f.id_stausaha
							LEFT JOIN tbl_katusaha g ON d.id_katusaha = g.id_katusaha
				WHERE no_reg = $id
			");
			return $query->row();
		}
		function update_registrasi($id, $data) {
			$this->db->where('no_reg', $id);
			$this->db->update('tbl_registrasi', $data);
		}
		
		function get_all_data_izin_by_registrasi($id) {
			$query = $this->db->query("SELECT 
				a.no_izin, a.tgl_izin, a.no_reg, a.no_reko, a.tgl_reko, a.jenis_latih,
				b.nm_kel, 
				c.id_pemohon,c.status_reg,
				d.nm_pemohon,
				e.nm_bdnusaha
			FROM 
				tbl_sipl a 
			LEFT JOIN tbl_kelurahan b ON a.id_kel = b.id_kel 
			LEFT JOIN tbl_registrasi c ON a.no_reg = c.no_reg
			LEFT JOIN tbl_pemohon d ON c.id_pemohon = d.id_pemohon
			LEFT JOIN tbl_bdnusaha e ON c.id_bdnusaha = e.id_bdnusaha 
			WHERE c.status_reg = 0 AND a.no_reg = '$id'");
			return $query->num_rows();
		}
		
		
		//menampilkan data perizinan berdasarkan registrasi
		function get_data_izin_by_registrasi($id) {
			$query = $this->db->query("SELECT 
				a.no_izin, a.tgl_izin, a.no_reg, a.no_reko, a.tgl_reko, a.jenis_latih,
				b.nm_kel, 
				c.id_pemohon,c.status_reg,
				d.nm_pemohon,
				e.nm_bdnusaha
			FROM 
				tbl_sipl a 
			LEFT JOIN tbl_kelurahan b ON a.id_kel = b.id_kel 
			LEFT JOIN tbl_registrasi c ON a.no_reg = c.no_reg
			LEFT JOIN tbl_pemohon d ON c.id_pemohon = d.id_pemohon
			LEFT JOIN tbl_bdnusaha e ON c.id_bdnusaha = e.id_bdnusaha WHERE c.status_reg = 0 AND a.no_reg = '$id'");
			return $query->row();
		}
		
		/********************************************************/
		/******************* AKHIR DATA REGISTRASI **************/
		/********************************************************/
		
		
		
		
		/*******************************************/
		/******************* UNTUK DATA IZIN  ****************/
		
		function get_all($limit=NULL,$offset=NULL)
		{
			$query = $this->db->query("SELECT 
				a.no_izin, a.tgl_izin, a.no_reg, a.no_reko, a.tgl_reko,  
				b.nm_kel, 
				c.id_pemohon,
				d.nm_pemohon,
				e.nm_bdnusaha
			FROM 
				tbl_sipl a 
			LEFT JOIN tbl_kelurahan b ON a.id_kel = b.id_kel 
			LEFT JOIN tbl_registrasi c ON a.no_reg = c.no_reg
			LEFT JOIN tbl_pemohon d ON c.id_pemohon = d.id_pemohon
			LEFT JOIN tbl_bdnusaha e ON c.id_bdnusaha = e.id_bdnusaha 
			WHERE c.status_reg = 1 
				ORDER BY a.tgl_izin DESC
				LIMIT $offset, $limit");
			return $query;
		}
		
		
		function get_all_by_id($id)
		{
			$where = "AND(a.no_izin LIKE '%$id%' OR a.no_reko LIKE '%$id%' OR a.no_reg LIKE '%$id%' OR d.nm_pemohon LIKE '%$id%' OR e.nm_bdnusaha LIKE '%$id%')";
			$query = $this->db->query("SELECT 
				a.no_izin, a.tgl_izin, a.no_reg, a.no_reko, a.tgl_reko,  
				b.nm_kel, 
				c.id_pemohon,
				d.nm_pemohon,
				e.nm_bdnusaha
			FROM 
				tbl_sipl a 
			LEFT JOIN tbl_kelurahan b ON a.id_kel = b.id_kel 
			LEFT JOIN tbl_registrasi c ON a.no_reg = c.no_reg
			LEFT JOIN tbl_pemohon d ON c.id_pemohon = d.id_pemohon
			LEFT JOIN tbl_bdnusaha e ON c.id_bdnusaha = e.id_bdnusaha WHERE c.status_reg = 1 $where
			ORDER BY a.tgl_izin DESC");
			return $query;
		}
		
		
		function get_all_data($id=NULL)
		{
			$where = "";
			if ($id != NULL) {
				$where .= "AND (no_izin LIKE '%$id%' OR no_reko LIKE '%$id%' OR d.nm_pemohon LIKE '%$id%' OR d.ktp_pemohon LIKE '%$id%')";
			}
			$query = $this->db->query("SELECT 
				a.no_izin, a.tgl_izin, a.no_reg, a.no_reko, a.tgl_reko, 
				b.nm_kel, 
				c.id_pemohon,
				d.nm_pemohon,
				e.nm_bdnusaha
			FROM 
				tbl_sipl a 
			LEFT JOIN tbl_kelurahan b ON a.id_kel = b.id_kel 
			LEFT JOIN tbl_registrasi c ON a.no_reg = c.no_reg
			LEFT JOIN tbl_pemohon d ON c.id_pemohon = d.id_pemohon
			LEFT JOIN tbl_bdnusaha e ON c.id_bdnusaha = e.id_bdnusaha WHERE c.status_reg = 1 $where AND c.id_jnsizin = '07' ");
			return $query->num_rows();
		}
		
		function get_all_data_by_id($id) {
			$query = $this->db->query("SELECT 
				a.no_izin, a.tgl_izin, a.no_reg, a.no_reko, a.tgl_reko, a.jenis_latih,
				b.nm_kel, 
				c.id_pemohon,c.id_jnsizin,
				d.nm_pemohon,
				e.nm_bdnusaha
			FROM 
				tbl_sipl a 
			LEFT JOIN tbl_kelurahan b ON a.id_kel = b.id_kel 
			LEFT JOIN tbl_registrasi c ON a.no_reg = c.no_reg
			LEFT JOIN tbl_pemohon d ON c.id_pemohon = d.id_pemohon
			LEFT JOIN tbl_bdnusaha e ON c.id_bdnusaha = e.id_bdnusaha WHERE (a.no_izin LIKE '%$id%' OR d.nm_pemohon LIKE '%$id%' OR d.ktp_pemohon LIKE '%$id%') AND c.id_jnsizin = '07'");
			return $query;
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
		
		
		function get_data_by_id($id=NULL)
		{
			$query = $this->db->query("SELECT 
					a.no_izin, a.tgl_izin, a.no_reg, a.no_reko, a.tgl_reko, a.jenis_latih,
					(DATE(tgl_izin) + INTERVAL 5 YEAR) AS tgl_berakhir,
					b.nm_kel, b.id_kel,RIGHT(b.id_kec,2) AS kecamatan,b.id_kec,
					c.id_pemohon,c.status_reg,c.tgl_reg,
					d.nm_pemohon,d.alm_pemohon, d.ktp_pemohon,d.hp_pemohon,
					e.id_bdnusaha, e.nm_bdnusaha, e.alm_bdnusaha,e.tlp_bdnusaha,e.atr_usaha,e.jab_pengurus,e.fax_bdnusaha,e.id_stausaha,e.id_katusaha,e.npwp,
					f.*

				FROM tbl_sipl a 
				LEFT JOIN tbl_kelurahan b ON a.id_kel = b.id_kel
				LEFT JOIN tbl_registrasi c ON a.no_reg = c.no_reg
				LEFT JOIN tbl_pemohon d ON c.id_pemohon = d.id_pemohon
				LEFT JOIN tbl_bdnusaha e ON c.id_bdnusaha = e.id_bdnusaha
				LEFT JOIN tbl_instansi f ON f.kode = '00'
				WHERE no_izin = '$id'
				");
return $query->row();

		}
		
		
		function get_all_data_by_izin($id) {
				$query = $this->db->query("select no_izin from tbl_sipl where no_izin = '$id'");
				return $query->num_rows();
		}
		
		
		
		
		
		function get_data_by_registrasi($id=NULL)
		{
			return $this->db->get_where($this->table, array('nomorRegistrasiIzin' => $id), 1)->row();
		}
		
		
		
		
		
		
		
		##UNTUK DATA PERIZINAN YANG SUDAH BERSTATUS TERCETAK (2)
		function get_all_cetak($limit=NULL,$offset=NULL)
		{
			$query = $this->db->query("SELECT 
				a.no_izin, a.tgl_izin, a.no_reg, a.no_reko, a.tgl_reko, 
				b.nm_kel, b.id_kel,RIGHT(b.id_kec,2) AS kecamatan,
				c.id_pemohon,c.status_reg,
				d.nm_pemohon,
				e.nm_bdnusaha
			FROM tbl_sipl a 
				LEFT JOIN tbl_kelurahan b ON a.id_kel = b.id_kel 
				LEFT JOIN tbl_registrasi c ON a.no_reg = c.no_reg
				LEFT JOIN tbl_pemohon d ON c.id_pemohon = d.id_pemohon
				LEFT JOIN tbl_bdnusaha e ON c.id_bdnusaha = e.id_bdnusaha
				LEFT JOIN tbl_kecamatan f ON b.id_kec = f.id_kec 
				WHERE c.status_reg = 2 OR c.status_reg = 3
				ORDER BY a.tgl_izin DESC
				LIMIT $offset, $limit");
			return $query;
		}
		
		
		function get_all_cetak_by_id($id)
		{
			$where = "AND(a.no_izin LIKE '%$id%' OR a.no_reg LIKE '%$id%' OR d.nm_pemohon LIKE '%$id%' OR e.nm_bdnusaha LIKE '%$id%')";
			$query = $this->db->query("SELECT 
				a.no_izin, a.tgl_izin, a.no_reg, a.no_reko, a.tgl_reko, 
				b.nm_kel, b.id_kel,RIGHT(b.id_kec,2) AS kecamatan,
				c.id_pemohon,c.status_reg,
				d.nm_pemohon,
				e.nm_bdnusaha
			FROM tbl_sipl a 
				LEFT JOIN tbl_kelurahan b ON a.id_kel = b.id_kel 
				LEFT JOIN tbl_registrasi c ON a.no_reg = c.no_reg
				LEFT JOIN tbl_pemohon d ON c.id_pemohon = d.id_pemohon
				LEFT JOIN tbl_bdnusaha e ON c.id_bdnusaha = e.id_bdnusaha
				LEFT JOIN tbl_kecamatan f ON b.id_kec = f.id_kec 
				WHERE c.status_reg = 2 OR c.status_reg = 3 $where
				ORDER BY a.tgl_izin DESC
				");
			return $query;
		}
		
		function update($id,$data) {
			$this->db->where('no_izin', $id);
			if ($this->db->update('tbl_sipl', $data))
			{
				return TRUE;				
				}
			else {
				return FALSE;				
				}
		}
		
		function get_all_data_cetak($id=NULL)
		{
			$where = "";
			if ($id != NULL) {
				$where .= " AND(a.no_izin LIKE '%$id%' OR a.no_reg LIKE '%$id%' OR d.nm_pemohon LIKE '%$id%' OR e.nm_bdnusaha LIKE '%$id%')";
			}
			
			$query = $this->db->query("SELECT 
				a.no_izin, a.tgl_izin, a.no_reg, a.no_reko, a.tgl_reko, 
				b.nm_kel, b.id_kel,RIGHT(b.id_kec,2) AS kecamatan,
				c.id_pemohon,c.status_reg,
				d.nm_pemohon,
				e.nm_bdnusaha
			FROM tbl_sipl a 
				LEFT JOIN tbl_kelurahan b ON a.id_kel = b.id_kel 
				LEFT JOIN tbl_registrasi c ON a.no_reg = c.no_reg
				LEFT JOIN tbl_pemohon d ON c.id_pemohon = d.id_pemohon
				LEFT JOIN tbl_bdnusaha e ON c.id_bdnusaha = e.id_bdnusaha
				LEFT JOIN tbl_kecamatan f ON b.id_kec = f.id_kec WHERE c.status_reg = 2 OR c.status_reg = 3 $where ");
			return $query->num_rows();
		}
		
		
		
		
		
		
		/******************************
		UNTUK DATA KELURAHAN
		*******************************/
		function get_all_kelurahan()
		{
			$sql = $this->db->query("select *from tbl_kelurahan");
			return $sql;
		}
		
		function get_data_kecamatan($id) {
			$sql = $this->db->get_where('tbl_kelurahan', array('id_kel' => $id), 1);
			return $sql->row();
		}
		
		
		
		function addUbahStatus($data) {
			$this->db->insert('tbl_ubahstatus', $data);
		}
		
		#untuk No Blanko
		function get_end_no_blangko()
		{
			$query =  $this->db->query("select * from tbl_blangko order by no_seri desc");
			$data =  $query->row();
			if($query->num_rows() == 0)
				$no = 0;
			else
				$no = $data->no_seri;
			return $no + 1;
		}

		function add_blangko($data){
			if ($this->db->insert('tbl_blangko', $data)) {
				return TRUE;				
				}	
				else {
				return FALSE;					
					}
		}
		
	}

?>