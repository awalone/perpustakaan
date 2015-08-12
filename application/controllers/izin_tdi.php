<?php




	class Izin_tdi extends CI_Controller
	{	
		function __construct()
		{
			parent::__construct();
			
			$this->load->model('Izin_tdi_model','izin',TRUE);
			$this->load->model('referensi_model','referensi', TRUE);
			$this->load->model('aksesmodule_model','akses',TRUE);
			$this->load->model('bidangusaha_model','bidang',TRUE);
			$this->load->library('libraryku');
			
		}
		var $title = 'izin_tdi';
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
	
		
		function tampil($offset=0)
		{
			if ($this->check() == TRUE) 
			{
				#hanya menampilkan data data registrasi yang berstatus 0 dan 1
				$data['title'] = "Data Perizinan Tanda Daftar Industri";
				$uri_segment = 3;
				
				$data['h2_title'] = 'Data Rekomendasi Izin Usaha Industri';
				$data['main_view'] = 'izin_tdi/izin_tdi';
				$data['search']	= site_url('izin_tdi/search_process');
				$data['link'] = site_url('izin_tdi/tampil');
				$data['form_action_cari'] = site_url('izin_tdi/hasil');
		
				$data['query'] = $this->izin->get_all($this->limit, $offset)->result();
				
				$data['jumlah'] = $this->izin->get_all_data();
				$config = array(
					'base_url'	=> site_url('izin_tdi/tampil'),
					'total_rows'=> $this->izin->get_all_data(),
					'per_page'	=> $this->limit,
					'uri_segment' => $uri_segment
				);
				$this->pagination->initialize($config);
				
				$data['pagination'] = $this->pagination->create_links();
				$data['button']	= 'Input Data';
				
				$this->load->view('template', $data);
			} else {
				redirect('login');
			}
		}
		
		function index($offset = 0) {
			if ($this->check() == TRUE) 
			{
				#hanya menampilkan data data registrasi yang berstatus 0 dan 1
				$data['title'] = "Data Registrasi Izin Tanda Daftar Industri";
				$uri_segment = 3;
				
				$data['h2_title'] = 'Data Rekomendasi TDI';
				$data['main_view'] = 'izin_tdi/daftar_registrasi';
				$data['search']	= site_url('izin_tdi/search_registrasi');
				$data['link'] = site_url('izin_tdi/add');
		
				$jumlah = $this->izin->get_all_data_registrasi();
				$data['query'] = $this->izin->get_all_registrasi($this->limit, $offset)->result();
				$data['jumlah'] = $jumlah;
				$config = array(
					'base_url'	=> site_url('izin_tdi/index'),
					'total_rows'=> $this->izin->get_all_data_registrasi(),
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
		
		
		function search_process($offset=0) {
			if ($this->check() == TRUE) 
			{
				#hanya menampilkan data data registrasi yang berstatus 0 dan 1
				$keyword = $this->libraryku->cekinput($this->input->post('keyword'));
				$data['title'] = "Pencarian Data Perizinan Tanda Daftar Industri";
				$data['h2_title'] = 'Data Rekomendasi Izin Usaha Industri';
				$data['main_view'] = 'izin_tdi/izin_tdi';
				$data['search']	= site_url('izin_tdi/search_process');
				$data['link'] = site_url('izin_tdi/add');
				$data['query'] = $this->izin->get_all_by_id($keyword)->result();
			
				
				$jumlah = $this->izin->get_all_data($keyword);
				
				if ($jumlah > 0) {
					$data['found'] = "ditemukan sebanyak $jumlah data dengan keyword $keyword";
				}
				else {
					$data['notfound']	= "Data Tidak Ditemukan !";
					$this->session->set_flashdata('notfound', 'data tidak ditemukan');
				}
				$data['jumlah'] = $jumlah;
				
				$data['pagination']	= "";
				$data['back']	= site_url('izin_tdi/tampil');
				
				$this->load->view('template', $data);
			} else {
				redirect('login');
			}
		}
		
		function search_registrasi($offset=0) {
		if ($this->check() == TRUE) 
			{
				#hanya menampilkan data data registrasi yang berstatus 0 dan 1
				$keyword = $this->libraryku->cekinput($this->input->post('keyword'));
				$data['title'] = "Pencarian Data Registrasi Izin Tanda Daftar Industri";
				$data['h2_title'] = 'Data Rekomendasi Tanda Daftar Industri';
				$data['main_view'] = 'izin_tdi/daftar_registrasi';
				$data['search']	= site_url('izin_tdi/search_registrasi');
				$data['link'] = site_url('izin_tdi/add');
				$data['query'] = $this->izin->get_all_registrasi_by_id($keyword)->result();
			
				
				$jumlah = $this->izin->get_all_data_registrasi($keyword);
				if ($jumlah > 0) {
					$data['found'] = "ditemukan sebanyak $jumlah data dengan keyword $keyword";
				}
				else {
					$data['notfound']	= "Data Tidak Ditemukan !";
					$this->session->set_flashdata('notfound', 'data tidak ditemukan');
				}
				$data['jumlah'] = $jumlah;
				
				$data['pagination']	= "";
				$data['back']	= site_url('izin_tdi');
				
				$this->load->view('template', $data);
			}
			else {
				redirect('login');
			}
		}
		
		
		
		
		//fungsi untuk tambah data
		function add($id)
		{
			
			if ($this->check() == TRUE) 
			{
				//disini hanyalah melengkapi item item yang nantinya akan ditampilkan di halaman tambah data seperti, judul, nama link, dll
				$data['title'] = "Tambah Data Izin Tanda Daftar Industri";
				$data['h2_title'] = 'Data izinbangunan > Edit Data izinbangunan'; 
			
				$data['main_view'] = 'izin_tdi/izin_tdi_form.php';
				$data['form_action'] = site_url('izin_tdi/add_process');
				$data['linkBack'] = site_url('perizinan');
				$data['button']	= 'Update Data';
				
				$data['default']['kegUsaha'] = '';
				$id = $this->enkrip->decode($id);
				$jum = $this->izin->get_all_data_izin_by_registrasi($id);
				if ($jum > 0) {
					
				
					$dataIzin = $this->izin->get_data_izin_by_registrasi($id);
					
					//Untuk Kegiatan Usaha
					$dataKegiatanUsaha = $this->izin->get_kegiatan_usaha_by_izin($dataIzin->no_izin);
					foreach($dataKegiatanUsaha->result() as $kegiatan)
					{
						//echo $bidang->nm_gol;
						$data['default']['kegUsaha'] .= "<div id=\"".$kegiatan->nm_kbli.$kegiatan->id_kbli."_id\" class=\"idBidangUsaha\">
						    ".$kegiatan->nm_kbli."<a class=\"closeTag\" onclick=\"parentNode.remove()\">X</a>
					    <input type=\"hidden\" name=\"kegiatanUsaha[]\" value=\"".$kegiatan->id_kbli."\"></input></div>";
					}
					
					$data['default']['nomorRekomendasi'] = $dataIzin->no_reko;
					$data['default']['tglRekomendasi']	 = $dataIzin->tgl_reko;
					$data['default']['investasi']	= $dataIzin->investasi;
					$data['default']['kapasitasProduksi'] = $dataIzin->kap_prod;
					$data['default']['jumlahTenagaKerja'] = $dataIzin->tenaker;
					
					//untuk data status izin
					$statusIzin = array('1' => 'Normal/Berlaku', '2' => 'Tidak Berlaku/Belum Diperbaharui / Belum Diperpanjang', '3' => 'Dikenai Sanksi / dibekukan', '4' => 'Ditutup/Dicabut');
					foreach($statusIzin as $row => $value) {
							if ($dataIzin->sta_izin == $row) {
								$data['selected2'][$row] = $dataIzin->sta_izin;
							}
							$data['status'][$row] = $value;
					}
					$data['noIzin'] = $dataIzin->no_izin;
					//untuk data status usaha
					$stausaha = $this->izin->get_all_stausaha()->result();
					foreach($stausaha as $row) 
					{
						$data['stausaha']['']	= "--Pilih Status Usaha--";
						$data['stausaha'][$row->id_stausaha] = $row->nm_stausaha;
					}
					
					
					
				}
				
				else {
					//untuk data status usaha
					$stausaha = $this->izin->get_all_stausaha()->result();
					foreach($stausaha as $row) 
					{
						$data['stausaha']['']	= "--Pilih Status Usaha--";
						$data['stausaha'][$row->id_stausaha] = $row->nm_stausaha;
					}
					
				}
				
				
				$datanya	= $this->izin->get_data_registrasi_by_id($id);
				$no_reg = $datanya->no_reg;
				
				
				
				
				
				
				$datanya	= $this->izin->get_data_registrasi_by_id($id);
				$no_reg = $datanya->no_reg;
				
				//untuk data pemohon
				
				$data['no_reg'] = $no_reg;
				$data['id_pemohon'] = $datanya->id_pemohon;
				$data['nm_pemohon'] = $datanya->nm_pemohon;
				$data['ktp_pemohon'] = $datanya->ktp_pemohon;
				$data['alm_pemohon'] = $datanya->alm_pemohon;
				$data['hp_pemohon'] = $datanya->hp_pemohon;
				$jenis_reg = $datanya->jenis_reg;
				//untuk badan usaha
				$data['atr_usaha'] = $datanya->atr_usaha;
				$data['id_bdnusaha'] = $datanya->id_bdnusaha;
				$data['nm_bdnusaha'] = $datanya->nm_bdnusaha;
				$data['alm_bdnusaha'] = $datanya->alm_bdnusaha;
				$data['jab_pengurus'] = $datanya->jab_pengurus;
				$data['tlp_bdnusaha'] = $datanya->tlp_bdnusaha;
				$data['noFax']	= $datanya->fax_bdnusaha;
				
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
				
				//untuk kelurahan
				$kelurahan = $this->izin->get_all_kelurahan()->result();
				foreach($kelurahan as $row)
				{
					if ($datanya->id_kel == $row->id_kel)
					{
						$data['selected'][$row->id_kel] = $datanya->id_kel;
					}
					$data['kelurahan']['']		= "Pilih Kelurahan";
					$data['kelurahan'][$row->id_kel] = $row->nm_kel;	
				}
				
				
				
				$data['tlp_bdnusaha'] = $datanya->tlp_bdnusaha;
				$data['noFax']	= $datanya->fax_bdnusaha;
				$data['npwp']	= $datanya->npwp;
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
			if ($this->check() == TRUE) 
			{
				//disini hanyalah melengkapi item item yang nantinya akan ditampilkan di halaman tambah data seperti, judul, nama link, dll
				$data['title'] = "Tambah Data Izin Tanda Daftar Industri";
				
				$data['main_view'] = 'izin_tdi/izin_tdi_form.php';
				$data['form_action'] = site_url('izin_tdi/add_process');
				$data['linkBack'] = site_url('perizinan');
				$data['button']	= 'Update Data';
				
				$data['default']['kegUsaha'] = '';
				
				$id = $this->session->userdata('idRegistrasi');
				$jum = $this->izin->get_all_data_izin_by_registrasi($id);
				if ($jum > 0) {
					
				
					$dataIzin = $this->izin->get_data_izin_by_registrasi($id);
					
					$data['default']['nomorRekomendasi'] = $dataIzin->no_reko;
					$data['default']['tglRekomendasi']	 = $dataIzin->tgl_reko;
					$data['default']['investasi']	= $dataIzin->investasi;
					$data['default']['kapasitasProduksi'] = $dataIzin->kap_prod;
					$data['default']['jumlahTenagaKerja'] = $dataIzin->tenaker;
					
					//untuk data status izin
					$statusIzin = array('1' => 'Normal/Berlaku', '2' => 'Tidak Berlaku/Belum Diperbaharui / Belum Diperpanjang', '3' => 'Dikenai Sanksi / dibekukan', '4' => 'Ditutup/Dicabut');
					foreach($statusIzin as $row => $value) {
							if ($dataIzin->sta_izin == $row) {
								$data['selected2'][$row] = $dataIzin->sta_izin;
							}
							$data['status'][$row] = $value;
					}
					$data['noIzin'] = $dataIzin->no_izin;
					//untuk data status usaha
					$stausaha = $this->izin->get_all_stausaha()->result();
					foreach($stausaha as $row) 
					{
						$data['stausaha']['']	= "--Pilih Status Usaha--";
						$data['stausaha'][$row->id_stausaha] = $row->nm_stausaha;
					}
					
					
					
				}
				
				else {
					//untuk data status usaha
					$stausaha = $this->izin->get_all_stausaha()->result();
					foreach($stausaha as $row) 
					{
						$data['stausaha']['']	= "--Pilih Status Usaha--";
						$data['stausaha'][$row->id_stausaha] = $row->nm_stausaha;
					}
					//untuk data status izin
					$statusIzin = array('1' => 'Normal/Berlaku', '2' => 'Tidak Berlaku/Belum Diperbaharui / Belum Diperpanjang', '3' => 'Dikenai Sanksi / dibekukan', '4' => 'Ditutup/Dicabut');
					foreach($statusIzin as $row => $value) {
							$data['status'][$row] = $value;
					}
					
				}
				
				
				
				
				
				$id = $this->session->userdata('idRegistrasi');
				$datanya	= $this->izin->get_data_registrasi_by_id($id);
				$no_reg = $datanya->no_reg;
				//untuk data pemohon
				
				$data['no_reg'] = $no_reg;
				$data['id_pemohon'] = $datanya->id_pemohon;
				$data['nm_pemohon'] = $datanya->nm_pemohon;
				$data['ktp_pemohon'] = $datanya->ktp_pemohon;
				$data['alm_pemohon'] = $datanya->alm_pemohon;
				$data['hp_pemohon'] = $datanya->hp_pemohon;
				
				$jenis_reg = $datanya->jenis_reg;
				
				//untuk badan usaha
				$data['atr_usaha'] = $datanya->atr_usaha;
				$data['id_bdnusaha'] = $datanya->id_bdnusaha;
				$data['nm_bdnusaha'] = $datanya->nm_bdnusaha;
				$data['alm_bdnusaha'] = $datanya->alm_bdnusaha;
				$data['jab_pengurus'] = $datanya->jab_pengurus;
				
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
				
				
				
				$data['tlp_bdnusaha'] = $datanya->tlp_bdnusaha;
				$data['noFax']	= $datanya->fax_bdnusaha;
				$data['npwp']	= $datanya->npwp;
				//mengeset validasinya
				
				$this->form_validation->set_rules('tglRekomendasi','Tanggal Rekomendasi','required');
				$this->form_validation->set_rules('kapasitasProduksi','Kapasitas Produksi','required');
				$this->form_validation->set_rules('jumlahTenagaKerja','Jumlah Tenaga Kerja','required');
				$this->form_validation->set_rules('investasi','Investasi','required');
				
				
				
				
				if ($this->form_validation->run() == TRUE)
				{
					//DATA KBLI	
					$no_izin = $this->input->post('noIzin');
					$id_kbli = $this->input->post('kegiatanUsaha');
					$cek = $this->izin->cek_kegiatan_usaha_by_no_izin($no_izin);
					if($cek == TRUE)
						$this->izin->delete_kegiatan_usaha($no_izin);
						foreach($id_kbli as $value) {
							$dataKegiatanUsaha = array(
								'no_izin'	=> $no_izin,
								'id_kbli'	=> $value
							);
						$this->izin->add_kegiatan_usaha($dataKegiatanUsaha);
						}
					
				
					//untuk data pemohon
					$noKtp = $this->input->post('noKTP');
					$namaPemohon = $this->input->post('namaPemohon');
					$alamatPemohon = $this->input->post('alamatPemohon');
					$noHp		= $this->input->post('noHp');
					$idPemohon 	= $this->input->post('id_pemohon');
					
					//untuk data badan usaha
					$id_bdnusaha	= $this->input->post('id_bdnusaha');
					$namaBadanUsaha	= $this->input->post('namaBadanUsaha');
					$npwp			= $this->input->post('npwp');
					$alamatBadanUsaha = $this->input->post('alamatBadanUsaha');
					$kecamatan = $this->input->post('kecamatan');
					$kelurahan	= $this->input->post('kelurahan');
					$tlp_bdnusaha	= $this->input->post('telpBadanUsaha');
					$fax		= $this->input->post('fax');
					
					//untuk data perizinan
					$nomorRegistrasi = $this->session->userdata('idRegistrasi');
					$nomorizin = $this->input->post('nomorRekomendasi');
					$tglizin	= $this->input->post('tglizin');
					$tglRekomendasi	= $this->input->post('tglRekomendasi');
					$investasi	= $this->input->post('investasi');
					$kapasitas 	= $this->input->post('kapasitasProduksi');
					$jumlahTenagaKerja = $this->input->post('jumlahTenagaKerja');
					$statusIzin = $this->input->post('statusIzin');
					$keterangan = $this->input->post('keterangan');
					$katusaha = $this->input->post('katusaha');
					$stausaha = $this->input->post('stausaha');
					$kecamatan = substr($kecamatan,4,2);
					
					//untuk data tbl_bidusaha
					$id_gol = $this->input->post('id_gol');
					
					
					$dataBadanUsaha = array(
						'npwp'			=> $npwp,
						'alm_bdnusaha'	=> $alamatBadanUsaha,
						'kel_bdnusaha'	=> $kelurahan,
						'tlp_bdnusaha'	=> $tlp_bdnusaha,
						'fax_bdnusaha'	=> $fax,
						'id_katusaha'	=> $katusaha,
						'id_stausaha'	=> $stausaha
					);
					//trus update juga data badan usaha
					$this->izin->update_bdnusaha($id_bdnusaha,$dataBadanUsaha);
					
					
					
					if ($this->input->post('noIzin') != "") {
						$noIzin = $this->input->post('noIzin');
						$dataIzin = array(
							'tgl_izin'	=> date('Y-m-d'),
							'no_reg'	=> $nomorRegistrasi,
							'id_stausaha'	=> $stausaha,
							'alm_bdnusaha'	=> $alamatBadanUsaha,
							'id_kel'		=> $kelurahan,
							'tlp_bdnusaha'	=> $tlp_bdnusaha,
							'fax_bdnusaha'	=> $fax,
							'no_reko'		=> $nomorizin,
							'tgl_reko'		=> $tglRekomendasi,
							'investasi'		=> $investasi,
							'kap_prod'		=> $kapasitas,
							'tenaker'		=> $jumlahTenagaKerja,
							'ptgs_input'	=> $this->session->userdata('namaLengkap'),
							'sta_izin'		=> '1',
							'ket_izin'		=> $keterangan
						);
						$this->izin->update($noIzin, $dataIzin);
					}
					else {
						$noIzin =  $this->libraryku->kodeTDI($kecamatan,$jenis_reg);
						
						$dataIzin = array(
							'no_izin'	=> $noIzin,
							'tgl_izin'	=> date('Y-m-d'),
							'no_reg'	=> $nomorRegistrasi,
							'id_stausaha'	=> $stausaha,
							'alm_bdnusaha'	=> $alamatBadanUsaha,
							'id_kel'		=> $kelurahan,
							'tlp_bdnusaha'	=> $tlp_bdnusaha,
							'fax_bdnusaha'	=> $fax,
							'no_reko'		=> $nomorizin,
							'tgl_reko'		=> $tglRekomendasi,
							'investasi'		=> $investasi,
							'kap_prod'		=> $kapasitas,
							'tenaker'		=> $jumlahTenagaKerja,
							'ptgs_input'	=> $this->session->userdata('namaLengkap'),
							'sta_izin'		=> '1',
							'ket_izin'		=> $keterangan
						);
						$this->izin->add($dataIzin);
					}
					
					
					
					
					
					$dataRegistrasi = array(
						'status_reg' => 1
					);
					$this->izin->update_registrasi($nomorRegistrasi, $dataRegistrasi);
					
					$this->session->set_flashdata('sukses', 'Satu Data Perizinan Industri telah berhasil ditambahkan');
					redirect('izin_tdi');
				}
			
				else
				{
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
			if ($this->check() == TRUE) {
				$id = $this->enkrip->decode($id);
				
				//disini hanyalah melengkapi item item yang nantinya akan ditampilkan di halaman tambah data seperti, judul, nama link, dll
				$data['title'] = "Ubah Data Perizinan Gangguan";
			
			
				$data['main_view'] = 'izin_tdi/izin_tdi_form';
				$data['form_action'] = site_url('izin_tdi/update_process');
				$data['linkBack'] = site_url('perizinan');
				$data['button']	= 'Update Data';
				
				$validasi = $this->izin->get_all_data_by_id($id);
				
				if ($validasi > 0) {
					
					$datanya	= $this->izin->get_data_by_id($id);
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
					$dataKegiatanUsaha = $this->izin->get_kegiatan_usaha_by_izin($id);
					foreach($dataKegiatanUsaha->result() as $kegiatan)
					{
					
						$data['default']['kegUsaha'] .= "<div id=\"".$kegiatan->nm_kbli.$kegiatan->id_kbli."_id\" class=\"idBidangUsaha\">
						    ".$kegiatan->nm_kbli."<a class=\"closeTag\" onclick=\"parentNode.remove()\">X</a>
					    <input type=\"hidden\" name=\"kegiatanUsaha[]\" value=\"".$kegiatan->id_kbli."\"></input></div>";
					}
					
					
					$data['default']['nomorRekomendasi'] = $datanya->no_reko;
					$data['default']['tglRekomendasi']	 = $datanya->tgl_reko;
					$data['default']['investasi']		 = $datanya->investasi;
					$data['default']['jumlahTenagaKerja'] = $datanya->tenaker;
					$data['default']['kapasitasProduksi'] = $datanya->kap_prod;
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
			
			
				$data['main_view'] = 'izin_tdi/izin_tdi_form';
				$data['form_action'] = site_url('izin_tdi/update_process');
				$data['linkBack'] = site_url('perizinan');
				$data['button']	= 'Update Data';
				
				$validasi = $this->izin->get_all_data_by_id($id);
				if ($validasi > 0) {
					
					$datanya	= $this->izin->get_data_by_id($id);
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
					$dataKegiatanUsaha = $this->izin->get_kegiatan_usaha_by_izin($id);
					foreach($dataKegiatanUsaha->result() as $kegiatan)
					{
					
						$data['default']['kegUsaha'] .= "<div id=\"".$kegiatan->nm_kbli.$kegiatan->id_kbli."_id\" class=\"idBidangUsaha\">
						    ".$kegiatan->nm_kbli."<a class=\"closeTag\" onclick=\"parentNode.remove()\">X</a>
					    <input type=\"hidden\" name=\"kegiatanUsaha[]\" value=\"".$kegiatan->id_kbli."\"></input></div>";
					}
					
					
					$data['default']['nomorRekomendasi'] = $datanya->no_reko;
					$data['default']['tglRekomendasi']	 = $datanya->tgl_reko;
					$data['default']['investasi']	= $datanya->investasi;
					$data['default']['kapasitasProduksi'] = $datanya->kap_prod;
					$data['default']['jumlahTenagaKerja'] = $datanya->tenaker;
					
					$data['default']['mulai']	= $datanya->tgl_izin;
					
					
					
					
					
					//ambil nilai dari inputannya
					//set form validation
				
				$this->form_validation->set_rules('nomorRekomendasi','Nomor Rekomendasi','required');
				$this->form_validation->set_rules('tglRekomendasi','Tanggal Rekomendasi','required');
				
				$this->form_validation->set_rules('jumlahTenagaKerja','Tenaga Kerja','required|numeric');	
				
				
				
				$id_kbli = $this->input->post('kegiatanUsaha');
				
				
				
				//kalau validasi berhasil
				if ($this->form_validation->run() == TRUE)
				{
					
					
					$tgl_input= date('Y-m-d');
					
					
					
					
					
					$nomorRekomendasi 	= $this->input->post('nomorRekomendasi');
					$noHp	= $this->input->post('noHp');
					$idPemohon 	= $this->input->post('id_pemohon');
					
					//untuk data bidang usaha
					$id_bdnusaha	= $this->input->post('id_bdnusaha');
					$namaBadanUsaha = $this->input->post('namaBadanUsaha');
					$alamatBadanUsaha = $this->input->post('alamatBadanUsaha');
					$kelurahan	= $this->input->post('kelurahan');
					$jabatanPemohon = $this->input->post('jabatanPemohon');
					$tlp_bdnusaha	= $this->input->post('telpBadanUsaha');
					$noFax	= $this->input->post('fax');
					$kecamatan = $this->input->post('kecamatan');
					$katusaha = $this->input->post('katusaha');
					$stausaha = $this->input->post('stausaha');
					$tglRekomendasi 	= $this->input->post('tglRekomendasi');
					$investasi	= $this->input->post('investasi');
					$kapasitasProduksi	= $this->input->post('kapasitasProduksi');
					$jumlahTenagaKerja = $this->input->post('jumlahTenagaKerja');
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
					
					
					$this->izin->update_pemohon($idPemohon, $dataPemohon);
					
									
					//lalu update data badan usaha
					$dataBadanUsaha = array(
						'nm_bdnusaha'	=> $namaBadanUsaha,
						'kel_bdnusaha'	=> $kelurahan,
						'fax_bdnusaha'	=> $noFax,
						'alm_bdnusaha'	=> $alamatBadanUsaha,
						'tlp_bdnusaha'	=> $tlp_bdnusaha,
						'id_katusaha'	=> $katusaha,
						'id_stausaha'	=> $stausaha
					);
					$this->izin->update_bdnusaha($id_bdnusaha,$dataBadanUsaha);
					
					
					
					$id_gol = $this->input->post('kegiatanUsaha');
				
				
									
						//lakukan update
						
						$cek = $this->bidang->cek_bidang_usaha_by_no_izin($id);
					
						if($cek == TRUE) {
							
							$this->bidang->delete_bidang_usaha($id);
						}
						
						foreach($id_gol as $value) {
						
							$dataBidangUsaha = array(
								'no_izin'	=> $id,
								'id_kbli'	=> $value
							);
							$this->izin->add_kegiatan_usaha($dataBidangUsaha);
						}
						
						
						$dataRekomendasi = array(
							'alm_bdnusaha' => $alamatBadanUsaha,
							'no_reko'	=> $nomorRekomendasi,
							'id_kel'	=> $kelurahan,
							'tlp_bdnusaha' => $tlp_bdnusaha,
							'fax_bdnusaha'	=> $noFax,
							'tgl_reko'	=> $tglRekomendasi,
							'investasi'	=> $investasi,
							'kap_prod'	=> $kapasitasProduksi,
							'tenaker'	=> $jumlahTenagaKerja,
							'ptgs_input'=> $this->session->userdata('namaLengkap'),
							'tgl_input'	=> $tgl_input,
							'sta_izin'	=> $statusIzin
							
						);
						$this->izin->update($id, $dataRekomendasi);
						
					
					
					$this->session->set_flashdata('sukses', 'Satu Data Surat Izin Tanda Industri telah berhasil diubah');
					redirect('izin_tdi/tampil');
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
