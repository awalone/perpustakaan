 	
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
			    <td>Nama Golongan</td>
			    <td>Alias</td>
			    <td>Aksi</td>
			</tr>
		      </thead>
		      <tbody>
		      
		      
		      <?php
			  //tampilkan data datanya
			  //data kategori = $kategori
			  
						  
			  
			  $no = 1;
			  foreach($query as $row) {
			      $id_gol	= $row->id_gol;
			      $nm_gol = $row->nm_gol;
			      $alias = $row->alias_gol;
				  
				 			
			      ?>
			      
			      <tr>
				  <td><?php echo $id_gol;?></td>
				  <td><?php echo $nm_gol;?></td>
				  <td><?php echo $alias;?></td>
				 
				  <td>
				  
				  <div class="btn-group">
	       
	          <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="<?php echo site_url("/kbli/update/$id_gol");?>"><i class="icon-pencil"></i> Edit</a></li>
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
  						
  							<strong><h4>Maaf !</h4></strong>Data KBLI Masih Kosong
						</div>
		    			<?php	
		    }
						    
		    
		  ?>
		 
	     

