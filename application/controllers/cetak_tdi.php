<?php




	class Cetak_tdi extends CI_Controller
	{	
		function __construct()
		{
			parent::__construct();
			
			$this->load->model('registrasi_model','registrasi', TRUE);
			$this->load->model('Izin_tdi_model','izin',TRUE);
			$this->load->model('aksesmodule_model','akses',TRUE);
			$this->load->model('referensi_model','referensi',TRUE);
			$this->load->library('libraryku');
			
		}
		var $title = 'cetak_tdi';
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
		
		function index()
		{
			if ($this->check() == TRUE) 
			{
				#hanya menampilkan data data registrasi yang berstatus 0 dan 1
				$data['title'] = "Data Perizinan Tanda Daftar Industri";
				$data['h2_title'] = 'Data Izin Tanda Daftar Industri';
				$data['main_view'] = 'izin_tdi/izin_tdi';
				$data['search']	= site_url('cetak_tdi/search_process');
				$data['link'] = site_url('izin_tdi/pilih');
				$data['form_action_cari'] = site_url('izin_tdi/hasil');
				$data['query'] = $this->izin->get_all()->result();
				$data['jumlah'] = $this->izin->get_all_data();
				$data['button']	= 'Input Data';
				$data['statusCetak'] = site_url('cetak_tdi/cetak_detail');
				
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
				$data['title'] = "Pencarian Perizinan Tanda Daftar Industri";
				$data['main_view'] = 'izin_tdi/izin_tdi';
				$data['search']	= site_url('cetak_tdi/search_process');
				
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
				
				$data['statusCetak'] = site_url('cetak_tdi/cetak_detail');
				$data['pagination']	= "";
				$data['back']	= site_url('cetak_tdi');
				
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
				$data['title'] = "Detail Perizinan Tanda Daftar Industri";
				
				$this->session->set_userdata('no_izin', $id);
				$id = $this->enkrip->decode($id);
				
				$datanya = $this->izin->get_data_by_id($id);
				$data['no_izin']	= $datanya->no_izin;
				$data['tgl_izin'] 	= $this->libraryku->tanggal($datanya->tgl_izin);
				$data['no_reg']		= $datanya->no_reg;
				$data['no_reko']	= $datanya->no_reko;
				$data['tgl_reko']	= $datanya->tgl_reko;
				$data['nm_pemohon']	= $datanya->nm_pemohon;
				$data['alm_pemohon']= $datanya->alm_pemohon;
				$data['ktp_pemohon']= $datanya->ktp_pemohon;
				$data['nm_bdnusaha']= $datanya->nm_bdnusaha;
				$data['alm_bdnusaha'] = $datanya->alm_bdnusaha;
				$data['investasi'] = $this->libraryku->format_rupiah($datanya->investasi);
				$data['kap_prod']	= $datanya->kap_prod;
				$data['tenaker'] 	= $datanya->tenaker;
				$data['npwp']		= $datanya->npwp;
				
				
				$data['h2_title'] = 'Data Izin Tanda Daftar Industri';
				$data['main_view'] = 'izin_tdi/izin_tdi_detail';
				$data['link'] = site_url('cetak_tdi/cetak');
				
				$data['button']	= 'Input Data';
				$data['statusCetak'] = site_url('cetak_tdi/cetak_detail');
				$data['back']	= site_url('cetak_tdi');
				
				$this->load->view('template', $data);
			}
			else {
				redirect('login');
			}
		}
		
		function get_data_for_cetak() {
				$id = $this->session->userdata('no_izin');
				$id = $this->enkrip->decode($id);
				
				$datanya = $this->izin->get_data_by_id($id);
				$data['tgl_izin'] 	= $this->libraryku->tanggal($datanya->tgl_izin);
				$data['no_reg']		= $datanya->no_reg;
				$data['no_reko']	= $datanya->no_reko;
				$data['tgl_reko'] 	= $this->libraryku->tanggal($datanya->tgl_reko);
				$data['tgl_reg'] 	= $this->libraryku->tanggal($datanya->tgl_reg);
				$data['tgl_berakhir'] 	= $this->libraryku->tanggal($datanya->tgl_berakhir);
				$data['investasi'] = $this->libraryku->format_rupiah($datanya->investasi);
				$data['all']	= $datanya;
				//Kegiatan usaha
				$keg = '';
				$dataKegiatanUsaha = $this->izin->get_kegiatan_usaha_by_izin($datanya->no_izin);
				foreach($dataKegiatanUsaha->result() as $kegiatan)
				{
					$keg[] = $kegiatan->nm_kbli." (".$kegiatan->id_kbli.")";
				}
				$data['kegiatanUsaha'] = (is_array($keg))?implode(", ",$keg):'';
				
				//untuk Mendapatkan No seri
				$no_seri = $this->izin->get_end_no_blangko();
				$data['no_blanko'] = sprintf("%05d",$no_seri);
				return $data;
		}
		
		function cetak(){
			if ($this->check() == TRUE) 
			{
				$data = $this->get_data_for_cetak();
				$data['h2_title'] = 'Data Izin Tanda Daftar Industri';
				$data['main_view'] = 'izin_tdi/cetakizin_tdi_preview';
				$data['link'] = site_url('cetak_tdi/cetak');
				$data['title']	= "Preview Surat Izin Tanda Daftar Industri";
				$data['button']	= 'Input Data';
				$data['statusCetak'] = site_url('cetak_tdi/cetak_detail');
				$data['back']	= site_url('cetak_tdi');
				$data['url_cetak'] =  site_url('cetak_tdi/cetakAsli');
				
				$this->load->view('template', $data);
			}
			else {
				redirect('login');
			}
		}
		
		function cetakAsli(){
			if ($this->check() == TRUE) 
			{
				$data = $this->get_data_for_cetak();
				
				$data['h2_title'] = 'Data Izin Tanda Daftar Industri';
				$data['main_view'] = 'izin_tdi/izin_tdi_cetak';
				$data['link'] = site_url('cetak_tdi/cetak');
				
				$data['button']	= 'Input Data';
				$data['statusCetak'] = site_url('cetak_tdi/cetak_detail');
				$data['back']	= site_url('cetak_tdi');
				
				//ubah status registrasinya menjadi 2
				$no_reg = $data['all']->no_reg;
				$dataRegistrasi = array(
						'status_reg' => 2
					);
			#	$this->registrasi->update_registrasi($no_reg, $dataRegistrasi);
				
				$noIzin = $data['all']->no_izin;
				
				//Tambahkan Blanko
				$dataBlangko= array(
						'id_jnsizin' => '04',
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
				$this->referensi->addLog($dataLog); //masukkan data aktivitas ke tabel log
				$this->load->view('izin_tdi/cetakizin_tdi', $data);
			}
			else {
				redirect('login');
			}
		}		
		
		
	}

?> 
