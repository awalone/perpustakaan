<br /><br />
<fieldset> <legend style="position: static;"><a href="<?php echo site_url('manajemenAkses'); ?>">Manajemen Akses</a> > Input Data Akses User</legend>
		   
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
			    <td>Id Login</td>
					<td>Nama User</td>
			    <td>Pilih</td>
			    
			</tr>
		      </thead>
		      <tbody>
		      
		      
		      <?php
			   $no = 1;
			  
			  
					foreach($query as $row) {
						$idLogin	= $row->id_login;
						$idAkses = $row->id_akses;
						$namaUser = $row->id_user;
						//get data level
						
						
						?>
						<tr>
							<td><?php echo $no;?></td>
							<td><?php echo $idLogin;?></td>
							<td><?php echo $namaUser;?></td>
							
							
							
						<td>
					
	          <a class="btn btn-small" href="<?php echo site_url('manajemenAkses/pilih/'); ?><?php echo '/'.$idLogin;?>"><i class="icon-ok-circle"></i> Pilih</a>
	          
	   
				  		
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
		 
	     

