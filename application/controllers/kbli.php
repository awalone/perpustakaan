<?php




	class Kbli extends CI_Controller
	{	
		function __construct()
		{
			parent::__construct();
			
			$this->load->model('kbli_model','kbli',TRUE);
			$this->load->library('general');
		
			
		}
		var $title = 'KBLI';
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
				$data['h2_title'] = 'Data KBLI';
				$data['main_view'] = 'kbli/kbli';
				$data['search']	= site_url('kbli/search_process');
				//offset
				$uri_segment	= 3;
				$offset			= $this->uri->segment($uri_segment);
				
				$data['query']  = $this->kbli->get_all($this->limit,$offset)->result();
				$data['jumlah'] = $this->kbli->get_all_data();
			
				//link untuk menuju ke halaman tambah data
				$data['link'] = site_url('kbli/add');
				
				//meload view
				$this->load->view('template', $data);
			}
			else {
				redirect('login');
			}
				
		}
		
		//fungsi untuk menghapus data KBLI
		function delete($id)
		{
			if ($this->check() == TRUE) 
			{
				$this->kbli->delete($id);
			
				//kalau terhapus maka akan memunculkan pesan
				$this->session->set_flashdata('message', '1 data KBLI berhasil dihapus');
			
				//kemudian menuju kembali ke halaman utama
				redirect('kbli');
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
				$data['h2_title'] = 'Data KBLI > Tambah Data KBLI'; 
				$data['main_view'] = 'kbli/kbli_form';
				$data['form_action'] = site_url('kbli/add_process');
				$data['linkBack'] = site_url('kbli');
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
				$data['h2_title'] = 'Data KBLI > Tambah Data KBLI'; 
			
			
				
				$data['main_view'] = 'kbli/kbli_form';
				$data['form_action'] = site_url('kbli/add_process');
				$data['linkBack'] = site_url('kbli');
				$data['button']	= 'Input Data';
			
				//mengeset validasinya
				$this->form_validation->set_rules('namaSubgol','Nama Golongan','required');
				$this->form_validation->set_rules('alias', 'Nama Alias', 'required');
			
				if ($this->form_validation->run() == TRUE)
				{
					$namaSubgol = $this->input->post('namaSubgol');
					$alias  = $this->input->post('alias');
					$kbli = array(
						'nm_subgol'	=> $namaSubgol,
						'alias_subgol'	=> $alias
					);
				
					$this->kbli->add($kbli);
					$this->session->set_flashdata('message', 'Satu Data KBLI telah berhasil ditambahkan');
					redirect('kbli');
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
				$data['h2_title'] = 'Data KBLI > Edit Data KBLI'; 
			
				$data['main_view'] = 'kbli/kbli_form';
				$data['form_action'] = site_url('kbli/update_process');
				$data['linkBack'] = site_url('kbli');
				$data['button']	= 'Update Data';
			
				$datanya = $this->kbli->get_data_by_id($id);
				//buat session untuk menyimpan data primary key
				$this->session->set_userdata('id', $datanya->id_gol);
				//data untuk mengisi field2 form
				$data['default']['id'] = $datanya->id_subgol;
				$data['default']['namaGol']	= $datanya->nm_gol;
				$data['default']['alias']   = $datanya->alias_gol;		
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
				$this->session->set_userdata('id', $datanya->id_gol);
				
				//data untuk mengisi field2 form
				$data['default']['id'] = $datanya->id_gol;
				$data['default']['namaGol']	= $datanya->nm_gol;
				$data['default']['alias']   = $datanya->alias_gol;
					
				//disini hanyalah melengkapi item item yang nantinya akan ditampilkan di halaman tambah data seperti, judul, nama link, dll
				$data['title'] = $this->title;
				$data['h2_title'] = 'Data KBLI > Edit Data KBLI'; 
			
				$data['main_view'] = 'kbli/kbli_form';
				$data['form_action'] = site_url('kbli/update_process');
				$data['linkBack'] = site_url('kbli');
				$data['button']	= 'Update Data';
			
			
				//mengeset validasinya
				$this->form_validation->set_rules('namaGol','Nama Golongan','required');
				$this->form_validation->set_rules('alias', 'Nama Alias', 'required');
			
				//kalau validasi berhasil
				if ($this->form_validation->run() == TRUE)
				{
					$namaGol = $this->input->post('namaGol');
					$alias  = $this->input->post('alias');
				
					$kbli = array(	    
					    'nm_gol'	=> $namaGol,
					    'alias_gol'	=> $alias,
					);	
					$this->kbli->update($this->session->userdata('id'),$kbli);
					$this->session->set_flashdata('message', 'Satu Data KBLI 3 Digit telah berhasil diubah');
					redirect('kbli');
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
