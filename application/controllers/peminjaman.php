<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Peminjaman extends CI_Controller {


	function __construct() {
		parent::__construct();
		$this->load->library('enkrip');
		$this->load->model('buku_model','buku',TRUE);
		$this->load->model('referensi_jenisbuku_model','jenisbuku',TRUE);
		$this->load->model('peminjaman_model','peminjaman',TRUE);
		$this->load->model('anggota_model','anggota',TRUE);
		$this->load->library('uploads');
		$this->load->library('libraryku');
	}

	function index()
	{
		if ($this->session->userdata('login') == TRUE) 
		{
			$data['title'] = "Halaman Depan";
			$data['libraryAssets'] = "peminjaman/assets_view";
			$data['fungsiJS'] = "peminjaman/assets_view_script_js";
			$data['form_action'] = site_url('peminjaman/add_process');
			$data['query']  = $this->peminjaman->get_all()->result();
			$data['jumlah'] = $this->peminjaman->get_all_data();

			//untuk data buku
			$data['buku'] = $this->buku->get_all()->result();
			
			//untuk data anggota
			$data['anggota'] = $this->anggota->get_all()->result();
			
			$data['session_id']= $this->session->userdata('session_id');
			$session_id = $data['session_id'];
			$data['main_view']	= "peminjaman/peminjaman_form_view";
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
			$data['libraryAssets'] = "peminjaman/assets_view";
			$data['fungsiJS'] = "peminjaman/assets_view_script_js";
			$data['main_view'] = "peminjaman/peminjaman_status_buku";
			$data['query']  = $this->peminjaman->get_identitas_peminjaman()->result();
			$data['jumlah'] = $this->peminjaman->get_identitas_peminjaman()->num_rows();

			$this->load->view('template', $data);
		}
		else {
			redirect('login');
		}
		
		
	}


	function add_temp() {
		//parse variabel
		//$kode_anggota = $this->input->post('kode_anggota');
		$kode_buku	  = $this->input->post('kode_buku');
		$session_id   = $this->session->userdata('session_id');
		$dataBuku = array(
		
			'temp_id_buku' => $kode_buku,
			'temp_session'	=> $session_id
		);


		$this->peminjaman->add($dataBuku);
		$data['session_id']= $session_id;
		$this->load->view('peminjaman/data_temp_peminjaman', $data);

	}


	function selesai_temp() {
		
		//$this->peminjaman->add($dataBuku);
		$data['session_id']= $this->session->userdata('session_id');
		$session_id = $data['session_id'];
		$data['form_action'] = site_url('peminjaman/cetak_temp');		
		//untuk data anggota
		$jumlah_temp     = $this->peminjaman->get_all_data_by_session($session_id);
		$data['temp'] = $this->peminjaman->get_data_by_session($session_id)->result();
		$data['main_view']	= "peminjaman/peminjaman_all_temp";
		$this->load->view('template', $data);
		
	}


	function cetak_temp() {

		
		
		//untuk data anggota
		//lakukan penginputan data

		$kode_resi = rand(0000000000,9999999999);
		$tanggal_kembali = $this->input->post('tanggalkembali');
		$tanggal_pinjam  = date('Y-m-d');
		$dataPeminjaman = array(
			'pinjaman_konsumen' => '1',
			'pinjaman_tanggal_pinjam' => $tanggal_pinjam,
			'pinjaman_tanggal_kembali'	=> $tanggal_kembali,
			'pinjaman_jaminan'	=> 'jaminan',
			'pinjaman_kode_unik'	=> $kode_resi
		);
		$this->peminjaman->add_peminjaman($dataPeminjaman);
		$id_orders = mysql_insert_id();
		$this->session->set_userdata('id_orders', $id_orders);
		$querySession = $this->peminjaman->get_data_by_session($this->session->userdata('session_id'))->result();
		foreach($querySession as $row)
		{

			//lakukan insert di tabel 
			$dataPinjamDetail = array(
				'pinjaman_detail_id_order' => $id_orders,
				'pinjaman_detail_buku' => $row->temp_id_buku
			);
			echo $id_orders;
			$this->peminjaman->add_pinjam_detail($dataPinjamDetail);
		}

		//lakukan penghapusan data di tabel session
		$this->peminjaman->delete_session($this->session->userdata('session_id()'));
		redirect('peminjaman/halamanCetak');

	}

	function halamanCetak() {

		//$id_orders = $this->session->userdata('id_orders');
		$data['id_orders'] = $this->session->userdata('id_orders');
		
		//bersiap untuk mengurangi counter jumlah buku di tabel buku...

		$this->load->view('peminjaman/halamanCetak', $data);
	}

	

	

}
