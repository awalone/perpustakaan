<?php




	class AksesModule extends CI_Controller
	{	
		function __construct()
		{
			parent::__construct();
			
			$this->load->model('aksesmodule_model','module',TRUE);
			
			
		}
		var $title = 'module';
		var $limit = 15;
		
	
		
		function index()
		{
				$data['title'] = $this->title;
				$data['h2_title'] = 'Data Module';
				$data['main_view'] = 'aksesModule/module';
				$data['search']	= site_url('aksesModule/search_process');
				//offset
				$uri_segment	= 3;
				$offset			= $this->uri->segment($uri_segment);
				
				$data['query']  = $this->module->get_all($this->limit,$offset)->result();
				$data['jumlah'] = $this->module->get_all_data();
			
				//link untuk menuju ke halaman tambah data
				$data['link'] = site_url('aksesModule/add');
				
				//meload view
				$this->load->view('template', $data);
			
				
		}
		
		//fungsi untuk menghapus data module
		function delete($id)
		{
			
				$this->module->delete($id);
			
				//kalau terhapus maka akan memunculkan pesan
				$this->session->set_flashdata('message', '1 data Akses Module berhasil dihapus');
			
				//kemudian menuju kembali ke halaman utama
				redirect('aksesModule');
			
		}
		
		
		
		//fungsi untuk tambah data
		function add()
		{
			
				$data['title'] = $this->title;
				$data['h2_title'] = 'Data module > Tambah Data Module'; 
				$data['main_view'] = 'aksesModule/module_form';
				$data['form_action'] = site_url('aksesModule/add_process');
				$data['linkBack'] = site_url('aksesModule');
				$data['button']	= 'Input Data';
			
			
				//tampilkan daftar id_login
				$login = $this->module->get_all_login()->result();
				foreach($login as $row)
				{
					$data['namaUser']['']	= "--Pilih Id Login--";
					$data['namaUser'][$row->id_login] = $row->nm_user. ' / ' .$row->id_login;
				}
				
				//tampilkan daftar module
				$module = $this->module->get_all_module()->result();
				foreach($module as $row)
				{
					$data['namaModule']['']	= "--Pilih Module--";
					$data['namaModule'][$row->id_module] = $row->nama_module;
				}
				
				
				
				$posisi = array('Atas' => 'atas', 'Kiri' => 'kiri', 'Poup Kiri' => 'popupkiri');
				foreach($posisi as $row => $value) {
					$data['posisi'][$value] = $row;
				}
				
				//untuk akses parent
				if ($this->module->get_all_data() > 0) {
					$akses = $this->module->get_all()->result();
					foreach($akses as $row) {
						$data['parent'][''] = "--Pilih Parent Akses--";
						$data['parent'][$row->id_akses] = $row->nama_module.' | '.$row->link_module;
					}
				}
				else {
					$data['parent'][''] = "--Pilih Parent Akses--";
				}
				
				
				
			
				//load file viewnya
				$this->load->view('template', $data);
			
		}		
		
		
		
		//fungsi untuk proses penambahan datanya 
		function add_process()
		{
			
				//disini hanyalah melengkapi item item yang nantinya akan ditampilkan di halaman tambah data seperti, judul, nama link, dll
				$data['title'] = $this->title;
				$data['h2_title'] = 'Data Akses Module > Tambah Data Module'; 
			
			
				//file viewnya ada di suratmasuk/surat_form.php
				$data['main_view'] = 'aksesModule/module_form';
				$data['form_action'] = site_url('aksesModule/add_process');
				$data['linkBack'] = site_url('aksesModule');
				$data['button']	= 'Input Data';
			
			
				//tampilkan daftar id_login
				$login = $this->module->get_all_login()->result();
				foreach($login as $row)
				{
					$data['namaUser']['']	= "--Pilih Id Login--";
					$data['namaUser'][$row->id_login] = $row->nm_user;
				}
				
				//tampilkan daftar module
				$module = $this->module->get_all_module()->result();
				foreach($module as $row)
				{
					$data['namaModule']['']	= "--Pilih Module--";
					$data['namaModule'][$row->id_module] = $row->nama_module;
				}
				$posisi = array('Atas' => 'atas', 'Kiri' => 'kiri', 'Poup Kiri' => 'popupkiri');
				foreach($posisi as $row => $value) {
					$data['posisi'][$value] = $row;
				}
				
				
				//untuk akses parent
				if ($this->module->get_all_data() > 0) {
					$akses = $this->module->get_all()->result();
					foreach($akses as $row) {
						$data['parent'][''] = "--Pilih Parent Akses--";
						$data['parent'][$row->id_akses] = $row->nama_module.' | '.$row->link_module;
					}
				}
				else {
					$data['parent'][''] = "--Pilih Parent Akses--";
				}
			
				//mengeset validasinya
				$this->form_validation->set_rules('namaUser','Nama User','required');
				$this->form_validation->set_rules('namaModule', 'Nama Module', 'required');
			
				if ($this->form_validation->run() == TRUE)
				{
					$namaUser = $this->input->post('namaUser');
					$namaModule  = $this->input->post('namaModule');
					$posisi = $this->input->post('posisi');
					$module = array(
						'id_login'	=> $namaUser,
						'id_module'	=> $namaModule,
						'menu_posisi' => $posisi
					);
				
					$this->module->add($module);
					$this->session->set_flashdata('message', 'Satu Data Akses module telah berhasil ditambahkan');
					redirect('aksesModule');
				}
			
				else
				{
					$this->load->view('template', $data);
				}
		
		
		}
		

		function update($id)
		{
			
				$data['title'] = $this->title;
				$data['h2_title'] = 'Data module > Edit Data Module'; 
			
				$data['main_view'] = 'aksesModule/module_form';
				$data['form_action'] = site_url('aksesModule/update_process');
				$data['linkBack'] = site_url('module');
				$data['button']	= 'Update Data';
			
				$datanya = $this->module->get_data_by_id($id);
				//buat session untuk menyimpan data primary key
				$this->session->set_userdata('id', $datanya->id_akses);
				//data untuk mengisi field2 form
				
				//tampilkan daftar id_login
				$login = $this->module->get_all_login()->result();
				foreach($login as $row)
				{
					if ($datanya->id_login == $row->id_login) {
						$data['selected'][$row->id_login] = $datanya->id_login;
					}
					$data['namaUser']['']	= "--Pilih Id Login--";
					$data['namaUser'][$row->id_login] = $row->nm_user;
				}
				
				//tampilkan daftar module
				$module = $this->module->get_all_module()->result();
				foreach($module as $row)
				{
					if ($datanya->id_module == $row->id_module) {
						$data['selected1'][$row->id_module] = $datanya->id_module;
					}
					$data['namaModule']['']	= "--Pilih Module--";
					$data['namaModule'][$row->id_module] = $row->nama_module;
				}
				$posisi = array('Atas' => 'atas', 'Kiri' => 'kiri', 'Poup Kiri' => 'popupkiri');
				foreach($posisi as $row => $value) {
					if ($datanya->menu_posisi == $row) {
						$data['selected3'][$value] = $datanya->menu_posisi;
					}
					$data['posisi'][$value] = $row;
				
			
				}
				//untuk akses parent
				
				if ($this->module->get_all_data() > 0) {
					$akses = $this->module->get_all()->result();
					foreach($akses as $row) {
						if ($datanya->id_akses = $row->id_akses) {
							$data['selected2'][$row->id_akses] = $datanya->id_akses;
						}
						$data['parent'][''] = "--Pilih Parent Akses--";
						$data['parent'][$row->id_akses] = $row->nama_module.' | '.$row->link_module;
					}
				}
				else {
					$data['parent'][''] = "--Pilih Parent Akses--";
				}
				
				$this->load->view('template', $data);
			
		}
		
		
		
		function update_process()
		{
			
				$id = $this->session->userdata('id');
				$datanya = $this->module->get_data_by_id($id);
				$datanya = $this->module->get_data_by_id($id);
				//buat session untuk menyimpan data primary key
				$this->session->set_userdata('id', $datanya->id_akses);
				//data untuk mengisi field2 form
				$data['main_view'] = 'aksesModule/module_form';
				//tampilkan daftar id_login
				$login = $this->module->get_all_login()->result();
				foreach($login as $row)
				{
					if ($datanya->id_login == $row->id_login) {
						$data['selected'][$row->id_login] = $datanya->id_login;
					}
					$data['namaUser']['']	= "--Pilih Id Login--";
					$data['namaUser'][$row->id_login] = $row->nm_user;
				}
				
				//tampilkan daftar module
				$module = $this->module->get_all_module()->result();
				foreach($module as $row)
				{
					if ($datanya->id_module == $row->id_module) {
						$data['selected1'][$row->id_module] = $datanya->id_module;
					}
					$data['namaModule']['']	= "--Pilih Module--";
					$data['namaModule'][$row->id_module] = $row->nama_module;
				}
				
				//untuk akses parent
				
				if ($this->module->get_all_data() > 0) {
					$akses = $this->module->get_all()->result();
					foreach($akses as $row) {
						if ($datanya->id_akses = $row->id_akses) {
							$data['selected2'][$row->id_akses] = $datanya->id_akses;
						}
						$data['parent'][''] = "--Pilih Parent Akses--";
						$data['parent'][$row->id_akses] = $row->nama_module.' | '.$row->link_module;
					}
				}
				else {
					$data['parent'][''] = "--Pilih Parent Akses--";
				}
			
			
				//mengeset validasinya
				$this->form_validation->set_rules('namaUser','Nama User','required');
				$this->form_validation->set_rules('namaModule', 'Nama Module', 'required');
			
				//kalau validasi berhasil
				if ($this->form_validation->run() == TRUE)
				{
					$namaUser = $this->input->post('namaUser');
					$namaModule  = $this->input->post('namaModule');
					$module = array(
						'id_login'	=> $namaUser,
						'id_module'	=> $namaModule,
					);
					$this->module->update($this->session->userdata('id'),$module);
					$this->session->set_flashdata('message', 'Satu Data Akses Module telah berhasil diubah');
					redirect('aksesModule');
				}
			
				else
				{
					$this->load->view('template', $data);
				}
			
		}
		
		
		
		
	}

?> 
