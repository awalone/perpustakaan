<html>
<head>
<style>
body {
   font-family: Tahoma;
   font-size: 11px;
   width: 80%;
}

h1, h2, h3, h4, h5, h6 {
   padding: 2px 0px;
   margin: 0px;
}

h1 {
   font-size: 15pt;
}

h2 {
   font-size: 13pt;
}

h3 {
   font-size: 11pt;
}

h4 {
   font-size: 9pt;
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

.table-list{
	text-align: left;
	font-family: Tahoma;
	font-size: 11px;
   border-collapse: collapse;
   border: 0px solid #000;
}

.table-list td {
   font-family: Tahoma;
   font-size: 11px;
   padding: 4px;
/*   border: 1px solid #000;*/
   border-top: 0px solid #000;
   border-bottom: 0px solid #000;
}

.table-list th {
   font-family: Tahoma;
   font-size: 11px;
   font-weight: bold;
   padding: 4px;
/*   border: 1px solid #000;*/
   border-top: 0px solid #000;
   border-bottom: 0px solid #000;
}

div.page-break {
   visibility: visible;
   page-break-after: always;
}



.list {
	border-collapse: collapse;
	width: 100%;
	border-top: 0px solid #BFBFBF;
	border-left: 0px solid #BFBFBF;
	margin-bottom: 10px;
	font-family: Tahoma; 
	font-size: 8pt;
	padding-top:3px;
}

.listNone {
	width: 100%;
	font-family: Tahoma;
	font-size: 8pt;
	padding-top: 2px;
	margin-bottom: 20px;	
}

.list td {
	border-right: 0px;
	border-bottom: 0px;
}
.list thead td {
	background-color: #E5E5E5; 
	padding: 0px 5px; text-transform: capitalize;
}
.list thead td a, .list thead td {
	text-decoration: none; 
	color: #000000;
	font-weight: bold;
	
}
.list tbody a {
	text-decoration: none;
}
.list tbody td {
	vertical-align: middle;
	padding: 0px 5px;
}
.list tbody tr:odd {
	background: #FFFFFF;
}
.list tbody tr:even {
	background: #E4EEF7;
}
.list .left {
	text-align: left;
	padding: 7px;
}
.list .right {
	text-align: right;
	padding: 7px;
}
.list .center {
	text-align: center;
	padding: 7px;
}
.list .asc {
	padding-right: 15px;
	background: url('images/asc.png') right center no-repeat;
}
.list .desc {
	padding-right: 15px;
	background: url('images/desc.png') right center no-repeat;
}


</style>
</head>

<body onload="window.print()">
<center>
	SURAT IZIN WALIKOTA MAKASSAR<br />
	NOMOR : <?php echo $no_izin;?><hr />
	<h3><u>Tanda Terima Berkas</u></h3> 
			 <table class="table-list" width="80%">
			 		<tr>
			 					<td colspan="3">Mengizinkan Kepada</td>
			 					
			 		</tr>
			 		<tr>
			 					<td>Nama </td>
			 					<td>:</td>
			 					<td><?php echo $nm_bdnusaha." / ".$nm_pemohon; ?></td>
			 		</tr>
					<tr>
			 					<td>Alamat </td>
			 					<td>:</td>
			 					<td><?php echo $alm_bdnusaha; ?></td>
			 		</tr>
					<tr>
			 					<td>Untuk </td>
			 					<td>:</td>
			 					<td>Mendirikan Bangunan dalam Kota Makassar dengan keterangan sebagai berikut :</td>
			 		</tr>
			 		<tr>
			 					<td></td>
			 					<td></td>
			 					<td>
								<table>
									<tr>
										<td>Fungsi Bangunan </td>
										<td>:</td>
										<td><?php echo $fungsi_bgn; ?></td>
									</tr>
									<tr>
										<td>Jenis Bangunan </td>
										<td>:</td>
										<td><?php echo $jenis_bgn; ?></td>
									</tr>
									<tr>
										<td>Letak Bangunan </td>
										<td>:</td>
										<td><?php echo $letak_bgn; ?></td>
									</tr>
									<tr>
										<td valign="top">Roylen </td>
										<td valign="top">:</td>
										<td>
											<table>
												<tr>
													<td valign="top">GSP</td>
													<td> : </td>
													<td><?php echo $gsp_bgn;?></td>
													<td>Meter</td>
												</tr>
												<tr>
													<td>GSB</td>
													<td> : </td>
													<td><?php echo $gsb_bgn;?></td>
													<td>Meter</td>
												</tr>
											</table>
										
										</td>
									</tr>
									
									<tr>
										<td>Status Tanah </td>
										<td>:</td>
										<td><?php echo $sta_tanah; ?></td>
									</tr>
									
								</table>
								
								</td>
			 		</tr>
			 		
			 </table>
			 
</center>



</body>
</html>