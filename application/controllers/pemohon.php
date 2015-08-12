<?php




	class Pemohon extends CI_Controller
	{	
		function __construct()
		{
			parent::__construct();
			
			$this->load->model('pemohon_model','pemohon',TRUE);
			
		
			
		}
		var $title = 'pemohon';
		var $limit = 15;
		
		
		/*
		function checkAkses($module,$level)
		{
			$idSubModule = $this->submodule_model->another_where($module);
			$idSubmodule =  $idSubModule->idSubmodule;
			if ($this->rules_model->get_data_by_idLevel_module($this->session->userdata('levelId'), $idSubmodule) > 0)
			{
				$this->session->set_userdata('aksesModule', TRUE);
				return TRUE;;
			}
			
		}
		*/
		
		function index()
		{
			
			
				$data['title'] = $this->title;
				$data['h2_title'] = 'Data Pemohon';
				$data['main_view'] = 'pemohon';
				$data['search']	= site_url('pemohon/search_process');
				//offset
				$uri_segment	= 3;
				$offset			= $this->uri->segment($uri_segment);
			
				$data['query']  = $this->pemohon->get_all()->result();
				$data['jumlah'] = $this->pemohon->get_all_data();
			
				//link untuk menuju ke halaman tambah data
				$data['link'] = site_url('pemohon/add');
			
				//meload view
				$this->load->view('template', $data);
			
					
		}
		
		
		//fungsi untuk tambah data
		function add()
		{
		
				//disini hanyalah melengkapi item item yang nantinya akan ditampilkan di halaman tambah data seperti, judul, nama link, dll
			
			
				//file viewnya ada di suratmasuk/surat_form.php
				$data['main_view'] = 'pemohon_form';
				$data['form_action'] = site_url('pemohon/add_process');
				$data['linkBack'] = site_url('pemohon');
				$data['button']	= 'Input Data';
			
				//load file viewnya
				$this->load->view('template', $data);
			
		
		}		
		
		
		function valid_id($id) {
					if ($this->login->get_all_data_by_id($id) > 0) {
								$this->form_validation->set_message('valid_id', "Pegawai dengan ID User $id sudah terdaftar Sebelumnya");	
								return FALSE;
						}
					else {
							
							return TRUE;
					}
		}
		
		
		//fungsi untuk proses penambahan datanya 
		function add_process()
		{
		
		
			
				//disini hanyalah melengkapi item item yang nantinya akan ditampilkan di halaman tambah data seperti, judul, nama link, dll
				$data['title'] = $this->title;
				$data['h2_title'] = 'Data Pemohon > Tambah Data Pemohon'; 
			
				
				
			
				$data['main_view'] = 'pemohon_form';
				$data['form_action'] = site_url('pemohon/add_process');
				$data['linkBack'] = site_url('pemohon');
				$data['button']	= 'Input Data';
			
				//mengeset validasinya
				$this->form_validation->set_rules('ktpPemohon','Nomor KTP Pemohon','required');
				$this->form_validation->set_rules('namaPemohon', 'Nama Lengkap Pemohon', 'required');
				
				if ($this->form_validation->run() == TRUE)
				{
					$idPemohon = $this->input->post('idPemohon');
					$ktpPemohon = $this->input->post('ktpPemohon');			
					$tanggalDaftar = $this->input->post('tanggalDaftar');
					$namaPemohon = $this->input->post('namaPemohon');
					$alamatPemohon = $this->input->post('alamatPemohon');
					$noTelp = $this->input->post('noTelp');
					$email = $this->input->post('email');
					
					$dataPemohon = array(
					    
					    'id_pemohon'	=> $idPemohon,
								'ktp_pemohon'	=> $ktpPemohon,
								'tgl_daftar'	=> $tanggalDaftar,
								'nm_pemohon'	=> $namaPemohon,
								'alm_pemohon'	=> $alamatPemohon,
								'hp_pemohon'	=> $noTelp,
								'mail_pemohon'	=> $email
					    
					);
				
				$this->pemohon->add($dataPemohon);
				$this->session->set_flashdata('sukses', 'Satu Data Pemohon telah berhasil ditambahkan');
				redirect('pemohon');
			}
			
			else
			{
				$this->load->view('template', $data);
			}
			
		
		}
		

		function update($id)
		{
			
				//disini hanyalah melengkapi item item yang nantinya akan ditampilkan di halaman tambah data seperti, judul, nama link, dll
			
			
				$data['main_view'] = 'pemohon_form';
				$data['form_action'] = site_url('pemohon/update_process');
				$data['linkBack'] = site_url('pemohon');
				$data['button']	= 'Update Data';
			
				$datanya = $this->pemohon->get_data_by_id($id);
				//buat session untuk menyimpan data primary key
				$this->session->set_userdata('id', $datanya->id_pemohon);
			
		
			
				//data untuk mengisi field2 form
				$data['default']['idPemohon'] = $datanya->id_pemohon;
				
				$data['default']['namaPemohon']   = $datanya->nm_pemohon;
				$data['default']['tanggalDaftar']   = $datanya->tgl_daftar;
				$data['default']['alamatPemohon']   = $datanya->alm_pemohon;
				$data['default']['ktpPemohon']   = $datanya->ktp_pemohon;
				$data['default']['noTelp']   = $datanya->hp_pemohon;
				$data['default']['email']   = $datanya->mail_pemohon;
				$this->load->view('template', $data);
			
		}
		
		
		
		function update_process()
		{
			
			
			
				$data['main_view'] = 'pemohon_form';
				$data['form_action'] = site_url('pemohon/update_process');
				$data['linkBack'] = site_url('pemohon');
				$data['button']	= 'Update Data';
			
				$id = $this->session->userdata('id');
				$datanya = $this->pemohon->get_data_by_id($id);
				//buat session untuk menyimpan data primary key
				$this->session->set_userdata('id', $datanya->id_pemohon);
			
		
			
				//data untuk mengisi field2 form
				$data['default']['idPemohon'] = $datanya->id_pemohon;
				
				$data['default']['namaPemohon']   = $datanya->nm_pemohon;
				$data['default']['tanggalDaftar']   = $datanya->tgl_daftar;
				$data['default']['alamatPemohon']   = $datanya->alm_pemohon;
				$data['default']['ktpPemohon']   = $datanya->ktp_pemohon;
				$data['default']['noTelp']   = $datanya->hp_pemohon;
				$data['default']['email']   = $datanya->mail_pemohon;
				$this->load->view('template', $data);
				
				
				
				//mengeset validasinya
				$this->form_validation->set_rules('ktpPemohon','Nomor KTP Pemohon','required');
				$this->form_validation->set_rules('namaPemohon', 'Nama Lengkap Pemohon', 'required');
				
				if ($this->form_validation->run() == TRUE)
				{
					$idPemohon = $this->input->post('idPemohon');
					$ktpPemohon = $this->input->post('ktpPemohon');			
					$tanggalDaftar = $this->input->post('tanggalDaftar');
					$namaPemohon = $this->input->post('namaPemohon');
					$alamatPemohon = $this->input->post('alamatPemohon');
					$noTelp = $this->input->post('noTelp');
					$email = $this->input->post('email');
					
					$dataPemohon = array(
					    
					    'id_pemohon'	=> $idPemohon,
								'ktp_pemohon'	=> $ktpPemohon,
								'tgl_daftar'	=> $tanggalDaftar,
								'nm_pemohon'	=> $namaPemohon,
								'alm_pemohon'	=> $alamatPemohon,
								'hp_pemohon'	=> $noTelp,
								'mail_pemohon'	=> $email
					    
					);
					
						
					
					$this->pemohon->update($id, $dataPemohon);
					$this->session->set_flashdata('sukses', 'Satu Data Pemohon telah berhasil diubah');
					redirect('pemohon');
				}
				
				else
				{
					$this->load->view('template', $data);
				}
			
			
		}
		
		
		
		
	}

?> 

								