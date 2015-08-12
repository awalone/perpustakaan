<fieldset><legend><?php echo $namaModule; ?> > Sub Module</legend>
<form action='<?php echo $form_action;?>' method='post' name='frm-tambah' enctype='multipart/form-data'>
<table width="80%">
    
    
    
    
     
     
	
	
	<tr>
        <td valign="top">Nama Sub Module</td>
        <td valign="top"> : </td>
        <td>
	  <input type='text' name='namaSubModule' style='height: 30px; width: 200px;' value="<?php echo set_value('namaSubModule', isset($default['namaSubModule']) ? $default['namaSubModule'] : ''); ?>">
	    <?php echo form_error('namaSubModule', '<p class="field_error">', '</p>'); ?>
        </td>
    </tr>
	
	<tr>
        <td valign="top">Label Sub Module</td>
        <td valign="top"> : </td>
        <td>
	  <input type='text' name='labelSubModule' style='height: 30px; width: 200px;' value="<?php echo set_value('labelSubModule', isset($default['labelSubModule']) ? $default['labelSubModule'] : ''); ?>">
	    <?php echo form_error('labelSubModule', '<p class="field_error">', '</p>'); ?>
        </td>
    </tr>
	
    <tr><td colspan='2'></td><td>
    
    <input type='submit' value='<?php echo $button;?>' name='submit' class="btn btn-info"> &nbsp; <input type='reset' value='Batal' class="btn btn-danger"></td></tr>
    
</table>
</form>
</fieldset>

<?php


$message = $this->session->flashdata('message');
			if ($message != "")
			{
					?>
								<div class="alert alert-info">
			     				 <a class="close" data-dismiss="alert">x</a>
			      				<strong><?php echo $message;?></strong>.
			  </div>
					<?php	
			}

			

if ($jumlah > 0)
		    {
			
		    
		?>
		
		
		  <table class="table table-striped table-hover" style="font-size: 12px; border: 1px inset;" cellpadding="2" cellspacing="1" width="100%">
		      <thead>
			<tr style="font-weight: bold;" align="center">
			    <th>No</th>
			    <th>Nama Sub Module</th>
			    <th>Label Sub Module</th>
			    <th align="center" width="100px">Aksi</th>
			</tr>
		      </thead>
		      <tbody>
		      
		      
		      <?php
			  //tampilkan data datanya
			  //data kategori = $kategori
			  
						  
			  
			  $no = 1;
			  foreach($query as $row) {
			  			$idSubmodule = $row->idSubmodule;
			      $idModule	= $row->idModule;
			      $namaSubmodule = $row->namaSubmodule;
			      $labelSubmodule = $row->labelSubmodule;
			      
			      ?>
			      
			      <tr>
				  <td><?php echo $no;?></td>
				  <td><?php echo $namaSubmodule;?></td>
				  <td><?php echo $labelSubmodule;?></td>
				 	
				  				  
				  <td>
							 <span style="text-align: left;"><a class="btn" title="Edit Data" href="<?php echo site_url("/submodule/update/$idSubmodule");?>"><i class="icon-refresh"></i></a>
				     <a class="btn btn-danger" href="<?php echo site_url("/submodule/delete/$idSubmodule");?>" onclick="return confirm('Anda Yakin akan Menghapus Data ini?')"><i class="icon-trash icon-white"></i></a></span>
				  		
				  </td>
				  
				  
				  
				 
				  
					
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
		    
		    
				
		  if ($kembali != "")
			{
						?>
								<a href="<?php echo $kembali;?>"><b>Kembali</b></a><br /><br />
						<?php	
						
			}					    
		    
		  ?>

