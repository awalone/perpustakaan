 <legend style="position: static;">Report Perizinan</legend>
		  
	<fieldset class="scheduler-border">
		<legend class="scheduler-border">Kriteria Pencarian</legend>
		<form method='post' action='<?php echo $search;?>'>
		<table width="100%" style="border-spacing: 0px;">
			
			<tr style="padding: 0px;">
				<td>Jenis Izin</td>
				<td>
					<?php $value = set_value('selected', isset($selected) ? $selected : ''); 
					 echo form_dropdown('jenis_izin',$jenis_izin, $value); ?>
					
					
				</td>
			</tr>
			
			
			
			<tr style="padding: 0px;">
				<td>Status Izin</td>
				<td>
					<select name='status_izin'>
						<option value=''>--Pilih Status Izin--</option>
						<option value='0'>Belum Ada Rekomendasi</option>
						<option value='1'>Sudah Ada Rekomendasi</option>
						<option value='2'>Izin Telah Dicetak</option>
						<option value='3'>Izin Telah Rampung</option>	
					</select>
				</td>
			</tr>
			<tr>
				<td>Tgl. Izin</td>
				<td><input type='text' name='mulai' id='datepicker-example1' style='font-size: 14px;height: 20px; width: 100px;' value=""> S.D 
<input type='text' name='selesai' id='datepicker-example2' style='font-size: 14px;height: 20px; width: 100px;' value=""></td>
			</tr>
	
			<tr>
				<td></td>
				<td><input type="submit" value="cari" /></td>
			</tr>
		</table>	
		</form>
	</fieldset>

		 							
							
		  <?php
			
			$pesanSukses = $this->session->flashdata('statusSuccess');
			if ($pesanSukses != "")
			{
					?>
								<div class="alert alert-info">
			     				 <a class="close" data-dismiss="alert">x</a>
			      				<strong><?php echo $pesanSukses;?></strong>.
			  </div>
					<?php	
			} 
			
			
			$smsSukses = $this->session->flashdata('sent_message');
			if ($smsSukses != "")
			{
					?>
								<div class="alert alert-info">
			     				 <a class="close" data-dismiss="alert">x</a>
			      				<strong><?php echo $smsSukses;?></strong>.
			  </div>
					<?php	
			} 
		  
		  ?>
		  
		
		  
		  <table class="table table-striped table-hover" style="font-size: 11px; border: 1px inset;" cellpadding="2" cellspacing="1" width="100%">
		      <thead>
			<tr style="font-weight: bold;" align="center">
				<td>No. Izin</td>
				<td>Nama Pemohon</td>
			    <td>Nama Badan Usaha</td>
				<td>Jenis Permohonan</td>
				<td>Status Izin</td>
			    <td>Nama Badan Usaha</td>
				<td>Ubah Status/Keterangan</td>
		
			    
			</tr>
		      </thead>
		      <tbody>
			  <?php
			  
			  
			  
					foreach($query as $row) {
							$no_izin = $row->no_izin;
							$tgl_izin = $this->libraryku->tanggal($row->tgl_izin);
							$status_reg = $row->status_reg;
							$nm_pemohon = $row->nm_pemohon;
							$nm_bdnusaha = $row->nm_bdnusaha;
							$nm_izin = $row->nm_izin;
						if ($status_reg =="0") 
							$status_reg = "<font color=\"red\">Belum Ada Reko</font>";
						elseif ($status_reg == "1") 
							$status_reg = "Sudah Ada Reko";
						elseif ($status_reg == "2")
							$status_reg = "Izin Telah Dicetak";
						elseif ($status_reg == "3")
							$status_reg = "Izin Telah Rampung";
						else
							$status_reg = "Permohonan Ditolak";
							
						$id = $this->enkrip->encode($no_izin);
					
				?>
			  <tr>
				<td><?php echo $no_izin;?></td>
				<td><?php echo $nm_pemohon;?></td>
				<td><?php echo $tgl_izin;?></td>
				<td><?php echo $nm_bdnusaha;?></td>
				<td><?php echo $status_reg;?></td>
				<td><?php echo $nm_izin;?></td>
				
				<td><a class="btn btn-small" href="<?php echo site_url('statusPermohonanIzin/ubahKeterangan/'.$id); ?>"><i class="icon-ok-circle"></i> Keterangan Izin</a>
					<a class="btn btn-small" href="<?php echo site_url('statusPermohonanIzin/ubahIzin/'.$id); ?>"><i class="icon-ok-circle"></i> Status Izin</a>
				</td>
				
			  </tr>
			  <?php
				}
			  ?>
			  
			  
			  </tbody>
			  </table>
			  
			  <?php
				echo $pagination;
			  ?>