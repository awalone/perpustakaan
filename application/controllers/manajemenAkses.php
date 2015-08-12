<?php


	class ManajemenAkses extends CI_Controller
	{	
		function __construct()
		{
			parent::__construct();
			
			$this->load->model('akses_model','akses',TRUE);
		}
		var $title = 'manajemenAkses';
		var $limit = 15;
		
		function check() {
		
			if ($this->session->userdata('level') == 'admin') {
				RETURN TRUE;
			}
			else {
				return FALSE;
			}
		}
		
		
		function index()
		{
			
			if ($this->check() == TRUE) 
			{
				$data['title'] = $this->title;
				$data['h2_title'] = 'Data Pengguna';
				$data['main_view'] = 'manajemenAkses/manajemenAkses';
				$data['search']	= site_url('manajemenLogin/search_process');
				//offset
				$uri_segment	= 3;
				$offset			= $this->uri->segment($uri_segment);
			
				$data['query']  = $this->akses->get_all_data_user_done()->result();
				$data['jumlah'] = $this->akses->get_all_data_user_done("jumlah");
			
				//link untuk menuju ke halaman tambah data
				$data['link'] = site_url('manajemenAkses/add');
			
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
			
		
				$data['query']  = $this->akses->get_all_data_user_none()->result();
					$data['jumlah'] = $this->akses->get_all_data_user_none("jumlah");
				
					

				$data['main_view'] = 'manajemenAkses/manajemenAkses_pilih';
					
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
				$data['h2_title'] = 'Manajemen Akses > Tambah Data Pengguna Akses'; 
			
				$this->session->set_userdata('id',$id);
				$datanya  = $this->akses->get_user_by_id($id);
				$data['default']['idUser'] = $datanya->id_user;
				$data['default']['namaLengkap'] = $datanya->nm_user;
				$data['default']['nip']	= $datanya->nip;
				
				//untuk golongan
				$golongan = $this->akses->get_all_data_loket()->result();
				foreach($golongan as $row)
				{
					$data['loket']['']	= "--Pilih Loket--";
					$data['loket'][$row->id_loket] = $row->id_loket . ' - ' . $row->nm_loket;
				}
				
				

				$data['form_action'] = site_url('manajemenAkses/add_process');
				$data['main_view'] = 'manajemenAkses/manajemenAkses_form';
				
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
				$datanya  = $this->akses->get_user_by_id($id);
				$data['default']['idUser'] = $datanya->id_user;
				$data['default']['namaLengkap'] = $datanya->nm_user;
				$data['default']['nip']	= $datanya->nip;
		
				
			
				$data['main_view'] = 'manajemenAkses/manajemenAkses_form';
				$data['form_action'] = site_url('manajemenAkses/add_process');
				$data['linkBack'] = site_url('manajemenAkses');
				$data['button']	= 'Input Data';
			//untuk golongan
				$golongan = $this->akses->get_all_data_loket()->result();
				foreach($golongan as $row)
				{
					$data['loket']['']	= "--Pilih Loket--";
					$data['loket'][$row->id_loket] = $row->id_loket . ' - ' . $row->nm_loket;
				}
				//mengeset validasinya
				$this->form_validation->set_rules('loket','Nama Loket','required');
				
				
				
				if ($this->form_validation->run() == TRUE)
				{
					$loket = $this->input->post('loket');
					$dataAkses = array(
					    
					    'id_login'	=> $id,
							 'id_loket'	=> $loket
					    
					);
				$this->akses->add($dataAkses);
				$this->session->set_flashdata('sukses', 'Satu Data Akses User telah berhasil ditambahkan');
				redirect('manajemenAkses');
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
			
			
				$data['main_view'] = 'manajemenAkses/manajemenAkses_form';
				$data['form_action'] = site_url('manajemenAkses/update_process');
				$data['linkBack'] = site_url('module');
				$data['button']	= 'Update Data';
			
				$datanya = $this->akses->get_data_by_id($id);
				
				echo $datanya->id_akses;
				//buat session untuk menyimpan data primary key
				$this->session->set_userdata('id', $id);
			
		
			
				//data untuk mengisi field2 form
				$data['default']['idUser'] = $datanya->id_user;
				
				$data['default']['namaLengkap']   = $datanya->nm_user;
				$data['default']['nip']   = $datanya->nip;
				//untuk golongan
				$golongan = $this->akses->get_all_data_loket()->result();
				foreach($golongan as $row)
				{
					if ($datanya->id_loket == $row->id_loket) {
						$data['selected'][$row->id_loket] = $datanya->id_loket;
					}
		
					$data['loket']['']	= "--Pilih Loket--";
					$data['loket'][$row->id_loket] = $row->id_loket . ' - ' . $row->nm_loket;
				}

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
			
				$data['main_view'] = 'manajemenAkses/manajemenAkses_form';
				$data['form_action'] = site_url('manajemenAkses/update_process');
				$data['linkBack'] = site_url('module');
				$data['button']	= 'Update Data';



				$idSess = $this->session->userdata('id');
				$datanya = $this->akses->get_data_by_id($idSess);
				//buat session untuk menyimpan data primary key
			
				


				//data untuk mengisi field2 form

				$data['default']['idUser'] = $datanya->id_user;
				
				$data['default']['namaLengkap']   = $datanya->nm_user;
				$data['default']['nip']   = $datanya->nip;
				
				//untuk golongan
				$golongan = $this->akses->get_all_data_loket()->result();
				foreach($golongan as $row)
				{
					if ($datanya->id_loket == $row->id_loket) {
						$data['selected'][$row->id_loket] = $datanya->id_loket;
					}
		
					$data['loket']['']	= "--Pilih Loket--";
					$data['loket'][$row->id_loket] = $row->id_loket . ' - ' . $row->nm_loket;
				}
			
				$this->form_validation->set_rules('loket','Loket','required');
				if ($this->form_validation->run() == TRUE)
				{

					$loket = $this->input->post('loket');
					$dataAkses = array(
					    
					    'id_login'	=> $datanya->id_login,
					    'id_loket'	=> $loket
					    
					);
					
						
					
					$this->akses->update($idSess, $dataAkses);
					$this->session->set_flashdata('sukses', 'Satu Data Akses User telah berhasil diubah');
				redirect('manajemenAkses');
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
