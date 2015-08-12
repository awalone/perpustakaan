<?php




	class izin_imb extends CI_Controller
	{	
		function __construct()
		{
			parent::__construct();
			
			
			$this->load->model('izin_imb_model','rekomendasi',TRUE);
			$this->load->model('referensi_model','referensi', TRUE);
			$this->load->model('aksesmodule_model','akses',TRUE);
			$this->load->library('libraryku');
		
			
		}
		var $title = 'izin_imb';
		var $limit =20;
		
		
		
		function check() {
		
			$jum = $this->akses->get_akses_by_id($this->session->userdata('idLogin'), $this->title);
			if (($jum > 0 AND $this->session->userdata('login') == TRUE) OR $this->session->userdata('level') == 'admin') {
				RETURN TRUE;
			}
			else {
				return FALSE;
			}
		}
		
		function tampil($offset = 0) {
			if ($this->check() == TRUE) 
			{
				#hanya menampilkan data data registrasi yang berstatus 0 dan 1
				$data['title'] = "Data Perizinan Mendirikan Bangunan";
				$uri_segment = 3;
				
				$data['h2_title'] = 'Data Rekomendasi IMB';
				$data['main_view'] = 'izin_imb/izin_imb';
				$data['search']	= site_url('izin_imb/search_process');
				$data['link'] = site_url('izin_imb/pilih');
				$data['form_action_cari'] = site_url('izin_imb/hasil');
		
				$data['query'] = $this->rekomendasi->get_all($this->limit, $offset)->result();
				
				$data['jumlah'] = $this->rekomendasi->get_all_data();
				$config = array(
					'base_url'	=> site_url('izin_imb/tampil'),
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
				$data['title'] = "Data Registrasi Izin Mendirikan Bangunan";
				$uri_segment = 3;
				
				$data['h2_title'] = 'Data Rekomendasi IMB';
				$data['main_view'] = 'izin_imb/daftar_registrasi';
				$data['search']	= site_url('izin_imb/search_registrasi');
				$data['link'] = site_url('izin_imb/add');
				$data['form_action_cari'] = site_url('izin_imb/hasil');
		
				$jumlah = $this->rekomendasi->get_all_data_registrasi();
				$data['query'] = $this->rekomendasi->get_all_registrasi($this->limit, $offset)->result();
				$data['jumlah'] = $jumlah;
				$config = array(
					'base_url'	=> site_url('izin_imb/index'),
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
		
		
		function search_registrasi() {
			if ($this->check() == TRUE) 
			{
				#hanya menampilkan data data registrasi yang berstatus 0 dan 1
				$keyword = $this->libraryku->cekinput($this->input->post('keyword'));
				$data['title'] = $this->title;
				$data['h2_title'] = 'Data Rekomendasi IMB';
				$data['main_view'] = 'izin_imb/daftar_registrasi';
				$data['search']	= site_url('izin_imb/search_registrasi');
				$data['link'] = site_url('izin_imb/add');
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
				$data['back']	= site_url('izin_imb');
				
				$this->load->view('template', $data);
			}
			else {
				redirect('login');
			}
		}
		
		
		
		
		function search_process() {
			if ($this->check() == TRUE) 
			{
				#hanya menampilkan data data registrasi yang berstatus 0 dan 1
				$keyword = $this->libraryku->cekinput($this->input->post('keyword'));
				$data['title'] = "Pencarian Data Perizinan Tanda Daftar Industri";
				$data['h2_title'] = 'Data Rekomendasi IMB';
				$data['main_view'] = 'izin_imb/izin_imb';
				$data['search']	= site_url('izin_imb/search_process');
				$data['link'] = site_url('izin_imb/add');
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
				$data['back']	= site_url('izin_imb');
				
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
				$datanya	= $this->rekomendasi->get_data_registrasi_by_id($id);
			//check id
			
			
				//disini hanyalah melengkapi item item yang nantinya akan ditampilkan di halaman tambah data seperti, judul, nama link, dll
				$data['title'] = "Tambah Data Izin Mendirikan Bangunan";
				$data['h2_title'] = 'Data izinbangunan > Edit Data izinbangunan'; 
			
				$data['main_view'] = 'izin_imb/izin_imb_form';
				$data['form_action'] = site_url('izin_imb/add_process');
				$data['linkBack'] = site_url('perizinan');
				$data['button']	= 'Update Data';
				
				
				//untuk data kelurahan
				$kelurahan = $this->referensi->get_all_kelurahan()->result();
				foreach($kelurahan as $row)
				{
							
					$data['kelurahanBangunan']['']	= "--Pilih Kelurahan--";
					$data['kelurahanBangunan'][$row->id_kel] = $row->nm_kel;
				}
						
						
				//untuk kecamatan bangunan
				$kecamatans = $this->referensi->get_all_kecamatan()->result();
				foreach($kecamatans as $row) {
					
					$data['kecamatanBangunan'][''] = "--Pilih Kecamatan--";
					$data['kecamatanBangunan'][$row->id_kec] = $row->nm_kec;
				}
				
				
				#cek datanya, bila sebelumnya sudah dilakukan penginputan ####
				$jum = $this->rekomendasi->get_all_data_izin_by_registrasi($id);
				
				
				#kalau sebelumnya sudah dilakukan penginputan
				#maka tampilkan data2 inputan sebelumnya
				if ($jum > 0) {
					$dataIzin = $this->rekomendasi->get_data_izin_by_registrasi($id);
					
					$data['default']['nomorRekomendasi'] = $dataIzin->no_reko;
					$data['default']['tglRekomendasi']	 = $dataIzin->tgl_reko;
					$data['default']['noUrut']	= $dataIzin->no_unit;
					$data['default']['fungsiBangunan'] = $dataIzin->fungsi_bgn;
					$data['default']['jenisBangunan'] = $dataIzin->jenis_bgn;
					$data['default']['letakBangunan'] = $dataIzin->letak_bgn;
					$data['default']['gsp'] = $dataIzin->gsp_bgn;
					$data['default']['gsb'] = $dataIzin->gsb_bgn;
					$data['kategori']	= $dataIzin->is_unit;
					
					
					//untuk data kelurahan bangunan
					
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
					
					//untuk kecamatan bangunan
					$kecamatans = $this->referensi->get_all_kecamatan()->result();
					foreach($kecamatans as $row) {
						
						$data['kecamatanBangunan'][''] = "--Pilih Kecamatan--";
						$data['kecamatanBangunan'][$row->id_kec] = $row->nm_kec;
					}
					
					
					$kelurahan = $this->referensi->get_all_kelurahan()->result();
					foreach($kelurahan as $row)
					{
						if ($dataIzin->kel_bgn == $row->id_kel) {
							$data['selected5'][$row->id_kel] = $row->nm_kel;
						}
						$data['kelurahanBangunan']['']	= "--Pilih Kelurahan--";
						$data['kelurahanBangunan'][$row->id_kel] = $row->nm_kel;
					}
					//untuk menampilkan status jenis tanah
						$statusTanah = $this->referensi->get_data_status_tanah()->result();
						foreach($statusTanah as $row) {
							
							$data['statusTanah']['']	= "--Pilih Status Tanah--";
							$data['statusTanah'][$row->id_jns] = $row->nm_jnsstatus;
						}
					
					$data['noIzin'] = $dataIzin->no_izin;
				}
				else {
				
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
				
						
						
						//untuk menampilkan status jenis tanah
						$statusTanah = $this->referensi->get_data_status_tanah()->result();
						foreach($statusTanah as $row) {
							$data['statusTanah']['']	= "--Pilih Status Tanah--";
							$data['statusTanah'][$row->id_jns] = $row->nm_jnsstatus;
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
				$data['tgl_reg'] 	= $this->libraryku->tanggal($datanya->tgl_reg);	
				
				
				
				################untuk data badan usaha #######################
				//check apakah memiliki badan usaha atau tidak
				if ($datanya->id_bdnusaha!= "") {
					//untuk badan usaha
					$data['id_bdnusaha']	= $datanya->id_bdnusaha;
					$data['atr_usaha'] = $datanya->atr_usaha;
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
				}
				else {
					$data['id_bdnusaha'] = '';
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
			
				
			if ($this->check() == TRUE) 
			{
				//disini hanyalah melengkapi item item yang nantinya akan ditampilkan di halaman tambah data seperti, judul, nama link, dll
				$data['title'] = "Tambah Data Izin Mendirikan Bangunan";
				$data['h2_title'] = 'Data izinbangunan > Edit Data izinbangunan'; 
			
				$data['main_view'] = 'izin_imb/izin_imb_form';
				$data['form_action'] = site_url('izin_imb/add_process');
				$data['linkBack'] = site_url('perizinan');
				$data['button']	= 'Update Data';
				
				$id = $this->session->userdata('idRegistrasi');
				//untuk data kelurahan
				$kelurahan = $this->referensi->get_all_kelurahan()->result();
				foreach($kelurahan as $row)
				{
							
					$data['kelurahanBangunan']['']	= "--Pilih Kelurahan--";
					$data['kelurahanBangunan'][$row->id_kel] = $row->nm_kel;
				}
						
						
				//untuk kecamatan bangunan
				$kecamatans = $this->referensi->get_all_kecamatan()->result();
				foreach($kecamatans as $row) {
					
					$data['kecamatanBangunan'][''] = "--Pilih Kecamatan--";
					$data['kecamatanBangunan'][$row->id_kec] = $row->nm_kec;
				}
				
				
				#cek datanya, bila sebelumnya sudah dilakukan penginputan ####
				$jum = $this->rekomendasi->get_all_data_izin_by_registrasi($id);
				$datanya	= $this->rekomendasi->get_data_registrasi_by_id($id);
				
				#kalau sebelumnya sudah dilakukan penginputan
				#maka tampilkan data2 inputan sebelumnya
				if ($jum > 0) {
					$dataIzin = $this->rekomendasi->get_data_izin_by_registrasi($id);
					
					$data['default']['nomorRekomendasi'] = $dataIzin->no_reko;
					$data['default']['tglRekomendasi']	 = $dataIzin->tgl_reko;
					$data['default']['noUrut']	= $dataIzin->no_unit;
					$data['default']['fungsiBangunan'] = $dataIzin->fungsi_bgn;
					$data['default']['jenisBangunan'] = $dataIzin->jenis_bgn;
					$data['default']['letakBangunan'] = $dataIzin->letak_bgn;
					$data['default']['gsp'] = $dataIzin->gsp_bgn;
					$data['default']['gsb'] = $dataIzin->gsb_bgn;
					$data['kategori']	= $dataIzin->is_unit;
					
					
					//untuk data kelurahan bangunan
					
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
					
					//untuk kecamatan bangunan
					$kecamatans = $this->referensi->get_all_kecamatan()->result();
					foreach($kecamatans as $row) {
						
						$data['kecamatanBangunan'][''] = "--Pilih Kecamatan--";
						$data['kecamatanBangunan'][$row->id_kec] = $row->nm_kec;
					}
					
					
					$kelurahan = $this->referensi->get_all_kelurahan()->result();
					foreach($kelurahan as $row)
					{
						if ($dataIzin->kel_bgn == $row->id_kel) {
							$data['selected5'][$row->id_kel] = $row->nm_kel;
						}
						$data['kelurahanBangunan']['']	= "--Pilih Kelurahan--";
						$data['kelurahanBangunan'][$row->id_kel] = $row->nm_kel;
					}
					//untuk menampilkan status jenis tanah
						$statusTanah = $this->referensi->get_data_status_tanah()->result();
						foreach($statusTanah as $row) {
							
							$data['statusTanah']['']	= "--Pilih Status Tanah--";
							$data['statusTanah'][$row->id_jns] = $row->nm_jnsstatus;
						}
					
					$data['noIzin'] = $dataIzin->no_izin;
				}
				else {
				
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
				
						
						
						//untuk menampilkan status jenis tanah
						$statusTanah = $this->referensi->get_data_status_tanah()->result();
						foreach($statusTanah as $row) {
							$data['statusTanah']['']	= "--Pilih Status Tanah--";
							$data['statusTanah'][$row->id_jns] = $row->nm_jnsstatus;
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
				$data['tgl_reg'] 	= $this->libraryku->tanggal($datanya->tgl_reg);	
				
				
				
				################untuk data badan usaha #######################
				//check apakah memiliki badan usaha atau tidak
				if ($datanya->id_bdnusaha!= "") {
					//untuk badan usaha
					$data['id_bdnusaha']	= $datanya->id_bdnusaha;
					$data['atr_usaha'] = $datanya->atr_usaha;
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
				}
				else {
					$data['id_bdnusaha'] = '';
				}
				
				
				
				//set form validation
				$this->form_validation->set_rules('nomorRekomendasi','Nomor Rekomendasi','required');
				$this->form_validation->set_rules('kelurahanBangunan','Nama Kelurahan','required');
				
				if ($this->form_validation->run() == TRUE)
				{
					$tgl_izin = date('Y-m-d');
					$tgl_input= date('Y-m-d');
					$nomorRegistrasi = $this->session->userdata('idRegistrasi');
					$nomorRekomendasi = $this->input->post('nomorRekomendasi');
					$tglRekomendasi = $this->input->post('tglRekomendasi');
					$kategori = $this->input->post('kategori');
					$jumlahBangunan = $this->input->post('jumlahBangunan');
					$noUrut = 1;
					$fungsiBangunan = $this->input->post('fungsiBangunan');
					$jenisBangunan = $this->input->post('jenisBangunan');
					$letakBangunan = $this->input->post('letakBangunan');
					$gsp = $this->input->post('gsp');
					$gsb = $this->input->post('gsb');
					$statusTanah = $this->input->post('statusTanah');
					$statusIzin = $this->input->post('statusIzin');
					$keterangan = $this->input->post('keterangan');
					$kelurahanBangunan = $this->input->post('kelurahanBangunan');
					
					
					//untuk kode izin
					$kecamatan = $this->referensi->get_data_by_kelurahan($kelurahanBangunan);
					$kecamatan = substr($kecamatan->id_kec,4,2);
					
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
					$kelurahan	= $this->input->post('kelurahan');
					$tlp_bdnusaha	= $this->input->post('telpBadanUsaha');
					$fax		= $this->input->post('fax');
				
					
					if ($this->input->post('noIzin') != "") {
					
						
						$no_izin = $this->input->post('noIzin');
						$dataRekomendasi = array(
							'tgl_izin'	=> $tgl_izin,
							'no_reg'	=> $nomorRegistrasi,
							'no_reko'	=> $nomorRekomendasi,
							'tgl_reko'	=> $tglRekomendasi,
							'is_unit'	=> $kategori,
							'no_unit'	=> $noUrut,
							'fungsi_bgn'=> $fungsiBangunan,
							'jenis_bgn' => $jenisBangunan,
							'letak_bgn'	=> $letakBangunan,
							'kel_bgn'	=> $kelurahanBangunan,
							'gsp_bgn'	=> $gsp,
							'gsb_bgn'	=> $gsb,
							'sta_tanah'	=> $statusTanah,
							'ptgs_input' => $this->session->userdata('namaLengkap'),
							'tgl_input'	=> $tgl_input,
							'sta_izin' => $statusIzin,
							'ket_izin'	=> $keterangan
						);
						$this->rekomendasi->update($no_izin,$dataRekomendasi);
					}
					else {
							if ($jumlahBangunan > 1) {
								
							for($i=1; $i<=$jumlahBangunan; $i++) {
								
								$no_izin = $this->libraryku->kodeImb($kategori, $kecamatan, $jumlahBangunan, $i);
								
								$dataRekomendasi = array(
									'no_izin' => $no_izin,
									'tgl_izin'	=> $tgl_izin,
									'no_reg'	=> $nomorRegistrasi,
									'no_reko'	=> $nomorRekomendasi,
									'tgl_reko'	=> $tglRekomendasi,
									'is_unit'	=> $kategori,
									'no_unit'	=> $noUrut,
									'fungsi_bgn'=> $fungsiBangunan,
									'jenis_bgn' => $jenisBangunan,
									'letak_bgn'	=> $letakBangunan,
									'kel_bgn'	=> $kelurahanBangunan,
									'gsp_bgn'	=> $gsp,
									'gsb_bgn'	=> $gsb,
									'sta_tanah'	=> $statusTanah,
									'ptgs_input' => $this->session->userdata('namaLengkap'),
									'tgl_input'	=> $tgl_input,
									'sta_izin' => $statusIzin,
									'ket_izin'	=> $keterangan
								);
								$this->rekomendasi->add($dataRekomendasi);
							}
						}
						else {
							$no_izin = $this->libraryku->kodeImb($kategori, $kecamatan, $jumlahBangunan,1);
							
							$dataRekomendasi = array(
								'no_izin' => $no_izin,
								'tgl_izin'	=> $tgl_izin,
								'no_reg'	=> $nomorRegistrasi,
								'no_reko'	=> $nomorRekomendasi,
								'tgl_reko'	=> $tglRekomendasi,
								'is_unit'	=> $kategori,
								'fungsi_bgn'=> $fungsiBangunan,
								'jenis_bgn' => $jenisBangunan,
								'letak_bgn'	=> $letakBangunan,
								'kel_bgn'	=> $kelurahanBangunan,
								'gsp_bgn'	=> $gsp,
								'gsb_bgn'	=> $gsb,
								'sta_tanah'	=> $statusTanah,
								'ptgs_input' => $this->session->userdata('namaLengkap'),
								'tgl_input'	=> $tgl_input,
								'sta_izin' => $statusIzin,
								'ket_izin'	=> $keterangan
							);
							$this->rekomendasi->add($dataRekomendasi);
						}
					}
					
					
					//sekarang update data di tabel registrasi dengan mengubah status_reg = 1
					$dataRegistrasi = array(
						'status_reg' => 1
					);
					$this->rekomendasi->update_registrasi($nomorRegistrasi, $dataRegistrasi);
					
				
					redirect('izin_imb');
					
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
			if ($this->check() == TRUE) {
				$id = $this->enkrip->decode($id);
				
				//disini hanyalah melengkapi item item yang nantinya akan ditampilkan di halaman tambah data seperti, judul, nama link, dll
				$data['title'] = "Ubah Data Izin Mendirikan Bangunan";
			
			
				$data['main_view'] = 'izin_imb/izin_imb_form';
				$data['form_action'] = site_url('izin_imb/update_process');
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
					$data['tlp_bdnusaha'] = $datanya->tlp_bdnusaha;
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
					
					
					
					
					$kelurahan = $this->referensi->get_all_kelurahan()->result();
					foreach($kelurahan as $row)
					{
						
						if ($datanya->kel_bgn == $row->id_kel) {
							$data['selected7'][$row->id_kel] = $datanya->kel_bgn;
						}
						$data['kelurahanBangunan']['']	= "--Pilih Kelurahan--";
						$data['kelurahanBangunan'][$row->id_kel] = $row->nm_kel;
					}
					
					//dapatkan id kecamatan dari kelurahan yang terpilih
					$dataKecamatan = $this->referensi->get_data_by_kelurahan($datanya->kel_bgn);
					$idKecamatan = $dataKecamatan->id_kec;
					
					//untuk kecamatan bangunan
					$kecamatans = $this->referensi->get_all_kecamatan()->result();
					foreach($kecamatans as $row) {
						if ($idKecamatan == $row->id_kec) {
							$data['selected8'][$row->id_kec] = $idKecamatan;
						}
						$data['kecamatanBangunan'][''] = "--Pilih Kecamatan--";
						$data['kecamatanBangunan'][$row->id_kec] = $row->nm_kec;
					}
					
					
					
					//untuk menampilkan status jenis tanah
					$statusTanah = $this->referensi->get_data_status_tanah()->result();
					
					foreach($statusTanah as $row) {
						
						if ($datanya->sta_tanah == $row->id_jns) {
							$data['selected3'][$row->id_jns] = $datanya->sta_tanah; 
						}
						$data['statusTanah']['']	= "--Pilih Status Tanah--";
						$data['statusTanah'][$row->id_jns] = $row->nm_jnsstatus;
					}
					$data['default']['noUrut'] = $datanya->no_unit;
					$data['default']['fungsiBangunan']= $datanya->fungsi_bgn;
					$data['default']['jenisBangunan'] = $datanya->jenis_bgn;
					$data['default']['letakBangunan'] = $datanya->letak_bgn;
					$data['default']['gsb'] = $datanya->gsp_bgn;
					$data['default']['gsp'] = $datanya->gsb_bgn;
					
					
					
					//sekarang ubah datanya
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
			
			
				$data['main_view'] = 'izin_imb/izin_imb_form';
				$data['form_action'] = site_url('izin_imb/update_process');
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
					$data['tlp_bdnusaha'] = $datanya->tlp_bdnusaha;
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
					
					
					
					
					$kelurahan = $this->referensi->get_all_kelurahan()->result();
					foreach($kelurahan as $row)
					{
						
						if ($datanya->kel_bgn == $row->id_kel) {
							$data['selected7'][$row->id_kel] = $datanya->kel_bgn;
						}
						$data['kelurahanBangunan']['']	= "--Pilih Kelurahan--";
						$data['kelurahanBangunan'][$row->id_kel] = $row->nm_kel;
					}
					
					//dapatkan id kecamatan dari kelurahan yang terpilih
					$dataKecamatan = $this->referensi->get_data_by_kelurahan($datanya->kel_bgn);
					$idKecamatan = $dataKecamatan->id_kec;
					
					//untuk kecamatan bangunan
					$kecamatans = $this->referensi->get_all_kecamatan()->result();
					foreach($kecamatans as $row) {
						if ($idKecamatan == $row->id_kec) {
							$data['selected8'][$row->id_kec] = $idKecamatan;
						}
						$data['kecamatanBangunan'][''] = "--Pilih Kecamatan--";
						$data['kecamatanBangunan'][$row->id_kec] = $row->nm_kec;
					}
					
					
					
					//untuk menampilkan status jenis tanah
					$statusTanah = $this->referensi->get_data_status_tanah()->result();
					foreach($statusTanah as $row) {
						if ($datanya->sta_tanah == $row->id_jns) {
							$data['selected3'][$row->id_jns] = $datanya->sta_tanah; 
						}
						$data['statusTanah']['']	= "--Pilih Status Tanah--";
						$data['statusTanah'][$row->id_jns] = $row->nm_jnsstatus;
					}
					$data['default']['noUrut'] = $datanya->no_unit;
					$data['default']['fungsiBangunan']= $datanya->fungsi_bgn;
					$data['default']['jenisBangunan'] = $datanya->jenis_bgn;
					$data['default']['letakBangunan'] = $datanya->letak_bgn;
					$data['default']['gsb'] = $datanya->gsp_bgn;
					$data['default']['gsp'] = $datanya->gsb_bgn;
					
					
					//set form validation
					$this->form_validation->set_rules('nomorRekomendasi','Nomor Rekomendasi','required');
					$this->form_validation->set_rules('kelurahanBangunan','Nama Kelurahan','required');
					
					if ($this->form_validation->run() == TRUE)
					{
					
						$tgl_izin = date('Y-m-d');
						$tgl_input= date('Y-m-d');
						$nomorRekomendasi = $this->input->post('nomorRekomendasi');
						$tglRekomendasi = $this->input->post('tglRekomendasi');
						$kategori = $this->input->post('kategori');
						$jumlahBangunan = $this->input->post('jumlahBangunan');
						$noUrut = 1;
						$fungsiBangunan = $this->input->post('fungsiBangunan');
						$jenisBangunan = $this->input->post('jenisBangunan');
						$letakBangunan = $this->input->post('letakBangunan');
						$gsp = $this->input->post('gsp');
						$gsb = $this->input->post('gsb');
						$statusTanah = $this->input->post('statusTanah');
						$statusIzin = $this->input->post('statusIzin');
						$keterangan = $this->input->post('keterangan');
						$kelurahanBangunan = $this->input->post('kelurahanBangunan');
						
						
						//untuk kode izin
						$kecamatan = $this->referensi->get_data_by_kelurahan($kelurahanBangunan);
						$kecamatan = substr($kecamatan->id_kec,4,2);
						
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
						$kelurahan	= $this->input->post('kelurahan');
						$tlp_bdnusaha	= $this->input->post('telpBadanUsaha');
						$fax		= $this->input->post('fax');
					
						
							$no_izin = $this->input->post('noIzin');
							$dataRekomendasi = array(
								'tgl_izin'	=> $tgl_izin,
								'no_reko'	=> $nomorRekomendasi,
								'tgl_reko'	=> $tglRekomendasi,
								'is_unit'	=> $kategori,
								'no_unit'	=> $noUrut,
								'fungsi_bgn'=> $fungsiBangunan,
								'jenis_bgn' => $jenisBangunan,
								'letak_bgn'	=> $letakBangunan,
								'kel_bgn'	=> $kelurahanBangunan,
								'gsp_bgn'	=> $gsp,
								'gsb_bgn'	=> $gsb,
								'sta_tanah'	=> $statusTanah,
								'ptgs_input' => $this->session->userdata('namaLengkap'),
								'tgl_input'	=> $tgl_input,
								'sta_izin' => $statusIzin,
								'ket_izin'	=> $keterangan
							);
							$this->rekomendasi->update($id,$dataRekomendasi);
						
					
					
						redirect('izin_imb/tampil');
						
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
