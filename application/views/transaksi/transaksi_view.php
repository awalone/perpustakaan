
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

						<form class="form-horizontal" method="POST" action="" role="form">
					
							
		
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="nip">NIP :</label>

									<div class="col-sm-9">
										
										<input type="text" name="nip" id="nip" class="col-xs-10 col-sm-6"  data-rel="tooltip" title="" placeholder="Kode Barang" value="<?php echo set_value('nip', isset($default['nip']) ? $default['nip'] : ''); ?>" data-original-title="NIP BARU">

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
												if (isset($jkel)) {
													if ($jkel == "L")
													{
														?>
														<input type="radio" name="jkel" value="L" checked />Laki laki <input type="radio" name="jkel" value="P" />Perempuan
														<?php
													}
													else if ($jkel == "P")
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
								
											<textarea name="alamat" placeholder="Mohon Isi Alamat dengan lengkap..."><?php echo set_value('alamat', isset($default['alamat']) ? $default['alamat'] : ''); ?>"</textarea>
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
										<input type="text" name="nonpwp" id="nonpwp" class="input-mask-npwp  col-xs-10 col-sm-4" placeholder="Nomer Pokok Wajib Pajak" value="">
										<!--<p class="error_message"><br /><br />NPWP tidak boleh kosong</p>-->
									</div>
									
								</div>	

								
							
								
								
					
						
							<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right">Bagian :</label>
											<div class="col-sm-9">
											
											<select name="bag" value="">
												<option value="">-- Bagian --</option>
													<option value='B001'>BIRO</option><option value='B007'>DIREKTUR UTAMA</option><option value='B003'>HRD</option>											</select>
											<!--<p class="error_message">Bagian tidak bisa kosong</p>-->
											</div>
							</div>
						
							<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right">Jabatan :</label>
											<div class="col-sm-7">
											
											<select name="jab" class="chosen-select" value="">
												<option value="">-- Pilih Jabatan --</option>
													<option value='J006'>asdad</option>
													<option value='J0009'>ASDASD</option>
													<option value='J008'>ASDASD</option>
													<option value='J007'>ASDASDA</option>
													<option value='J005'>IT</option>
													<option value='J005'>IT 1</option>
													<option value='J004'>Kepala IT</option>
													<option value='J002'>Kepala Rekom</option>
													<option value='J003'>Mgr.Rekom</option>
													<option value='J001'>Rekom</option>
													<option value='0009'>tesss</option>											
												</select>
											<!--<p class="error_message">Jabatan tidak bisa kosong</p>-->
											</div>

											
			
							</div>
						
							<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right">Bank Transfer :</label>
											<div class="col-sm-9">
											<span>
											<select name="id_bank" value="">
												<option value="">-- Pilih Bank Transfer --</option>
												<option value='1'>BCA</option>
												<option value='2'>BRI</option>
												<option value='3'>MANDIRI</option>
												<option value='4'>CIMB</option>
												<option value='5'>BNI</option>											
											</select>
											<input type="text" name="norek" value="" id="norek" placeholder="Nomer Rekening" />
											</span>

											<!--<p class="error_message">Bank tidak bisa kosong</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Nomor Rekening Tidak Bisa Kosong</p>-->
											</div>
											
										
											
							</div>

							
							<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right ">Agama :</label>
											<div class="col-sm-9">
											<select name="id_agm" value="" id="id_agm">
												<option value="">-- Pilih Agama --</option>
													<option value='1'>Islam</option>
													<option value='2'>Khatolik</option>
													<option value='3'>Kristen Protestan</option>
													<option value='4'>Hindu</option>
													<option value='5'>Budha</option>											
												</select>		
											<!--<p class="error_message">Pilihan Agama tidak bisa kosong</p>-->
											</div>		
											
							</div>
								
							
								
								
								
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="platform">Status Kawin :</label>

										<div class="col-sm-9">
											
											<select name="kdstatusk"  value="" id="kdstatusk">
												<option value="">-- Status Kawin--</option>
												<option value='1'>Lajang</option>
												<option value='2'>Menikah</option>
												<option value='3'>Duda</option>
												<option value='4'>Janda</option>											
											</select>
											<!--<p class="error_message">Status tidak bisa kosong</p>-->
											</div>
											
								</div>

								
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="platform">Status Pegawai:</label>

										<div class="col-sm-9">
										
											<select name="kdstatusp" class="chzn-select" value="" id="kdstatusp">
												<option value="">-- Status Pegawai --</option>
												<option value='1'>Tetap</option>
												<option value='2'>Kontrak</option>
												<option value='3'>Magang</option>											
											</select>
												<!--<p class="error_message">Status Pegawai tidak bisa kosong</p>-->
											</div>
											
								</div>
								
								
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="platform">Pendidikan:</label>

										<div class="col-sm-9">
											<span class="span12">
											<select name="kdpndidik" class="chzn-select" id="kdpndidik">
												<option value="">-- Pendidikan Terakhir--</option>
													<option value='1'>SD</option>
													<option value='2'>SMP</option>
													<option value='3'>SMA/SMK/MA</option>
													<option value='4'>D3</option>
													<option value='5'>S1</option>
													<option value='6'>S2</option>
													<option value='7'>D1</option>
													<option value='8'>D2</option>
													<option value='9'>S2</option>
													<option value='10'>S3</option>
											</select>
											</span>
											<!--<p class="error_message">Pendidikan tidak bisa kosong</p>-->
											</div>

								</div>
								
											
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right">Tanggal Masuk:</label>
										
											<div class="col-xs-8 col-sm-3">
												<div class="input-group">
													<input class="form-control date-picker" name="datemasuk" value="" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd">
																						<span class="input-group-addon">
																							<i class="fa fa-calendar bigger-110"></i>
																						</span>

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