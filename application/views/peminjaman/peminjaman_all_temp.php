
<div class="page-content">
<div class="page-content-area">


<div class="row">
<div class="col-xs-12">
<!-- PAGE CONTENT BEGINS -->


					<div class="widget-box">
<div class="widget-header widget-header-blue widget-header-flat">
	<h4 class="widget-title lighter">Transaksi Peminjaman</h4>
	<small>
	<i class="icon-double-angle-right"></i>
	<span class="label label-info arrowed-in-right arrowed">Isi Cart Pesanan</span>
	</small>
	<div class="widget-toolbar">
		
	</div>
</div>
					
					<div class="widget-body">
					<div class="widget-main">
					<div class="row-fluid">
						
							<!--PAGE CONTENT BEGINS-->

						<form class="form-horizontal" method="POST" action="<?php echo site_url();?>/peminjaman/cetak_temp" role="form" enctype='multipart/form-data'>
							
								<table class="table" style="size: 50%">
									<tr>
										<th>No</th>
										<th>Kode</th>
										<th>Judul Buku</th>
										<th>Kategori Buku
									</tr>
									<?php 
									$no = 1;
										foreach ($temp as $row) {
											?>
											<tr>
												<td><?php echo $no;?></td>
												<td><?php echo $row->buku_kode;?></td>
												<td><?php echo $row->buku_judul;?></td>
												<td><?php echo $row->jenis_buku_nama;?></td>
											</tr>
											<?php
											$no++;
										}
									?>
								</table>

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right">Tanggal Kembali:</label>
										
											<div class="col-xs-8 col-sm-3">
												<div class="input-group">
													<input class="form-control date-picker" name="tanggalkembali" value="" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd">
																						<span class="input-group-addon">
																							<i class="fa fa-calendar bigger-110"></i>
																						</span>

												</div>

												<!--<p class="error_message">Tanggal Masuk Pegawai tidak bisa kosong</p>-->
											</div>

										
										

								</div>



					
					
							
								<div class="form-actions">
									
									
									<input class="btn btn-success btn-big btn-next" type="submit" name="kirim_daftar" value="DAFTAR">
									<a href="#" class="btn" type="reset">
										<i class="icon-undo bigger-110"></i>
										RESET
									</a>
									
								</div>
				
								</form>
								</div>
								</div>
								</div>





								</div>
								</div>
				
	
<!-- PAGE CONTENT ENDS -->
</div><!-- /.col -->
</div>

