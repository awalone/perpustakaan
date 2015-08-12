 <legend style="position: static;">Report Registrasi</legend>
		  
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
				<td>Tgl. Registrasi</td>
				<td><input type='text' name='mulai' id='datepicker-example1' style='font-size: 14px;height: 20px; width: 100px;' value=""> S.D 
<input type='text' name='selesai' id='datepicker-example2' style='font-size: 14px;height: 20px; width: 100px;' value=""></td>
			</tr>
			
			<tr>
				<td valign="top">Tampilkan Data</td>
				<td>
					<input type="checkbox" name="alamat_pemohon" /> Alamat Pemohon <br />
					<input type="checkbox" name="alamat" /> Alamat Badan Usaha <br />
					<input type="checkbox" name="telp_bdnusaha" /> Telp. Badan Usaha <br />
					<input type="checkbox" name="kelurahan" /> Kelurahan <br />
					<input type="checkbox" name="kecamatan" /> Kecamatan <br />
					
				</td>
			</tr>
			
			<tr>
				<td></td>
				<td><input type="submit" value="cari" /></td>
			</tr>
		</table>	
		</form>
	</fieldset>

		 							
							
		  <br />
		  
		<script type="application/javascript" src="<?php echo base_url("assets/js/tableToExcel.js"); ?>"></script>
		<div style="float:right" class="iconexport">
        <a href="#" onclick="printDiv2('TableData')">
        <img width="50px" height="50px" src="<?php echo base_url("assets/img/document-print-2.png"); ?>" alt="Export Excel"/>
        </a>
        </div>		<div style="float:right" class="iconexport">
        <a href="#" onclick="tableToExcel('TableData','Report Registrasi')">
        <img width="50px" height="50px" src="<?php echo base_url("assets/img/Excel-icon.png"); ?>" alt="Export Excel"/>
        </a>
        </div><br />

		 <span><h4>Report Data Registrasi
					<?php
					if (!empty($namaIzin)) echo $namaIzin;
					?>
					<?php
					if (!empty($statusIzin)) echo $statusIzin;
					if (!empty($tanggalCari)) echo $tanggalCari;
					?>
			</h4></span>		  <br />
		  <table class="table table-striped table-hover" style="font-size: 11px; border: 1px inset;" cellpadding="2" cellspacing="1" width="100%">
		      <thead>
			<tr style="font-weight: bold;" align="center">
				<td>Tgl. Registrasi</td>
				<td>No. Registrasi</td>
				<td>Jenis Izin</td>
			    <td>Nama Pemohon</td>
				<?php
				if (!empty($alamat_pemohon)) 
					{
					
					
						?>
							<td>Alamat Pemohon</td>
						<?php
					}
				?>
				<td>Jenis Permohonan</td>
				<td>Status Izin</td>
			    <td>Nama Badan Usaha</td>
				<?php
					if (!empty($telp_bdnusaha)) 
					{
					
					
						?>
							<td>Telp. Badan Usaha</td>
						<?php
					}
					
					
					if (!empty($alamat_badan_usaha)) 
					{
					
					
						?>
							<td>Alamat Badan Usaha</td>
						<?php
					}
					if (!empty($kelurahan)) {
						?>
							<td>Kelurahan</td>
						<?php
					}
						
					if (!empty($kecamatan)) {
						?>
							<td>Kecamatan</td>
						<?php
					}
					
				?>
			    
			</tr>
		      </thead>
		      <tbody>
			  <?php
			  $no = 1;
			  
			  
					foreach($query as $row) {
				
						$tgl = $this->libraryku->tanggal($row->tgl_reg);
						$id	= $row->no_reg;
						$namaPemohon = $row->nm_pemohon;
						$namaIzin = $row->nm_izin;
						$namaBadanUsaha = $row->nm_bdnusaha;
						$atr = $row->atr_usaha;
						$jenis_reg = $row->jenis_reg;
						if ($jenis_reg == "0")
							$jenis_reg = "Baru";
						elseif ($jenis_reg=="1")
							$jenis_reg = "Perubahan data";
						elseif ($jenis_reg =="2") 
							$jenis_reg = "Penggantian (Hilang/Rusak)";
						else 
							$jenis_reg = "Perpanjangan";
						
						


						$sta_izin = $row->status_reg;
						if ($sta_izin =="0") 
							$sta_izin = "<font color=\"red\">Belum Ada Reko</font>";
						elseif ($sta_izin == "1") 
							$sta_izin = "Sudah Ada Reko";
						elseif ($sta_izin == "2")
							$sta_izin = "Izin Telah Dicetak";
						elseif ($sta_izin == "3")
							$sta_izin = "Izin Telah Rampung";
						else
							$sta_izin = "Permohonan Ditolak";
						
						?>
						<tr>
							<td><?php echo $tgl;?></td>
							<td><?php echo $id."&nbsp;";?></td>
							<td><?php echo $namaIzin;?></td>
							<td><?php echo $namaPemohon;?></td>
							<?php
							if (!empty($alamat_pemohon)) 
								{
								?>
									<td><?php echo $row->alm_pemohon;?></td>
								<?php
								}
							?>
							<td><?php echo $jenis_reg;?></td>
							<td><?php echo $sta_izin;?></td>
							<td><?php echo $atr ." ". $namaBadanUsaha;?></td>
							<?php
					if (!empty($telp_bdnusaha)) 
					{
					
					
						?>
							<td><?php echo $row->tlp_bdnusaha;?></td>
						<?php
					}
					
					
					if (!empty($alamat_badan_usaha)) 
					{
					
					
						?>
							<td><?php echo $row->alm_bdnusaha;?></td>
						<?php
					}
					if (!empty($kelurahan)) {
						?>
							<td><?php echo $row->nm_kel;?></td>
						<?php
					}
						
					if (!empty($kecamatan)) {
						?>
							<td><?php echo $row->nm_kec;?></td>
						<?php
					}
					
				?>
							
						<td>
						
				  		
				  </td>
			      </tr>
			      
			      <?php
			      $no++;
			  }
			  ?>
			  
			  
			  </tbody>
			  </table>

			  <?php
				echo $pagination;
			  ?>
			  
			<script type="text/javascript">             
			function printDiv2(divID) {
				//Get the HTML of div
				var divElements = document.getElementById(divID).innerHTML;
				//Get the HTML of whole page
				var oldPage = document.body.innerHTML;
	
				//Reset the page's HTML with div's HTML only
				document.body.innerHTML = 
				  "<html><head><title></title></head><body>" + 
				  divElements + "</body>";
	
				//Print Page
				window.print();
	
				//Restore orignal HTML
				document.body.innerHTML = oldPage;
	
			  
			}
            </script>
            
              		  <div id="TableData" style="display:none">
             <style media="print">
			 	.printHeader { background:#00CCCC }
				
				   body table { page-break-inside:auto}
				   body tr    { page-break-inside:avoid; page-break-after:auto;}
				   body thead { display:table-header-group}
				   body tfoot { display:table-footer-group }
				   .tableisisimbadcetak .rhead td{ border:#333333 1px solid  }
				  thead td  {border:1px solid; background-color:#33CCFF}
			 </style>
		 <span><h4>Report Data Registrasi
					<?php
					if (!empty($namaIzin)) echo $namaIzin;
					?>
			</h4></span>		  <br />
		  <table class="table table-striped table-hover printHeader" style="font-size: 11px; border: 1px inset;" cellpadding="2" cellspacing="1" width="100%">
		      <thead>
			<tr style="font-weight: bold; border:1px solid" align="center">
				<td>Tgl. Registrasi</td>
				<td>No. Registrasi</td>
				<td>Jenis Izin</td>
			    <td>Nama Pemohon</td>
				<?php
				if (!empty($alamat_pemohon)) 
					{
					
					
						?>
							<td>Alamat Pemohon</td>
						<?php
					}
				?>
				<td>Jenis Permohonan</td>
				<td>Status Izin</td>
			    <td>Nama Badan Usaha</td>
				<?php
					if (!empty($telp_bdnusaha)) 
					{
					
					
						?>
							<td>Telp. Badan Usaha</td>
						<?php
					}
					
					
					if (!empty($alamat_badan_usaha)) 
					{
					
					
						?>
							<td>Alamat Badan Usaha</td>
						<?php
					}
					if (!empty($kelurahan)) {
						?>
							<td>Kelurahan</td>
						<?php
					}
						
					if (!empty($kecamatan)) {
						?>
							<td>Kecamatan</td>
						<?php
					}
					
				?>
			    
			</tr>
		      </thead>
		      <tbody>
			  <?php
			  $no = 1;
			  
			  
					foreach($query as $row) {
				
						$tgl = $this->libraryku->tanggal($row->tgl_reg);
						$id	= $row->no_reg;
						$namaPemohon = $row->nm_pemohon;
						$namaIzin = $row->nm_izin;
						$namaBadanUsaha = $row->nm_bdnusaha;
						$atr = $row->atr_usaha;
						$jenis_reg = $row->jenis_reg;
						if ($jenis_reg == "0")
							$jenis_reg = "Baru";
						elseif ($jenis_reg=="1")
							$jenis_reg = "Perubahan data";
						elseif ($jenis_reg =="2") 
							$jenis_reg = "Penggantian (Hilang/Rusak)";
						else 
							$jenis_reg = "Perpanjangan";
						
						$sta_izin = $row->status_reg;
						if ($sta_izin =="0") 
							$sta_izin = "<font color=\"red\">Belum Ada Reko</font>";
						elseif ($sta_izin == "1") 
							$sta_izin = "Sudah Ada Reko";
						elseif ($sta_izin == "2")
							$sta_izin = "Izin Telah Dicetak";
						elseif ($sta_izin == "3")
							$sta_izin = "Izin Telah Rampung";
						else
							$sta_izin = "Permohonan Ditolak";
						
						?>
						<tr>
							<td><?php echo $tgl;?></td>
							<td><?php echo $id."&nbsp;";?></td>
							<td><?php echo $namaIzin;?></td>
							<td><?php echo $namaPemohon;?></td>
							<?php
							if (!empty($alamat_pemohon)) 
								{
								?>
									<td><?php echo $row->alm_pemohon;?></td>
								<?php
								}
							?>
							<td><?php echo $jenis_reg;?></td>
							<td><?php echo $sta_izin;?></td>
							<td><?php echo $atr ." ". $namaBadanUsaha;?></td>
							<?php
					if (!empty($telp_bdnusaha)) 
					{
					
					
						?>
							<td><?php echo $row->tlp_bdnusaha;?></td>
						<?php
					}
					
					
					if (!empty($alamat_badan_usaha)) 
					{
					
					
						?>
							<td><?php echo $row->alm_bdnusaha;?></td>
						<?php
					}
					if (!empty($kelurahan)) {
						?>
							<td><?php echo $row->nm_kel;?></td>
						<?php
					}
						
					if (!empty($kecamatan)) {
						?>
							<td><?php echo $row->nm_kec;?></td>
						<?php
					}
					
				?>
							
			      </tr>
			      
			      <?php
			      $no++;
			  }
			  ?>
			  
			  
			  </tbody>
			  </table>
</div>
              