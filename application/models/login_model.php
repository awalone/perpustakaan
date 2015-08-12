 
<?php


    class Login_model extends CI_Model {
    
	function __construct() {
	    parent::__construct();
	}
	
	var $tableLogin = 'tbl_login';
	var $tableGroup = 'tbl_group';
	var $tableUser = 'tbl_user';
	var $tableAkses = 'tbl_akses';
	
	
	#fungsi untuk menambahkan data user baru
	function add($data)
		{
			if ($this->db->insert($this->tableUser, $data)) {
				return TRUE;				
				}	
				else {
				return FALSE;					
					}
		}
	
	function get_data_by_username($username, $password, $arg) {
	    
	    $password = md5($password);
	    
	    
	    $query = $this->db->get_where($this->tableLogin, array('id_login'=>$username, 'passwd'=>$password),1, 0);
	    
	    if ($arg == "jumlah") {
	      
		  if ($query->num_rows() > 0)
		  {
		    return TRUE;
		  }
		  else
		  {
		    return FALSE;
		  }
	    }
	    else
	    {
	    
		 return $query->row();
	    
	    }	    
	}
	
	
	
	
	function get_data_by_group($id) {
		$query = $this->db->get_where($this->tableGroup, array('id_group	' => $id),1,0);
		return $query->row();
	}
	
	function get_data_by_user($id) {
		$query = $this->db->get_where($this->tableUser, array('id_user	' => $id),1,0);
		return $query->row();
	}
	
	function get_data_by_akses($id) {
		$query = $this->db->query("SELECT a.id_akses,a.id_login, a.id_loket, b.nm_loket FROM tbl_akses a LEFT JOIN tbl_loket b ON a.id_loket = b.id_loket WHERE a.id_login = '$id'");
		#$query = $this->db->get_where($this->tableAkses, array('id_login	' => $id),1,0);
		return $query->row();
	}
	
	
	/* untuk tabel session */
	function addSession($data) {
		$this->db->insert('tbl_sesi', $data);
	}
	
	function get_data_by_session($id) {
		$query = $this->db->get_where('tbl_sesi', array('id_sesi	' => $id),1,0);
		return $query->row();
	}
	
	function updateSession($id,$data) {
		$this->db->where('id_sesi', $id);
		$this->db->update('tbl_sesi', $data);
	}

    	#fungsi untuk menampilkan data user
	function get_all($limit, $offset)
		{
			$this->db->limit($limit, $offset);
			return $this->db->get('tbl_user');
		}
		
		
		#fungsi untuk menampilkan jumlah data user
		function get_all_data($id=NULL)
		{
			if ($id!= NULL) {
				return $this->db->get_where('tbl_user', array('id_user' => $id))->num_rows();
			}
			else {
				return $this->db->count_all('tbl_user');
			}
			
		}
		
			#fungsi untuk menampilkan data user berdasarkan id_user
		function get_data_by_id($id=NULL)
		{
			return $this->db->get_where('tbl_user', array('id_user' => $id), 1)->row();
		}
		
		
		function update($id, $data)
		{
			$this->db->where('id_user', $id);
			if ($this->db->update($this->tableUser, $data))
			{
				return TRUE;				
				}
			else {
				return FALSE;				
				}
			
		}
		
		
	}