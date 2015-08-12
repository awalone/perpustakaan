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
h1 {
    font-size: 7mm;
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
	padding:0 0 0 5px
}
.tModelakhir td{
    border-bottom: 1px solid;
    border-right: 1px solid;
	padding:0 0 0 5px
}
.right {
	float: right;
	text-align: right;
	width: 100%;
	margin-top: -14px;
	
}

.center {
	display: block;
	font-size: 14px;
	*width: 500px;
	*margin-left: -20px;
	text-align:center;
	line-height:25px;
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
	<span class="center">
	<h4>PEMERINTAH KOTA MAKASSAR</h4>
	<h2>BADAN PERIZINAN TERPADU DAN PENANAMAN MODAL</h2>
    Jalan Jenderal Urip Sumoharjo No 8 Telepon 0411-436488<br>
	<strong>MAKASSAR</strong></span>
	<span class="right" style="font-size:14px">Kode Pos 90144</span>
<span class="center" style="font-size: 11px; "><!--	Email : kpap@makassarkota.go.id Home Page : www.makassarkota.go.id !-->

<hr size="2" style="border: double;"/> 
	</span>
	</div>
    
	<div id="container">
	
	
	
	
               <div align="center" style="line-height: 3; border: solid 1px; height: 100px; margin-bottom: 3mm;
width: 170mm;">
               
                <span>
                <h1>SURAT IZIN USAHA PERDAGANGAN</h1>
                </span>
                 
                <span style="line-height: 5mm; float: left; padding-left: 110px;">
                <h4>
               	NOMOR: <?php echo strtoupper($no_izin);?>
                </h4>
                </span>
                </div>


                    <table cellpadding="0" cellspacing="0" style="border-left:1px solid; border-bottom:1px solid; width:172mm; height:135mm; font-size:11.5pt; border-right:1px solid; line-height: 4.7mm; ">
					<tr class="tModelawal">
			 					<td valign="middle" style="height:15mm; width:55mm">NAMA PERUSAHAAN</td>
                                <td valign="middle" colspan="2" style="width:73mm">: 
                                <span class="tebal"><?php echo strtoupper($nm_bdnusaha);?></span>
                                </td
			 		></tr>
					<tr class="tModelawal" style=" ">
			 					<td valign="middle" style="height:10mm">NAMA PENGANGGUNG JAWAB & JABATAN</td>
			 					<td colspan="2" >: <span class="tebal"><?php echo strtoupper($all->nm_pemohon." / ".$all->jab_pengurus); ?></span> </td>
			 		</tr>
					<tr class="tModelawal">
			 					<td valign="middle" style="height:11.5mm">ALAMAT PERUSAHAAN</td>
			 					<td colspan="2" >: <span class="tebal"> <?php echo strtoupper($all->alm_bdnusaha);  ?></span> </td>
			 		</tr>
					<tr class="tModelawal">
			 					<td style="height:6.5mm">NOMOR TELEPON</td>
                                <td style="width:57mm">: <span class="tebal"><?php echo strtoupper($all->tlp_bdnusaha); ?></span></td>
                                <td>FAX : <span class="tebal"><?php echo strtoupper($all->fax_bdnusaha); ?></span></td>
			 		</tr>
					<tr class="tModelawal">
			 					<td style="height:21mm">KEKAYAAN BERSIH PERUSAHAAN (TIDAK TERMASUK TANAH DAN BANGUNAN)</td>
                                <td colspan="2" valign="top">: <span class="tebal"><?php echo strtoupper($kekayaan); ?></span></td>
			 		</tr>
					<tr class="tModelawal">
			 					<td style="height:11mm">KELEMBAGAAN</td>
                                <td colspan="2">: <span class="tebal"><?php echo strtoupper($nm_lembaga); ?></span></td>
			 		</tr>
					<tr class="tModelawal">
			 					<td style="height:11mm">KEGIATAN USAHA (KBLI)</td>
                                <td colspan="2"><div  class="jtextfill" style="height:11mm">: 
                                <span class="tebal" style="width: 98%; float: right;"><?php echo strtoupper($kegiatanUsaha); ?></span></div></td>
			 		</tr>
					<tr class="tModelawal">
			 					<td style="height:30mm" valign="top">BARANG/JASA DAGANGAN  UTAMA</td>
                                <td colspan="2" valign="top">: <span class="tebal"><?php echo strtoupper($dagangan); ?></span></td>
			 		</tr>                    
					<tr class="tModelawal">
			 					<td colspan="4" style="height:19mm; text-align:justify; padding-right:2mm">IZIN INI BERLAKU UNTUK MELAKUKAN KEGIATAN USAHA PERDAGANGAN DISELURUH WILAYAH REPUBLIK INDONESIA, SELAMA PERUSAHAAN MASIH MENJALANKAN USAHANYA, DAN WAJIB DIDAFTAR ULANG SETIAP 5 (LIMA) TAHUN SEKALI.</td>
			 		</tr>

					</table><br>
<br>
	<br>


					<table style="font-size: 11pt;">
					<tr>

			 					<td colspan="3" rowspan="2" style="width:84mm"></td>
                                <td style="width:84mm">Dikeluarkan di Makassar</td>
			 		</tr>
					<tr>
                                <td>Pada Tanggal <span class="tebal"><?php echo ucwords($tglSekarang); ?></span></td>
			 		</tr>
					<tr>
			 					<td colspan="3" align="right"></td>
                                <td><span class="tebal ttd"></span></td>
			 		</tr>
					<tr>
			 					<td colspan="3" rowspan="5" valign="top" style="padding-left: 15mm;">
                               <div class="foto">Pas Photo <br>
                                3 X 4
                                </div>
                                </td>
                                <td><span class="tebal ttd">KEPALA <?php echo strtoupper($all->instansi); ?></span></td>
			 		</tr>
					<tr>
                                <td height="" style="height:11mm"></td>
			 		</tr>
					<tr>
                                <td><span class="tebal ttd" style="border-bottom:1px solid"><?php echo ($all->pimpinan); ?></span></td>
			 		</tr>
					<tr>
								<td class="ttd" style="line-height:15px">
                                <span style="width: 21mm;display: table-cell;">Pangkat</span>
                                <span style="display: table-cell;">:</span>
                                <span style="padding-left: 20px; display: table-cell;"><?php echo strtoupper($all->pangkat); ?></span>
                                </td>			 		
                    </tr>
					<tr>
								<td class="ttd" style="line-height:15px"><span style="width: 21mm;  display: table-cell;">NIP.</span>
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

<br />

<a class="btn btn-info" href="<?php echo site_url('cetak_siup');?>" onClick="windowPreview('<?php echo $url_cetak;?>',5,5); this.window.close()">Cetak</a>

