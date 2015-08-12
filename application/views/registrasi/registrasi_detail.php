

<fieldset style="font-size: 15px;"><legend>Detail Data Registrasi (<?php echo $no_reg;?>)</legend>

<form action='<?php echo $form_action;?>' method='post' class="form-horizontal" name='frm-tambah' enctype='multipart/form-data'>
<table width="100%">
    
	<tr >
		<td width="25%" valign="top">Jenis Izin</td>
		<td width="2%" valign="top"> : </td>
		<td valign="top">
		
		
		<?php echo $jenisIzin;?></td>
	</tr>
	
    <tr>
		<td width="20%" valign="top">Jenis Permohonan</td>
		<td valign="top"> : </td>
		<td valign="top">
		<?php
			$dataRegistrasi = array(
				'0'	=> 'Permohonan Baru',
				'1'	=> 'Perpanjangan/Pembaharuan/Pendaftaran Ulang/HER',
				'2'	=> 'Perubahan Data (data yang secara langsung atau tidak langsung merubah konten izin)',
				'3' => 'Penggantian Izin (Karena Hilang atau Rusak)'	
			);
			foreach($dataRegistrasi as $row => $value) {
				if ($row == $jenisRegistrasi) {
					echo $value;
				}
			}
		?>
		</td>
	</tr>
	<tr>
		<td colspan="3"><hr /></td>
		
	</tr>
	<tr>
		<td colspan="3"><strong>Data Pemohon</strong></td>
	</tr>
	
	<tr>
		<td width="20%">Nama Pemohon</td>
		<td> : </td>
		<td><?php echo $nm_pemohon;?></td>
	</tr>
	<tr>
		<td width="20%">No. KTP Pemohon</td>
		<td> : </td>
		<td><?php echo $ktp_pemohon;?></td>
	</tr>
	<tr>
		<td width="20%">Alamat Pemohon</td>
		<td> : </td>
		<td><?php echo $alm_pemohon;?></td>
	</tr>
	<tr>
		<td width="20%">HP Pemohon</td>
		<td> : </td>
		<td><?php echo $hp_pemohon;?></td>
	</tr>
	
	
	
	<tr>
		<td colspan="3"><hr /></td>
		
	</tr>
	<tr>
		<td colspan="3"><strong>Data Badan Usaha</strong></td>
	</tr>
	
	<tr>
		<td width="20%">Nama Badan Usaha</td>
		<td> : </td>
		<td><?php 
			if ($akr_def != '' AND $akr_def != NULL) {
				echo $akr_def.' '.$nm_bdnusaha;
			}
			else {
				echo $nm_bdnusaha;
			}
			?></td>
	</tr>
	<tr>
		<td width="20%">Alamat</td>
		<td> : </td>
		<td><?php echo $alm_bdnusaha;?></td>
	</tr>
	<tr>
		<td width="20%">Jabatan</td>
		<td> : </td>
		<td><?php echo $jab_pengurus;?></td>
	</tr>
	
	
    </table>
    
    
  
</form>

<br /><a class="btn btn-info" href="<?php echo $link;?>" target="_blank">Cetak Registrasi</a> <a class="btn btn-info" href="<?php echo site_url('registrasi/add');?>">Kembali</a> <br /><p></p>
</fieldset>


<?php
	

?>
