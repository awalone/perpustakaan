<html>
<head>
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

</script> 
<style>
body {
   font-family: Arial;
   font-size: 11pt;
   width: 21.56cm;
   margin: 50mm 21mm 0mm 16mm;
}
#wrap {
	width: 175mm;
	*padding: 0px;
	*margin: 0px;
}
#container {
	min-height: 300px;
	*padding: 56mm 12mm 0mm 16mm;
	margin: 0px;
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

h3 {
	font-size: 25px;
}
h4 {
	font-size: 4.7mm;
	
}
h5 {
	font-size: 4.5mm;	
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
.tebal { font-weight: bold }
 .foto {
 width:25mm; 
 height:30mm; 
 display:table-cell;
 vertical-align:middle; 
 text-align:center; 
 border:1px solid;
 }
.tembusan { font-size:15px}
.ttd {font-size:12pt; line-height: 18px; text-align: left; *display: table-cell; }
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
	
	
	
	<div style="padding: 0 0 5mm 0; font-size:17px">Nomor Seri :  07 / &nbsp;
    <span style="font-size:17px; font-weight:bold"><?php echo $no_blanko; ?></span>&nbsp; / <?php echo date('Y'); ?></div>
	
			 
			 <table width="100%" style="text-align:justify; font-size:11.5pt; padding-top: 3mm;" >
			 		<tr>
			 					<td colspan="4" align="center" >
                                <span><h4>SURAT IZIN WALIKOTA MAKASSAR</h4></span>
                                <span style="line-height: 4mm;"><h5>Nomor : <?php echo $no_izin;?></h5></span>
                                <span style="line-height: 8mm;">
                                <h4>
                                TENTANG<BR> IZIN PENYELENGGARAAN LATIHAN<BR>WALIKOTA MAKASSAR
                                </h4>
                                </span>
                                </td>
			 					
			 		</tr>
			 		<tr  valign="top">
			 					<td rowspan="4" style="width:23mm">Dasar </td>
			 					<td valign="top">1.</td>
			 					<td colspan="2" >Peraturan Daerah Kota Makassar Nomor 9 Tahun 2004 tentang Pengaturan dan Pemungutan Retribusi Ketenagakerjaan (Lembaran Daerah Kota Makassar Nomor 6 Tahun 2004 Seri C Nomor 6)</td>
			 		</tr>
					<tr>
			 					<td valign="top">2.</td>
			 					<td colspan="2" >Rekomendasi dari Dinas Tenaga Kerja Nomor <span class="tebal">560.563/283/Disnaker/V/2010</span> Tanggal <span class="tebal">05-05-2010</span></td>
			 		</tr>
					<tr>
			 					<td valign="top">3.</td>
			 					<td colspan="2" >Surat Permohonan <span class="tebal"><?php echo $nm_pemohon; ?></span> Tanggal <span class="tebal"><?php echo $tgl_reg; ?></span></td>
			 		</tr>
					<tr align="center" style="height:15mm">
			 					<td colspan="4"><span style="letter-spacing:5; text-align:center; font-size: 18px; font-weight:bold">MENGIZINKAN</span></td>
			 		</tr>
					<tr>
			 					<td colspan="4">KEPADA</td>
			 		</tr>
					<tr>
			 					<td>NAMA</td>
			 					<td>:</td>
                                <td colspan="2" ><span class="tebal"> <?php echo strtoupper($nm_pemohon);?></span></td>
			 		</tr>
					<tr>
			 					<td>ALAMAT</td>
			 					<td>:</td>
                                <td colspan="2" ><div style="height:18px" class="jtextfill0"> 
                                <span class="tebal"><?php echo strtoupper($alm_pemohon);?></span>
                                </div>
                                </td>
			 		</tr>
					<tr>
			 					<td>UNTUK</td>
			 					<td>:</td>
                                <td colspan="2" >Melaksanakan Kegiatan Penyelenggaraan Pelatihan dalam wilayah Kota Makassar, dengan keterangan Lembaga Latihan sebagai berikut :</td>
			 		</tr>
					<tr>
			 					<td></td>
			 					<td></td>
                                <td valign="top" style="width:49mm">LEMBAGA</td>
                                <td valign="top">: &nbsp;&nbsp;<span class="tebal ket"><?php echo strtoupper($nm_bdnusaha);?></span></td>
			 		</tr>
					<tr>
			 					<td></td>
			 					<td></td>
                                <td valign="top"style="padding-right:0">ALAMAT</td>
                                <td valign="top" style="padding-left:0">:
                                <div style="height:13mm;width: 95%;float: right;" class="jtextfill"> 
                                <span class="tebal"><?php echo strtoupper($alm_bdnusaha);?></span>
                                </div>
                                </td>
			 		</tr>
					
					<tr>
			 					<td></td>
			 					<td></td>
                                <td valign="top">JENIS PROGRAM/ LATIHAN</td>
                                <td valign="top">: &nbsp;&nbsp;<span class="tebal ket"><?php echo strtoupper($jenis_latih);?></span></td>
			 		</tr>
					<tr>
			 					<td></td>
			 					<td></td>
                                <td valign="top">MASA BERLAKU</td>
                                <td valign="top">: &nbsp;&nbsp;<span class="tebal ket"><?php echo ucwords($tgl_izin); echo " S/D "; echo ucwords($tgl_berakhir); ?></span></td>
			 		</tr>
					<tr>
			 					<td colspan="4">Surat Izin Penyelenggaraan Latihan (SIPL) ini, berlaku selama jangka waktu 5 (Lima) tahun dan diperpanjang setelah selama masa berlakunya berakhir</td>
			 		</tr>
					<tr>
			 					<td colspan="3" rowspan="2"></td>
                                <td style="line-height:2.5mm">Dikeluarkan di Makassar</td>
			 		</tr>
					<tr>
                                <td>Pada Tanggal <span class="tebal"><?php echo ucwords($tgl_izin);?></span></td>
			 		</tr>
					<tr>
			 					<td colspan="3" align="right">an.</td>
                                <td><span class="tebal ttd">WALIKOTA MAKASSAR</span></td>
			 		</tr>
					<tr>
			 					<td colspan="3" rowspan="5" valign="top" style="padding-left: 15mm;">
                                <div class="foto">
                                3 X 4
                                </div>
                                </td>
                                <td><span class="tebal ttd">KEPALA <?php echo strtoupper($all->instansi); ?></span></td>
			 		</tr>
					<tr>
                                <td height="" style="height:8mm"></td>
			 		</tr>
					<tr>
                                <td><span class="tebal ttd" style="border-bottom:1px solid"><?php echo ($all->pimpinan);  ?></span></td>
			 		</tr>
					<tr>
								<td class="ttd" style="line-height:10px">
                                <span style="width: 21mm;display: table-cell;">Pangkat</span>
                                <span style="display: table-cell;">:</span>
                                <span style="padding-left: 20px; display: table-cell;"><?php echo strtoupper($all->pangkat); ?></span>
                                </td>			 		
                    </tr>
					<tr>
								<td class="ttd" style="line-height:10px"><span style="width: 21mm;  display: table-cell;">NIP.</span>
                                <span style="display: table-cell;">:</span>
                                <span style="padding-left: 20px;  display: table-cell;"><?php echo strtoupper($all->nip); ?></span>
                                </td>
			 		</tr>
			 		
			 		
			 </table>
	<span class="tembusan">Tembusan</span><br>
	<span class="tembusan">1. </span><span class="tembusan">Kepala Dinas Perindustrian, Perdagangan, dan Penanaman Modal Kota Makassar;</span><br>
	<span class="tembusan">2. </span><span class="tembusan">Camat yang bersangkutan;</span><br>
	<span class="tembusan">3. </span><span class="tembusan">Arsip;</span>
	</div>
</div>
</body>
</html>