<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi extends CI_Controller {


	function __construct() {
		parent::__construct();
		$this->load->library('enkrip');
		$this->load->model('transaksi_model','transaksi',TRUE);
		
	}

	function index()
	{
		if ($this->session->userdata('login') == TRUE) 
		{
			$data['title'] = "Halaman Depan";
			$data['styleChosen'] = "1";
			$data['styleDatePicker'] = "1";
			$data['main_view']	= "transaksi/transaksi_view";
			$this->load->view('template', $data);
		}
		else {
			redirect('login');
		}
		
		
	}

	function add()
	{
		if ($this->session->userdata('login') == TRUE) 
		{
			$data['title'] = "Tambah Pegawai";
			$data['styleChosen'] = "1";
			$data['styleDatePicker'] = "1";
			$data['main_view']	= "pegawai/pegawai_form_view";
			$data['form_action'] = site_url('pegawai/add_process');
			$this->load->view('template', $data);
		}
		else {
			redirect('login');
		}
		
		
	}





}
