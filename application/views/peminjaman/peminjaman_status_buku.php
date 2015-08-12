<div class="page-content">


<div class="page-content-area">


<div class="row">
<div class="col-xs-12">
<!-- PAGE CONTENT BEGINS -->


<div class="row">
<div class="col-xs-12">
<h3 class="header smaller lighter blue" style="float:left;">Data Jenis Buku</h3>

<button onclick="window.location.href='<?php echo site_url();?>/kategoribuku/add'" style="margin-top:10px; margin-left:20px;" class="btn btn-success btn-big btn-next">Input Data</button>
<br /><br />
<?php
	if ($jumlah > 0)
	{


		
		?>

		<div class="table-header">
			Semua Daftar Transaksi Buku
		</div>



		<!-- <div class="table-responsive"> -->

		<!-- <div class="dataTables_borderWrap"> -->
		<div>
		<div id="sample-table-2_wrapper" class="dataTables_wrapper form-inline" role="grid">

			<?php

			?>
			

			<table id="sample-table-2" class="table table-striped table-bordered table-hover dataTable" aria-describedby="sample-table-2_info">
				<thead>

				<tr role="row">


					<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Jenis: activate to sort column ascending">Kode Anggota</th>
					<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Keterangan: activate to sort column ascending">Nama Anggota</th>
					<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Keterangan: activate to sort column ascending">Judul Buku</th>
					<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Keterangan: activate to sort column ascending">Tanggal Pinjam</th>
					<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Keterangan: activate to sort column ascending">Tanggal Kembali</th>
					<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Keterangan: activate to sort column ascending">Status Pinjam</th>
					
				</tr>
				</thead>

				<tbody role="alert" aria-live="polite" aria-relevant="all">

				<?php
				$no = 1;
				foreach($query as $row)
				{


					$id_detail = $row->pinjaman_detail_id;
					$status_buku = $row->status_buku;
					$kode_unik = $row->pinjaman_kode_unik;
					$tanggal_pinjam = $row->pinjaman_tanggal_pinjam;
					$tanggal_kembali= $row->pinjaman_tanggal_kembali;
					$buku_judul		= $row->buku_judul;
					$buku_pengarang = $row->buku_pengarang;
					$buku_download	= $row->buku_download;
					$buku_lokasi	= $row->buku_lokasi_rak;
					$jenis_buku		= $row->jenis_buku_nama;
					$nama_anggota	= $row->anggota_nama;
					$kode_anggota	= $row->anggota_kode;
					$nim_anggota	= $row->anggota_nim;


					if ($no %2 == 0)
						$class="odd";
					else
						$class="even";

					?>
					<tr class="<?php echo $class;?>">


					
					<td class=""><a href="#"><?php echo $kode_anggota;?></a></td>
					<td class=""><?php echo $nama_anggota;?></td>
					<td class=""><?php echo $buku_judul;?></td>
					<td class=""><?php echo $tanggal_pinjam;?></td>
					<td class=""><?php echo $tanggal_kembali;?></td>
					<td class=""><?php echo $status_buku;?></td>
					
				</tr>
					<?php	
				}
				$no++;
				?>

				
						
				
			</tbody>
		</table>

		
		</div>
		</div>



		<?php

	}
?>




</div>

	
<!-- PAGE CONTENT ENDS -->
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.page-content-area -->
</div><!-- /.page-content -->
</div>