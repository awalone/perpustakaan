<?php




	class ManajemenUser extends CI_Controller
	{	
		function __construct()
		{
			parent::__construct();
			$this->load->model('login_model','login',TRUE);
			$this->load->model('group_model','group',TRUE);
			
		
			
		}
		var $title = 'manajemenUser';
		var $limit = 10;
		
		
		function check() {
		
			if ($this->session->userdata('level') == 'admin') {
				RETURN TRUE;
			}
			else {
				return FALSE;
			}
		}
		
		function index($offset = 0)
		{
			
			if ($this->check() == TRUE) 
			{	
				$data['title'] = $this->title;
				$data['h2_title'] = 'Data Pengguna';
				$data['main_view'] = 'manajemenUser/manajemenUser';
				$data['search']	= site_url('manajemenUser/search_process');
				//offset
				
				$uri_segment = 3;
				$offset = $this->uri->segment($uri_segment);
				
			
				$data['query']  = $this->login->get_all($this->limit, $offset)->result();
				$data['jumlah'] = $this->login->get_all_data();
				
				$config = array(
					'base_url'	=> site_url('manajemenUser/index'),
					'total_rows'=> $this->login->get_all_data(),
					'per_page'	=> $this->limit,
					'uri_segment' => $uri_segment
				);
				$this->pagination->initialize($config);
				$data['pagination'] = $this->pagination->create_links();
				
				
				//link untuk menuju ke halaman tambah data
				$data['link'] = site_url('manajemenUser/add');
			
				//meload view
				$this->load->view('template', $data);
			}
			else {
				redirect('login');
			}
					
		}
		
		
		function search_process() {
			if ($this->check() == TRUE) 
			{
				$keyword = $this->input->post('keyword');
				$data['title'] = $this->title;
				$data['h2_title'] = 'Data Pengguna';
				$data['main_view'] = 'manajemenUser/manajemenUser';
				$data['search']	= site_url('manajemenUser/search_process');
				//offset
					
				$uri_segment = 3;
				$offset = $this->uri->segment($uri_segment);
					
				
				$data['query']  = $this->login->get_all_by_keyword($this->limit, $offset, $keyword)->result();
				$data['jumlah'] = $this->login->get_all_data_by_keyword($keyword);
					
				$config = array(
					'base_url'	=> site_url('manajemenUser/index'),
					'total_rows'=> $this->login->get_all_data_by_keyword($keyword),
					'per_page'	=> $this->limit,
					'uri_segment' => $uri_segment
				);
				$this->pagination->initialize($config);
				$data['pagination'] = $this->pagination->create_links();
					
					
				//link untuk menuju ke halaman tambah data
				$data['link'] = site_url('manajemenUser/add');
				
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
			
		
				//untuk level
				$level = $this->group->get_all()->result();
			
				foreach($level as $row)
				{
					$data['level']['']	= "--Pilih Level--";
					$data['level'][$row->id_group] = $row->nm_group;
				}
			
				//file viewnya ada di suratmasuk/surat_form.php
				$data['main_view'] = 'manajemenUser/manajemenUser_form';
				$data['form_action'] = site_url('manajemenUser/add_process');
				$data['linkBack'] = site_url('manajemenUser');
				$data['button']	= 'Input Data';
			
				//load file viewnya
				$this->load->view('template', $data);
			}
			else {
				redirect('login');
			}
		
		}		
		
		
		function valid_id($id) {
					if ($this->login->get_all_data($id) > 0) {
								$this->form_validation->set_message('valid_id', "Pegawai dengan ID User $id sudah terdaftar Sebelumnya");	
								return FALSE;
						}
					else {
							
							return TRUE;
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
			
				
				
			
				$data['main_view'] = 'manajemenUser/manajemenUser_form';
				$data['form_action'] = site_url('manajemenUser/add_process');
				$data['linkBack'] = site_url('manajemenUser');
				$data['button']	= 'Input Data';
			
				//mengeset validasinya
				$this->form_validation->set_rules('idUser','ID User','required|callback_valid_id');
				$this->form_validation->set_rules('namaLengkap', 'Nama Lengkap', 'required');
				$this->form_validation->set_rules('nip','Nomor Induk Pegawai','required');
				
		
				
				if ($this->form_validation->run() == TRUE)
				{
					$idUser = $this->input->post('idUser');			
					$namaLengkap = $this->input->post('namaLengkap');
					$nip = $this->input->post('nip');
					$pangkat = $this->input->post('pangkat');
					$golongan = $this->input->post('golongan');
					$jabatan = $this->input->post('jabatan');
					$noTelp  = $this->input->post('noTelp');
					$email = $this->input->post('email');
					$dataUser = array(
					    
					    'id_user'	=> $idUser,
						'nm_user'	=> $namaLengkap,
						'nip'	=> $nip,
						'pangkat'	=> $pangkat,
						'golongan'	=> $golongan,
						'jabatan'	=> $jabatan,
						'tlp_user'	=> $noTelp,
						'email_user'	=> $email
					    
					);
					
						
					
					$this->login->add($dataUser);
					$this->session->set_flashdata('sukses', 'Satu Data User telah berhasil ditambahkan');
					redirect('manajemenUser');
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
				
				
			
				$data['main_view'] = 'manajemenUser/manajemenUser_form';
				$data['form_action'] = site_url('manajemenUser/update_process');
				$data['linkBack'] = site_url('module');
				$data['button']	= 'Update Data';
			
				$datanya = $this->login->get_data_by_id($id);
				//buat session untuk menyimpan data primary key
				$this->session->set_userdata('id', $datanya->id_user);
			
		
			
				//data untuk mengisi field2 form
				$data['default']['idUser'] = $datanya->id_user;
				
				$data['default']['namaLengkap']   = $datanya->nm_user;
				$data['default']['nip']   = $datanya->nip;
				$data['default']['pangkat']   = $datanya->pangkat;
				$data['default']['golongan']   = $datanya->golongan;
				$data['default']['jabatan']   = $datanya->jabatan;
				$data['default']['noTelp']   = $datanya->tlp_user;
				$data['default']['email']   = $datanya->email_user;
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
				$data['main_view'] = 'manajemenUser/manajemenUser_form';
				$data['form_action'] = site_url('manajemenUser/update_process');

				$data['button']	= 'Update Data';
				$idSess = $this->session->userdata('id');
				$datanya = $this->login->get_data_by_id($idSess);
				//buat session untuk menyimpan data primary key
				
				//data untuk mengisi field2 form
				$data['default']['idUser'] = $datanya->id_user;
				
				$data['default']['namaLengkap']   = $datanya->nm_user;
				$data['default']['nip']   = $datanya->nip;
				$data['default']['pangkat']   = $datanya->pangkat;
				$data['default']['golongan']   = $datanya->golongan;
				$data['default']['jabatan']   = $datanya->jabatan;
				$data['default']['noTelp']   = $datanya->tlp_user;
				$data['default']['email']   = $datanya->email_user;
				
				
				
				//mengeset validasinya
				$this->form_validation->set_rules('idUser','ID User','required');
				$this->form_validation->set_rules('namaLengkap', 'Nama Lengkap', 'required');
				$this->form_validation->set_rules('nip','Nomor Induk Pegawai','required');
				
				if ($this->form_validation->run() == TRUE)
				{
					
					$idUser = $this->input->post('idUser');			
					$namaLengkap = $this->input->post('namaLengkap');
					$nip = $this->input->post('nip');
					$pangkat = $this->input->post('pangkat');
					$golongan = $this->input->post('golongan');
					$jabatan = $this->input->post('jabatan');
					$noTelp  = $this->input->post('noTelp');
					$email = $this->input->post('email');
					$dataUser = array(
					    
					    'id_user'	=> $idUser,
						'nm_user'	=> $namaLengkap,
						'nip'	=> $nip,
						'pangkat'	=> $pangkat,
						'golongan'	=> $golongan,
						'jabatan'	=> $jabatan,
						'tlp_user'	=> $noTelp,
						'email_user'	=> $email
					    
					);
					
						echo $idUser;
					
					$this->login->update($idSess, $dataUser);
					$this->session->set_flashdata('sukses', 'Satu Data User telah berhasil diubah');
					redirect('manajemenUser');
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
		
		
		
		
		
		
	}

?> 

								