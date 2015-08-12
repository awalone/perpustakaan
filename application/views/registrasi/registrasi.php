						
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/thickbox.js"></script>
<script type="text/javascript">
	$(function() {
		$('#loading').ajaxStart(function(){
			$(this).fadeIn();
		}).ajaxStop(function(){
			$(this).fadeOut();
		});
	});

	function cariRegistrasi(idRegistrasi) {
		if(idRegistrasi.length == 0) {
			$('#hasilPencarian').hide();
		} else {
			$.post("<?php echo base_url(); ?>index.php/registrasi/autocomplete", {kirimNama: ""+idRegistrasi+""}, function(data){
				if(data.length >0) {
					$('#hasilPencarian').fadeIn();
					$('#dataPencarian').html(data);
				}
			});
		}
	} 
	
	function pilih(thisValue) {
		$('#idRegistrasi').val(thisValue);
		setTimeout("$('#hasilPencarian').fadeOut();", 100);
	}
</script>

<style type="text/css">
		
	.kotakHasil {

		padding :0px;
		background-color: #fff;
		border : 1px solid #666;
		width : 400px;
		position: absolute;
	}
	
	.daftarPencarian {
		margin: 0px;
		padding: 0px;
	}
	
	.daftarPencarian ul {
		margin:0px;
		padding: 0px;
	}
	
	.daftarPencarian li {
		margin:0px;
		padding: 5px;
		cursor: pointer;
		list-style : none;
	}
	
	.daftarPencarian li:hover {
		background-color: #072066;
		color: #fff;
	}
	
	#total{
		background-color:#f3f3f3; 
		padding:10px; 
		text-align:center;
	}
	
		a:hover{
		text-decoration:underline;
		color:#000;
	}
</style>




 <legend style="position: static;">Status Permohonan Izin</legend>
		  
	<fieldset class="scheduler-border">
		<legend class="scheduler-border">Kriteria Pencarian</legend>
		<form method='post' action='<?php echo $search;?>'>
		<table width="100%" style="border-spacing: 0px;">
			
			<tr>
				<td>No. Registrasi / Badan Usaha</td>
				<td><div class="input-append" style="margin-top: 10px;">
				<input type="text" size="30" name="keyword" />
				<div class="kotakHasil" id="hasilPencarian" style="display: none;">
				<div class="daftarPencarian" id="dataPencarian">
					
				</div>
			</div></td>
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
				<td></td>
				<td><input type="submit" value="cari" /></td>
			</tr>
		</table>	
		</form>
	</fieldset>

		 							
							
		  <br />
		  
		  
		  
		  
		<?php
		
			$pesanSukses = $this->session->flashdata('sukses');
			if ($pesanSukses != "")
			{
					?>
								<div class="alert alert-info">
			     				 <a class="close" data-dismiss="alert">x</a>
			      				<strong><?php echo $pesanSukses;?></strong>.
			  </div>
					<?php	
			} 
			
			
			
		    //cek dulu , apakah ada kategori produk atau tidak
		    //jumlah = $jumlah	
		    
		    if ($jumlah > 0)
		    {
			
		    
		?>
		
		
		
		  <table class="table table-striped table-hover" style="font-size: 11px; border: 1px inset;" cellpadding="2" cellspacing="1" width="100%">
		      <thead>
			<tr style="font-weight: bold;" align="center">
				<td>Tgl. Registrasi</td>
				<td>No. Registrasi</td>
				<td>Jenis Izin</td>
			    <td>Nama Pemohon</td>
				<td>Jenis Permohonan</td>
				<td>Status Izin</td>
			    <td>Nama Badan Usaha</td>
			    <td>Aksi</td>
			    
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
							<td><?php echo $id;?></td>
							<td><?php echo $namaIzin;?></td>
							<td><?php echo $namaPemohon;?></td>
							
							<td><?php echo $jenis_reg;?></td>
							<td><?php echo $sta_izin;?></td>
							<td><?php echo $atr ." ". $namaBadanUsaha;?></td>
							<td><a href="#" onclick="windowPreview('<?php echo site_url('registrasi/cetakTampil/'.$id);?>',720,600)">Cetak</a></td>
							
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
		    }
		    else {
		    			?>
		    			<div class="alert alert-info">
  						
  							<strong><h4>Maaf !</h4></strong>Data Tidak Ditemukan
						</div>
		    			<?php	
		    }
						    
		    
		  ?>
		 
	     </div>

