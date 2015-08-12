<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
	;(function($) {
		$.fn.textfill = function(options) {
			var fontSize = options.maxFontPixels;
			var ourText = $('span:visible:first', this);
			var maxHeight = $(this).height();
			var maxWidth = $(this).width();
			var textHeight;
			var textWidth;
			do {
				ourText.css('font-size', fontSize);
				textHeight = ourText.height();
				textWidth = ourText.width();
				fontSize = fontSize - 1;
			} while ((textHeight > maxHeight || textWidth > maxWidth) && fontSize > 3);
			return this;
		}
	})(jQuery);
	
	$(document).ready(function() {
		$('.jtextfill').textfill({ maxFontPixels: 14 });
	});
	$(document).ready(function() {
		$('.jtextfill0').textfill({ maxFontPixels: 14 });
	});
	$(document).ready(function() {
		$('.jtextfill2').textfill({ maxFontPixels: 14 });
	});

	function windowPreview(linkd,w,h)
	{
		window.open(linkd,"Print","width="+w+",height="+h+",addressbar=no,links=0,scrollbars=1,toolbar=0,location=0");
	}			
</script>
<style>
@keyframes myfirst
{
from { opacity: 1.0; }
  to { opacity: 0.0; }
}
@-webkit-keyframes myfirst /* Safari and Chrome */
{
from {background: red;}
to {background: yellow;}
}
.css3-blink {
font-size:25px;
animation-name:myfirst;
animation-duration:1s;
animation-timing-function:linear;
animation-delay:2s;
animation-iteration-count:infinite;

-webkit-animation:myfirst 1s; /* Safari and Chrome */
-webkit-animation-name:myfirst;
-webkit-animation-duration:5s;
-webkit-animation-timing-function:linear;
-webkit-animation-delay:2s;
-webkit-animation-iteration-count:infinite;
-webkit-animation-direction:alternate;
-webkit-animation-play-state:running;
font-weight: bold;
color: blue;
}			
body {
   font-family: Arial;
   font-size: 10px;
	*margin: 15mm 10mm 0px 8mm;
	width: 21.56cm;
}
.btn-primary {
  color: #ffffff;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
  background-color: #006dcc;
  *background-color: #0044cc;
  background-image: -moz-linear-gradient(top, #0088cc, #0044cc);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#0088cc), to(#0044cc));
  background-image: -webkit-linear-gradient(top, #0088cc, #0044cc);
  background-image: -o-linear-gradient(top, #0088cc, #0044cc);
  background-image: linear-gradient(to bottom,  #0088cc, #0044cc);
  background-repeat: repeat-x;
  border-color: #0044cc #0044cc #002a80;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff0088cc', endColorstr='#ff0044cc', GradientType=0);
  filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
  font-size:25px
}
#wrap {
	width: 17cm;
	padding:7mm 8mm 5mm 8mm;
	*margin: 0px;
}
#container {
	min-height: 300px;
	*padding: 44mm 12mm 0mm 16mm;
	margin: 0px;
	font-size:12px;
}

h1, h2, h3, h4, h5, h6 {
   padding: 2px 0px;
   margin: 0px;
   text-weight: bolder;
}

.logo {
	width: 100px;
	height: 100px;
	float: left;
	*margin-left: 20px;
}
h2 {
font-size: 19.5px;
line-height:20px;

}
h3 {
	font-size: 25px;
}
h4 {
	font-size: 5mm;
	
}
h5 {
	font-size: 4.7mm;	
}
h6 {
	font-size: 4mm;	
}

.tModelawal td{
    border-top: 1px solid;
    border-right: 1px solid;
	padding:0 0 0 5px;
	font-size:12px;
}
.tModelakhir td{
    border-bottom: 1px solid;
    border-right: 1px solid;
	padding:0 0 0 5px;
	font-size:12px;
}
.right {
	float: right;
	text-align: right;
	width: 100%;
	margin-top: -14px;
	
}

.center {

	display: block;
	font-size: 12px;
	*width: 500px;
	*margin-left: -20px;
	text-align:center
}

.kotakTandaTerima {
	float: left;
	text-transform: uppercase;
	width: 200px;
	border: 1px solid;
	padding: 2px 5px;
}

hr {
   clear: both;
}

img {
   margin: 2px;
}

div.page-portrait-list {
   visibility: visible;
   font-family: Tahoma;
   font-size: 11px;
   margin: auto;
   width: 19cm;
}
.tebal { font-weight: bold;line-height: 1.5; }
 .foto {
 width:25mm; 
 height:30mm; 
 display:table-cell;
 vertical-align:middle; 
 text-align:center; 
 border:1px solid;
 }
.tembusan { font-size:13px}
.ttd {font-size:14px; line-height: 17px;}
.ket {float:right; width:95%}
</style>
<div class="cetak_preview">
<div style="border:#FF0000 2px solid; padding:2px; width: 190mm;">
<div style="border:#FF0000 4px solid; padding:2px; width: 187mm;">
<div id="wrap" style="border:#FF0000 2px solid; ">
	<div class="header">
    <span class="logo">
        <img src="<?php echo base_url();?>assets/img/Makassar.png" width="100px" height="100px" />
    </span> 
	<span class="center" >
	<h4>PEMERINTAH KOTA MAKASSAR</h4>
	<h2><?php echo strtoupper($all->instansi); ?></h2>
    Jalan Jenderal Urip Sumoharjo No 8 Telepon 0411-436488<br>
	<strong>MAKASSAR</strong></span>
	<span class="right" style="font-size:14px">Kode Pos 90144</span>
<span class="center" style="font-size: 11px; "><!--	Email : kpap@makassarkota.go.id Home Page : www.makassarkota.go.id !-->

<hr size="2" style="border: double;"/> 
	</span>
	</div>
    
	<div id="container">
	
	
	
	
	<span style="font-size:15px; font-weight:bold">Nomor Seri: 06/<?php echo $no_blanko; ?>/<?php echo date("Y");  ?></span>	<br><br>
	 
			 
<table cellpadding="0" cellspacing="0" style="width:169mm">
			 		<tr>
			 					<td colspan="4" align="center" >
                                <span>
                                <h3>TANDA DAFTAR PERUSAHAAN</h3>
                                </span>
                                <span style="line-height: 5mm;">
                                <h4>
                                <?php echo $all->nm_katusaha; ?>
                                </h4>
                                </span>
                                <span style="line-height: 5mm;"><h6>NOMOR : <?php echo $no_izin;?></h6></span>
								<?php echo $berdasarkan; ?>
<br>
<br>
<br>

                                </td>
			 					
			 		</tr>
			 		<tr class="tModelawal">
			 					<td rowspan="2" align="center" valign="middle" style="width:37mm; height:10mm; border-left:1px solid; border-bottom:1px solid">
                                NOMOR TDP<br>
                                <span><?php echo $no_tdp ?></span>
                                 </td>
			 					<td rowspan="2" align="center" valign="middle" align="center" style="border-bottom:1px solid; width:37mm">
                                BERLAKU S/D TGL<br>
								<span><?php echo strtoupper($tgl_berakhir); ?></span>
                                </td>
			 					<td style="border-right	:none; width:35mm" >PENDAFTARAN</td>
                                <td>: &nbsp;&nbsp;<?php echo $pendaftaran;?></td>
			 		</tr>
			 		<tr class="tModelakhir">
			 					<td  style="border-right:none">PEMBAHARUAN KE </td>
                                <td >: &nbsp;&nbsp;<?php echo $jml_her?></td>
			 		</tr>
                    </table>
                    <br>
<br>

                    <table cellpadding="0" cellspacing="0" style="border-left:1px solid; border-bottom:1px solid; width:169mm">
					<tr class="tModelawal">
			 					<td valign="middle" style="height:10mm; width:37mm">NAMA <?php  echo strtoupper($kategori); ?> </td>
			 					<td valign="middle" align="center" style="width:8mm;line-height: 1.5;">:</td>
                                <td valign="middle" style="width:73mm"><?php echo strtoupper($nm_bdnusaha).", ".$all->atr_usaha;  ?></td>
                                <td valign="top"  style="width:50mm">STATUS : <span><?php echo strtoupper($all->nm_stausaha); ?></span></td>
			 		</tr>
					<tr class="tModelawal" style="line-height:3px;line-height: 1.5;">
			 					<td valign="middle" style="height:20mm">NAMA PENGURUS/ NAMA  PENANGGUNG JAWAB</td>
			 					<td valign="middle" align="center">:</td>
			 					<td colspan="2" ><span class="tebal"><?php echo $nm_pemohon; ?></span> </td>
			 		</tr>
					<tr class="tModelawal">
			 					<td style="height:10mm" valign="top">ALAMAT <?php  echo strtoupper($kategori); ?></td>
			 					<td  align="center" valign="top">:</td>
			 					<td colspan="2" valign="top">
                                <div style="height:10mm" class="jtextfill">                                                                 
                                <span class="tebal"> <?php echo $alm_bdnusaha; ?></span> 
                                </div>
                                </td>
			 		</tr>
					<tr class="tModelawal">
			 					<td style="height:10mm">NPWP</td>
			 					<td valign="middle" align="center">:</td>
                                <td colspan="2"><span class="tebal"><?php echo strtoupper($all->npwp);  ?></span></td>
			 		</tr>
					<tr class="tModelawal">
			 					<td style="height:10mm">NOMOR TELEPON</td>
			 					<td valign="middle" align="center">:</td>
                                <td ><span class="tebal"> <?php echo $all->fax_bdnusaha; ?></span></td>
                                <td valign="top">FAX : <span class="tebal"><?php echo $all->tlp_bdnusaha; ?></span></td>
			 		</tr>
					<tr class="tModelawal">
			 					<td style="height:39mm;line-height: 1.5;">KEGIATAN USAHA POKOK</td>
			 					<td align="center">:</td>
                                <td >
                                <div style="height:39mm" class="jtextfill0">                                                                                                 
                                <span class="tebal"><?php echo $kegiatanUsaha; ?></span>
                                </div>
                                </td>
                                <td valign="top">KBLI : 
                                <div style="height:39mm" class="jtextfill2">                                                                 
                                <span class="tebal"><?php echo $KBLI;  ?></span>
                                </div>
                                </td>
			 		</tr>

					</table><br>
<br>
	

					<table style="font-size: 13px;">
					<tr>
			 					<td colspan="3" rowspan="2" style="width:84mm"></td>
                                <td style="width:84mm">Dikeluarkan di Makassar</td>
			 		</tr>
					<tr>
                                <td>Pada Tanggal <span class="tebal"><?php echo ucwords($tgl_izin);?></span></td>
			 		</tr>
					<tr>
			 					<td colspan="3" align="right"></td>
                                <td><span class="tebal ttd"></span></td>
			 		</tr>
					<tr>
			 					<td colspan="3" rowspan="5" valign="top" style="padding-left: 15mm;">
                              <!--  <div class="foto">
                                3 X 4
                                </div>!-->
                                </td>
                                <td><span class="tebal ttd">KEPALA <?php echo ($all->instansi); ?></span></td>
			 		</tr>
					<tr>
                                <td height="" style="height:11mm"></td>
			 		</tr>
					<tr>
                                <td><span class="tebal ttd" style="border-bottom:1px solid"><?php echo strtoupper($all->pimpinan);  ?></span></td>
			 		</tr>
					<tr>
								<td class="ttd" style="line-height:9px">
                                <span style="width: 21mm;display: table-cell;">Pangkat</span>
                                <span style="display: table-cell;">:</span>
                                <span style="padding-left: 20px; display: table-cell;"><?php echo strtoupper($all->pangkat); ?></span>
                                </td>			 		
                    </tr>
					<tr>
								<td class="ttd" style="line-height:19px"><span style="width: 21mm;  display: table-cell;">NIP.</span>
                                <span style="display: table-cell;">:</span>
                                <span style="padding-left: 20px;  display: table-cell;"><?php echo strtoupper($all->nip); ?></span>
                                </td>
			 		</tr>
			 		
			 		
			 </table><br>

	<span class="tembusan">Tembusan</span><br>
	<span class="tembusan">1. </span><span class="tembusan">Kepala Dinas Perindustrian, Perdagangan dan Penanaman Modal Kota Makassar;</span><br>
	<span class="tembusan">2. </span><span class="tembusan">Camat yang bersangkutan;</span><br>
	<span class="tembusan">3. </span><span class="tembusan">Arsip;</span>
	</div>
</div>
</div>
</div>
</div>
<!--	<a onClick="window.open('cetakIzin_imb.php',\"Print\",\"width=100,height=100\");" href="#">Cetak </a>-->
<a class="btn btn-info" class="btn-primary" href="<?php echo site_url('cetak_tdp/') ?>" onClick="windowPreview('<?php echo site_url('cetak_tdp/cetakAsli');?>',5,5); this.click()">CETAK</a>

