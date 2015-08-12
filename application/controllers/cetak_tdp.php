<?php




	class Cetak_tdp extends CI_Controller
	{	
		function __construct()
		{
			parent::__construct();
			
			$this->load->model('Izin_tdp_model','izin',TRUE);
			$this->load->model('registrasi_model','registrasi',TRUE);
			$this->load->model('aksesmodule_model','akses',TRUE);
			$this->load->model('referensi_model','referensi',TRUE);
			$this->load->library('libraryku');
			
		}
		var $title = 'cetak_tdp';
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
		
		function index($offset = 0)
		{
			if ($this->check() == TRUE) 
			{
				#hanya menampilkan data data registrasi yang berstatus 0 dan 1
				$data['title'] = "Data Perizinan Tanda Daftar Perusahaan";
				$uri_segment = 3;
				$data['h2_title'] = 'Data Perizinan TDP';
				$data['main_view'] = 'izin_tdp/izin_tdp';
				$data['query'] = $this->izin->get_all($this->limit, $offset)->result();
				$data['jumlah'] = $this->izin->get_all_data();
				$config = array(
					'base_url'	=> site_url('izin_tdp/index'),
					'total_rows'=> $this->izin->get_all_data(),
					'per_page'	=> $this->limit,
					'uri_segment' => $uri_segment
				);
				$this->pagination->initialize($config);
				
				$data['pagination'] = $this->pagination->create_links();
				$data['button']	= 'Input Data';
				$data['statusCetak'] = site_url('cetak_tdp/cetak_detail');
				$data['search']	= site_url('cetak_tdp/search_process');
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
				$data['title'] = "Hasil Pencarian Izin Tanda Daftar Perusahaan";
				$data['h2_title'] = 'Data izin TDP';
				$data['main_view'] = 'izin_tdp/izin_tdp';
				$data['search']	= site_url('cetak_tdp/search_process');
				
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
				
				$data['statusCetak'] = site_url('cetak_tdp/cetak_detail');
				$data['pagination']	= "";
				$data['back']	= site_url('cetak_tdp');
				
				$this->load->view('template', $data);
			}
			else {
				redirect('login');
			}
		}
		
		
		
		function cetak_detail($id) {
			if ($this->check() == TRUE) 
			{
				#hanya menampilkan data data registrasi yang berstatus 0 dan 1
				$data['title'] = $this->title;
				$id = $this->enkrip->decode($id);
				$this->session->set_userdata('no_izin', $id);
				
				
				$datanya = $this->izin->get_data_by_id($id);
				$data['no_izin']	= $datanya->no_izin;
				$data['tgl_izin'] 	= $this->libraryku->tanggal($datanya->tgl_izin);
				$data['tgl_reg']	= $this->libraryku->tanggal($datanya->tgl_reg);
				$data['no_reg']		= $datanya->no_reg;
				$data['no_reko']	= $datanya->no_reko;
				$data['tgl_reko']	= $datanya->tgl_reko;
				$data['nm_pemohon']	= $datanya->nm_pemohon;
				$data['alm_pemohon']= $datanya->alm_pemohon;
				$data['ktp_pemohon']= $datanya->ktp_pemohon;
				$data['nm_bdnusaha']= $datanya->nm_bdnusaha;
				$data['alm_bdnusaha'] = $datanya->alm_bdnusaha;
				$data['nm_stausaha']= $datanya->nm_stausaha;
				
				$data['no_tdp'] = $datanya->no_tdp;
				$data['jml_her']	= $datanya->jml_her;
				
				
				$data['h2_title'] = 'Data Izin Tanda Daftar Industri';
				$data['main_view'] = 'izin_tdp/izin_tdp_detail';
				$data['link'] = site_url('cetak_tdp/cetak');
				$data['url_cetak'] = site_url('cetak_tdp/cetakAsli');
				$data['button']	= 'Input Data';
				$data['statusCetak'] = site_url('cetak_tdp/cetak_detail');
				$data['back']	= site_url('cetak_tdp');
				
				$this->load->view('template', $data);
			}
			else {
				redirect('login');
			}
		}
		function get_data_for_cetak()
		{
				$id = $this->session->userdata('no_izin');
				
				$datanya = $this->izin->get_data_by_id($id);
				$data['no_izin']	= $datanya->no_izin;
				$data['tgl_izin'] 	= $this->libraryku->tanggal($datanya->tgl_izin);
				$data['tgl_reg'] 	= $this->libraryku->tanggal($datanya->tgl_reg);
				$data['tgl_berakhir'] 	= $this->libraryku->tanggal($datanya->tgl_berakhir);
				$data['no_reg']		= $datanya->no_reg;
				$data['no_reko']	= $datanya->no_reko;
				$data['tgl_reko']	= $datanya->tgl_reko;
				$data['nm_pemohon']	= $datanya->nm_pemohon;
				$data['alm_pemohon']= $datanya->alm_pemohon;
				$data['ktp_pemohon']= $datanya->ktp_pemohon;
				$data['nm_bdnusaha']= $datanya->nm_bdnusaha;
				$data['alm_bdnusaha'] = $datanya->alm_bdnusaha;
				$data['nm_stausaha']= $datanya->nm_stausaha;
				$data['all'] = $datanya;
				$data['no_tdp'] = $datanya->no_tdp;
				$data['jml_her']	= $datanya->jml_her;
				
				if ($datanya->id_katusaha == 1)
				{
					$data['berdasarkan'] = " <span style=\"line-height: 5.5mm; font-size:13px\">BERDASARKAN <br>
											UNDANG-UNDANG REPUBLIK INDONESIA NOMOR 3 TAHUN 1982<br>
											TENTANG WAJIB DAFTAR PERUSAHAAN DAN<br>
											UNDANG-UNDANG REPUBLIK INDONESIA NOMOR 40 TAHUN 2007<br>
											TENTANG PERSEROAN TERBATAS
											</span>";
					$data['kategori'] = 'Perusahaan';
				}
				if ($datanya->id_katusaha == 2)
				{	
					$data['berdasarkan'] =" <span style=\"line-height: 5.5mm; font-size:13px\">BERDASARKAN :<br>
								UNDANG-UNDANG REPUBLIK INDONESIA NOMOR 3 TAHUN 1982<br>
								TENTANG WAJIB DAFTAR PERUSAHAAN,<br>
								UNDANG-UNDANG REPUBLIK INDONESIA NOMOR 17 TAHUN 2012<br>
								TENTANG PENGKOPERASIAN
                                </span>";
					$data['kategori'] = 'Koperasi';
				}		
							
				if (($datanya->id_katusaha >= 3) and ($datanya->id_katusaha <= 6))
				{
					$data['berdasarkan'] = "<span style=\"line-height: 5.5mm; font-size:13px\">BERDASARKAN <br>
											UNDANG-UNDANG REPUBLIK INDONESIA NOMOR 3 TAHUN 1982<br>
											TENTANG WAJIB DAFTAR PERUSAHAAN<br>
											</span>";
					$data['kategori'] = 'Perusahaan';				
				}
				
				switch ($datanya->jenis_reg)
				{
					case 0 : $data['pendaftaran'] = "BARU"; break;
					default : $data['pendaftaran'] = "ULANG"; break;
				}
				
				//Kegiatan usaha
				$keg = ''; $keg1 = '';
				$dataKegiatanUsaha = $this->izin->get_kegiatan_usaha_by_izin($datanya->no_izin);
				foreach($dataKegiatanUsaha->result() as $kegiatan)
				{
					$keg1[] = $kegiatan->nm_kbli;
					$keg[] = $kegiatan->id_kbli;
				}
				$data['kegiatanUsaha'] = (is_array($keg1))?implode(", ",$keg1):'';
				$data['KBLI'] = (is_array($keg))?implode(", ",$keg):'';

				//untuk Mendapatkan No seri
				$no_seri = $this->izin->get_end_no_blangko();
				$data['no_blanko'] = sprintf("%05d",$no_seri);

				return $data;
						
		}

		function cetak() {
				$data = $this->get_data_for_cetak();
				$data['h2_title'] = 'Data Izin Tanda Daftar Perusahaan';
				$data['main_view'] = 'izin_tdp/cetakizin_tdp_preview';
				$data['link'] = site_url('cetak_tdp/cetak');
				$data['title']	= "Preview Cetak";
				$data['button']	= 'Input Data';
				$data['statusCetak'] = site_url('cetak_tdp/cetak_detail');
				$data['back']	= site_url('cetak_tdp');
				$data['url_cetak'] = site_url('cetak_tdp/cetakAsli');
				
				$this->load->view('template', $data);
		}
		
		function cetakAsli(){
				$data = $this->get_data_for_cetak();
				
				$data['h2_title'] = 'Data Izin Tanda Daftar Perusahaan';
				$data['main_view'] = 'izin_tdp/cetakizin_tdp';
				$data['link'] = site_url('cetak_tdp/cetak');
				
				$data['button']	= 'Input Data';
				$data['statusCetak'] = site_url('cetak_tdp/cetak_detail');
				$data['back']	= site_url('cetak_tdp');
				
				//ubah status registrasinya menjadi 2
				$no_reg = $data['all']->no_reg;
				$dataRegistrasi = array(
						'status_reg' => 2
					);
			#	$this->registrasi->update_registrasi($no_reg, $dataRegistrasi);
				
				
				$noIzin = $data['all']->no_izin;

				//Tambahkan Blanko
				$dataBlangko= array(
						'id_jnsizin' => '06',
						'tahun'=> date('Y'),
						'no_seri'=> $data['no_blanko'],
						'no_izin'=> $data['all']->no_izin
					);
				$this->izin->add_blangko($dataBlangko);

				$pesan =  "melakukan proses Pencetakan Surat Izin dengan Nomor Izin $noIzin";
				$dataLog = array(
					'id_user'	=> $this->session->userdata('idUser'),
					'tgl_log'	=> date('Y-m-d H:i:s'),
					'aktivitas_log' => $pesan
				);
				$this->referensi->addLog($dataLog);
						
				
				
				$this->load->view('izin_tdp/cetakizin_tdp', $data);
				
		}
		
		
		
		
		
	}

?> 
