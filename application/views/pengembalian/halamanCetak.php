<?php

	echo "<b>Detail Peminjaman : </b>";

	$query = mysql_query("SELECT 
				a.pinjaman_detail_id,
				b.pinjaman_kode_unik,b.`pinjaman_tanggal_pinjam`, b.`pinjaman_tanggal_kembali`,b.`pinjaman_jaminan`,
				c.`buku_judul`,c.`buku_pengarang`,c.`buku_download`,c.`buku_sinopsis`,c.`buku_lokasi_rak`,
				d.`jenis_buku_nama`,
				e.`anggota_nama`, e.`anggota_foto`,e.`anggota_kode`, e.`anggota_jkel`, e.`anggota_nim`
			FROM 
				perpustakaan_pinjaman_detail a 
				LEFT JOIN perpustakaan_pinjaman b ON a.`pinjaman_detail_id_order` = b.`pinjaman_id_order` 
				LEFT JOIN perpustakaan_buku c ON  a.`pinjaman_detail_buku` = c.`buku_id`
				LEFT JOIN perpustakaan_jenis_buku d ON c.`buku_jenis` = d.`jenis_buku_id`
				LEFT JOIN perpustakaan_anggota e ON b.`pinjaman_konsumen` = e.`anggota_id`



			WHERE a.pinjaman_detail_id_order = $id_orders"
			);

	$kode_unik = "";
	$anggota = "";
	$tanggal_pinjam = "";
	$tanggal_kembali = "";
	echo "<table border='1' width='40%'>";
	while ($r = mysql_fetch_array($query))
	{

		//kalau kode uniknya sudah ada sebelumnya
		if ($kode_unik == "")
		{
			$kode_unik = $r['pinjaman_kode_unik'];
			$anggota = $r['anggota_nama'];
			$no_anggota = $r['anggota_kode'];
			$jkel = $r['anggota_jkel'];
			$anggotaNim = $r['anggota_nim'];
			$tanggal_pinjam = $r['pinjaman_tanggal_pinjam'];
			$tanggal_kembali = $r['pinjaman_tanggal_kembali'];


			echo "<tr><td colspan='4'>Kode Transaksi : ".$kode_unik."</td></tr>";
			echo "<tr><td colspan='4'>Nama Anggota : ".$anggota."</td></tr>";
			echo "<tr><td colspan='4'>No. Anggota : ".$no_anggota."</td></tr>";
			echo "<tr><td colspan='4'>Jenis Kelamin : ".$jkel."</td></tr>";
			echo "<tr><td colspan='4'>NIM : ".$anggotaNim."</td></tr>";
			echo "<tr><td colspan='4'><b>Detail Buku</b></td></tr>";
			echo "<tr><td>Judul</td><td>Kategori</td><td>Pengarang</td><td>Lokasi Buku</td>";
		}

		echo "<tr>";
		?>
			<td><?php echo $r['buku_judul'];?></td>
			<td><?php echo $r['jenis_buku_nama'];?></td>
			<td><?php echo $r['buku_pengarang'];?></td>
			<td><?php echo $r['buku_lokasi_rak'];?></td>
		<?php
		echo "</tr>";


		?>

		<?php
	}

	?>
	<tr>
		<td colspan="4">Tanggal Peminjaman : <?php echo $tanggal_pinjam;?></td>
	</tr>
	<tr>
		<td colspan="4">Tanggal Kembali : <?php echo $tanggal_kembali;?></td>
	</tr>
	<tr>
		<td colspan="4">Harap Kembalikan bukunya dengan melampirkan bukti transaksi ini *)</td>
	</tr>
	<tr>
		<td colspan="4">Tertanda Kepala Sekolah SMU 1 Mamuju</td>
	</tr>
	<?php

	echo "</table>";
?>