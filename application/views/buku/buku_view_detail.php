
<div class="page-content">
<div class="ace-settings-container" id="ace-settings-container">
	<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
		<i class="ace-icon fa fa-cog bigger-150"></i>
	</div>

	<div class="ace-settings-box clearfix" id="ace-settings-box">
		<div class="pull-left width-50">
			<div class="ace-settings-item">
				<div class="pull-left">
					<select id="skin-colorpicker" class="hide">
						<option data-skin="no-skin" value="#438EB9">#438EB9</option>
						<option data-skin="skin-1" value="#222A2D">#222A2D</option>
						<option data-skin="skin-2" value="#C6487E">#C6487E</option>
						<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
					</select><div class="dropdown dropdown-colorpicker">		<a data-toggle="dropdown" class="dropdown-toggle" data-position="auto" href="#"><span class="btn-colorpicker" style="background-color:#438EB9"></span></a><ul class="dropdown-menu dropdown-caret"><li><a class="colorpick-btn selected" href="#" style="background-color:#438EB9;" data-color="#438EB9"></a></li><li><a class="colorpick-btn" href="#" style="background-color:#222A2D;" data-color="#222A2D"></a></li><li><a class="colorpick-btn" href="#" style="background-color:#C6487E;" data-color="#C6487E"></a></li><li><a class="colorpick-btn" href="#" style="background-color:#D0D0D0;" data-color="#D0D0D0"></a></li></ul></div>
				</div>
				<span>&nbsp; Choose Skin</span>
			</div>

			<div class="ace-settings-item">
				<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar">
				<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
			</div>

			<div class="ace-settings-item">
				<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar">
				<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
			</div>

			<div class="ace-settings-item">
				<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs">
				<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
			</div>

			<div class="ace-settings-item">
				<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl">
				<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
			</div>

			<div class="ace-settings-item">
				<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container">
				<label class="lbl" for="ace-settings-add-container">
					Inside
					<b>.container</b>
				</label>
			</div>
		</div><!-- /.pull-left -->

		<div class="pull-left width-50">
			<div class="ace-settings-item">
				<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover">
				<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
			</div>

			<div class="ace-settings-item">
				<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact">
				<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
			</div>

			<div class="ace-settings-item">
				<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight">
				<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
			</div>
		</div><!-- /.pull-left -->
	</div><!-- /.ace-settings-box -->
</div><!-- /.ace-settings-container -->

<div class="page-content-area">


<div class="row">
<div class="col-xs-12">
<!-- PAGE CONTENT BEGINS -->


					<div class="widget-box">
<div class="widget-header widget-header-blue widget-header-flat">
	<h4 class="widget-title lighter">Data Detail Buku : <strong><?php echo $judul;?></strong></h4>
	<small>
	<i class="icon-double-angle-right"></i>
	
	</small>
	<div class="widget-toolbar">
		
	</div>
</div>
					
					<div class="widget-body">
					<div class="widget-main">
					<div class="row-fluid">
						
							<!--PAGE CONTENT BEGINS-->
							<table width="80%" class="table">
								<tr>
									<td width="15%">Kode Buku</td>
									<td width="2%"> : </td>
									<td><strong><?php echo $kode;?></strong></td>
								</tr>
								<tr>
									<td>Judul Buku</td>
									<td> : </td>
									<td><strong><?php echo $judul;?></strong></td>
								</tr>
								<tr>
									<td>Jenis/Kategori</td>
									<td> : </td>
									<td><strong><?php echo $jenisbuku;?></strong></td>
								</tr>
								<tr>
									<td>Sinopsis</td>
									<td> : </td>
									<td><strong><?php echo $sinopsis;?></strong></td>
								</tr>
								<tr>
									<td>Pengarang</td>
									<td> : </td>
									<td><strong><?php echo $pengarang;?></strong></td>
								</tr>
								<tr>
									<td>Penerbit</td>
									<td> : </td>
									<td><strong><?php echo $penerbit;?></strong></td>
								</tr>
								<tr>
									<td>Tahun Terbit</td>
									<td> : </td>
									<td><strong><?php echo $tahun_terbit;?></strong></td>
								</tr>
								<tr>
									<td>Jumlah Eksemplar</td>
									<td> : </td>
									<td><strong><?php echo $jumlah_eksemplar;?></strong></td>
								</tr>
								<tr>
									<td>Stok</td>
									<td> : </td>
									<td><strong><?php echo $stok;?></strong></td>
								</tr>
								<tr>
									<td>ISBN</td>
									<td> : </td>
									<td><strong><?php echo $isbn;?></strong></td>
								</tr>
								<tr>
									<td>Lokasi/Rak</td>
									<td> : </td>
									<td><strong><?php echo $lokasi;?></strong></td>
								</tr>
								<tr>
									<td>File Gambar</td>
									<td> : </td>
									<td><img src="<?php echo base_url();?>berkas/buku/thumb_<?php echo $foto;?> " width="200px" style="border:2px solid #555;"/></td>
								</tr>

								<tr>
									<td colspan="2">&nbsp;</td>
									<td><a href="<?php echo site_url();?>/buku/" class="btn" type="reset">
										<i class="icon-undo bigger-110"></i>
										Back
									</a></td>
								</tr>

								
							</table>
						
							
								</div>
								</div>
								</div>
								</div>
								</div>
				
	
<!-- PAGE CONTENT ENDS -->
</div><!-- /.col -->
</div>