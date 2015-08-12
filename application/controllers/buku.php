<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buku extends CI_Controller {


	function __construct() {
		parent::__construct();
		$this->load->library('enkrip');
		$this->load->model('buku_model','buku',TRUE);
		$this->load->model('referensi_jenisbuku_model','jenisbuku',TRUE);
		$this->load->library('uploads');
		$this->load->library('libraryku');
	}

	function index()
	{
		if ($this->session->userdata('login') == TRUE) 
		{
			$data['title'] = "Halaman Depan";
			$data['libraryAssets'] = "buku/assets_view";
			$data['fungsiJS'] = "buku/assets_view_script_js";
			$data['query']  = $this->buku->get_all()->result();
			$data['jumlah'] = $this->buku->get_all_data();
			$data['main_view']	= "buku/buku_view";
			$this->load->view('template', $data);
		}
		else {
			redirect('login');
		}
		
		
	}


	function detail($id){
		$data['title'] = "Tambah Buku";
		$data['main_view']	= "buku/buku_view_detail";
		$data['libraryAssets'] = "buku/assets_form";
		$data['fungsiJS'] = "buku/assets_form_script_js";
		$validasi = $this->buku->get_all_data_buku_by_id($id);
		
		if ($validasi > 0) {
					
				
			//untuk data buku
			$datanya	= $this->buku->get_data_by_id($id);
			$data['kode'] = $datanya->buku_kode;
			$data['judul'] = $datanya->buku_judul;
			$data['sinopsis'] = $datanya->buku_sinopsis;
			$data['pengarang'] = $datanya->buku_pengarang;
			$data['penerbit'] = $datanya->buku_penerbit;
			$data['tahun_terbit'] = $datanya->buku_tahun_terbit;
			$data['jumlah_eksemplar'] = $datanya->buku_jumlah_eksemplar;
			$data['stok'] = $datanya->buku_stok;
			$data['isbn'] = $datanya->buku_isbn;
			$data['lokasi'] = $datanya->buku_lokasi_rak;
			$data['jenisbuku']	= $datanya->jenis_buku_nama;
			
			$foto = $datanya->buku_download;
			if ($foto != "")
				$data['foto'] = $foto;
			else
				$data['foto'] = 'unknown.jpg';
			


			$this->load->view('template', $data);
		}

		else {
			redirect('buku');
		}
	}


	function add()
	{
		if ($this->session->userdata('login') == TRUE) 
		{
			$data['title'] = "Tambah Buku";
			$data['libraryAssets'] = "buku/assets_form";
			$data['fungsiJS'] = "buku/assets_form_script_js";
			$data['main_view']	= "buku/buku_form_view";

			//untuk jenis buku
			$jenisbuku = $this->jenisbuku->get_all()->result();
			foreach($jenisbuku as $row)
			{
				$data['jenisbuku']['']	= "--Pilih Jenis/Kategori Buku--";
				$data['jenisbuku'][$row->jenis_buku_id] = $row->jenis_buku_nama;
			}

			$data['form_action'] = site_url('buku/add_process');
			$this->load->view('template', $data);
		}
		else {
			redirect('login');
		}
		
		
	}



	function add_process()
	{
		if ($this->session->userdata('login') == TRUE) 
		{
			$data['title'] = "Tambah Buku";
			$data['libraryAssets'] = "buku/assets_form";
			$data['fungsiJS'] = "buku/assets_form_script_js";
			$data['main_view']	= "buku/buku_form_view";

			//untuk jenis buku
			$jenisbuku = $this->jenisbuku->get_all()->result();
			foreach($jenisbuku as $row)
			{
				$data['jenisbuku']['']	= "--Pilih Jenis/Kategori Buku--";
				$data['jenisbuku'][$row->jenis_buku_id] = $row->jenis_buku_nama;
			}

			$data['form_action'] = site_url('buku/add_process');

			

			$this->form_validation->set_rules('kode','Kode Buku', 'required');
			$this->form_validation->set_rules('jenisbuku','Jenis/Kategori Buku','required');

			if ($this->form_validation->run() == TRUE)
			{
				$kode = $this->input->post('kode');
				$judul = $this->input->post('judul');
				$jenisbuku = $this->input->post('jenisbuku');
				$sinopsis = $this->input->post('sinopsis');
				$pengarang = $this->input->post('pengarang');
				$penerbit = $this->input->post('penerbit');
				$tahun_terbit = $this->input->post('tahun_terbit');
				$jumlah_eksemplar = $this->input->post('jumlah_eksemplar');
				$stok = $this->input->post('stok');
				$isbn = $this->input->post('isbn');
				$lokasi = $this->input->post('lokasi');
				
				//untuk file photo
				$fileName = $_FILES['userfile']['name'];
				$acakadut = rand(00000000,99999999);
				$namaFile = $acakadut.$fileName;
				$path_file = "berkas/buku";

				if ($this->uploads->do_upload($path_file, $namaFile) == TRUE)
				{
					$dataBuku = array(
						'buku_judul'		=> $judul,
						'buku_pengarang'		=> $pengarang,
						'buku_penerbit'=> $penerbit,
						'buku_sinopsis'	=> $sinopsis,
						'buku_tahun_terbit'	=> $tahun_terbit,
						'buku_jumlah_eksemplar'	=> $jumlah_eksemplar,
						'buku_stok'	=> $stok,
						'buku_download'	=> $namaFile,
						'buku_isbn'	=> $isbn,
						'buku_jenis'=> $jenisbuku,
						'buku_lokasi_rak'	=> $lokasi
					);

					//tambahkan di model buku
					$this->buku->add($dataBuku);
					$this->session->set_flashdata('success', 'Satu Data Buku telah berhasil ditambahkan');
					redirect('buku');
				}

				else {
					$data['error_uploads'] = "Terjadi Kesalahan Upload File, Pastikan File yang Anda Upload adalah Valid";
				}
				

			}
			else {
				$this->load->view('template', $data);
			}

		}
		else {
			redirect('login');
		}
		
		
	}

	//untuk halaman edit
		//fungsi untuk ubah data
		function update($id)
		{
			
			
			
			$data['title'] = "Tambah Buku";
			$data['main_view']	= "buku/buku_form_view";
			$data['libraryAssets'] = "buku/assets_form";
			$data['fungsiJS'] = "buku/assets_form_script_js";
			$data['form_action'] = site_url('buku/update_process');
			$this->session->set_userdata('id',$id);
			$datanya	= $this->buku->get_data_by_id($id);
			
			$validasi = $this->buku->get_all_data_buku_by_id($id);
			

			if ($validasi > 0) {
					
					
					
				//untuk data buku
					
				$data['default']['kode'] = $datanya->buku_kode;
				$data['default']['judul'] = $datanya->buku_judul;
				$data['default']['sinopsis'] = $datanya->buku_sinopsis;
				$data['default']['pengarang'] = $datanya->buku_pengarang;
				$data['default']['penerbit'] = $datanya->buku_penerbit;
				$data['default']['tahun_terbit'] = $datanya->buku_tahun_terbit;
				$data['default']['jumlah_eksemplar'] = $datanya->buku_jumlah_eksemplar;
				$data['default']['stok'] = $datanya->buku_stok;
				$data['default']['isbn'] = $datanya->buku_isbn;
				$data['default']['lokasi'] = $datanya->buku_lokasi_rak;
				$data['default']['foto'] = $datanya->buku_download;
				
				//untuk jenis buku
				$jenisbuku = $this->jenisbuku->get_all()->result();
				foreach($jenisbuku as $row)
				{
					if ($datanya->buku_jenis == $row->jenis_buku_id)
					{
						$data['selected'][$row->jenis_buku_id] = $datanya->buku_jenis;
					}
					$data['jenisbuku']['']	= "--Pilih Jenis/Kategori Buku--";
					$data['jenisbuku'][$row->jenis_buku_id] = $row->jenis_buku_nama;
				}


				$this->load->view('template', $data);
			}

			else {
				redirect('buku');
			}
			
		}
		



		//untuk proses update
		function update_process()
		{
			
			$id =  $this->session->userdata('id');
			$data['title'] = "Tambah Buku";
			$data['main_view']	= "buku/buku_form_view";
			$data['libraryAssets'] = "buku/assets_form";
			$data['fungsiJS'] = "buku/assets_form_script_js";
			$data['form_action'] = site_url('buku/update_process');

			
			
			$datanya	= $this->buku->get_data_by_id($id);
			
			
			//untuk data pemohon
					
			$data['default']['kode'] = $datanya->buku_kode;
			$data['default']['judul'] = $datanya->buku_judul;
			$data['default']['sinopsis'] = $datanya->buku_sinopsis;
			$data['default']['pengarang'] = $datanya->buku_pengarang;
			$data['default']['penerbit'] = $datanya->buku_penerbit;
			$data['default']['tahun_terbit'] = $datanya->buku_tahun_terbit;
			$data['default']['jumlah_eksemplar'] = $datanya->buku_jumlah_eksemplar;
			$data['default']['stok'] = $datanya->buku_stok;
			$data['default']['isbn'] = $datanya->buku_isbn;
			$data['default']['lokasi'] = $datanya->buku_lokasi_rak;
			$data['default']['foto'] = $datanya->buku_download;
			//untuk jenis buku
			$jenisbuku = $this->jenisbuku->get_all()->result();
			foreach($jenisbuku as $row)
			{
				if ($datanya->buku_jenis == $row->jenis_buku_id)
				{
					$data['selected'][$row->jenis_buku_id] = $datanya->buku_jenis;
				}
				$data['jenisbuku']['']	= "--Pilih Jenis/Kategori Buku--";
				$data['jenisbuku'][$row->jenis_buku_id] = $row->jenis_buku_nama;
			}
			
			$this->form_validation->set_rules('kode','Kode Buku', 'required');
			$this->form_validation->set_rules('jenisbuku','Jenis/Kategori Buku', 'required');

			if ($this->form_validation->run() == TRUE)
			{
				$kode = $this->input->post('kode');
				$judul = $this->input->post('judul');
				$jenisbuku = $this->input->post('jenisbuku');
				$sinopsis = $this->input->post('sinopsis');
				$pengarang = $this->input->post('pengarang');
				$penerbit = $this->input->post('penerbit');
				$tahun_terbit = $this->input->post('tahun_terbit');
				$jumlah_eksemplar = $this->input->post('jumlah_eksemplar');
				$stok = $this->input->post('stok');
				$isbn = $this->input->post('isbn');
				$lokasi = $this->input->post('lokasi');
				
				//untuk file photo
				$fileName = $_FILES['userfile']['name'];
				$acakadut = rand(00000000,99999999);
				$namaFile = $acakadut.$fileName;
				$path_file = "berkas/buku";

				//kalau ada file yang diupload
				if ($fileName != "")
				{
					if ($this->uploads->do_upload($path_file, $namaFile) == TRUE)
					{
						$dataBuku = array(
							'buku_judul'		=> $judul,
							'buku_jenis'		=> $jenisbuku,
							'buku_pengarang'	=> $pengarang,
							'buku_penerbit'		=> $penerbit,
							'buku_sinopsis'		=> $sinopsis,
							'buku_tahun_terbit'	=> $tahun_terbit,
							'buku_jumlah_eksemplar'	=> $jumlah_eksemplar,
							'buku_stok'			=> $stok,
							'buku_download'		=> $namaFile,
							'buku_isbn'			=> $isbn,
							'buku_lokasi_rak'	=> $lokasi
						);

						//tambahkan di model buku
						$this->buku->update($id,$dataBuku);
						$this->session->set_flashdata('success', 'Satu Data Buku telah berhasil ditambahkan');
						redirect('buku');
					}
				}
				else {
					
					$dataBuku = array(
						'buku_judul'		=> $judul,
						'buku_jenis'		=> $jenisbuku,
						'buku_pengarang'	=> $pengarang,
						'buku_penerbit'		=> $penerbit,
						'buku_sinopsis'		=> $sinopsis,
						'buku_tahun_terbit'	=> $tahun_terbit,
						'buku_jumlah_eksemplar'	=> $jumlah_eksemplar,
						'buku_stok'			=> $stok,
						'buku_isbn'			=> $isbn,
						'buku_lokasi_rak'	=> $lokasi
					);
					
					$this->buku->update($id,$dataBuku);
					$this->session->set_flashdata('success', 'Satu Data Buku telah berhasil ditambahkan');
					redirect('buku');
				}

				

			}
			else {
				$this->load->view('template', $data);
			}

		}

}
