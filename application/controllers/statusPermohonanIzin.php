<?php

	class StatusPermohonanIzin extends CI_Controller {
		
		
		function __construct() {
			parent::__construct();
			$this->load->model('registrasi_model','registrasi',TRUE);
			$this->load->model('referensi_model','referensi',TRUE);
			$this->load->model('rekapizin_model','rekap', TRUE);
			$this->load->library('libraryku');
		}
		
		var $title = 'report_table';
		var $limit = 100;
		
		
		function index($offset=0) {
			$data['title']	= "Report Perizinan";
			$data['main_view']  = "ubahStatus/ubahStatusIzin";
			
			$uri_segment = 3;
			
			$data['search']	= site_url('statusPermohonanIzin/search');
			//untuk menampilkan  jenis izin
			
			$jenis_izin = $this->registrasi->get_data_jenis_izin()->result();
			foreach($jenis_izin as $row) {
					$data['jenis_izin'][''] = "--Pilih Jenis Izin--";
					$data['jenis_izin'][$row->id_jnsizin] = $row->nm_izin;
				}
			
			$data['query']	= $this->rekap->get_all($this->limit, $offset)->result();
			
			$config = array(
				'base_url' => site_url('statusPermohonanIzin/index'),
				'total_rows'	=> $this->rekap->get_all_data(),
				'per_page'	=> $this->limit,
				'uri_segment'	=> $uri_segment
			);
			
			$this->pagination->initialize($config);
			$data['pagination']	= $this->pagination->create_links();
			
			
			
			
				
			$this->load->view('template', $data);
		}
		
		
		function search() {
		
			$jenis_izin = $this->registrasi->get_data_jenis_izin()->result();
			foreach($jenis_izin as $row) {
					$data['jenis_izin'][''] = "--Pilih Jenis Izin--";
					$data['jenis_izin'][$row->id_jnsizin] = $row->nm_izin;
			}
			
			$jenis_izin = $this->input->post('jenis_izin');
			$status_izin = $this->input->post('status_izin');
			$mulai = $this->input->post('mulai');
			$selesai=$this->input->post('selesai');
			#echo $mulai;
			#echo $selesai;
			
			$data['title'] = 'Report Perizinan';
			$data['main_view'] = 'report/report_tabel';
			$data['search']	= site_url('report_tabel/search');
			$data['query']	= $this->rekap->get_all_search($jenis_izin, $status_izin, $mulai, $selesai)->result();
			$data['jumlah'] =  $this->rekap->get_all_data_search($jenis_izin, $status_izin, $mulai, $selesai);
			$data['pagination'] = "";
			$this->load->view('template', $data);
		}
		
		
		function ubahIzin($id) {
			$id = $this->enkrip->decode($id);
			$this->session->set_userdata('noIzin');
			$data['title']	= "Ubah Status Izin";
			#echo $id;
			#$jum = $this->rekap->get_all_data_search($id,'','','','');
			$datanya = $this->rekap->get_all_search($id,'','','','')->row();
			$data['main_view']	= 'ubahStatus/ubahStatus';
			$data['form_action'] = site_url('statusPermohonanIzin/change');
			$data['no_reg']		= $datanya->no_reg;
			$data['no_reko']	= $datanya->no_reko;
			$data['nm_pemohon'] = $datanya->nm_pemohon;
			$data['no_izin']	= $datanya->no_izin;
			$data['status_reg']	= $datanya->status_reg;
			$data['nm_bdnusaha']= $datanya->nm_bdnusaha;
			
			$data['button']	= "Ubah Status Izin";
			$this->load->view('template', $data);
		}
		
		
		function change() {
			$noReg = $this->input->post('no_reg');
			$statusReg = $this->input->post('statusReg');
			$ubahStatus = $this->input->post('ubahStatus');
			$dataRegistrasi = array(
				'status_reg'	=> $ubahStatus
			);
			$alasan = $this->input->post('alasan');
			$noIzin = $this->session->userdata('noIzin');
			
			$dataUbahStatus = array(
				'no_reg'	=> $noReg,
				'status_1'	=> $statusReg,
				'status_2'	=> $ubahStatus,
				'alasan'		=> $alasan,
				'tgl_ubah'	=> date('Y-m-d')
			);
			if ($statusReg != $ubahStatus) {
				$this->registrasi->update_registrasi($noReg, $dataRegistrasi);
				$this->referensi->addUbahStatus($dataUbahStatus);
				$this->session->set_flashdata('statusSuccess', "Status Izin telah diubah");
			}
			
			redirect('statusPermohonanIzin');
			
			
		}
		
		
		function ubahKeterangan($id) {
			$id = $this->enkrip->decode($id);
			$this->session->set_userdata('noIzin');
			$data['title']	= "Ubah Status Izin";
			
			$datanya = $this->rekap->get_all_search($id,'','','','')->row();
			$data['main_view']	= 'ubahStatus/ubahketeranganizin';
			$data['form_action'] = site_url('statusPermohonanIzin/changeKeterangan');
			$data['no_reg']		= $datanya->no_reg;
			$data['no_reko']	= $datanya->no_reko;
			$data['nm_pemohon'] = $datanya->nm_pemohon;
			$data['no_izin']	= $datanya->no_izin;
			$data['status_reg']	= $datanya->status_reg;
			$data['nm_bdnusaha']= $datanya->nm_bdnusaha;
			//untuk data status izin
			$statusIzin = array('1' => 'Normal/Berlaku', '2' => 'Tidak Berlaku/Belum Diperbaharui / Belum Diperpanjang', '3' => 'Dikenai Sanksi / dibekukan', '4' => 'Ditutup/Dicabut');
				foreach($statusIzin as $row => $value) {
					
					$data['status'][$row] = $value;
					
			}
			$data['button']	= "Ubah Status Izin";
			$this->load->view('template', $data);
		}
		
		function changeKeterangan() {
			$id = $this->session->userdata('noIzin');
			$data['title']	= "Ubah Status Izin";
			
			$datanya = $this->rekap->get_all_search($id,'','','','')->row();
			$data['main_view']	= 'ubahStatus/ubahketeranganizin';
			$data['form_action'] = site_url('statusPermohonanIzin/changeKeterangan');
			$data['no_reg']		= $datanya->no_reg;
			$data['no_reko']	= $datanya->no_reko;
			$data['nm_pemohon'] = $datanya->nm_pemohon;
			$data['hp_pemohon']		= $datanya->hp_pemohon;
			$data['no_izin']	= $datanya->no_izin;
			$data['status_reg']	= $datanya->status_reg;
			$data['nm_bdnusaha']= $datanya->nm_bdnusaha;
			$data['button']	= 'Ubah Data';
			//untuk data status izin
			$statusIzin = array('1' => 'Normal/Berlaku', '2' => 'Tidak Berlaku/Belum Diperbaharui / Belum Diperpanjang', '3' => 'Dikenai Sanksi / dibekukan', '4' => 'Ditutup/Dicabut');
				foreach($statusIzin as $row => $value) {
					
					$data['status'][$row] = $value;
					
			}
			
			
			$this->form_validation->set_rules('statusIzin','Status Izin','required');
			$this->form_validation->set_rules('keterangan','Keterangan','required');
			$hp_pemohon = $data['hp_pemohon'];
			if ($this->form_validation->run() == TRUE) {
				$statusIzin = $this->input->post('statusIzin');
				$keterangan = $this->input->post('keterangan');
				if ($statusIzin != 1) {
					$statusIzinz = array('2' => 'Tidak Berlaku/Belum Diperbaharui / Belum Diperpanjang', '3' => 'Dikenai Sanksi / dibekukan', '4' => 'Ditutup/Dicabut');
					foreach($statusIzinz as $row => $value) {
					
						
						if ($row == $statusIzin) {
							if ($hp_pemohon != NULL OR $hp_pemohon != '') {
								
								$message =  "$value ,$keterangan sent to $hp_pemohon $keterangan ";
								$data_message = array(
									'DestinationNumber' => $hp_pemohon,
									'TextDecoded'		=> $message,
									'SenderID'			=> '',
									'CreatorID'			=> 'Server Devel',
									'Class'				=> '-1'
								);
								$this->referensi->send_message($data_message);
								$this->session->set_flashdata('sent_message', 'Status Perizinan Telah Dikirim ke nomor Pemohon');
					
								redirect('statusPermohonanIzin');
							}
							
						}
					}
				
				}
				$dataIzin = array(
					'sta_izin'	=> $statusIzin,
					'ket_izin'	=> $keterangan
				);
				
			}
			else {
				$this->load->view('template', $data);
			}
		}
		
		
	}
