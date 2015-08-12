
<br /><br />
<fieldset> <legend style="position: static;"><a href="<?php echo site_url('rekomendasiImb'); ?>">Rekomendasi Izin Usaha Industri</a> > <a href="<?php echo site_url('rekomendasiImb/pilih');?>">Pilih Data Registrasi</a> > Input Data Perizinan</legend>
<form action='<?php echo $form_action;?>' method='post' class="form-horizontal" name='frm-tambah' enctype='multipart/form-data'>
<table width="100%">
    
    <tr>
    			<td width="50%" valign="top">
    			
    							
    					
  							
  						
  							
  							<fieldset class="scheduler-border">
		<legend class="scheduler-border">Data Pemohon</legend>
		
		<input type="hidden" name="id_pemohon" value="<?php echo $id_pemohon;?>" />
		<input type="hidden" name="id_bdnusaha" value="<?php echo $id_bdnusaha;?>" />
		
		<div class="control-group">
    									<label class="control-label">No. KTP Pemohon</label>
    									<div class="controls">
      										<input type='text' name='noKTP' style='font-size: 14px;height: 20px; width: 300px;' value="<?php echo $ktp_pemohon; ?>">
	    
	    
    									</div>
  							</div>
  							
  							<div class="control-group">
    									<label class="control-label">Nama Pemohon</label>
    									<div class="controls">
      										<input type='text' name='namaPemohon' id='namaPemohon' style='font-size: 14px;height: 20px; width: 300px;' value="<?php echo $nm_pemohon;?>">
	    
    									</div>
  							</div>
  							
  							<div class="control-group">
    									<label class="control-label">Alamat Pemohon</label>
    									<div class="controls">
      										<input type='text' name='alamatPemohon' style='font-size: 14px;height: 20px; width: 300px;' value="<?php echo $alm_pemohon;?>">
	    
    									</div>
  							</div>
  							
  							<div class="control-group">
    									<label class="control-label">No. Handphone</label>
    									<div class="controls">
      										<input type='text' name='noHp' style='font-size: 14px;height: 20px; width: 300px;' value="<?php echo $hp_pemohon; ?>">
	    <?php echo form_error('noHp', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
							
							
							
	</fieldset>
  							
  							
  							<fieldset class="scheduler-border">
		<legend class="scheduler-border">Data Badan Usaha</legend>
		
		
		<div class="control-group">
    									<label class="control-label">Nama Badan Usaha</label>
    									<div class="controls">
      										<input type='text' name='namaBadanUsaha' style='font-size: 14px;height: 20px; width: 300px;' value="<?php echo $nm_bdnusaha; ?>">
	    <?php echo form_error('namaBadanUsaha', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
  							
							<div class="control-group">
    									<label class="control-label">NPWP</label>
    									<div class="controls">
      										<input type='text' name='npwp' style='font-size: 14px;height: 20px; width: 300px;' value="<?php echo $npwp; ?>">
	    <?php echo form_error('npwp', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
							
  							<div class="control-group">
    									<label class="control-label">Alamat Badan Usaha</label>
    									<div class="controls">
      										<input type='text' name='alamatBadanUsaha' style='font-size: 14px;height: 20px; width: 300px;' value="<?php echo $alm_bdnusaha; ?>">
	    <?php echo form_error('alamatBadanUsaha', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
		
		
		
							<div class="control-group">
    									<label class="control-label">Kelurahan</label>
    									<div class="controls">
      										<?php $value = set_value('selected', isset($selected) ? $selected : '');
	    echo form_dropdown('kelurahan',$kelurahan, $value); ?>
		 <?php echo form_error('kelurahan', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
		
							<div class="control-group">
    									<label class="control-label">Telp. Badan Usaha</label>
    									<div class="controls">
      										<input type='text' name='telpBadanUsaha' style='font-size: 14px;height: 20px; width: 300px;' value="<?php echo $telpBadanUsaha; ?>">
	    <?php echo form_error('telpBadanUsaha', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
							
							<div class="control-group">
    									<label class="control-label">Fax. Badan Usaha</label>
    									<div class="controls">
      										<input type='text' name='fax' style='font-size: 14px;height: 20px; width: 300px;' value="<?php echo $fax; ?>">
	    <?php echo form_error('fax', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
  							
  							<div class="control-group">
    									<label class="control-label">Jabatan Pemohon</label>
    									<div class="controls">
      										<input type='text' name='jabatanPemohon' style='font-size: 14px;height: 20px; width: 300px;' value="<?php echo $jab_pengurus; ?>">
	    <?php echo form_error('jabatanPemohon', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
				
  	
	</fieldset>
  							
  						
						
						
						
	<fieldset class="scheduler-border">
		<legend class="scheduler-border">Data Izin Usaha Industri</legend>
		
		
		<div class="control-group">
    									<label class="control-label">No. Registrasi</label>
    									<div class="controls">
      										<input type='text' name='nomorRegistrasi' style='font-size: 14px;height: 20px; width: 300px;' value="<?php echo $no_reg;?>">
	    <?php echo form_error('nomorRegistrasi', '<p class="field_error">', '</p>'); ?>
	
    									</div>
  							</div>
  							
							
							
  							<div class="control-group">
    									<label class="control-label">No. Rekomendasi</label>
    									<div class="controls">
      										<input type='text' name='nomorRekomendasi' style='font-size: 14px;height: 20px; width: 300px;' value="<?php echo set_value('nomorRekomendasi', isset($default['nomorRekomendasi']) ? $default['nomorRekomendasi'] : ''); ?>">
	    <?php echo form_error('nomorRekomendasi', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
		
		
		
							<div class="control-group">
    									<label class="control-label">Tgl. Rekomendasi</label>
    									<div class="controls">
										<input id="datepicker-example1" name='tglRekomendasi' type="text" value="<?php echo set_value('tglRekomendasi', isset($default['tglRekomendasi']) ? $default['tglRekomendasi'] : ''); ?>">
      										
	    <?php echo form_error('tglRekomendasi', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
		
						
  						
				
							<div class="control-group">
    									<label class="control-label">Nilai Investasi</label>
    									<div class="controls">
      										<input type='text' name='investasi' style='font-size: 14px;height: 20px; width: 300px;' value="<?php echo set_value('investasi', isset($default['investasi']) ? $default['investasi'] : ''); ?>">
	    <?php echo form_error('investasi', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
	
  							<div class="control-group">
    									<label class="control-label">Kapasitas Produksi</label>
    									<div class="controls">
      										<input type='text' name='kapasitasProduksi' style='font-size: 14px;height: 20px; width: 300px;' value="<?php echo set_value('kapasitasProduksi', isset($default['kapasitasProduksi']) ? $default['kapasitasProduksi'] : ''); ?>">
	    <?php echo form_error('kapasitasProduksi', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
  							
							
							<div class="control-group">
    									<label class="control-label">Jumlah Tenaga Kerja</label>
    									<div class="controls">
      										<input type='text' name='jumlahTenagaKerja' style='font-size: 14px;height: 20px; width: 300px;' value="<?php echo set_value('jumlahTenagaKerja', isset($default['jumlahTenagaKerja']) ? $default['jumlahTenagaKerja'] : ''); ?>">
	    <?php echo form_error('jumlahTenagaKerja', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
							
							
							
							
							<div class="control-group">
    									<label class="control-label">Status Izin</label>
    									<div class="controls">
      										<?php $value = set_value('selected', isset($selected) ? $selected : '');
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

