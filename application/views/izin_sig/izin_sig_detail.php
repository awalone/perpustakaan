

<fieldset style="font-size: 15px;"><legend>Detail Data Izin Gangguan</legend>

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
		<td colspan="3"><strong>Data Izin Gangguan</strong></td>
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
		<td valign="top">Bidang Usaha</td>
		<td valign="top"> : </td>
		<td valign="top"><?php 
				
				if ($jum > 0) {
					$list = array();
					foreach($bidang as $row) {
						$list[] =  $row->nm_kbli;
					}
					echo implode(', ', $list);
				}
			?></td>
	</tr>
	
	<tr>
		<td width="20%">Kapasitas</td>
		<td> : </td>
		<td><?php echo $kapasitas;?></td>
	</tr>
	<tr>
		<td width="20%">Jumlah Tenaga Kerja</td>
		<td> : </td>
		<td><?php echo $tenaker;?></td>
	</tr>
	
	<tr>
		<td width="20%">Luas</td>
		<td> : </td>
		<td><?php echo $luas_usaha;?></td>
	</tr>
	
	
	<tr>
		<td width="20%">Golongan</td>
		<td> : </td>
		<td><?php echo $golusaha;?></td>
	</tr>
	
    </table>
    
    
  
</form>

<br /><a class="btn btn-info" href="<?php echo site_url('cetak_sig/cetak');?>">Lihat Surat Izin</a> &nbsp; <a class="btn btn-info" href="<?php echo site_url('cetak_sig');?>">Kembali</a> <br /><p></p>
</fieldset>


<?php
	

?>
