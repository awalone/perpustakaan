<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/4.1.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.custom.min.css" />
<!-- ace styles -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.min.css" id="main-ace-style" />
<!--[if lte IE 9]>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-part2.min.css" />
<![endif]-->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-skins.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-rtl.min.css" />


<?php

	if ($jumlah > 0)
	{

		$kode_unik = "";
		$anggota = "";
		$tanggal_pinjam = "";
		$tanggal_kembali = "";
		?>
		<table id="sample-table-2" class="table table-bordered table-hover dataTable" aria-describedby="sample-table-2_info">
		<?php
		foreach($query as $row)
		{

			$id_pinjam = $row->pinjaman_detail_id;
			//kalau kode uniknya sudah ada sebelumnya
			if ($kode_unik == "")
			{
				$kode_unik = $row->pinjaman_kode_unik;
				$anggota = $row->anggota_nama;
				$no_anggota = $row->anggota_kode;
				$jkel = $row->anggota_jkel;
				$anggotaNim = $row->anggota_nim;
				

				?>
				<tr><td colspan='7'><b>Identitas Anggota</b></td></tr>
				<tr><td width='30%'><strong>Kode Transaksi </td><td colspan='3'>: <?php echo $kode_unik;?></strong></td><td colspan='4' rowspan='5'><img src='<?php echo base_url();?>berkas/anggota/64663696a5.jpg' width='200px' /></td></tr>
				<tr><td><strong>Nama Anggota</td><td colspan='3'> : <?php echo $anggota;?></strong></td></tr>
				<tr><td><strong>No. Anggota </td><td colspan='3'>: <?php echo $no_anggota;?></strong></td></tr>
				<tr><td><strong>Jenis Kelamin </td><td colspan='3'>: <?php echo $jkel;?></strong></td></tr>
				<tr><td><strong>NIM </td><td colspan='3'>: <?php echo $anggotaNim;?></strong></td></tr>
				<tr><td colspan='7'><b>Detail Buku</b></td></tr>
				<tr><th>Judul</th><th>Kategori</th><th>Pengarang</th><th>Tanggal Pinjam</th><th>Tgl. Harus Kembali</th><th>Status</th><th>Denda</th>
				<?php


			}

			?><tr detail_id="<?php echo $row->pinjaman_detail_id; ?>" class="pilih">
			
				<td><?php echo $row->buku_judul;?></td>
				<td><?php echo $row->jenis_buku_nama;?></td>
				<td><?php echo $row->buku_pengarang;?></td>
				<td><?php echo $row->pinjaman_tanggal_pinjam;?></td>
				<td><?php echo $row->pinjaman_tanggal_kembali;?></td>
				<td><?php echo 'status';?></td>
				<td><?php echo '';?></td>
			<?php
			echo "</tr>";

		}


	}

	else {
		echo "Kode Transaksi Tidak Ditemukan";
	}

?>