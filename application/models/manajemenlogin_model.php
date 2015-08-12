 
<?php


    class Manajemenlogin_model extends CI_Model {
    
	function __construct() {
	    parent::__construct();
	}
	
	

	function get_all_data_user_done($args=NULL) {
			$query = $this->db->query("SELECT 
				a.id_user,a.nm_user, 
				b.id_login ,
				c.nm_group
			
					FROM tbl_login b 
				LEFT JOIN tbl_user a ON b.id_user = a.id_user 
				LEFT JOIN tbl_group c ON b.id_group = c.id_group
				WHERE b.passwd != ''");
			if ($args == "jumlah")
				return $query->num_rows();
			else 
				return $query;	
	}


function get_all_data_user_none($args=NULL) {
			$query = $this->db->query("select a.id_login, a.id_group, b.id_user, b.nm_user, b.nip from tbl_user b left join tbl_login a on b.id_user = a.id_user where a.id_user is null");
			
				if ($args == "jumlah")
				return $query->num_rows();
			else 
				return $query;	
	}
	
	function get_data_by_id($id) {
		$query = $this->db->query("SELECT 
			a.id_login, a.id_group, 
			b.id_user, b.nm_user, b.nip 
				FROM 
			tbl_user b 
			LEFT JOIN 
			tbl_login a ON b.id_user = a.id_user WHERE a.id_user = '$id'");
		return $query->row();
	}

	function get_user_by_id($id) {
			return $this->db->get_where('tbl_user', array('id_user' => $id), 1)->row();
	}
	
	function add($data) {
			$this->db->insert('tbl_login',$data);
	}
	
	function update($id, $data)
	{
		$this->db->where('id_user', $id);
		if ($this->db->update('tbl_login', $data))
		{
			return TRUE;				
		}
		else {
			return FALSE;				
		}
			
		}
	

	#fungsi untuk menampilkan jumlah data user berdasarkan id user
		function get_all_data_by_id($id) {
				$query = $this->db->get_where('tbl_login', array('id_login'=>$id));
				return $query->num_rows();
			}
	
    
}