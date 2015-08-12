<?php

	class Libraryku
	{
		var $CI	= null;
		function __construct()
		{
			$this->CI =& get_instance();
			
		}
		
		
		function create_path($tipe,$izin,$tahun,$bulan,$tgl) {
			if ($tipe == "1") {
				
				$folderTahun = "arsip/izin/$izin/$tahun/$bulan/$tgl";
				echo $folderTahun;
				echo "<br />";
					/*
					if (!file_exists($folderTahun) || !is_dir($folderTahun)) {
					if (mkdir($folderTahun, 0777)) {
						echo "Folder Created";
					} 
					} 
					*/
					//sekarang buat folder untuk bulannya
					$folderBulan = "arsip/izin/$izin/$tahun/$bulan";
					if (!file_exists($folderBulan) || !is_dir($folderBulan)) {
					if (mkdir($folderBulan, 0777)) {
						echo "$folderBulan<br />";
					} 
					}
					
					
					
					//sekarang buat folder untuk tanggalnya
					$folderTanggal = "arsip/izin/$izin/$tahun/$bulan/$tgl";
					if (!file_exists($folderTanggal) || !is_dir($folderTanggal)) {
					if (mkdir($folderTanggal, 0777)) {
						echo "Folder Created";
					} 
					}
					else {
						
					}
			}
			
			else {
				$folderTahun = "arsip/reko/$izin/$tahun";
					if (!file_exists($folderTahun) || !is_dir($folderTahun)) {
					if (mkdir($folderTahun, 0777)) {
						echo "Folder Created";
					}
					else {
						echo "ada error buat folder tahun";
					}
					} 
					
					//sekarang buat folder untuk bulannya
					$folderBulan = "arsip/reko/$izin/$tahun/$bulan";
					if (!file_exists($folderBulan) || !is_dir($folderBulan)) {
					if (mkdir($folderBulan, 0777)) {
						echo "Folder Created";
					}
					else {
						echo "ada error buat folder bulan";
					}					
					}
					
					
					//sekarang buat folder untuk tanggalnya
					$folderTanggal = "arsip/reko/$izin/$tahun/$bulan/$tgl";
					if (!file_exists($folderTanggal) || !is_dir($folderTanggal)) {
					if (mkdir($folderTanggal, 0777)) {
						echo "Folder Created";
					} 
					}
			}
		}
		
		
		function cekinput($input)
		{	
			$filter = mysql_real_escape_string(strip_tags(htmlspecialchars($input,ENT_QUOTES)));
			return $filter;
		}
		
		function tanggal($tgl)
		{
			$tanggal = substr($tgl,8,2);
			$bulan = $this->getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			return $tanggal.' '.$bulan.' '.$tahun;	
		}
		function getBulan($bln){
				switch ($bln){
					case 1: 
						return "Januari";
						break;
					case 2:
						return "Februari";
						break;
					case 3:
						return "Maret";
						break;
					case 4:
						return "April";
						break;
					case 5:
						return "Mei";
						break;
					case 6:
						return "Juni";
						break;
					case 7:
						return "Juli";
						break;
					case 8:
						return "Agustus";
						break;
					case 9:
						return "September";
						break;
					case 10:
						return "Oktober";
						break;
					case 11:
						return "November";
						break;
					case 12:
						return "Desember";
						break;
				}
			} 	
		
		
		
		function tanggalDbase($tgl)
		{
		
			$tanggal = substr($tgl,0,2);
			$bulan = substr($tgl,3,2);
			$tahun = substr($tgl,6,4);
			return $tahun.'-'.$bulan.'-'.$tanggal;		 
	
		}
		
		function editTanggalDbase($tgl)
		{
			$tanggal = substr($tgl,8,2);
			$bulan = substr($tgl,5,2);
			$tahun = substr($tgl,0,4);
			return $tanggal.'-'.$bulan.'-'.$tahun;	
		}
		
		
		function format_rupiah($angka){
			$rupiah=number_format($angka,0,',','.');
			return "Rp. ". $rupiah;
		}
		
		
		
		function selisihWaktu($jamSekarang,$jamMasuk)
		{
			$selisih = mysql_query("select timediff('$jamSekarang','$jamMasuk') as selisih");
			$detailSelisih = mysql_fetch_array($selisih);
			$selisih = $detailSelisih['selisih'];
			return $selisih;
		}
		
		
		function selisih($jam_masuk,$jam_keluar,$stat=NULL) 
		{ 
			
			list($h,$m,$s) = explode(":",$jam_masuk); 
			$dtAwal = mktime($h,$m,$s,"1","1","1"); 
			list($h,$m,$s) = explode(":",$jam_keluar); 
			$dtAkhir = mktime($h,$m,$s,"1","1","1"); 
			$dtSelisih = $dtAkhir-$dtAwal; $totalmenit=$dtSelisih/60; 
			$jam =explode(".",$totalmenit/60);
			$sisamenit=($totalmenit/60)-$jam[0]; 
			$sisamenit2=$sisamenit*60; 
			$jml_jam=$jam[0]; 
			if ($stat == "cetak")
			{
				return $jml_jam." jam ".$sisamenit2." menit";
			}
			elseif ($stat == "jam") {
				return $jml_jam;
			}
			elseif ($stat == "menit")
			{
				return $sisamenit2;
			}
			 
		}
		
		
		
		/*
		******** ini untuk upload gambar *****
		*/
			private $gambar = array('dir' => array ('original' => 'upload/album/original/',
											    'thumb' => 'upload/album/thumb/'),
								'total' => 0,
								'images' => array(),
								'error' => '');					
		function upload()
		{
			$c_upload['upload_path'] = $this->gambar['dir']['original'];
			$c_upload['allowed_types'] = 'gif|jpg|png|jpeg|x-png';
			$c_upload['max_width'] = '1600';
			$c_upload['max_height'] = '1200';
			$c_upload['remove_spaces'] = TRUE;
			$this->CI->load->library('upload', $c_upload);
		}
		function create_thumbnail()
		{
			$img = $this->CI->upload->data();
			//create thumbnail
			$new_image = $this->gambar['dir']['thumb'].'thumb_'.$img['file_name'];				
			$c_img_lib = array(
					'image_library' => 'gd2',
					'source_image' => $img['full_path'],
					'maintain_ratio' => TRUE,
					'width' => 300,
					'height' => 300,
					'new_image' => $new_image
				);				
				$this->CI->load->library('image_lib',$c_img_lib);
				$this->CI->image_lib->resize();	
				//unlink($this->gambar['dir']['original'].$img['file_name']);
		}
		//untuk thumnailnya
		
		
		
		
		function kodePemohon() {
					$tahun = substr(date('Y'),2);
					$bulan = date('m');
					
					$query = mysql_query("select id_pemohon FROM tbl_pemohon ORDER BY id_pemohon DESC LIMIT 1");
					
					if (mysql_num_rows($query) > 0)
					{
						$data  = mysql_fetch_array($query);
						$id = $data['id_pemohon'];
						
						$konversi_kode = (int)substr($id, 5, 9);
										 
						$kode = $konversi_kode + 1;
						$kode = sprintf("%05s", $kode);
						
						return $tahun.$bulan.$kode;
					}
					else {
						return $tahun.$bulan."00001";	
					}
						
		}
					
					
		function kodeRegistrasi($jenisIzin, $jenisRegistrasi,$stat) {
					
					$query = mysql_query("select max(right(no_reg,5)) as no_reg from tbl_registrasi");
					$tahun = substr(date('Y'),2);
					if (mysql_num_rows($query) > 0)
					{
						$data  = mysql_fetch_array($query);
						$id = $data['no_reg'];
						
						$konversi_kode = (int)$id;
										 
						$kode = $konversi_kode + 1;
						$kode = sprintf("%05s", $kode);
						
						return $jenisIzin.$tahun.$jenisRegistrasi.$stat.$kode;

					}
					else {
						return $jenisIzin.$tahun.$jenisRegistrasi.$stat."00001";	
					}
						
		}	

		function kodeBadanUsaha() {
					$tahun = substr(date('Y'),2);
					
					
					$query = mysql_query("select id_bdnusaha FROM tbl_bdnusaha ORDER BY id_bdnusaha DESC LIMIT 1");
					
					if (mysql_num_rows($query) > 0)
					{
						$data  = mysql_fetch_array($query);
						$id = $data['id_bdnusaha'];
						
						$konversi_kode = (int)substr($id, 3, 7);
						$kode = $konversi_kode + 1;
						$kode = sprintf("%05s", $kode);
						
						return $tahun.$kode;
					}
					else {
						return $tahun."00001";	
					}
						
		}
		
		
		function kodeImb($kategori,$kec,$banyak, $i) {
			//kalau rumahnya tunggal

			$query = mysql_query("select no_izin from tbl_simb ORDER BY no_izin DESC LIMIT 1");
				if (mysql_num_rows($query) > 0) {
					$data = mysql_fetch_array($query);
					$id = $data['no_izin'];
					//kalau rumahnya tunggal
					if ($kategori == '0') {
						$konversi_kode = (int)substr($id,5,4);
						$kode = $konversi_kode + 1;
						$kode = sprintf("%04s", $kode);
						return "503/".$kode."/IMB/".$kec."/BPTPM";
					}
					else {
						$konversi_kode = (int)substr($id,5,4);
					
							$kode = $konversi_kode + 1;
						$kode = sprintf("%04s", $kode);
						return "503/".$kode."-".$i."/IMB/".$kec."/BPTPM";
					}
					
					
				}
				else {
					return "503/0001-11/IMB/".$kec."/BPTPM";
				}
		}
		
		
		function kodeSiup($kec, $jenis_reg,$ketDagang) {
			$query = mysql_query("select no_izin from tbl_siup ORDER BY no_izin DESC LIMIT 1");
			
			//untuk kode jenis_reg
			if ($jenis_reg == 0) 
				$k = "B";
			if ($jenis_reg == 1)
				$k = "P";
			if ($jenis_reg == 2)
				$k = "U";
			if ($jenis_reg == 3)
				$k = "G";
					
			if (mysql_num_rows($query) > 0) {
				$data = mysql_fetch_array($query);
				$id = $data['no_izin'];
				$konversi_kode = (int)substr($id,5,4);
				$kode = $konversi_kode + 1;
				$kode = sprintf("%04s", $kode);
				
				return "503/".$kode."/SIUP".$ketDagang."-".$k."/".$kec."/BPTPM";
			}
			else {
				return "503/0001/SIUP".$ketDagang."-".$k."/".$kec."/BPTPM";
			}
		}
		
		
		function kodeTDP($kec,$jenis_reg,$atr) {
		
			//untuk kode jenis_reg
			if ($jenis_reg == 0) 
				$k = "B";
			if ($jenis_reg == 1)
				$k = "P";
			if ($jenis_reg == 2)
				$k = "U";
			if ($jenis_reg == 3)
				$k = "G";
		
		
			//untuk attribut usaha
			if ($atr == '1') 
				$m = "PT";
			if ($atr == '2')
				$m = "KO";
			if ($atr == '3')
				$m = "CV";
			if ($atr == '4') 
				$m = "FA";
			if ($atr == '5')
				$m = "PO";
			if ($atr == '6')
				$m = "BL";
		
			$query = mysql_query("select no_izin from tbl_tdp ORDER BY no_izin DESC LIMIT 1");
			if (mysql_num_rows($query) > 0) {
				$data = mysql_fetch_array($query);
				$id = $data['no_izin'];
				$konversi_kode = (int)substr($id,5,4);
				$kode = $konversi_kode + 1;
				$kode = sprintf("%04s", $kode);
				return "503/".$kode."/TDP".$m."-".$k."/".$kec."/BPTPM";
			}
			else {
				return "503/0001.".$m."/TDP-".$k."/".$kec."/BPTPM";
			}
		}
		
		
		function kodeTDI($kec,$jenis_reg) {
			//untuk kode jenis_reg
			if ($jenis_reg == 0) 
				$k = "B";
			if ($jenis_reg == 1)
				$k = "P";
			if ($jenis_reg == 2)
				$k = "U";
			if ($jenis_reg == 3)
				$k = "G";
				
			$query = mysql_query("select no_izin from tbl_tdi ORDER BY no_izin DESC LIMIT 1");
			if (mysql_num_rows($query) > 0) {
				$data = mysql_fetch_array($query);
				$id = $data['no_izin'];
				$konversi_kode = (int)substr($id,5,4);
				$kode = $konversi_kode + 1;
				$kode = sprintf("%04s", $kode);
				return "503/".$kode."/TDI-".$k."/".$kec."/BPTPM";
				
			}
			else {
				return "503/0001/TDI-".$k."/".$kec."/BPTPM";
			}	
			
		}
		
		
		
		
		function kodeIPL($kec,$jenis_reg) {
			//untuk kode jenis_reg
			if ($jenis_reg == 0) 
				$k = "B";
			if ($jenis_reg == 1)
				$k = "P";
			if ($jenis_reg == 2)
				$k = "U";
			if ($jenis_reg == 3)
				$k = "G";
				
			$query = mysql_query("select no_izin from tbl_sipl ORDER BY no_izin DESC LIMIT 1");
			if (mysql_num_rows($query) > 0) {
				$data = mysql_fetch_array($query);
				$id = $data['no_izin'];
				$konversi_kode = (int)substr($id,5,4);
				$kode = $konversi_kode + 1;
				$kode = sprintf("%04s", $kode);
				return "503/".$kode."/IPL-".$k."/".$kec."/BPTPM";
				
			}
			else {
				return "503/0001/IPL-".$k."/".$kec."/BPTPM";
			}	
			
		}
		
		function kodeSIG($kec,$jenis_reg) {
			//untuk kode jenis_reg
			if ($jenis_reg == 0) 
				$k = "B";
			if ($jenis_reg == 1)
				$k = "P";
			if ($jenis_reg == 2)
				$k = "U";
			if ($jenis_reg == 3)
				$k = "G";
				
			$query = mysql_query("select no_izin from tbl_sig ORDER BY no_izin DESC LIMIT 1");
			if (mysql_num_rows($query) > 0) {
				$data = mysql_fetch_array($query);
				$id = $data['no_izin'];
				$konversi_kode = (int)substr($id,5,4);
				$kode = $konversi_kode + 1;
				$kode = sprintf("%04s", $kode);
				return "503/".$kode."/IG-".$k."/".$kec."/BPTPM";
				
			}
			else {
				return "503/0001/IG-".$k."/".$kec."/BPTPM";
			}	
			
		}
		
		
		function kodeIUI($kec,$jenis_reg) {
			//untuk kode jenis_reg
			if ($jenis_reg == 0) 
				$k = "B";
			if ($jenis_reg == 1)
				$k = "P";
			if ($jenis_reg == 2)
				$k = "U";
			if ($jenis_reg == 3)
				$k = "G";
				
			$query = mysql_query("select no_izin from tbl_siui ORDER BY no_izin DESC LIMIT 1");
			if (mysql_num_rows($query) > 0) {
				$data = mysql_fetch_array($query);
				$id = $data['no_izin'];
				$konversi_kode = (int)substr($id,5,4);
				$kode = $konversi_kode + 1;
				$kode = sprintf("%04s", $kode);
				return "503/".$kode."/IG-".$k."/".$kec."/BPTPM";
				
			}
			else {
				return "503/0001/IG-".$k."/".$kec."/BPTPM";
			}	
			
		}
		
		
		function kodeIzin($jenisIzin,$kec=NULL) {
		
		
			if ($jenisIzin == "sig") {
				$query = mysql_query("select no_izin from tbl_sig ORDER BY no_izin DESC LIMIT 1");
				if (mysql_num_rows($query) > 0) {
					$data = mysql_fetch_array($query);
					$id = $data['no_izin'];
					$konversi_kode = (int)substr($id,5,4);
					$kode = $konversi_kode + 1;
					$kode = sprintf("%04s", $kode);
					return "503/".$kode."/IG-B/".$kec."/BPTPM";
				}
				else {
					return "503/0001/IG-B/".$kec."/BPTPM";
				}
			}
			
			elseif ($jenisIzin == "iui") {
				$query = mysql_query("select no_izin from tbl_siui ORDER BY no_izin DESC LIMIT 1");
				if (mysql_num_rows($query) > 0) {
					$data = mysql_fetch_array($query);
					$id = $data['no_izin'];
					$konversi_kode = (int)substr($id,5,4);
					$kode = $konversi_kode + 1;
					$kode = sprintf("%04s", $kode);
					return "503/".$kode."/IUI-B/".$kec."/BPTPM";
				}
				else {
					return "503/0001/IUI-B/".$kec."/BPTPM";
				}
			}
			
			elseif ($jenisIzin == "sipl") {
				$query = mysql_query("select no_izin from tbl_sipl ORDER BY no_izin DESC LIMIT 1");
				if (mysql_num_rows($query) > 0) {
					$data = mysql_fetch_array($query);
					$id = $data['no_izin'];
					$konversi_kode = (int)substr($id,5,4);
					$kode = $konversi_kode + 1;
					$kode = sprintf("%04s", $kode);
					return "503/".$kode."/IPL-B/".$kec."/BPTPM";
				}
				else {
					return "503/0001/IPL-B/".$kec."/BPTPM";
				}
			}
			
			elseif ($jenisIzin == "siup") {
				$query = mysql_query("select no_izin from tbl_siup ORDER BY no_izin DESC LIMIT 1");
				if (mysql_num_rows($query) > 0) {
					$data = mysql_fetch_array($query);
					$id = $data['no_izin'];
					$konversi_kode = (int)substr($id,5,4);
					$kode = $konversi_kode + 1;
					$kode = sprintf("%04s", $kode);
					return "503/".$kode."/SIUP".$k."-B/".$kec."/BPTPM";
				}
				else {
					return "503/0001/SIUPB-B/".$kec."/BPTPM";
				}
			}
			
			elseif ($jenisIzin == "tdi") {
				$query = mysql_query("select no_izin from tbl_tdi ORDER BY no_izin DESC LIMIT 1");
				if (mysql_num_rows($query) > 0) {
					$data = mysql_fetch_array($query);
					$id = $data['no_izin'];
					$konversi_kode = (int)substr($id,5,4);
					$kode = $konversi_kode + 1;
					$kode = sprintf("%04s", $kode);
					return "503/".$kode."/TDI-B/".$kec."/BPTPM";
				}
				else {
					return "503/0001-11/TDI-B/".$kec."/BPTPM";
				}
			}
			
			
			elseif ($jenisIzin == "tdp") {
				$query = mysql_query("select no_izin from tbl_tdp ORDER BY no_izin DESC LIMIT 1");
				if (mysql_num_rows($query) > 0) {
					$data = mysql_fetch_array($query);
					$id = $data['no_izin'];
					$konversi_kode = (int)substr($id,5,4);
					$kode = $konversi_kode + 1;
					$kode = sprintf("%04s", $kode);
					return "503/".$kode."/TDP/".$kec."/BPTPM";
				}
				else {
					return "503/0001/TDP/".$kec."/BPTPM";
				}
			}
			
			
		}
		
		
		
		//untuk fungsi terbilang
		function terbilang($satuan)
		{
			$huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
			if ($satuan < 12)
				return " " . $huruf[$satuan];
			elseif ($satuan < 20)
				return terbilang($satuan - 10) . "Belas";
			elseif ($satuan < 100)
				return terbilang($satuan / 10) . " Puluh" . terbilang($satuan % 10);
			elseif ($satuan < 200)
				return " seratus" . terbilang($satuan - 100);
			elseif ($satuan < 1000)
				return terbilang($satuan / 100) . " Ratus" . terbilang($satuan % 100);
			elseif ($satuan < 2000)
				return " seribu" . terbilang($satuan - 1000);
			elseif ($satuan < 1000000)
				return terbilang($satuan / 1000) . " Ribu" . terbilang($satuan % 1000);
			elseif ($satuan < 1000000000)
				return terbilang($satuan / 1000000) . " Juta" . terbilang($satuan % 1000000);
			elseif ($satuan <= 1000000000)
				echo "Maaf Tidak Dapat di Prose Karena Jumlah Uang Terlalu Besar ";
		}
		
		
	}

?>
