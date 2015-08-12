<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kategoribuku extends CI_Controller {


	function __construct() {
		parent::__construct();
		$this->load->library('enkrip');
		$this->load->model('referensi_jenisbuku_model','jenis', TRUE);
		
		$this->load->library('uploads');
		$this->load->library('libraryku');
	}

	function index()
	{
		if ($this->session->userdata('login') == TRUE) 
		{
			$data['title'] = "Halaman Depan";
			$data['libraryAssets'] = "jenisbuku/assets_view";
			$data['fungsiJS'] = "jenisbuku/assets_view_script_js";
			$data['query']  = $this->jenis->get_all()->result();
			$data['jumlah'] = $this->jenis->get_all_data();
			$data['main_view']	= "jenisbuku/jenisbuku_view";
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
			$data['title'] = "Tambah jenis Buku";
			$data['libraryAssets'] = "jenisbuku/assets_form";
			$data['fungsiJS'] = "jenisbuku/assets_form_script_js";
			
			$data['main_view']	= "jenisbuku/jenisbuku_form_view";

			

			$data['form_action'] = site_url('kategoribuku/add_process');
			$this->load->view('template', $data);
		}
		else {
			redirect('login');
		}
		
		
	}



	function add_process()
	{
		if ($this->session->userdata('login') == TRUE) 
		{
			$data['title'] = "Tambah jenis Buku";
			$data['libraryAssets'] = "jenisbuku/assets_form";
			$data['fungsiJS'] = "jenisbuku/assets_form_script_js";
			
			$data['main_view']	= "jenisbuku/jenisbuku_form_view";

			

			$data['form_action'] = site_url('kategoribuku/add_process');

			

			$this->form_validation->set_rules('nama','Nama Kategori Buku', 'required');

			if ($this->form_validation->run() == TRUE)
			{
				$nama = $this->input->post('nama');
				$keterangan = $this->input->post('keterangan');

				$dataJenis = array(
					'jenis_buku_nama'		=> $nama,
					'jenis_buku_deskripsi'	=> $keterangan
				);
				//tambahkan di model jenisbuku
				$this->jenis->add($dataJenis);
				$this->session->set_flashdata('success', 'Satu Data Izin Usaha Industri telah berhasil ditambahkan');
				redirect('kategoribuku');

			}
			else {
				$this->load->view('template', $data);
			}

		}
		else {
			redirect('login');
		}
		
		
	}

	//untuk halaman edit
		//fungsi untuk ubah data
		function update($id)
		{
			
			
			$data['title'] = "Tambah Jenis Buku";
			$data['main_view']	= "jenisbuku/jenisbuku_form_view";
			$data['libraryAssets'] = "jenisbuku/assets_form";
			$data['fungsiJS'] = "jenisbuku/assets_form_script_js";
			$data['form_action'] = site_url('kategoribuku/update_process');
			$datanya	= $this->jenis->get_data_by_id($id);

			$this->session->set_userdata('id', $id);
			$validasi = $this->jenis->get_all_data_jenisbuku_by_id($id);
				
			if ($validasi > 0) {
					
					
					
				//untuk data pemohon
				$data['default']['nama'] = $datanya->jenis_buku_nama;
				$data['default']['keterangan'] = $datanya->jenis_buku_deskripsi;
				$this->load->view('template', $data);
			}

			else {
				echo "Failed";
			}
			
		}
		



		//untuk proses update
		function update_process()
		{
			
			
			$data['title'] = "Update Jenis Buku";
			$data['main_view']	= "jenisbuku/jenisbuku_form_view";
			$data['libraryAssets'] = "jenisbuku/assets_form";
			$data['fungsiJS'] = "jenisbuku/assets_form_script_js";
			$data['form_action'] = site_url('kategoribuku/update_process');
			$id = $this->session->userdata('id');
			$datanya	= $this->jenis->get_data_by_id($id);

			
			$validasi = $this->jenis->get_all_data_jenisbuku_by_id($id);
				
		
					
				//untuk data pemohon
					
			//untuk data pemohon
			$data['default']['nama'] = $datanya->jenis_buku_nama;
			$data['default']['keterangan'] = $datanya->jenis_buku_deskripsi;
				
		
			//berlakukan validasi
			$this->form_validation->set_rules('nama','Nama Jenis Buku', 'required');

			if ($this->form_validation->run() == TRUE)
			{
				$nama = $this->input->post('nama');
				$keterangan = $this->input->post('keterangan');

				$datajenis = array(
					'jenis_buku_nama'		=> $nama,
					'jenis_buku_deskripsi'	=> $keterangan
				);

				//tambahkan di model jenisbuku
				$this->jenisbuku->add($dataJenis);
				$this->session->set_flashdata('success', 'Satu Data Jenis Buku telah berhasil ditambahkan');
				redirect('kategoribuku');
				
				

			}
			else {
				$this->load->view('template', $data);
			}
					

				
		}



}
