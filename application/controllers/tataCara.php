<?php




	class tataCara extends CI_Controller
	{	
		function __construct()
		{
			parent::__construct();
			$this->load->model('tatacara_model','tatacara',TRUE);
			$this->load->library('libraryku');
			$this->load->model('aksesmodule_model','akses',TRUE);
		
			
		}
		var $title = 'tataCara';
		var $limit = 15;
		
		function check() {
		
			$jum = $this->akses->get_akses_by_id($this->session->userdata('idLogin'), $this->title);
			if (($jum > 0 AND $this->session->userdata('login') == TRUE) OR $this->session->userdata('level') == 'admin') {
				RETURN TRUE;
			}
			else {
				return FALSE;
			}
		}
		
		function cetak() {
			if ($this->check() == TRUE) 
			{
				$permohonan = $this->session->userdata('permohonan');
				$jenisIzin = $this->session->userdata('jenisIzin');
				$data['permohonan'] = $permohonan;
				$data['jenisIzin'] = $jenisIzin;
				$data['query'] = $this->tatacara->get_all($permohonan,$jenisIzin)->result();
				$this->load->view('tataCara/cetak', $data);
			}
			else{
				redirect('login');
			}
		}
	
		function index() {
			if ($this->check() == TRUE) 
			{
				$data['title'] = $this->title;
				$data['h2_title'] = 'Tata Cara';
				$data['main_view'] = 'tataCara/tatacara';
				$data['search']	= site_url('tatacara/search_process');
				$permohonan = $this->input->post('permohonan');
				$jenisIzin= $this->input->post('jenisIzin');
				
				if (($permohonan != "") && ($jenisIzin != ""))
				{
					$data['jumlah'] = $this->tatacara->get_all_data($permohonan,$jenisIzin);
					if ($this->tatacara->get_all_data($permohonan,$jenisIzin) > 0) {
					$data['query'] = $this->tatacara->get_all($permohonan,$jenisIzin)->result();
					$data['cetak'] = "cetak";
					$data['cetakLink'] = site_url('tataCara/cetak');
					$this->session->set_userdata('permohonan', $permohonan);
					$this->session->set_userdata('jenisIzin', $jenisIzin);
					}
					
				}
				else {
					$data['jumlah'] = 0;
				}
				$group = $this->tatacara->get_data_jenis_izin($this->session->userdata('loket'))->result();
				
				foreach($group as $row)
				{
						
					$data['group']['']	= "--Pilih Jenis Izin--";
					$data['group'][$row->id_jnsizin] = $row->nm_izin;
				}
				
				#untuk jenis permohonan
				
				$permohonan = array('0' => 'Baru','1' => 'Perpanjangan/Pembaharuan/Pendaftaran Ulang', '2'=> 'Perubahan Data', '3' => 'Penggantian (Hilang/Rusak)' );
				foreach($permohonan as $row => $value) {
					$data['permohonan'][''] = "--Pilih Jenis Permohonan--";
					$data['permohonan'][$row] = $value;
				}
				
				$data['button']	= 'Tampilkan';
				
				$this->load->view('template', $data);
			}
			else {
				redirect('login');
			}
		}
	
				
		
	
				
		
		
	
	}

?> 
