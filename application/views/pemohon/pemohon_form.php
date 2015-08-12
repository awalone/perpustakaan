<fieldset><legend>Data Pemohon > Input Data Pemohon</legend>
<form action='<?php echo $form_action;?>' method='post' name='frm-tambah' enctype='multipart/form-data'>
<table width="80%">
    
    
     <tr>
        <td valign="top" width="31%">ID Pemohon</td>
        <td valign="top"> : </td>
        <td>
	  <input type='text' name='idPemohon' style='height: 30px; width: 100px;' maxlength="9" value="<?php echo set_value('idPemohon', isset($default['idPemohon']) ? $default['idPemohon'] : ''); ?>">
	    <?php echo form_error('idPemohon', '<p class="field_error">', '</p>'); ?>
        </td>
    </tr>
    
     <tr>
        <td valign="top" width="31%">KTP Pemohon</td>
        <td valign="top"> : </td>
        <td>
	  <input type='text' name='ktpPemohon' style='height: 30px; width: 200px;' maxlength="25" value="<?php echo set_value('ktpPemohon', isset($default['ktpPemohon']) ? $default['ktpPemohon'] : ''); ?>">
	    <?php echo form_error('ktpPemohon', '<p class="field_error">', '</p>'); ?>
        </td>
    </tr>
     
	
	
	<tr>
        <td valign="top">Tanggal Daftar</td>
        <td valign="top"> : </td>
        <td>
	  <input type='text' name='tanggalDaftar' style='height: 30px; width: 200px;' value="<?php echo set_value('tanggalDaftar', isset($default['tanggalDaftar']) ? $default['tanggalDaftar'] : ''); ?>">
	    <?php echo form_error('tanggalDaftar', '<p class="field_error">', '</p>'); ?>
        </td>
    </tr>
	
	<tr>
        <td valign="top">Nama Pemohon</td>
        <td valign="top"> : </td>
        <td>
	  <input type='text' name='namaPemohon' style='height: 30px; width: 200px;' value="<?php echo set_value('namaPemohon', isset($default['namaPemohon']) ? $default['namaPemohon'] : ''); ?>">
	    <?php echo form_error('namaPemohon', '<p class="field_error">', '</p>'); ?>
        </td>
    </tr>
	
	
	<tr>
        <td valign="top">Alamat Pemohon</td>
        <td valign="top"> : </td>
        <td>
	  <input type='text' name='alamatPemohon' style='height: 30px; width: 200px;' value="<?php echo set_value('alamatPemohon', isset($default['alamatPemohon']) ? $default['alamatPemohon'] : ''); ?>">
	    <?php echo form_error('alamatPemohon', '<p class="field_error">', '</p>'); ?>
        </td>
    </tr>
	
	
	
	
	<tr>
        <td valign="top">Nomor Telepon</td>
        <td valign="top"> : </td>
        <td>
	  <input type='text' name='noTelp' style='height: 30px; width: 200px;' value="<?php echo set_value('noTelp', isset($default['noTelp']) ? $default['noTelp'] : ''); ?>">
	    <?php echo form_error('noTelp', '<p class="field_error">', '</p>'); ?>
        </td>
    </tr>
	
	<tr>
        <td valign="top">Email</td>
        <td valign="top"> : </td>
        <td>
	  <input type='text' name='email' style='height: 30px; width: 200px;' value="<?php echo set_value('email', isset($default['email']) ? $default['email'] : ''); ?>">
	    <?php echo form_error('email', '<p class="field_error">', '</p>'); ?>
        </td>
    </tr>
	
	
    <tr><td colspan='2'></td><td>
    
    <input type='submit' value='<?php echo $button;?>' name='submit' class="btn btn-info"> &nbsp; <input type='reset' value='Batal' class="btn btn-danger"></td></tr>
    
</table>
</form>
</fieldset>
