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
</script> 

<style>
body {
   font-family: Arial;
   font-size: 11px;
   width: 216mm;
}
#wrap {
	margin:10mm 10mm 0mm 10mm;
	*width: 216mm;
	height:138mm;
}
#container {
	min-height: 270px;
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
	font-size: 18px;
}
h4 {
	font-size: 16px;
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
	<img src="<?php echo base_url();?>assets/img/logo.jpg" width="100px" height="100px" />
</span>
<center>
	<span class="center" style="margin-left: -220px;">
	<h4>PEMERINTAH KOTA MAKASSAR</h4>
	<h3>KANTOR PELAYANAN ADMINISTRASI PERIZINAN</h3>
    Jalan Jenderal Urip Sumoharjo No 8 Telepon 0411-436488<br>
	MAKASSAR</span>
	<!--<span class="right">Kode Pos 90144</span><br /> !-->
	<span class="center" style="font-size: 11px; margin-left: -180px;">Email : kpap@makassarkota.go.id Home Page : www.makassarkota.go.id. Kode Pos: 90144</center><hr size="2"/>
	<div id="container">
	
	
	
	<div style="float: left; margin-left: 20px; width: 150px; border: 1px solid; padding: 2px; text-align:center;font-size: 12;">
		TANDA TERIMA INI<br>
		BUKAN MERUPAKAN IZIN
	</div>
	<h3><u><font size="3"><div style="padding-left: 37%;">TANDA TERIMA BERKAS</div></font></u></h3> 
	<span style="float: right; margin-top: -20px;">NOMOR REGISTRASI : <?php echo $idRegistrasi;?></span><br /><br />
			 
			 
			 <table width="90%" style="margin-left: 20px;">
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
			 					<td><?php echo $alm_pemohon; ?></td>
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

	<div style="float: left; margin-left: 20px; width: 250px; border: 1px dotted; padding: 3px 10px;">
		Tanda Terima Berkas ini dibawa<br />
		pada saat pengambilan Surat Izin
	</div>
	
	<div style="float: left; margin-left: 130px; margin-top: -10px; text-align: center; width: 200px; font-size:14px">
		MAKASSAR, <?php echo $this->libraryku->tanggal(date('Y-m-d'));?> <br />
		Yang Menerima, 
		<p></p><br /><br>
		<b><u><?php echo $this->session->userdata('namaLengkap') ?></u></b>
	</div>

</div>
</body>
</html>