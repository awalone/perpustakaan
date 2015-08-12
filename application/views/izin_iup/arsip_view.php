<fieldset> <legend style="position: static;"><a href="<?php echo site_url('arsip_imb'); ?>">Data Perizinan Usaha Perdagangan</a> > Data Arsip</legend>

<?php
	if (!empty($error_uploads)) {
				?>
								<div class="alert alert-danger" style="width: 63%;">
			     				 <a class="close" data-dismiss="alert">x</a>
			      				<strong><?php echo $error_uploads;?></strong>.
			  </div>
					<?php	
			}
?>
<table width="100%">
    
    
   <tr>
    		<td><center><strong>Arsip Rekomendasi</strong><br /><img width="300" height="500" src="<?php echo base_url().$letakReko.'/'.$gambarThumbReko;?>" /></center></td>
    		<td><center><strong>Arsip Perizinan</strong><br /><img width="300" height="500" src="<?php echo base_url().$letakIzin.'/'.$gambarThumbIzin;?>" /></center></td>
    		
    </tr>
   
    </table>
	
    <br /><br />
	<input type='button' value='Kembali' class="btn btn-danger btn-large" onclick=self.history.back()>
    
  