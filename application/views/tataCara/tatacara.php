<br />


<legend><a href="#">Tata Cara dan Persyaratan Izin</a></legend>
 <fieldset class="scheduler-border">
		<legend class="scheduler-border">Kriteria Pencarian</legend>
		
	
		<form action="" method="POST">
		
		<table width="100%">
			<tr>
				<td vspace="10">Jenis Izin</td>
				<td> : </td>
				<td width="40%">
			
					<?php $value = set_value('selected', isset($selected) ? $selected : '');
	    echo form_dropdown('jenisIzin',$group, $value); ?>
				
				
				</td>
				<td rowspan="2">
					<input style="margin-top: 0px;" type='submit' value='<?php echo $button;?>' name='submit' class="btn btn-info btn-large"> 
					<?php
						if (isset($cetak)) {
							?>
								<input style="margin-top: 0px;" type='button' value='<?php echo $cetak;?>' name='submit' onClick='window.open("<?php echo $cetakLink;?>")' class="btn btn-info btn-large"> 
							<?php
						}
					?>
				</td>
			</tr>
			<tr>
				<td>Jenis Permohonan</td>
				<td> : </td>
				<td><?php $value = set_value('selected', isset($selected) ? $selected : '');
	    echo form_dropdown('permohonan',$permohonan, $value); ?></td>
				
			</tr>
			
		</table>
		
  							</form>
							
							
							
	</fieldset>
		  
		 
							
						
			
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
				echo "<table width=90%>";
				foreach($query as $row) {
					echo "<tr><td><center><h3>".$row->nm_izin."</h3></center></td></tr>";
					echo "<tr><td>".$row->uraian."</td></tr>";
				}
				
				echo "</table>";
		    
		?>
		
		
		
		  
		  <?php
		    }
		   
						    
		    
		  ?>
		 
	     </div>

