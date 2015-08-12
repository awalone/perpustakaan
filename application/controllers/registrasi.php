<?php




	class Registrasi extends CI_Controller
	{	
		function __construct()
		{
			parent::__construct();
			
			$this->load->model('registrasi_model','registrasi',TRUE);
			$this->load->model('referensi_model','referensi',TRUE);
			$this->load->model('aksesmodule_model','akses',TRUE);
			$this->load->library('libraryku');
			$this->load->library('terbilang');
		
			
		}
		var $title = 'registrasi';
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
		
	
		function index() {
		
			if ($this->check() == TRUE) 
			{	
				$data['title'] = $this->title;
				$data['h2_title'] = 'Data Registrasi';
				$data['main_view'] = 'registrasi/registrasi';
				$data['search']	= site_url('registrasi/search_process');
				$data['link'] = site_url('registrasi/add');
				$data['form_action_cari'] = site_url('registrasi/hasil');

				//check yang login
				//bila yang login adalah admin
				if ($this->session->userdata('idGroup') == 1) {
					$data['query'] = $this->registrasi->get_all()->result();
					$data['jumlah'] = $this->registrasi->get_all_data();
				}
				else{
					$data['query'] = $this->registrasi->get_all($this->session->userdata('idGroup'))->result();
					$data['jumlah']= $this->registrasi->get_all_data($this->session->userdata('idGroup'));
					
					
				}
				
				$data['button']	= 'Input Data';
				
				$this->load->view('template', $data);
			}
			else {
				redirect('login');
			}
		}
	
		function cariKelurahan() {
			
			
			$id = $this->input->post('kecamatan');
			
			$jum = $this->referensi->get_all_data_by_kecamatan($id);
			$kecamatan = $this->referensi->get_all_kelurahan_by_id($id)->result();
			$data['jumlah'] = $jum;
			if ($jum > 0)
			{
				
				foreach($kecamatan as $row) {
					$data['kelurahan'][''] = "--Pilih Kelurahan--";
					$data['kelurahan'][$row->id_kel] = $row->nm_kel;
				}

			}
			else {
				foreach($kecamatan as $row)
				{
					$data['kelurahan']['']	= "--Pilih Kelurahan--";
					$data['kelurahan'][$row->id_kel] = $row->nm_kel;
				}
			}
			
			
			$this->load->view('registrasi/kecamatan',$data);
			
		}
		function generateNoreg() {
			
			
			$jenisIzin = $this->input->post('jenisIzin');
			$tahun = date('y');
			$jenisRegistrasi = $this->input->post('jenisRegistrasi');
			$isBadanUsaha = $this->input->post('is_badanUsaha');
			
			$recordAkhir = $this->registrasi->get_end_record();
			$counter = $recordAkhir->endRecord;
			$data['noreg'] = $jenisIzin.".".$tahun.".".$jenisRegistrasi.".".$isBadanUsaha.".".$counter;
			$this->load->view('registrasi/nomorRegistrasi',$data);
			
		}
		function search_process()
		{
			$keyword = $this->input->post('keyword');
			$status = $this->input->post('status_izin');
			$tglMulai = $this->input->post('mulai');
			$tglSelesai = $this->input->post('selesai');
			$data['title'] = $this->title;
			$data['h2_title'] = 'Data Registrasi';
			$data['main_view'] = 'registrasi/registrasi';
			$data['search']	= site_url('registrasi/search_process');
			$data['link'] = site_url('registrasi/add');
			$data['form_action_cari'] = site_url('registrasi/hasil');
			
			if ($keyword !="" OR $status != "" OR $tglMulai !="" OR $tglSelesai !="") {
				if ($this->session->userdata('idGroup') == 1) {
					$data['query'] = $this->registrasi->get_all_search($keyword, $status, $tglMulai, $tglSelesai)->result();
					$data['jumlah'] = $this->registrasi->get_all_data_search($keyword, $status, $tglMulai, $tglSelesai);
				}
				else {
					$data['query'] = $this->registrasi->get_all_search($keyword, $status, $tglMulai, $tglSelesai, $this->session->userdata('idGroup'))->result();
					$data['jumlah'] = $this->registrasi->get_all_data_search($keyword, $status, $tglMulai, $tglSelesai, $this->session->userdata('idGroup'));
				}
				
		
			}
			else {
				redirect('registrasi');
				

			}
			
			$data['button']	= 'Input Data';
				
			$this->load->view('template', $data);

		}

		
		function caribarang() {
			$this->load->view('registrasi/cari_barang');
		}
		
		function groupBrg() {
			
			$data['lempar']= $this->input->get('lempar');
			$this->load->view('registrasi/groupBrg',$data);
		}
		


		


		function add()
		{
			if ($this->check() == TRUE) 
			{
				$data['title'] = $this->title;
				$data['h2_title'] = 'Data Registrasi';
				$data['main_view'] = 'registrasi/registrasi_form';
				$data['search']	= site_url('registrasi/search_process');
				$data['form_action'] = site_url('registrasi/add_process');
				$data['form_action_cari'] = site_url('registrasi/hasil');
				$data['button']	= 'Input Data';
				//offset
				$uri_segment	= 3;
				$offset			= $this->uri->segment($uri_segment);
				

				if ($this->session->userdata('loket') != "")
				{
					$group = $this->registrasi->get_data_jenis_izin_by_loket($this->session->userdata('loket'))->result();
					
					foreach($group as $row)
					{
						$data['group']['']	= "--Pilih Jenis Izin--";
						$data['group'][$row->id_jnsizin] = $row->nm_izin;
					}
				}
				else {
					$group = $this->registrasi->get_data_jenis_izin()->result();
					foreach($group as $row)
					{
						
						$data['group']['']	= "--Pilih Jenis Izin--";
						$data['group'][$row->id_jnsizin] = $row->nm_izin;
					}
				}
				
				//untuk data kategori usaha
				$attribut = $this->referensi->get_all_attribut()->result();
				foreach($attribut as $row) {
					$data['attribut']['']	= "--Pilih Kategori Usaha--";
					$data['attribut'][$row->id_katusaha]	= $row->nm_katusaha;
				}
				
				//untuk kecamatan
				$kelurahan = $this->referensi->get_all_kelurahan()->result();
				foreach($kelurahan as $row)
				{
					$data['kelurahan']['']	= "--Pilih Kelurahan--";
					$data['kelurahan'][$row->id_kel] = $row->nm_kel;
				}
				$kecamatan = $this->referensi->get_all_kecamatan()->result();
				foreach($kecamatan as $row)
				{
					$data['kecamatan']['']	= "--Pilih Kecamatan--";
					$data['kecamatan'][$row->id_kec] = $row->nm_kec;
				}

				$data['default']['idRegistrasi'] = $this->libraryku->kodePemohon();
				//link untuk menuju ke halaman tambah data
				$data['link'] = site_url('group/add');
			
				//meload view
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
				$data['title'] = $this->title;
				$data['h2_title'] = 'Data Registrasi > Tambah Data Registrasi'; 
			
			
				$id = $this->session->userdata('id');
			
				//file viewnya ada di suratmasuk/surat_form.php
				$data['main_view'] = 'registrasi/registrasi_form';
				$data['form_action'] = site_url('registrasi/add_process');
				$data['linkBack'] = site_url('registrasi');
				$data['button']	= 'Input Data';
			
				if ($this->session->userdata('loket') != "")
				{
					$group = $this->registrasi->get_data_jenis_izin_by_loket($this->session->userdata('loket'))->result();

					foreach($group as $row)
					{
						
						$data['group']['']	= "--Pilih Jenis Izin--";
						$data['group'][$row->id_jnsizin] = $row->nm_izin;
					}
				}
				else {
					$group = $this->registrasi->get_data_jenis_izin()->result();
					foreach($group as $row)
					{
						
						$data['group']['']	= "--Pilih Jenis Izin--";
						$data['group'][$row->id_jnsizin] = $row->nm_izin;
					}
				}
				//untuk kecamatan
				$kelurahan = $this->referensi->get_all_kelurahan()->result();
				foreach($kelurahan as $row)
				{
					$data['kelurahan']['']	= "--Pilih Kelurahan--";
					$data['kelurahan'][$row->id_kel] = $row->nm_kel;
				}
				$kecamatan = $this->referensi->get_all_kecamatan()->result();
				foreach($kecamatan as $row)
				{
					$data['kecamatan']['']	= "--Pilih Kecamatan--";
					$data['kecamatan'][$row->id_kec] = $row->nm_kec;
				}
				
				//untuk data kategori usaha
				$attribut = $this->referensi->get_all_attribut()->result();
				foreach($attribut as $row) {
					$data['attribut']['']	= "--Pilih Kategori Usaha--";
					$data['attribut'][$row->id_katusaha]	= $row->nm_katusaha;
				}
			
				
				//mengeset validasinya
				$this->form_validation->set_rules('jenisIzin','Jenis Izin','required');
				$this->form_validation->set_rules('jenispermohonan','Jenis Permohonan','required');
				$this->form_validation->set_rules('noKtp','Nomor KTP Pemohon','required|exact_length[16]|numeric');
				$this->form_validation->set_rules('namaPemohon','Nama Pemohon','required');
				$this->form_validation->set_rules('noHp','Nomor Handphone','required|numeric|min_length[8]|max_length[14]');
				if ($this->input->post('isBadanUsaha') == "1") {
					$this->form_validation->set_rules('namaBadanUsaha','Nama Badan Usaha','required');
					$this->form_validation->set_rules('alamatBadanUsaha','Alamat Badan Usaha','required');
					$this->form_validation->set_rules('kelurahan','Nama Kelurahan','required');
					$this->form_validation->set_rules('kecamatan','Nama Kecamatan','required');
					$this->form_validation->set_rules('attribut','Kategori Usaha','required');
				}
				
							
				if($this->form_validation->run()==TRUE)
				{
							$idRegistrasi = $this->input->post('idRegistrasi');
							$idPemohon = $this->input->post('idPemohon');
							
							$jenisIzin = $this->input->post('jenisIzin');
							$jenisPermohonan = $this->input->post('jenispermohonan');
							$noKtp = $this->input->post('noKtp');
							$namaPemohon = $this->input->post('namaPemohon');
							$alamatPemohon = $this->input->post('alamatPemohon');
							$noHandphone = $this->input->post('noHp');
							
							$idBadanUsaha = $this->input->post('idBadanUsaha');
							$namaBadanUsaha = $this->input->post('namaBadanUsaha');
							$alamatBadanUsaha = $this->input->post('alamatBadanUsaha');
							$kelurahan = $this->input->post('kelurahan');
							$kecamatan = $this->input->post('kecamatan');
							$statusBadanUsaha = $this->input->post('statusBadanUsaha');
							$jabatanPemohon = "Pemilik/Penanggung Jawab";
							$noHpUsaha = $this->input->post('noHpUsaha');
							$isBadanUsaha = $this->input->post('isBadanUsaha');
							$katusaha = $this->input->post('attribut');
							$attr = $this->input->post('attr');
							$attr_name = $this->input->post('attr_name');
							$attrs = $attr.' '.$attr_name;
						
							#check dulu, apakah terisi ID atau tidak
							//kalau id kosong, maka buat dia menjadi input baru
							//sedangkan kalau ada, maka ubah saja datanya
							if ($idPemohon != "") {
								
								//check apakah id pemohon berdasarkan no ktp udah ada sebelumnya atau tidak
								
								
							
								$jumKtp = $this->registrasi->get_data_by_ktp($noKtp);
								if ($jumKtp > 0) {
									//lakukan update data
									
									
									$dataPemohon = array(
										'nm_pemohon' => $namaPemohon,
										'alm_pemohon'=> $alamatPemohon,
										'hp_pemohon' => $noHandphone
									);
									
									$this->registrasi->update_pemohon_by_ktp($noKtp,$dataPemohon);
								}	
							}
							else {
									//lakukan insert data
									$idPemohon = $this->libraryku->kodePemohon();
									$dataPemohon = array(
										'id_pemohon' => $idPemohon,
										'nm_pemohon' => $namaPemohon,
										'alm_pemohon'=> $alamatPemohon,
										'ktp_pemohon'=> $noKtp,
										'hp_pemohon' => $noHandphone
									);
									$this->registrasi->addPemohon($dataPemohon);
							}
							
							
							$badanUsaha = "";
							//kalau field "apakah badan usaha?" di centang, maka input data badan usaha, kalau tidak maka abaikan
							if ($isBadanUsaha != 0) {
								//sekarang untuk badan usaha
								//bila id bidang usaha tidak diisi (tidak ada sebelumnya) maka lakukan input data
								if ($idBadanUsaha != "") {
									//lakukan update data
									echo "<br />Sedang Melakukan Update data badan usaha dari pemohon dengan id : ".$idPemohon;
									$dataBadanUsaha = array(
										'nm_bdnusaha' => $namaBadanUsaha,
										'id_stausaha' => '2',
										'alm_bdnusaha'=> $alamatBadanUsaha,
										'kel_bdnusaha'=> $kelurahan,
										'atr_usaha'	=> $attrs,
										'tlp_bdnusaha' => $noHpUsaha,
										'id_katusaha'	=> $katusaha,
										'jab_pengurus'	=> $jabatanPemohon
									);
									$this->registrasi->update_badanusaha($idBadanUsaha,$dataBadanUsaha);
								
								
								}
								else {
									//lakukan insert data
									echo "<br />Sedang Melakukan Insert data badan usaha dari pemohon dengan id : ".$idPemohon;
									$idBadanUsaha = $this->libraryku->kodeBadanUsaha();
									$dataBadanUsaha = array(
										'id_bdnusaha'	=> $idBadanUsaha,
										'tgl_daftar' => date('Y-m-d H:i:s'),
										'nm_bdnusaha' => $namaBadanUsaha,
										'id_stausaha'	=> '2',
										'id_pengurus'	=> $idPemohon,
										'alm_bdnusaha'=> $alamatBadanUsaha,
										'kel_bdnusaha'=> $kelurahan,
										'id_katusaha'	=> $katusaha,
										'tlp_bdnusaha' => $noHpUsaha,
										'jab_pengurus'	=> $jabatanPemohon
									);
									$this->registrasi->addbadanusaha($dataBadanUsaha);
								}
								
								
							}
							
							
							$idRegistrasi = $this->libraryku->kodeRegistrasi($jenisIzin,$jenisPermohonan,$isBadanUsaha);
							$this->session->set_userdata('idRegistrasi', $idRegistrasi);
							
							
							if ($isBadanUsaha != 0) {
								//kalau merupakan badan usaha, maka input id badan usaha di tabel registrasi
								$dataRegistrasi = array(
									'no_reg'	=> $idRegistrasi,
									'id_jnsizin'	=> $jenisIzin,
									'jenis_reg'	=> $jenisPermohonan,
									'id_pemohon' => $idPemohon ,
									'is_bdnusaha'	=> $isBadanUsaha,
									'id_bdnusaha'	=> $idBadanUsaha,
									'tgl_reg'	=> date('Y-m-d H:i:s'),
									'ptgs_reg'	=> $this->session->userdata('namaLengkap'),
									'status_reg' => '0', 
									'tgl_tindak'	=> date('Y-m-d'),
									'ket_reg'	=> '',
								);
							}
							
							else {
								$dataRegistrasi = array(
									'no_reg'	=> $idRegistrasi,
									'id_jnsizin'	=> $jenisIzin,
									'jenis_reg'	=> $jenisPermohonan,
									'id_pemohon' => $idPemohon ,
									'is_bdnusaha'	=> $isBadanUsaha,
									'tgl_reg'	=> date('Y-m-d H:i:s'),
									'ptgs_reg'	=> $this->session->userdata('namaLengkap'),
									'status_reg' => '0', 
									'tgl_tindak'	=> date('Y-m-d'),
									'ket_reg'	=> '',
								);
							}
							
							
							
							
							$this->registrasi->add($dataRegistrasi);
							redirect('registrasi/tampil');
				}
				else {
					$this->load->view('template',$data);	
				}
			}
			else {
				redirect('login');
			}
				
		}
		
		function cetak()
		{
			if ($this->check() == TRUE) 
			{
				$data['title'] = "Cetak Registrasi";
				$idRegistrasi = $this->session->userdata('idRegistrasi');
				$datanya = $this->registrasi->get_data_registrasi_by_id($idRegistrasi);
				$data['jenisIzin'] = $datanya->nm_izin;
				$data['jenisRegistrasi'] = $datanya->jenis_reg;
				
				$data['id_pemohon']	= $datanya->id_pemohon;
				$data['nm_pemohon'] = $datanya->nm_pemohon;
				$data['ktp_pemohon']= $datanya->ktp_pemohon;
				$data['alm_pemohon'] = $datanya->alm_pemohon;
				$data['hp_pemohon'] = $datanya->hp_pemohon;
				$data['id_bdnusaha']= $datanya->id_bdnusaha;
				$data['nm_bdnusaha']= $datanya->nm_bdnusaha;
				$data['akr_def']	= $datanya->akr_def;
				$data['atr_usaha'] = $datanya->atr_usaha;
				$data['alm_bdnusaha']=$datanya->alm_bdnusaha;
				$data['jab_pengurus'] = $datanya->jab_pengurus;
				$data['badanUsaha']	= $datanya->id_bdnusaha;
				$data['idRegistrasi'] = $idRegistrasi;
				$this->load->view('registrasi/registrasi_cetak', $data);
			}
			else {
				redirect('login');
			}
		}
		
		function tampil()
		{
			if ($this->check() == TRUE) 
			{
				$data['title'] = "Cetak Registrasi";
				$data['link'] = site_url('registrasi/cetak');
				$data['main_view'] = 'registrasi/registrasi_detail';
				//get data by registrasi
				$idRegistrasi = $this->session->userdata('idRegistrasi');
				$datanya = $this->registrasi->get_data_registrasi_by_id($idRegistrasi);
				$data['no_reg']	= $datanya->no_reg;
				$data['jenisIzin'] = $datanya->nm_izin;
				$data['jenisRegistrasi'] = $datanya->jenis_reg;
				$data['id_pemohon']	= $datanya->id_pemohon;
				$data['nm_pemohon'] = $datanya->nm_pemohon;
				$data['ktp_pemohon']= $datanya->ktp_pemohon;
				$data['alm_pemohon'] = $datanya->alm_pemohon;
				$data['hp_pemohon'] = $datanya->hp_pemohon;
				$data['id_bdnusaha']= $datanya->id_bdnusaha;
				$data['nm_bdnusaha']= $datanya->nm_bdnusaha;
				$data['atr_usaha'] = $datanya->atr_usaha;
				$data['alm_bdnusaha']=$datanya->alm_bdnusaha;
				$data['jab_pengurus'] = $datanya->jab_pengurus;
				$data['badanUsaha']	= $datanya->id_bdnusaha;
				$data['akr_def']	= $datanya->akr_def;
				$this->load->view('template', $data);
			}
			else {
				redirect('login');
			}
		
		}
		
		function cetakTampil($id) {
			if ($this->check() == TRUE) 
			{
				$data['title'] = "Cetak Registrasi";
				$idRegistrasi = $id;
				$datanya = $this->registrasi->get_data_registrasi_by_id($idRegistrasi);
				$data['jenisIzin'] = $datanya->nm_izin;
				$data['jenisRegistrasi'] = $datanya->jenis_reg;
				$data['id_pemohon']	= $datanya->id_pemohon;
				$data['nm_pemohon'] = $datanya->nm_pemohon;
				$data['ktp_pemohon']= $datanya->ktp_pemohon;
				$data['alm_pemohon'] = $datanya->alm_pemohon;
				$data['hp_pemohon'] = $datanya->hp_pemohon;
				$data['id_bdnusaha']= $datanya->id_bdnusaha;
				$data['nm_bdnusaha']= $datanya->nm_bdnusaha;
				$data['atr_usaha'] = $datanya->atr_usaha;
				$data['alm_bdnusaha']=$datanya->alm_bdnusaha;
				$data['jab_pengurus'] = $datanya->jab_pengurus;
				$data['badanUsaha']	= $datanya->id_bdnusaha;
				$data['akr_def']	= $datanya->akr_def;
				$data['idRegistrasi'] = $idRegistrasi;
				$this->load->view('registrasi/registrasi_cetak', $data);
			}
			else {
				redirect('login');
			}
		}
		function cetakAsli($id) {
			$os = $this->terbilang->getOS($_SERVER['HTTP_USER_AGENT']);
			//echo $os;
			//echo $_SERVER['HTTP_USER_AGENT'];
			if ($this->check() == TRUE) 
			{
				$data['title'] = "Cetak Registrasi";
				$idRegistrasi = $id;
				$datanya = $this->registrasi->get_data_registrasi_by_id($idRegistrasi);
				$data['jenisIzin'] = $datanya->nm_izin;
				$data['jenisRegistrasi'] = $datanya->jenis_reg;
				$data['id_pemohon']	= $datanya->id_pemohon;
				$data['nm_pemohon'] = $datanya->nm_pemohon;
				$data['ktp_pemohon']= $datanya->ktp_pemohon;
				$data['alm_pemohon'] = $datanya->alm_pemohon;
				$data['hp_pemohon'] = $datanya->hp_pemohon;
				$data['id_bdnusaha']= $datanya->id_bdnusaha;
				$data['nm_bdnusaha']= $datanya->nm_bdnusaha;
				$data['atr_usaha'] = $datanya->atr_usaha;
				$data['alm_bdnusaha']=$datanya->alm_bdnusaha;
				$data['jab_pengurus'] = $datanya->jab_pengurus;
				$data['badanUsaha']	= $datanya->id_bdnusaha;
				$data['akr_def']	= $datanya->akr_def;
				$data['idRegistrasi'] = $idRegistrasi;
				if(strtoupper($os) == 'WINDOWS XP')
					$this->load->view('registrasi/registrasi_cetak_asli_xp', $data);
				else
					$this->load->view('registrasi/registrasi_cetak_asli', $data);
			}
			else {
				redirect('login');
			}
		}
		
	
	}

?> 
