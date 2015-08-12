<script type="text/javascript">

</script>
<br /><br />
<fieldset><legend>Registrasi Permohonan</legend>



<form action='<?php echo $form_action;?>' method='post' class="form-horizontal" name='frm-tambah' enctype='multipart/form-data'>
<table width="100%">
    
    <tr>
    			<td width="70%" valign="top">
    			
  							<div class="control-group">
    									<label class="control-label">Jenis Izin</label>
    									<div class="controls">
      										<?php $value = set_value('selected', isset($selected) ? $selected : '');
											
	    echo form_dropdown('jenisIzin',$group, $value, "id=jenisIzin"); ?>
		<?php echo form_error('jenisIzin', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
  							
  							
  							<div class="control-group">
    									<label class="control-label">Jenis Permohonan</label>
    									<div class="controls">
							<?php
			
							if ($this->session->userdata('idGroup') == 6) {
								?>
								<table width="80%">
											<tr>
												<td><input type="radio" name="jenispermohonan" value="0" id="jenisBaru" checked="checked"/> Baru<br /></td>
												</tr>
											<tr>
												<td><input type="radio" name="jenispermohonan" value="3" id="jenisGanti" /> Penggantian (Hilang/Rusak) <br></td>
											</tr>

																					</table>

								<?php
							}	
							else {	
							?>
      									<table width="80%">
											<tr>
												<td><input type="radio" name="jenispermohonan" value="0" checked="checked"/> Baru<br /></td>
												<td><input type="radio" name="jenispermohonan" value="2" /> Perubahan Data <br></td>
											</tr>
											<tr>
												<td><input type="radio" name="jenispermohonan" value="3" /> Penggantian (Hilang/Rusak) <br></td>
												<td><input type="radio" name="jenispermohonan" value="1" /> Perpanjangan/Pembaharuan/Pendaftaran Ulang/HER <br>
      									</td>
											</tr>
										</table>
							<?php
							}
							?>
      									<?php echo form_error('jenispermohonan', '<p class="field_error">', '</p>'); ?>
      									
      									
    									</div>
  							</div>
  							
  							
  							<fieldset class="scheduler-border">
		<legend class="scheduler-border">Data Pemohon</legend>
		
	
									
	   
	    
		
		
		<div class="control-group">
    									<label class="control-label">No. KTP Pemohon</label>
    									<div class="controls">
									<div class="input-append" onclick="popupHal('<?php echo base_url();?>index.php/registrasi/caribarang','pilBrg')">
 <input type='text' name='noKtp' id='noKtp' maxlength="16" style='font-size: 14px;height: 20px; width: 300px;' value="<?php echo set_value('noKTP', isset($default['noKTP']) ? $default['noKTP'] : ''); ?>"><span class="add-on"><i class="icon-search"></i></span></div>
	    <?php echo form_error('noKtp', '<p class="field_error">', '</p>'); ?>  
	    
	    <input type='hidden' name='idPemohon' id='isitext' style='font-size: 14px;height: 20px; width: 300px;' value="<?php echo set_value('idPemohon', isset($default['idPemohon']) ? $default['idPemohon'] : ''); ?>">


<div id="tempnoKtp"></div>
    									</div>
  							</div>
  							
  							<div class="control-group">
    									<label class="control-label">Nama Pemohon</label>
    									<div class="controls">
      										<input type='text' name='namaPemohon' id='namaPemohon' style='font-size: 14px;height: 20px; width: 400px;' value="<?php echo set_value('namaPemohon', isset($default['namaPemohon']) ? $default['namaPemohon'] : ''); ?>">
	    <?php echo form_error('namaPemohon', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
  							
  							<div class="control-group">
    									<label class="control-label">Alamat Pemohon</label>
    									<div class="controls">
      										<textarea name='alamatPemohon' id='alamatPemohon' style='font-size: 14px;width: 300px;' value="<?php echo set_value('alamatPemohon', isset($default['alamatPemohon']) ? $default['alamatPemohon'] : ''); ?>"></textarea>
	    <?php echo form_error('alamatPemohon', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
  							
  							<div class="control-group">
    									<label class="control-label">No. Handphone</label>
    									<div class="controls">
      										<input type='text' name='noHp' maxlength="16" id='noHp' style='font-size: 14px;height: 20px; width: 300px;' value="<?php echo set_value('noHp', isset($default['noHp']) ? $default['noHp'] : ''); ?>">
	    <?php echo form_error('noHp', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
							
							
	</fieldset>
	
	<script>
								function disableFormBadanUsaha(form,checked) {
									theform = document.getElementById(form).getElementsByTagName("input");
									if (document.all || document.getElementById) {
										for (i = 0; i < theform.length; i++) {
										var formElement = theform[i];
											if (true) {
												formElement.disabled = !checked;
											}
										}
									}
									theform = document.getElementById(form).getElementsByTagName("textarea");
									if (document.all || document.getElementById) {
										for (i = 0; i < theform.length; i++) {
										var formElement = theform[i];
											if (true) {
												formElement.disabled = !checked;
											}
										}
									}
									theform = document.getElementById(form).getElementsByTagName("select");
									if (document.all || document.getElementById) {
										for (i = 0; i < theform.length; i++) {
										var formElement = theform[i];
											if (true) {
												formElement.disabled = !checked;
											}
										}
									}
								}
							</script>
	
	
  							<?php
							
							/* KALAU YANG LOGIN ADALAH PETUGAS IMB */
							
							if ($this->session->userdata('idGroup') == 6) {

                                $cekbox = "<input type='checkbox' name='isBadanUsaha' value=\"0\" style=\"margin:0\" onclick=\"disableFormBadanUsaha('formBadanUsaha',this.checked)\">";
								
								?><!-- 
								<div class="control-group">
    									<label class="control-label"><b>Merupakan Badan Usaha</b></label>
    									<div class="controls">
      										<input type='checkbox' name='isBadanUsaha' value="1">
	    
    									</div>
  							</div> !-->
                            
								<?php
							}
							else {
								$cekbox = "";
								?>
									<input type="hidden" value="1" name="isBadanUsaha" />
								<?php
							}
							/* AKHIR DARI SKRIP MENAMPILKAN BADAN USAHA */
							?>
  							
  							<fieldset class="scheduler-border" >
		<legend class="scheduler-border"><?php echo $cekbox; ?> Data Badan Usaha</legend>
		<div id="formBadanUsaha">
		      										<input type='hidden' id="idBadanUsaha" name='idBadanUsaha' style='font-size: 14px;height: 20px; width: 300px;' value="<?php echo set_value('idBadanUsaha', isset($default['idBadanUsaha']) ? $default['idBadanUsaha'] : ''); ?>">
	    
	    
	<div id="detailBadanUsaha">
		<div class="control-group">
    									<label class="control-label">Nama Badan Usaha</label>
    									<div class="controls">
      										<input type='text' name='namaBadanUsaha' id="namaBadanUsaha" style='font-size: 14px;height: 20px; width: 400px;' value="<?php echo set_value('namaBadanUsaha', isset($default['namaBadanUsaha']) ? $default['namaBadanUsaha'] : ''); ?>">
	    <?php echo form_error('namaBadanUsaha', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
  							
							<div class="control-group">
    									<label class="control-label">Kategori Usaha</label>
    									<div class="controls">
      										<?php $value = set_value('selected', isset($selected4) ? $selected4 : '');
	    echo form_dropdown('attribut',$attribut, $value, 'id="attribut"'); ?>
		<?php echo form_error('attribut', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
							
							<script type="text/javascript">
								$("#attribut").change(function(){
									
									var val_attr = "";
									if (this.value == 1) {
										var_attr = "PT";
									} 
									else if (this.value==2) {
										var_attr= "Koperasi";
									}
									else if (this.value==3) {
										var_attr = "CV";
									}
									else if (this.value==4) {
										var_attr = "FA";
									}
									else if (this.value==5) {
										var_attr = "PO";
									}
									else if (this.value==6) {
										var_attr = "BPL";
									}
									else {
										var_attr = "";
									}
									$('#attr').val(var_attr);
								});
							</script>
							
							<div class="control-group">
    									<label class="control-label">Attribut Badan Usaha</label>
    									<div class="controls">
      										<input type='text' id="attr" style='font-size: 14px;height: 20px; width: 100px;' disabled value="">
											<input type='hidden' id="attr" value="" />
											&nbsp;
											<input type='text' id="attr_name" style='font-size: 14px;height: 20px; width: 50px;' value="" />
	  
    									</div>
  							</div>
						
						
						
  							<div class="control-group">
    									<label class="control-label">Alamat Badan Usaha</label>
    									<div class="controls">
      										<textarea type='text' name='alamatBadanUsaha' id='alamatBadanUsaha' style='font-size: 14px; width: 300px;' value="<?php echo set_value('alamatBadanUsaha', isset($default['alamatBadanUsaha']) ? $default['alamatBadanUsaha'] : ''); ?>"></textarea>
	    <?php echo form_error('alamatBadanUsaha', '<p class="field_error">', '</p>'); ?></textarea>
    									</div>
  							</div>
		
		
							<div class="control-group">
    									<label class="control-label">Kecamatan</label>
    									<div class="controls">
      										<?php $value = set_value('selected', isset($selected) ? $selected : '');
	    echo form_dropdown('kecamatan',$kecamatan, $value, 'id="kecamatan"'); ?>
		<?php echo form_error('kecamatan', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
		
		
		
							
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


  						
							<div class="colfixright">
                            <label>Nomor Registrasi</label>
                            <div id="nomorRegistrasi"  style="" class="nomorRegistrasi"></div>
     									</div>
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
	<script type="text/javascript"> 
	
	function regPost()
	{
				var jenisRegistrasi = $("input[name='jenispermohonan']:checked").val();
	    		var jenisIzin = $("#jenisIzin").val();
				var badanusaha = $("#namaBadanUsaha").val();
				if(badanusaha == '')
					is_badanUsaha = '0'
				else
					is_badanUsaha = '1'
				//alert(is_badanUsaha);

	    		$.ajax({
						type: "POST",
						url : "<?php echo base_url(); ?>index.php/registrasi/generateNoreg",
						data: "jenisIzin="+jenisIzin+"&jenisRegistrasi="+jenisRegistrasi+"&is_badanUsaha="+is_badanUsaha,
						success: function(msg){
							$('#nomorRegistrasi').html(msg);
						}
				  	});
	
	}
	$(document).on('change', "#jenisIzin, input[name='jenispermohonan'], #namaBadanUsaha",function(){
	//  	$(document).ready(function(){
	//	$("#jenisIzin","#jenisGanti").change(function(){
	 //   });
	 		regPost();
		});
	
	$(document).on('click', "#pilihPemohon",function(){
	//  	$(document).ready(function(){
	//	$("#jenisIzin","#jenisGanti").change(function(){
	 //   });
	 		regPost();
		});
	
	   </script>	
    					
  					<?php
								if ($this->session->userdata('idGroup') == 6) {
									?>
									<script>
									
										disableFormBadanUsaha('formBadanUsaha',false);
									</script>
									<?php
								}
							?>		
  							
  							</div>
  							
	</fieldset>
  							
    			</td>
    		
    
    </tr>
    <tr>
    		<td align="center"><input type='submit' value='<?php echo $button;?>' name='submit' class="btn btn-info btn-large">&nbsp;&nbsp;<input type='button' value='Batal' class="btn btn-danger btn-large" onclick=self.history.back()></td>
    		
    		
    </tr>
    
    </table>
    
    
  
</form>
<div id="yyy"></div>
</fieldset>
