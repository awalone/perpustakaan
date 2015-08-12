

<fieldset style="font-size: 15px;"><legend>Detail Data Izin Usaha Perdagangan</legend>

<form action='<?php echo $form_action;?>' method='post' class="form-horizontal" name='frm-tambah' enctype='multipart/form-data'>
<table width="100%">
   
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
		<td colspan="3"><hr /></td>
		
	</tr>
	<tr>
		<td colspan="3"><strong>Data Badan Usaha</strong></td>
	</tr>
	 
	<tr>
		<td width="20%">Nama Badan Usaha</td>
		<td> : </td>
		<td><?php echo $nm_bdnusaha;?></td>
	</tr>
	<tr>
		<td width="20%">Alamat</td>
		<td> : </td>
		<td><?php echo $alm_bdnusaha;?></td>
	</tr>
	
	
	
	<tr>
		<td colspan="3"><hr /></td>
		
	</tr>
	<tr>
		<td colspan="3"><strong>Data Izin Usaha Perdagangan</strong></td>
	</tr>
	 
	<tr>
		<td width="20%">No. Izin</td>
		<td> : </td>
		<td><?php echo $no_izin;?></td>
	</tr>
	<tr>
		<td width="20%">Tgl. Izin</td>
		<td> : </td>
		<td><?php echo $tgl_izin;?></td>
	</tr>
	<tr>
		<td width="20%">Kekayaan</td>
		<td> : </td>
		<td><?php echo $kekayaan;?></td>
	</tr>
	<tr>
		<td width="20%">Jenis Lembaga</td>
		<td> : </td>
		<td><?php echo $nm_lembaga;?></td>
	</tr>
	<tr>
		<td width="20%">Dagangan</td>
		<td> : </td>
		<td><?php echo $dagangan;?></td>
	</tr>
	
	
	
    </table>
    
    
  
</form>

<br /><a class="btn btn-info" href="<?php echo site_url('cetak_siup/cetak');?>">Lihat Surat Izin</a> &nbsp; 
<a class="btn btn-info" href="<?php echo site_url('cetak_siup');?>">Kembali</a> <br /><p></p>
</fieldset>


<?php
	

?>
