<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pegawai extends CI_Controller {


	function __construct() {
		parent::__construct();
		$this->load->library('enkrip');
		$this->load->model('pegawai_model','pegawai',TRUE);
		$this->load->model('referensi_agama_model','agama', TRUE);
		$this->load->model('referensi_jabatan_model','jabatan', TRUE);
		$this->load->model('mutasi_unit_kerja_model','unit_kerja',TRUE);
		$this->load->model('referensi_bank_model','bank',TRUE);
		$this->load->model('referensi_pendidikan_model','pendidikan', TRUE);
		
		$this->load->library('uploads');
		$this->load->library('libraryku');
	}

	function index()
	{
		if ($this->session->userdata('login') == TRUE) 
		{
			$data['title'] = "Halaman Depan";
			$data['libraryAssets'] = "pegawai/assets_view";
			$data['fungsiJS'] = "pegawai/assets_view_script_js";
			$data['query']  = $this->pegawai->get_all()->result();
			$data['jumlah'] = $this->pegawai->get_all_data();
			$data['main_view']	= "pegawai/pegawai_view";
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
			$data['libraryAssets'] = "pegawai/assets_form";
			$data['fungsiJS'] = "pegawai/assets_form_script_js";
			
			$data['main_view']	= "pegawai/pegawai_form_view";

			//untuk data bagian/unit_kerja
			$unit_kerja = $this->unit_kerja->get_all()->result();
			foreach($unit_kerja as $row)
			{
				$data['bag']['']	= "--Pilih Unit Kerja--";
				$data['bag'][$row->id_mutasi_unit_kerja] = $row->nama_mutasi_unit_kerja;
			}
			//akhir untuk listing menampilkan daftar pendidikan

			//untuk data jabatan
			$jabatan = $this->jabatan->get_all()->result();
			foreach($jabatan as $row)
			{
				$data['jabatan']['']	= "--Pilih Jabatan--";
				$data['jabatan'][$row->id_ref_jabatan] = $row->nama_ref_jabatan;
			}
			//akhir untuk listing menampilkan daftar jabatan

			//untuk data bank
			$bank = $this->bank->get_all()->result();
			foreach($bank as $row)
			{
				$data['bank']['']	= "--Pilih Bank--";
				$data['bank'][$row->id_ref_bank] = $row->nama_ref_bank;
			}
			//akhir untuk listing menampilkan daftar jabatan

			//untuk data agama
			$agama = $this->agama->get_all()->result();
			foreach($agama as $row)
			{
				$data['id_agm']['']	= "--Pilih Agama--";
				$data['id_agm'][$row->id_ref_agama] = $row->nama_ref_agama;
			}
			//akhir untuk listing menampilkan daftar agama

			//untuk data pendidikan
			$pendidikan = $this->pendidikan->get_all()->result();
			foreach($pendidikan as $row)
			{
				$data['kdpndidik']['']	= "--Pilih Pendidikan Terakhir--";
				$data['kdpndidik'][$row->id_ref_pendidikan] = $row->nama_ref_pendidikan;
			}
			//akhir untuk listing menampilkan daftar pendidikan



			//untuk data status kawin
			$data['default']['kdstatusk'] = '';
			$statusKawin = array('1' => 'Lajang', '2' => 'Menikah', '3' => 'Duda', '4' => 'Janda');
			foreach($statusKawin as $row => $value) {
					$data['kdstatusk'][''] = '--Pilih Status Menikah--';
					$data['kdstatusk'][$row] = $value;
			}
			//listing akhir status kawin

			//untuk data status pegawai
			$data['default']['kdstatusp'] = '';
			$statusPegawai = array('1' => 'Tetap', '2' => 'Kontrak', '3' => 'Magang');
			foreach($statusPegawai as $row => $value) {
					$data['kdstatusp'][''] = '--Pilih Status Pegawai--';
					$data['kdstatusp'][$row] = $value;
			}
			//listing akhir status pegawai


			$data['form_action'] = site_url('pegawai/add_process');
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
			$data['title'] = "Tambah Pegawai";
			$data['libraryAssets'] = "pegawai/assets_form";
			$data['fungsiJS'] = "pegawai/assets_form_script_js";
			$data['main_view']	= "pegawai/pegawai_form_view";
			$data['form_action'] = site_url('pegawai/add_process');

			//untuk data bagian/unit_kerja
			$unit_kerja = $this->unit_kerja->get_all()->result();
			foreach($unit_kerja as $row)
			{
				$data['bag']['']	= "--Pilih Unit Kerja--";
				$data['bag'][$row->id_mutasi_unit_kerja] = $row->nama_mutasi_unit_kerja;
			}
			//akhir untuk listing menampilkan daftar pendidikan

			//untuk data jabatan
			$jabatan = $this->jabatan->get_all()->result();
			foreach($jabatan as $row)
			{
				$data['jabatan']['']	= "--Pilih Jabatan--";
				$data['jabatan'][$row->id_ref_jabatan] = $row->nama_ref_jabatan;
			}
			//akhir untuk listing menampilkan daftar jabatan

			//untuk data bank
			$bank = $this->bank->get_all()->result();
			foreach($bank as $row)
			{
				$data['bank']['']	= "--Pilih Bank--";
				$data['bank'][$row->id_ref_bank] = $row->nama_ref_bank;
			}
			//akhir untuk listing menampilkan daftar jabatan

			//untuk data agama
			$agama = $this->agama->get_all()->result();
			foreach($agama as $row)
			{
				$data['id_agm']['']	= "--Pilih Agama--";
				$data['id_agm'][$row->id_ref_agama] = $row->nama_ref_agama;
			}
			//akhir untuk listing menampilkan daftar agama

			//untuk data pendidikan
			$pendidikan = $this->pendidikan->get_all()->result();
			foreach($pendidikan as $row)
			{
				$data['kdpndidik']['']	= "--Pilih Pendidikan Terakhir--";
				$data['kdpndidik'][$row->id_ref_pendidikan] = $row->nama_ref_pendidikan;
			}
			//akhir untuk listing menampilkan daftar pendidikan



			//untuk data status kawin
			$data['default']['kdstatusk'] = '';
			$statusKawin = array('1' => 'Lajang', '2' => 'Menikah', '3' => 'Duda', '4' => 'Janda');
			foreach($statusKawin as $row => $value) {
					$data['kdstatusk'][''] = '--Pilih Status Menikah--';
					$data['kdstatusk'][$row] = $value;
			}
			//listing akhir status kawin

			//untuk data status pegawai
			$data['default']['kdstatusp'] = '';
			$statusPegawai = array('1' => 'Tetap', '2' => 'Kontrak', '3' => 'Magang');
			foreach($statusPegawai as $row => $value) {
					$data['kdstatusp'][''] = '--Pilih Status Pegawai--';
					$data['kdstatusp'][$row] = $value;
			}
			//listing akhir status pegawai

			

			$this->form_validation->set_rules('nip','Nomor Induk Pegawai', 'required');

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

				if ($this->uploads->do_upload($path_file, $namaFile) == TRUE)
				{
					$dataPegawai = array(
						'nip'		=> $nip,
						'nama'		=> $nama,
						'tmpt_lahir'=> $tmptlahir,
						'tgl_lahir'	=> $tgl_lahir,
						'jenis_kelamin'	=> $jkel,
						'alamat'	=> $alamat,
						'tgl_masuk'	=> $tglmasuk,
						'id_bag'	=> $bag,
						'id_jab'	=> $jabatan,
						'level_user'=> '',
						'foto'		=> $foto,
						'tlpn'		=> $tlpn,
						'nohp'		=> $nohp,
						'npwp'		=> $nonpwp,
						'id_agm'	=> $agama,
						'kdpndidik'	=> $pendidikan,
						'noktp'		=> $noktp,
						'norek'		=> $norek,
						'id_bank'	=> $bank,
						'kdstatusk' => $kdstatusk,
						'kdstatusp'	=> $kdstatusp,
						'time_update'	=> date('Y-m-d H:i:s')
					);

					//tambahkan di model pegawai
					$this->pegawai->add($dataPegawai);
					$this->session->set_flashdata('success', 'Satu Data Izin Usaha Industri telah berhasil ditambahkan');
					redirect('pegawai');
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
			
			
			
			$data['title'] = "Tambah Pegawai";
			$data['main_view']	= "pegawai/pegawai_form_view";
			$data['libraryAssets'] = "pegawai/assets_form";
			$data['fungsiJS'] = "pegawai/assets_form_script_js";
			$data['form_action'] = site_url('pegawai/update_process');
			$datanya	= $this->pegawai->get_data_by_id($id);

			$this->session->set_userdata('id', $id);
			$validasi = $this->pegawai->get_all_data_pegawai_by_id($id);
				
			if ($validasi > 0) {
					
					
					
				//untuk data pemohon
					
				$data['default']['nip'] = $datanya->nip;
				$data['default']['nama'] = $datanya->nama;
				$data['default']['jkel'] = $datanya->jenis_kelamin;
				$data['default']['tmptlahir'] = $datanya->tmpt_lahir;
				$data['default']['tgl_lahir'] = $datanya->tgl_lahir;
				$data['default']['alamat'] = $datanya->alamat;
				$data['default']['tlpn'] = $datanya->tlpn;
				$data['default']['hp'] = $datanya->nohp;
				$data['default']['noktp'] = $datanya->noktp;
				$data['default']['nonpwp'] = $datanya->npwp;
				$data['default']['bag'] = $datanya->id_bag;
				$data['default']['jab'] = $datanya->id_jab;
				$data['default']['id_bank']	= $datanya->id_bank;
				$data['default']['norek'] = $datanya->norek;
				$data['default']['id_agm']		= $datanya->id_agm;
				$data['default']['kdstatusk']	= $datanya->kdstatusk;
				$data['default']['kdstatusp']	= $datanya->kdstatusp;
				$data['default']['tgl_masuk']	= $datanya->tgl_masuk;
				
				//untuk data pemohon yang bersifat pilihan (drop down)
				//untuk data bagian/unit_kerja
				$unit_kerja = $this->unit_kerja->get_all()->result();
				foreach($unit_kerja as $row)
				{
					if ($datanya->id_bag == $row->id_mutasi_unit_kerja)
					{
						$data['selected'][$row->id_mutasi_unit_kerja] = $datanya->id_bag;
					}
					$data['bag']['']	= "--Pilih Unit Kerja--";
					$data['bag'][$row->id_mutasi_unit_kerja] = $row->nama_mutasi_unit_kerja;
				}
				//akhir untuk listing menampilkan daftar pendidikan
				//untuk data jabatan
				$jabatan = $this->jabatan->get_all()->result();
				foreach($jabatan as $row)
				{
					if ($datanya->id_jab == $row->id_ref_jabatan) {
						$data['selected1'][$row->id_ref_jabatan] = $datanya->id_jab;
					}
					$data['jabatan']['']	= "--Pilih Jabatan--";
					$data['jabatan'][$row->id_ref_jabatan] = $row->nama_ref_jabatan;
				}
				//akhir untuk listing menampilkan daftar jabatan

				//untuk data bank
				$bank = $this->bank->get_all()->result();
					foreach($bank as $row)
					{
						if ($datanya->id_bank == $row->id_ref_bank) {
							$data['selected2'][$row->id_ref_bank] = $datanya->id_bank;
						}
						$data['bank']['']	= "--Pilih Bank--";
						$data['bank'][$row->id_ref_bank] = $row->nama_ref_bank;
					}
					//akhir untuk listing menampilkan daftar jabatan

					//untuk data agama
					$agama = $this->agama->get_all()->result();
					foreach($agama as $row)
					{
						if ($datanya->id_agm == $row->id_ref_agama) {
							$data['selected3'][$row->id_ref_agama] = $datanya->id_agm;
						}
						$data['id_agm']['']	= "--Pilih Agama--";
						$data['id_agm'][$row->id_ref_agama] = $row->nama_ref_agama;
					}
					//akhir untuk listing menampilkan daftar agama

					//untuk data pendidikan
					$pendidikan = $this->pendidikan->get_all()->result();
					foreach($pendidikan as $row)
					{
						if ($datanya->kdpndidik == $row->id_ref_pendidikan) {
							$data['selected6'][$row->id_ref_pendidikan] = $datanya->kdpndidik;
						}
						$data['kdpndidik']['']	= "--Pilih Pendidikan Terakhir--";
						$data['kdpndidik'][$row->id_ref_pendidikan] = $row->nama_ref_pendidikan;
					}
					//akhir untuk listing menampilkan daftar pendidikan



					//untuk data status kawin
					$data['default']['kdstatusk'] = '';
					$statusKawin = array('1' => 'Lajang', '2' => 'Menikah', '3' => 'Duda', '4' => 'Janda');
					foreach($statusKawin as $row => $value) {
							if ($datanya->kdstatusk == $row) {
								$data['selected4'][$row] = $datanya->id_jab;
							}
							$data['kdstatusk'][''] = '--Pilih Status Menikah--';
							$data['kdstatusk'][$row] = $value;
					}
					//listing akhir status kawin

					//untuk data status pegawai
					$data['default']['kdstatusp'] = '';
					$statusPegawai = array('1' => 'Tetap', '2' => 'Kontrak', '3' => 'Magang');
					foreach($statusPegawai as $row => $value) {
						if ($datanya->kdstatusp == $row) {
								$data['selected5'][$row] = $datanya->kdstatusp;
							}
							$data['kdstatusp'][''] = '--Pilih Status Pegawai--';
							$data['kdstatusp'][$row] = $value;
					}
					//listing akhir status pegawai




					$this->load->view('template', $data);
					}

					else {
						echo "Failed";
					}
			
		}
		



		//untuk proses update
		function update_process()
		{
			
			
			$data['title'] = "Tambah Pegawai";
			$data['main_view']	= "pegawai/pegawai_form_view";
			$data['libraryAssets'] = "pegawai/assets_form";
			$data['fungsiJS'] = "pegawai/assets_form_script_js";
			$data['form_action'] = site_url('pegawai/update_process');
			$datanya	= $this->pegawai->get_data_by_id($id);

			$id = $this->session->userdata('id');
			$validasi = $this->pegawai->get_all_data_pegawai_by_id($id);
				
		
					
				//untuk data pemohon
					
			$data['default']['nip'] = $datanya->nip;
			$data['default']['nama'] = $datanya->nama;
			$data['default']['jkel'] = $datanya->jenis_kelamin;
			$data['default']['tmptlahir'] = $datanya->tmpt_lahir;
			$data['default']['tgl_lahir'] = $datanya->tgl_lahir;
			$data['default']['alamat'] = $datanya->alamat;
			$data['default']['tlpn'] = $datanya->tlpn;
			$data['default']['hp'] = $datanya->nohp;
			$data['default']['noktp'] = $datanya->noktp;
			$data['default']['nonpwp'] = $datanya->npwp;
			$data['default']['bag'] = $datanya->id_bag;
			$data['default']['jab'] = $datanya->id_jab;
			$data['default']['id_bank']	= $datanya->id_bank;
			$data['default']['norek'] = $datanya->norek;
			$data['default']['id_agm']		= $datanya->id_agm;
			$data['default']['kdstatusk']	= $datanya->kdstatusk;
			$data['default']['kdstatusp']	= $datanya->kdstatusp;
			$data['default']['tgl_masuk']	= $datanya->tgl_masuk;
				
			//untuk data pemohon yang bersifat pilihan (drop down)
			//untuk data bagian/unit_kerja
			$unit_kerja = $this->unit_kerja->get_all()->result();
			foreach($unit_kerja as $row)
			{
				if ($datanya->id_bag == $row->id_mutasi_unit_kerja)
				{
					$data['selected'][$row->id_mutasi_unit_kerja] = $datanya->id_bag;
				}
				$data['bag']['']	= "--Pilih Unit Kerja--";
				$data['bag'][$row->id_mutasi_unit_kerja] = $row->nama_mutasi_unit_kerja;
			}
			//akhir untuk listing menampilkan daftar pendidikan
			//untuk data jabatan
			$jabatan = $this->jabatan->get_all()->result();
			foreach($jabatan as $row)
			{
				if ($datanya->id_jab == $row->id_ref_jabatan) {
					$data['selected1'][$row->id_ref_jabatan] = $datanya->id_jab;
				}
				$data['jabatan']['']	= "--Pilih Jabatan--";
				$data['jabatan'][$row->id_ref_jabatan] = $row->nama_ref_jabatan;
				}
				//akhir untuk listing menampilkan daftar jabatan

				//untuk data bank
				$bank = $this->bank->get_all()->result();
					foreach($bank as $row)
					{
						if ($datanya->id_bank == $row->id_ref_bank) {
							$data['selected2'][$row->id_ref_bank] = $datanya->id_bank;
						}
						$data['bank']['']	= "--Pilih Bank--";
						$data['bank'][$row->id_ref_bank] = $row->nama_ref_bank;
					}
					//akhir untuk listing menampilkan daftar jabatan

					//untuk data agama
					$agama = $this->agama->get_all()->result();
					foreach($agama as $row)
					{
						if ($datanya->id_agm == $row->id_ref_agama) {
							$data['selected3'][$row->id_ref_agama] = $datanya->id_agm;
						}
						$data['id_agm']['']	= "--Pilih Agama--";
						$data['id_agm'][$row->id_ref_agama] = $row->nama_ref_agama;
					}
					//akhir untuk listing menampilkan daftar agama

					//untuk data pendidikan
					$pendidikan = $this->pendidikan->get_all()->result();
					foreach($pendidikan as $row)
					{
						if ($datanya->kdpndidik == $row->id_ref_pendidikan) {
							$data['selected6'][$row->id_ref_pendidikan] = $datanya->kdpndidik;
						}
						$data['kdpndidik']['']	= "--Pilih Pendidikan Terakhir--";
						$data['kdpndidik'][$row->id_ref_pendidikan] = $row->nama_ref_pendidikan;
					}
					//akhir untuk listing menampilkan daftar pendidikan



					//untuk data status kawin
					$data['default']['kdstatusk'] = '';
					$statusKawin = array('1' => 'Lajang', '2' => 'Menikah', '3' => 'Duda', '4' => 'Janda');
					foreach($statusKawin as $row => $value) {
							if ($datanya->kdstatusk == $row) {
								$data['selected4'][$row] = $datanya->id_jab;
							}
							$data['kdstatusk'][''] = '--Pilih Status Menikah--';
							$data['kdstatusk'][$row] = $value;
					}
					//listing akhir status kawin

					//untuk data status pegawai
					$data['default']['kdstatusp'] = '';
					$statusPegawai = array('1' => 'Tetap', '2' => 'Kontrak', '3' => 'Magang');
					foreach($statusPegawai as $row => $value) {
						if ($datanya->kdstatusp == $row) {
								$data['selected5'][$row] = $datanya->kdstatusp;
							}
							$data['kdstatusp'][''] = '--Pilih Status Pegawai--';
							$data['kdstatusp'][$row] = $value;
					}
					//listing akhir status pegawai

					


			//berlakukan validasi
			$this->form_validation->set_rules('nip','Nomor Induk Pegawai', 'required');

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

				if ($this->uploads->do_upload($path_file, $namaFile) == TRUE)
				{
					$dataPegawai = array(
						'nip'		=> $nip,
						'nama'		=> $nama,
						'tmpt_lahir'=> $tmptlahir,
						'tgl_lahir'	=> $tgl_lahir,
						'jenis_kelamin'	=> $jkel,
						'alamat'	=> $alamat,
						'tgl_masuk'	=> $tglmasuk,
						'id_bag'	=> $bag,
						'id_jab'	=> $jabatan,
						'level_user'=> '',
						'foto'		=> $foto,
						'tlpn'		=> $tlpn,
						'nohp'		=> $nohp,
						'npwp'		=> $nonpwp,
						'id_agm'	=> $agama,
						'kdpndidik'	=> $pendidikan,
						'noktp'		=> $noktp,
						'norek'		=> $norek,
						'id_bank'	=> $bank,
						'kdstatusk' => $kdstatusk,
						'kdstatusp'	=> $kdstatusp,
						'time_update'	=> date('Y-m-d H:i:s')
					);

					//tambahkan di model pegawai
					$this->pegawai->add($dataPegawai);
					$this->session->set_flashdata('success', 'Satu Data Izin Usaha Industri telah berhasil ditambahkan');
					redirect('pegawai');
				}
				
				else {
					$data['error_uploads'] = "Terjadi Kesalahan Upload File, Pastikan File yang Anda Upload adalah Valid";
				}
				

			}
			else {
				$this->load->view('template', $data);
			}
					

				
		}



}
