<?php
	
			error_reporting(0);
			$kode = $_REQUEST['kode'];
			$lempar= $_REQUEST['lempar'];
			$bu = "HELLO";
			$gol = $_REQUEST['gol'];
			$bidang = $_REQUEST['bidang'];
			$kelompok = $_REQUEST['kelompok'];
			$carilangsung = $_REQUEST['carilangsung'];
			
			
			$sql = mysql_query("SELECT 
					*from tbl_kbligol

				where nm_gol LIKE '%$lempar%'");
			$jum = mysql_num_rows($sql);
			echo $jum;
			if ($jum > 0) {
				
				?>
				<table style="font-size:11px; border:1px solid;background-color: lavender;" width="100%" cellspacing=0 cellpadding=1 border="1">
				<tr style="background-color:#fff; font-weight:bold; text-align:center">
					<td>No</td>
					<td>Nama Golongan</td>
					<td>Pilih</td>
				</tr>
				<?php
				$no = 1;
				while ($r = mysql_fetch_array($sql)) {
					
					$id_gol	 = $r['id_gol'];
					$namaGol = $r['nm_gol'];
					?>
						<tr>
							<td><?php echo $no;?></td>
							<td><?php echo $namaGol;?></td>
							
							<td>
							<input type="submit" value="Pilih" onClick="konter = konter +1; 
                            if(konter == 1) s = 'checked'; else s = '';
                            addDIV('bidangUsaha','div','idBidangUsaha','','<?php echo $namaGol.$id_gol;?>'+konter,'<?php echo $namaGol;?>',true);                             addDIV('<?php echo $namaGol.$id_gol;?>'+konter,'radio','radioBidangUsaha','radioBidangUsaha',s,'<?php echo $id_gol;?>',false);  
addDIV('<?php echo $namaGol.$id_gol;?>'+konter,'href','closeTag','','','X',false);
                            addDIV('<?php echo $namaGol.$id_gol;?>'+konter,'hidden','','bidangUsaha[]','','<?php echo $id_gol;?> ',false);"></td>
						</tr>
					<?php
					$no++;
				}
				?>
				
</table>
				<?php
			}
			
			else {
				echo "Data Tidak Ditemukan";
			}
	
?>
