 
<?php


    class Akses_model extends CI_Model {
    
	function __construct() {
	    parent::__construct();
	}
	
	

	function get_all_data_user_done($args=NULL) {
			$query = $this->db->query("select a.id_login, a.id_group, a.id_user, b.id_akses,b.id_loket, c.nm_loket 
			from 
			tbl_login a 
			left join tbl_akses b on a.id_login = b.id_login
			left join tbl_loket c on c.id_loket = b.id_loket
			where a.id_group != 1");
			if ($args == "jumlah")
				return $query->num_rows();
			else 
				return $query;	
	}

function get_all_data_user_none($args=NULL) {
			$query = $this->db->query("select a.id_login, a.id_group, a.id_user, b.id_akses,b.id_loket from tbl_login a left join tbl_akses b on a.id_login = b.id_login where b.id_login IS NULL and a.id_group != 1");
			if ($args == "jumlah")
				return $query->num_rows();
			else 
				return $query;	
	}

	

	function get_user_by_id($id) {
			$query = $this->db->query("
						select 
								a.id_login, 
								b.id_user, 
								b.nm_user, 
								b.nip 
						from 
								tbl_login 
								a left join tbl_user b on a.id_user = b.id_user WHERE a.id_login = '$id'
			");
			return $query->row();
	}
	



	
	function get_data_by_id($id) {
			$query = $this->db->query("
						SELECT 
								a.id_login, 
								b.id_user, 
								b.nm_user, 
								b.nip,
								c.id_akses,
								c.id_loket 
						FROM 
								tbl_login 
								a LEFT JOIN tbl_user b ON a.id_user = b.id_user
								LEFT JOIN tbl_akses c ON c.id_login = a.id_login WHERE c.id_akses = '$id'
			");
			return $query->row();
	}
	


	
	function add($data) {
			$this->db->insert('tbl_akses',$data);
	}

	
	//untuk data loket
	function get_all_data_loket() {
					$query = $this->db->query("select *from tbl_loket order by id_loket ASC");
					return $query;
	}
    

	function update($id, $data)
		{
			$this->db->where('id_akses', $id);
			$this->db->update('tbl_akses', $data);
		}}