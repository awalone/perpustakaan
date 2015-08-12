<?php




	class Cetak_siup extends CI_Controller
	{	
		function __construct()
		{
			parent::__construct();
			
			$this->load->model('izin_iup_model','izin',TRUE);
			$this->load->model('registrasi_model','registrasi',TRUE);
			$this->load->model('aksesmodule_model','akses',TRUE);
			$this->load->library('libraryku');
			$this->load->library('terbilang');
			$this->load->model('referensi_model','referensi',TRUE);
		}
		var $title = 'cetak_siup';
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
				$data['title'] = "Data Perizinan Usaha Perdagangan";
				$uri_segment = 3;
				$data['main_view'] = 'izin_iup/izin_iup';
				$data['query'] = $this->izin->get_all($this->limit, $offset)->result();
				$data['jumlah'] = $this->izin->get_all_data();
				$config = array(
					'base_url'	=> site_url('cetak_siup/tampil'),
					'total_rows'=> $this->izin->get_all_data(),
					'per_page'	=> $this->limit,
					'uri_segment' => $uri_segment
				);
				$this->pagination->initialize($config);
				
				$data['pagination'] = $this->pagination->create_links();
				$data['button']	= 'Input Data';
				$data['statusCetak'] = site_url('cetak_siup/cetak_detail');
				$data['search']	= site_url('cetak_siup/search_process');
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
				$data['title'] = "Pencarian Data Perizinan Usaha Perdagangan";
				$data['main_view'] = 'izin_iup/izin_iup';
				$data['search']	= site_url('cetak_siup/search_process');
		
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
				$data['back']	= site_url('cetak_siup');
				$data['statusCetak'] = site_url('cetak_siup/cetak_detail');
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
				$data['title'] = "Detail Perizinan Usaha Perdagangan";
				
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
				
				$data['kekayaan'] = $this->libraryku->format_rupiah($datanya->kekayaan);
				$data['dagangan']	= $datanya->dagangan;
				$data['nm_lembaga'] 	= $datanya->nm_lembaga;
				
				
				$data['h2_title'] = 'Data Izin Tanda Daftar Industri';
				$data['main_view'] = 'izin_iup/izin_iup_detail';
				$data['link'] = site_url('cetak_siup/cetak');
				
				$data['button']	= 'Input Data';
				$data['statusCetak'] = site_url('cetak_siup/cetak_detail');
				$data['back']	= site_url('cetak_siup');
				
				$this->load->view('template', $data);
			}
			else {
				redirect('login');
			}
		}
		
		function get_data_for_cetak()
		{
				$id = $this->session->userdata('no_izin');
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
				$data['all'] = $datanya;
				$data['kekayaan'] = $this->libraryku->format_rupiah($datanya->kekayaan);
				$data['terbilang'] = $this->terbilang->_proses($datanya->kekayaan);
				$data['dagangan']	= $datanya->dagangan;
				$data['nm_lembaga'] 	= $datanya->nm_lembaga;
				$data['tglSekarang'] = $this->libraryku->tanggal(date("Y:m:d"));
				//untuk Mendapatkan No seri
				$no_seri = $this->izin->get_end_no_blangko();
				$data['no_blanko'] = sprintf("%05d",$no_seri);
				//Untuk Kegiatan Usaha
				$keg = '';
				$dataKegiatanUsaha = $this->izin->get_kegiatan_usaha_by_izin($datanya->no_izin);
				foreach($dataKegiatanUsaha->result() as $kegiatan)
				{
					//$keg[] = $kegiatan->nm_kbli." (".$kegiatan->id_kbli.")";
					$keg[] = $kegiatan->id_kbli;
				}
				$data['kegiatanUsaha'] = (is_array($keg))?implode(", ",$keg):'';
				return $data;
		}
		function cetak() {
			if ($this->check() == TRUE) 
			{
				$data = $this->get_data_for_cetak();
				$data['css'] = base_url().'assets/css/cetak_asli.css';
				
				$data['h2_title'] = 'Data Izin Tanda Daftar Industri';
				$data['main_view'] = 'izin_iup/cetakizin_iup_preview';
				$data['link'] = site_url('cetak_siup/cetak');
				$data['title']	= "Preview Surat Izin Usaha Perdagangan";
				$data['button']	= 'Input Data';
				$data['statusCetak'] = site_url('cetak_siup/cetak_detail');
				$data['back']	= site_url('cetak_siup');
				$data['url_cetak'] =  site_url('cetak_siup/cetakAsli');
				$this->load->view('template', $data);
			}
			else {
				redirect('login');
			}
		}
		function cetakAsli() {
		
				$data = $this->get_data_for_cetak();
				$data['css'] = base_url().'assets/css/cetak_asli.css';
				
				$data['h2_title'] = 'Data Izin Tanda Daftar Industri';
				$data['main_view'] = 'izin_iup/cetakizin_iup';
				$data['link'] = site_url('cetak_siup/cetak');
				
				$data['button']	= 'Input Data';
				$data['statusCetak'] = site_url('cetak_siup/cetak_detail');
				$data['back']	= site_url('cetak_siup');

				//ubah status registrasinya menjadi 2
				$no_reg = $data['all']->no_reg;
				$dataRegistrasi = array(
						'status_reg' => 2
					);
					
				
				
			#	$this->registrasi->update_registrasi($no_reg, $dataRegistrasi);
				
			
				
				
				$this->load->view('izin_iup/cetakizin_iup', $data);
		}
		
		
		
		
	}

?> 
