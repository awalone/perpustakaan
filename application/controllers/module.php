<?php




	class Module extends CI_Controller
	{	
		function __construct()
		{
			parent::__construct();
			
			$this->load->model('module_model','module',TRUE);
			$this->load->library('general');
		
			
		}
		var $title = 'module';
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
				$data['h2_title'] = 'Data Module';
				$data['main_view'] = 'module/module';
				$data['search']	= site_url('module/search_process');
				//offset
				$uri_segment	= 3;
				$offset			= $this->uri->segment($uri_segment);
				
				$data['query']  = $this->module->get_all($this->limit,$offset)->result();
				$data['jumlah'] = $this->module->get_all_data();
			
				//link untuk menuju ke halaman tambah data
				$data['link'] = site_url('module/add');
				
				//meload view
				$this->load->view('template', $data);
			}
			else {
				redirect('login');
			}
				
		}
		
		//fungsi untuk menghapus data module
		function delete($id)
		{
			if ($this->check() == TRUE) 
			{
				$this->module->delete($id);
			
				//kalau terhapus maka akan memunculkan pesan
				$this->session->set_flashdata('message', '1 data Module berhasil dihapus');
			
				//kemudian menuju kembali ke halaman utama
				redirect('module');
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
				$data['title'] = $this->title;
				$data['h2_title'] = 'Data module > Tambah Data Module'; 
				$data['main_view'] = 'module/module_form';
				$data['form_action'] = site_url('module/add_process');
				$data['linkBack'] = site_url('module');
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
				$data['h2_title'] = 'Data Module > Tambah Data Module'; 
			
			
				//file viewnya ada di suratmasuk/surat_form.php
				$data['main_view'] = 'module/module_form';
				$data['form_action'] = site_url('module/add_process');
				$data['linkBack'] = site_url('module');
				$data['button']	= 'Input Data';
			
				//mengeset validasinya
				$this->form_validation->set_rules('namaModule','Nama Module','required');
				$this->form_validation->set_rules('namaLink', 'Nama Link', 'required');
			
				if ($this->form_validation->run() == TRUE)
				{
					$namamodule = $this->input->post('namaModule');
					$namaLink  = $this->input->post('namaLink');
					$module = array(
						'nama_module'	=> $namamodule,
						'link_module'	=> $namaLink,
					);
				
					$this->module->add($module);
					$this->session->set_flashdata('message', 'Satu Data module telah berhasil ditambahkan');
					redirect('module');
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
				$data['title'] = $this->title;
				$data['h2_title'] = 'Data module > Edit Data Module'; 
			
				$data['main_view'] = 'module/module_form';
				$data['form_action'] = site_url('module/update_process');
				$data['linkBack'] = site_url('module');
				$data['button']	= 'Update Data';
			
				$datanya = $this->module->get_data_by_id($id);
				//buat session untuk menyimpan data primary key
				$this->session->set_userdata('id', $datanya->id_module);
				//data untuk mengisi field2 form
				$data['default']['id'] = $datanya->id_module;
				$data['default']['namaModule']	= $datanya->nama_module;
				$data['default']['linkModule']   = $datanya->link_module;		
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
				$id = $this->session->userdata('id');
				$datanya = $this->module->get_data_by_id($id);
				//buat session untuk menyimpan data primary key
				$this->session->set_userdata('id', $datanya->id_module);
			
				//data untuk mengisi field2 form
				$data['default']['id'] = $datanya->id_module;
				$data['default']['namaModule']	= $datanya->nama_module;
				$data['default']['linkModule']   = $datanya->link_module;
					
				//disini hanyalah melengkapi item item yang nantinya akan ditampilkan di halaman tambah data seperti, judul, nama link, dll
				$data['title'] = $this->title;
				$data['h2_title'] = 'Data module > Edit Data module'; 
			
				$data['main_view'] = 'module/module_form';
				$data['form_action'] = site_url('module/update_process');
				$data['linkBack'] = site_url('module');
				$data['button']	= 'Update Data';
			
			
				//mengeset validasinya
				$this->form_validation->set_rules('namaModule','Nama Module','required');
				$this->form_validation->set_rules('namaLink', 'Nama Link', 'required');
			
				//kalau validasi berhasil
				if ($this->form_validation->run() == TRUE)
				{
					$namamodule = $this->input->post('namaModule');
					$namaLink  = $this->input->post('namaLink');
				
					$module = array(	    
					    'nama_module'	=> $namamodule,
					    'link_module'	=> $namaLink,
					);	
					$this->module->update($this->session->userdata('id'),$module);
					$this->session->set_flashdata('message', 'Satu Data Module telah berhasil diubah');
					redirect('module');
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
