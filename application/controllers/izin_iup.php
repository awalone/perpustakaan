<?php




	class izin_iup extends CI_Controller
	{	
		function __construct()
		{
			parent::__construct();
			
			$this->load->model('aksesmodule_model','akses',TRUE);
			$this->load->model('bidangusaha_model','bidang',TRUE);
			$this->load->model('referensi_model','referensi', TRUE);
			$this->load->model('izin_iup_model','rekomendasi',TRUE);
			$this->load->library('libraryku');
			
		}
		var $title = 'izin_iup';
		var $limit = 20;
		
		
		function check() {
		
			$jum = $this->akses->get_akses_by_id($this->session->userdata('idLogin'), $this->title);
			if ($jum > 0 AND $this->session->userdata('login') == TRUE) {
				RETURN TRUE;
			}
			else {
				return FALSE;
			}
		}
		
		
		function index($offset = 0) {
			
		
				if ($this->check() == TRUE)
				{
					$data['title'] = "Data Registrasi Perizinan Usaha Perdagangan";
					$uri_segment = 3;
					
					$data['h2_title'] = 'Data Rekomendasi IUP';
					$data['main_view'] = 'izin_iup/daftar_registrasi';
					$data['search']	= site_url('izin_iup/search_registrasi');
					$data['link'] = site_url('izin_iup/add');
			
					$jumlah = $this->rekomendasi->get_all_data_registrasi();
					$data['query'] = $this->rekomendasi->get_all_registrasi($this->limit, $offset)->result();
					$data['jumlah'] = $jumlah;
					$config = array(
						'base_url'	=> site_url('izin_iup/index'),
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
	
		
		function pilih($offset = 0)
		{
				#hanya menampilkan data data registrasi yang berstatus 0 dan 1
				$data['title'] = "Data Perizinan Mendirikan Bangunan";
				$uri_segment = 3;
				
				$data['h2_title'] = 'Data Rekomendasi IUP';
				$data['main_view'] = 'izin_iup/izin_iup';
				$data['search']	= site_url('izin_iup/search_process');
				$data['link'] = site_url('izin_iup/pilih');
				$data['form_action_cari'] = site_url('izin_iup/hasil');
		
				$data['query'] = $this->rekomendasi->get_all($this->limit, $offset)->result();
				
				$data['jumlah'] = $this->rekomendasi->get_all_data();
				$config = array(
					'base_url'	=> site_url('izin_iup/tampil'),
					'total_rows'=> $this->rekomendasi->get_all_data(),
					'per_page'	=> $this->limit,
					'uri_segment' => $uri_segment
				);
				$this->pagination->initialize($config);
				
				$data['pagination'] = $this->pagination->create_links();
				$data['button']	= 'Input Data';
				
				$this->load->view('template', $data);
				
		}
		
		
		
		
		
		function search_registrasi($offset=0) {
				#hanya menampilkan data data registrasi yang berstatus 0 dan 1
				$keyword = $this->libraryku->cekinput($this->input->post('keyword'));
				$data['title'] = "Pencarian Data Registrasi Izin Usaha Perdagangan";
				$data['h2_title'] = 'Data Rekomendasi IUP';
				$data['main_view'] = 'izin_iup/daftar_registrasi';
				$data['search']	= site_url('izin_iup/search_registrasi');
				$data['link'] = site_url('izin_iup/add');
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
				$data['back']	= site_url('izin_iup');
				
				$this->load->view('template', $data);
		}
		
		
		function search_process($offset=0) {
				#hanya menampilkan data data registrasi yang berstatus 0 dan 1
				$keyword = $this->libraryku->cekinput($this->input->post('keyword'));
				$data['title'] = "Pencarian Data Perizinan Usaha Perdagangan";
				$data['h2_title'] = 'Data Rekomendasi IUP';
				$data['main_view'] = 'izin_iup/izin_iup';
				$data['search']	= site_url('izin_iup/search_process');
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
				$data['back']	= site_url('izin_iup/pilih');
				
				$this->load->view('template', $data);
		}
		
		
		
		function cariBidang() {
			$this->load->view('izin_iup/cari_bidang');
		}
		
		
		function groupBidang() {
			
			$data['lempar']= $this->input->get('lempar');
			$this->load->view('izin_iup/groupBidang',$data);
		}
		
		
		//fungsi untuk tambah data
		function add($id)
		{
			
			
			//check by id registrasi
				//disini hanyalah melengkapi item item yang nantinya akan ditampilkan di halaman tambah data seperti, judul, nama link, dll
				$data['title'] = "Tambah Data Izin Usaha Perdagangan";
				$data['h2_title'] = 'Data izin_iup > Edit Data izin_iup'; 
				$data['main_view'] = 'izin_iup/izin_iup_form.php';
				$data['form_action'] = site_url('izin_iup/add_process');
				$data['linkBack'] = site_url('perizinan');
				$data['button']	= 'Update Data';
				
				
				$id = $this->enkrip->decode($id);
				
				$data['default']['kegUsaha'] = '';
				$kategoriUsaha = array('B' => 'Besar', 'M' => 'Menengah', 'K' => 'Kecil');
				foreach($kategoriUsaha as $row => $value) {
						$data['kategoriUsaha'][''] = '--Pilih Kategori Usaha--';
						$data['kategoriUsaha'][$row] = $value;
				}
				//check data perizinan, apakah sudah ada sebelumnya atau tidak
				//bila sudah ada, ambil datanya saja, 
				//kalau tidak , abaikan
				$jum = $this->rekomendasi->get_all_data_izin_by_registrasi($id);
				
				if ($jum > 0) {
				
					$dataIzin = $this->rekomendasi->get_data_izin_by_registrasi($id);
					//tampilkan data data sebelumnya di form
					$data['default']['nomorRekomendasi'] = $dataIzin->no_reko;
					$data['default']['tglRekomendasi']	 = $dataIzin->tgl_reko;
					$data['default']['kekayaan']		 = $dataIzin->kekayaan;

					//Untuk Kegiatan Usaha
					$dataKegiatanUsaha = $this->rekomendasi->get_kegiatan_usaha_by_izin($dataIzin->no_izin);
					foreach($dataKegiatanUsaha->result() as $kegiatan)
					{
						//echo $bidang->nm_gol;
						$data['default']['kegUsaha'] .= "<div id=\"".$kegiatan->nm_kbli.$kegiatan->id_kbli."_id\" class=\"idBidangUsaha\">
						    ".$kegiatan->nm_kbli."<a class=\"closeTag\" onclick=\"parentNode.remove()\">X</a>
					    <input type=\"hidden\" name=\"kegiatanUsaha[]\" value=\"".$kegiatan->id_kbli."\"></input></div>";
					}
				
			
					//untuk data kelembagaan
					$kelembagaan = $this->rekomendasi->get_all_lembaga()->result();
					
					foreach($kelembagaan as $row)
					{
						if ($dataIzin->id_lembaga == $row->id_lembaga) {
							$data['selected2'][$row->id_lembaga] = $dataIzin->id_lembaga;
						}
						$data['kelembagaan']['']	= "--Pilih Lembaga--";
						$data['kelembagaan'][$row->id_lembaga] = $row->nm_lembaga;
					}
					$data['default']['dagangan']	= $dataIzin->dagangan;
					//untuk data status izin
					
					
					$kategoriUsaha = array('B' => 'Besar', 'M' => 'Menengah', 'K' => 'Kecil');
					foreach($kategoriUsaha as $row => $value) {
						if ($dataIzin->ket_dagang == $row) {
							$data['selected8'][$row] = $dataIzin->ket_dagang;
						}
						$data['kategoriUsaha'][''] = '--Pilih Kategori Usaha--';
						$data['kategoriUsaha'][$row] = $value;
					}
					
					
					$data['noIzin'] = $dataIzin->no_izin;
					
					
					
				}
				else {
					
					//untuk data kelembagaan
					$kelembagaan = $this->rekomendasi->get_all_lembaga()->result();
					
					
					foreach($kelembagaan as $row)
					{
						
						$data['kelembagaan']['']	= "--Pilih Lembaga--";
						$data['kelembagaan'][$row->id_lembaga] = $row->nm_lembaga;
					}
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

				$data['tgl_reg'] 	= $this->libraryku->tanggal($datanya->tgl_reg);	
				
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
		
		
		//fungsi untuk proses penambahan datanya 
		function add_process()
		{
				$data['default']['kegUsaha'] = '';
				//disini hanyalah melengkapi item item yang nantinya akan ditampilkan di halaman tambah data seperti, judul, nama link, dll
				$data['title'] = "Tambah Data Izin Usaha Perdagangan";
				$data['h2_title'] = 'Data izin_iup > Edit Data izin_iup'; 
			
				$data['main_view'] = 'izin_iup/izin_iup_form.php';
				$data['form_action'] = site_url('izin_iup/add_process');
				$data['linkBack'] = site_url('perizinan');
				$data['button']	= 'Update Data';
				
				$kategoriUsaha = array('B' => 'Besar', 'M' => 'Menengah', 'K' => 'Kecil');
				foreach($kategoriUsaha as $row => $value) {
						$data['kategoriUsaha'][''] = '--Pilih Kategori Usaha--';
						$data['kategoriUsaha'][$row] = $value;
				}
				
				
				$id = $this->session->userdata('idRegistrasi');
				$jum = $this->rekomendasi->get_all_data_izin_by_registrasi($id);
				
				if ($jum > 0) {
				
					$dataIzin = $this->rekomendasi->get_data_izin_by_registrasi($id);
					//tampilkan data data sebelumnya di form
					$data['default']['nomorRekomendasi'] = $dataIzin->no_reko;
					$data['default']['tglRekomendasi']	 = $dataIzin->tgl_reko;
					$data['default']['kekayaan']		 = $dataIzin->kekayaan;

					//Untuk Kegiatan Usaha
					$dataKegiatanUsaha = $this->rekomendasi->get_kegiatan_usaha_by_izin($dataIzin->no_izin);
					foreach($dataKegiatanUsaha->result() as $kegiatan)
					{
						
						$data['default']['kegUsaha'] .= "<div id=\"".$kegiatan->nm_kbli.$kegiatan->id_kbli."_id\" class=\"idBidangUsaha\">
						    ".$kegiatan->nm_kbli."<a class=\"closeTag\" onclick=\"parentNode.remove()\">X</a>
					    <input type=\"hidden\" name=\"kegiatanUsaha[]\" value=\"".$kegiatan->id_kbli."\"></input></div>";
					}
				
			
					//untuk data kelembagaan
					$kelembagaan = $this->rekomendasi->get_all_lembaga()->result();
					
					foreach($kelembagaan as $row)
					{
						if ($dataIzin->id_lembaga == $row->id_lembaga) {
							$data['selected2'][$row->id_lembaga] = $dataIzin->id_lembaga;
						}
						$data['kelembagaan']['']	= "--Pilih Lembaga--";
						$data['kelembagaan'][$row->id_lembaga] = $row->nm_lembaga;
					}
					$data['default']['dagangan']	= $dataIzin->dagangan;
					//untuk data status izin
					
					
					$kategoriUsaha = array('B' => 'Besar', 'M' => 'Menengah', 'K' => 'Kecil');
					foreach($kategoriUsaha as $row => $value) {
						if ($dataIzin->ket_dagang == $row) {
							$data['selected8'][$row] = $dataIzin->ket_dagang;
						}
						$data['kategoriUsaha'][''] = '--Pilih Kategori Usaha--';
						$data['kategoriUsaha'][$row] = $value;
					}
					
					
					
					$data['noIzin'] = $dataIzin->no_izin;
					
					
					
				}
				else {
					
					//untuk data kelembagaan
					$kelembagaan = $this->rekomendasi->get_all_lembaga()->result();
					
					
					foreach($kelembagaan as $row)
					{
						
						$data['kelembagaan']['']	= "--Pilih Lembaga--";
						$data['kelembagaan'][$row->id_lembaga] = $row->nm_lembaga;
					}
				}
				
				
				//untuk data kelembagaan
				$kelembagaan = $this->rekomendasi->get_all_lembaga()->result();
				foreach($kelembagaan as $row)
				{
						
					$data['kelembagaan']['']	= "--Pilih Lembaga--";
					$data['kelembagaan'][$row->id_lembaga] = $row->nm_lembaga;
				}
				
				
				$id = $this->session->userdata('idRegistrasi');
				$datanya	= $this->rekomendasi->get_data_registrasi_by_id($id);
				$no_reg = $datanya->no_reg;
				$jenis_reg = $datanya->jenis_reg;
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
				
				$data['tgl_reg'] 	= $this->libraryku->tanggal($datanya->tgl_reg);	
				
				//mengeset validasinya
				$this->form_validation->set_rules('nomorRekomendasi','Nomor Rekomendasi','required');
				$this->form_validation->set_rules('kekayaan','Nilai Kekayaan','required');
				$this->form_validation->set_rules('tglRekomendasi','Tanggal Rekomendasi','required');
				$this->form_validation->set_rules('kelembagaan','Kelembagaan','required');
				$this->form_validation->set_rules('kategoriUsaha','Kategori Usaha','required');
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
					$nomorRegistrasi = $id;
					$nomorRekomendasi = $this->input->post('nomorRekomendasi');
					$tglRekomendasi	= $this->input->post('tglRekomendasi');
					$kekayaan	= $this->input->post('kekayaan');
					$kategoriUsaha = $this->input->post('kategoriUsaha');
					$kelembagaan 	= $this->input->post('kelembagaan');
					$dagangan = $this->input->post('dagangan');
					$statusIzin = $this->input->post('statusIzin');
					$keterangan = $this->input->post('keterangan');
					
					
					$kecamatan = substr($kecamatan,4,2);
					
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
					if ($this->input->post('noIzin') != "") {
						$no_izin = $this->input->post('noIzin');
						
						$cek = $this->rekomendasi->cek_kegiatan_usaha_by_no_izin($no_izin);
						//check kegiatan usaha berdasarkan no izin yang ada
						//kalau ada nomor izin di tabel kegiatan usahanya, hapus saja
						if($cek == TRUE)
						{
							$this->bidang->delete_bidang_usaha($no_izin);
						}
							
						foreach($id_kbli as $value) {
							$dataKegiatanUsaha = array(
								'no_izin'	=> $no_izin,
								'id_kbli'	=> $value
							);
							$this->rekomendasi->add_kegiatan_usaha($dataKegiatanUsaha);
						}
						
						
						$dataIzin = array(
							'tgl_izin'	=> date('Y-m-d'),
							'no_reg'	=> $nomorRegistrasi,
							'id_stausaha'	=> '2',
							'alm_bdnusaha'	=> $alamatBadanUsaha,
							'id_kel'		=> $kelurahan,
							'tlp_bdnusaha'	=> $tlp_bdnusaha,
							'fax_bdnusaha'	=> $fax,
							'no_reko'		=> $nomorRekomendasi,
							'tgl_reko'		=> $tglRekomendasi,
							'kekayaan'		=> $kekayaan,
							'id_lembaga'	=> $kelembagaan,
							'dagangan'		=> $dagangan,
							'ptgs_input'	=> $this->session->userdata('namaLengkap')
						);
						$this->rekomendasi->update($no_izin, $dataIzin);
					}
					else {
						$noIzin =  $this->libraryku->KodeSiup($kecamatan, $jenis_reg,$kategoriUsaha);
						
						foreach($id_gol as $value) {
							echo "<br />$value";
							$dataBidangUsaha = array(
								'no_izin'	=> $noIzin,
								'id_kbli'	=> $value
							);
							
							
						$this->rekomendasi->add_kegiatan_usaha($dataBidangUsaha);
						}
						
						$dataIzin = array(
							'no_izin'	=> $noIzin,
							'tgl_izin'	=> date('Y-m-d'),
							'no_reg'	=> $nomorRegistrasi,
							'id_stausaha'	=> '2',
							'alm_bdnusaha'	=> $alamatBadanUsaha,
							'id_kel'		=> $kelurahan,
							'ket_dagang'	=> $kategoriUsaha,
							'tlp_bdnusaha'	=> $tlp_bdnusaha,
							'fax_bdnusaha'	=> $fax,
							'no_reko'		=> $nomorRekomendasi,
							'tgl_reko'		=> $tglRekomendasi,
							'kekayaan'		=> $kekayaan,
							'id_lembaga'	=> $kelembagaan,
							'dagangan'		=> $dagangan,
							'ptgs_input'	=> $this->session->userdata('namaLengkap')
						
						);
						$this->rekomendasi->add($dataIzin);
					}
					
					

					
					//sekarang update data registrasinya
					//sekarang update data di tabel registrasi dengan mengubah status_reg = 1
					$dataRegistrasi = array(
						'status_reg' => 1
					);
					$this->rekomendasi->update_registrasi($nomorRegistrasi, $dataRegistrasi);
					
					$this->session->set_flashdata('sukses', 'Satu Data Surat Izin Perusahaan telah berhasil ditambahkan');
					redirect('izin_iup');
				}
			
				else
				{
					$this->load->view('template', $data);
				}
			
		}
		
		
		
		//fungsi untuk ubah data
		function update($id)
		{
			if ($this->check() == TRUE) {
				$id = $this->enkrip->decode($id);
				
				//disini hanyalah melengkapi item item yang nantinya akan ditampilkan di halaman tambah data seperti, judul, nama link, dll
				$data['title'] = "Ubah Data Perizinan Usaha Perdagangan";
			
			
				$data['main_view'] = 'izin_iup/izin_iup_form';
				$data['form_action'] = site_url('izin_iup/update_process');
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
					
					//Untuk Kegiatan Usaha
					$data['default']['kegUsaha'] = '';
					$dataKegiatanUsaha = $this->rekomendasi->get_kegiatan_usaha_by_izin($id);
					foreach($dataKegiatanUsaha->result() as $kegiatan)
					{
					
						$data['default']['kegUsaha'] .= "<div id=\"".$kegiatan->nm_kbli.$kegiatan->id_kbli."_id\" class=\"idBidangUsaha\">
						    ".$kegiatan->nm_kbli."<a class=\"closeTag\" onclick=\"parentNode.remove()\">X</a>
					    <input type=\"hidden\" name=\"kegiatanUsaha[]\" value=\"".$kegiatan->id_kbli."\"></input></div>";
					}
					
					
					$kategoriUsaha = array('B' => 'Besar', 'M' => 'Menengah', 'K' => 'Kecil');
					foreach($kategoriUsaha as $row => $value) {
						if ($datanya->ket_dagang == $row) {
							$data['selected8'][$row] = $datanya->ket_dagang;
						}
						$data['kategoriUsaha'][''] = '--Pilih Kategori Usaha--';
						$data['kategoriUsaha'][$row] = $value;
					}
					
					
					
					
					############ untuk data REKOMENDASI ###########
					//untuk data2 rekomendasi
					$data['default']['nomorRekomendasi'] = $datanya->no_reko;
					$data['default']['tglRekomendasi']	 = $datanya->tgl_reko;
					$data['default']['mulai']	= $datanya->tgl_izin;
					//tampilkan data data sebelumnya di form
					$data['default']['kekayaan']		 = $datanya->kekayaan;

					
				
					//untuk data kelembagaan
					$kelembagaan = $this->rekomendasi->get_all_lembaga()->result();
					foreach($kelembagaan as $row)
					{
						if ($datanya->id_lembaga == $row->id_lembaga) {
							$data['selected2'][$row->id_lembaga] = $datanya->id_lembaga;
						}
						$data['kelembagaan']['']	= "--Pilih Lembaga--";
						$data['kelembagaan'][$row->id_lembaga] = $row->nm_lembaga;
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
					$data['default']['dagangan']	= $datanya->dagangan;
					
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
			
			
				$data['main_view'] = 'izin_iup/izin_iup_form';
				$data['form_action'] = site_url('izin_iup/update_process');
				$data['linkBack'] = site_url('perizinan');
				$data['button']	= 'Update Data';
				
				if ($this->rekomendasi->get_all_data_by_id($id) > 0) {
					
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
					
					
					$kategoriUsaha = array('B' => 'Besar', 'M' => 'Menengah', 'K' => 'Kecil');
					foreach($kategoriUsaha as $row => $value) {
						if ($datanya->ket_dagang == $row) {
							$data['selected8'][$row] = $datanya->ket_dagang;
						}
						$data['kategoriUsaha'][''] = '--Pilih Kategori Usaha--';
						$data['kategoriUsaha'][$row] = $value;
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
					
					
					//untuk kategori usaha
					$kategoriUsaha = array('B' => 'Besar', 'M' => 'Menengah', 'K' => 'Kecil');
					foreach($kategoriUsaha as $row => $value) {
						if ($datanya->ket_dagang == $row) {
							$data['selected8'][$row] = $datanya->ket_dagang;
						}
						$data['kategoriUsaha'][''] = '--Pilih Kategori Usaha--';
						$data['kategoriUsaha'][$row] = $value;
					}
					
					
					############ untuk data REKOMENDASI ###########
					//untuk data2 rekomendasi
					$data['default']['nomorRekomendasi'] = $datanya->no_reko;
					$data['default']['tglRekomendasi']	 = $datanya->tgl_reko;
					$data['default']['mulai']	= $datanya->tgl_izin;
					//tampilkan data data sebelumnya di form
					$data['default']['kekayaan']		 = $datanya->kekayaan;

					//Untuk Kegiatan Usaha
					$dataKegiatanUsaha = $this->rekomendasi->get_kegiatan_usaha_by_izin($datanya->no_izin);
					foreach($dataKegiatanUsaha->result() as $kegiatan)
					{
						//echo $bidang->nm_gol;
						$data['default']['kegUsaha'] .= "<div id=\"".$kegiatan->nm_kbli.$kegiatan->id_kbli."_id\" class=\"idBidangUsaha\">
						    ".$kegiatan->nm_kbli."<a class=\"closeTag\" onclick=\"parentNode.remove()\">X</a>
					    <input type=\"hidden\" name=\"kegiatanUsaha[]\" value=\"".$kegiatan->id_kbli."\"></input></div>";
					}
				
					//untuk data kelembagaan
					$kelembagaan = $this->rekomendasi->get_all_lembaga()->result();
					foreach($kelembagaan as $row)
					{
						if ($datanya->id_lembaga == $row->id_lembaga) {
							$data['selected2'][$row->id_lembaga] = $datanya->id_lembaga;
						}
						$data['kelembagaan']['']	= "--Pilih Lembaga--";
						$data['kelembagaan'][$row->id_lembaga] = $row->nm_lembaga;
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
					$data['default']['dagangan']	= $datanya->dagangan;
					
					//ambil nilai dari inputannya
					//set form validation
					//mengeset validasinya
					$this->form_validation->set_rules('nomorRekomendasi','Nomor Rekomendasi','required');
					$this->form_validation->set_rules('kekayaan','Nilai Kekayaan','required');
					$this->form_validation->set_rules('tglRekomendasi','Tanggal Rekomendasi','required');
					$this->form_validation->set_rules('kelembagaan','Kelembagaan','required');
					$this->form_validation->set_rules('kategoriUsaha','Kategori Usaha','required');
				
					$id_kbli = $this->input->post('kegiatanUsaha');
					
					
					if ($this->form_validation->run() == TRUE)
					{
						
						
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
						
						//untuk data badan usaha
						$id_bdnusaha	= $this->input->post('id_bdnusaha');
						$namaBadanUsaha	= $this->input->post('namaBadanUsaha');
						$npwp			= $this->input->post('npwp');
						$alamatBadanUsaha = $this->input->post('alamatBadanUsaha');
						$katusaha = $this->input->post('katusaha');
						$stausaha = $this->input->post('stausaha');
						$kelurahan	= $this->input->post('kelurahan');
						$kecamatan  = $this->input->post('kecamatan');
						$tlp_bdnusaha	= $this->input->post('telpBadanUsaha');
						$fax		= $this->input->post('fax');
						
						//untuk data perizinan
						
						$nomorRekomendasi = $this->input->post('nomorRekomendasi');
						$tglRekomendasi	= $this->input->post('tglRekomendasi');
						$kekayaan	= $this->input->post('kekayaan');
						$kategoriUsaha = $this->input->post('kategoriUsaha');
						$kelembagaan 	= $this->input->post('kelembagaan');
						$dagangan = $this->input->post('dagangan');
						$statusIzin = $this->input->post('statusIzin');
						$keterangan = $this->input->post('keterangan');
						
						
						$kecamatan = substr($kecamatan,4,2);
						
						$dataBadanUsaha = array(
							'npwp'			=> $npwp,
							'fax_bdnusaha'  => '123456789124',
							'alm_bdnusaha'	=> $alamatBadanUsaha,
							'kel_bdnusaha'	=> $kelurahan,
							'tlp_bdnusaha'	=> $tlp_bdnusaha,
							'id_katusaha'	=> $katusaha,
							'id_stausaha'	=> $stausaha
							
						);
						echo $npwp;
						//trus update juga data badan usaha
						$this->rekomendasi->update_bdnusaha($id_bdnusaha,$dataBadanUsaha);
						
						$id_gol = $this->input->post('kegiatanUsaha');
						
						//check by nomor izin
						
							$no_izin = $id;
							$cek = $this->rekomendasi->cek_kegiatan_usaha_by_no_izin($no_izin);
							//check kegiatan usaha berdasarkan no izin yang ada
							//kalau ada nomor izin di tabel kegiatan usahanya, hapus saja
							if($cek == TRUE)
							{
								
								$this->bidang->delete_bidang_usaha($no_izin);
							}
								
							foreach($id_gol as $value) {
								$dataKegiatanUsaha = array(
									'no_izin'	=> $no_izin,
									'id_kbli'	=> $value
								);
								
								$this->rekomendasi->add_kegiatan_usaha($dataKegiatanUsaha);
							}
							
							
							$dataIzin = array(
								'tgl_izin'	=> date('Y-m-d'),
								'no_reg'	=> $no_reg,
								'id_stausaha'	=> '2',
								'alm_bdnusaha'	=> $alamatBadanUsaha,
								'id_kel'		=> $kelurahan,
								'tlp_bdnusaha'	=> $tlp_bdnusaha,
								'fax_bdnusaha'	=> $fax,
								'ket_dagang'	=> $kategoriUsaha,
								'no_reko'		=> $nomorRekomendasi,
								'tgl_reko'		=> $tglRekomendasi,
								'kekayaan'		=> $kekayaan,
								'id_lembaga'	=> $kelembagaan,
								'dagangan'		=> $dagangan,
								'ptgs_input'	=> $this->session->userdata('namaLengkap')
							);
							$this->rekomendasi->update($no_izin, $dataIzin);
						
					
						
						
						$this->session->set_flashdata('sukses', 'Satu Data Surat Izin Usaha Perdagangan telah berhasil diubah');
						redirect('izin_iup/pilih');
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
