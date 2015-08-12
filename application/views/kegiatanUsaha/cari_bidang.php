<table class="tabelisi tabelisisimbad"  style="font:bold">
<tr><td>Cari:
<input type="text" name="cari" id="carilangsung" onkeypress="if(event.keyCode == 13) {document.getElementById('buttonCari').click(); return false;}">
<input type="submit" id="buttonCari" value="Ok" onClick="fcr = document.getElementById('carilangsung'); lempar= document.getElementById('carilangsung'); 
send='lempar='+lempar.value+'&jnsizin='+'<?php echo $_REQUEST['jnsizin'] ?>'; ubahisi('isifilter','<?php echo base_url();?>index.php/kegiatanUsaha/groupBidang',send);">
</td></tr>
</table>
<div id="isifilter" style="max-height:200px; overflow-y:scroll; position:relative">
</div>