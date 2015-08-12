
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
    									<label class="control-label">No. Izin</label>
    									<div class="controls">
      										<input type='text' name='no_izin' disabled style='font-size: 14px;height: 20px; width: 300px;' value="<?php echo $no_izin;?>">
	    
    									</div>
  							</div>
  							
							
							<div class="control-group">
    									<label class="control-label">Nama Pemohon</label>
    									<div class="controls">
      										<input type='text' name='namaPemohon' disabled id='namaPemohon' style='font-size: 14px;height: 20px; width: 300px;' value="<?php echo $nm_pemohon;?>">
	    
    									</div>
  							</div>
							
							
  							<div class="control-group">
    									<label class="control-label">Ubah Status Ke</label>
    									<div class="controls">
											<input type="hidden" name="statusReg" value="<?php echo $status_reg;?>" />
      										<select name="ubahStatus">
												<option value="">--Pilih Ubah Status--</option>
												<?php
												$stat = array(
													'-1' => "Permohonan Ditolak(Tidak diberikan Rekomendasi)",
													'0' => "Permohonan Masih dalam proses (belum ada rekomendasi)",
													'1' => "Rekomendasi telah ada/diinput",
													'2' => "Izin Telah dicetak"
												);
												
												foreach($stat as $row => $value ) {
													if ($status_reg == $row) {
														?>
															<option value="<?php echo $row;?>" selected><?php echo $value;?></option>
														<?php
													}
													else {
														?>
															<option value="<?php echo $row;?>"><?php echo $value;?></option>
													<?php
													}
													
												}
												
												?>
												
												
											</select>
	    
    									</div>
  							</div>
  							
  							<div class="control-group">
    									<label class="control-label">Alasan Ubah Status</label>
    									<div class="controls">
											<textarea name='alasan' cols='40' rows='4'></textarea>
      										
	    <?php echo form_error('alasan', '<p class="field_error">', '</p>'); ?>
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

