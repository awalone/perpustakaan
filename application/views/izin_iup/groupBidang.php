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
					a.id_kbli, a.id_jnsizin, 
					b.nm_kbli ,
					c.id_gol, c.nm_gol
				FROM 
				tbl_kbliform a 
				LEFT JOIN tbl_kblikode b ON a.`id_kbli` = b.`id_kbli`
				LEFT JOIN tbl_kbligol c ON b.`id_gol` = c.`id_gol`

				where (b.nm_kbli LIKE '%$lempar%' OR c.nm_gol LIKE '%$lempar%' OR a.id_kbli LIKE '%$lempar%') AND a.id_jnsizin = '03'");
			$jum = mysql_num_rows($sql);
			echo $jum;
			if ($jum > 0) {
				
				?>
				<table style="font-size:11px; border:1px solid;background-color: lavender;" width="100%" cellspacing=0 cellpadding=1 border="1">
				<tr style="background-color:#fff; font-weight:bold; text-align:center">
					<td>No</td>
					<td>Nama Golongan</td>
					<td>Nama KBLI</td>
					
					<td>Pilih</td>
				</tr>
				<?php
				$no = 1;
				while ($r = mysql_fetch_array($sql)) {
					$id_kbli = $r['id_kbli'];
					$id_gol	 = $r['id_gol'];
					$namaGol = $r['nm_gol'];
					$nm_kbli = $r['nm_kbli'];
					?>
						<tr>
							<td><?php echo $no;?></td>
							<td><?php echo $namaGol;?></td>
							<td><?php echo $nm_kbli;?></td>
							
							<td>
							<input type="submit" value="Pilih" onClick="konter = konter +1; addDIV('bidangUsaha','div','idBidangUsaha','','<?php echo $nm_kbli.$id_gol;?>'+konter,'<?php echo $namaGol;?>',false); addDIV('<?php echo $nm_kbli.$id_gol;?>'+konter,'href','closeTag','','','X',false);
                            addDIV('<?php echo $nm_kbli.$id_gol;?>'+konter,'hidden','','bidangUsaha[]','','<?php echo $id_gol;?> ',false);"></td>
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
