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
		$('.jtextfill').textfill({ maxFontPixels: 16 });
	});
	$(document).ready(function() {
		$('.jtextfill0').textfill({ maxFontPixels: 16 });
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
@page {
size:auto;
margin:0mm;
}
body {
   font-family: Arial;
   font-size: 11pt;
   margin: 50mm 21mm 0mm 16mm;
   padding:0;
   width:215.6mm
}
#wrap {
	width: 175mm;
	padding: 0px;
	*margin: 0px;
}
#container {
	min-height: 300px;
	*padding: 56mm 21mm 0mm 16mm;
	*margin: 0px;
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
	font-size: 5mm;
	
}
h5 {
	font-size: 4.7mm;	
}
h6 {
	font-size: 4mm;	
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
.ttd {font-size:16; line-height: 18px; text-align: left; *display: table-cell; }
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
	
	
	
	<div style="font-size:17px">Nomor Seri :  01 / &nbsp;
    <span style="font-size:17px; font-weight:bold"><?php echo $no_blanko  ?></span>&nbsp;/ <?php echo date('Y'); ?></div>
	

			 
			 <table width="100%" style="font-size: 11pt; text-align: justify; width:177.6mm">
			 		<tr>
			 					<td colspan="4" align="center" >
                                <span><h5>SURAT IZIN WALIKOTA MAKASSAR</h5></span>
                                <span style="line-height: 5.5mm;line-height: 2.5mm;"><h6>Nomor : <?php echo $no_izin;;?> </h6></span>
                                <span style="line-height: 8mm; padding-top: 2mm; display: table-cell;">
                                <h4>
                                TENTANG<BR> IZIN MENDIRIKAN BANGUNGAN<BR>WALIKOTA MAKASSAR
                                </h4>
                                </span>
                                </td>
			 					
			 		</tr>
			 		<tr  valign="top">
			 					<td rowspan="4" style="width:23mm">Dasar </td>
			 					<td valign="top">1.</td>
			 					<td colspan="2" >Peraturan Daerah Kota Makassar Nomor 5 Tahun 2012 tentang Retribusi Perizinan Tertentu</td>
			 		</tr>
					<tr>
			 					<td valign="top">2.</td>
			 					<td colspan="2" >Peraturan Walikota Makassar Nomor 14 Tahun 2005 Tentang Tata Cara Pemberian Izin Pada Pemerintah Kota Makassar</td>
			 		</tr>
					<tr>
			 					<td valign="top">3.</td>
			 					<td colspan="2" >Rekomendasi dari Dinas Tata Ruang dan Bangunan Nomor  <span class="tebal"><?php echo $no_reko; ?></span> Tanggal <span class="tebal"><?php echo $tgl_reko; ?></span></td>
			 		</tr>
					<tr>
			 					<td valign="top">4.</td>
			 					<td colspan="2" >Surat Permohonan <span class="tebal"> <?php echo $nm_pemohon; ?></span> Tanggal <span class="tebal"><?php echo $tgl_reg; ?></span></td>
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
                                <td colspan="2" ><span class="tebal"> <?php echo $nm_pemohon; ?></span></td>
			 		</tr>
					<tr>
			 					<td>ALAMAT</td>
			 					<td>:</td>
                                <td colspan="2" ><div style="height:18px" class="jtextfill0"> 
                                <span class="tebal"><?php echo $alm_pemohon;?></span>
                                </div>
                                </td>
			 		</tr>
					<tr>
			 					<td>UNTUK</td>
			 					<td>:</td>
                                <td colspan="2" >Mendirikan Bangungan dalam Kota Makassar dengan keterangan sebagai berikut :</td>
			 		</tr>
					<tr>
			 					<td></td>
			 					<td></td>
                                <td valign="top" style="width:49mm">FUNGSI BANGUNAN</td>
                                <td valign="top">: &nbsp;&nbsp;<span class="tebal"><?php echo $fungsi_bgn;?></span></td>
			 		</tr>
					<tr>
			 					<td></td>
			 					<td></td>
                                <td valign="top"style="padding-right:0">JENIS BANGUNAN</td>
                                <td valign="top" style="padding-left:0">: &nbsp;&nbsp;<span class="tebal ket"><?php echo $jenis_bgn;?></span></td>
			 		</tr>
					<tr>
			 					<td></td>
			 					<td></td>
                                <td valign="top">LETAK BANGUNAN</td>
                                <td valign="top">:
                                <div style=" height:13mm; width: 95%;float: right;" class="jtextfill">
                                <span class="tebal" ><?php echo $letak_bgn;?></span>
                                </div>
                                </td>
			 		</tr>
					<tr>
			 					<td></td>
			 					<td></td>
                                <td valign="top">ROYLEN</td>
                                <td valign="top"><div style="float:left">: &nbsp;&nbsp; - GSP 
                                				<span style="float:right;padding-right: 100px;">Meter</span> 
                                				<span class="tebal ket" style="width:40mm; text-align:center"><?php echo $gsp_bgn;?></span>
                                				</div>
                                <div style="float:left"> &nbsp;&nbsp;&nbsp;&nbsp; - GSB 
                                <span style="float:right; padding-right: 100px;">Meter</span> 
                                <span class="tebal ket" style="width:40mm; text-align:center" ><?php echo $gsb_bgn; ?></span></div>
                                </td>
			 		</tr>
					<tr>
			 					<td></td>
			 					<td></td>
                                <td valign="top">STATUS TANAH</td>
                                <td valign="top">: &nbsp;&nbsp;<span class="tebal ket"><?php echo $sta_tanah;?></span></td>
			 		</tr>
					<tr>
			 					<td colspan="4">Surat Izin Mendirikan Bangunan ni berlaku mulai tanggal ditetapkan dengan ketentuan akan mematuhi segala ketentuan dan petunjuk yang telah disetujui di dalam Izin Mendirikan Bangunan (IMB)</td>
			 		</tr>
					<tr>
			 					<td colspan="3" rowspan="2"></td>
                                <td>Dikeluarkan di Makassar</td>
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
                                <div class="foto">
                                3 X 4
                                </div>
                                </td>
                                <td ><span class="tebal ttd">KEPALA <?php echo strtoupper($all->instansi); ?></span></td>
			 		</tr>
					<tr>
                                <td height="" style="height:10mm"></td>
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
	<span class="tembusan">1. </span><span class="tembusan">Kepala Dinas Tata Ruang dan Bangunan Kota Makassar;</span><br>
	<span class="tembusan">2. </span><span class="tembusan">Camat yang bersangkutan;</span><br>
	<span class="tembusan">3. </span><span class="tembusan">Arsip;</span>
	</div>
</div>
</body>
</html>