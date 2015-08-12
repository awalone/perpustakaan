<?php




	class ManajemenLogin extends CI_Controller
	{	
		function __construct()
		{
			parent::__construct();
			
			$this->load->model('manajemenlogin_model','login',TRUE);
			$this->load->model('login_model','login_model',TRUE);
			$this->load->model('group_model','group',TRUE);
			
		}
		var $title = 'Manajemen Login';
		var $limit = 15;
		
		function check() {
		
			if ($this->session->userdata('level') == 'admin') {
				RETURN TRUE;
			}
			else {
				return FALSE;
			}
		}
		
		function valid_id($id) {
					if ($this->login->get_all_data_by_id($id) > 0) {
								$this->form_validation->set_message('valid_id', "Pegawai dengan ID Login $id sudah terdaftar Sebelumnya");	
								return FALSE;
						}
					else {
							
							return TRUE;
					}
		}
		
		function valid_password($pass) {
					if ($this->login_model->get_data_by_username($this->session->userdata('idLogin'),$pass,"jumlah") > 0) {
						return TRUE;		
						}
					else {
						$this->form_validation->set_message('valid_password', "Password Sebelumnya Salah");	
								return FALSE;
					}
		}
		
		
		function valid_confirm_password($pass1, $pass2) {
					if ($pass1 == $pass2) {
								$this->form_validation->set_message('valid_confirm_password', "Confirmasi Passwordnya Tidak Sama");	
								return FALSE;
						}
					else {
							
							return TRUE;
					}
		}
		
		function index()
		{
			
			if ($this->check() == TRUE) 
			{
				$data['title'] = $this->title;
				$data['h2_title'] = 'Data Pengguna';
				$data['main_view'] = 'manajemenLogin/manajemenLogin';
				$data['search']	= site_url('manajemenLogin/search_process');
				//offset
				$uri_segment	= 3;
				$offset			= $this->uri->segment($uri_segment);
			
				$data['query']  = $this->login->get_all_data_user_done()->result();
				$data['jumlah'] = $this->login->get_all_data_user_done("jumlah");
			
				//link untuk menuju ke halaman tambah data
				$data['link'] = site_url('manajemenLogin/add');
			
				//meload view
				$this->load->view('template', $data);
			}
			else {
				redirect('login');
			}
					
		}
		
		
		
		
		
		
		//fungsi untuk tambah data
		function add()
		{
		
			if ($this->check() == TRUE) 
			{
			
				//disini hanyalah melengkapi item item yang nantinya akan ditampilkan di halaman tambah data seperti, judul, nama link, dll
				$data['title'] = $this->title;
				$data['h2_title'] = 'Manajemen User > Tambah Data User'; 
			
		
				$data['query']  = $this->login->get_all_data_user_none()->result();
				$data['jumlah'] = $this->login->get_all_data_user_none("jumlah");
			
				
				//file viewnya ada di suratmasuk/surat_form.php
				$data['main_view'] = 'manajemenLogin/manajemenUser_pilih';
				
				$data['button']	= 'Input Data';
			
				//load file viewnya
				$this->load->view('template', $data);
			}
			else {
				redirect('login');
			}
		
		}		
		
		//fungsi untuk tambah data
		function pilih($id)
		{
		
			if ($this->check() == TRUE) 
			{
			
				//disini hanyalah melengkapi item item yang nantinya akan ditampilkan di halaman tambah data seperti, judul, nama link, dll
				$data['title'] = $this->title;
				$data['h2_title'] = 'Manajemen User > Tambah Data User'; 
			
				$this->session->set_userdata('id',$id);
				
				$datanya  = $this->login->get_user_by_id($id);
				$data['default']['idUser'] = $datanya->id_user;
				$data['default']['namaLengkap'] = $datanya->nm_user;
				$data['default']['nip']	= $datanya->nip;
				
				//untuk golongan
				$golongan = $this->group->get_all()->result();
				foreach($golongan as $row)
				{
					$data['golongan']['']	= "--Pilih Group--";
					$data['golongan'][$row->id_group] = $row->nm_group;
				}
				
				
				//file viewnya ada di suratmasuk/surat_form.php
				$data['form_action'] = site_url('manajemenLogin/add_process');
				$data['main_view'] = 'manajemenLogin/manajemenUser_form';
				
				$data['button']	= 'Input Data';
			
				//load file viewnya
				$this->load->view('template', $data);
			}
			else {
				redirect('login');
			}
		
		}		
		
		
		//fungsi untuk proses penambahan datanya 
		function add_process()
		{
		
			if ($this->check() == TRUE) 
			{
			
				//disini hanyalah melengkapi item item yang nantinya akan ditampilkan di halaman tambah data seperti, judul, nama link, dll
				$data['title'] = $this->title;
				$data['h2_title'] = 'Manajemen User > Tambah Data User'; 
				
				$id = $this->session->userdata('id');
				$datanya  = $this->login->get_user_by_id($id);
				$data['default']['idUser'] = $datanya->id_user;
				$data['default']['namaLengkap'] = $datanya->nm_user;
				$data['default']['nip']	= $datanya->nip;
		
				
			
				$data['main_view'] = 'manajemenLogin/manajemenUser_form';
				$data['form_action'] = site_url('manajemenLogin/add_process');
				$data['linkBack'] = site_url('manajemenLogin');
				$data['button']	= 'Input Data';
				//untuk golongan
				$golongan = $this->group->get_all()->result();
				foreach($golongan as $row)
				{
					$data['golongan']['']	= "--Pilih Group--";
					$data['golongan'][$row->id_group] = $row->nm_group;
				}
				//mengeset validasinya
				$this->form_validation->set_rules('idLogin','ID Login','required|callback_valid_id');
				$this->form_validation->set_rules('password','Password User','required');
				$this->form_validation->set_rules('golongan','Golongan','required');
				
				
				if ($this->form_validation->run() == TRUE)
				{
					$idUser = $this->input->post('idUser');			
					$idLogin= $this->input->post('idLogin');
					$password = md5($this->input->post('password'));
					$idGroup = $this->input->post('golongan');
					$dataUser = array(
					    
					    'id_user'	=> $id,
							 'id_group'	=> $idGroup,
							 'id_login'	=> $idLogin,
							 'passwd'	=> $password
					    
					);
					$this->login->add($dataUser);
					$this->session->set_flashdata('sukses', 'Satu Data User telah berhasil ditambahkan');
					redirect('manajemenLogin');
				}
			
				else
				{
					$this->load->view('template', $data);
				}
			}
			else {
				redirect('login');
			}
			
		}
		

		function update($id)
		{
			
			if ($this->check() == TRUE) 
			{
				//disini hanyalah melengkapi item item yang nantinya akan ditampilkan di halaman tambah data seperti, judul, nama link, dll
			
				$data['title'] = $this->title;
				$data['main_view'] = 'manajemenLogin/manajemenUser_form';
				$data['form_action'] = site_url('manajemenLogin/update_process');
				$data['linkBack'] = site_url('module');
				$data['button']	= 'Update Data';
				
				$datanya = $this->login->get_data_by_id($id);
				//buat session untuk menyimpan data primary key
				$this->session->set_userdata('id', $datanya->id_user);
			
				//untuk golongan
				$golongan = $this->group->get_all()->result();
				foreach($golongan as $row)
				{
					if ($datanya->id_group == $row->id_group) {
						$data['selected'][$row->id_group] = $datanya->id_group;
					}
					$data['golongan']['']	= "--Pilih Group--";
					$data['golongan'][$row->id_group] = $row->nm_group;
				}
			
				//data untuk mengisi field2 form
				$data['default']['idUser'] = $datanya->id_user;
				
				$data['default']['namaLengkap']   = $datanya->nm_user;
				$data['default']['nip']   = $datanya->nip;
				$data['default']['idLogin'] = $datanya->id_login;
				
				$this->load->view('template', $data);
			}
			else {
				redirect('login');
			}
		}
		
		
		
		function update_process()
		{
			
			if ($this->check() == TRUE) 
			{
				$data['title'] = $this->title;
				$data['main_view'] = 'manajemenLogin/manajemenUser_form';
				$data['form_action'] = site_url('manajemenUser/update_process');
				$data['linkBack'] = site_url('module');
				$data['button']	= 'Update Data';
				$id = $this->session->userdata('id');
				$datanya = $this->login->get_data_by_id($id);
				//buat session untuk menyimpan data primary key
				
			
				//untuk golongan
				$golongan = $this->group->get_all()->result();
				foreach($golongan as $row)
				{
					if ($datanya->id_group == $row->id_group) {
						$data['selected'][$row->id_group] = $datanya->id_group;
					}
					$data['golongan']['']	= "--Pilih Group--";
					$data['golongan'][$row->id_group] = $row->nm_group;
				}
			
				//data untuk mengisi field2 form
				$data['default']['idUser'] = $datanya->id_user;
				
				$data['default']['namaLengkap']   = $datanya->nm_user;
				$data['default']['nip']   = $datanya->nip;
				$data['default']['idLogin'] = $datanya->id_login;
				
				
				
				//mengeset validasinya
				$this->form_validation->set_rules('idLogin','ID Login','required');
				$this->form_validation->set_rules('golongan','Golongan','required');
				
				if ($this->form_validation->run() == TRUE)
				{
					$idUser = $this->input->post('idUser');			
					$idLogin= $this->input->post('idLogin');
					$password = $this->input->post('password');
					$idGroup = $this->input->post('golongan');
					if ($password != "")
					{
						$dataUser = array(
							'id_user'	=> $id,
							'id_group'	=> $idGroup,
							'id_login'	=> $idLogin,
							'passwd'	=> md5($password)
						);
					}
					else {
						$dataUser = array(
							'id_user'	=> $id,
							'id_group'	=> $idGroup,
							'id_login'	=> $idLogin
						);
					}
					
					
						
					
					$this->login->update($id, $dataUser);
					$this->session->set_flashdata('sukses', 'Satu Data User telah berhasil diubah');
					redirect('manajemenLogin');
				}
				
				else
				{
					$this->load->view('template', $data);
				}
			}
			else {
				redirect('login');
			}
			
		}
		
		
		
		/*
		
		untuk pergantian password
		*/
		function change_password() {
			
			$data['title'] = $this->title;
			$data['main_view'] = 'manajemenLogin/manajemenUser_form_password';
			$data['form_action'] = site_url('manajemenLogin/change_password_process');
			$data['linkBack'] = site_url('module');
			$data['button']	= 'Update Data';
			$id = $this->session->userdata('idUser');
			$datanya = $this->login->get_data_by_id($id);
			//buat session untuk menyimpan data primary key
			
			//untuk golongan
			$golongan = $this->group->get_all()->result();
			foreach($golongan as $row)
			{
				if ($datanya->id_group == $row->id_group) {
					$data['selected'][$row->id_group] = $datanya->id_group;
				}
				$data['golongan']['']	= "--Pilih Group--";
				$data['golongan'][$row->id_group] = $row->nm_group;
			}
			
			//data untuk mengisi field2 form
			$data['default']['idUser'] = $datanya->id_user;
			
			$data['default']['namaLengkap']   = $datanya->nm_user;
			$data['default']['nip']   = $datanya->nip;
			$data['default']['idLogin'] = $datanya->id_login;
				
			$this->load->view('template', $data);
		}
		
		
		
		
		function change_password_process()
		{
			
				$data['title'] = $this->title;
				$data['main_view'] = 'manajemenLogin/manajemenUser_form_password';
				$data['form_action'] = site_url('manajemenLogin/change_password_process');
				$data['linkBack'] = site_url('module');
				$data['button']	= 'Update Data';
				$id = $this->session->userdata('idUser');
				$datanya = $this->login->get_data_by_id($id);
				//buat session untuk menyimpan data primary key
				
				
				//untuk golongan
				$golongan = $this->group->get_all()->result();
				foreach($golongan as $row)
				{
					if ($datanya->id_group == $row->id_group) {
						$data['selected'][$row->id_group] = $datanya->id_group;
					}
					$data['golongan']['']	= "--Pilih Group--";
					$data['golongan'][$row->id_group] = $row->nm_group;
				}
			
				//data untuk mengisi field2 form
				$data['default']['idUser'] = $datanya->id_user;
				
				$data['default']['namaLengkap']   = $datanya->nm_user;
				$data['default']['nip']   = $datanya->nip;
				$data['default']['idLogin'] = $datanya->id_login;
				
				$passwordbaru = $this->input->post('passwordbaru');
				$passwordbaruconfirm = $this->input->post('passwordbaruconfirm');
				
				
				//mengeset validasinya
				$this->form_validation->set_rules('idLogin','ID Login','required');
				$this->form_validation->set_rules('password','Password','required|callback_valid_password');
				$this->form_validation->set_rules('passwordbaru','Password Baru','required');
				$this->form_validation->set_rules('passwordbaruconfirm','Konfirmasi Password','required|matches[passwordbaru]');
				
				if ($this->form_validation->run() == TRUE)
				{
					$idUser = $this->input->post('idUser');			
					$idLogin= $this->input->post('idLogin');
					$password = $this->input->post('password');
					$idGroup = $this->input->post('golongan');
					
					$dataUser = array(
						'passwd'	=> md5($passwordbaruconfirm)
					);
					
					
						
					
					$this->login->update($id, $dataUser);
					$this->session->set_flashdata('sukses', 'Satu Data User telah berhasil diubah');
					redirect('home');
				}
				
				else
				{
					
					$this->load->view('template', $data);
				}
		
		}
		
		
		
	}

?> 
