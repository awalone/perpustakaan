<script type="text/javascript"> 
	  	$(document).ready(function(){
		$("#kelurahan").change(function(){
	    		var kelurahan = {kelurahan:$("#kelurahan").val()};
	    		$.ajax({
						type: "POST",
						url : "<?php echo base_url(); ?>registrasi/cariKelurahan",
						data: kelurahan,
						success: function(msg){
							$('#kecamatan').html(msg);
						}
				  	});
	    });
</script>

<div class="control-group">
    									<label class="control-label">No. KTP Pemohon</label>
    									<div class="controls">
      										<input type='text' name='noKTP' style='font-size: 18px;height: 20px; width: 300px;' value="<?php echo set_value('noKTP', isset($default['noKTP']) ? $default['noKTP'] : ''); ?>">
	    <?php echo form_error('noKTP', '<p class="field_error">', '</p>'); ?>  
	    
	    


    									</div>
  							</div>
  							
  							<div class="control-group">
    									<label class="control-label">Nama Pemohon</label>
    									<div class="controls">
      										<input type='text' name='namaPemohon' style='font-size: 18px;height: 20px; width: 300px;' value="<?php echo set_value('namaPemohon', isset($default['namaPemohon']) ? $default['namaPemohon'] : ''); ?>">
	    <?php echo form_error('namaPemohon', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
  							
  							<div class="control-group">
    									<label class="control-label">Alamat Pemohon</label>
    									<div class="controls">
      										<input type='text' name='alamatPemohon' style='font-size: 18px;height: 20px; width: 300px;' value="<?php echo set_value('alamatPemohon', isset($default['alamatPemohon']) ? $default['alamatPemohon'] : ''); ?>">
	    <?php echo form_error('alamatPemohon', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>
  							
  							<div class="control-group">
    									<label class="control-label">No. Handphone</label>
    									<div class="controls">
      										<input type='text' name='noHp' style='font-size: 18px;height: 20px; width: 300px;' value="<?php echo set_value('noHP', isset($default['noHP']) ? $default['noHP'] : ''); ?>">
	    <?php echo form_error('noHP', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>