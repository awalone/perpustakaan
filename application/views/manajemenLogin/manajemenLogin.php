	 <br /><br />
 <legend style="position: static;"><a href="<?php echo site_url('manajemenLogin'); ?>">Manajemen Login</a></legend>
	
	<div class="static" style="position: relative; overflow: hidden">
		      				<a class="btn btn-info" href="<?php echo $link; ?>">Tambah Data</a>    
		      				
							
		  					</div><br />
			
		   <div class="alert alert-success">
			     				 
			      				<strong>Daftar User Login</strong>.
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
				<td>Id Login</td>
			    <td>Id User</td>
				<td>Nama User</td>
				<td>Grup</td>
			    <td>Pilih</td>
			    
			</tr>
		      </thead>
		      <tbody>
		      
		      
		      <?php
			   $no = 1;
			  
			  
					foreach($query as $row) {
						$idUser	= $row->id_user;
						$namaUser = $row->nm_user;
						$idLogin = $row->id_login;
						$nm_group = $row->nm_group;
						//get data level
						
						
						?>
						<tr>
							<td><?php echo $no;?></td>
							<td><?php echo $idLogin;?></td>
							<td><?php echo $idUser;?></td>
							<td><?php echo $namaUser;?></td>
							<td><?php echo $nm_group;?></td>
							
							
							
						<td>
						<div class="btn-group">
	          <a class="btn btn-small" href="#"><i class="icon-ok-circle"></i> Detail</a>
	          <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="<?php echo site_url("/manajemenLogin/update/$idUser");?>"><i class="icon-pencil"></i> Edit</a></li>
	            <li><a href="<?php echo site_url("/manajemenLogin/delete/$idUser");?>" onClick="return confirm('Anda yakin..???');"><i class="icon-trash"></i> Hapus Data</a></li>
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
		 
	     

