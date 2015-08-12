<html>
<head>
<script type="text/javascript">
    function PrintWindow() { 
	   self.blur();
		self.moveTo(10000,10000);
		self.resizeTo(1,1);
		self.blur();
       window.print();            
       CheckWindowState();
    }

    function CheckWindowState()    {           
        if(document.readyState=="complete") {
            window.close(); 
        } else {           
            setTimeout("CheckWindowState()", 2000)
        }
    }
   //PrintWindow();
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
	// PrintWindow();
</script> 

<style>
html{
margin:0
}
body {
   font-family: Arial;
   font-size: 10px;
	margin: 44mm 13.5mm 0px 23mm;
	width: 21.56cm;
}
#wrap {
	width: 17cm;
	*padding: 0px;
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
	margin-left: 20px;
}
h2 {
	font-size: 30px;
}
h3 {
	font-size: 24px;
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
	font-size: 12px;
}
.tModelakhir td{
    border-bottom: 1px solid;
    border-right: 1px solid;
	padding:0 0 0 5px;
	font-size: 12px;
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
	margin-left: -20px;
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
</head>

<body onLoad="">
<div id="wrap">
<!-- <span class="logo">
	<img src="http://119.252.173.21:8080/ci/assets/img/logo.jpg" width="100px" height="100px" />
</span> !-->
<!--
	<span class="center">
	<h4>PEMERINTAH KOTA MAKASSAR</h4>
	<h2>KANTOR PELAYANAN ADMINISTRASI PERIZINAN</h2>
    Jalan Jenderal Urip Sumoharjo No 8 Telepon 0411-436488<br>
	MAKASSAR</span>
	<span class="right">Kode Pos 90144</span><br />
	<span class="center" style="font-size: 11px;">Email : kpap@makassarkota.go.id Home Page : www.makassarkota.go.id</center><hr size="2"/>
!-->

	<div id="container">
	
	
	
	<span style="font-size:15px; font-weight:bold">Nomor Seri: 06 / <?php echo $no_blanko; ?> / <?php echo date("Y");  ?></span>	<br><br>
	 
			 
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
			 					<td valign="middle" style="height:10mm; width:37mm">NAMA
			 					<br> <?php  echo strtoupper($kategori); ?> </td>
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
			 					<td valign="top" style="height:10mm">ALAMAT <?php  echo strtoupper($kategori); ?></td>
			 					<td valign="top" align="center">:</td>
			 					<td colspan="2">
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
                                <td><span class="tebal ttd">KEPALA <?php echo strtoupper($all->instansi); ?></span></td>
			 		</tr>
					<tr>
                                <td height="" style="height:11mm"></td>
			 		</tr>
					<tr>
                                <td><span class="tebal ttd" style="border-bottom:1px solid"><?php echo ($all->pimpinan);  ?></span></td>
			 		</tr>
					<tr>
								<td class="ttd" style="line-height:9px">
                                <span style="width: 21mm;display: table-cell;">Pangkat</span>
                                <span style="display: table-cell;">:</span>
                                <span style="padding-left: 20px; display: table-cell;"><?php echo strtoupper($all->pangkat); ?></span>
                                </td>			 		
                    </tr>
					<tr>
								<td class="ttd" style="line-height:9px"><span style="width: 21mm;  display: table-cell;">NIP.</span>
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
</body>
</html>