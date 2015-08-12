<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {


	function __construct() {
		parent::__construct();
		$this->load->library('enkrip');
		
	}

	function index()
	{
		if ($this->session->userdata('login') == TRUE) 
		{
			$data['title'] = "Halaman Depan";
			$data['main_view']	= "home";
			$this->load->view('template', $data);
		}
		else {
			redirect('login');
		}
		
		
	}

}
