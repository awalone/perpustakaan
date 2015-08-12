<?php
	
			error_reporting(0);
			$kode = $_REQUEST['kode'];
			$lempar= $_REQUEST['lempar'];
			
			$sql = mysql_query("SELECT 
					a.id_kbli, a.id_jnsizin, 
					b.nm_kbli ,
					c.id_gol, c.nm_gol
				FROM 
				tbl_kbliform a 
				LEFT JOIN tbl_kblikode b ON a.`id_kbli` = b.`id_kbli`
				LEFT JOIN tbl_kbligol c ON b.`id_gol` = c.`id_gol`

				where (b.nm_kbli LIKE '%$lempar%' OR c.nm_gol LIKE '%$lempar%') AND a.id_jnsizin = '05'");
			$jum = mysql_num_rows($sql);
			echo $jum;
			if ($jum > 0) {
				
				?>
				<table class="tabelisi tabelisisimbad" style="font-size:11px" width="100%" cellspacing=0 cellpadding=0>
				<tr>
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
							<input type="submit" value="Pilih" onClick="document.getElementById('bidangUsaha').value = '<?php echo $nm_kbli;?>';document.getElementById('id_gol').value='<?php echo $id_gol;?>'"></td>
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
