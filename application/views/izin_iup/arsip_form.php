<fieldset> <legend style="position: static;"><a href="<?php echo site_url('arsip_iup'); ?>">Data Perizinan Usaha Perdagangan</a> > Input Data Perizinan</legend>
<form action='<?php echo $form_action;?>' method='post' class="form-horizontal" name='frm-tambah' enctype='multipart/form-data'>
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
    			<td width="60%" valign="top">
    			
    							
  							
  		<fieldset class="scheduler-border">
		<legend class="scheduler-border">Data Arsip</legend>
		
	
		
						<div class="control-group">
    									<label class="control-label">Nama Pemohon</label>
    									<div class="controls">
      										<input type='text' name='namaPemohon' disabled value="<?php echo $nm_pemohon;?>" style='font-size: 14px;height: 20px; width: 300px;'>
	    
	    
    									</div>
  							</div>
							
							<div class="control-group">
    									<label class="control-label">No. Izin</label>
    									<div class="controls">
      										<input type='text' name='noIzin' value="<?php echo $no_izin; ?>" disabled style='font-size: 14px;height: 20px; width: 300px;'>
	    
	    
    									</div>
  							</div>
							
								<div class="control-group">
    									<label class="control-label">No. Rekomendasi</label>
    									<div class="controls">
      										<input type='text' name='noReko' value="<?php echo $no_reko;?>" disabled style='font-size: 14px;height: 20px; width: 300px;'>
	    
	    
    									</div>
  							</div>
							
								<div class="control-group">
    									<label class="control-label">No. Registrasi</label>
    									<div class="controls">
      										<input type='text' name='noReg' value="<?php echo $no_reg;?>" disabled style='font-size: 14px;height: 20px; width: 300px;'>
	    
	    
    									</div>
  							</div>
  							
  							
							<div class="control-group">
    									<label class="control-label">Jenis Arsip</label>
    									<div class="controls">
      									
											<?php
												echo form_dropdown('jenisArsip', $tipe_arsip);
											?>
	    
    									</div>
										 <?php echo form_error('jenisArsip', '<p class="field_error">', '</p>'); ?>
  							</div>
							
							
							<div class="control-group">
    									<label class="control-label">Pilih Gambar</label>
    									<div class="controls">
      										<input type='file' name='userfile' onchange="readURL(this);" />
											<?php echo form_error('userfile', '<p class="field_error">', '</p>'); ?>
    									</div>
										 
  							</div>
							
							
	
											
									
  						
							
				
    			</td>
				
				<td rowspan="2">
					<br />
					<img style="margin-left: 20px;" id="blah" class="north" src="#" alt="your image" />
				</td>
    		
    
    </tr>
   <tr>
    		<td align="right"><br /><br /><br /><input type='submit' value='<?php echo $button;?>' name='submit' class="btn btn-info btn-large">&nbsp;&nbsp;<input type='button' value='Batal' class="btn btn-danger btn-large" onclick=self.history.back()></td>
    		
    		
    </tr>
    
    </table>
    
    
  
</form>
<div id="yyy"></div>
</fieldset>
<script>
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(300)
                        .height(400);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
		
		
	function readURLS(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah1')
                        .attr('src', e.target.result)
                        .width(400)
                        .height(600);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
