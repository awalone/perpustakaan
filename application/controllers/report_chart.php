<?php


	class Report_chart extends CI_Controller {
		function __construct() {
			parent::__construct();
			$this->load->model('registrasi_model','registrasi',TRUE);
			$this->load->model('rekapchart_model','chart',TRUE);
		}
		
		
		function index() {
			
			$jenis_izin = $this->registrasi->get_data_jenis_izin()->result();
			foreach($jenis_izin as $row) {
					$data['jenis_izin'][''] = "--Pilih Jenis Izin--";
					$data['jenis_izin'][$row->id_jnsizin] = $row->nm_izin;
				}

			$jumlah =  $this->chart->get_stat()->num_rows();
			$query  = $this->chart->get_stat()->result();
#			$query2 = $this->chart->get_query_grap();//->result();
			$data['query'] = $query;
			$data['main_view']	= 'report/report_chart';
			$data['title']	= 'Grafik Pendaftar Perizinan';
			$data['search']	= site_url('report_chart/search');
			$data['judul_grap'] = 'Grafik Permohonan Perizinan (Registrasi dan Pengarsipan)';
			/*
			$menu = array();
			foreach($query as $row) {
				$menu[] = $row->menu;
			}
			
			//join 
			$data['aray'] = "'".join("','",$menu)."'";
			
			
			$data['main_view'] = 'report/report_grafik';
			
			$this->load->view('report/report_grafik', $data);
			*/
			
			foreach($query as $row) {
				$data['mariso_registrasi']		 = $row->mariso_registrasi;
				$data['mariso_arsip']	   		 = $row->mariso_arsip;
				$data['mamajang_registrasi']= $row->mamajang_registrasi;
				$data['mamajang_arsip']	   =$row->mamajang_arsip;
				$data['makassar_registrasi']   =$row->makassar_registrasi;
				$data['makassar_arsip']	=$row->makassar_arsip;
				$data['ujungpandang_registrasi']	=$row->ujungpandang_registrasi;
				$data['ujungpandang_arsip']	=$row->ujungpandang_arsip;
				$data['wajo_registrasi']		=$row->wajo_registrasi;
				$data['wajo_arsip']		=$row->wajo_arsip;
				$data['bontoala_registrasi']		=$row->bontoala_registrasi;
				$data['bontoala_arsip']	=$row->bontoala_arsip;
				$data['tallo_registrasi']		=$row->tallo_registrasi;
				$data['tallo_arsip']	=$row->tallo_arsip;
				$data['ujungtanah_registrasi']	=$row->ujungtanah_registrasi;
				$data['ujungtanah_arsip']	=$row->ujungtanah_arsip;
				$data['panakkukang_registrasi']=$row->panakkukang_registrasi;
				$data['panakkukang_arsip']=$row->panakkukang_arsip;
				$data['tamalate_registrasi']	= $row->tamalate_registrasi;
				$data['tamalate_arsip']	= $row->tamalate_arsip;
				$data['biringkanaya_registrasi']	= $row->biringkanaya_registrasi;
				$data['biringkanaya_arsip']= $row->biringkanaya_arsip;
				$data['manggala_registrasi']	= $row->manggala_registrasi;
				$data['manggala_arsip']= $row->manggala_arsip;
				$data['rappocini_registrasi']	= $row->rappocini_registrasi;
				$data['rappocini_arsip']= $row->rappocini_arsip;
				$data['tamalanrea_registrasi']	= $row->tamalanrea_registrasi;
				$data['tamalanrea_arsip']= $row->tamalanrea_arsip;
			}
			;
			$this->load->view('template', $data);
		}
		
		function search() {
			$jenis_izin = $this->registrasi->get_data_jenis_izin()->result();
			foreach($jenis_izin as $row) {
					$data['jenis_izin'][''] = "--Pilih Jenis Izin--";
					$data['jenis_izin'][$row->id_jnsizin] = $row->nm_izin;
			}
			
			$jenis_izin = $this->input->post('jenis_izin');
			$mulai = $this->input->post('mulai');
			$selesai=$this->input->post('selesai');
			
			if(!is_null($mulai) && !is_null($selesai) && $mulai != '' && $selesai != '')
			{
				$text_grap = " Dari Tangal $mulai s/d $selesai";
			}
			else
			{	$mulai = NULL; $selesai = NULL;
				$text_grap = '';
			}
			
			if(!is_null($jenis_izin) && $jenis_izin != '')
			{
				$text_izin = " ";
			}
			else
			{	$jenis_izin = NULL;
				$text_izin = '';
			}
				
			$jumlah =  $this->chart->get_stat()->num_rows();
			$query  = $this->chart->get_stat($jenis_izin,$mulai,$selesai)->result();

			#echo $mulai;
			#echo $selesai;
			
			$data['query']	= $query;
			$data['main_view']	= 'report/report_chart';
			$data['title']	= 'Grafik Pendaftar Perizinan';
			$data['search']	= site_url('report_chart/search');


			$data['judul_grap'] = 'Grafik Jumlah Permohonan izin  (Registrasi dan Pengarsipan)'.$text_grap;

			foreach($query as $row) {
				if($row->no_reg == NULL)
				{
					$data['mariso_registrasi']		 = 0;
					$data['mariso_arsip']	   		 = 0;
					$data['mamajang_registrasi']= 0;
					$data['mamajang_arsip']	   =0;
					$data['makassar_registrasi']   =0;
					$data['makassar_arsip']	=0;
					$data['ujungpandang_registrasi']	=0;
					$data['ujungpandang_arsip']	=0;
					$data['wajo_registrasi']		=0;
					$data['wajo_arsip']		=0;
					$data['bontoala_registrasi']		=0;
					$data['bontoala_arsip']	=0;
					$data['tallo_registrasi']		=0;
					$data['tallo_arsip']	=0;
					$data['ujungtanah_registrasi']	=0;
					$data['ujungtanah_arsip']	=0;
					$data['panakkukang_registrasi']=0;
					$data['panakkukang_arsip']=0;
					$data['tamalate_registrasi']	= 0;
					$data['tamalate_arsip']	= 0;
					$data['biringkanaya_registrasi']	= 0;
					$data['biringkanaya_arsip']= 0;
					$data['manggala_registrasi']	=0;
					$data['manggala_arsip']= 0;
					$data['rappocini_registrasi']	= 0;
					$data['rappocini_arsip']= 0;
					$data['tamalanrea_registrasi']	= 0;
					$data['tamalanrea_arsip']= 0;
				
				}
				else
				{
					$data['mariso_registrasi']		 = $row->mariso_registrasi;
					$data['mariso_arsip']	   		 = $row->mariso_arsip;
					$data['mamajang_registrasi']= $row->mamajang_registrasi;
					$data['mamajang_arsip']	   =$row->mamajang_arsip;
					$data['makassar_registrasi']   =$row->makassar_registrasi;
					$data['makassar_arsip']	=$row->makassar_arsip;
					$data['ujungpandang_registrasi']	=$row->ujungpandang_registrasi;
					$data['ujungpandang_arsip']	=$row->ujungpandang_arsip;
					$data['wajo_registrasi']		=$row->wajo_registrasi;
					$data['wajo_arsip']		=$row->wajo_arsip;
					$data['bontoala_registrasi']		=$row->bontoala_registrasi;
					$data['bontoala_arsip']	=$row->bontoala_arsip;
					$data['tallo_registrasi']		=$row->tallo_registrasi;
					$data['tallo_arsip']	=$row->tallo_arsip;
					$data['ujungtanah_registrasi']	=$row->ujungtanah_registrasi;
					$data['ujungtanah_arsip']	=$row->ujungtanah_arsip;
					$data['panakkukang_registrasi']=$row->panakkukang_registrasi;
					$data['panakkukang_arsip']=$row->panakkukang_arsip;
					$data['tamalate_registrasi']	= $row->tamalate_registrasi;
					$data['tamalate_arsip']	= $row->tamalate_arsip;
					$data['biringkanaya_registrasi']	= $row->biringkanaya_registrasi;
					$data['biringkanaya_arsip']= $row->biringkanaya_arsip;
					$data['manggala_registrasi']	= $row->manggala_registrasi;
					$data['manggala_arsip']= $row->manggala_arsip;
					$data['rappocini_registrasi']	= $row->rappocini_registrasi;
					$data['rappocini_arsip']= $row->rappocini_arsip;
					$data['tamalanrea_registrasi']	= $row->tamalanrea_registrasi;
					$data['tamalanrea_arsip']= $row->tamalanrea_arsip;
				}
			}
			

			$this->load->view('template', $data);
		}
		
	}


?>