<fieldset> <legend style="position: static;"><a href="<?php echo site_url('izin_imb/tampil'); ?>">Rekomendasi IMB</a> > <a href="<?php echo site_url('izin_imb');?>">Pilih Data Registrasi</a> > Input Data Perizinan (<?php echo $no_reg;?>)</legend>
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
      										<input type='text' disabled  name='noKTP' style='font-size: 14px;height: 20px; width: 300px;' value="<?php echo $ktp_pemohon; ?>">
	    
	    
    									</div>
  							</div>
  							
  							<div class="control-group">
    									<label class="control-label">Nama Pemohon</label>
    									<div class="controls">
      										<input type='text'  name='namaPemohon' id='namaPemohon' style='font-size: 14px;height: 20px; width: 300px;' value="<?php echo $nm_pemohon;?>">
	    
    									</div>
  							</div>
  							
  							<div class="control-group">
    									<label class="control-label">Alamat Pemohon</label>
    									<div class="controls">
      										<textarea name='alamatPemohon' cols='40' rows='3' ><?php echo $alm_pemohon;?></textarea>
	    
    									</div>
  							</div>
  							
  							<div class="control-group">
    									<label class="control-label">No. Handphone</label>
    									<div class="controls">
      										<input type='text'  name='noHp' style='font-size: 14px;height: 20px; width: 300px;' value="<?php echo $hp_pemohon; ?>">
	    <?php echo form_error('noHp', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
							
							
							
	</fieldset>
											
									<?php
										if (!empty($id_bdnusaha)) {
											?>
												<fieldset class="scheduler-border">
		<legend class="scheduler-border">Data Badan Usaha</legend>
		
		
		<div class="control-group">
    									<label class="control-label">Nama Badan Usaha</label>
    									<div class="controls">
      										<input type='text'  name='namaBadanUsaha' style='font-size: 14px;height: 20px; width: 300px;' value="<?php echo $nm_bdnusaha; ?>">
	    <?php echo form_error('namaBadanUsaha', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
  							
						
							
  							<div class="control-group">
    									<label class="control-label">Alamat Badan Usaha</label>
    									<div class="controls">
      										<input type='text'  name='alamatBadanUsaha' style='font-size: 14px;height: 20px; width: 300px;' value="<?php echo $alm_bdnusaha; ?>">
	    <?php echo form_error('alamatBadanUsaha', '<p class="field_error">', '</p>'); ?>
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
    									<label class="control-label">Jabatan Pemohon</label>
    									<div class="controls">
      										<input type='text' name='jabatanPemohon' style='font-size: 14px;height: 20px; width: 300px;' value="<?php echo $jab_pengurus; ?>">
	    <?php echo form_error('jabatanPemohon', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
				
  	
	</fieldset>
											<?php
										}
									?>
  							
  							
  							
  						
							
						<?php
										if (!empty($noIzin)) {
											?>
											<input type='hidden' name='noIzin' value='<?php echo $noIzin;?>' />
											<?php
										}
										?>
						
						
	<fieldset class="scheduler-border">
		<legend class="scheduler-border">Data Izin Mendirikan Bangunan</legend>
		
		
		
      										
							
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
		
						<script type="text/javascript">

function yesnoCheck() {
    if (document.getElementById('perumahan').checked) {
        document.getElementById('ifYes').style.display = 'block';
    }
    else document.getElementById('ifYes').style.display = 'none';

}

</script>

  


  							
  							<div class="control-group">
    									<label class="control-label">Kategori</label>
    									<div class="controls">
											
										
										
															<input type="radio" name="kategori" value="0" checked onclick="javascript:yesnoCheck();" id="tunggal" /> Tunggal 
															<input type="radio" name="kategori" value="1" onclick="javascript:yesnoCheck();" id="perumahan" /> Jamak
														<?php
												
											
												
											?>
										
      										
	    <?php echo form_error('jabatanPemohon', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
				
				
					<div id="ifYes" style="display:none">
							<div class="control-group">
    									<label class="control-label">Jumlah Bangunan</label>
    									<div class="controls">
      										<input type='text' name='jumlahBangunan' size='5' style='font-size: 14px;height: 20px; width: 30px;' value="<?php echo set_value('jumlahBangunan', isset($default['jumlahBangunan']) ? $default['jumlahBangunan'] : ''); ?>">
	    <?php echo form_error('jumlahBangunan', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
					</div>
  							<div class="control-group">
    									<label class="control-label">No. Urut</label>
    									<div class="controls">
      										<input type='text' name='noUrut' style='font-size: 14px;height: 20px; width: 100px;' value="<?php echo set_value('noUrut', isset($default['noUrut']) ? $default['noUrut'] : ''); ?>">
	    <?php echo form_error('noUrut', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
  							
							
							<div class="control-group">
    									<label class="control-label">Fungsi Bangunan</label>
    									<div class="controls">
      										<input type='text' name='fungsiBangunan' style='font-size: 14px;height: 20px; width: 300px;' value="<?php echo set_value('fungsiBangunan', isset($default['fungsiBangunan']) ? $default['fungsiBangunan'] : ''); ?>">
	    <?php echo form_error('fungsiBangunan', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
							
							
							<div class="control-group">
    									<label class="control-label">Jenis Bangunan</label>
    									<div class="controls">
      										<input type='text' name='jenisBangunan' style='font-size: 14px;height: 20px; width: 300px;' value="<?php echo set_value('jenisBangunan', isset($default['jenisBangunan']) ? $default['jenisBangunan'] : ''); ?>">
	    <?php echo form_error('jenisBangunan', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
							
  							<div class="control-group">
    									<label class="control-label">Letak Bangunan</label>
    									<div class="controls">
      										<input type='text' name='letakBangunan' style='font-size: 14px;height: 20px; width: 300px;' value="<?php echo set_value('letakBangunan', isset($default['letakBangunan']) ? $default['letakBangunan'] : ''); ?>">
	    <?php echo form_error('letakBangunan', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
							
							<div class="control-group">
    									<label class="control-label">GSP</label>
    									<div class="controls">
      										<input type='text' size='5' name='gsp' style='font-size: 14px;height: 20px; width: 30px;' value="<?php echo set_value('gsp', isset($default['gsp']) ? $default['gsp'] : ''); ?>">
	    <?php echo form_error('gsp', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
							
							<div class="control-group">
    									<label class="control-label">GSB</label>
    									<div class="controls">
      										<input type='text' size='5' name='gsb' style='font-size: 14px;height: 20px; width: 30px;' value="<?php echo set_value('gsb', isset($default['gsb']) ? $default['gsb'] : ''); ?>">
	    <?php echo form_error('gsb', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
  							<div class="control-group">
    									<label class="control-label">Status Tanah</label>
    									<div class="controls">
      										<?php $value = set_value('selected', isset($selected3) ? $selected3 : '');
	    echo form_dropdown('statusTanah',$statusTanah, $value); ?>
		 <?php echo form_error('statusTanah', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
							
							
							
							
							
							<div class="control-group">
    									<label class="control-label">Kecamatan</label>
    									<div class="controls">
      										<?php $value = set_value('selected', isset($selected8) ? $selected8 : '');
	    echo form_dropdown('kecamatanBangunan',$kecamatanBangunan, $value,'id="kecamatanBangunan"'); ?>
		 <?php echo form_error('kecamatanBangunan', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
							
							
							
							
		
							<div id="kelurahanBangunan">
							
							
							
							<div class="control-group">
    									<label class="control-label">Kelurahan</label>
    									<div class="controls">
      										<?php $value = set_value('selected', isset($selected7) ? $selected7 : '');
	    echo form_dropdown('kelurahanBangunan',$kelurahanBangunan, $value, 'id="kelurahanBangunan"'); ?>
		<?php echo form_error('kelurahanBangunan', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
							</div>
							
							<script type="text/javascript"> 
								$(document).ready(function(){
								$("#kecamatanBangunan").change(function(){
								
										var kecamatan = {kecamatan:$("#kecamatanBangunan").val()};
										
										$.ajax({
												type: "POST",
												url : "<?php echo base_url(); ?>index.php/registrasi/cariKelurahan2",
												data: kecamatan,
												success: function(msg){
													$('#kelurahanBangunan').html(msg);
												}
											});
								});
								});
							  </script>
							
							
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