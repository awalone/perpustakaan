<?php

	class Report_registrasi extends CI_Controller {
		
		
		function __construct() {
			parent::__construct();
			$this->load->model('registrasi_model','registrasi',TRUE);
			$this->load->model('rekapregistrasi_model','rekap', TRUE);
			$this->load->library('libraryku');
		}
		
		var $title = 'report_table';
		var $limit = 15;
		
		
		function index($offset=0) {
			$data['title']	= "Report Perizinan";
			$data['main_view']  = "report/report_registrasi";
			
			$uri_segment = 3;
			
			$data['search']	= site_url('report_registrasi/search');
			//untuk menampilkan  jenis izin
			
			$jenis_izin = $this->registrasi->get_data_jenis_izin()->result();
			foreach($jenis_izin as $row) {
					$data['jenis_izin'][''] = "--Pilih Jenis Izin--";
					$data['jenis_izin'][$row->id_jnsizin] = $row->nm_izin;
				}
			
			$data['query']	= $this->rekap->get_all($this->limit, $offset)->result();
			$data['jumlah'] = $this->rekap->get_all_data();
			
			$config = array(
				'base_url' => site_url('report_registrasi/index'),
				'total_rows'	=> $this->rekap->get_all_data(),
				'per_page'	=> $this->limit,
				'uri_segment'	=> $uri_segment
			);
			
			$this->pagination->initialize($config);
			$data['pagination']	= $this->pagination->create_links();
			
			
			
			
			
			
			
				
			$this->load->view('template', $data);
		}
		
		
		function search() {
		
		
			$data['alamat_pemohon'] = $this->input->post('alamat_pemohon');
			$data['alamat_badan_usaha'] = $this->input->post('alamat');
			$data['telp_bdnusaha']	= $this->input->post('telp_bdnusaha');
			$data['kelurahan'] = $this->input->post('kelurahan');
			$data['kecamatan'] = $this->input->post('kecamatan');
			$data['search']	= site_url('report_registrasi/search');
			
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
			
			if ($jenis_izin != "") {
				//get data detail jenis izin
				$dataIzin = $this->registrasi->get_data_jenis_izin_by_id($jenis_izin);
				$namaIzin = $dataIzin->nm_izin;
				$data['namaIzin']	= $namaIzin;
			}
			
			if ($mulai != "" AND $selesai != "") {
				$data['tanggalCari'] = "( ".$this->libraryku->tanggal($mulai)." s/d ".$this->libraryku->tanggal($selesai). " )";
			}
			
			if ($status_izin != "") {
				if ($status_izin == '0') 
					$data['statusIzin']	= "Yang Belum Ada Rekomendasi ";
				elseif ($status_izin == '1') 
					$data['statusIzin']	= "Yang Sudah Ada Rekomendasi ";
				elseif ($status_izin == '2') 
					$data['statusIzin'] = "Yang Telah Dicetak ";
				else
					$data['statusIzin']	= "Yang Telah Rampung ";
				}
			
			
			$data['title'] = 'Report Perizinan';
			$data['main_view']  = "report/report_registrasi";
			$data['query']	= $this->rekap->get_all_search($jenis_izin, $status_izin, $mulai, $selesai)->result();
			$data['jumlah'] =  $this->rekap->get_all_data_search($jenis_izin, $status_izin, $mulai, $selesai);
			$data['pagination'] = "";
			$this->load->view('template', $data);
		}
		
	}
