<?php

//tambahan skrip
//input data id_badanusaha di tabel tbl_bidangusaha


	class izin_sig extends CI_Controller
	{	
		function __construct()
		{
			parent::__construct();
			
			$this->load->model('bidangusaha_model','bidang',TRUE);
			$this->load->model('izin_sig_model','rekomendasi',TRUE);
			$this->load->model('referensi_model','referensi', TRUE);
			$this->load->model('aksesmodule_model','akses',TRUE);
			$this->load->model('registrasi_model', 'registrasi', TRUE);
			$this->load->library('libraryku');
		}
		var $title = 'izin_sig';
		var $limit = 20;
		
		
		function check() {
		
			$jum = $this->akses->get_akses_by_id($this->session->userdata('idLogin'), $this->title);
			if (($jum > 0 AND $this->session->userdata('login') == TRUE) OR $this->session->userdata('level') == 'admin') {
				RETURN TRUE;
			}
			else {
				return FALSE;
			}
		}
		
		
		function cariBidang() {
			$this->load->view('izin_sig/cari_bidang');
		}
		
		
		function groupBidang() {
			
			$data['lempar']= $this->input->get('lempar');
			$this->load->view('izin_sig/groupBidang',$data);
		}
		
		
		function tampil($offset = 0) {
			if ($this->check() == TRUE) 
			{
				#hanya menampilkan data data registrasi yang berstatus 0 dan 1
				$data['title'] = "Data Registrasi Perizinan Usaha Gangguan";
				$uri_segment = 3;
			
				$data['main_view'] = 'izin_sig/izin_sig';
				$data['search']	= site_url('izin_sig/search_process');
				$data['link'] = site_url('izin_sig/pilih');
				$data['form_action_cari'] = site_url('izin_sig/hasil');
				$data['query'] = $this->rekomendasi->get_all($this->limit, $offset)->result();
				$data['jumlah'] = $this->rekomendasi->get_all_data();
				$config = array(
						'base_url'	=> site_url('izin_sig/tampil'),
						'total_rows'=> $this->rekomendasi->get_all_data(),
						'per_page'	=> $this->limit,
						'uri_segment' => $uri_segment
					);
				$this->pagination->initialize($config);	
				$data['pagination'] = $this->pagination->create_links();
				
				$data['button']	= 'Input Data';
				$this->load->view('template', $data);
			}
			else {
				redirect('login');
			}
			
		}
	
		function index($offset = 0) {
			if ($this->check() == TRUE)
			{
				#hanya menampilkan data data registrasi yang berstatus 0 dan 1
				$data['title'] = "Data Registrasi Perizinan Gangguan";
				$uri_segment = 3;
				
				$data['main_view'] = 'izin_sig/daftar_registrasi';
				$data['search']	= site_url('izin_sig/search_registrasi');
				$data['link'] = site_url('izin_sig/add');
		
				$jumlah = $this->rekomendasi->get_all_registrasi_by_id('')->num_rows();
				$data['query'] = $this->rekomendasi->get_all_registrasi($this->limit, $offset)->result();
				$data['jumlah'] = $jumlah;
				$config = array(
					'base_url'	=> site_url('izin_sig/index'),
					'total_rows'=> $this->rekomendasi->get_all_registrasi_by_id('')->num_rows(),
					'per_page'	=> $this->limit,
					'uri_segment' => $uri_segment
				);
				$this->pagination->initialize($config);
				$data['pagination'] = $this->pagination->create_links();
				$data['button']	= 'Input Data';
				
				$this->load->view('template', $data);
			}
			else {
				redirect('login');
			}
				
		}
		
		
		
		
		function search_registrasi($offset = 0) {
			if ($this->check() == TRUE)
			{
				#hanya menampilkan data data registrasi yang berstatus 0 dan 1
				$keyword = $this->libraryku->cekinput($this->input->post('keyword'));
				$data['title'] = "Pencarian Registrasi Izin Gangguan";
				$data['main_view'] = 'izin_sig/daftar_registrasi';
				$data['search']	= site_url('izin_sig/search_registrasi');
				$data['link'] = site_url('izin_sig/add');
				$data['query'] = $this->rekomendasi->get_all_registrasi_by_id($keyword)->result();
			
				
				$jumlah = $this->rekomendasi->get_all_registrasi_by_id($keyword)->num_rows();
				if ($jumlah > 0) {
					$data['found'] = "ditemukan sebanyak $jumlah data dengan keyword $keyword";
				}
				else {
					$data['notfound']	= "Data Tidak Ditemukan !";
					$this->session->set_flashdata('notfound', 'data tidak ditemukan');
				}
				$data['jumlah'] = $jumlah;
				
				$data['pagination']	= "";
				$data['back']	= site_url('izin_sig');
				
				$this->load->view('template', $data);
			}
			else {
				redirect('login');
			}
				
		}
		
		
		function search_process($offset=0) {
			
			if ($this->check() == TRUE) {
				$keyword = $this->libraryku->cekinput($this->input->post('keyword'));
				$data['title'] = "Pencarian Data Perizinan Gangguan";
				$data['h2_title'] = 'Data Rekomendasi SIG';
				$data['main_view'] = 'izin_sig/izin_sig';
				$data['search']	= site_url('izin_sig/search_process');
				$data['link'] = site_url('izin_sig/add');
				$data['query'] = $this->rekomendasi->get_all_by_id($keyword)->result();
			
				
				$jumlah = $this->rekomendasi->get_all_data($keyword);
				
				if ($jumlah > 0) {
					$data['found'] = "ditemukan sebanyak $jumlah data dengan keyword $keyword";
				}
				else {
					$data['notfound']	= "Data Tidak Ditemukan !";
					$this->session->set_flashdata('notfound', 'data tidak ditemukan');
				}
				$data['jumlah'] = $jumlah;
				
				$data['pagination']	= "";
				$data['back']	= site_url('izin_sig/tampil');
				
				$this->load->view('template', $data);
			}
			else {
				redirect('login');
			}
				
		}
		
		
		//fungsi untuk tambah data
		function add($id)
		{
			if ($this->check() == TRUE) {
				$id = $this->enkrip->decode($id);
				
				//disini hanyalah melengkapi item item yang nantinya akan ditampilkan di halaman tambah data seperti, judul, nama link, dll
				$data['title'] = "Tambah Data Perizinan Gangguan";
			
			
				$data['main_view'] = 'izin_sig/izin_sig_form';
				$data['form_action'] = site_url('izin_sig/add_process');
				$data['linkBack'] = site_url('perizinan');
				$data['button']	= 'Update Data';
			
				
				$jum = $this->rekomendasi->get_all_data_izin_by_registrasi($id);
				$data['default']['kegUsaha'] = '';
				if ($jum > 0) {
					$dataIzin = $this->rekomendasi->get_data_izin_by_registrasi($id);
					$data['default']['nomorRekomendasi'] = $dataIzin->no_reko;
					$data['default']['tglRekomendasi']	 = $dataIzin->tgl_reko;
					$data['default']['kapasitas']	= $dataIzin->kapasitas;
					$data['default']['tenagaKerja'] = $dataIzin->tenaker;
					$data['default']['luasTempatUsaha'] = $dataIzin->luas_usaha;
					$data['default']['golongan'] = $dataIzin->golusaha;
					$data['default']['mulai']	= $dataIzin->tgl_izin;
					
					//Untuk Kegiatan Usaha
					//$dataKegiatanUsaha = $this->rekomendasi->get_kegiatan_usaha_by_izin($dataIzin->no_izin);
					$dataKegiatanUsaha = $this->rekomendasi->get_bidusaha_by_no_izin($dataIzin->no_izin);
					foreach($dataKegiatanUsaha->result() as $kegiatan)
					{
						
						$data['default']['kegUsaha'] .= "<div id=\"".$kegiatan->nm_gol.$kegiatan->id_gol."_id\" class=\"idBidangUsaha\">
						    ".$kegiatan->nm_gol."<a class=\"closeTag\" onclick=\"parentNode.remove()\">X</a>
					    <input type=\"hidden\" name=\"kegiatanUsaha[]\" value=\"".$kegiatan->id_gol."\"></input></div>";
					}
					
					
					
					//untuk data status izin
					$statusIzin = array('1' => 'Normal/Berlaku', '2' => 'Tidak Berlaku/Belum Diperbaharui / Belum Diperpanjang', '3' => 'Dikenai Sanksi / dibekukan', '4' => 'Ditutup/Dicabut');
					foreach($statusIzin as $row => $value) {
							if ($dataIzin->sta_izin == $row) {
								$data['selected2'][$row] = $dataIzin->sta_izin;
							}
							$data['status'][$row] = $value;
					}
					$data['noIzin'] = $dataIzin->no_izin;
					
				}
				else {
					//untuk data status izin
					$statusIzin = array('1' => 'Normal/Berlaku', '2' => 'Tidak Berlaku/Belum Diperbaharui / Belum Diperpanjang', '3' => 'Dikenai Sanksi / dibekukan', '4' => 'Ditutup/Dicabut');
					foreach($statusIzin as $row => $value) {
							$data['status'][$row] = $value;
					}
					
					$data['default']['bidangUsaha'] = "";
				}

			
				
				
				
				
				$datanya	= $this->registrasi->get_data_registrasi_by_id($id);
				$no_reg = $datanya->no_reg;
				//untuk data pemohon
				
				$data['no_reg'] = $no_reg;
				$data['nm_pemohon'] = $datanya->nm_pemohon;
				$data['id_pemohon'] = $datanya->id_pemohon;
				$data['ktp_pemohon'] = $datanya->ktp_pemohon;
				$data['alm_pemohon'] = $datanya->alm_pemohon;
				$data['hp_pemohon'] = $datanya->hp_pemohon;
				$data['kecamatan'] = $datanya->kecamatan;
				
				//untuk badan usaha
				$data['atr_usaha'] = $datanya->atr_usaha;
				$data['id_bdnusaha'] = $datanya->id_bdnusaha;
				$data['nm_bdnusaha'] = $datanya->nm_bdnusaha;
				$data['alm_bdnusaha'] = $datanya->alm_bdnusaha;
				$data['jab_pengurus'] = $datanya->jab_pengurus;
				$data['noFax']	= $datanya->fax_bdnusaha;
				$data['tlp_bdnusaha'] = $datanya->tlp_bdnusaha;
				$data['id_kel']		= $datanya->id_kel;
				
				//untuk status usaha
				$sta_usaha = $this->referensi->get_all_stausaha()->result();
				foreach($sta_usaha as $row) {
					if ($datanya->id_stausaha == $row->id_stausaha) {
						$data['selected5'][$row->id_stausaha] = $datanya->id_stausaha;
					}
					$data['stausaha']['']	= "Pilih Status Usaha";
					$data['stausaha'][$row->id_stausaha] = $row->nm_stausaha;
				}
				
				$data['tgl_reg'] 	= $this->libraryku->tanggal($datanya->tgl_reg);				
				
				
				//untuk attribut usaha
				$attribut = $this->referensi->get_all_attribut()->result();
				foreach($attribut as $row) {
					if ($datanya->id_katusaha == $row->id_katusaha) {
						$data['selected6'][$row->id_katusaha] = $datanya->id_katusaha;
					}
					$data['katusaha']['']	= "Pilih Kategori Perusahaan";
					$data['katusaha'][$row->id_katusaha] = $row->nm_katusaha;
				}
				
				
				
				//kecamatan
				$kecamatan = $this->referensi->get_all_kecamatan()->result();
				foreach($kecamatan as $row)
				{
					if ($datanya->id_kec == $row->id_kec) {
						$data['selected1'][$row->id_kec] = $datanya->id_kec;
					}
					$data['kecamatans']['']	= "--Pilih Kecamatan--";
					$data['kecamatans'][$row->id_kec] = $row->nm_kec;
				}
				
				
				$kelurahan = $this->referensi->get_all_kelurahan()->result();
				foreach($kelurahan as $row)
				{
					if ($datanya->id_kel == $row->id_kel)
					{
						$data['selected'][$row->id_kel] = $datanya->id_kel;
					}
					$data['kelurahan']['']		= "Pilih Kelurahan";
					$data['kelurahan'][$row->id_kel] = $row->nm_kel;	
				}
				
				
				//set sesi nya
				$this->session->set_userdata('idRegistrasi', $id);
				
				$this->load->view('template', $data);
			}
				
			else {
				redirect('login');
			}
				
						
			
			
		}		
		
		
		
		
		//fungsi untuk proses penambahan datanya 
		function add_process()
		{
		
				
				//disini hanyalah melengkapi item item yang nantinya akan ditampilkan di halaman tambah data seperti, judul, nama link, dll
				$data['title'] = "Tambah Data Perizinan Gangguan";
				
			
				$data['main_view'] = 'izin_sig/izin_sig_form';
				$data['form_action'] = site_url('izin_sig/add_process');
				$data['linkBack'] = site_url('perizinan');
				$data['button']	= 'Update Data';
				
				
				$id = $this->session->userdata('idRegistrasi');
				$datanya	= $this->registrasi->get_data_registrasi_by_id($id);
				$no_reg = $datanya->no_reg;
				//untuk data nm_pemohon
			
				
				$jum = $this->rekomendasi->get_all_data_izin_by_registrasi($id);
				
				if ($jum > 0) {
					$dataIzin = $this->rekomendasi->get_data_izin_by_registrasi($id);
						
						
					$data['default']['nomorRekomendasi'] = $dataIzin->no_reko;
					$data['default']['tglRekomendasi']	 = $dataIzin->tgl_reko;
					$data['default']['kapasitas']	= $dataIzin->kapasitas;
					$data['default']['tenagaKerja'] = $dataIzin->tenaker;
					$data['default']['luasTempatUsaha'] = $dataIzin->luas_usaha;
					$data['default']['golongan'] = $dataIzin->golusaha;
					$data['default']['mulai']	= $dataIzin->tgl_izin;
					
					//Untuk Kegiatan Usaha
					$dataKegiatanUsaha = $this->rekomendasi->get_bidusaha_by_no_izin($dataIzin->no_izin);
					foreach($dataKegiatanUsaha->result() as $kegiatan)
					{
						
						$data['default']['kegUsaha'] .= "<div id=\"".$kegiatan->nm_gol.$kegiatan->id_gol."_id\" class=\"idBidangUsaha\">
						    ".$kegiatan->nm_gol."<a class=\"closeTag\" onclick=\"parentNode.remove()\">X</a>
					    <input type=\"hidden\" name=\"kegiatanUsaha[]\" value=\"".$kegiatan->id_gol."\"></input></div>";
					}
					
				
					
					
					//untuk data status izin
					$statusIzin = array('1' => 'Normal/Berlaku', '2' => 'Tidak Berlaku/Belum Diperbaharui / Belum Diperpanjang', '3' => 'Dikenai Sanksi / dibekukan', '4' => 'Ditutup/Dicabut');
					foreach($statusIzin as $row => $value) {
							if ($dataIzin->sta_izin == $row) {
								$data['selected2'][$row] = $dataIzin->sta_izin;
							}
							$data['status'][$row] = $value;
					}
					$data['noIzin'] = $dataIzin->no_izin;
					
				}
				else {
					$data['default']['kegUsaha'] = '';
					//untuk data status izin
					$statusIzin = array('1' => 'Normal/Berlaku', '2' => 'Tidak Berlaku/Belum Diperbaharui / Belum Diperpanjang', '3' => 'Dikenai Sanksi / dibekukan', '4' => 'Ditutup/Dicabut');
					foreach($statusIzin as $row => $value) {
							$data['status'][$row] = $value;
					}
					
					$data['default']['bidangUsaha'] = "";
				}
				
				$data['no_reg'] = $id;
				$jenis_reg = $datanya->jenis_reg;
				$data['nm_pemohon'] = $datanya->nm_pemohon;
				$data['id_pemohon'] = $datanya->id_pemohon;
				$data['ktp_pemohon'] = $datanya->ktp_pemohon;
				$data['alm_pemohon'] = $datanya->alm_pemohon;
				$data['hp_pemohon'] = $datanya->hp_pemohon;
				$data['kecamatan'] = $datanya->kecamatan;
				//untuk badan usaha
				$data['atr_usaha'] = $datanya->atr_usaha;
				$data['id_bdnusaha'] = $datanya->id_bdnusaha;
				$data['nm_bdnusaha'] = $datanya->nm_bdnusaha;
				$data['alm_bdnusaha'] = $datanya->alm_bdnusaha;
				$data['jab_pengurus'] = $datanya->jab_pengurus;
				$data['noFax']	= $datanya->fax_bdnusaha;
				$data['tlp_bdnusaha'] = $datanya->tlp_bdnusaha;
				$data['id_kel']		= $datanya->id_kel;
				
				
				
				//kecamatan
				$kecamatan = $this->referensi->get_all_kecamatan()->result();
				foreach($kecamatan as $row)
				{
					if ($datanya->id_kec == $row->id_kec) {
						$data['selected1'][$row->id_kec] = $datanya->id_kec;
					}
					$data['kecamatans']['']	= "--Pilih Kecamatan--";
					$data['kecamatans'][$row->id_kec] = $row->nm_kec;
				}
				
				//untuk kelurahan
				$kelurahan = $this->referensi->get_all_kelurahan()->result();
				foreach($kelurahan as $row)
				{
					if ($datanya->id_kel == $row->id_kel)
					{
						$data['selected'][$row->id_kel] = $datanya->id_kel;
					}
					$data['kelurahan']['']		= "Pilih Kelurahan";
					$data['kelurahan'][$row->id_kel] = $row->nm_kel;	
				}
				
				
				//untuk status usaha
				$sta_usaha = $this->referensi->get_all_stausaha()->result();
				foreach($sta_usaha as $row) {
					if ($datanya->id_stausaha == $row->id_stausaha) {
						$data['selected5'][$row->id_stausaha] = $datanya->id_stausaha;
					}
					$data['stausaha']['']	= "Pilih Status Usaha";
					$data['stausaha'][$row->id_stausaha] = $row->nm_stausaha;
				}
				
				$data['tgl_reg'] 	= $this->libraryku->tanggal($datanya->tgl_reg);				
				
				
				//untuk attribut usaha
				$attribut = $this->referensi->get_all_attribut()->result();
				foreach($attribut as $row) {
					if ($datanya->id_katusaha == $row->id_katusaha) {
						$data['selected6'][$row->id_katusaha] = $datanya->id_katusaha;
					}
					$data['katusaha']['']	= "Pilih Kategori Perusahaan";
					$data['katusaha'][$row->id_katusaha] = $row->nm_katusaha;
				}
				
				
				
				
				
				//set form validation
				
				$this->form_validation->set_rules('nomorRekomendasi','Nomor Rekomendasi','required');
				$this->form_validation->set_rules('tglRekomendasi','Tanggal Rekomendasi','required');
				
				$this->form_validation->set_rules('tenagaKerja','Tenaga Kerja','required|numeric');	
				$this->form_validation->set_rules('luasTempatUsaha','Luas Tempat Usaha','required');
				
				
				$id_kbli = $this->input->post('kegiatanUsaha');
				
				
				
				//kalau validasi berhasil
				if ($this->form_validation->run() == TRUE)
				{
					
					
					$tgl_input= date('Y-m-d');
					
					
					
					
					
					$nomorRekomendasi 	= $this->input->post('nomorRekomendasi');
					
					//untuk data pemohon
					##$noKTP	= $datanya->ktp_pemohon;
					$namaPemohon	= $this->input->post('namaPemohon');
					$alamatPemohon  = $this->input->post('alamatPemohon');
					$noHp	= $this->input->post('noHp');
					$idPemohon 	= $this->input->post('id_pemohon');
				
					$dataPemohon = array(
						'nm_pemohon' => $namaPemohon,
						'alm_pemohon'=> $alamatPemohon,
						'hp_pemohon' => $noHp
					);
					
					
#					$this->rekomendasi->update_pemohon($idPemohon, $dataPemohon);
					
					
					
					//untuk data bidang usaha
					$id_bdnusaha	= $this->input->post('id_bdnusaha');
					$namaBadanUsaha= $this->input->post('namaBadanUsaha');
					$alamatBadanUsaha = $this->input->post('alamatBadanUsaha');
					$kelurahan	= $this->input->post('kelurahan');
					$jabatanPemohon = $this->input->post('jabatanPemohon');
					$tlp_bdnusaha	= $this->input->post('telpBadanUsaha');
					$noFax	= $this->input->post('noFax');
					$kecamatan = $this->input->post('kecamatan');
					$katusaha = $this->input->post('katusaha');
					$stausaha = $this->input->post('stausaha');
					$tglRekomendasi 	= $this->input->post('tglRekomendasi');
					$kapasitas			= $this->input->post('kapasitas');
					$tenagaKerja		= $this->input->post('tenagaKerja');
					$luas				= $this->input->post('luasTempatUsaha');
					$golongan = $this->input->post('golongan');
					$mulai 				= date('Y-m-d');
					$statusIzin			= 1;
				
					$kecamatan = substr($kecamatan,4,2);
					
					
									
					//lalu update data badan usaha
					$dataBadanUsaha = array(
						'kel_bdnusaha'	=> $kelurahan,
						'nm_bdnusaha'   => $namaBadanUsaha,
						'fax_bdnusaha'	=> $noFax,
						'alm_bdnusaha'	=> $alamatBadanUsaha,
						'tlp_bdnusaha'	=> $tlp_bdnusaha,
						'id_katusaha'	=> $katusaha,
						'id_stausaha'	=> $stausaha
					);
#					$this->rekomendasi->update_bdnusaha($id_bdnusaha,$dataBadanUsaha);
					
					
					
					$id_gol = $this->input->post('kegiatanUsaha');
				
				
									
					//check apakah sebelumnya sudah ada datanya atau tidak
					if ($this->input->post('noIzin') != "") {
						//lakukan update
					
						$no_izin = $this->input->post('noIzin');
						$cek = $this->rekomendasi->cek_bidusaha_by_no_izin($no_izin);
					
						if($cek == TRUE) {
							$this->rekomendasi->delete_bidusaha($no_izin);
						}
						
						foreach($id_gol as $value) {
						
							$dataBidangUsaha = array(
								'no_izin'	=> $no_izin,
								'id_gol'	=> $value,
								'id_bdnusaha' => $id_bdnusaha
							);

							$this->rekomendasi->add_bidusaha($dataBidangUsaha);
						}
						
						
						$dataRekomendasi = array(
							'no_izin' => $no_izin,
							'tgl_izin'	=> $mulai,
							'no_reg'	=> $id,
							'id_stausaha'	=> $stausaha,
							'alm_bdnusaha' => $alamatBadanUsaha,
							'no_reko'	=> $nomorRekomendasi,
							'id_kel'	=> $kelurahan,
							'tlp_bdnusaha' => $tlp_bdnusaha,
							'fax_bdnusaha'	=> $noFax,
							'tgl_reko'	=> $tglRekomendasi,
							'kapasitas'	=> $kapasitas,
							'tenaker'	=> $tenagaKerja,
							'luas_usaha'=> $luas,
							'golusaha'	=> $golongan,
							'ptgs_input'=> $this->session->userdata('namaLengkap'),
							'tgl_input'	=> $tgl_input,
							'sta_izin'	=> $statusIzin
							
						);
#						$this->rekomendasi->update($no_izin, $dataRekomendasi);
						
					}
					
					
					
					//kalau 
					else {
						$no_izin = $this->libraryku->kodeSIG($kecamatan,$jenis_reg);
						
						foreach($id_gol as $value) {
						
							$dataBidangUsaha = array(
								'no_izin'	=> $no_izin,
								'id_gol'	=> $value,
								'id_bdnusaha' => $id_bdnusaha
							);

							//input datanya di tabel tbl_bidusaha
							$this->rekomendasi->add_bidusaha($dataBidangUsaha);

						}
						$dataRekomendasi = array(
							'no_izin' => $no_izin,
							'tgl_izin'	=> $mulai,
							'no_reg'	=> $id,
							'id_stausaha'	=> $stausaha,
							'alm_bdnusaha' => $alamatBadanUsaha,
							'no_reko'	=> $nomorRekomendasi,
							'id_kel'	=> $kelurahan,
							'tlp_bdnusaha' => $tlp_bdnusaha,
							'fax_bdnusaha'	=> $noFax,
							'tgl_reko'	=> $tglRekomendasi,
							'kapasitas'	=> $kapasitas,
							'tenaker'	=> $tenagaKerja,
							'luas_usaha'=> $luas,
							'golusaha'	=> $golongan,
							'ptgs_input'=> $this->session->userdata('namaLengkap'),
							'tgl_input'	=> $tgl_input,
							'sta_izin'	=> $statusIzin
							
						);
#						$this->rekomendasi->add($dataRekomendasi);
					}
					
					//sekarang update data registrasinya
					//sekarang update data di tabel registrasi dengan mengubah status_reg = 1
					$dataRegistrasi = array(
						'status_reg' => 1
					);
					
					$this->rekomendasi->update_registrasi($id, $dataRegistrasi);
					
					$this->session->set_flashdata('sukses', 'Satu Data Surat Izin Gangguan telah berhasil ditambahkan');
					redirect('izin_sig');
				}
				
				else {
					$this->load->view('template', $data);
				}
				
					
					
				
					
					
		}
				
			
		

		
		
		
		//fungsi untuk ubah data
		function update($id)
		{
			if ($this->check() == TRUE) {
				$id = $this->enkrip->decode($id);
				
				//disini hanyalah melengkapi item item yang nantinya akan ditampilkan di halaman tambah data seperti, judul, nama link, dll
				$data['title'] = "Ubah Data Perizinan Gangguan";
			
			
				$data['main_view'] = 'izin_sig/izin_sig_form';
				$data['form_action'] = site_url('izin_sig/update_process');
				$data['linkBack'] = site_url('perizinan');
				$data['button']	= 'Update Data';
				
				$validasi = $this->rekomendasi->get_all_data_by_id($id);
				if ($validasi > 0) {
					
					$datanya	= $this->rekomendasi->get_data_by_id($id);
					$no_reg = $datanya->no_reg;
					//untuk data pemohon
					
					$data['no_reg'] = $no_reg;
					$data['nm_pemohon'] = $datanya->nm_pemohon;
					$data['id_pemohon'] = $datanya->id_pemohon;
					$data['ktp_pemohon'] = $datanya->ktp_pemohon;
					$data['alm_pemohon'] = $datanya->alm_pemohon;
					$data['hp_pemohon'] = $datanya->hp_pemohon;
					$data['kecamatan'] = $datanya->kecamatan;
					
					//untuk badan usaha
					$data['atr_usaha'] = $datanya->atr_usaha;
					$data['id_bdnusaha'] = $datanya->id_bdnusaha;
					$data['nm_bdnusaha'] = $datanya->nm_bdnusaha;
					$data['alm_bdnusaha'] = $datanya->alm_bdnusaha;
					$data['jab_pengurus'] = $datanya->jab_pengurus;
					$data['noFax']	= $datanya->fax_bdnusaha;
					$data['tlp_bdnusaha'] = $datanya->tlp_bdnusaha;
					$data['id_kel']		= $datanya->id_kel;
					
					//untuk status usaha
					$sta_usaha = $this->referensi->get_all_stausaha()->result();
					foreach($sta_usaha as $row) {
						if ($datanya->id_stausaha == $row->id_stausaha) {
							$data['selected5'][$row->id_stausaha] = $datanya->id_stausaha;
						}
						$data['stausaha']['']	= "Pilih Status Usaha";
						$data['stausaha'][$row->id_stausaha] = $row->nm_stausaha;
					}
					
					$data['tgl_reg'] 	= $this->libraryku->tanggal($datanya->tgl_reg);				
					
					
					//untuk attribut usaha
					$attribut = $this->referensi->get_all_attribut()->result();
					foreach($attribut as $row) {
						if ($datanya->id_katusaha == $row->id_katusaha) {
							$data['selected6'][$row->id_katusaha] = $datanya->id_katusaha;
						}
						$data['katusaha']['']	= "Pilih Kategori Perusahaan";
						$data['katusaha'][$row->id_katusaha] = $row->nm_katusaha;
					}
					
					
					
					//kecamatan
					$kecamatan = $this->referensi->get_all_kecamatan()->result();
					foreach($kecamatan as $row)
					{
						if ($datanya->id_kec == $row->id_kec) {
							$data['selected1'][$row->id_kec] = $datanya->id_kec;
						}
						$data['kecamatans']['']	= "--Pilih Kecamatan--";
						$data['kecamatans'][$row->id_kec] = $row->nm_kec;
					}
					
					
					$kelurahan = $this->referensi->get_all_kelurahan()->result();
					foreach($kelurahan as $row)
					{
						if ($datanya->id_kel == $row->id_kel)
						{
							$data['selected'][$row->id_kel] = $datanya->id_kel;
						}
						$data['kelurahan']['']		= "Pilih Kelurahan";
						$data['kelurahan'][$row->id_kel] = $row->nm_kel;	
					}
					
					//Untuk Kegiatan Usaha
					$data['default']['kegUsaha'] = '';
					$dataKegiatanUsaha = $this->rekomendasi->get_bidusaha_by_no_izin($id);
					foreach($dataKegiatanUsaha->result() as $kegiatan)
					{
					
						$data['default']['kegUsaha'] .= "<div id=\"".$kegiatan->nm_gol.$kegiatan->id_gol."_id\" class=\"idBidangUsaha\">
						    ".$kegiatan->nm_gol."<a class=\"closeTag\" onclick=\"parentNode.remove()\">X</a>
					    <input type=\"hidden\" name=\"kegiatanUsaha[]\" value=\"".$kegiatan->id_gol."\"></input></div>";
					}
					
					
					$data['default']['nomorRekomendasi'] = $datanya->no_reko;
					$data['default']['tglRekomendasi']	 = $datanya->tgl_reko;
					$data['default']['kapasitas']	= $datanya->kapasitas;
					$data['default']['tenagaKerja'] = $datanya->tenaker;
					$data['default']['luasTempatUsaha'] = $datanya->luas_usaha;
					$data['default']['golongan'] = $datanya->golusaha;
					$data['default']['mulai']	= $datanya->tgl_izin;
					
					
					//set sesi nya
					$this->session->set_userdata('id', $id);
					
					$this->load->view('template', $data);
					
					
				}
				
				else {
					echo "tidak bisa melakukan editing";
				}
					
				
			}
				
			else {
				echo "akses ditolak";
			}
				
				
				
				
				
				
				
			
			
		}
		
		
		
		function update_process()
		{
		
			if ($this->check() == TRUE) {
				$id = $this->session->userdata('id');
				//disini hanyalah melengkapi item item yang nantinya akan ditampilkan di halaman tambah data seperti, judul, nama link, dll
				$data['title'] = "Tambah Data Perizinan Gangguan";
			
			
				$data['main_view'] = 'izin_sig/izin_sig_form';
				$data['form_action'] = site_url('izin_sig/update_process');
				$data['linkBack'] = site_url('perizinan');
				$data['button']	= 'Update Data';
				
				$validasi = $this->rekomendasi->get_all_data_by_id($id);
				if ($validasi > 0) {
					
					$datanya	= $this->rekomendasi->get_data_by_id($id);
					$no_reg = $datanya->no_reg;
					//untuk data pemohon
					
					$data['no_reg'] = $no_reg;
					$data['nm_pemohon'] = $datanya->nm_pemohon;
					$data['id_pemohon'] = $datanya->id_pemohon;
					$data['ktp_pemohon'] = $datanya->ktp_pemohon;
					$data['alm_pemohon'] = $datanya->alm_pemohon;
					$data['hp_pemohon'] = $datanya->hp_pemohon;
					$data['kecamatan'] = $datanya->kecamatan;
					
					//untuk badan usaha
					$data['atr_usaha'] = $datanya->atr_usaha;
					$data['id_bdnusaha'] = $datanya->id_bdnusaha;
					$data['nm_bdnusaha'] = $datanya->nm_bdnusaha;
					$data['alm_bdnusaha'] = $datanya->alm_bdnusaha;
					$data['jab_pengurus'] = $datanya->jab_pengurus;
					$data['noFax']	= $datanya->fax_bdnusaha;
					$data['tlp_bdnusaha'] = $datanya->tlp_bdnusaha;
					$data['id_kel']		= $datanya->id_kel;
					
					//untuk status usaha
					$sta_usaha = $this->referensi->get_all_stausaha()->result();
					foreach($sta_usaha as $row) {
						if ($datanya->id_stausaha == $row->id_stausaha) {
							$data['selected5'][$row->id_stausaha] = $datanya->id_stausaha;
						}
						$data['stausaha']['']	= "Pilih Status Usaha";
						$data['stausaha'][$row->id_stausaha] = $row->nm_stausaha;
					}
					
					$data['tgl_reg'] 	= $this->libraryku->tanggal($datanya->tgl_reg);				
					
					
					//untuk attribut usaha
					$attribut = $this->referensi->get_all_attribut()->result();
					foreach($attribut as $row) {
						if ($datanya->id_katusaha == $row->id_katusaha) {
							$data['selected6'][$row->id_katusaha] = $datanya->id_katusaha;
						}
						$data['katusaha']['']	= "Pilih Kategori Perusahaan";
						$data['katusaha'][$row->id_katusaha] = $row->nm_katusaha;
					}
					
					
					
					//kecamatan
					$kecamatan = $this->referensi->get_all_kecamatan()->result();
					foreach($kecamatan as $row)
					{
						if ($datanya->id_kec == $row->id_kec) {
							$data['selected1'][$row->id_kec] = $datanya->id_kec;
						}
						$data['kecamatans']['']	= "--Pilih Kecamatan--";
						$data['kecamatans'][$row->id_kec] = $row->nm_kec;
					}
					
					
					$kelurahan = $this->referensi->get_all_kelurahan()->result();
					foreach($kelurahan as $row)
					{
						if ($datanya->id_kel == $row->id_kel)
						{
							$data['selected'][$row->id_kel] = $datanya->id_kel;
						}
						$data['kelurahan']['']		= "Pilih Kelurahan";
						$data['kelurahan'][$row->id_kel] = $row->nm_kel;	
					}
					
					//Untuk Kegiatan Usaha
					$data['default']['kegUsaha'] = '';
					$dataKegiatanUsaha = $this->rekomendasi->get_bidusaha_by_no_izin($id);
					foreach($dataKegiatanUsaha->result() as $kegiatan)
					{
					
						$data['default']['kegUsaha'] .= "<div id=\"".$kegiatan->nm_gol.$kegiatan->id_gol."_id\" class=\"idBidangUsaha\">
						    ".$kegiatan->nm_gol."<a class=\"closeTag\" onclick=\"parentNode.remove()\">X</a>
					    <input type=\"hidden\" name=\"kegiatanUsaha[]\" value=\"".$kegiatan->id_gol."\"></input></div>";
					}
					
					
					$data['default']['nomorRekomendasi'] = $datanya->no_reko;
					$data['default']['tglRekomendasi']	 = $datanya->tgl_reko;
					$data['default']['kapasitas']	= $datanya->kapasitas;
					$data['default']['tenagaKerja'] = $datanya->tenaker;
					$data['default']['luasTempatUsaha'] = $datanya->luas_usaha;
					$data['default']['golongan'] = $datanya->golusaha;
					$data['default']['mulai']	= $datanya->tgl_izin;
					
					
					
					
					
					//ambil nilai dari inputannya
					//set form validation
				
				$this->form_validation->set_rules('nomorRekomendasi','Nomor Rekomendasi','required');
				$this->form_validation->set_rules('tglRekomendasi','Tanggal Rekomendasi','required');
				
				$this->form_validation->set_rules('tenagaKerja','Tenaga Kerja','required|numeric');	
				$this->form_validation->set_rules('luasTempatUsaha','Luas Tempat Usaha','required');
				
				
				$id_kbli = $this->input->post('kegiatanUsaha');
				
				
				
				//kalau validasi berhasil
				if ($this->form_validation->run() == TRUE)
				{
					
					
					$tgl_input= date('Y-m-d');
					
					
					
					
					
					$nomorRekomendasi 	= $this->input->post('nomorRekomendasi');
					
					//untuk data bidang usaha
					$id_bdnusaha	= $this->input->post('id_bdnusaha');
					$namaBadanUsaha= $this->input->post('namaBadanUsaha');
					
					$alamatBadanUsaha = $this->input->post('alamatBadanUsaha');
					$kelurahan	= $this->input->post('kelurahan');
					$jabatanPemohon = $this->input->post('jabatanPemohon');
					$tlp_bdnusaha	= $this->input->post('telpBadanUsaha');
					$noFax	= $this->input->post('noFax');
					$kecamatan = $this->input->post('kecamatan');
					$katusaha = $this->input->post('katusaha');
					$stausaha = $this->input->post('stausaha');
					$tglRekomendasi 	= $this->input->post('tglRekomendasi');
					$kapasitas			= $this->input->post('kapasitas');
					$tenagaKerja		= $this->input->post('tenagaKerja');
					$luas				= $this->input->post('luasTempatUsaha');
					$golongan = $this->input->post('golongan');
					$mulai 				= date('Y-m-d');
					$statusIzin			= 1;
				
				
					$kecamatan = substr($kecamatan,4,2);
					
					
					//untuk data pemohon
					$namaPemohon	= $this->input->post('namaPemohon');
					$alamatPemohon  = $this->input->post('alamatPemohon');
					$noHp	= $this->input->post('noHp');
					$idPemohon 	= $this->input->post('id_pemohon');
					//update data pemohon
					$dataPemohon = array(
						'nm_pemohon' => $namaPemohon,
						'alm_pemohon'=> $alamatPemohon,
						'hp_pemohon' => $noHp
					);
					
					
					$this->rekomendasi->update_pemohon($idPemohon, $dataPemohon);
					
						
					//lalu update data badan usaha
					$dataBadanUsaha = array(
						'kel_bdnusaha'	=> $kelurahan,
						'nm_bdnusaha'	=> $namaBadanUsaha,
						'fax_bdnusaha'	=> $noFax,
						'alm_bdnusaha'	=> $alamatBadanUsaha,
						'tlp_bdnusaha'	=> $tlp_bdnusaha,
						'id_katusaha'	=> $katusaha,
						'id_stausaha'	=> $stausaha
					);
					$this->rekomendasi->update_bdnusaha($id_bdnusaha,$dataBadanUsaha);
					
					
					
					$id_gol = $this->input->post('kegiatanUsaha');
				
					
									
						//lakukan update
						
						$cek = $this->rekomendasi->cek_bidusaha_by_no_izin($id);
					
						if($cek == TRUE) {
							
							$this->rekomendasi->delete_bidusaha($id);
						}
						
						foreach($id_gol as $value) {
						
							$dataBidangUsaha = array(
								'no_izin'	=> $no_izin,
								'id_gol'	=> $value,
								'id_bdnusaha' => $id_bdnusaha
							);
							$this->rekomendasi->add_bidusaha($dataBidangUsaha);
						}
						
						
						$dataRekomendasi = array(
							'tgl_izin'	=> $mulai,
							'id_stausaha'	=> $stausaha,
							'alm_bdnusaha' => $alamatBadanUsaha,
							'no_reko'	=> $nomorRekomendasi,
							'id_kel'	=> $kelurahan,
							'tlp_bdnusaha' => $tlp_bdnusaha,
							'fax_bdnusaha'	=> $noFax,
							'tgl_reko'	=> $tglRekomendasi,
							'kapasitas'	=> $kapasitas,
							'tenaker'	=> $tenagaKerja,
							'luas_usaha'=> $luas,
							'golusaha'	=> $golongan,
							'ptgs_input'=> $this->session->userdata('namaLengkap'),
							'tgl_input'	=> $tgl_input,
							'sta_izin'	=> $statusIzin
							
						);
						$this->rekomendasi->update($id, $dataRekomendasi);
						
					
					
					$this->session->set_flashdata('sukses', 'Satu Data Surat Izin Gangguan <b>'.$id.'</b> telah berhasil diubah');
					redirect('izin_sig/tampil');
				}
				
				else {
					$this->load->view('template', $data);
				}
					
					
				}
				
				else {
					echo "tidak bisa melakukan editing";
				}
					
				
			}
				
			else {
				echo "akses ditolak";
			}
				
				
				
				
				
				
				
			
			
		}
		
		
		
		##untuk tambah bidang usaha ##
		//fungsi untuk ubah data
		function tambah_bidang_usaha($id)
		{
			if ($this->check() == TRUE) {
				$id = $this->enkrip->decode($id);
				
				//disini hanyalah melengkapi item item yang nantinya akan ditampilkan di halaman tambah data seperti, judul, nama link, dll
				$data['title'] = "Tambah Data Bidang Usaha Perizinan Gangguan";
			
			
				$data['main_view'] = 'izin_sig/izin_sig_form';
				$data['form_action'] = site_url('izin_sig/tambah_bidang_usaha_process');
				$data['linkBack'] = site_url('perizinan');
				$data['button']	= 'Tambah Data';
				
				$validasi = $this->rekomendasi->get_all_data_by_id($id);
				if ($validasi > 0) {
					
					$datanya	= $this->rekomendasi->get_data_by_id($id);
					$no_reg = $datanya->no_reg;
					//untuk data pemohon
					
					$data['no_reg'] = $no_reg;
					
					$data['nm_pemohon'] = $datanya->nm_pemohon;
					$data['id_pemohon'] = $datanya->id_pemohon;
					$data['ktp_pemohon'] = $datanya->ktp_pemohon;
					$data['alm_pemohon'] = $datanya->alm_pemohon;
					$data['hp_pemohon'] = $datanya->hp_pemohon;
					$data['kecamatan'] = $datanya->kecamatan;
					
					//untuk badan usaha
					$data['atr_usaha'] = $datanya->atr_usaha;
					$data['id_bdnusaha'] = $datanya->id_bdnusaha;
					$data['nm_bdnusaha'] = $datanya->nm_bdnusaha;
					$data['alm_bdnusaha'] = $datanya->alm_bdnusaha;
					$data['jab_pengurus'] = $datanya->jab_pengurus;
					$data['noFax']	= $datanya->fax_bdnusaha;
					$data['tlp_bdnusaha'] = $datanya->tlp_bdnusaha;
					$data['id_kel']		= $datanya->id_kel;
					
					//untuk status usaha
					$sta_usaha = $this->referensi->get_all_stausaha()->result();
					foreach($sta_usaha as $row) {
						if ($datanya->id_stausaha == $row->id_stausaha) {
							$data['selected5'][$row->id_stausaha] = $datanya->id_stausaha;
						}
						$data['stausaha']['']	= "Pilih Status Usaha";
						$data['stausaha'][$row->id_stausaha] = $row->nm_stausaha;
					}
					
					$data['tgl_reg'] 	= $this->libraryku->tanggal($datanya->tgl_reg);				
					
					
					//untuk attribut usaha
					$attribut = $this->referensi->get_all_attribut()->result();
					foreach($attribut as $row) {
						if ($datanya->id_katusaha == $row->id_katusaha) {
							$data['selected6'][$row->id_katusaha] = $datanya->id_katusaha;
						}
						$data['katusaha']['']	= "Pilih Kategori Perusahaan";
						$data['katusaha'][$row->id_katusaha] = $row->nm_katusaha;
					}
					
					
					
					//kecamatan
					$kecamatan = $this->referensi->get_all_kecamatan()->result();
					foreach($kecamatan as $row)
					{
						if ($datanya->id_kec == $row->id_kec) {
							$data['selected1'][$row->id_kec] = $datanya->id_kec;
						}
						$data['kecamatans']['']	= "--Pilih Kecamatan--";
						$data['kecamatans'][$row->id_kec] = $row->nm_kec;
					}
					
					
					$kelurahan = $this->referensi->get_all_kelurahan()->result();
					foreach($kelurahan as $row)
					{
						if ($datanya->id_kel == $row->id_kel)
						{
							$data['selected'][$row->id_kel] = $datanya->id_kel;
						}
						$data['kelurahan']['']		= "Pilih Kelurahan";
						$data['kelurahan'][$row->id_kel] = $row->nm_kel;	
					}
					
					//Untuk Kegiatan Usaha
					$data['default']['kegUsaha'] = '';
					
					
					
					$data['default']['nomorRekomendasi'] = $datanya->no_reko;
					$data['default']['tglRekomendasi']	 = $datanya->tgl_reko;
					$data['default']['kapasitas']	= $datanya->kapasitas;
					$data['default']['tenagaKerja'] = $datanya->tenaker;
					$data['default']['luasTempatUsaha'] = $datanya->luas_usaha;
					$data['default']['golongan'] = $datanya->golusaha;
					$data['default']['mulai']	= $datanya->tgl_izin;
					
					
					//set sesi nya
					$this->session->set_userdata('id', $id);
					
					$this->load->view('template', $data);
					
					
				}
				
				else {
					echo "tidak bisa melakukan editing";
				}
					
				
			}
				
			else {
				echo "akses ditolak";
			}
				
				
				
				
				
				
				
			
			
		}
		
		
		
		function tambah_bidang_usaha_process()
		{
		
			if ($this->check() == TRUE) {
				$id = $this->session->userdata('id');
				//disini hanyalah melengkapi item item yang nantinya akan ditampilkan di halaman tambah data seperti, judul, nama link, dll
				$data['title'] = "Tambah Data Perizinan Gangguan";
			
			
				$data['main_view'] = 'izin_sig/izin_sig_form';
				$data['form_action'] = site_url('izin_sig/update_process');
				$data['linkBack'] = site_url('perizinan');
				$data['button']	= 'Update Data';
				
				$validasi = $this->rekomendasi->get_all_data_by_id($id);
				if ($validasi > 0) {
					
					$datanya	= $this->rekomendasi->get_data_by_id($id);
					$no_reg = $datanya->no_reg;
					//untuk data pemohon
					
					$data['no_reg'] = $no_reg;
					$jenis_reg = $datanya->jenis_reg;
					$data['nm_pemohon'] = $datanya->nm_pemohon;
					$data['id_pemohon'] = $datanya->id_pemohon;
					$data['ktp_pemohon'] = $datanya->ktp_pemohon;
					$data['alm_pemohon'] = $datanya->alm_pemohon;
					$data['hp_pemohon'] = $datanya->hp_pemohon;
					$data['kecamatan'] = $datanya->kecamatan;
					
					//untuk badan usaha
					$data['atr_usaha'] = $datanya->atr_usaha;
					$data['id_bdnusaha'] = $datanya->id_bdnusaha;
					$data['nm_bdnusaha'] = $datanya->nm_bdnusaha;
					$data['alm_bdnusaha'] = $datanya->alm_bdnusaha;
					$data['jab_pengurus'] = $datanya->jab_pengurus;
					$data['noFax']	= $datanya->fax_bdnusaha;
					$data['tlp_bdnusaha'] = $datanya->tlp_bdnusaha;
					$data['id_kel']		= $datanya->id_kel;
					
					//untuk status usaha
					$sta_usaha = $this->referensi->get_all_stausaha()->result();
					foreach($sta_usaha as $row) {
						if ($datanya->id_stausaha == $row->id_stausaha) {
							$data['selected5'][$row->id_stausaha] = $datanya->id_stausaha;
						}
						$data['stausaha']['']	= "Pilih Status Usaha";
						$data['stausaha'][$row->id_stausaha] = $row->nm_stausaha;
					}
					
					$data['tgl_reg'] 	= $this->libraryku->tanggal($datanya->tgl_reg);				
					
					
					//untuk attribut usaha
					$attribut = $this->referensi->get_all_attribut()->result();
					foreach($attribut as $row) {
						if ($datanya->id_katusaha == $row->id_katusaha) {
							$data['selected6'][$row->id_katusaha] = $datanya->id_katusaha;
						}
						$data['katusaha']['']	= "Pilih Kategori Perusahaan";
						$data['katusaha'][$row->id_katusaha] = $row->nm_katusaha;
					}
					
					
					
					//kecamatan
					$kecamatan = $this->referensi->get_all_kecamatan()->result();
					foreach($kecamatan as $row)
					{
						if ($datanya->id_kec == $row->id_kec) {
							$data['selected1'][$row->id_kec] = $datanya->id_kec;
						}
						$data['kecamatans']['']	= "--Pilih Kecamatan--";
						$data['kecamatans'][$row->id_kec] = $row->nm_kec;
					}
					
					
					$kelurahan = $this->referensi->get_all_kelurahan()->result();
					foreach($kelurahan as $row)
					{
						if ($datanya->id_kel == $row->id_kel)
						{
							$data['selected'][$row->id_kel] = $datanya->id_kel;
						}
						$data['kelurahan']['']		= "Pilih Kelurahan";
						$data['kelurahan'][$row->id_kel] = $row->nm_kel;	
					}
					
					//Untuk Kegiatan Usaha
					$data['default']['kegUsaha'] = '';
					
					
					$data['default']['nomorRekomendasi'] = $datanya->no_reko;
					$data['default']['tglRekomendasi']	 = $datanya->tgl_reko;
					$data['default']['kapasitas']	= $datanya->kapasitas;
					$data['default']['tenagaKerja'] = $datanya->tenaker;
					$data['default']['luasTempatUsaha'] = $datanya->luas_usaha;
					$data['default']['golongan'] = $datanya->golusaha;
					$data['default']['mulai']	= $datanya->tgl_izin;
					
					
					
					
					
					//ambil nilai dari inputannya
					//set form validation
				
					$this->form_validation->set_rules('nomorRekomendasi','Nomor Rekomendasi','required');
					$this->form_validation->set_rules('tglRekomendasi','Tanggal Rekomendasi','required');
					
					$this->form_validation->set_rules('tenagaKerja','Tenaga Kerja','required|numeric');	
					$this->form_validation->set_rules('luasTempatUsaha','Luas Tempat Usaha','required');
					
					$id_kbli = $this->input->post('kegiatanUsaha');
				
				
				
				//kalau validasi berhasil
				if ($this->form_validation->run() == TRUE)
				{
					
					
					$tgl_input= date('Y-m-d');
					
					$nomorRekomendasi 	= $this->input->post('nomorRekomendasi');
					
					//untuk data bidang usaha
					$id_bdnusaha	= $this->input->post('id_bdnusaha');
					$namaBadanUsaha= $this->input->post('namaBadanUsaha');
					
					$alamatBadanUsaha = $this->input->post('alamatBadanUsaha');
					$kelurahan	= $this->input->post('kelurahan');
					$jabatanPemohon = $this->input->post('jabatanPemohon');
					$tlp_bdnusaha	= $this->input->post('telpBadanUsaha');
					$noFax	= $this->input->post('noFax');
					$kecamatan = $this->input->post('kecamatan');
					$katusaha = $this->input->post('katusaha');
					$stausaha = $this->input->post('stausaha');
					$tglRekomendasi 	= $this->input->post('tglRekomendasi');
					$kapasitas			= $this->input->post('kapasitas');
					$tenagaKerja		= $this->input->post('tenagaKerja');
					$luas				= $this->input->post('luasTempatUsaha');
					$golongan = $this->input->post('golongan');
					$mulai 				= date('Y-m-d');
					$statusIzin			= 1;
				
				
					$kecamatan = substr($kecamatan,4,2);
					
					
					//untuk data pemohon
					$namaPemohon	= $this->input->post('namaPemohon');
					$alamatPemohon  = $this->input->post('alamatPemohon');
					$noHp	= $this->input->post('noHp');
					$idPemohon 	= $this->input->post('id_pemohon');
					//update data pemohon
					$dataPemohon = array(
						'nm_pemohon' => $namaPemohon,
						'alm_pemohon'=> $alamatPemohon,
						'hp_pemohon' => $noHp
					);
					
					
					#$this->rekomendasi->update_pemohon($idPemohon, $dataPemohon);
					
						
					//lalu update data badan usaha
					$dataBadanUsaha = array(
						'kel_bdnusaha'	=> $kelurahan,
						'nm_bdnusaha'	=> $namaBadanUsaha,
						'fax_bdnusaha'	=> $noFax,
						'alm_bdnusaha'	=> $alamatBadanUsaha,
						'tlp_bdnusaha'	=> $tlp_bdnusaha,
						'id_katusaha'	=> $katusaha,
						'id_stausaha'	=> $stausaha
					);
					#$this->rekomendasi->update_bdnusaha($id_bdnusaha,$dataBadanUsaha);
					
					
					
					$id_gol = $this->input->post('kegiatanUsaha');
				
					
						
						
						foreach($id_gol as $value) {
						
							$dataBidangUsaha = array(
								'no_izin'	=> $no_izin,
								'id_gol'	=> $value,
								'id_bdnusaha' => $id_bdnusaha
							);
							$this->rekomendasi->add_bidusaha($dataBidangUsaha);
						}
						
						
						$no_izin = $this->libraryku->kodeSIG($kecamatan,$jenis_reg);
						
						
						$dataRekomendasi = array(
							'no_izin' => $no_izin,
							'tgl_izin'	=> $mulai,
							'no_reg'	=> $no_reg,
							'id_stausaha'	=> $stausaha,
							'alm_bdnusaha' => $alamatBadanUsaha,
							'no_reko'	=> $nomorRekomendasi,
							'id_kel'	=> $kelurahan,
							'tlp_bdnusaha' => $tlp_bdnusaha,
							'fax_bdnusaha'	=> $noFax,
							'tgl_reko'	=> $tglRekomendasi,
							'kapasitas'	=> $kapasitas,
							'tenaker'	=> $tenagaKerja,
							'luas_usaha'=> $luas,
							'golusaha'	=> $golongan,
							'ptgs_input'=> $this->session->userdata('namaLengkap'),
							'tgl_input'	=> $tgl_input,
							'sta_izin'	=> $statusIzin
							
						);
						$this->rekomendasi->add($dataRekomendasi);
						
					
					
					$this->session->set_flashdata('sukses', 'Satu Data Surat Izin Gangguan telah berhasil ditambahkan');
					redirect('izin_sig/tampil');
				}
				
				else {
					$this->load->view('template', $data);
				}
					
					
				}
				
				else {
					echo "tidak bisa melakukan editing";
				}
					
				
			}
				
			else {
				echo "akses ditolak";
			}
				
				
				
				
				
				
				
			
			
		}
		
		
				
	}

?> 
