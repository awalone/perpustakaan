 
	  
	  
		 
		      <a class="btn btn-info" href="<?php echo $link; ?>">Tambah Data</a>            
		 				<span style="float: right;">
		 				<form action="<?php echo $search;?>" method="POST">
		 						<input type="text" name="search" placeholder="search" />
		 				</form>
		 				</span>
		  
		  
		  <br />
		<?php
		    //cek dulu , apakah ada kecamatan produk atau tidak
		    //jumlah = $jumlah	
		    
		    $pesan = $this->session->flashdata('message');
		    echo $pesan == '' ? '' : '<br /><div class="alert alert-success"><a class="close" data-dismiss="alert">x</a>'. $pesan .'</div>';

					
		    if ($jumlah > 0)
		    {
			
		    
		?>
		  <table class="table table-striped table-hover" style="font-size: 12px; border: 1px inset;" cellpadding="2" cellspacing="1" width="100%">
		      <thead>
			<tr style="font-weight: bold;" align="center">
			    <td>No</td>
			    <td>Kode Wilayah</td>
			    <td>Nama Kecamatan</td>
			    <td>Aksi</td>
			</tr>
		      </thead>
		      <tbody>
		      
		      
		      <?php
	
			  //tampilkan data datanya
			  //data kecamatan = $kecamatan
			  $no = 1;
			  foreach($query as $row) {
			     
			      $idKelurahan   = $row->id_kel;
			      $idKecamatan = $row->id_kec;
			      $kodePos = $row->kd_pos;
			      $namaKelurahan = $row->nm_kel;
			      
			      ?>
			      
			      <tr>
				  <td><?php echo $no;?></td>
				  <td><?php echo $idKecamatan;?></td>
				  <td><?php echo $namaKelurahan;?></td>
				  <td>
				      <a class="btn" href="<?php echo site_url("/kelurahan/update/$idKelurahan"); ?>"><i class="icon-refresh"></i>Edit</a>
				      <a class="btn btn-danger" href="<?php echo site_url("/kelurahan/delete/$idKelurahan");?>" onclick="return confirm('Anda Yakin akan Menghapus Data ini?')"><i class="icon-trash icon-white"></i>Hapus</a>
				  </td>
			      </tr>
			      
			      <?php
			      $no++;
			  }
		      ?>
			 
		      </tbody>	
		  </table>
		  <?php echo $kembali == '' ? '' : '<a href="'.$kembali.'">Kembali</a>'; ?>
		 <div class="pagination pagination-centered">
		<ul>
		<?php
		echo $paginator;
		?>
		
		</ul>
	</div>
		  <?php
		    }
		    else {
		    		?>
		    		<div class="alert alert-info">
  						
  							<strong><h4>Maaf !</h4></strong>Data kecamatan Masih Kosong
						</div>
		    		<?php	
		    }
		  ?>
	     

