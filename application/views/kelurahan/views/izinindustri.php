 <br /><br />
 <legend style="position: static;"><a href="<?php echo site_url('izinIndustri'); ?>">Rekomendasi Izin Usaha Industri</a></legend>
	  <div class="static" style="position: relative; overflow: hidden">
		      				<a class="btn btn-info" href="<?php echo $link; ?>">Tambah Data</a>    
		      				
							
		  					</div><br />
			
		   <div class="alert alert-success">
			     				 
			      				<strong>Permohonan Izin Usaha Industri</strong>.
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
				<td>Badan Usaha</td>
				<td>Kelurahan</td>
				<td>Investasi</td>
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
				  $investasi = $row->investasi;
				  $enkrip = $this->enkrip->encode($no_izin);
				  
			      ?>
			      
			      <tr>
				  <td><?php echo $no;?></td>
				  <td><?php echo $no_izin;?></td>
				  <td><?php echo $no_rekomendasi;?></td>
				  <td><?php echo $this->libraryku->tanggal($tgl_izin);?></td>
				  
				  <td><?php echo $nm_pemohon;?></td>
				  <td><?php echo $nm_bdnusaha;?></td>
				  <td><?php echo $nm_kelurahan;?></td>
				  <td><?php echo $this->libraryku->format_rupiah($investasi);?></td>
				  <td><a href="<?php echo site_url('rekomendasiImb/cetak/'.$enkrip);?>" target="_blank">Lihat</a></td>
				
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
  						
  							<strong><h4>Maaf !</h4></strong>Data Rekomendasi Izin IMB Masih Kosong
						</div>
		    			<?php	
		    }
						    
		    
		  ?>
		 
	     

