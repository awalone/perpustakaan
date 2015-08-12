 <legend style="position: static;">Rekap Perizinan</legend>


		 							<fieldset class="scheduler-border">
		<legend class="scheduler-border">Kriteria Pencarian</legend>
		<form method='post' action='<?php echo $form_action;?>'>
		<table width="100%" style="border-spacing: 0px;">
			
			
			
			
		
			<tr>
				<td>Rentang Waktu</td>
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
							
		  <br />
		  
		 
		 <script type="application/javascript" src="<?php echo base_url("assets/js/tableToExcel.js"); ?>"></script>
		<div style="float:right" class="iconexport">
        <a href="#" onclick="printDiv2('TableData')">
        <img width="50px" height="50px" src="<?php echo base_url("assets/img/document-print-2.png"); ?>" alt="Export Excel"/>
        </a>
        </div>
			
		<div style="float:right" class="iconexport">
        <a href="#" onclick="tableToExcel('TableData','Report Perizinan')">
        <img width="50px" height="50px" src="<?php echo base_url("assets/img/Excel-icon.png"); ?>" alt="Export Excel"/>
        </a>
        </div><br />
        		   <span><h4>Rekap Data Perizinan
					<?php
					
					if (!empty($tanggalCari)) echo $tanggalCari;
					?>
			</h4></span>
		  <table class="table table-striped table-hover" style="font-size: 11px; border: 1px inset;" cellpadding="2" cellspacing="1" width="100%">
		      <thead>
			<tr style="font-weight: bold;" align="center">
				<td rowspan="2">Nama Izin</td>
				<td colspan="2">Mariso</td>
				<td colspan="2">Mamajang</td>
				<td colspan="2">Makassar</td>
				<td colspan="2">Ujung Pandang</td>
				<td colspan="2">Wajo</td>
				<td colspan="2">Bontoala</td>
				<td colspan="2">Tallo</td>
				<td colspan="2">Ujung Tanah</td>
				<td colspan="2">Panakkukang</td>
				<td colspan="2">Tamalate</td>
				<td colspan="2">Biringkanaya</td>
				<td colspan="2">Manggala</td>
				<td colspan="2">Rappocini</td>
				<td colspan="2">Tamalanrea</td>
			   
			</tr>
			<tr style="font-weight: bold;" align="center">
				<td>Registrasi</td>
				<td>Arsip</td>
				<td>Registrasi</td>
				<td>Arsip</td>
				<td>Registrasi</td>
				<td>Arsip</td>
				<td>Registrasi</td>
				<td>Arsip</td>
				<td>Registrasi</td>
				<td>Arsip</td>
				<td>Registrasi</td>
				<td>Arsip</td>
				<td>Registrasi</td>
				<td>Arsip</td>
				<td>Registrasi</td>
				<td>Arsip</td>
				<td>Registrasi</td>
				<td>Arsip</td><td>Registrasi</td>
				<td>Arsip</td>
				<td>Registrasi</td>
				<td>Arsip</td>
				<td>Registrasi</td>
				<td>Arsip</td>
				<td>Registrasi</td>
				<td>Arsip</td>
				<td>Registrasi</td>
				<td>Arsip</td>
			   
			</tr>
		      </thead>
		      <tbody>
			  <?php
			  
			  
					$jum_mariso_registrasi = 0;
					$jum_mariso_arsip = 0;
					$jum_mamajang_registrasi = 0;
					$jum_mamajang_arsip = 0;
					$jum_makassar_registrasi = 0;
					$jum_makassar_arsip = 0;
					$jum_ujungpandang_registrasi = 0;
					$jum_ujungpandang_arsip = 0;
					$jum_wajo_registrasi = 0;
					$jum_wajo_arsip = 0;
					$jum_bontoala_registrasi = 0;
					$jum_bontoala_arsip = 0;
					$jum_tallo_registrasi = 0;
					$jum_tallo_arsip = 0;
					$jum_ujungtanah_registrasi = 0;
					$jum_ujungtanah_arsip = 0;
					$jum_panakkukang_registrasi = 0;
					$jum_panakkukang_arsip = 0;
					$jum_tamalate_registrasi = 0;
					$jum_tamalate_arsip = 0;
					$jum_biringkanaya_registrasi = 0;
					$jum_biringkanaya_arsip = 0;
					$jum_manggala_registrasi = 0;
					$jum_manggala_arsip = 0;
					$jum_rappocini_registrasi = 0;
					$jum_rappocini_arsip = 0;
					$jum_tamalanrea_registrasi = 0;
					$jum_tamalanrea_arsip = 0;
					foreach($query as $row) {
							$nama_izin = $row->nm_izin;
							
							
							$mariso_registrasi = $row->mariso_registrasi;
							$jum_mariso_registrasi += $mariso_registrasi;
							$mariso_arsip = $row->mariso_arsip;
							$jum_mariso_arsip += $mariso_arsip;
							
							
							$mamajang_registrasi = $row->mamajang_registrasi;
							$jum_mamajang_registrasi += $mamajang_registrasi;
							$mamajang_arsip = $row->mamajang_arsip;
							$jum_mamajang_arsip += $mamajang_arsip;
							
							
							$makassar_registrasi = $row->makassar_registrasi;
							$jum_makassar_registrasi += $makassar_registrasi;
							$makassar_arsip = $row->makassar_arsip;
							$jum_makassar_arsip += $makassar_arsip;
							
							
							$ujungpandang_registrasi = $row->ujungpandang_registrasi;
							$jum_ujungpandang_registrasi += $ujungpandang_registrasi;
							$ujungpandang_arsip = $row->ujungpandang_arsip;
							$jum_ujungpandang_arsip += $ujungpandang_arsip;
							
							
							$wajo_registrasi = $row->wajo_registrasi;
							$jum_wajo_registrasi += $wajo_registrasi;
							$wajo_arsip = $row->wajo_arsip;
							$jum_wajo_arsip += $wajo_arsip;
							
							$bontoala_registrasi = $row->bontoala_registrasi;
							$jum_bontoala_registrasi += $bontoala_registrasi;
							$bontoala_arsip = $row->bontoala_arsip;
							$jum_bontoala_arsip += $bontoala_arsip;
							
							
							$tallo_registrasi = $row->tallo_registrasi;
							$jum_tallo_registrasi += $tallo_registrasi;
							$tallo_arsip  = $row->tallo_arsip;
							$jum_tallo_arsip += $tallo_arsip;
							
							
							$ujungtanah_registrasi = $row->ujungtanah_registrasi;
							$jum_ujungtanah_registrasi += $ujungtanah_registrasi;
							$ujungtanah_arsip = $row->ujungtanah_arsip;
							$jum_ujungtanah_arsip += $ujungtanah_arsip;
							
							$panakkukang_registrasi = $row->panakkukang_registrasi;
							$jum_panakkukang_registrasi += $panakkukang_registrasi;
							$panakkukang_arsip = $row->panakkukang_arsip;
							$jum_panakkukang_arsip += $panakkukang_arsip;
							
							$tamalate_registrasi = $row->tamalate_registrasi;
							$jum_tamalate_registrasi += $tamalate_registrasi;
							$tamalate_arsip = $row->tamalate_arsip;
							$jum_tamalate_arsip += $tamalate_arsip;
							
							
							$biringkanaya_registrasi = $row->biringkanaya_registrasi;
							$jum_biringkanaya_registrasi += $biringkanaya_registrasi;
							$biringkanaya_arsip  = $row->biringkanaya_arsip;
							$jum_biringkanaya_arsip += $biringkanaya_arsip;
							
							$manggala_registrasi = $row->manggala_registrasi;
							$jum_manggala_registrasi += $manggala_registrasi;
							$manggala_arsip		 = $row->manggala_arsip;
							$jum_manggala_arsip += $manggala_arsip;
							
							$rappocini_registrasi= $row->rappocini_registrasi;
							$jum_rappocini_registrasi += $rappocini_registrasi;
							$rappocini_arsip	 = $row->rappocini_arsip;
							$jum_rappocini_arsip += $rappocini_arsip;
							
							$tamalanrea_registrasi = $row->tamalanrea_registrasi;
							$jum_tamalanrea_registrasi += $tamalanrea_registrasi;
							$tamalanrea_arsip	= $row->tamalanrea_arsip;
							$jum_tamalanrea_arsip += $tamalanrea_arsip;
					
				?>
						<tr>
							<td><?php echo $nama_izin;?></td>
							<td><?php echo $mariso_registrasi;?></td>
							<td><?php echo $mariso_arsip;?></td>
							<td><?php echo $mamajang_registrasi;?></td>
							<td><?php echo $mamajang_arsip;?></td>
							<td><?php echo $makassar_registrasi;?></td>
							<td><?php echo $makassar_arsip;?></td>
							
							
							
							<td><?php echo $ujungpandang_registrasi;?></td>
							<td><?php echo $ujungpandang_arsip;?></td>
							<td><?php echo $wajo_registrasi;?></td>
							<td><?php echo $wajo_arsip;?></td>
							<td><?php echo $bontoala_registrasi;?></td>
							<td><?php echo $bontoala_arsip;?></td>
							
							<td><?php echo $tallo_registrasi;?></td>
							<td><?php echo $tallo_arsip;?></td>
							<td><?php echo $ujungtanah_registrasi;?></td>
							<td><?php echo $ujungtanah_arsip;?></td>
							<td><?php echo $panakkukang_registrasi;?></td>
							<td><?php echo $panakkukang_arsip;?></td>
							
							<td><?php echo $tamalate_registrasi;?></td>
							<td><?php echo $tamalate_arsip;?></td>
							<td><?php echo $biringkanaya_registrasi;?></td>
							<td><?php echo $biringkanaya_arsip;?></td>
							<td><?php echo $manggala_registrasi;?></td>
							<td><?php echo $manggala_arsip;?></td>
							
							<td><?php echo $rappocini_registrasi;?></td>
							<td><?php echo $rappocini_arsip;?></td>
							<td><?php echo $tamalanrea_registrasi;?></td>
							<td><?php echo $tamalanrea_arsip;?></td>
							
						</tr>
						
						
			  <?php
						
				}
			  ?>
			  
						<tr>
							<td><b>Jumlah</b></td>
							<td><b><?php echo $jum_mariso_registrasi;?></b></td>
							<td><b><?php echo $jum_mariso_arsip;?></b></td>
							<td><b><?php echo $jum_mamajang_registrasi;?></b></td>
							<td><b><?php echo $jum_mamajang_arsip;?></b></td>
							<td><b><?php echo $jum_makassar_registrasi;?></b></td>
							<td><b><?php echo $jum_makassar_arsip;?></b></td>
							
							
							
							<td><b><?php echo $jum_ujungpandang_registrasi;?></b></td>
							<td><b><?php echo $jum_ujungpandang_arsip;?></b></td>
							<td><b><?php echo $jum_wajo_registrasi;?></b></td>
							<td><b><?php echo $jum_wajo_arsip;?></b></td>
							<td><b><?php echo $jum_bontoala_registrasi;?></b></td>
							<td><b><?php echo $jum_bontoala_arsip;?></b></td>
							
							<td><b><?php echo $jum_tallo_registrasi;?></b></td>
							<td><b><?php echo $jum_tallo_arsip;?></b></td>
							<td><b><?php echo $jum_ujungtanah_registrasi;?></b></td>
							<td><b><?php echo $jum_ujungtanah_arsip;?></b></td>
							<td><b><?php echo $jum_panakkukang_registrasi;?></b></td>
							<td><b><?php echo $jum_panakkukang_arsip;?></b></td>
							
							<td><b><?php echo $jum_tamalate_registrasi;?></b></td>
							<td><b><?php echo $jum_tamalate_arsip;?></b></td>
							<td><b><?php echo $jum_biringkanaya_registrasi;?></b></td>
							<td><b><?php echo $jum_biringkanaya_arsip;?></b></td>
							<td><b><?php echo $jum_manggala_registrasi;?></b></td>
							<td><b><?php echo $jum_manggala_arsip;?></b></td>
							
							<td><b><?php echo $jum_rappocini_registrasi;?></b></td>
							<td><b><?php echo $jum_rappocini_arsip;?></b></td>
							<td><b><?php echo $jum_tamalanrea_registrasi;?></b></td>
							<td><b><?php echo $jum_tamalanrea_arsip;?></b></td>
						</tr>
			  </tbody>
			  </table>
			 
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
				@media print{@page {size: landscape}
			 	.printHeader { background:#00CCCC }
				   body table { page-break-inside:auto}
				   body tr    { page-break-inside:avoid; page-break-after:auto;}
				   body thead { display:table-header-group}
				   body tfoot { display:table-footer-group }
				   .tableisisimbadcetak .rhead td{ border:#333333 1px solid  }
				  body td  {border:1px solid; background-color:#33CCFF}
				  }
			 </style>

			
            <span><h4>Rekap Perizinan</h4></span>
		  
		  <table class="table table-striped table-hover" style="font-size: 11px; border: 1px inset;" cellpadding="2" cellspacing="1" width="100%">
		      <thead>
			<tr style="font-weight: bold;" align="center">
				<td rowspan="2">Nama Izin</td>
				<td colspan="2">Mariso</td>
				<td colspan="2">Mamajang</td>
				<td colspan="2">Makassar</td>
				<td colspan="2">Ujung Pandang</td>
				<td colspan="2">Wajo</td>
				<td colspan="2">Bontoala</td>
				<td colspan="2">Tallo</td>
				<td colspan="2">Ujung Tanah</td>
				<td colspan="2">Panakkukang</td>
				<td colspan="2">Tamalate</td>
				<td colspan="2">Biringkanaya</td>
				<td colspan="2">Manggala</td>
				<td colspan="2">Rappocini</td>
				<td colspan="2">Tamalanrea</td>
			   
			</tr>
			<tr style="font-weight: bold;" align="center">
				<td>Registrasi</td>
				<td>Arsip</td>
				<td>Registrasi</td>
				<td>Arsip</td>
				<td>Registrasi</td>
				<td>Arsip</td>
				<td>Registrasi</td>
				<td>Arsip</td>
				<td>Registrasi</td>
				<td>Arsip</td>
				<td>Registrasi</td>
				<td>Arsip</td>
				<td>Registrasi</td>
				<td>Arsip</td>
				<td>Registrasi</td>
				<td>Arsip</td>
				<td>Registrasi</td>
				<td>Arsip</td><td>Registrasi</td>
				<td>Arsip</td>
				<td>Registrasi</td>
				<td>Arsip</td>
				<td>Registrasi</td>
				<td>Arsip</td>
				<td>Registrasi</td>
				<td>Arsip</td>
				<td>Registrasi</td>
				<td>Arsip</td>
			   
			</tr>
		      </thead>
		      <tbody>
			  <?php
			  
			  
					$jum_mariso_registrasi = 0;
					$jum_mariso_arsip = 0;
					$jum_mamajang_registrasi = 0;
					$jum_mamajang_arsip = 0;
					$jum_makassar_registrasi = 0;
					$jum_makassar_arsip = 0;
					$jum_ujungpandang_registrasi = 0;
					$jum_ujungpandang_arsip = 0;
					$jum_wajo_registrasi = 0;
					$jum_wajo_arsip = 0;
					$jum_bontoala_registrasi = 0;
					$jum_bontoala_arsip = 0;
					$jum_tallo_registrasi = 0;
					$jum_tallo_arsip = 0;
					$jum_ujungtanah_registrasi = 0;
					$jum_ujungtanah_arsip = 0;
					$jum_panakkukang_registrasi = 0;
					$jum_panakkukang_arsip = 0;
					$jum_tamalate_registrasi = 0;
					$jum_tamalate_arsip = 0;
					$jum_biringkanaya_registrasi = 0;
					$jum_biringkanaya_arsip = 0;
					$jum_manggala_registrasi = 0;
					$jum_manggala_arsip = 0;
					$jum_rappocini_registrasi = 0;
					$jum_rappocini_arsip = 0;
					$jum_tamalanrea_registrasi = 0;
					$jum_tamalanrea_arsip = 0;
					foreach($query as $row) {
							$nama_izin = $row->nm_izin;
							
							
							$mariso_registrasi = $row->mariso_registrasi;
							$jum_mariso_registrasi += $mariso_registrasi;
							$mariso_arsip = $row->mariso_arsip;
							$jum_mariso_arsip += $mariso_arsip;
							
							
							$mamajang_registrasi = $row->mamajang_registrasi;
							$jum_mamajang_registrasi += $mamajang_registrasi;
							$mamajang_arsip = $row->mamajang_arsip;
							$jum_mamajang_arsip += $mamajang_arsip;
							
							
							$makassar_registrasi = $row->makassar_registrasi;
							$jum_makassar_registrasi += $makassar_registrasi;
							$makassar_arsip = $row->makassar_arsip;
							$jum_makassar_arsip += $makassar_arsip;
							
							
							$ujungpandang_registrasi = $row->ujungpandang_registrasi;
							$jum_ujungpandang_registrasi += $ujungpandang_registrasi;
							$ujungpandang_arsip = $row->ujungpandang_arsip;
							$jum_ujungpandang_arsip += $ujungpandang_arsip;
							
							
							$wajo_registrasi = $row->wajo_registrasi;
							$jum_wajo_registrasi += $wajo_registrasi;
							$wajo_arsip = $row->wajo_arsip;
							$jum_wajo_arsip += $wajo_arsip;
							
							$bontoala_registrasi = $row->bontoala_registrasi;
							$jum_bontoala_registrasi += $bontoala_registrasi;
							$bontoala_arsip = $row->bontoala_arsip;
							$jum_bontoala_arsip += $bontoala_arsip;
							
							
							$tallo_registrasi = $row->tallo_registrasi;
							$jum_tallo_registrasi += $tallo_registrasi;
							$tallo_arsip  = $row->tallo_arsip;
							$jum_tallo_arsip += $tallo_arsip;
							
							
							$ujungtanah_registrasi = $row->ujungtanah_registrasi;
							$jum_ujungtanah_registrasi += $ujungtanah_registrasi;
							$ujungtanah_arsip = $row->ujungtanah_arsip;
							$jum_ujungtanah_arsip += $ujungtanah_arsip;
							
							$panakkukang_registrasi = $row->panakkukang_registrasi;
							$jum_panakkukang_registrasi += $panakkukang_registrasi;
							$panakkukang_arsip = $row->panakkukang_arsip;
							$jum_panakkukang_arsip += $panakkukang_arsip;
							
							$tamalate_registrasi = $row->tamalate_registrasi;
							$jum_tamalate_registrasi += $tamalate_registrasi;
							$tamalate_arsip = $row->tamalate_arsip;
							$jum_tamalate_arsip += $tamalate_arsip;
							
							
							$biringkanaya_registrasi = $row->biringkanaya_registrasi;
							$jum_biringkanaya_registrasi += $biringkanaya_registrasi;
							$biringkanaya_arsip  = $row->biringkanaya_arsip;
							$jum_biringkanaya_arsip += $biringkanaya_arsip;
							
							$manggala_registrasi = $row->manggala_registrasi;
							$jum_manggala_registrasi += $manggala_registrasi;
							$manggala_arsip		 = $row->manggala_arsip;
							$jum_manggala_arsip += $manggala_arsip;
							
							$rappocini_registrasi= $row->rappocini_registrasi;
							$jum_rappocini_registrasi += $rappocini_registrasi;
							$rappocini_arsip	 = $row->rappocini_arsip;
							$jum_rappocini_arsip += $rappocini_arsip;
							
							$tamalanrea_registrasi = $row->tamalanrea_registrasi;
							$jum_tamalanrea_registrasi += $tamalanrea_registrasi;
							$tamalanrea_arsip	= $row->tamalanrea_arsip;
							$jum_tamalanrea_arsip += $tamalanrea_arsip;
					
				?>
						<tr>
							<td><?php echo $nama_izin;?></td>
							<td><?php echo $mariso_registrasi;?></td>
							<td><?php echo $mariso_arsip;?></td>
							<td><?php echo $mamajang_registrasi;?></td>
							<td><?php echo $mamajang_arsip;?></td>
							<td><?php echo $makassar_registrasi;?></td>
							<td><?php echo $makassar_arsip;?></td>
							
							
							
							<td><?php echo $ujungpandang_registrasi;?></td>
							<td><?php echo $ujungpandang_arsip;?></td>
							<td><?php echo $wajo_registrasi;?></td>
							<td><?php echo $wajo_arsip;?></td>
							<td><?php echo $bontoala_registrasi;?></td>
							<td><?php echo $bontoala_arsip;?></td>
							
							<td><?php echo $tallo_registrasi;?></td>
							<td><?php echo $tallo_arsip;?></td>
							<td><?php echo $ujungtanah_registrasi;?></td>
							<td><?php echo $ujungtanah_arsip;?></td>
							<td><?php echo $panakkukang_registrasi;?></td>
							<td><?php echo $panakkukang_arsip;?></td>
							
							<td><?php echo $tamalate_registrasi;?></td>
							<td><?php echo $tamalate_arsip;?></td>
							<td><?php echo $biringkanaya_registrasi;?></td>
							<td><?php echo $biringkanaya_arsip;?></td>
							<td><?php echo $manggala_registrasi;?></td>
							<td><?php echo $manggala_arsip;?></td>
							
							<td><?php echo $rappocini_registrasi;?></td>
							<td><?php echo $rappocini_arsip;?></td>
							<td><?php echo $tamalanrea_registrasi;?></td>
							<td><?php echo $tamalanrea_arsip;?></td>
							
						</tr>
						
						
			  <?php
						
				}
			  ?>
			  
						<tr>
							<td><b>Jumlah</b></td>
							<td><b><?php echo $jum_mariso_registrasi;?></b></td>
							<td><b><?php echo $jum_mariso_arsip;?></b></td>
							<td><b><?php echo $jum_mamajang_registrasi;?></b></td>
							<td><b><?php echo $jum_mamajang_arsip;?></b></td>
							<td><b><?php echo $jum_makassar_registrasi;?></b></td>
							<td><b><?php echo $jum_makassar_arsip;?></b></td>
							
							
							
							<td><b><?php echo $jum_ujungpandang_registrasi;?></b></td>
							<td><b><?php echo $jum_ujungpandang_arsip;?></b></td>
							<td><b><?php echo $jum_wajo_registrasi;?></b></td>
							<td><b><?php echo $jum_wajo_arsip;?></b></td>
							<td><b><?php echo $jum_bontoala_registrasi;?></b></td>
							<td><b><?php echo $jum_bontoala_arsip;?></b></td>
							
							<td><b><?php echo $jum_tallo_registrasi;?></b></td>
							<td><b><?php echo $jum_tallo_arsip;?></b></td>
							<td><b><?php echo $jum_ujungtanah_registrasi;?></b></td>
							<td><b><?php echo $jum_ujungtanah_arsip;?></b></td>
							<td><b><?php echo $jum_panakkukang_registrasi;?></b></td>
							<td><b><?php echo $jum_panakkukang_arsip;?></b></td>
							
							<td><b><?php echo $jum_tamalate_registrasi;?></b></td>
							<td><b><?php echo $jum_tamalate_arsip;?></b></td>
							<td><b><?php echo $jum_biringkanaya_registrasi;?></b></td>
							<td><b><?php echo $jum_biringkanaya_arsip;?></b></td>
							<td><b><?php echo $jum_manggala_registrasi;?></b></td>
							<td><b><?php echo $jum_manggala_arsip;?></b></td>
							
							<td><b><?php echo $jum_rappocini_registrasi;?></b></td>
							<td><b><?php echo $jum_rappocini_arsip;?></b></td>
							<td><b><?php echo $jum_tamalanrea_registrasi;?></b></td>
							<td><b><?php echo $jum_tamalanrea_arsip;?></b></td>
						</tr>
			  </tbody>
			  </table>

</div>