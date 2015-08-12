<table class="tabelisi tabelisisimbad">
<tr><td>CARI </td></tr>
<tr><td><input type="text" name="cari" id="carilangsung">
<input type="submit" value="Pilih" onClick="fcr = document.getElementById('carilangsung'); lempar= document.getElementById('carilangsung'); 
send='lempar='+lempar.value; ubahisi('isifilter','<?php echo base_url();?>index.php/izin_tdi/groupBidang',send);"></td></tr>
<tr><td></td></tr>
</table>
<div id="isifilter" style="max-height:240px; overflow-y:scroll; position:relative">
</div>