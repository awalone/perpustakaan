<br /><br />
 <legend style="position: static;"><a href="<?php echo site_url('izin_sig'); ?>">Izin Usaha Gangguan</a></legend>
	  <div class="static" style="position: relative; overflow: hidden">
		      			<!--	<a class="btn btn-info" href="<?php //echo $link; ?>">Tambah Data</a>    !-->
		      				
							
		  					</div>
							
							<div class="input-append" style="float: right; margin-top: -20px;">
					<form method="POST" placeholder="no.registrasi" action="<?php echo $search; ?>">
						<input type="text" size="30" placeholder="pencarian izin" id="idRegistrasi" value="" name="keyword" />
						<button class="btn btn-info"><i class="icon-search icon-white"></i></button>
					</form>
			</div>
			
			<br />
							
		   <div class="alert alert-success">
			     				 
			      				<strong>Permohonan Izin Gangguan</strong>.
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
				<td>No. Rekomendasi</td>
				<td>Tgl. Izin</td>
			    <td>Nama Pemilik</td>
			    <td>Nama Badan Usaha</td>
			    <td>Kelurahan</td>
			    <td>Aksi</td>
			</tr>
		      </thead>
		      <tbody>
		      
		      
		      <?php
			  //tampilkan data datanya
			  //data kategori = $kategori
			  
						  
			  
			  $no = 1;
			  foreach($query as $row) {
			      $idIzin	= $row->no_izin;
				  $enkrip = $this->enkrip->encode($idIzin);
			      $namaPendaftar = $row->nm_pemohon;
			      $nomorRegistrasi = $row->no_reg;
				  $noreko = $row->no_reko;
			      $namaBadanUsaha = $row->nm_bdnusaha;
				  $nm_kelurahan = $row->nm_kel;
				  $tgl_izin = $this->libraryku->tanggal($row->tgl_izin);
				  	
			      ?>
			      
			      <tr>
				  <td><?php echo $no;?></td>
				  <td><?php echo $idIzin;?></td>
				  <td><?php echo $noreko;?></td>
				  <td><?php echo $tgl_izin;?></td>
				  <td><?php echo $namaPendaftar;?></td>
					<td><?php echo $namaBadanUsaha;?></td>
				  <td><?php echo $nm_kelurahan;?></td>
				  
				  <?php
					if (!empty($statusCetak)) {
						?>
						<td><a href="<?php echo site_url('cetak_sig/cetak_detail/'.$enkrip);?>">Cetak</a></td>
						<?php
					}
					
					elseif (!empty($statusArsip)) {
						?>
						<td><a href="<?php echo site_url('arsip_sig/arsip_detail/'.$enkrip);?>">Pilih</a></td>
						<?php
					}
					/*
					else {
						?>
						<td><a href="<?php echo site_url('izin_sig/change/'.$enkrip);?>">Ubah Status</a> | <a href="<?php echo site_url('izin_sig/ubahketerangan/'.$enkrip);?>">Keterangan Izin</a></td>
						<?php
					}
					*/
					else {
						?>
						<td><a href="<?php echo site_url('izin_sig/update/'.$enkrip);?>">Ubah Data</a> | <a href="<?php echo site_url('izin_sig/tambah_bidang_usaha/'.$enkrip);?>">Tambah Bidang Usaha</a></td>
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
  						
  							<strong><h4>Maaf !</h4></strong>Data Perizinan Gangguan Masih Kosong
						</div>
		    			<?php	
		    }
				

			
			if (!empty($back)) {
				?>
					<a class="btn btn-small btn-danger" href="<?php echo $back; ?>"><i class="icon-arrow-left icon-white"></i> Kembali</a>
				<?php
			}

				
		    
		  ?>
		 
	     

