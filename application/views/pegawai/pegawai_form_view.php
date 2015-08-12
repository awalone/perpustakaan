
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
	<h4 class="widget-title lighter">Data Pegawai</h4>
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
									<label class="col-sm-3 control-label no-padding-right" for="nip">NIP :</label>

									<div class="col-sm-9">
										
										<input type="text" name="nip" id="nip" class="col-xs-10 col-sm-5"  data-rel="tooltip" title="" placeholder="NIP" value="<?php echo set_value('nip', isset($default['nip']) ? $default['nip'] : ''); ?>" data-original-title="NIP BARU">

										 <?php echo form_error('nip', '<p error_message="field_error"><br /><br />', '</p>'); ?>
										
									</div>
									
								</div>
						

							
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="nama">Nama Lengkap:</label> 

									<div class="col-sm-9">
										<input type="text" name="nama" id="nama" class="col-xs-10 col-sm-5" placeholder="Nama lengkap" value="<?php echo set_value('nama', isset($default['nama']) ? $default['nama'] : ''); ?>">
										<!--<p class="error_message"><br /><br />Kolom Nama tidak bisa kosong</p>-->
									</div>
					
								</div>
								
								<div class="form-group">
										
											<label class="col-sm-3 control-label no-padding-right">Jenis Kelamin :</label>

											<div class="col-sm-9">
												
											<label class="blue">
											
											<?php
												if (isset($default['jkel'])) {
													if ($default['jkel'] == "L")
													{
														?>
														<input type="radio" name="jkel" value="L" checked />Laki laki <input type="radio" name="jkel" value="P" />Perempuan
														<?php
													}
													else if ($default['jkel'] == "P")
													{
														?>
														<input type="radio" name="jkel" value="L" />Laki laki <input type="radio" name="jkel" value="P" checked />Perempuan
														<?php
													}
												}
												else {
													?>
														<input type="radio" name="jkel" value="L" />Laki laki <input type="radio" name="jkel" value="P" />Perempuan
													<?php
												}
											?>
											
											</label>
											<!--<p class="error_message">Jenis Kelamin tidak bisa kosong</p>-->
											</div>		

								</div>

								
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="tmpt_lahir">Tempat Tgl Lahir:</label>

									<div class="col-xs-8 col-sm-5">
										
										<div class="input-group col-sm-5">
										<input type="text" id="id-date-picker-1" name="tmptlahir" value="<?php echo set_value('tmptlahir', isset($default['tmptlahir']) ? $default['tmptlahir'] : ''); ?>" placeholder="Tempat Lahir">
										<input class="form-control date-picker " type="text" name="tgl_lahir" id="tgl_lahir" value="<?php echo set_value('tgl_lahir', isset($default['tgl_lahir']) ? $default['tgl_lahir'] : ''); ?>" data-date-format="yyyy-mm-dd">
											<span class="input-group-addon">
											<i class="fa fa-calendar bigger-110"></i>
											</span>
											</div>
										
										<!--<p class="error_message">Tanggal Lahir, Tempat Lahir tidak boleh kosong</p>-->
									
									</div>
								
								</div>
								
								
					<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="alamat">Alamat:</label>
									<div class="col-xs-8 col-sm-9">
								
											<textarea name="alamat" placeholder="Mohon Isi Alamat dengan lengkap..."><?php echo set_value('alamat', isset($default['alamat']) ? $default['alamat'] : ''); ?></textarea>
									<!--<p class="error_message">Alamat tidak boleh kosong</p>	-->
									
					</div>
					</div>
				
				
				
				
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="tlpn">Tlp.Rumah:</label> 

								<div class="col-sm-9">
									<input type="text" name="tlpn" id="tlpn" class="input-mask-phone col-xs-10 col-sm-2" placeholder="(021) 999-9999" value="<?php echo set_value('tlpn', isset($default['tlpn']) ? $default['tlpn'] : ''); ?>"> 	
									<label class="col-sm-3 control-label no-padding-right" for="form-field-mask-2">
									Hp
									<small class="text-warning"></small>
									</label>
									<div>
									<input class="col-xs-10 col-sm-2" value="<?php echo set_value('hp', isset($default['hp']) ? $default['hp'] : ''); ?>" type="text" name="hp" id="hp" placeholder="Isikan No Hp"> 
									</div>
									<!--<p class="error_message"><br /><br />Telp. / HP tidak boleh kosong</p>-->
								</div>
					
				</div>
								
								<div class="form-group ">
									<label class="col-sm-3 control-label no-padding-right" for="noktp">KTP :</label> 

									<div class="col-sm-9">
										<input type="text" name="noktp" id="noktp" class="col-xs-10 col-sm-4" placeholder="Nomer Induk Kepegawaian" value="<?php echo set_value('noktp', isset($default['noktp']) ? $default['noktp'] : ''); ?>">
										<!--<p class="error_message"><br /><br />KTP tidak boleh kosong</p>-->
									</div>

					
								</div>				
								
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="nonpwp">NPWP:</label> 

									<div class="col-sm-9">
										<input type="text" name="nonpwp" id="nonpwp" class="input-mask-npwp  col-xs-10 col-sm-4" placeholder="Nomer Pokok Wajib Pajak" value="<?php echo set_value('nonpwp', isset($default['nonpwp']) ? $default['nonpwp'] : ''); ?>">
										<!--<p class="error_message"><br /><br />NPWP tidak boleh kosong</p>-->
									</div>
									
								</div>	

								
							
								
								
					
						
							<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right">Bagian :</label>
											<div class="col-sm-9">
											
											<?php $value = set_value('selected', isset($selected) ? $selected : '');
                  	    echo form_dropdown('bag',$bag, $value); ?>
                  		 <?php //echo form_error('bag', '<p class="field_error">', '</p>'); ?>  		 	
											</div>
							</div>
						
							<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right">Jabatan :</label>
											<div class="col-sm-7">
											
											<?php $value = set_value('selected', isset($selected1) ? $selected1 : '');
						                  	    echo form_dropdown('jabatan',$jabatan, $value,'class=chosen-select'); ?>
						                  		 <?php //echo form_error('jabatan', '<p class="field_error">', '</p>'); ?>
																	<!--<p class="error_message">Jabatan tidak bisa kosong</p>-->
											</div>

											
			
							</div>
						
							<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right">Bank Transfer :</label>
											<div class="col-sm-9">
											<span>
											<?php $value = set_value('selected', isset($selected2) ? $selected2 : '');
						                  	    echo form_dropdown('id_bank',$bank, $value); ?>
						                  		 <?php //echo form_error('bank', '<p class="field_error">', '</p>'); ?>
											<input type="text" name="norek" value="<?php echo set_value('norek', isset($default['norek']) ? $default['norek'] : ''); ?>" id="norek" placeholder="Nomer Rekening" />
											</span>

											<!--<p class="error_message">Bank tidak bisa kosong</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Nomor Rekening Tidak Bisa Kosong</p>-->
											</div>
											
										
											
							</div>

							
							<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right ">Agama :</label>
											<div class="col-sm-9">
											<?php $value = set_value('selected', isset($selected3) ? $selected3 : '');
						                  	    echo form_dropdown('id_agm',$id_agm, $value); ?>
						                  		 <?php //echo form_error('bank', '<p class="field_error">', '</p>'); ?>
											<!--<p class="error_message">Pilihan Agama tidak bisa kosong</p>-->
											</div>		
											
							</div>
								
							
								
								
								
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="platform">Status Kawin :</label>

										<div class="col-sm-9">
											
											<?php $value = set_value('selected', isset($selected4) ? $selected4 : '');
						                  	    echo form_dropdown('kdstatusk',$kdstatusk, $value); ?>
						                  		 <?php //echo form_error('kdstatusk', '<p class="field_error">', '</p>'); ?>
																	<!--<p class="error_message">Status tidak bisa kosong</p>-->
											</div>
											
								</div>

								
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="platform">Status Pegawai:</label>

										<div class="col-sm-9">
										
											<?php $value = set_value('selected', isset($selected5) ? $selected5 : '');
						                  	    echo form_dropdown('kdstatusp',$kdstatusp, $value); ?>
						                  		 <?php //echo form_error('kdstatusk', '<p class="field_error">', '</p>'); ?>
												<!--<p class="error_message">Status Pegawai tidak bisa kosong</p>-->
											</div>
											
								</div>
								
								
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="platform">Pendidikan:</label>

										<div class="col-sm-9">
											<span class="span12">
											<?php $value = set_value('selected', isset($selected6) ? $selected6 : '');
						                  	    echo form_dropdown('kdpndidik',$kdpndidik, $value); ?>
						                  		 <?php //echo form_error('kdstatusk', '<p class="field_error">', '</p>'); ?>
											</span>
											<!--<p class="error_message">Pendidikan tidak bisa kosong</p>-->
											</div>

								</div>
								
											
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right">Tanggal Masuk:</label>
										
											<div class="col-xs-8 col-sm-3">
												<div class="input-group">
													<input class="form-control date-picker" name="datemasuk" value="<?php echo set_value('tgl_masuk', isset($default['tgl_masuk']) ? $default['tgl_masuk'] : ''); ?>" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd">
																						<span class="input-group-addon">
																							<i class="fa fa-calendar bigger-110"></i>
																						</span>

												</div>

												<!--<p class="error_message">Tanggal Masuk Pegawai tidak bisa kosong</p>-->
											</div>

										
										

								</div>
							
								
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right">Cover:</label>
										
											<div class="col-xs-8 col-sm-3">
												<div class="input-group">
													<img src="<?php echo base_url();?>assets/images/gallery/thumb-2.jpg" width="150px" />
													<input class="form-control" name="userfile" type="file"> 
												</div>

												<!--<p class="error_message">Tanggal Masuk Pegawai tidak bisa kosong</p>-->
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