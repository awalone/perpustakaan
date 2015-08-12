<?php
	
			error_reporting(0);
			$kode = $_REQUEST['kode'];
			$lempar= $_REQUEST['lempar'];
			$uri1 =  $_REQUEST['jnsizin'];
			$jz = array('izin_iup'=>'03','izin_tdi'=>'04','izin_iui'=>'05','izin_tdp'=>"03' AND a.id_jnsizin LIKE '0%");
			
			
			
			//bila jenis izinnya adalah SIG, maka tampilkan semua kbli nya
			if ($uri1 == 'izin_sig'){
				
				/*
				$sql = mysql_query("SELECT 
					a.id_kbli, a.id_jnsizin, 
					b.nm_kbli ,
					c.id_gol, c.nm_gol
				FROM 
				tbl_kbliform a 
				LEFT JOIN tbl_kblikode b ON a.`id_kbli` = b.`id_kbli`
				LEFT JOIN tbl_kbligol c ON b.`id_gol` = c.`id_gol`

				where (b.nm_kbli LIKE '%$lempar%' OR b.id_kbli LIKE '%$lempar%' OR c.nm_gol LIKE '%$lempar%')");
				*/
				$sql = mysql_query("
						select *from tbl_kbligol where id_gol LIKE '%$lempar%' OR nm_gol LIKE '%$lempar%'
					");
			}
			else {
				$sql = mysql_query("SELECT 
					a.id_kbli, a.id_jnsizin, 
					b.nm_kbli ,
					c.id_gol, c.nm_gol
				FROM 
				tbl_kbliform a 
				LEFT JOIN tbl_kblikode b ON a.`id_kbli` = b.`id_kbli`
				LEFT JOIN tbl_kbligol c ON b.`id_gol` = c.`id_gol`

				where (b.nm_kbli LIKE '%$lempar%' OR b.id_kbli LIKE '%$lempar%' OR c.nm_gol LIKE '%$lempar%') AND a.id_jnsizin = '".$jz[$uri1]."'");
			}
			
			
			$jum = mysql_num_rows($sql);
			
			if ($jum > 0) {
				

				//bedakan lagi antara tabel izin gangguan atau tabel yang lainnya
				//kalau dia izin gangguan tampilkan kode golongan dan nama golongannya
				if ($uri1 == 'izin_sig')
				{
					?>



						<br />
						<table style="font-size:11px; border:1px solid;background-color: lavender;" width="100%" cellspacing=0 cellpadding=1 border="1">
						<tr style="background-color:#fff; font-weight:bold; text-align:center">
							<td>No</td>
							<td>Kode Golongan</td>
							<td>Nama Golongan</td>
							
							<td>Pilih</td>
						</tr>
						<?php
						$no = 1;
						while ($r = mysql_fetch_array($sql)) {
							$kode = $r['id_gol'];
							$nm_gol = $r['nm_gol'];
							?>
								<tr>
									<td><?php echo $no;?></td>
									<td><?php echo $kode; ?></td>
									<td><?php echo $nm_gol; ?></td>
									
									<td>
									<input type="submit" value="Pilih" onClick="konter = konter +1; addDIV('kegiatanUsaha','div','idBidangUsaha','','<?php echo $nm_gol.$kode;?>'+konter,'<?php echo $nm_gol;?>',false); addDIV('<?php echo $nm_gol.$kode;?>'+konter,'href','closeTag','','','X',false);
		                            addDIV('<?php echo $nm_gol.$kode;?>'+konter,'hidden','','kegiatanUsaha[]','','<?php echo $kode;?> ',false);"></td>
								</tr>
							<?php
							$no++;
						}




					
				}
				else {
					?>

						<br />
						<table style="font-size:11px; border:1px solid;background-color: lavender;" width="100%" cellspacing=0 cellpadding=1 border="1">
						<tr style="background-color:#fff; font-weight:bold; text-align:center">
							<td>No</td>
							<td>Kode KBLI</td>
							<td>Nama KBLI</td>
							
							<td>Pilih</td>
						</tr>
						<?php
						$no = 1;
						while ($r = mysql_fetch_array($sql)) {
							$id_kbli = $r['id_kbli'];
							$nm_kbli = $r['nm_kbli'];
							?>
								<tr>
									<td><?php echo $no;?></td>
									<td><?php echo $id_kbli; ?></td>
									<td><?php echo $nm_kbli; ?></td>
									
									<td>
									<input type="submit" value="Pilih" onClick="konter = konter +1; addDIV('kegiatanUsaha','div','idBidangUsaha','','<?php echo $nm_kbli.$id_kbli;?>'+konter,'<?php echo $nm_kbli;?>',false); addDIV('<?php echo $nm_kbli.$id_kbli;?>'+konter,'href','closeTag','','','X',false);
		                            addDIV('<?php echo $nm_kbli.$id_kbli;?>'+konter,'hidden','','kegiatanUsaha[]','','<?php echo $id_kbli;?> ',false);"></td>
								</tr>
							<?php
							$no++;
						}


					
				}


				
				?>
				
</table>
				<?php
			}
			
			else {
				echo "Data Tidak Ditemukan";
			}
	
?>
