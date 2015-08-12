

<div class="control-group">
    									<label class="control-label">Kelurahan</label>
    									<div class="controls">
      										<?php $value = set_value('selected', isset($selected7) ? $selected7 : '');
	    echo form_dropdown('kelurahanBangunan',$kelurahanBangunan, $value); ?>
		<?php echo form_error('kelurahanBangunan', '<p class="field_error">', '</p>'); ?>
    									</div>
  							</div>