

<div class="control-group">
    									<label class="control-label">Kelurahan</label>
    									<div class="controls">
										
      										<?php $value = set_value('selected', isset($selected) ? $selected : '');
	    echo form_dropdown('kelurahan',$kelurahan, $value, 'id="kelurahan"'); ?>
    									</div>
    									
  							</div>