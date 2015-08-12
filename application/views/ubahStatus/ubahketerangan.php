
<br /><br />
<fieldset> <legend style="position: static;">Ubah Status Permohonan</legend>
<form action='<?php echo $form_action;?>' method='post' class="form-horizontal" name='frm-tambah' enctype='multipart/form-data'>
<table width="100%">
    
    <tr>
    			<td width="50%" valign="top">
    			
    							
    					
  							
  						
  							
  							<fieldset class="scheduler-border">
		<legend class="scheduler-border">Data Pemohon</legend>
		
		
		<div class="control-group">
    									<label class="control-label">No. Registrasi</label>
    									<div class="controls">
      										<input type='text' readonly style='font-size: 14px;height: 20px; width: 300px;' value="<?php echo $no_reg; ?>">
											<input type="hidden" name="no_reg" value="<?php echo $no_reg;?>" />
	    
    									</div>
  							</div>
  							
  							<div class="control-group">
    									<label class="control-label">No. Rekomendasi</label>
    									<div class="controls">
      										<input type='text' name='no_reko' disabled style='font-size: 14px;height: 20px; width: 300px;' value="<?php echo $no_reko;?>">
	    
    									</div>
  							</div>
  							
							
							<div class="control-group">
    									<label class="control-label">Nama Pemohon</label>
    									<div class="controls">
      										<input type='text' name='namaPemohon' disabled id='namaPemohon' style='font-size: 14px;height: 20px; width: 300px;' value="<?php echo $nm_pemohon;?>">
	    
    									</div>
  							</div>
							
							<div class="control-group">
    									<label class="control-label">Status Izin</label>
    									<div class="controls">
      										<?php $value = set_value('selected', isset($selected3) ? $selected3 : '');
								echo form_dropdown('statusIzin',$status, $value); ?>
    									</div>
  							</div>
							<div class="control-group">
    									<label class="control-label">Keterangan</label>
    									<div class="controls">
      										<input type='text' name='keterangan' style='font-size: 14px;height: 20px; width: 300px;' value="<?php echo set_value('keterangan', isset($default['keterangan']) ? $default['keterangan'] : ''); ?>">
	    <?php echo form_error('keterangan', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
							
							
							
							
							
							
	</fieldset>
  						
    			</td>
    		
    
    </tr>
    <tr>
    		<td align="right"><input type='submit' value='<?php echo $button;?>' name='submit' class="btn btn-info btn-large">&nbsp;&nbsp;<input type='button' value='Batal' class="btn btn-danger btn-large" onclick=self.history.back()></td>
    		
    		
    </tr>
    
    </table>
    
    
  
</form>
<div id="yyy"></div>
</fieldset>

