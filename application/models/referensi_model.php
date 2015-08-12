<?php

	class Referensi_model extends CI_Model {
		
		function __construct() {
			parent::__construct();
		}
		
		//fungsi model untuk pengiriman SMS
		function send_message($data) {
			$this->db->insert('outbox', $data);
		}
		
		function get_all_data_by_kecamatan($id) {
			$query = $this->db->query("select *from tbl_kelurahan where id_kec = '$id'");
			return $query->num_rows();
		}
		
		
		
		//untuk status jenis tanah
		function get_data_status_tanah($id=NULL) {
			$where = "";
			if ($id != NULL) {
				$where .= "WHERE id_jns = $id";
			}
			$query = $this->db->query("select *from tbl_jnsstatustanah $where");
			return $query;
		}
		
		
		function get_all_kelurahan_by_id($id) {
			$query = $this->db->query("select *from tbl_kelurahan where id_kec = '$id'");
			return $query;
		}
		
		
		/**************************
		untuk data data kecamatan
		***************************/
		function get_all_kelurahan() {
			return $this->db->get('tbl_kelurahan');
		}
		function get_all_kecamatan() {
			return $this->db->get('tbl_kecamatan');
		}
		function get_all_data_kelurahan() {
			return $this->db->count_all('tbl_kelurahan');
		}
		
		function get_data_by_kelurahan($id) {
			$q = $this->db->query("select a.id_kel, a.nm_kel, b.nm_kec,b.id_kec, b.kd_wil from tbl_kelurahan a left join tbl_kecamatan b ON a.id_kec = b.id_kec  where id_kel = '$id'");
			return $q->row();
		}
		function get_all_data_by_kelurahan($id) {
			$q = $this->db->query("select a.id_kel, a.nm_kel, b.nm_kec,b.id_kec, b.kd_wil from tbl_kelurahan a left join tbl_kecamatan b ON a.id_kec = b.id_kec  where id_kel = '$id'");
			return $q->num_rows();
		}
		
		
		
		/*
		untuk data attribut usaha
		*/
		function get_all_attribut() {
			$query = $this->db->query("select *from tbl_katusaha");
			return $query;
		}
		
		
		
		//untuk data status usaha
		function get_all_stausaha() {
			$query = $this->db->query("select *from tbl_stausaha");
			return $query;
		}
		function get_all_stausaha_by_id($id) {
			$query = $this->db->query("select *from tbl_stausaha where id_stausaha = '$id'");
			return $query->row();
		}
		
		
		//ubah status
		function addUbahStatus($data) {
			$this->db->insert('tbl_ubahstatus', $data);
		}
		
		
		//untuk log
		function addLog($data) {
			$this->db->insert('tbl_log', $data);
		}
		
	}