<?php

		class General {
			
				var $ci;
				
				function __construct() {
						$this->ci =& get_instance();	
				}	
				
				
				function isLogin() {
						if ($this->ci->session->userdata('is_login') == TRUE) {
								return TRUE;	
						}	
						else {
								return FALSE;	
						}
				}
				
				function checkAkses()
				{
					$query = $this->ci->db->count_all('users');
					return $query->num_rows();
				}
				
				
				
				
			
		}

?>