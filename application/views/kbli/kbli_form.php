<fieldset><legend>Input Kategori</legend>
<form action='<?php echo $form_action;?>' method='post' name='frm-tambah' enctype='multipart/form-data'>
<table width="80%">
    
    
    
    
     <tr>
        <td valign="top">Nama Gol</td>
        <td valign="top"> : </td>
        <td>
	  <input type='text' name='namaGol' style='height: 30px; width: 200px;' value="<?php echo set_value('namaGol', isset($default['namaGol']) ? $default['namaGol'] : ''); ?>">
	    <?php echo form_error('namaGol', '<p class="field_error">', '</p>'); ?>
        </td>
    </tr>
     
	
	
	<tr>
        <td valign="top">Alias</td>
        <td valign="top"> : </td>
        <td>
	  <input type='text' name='alias' style='height: 30px; width: 200px;' value="<?php echo set_value('alias', isset($default['alias']) ? $default['alias'] : ''); ?>">
	    <?php echo form_error('alias', '<p class="field_error">', '</p>'); ?>
        </td>
    </tr>
	
	
	
    <tr><td colspan='2'></td><td>
    
    <input type='submit' value='<?php echo $button;?>' name='submit' class="btn btn-info"> &nbsp; <input type='reset' value='Batal' class="btn btn-danger"></td></tr>
    
</table>
</form>
</fieldset>
