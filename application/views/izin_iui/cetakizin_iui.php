<html>
<head>
<link rel="stylesheet" href="<?php echo $css ?>">
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
	$(document).ready(function() {
		$('.jtextfill3').textfill({ maxFontPixels: 14 });
	});
	$(document).ready(function() {
		$('.jtextfill4').textfill({ maxFontPixels: 14 });
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
 // PrintWindow();

</script> 

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
	
	
	
	
	<div style="font-size:17px; padding: 0 0 5mm 0;">Nomor Seri :  05 /
    <span style="font-size:17px; font-weight:bold"><?php echo $no_blanko; ?></span> / <?php echo date('Y'); ?></div>
			 
			 <table width="100%"  style="text-align:justify; font-size:11pt; *padding-top: 3mm;">
			 		<tr>
			 					<td colspan="4" align="center" >
                                <span><h4>SURAT IZIN WALIKOTA MAKASSAR</h4></span>
                                <span style="line-height: 4mm;"><h5>Nomor :  <?php echo strtoupper($all->no_izin);?></h5></span>
                                <span style="line-height: 8mm;">
                                <h4>
                                TENTANG<BR> IZIN USAHA INDUSTRI (IUI)<BR>WALIKOTA MAKASSAR
                                </h4>
                                </span>
                                </td>
			 					
			 		</tr>
			 		<tr  valign="top">
			 					<td rowspan="3" style="width:20mm">Dasar </td>
			 					<td valign="top">1.</td>
			 					<td colspan="2" >Peraturan Daerah Kota Makassar Nomor 11 Tahun 2004 tentang Pengaturan dan Pemungutan Retribusi Usaha di bidang Perindustrian dan Perdagangan Kota Makassar (Lembaran Daerah Kota Makassar Nomor 25 Tahun 2004, Seri C Nomor 8)</td>
			 		</tr>
					<tr>
			 					<td valign="top">2.</td>
			 					<td colspan="2" >Rekomendasi dari Dinas Perindustrian Perdagangan dan Penanaman Modal <br>
Nomor <span class="tebal"><?php echo strtoupper($all->no_reko);?></span> Tanggal <span class="tebal"><?php echo $tgl_reko; ?></span></td>
			 		</tr>
					<tr>
			 					<td valign="top">3.</td>
			 					<td colspan="2" >Surat Permohonan <span class="tebal"><?php echo strtoupper($all->nm_pemohon); ?></span> Tanggal <span class="tebal"><?php echo $tgl_reg; ?></span></td>
			 		</tr>
					<tr align="center" style="height:12mm">
			 					<td colspan="4"><span style="letter-spacing:5; text-align:center; font-size: 18px; font-weight:bold">MENGIZINKAN</span></td>
			 		</tr>
					<tr>
			 					<td colspan="4">KEPADA</td>
			 		</tr>
					<tr>
			 					<td valign="top">NAMA</td>
			 					<td valign="top">:</td>
                                <td colspan="2" valign="top"><span class="tebal"> <?php echo strtoupper($all->nm_pemohon);?></span></td>
			 		</tr>
					<tr>
			 					<td valign="top">ALAMAT</td>
			 					<td valign="top">:</td>
                                <td colspan="2" valign="top">
                                <div style="height:5mm" class="jtextfill4">                                 
                                <span class="tebal"><?php echo strtoupper($all->alm_pemohon);?></span>
                                </div>
                                </td>
			 		</tr>
					<tr>
			 					<td valign="top">UNTUK</td>
			 					<td valign="top">:</td>
                                <td colspan="2"valign="top" >Melaksanakan Kegiatan Usaha Industri dalam Kota Makassar dengan Keterangan sebagai Berikut :</td>
			 		</tr>
					<tr>
			 					<td></td>
			 					<td></td>
                                <td valign="top" style="width:50mm">NAMA PERUSAHAAN</td>
                                <td valign="top">: &nbsp;&nbsp;<span class="tebal"><?php echo strtoupper($all->nm_bdnusaha);?></span></td>
			 		</tr>
					<tr>
			 					<td></td>
			 					<td></td>
                                <td valign="top"style="padding-right:0">ALAMAT PERUSAHAAN</td>
                                <td valign="top" style="padding-left:0">:
                                <div style="height:8mm; width: 95%;float: right;" class="jtextfill0">                                 
                                <span class="tebal"><?php echo strtoupper($all->alm_bdnusaha);?></span>
                                </div>
                                </td>
			 		</tr>
					<tr>
			 					<td></td>
			 					<td></td>
                                <td valign="top">NPWP</td>
                                <td valign="top">: &nbsp;&nbsp;<span class="tebal ket"><?php echo strtoupper($all->npwp); ?></span></td>
			 		</tr>
					<tr>
			 					<td></td>
			 					<td></td>
                                <td valign="top">JENIS INDUSTRI (KBLI)</td>
                                <td valign="top">:
                                <div style="height:8mm; width: 95%;float: right;" class="jtextfill">                                 
                                <span class="tebal"><?php echo strtoupper($kegiatanUsaha);?></span>
                                </div>
                                </td>
			 		</tr>
					<tr>
			 					<td></td>
			 					<td></td>
                                <td valign="top">NILAI INVESTASI</td>
                                <td valign="top">:
                                <div style="height:8mm; width: 95%;float: right;" class="jtextfill2"> 
                                <span class="tebal"><?php echo strtoupper($investasi);?></span>
                                </div>
                                </td>
			 		</tr>
					<tr>
			 					<td></td>
			 					<td></td>
                                <td valign="top">KAPASITAS PRODUKSI</td>
                                <td valign="top">:
                                <div style="height:8mm; width: 95%;float: right;" class="jtextfill3"> 
                                <span class="tebal"><?php echo strtoupper($kap_prod);?> PERTAHUN</span>
                                </div>
                                </td>
			 		</tr>
					<tr>
			 					<td></td>
			 					<td></td>
                                <td valign="top">JUMLAH TENAGA KERJA</td>
                                <td valign="top">: &nbsp;&nbsp;<span class="tebal ket"><?php echo $tenaker;?> ORANG</span></td>
			 		</tr>
					<tr>
			 					<td></td>
			 					<td></td>
                                <td valign="top">MASA BERLAKU</td>
                                <td valign="top">: &nbsp;&nbsp;<span class="tebal ket"><?php echo ucwords($tgl_izin);?> S/D <?php echo ucwords($tgl_berakhir);?></span></td>
			 		</tr>
					<tr>
			 					<td colspan="4">Surat Izin Usaha Industri ini, berlaku selama jangka waktu 5 (Lima) tahun dan diperpanjang setelah masa berlakunya berakhir</td>
			 		</tr>
					<tr>
			 					<td colspan="3" rowspan="2"></td>
                                <td style="line-height:3mm">Dikeluarkan di Makassar</td>
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
                                <td style="display: table-cell; text-align: left;">
                                <span class="tebal ttd">KEPALA <?php echo strtoupper($all->instansi); ?></span></td>
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
	<span class="tembusan">1. </span><span class="tembusan">Kepala Dinas Perindustrian Perdagangan dan Penanaman Modal Kota Makassar;</span><br>
	<span class="tembusan">2. </span><span class="tembusan">Camat yang bersangkutan;</span><br>
	<span class="tembusan">3. </span><span class="tembusan">Arsip;</span>
	</div>
</div>
</body>
</html>