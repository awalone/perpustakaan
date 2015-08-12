 	  <h3>Manajemen Group</h3>
		  
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
			    <td>Id Group</td>
			    <td>Nama Grup</td>
			    <td>Aksi</td>
			    
			</tr>
		      </thead>
		      <tbody>
		      
		      
		      <?php
			   $no = 1;
			  
			  
					foreach($query as $row) {
						$id	= $row->id_group;
						$namaGroup = $row->nm_group;
						?>
						<tr>
							<td><?php echo $no;?></td>
							<td><?php echo $id;?></td>
							<td><?php echo $namaGroup;?></td>
							
							
						<td>
						<a class="btn btn-small" href="<?php echo site_url("/manajemenGroup/add/$id");?>"><i class="icon-ok-circle"></i> Pilih</a>
				  		
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
		 
	     

