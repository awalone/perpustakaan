<fieldset><legend>Input Kategori</legend>
<form action='<?php echo $form_action;?>' method='post' name='frm-tambah' enctype='multipart/form-data'>
<table width="80%">
    
    
    
    
     <tr>
        <td valign="top">Nama Module</td>
        <td valign="top"> : </td>
        <td>
	  <input type='text' name='namaModule' style='height: 30px; width: 200px;' value="<?php echo set_value('namaModule', isset($default['namaModule']) ? $default['namaModule'] : ''); ?>">
	    <?php echo form_error('namaModule', '<p class="field_error">', '</p>'); ?>
        </td>
    </tr>
     
	
	
	<tr>
        <td valign="top">Link</td>
        <td valign="top"> : </td>
        <td>
	  <input type='text' name='namaLink' style='height: 30px; width: 200px;' value="<?php echo set_value('linkModule', isset($default['linkModule']) ? $default['linkModule'] : ''); ?>">
	    <?php echo form_error('namaLink', '<p class="field_error">', '</p>'); ?>
        </td>
    </tr>
	
	
	
    <tr><td colspan='2'></td><td>
    
    <input type='submit' value='<?php echo $button;?>' name='submit' class="btn btn-info"> &nbsp; <input type='reset' value='Batal' class="btn btn-danger"></td></tr>
    
</table>
</form>
</fieldset>
