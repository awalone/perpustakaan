<?php

	class Peminjaman_model extends CI_Model {
		function __construct() {
			parent::__construct();
		}
		
		var $table = 'perpustakaan_pinjaman_temp';
		var $primaryKey = 'temp_id';


		//untuk data pegawai
		#8*********************************************#


		function get_all()
		{
			$query = $this->db->query("select *from perpustakaan_pinjaman_temp ORDER BY temp_id DESC");
			return $query;
		}
		
		function get_all_data()
		{
			return $this->db->count_all($this->table);
		}
		

		function get_data_by_session($session)
		{
			$query = $this->db->query("SELECT a.*, b.*, c.* FROM perpustakaan_pinjaman_temp a LEFT JOIN perpustakaan_buku b ON a.`temp_id_buku` = b.`buku_id`
LEFT JOIN perpustakaan_jenis_buku c ON b.`buku_jenis` = c.`jenis_buku_id` WHERE a.temp_session='$session' ORDER BY a.temp_id DESC");
			return $query;
		}

		function get_all_data_by_session($session)
		{
			$query = $this->db->query("select temp_id from perpustakaan_pinjaman_temp WHERE temp_session='$session'  ORDER BY temp_id DESC ");
			return $query->num_rows;
		}

		function add($data) {
			$this->db->insert($this->table, $data);
		}
		
		function delete($id)
		{
			$this->db->delete($this->table, array($this->primaryKey=> $id));
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


		function add_peminjaman($data){
			$this->db->insert('perpustakaan_pinjaman', $data);
		}

		function add_pinjam_detail($data) {
			$this->db->insert('perpustakaan_pinjaman_detail', $data);
		}

		function delete_session($id) {
			$this->db->delete('perpustakaan_pinjaman_temp', array('temp_session'=> $id));
		}

		function get_identitas_peminjaman() {
			$query = $this->db->query("
					SELECT 
						a.pinjaman_detail_id,a.`status_buku`,
						b.pinjaman_kode_unik,b.`pinjaman_tanggal_pinjam`, b.`pinjaman_tanggal_kembali`,b.`pinjaman_jaminan`,
						c.`buku_judul`,c.`buku_pengarang`,c.`buku_download`,c.`buku_sinopsis`,c.`buku_lokasi_rak`,
						d.`jenis_buku_nama`,
						e.`anggota_nama`, e.`anggota_foto`,e.`anggota_kode`, e.`anggota_jkel`, e.`anggota_nim`
					FROM 
						perpustakaan_pinjaman_detail a 
						LEFT JOIN perpustakaan_pinjaman b ON a.`pinjaman_detail_id_order` = b.`pinjaman_id_order` 
						LEFT JOIN perpustakaan_buku c ON  a.`pinjaman_detail_buku` = c.`buku_id`
						LEFT JOIN perpustakaan_jenis_buku d ON c.`buku_jenis` = d.`jenis_buku_id`
						LEFT JOIN perpustakaan_anggota e ON b.`pinjaman_konsumen` = e.`anggota_id`
					ORDER BY a.pinjaman_detail_id DESC
				");

			return $query;
		}


	}
	
?>