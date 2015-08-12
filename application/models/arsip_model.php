<?php

	class Arsip_model extends CI_Model {
		function __construct() {
			parent::__construct();
		}
		
		//untuk data pengarsipan
		#8*********************************************#
		function add_arsip($data) {
			$this->db->insert('tbl_arsip', $data);
		}
		
		function check_arsip($id) {
			$query = $this->db->query("select *from tbl_arsip where no_izin = '$id'");
			return $query->num_rows();
		}
		
		function check_arsip_izin($id) {
			$query = $this->db->query("select *from tbl_arsip where no_izin = '$id' AND tipe_arsip = 1");
			return $query->num_rows();
		}
		
		function check_arsip_reko($id) {
			$query = $this->db->query("select *from tbl_arsip where no_izin = '$id' AND tipe_arsip = 0");
			return $query->num_rows();
		}
		
		function get_data_reko_by_id($id) {
			$query = $this->db->query("select *from tbl_arsip where no_izin = '$id' AND tipe_arsip = 0");
			return $query->row();
		}
		function get_data_izin_by_id($id) {
			$query = $this->db->query("select *from tbl_arsip where no_izin = '$id' AND tipe_arsip = 1");
			return $query->row();
		}
	}
	
?>