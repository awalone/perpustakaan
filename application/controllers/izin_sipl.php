<?php




	class Izin_sipl extends CI_Controller
	{	
		function __construct()
		{
			parent::__construct();
			$this->load->model('referensi_model','referensi', TRUE);
			$this->load->model('izin_sipl_model','rekomendasi',TRUE);
			$this->load->model('aksesmodule_model','akses',TRUE);
			$this->load->library('libraryku');
			
		}
		var $title = 'izin_sipl';
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
				$data['title'] = "Data Perizinan Penyelenggaraan Latihan";
				$uri_segment = 3;
				
				$data['h2_title'] = 'Data Rekomendasi Izin Usaha Industri';
				$data['main_view'] = 'izin_sipl/izin_sipl';
				$data['search']	= site_url('izin_sipl/search_process');
				$data['link'] = site_url('izin_sipl/tampil');
				$data['form_action_cari'] = site_url('izin_sipl/hasil');
		
				$data['query'] = $this->rekomendasi->get_all($this->limit, $offset)->result();
				
				$data['jumlah'] = $this->rekomendasi->get_all_data();
				$config = array(
					'base_url'	=> site_url('izin_sipl/tampil'),
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
				$data['title'] = "Data Registrasi Perizinan Penyelenggaraan Latihan";
				$uri_segment = 3;
				
				$data['h2_title'] = 'Data Rekomendasi IPL';
				$data['main_view'] = 'izin_sipl/daftar_registrasi';
				$data['search']	= site_url('izin_sipl/search_registrasi');
				$data['link'] = site_url('izin_sipl/add');
		
				$jumlah = $this->rekomendasi->get_all_data_registrasi();
				$data['query'] = $this->rekomendasi->get_all_registrasi($this->limit, $offset)->result();
				$data['jumlah'] = $jumlah;
				$config = array(
					'base_url'	=> site_url('izin_sipl/index'),
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
		
		
		
		function search_process($offset=0) {
			if ($this->check() == TRUE) 
			{
				#hanya menampilkan data data registrasi yang berstatus 0 dan 1
				$keyword = $this->libraryku->cekinput($this->input->post('keyword'));
				$data['title'] = "Pencarian Data Perizinan Penyelenggaraan Latihan";
				$data['h2_title'] = 'Data Rekomendasi Izin Penyelenggaraan Latihan';
				$data['main_view'] = 'izin_sipl/izin_sipl';
				$data['search']	= site_url('izin_sipl/search_process');
				$data['link'] = site_url('izin_sipl/add');
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
				$data['back']	= site_url('izin_sipl');
				
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
				$data['title'] = "Pencarian Data Registrasi Perizinan Penyelenggaraan Latihan";
				$data['main_view'] = 'izin_sipl/daftar_registrasi';
				$data['search']	= site_url('izin_sipl/search_registrasi');
				$data['link'] = site_url('izin_sipl/add');
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
				$data['back']	= site_url('izin_sipl');
				
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
				$id = $this->enkrip->decode($id);
				//disini hanyalah melengkapi item item yang nantinya akan ditampilkan di halaman tambah data seperti, judul, nama link, dll
				$data['title'] = "Tambah Data Perizinan Penyelenggaraan Latihan";
				$data['h2_title'] = 'Data izinbangunan > Edit Data izinbangunan'; 
			
				$data['main_view'] = 'izin_sipl/izin_sipl_form.php';
				$data['form_action'] = site_url('izin_sipl/add_process');
				$data['linkBack'] = site_url('perizinan');
				$data['button']	= 'Update Data';
				
				$jum = $this->rekomendasi->get_all_data_izin_by_registrasi($id);
				
				if ($jum > 0) {
					$dataIzin = $this->rekomendasi->get_data_izin_by_registrasi($id);
					$data['default']['nomorRekomendasi'] = $dataIzin->no_reko;
					$data['default']['tglRekomendasi']	 = $dataIzin->tgl_reko;
					$data['default']['jenisLatihan']	 = $dataIzin->jenis_latih;
					
				}
			
				
				//untuk data status izin
				$statusIzin = array('1' => 'Normal/Berlaku', '2' => 'Tidak Berlaku/Belum Diperbaharui / Belum Diperpanjang', '3' => 'Dikenai Sanksi / dibekukan', '4' => 'Ditutup/Dicabut');
				foreach($statusIzin as $row => $value) {
						$data['status'][$row] = $value;
				}
				
				
				//untuk data kelurahan
				$kelurahan = $this->rekomendasi->get_all_kelurahan()->result();
				foreach($kelurahan as $row)
				{
						
					$data['kelurahanBangunan']['']	= "--Pilih Kelurahan--";
					$data['kelurahanBangunan'][$row->id_kel] = $row->nm_kel;
				}
				
				
				$datanya	= $this->rekomendasi->get_data_registrasi_by_id($id);
				$no_reg = $datanya->no_reg;
				//untuk data pemohon
				
				$data['no_reg'] = $no_reg;
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
				$id = $this->session->userdata('idRegistrasi');
				//disini hanyalah melengkapi item item yang nantinya akan ditampilkan di halaman tambah data seperti, judul, nama link, dll
				$data['title'] = "Tambah Data Perizinan Penyelenggaraan Latihan";
				$data['h2_title'] = 'Data izinbangunan > Edit Data izinbangunan'; 
			
				$data['main_view'] = 'izin_sipl/izin_sipl_form.php';
				$data['form_action'] = site_url('izin_sipl/add_process');
				$data['linkBack'] = site_url('perizinan');
				$data['button']	= 'Update Data';
				
				$jum = $this->rekomendasi->get_all_data_izin_by_registrasi($id);
				
				if ($jum > 0) {
					$dataIzin = $this->rekomendasi->get_data_izin_by_registrasi($id);
					$data['default']['nomorRekomendasi'] = $dataIzin->no_reko;
					$data['default']['tglRekomendasi']	 = $dataIzin->tgl_reko;
					$data['default']['jenisLatihan']	 = $dataIzin->jenis_latih;
					
				}
				
				
				
				//untuk data kelurahan
				$kelurahan = $this->rekomendasi->get_all_kelurahan()->result();
				foreach($kelurahan as $row)
				{
						
					$data['kelurahanBangunan']['']	= "--Pilih Kelurahan--";
					$data['kelurahanBangunan'][$row->id_kel] = $row->nm_kel;
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
				$jenis_reg = $datanya->jenis_reg;
				//untuk badan usaha
				$data['atr_usaha'] = $datanya->atr_usaha;
				$data['id_bdnusaha'] = $datanya->id_bdnusaha;
				$data['nm_bdnusaha'] = $datanya->nm_bdnusaha;
				$data['alm_bdnusaha'] = $datanya->alm_bdnusaha;
				$data['jab_pengurus'] = $datanya->jab_pengurus;
				
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
				
				//mengeset validasinya
				$this->form_validation->set_rules('nomorRekomendasi','Nomor Rekomendasi','required');
				$this->form_validation->set_rules('jenisLatihan','Jenis Latihan','required');
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
					
					//untuk data perizinan
					$nomorRegistrasi = $this->input->post('nomorRegistrasi');
					$nomorRekomendasi = $this->input->post('nomorRekomendasi');
					$tglRekomendasi	= $this->input->post('tglRekomendasi');
					$jenisLatihan	= $this->input->post('jenisLatihan');
					
					$statusIzin = $this->input->post('statusIzin');
					$keterangan = $this->input->post('keterangan');
					
				
					$kecamatan = substr($kecamatan,4,2);
					
					
					$dataPemohon = array(
						'ktp_pemohon'	=> $noKtp,
						'nm_pemohon'	=> $namaPemohon,
						'alm_pemohon'	=> $alamatPemohon,
						'hp_pemohon'	=> $noHp
					);
					//pertama update data pemohonnya
					$this->rekomendasi->update_pemohon($idPemohon,$dataPemohon);
					
					$dataBadanUsaha = array(
						'alm_bdnusaha'	=> $alamatBadanUsaha,
						'kel_bdnusaha'	=> $kelurahan,
						'tlp_bdnusaha'	=> $tlp_bdnusaha,
						'fax_bdnusaha'	=> $fax
					);
					//trus update juga data badan usaha
					#$this->rekomendasi->update_bdnusaha($id_bdnusaha,$dataBadanUsaha);
					
					$noIzin =  $this->libraryku->kodeIPL($kecamatan,$jenis_reg);
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
						'jenis_latih'		=> $jenisLatihan,
						'ptgs_input'	=> $this->session->userdata('namaLengkap'),
						'sta_izin'		=> $statusIzin,
						'ket_izin'		=> $keterangan
					);
					$this->rekomendasi->add($dataIzin);

					//sekarang update data registrasinya
					//sekarang update data di tabel registrasi dengan mengubah status_reg = 1
					$dataRegistrasi = array(
						'status_reg' => 1
					);
					$this->rekomendasi->update_registrasi($id, $dataRegistrasi);
					
					$this->session->set_flashdata('sukses', 'Satu Data Izin Penyelenggaraan Latihan telah berhasil ditambahkan');
					redirect('izin_sipl');
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
				$data['title'] = "Ubah Data Izin Mendirikan Bangunan";
			
			
				$data['main_view'] = 'izin_sipl/izin_sipl_form';
				$data['form_action'] = site_url('izin_sipl/update_process');
				$data['linkBack'] = site_url('perizinan');
				$data['button']	= 'Update Data';
				
				$validasi = $this->rekomendasi->get_all_data_by_izin($id);
				
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
					$data['fax']	= $datanya->fax_bdnusaha;
					$data['telpBadanUsaha'] = $datanya->tlp_bdnusaha;
					$data['id_kel']		= $datanya->id_kel;
					$data['npwp']	= $datanya->npwp;
					
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
					
					
					
				
					
					$data['default']['nomorRekomendasi'] = $datanya->no_reko;
					$data['default']['tglRekomendasi']	 = $datanya->tgl_reko;
					
					
					$data['default']['mulai']	= $datanya->tgl_izin;
					$data['default']['jenisLatihan']	 = $datanya->jenis_latih;
					
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
		
		
		
		
		
		
		
		
		//untuk halaman edit
		//fungsi untuk ubah data
		function update_process()
		{
			if ($this->check() == TRUE) {
				$id = $this->session->userdata('id');
				
				//disini hanyalah melengkapi item item yang nantinya akan ditampilkan di halaman tambah data seperti, judul, nama link, dll
				$data['title'] = "Ubah Data Izin Mendirikan Bangunan";
			
			
				$data['main_view'] = 'izin_sipl/izin_sipl_form';
				$data['form_action'] = site_url('izin_sipl/update_process');
				$data['linkBack'] = site_url('perizinan');
				$data['button']	= 'Update Data';
				
				$validasi = $this->rekomendasi->get_all_data_by_izin($id);
				
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
					$data['fax']	= $datanya->fax_bdnusaha;
					$data['telpBadanUsaha'] = $datanya->tlp_bdnusaha;
					$data['id_kel']		= $datanya->id_kel;
					$data['npwp']	= $datanya->npwp;
					
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
					
					
					
				
					
					$data['default']['nomorRekomendasi'] = $datanya->no_reko;
					$data['default']['tglRekomendasi']	 = $datanya->tgl_reko;
					
					
					$data['default']['mulai']	= $datanya->tgl_izin;
					$data['default']['jenisLatihan']	 = $datanya->jenis_latih;
					
					
					//set form validation
					//mengeset validasinya
					$this->form_validation->set_rules('nomorRekomendasi','Nomor Rekomendasi','required');
					$this->form_validation->set_rules('jenisLatihan','Jenis Latihan','required');
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
						$alamatBadanUsaha = $this->input->post('alamatBadanUsaha');
						$kecamatan = $this->input->post('kecamatan');
						$kelurahan	= $this->input->post('kelurahan');
						$tlp_bdnusaha	= $this->input->post('telpBadanUsaha');
						$fax		= $this->input->post('fax');
						
						//untuk data perizinan
						$nomorRegistrasi = $this->input->post('nomorRegistrasi');
						$nomorRekomendasi = $this->input->post('nomorRekomendasi');
						$tglRekomendasi	= $this->input->post('tglRekomendasi');
						$jenisLatihan	= $this->input->post('jenisLatihan');
						
						$statusIzin = $this->input->post('statusIzin');
						$keterangan = $this->input->post('keterangan');
						
					
						$kecamatan = substr($kecamatan,4,2);
						
						/*
						echo "data Pemohon <br />";
						echo "Id Pemohon : $idPemohon<br />";
						echo "Nama Pemohon : $namaPemohon<br />";
						echo "Alamat Pemohon : $alamatPemohon<br />";
						echo "Hp Pemohon : $noHp<br />";
						echo "<br />Data Badan Usaha<br />";
						echo "Id Badan Usaha : $id_bdnusaha<br />";
						echo "nama Badan Usaha : $namaBadanUsaha<br />";
						echo "kelurahan : $kelurahan<br />";
						echo "Telpon : $tlp_bdnusaha<br />";
						echo "Fax : $fax";
						echo "<br />Data Perizinan<br />";
						echo "No Reko : $nomorRekomendasi<br />";
						echo "Tanggal Reko : $tglRekomendasi<br />";
						echo "Jenis Latih : $jenisLatihan<br />";
						*/
						$dataPemohon = array(
							'nm_pemohon'	=> $namaPemohon,
							'alm_pemohon'	=> $alamatPemohon,
							'hp_pemohon'	=> $noHp
						);
						//pertama update data pemohonnya
						$this->rekomendasi->update_pemohon($idPemohon,$dataPemohon);
						
						$dataBadanUsaha = array(
							'nm_bdnusaha'	=> $namaBadanUsaha,
							'alm_bdnusaha'	=> $alamatBadanUsaha,
							'kel_bdnusaha'	=> $kelurahan,
							'tlp_bdnusaha'	=> $tlp_bdnusaha,
							'fax_bdnusaha'	=> $fax
						);
						//trus update juga data badan usaha
						$this->rekomendasi->update_bdnusaha($id_bdnusaha,$dataBadanUsaha);
						
						
						$dataIzin = array(
							'id_stausaha'	=> '2',
							'alm_bdnusaha'	=> $alamatBadanUsaha,
							'id_kel'		=> $kelurahan,
							'tlp_bdnusaha'	=> $tlp_bdnusaha,
							'fax_bdnusaha'	=> $fax,
							'no_reko'		=> $nomorRekomendasi,
							'tgl_reko'		=> $tglRekomendasi,
							'jenis_latih'		=> $jenisLatihan,
							'ptgs_input'	=> $this->session->userdata('namaLengkap'),
							'sta_izin'		=> $statusIzin,
							'ket_izin'		=> $keterangan
						);
						$this->rekomendasi->update($id,$dataIzin);

					
						
						$this->session->set_flashdata('sukses', 'Satu Data Izin Penyelenggaraan Latihan telah berhasil diubah');
						redirect('izin_sipl');
					}
				
					else
					{
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
