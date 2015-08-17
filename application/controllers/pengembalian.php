<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengembalian extends CI_Controller {


	function __construct() {
		parent::__construct();
		$this->load->library('enkrip');
		$this->load->model('buku_model','buku',TRUE);
		$this->load->model('referensi_jenisbuku_model','jenisbuku',TRUE);
		$this->load->model('pengembalian_model','pengembalian',TRUE);
		$this->load->model('anggota_model','anggota',TRUE);
		$this->load->library('uploads');
		$this->load->library('libraryku');
	}

	function index()
	{
		if ($this->session->userdata('login') == TRUE) 
		{
			$data['title'] = "Halaman Depan";
			$data['libraryAssets'] = "pengembalian/assets_view";
			$data['fungsiJS'] = "pengembalian/assets_view_script_js";
			$data['form_action'] = site_url('pengembalian/add_process');
			$data['query']  = $this->pengembalian->get_all()->result();
			$data['jumlah'] = $this->pengembalian->get_all_data();

			//untuk data buku
			$data['buku'] = $this->buku->get_all()->result();
			
			//untuk data anggota
			$data['anggota'] = $this->anggota->get_all()->result();
			
			$data['session_id']= $this->session->userdata('session_id');
			$session_id = $data['session_id'];
			$data['main_view']	= "pengembalian/pengembalian_form_view";
			$this->load->view('template', $data);
		}
		else {
			redirect('login');
		}
		
		
	}


	function status_buku()
	{
		if ($this->session->userdata('login') == TRUE) 
		{
			$data['title'] = "Halaman Depan";
			$data['libraryAssets'] = "pengembalian/assets_view";
			$data['fungsiJS'] = "pengembalian/assets_view_script_js";
			$data['main_view'] = "pengembalian/pengembalian_status_buku";
			$data['query']  = $this->pengembalian->get_identitas_pengembalian()->result();
			$data['jumlah'] = $this->pengembalian->get_identitas_pengembalian()->num_rows();

			$this->load->view('template', $data);
		}
		else {
			redirect('login');
		}
		
		
	}


	function cari_buku() {
		//parse variabel
		//$kode_anggota = $this->input->post('kode_anggota');
		//$kode_peminjaman	  = $this->input->post('kode_peminjaman');
		$kode_peminjaman	  = $this->input->post('kode_peminjaman');
		$this->session->set_userdata('kode_peminjaman', $kode_peminjaman);
		$data['jumlah']     = $this->pengembalian->get_identitas_peminjaman_by_kode_unik($kode_peminjaman)->num_rows;
		$data['query'] = $this->pengembalian->get_identitas_peminjaman_by_kode_unik($kode_peminjaman)->result();
		
		$this->load->view('pengembalian/data_temp_pengembalian', $data);

	}


	function ubah_status() {
		
		$detail_buku	  = $this->input->post('kode_peminjaman');
		$kode_peminjaman = $this->session->userdata('kode_peminjaman');
		$date_now = date('Y-m-d');
		$data_status = array(
			'status_buku'	=> 'kembali',
			'pinjaman_tgl_kembali'	=> $date_now
		);
		//hapus datanya
		$this->pengembalian->ubah_status($detail_buku, $data_status);
		
		$data['jumlah']     = $this->pengembalian->get_identitas_peminjaman_by_kode_unik($kode_peminjaman)->num_rows;
		$data['query'] = $this->pengembalian->get_identitas_peminjaman_by_kode_unik($kode_peminjaman)->result();
		
	
		$this->load->view('pengembalian/data_temp_pengembalian', $data);
		
	}


	function cetak_temp() {

		
		
		//untuk data anggota
		//lakukan penginputan data

		$kode_resi = rand(0000000000,9999999999);
		$tanggal_kembali = $this->input->post('tanggalkembali');
		$tanggal_pinjam  = date('Y-m-d');
		$datapengembalian = array(
			'pinjaman_konsumen' => '1',
			'pinjaman_tanggal_pinjam' => $tanggal_pinjam,
			'pinjaman_tanggal_kembali'	=> $tanggal_kembali,
			'pinjaman_jaminan'	=> 'jaminan',
			'pinjaman_kode_unik'	=> $kode_resi
		);
		$this->pengembalian->add_pengembalian($datapengembalian);
		$id_orders = mysql_insert_id();
		$this->session->set_userdata('id_orders', $id_orders);
		$querySession = $this->pengembalian->get_data_by_session($this->session->userdata('session_id'))->result();
		foreach($querySession as $row)
		{

			//lakukan insert di tabel 
			$dataPinjamDetail = array(
				'pinjaman_detail_id_order' => $id_orders,
				'pinjaman_detail_buku' => $row->temp_id_buku
			);
			echo $id_orders;
			$this->pengembalian->add_pinjam_detail($dataPinjamDetail);
		}

		//lakukan penghapusan data di tabel session
		$this->pengembalian->delete_session($this->session->userdata('session_id()'));
		redirect('pengembalian/halamanCetak');

	}

	function halamanCetak() {

		//$id_orders = $this->session->userdata('id_orders');
		$data['id_orders'] = $this->session->userdata('id_orders');
		
		//bersiap untuk mengurangi counter jumlah buku di tabel buku...

		$this->load->view('pengembalian/halamanCetak', $data);
	}

	

	

}
