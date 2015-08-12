<?php
error_reporting(E_ALL);
ini_set("display_errors","1");
#echo 'aaaaa';
class cek_sms
{

	var $host = "localhost";
	var $user = "root";
	var $pwd = "W3B-devel";
	var $db = "kpap";
	var $server = "Server Devel";
	var $format_noreg_salah = "Nomor registrasi Anda tidak ditemukan, masukkan no registrasi yang benar!";	
	var	$format_sms_salah = "Format Sms Anda Salah.! ketik izin [spasi] [Nomor registrasi]. Nomor Registrasi terdiri dari 11 Digit";	
	var $format_sms_black_list = "Anda sudah mengirim permintaan sebanyak 3 Kali. Silakan kembali mengirim permintaan Esok Hari, Terima Kasih!";


	function Execute()
	{
	
		$inbox = mysql_query("SELECT SenderNumber AS no,TextDecoded AS sms, ID FROM inbox WHERE Processed = 'false' AND DATE(ReceivingDateTime) = DATE(NOW())");
		
		while($data = mysql_fetch_array($inbox))
		{	
			$no_hp = $data['no'];
			if($this->cek_format_no($no_hp) and $this->cek_jum_sms($no_hp) <= 3)
			{
				if($this->cek_format_sms($data['sms']))
				{	
					$no_reg = substr($data['sms'],5,11);
					
					$status = $this->cari_status_izin($no_reg);
					if($status == 'no')
					{ 
						echo "Nomor $no_hp: Nomor Registrasi tidak ditemukan<br>";
						$kirim = $this->kirim_sms_noreg_salah($no_reg,$no_hp);
					}
					else
					{
						echo "Nomor $no_hp: Status Izin $status <br>";
						$kirim = $this->kirim_sms_status_izin($status,$no_hp);
					}
						
					if($kirim)
						$this->set_proses_inbox($data['ID']);
				}
				else
				{
					echo "Nomor $no_hp: Format SMS Salah<br>";
					$kirim = $this->kirim_sms_format_salah($no_hp);
					if($kirim)
						$this->set_proses_inbox($data['ID']);
			
				}
			}
			else if($this->cek_jum_sms($no_hp) == 4)
			{
				echo "Nomor $no_hp: Pengiriman Sms Sudah Lebih dari 3 Kali<br>";
				$kirim = $this->kirim_sms_black_list($no_hp);
				if($kirim)
					$this->set_proses_inbox($data['ID']);
				
			}
			else if($this->cek_jum_sms($no_hp) > 4)
			{
/*					echo "Nomor $no_hp: Pengiriman Sms Sudah Lebih dari 3 Kali<br>";
				$kirim = $this->kirim_sms_black_list($no_hp);
				if($kirim)
					$this->set_proses_inbox($data['ID']);
*/					
			}
			else
			{
				echo "Nomor $no_hp tidak Valid <br>";
				$this->set_proses_inbox($data['ID']);
			}
		}
	
	}
	
	function connect()
	{
		mysql_connect($this->host,$this->user,$this->pwd);
		mysql_select_db($this->db);
	}
	
	function kirim_sms_status_izin($status,$no_hp)
	{
		switch ($status)
		{
			case '1' : $format_status_izin = "Rekomendasi anda telah diinput."; break;
			case '2' : $format_status_izin = "Izin anda telah dicetak."; break;
			case '3' : $format_status_izin = "Izin anda telah selesai dan rampung."; break;
			case '-1' : $format_status_izin = "Permohonan Anda ditolak."; break;
			case '0' : $format_status_izin = "Permohonan anda belum memiliki rekomendasi."; break;
		}
		return $this->kirim($format_status_izin,$no_hp);
	}
	
	function kirim_sms_noreg_salah($no_reg,$no_hp)
	{	
		
		return $this->kirim($this->format_noreg_salah,$no_hp);
	}
	
	function kirim_sms_format_salah($no_hp)
	{	
		return $this->kirim($this->format_sms_salah,$no_hp);
	}
	
	function kirim_sms_black_list($no_hp)
	{
		return $this->kirim($this->format_sms_black_list,$no_hp);
	}
	
	function kirim($format,$no_hp)
	{
		$Q = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, SenderID, CreatorID, Class) 
	VALUES ('".$no_hp."', '".$format."', '', '".$this->server."', '-1')");
		if($Q)
			return true;
		else
			return false;
	
	}
	
	function cek_jum_sms($no_hp)
	{
		$Q = mysql_query("SELECT COUNT(*) AS jum FROM inbox where SenderNumber = '".$no_hp."' AND DATE(ReceivingDateTime) = DATE(NOW())");
		$data = mysql_fetch_array($Q);
		return ($data['jum']);
	}
	
	function set_proses_inbox($id)
	{
		$Q = mysql_query("UPDATE inbox SET Processed = 'true' where ID = '$id'");
	}
	
	function cari_status_izin($no_reg)
	{
		$Q = mysql_query("select status_reg from tbl_registrasi where no_reg = '".$no_reg."'");
		$data = mysql_fetch_array($Q);
		return ($data['status_reg'] <> '')?$data['status_reg']:'no';
	}
	
	function cek_format_sms($sms)
	{
		return preg_match('/^izin [0-9]{11}$/i',$sms);
	}
	function cek_format_no($no)
	{
		return preg_match('/^(\+62|0)[0-9]{9,17}$/',$no);
	}

}

$sms = new cek_sms();
$sms->connect();
$sms->Execute();
?>