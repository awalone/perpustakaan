<?php




	class Arsip_sipl extends CI_Controller
	{	
		function __construct()
		{
			parent::__construct();
			
			$this->load->model('Izin_sipl_model','izin',TRUE);
			$this->load->model('aksesmodule_model','akses',TRUE);
			$this->load->model('referensi_model','referensi',TRUE);
			$this->load->model('Registrasi_model','registrasi',TRUE);
			$this->load->model('Arsip_model','arsip',TRUE);
			$this->load->library('libraryku');
			$this->load->library('uploads');
			
		}
		var $title = 'arsip_sipl';
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
				$data['title'] = $this->title;
				$uri_segment = 3;
				$data['h2_title'] = 'Data Perizinan sipl';
				$data['main_view'] = 'izin_sipl/arsip_sipl';
				$data['query'] = $this->izin->get_all_cetak($this->limit, $offset)->result();
				$data['jumlah'] = $this->izin->get_all_data_cetak();
				$config = array(
					'base_url'	=> site_url('izin_sipl/tampil'),
					'total_rows'=> $this->izin->get_all_data_cetak(),
					'per_page'	=> $this->limit,
					'uri_segment' => $uri_segment
				);
				$this->pagination->initialize($config);
				
				$data['pagination'] = $this->pagination->create_links();
				$data['button']	= 'Input Data';
				$data['statusArsip'] = site_url('arsip_sipl/arsip_detail');
				$data['search']	= site_url('arsip_sipl/search_process');
				
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
				$data['title'] = $this->title;
				$data['h2_title'] = 'Data izin sipl';
				$data['main_view'] = 'izin_sipl/arsip_sipl';
				$data['search']	= site_url('arsip_sipl/search_process');
				
				$data['query'] = $this->izin->get_all_cetak_by_id($keyword)->result();

				$jumlah = $this->izin->get_all_data_cetak($keyword);
				
				if ($jumlah > 0) {
					$data['found'] = "ditemukan sebanyak $jumlah data perizinan dengan keyword $keyword";
				}
				else {
					$data['notfound']	= "Data Tidak Ditemukan !";
					$this->session->set_flashdata('notfound', 'data tidak ditemukan');
				}
				$data['jumlah'] = $jumlah;
				
				$data['pagination']	= "";
				$data['statusArsip'] = site_url('arsip_sipl/arsip_detail');

				$data['back']	= site_url('arsip_sipl');
				
				$this->load->view('template', $data);
			}
			else {
				redirect('login');
			}
		}
		
		
		
		function view_arsip($id) {
			if ($this->check() == TRUE) 
			{
				$id = $this->enkrip->decode($id);
				$data['title'] = $this->title;
				$data['button'] = 'Upload Berkas';
				$data['main_view']	= 'izin_sipl/arsip_view';
				//dapatkan data gambarnya
				$data_reko = $this->arsip->get_data_reko_by_id($id);
				$data['gambarReko'] = $data_reko->nama_file;
				$data['gambarThumbReko'] = $data_reko->thumb_file;
				$data['letakReko']  = $data_reko->path_file;
				
				//dapatkan data gambar surat izin
				$data_izin = $this->arsip->get_data_izin_by_id($id);
				$data['gambarIzin'] = $data_izin->nama_file;
				$data['gambarThumbIzin'] = $data_izin->thumb_file;
				$data['letakIzin']	= $data_izin->path_file;
				
			
				
				$this->load->view('template', $data);
			}
			else {
				redirect('login');
			}
		}
		
		
		function arsip_detail($tipe,$id) {
			if ($this->check() == TRUE) 
			{	
				$id = $this->enkrip->decode($id);
				$data['title'] = $this->title;
				$data['form_action'] = site_url('arsip_sipl/add_process');
				$data['button'] = 'Upload Berkas';
				
				$this->session->set_userdata('no_izin', $id);
				
				$this->session->set_userdata('tipe',$tipe);
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
				
				
				if ($tipe == 0)
				{
					$data['tipe_arsip'][0] = 'Rekomendasi';
				} else if ($tipe == 1) {
					$data['tipe_arsip'][1] = 'Perizinan';
				}
				
				
				$data['h2_title']	= "Pengarsipan Izin Mendirikan Bangunan";
				$data['main_view']	= 'izin_sipl/arsip_form';
				
				//untuk nomor izin
				$this->session->set_userdata('no_reg', $datanya->no_reg);
				
				$this->load->view('template', $data);
			}
			else {
				redirect('login');
			}
		}
		
		
		function add_process() {
			
			if ($this->check() == TRUE) 
			{
			
				$data['h2_title']	= "Pengarsipan Izin Mendirikan Bangunan";
				$data['main_view']	= 'izin_sipl/arsip_form';
				$id = $this->session->userdata('no_izin');
				$tipe = $this->session->userdata('tipe');
				$data['title'] = $this->title;
				$data['form_action'] = site_url('arsip_sipl/add_process');
				$data['button'] = 'Upload Berkas';
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
					
				$hp_pemohon = $datanya->hp_pemohon;
				if ($tipe == 0)
				{
					$data['tipe_arsip'][0] = 'Rekomendasi';
				} else if ($tipe == 1) {
					$data['tipe_arsip'][1] = 'Perizinan';
				}
				//set validasi
				$this->form_validation->set_rules('jenisArsip','Jenis Arsip','required');
				if ($this->form_validation->run() == TRUE) {
					
					$noIzin   = $this->session->userdata('no_izin');
					$tipe_arsip = $this->input->post('jenisArsip');
					$tgl_arsip = date('Y-m-d H:i:s');
				
					$tanggal = date('Y-m-d');
					$tgl = substr($tanggal,8,2);
					$bulan = substr($tanggal,5,2);
					$tahun = substr($tanggal,0,4);
					
					//create path
					$this->libraryku->create_path($tipe_arsip,'sipl',$tahun,$bulan,$tgl);
					
					if ($tipe_arsip == "1") 
						$type = "izin";
					else
						$type = "reko";
					
					$fileName = $_FILES['userfile']['name'];
					$acakadut = rand(00000000,99999999);
					$namaFile = $acakadut.$fileName;
					
					
					$path_file = "arsip/$type/sipl/$tahun/$bulan/$tgl";
					
					if ($this->uploads->do_upload($path_file, $namaFile) == TRUE) {
						
						$detil1 = getimagesize($_FILES['userfile']['tmp_name']);
						
						$this->session->set_userdata('nama_file', $namaFile);
						$width = $detil1[0];
						$height= $detil1[1];
						$size = $width*$height;
						$data_arsip = array(
							'tipe_arsip'	=> $tipe_arsip,
							'no_izin'		=> $noIzin,
							'ptgs_arsip'	=> $this->session->userdata('namaLengkap'),
							'tgl_arsip'		=> $tgl_arsip,
							'path_file'		=> $path_file,
							'thumb_file'	=> 'thumb_'.$namaFile,
							'nama_file'		=> $namaFile,
							'size_file'		=> $size
						);
						$this->arsip->add_arsip($data_arsip);
						$no_reg = $this->session->userdata('no_reg');
						
						$jumlahArsip = $this->arsip->check_arsip($noIzin);
						
						echo $jumlahArsip;
						
						if ($jumlahArsip > 1) {
						
							$dataRegistrasi = array(
								'status_reg' => 3
							);
							$this->registrasi->update_registrasi($no_reg, $dataRegistrasi);
							
							if ($hp_pemohon != NULL AND $hp_pemohon != '') {
								$message =  "Arsip Anda Telah Rampung";
								$data_message = array(
									'DestinationNumber' => $hp_pemohon,
									'TextDecoded'		=> $message,
									'SenderID'			=> '',
									'CreatorID'			=> 'Server Devel',
									'Class'				=> '-1'
								);
								$this->referensi->send_message($data_message);
								$this->session->set_flashdata('sent_message', 'Status Berkas Telah Dikirim ke nomor Pemohon');
					
								
							}
							$pesan =  "melakukan proses Pengarsipan Surat Izin dengan Nomor Izin $noIzin";
							$dataLog = array(
								'id_user'	=> $this->session->userdata('idUser'),
								'tgl_log'	=> date('Y-m-d H:i:s'),
								'aktivitas_log' => $pesan
							);
							$this->referensi->addLog($dataLog); //masukkan data aktivitas ke tabel log
						
						}
						redirect('arsip_sipl');
					}
					
					else {
						$data['error_uploads'] = "Terjadi Kesalahan Upload File, Pastikan File yang Anda Upload adalah Valid";
						$this->load->view('template', $data);
					}
					
					
					
				}
				else {
					$this->load->view('template', $data);
				}
			} else {
				redirect('login');
			}
			
			
		}
		
		
		
		
	}

?> 
