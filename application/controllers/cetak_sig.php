<?php
	class Cetak_sig extends CI_Controller
	{	
		function __construct()
		{
			parent::__construct();
			
			$this->load->model('Izin_sig_model','izin',TRUE);
			$this->load->model('aksesmodule_model','akses',TRUE);
			$this->load->model('registrasi_model','registrasi',TRUE);
			$this->load->model('bidangusaha_model','bidangusaha',TRUE);
			$this->load->model('referensi_model','referensi',TRUE);
			$this->load->library('libraryku');
			
		}
		var $title = 'cetak_sig';
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
				$data['title'] = "Data Perizinan Usaha Gangguan";
				$uri_segment = 3;
				$data['h2_title'] = 'Data Perizinan Usaha Gangguan';
				$data['main_view'] = 'izin_sig/izin_sig';
				$data['query'] = $this->izin->get_all($this->limit, $offset)->result();
				$data['jumlah'] = $this->izin->get_all_data();
				$config = array(
					'base_url'	=> site_url('cetak_sig/index'),
					'total_rows'=> $this->izin->get_all_data(),
					'per_page'	=> $this->limit,
					'uri_segment' => $uri_segment
				);
				$this->pagination->initialize($config);
				
				$data['pagination'] = $this->pagination->create_links();
				$data['button']	= 'Input Data';
				$data['statusCetak'] = site_url('cetak_sig/cetak_detail');
				$data['search']	= site_url('cetak_sig/search_process');
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
				$data['title'] = "Hasil Pencarian Data Perizinan Usaha Gangguan";
				
				$data['main_view'] = 'izin_sig/izin_sig';
				$data['search']	= site_url('cetak_sig/search_process');
				
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
				
				$data['statusCetak'] = site_url('cetak_sig/cetak_detail');
				$data['pagination']	= "";
				$data['back']	= site_url('cetak_sig');
				
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
				$data['title'] = "Data Detail Perizinan Usaha Gangguan";
				
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
				
				$data['kapasitas']	= $datanya->kapasitas;
				$data['tenaker'] 	= $datanya->tenaker;
				$data['luas_usaha'] 	= $datanya->luas_usaha;
				$data['golusaha'] 	= $datanya->golusaha;
				
				//untuk mendapatkan bidang usahanya
				$data['jum'] = $this->izin->get_kegiatan_usaha_by_izin($data['no_izin'])->num_rows();
				
				$data['bidang'] = $this->izin->get_kegiatan_usaha_by_izin($data['no_izin'])->result();
				
				
				$data['h2_title'] = 'Data Izin Usaha Gangguan';
				$data['main_view'] = 'izin_sig/izin_sig_detail';
				$data['link'] = site_url('cetak_sig/cetak');
				
				$data['button']	= 'Input Data';
				$data['statusCetak'] = site_url('cetak_sig/cetak_detail');
				$data['back']	= site_url('cetak_sig');
				
				$this->load->view('template', $data);
			}
			else {
				redirect('login');
			}
		}
		
		
		function get_data_for_cetak() {
				$id = $this->session->userdata('no_izin');
				$id = $this->enkrip->decode($id);
				$dataBU = array();
				if($this->bidangusaha->cek_bidang_usaha_by_no_izin($id) == TRUE)
				{
					$dataBidangUsaha = $this->izin->get_kegiatan_usaha_by_izin($id)->result();
					foreach($dataBidangUsaha as $row)
					{
						$dataBU[] = $row->nm_kbli;
					}
					$data['bidang_usaha'] = implode(", ",$dataBU);
				}
				else
					$data['bidang_usaha'] = '';
				
				
				$datanya = $this->izin->get_data_by_id($id);
				$data['no_izin']	= $datanya->no_izin;
				$data['tgl_izin'] 	= $this->libraryku->tanggal($datanya->tgl_izin);
				$data['no_reg']		= $datanya->no_reg;
				$data['no_reko']	= $datanya->no_reko;
				$data['tgl_reko']	= $this->libraryku->tanggal($datanya->tgl_reko);
				$data['nm_pemohon']	= $datanya->nm_pemohon;
				$data['alm_pemohon']= $datanya->alm_pemohon;
				$data['ktp_pemohon']= $datanya->ktp_pemohon;
				$data['nm_bdnusaha']= $datanya->nm_bdnusaha;
				$data['alm_bdnusaha'] = $datanya->alm_bdnusaha;
				$data['kapasitas']	= $datanya->kapasitas;
				$data['tenaker'] 	= $datanya->tenaker;
				$data['luas_usaha'] 	= $datanya->luas_usaha;
				$data['golusaha'] 	= $datanya->golusaha;
				$data['all'] = $datanya;
				
				//untuk Mendapatkan No seri
				$no_seri = $this->izin->get_end_no_blangko();
				$data['no_blanko'] = sprintf("%05d",$no_seri);
				
				//untuk mendapatkan bidang usahanya
				$data['jum'] = $this->bidangusaha->get_bidang_usaha_by_izin($data['no_izin'])->num_rows();
				$data['bidang'] = $this->bidangusaha->get_bidang_usaha_by_izin($data['no_izin'])->result();
				$data['tgl_reg'] = $this->libraryku->tanggal($datanya->tgl_reg);
				return $data;
		}
		
		function cetak()
		{		
			if ($this->check() == TRUE) 
			{
				
				$data = $this->get_data_for_cetak();
				$data['h2_title'] = 'Data Izin Gangguan';
				$data['main_view'] = 'izin_sig/cetakizin_sig_preview';
				$data['link'] = site_url('cetak_sig/cetak');
				$data['title']	= "Preview Surat Izin Gangguan";
				$data['button']	= 'Input Data';
				$data['statusCetak'] = site_url('cetak_sig/cetak_detail');
				$data['back']	= site_url('cetak_sig');
				$data['url_cetak'] =  site_url('cetak_sig/cetakAsli');
				$data['title']	= "Pencetakan Izin Gangguan";
				$this->load->view('template', $data);
			
			}
			else {
				redirect('login');
			}
		}
		function cetakAsli() {
		
				$data = $this->get_data_for_cetak();
				$data['h2_title'] = 'Data Izin Gangguan';
				$data['main_view'] = 'izin_sig/cetakizin_sig';
				$data['link'] = site_url('cetak_sig/cetakAsli');
				
				$data['button']	= 'Input Data';
				$data['statusCetak'] = site_url('cetak_sig/cetak_detail');
				$data['back']	= site_url('cetak_sig');
				//ubah status registrasinya menjadi 2
				$no_reg = $data['no_reg'];
				$dataRegistrasi = array(
						'status_reg' => 2
					);
			#	$this->registrasi->update_registrasi($no_reg, $dataRegistrasi);
				$noIzin = $data['all']->no_izin;
				//Tambahkan Blanko
				$dataBlangko= array(
						'id_jnsizin' => '02',
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
				$this->load->view('izin_sig/cetakizin_sig', $data);
				
		}
		
	}

?> 
