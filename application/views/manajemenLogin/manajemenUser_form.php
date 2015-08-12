<fieldset><legend>Manajemen Login > Input Data User Login</legend>
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
        <td valign="top">ID Login</td>
        <td valign="top"> : </td>
        <td>
	  <input type='text' name='idLogin' style='height: 30px; width: 200px;' value="<?php echo set_value('idLogin', isset($default['idLogin']) ? $default['idLogin'] : ''); ?>">
	    <?php echo form_error('idLogin', '<p class="field_error">', '</p>'); ?>
        </td>
    </tr>
	
	
	<tr>
        <td valign="top">Password</td>
        <td valign="top"> : </td>
        <td>
	  <input type='password' name='password' style='height: 30px; width: 200px;' value="<?php echo set_value('password', isset($default['password']) ? $default['password'] : ''); ?>">
	    <?php echo form_error('password', '<p class="field_error">', '</p>'); ?>
        </td>
    </tr>
	
	<tr>
        <td valign="top">Golongan</td>
        <td valign="top"> : </td>
        <td>
	  <?php $value = set_value('selected', isset($selected) ? $selected : '');
	    echo form_dropdown('golongan',$golongan, $value); ?>
		<?php echo form_error('golongan', '<p class="field_error">', '</p>'); ?>
        </td>
    </tr>
	
	
	
    <tr><td colspan='2'></td><td>
    
    <input type='submit' value='<?php echo $button;?>' name='submit' class="btn btn-info"> &nbsp; <input type='reset' value='Batal' class="btn btn-danger"></td></tr>
    
</table>
</form>
</fieldset>
