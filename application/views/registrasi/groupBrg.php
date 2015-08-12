<?php
	
			error_reporting(0);
			$lempar= $_REQUEST['lempar'];
			
			
			$sql = mysql_query("select 
				a.id_pemohon, a.ktp_pemohon, a.nm_pemohon, a.alm_pemohon,a.hp_pemohon,
				b.id_bdnusaha, b.nm_bdnusaha ,b.atr_usaha, b.alm_bdnusaha, b.jab_pengurus,b.id_katusaha,
				c.nm_kel, c.id_kel, c.id_kec
				from tbl_pemohon a 
				left join tbl_bdnusaha b ON a.id_pemohon = b.id_pengurus 
				left join tbl_kelurahan c ON c.id_kel = b.kel_bdnusaha		
				where a.nm_pemohon LIKE '%$lempar%' || b.nm_bdnusaha LIKE '%$lempar%' || a.ktp_pemohon LIKE '%$lempar%'");
			$jum = mysql_num_rows($sql);
			
			if ($jum > 0) { echo $jum." data ditemukan";
				
				?>
				<table  style="font-size:11px; border:1px solid;background-color: lavender;" width="100%" cellspacing=0 cellpadding=1 border="1">
				<tr style="background-color:#fff; font-weight:bold; text-align:center">
					<td>No</td>
					<td>ID Pemohon</td>
					<td>No. KTP Pemohon</td>
					<td>Nama Pemohon</td>
					<td>Nama Badan Usaha</td>
					<td></td>
				</tr>
				<?php
				$no = 1;
				while ($r = mysql_fetch_array($sql)) {
					$noKtp = $r['ktp_pemohon'];
					$id_pemohon = $r['id_pemohon'];
					$namaPemohon = $r['nm_pemohon'];
					$alamatPemohon = $r['alm_pemohon'];
					$hpPemohon = $r['hp_pemohon'];
					$idBadanUsaha = $r['id_bdnusaha'];
					$namaBadanUsaha = $r['nm_bdnusaha'];
					$katusaha	= $r['id_katusaha'];
					$alm_bdnusaha = $r['alm_bdnusaha'];
					$jab_pengurus = $r['jab_pengurus'];
					$attr = $r['atr_usaha'];
					$nm_kelurahan = $r['nm_kel'];
					$id_kel = $r['id_kel'];
					$id_kec = $r['id_kec'];
					?>
						<tr>
							<td><?php echo $no;?></td>
							<td><?php echo $id_pemohon;?></td>
							<td><?php echo $noKtp;?></td>
							<td><?php echo $namaPemohon;?></td>
							<td><?php echo $attr." ".$namaBadanUsaha;?></td>
							<td>
							<input type="submit" value="Pilih" onClick="
							document.getElementById('isitext').value = '<?php echo $id_pemohon;?>' 
							;document.getElementById('namaPemohon').value='<?php echo $namaPemohon;?>'
							;document.getElementById('kelurahan').value='<?php echo $id_kel;?>';document.getElementById('kecamatan').value='<?php echo $id_kec;?>';document.getElementById('noKtp').value = '<?php echo $noKtp;?>';document.getElementById('attribut').value = '<?php echo $katusaha;?>';document.getElementById('attr').value = '<?php echo $attr;?>';document.getElementById('noKtp').readOnly = true;
 
  document.getElementById('alamatPemohon').value = '<?php echo $alamatPemohon;?>';document.getElementById('noHp').value = '<?php echo $hpPemohon;?>';document.getElementById('idBadanUsaha').value='<?php echo $idBadanUsaha;?>';document.getElementById('namaBadanUsaha').value='<?php echo $namaBadanUsaha;?>';document.getElementById('alamatBadanUsaha').value='<?php echo $alm_bdnusaha;?>';document.getElementById('jabatanPemohon').value='<?php echo $jab_pengurus;?>'; deleteElement('yyy')"></td>
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
