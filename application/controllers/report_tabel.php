<?php

	class Report_tabel extends CI_Controller {
		
		
		function __construct() {
			parent::__construct();
			$this->load->model('registrasi_model','registrasi',TRUE);
			$this->load->model('rekapizin_model','rekap', TRUE);
			$this->load->library('libraryku');
		}
		
		var $title = 'report_table';
		var $limit = 15;
		
		
		function index($offset=0) {
			$data['title']	= "Report Perizinan";
			$data['main_view']  = "report/report_tabel";
			
			$uri_segment = 3;
			
			$data['search']	= site_url('report_tabel/search');
			//untuk menampilkan  jenis izin
			
			$jenis_izin = $this->registrasi->get_data_jenis_izin()->result();
			foreach($jenis_izin as $row) {
					$data['jenis_izin'][''] = "--Pilih Jenis Izin--";
					$data['jenis_izin'][$row->id_jnsizin] = $row->nm_izin;
				}
			
			$data['query']	= $this->rekap->get_all($this->limit, $offset)->result();
			
			$config = array(
				'base_url' => site_url('report_tabel/index'),
				'total_rows'	=> $this->rekap->get_all_data(),
				'per_page'	=> $this->limit,
				'uri_segment'	=> $uri_segment
			);
			
			$this->pagination->initialize($config);
			$data['pagination']	= $this->pagination->create_links();
			
			
			
			
				
			$this->load->view('template', $data);
		}
		
		
		function search() {
		
			$kelurahan = $this->input->post('kelurahan');
			$kecamatan = $this->input->post('kecamatan');
			$telp_bdnusaha = $this->input->post('telp_bdnusaha');
			$alamat = $this->input->post('alamat');
			$nomor_reko = $this->input->post('nomor_reko');
			$alamat = $this->input->post('alamat');
			$data['kelurahan']	= $kelurahan;
			$data['kecamatan']	= $kecamatan;
			$data['telp_bdnusaha']	= $telp_bdnusaha;
			$data['alamat']	= $alamat;
			$data['nomor_reko']	= $nomor_reko;
			
		
			$jenis_izin = $this->registrasi->get_data_jenis_izin()->result();
			foreach($jenis_izin as $row) {
					$data['jenis_izin'][''] = "--Pilih Jenis Izin--";
					$data['jenis_izin'][$row->id_jnsizin] = $row->nm_izin;
			}
			
			$jenis_izin = $this->input->post('jenis_izin');
			$status_izin = $this->input->post('status_izin');
			$mulai = $this->input->post('mulai');
			$letakBangunan = $this->input->post('letakBangunan');
			$selesai=$this->input->post('selesai');
			#echo $mulai;
			#echo $selesai;
			if ($jenis_izin != "") {
				//get data detail jenis izin
				$dataIzin = $this->registrasi->get_data_jenis_izin_by_id($jenis_izin);
				$namaIzin = $dataIzin->nm_izin;
				$data['namaIzin']	= $namaIzin;
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
			
			if ($mulai != "" AND $selesai != "") {
				$data['tanggalCari'] = "( ".$this->libraryku->tanggal($mulai)." s/d ".$this->libraryku->tanggal($selesai). " )";
			}
			
			$data['title'] = 'Report Perizinan';
			$data['main_view'] = 'report/report_tabel';
			$data['search']	= site_url('report_tabel/search');
			$data['query']	= $this->rekap->get_all_search($jenis_izin, $status_izin, $mulai, $selesai,$letakBangunan)->result();
			$data['jumlah'] =  $this->rekap->get_all_data_search($jenis_izin, $status_izin, $mulai, $selesai,$letakBangunan);
			$data['pagination'] = "";
			
			$this->load->view('template', $data);
		}
		
	}
