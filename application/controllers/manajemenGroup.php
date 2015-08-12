<?php




	class ManajemenGroup extends CI_Controller
	{	
		function __construct()
		{
			parent::__construct();
			$this->load->model('aksesmodule_model','akses',TRUE);
			
			$this->load->model('group_model','groupmodel',TRUE);
			$this->load->library('libraryku');
		
			
		}
		var $title = 'manajemenGroup';
		var $limit = 15;
		
		
		function check() {
			if ( $this->session->userdata('level') == 'admin') {
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
				$data['main_view'] = 'manajemenGroup/manajemengroup';
				$data['search']	= site_url('module/search_process');
				//offset
				$uri_segment	= 3;
				$offset			= $this->uri->segment($uri_segment);
				
				$data['query']  = $this->groupmodel->get_all($this->limit,$offset)->result();
				$data['jumlah'] = $this->groupmodel->get_all_data();
			
				//link untuk menuju ke halaman tambah data
				$data['link'] = site_url('group/add');
			
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
				redirect('manajemenGroup');
			}
			else {
				redirect('login');
			}
		}
		
		
		
			
	}

?> 
