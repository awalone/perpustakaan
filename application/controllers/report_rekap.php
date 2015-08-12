<?php

	class Report_rekap extends CI_Controller {
		function __construct() {
			parent::__construct();
			$this->load->model('rekap_model','rekap',TRUE);
			
		}
		
		function index() {
			
			$data['main_view']	= "report/report_rekap";
			$data['query'] = $this->rekap->get_stat()->result();
			$data['title']	= "Rekap Perizinan";
			$data['form_action'] = site_url('report_rekap/search');
			$this->load->view('template', $data);
			
		}
		
		function search() {
			$data['main_view']	= "report/report_rekap";
			$mulai = $this->input->post('mulai');
			$selesai = $this->input->post('selesai');
			if ($mulai != "" AND $selesai != "") {
				$data['tanggalCari'] = "( ".$this->libraryku->tanggal($mulai)." s/d ".$this->libraryku->tanggal($selesai). " )";
			}
			$data['query'] = $this->rekap->get_stat()->result();
			$data['title']	= "Rekap Perizinan";
			$data['form_action'] = site_url('report_rekap/search');
			$this->load->view('template', $data);
		}
		
		
	}

?>