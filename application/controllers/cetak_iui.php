<?php




	class Cetak_iui extends CI_Controller
	{	
		function __construct()
		{
			parent::__construct();
			
			$this->load->model('registrasi_model','registrasi',TRUE);
			$this->load->model('Izin_iui_model','izin',TRUE);
			$this->load->model('aksesmodule_model','akses',TRUE);
			$this->load->model('referensi_model','referensi',TRUE);
			$this->load->library('libraryku');
			
		}
		var $title = 'cetak_iui';
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
				$data['title'] = "Data Perizinan Usaha Industri";
				$uri_segment = 3;
				$data['main_view'] = 'izin_iui/izin_iui';
				$data['query'] = $this->izin->get_all($this->limit, $offset)->result();
				$data['jumlah'] = $this->izin->get_all_data();
				$config = array(
					'base_url'	=> site_url('izin_iui/tampil'),
					'total_rows'=> $this->izin->get_all_data(),
					'per_page'	=> $this->limit,
					'uri_segment' => $uri_segment
				);
				$this->pagination->initialize($config);
				
				$data['pagination'] = $this->pagination->create_links();
				$data['button']	= 'Input Data';
				$data['statusCetak'] = site_url('cetak_iui/cetak_detail');
				$data['search']	= site_url('cetak_iui/search_process');
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
				$data['title'] = "Data Pencarian Perizinan Usaha Industri";
				$data['h2_title'] = 'Data Rekomendasi Izin Usaha Industri';
				$data['main_view'] = 'izin_iui/izin_iui';
				$data['search']	= site_url('izin_iui/search_process');
				$data['link'] = site_url('izin_iui/add');
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
				$data['back']	= site_url('izin_iui');
				
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
				$data['title'] = "Detail Perizinan Usaha Industri";
				
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
				
				
				$data['h2_title'] = 'Data Izin Usaha Industri';
				$data['main_view'] = 'izin_iui/izin_iui_detail';
				$data['link'] = site_url('cetak_iui/cetak');
				
				$data['button']	= 'Input Data';
				$data['statusCetak'] = site_url('cetak_iui/cetak_detail');
				$data['back']	= site_url('cetak_iui');
				
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
				$data['tgl_reg'] 	= $this->libraryku->tanggal($datanya->tgl_reg);
				$data['tgl_reko']	= $this->libraryku->tanggal($datanya->tgl_reko);
				$data['tgl_berakhir'] 	= $this->libraryku->tanggal($datanya->tgl_berakhir);
				$data['investasi'] = $this->libraryku->format_rupiah($datanya->investasi);
				$data['kap_prod']	= $datanya->kap_prod;
				$data['tenaker'] 	= $datanya->tenaker;
				$data['css'] = base_url().'assets/css/cetak_asli.css';
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
		
		function cetak()
		{
			if ($this->check() == TRUE) 
			{
				$data = $this->get_data_for_cetak();
				$data['main_view'] = 'izin_iui/cetakizin_iui_preview';
				$data['link'] = site_url('cetak_iui/cetak');
				$data['title']	= "Preview Surat Izin Usaha Industri";
				$data['button']	= 'Input Data';
				$data['statusCetak'] = site_url('cetak_iui/cetak_detail');
				$data['back']	= site_url('cetak_iui');
				$data['url_cetak'] =  site_url('cetak_iui/cetakAsli');
				
				$this->load->view('template', $data);
			}
			else {
				redirect('login');
			}
		}
		
		function cetakAsli()
		{
			if ($this->check() == TRUE) 
			{
				$data = $this->get_data_for_cetak();
				$data['h2_title'] = 'Data Izin Usaha Industri';
				$data['main_view'] = 'izin_iui/cetakizin_iui';
				$data['link'] = site_url('cetak_iui/cetak');
				
				$data['button']	= 'Input Data';
				$data['statusCetak'] = site_url('cetak_iui/cetak_detail');
				$data['back']	= site_url('cetak_iui');
				$data['url_cetak'] =  site_url('cetak_iui/cetakAsli');

				//ubah status registrasinya menjadi 2
				$no_reg = $data['all']->no_reg;
				$dataRegistrasi = array(
						'status_reg' => 2
					);
				#$this->registrasi->update_registrasi($no_reg, $dataRegistrasi);
				$noIzin = $data['all']->no_izin;
				//Tambahkan Blanko
				$dataBlangko= array(
						'id_jnsizin' => '05',
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
				$this->load->view('izin_iui/cetakizin_iui', $data);
			}
			else {
				redirect('login');
			}
		}
		
		
	}

?> 
