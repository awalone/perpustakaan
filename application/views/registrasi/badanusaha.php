<div class="control-group">
    									<label class="control-label">Nama Badan Usaha</label>
    									<div class="controls">
      										<input type='text' name='namaBadanUsaha' style='font-size: 18px;height: 20px; width: 300px;' value="<?php echo $namaBadanUsaha; ?>">
	    <?php echo form_error('namaBadanUsaha', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
  							
							<div class="control-group">
    									<label class="control-label">Kategori</label>
    									<div class="controls">
      										<?php $value = set_value('selected', isset($selected1) ? $selected1 : '');
	    echo form_dropdown('kategori',$kategori, $value, 'id="kategori"'); ?>
    									</div>
  							</div>
  							<div class="control-group">
    									<label class="control-label">Alamat Badan Usaha</label>
    									<div class="controls">
      										<input type='text' name='alamatBadanUsaha' style='font-size: 18px;height: 20px; width: 300px;' value="<?php echo $alamatBadanUsaha; ?>">
	    <?php echo form_error('alamatBadanUsaha', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>	
							
							<div class="control-group">
    									<label class="control-label">Kelurahan</label>
    									<div class="controls">
      										<?php $value = set_value('selected', isset($selected) ? $selected : '');
	    echo form_dropdown('kelurahan',$kelurahan, $value, 'id="kelurahan"'); ?>
    									</div>
  							</div>
							
							
							 <div id="kecamatan">
	
			
				<div class="control-group">
    									<label class="control-label">Kecamatan</label>
    									<div class="controls">
      										<input type='text' name='kecamatan' style='font-size: 18px;height: 20px; width: 300px;' value="<?php echo $namaKecamatan; ?>">
				<?php echo form_error('kecamatan', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
							
							
				<div class="control-group">
    									<label class="control-label">No. Handphone</label>
    									<div class="controls">
      										<input type='text' name='noHP' style='font-size: 18px;height: 18px; width: 300px;' value="<?php echo $tlp_bdnusaha; ?>">
	    <?php echo form_error('noHP', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
  							
  							<div class="control-group">
    									<label class="control-label">Status Badan Usaha</label>
    									<div class="controls">
      										<input type='text' name='statusBadanUsaha' style='font-size: 18px;height: 18px; width: 300px;' value="<?php echo set_value('statusBadanUsaha', isset($default['statusBadanUsaha']) ? $default['statusBadanUsaha'] : ''); ?>">
	    <?php echo form_error('statusBadanUsaha', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
  							
  							<div class="control-group">
    									<label class="control-label">Jabatan Pemohon</label>
    									<div class="controls">
      										<input type='text' name='jabatanPemohon' style='font-size: 18px;height: 18px; width: 300px;' value="<?php echo $jab_pengurus; ?>">
	    <?php echo form_error('jabatanPemohon', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
							
					
    </div>