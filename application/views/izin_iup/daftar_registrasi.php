 <br /><br />
 <legend style="position: static;"><a href="<?php echo site_url('izin_iup'); ?>">Rekomendasi Izin Usaha Perdagangan</a> > Pilih Data Registrasi</legend><br />
		<div class="input-append" style="float: right; margin-top: -40px;">
					<form method="POST" placeholder="no.registrasi" action="<?php echo $search; ?>">
						<input type="text" size="30" placeholder="pencarian registrasi" id="idRegistrasi" value="" name="keyword" />
						<button class="btn btn-info"><i class="icon-search icon-white"></i></button>
					</form>
			</div>
			
			  <div class="alert alert-success">
			     				 
			      				<strong>Permohonan Izin Usaha Perusahaan</strong>.
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
			    <td>No. Registrasi</td>
				<td>Tanggal Rekomendasi</td>
			    <td>Nama Pemilik</td>
			    <td>Nama Badan Usaha</td>
			    <td>Alamat</td>
			    <td>Aksi</td>
			</tr>
		      </thead>
		      <tbody>
		      
		      
		      <?php
			  //tampilkan data datanya
			  //data kategori = $kategori
			  
						  
			  
			  $no = 1;
			  foreach($query as $row) {
			      $nomorRegistrasi	= $row->no_reg;
			      $namaPendaftar = $row->nm_pemohon;
			      $namaBadanUsaha = $row->nm_bdnusaha;
			      $atr_usaha	= $row->atr_usaha;
				  $alm_bdnusaha = $row->alm_bdnusaha;
				  $tanggalRegistrasi = $this->libraryku->tanggal($row->tgl_reg);
				  $id = $this->enkrip->encode($nomorRegistrasi);
			      ?>
			      
			      <tr>
				  <td><?php echo $no;?></td>
				  <td><?php echo $nomorRegistrasi;?></td>
				  <td><?php echo $tanggalRegistrasi;?></td>
				  <td><?php echo $namaPendaftar;?></td>
				  <td><?php echo $namaBadanUsaha;?></td>
				  <td><?php echo $alm_bdnusaha;?></td>
				  
				  
				  <td>
				  <div class="btn-group">
						<a class="btn btn-small" href="<?php echo site_url('izin_iup/add/'.$id); ?>"><i class="icon-ok-circle"></i> Pilih</a>
	        </div><!-- /btn-group -->
				  
				  
					
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
		    }
		    else {
		    			?>
		    			<div class="alert alert-info">
  						
  							<strong><h4>Maaf !</h4></strong>Data Registrasi Izin Usaha Perdagangan Masih Kosong
						</div>
		    			<?php	
		    }
						    
		    if (!empty($back)) {
				?>
					<a class="btn btn-small btn-danger" href="<?php echo $back; ?>"><i class="icon-arrow-left icon-white"></i> Kembali</a>
				<?php
			}
		  ?>
		 
	     

