<?php




	class izin_tdp extends CI_Controller
	{	
		function __construct()
		{
			parent::__construct();
			
			$this->load->model('bidangusaha_model','bidang',TRUE);
			$this->load->model('izin_tdp_model','rekomendasi',TRUE);
			$this->load->model('referensi_model','referensi', TRUE);
			$this->load->model('aksesmodule_model','akses',TRUE);
			$this->load->library('libraryku');
			
		}
		var $title = 'izin_tdp';
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
	
		
		function pilih($offset=0)
		{
			if ($this->check() == TRUE) 
			{
				#hanya menampilkan data data registrasi yang berstatus 0 dan 1
				$data['title'] = "Data Registrasi Perizinan Tanda Daftar Perusahaan";
				$uri_segment = 3;
				
				$data['h2_title'] = 'Data Rekomendasi IUP';
				$data['main_view'] = 'izin_tdp/izin_tdp';
				$data['search']	= site_url('izin_tdp/search_process');
				$data['link'] = site_url('izin_tdp/pilih');
				$data['form_action_cari'] = site_url('izin_tdp/hasil');
		
				$data['query'] = $this->rekomendasi->get_all($this->limit, $offset)->result();
				
				$data['jumlah'] = $this->rekomendasi->get_all_data();
				$config = array(
					'base_url'	=> site_url('izin_tdp/pilih'),
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
				$data['title'] = "Data Perizinan Usaha Industri";
				$uri_segment = 3;
				
				$data['h2_title'] = 'Data Rekomendasi TDP';
				$data['main_view'] = 'izin_tdp/daftar_registrasi';
				$data['search']	= site_url('izin_tdp/search_registrasi');
				$data['link'] = site_url('izin_tdp/add');
		
				$jumlah = $this->rekomendasi->get_all_data_registrasi();
				$data['query'] = $this->rekomendasi->get_all_registrasi($this->limit, $offset)->result();
				$data['jumlah'] = $jumlah;
				$config = array(
					'base_url'	=> site_url('izin_tdp/index'),
					'total_rows'=> $this->rekomendasi->get_all_data_registrasi(),
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
		
		
		
		function search_registrasi($offset=0) {
			if ($this->check() == TRUE) 
			{
				#hanya menampilkan data data registrasi yang berstatus 0 dan 1
				$keyword = $this->libraryku->cekinput($this->input->post('keyword'));
				$data['title'] = "Pencarian Registrasi Tanda Daftar Perusahaan";
				$data['main_view'] = 'izin_tdp/daftar_registrasi';
				$data['search']	= site_url('izin_tdp/search_registrasi');
				$data['link'] = site_url('izin_tdp/add');
				$data['query'] = $this->rekomendasi->get_all_registrasi_by_id($keyword)->result();
			
				
				$jumlah = $this->rekomendasi->get_all_data_registrasi($keyword);
				if ($jumlah > 0) {
					$data['found'] = "ditemukan sebanyak $jumlah data dengan keyword $keyword";
				}
				else {
					$data['notfound']	= "Data Tidak Ditemukan !";
					$this->session->set_flashdata('notfound', 'data tidak ditemukan');
				}
				$data['jumlah'] = $jumlah;
				
				$data['pagination']	= "";
				$data['back']	= site_url('izin_tdp');
				
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
				$data['title'] = "Pencarian Data Perizinan Tanda Daftar Perusahaan";
				$data['main_view'] = 'izin_tdp/izin_tdp';
				$data['search']	= site_url('izin_tdp/search_process');
				$data['link'] = site_url('izin_tdp/add');
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
				$data['back']	= site_url('izin_tdp/pilih');
				
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
				$data['title'] = "Tambah Data Perizinan Tanda Daftar Perusahaan";
				$data['main_view'] = 'izin_tdp/izin_tdp_form.php';
				$data['form_action'] = site_url('izin_tdp/add_process');
				$data['linkBack'] = site_url('perizinan');
				$data['button']	= 'Update Data';
				
				$id = $this->enkrip->decode($id);
				$data['default']['kegUsaha'] = '';
				$jum = $this->rekomendasi->get_all_data_izin_by_registrasi($id);
				
				if ($jum > 0) {
					
					$dataIzin = $this->rekomendasi->get_data_izin_by_registrasi($id);
					//Untuk Kegiatan Usaha
					$dataKegiatanUsaha = $this->rekomendasi->get_kegiatan_usaha_by_izin($dataIzin->no_izin);
					foreach($dataKegiatanUsaha->result() as $kegiatan)
					{
						$data['default']['kegUsaha'] .= "<div id=\"".$kegiatan->nm_kbli.$kegiatan->id_kbli."_id\" class=\"idBidangUsaha\">
						    ".$kegiatan->nm_kbli."<a class=\"closeTag\" onclick=\"parentNode.remove()\">X</a>
					    <input type=\"hidden\" name=\"kegiatanUsaha[]\" value=\"".$kegiatan->id_kbli."\"></input></div>";
					}
					
					
					
					$data['default']['nomorRekomendasi'] = $dataIzin->no_reko;
					$data['default']['tglRekomendasi']	 = $dataIzin->tgl_reko;
					$data['default']['noTdp']	= $dataIzin->no_tdp;
					$data['default']['pembaharuan'] = $dataIzin->jml_her;
					
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
				}
				
				
				
				
				
				
				
				$datanya	= $this->rekomendasi->get_data_registrasi_by_id($id);
				$no_reg = $datanya->no_reg;
				//untuk data pemohon
				
				$data['no_reg'] = $no_reg;
				$data['jenis_reg']	= $datanya->jenis_reg;
				$data['id_pemohon'] = $datanya->id_pemohon;
				$data['nm_pemohon'] = $datanya->nm_pemohon;
				$data['ktp_pemohon'] = $datanya->ktp_pemohon;
				$data['alm_pemohon'] = $datanya->alm_pemohon;
				$data['hp_pemohon'] = $datanya->hp_pemohon;
				
				//untuk badan usaha
				$data['atr_usaha'] = $datanya->atr_usaha;
				$data['id_bdnusaha'] = $datanya->id_bdnusaha;
				$data['nm_bdnusaha'] = $datanya->nm_bdnusaha;
				$data['alm_bdnusaha'] = $datanya->alm_bdnusaha;
				$data['jab_pengurus'] = $datanya->jab_pengurus;
				//untuk attribut usaha
				$attribut = $this->referensi->get_all_attribut()->result();
				foreach($attribut as $row) {
					if ($datanya->id_katusaha == $row->id_katusaha) {
						$data['selected6'][$row->id_katusaha] = $datanya->id_katusaha;
					}
					$data['katusaha']['']	= "Pilih Kategori Perusahaan";
					$data['katusaha'][$row->id_katusaha] = $row->nm_katusaha;
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
				$kelurahan = $this->rekomendasi->get_all_kelurahan()->result();
				foreach($kelurahan as $row)
				{
					if ($datanya->id_kel == $row->id_kel)
					{
						$data['selected'][$row->id_kel] = $datanya->id_kel;
					}
					$data['kelurahan']['']		= "Pilih Kelurahan";
					$data['kelurahan'][$row->id_kel] = $row->nm_kel;	
				}
				
				
				$data['telpBadanUsaha'] = $datanya->tlp_bdnusaha;
				$data['fax']	= $datanya->fax_bdnusaha;
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
				$data['title'] = "Tambah Data Perizinan Tanda Daftar Perusahaan";
				$data['h2_title'] = 'Data izin_tdp > Edit Data izin_tdp'; 
			
				$data['main_view'] = 'izin_tdp/izin_tdp_form.php';
				$data['form_action'] = site_url('izin_tdp/add_process');
				$data['linkBack'] = site_url('perizinan');
				$data['button']	= 'Update Data';
				
				$id = $this->session->userdata('idRegistrasi');
				$jum = $this->rekomendasi->get_all_data_izin_by_registrasi($id);
				
				if ($jum > 0) {
					
				
					$dataIzin = $this->rekomendasi->get_data_izin_by_registrasi($id);
					
					
					
					$data['default']['nomorRekomendasi'] = $dataIzin->no_reko;
					$data['default']['tglRekomendasi']	 = $dataIzin->tgl_reko;
					$data['default']['noTdp']	= $dataIzin->no_tdp;
					$data['default']['pembaharuan'] = $dataIzin->jml_her;
					
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
				}
				
				
				
				
				
				
				$id = $this->session->userdata('idRegistrasi');
				$datanya	= $this->rekomendasi->get_data_registrasi_by_id($id);
				$no_reg = $datanya->no_reg;
				//untuk data pemohon
				
				$data['no_reg'] = $no_reg;
				$data['id_pemohon'] = $datanya->id_pemohon;
				$data['nm_pemohon'] = $datanya->nm_pemohon;
				$data['ktp_pemohon'] = $datanya->ktp_pemohon;
				$data['alm_pemohon'] = $datanya->alm_pemohon;
				$data['hp_pemohon'] = $datanya->hp_pemohon;
				$jenis_reg	= $datanya->jenis_reg;
				
				//untuk badan usaha
				$data['atr_usaha'] = $datanya->atr_usaha;
				$data['id_bdnusaha'] = $datanya->id_bdnusaha;
				$data['nm_bdnusaha'] = $datanya->nm_bdnusaha;
				$data['alm_bdnusaha'] = $datanya->alm_bdnusaha;
				$data['jab_pengurus'] = $datanya->jab_pengurus;
				//untuk attribut usaha
				$attribut = $this->referensi->get_all_attribut()->result();
				foreach($attribut as $row) {
					if ($datanya->id_katusaha == $row->id_katusaha) {
						$data['selected6'][$row->id_katusaha] = $datanya->id_katusaha;
					}
					$data['katusaha']['']	= "Pilih Kategori Perusahaan";
					$data['katusaha'][$row->id_katusaha] = $row->nm_katusaha;
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
				$kelurahan = $this->rekomendasi->get_all_kelurahan()->result();
				foreach($kelurahan as $row)
				{
					if ($datanya->id_kel == $row->id_kel)
					{
						$data['selected'][$row->id_kel] = $datanya->id_kel;
					}
					$data['kelurahan']['']		= "Pilih Kelurahan";
					$data['kelurahan'][$row->id_kel] = $row->nm_kel;	
				}
				
				
				$data['telpBadanUsaha'] = $datanya->tlp_bdnusaha;
				$data['fax']	= $datanya->fax_bdnusaha;
				$data['npwp']	= $datanya->npwp;
				//mengeset validasinya
				$this->form_validation->set_rules('nomorRekomendasi','Nomor Rekomendasi','required');
				$this->form_validation->set_rules('noTdp','Nomor TDP','required');
				$this->form_validation->set_rules('pembaharuan','Pembaharuan','required');
				$this->form_validation->set_rules('tglRekomendasi','Tanggal Rekomendasi','required');
				
			
				if ($this->form_validation->run() == TRUE)
				{
				
				
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
					$katusaha = $this->input->post('katusaha');
					
					//untuk data perizinan
					$nomorRegistrasi = $this->input->post('nomorRegistrasi');
					$nomorRekomendasi = $this->input->post('nomorRekomendasi');
					$tglRekomendasi	= $this->input->post('tglRekomendasi');
					$pembaharuan = $this->input->post('pembaharuan');
					$noTdp		= $this->input->post('noTdp');
					$statusIzin = $this->input->post('statusIzin');
					$keterangan = $this->input->post('keterangan');
					
						$kecamatan = substr($kecamatan,4,2);
					
					//untuk data tbl_bidusaha
					$id_gol = $this->input->post('id_gol');
					
					
					$dataPemohon = array(
						'ktp_pemohon'	=> $noKtp,
						'nm_pemohon'	=> $namaPemohon,
						'alm_pemohon'	=> $alamatPemohon,
						'hp_pemohon'	=> $noHp
					);
					//pertama update data pemohonnya
					#$this->rekomendasi->update_pemohon($idPemohon,$dataPemohon);
					
					$dataBadanUsaha = array(
						'nm_bdnusaha'	=> $namaBadanUsaha,
						'npwp'			=> $npwp,
						'alm_bdnusaha'	=> $alamatBadanUsaha,
						'kel_bdnusaha'	=> $kelurahan,
						'tlp_bdnusaha'	=> $tlp_bdnusaha,
						'fax_bdnusaha'	=> $fax
					);
					//trus update juga data badan usaha
					$this->rekomendasi->update_bdnusaha($id_bdnusaha,$dataBadanUsaha);
					
					
					
					if ($this->input->post('noIzin') != "") {
						$no_izin = $this->input->post('noIzin');
						$dataIzin = array(
							'tgl_izin'	=> date('Y-m-d'),
							'no_reg'	=> $id,
							'id_stausaha'	=> '2',
							'alm_bdnusaha'	=> $alamatBadanUsaha,
							'id_kel'		=> $kelurahan,
							'tlp_bdnusaha'	=> $tlp_bdnusaha,
							'fax_bdnusaha'	=> $fax,
							'no_reko'		=> $nomorRekomendasi,
							'tgl_reko'		=> $tglRekomendasi,
							'no_tdp'		=> $noTdp,
							'jml_her'		=> $pembaharuan,
							'ptgs_input'	=> $this->session->userdata('namaLengkap'),
							'sta_izin'		=> $statusIzin,
							'ket_izin'		=> $keterangan
						);
						$this->rekomendasi->update($no_izin, $dataIzin);
					}
					
					else {
						$noIzin =  $this->libraryku->kodeTDP($kecamatan,$jenis_reg,$katusaha);
						echo "kat Usaha = ".$katusaha;
						echo "<br />";
						echo $noIzin;
					$dataIzin = array(
						'no_izin'	=> $noIzin,
						'tgl_izin'	=> date('Y-m-d'),
						'no_reg'	=> $id,
						'id_stausaha'	=> '2',
						'alm_bdnusaha'	=> $alamatBadanUsaha,
						'id_kel'		=> $kelurahan,
						'tlp_bdnusaha'	=> $tlp_bdnusaha,
						'fax_bdnusaha'	=> $fax,
						'no_reko'		=> $nomorRekomendasi,
						'tgl_reko'		=> $tglRekomendasi,
						'no_tdp'		=> $noTdp,
						'jml_her'		=> $pembaharuan,
						'ptgs_input'	=> $this->session->userdata('namaLengkap'),
						'sta_izin'		=> $statusIzin,
						'ket_izin'		=> $keterangan
					);
					$this->rekomendasi->add($dataIzin);
					}
					
					

					
					//sekarang update data registrasinya
					//sekarang update data di tabel registrasi dengan mengubah status_reg = 1
					$dataRegistrasi = array(
						'status_reg' => 1
					);
					$this->rekomendasi->update_registrasi($id, $dataRegistrasi);
					
					$this->session->set_flashdata('sukses', 'Satu Data Perizinan Industri telah berhasil ditambahkan');
					redirect('izin_tdp');
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
		
		
		
		
		
		
		
		
		//fungsi untuk ubah data
		function update($id)
		{
			if ($this->check() == TRUE) {
				$id = $this->enkrip->decode($id);
				
				//disini hanyalah melengkapi item item yang nantinya akan ditampilkan di halaman tambah data seperti, judul, nama link, dll
				$data['title'] = "Ubah Data Perizinan Usaha Perdagangan";
			
			
				$data['main_view'] = 'izin_tdp/izin_tdp_form';
				$data['form_action'] = site_url('izin_tdp/update_process');
				$data['linkBack'] = site_url('perizinan');
				$data['button']	= 'Update Data';
				
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
					$data['fax']	= $datanya->fax_bdnusaha;
					$data['tlp_bdnusaha'] = $datanya->tlp_bdnusaha;
					$data['id_kel']		= $datanya->id_kel;
					$data['npwp']	= $datanya->npwp;
					$data['telpBadanUsaha'] = $datanya->tlp_bdnusaha;
					
					//untuk status usaha
					$sta_usaha = $this->referensi->get_all_stausaha()->result();
					foreach($sta_usaha as $row) {
						if ($datanya->id_stausaha == $row->id_stausaha) {
							$data['selected5'][$row->id_stausaha] = $datanya->id_stausaha;
						}
						$data['stausaha']['']	= "Pilih Status Usaha";
						$data['stausaha'][$row->id_stausaha] = $row->nm_stausaha;
					}
					
					//untuk tanggal registrasi
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
					
					
					
					
					
					//untuk kecamatan
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
					
				
					
					############ untuk data REKOMENDASI ###########
					//untuk data2 rekomendasi
					$data['default']['nomorRekomendasi'] = $datanya->no_reko;
					$data['default']['tglRekomendasi']	 = $datanya->tgl_reko;
					$data['default']['mulai']	= $datanya->tgl_izin;
					$data['default']['pembaharuan'] = $datanya->jml_her;	
					//tampilkan data data sebelumnya di form
					
					//Untuk Kegiatan Usaha
					$data['default']['kegUsaha'] = '';
					$dataKegiatanUsaha = $this->rekomendasi->get_kegiatan_usaha_by_izin($id);
					foreach($dataKegiatanUsaha->result() as $kegiatan)
					{
					
						$data['default']['kegUsaha'] .= "<div id=\"".$kegiatan->nm_kbli.$kegiatan->id_kbli."_id\" class=\"idBidangUsaha\">
						    ".$kegiatan->nm_kbli."<a class=\"closeTag\" onclick=\"parentNode.remove()\">X</a>
					    <input type=\"hidden\" name=\"kegiatanUsaha[]\" value=\"".$kegiatan->id_kbli."\"></input></div>";
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
					$data['default']['noTdp']	= $datanya->no_tdp;
					
					//set sesi nya
					$this->session->set_userdata('id', $id);
					
					$this->load->view('template', $data);
					
					
			}
			
			else {
				echo "tidak bisa melakukan editing";
			}
					
				
		}
				
		
		
		
		
		
		//fungsi untuk ubah data
		function update_process()
		{
			if ($this->check() == TRUE) {
				$id = $this->session->userdata('id');
				
				//disini hanyalah melengkapi item item yang nantinya akan ditampilkan di halaman tambah data seperti, judul, nama link, dll
				$data['title'] = "Ubah Data Perizinan Usaha Perdagangan";
			
			
				$data['main_view'] = 'izin_tdp/izin_tdp_form';
				$data['form_action'] = site_url('izin_tdp/update_process');
				$data['linkBack'] = site_url('perizinan');
				$data['button']	= 'Update Data';
				
				if ($this->rekomendasi->get_all_data_by_izin($id) > 0) {
					
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
					$data['fax']	= $datanya->fax_bdnusaha;
					$data['tlp_bdnusaha'] = $datanya->tlp_bdnusaha;
					$data['id_kel']		= $datanya->id_kel;
					$data['npwp']	= $datanya->npwp;
					$data['telpBadanUsaha'] = $datanya->tlp_bdnusaha;
					
					//untuk status usaha
					$sta_usaha = $this->referensi->get_all_stausaha()->result();
					foreach($sta_usaha as $row) {
						if ($datanya->id_stausaha == $row->id_stausaha) {
							$data['selected5'][$row->id_stausaha] = $datanya->id_stausaha;
						}
						$data['stausaha']['']	= "Pilih Status Usaha";
						$data['stausaha'][$row->id_stausaha] = $row->nm_stausaha;
					}
					
					//untuk tanggal registrasi
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
					
					
					
					//untuk kecamatan
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
					
					//Untuk Kegiatan Usaha
					$data['default']['kegUsaha'] = '';
					$dataKegiatanUsaha = $this->rekomendasi->get_kegiatan_usaha_by_izin($id);
					foreach($dataKegiatanUsaha->result() as $kegiatan)
					{
					
						$data['default']['kegUsaha'] .= "<div id=\"".$kegiatan->nm_kbli.$kegiatan->id_kbli."_id\" class=\"idBidangUsaha\">
						    ".$kegiatan->nm_kbli."<a class=\"closeTag\" onclick=\"parentNode.remove()\">X</a>
					    <input type=\"hidden\" name=\"kegiatanUsaha[]\" value=\"".$kegiatan->id_kbli."\"></input></div>";
					}
					
					
					############ untuk data REKOMENDASI ###########
					//untuk data2 rekomendasi
					$data['default']['nomorRekomendasi'] = $datanya->no_reko;
					$data['default']['tglRekomendasi']	 = $datanya->tgl_reko;
					$data['default']['mulai']	= $datanya->tgl_izin;
					//tampilkan data data sebelumnya di form
					
					$data['default']['pembaharuan'] = $datanya->jml_her;
					//Untuk Kegiatan Usaha
					$dataKegiatanUsaha = $this->rekomendasi->get_kegiatan_usaha_by_izin($datanya->no_izin);
					foreach($dataKegiatanUsaha->result() as $kegiatan)
					{
						//echo $bidang->nm_gol;
						$data['default']['kegUsaha'] .= "<div id=\"".$kegiatan->nm_kbli.$kegiatan->id_kbli."_id\" class=\"idBidangUsaha\">
						    ".$kegiatan->nm_kbli."<a class=\"closeTag\" onclick=\"parentNode.remove()\">X</a>
					    <input type=\"hidden\" name=\"kegiatanUsaha[]\" value=\"".$kegiatan->id_kbli."\"></input></div>";
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
				
					//untuk attribut usaha
					$attribut = $this->referensi->get_all_attribut()->result();
					foreach($attribut as $row) {
						if ($datanya->id_katusaha == $row->id_katusaha) {
							$data['selected6'][$row->id_katusaha] = $datanya->id_katusaha;
						}
						$data['katusaha']['']	= "Pilih Kategori Perusahaan";
						$data['katusaha'][$row->id_katusaha] = $row->nm_katusaha;
					}
					
					//ambil nilai dari inputannya
					//set form validation
					//mengeset validasinya
					$this->form_validation->set_rules('nomorRekomendasi','Nomor Rekomendasi','required');
					
					$this->form_validation->set_rules('tglRekomendasi','Tanggal Rekomendasi','required');
				
				
					$id_kbli = $this->input->post('kegiatanUsaha');
					
					
					if ($this->form_validation->run() == TRUE)
					{
						
						
						//untuk data badan usaha
						$id_bdnusaha	= $this->input->post('id_bdnusaha');
						$namaBadanUsaha	= $this->input->post('namaBadanUsaha');
						$npwp			= $this->input->post('npwp');
						$alamatBadanUsaha = $this->input->post('alamatBadanUsaha');
						$kelurahan	= $this->input->post('kelurahan');
						$kecamatan  = $this->input->post('kecamatan');
						$tlp_bdnusaha	= $this->input->post('telpBadanUsaha');
						$fax		= $this->input->post('fax');
						
						//untuk data perizinan
						
						$nomorRekomendasi = $this->input->post('nomorRekomendasi');
						$tglRekomendasi	= $this->input->post('tglRekomendasi');
						$noTdp = $this->input->post('noTdp');
						$statusIzin = $this->input->post('statusIzin');
						$pembaharuan = $this->input->post('pembaharuan');
						$keterangan = $this->input->post('keterangan');
						
						
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
						
						
						
						$dataBadanUsaha = array(
							'npwp'			=> $npwp,
							'alm_bdnusaha'	=> $alamatBadanUsaha,
							'kel_bdnusaha'	=> $kelurahan,
							'tlp_bdnusaha'	=> $tlp_bdnusaha,
							'fax_bdnusaha'	=> $fax
						);
						//trus update juga data badan usaha
						$this->rekomendasi->update_bdnusaha($id_bdnusaha,$dataBadanUsaha);
						$id_gol = $this->input->post('kegiatanUsaha');
						
						//check by nomor izin
						
							$no_izin = $id;
							$cek = $this->bidang->cek_bidang_usaha_by_no_izin($id);
					
							if($cek == TRUE) {
								
								$this->bidang->delete_bidang_usaha($id);
							}
							
							foreach($id_gol as $value) {
							
								$dataBidangUsaha = array(
									'no_izin'	=> $id,
									'id_kbli'	=> $value
								);
								$this->rekomendasi->add_kegiatan_usaha($dataBidangUsaha);
							}
							
							
							$dataIzin = array(
							
							'id_stausaha'	=> '2',
							'alm_bdnusaha'	=> $alamatBadanUsaha,
							'id_kel'		=> $kelurahan,
							'tlp_bdnusaha'	=> $tlp_bdnusaha,
							'fax_bdnusaha'	=> $fax,
							'no_reko'		=> $nomorRekomendasi,
							'tgl_reko'		=> $tglRekomendasi,
							'no_tdp'		=> $noTdp,
							'jml_her'		=> $pembaharuan,
							'ptgs_input'	=> $this->session->userdata('namaLengkap'),
							'sta_izin'		=> $statusIzin,
							'ket_izin'		=> $keterangan
						);
						$this->rekomendasi->update($id, $dataIzin);
						
					
						
						
						$this->session->set_flashdata('sukses', 'Satu Data Surat Izin Tanda Daftar Perusahaan telah berhasil diubah');
						redirect('izin_tdp/pilih');
					}
				
					else
					{
						$this->load->view('template', $data);
					}
						
				
				
			}
				
			else {
				echo "akses ditolak";
			}
				
		}
		
		
		
		
	}
		
		
		
		
		
		
		
	}

?> 
