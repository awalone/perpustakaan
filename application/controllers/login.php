<?php

    class Login extends CI_Controller
    {
	function __construct() {
	    
	    parent::__construct();
	    $this->load->model('login_model','login',TRUE);

	 
	}
	
	
	
	
	
	function index() {
				
			 //cek, bila sebelumnya sudah login atau tidak..
	    //kalau udah login sebelumnya, maka langsung redirect saja ke halaman dashboard
		$data['title']	= 'Halaman Login';
	    $data['h2_title']	= 'login';
	    $data['main_view'] = 'login/login_view';
	    $data['action']	= site_url('login/checkuser');
	    if ($this->session->userdata('login')) {
			if ($this->session->userdata('level') == 'admin')
			
				redirect('home');
			else {
				redirect('home');
			}
	    }
	    else {
		  		#$this->load->view('template', $data);
				$this->load->view('templatelogin',$data);
	    }
		
	}
	
	
	function checkuser() {
	
	    $username = $this->input->post('username');
	    $password = $this->input->post('password');
	
				
	   	if ($this->login->get_data_by_username($username,$password,'jumlah') == TRUE)
				{
	    					
	    			$datanya = $this->login->get_data_by_username($username, $password,'data');
		    
			
						$idLogin = $datanya->id_login;
						$idUser  = $datanya->id_user;
						$idGroup = $datanya->id_group;
						
						#dapatkan identitas groupnya
						$dataGroup = $this->login->get_data_by_group($idGroup);
							
						
						#dapatkan identitas usernya
						$dataUser = $this->login->get_data_by_user($idUser);
						
						
			
			
						if ($idGroup == 1) {
							$uniqueId = uniqid($this->input->ip_address(), TRUE);
							$data = array(
									'namaLengkap' => $dataUser->nm_user,
									'idLogin'	  => $idLogin,
									'idGroup'	  => $idGroup,
									'idUser'	=> $idUser,
									'level'		  => 'admin',
									'my_session_id' => md5($uniqueId),
									'login'		  => TRUE
							);
							$this->session->set_userdata($data);
							
							
							redirect('home');
							
						}
			else {
				
				#data tabel akses
				
				$dataAkses = $this->login->get_data_by_akses($idLogin);
				$idAkses = $dataAkses->id_akses;
				$uniqueId = uniqid($this->input->ip_address(), TRUE);
				$data = array(
					'namaLengkap' => $dataUser->nm_user,
					'idLogin'	  => $idLogin,
					'idGroup'	  => $idGroup,
					'level'		  => 'loket',
					
					'idUser'	=> $idUser,
					'my_session_id' => md5($uniqueId),
					'loket'		  => $dataAkses->id_loket,
					'nm_loket'		=> $dataAkses->nm_loket,
					'login'		  => TRUE
				);
				
				
				$this->session->set_userdata($data);
				
				
				$dataSesi = array(
					'id_sesi'	=> md5($uniqueId),
					'id_akses'	=> $idAkses,
					'tgl_login'	=> date('Y-m-d H:i:s')
				);
				$this->login->addSession($dataSesi);
				
				redirect('home');
				
			}
			
			
		} else {
			redirect('login');
		}
		
		 
	}
	
			function logout()
			{
					/*
				$getDataSesi = $this->login->get_data_by_session($this->session->userdata('my_session_id'));
				$tglLogout = array(
					'tgl_logout' => date('Y-m-d H:i:s')
				);
				$this->login->updateSession($this->session->userdata('my_session_id'),$tglLogout);
				*/
				$this->session->sess_destroy();
				redirect('login', 'refresh');
		
			}	
	
	
	}
	
	
	
	
