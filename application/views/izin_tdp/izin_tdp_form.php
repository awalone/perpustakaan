
<br /><br />
<fieldset> <legend style="position: static;"><a href="<?php echo site_url('izin_tdp'); ?>">Tanda Daftar Perusahaan</a> > <a href="<?php echo site_url('izin_tdp/pilih');?>">Pilih Data Registrasi</a> > Input Data Perizinan (<?php echo $no_reg;?>) </legend>
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
      										<input type='text' name='noKTP' disabled style='font-size: 14px;height: 20px; width: 300px;' value="<?php echo $ktp_pemohon; ?>">
	    
	    
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
											<textarea name='alamatPemohon' cols='40' rows='3'><?php echo $alm_pemohon;?></textarea>
      										
	    
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
    									<label class="control-label">Kategori Badan Usaha</label>
    									<div class="controls">
      										<?php $value = set_value('selected', isset($selected6) ? $selected6 : '');
	    echo form_dropdown('katusaha',$katusaha, $value); ?>
		 <?php echo form_error('katusaha', '<p class="field_error">', '</p>'); ?>
		 
    									</div>
  							</div>
							
							<div class="control-group">
    									<label class="control-label">Status Badan Usaha</label>
    									<div class="controls">
      										<?php $value = set_value('selected', isset($selected5) ? $selected5 : '');
	    echo form_dropdown('stausaha',$stausaha, $value); ?>
		 <?php echo form_error('stausaha', '<p class="field_error">', '</p>'); ?>
		 
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
											<textarea name='alamatBadanUsaha' cols='40' rows='3'><?php echo $alm_bdnusaha;?></textarea>
      									
	    
    									</div>
  							</div>
		
		
							<div class="control-group">
    									<label class="control-label">Kecamatan</label>
    									<div class="controls">
      										<?php $value = set_value('selected', isset($selected1) ? $selected1 : '');
	    echo form_dropdown('kecamatan',$kecamatans, $value, 'id="kecamatan"'); ?>
		<?php echo form_error('kecamatan', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
							
							
							<script type="text/javascript"> 
								$(document).ready(function(){
								$("#kecamatan").change(function(){
								
										var kecamatan = {kecamatan:$("#kecamatan").val()};
										
										$.ajax({
												type: "POST",
												url : "<?php echo base_url(); ?>index.php/registrasi/cariKelurahan",
												data: kecamatan,
												success: function(msg){
													$('#kecamatans').html(msg);
												}
											});
								});
								});
							  </script>
							
		
							<div id="kecamatans">
								
							<div class="control-group">
    									<label class="control-label">Kelurahan</label>
    									<div class="controls">
      										<?php $value = set_value('selected', isset($selected) ? $selected : '');
	    echo form_dropdown('kelurahan',$kelurahan, $value, 'id="kelurahan"'); ?>
		<?php echo form_error('kelurahan', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
							</div>
		
		
							<div class="control-group">
    									<label class="control-label">Telp. Badan Usaha</label>
    									<div class="controls">
      										<input type='text' name='telpBadanUsaha' id='number' style='font-size: 14px;height: 20px; width: 200px;' value="<?php echo $telpBadanUsaha; ?>">
	    <?php echo form_error('telpBadanUsaha', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
							
							<div class="control-group">
    									<label class="control-label">Jabatan Pemohon</label>
    									<div class="controls">
      										<input type='text' name='jabatanPemohon' style='font-size: 14px;height: 20px; width: 300px;' value="<?php echo $jab_pengurus; ?>">
	    <?php echo form_error('jabatanPemohon', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
							
							<div class="control-group">
    									<label class="control-label">Fax. Badan Usaha</label>
    									<div class="controls">
      										<input type='text' name='fax' style='font-size: 14px;height: 20px; width: 200px;' value="<?php echo $fax; ?>">
	    <?php echo form_error('fax', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
  						
	</fieldset>
  							
  						
						<?php
										if (!empty($noIzin)) {
											?>
											<input type='hidden' name='noIzin' value='<?php echo $noIzin;?>' />
											<?php
										}
										?>
						
	<fieldset class="scheduler-border">
		<legend class="scheduler-border">Data Izin Tanda Daftar Perusahaan</legend>
		
		
	
  							
							
							
  							<div class="control-group">
    									<label class="control-label">No. Rekomendasi</label>
    									<div class="controls">
      										<input type='text' name='nomorRekomendasi' placeholder="NO/DTRB/XX/2013" style='font-size: 14px;height: 20px; width: 130px;' id="nomorRekomendasi" value="<?php echo set_value('nomorRekomendasi', isset($default['nomorRekomendasi']) ? $default['nomorRekomendasi'] : ''); ?>">  
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
    									<label class="control-label">No. TDP</label>
    									<div class="controls">
      										<input type='text' name='noTdp' style='font-size: 14px;height: 20px; width: 300px;' value="<?php echo set_value('noTdp', isset($default['noTdp']) ? $default['noTdp'] : ''); ?>">
	    <?php echo form_error('noTdp', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
						<div class="control-group" style="background:#FFCC66; border-radius: 8px 8px 8px 8px; padding: 8px;">
    									<label class="control-label">Kegiatan Usaha</label>
    									<div class="controls">
      									    <div  class="input-append" onclick="popupHal('<?php echo base_url();?>index.php/kegiatanUsaha/caribidang?jnsizin=<?php echo $this->uri->segment(1); ?>','pilBrg')" >
                                            <div id="bidangUsahaHide" style="visibility:hidden">
                                            </div>
										<span class="add-on"><i class="icon-search"></i></span></div>
                                        <div id="kegiatanUsaha">
                                        <?php echo $default['kegUsaha']; ?>
                                        </div>
									 <?php echo form_error('kegUsaha', '<p class="field_error">', '</p>'); ?>

    									</div>
  							</div>
							<div class="control-group">
    									<label class="control-label">Pembaharuan Ke</label>
    									<div class="controls">
      										<input type='text' name='pembaharuan' style='font-size: 14px;height: 20px; width: 300px;' value="<?php echo set_value('pembaharuan', isset($default['pembaharuan']) ? $default['pembaharuan'] : ''); ?>">
	    <?php echo form_error('pembaharuan', '<p class="field_error">', '</p>'); ?>
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
<div class="colfixright">
                            <label>Tanggal/Nomor Registrasi</label>
                            <div id="nomorRegistrasi"  style="" class="nomorRegistrasi2"><?php 
							echo '<div style=font-size:25px>'.$tgl_reg.'</div>';
							echo '<div style=color:red>';
							echo preg_replace('/^(.{2})(.{2})(.{1})(.{1})(.*?)$/', '$1.$2.$3.$4.$5',$no_reg);
                            echo '</div>'; ?>
                            </div>
     									</div>
                             </div>