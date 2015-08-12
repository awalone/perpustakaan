<?php




	class Kecamatan extends CI_Controller
	{	
		function __construct()
		{
			parent::__construct();
			
			$this->load->model('kecamatan_model','kecamatan',TRUE);
			
			
		}
		var $title = 'Ref. Kecamatan';
		var $limit = 5;
		
		function index()
		{
			
					$this->get_all();
					
		}
		
		
		
		
		
		
		//tampilkan semua data surat
		function get_all()
		{
			$data['title'] = $this->title;
			$data['h2_title'] = 'Referensi Kecamatan';
			$data['main_view'] = 'kecamatan/kecamatan';
			$data['search']	= site_url('kecamatan/search_process');
			//offset
			$page=$this->uri->segment(3);
			if(!$page):
					$offset = 0;
			else:
					$offset = $page;
			endif;	
			
			
			
			$data['query']  = $this->kecamatan->get_all($this->limit,$offset)->result();
			$data['jumlah'] = $this->kecamatan->get_all_data();
			$config['base_url'] = base_url() . 'kecamatan/get_all/';
    $config['total_rows'] = $data['jumlah'];
    $config['per_page'] = $this->limit;
			$config['uri_segment'] = 3;
	   $config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
     $this->pagination->initialize($config);
		 $data["paginator"] =$this->pagination->create_links();
			
			
			
			//link untuk menuju ke halaman tambah data
			$data['link'] = site_url('kecamatan/add');
			$data['kembali'] = "";
			$data['export'] = site_url('barang/export');
			$data['import'] = site_url('barang/import');
			
			
			
			//meload view
			$this->load->view('template', $data);
			
		}	
		
		
		
		
	function search_process()
	{
		
		
			$data['title'] = $this->title;
			$data['h2_title'] = 'Referensi Kecamatan';
			$data['main_view'] = 'kecamatan/kecamatan';
			$data['search']	= site_url('kecamatan/search_process');
			$data['link'] = site_url('kecamatan/add');
			$data['kembali'] = site_url('kecamatan');
		  $page=$this->uri->segment(3);
			if(!$page):
					$offset = 0;
			else:
					$offset = $page;
			endif;	
		
			$data['nama']="";
			$postkata = $this->input->post('search');
			if(!empty($postkata))
			{
					$data['nama'] = $this->input->post('search');
						} 
			else 
			{
					redirect('kecamatan');
			}
			$data['query'] = $this->kecamatan->search_data_paging($this->limit,$offset,$data['nama'])->result();
			$data['jumlah'] = $this->kecamatan->search_data($data['nama'])->num_rows();
		
			 $config['base_url'] = base_url() . 'kecamatan/search_process/';
    $config['total_rows'] = $data['jumlah'];
    $config['per_page'] = $this->limit;
			$config['uri_segment'] = 3;
	   $config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
     $this->pagination->initialize($config);
		  $data["paginator"] =$this->pagination->create_links();
		  $data['pesanPencarian'] = 'Keyword '.$postkata. 'terdapat sebanyak '.$data['jumlah'].' data';
				
        $this->load->view('template',$data);
	}
		
		
		//fungsi untuk menghapus data barang
		function delete($id)
		{


			$this->kecamatan->delete($id);
			
			//kalau terhapus maka akan memunculkan pesan
			$this->session->set_flashdata('message', '1 data Kecamatan berhasil dihapus');
			
			//kemudian menuju kembali ke halaman utama
			redirect('kecamatan');
			
		}
		
		
		
		//fungsi untuk tambah data
		function add()
		{
			//disini hanyalah melengkapi item item yang nantinya akan ditampilkan di halaman tambah data seperti, judul, nama link, dll
			$data['title'] = $this->title;
			$data['h2_title'] = 'Referensi Kecamatan > Tambah Data Kecamatan'; 

			//file viewnya ada di kecamatan/kecamatan_form.php
			$data['main_view'] = 'kecamatan/kecamatan_form';
			$data['form_action'] = site_url('kecamatan/add_process');
			$data['linkBack'] = site_url('kecamatan');
			$data['button']	= 'Input Data';
			
			//load file viewnya
			$this->load->view('template', $data);
		}		
		
		
		//fungsi untuk proses penambahan datanya 
		function add_process()
		{
		
		
			$data['title'] = $this->title;
			$data['h2_title'] = 'Referensi Kecamatan > Tambah Data';
			$data['main_view'] ='kecamatan/kecamatan_form';
			$data['form_action'] = site_url('kecamatan/add_process');
			$data['linkBack'] = site_url('kecamatan');
			$data['button'] = 'Update Data';
			
			
			//mengeset validasinya
			$this->form_validation->set_rules('kodeKecamatan','Kode Kecamatan','required');
			$this->form_validation->set_rules('namaKecamatan','Nama Kecamatan','required');
			
			if ($this->form_validation->run() == TRUE)
			{
				$kodeKecamatan	= $this->input->post('kodeKecamatan');
				$namaKecamatan = $this->input->post('namaKecamatan');
					$kecamatan = array(
							 'ref_kecamatan_kode' => $kodeKecamatan,
					    'ref_kecamatan_nama' => $namaKecamatan
					);
				$this->kecamatan->add($kecamatan);
				$this->session->set_flashdata('message', 'Satu Data Kecamatan telah berhasil ditambahkan');
				
				redirect('kecamatan');
				
			}
			else
			{
				$this->load->view('template', $data);
			}
		}
		
		
		function update($id)
		{
			$data['title'] = $this->title;
			$data['h2_title'] = 'Jenis Pegawai > Update';
			$data['main_view'] = 'kecamatan/kecamatan_form';
			$data['form_action'] = site_url('kecamatan/update_process');
		   $data['linkBack'] = site_url('kecamatan');
			$data['button'] = 'Update Data';
			//cari datanya dari database	
			$datanya = $this->kecamatan->get_data_by_id($id);
			//buat session untuk menyimpan data primary key
			$this->session->set_userdata('id', $datanya->ref_kecamatan_id);
			
			
			//data untuk mengisi field2 form
			$data['default']['id'] = $datanya->ref_kecamatan_id;
			$data['default']['namaKecamatan']	= $datanya->ref_kecamatan_nama;
			$data['default']['kodeKecamatan']	= $datanya->ref_kecamatan_kode;
			
			$this->load->view('template', $data);
			
		}
		
		function update_process()
		{
			
			$data['title'] = $this->title;
			$data['h2_title'] = 'Referensi Kecamatan > Update';
			$data['main_view'] = 'kecamatan/kecamatan_form';
			$data['form_action'] = site_url('kecamatan/update_process');
		    $data['linkBack'] = site_url('kecamatan');
			$data['button'] = 'Update Data';

			//mengeset validasinya
			$this->form_validation->set_rules('kodeKecamatan','Kode Kecamatan','required');
			$this->form_validation->set_rules('namaKecamatan','Nama Kecamatan','required');

			if ($this->form_validation->run() == TRUE)
			{
				$kodeKecamatan	= $this->input->post('kodeKecamatan');
				$namaKecamatan = $this->input->post('namaKecamatan');
					$kecamatan = array(
							 'ref_kecamatan_kode' => $kodeKecamatan,
					    'ref_kecamatan_nama' => $namaKecamatan
					);
				$this->kecamatan->update($this->session->userdata('id'), $kecamatan);
				$this->session->set_flashdata('message', 'Satu Data Kecamatan telah berhasil diubah');
				
				redirect('kecamatan');
			}
			else
			{
				$this->load->view('template', $data);	
			}
		}
	}

?> 
