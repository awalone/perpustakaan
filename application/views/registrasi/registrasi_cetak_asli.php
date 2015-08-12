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
  // PrintWindow();
</script> 

<style>
@media print{
	body {
            *width: 21.6cm ;
            *height: 14cm;
            margin: 0;
            *letter-spacing: 10px;
           }
 }

body {
   font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
   font-size: 11px;
   letter-spacing: 6px;
   line-height: 16px;
   *width: 21.6cm;
*-moz-transform: rotate(-90deg); 
*-o-transform: rotate(-90deg); 
*-webkit-transform: rotate(-90deg); 

}
#wrap {
	margin:0.7cm 1.5cm 1cm 0.5cm;
	*width: 21.6cm;
	*height:13.8cm;
}
#container {
	min-height: 230px;
}

h1, h2, h3, h4, h5, h6 {
   padding: 2px 0px;
   margin: 0px;
   text-weight: bolder;
}

.logo {
	width: 100px;
	height: 90px;
	float: left;
	margin-left: 20px;
}

h3 {
	font-size: 18px;
}
h4 {
	font-size: 16px;
}
h5{
	font-size: 15px; font-weight: normal;
}
.right {
	float: right;
	text-align: right;
	width: 200px;
	margin-top: -14px;
	
}

.center {

	display: block;
	font-size: 16px;
	width: 100%;
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



</style>
</head>

<body>
<div id="wrap">
<span class="logo">
	<img src="<?php echo base_url();?>assets/img/logo.jpg" width="120px" height="80px" />
</span>
<center>
	<span class="center" style="margin-left: -220px; letter-spacing: 8px;">
	<h4>PEMERINTAH KOTA MAKASSAR</h4>
	<h3>BADAN PERIZINAN TERPADU DAN PENANAMAN MODAL</h3>
    Jalan Jenderal Urip Sumoharjo No 8 Telepon 0411-436488<br>
	MAKASSAR</span>
	<!--<span class="right">Kode Pos 90144</span><br /> !-->
	<span class="center" style="font-size: 10px; margin-left: -180px;">Email : kpap@makassarkota.go.id Home Page : www.makassarkota.go.id. Kode Pos: 90144</center><hr size="2"/>
	<div id="container">
	
	
	
	<div style="float: left; margin-left: 20px; width: 270px; border: 2px solid; padding: 2px; text-align:center;font-size: 12;">
		TANDA TERIMA INI<br>
		BUKAN MERUPAKAN IZIN
	</div>
	<h3><u><font size="3"><div style="padding-left: 37%;">TANDA TERIMA BERKAS</div></font></u></h3> 
	<span style="float: right; margin-top: -20px;">NOMOR REGISTRASI : <?php echo $idRegistrasi;?></span><br /><br />
			 
			 
			 <table width="90%" style="margin-left: 20px; font-size: 15px; line-height: 14px;">
			 		<tr>
			 					<td colspan="3">Telah Menerima Berkas Permohonan <?php echo $jenisIzin;?></td>
			 					
			 		</tr>
			 		<tr>
			 					<td  width="300px">Nama </td>
			 					<td>:</td>
			 					<td><?php echo $nm_pemohon; ?></td>
			 		</tr>
					<tr>
			 					<td>Alamat </td>
			 					<td>:</td>
			 					<td><?php echo $alm_pemohon; ?></td>
			 		</tr>
					<tr>
			 					<td>No. KTP </td>
			 					<td>:</td>
			 					<td><?php echo $ktp_pemohon; ?></td>
			 		</tr>
					<tr>
			 					<td>No. HP </td>
			 					<td>:</td>
			 					<td><?php echo $hp_pemohon; ?></td>
			 		</tr>
					<tr>
			 					<td>Nama Perusahaan </td>
			 					<td>:</td>
			 						<td><?php 
									if ($akr_def != '' AND $akr_def != NULL) {
										echo $akr_def.' '.$nm_bdnusaha;
									}
									else {
										echo $nm_bdnusaha;
									}
									?></td>
			 		</tr>
					<tr>
			 					<td>Alamat Perusahaan </td>
			 					<td>:</td>
			 					<td><?php echo $alm_bdnusaha; ?></td>
			 		</tr>
					
			 		
			 		
			 </table>
			 
</center>
	</div>
	<div style="float:left;  margin-left: 20px; width: 730px;">
	<div style="display:inline-block; border: 1px dotted; padding: 7px 10px;">
		Tanda Terima Berkas ini dibawa
		pada saat pengambilan Surat Izin
	</div>
	<div style="display: inline-block; padding: 3px 10px; margin-top: 15px">
		Untuk Mengetahui Perkembangan Izin Anda, Silakan SMS ke: <br>
		<h5><strong>081 1413 0700</strong> KETIK <strong>IZIN</strong> [Spasi] <strong>No. Registrasi</strong></h5>
	</div>
	</div>
	<div style="float: left; margin-left: 120px; margin-top: -10px; text-align: center; width: 330px; font-size:14px">
		MAKASSAR, <?php echo $this->libraryku->tanggal(date('Y-m-d'));?> <br />
		Yang Menerima, 
		<p></p><br /><br>
		<b><u><?php echo $this->session->userdata('namaLengkap') ?></u></b>
	</div>

</div>
</body>
</html>