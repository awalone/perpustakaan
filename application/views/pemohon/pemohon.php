 	 <h3><span style="float: left; margin-top: -5px;">Data Pemohon</span></h3>
		   <div class="static" style="float: right;">
		      				<a class="btn btn-info" href="<?php echo $link; ?>">Tambah Data</a>    
		      				
							
		  					</div>
		 <br />
		  
	
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
		
		
		
		  <table class="table table-striped table-hover" style="font-size: 12px; border: 1px inset;" cellpadding="2" cellspacing="1" width="100%">
		      <thead>
			<tr style="font-weight: bold;" align="center">
			    <td>No</td>
			    <td>ID Pemohon</td>
				<td>Nama Pemohon</td>
			    <td>No. KTP</td>
				
			    <td>Pilih</td>
			    
			</tr>
		      </thead>
		      <tbody>
		      
		      
		      <?php
			   $no = 1;
			  
			  
					foreach($query as $row) {
						$idPemohon	= $row->id_pemohon;
						$namaPemohon = $row->nm_pemohon;
						$ktpPemohon	= $row->ktp_pemohon;
						
						
						
						?>
						<tr>
							<td><?php echo $no;?></td>
							<td><?php echo $idPemohon;?></td>
							<td><?php echo $namaPemohon;?></td>
							<td><?php echo $ktpPemohon;?></td>
							
						<td>
						<div class="btn-group">
	          <a class="btn btn-small" href="#"><i class="icon-ok-circle"></i> Detail</a>
	          <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="<?php echo site_url("/pemohon/update/$idPemohon");?>"><i class="icon-pencil"></i> Edit</a></li>
	            <li><a href="<?php echo site_url("/pemohon/delete/$idPemohon");?>" onClick="return confirm('Anda yakin..???');"><i class="icon-trash"></i> Hapus Data</a></li>
	          </ul>
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
		    }
		    else {
		    			?>
		    			<div class="alert alert-info">
  						
  							<strong><h4>Maaf !</h4></strong>Data Pegawai Masih Kosong
						</div>
		    			<?php	
		    }
						    
		    
		  ?>
		 
	     

