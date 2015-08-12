<html>
<head>
<script type="text/javascript">
function windowPreview(linkd,w,h)
{
	window.open(linkd,"Print","width="+w+",height="+h+",addressbar=no,links=0,scrollbars=0,toolbar=0,location=0");
}			
</script>
    
<style>
body {
   font-family: Arial;
   font-size: 11px;
   width: 50%;
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
}
#wrap {
	width: 17cm;
	height: 129mm;
	padding:10px;
	border:4px dotted red;
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
	font-size: 16px;
}
h4 {
	font-size: 14px;
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
	font-size: 14px;
	width: 500px;
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
	<span class="center">
	<h4>PEMERINTAH KOTA MAKASSAR</h4>
	<h3>BADAN PERIZINAN TERPADU DAN PENANAMAN MODAL</h3>
    Jalan Jenderal Urip Sumoharjo No 8 Telepon 0411-436488<br>
	MAKASSAR</span>
	<span class="right">Kode Pos 90144</span><br />
	<span class="center" style="font-size: 11px;">Email : kpap@makassarkota.go.id Home Page : www.makassarkota.go.id</center><hr size="2"/>
	<div id="container">
	
	
	
	<div style="float: left; margin-left: 20px; width: 150px; border: 1px solid; padding: 2px; text-align:center;font-size: 12;">
		TANDA TERIMA INI<br>
		BUKAN MERUPAKAN IZIN
	</div>
	<h3><u><font size="3"><div style="padding-left: 240px;">TANDA TERIMA BERKAS</div></font></u></h3> 
	<span style="float: right; margin-top: -20px;">NOMOR REGISTRASI : <?php echo $idRegistrasi;?></span><br /><br />
			 
			 
			 <table width="90%" style="margin-left: 20px;">
			 		<tr>
			 					<td colspan="3">Telah Menerima Berkas Permohonan <?php echo $jenisIzin;?></td>
			 					
			 		</tr>
			 		<tr>
			 					<td>Nama </td>
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

	<div style="float:left;  margin-left: 20px; width: 350px;">
	<div style="display:inline-block; border: 1px dotted; padding: 7px 10px;">
		Tanda Terima Berkas ini dibawa
		pada saat pengambilan Surat Izin
	</div>
	<div style="display: inline-block; padding: 3px 10px; margin-top: 15px">
		Untuk Mengetahui Perkembangan Izin Anda, Silakan SMS ke: <br>
		<h5><strong>081 1413 0700</strong> KETIK <strong>IZIN</strong> [Spasi] <strong>No. Registrasi</strong></h5>
	</div>
	</div>
	<div style="float: left;  margin-top: -10px; text-align: center; width: 270px; font-size:14px">
		MAKASSAR, <?php echo $this->libraryku->tanggal(date('Y-m-d'));?> <br />
		Yang Menerima, 
		<p></p><br /><br>
		<b><u><?php echo $this->session->userdata('namaLengkap') ?></u></b>
	</div>

</div>
			<div  style="text-align: center; display: table-cell; width: 17cm; float: left;"> <input style="position:fixed; bottom:0px" type="button" onClick="windowPreview('<?php echo site_url('registrasi/cetakAsli/'.$idRegistrasi);?>/',5,5)" target="_blank" class="btn-primary" value="CETAK"></div>
</body>
</html>