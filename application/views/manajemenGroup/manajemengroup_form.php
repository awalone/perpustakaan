<fieldset><legend><?php echo $h2_title;?></legend>


			  <form action="<?php echo $form_action;?>" method="post" name="frm-tambah" enctype="multipart/form-data">
		

<?php
	if ($jumlah > 0)
		    {
			
		    
		?>
		
		
		  <form action="<?php echo $form_action;?>" method="post" name="frm-tambah" enctype="multipart/form-data">
		  <table class="table table-striped table-hover" style="font-size: 12px; border: 1px inset;" cellpadding="2" cellspacing="1" width="100%">
		      <thead>
			<tr style="font-weight: bold;" align="center">
			    <td>No</td>
			    <td>Nama Module</td>
			    <td>Nama Link</td>
			    <td>Daftar Sub Module</td>
			    
			</tr>
		      </thead>
		      <tbody>
		      
		      
		      <?php
			  //tampilkan data datanya
			  //data kategori = $kategori
			  
						  
			  
			  $no = 1;
			  $noSub = 1;
			  $checked="";
			  
			  
			  
			  foreach($query as $row) {
			      $idModule	= $row->idModule;
			      $namaModule = $row->namaModule;
			      $namaLink = $row->linkModule;
					
				  $listSubModule = $this->submodule->get_all($idModule);
				  $jumlahListSubModule = $this->submodule->get_all_data($idModule);
				 			
			      ?>
			      
			      <tr>
				  <td><?php echo $no;?></td>
				  <td><?php echo $namaModule;?></td>
				  <td><?php echo $namaLink;?></td>
				  <td><?php
									if ($jumlahListSubModule > 0)
									{
										if ($jumlahRules > 0) {
												?>
												
												<?php
												
												foreach($listSubModule->result() as $rows)
												{
													$namaSubModule = $rows->namaSubmodule;
													$idSubModule = $rows->idSubmodule;
													
													$query = mysql_query("select *from rules where levelUser = '$id' AND idSubModule='$idSubModule'");
													if (mysql_num_rows($query) > 0) {
														$checked = "checked = \"checked\"";
													}	
													else {
														$checked = "";
													}
															/*
															while ($r = mysql_fetch_array($query))
															{
															
																if ($r['idSubModule'] == $idSubModule) {
																	
																	$checked = "checked = \"checked\"";
																
																}
																else {
																	
																	$checked = "";
																}
																
																
															}
															*/
															
													echo '<input type="checkbox" name="idSubModule[]" value="'.$idSubModule.'" '.$checked.' /> '.$idSubModule. ' '.$namaSubModule;
													
													echo "<br />";	
													$noSub++;
												}
										}
										else {
												foreach($listSubModule->result() as $rows)
												{
													$namaSubModule = $rows->namaSubmodule;
													$idSubModule = $rows->idSubmodule;
													
													echo '<input name="idSubModule[]" type="checkbox" value="'.$idSubModule.'" /> '.$idSubModule. ' '.$namaSubModule;
													echo "<br />";	
													$noSub++;
												}
										}
												
									}				  
				  ?>
				  </td>
				 
			      </tr>
			      
			      <?php
			      $no++;
			  }
		      ?>
					
		      </tbody>	
			  
		  </table>
		  <br />
		  <input type='submit' value='<?php echo $button;?>' name='submit' class="btn btn-info btn-large">&nbsp;&nbsp;<input type='button' value='Batal' class="btn btn-danger btn-large" onclick=self.history.back()>
		  </form>
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


</fieldset>