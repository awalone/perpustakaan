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


<div class="row">
<div class="col-xs-12">
<h3 class="header smaller lighter blue" style="float:left;">Data Pegawai</h3>

<button onclick="window.location.href='<?php echo site_url();?>/pegawai/add'" style="margin-top:10px; margin-left:20px;" class="btn btn-success btn-big btn-next">Input Data</button>
<br /><br />
<?php
	if ($jumlah > 0)
	{

		


		$successMessage = $this->session->flashdata('success');
		if ($successMessage != "")
		{
			?>
				<div class="alert alert-info">
					<a class="close" data-dismiss="alert">x</a>
					<strong>1 Data Pegawai Berhasil ditambahkan</strong>.
				</div>
			<?php
		}
		?>
		


		<div class="table-header">
			Semua Daftar Data Pegawai
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


					<th class="center sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="">
						<label class="position-relative">
							<input type="checkbox" class="ace">
							<span class="lbl"></span>
						</label>
					</th>
					<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="NIP: activate to sort column ascending">NIP</th>
					<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="NAMA: activate to sort column ascending">NAMA</th>
					<th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="TELPON: activate to sort column ascending">TELPON</th>
					<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="TANGGAL LAHIR : activate to sort column ascending">
						<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
						TANGGAL LAHIR
					</th>
					<th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="JABATAN: activate to sort column ascending">JABATAN</th><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="AKSI">AKSI</th>
				</tr>
				</thead>

				<tbody role="alert" aria-live="polite" aria-relevant="all">

				<?php
				foreach($query as $row)
				{


					$id = $row->id;
					$nip = $row->nip;
					$nama = $row->nama;
					$tmpt_lahir = $row->tmpt_lahir;
					$tgl_lahir = $row->tgl_lahir;
					$jenis_kelamin = $row->jenis_kelamin;
					$alamat = $row->alamat;
					$tgl_masuk = $row->tgl_masuk;
					$id_bag = $row->id_bag;
					$id_jab = $row->id_jab;
					$level_user = $row->level_user;
					$foto = $row->foto;
					$telp = $row->tlpn;
					$nohp = $row->nohp;
					$npwp = $row->npwp;
					$id_agm = $row->id_agm;
					$kdpndidik = $row->kdpndidik;
					$noktp = $row->noktp;
					$nojamsos = $row->nojamsos;
					$norek = $row->norek;
					$id_bank = $row->id_bank;
					$kdstatusk = $row->kdstatusk;
					$kdstatusp = $row->kdstatusp;

					if ($id %2 == 0)
						$class="odd";
					else
						$class="even";

					?>
					<tr class="<?php echo $class;?>">


					<td class="center">
						<label class="position-relative">
							<input type="checkbox" class="ace">
							<span class="lbl"></span>
						</label>
					</td>

					<td class=" ">
						<a href="#"><?php echo $nip;?></a>
					</td>
					<td class="hidden-480 "><?php echo $nama;?></td>
					<td class="hidden-phone "><?php echo $telp;?></td>
					<td class=" "><?php echo $tmpt_lahir;?>, <?php echo $tgl_lahir;?></td>

					<td class="hidden-480 ">
						<span><?php echo $id_jab;?></span>
					</td>

					<td class=" ">
						<div class="hidden-sm hidden-xs action-buttons">
							<a class="blue" href="#">
								<i class="ace-icon fa fa-search-plus bigger-130"></i>
							</a>

							<a class="green" href="<?php echo site_url();?>/pegawai/update/<?php echo $id;?>">
								<i class="ace-icon fa fa-pencil bigger-130"></i>
							</a>

							<a class="red" href="<?php echo site_url();?>/pegawai/delete/<?php echo $id;?>" onclick="return confirm('Menghapus Data <?php echo $nama;?>')">
								<i class="ace-icon fa fa-trash-o bigger-130"></i>
							</a>
						</div>

						<div class="hidden-md hidden-lg">
							<div class="inline position-relative">
								<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
									<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
								</button>

								<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
									<li>
										<a href="#" class="tooltip-info" data-rel="tooltip" title="" data-original-title="View">
																								<span class="blue">
																									<i class="ace-icon fa fa-search-plus bigger-120"></i>
																								</span>
										</a>
									</li>

									<li>
										<a href="" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit">
																								<span class="green">
																									<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																								</span>
										</a>
									</li>

									<li>
										<a href="#" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
																								<span class="red">
																									<i class="ace-icon fa fa-trash-o bigger-120"></i>
																								</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</td>
				</tr>
					<?php	
				}
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