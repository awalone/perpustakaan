<?php
	class kegiatanUsaha extends CI_Controller
	{	
		function __construct()
		{
			parent::__construct();
			
			$this->load->model('kegiatanusaha_model','kegusaha',TRUE);
			
			
		}
		var $title = 'kegiatanUsaha';
		var $limit = 15;
		
		
		function cariBidang() {
				$this->load->view('kegiatanUsaha/cari_bidang');
		}

		function cariBidangSIUP() {
			$this->load->view('kegiatanUsaha/cari_bidang_usaha');
		}
		
		
		function groupBidang() {
			
			$data['lempar']= $this->input->get('lempar');
			$this->load->view('kegiatanUsaha/groupBidang',$data);
		}
		
	}	
?>