 	
							<div class="static" style="position: relative; overflow: hidden">
		      				<a class="btn btn-info" href="<?php echo $link; ?>">Tambah Data</a>    
		      				
							
		  					</div>
		  					
		  				
		  
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
			    <td>Nama Module</td>
			    <td>Nama Link</td>
			    <td>Aksi</td>
			</tr>
		      </thead>
		      <tbody>
		      
		      
		      <?php
			  //tampilkan data datanya
			  //data kategori = $kategori
			  
						  
			  
			  $no = 1;
			  foreach($query as $row) {
			      $idModule	= $row->id_module;
			      $namaModule = $row->nama_module;
			      $namaLink = $row->link_module;
				  
				 			
			      ?>
			      
			      <tr>
				  <td><?php echo $no;?></td>
				  <td><?php echo $namaModule;?></td>
				  <td><?php echo $namaLink;?></td>
				 
				  <td>
				  
				  <div class="btn-group">
	       
	          <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="<?php echo site_url("/module/update/$idModule");?>"><i class="icon-pencil"></i> Edit</a></li>
	            <li><a href="<?php echo site_url("/module/delete/$idModule");?>" onClick="return confirm('Anda yakin..???');"><i class="icon-trash"></i> Hapus Data</a></li>
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
  						
  							<strong><h4>Maaf !</h4></strong>Data module Masih Kosong
						</div>
		    			<?php	
		    }
						    
		    
		  ?>
		 
	     

