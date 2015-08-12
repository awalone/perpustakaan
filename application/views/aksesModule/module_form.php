<fieldset><legend>Input Akses Module</legend>
<form action='<?php echo $form_action;?>' method='post' name='frm-tambah' enctype='multipart/form-data'>
<table width="80%">
    
    
    
	
	 <tr>
        <td valign="top">Nama User</td>
        <td valign="top"> : </td>
        <td>
	  <?php $value = set_value('selected', isset($selected) ? $selected : '');
	    echo form_dropdown('namaUser',$namaUser, $value); ?>
		 <?php echo form_error('namaUser', '<p class="field_error">', '</p>'); ?>
        </td>
    </tr>
	
    
     <tr>
        <td valign="top">Nama Module</td>
        <td valign="top"> : </td>
        <td>
	   <?php $value = set_value('selected', isset($selected1) ? $selected1 : '');
	    echo form_dropdown('namaModule',$namaModule, $value); ?>
		 <?php echo form_error('namaModule', '<p class="field_error">', '</p>'); ?>
        </td>
    </tr>
     
	 
	<tr>
		<td valign="top">Posisi Module</td>
		<td valign="top"> : </td>
		<td>
			<?php
				$value = set_value('selected',isset($selected3) ? $selected3 : '');
				echo form_dropdown('posisi', $posisi, $value); 
			?>
		</td>
	</tr>
	
	
	<tr>
        <td valign="top">Parent Module</td>
        <td valign="top"> : </td>
        <td>
	 <?php $value = set_value('selected', isset($selected5) ? $selected5 : '');
	    echo form_dropdown('parent',$parent, $value); ?>
		 <?php echo form_error('parent', '<p class="field_error">', '</p>'); ?>
        </td>
    </tr>
	
	
	
    <tr><td colspan='2'></td><td>
    
    <input type='submit' value='<?php echo $button;?>' name='submit' class="btn btn-info"> &nbsp; <input type='reset' value='Batal' class="btn btn-danger"></td></tr>
    
</table>
</form>
</fieldset>
