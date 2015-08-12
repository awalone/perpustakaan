
<br /><br />
<fieldset> <legend style="position: static;"><a href="<?php echo site_url('manajemenUser'); ?>">Manajemen User</a> > Input Data User</legend>
<form action='<?php echo $form_action;?>' method='post' name='frm-tambah' enctype='multipart/form-data'>
<table width="80%">
    
    
    
    
     <tr>
        <td valign="top" width="31%">ID User</td>
        <td valign="top"> : </td>
        <td>
	  <input type='text' name='idUser' style='height: 20px; width: 50px;' maxlength="5" value="<?php echo set_value('idUser', isset($default['idUser']) ? $default['idUser'] : ''); ?>">
	    <?php echo form_error('idUser', '<p class="field_error">', '</p>'); ?>
        </td>
    </tr>
     
	
	
	<tr>
        <td valign="top">Nama Lengkap User</td>
        <td valign="top"> : </td>
        <td>
	  <input type='text' name='namaLengkap' style='height: 20px; width: 200px;' value="<?php echo set_value('namaLengkap', isset($default['namaLengkap']) ? $default['namaLengkap'] : ''); ?>">
	    <?php echo form_error('namaLengkap', '<p class="field_error">', '</p>'); ?>
        </td>
    </tr>
	
	<tr>
        <td valign="top">Nomor Induk Pegawai (NIP)</td>
        <td valign="top"> : </td>
        <td>
	  <input type='text' name='nip' style='height: 20px; width: 200px;' value="<?php echo set_value('nip', isset($default['nip']) ? $default['nip'] : ''); ?>">
	    <?php echo form_error('nip', '<p class="field_error">', '</p>'); ?>
        </td>
    </tr>
	
	
	<tr>
        <td valign="top">Pangkat</td>
        <td valign="top"> : </td>
        <td>
	  <input type='text' name='pangkat' style='height: 20px; width: 200px;' value="<?php echo set_value('pangkat', isset($default['pangkat']) ? $default['pangkat'] : ''); ?>">
	    <?php echo form_error('pangkat', '<p class="field_error">', '</p>'); ?>
        </td>
    </tr>
	
	
	<tr>
        <td valign="top">Golongan</td>
        <td valign="top"> : </td>
        <td>
	  <input type='text' name='golongan' style='height: 20px; width: 200px;' value="<?php echo set_value('golongan', isset($default['golongan']) ? $default['golongan'] : ''); ?>">
	    <?php echo form_error('golongan', '<p class="field_error">', '</p>'); ?>
        </td>
    </tr>
	
	<tr>
        <td valign="top">Jabatan</td>
        <td valign="top"> : </td>
        <td>
	  <input type='text' name='jabatan' style='height: 20px; width: 200px;' value="<?php echo set_value('jabatan', isset($default['jabatan']) ? $default['jabatan'] : ''); ?>">
	    <?php echo form_error('jabatan', '<p class="field_error">', '</p>'); ?>
        </td>
    </tr>
	
	<tr>
        <td valign="top">Nomor Telepon</td>
        <td valign="top"> : </td>
        <td>
	  <input type='text' name='noTelp' style='height: 20px; width: 200px;' value="<?php echo set_value('noTelp', isset($default['noTelp']) ? $default['noTelp'] : ''); ?>">
	    <?php echo form_error('noTelp', '<p class="field_error">', '</p>'); ?>
        </td>
    </tr>
	
	<tr>
        <td valign="top">Email</td>
        <td valign="top"> : </td>
        <td>
	  <input type='text' name='email' style='height: 20px; width: 200px;' value="<?php echo set_value('email', isset($default['email']) ? $default['email'] : ''); ?>">
	    <?php echo form_error('email', '<p class="field_error">', '</p>'); ?>
        </td>
    </tr>
	
	
    <tr><td colspan='2'></td><td>
    
    <input type='submit' value='<?php echo $button;?>' name='submit' class="btn btn-info"> &nbsp; <input type='reset' value='Batal' class="btn btn-danger"></td></tr>
    
</table>
</form>
</fieldset>
