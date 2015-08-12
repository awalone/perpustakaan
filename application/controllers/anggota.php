<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Anggota extends CI_Controller {


	function __construct() {
		parent::__construct();
		$this->load->library('enkrip');
		$this->load->model('anggota_model','anggota',TRUE);
		$this->load->model('pegawai_model','pegawai',TRUE);
		$this->load->library('uploads');
		$this->load->library('libraryku');
	}

	function index()
	{
		if ($this->session->userdata('login') == TRUE) 
		{
			$data['title'] = "Halaman Depan";
			$data['libraryAssets'] = "anggota/assets_view";
			$data['fungsiJS'] = "anggota/assets_view_script_js";
			$data['query']  = $this->anggota->get_all()->result();
			$data['jumlah'] = $this->anggota->get_all_data();
			$data['main_view']	= "anggota/anggota_view";
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
			$data['title'] = "Tambah Anggota";
			$data['libraryAssets'] = "anggota/assets_form";
			$data['fungsiJS'] = "anggota/assets_form_script_js";
			$data['main_view']	= "anggota/anggota_form_view";
			$data['form_action'] = site_url('anggota/add_process');
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
			$data['title'] = "Tambah Anggota";
			$data['libraryAssets'] = "anggota/assets_form";
			$data['fungsiJS'] = "anggota/assets_form_script_js";
			$data['main_view']	= "anggota/anggota_form_view";
			$data['form_action'] = site_url('anggota/add_process');

			
			$this->form_validation->set_rules('kode','Kode Anggota', 'required');

			if ($this->form_validation->run() == TRUE)
			{
				$kode = $this->input->post('kode');
				$nama = $this->input->post('nama');
				$nim = $this->input->post('nim');
				$jkel = $this->input->post('jkel');
				$tgl_daftar = $this->input->post('tgl_daftar');
				$alamat = $this->input->post('alamat');
				
				//untuk file photo
				$fileName = $_FILES['userfile']['name'];
				$acakadut = rand(00000000,99999999);
				$namaFile = $acakadut.$fileName;
				$path_file = "berkas/anggota";

				if ($this->uploads->do_upload($path_file, $namaFile) == TRUE)
				{
					$dataAnggota = array(
						'anggota_kode'		=> $kode,
						'anggota_nama'		=> $nama,
						'anggota_nim'		=> $nim,
						'anggota_jkel'		=> $jkel,
						'anggota_tgl_daftar'=> $tgl_daftar,
						'anggota_alamat'	=> $alamat,
						'anggota_foto'		=> $namaFile
					);

					//tambahkan di model anggota
					$this->anggota->add($dataAnggota);
					$this->session->set_flashdata('success', 'Satu Data Anggota telah berhasil ditambahkan');
					redirect('anggota');
				}

				else {
					$data['error_uploads'] = "Terjadi Kesalahan Upload File, Pastikan File yang Anda Upload adalah Valid";
				}
				

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
			
			
			
			$data['title'] = "Tambah Anggota";
			$data['main_view']	= "anggota/anggota_form_view";
			$data['libraryAssets'] = "anggota/assets_form";
			$data['fungsiJS'] = "anggota/assets_form_script_js";
			$data['form_action'] = site_url('anggota/update_process');
			$datanya	= $this->anggota->get_data_by_id($id);

			$this->session->set_userdata('id', $id);
			$validasi = $this->anggota->get_all_data_anggota_by_id($id);
				
			if ($validasi > 0) {
					
					
					
				//untuk data pemohon
					
				$data['default']['kode'] = $datanya->anggota_kode;
				$data['default']['nim'] = $datanya->anggota_nim;
				$data['default']['jkel'] = $datanya->anggota_jkel;
				$data['default']['nama'] = $datanya->anggota_nama;
				$data['default']['tgl_daftar'] = $datanya->anggota_tgl_daftar;
				$data['default']['alamat'] = $datanya->anggota_alamat;
				$data['default']['foto'] = $datanya->anggota_foto;

					$this->load->view('template', $data);
					}

					else {
						echo "Failed";
					}
			
		}
		



		//untuk proses update
		function update_process()
		{
			
			
			$data['title'] = "Tambah Anggota";
			$data['main_view']	= "anggota/anggota_form_view";
			$data['libraryAssets'] = "anggota/assets_form";
			$data['fungsiJS'] = "anggota/assets_form_script_js";
			$data['form_action'] = site_url('anggota/update_process');
			$datanya	= $this->anggota->get_data_by_id($id);

			$id = $this->session->userdata('id');
			$validasi = $this->anggota->get_all_data_anggota_by_id($id);
				
		
					
				//untuk data pemohon
					
				$data['default']['kode'] = $datanya->anggota_kode;
				$data['default']['nim'] = $datanya->anggota_nim;
				$data['default']['jkel'] = $datanya->anggota_jkel;
				$data['default']['nama'] = $datanya->anggota_nama;
				$data['default']['tgl_daftar'] = $datanya->anggota_tgl_daftar;
				$data['default']['alamat'] = $datanya->anggota_alamat;
				$data['default']['foto'] = $datanya->anggota_foto;
				
			


			//berlakukan validasi
			$this->form_validation->set_rules('kode','Nomor Induk Pegawai', 'required');

			if ($this->form_validation->run() == TRUE)
			{
				$nip = $this->input->post('nip');
				$nama = $this->input->post('nama');
				$jkel = $this->input->post('jkel');
				$tmptlahir = $this->input->post('tmptlahir');
				$tgl_lahir = $this->input->post('tgl_lahir');
				$alamat = $this->input->post('alamat');
				$tlpn = $this->input->post('tlpn');
				$hp = $this->input->post('hp');
				$noktp = $this->input->post('noktp');
				$nonpwp = $this->input->post('nonpwp');
				$bag = $this->input->post('bag');
				$bank = $this->input->post('id_bank');
				$norek = $this->input->post('norek');
				$agama = $this->input->post('id_agm');
				$kdstatusk = $this->input->post('kdstatusk');
				$kdstatusp = $this->input->post('kdstatusp');
				$pendidikan = $this->input->post('kdpndidik');
				$tglmasuk = $this->input->post('datemasuk');
				$jabatan = $this->input->post('jabatan');
				
				//untuk file photo
				$fileName = $_FILES['userfile']['name'];
				$acakadut = rand(00000000,99999999);
				$namaFile = $acakadut.$fileName;
				$path_file = "berkas/avatar";

				//check apakah ada gambar yang diupload atau tidak
				if ($fileName != "")
				{
					if ($this->uploads->do_upload($path_file, $namaFile) == TRUE)
					{
						$dataAnggota = array(
							'anggota_kode'		=> $kode,
							'anggota_nama'		=> $nama,
							'anggota_nim'		=> $nim,
							'anggota_jkel'		=> $jkel,
							'anggota_tgl_daftar'=> $tgl_daftar,
							'anggota_alamat'	=> $alamat,
							'anggota_foto'		=> $namaFile
						);

						//tambahkan di model anggota
						$this->anggota->add($dataAnggota);
						$this->session->set_flashdata('success', 'Satu Data Anggota telah berhasil ditambahkan');
						redirect('anggota');
					}
					
					else {
						$data['error_uploads'] = "Terjadi Kesalahan Upload File, Pastikan File yang Anda Upload adalah Valid";
					}
				}


				else {
						$dataAnggota = array(
							'anggota_kode'		=> $kode,
							'anggota_nama'		=> $nama,
							'anggota_nim'		=> $nim,
							'anggota_jkel'		=> $jkel,
							'anggota_tgl_daftar'=> $tgl_daftar,
							'anggota_alamat'	=> $alamat,
							'anggota_foto'		=> $namaFile
						);

						//tambahkan di model anggota
						$this->anggota->add($dataAnggota);
						$this->session->set_flashdata('success', 'Satu Data Anggota telah berhasil ditambahkan');
						redirect('anggota');
				}

				

			}
			else {
				$this->load->view('template', $data);
			}
					

				
		}



}
