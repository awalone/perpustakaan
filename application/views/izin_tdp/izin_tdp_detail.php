

<fieldset style="font-size: 15px;"><legend>Detail Data Izin Tanda Daftar Perusahaan</legend>

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
		<td colspan="3"><strong>Data Izin Tanda Daftar Perusahaan</strong></td>
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
		<td width="20%">No. TDP</td>
		<td> : </td>
		<td><?php echo $no_tdp;?></td>
	</tr>
	<tr>
		<td width="20%">Pembaharuan Ke -</td>
		<td> : </td>
		<td><?php echo $jml_her;?></td>
	</tr>
	
	
    </table>
    
    
  
</form>

<br /><a class="btn btn-info" href="<?php echo site_url('cetak_tdp/cetak');?>">Lihat Surat Izin</a>
<a class="btn btn-info" href="<?php echo site_url('cetak_tdp');?>">Kembali</a> <br /><p></p>
</fieldset>


<?php
	

?>
