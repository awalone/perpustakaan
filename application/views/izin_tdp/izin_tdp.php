
 <legend style="position: static;"><a href="<?php echo site_url('izinIndustri'); ?>">Rekomendasi Izin Tanda Daftar Perusahaan</a></legend>
	  <div class="static" style="position: relative; overflow: hidden">
		      			<!--	<a class="btn btn-info" href="<?php //echo $link; ?>">Tambah Data</a>    !-->
		      				
							
		  					</div><br />
			<div class="input-append" style="float: right; margin-top: -40px;">
					<form method="POST" placeholder="no.registrasi" action="<?php echo $search; ?>">
						<input type="text" size="30" placeholder="Pencarian Izin" id="idRegistrasi" value="" name="keyword" />
						<button class="btn btn-info"><i class="icon-search icon-white"></i></button>
					</form>
			</div>
		   <div class="alert alert-success">
			     				 
			      				<strong>Permohonan Izin Tanda Daftar Perusahaan</strong>.
			  </div>
			  
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
			
			
			if (!empty($found)) {
				?>
								<div class="alert alert-info">
			     				 <a class="close" data-dismiss="alert">x</a>
			      				<strong><?php echo $found;?></strong>.
			  </div>
					<?php	
			}
			
			
			if (!empty($notfound)) {
				?>
								<div class="alert alert-danger">
			     				 <a class="close" data-dismiss="alert">x</a>
			      				<strong><?php echo $notfound;?></strong>.
			  </div>
					<?php	
			}
		
		
		    //cek dulu , apakah ada kategori produk atau tidak
		    //jumlah = $jumlah	
		    
		    if ($jumlah > 0)
		    {
			
		    
		?>
		
		
		
		  <table class="table table-striped table-hover" style="font-size: 12px; border: 1px inset;" cellpadding="2" cellspacing="1" width="100%">
		      <thead>
			<tr style="font-weight: bold;" align="center">
			    <td>No</td>
			    <td>No. Izin</td>
				<td>No. TDP</td>
			    <td>Tgl. Izin</td>
			    <td>Nama Pemilik</td>
				<td>Badan Usaha</td>
				<td>Kelurahan</td>
				<td>Pembaruan Ke -</td>
				<td>Detail</td>
			</tr>
		      </thead>
		      <tbody>
		      
		      
		      <?php
			  //tampilkan data datanya
			  //data kategori = $kategori
			  
						  
			  
			  $no = 1;
			  foreach($query as $row) {
			      $no_izin	= $row->no_izin;
				  $no_rekomendasi = $row->no_reko;
			      $tgl_izin = $row->tgl_izin;
				  $nm_kelurahan = $row->nm_kel;
				  $nm_pemohon = $row->nm_pemohon;
				  $nm_bdnusaha = $row->nm_bdnusaha;
				  $jml_her = $row->jml_her;
				  $no_tdp = $row->no_tdp;
				  $enkrip = $this->enkrip->encode($no_izin);
				  
			      ?>
			      
			      <tr>
				  <td><?php echo $no;?></td>
				  <td><?php echo $no_izin;?></td>
				  <td><?php echo $no_tdp;?></td>
				  <td><?php echo $this->libraryku->tanggal($tgl_izin);?></td>
				  
				  <td><?php echo $nm_pemohon;?></td>
				  <td><?php echo $nm_bdnusaha;?></td>
				  <td><?php echo $nm_kelurahan;?></td>
				  <td><?php echo $jml_her;?></td>
				  
				  <?php
				  if (!empty($statusCetak)) {
					?>
						<td><a href="<?php echo site_url('cetak_tdp/cetak_detail/'.$enkrip);?>">Cetak</a></td>
					<?php
				  } 
				  
				  elseif (!empty($statusArsip)) {
						?>
						<td><a href="<?php echo site_url('arsip_tdp/arsip_detail/'.$enkrip);?>">Pilih</a></td>
						<?php
					}
				  
				  
				  /*
				  else {
						?>
						<td><a href="<?php echo site_url('izin_tdp/change/'.$enkrip);?>">Ubah Status</a> | <a href="<?php echo site_url('izin_tdp/ubahketerangan/'.$enkrip);?>">Keterangan Izin</a></td>
						<?php
					}
					*/
					else {
						?>
							<td><a href="<?php echo site_url('izin_tdp/update/'.$enkrip);?>">Ubah Data</a></td>
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
		  <?php
			echo $pagination;
		    }
		    else {
		    			?>
		    			<div class="alert alert-info">
  						
  							<strong><h4>Maaf !</h4></strong>Data Rekomendasi Izin Tanda Daftar Perusahaan
						</div>
		    			<?php	
		    }
				

			if (!empty($back)) {
				?>
					<a class="btn btn-small btn-danger" href="<?php echo $back; ?>"><i class="icon-arrow-left icon-white"></i> Kembali</a>
				<?php
			}
		    
		  ?>
		 
	     

