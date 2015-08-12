<fieldset><legend><?php echo $h2_title;?></legend>
<form action='<?php echo $form_action;?>' method='post' name='frm-tambah' enctype='multipart/form-data'>
<table width="80%">
    
    
    
    
     <tr>
        <td valign="top">Kode Kecamatan</td>
        <td valign="top"> : </td>
        <td>
	  <input type='text' name='kodeKecamatan' style='height: 30px; width: 200px;' value="<?php echo set_value('kodeKecamatan', isset($default['kodeKecamatan']) ? $default['kodeKecamatan'] : ''); ?>">
	    <?php echo form_error('kodeKecamatan', '<p class="field_error">', '</p>'); ?>
        </td>
    </tr>
    
    <tr>
        <td valign="top">Nama Kecamatan</td>
        <td valign="top"> : </td>
        <td>
	  <input type='text' name='namaKecamatan' style='height: 30px; width: 200px;' value="<?php echo set_value('namaKecamatan', isset($default['namaKecamatan']) ? $default['namaKecamatan'] : ''); ?>">
	    <?php echo form_error('namaKecamatan', '<p class="field_error">', '</p>'); ?>
        </td>
    </tr>
    
    <tr><td colspan='2'></td><td>
    
    <input type='submit' value='<?php echo $button;?>' name='submit' class="btn btn-info"> &nbsp; <input type='reset' value='Batal' class="btn btn-danger"></td></tr>
    
</table> </div>
</form>
</fieldset>