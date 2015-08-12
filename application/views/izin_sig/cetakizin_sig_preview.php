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

        this.focus();			
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
   font-size: 11px;
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
	padding: 7mm 8mm 5mm;
	margin: 0px;
	border: 2px solid red;
}
#container {
	min-height: 300px;
	*padding: 5mm 12mm 5mm 16mm;
	margin: 0px;
}
.header{
	*padding: 10mm 12mm 0mm 16mm;
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
.ttd {font-size:12pt; line-height: 18px; text-align: left; }
.ket {float:right; width:95%}
</style>
</head>

<body onLoad="">
	<br><br>
<div class="cetak_preview">
<div style="border:#FF0000 2px solid; padding:2px; width:190mm">
<div style="border:#FF0000 4px solid; padding:2px; width:187mm">
<div id="wrap">
	<div class="header">
    <span class="logo">
        <img src="<?php echo base_url();?>assets/img/Makassar.png" width="100px" height="100px" />
    </span> 
	<span class="center">
	<h4>PEMERINTAH KOTA MAKASSAR</h4>
	<h2><?php echo strtoupper($all->instansi); ?></h2>
    Jalan Jenderal Urip Sumoharjo No 8 Telepon 0411-436488<br>
	MAKASSAR</span>
	<span class="right" style="font-size:14px">Kode Pos 90144</span>
<span class="center" style="font-size: 11px; "><!--	Email : kpap@makassarkota.go.id Home Page : www.makassarkota.go.id !-->

<hr size="2" style="border: double;"/> 
	</span>
	</div>

	<div id="container">
	
	
	
	
	<div style="font-size:17px">Nomor Seri : 02 / &nbsp;
    <span style="font-size:17px; font-weight:bold"><?php echo $no_blanko; ?></span>&nbsp;/ <?php echo date('Y'); ?></div>
			 
			 <table width="100%" style="text-align:justify; font-size: 11.5pt;">
			 		<tr>
			 					<td colspan="4" align="center" >
                                <span><h4>SURAT IZIN WALIKOTA MAKASSAR</h4></span>
                                <span style="line-height: 4mm;"><h5>Nomor : <?php echo $no_izin;?></h5></span>
                                <span style="line-height: 8mm;">
                                <h4>
                                TENTANG<BR> IZIN GANGGUAN<BR>WALIKOTA MAKASSAR
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
			 					<td colspan="2" >Peraturan Walikota Makassar Nomor 8 Tahun 2014 Tentang Tata Cara Pemberian Izin Pada Pemerintah Kota Makassar</td>
			 		</tr>
					<tr>
			 					<td valign="top">3.</td>
			 					<td colspan="2" >Rekomendasi dari TIM Teknis Nomor <span class="tebal"><?php echo $no_reko; ?></span> Tanggal <span class="tebal"><?php echo $tgl_reko; ?></span></td>
			 		</tr>
					<tr>
			 					<td valign="top">4.</td>
			 					<td colspan="2" >Surat Permohonan <span class="tebal"><?php echo strtoupper($nm_pemohon); ?></span> Tanggal <span class="tebal"><?php echo $tgl_reg; ?></span></td>
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
                                <td colspan="2" >Melakukan kegiatan usaha dalam Kota Makassar dengan keterangan Perusahan :</td>
			 		</tr>
					<tr>
			 					<td></td>
			 					<td></td>
                                <td valign="top" style="width:49mm">NAMA PERUSAHAAN</td>
                                <td valign="top">: &nbsp;&nbsp;<span class="tebal ket"><?php echo strtoupper($nm_bdnusaha);?></span></td>
			 		</tr>
					<tr>
			 					<td></td>
			 					<td></td>
                                <td valign="top"style="padding-right:0">ALAMAT PERUSAHAAN</td>
                                <td valign="top" style="padding-left:0">
                                <div style="height:9mm" class="jtextfill"> 
                                : &nbsp;&nbsp;<span class="tebal"><?php echo strtoupper($alm_bdnusaha);?></span>
                                </div>
                                </td>
			 		</tr>
					<tr>
			 					<td></td>
			 					<td></td>
                                <td valign="top">BIDANG USAHA</td>
                                <td valign="top">
                                <div style="height:9mm" class="jtextfill2"> 
                                : &nbsp;&nbsp;<span class="tebal" tyle="height:9mm"><?php echo strtoupper($bidang_usaha);?></span>
                                </div>
                                </td>
			 		</tr>
					<tr>
			 					<td></td>
			 					<td></td>
                                <td valign="top">KAPASITAS</td>
                                <td valign="top">: &nbsp;&nbsp;<span class="tebal ket"><?php echo $kapasitas;?></span></td>
			 		</tr>
					<tr>
			 					<td></td>
			 					<td></td>
                                <td valign="top">TENAGA KERJA</td>
                                <td valign="top">: &nbsp;&nbsp;<span class="tebal ket"><?php echo $tenaker;?> ORANG</span></td>
			 		</tr>
					<tr>
			 					<td></td>
			 					<td></td>
                                <td valign="top">LUAS TEMPAT USAHA</td>
                                <td valign="top">: &nbsp;&nbsp;<span class="tebal ket"><?php echo $luas_usaha; ?> M2</span></td>
			 		</tr>
					<tr>
			 					<td></td>
			 					<td></td>
                                <td valign="top">GOLONGAN USAHA</td>
                                <td valign="top">: &nbsp;&nbsp;<span class="tebal ket"><?php echo strtoupper($golusaha);?></span></td>
			 		</tr>
					<tr>
			 					<td colspan="4">Dalam rangka Pengawasan, Pengendalian, Penertiban dan Pembinaan, maka Retribusi dipungut 5(lima) tahun sekali</td>
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
                                <td><span class="tebal ttd" style="display: table-cell;">
                                KEPALA <?php echo strtoupper($all->instansi); ?></span></td>
			 		</tr>
					<tr>
                                <td height="" style="height:13mm"></td>
			 		</tr>
					<tr>
                                <td><span class="tebal ttd" style="border-bottom:1px solid"><?php echo ($all->pimpinan);  ?></span></td>
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
			 		
			 		
			 </table>
	<span class="tembusan">Tembusan</span><br>
	<span class="tembusan">1. </span><span class="tembusan">Kepala Dinas Perindustrian, Perdagangan Kota Makassar;</span><br>
	<span class="tembusan">2. </span><span class="tembusan">Camat yang bersangkutan;</span><br>
	<span class="tembusan">3. </span><span class="tembusan">Arsip;</span>
	</div>
</div>
</div>
</div>
</div>
<a class="btn btn-info" href="<?php echo site_url('cetak_sig');?>" onClick="windowPreview('<?php echo $url_cetak;?>',5,5); this.window.close()">Cetak</a>

