 <legend style="position: static;"><a href="<?php echo site_url('arsip_iui'); ?>">Data Perizinan Usaha Industri</a></legend>
	  <div class="static" style="position: relative; overflow: hidden">
		      			
		      				
								</div> 
							
			<!-- <div class="input-append" style="float: right; margin-top: -20px;"> !-->
          
			<br />
			<div class="input-append" style="float: right; margin-top: -40px;">
					<form method="POST" placeholder="no.registrasi" action="<?php echo $search; ?>">
						<input type="text" size="30" placeholder="Pencarian Izin" id="idRegistrasi" value="" name="keyword" />
						<button class="btn btn-info"><i class="icon-search icon-white"></i></button>
					</form>
			</div>
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
				<td>Badan Usaha</td>
				<td>Kelurahan</td>
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
				  <td>
					<?php
						//check apakah sudah ada data arsip untuk izin atau tidak (nilai = 1)
						$jumlahIzin = $this->arsip->check_arsip_izin($no_izin);
						if ($jumlahIzin > 0) {
							?>
								<span class="label label-success">Arsip Izin</span>
							<?php
						}
						else {
							?>
								<a class="label label-important" href="<?php echo site_url('arsip_iui/arsip_detail/1/'.$enkrip);?>">Arsip Izin</a> 
							<?php
						}
					?>
					<?php
						$jumlahReko = $this->arsip->check_arsip_reko($no_izin);
						if ($jumlahReko > 0) {
							?>
								<span class="label label-success">Rekomendasi</span> 
							<?php
						} else {
							?>
								<a class="label label-important" href="<?php echo site_url('arsip_iui/arsip_detail/0/'.$enkrip);?>">Rekomendasi</a> 
							<?php
						}	
					?>
					
					<?php
						$syarat = $this->arsip->check_arsip($no_izin);
						if ($syarat > 1) {
							?>
								<a class="label label-success" href="<?php echo site_url('arsip_iui/view_arsip/'.$enkrip); ?>">Arsip Lengkap</a> 
							<?php
						} else {
							?>
								<span class="label label-important">Arsip Belum Lengkap</span> 
							<?php
						}
					?>
					
			
				   </td>
						
				   
				  
			      
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
  						
  							<strong><h4>Maaf !</h4></strong>Data Rekomendasi Izin Gangguan Masih Kosong
						</div>
		    			<?php	
		    }
						    
		    
			if (!empty($back)) {
				?>
					<a class="btn btn-small btn-danger" href="<?php echo $back; ?>"><i class="icon-arrow-left icon-white"></i> Kembali</a>
				<?php
			}
			
			
			echo $pagination;
		  ?>
		 
	     

