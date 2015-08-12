<?php




	class Cetak_imb extends CI_Controller
	{	
		function __construct()
		{
			parent::__construct();
			
			$this->load->model('registrasi_model','registrasi', TRUE);
			$this->load->model('Izin_imb_model','izin',TRUE);
			$this->load->model('aksesmodule_model','akses',TRUE);
			$this->load->model('referensi_model','referensi',TRUE);
			$this->load->library('libraryku');
			
		}
		var $title = 'cetak_imb';
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
				$data['title'] = "Data Perizinan IMB";
				$uri_segment = 3;
				$data['h2_title'] = 'Data Perizinan Mendirikan Bangunan';
				$data['main_view'] = 'izin_imb/izin_imb';
				$data['query'] = $this->izin->get_all($this->limit, $offset)->result();
				$data['jumlah'] = $this->izin->get_all_data();
				$config = array(
					'base_url'	=> site_url('izin_imb/index'),
					'total_rows'=> $this->izin->get_all_data(),
					'per_page'	=> $this->limit,
					'uri_segment' => $uri_segment
				);
				$this->pagination->initialize($config);
				
				$data['pagination'] = $this->pagination->create_links();
				$data['button']	= 'Input Data';
				$data['statusCetak'] = site_url('cetak_imb/cetak_detail');
				$data['search']	= site_url('cetak_imb/search_process');
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
				$data['title'] = "Pencarian Data IMB";
				$data['h2_title'] = 'Data izin IMB';
				$data['main_view'] = 'izin_imb/izin_imb';
				$data['search']	= site_url('cetak_imb/search_process');
				
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
				
				$data['statusCetak'] = site_url('cetak_imb/cetak_detail');
				$data['pagination']	= "";
				$data['back']	= site_url('cetak_imb');
				
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
				$data['title'] = "Detail Data IMB";
				
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
				$data['fungsi_bgn']	= $datanya->fungsi_bgn;
				$data['jenis_bgn'] 	= $datanya->jenis_bgn;
				$data['letak_bgn']	= $datanya->letak_bgn;
				$data['gsp_bgn']	= $datanya->gsp_bgn;
				$data['gsb_bgn']	= $datanya->gsb_bgn;
				$data['sta_tanah']	= $datanya->nm_jnsstatus;
				
				
				$data['h2_title'] = 'Data Izin Tanda Daftar Industri';
				$data['main_view'] = 'izin_imb/izin_imb_detail';
				$data['link'] = site_url('cetak_imb/cetak');
				
				$data['button']	= 'Input Data';
				$data['statusCetak'] = site_url('cetak_imb/cetak_detail');
				$data['back']	= site_url('cetak_imb');
				
				$this->load->view('template', $data);
			}
			else {
				redirect('login');
			}
		}
		
		
		function cetak() {
			if ($this->check() == TRUE) 
			{
				$id = $this->session->userdata('no_izin');
				$id = $this->enkrip->decode($id);
				$datanya = $this->izin->get_data_by_id($id);
				$data['all'] = $datanya;
				$data['no_izin']	= $datanya->no_izin;
				$data['tgl_izin'] 	= $this->libraryku->tanggal($datanya->tgl_izin);
				$data['no_reg']		= $datanya->no_reg;
				$data['no_reko']	= $datanya->no_reko;
				$data['tgl_reko']	= $this->libraryku->tanggal($datanya->tgl_reko);
				$data['tgl_reg']	= $this->libraryku->tanggal($datanya->tgl_reg);
				$data['nm_pemohon']	= $datanya->nm_pemohon;
				$data['alm_pemohon']= $datanya->alm_pemohon;
				$data['ktp_pemohon']= $datanya->ktp_pemohon;
				$data['nm_bdnusaha']= $datanya->nm_bdnusaha;
				$data['alm_bdnusaha'] = $datanya->alm_bdnusaha;
				
				$data['fungsi_bgn']	= $datanya->fungsi_bgn;
				$data['jenis_bgn'] 	= $datanya->jenis_bgn;
				$data['letak_bgn']	= $datanya->letak_bgn;
				$data['gsp_bgn']	= $datanya->gsp_bgn;
				$data['gsb_bgn']	= $datanya->gsb_bgn;
				$data['sta_tanah']	= $datanya->nm_jnsstatus;
				$data['url_cetak'] =  site_url('cetak_imb/cetakPerizinan');
				$data['title']	= "Preview Surat Izin Mendirikan Bangunan";
				$data['main_view'] = 'izin_imb/cetakizin_imb_preview';
				$data['link'] = site_url('cetak_imb/cetak');
				
				$data['button']	= 'Input Data';
				$data['statusCetak'] = site_url('cetak_imb/cetak_detail');
				$data['back']	= site_url('cetak_imb');
				
				//untuk Mendapatkan No seri
				$no_seri = $this->izin->get_end_no_blangko();
				$data['no_blanko'] = sprintf("%05d",$no_seri);

				
				$this->load->view('template', $data);
			}
			else {
				redirect('login');
			}
		}
		
		
		function cetakPerizinan() {
			if ($this->check() == TRUE) 
			{
				$id = $this->session->userdata('no_izin');
				$id = $this->enkrip->decode($id);
				$datanya = $this->izin->get_data_by_id($id);
				$data['all'] = $datanya;
				$data['no_izin']	= $datanya->no_izin;
				$data['tgl_izin'] 	= $this->libraryku->tanggal($datanya->tgl_izin);
				$data['no_reg']		= $datanya->no_reg;
				$data['no_reko']	= $datanya->no_reko;
				$data['tgl_reko']	= $this->libraryku->tanggal($datanya->tgl_reko);
				$data['tgl_reg']	= $this->libraryku->tanggal($datanya->tgl_reg);
				$data['nm_pemohon']	= $datanya->nm_pemohon;
				$data['alm_pemohon']= $datanya->alm_pemohon;
				$data['ktp_pemohon']= $datanya->ktp_pemohon;
				$data['nm_bdnusaha']= $datanya->nm_bdnusaha;
				$data['alm_bdnusaha'] = $datanya->alm_bdnusaha;
				
				$data['fungsi_bgn']	= $datanya->fungsi_bgn;
				$data['jenis_bgn'] 	= $datanya->jenis_bgn;
				$data['letak_bgn']	= $datanya->letak_bgn;
				$data['gsp_bgn']	= $datanya->gsp_bgn;
				$data['gsb_bgn']	= $datanya->gsb_bgn;
				$data['sta_tanah']	= $datanya->nm_jnsstatus;
				
				$data['h2_title'] = 'Data Izin Tanda Daftar Industri';
				$data['main_view'] = 'izin_imb/izin_imb_cetak';
				$data['link'] = site_url('cetak_tdi/cetak');
				
				$data['button']	= 'Input Data';
				$data['statusCetak'] = site_url('cetak_imb/cetak_detail');
				$data['back']	= site_url('cetak_imb');
				$data['url_cetak'] =  site_url('cetak_imb/cetakAsli');
				
				//ubah status registrasinya menjadi 2
				$no_reg = $datanya->no_reg;
				$dataRegistrasi = array(
						'status_reg' => 2
					);
				#$this->registrasi->update_registrasi($no_reg, $dataRegistrasi);

				//untuk Mendapatkan No seri
				$no_seri = $this->izin->get_end_no_blangko();
				$data['no_blanko'] = sprintf("%05d",$no_seri);
				$noIzin = $data['all']->no_izin;
				//Tambahkan Blanko
				$dataBlangko= array(
						'id_jnsizin' => '01',
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
				$this->load->view('izin_imb/cetakizin_imb', $data);
			}
			else {
				redirect('login');
			}
		}
		
		
	}

?> 
