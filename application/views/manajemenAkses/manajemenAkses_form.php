<fieldset><legend>Manajemen Akses > Input Data Akses User</legend>
<form action='<?php echo $form_action;?>' method='post' name='frm-tambah' enctype='multipart/form-data'>
<table width="80%">
    
    
    
    
     <tr>
        <td valign="top" width="31%">ID User</td>
        <td valign="top"> : </td>
        <td>
	  <input type='text' name='idUser' style='height: 30px; width: 50px;' readonly="" maxlength="5" value="<?php echo set_value('idUser', isset($default['idUser']) ? $default['idUser'] : ''); ?>">
	    <?php echo form_error('idUser', '<p class="field_error">', '</p>'); ?>
        </td>
    </tr>
     
	
	
	<tr>
        <td valign="top">Nama Lengkap</td>
        <td valign="top"> : </td>
        <td>
	  <input type='text' name='namaLengkap' style='height: 30px; width: 200px;' readonly="" value="<?php echo set_value('namaLengkap', isset($default['namaLengkap']) ? $default['namaLengkap'] : ''); ?>">
	    <?php echo form_error('namaLengkap', '<p class="field_error">', '</p>'); ?>
        </td>
    </tr>
	
	<tr>
        <td valign="top">Nomor Induk Pegawai (NIP)</td>
        <td valign="top"> : </td>
        <td>
	  <input type='text' name='nip' style='height: 30px; width: 200px;' readonly="" value="<?php echo set_value('nip', isset($default['nip']) ? $default['nip'] : ''); ?>">
	    <?php echo form_error('nip', '<p class="field_error">', '</p>'); ?>
        </td>
    </tr>
	
	
	
	
	<tr>
        <td valign="top">ID Loket</td>
        <td valign="top"> : </td>
        <td>
	  <?php $value = set_value('selected', isset($selected) ? $selected : '');
	    echo form_dropdown('loket',$loket, $value); ?>
		<?php echo form_error('loket', '<p class="field_error">', '</p>'); ?>
        </td>
    </tr>
	
	
	
    <tr><td colspan='2'></td><td>
    
    <input type='submit' value='<?php echo $button;?>' name='submit' class="btn btn-info"> &nbsp; <input type='reset' value='Batal' class="btn btn-danger"></td></tr>
    
</table>
</form>
</fieldset>