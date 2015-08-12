
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
	<h4 class="widget-title lighter">Data Buku</h4>
	<small>
	<i class="icon-double-angle-right"></i>
	<span class="label label-info arrowed-in-right arrowed">Mohon isi data dengan langkap</span>
	</small>
	<div class="widget-toolbar">
		
	</div>
</div>
					
					<div class="widget-body">
					<div class="widget-main">
					<div class="row-fluid">
						
							<!--PAGE CONTENT BEGINS-->

						<form class="form-horizontal" method="POST" action="<?php echo $form_action;?>" role="form" enctype='multipart/form-data'>
							<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="kode">Kode Buku :</label>

									<div class="col-sm-9">
										
										<input type="text" name="kode" id="kode" class="col-xs-10 col-sm-5"  data-rel="tooltip" title="" placeholder="Kode Buku" value="<?php echo set_value('kode', isset($default['kode']) ? $default['kode'] : ''); ?>" data-original-title="KODE BUKU">

										 <?php echo form_error('kode', '<p error_message="field_error"><br /><br />', '</p>'); ?>
										
									</div>
									
								</div>
						

							
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="nama">Judul Buku</label> 

									<div class="col-sm-9">
										<input type="text" name="judul" id="judul" class="col-xs-10 col-sm-5" placeholder="Judul Buku" value="<?php echo set_value('judul', isset($default['judul']) ? $default['judul'] : ''); ?>">
										<!--<p class="error_message"><br /><br />Kolom Nama tidak bisa kosong</p>-->
									</div>
					
								</div>
								
								
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="platform">Jenis/Kategori:</label>

										<div class="col-sm-9">
											<span class="span12">
											<?php $value = set_value('selected', isset($selected) ? $selected : '');
						                  	    echo form_dropdown('jenisbuku',$jenisbuku, $value); ?>
						                  		 <?php echo form_error('jenisbuku', '<p class="field_error">', '</p>'); ?>
											</span>
											<!--<p class="error_message">Pendidikan tidak bisa kosong</p>-->
											</div>

								</div>
								
								
								
								
					<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="sinopsis">Sinopsis:</label>
									<div class="col-xs-8 col-sm-9">
								
											<textarea name="sinopsis" placeholder="Sinopsis Buku..." cols="60"><?php echo set_value('sinopsis', isset($default['sinopsis']) ? $default['sinopsis'] : ''); ?></textarea>
									<!--<p class="error_message">sinopsis tidak boleh kosong</p>	-->
									
					</div>
					</div>
				
				
				
				
					
								<div class="form-group ">
									<label class="col-sm-3 control-label no-padding-right" for="pengarang">Pengarang :</label> 
									<div class="col-sm-9">
										<input type="text" name="pengarang" id="pengarang" class="col-xs-10 col-sm-5" placeholder="Pengarang" value="<?php echo set_value('pengarang', isset($default['pengarang']) ? $default['pengarang'] : ''); ?>">
										<!--<p class="error_message"><br /><br />KTP tidak boleh kosong</p>-->
									</div>
								</div>				
								

								<div class="form-group ">
									<label class="col-sm-3 control-label no-padding-right" for="penerbit">Penerbit :</label> 
									<div class="col-sm-9">
										<input type="text" name="penerbit" id="penerbit" class="col-xs-10 col-sm-5" placeholder="Penerbit" value="<?php echo set_value('penerbit', isset($default['penerbit']) ? $default['penerbit'] : ''); ?>">
										<!--<p class="error_message"><br /><br />Penerbit tidak boleh kosong</p>-->
									</div>
								</div>


								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="tahun_terbit">Tahun Terbit:</label> 

									<div class="col-sm-9">
										<input type="text" name="tahun_terbit" id="tahun_terbit" class="col-xs-10 col-sm-5" placeholder="Tahun Terbit" value="<?php echo set_value('tahun_terbit', isset($default['tahun_terbit']) ? $default['tahun_terbit'] : ''); ?>">
										<!--<p class="error_message"><br /><br />NPWP tidak boleh kosong</p>-->
									</div>
									
								</div>	

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="jumlah_eksemplar">Jumlah Eksemplar:</label> 

									<div class="col-sm-9">
										<input type="text" name="jumlah_eksemplar" id="jumlah_eksemplar" class="col-xs-10 col-sm-5" placeholder="Jumlah Eksemplar" value="<?php echo set_value('jumlah_eksemplar', isset($default['jumlah_eksemplar']) ? $default['jumlah_eksemplar'] : ''); ?>">
										<!--<p class="error_message"><br /><br />Jumlah Eksemplar tidak boleh kosong</p>-->
									</div>
									
								</div>
							

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="stok">Stok:</label> 

									<div class="col-sm-9">
										<input type="text" name="stok" id="stok" class="col-xs-10 col-sm-5" placeholder="Stok Buku" value="<?php echo set_value('stok', isset($default['stok']) ? $default['stok'] : ''); ?>">
										<!--<p class="error_message"><br /><br />Stok Buku tidak boleh kosong</p>-->
									</div>
									
								</div>


								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="stok">ISBN:</label> 

									<div class="col-sm-9">
										<input type="text" name="isbn" id="isbn" class="col-xs-10 col-sm-5" placeholder="ISBN" value="<?php echo set_value('isbn', isset($default['isbn']) ? $default['isbn'] : ''); ?>">
										<!--<p class="error_message"><br /><br />ISBN tidak boleh kosong</p>-->
									</div>
									
								</div>


								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="lokasi">Lokasi Rak:</label> 

									<div class="col-sm-9">
										<input type="text" name="lokasi" id="lokasi" class="col-xs-10 col-sm-5" placeholder="Lokasi Rak" value="<?php echo set_value('lokasi', isset($default['lokasi']) ? $default['lokasi'] : ''); ?>">
										<!--<p class="error_message"><br /><br />Lokasi Rak tidak boleh kosong</p>-->
									</div>
									
								</div>

								
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right">Foto:</label>
										
											<div class="col-xs-8 col-sm-3">
												<div class="input-group">
													<input class="form-control" name="userfile" type="file"> 
												</div>

												
											</div>
								</div>


												
								<div class="form-actions">
									
									<input class="btn btn-success btn-big btn-next" type="submit" name="kirim_daftar" value="DAFTAR">
								
									<a href="?id=tambahpeg" class="btn" type="reset">
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