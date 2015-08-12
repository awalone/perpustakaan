<div id="sidebar" class="sidebar responsive">
<script type="text/javascript">
	try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
</script>

<div class="sidebar-shortcuts" id="sidebar-shortcuts">
	<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
		<button class="btn btn-success">
			<i class="ace-icon fa fa-signal"></i>
		</button>

		<button class="btn btn-info">
			<i class="ace-icon fa fa-pencil"></i>
		</button>

		
		
		<a  href="?id=list_user" class="btn btn-warning">
			<i class="ace-icon fa fa-users"></i>
		</a>
						

		<button class="btn btn-danger">
			<i class="ace-icon fa fa-cogs"></i>
		</button>
	</div>

	<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
		<span class="btn btn-success"></span>

		<span class="btn btn-info"></span>

		<span class="btn btn-warning"></span>

		<span class="btn btn-danger"></span>
	</div>
</div><!-- /.sidebar-shortcuts -->

<ul class="nav nav-list">
<li class="active">
	<a href="?id=home">
		<i class="menu-icon fa fa-tachometer"></i>
		<span class="menu-text"> Dashboard </span>
	</a>

	<b class="arrow"></b>
</li>

<li class="">
	<a href="#" class="dropdown-toggle">
		<i class="menu-icon fa fa-desktop"></i>
		<span class="menu-text"> Referensi </span>

		<b class="arrow fa fa-angle-down"></b>
	</a>

	<b class="arrow"></b>

	<ul class="submenu">
		

		<li class="">
			<a href="<?php echo base_url();?>kategoribuku">
				<i class="menu-icon fa fa-caret-right"></i>
				Data Kategori Buku
			</a>

			<b class="arrow"></b>
		</li>	
	</ul>
</li>



<li class="">
	<a href="#" class="dropdown-toggle">
		<i class="menu-icon fa 	fa-users"></i>
		<span class="menu-text"> Perpustakaan </span>

		<b class="arrow fa fa-angle-down"></b>
	</a>
	<b class="arrow"></b>

	<ul class="submenu">
		<li class="">
			<a href="<?php echo site_url();?>/buku">
				<i class="menu-icon fa fa-caret-right"></i>
				Master Buku
			</a>

			<b class="arrow"></b>
		</li>

		<li class="">
			<a href="<?php echo site_url();?>/anggota">
				<i class="menu-icon fa fa-caret-right"></i>
				Master Anggota
			</a>

			<b class="arrow"></b>
		</li>		
	</ul>
</li>


<li class="">
	<a href="#" class="dropdown-toggle">
		<i class="menu-icon fa 	fa-users"></i>
		<span class="menu-text"> Transaksi </span>
		<b class="arrow fa fa-angle-down"></b>
	</a>
	<b class="arrow"></b>

	<ul class="submenu">
		<li class="">
			<a href="<?php echo site_url();?>/peminjaman">
				<i class="menu-icon fa fa-caret-right"></i>
				Peminjaman
			</a>

			<a href="<?php echo site_url();?>/peminjaman/status_buku">
				<i class="menu-icon fa fa-caret-right"></i>
				Status Buku
			</a>

			<b class="arrow"></b>
		</li>

		<li class="">
			<a href="<?php echo site_url();?>/pengembalian">
				<i class="menu-icon fa fa-caret-right"></i>
				Pengembalian
			</a>

			<b class="arrow"></b>
		</li>		
	</ul>
</li>



<li class="">
	<a href="#" class="dropdown-toggle">
		<i class="menu-icon fa 	fa-users"></i>
		<span class="menu-text"> Data Pegawai </span>

		<b class="arrow fa fa-angle-down"></b>
	</a>
	<b class="arrow"></b>

	<ul class="submenu">
		<li class="">
			<a href="<?php echo site_url();?>/pegawai">
				<i class="menu-icon fa fa-caret-right"></i>
				Daftar Pegawai
			</a>

			<b class="arrow"></b>
		</li>

		<li class="">
			<a href="<?php echo site_url();?>/pegawai/add">
				<i class="menu-icon fa fa-caret-right"></i>
				Input Data Pegawai
			</a>

			<b class="arrow"></b>
		</li>
	</ul>
</li>



<li class="">
	<a href="#">
		<i class="menu-icon fa fa-picture-o"></i>
		<span class="menu-text"> Gallery </span>
	</a>

	<b class="arrow"></b>
</li>

<li class="">
	<a href="#" class="dropdown-toggle">
		<i class="menu-icon fa fa-tag"></i>
		<span class="menu-text"> More Pages </span>

		<b class="arrow fa fa-angle-down"></b>
	</a>

	<b class="arrow"></b>

	<ul class="submenu">
		<li class="">
			<a href="#">
				<i class="menu-icon fa fa-caret-right"></i>
				Setting
			</a>
			<b class="arrow"></b>
		</li>

		<li class="">
			<a href="media.php?id=list_user">
				<i class="menu-icon fa fa-caret-right"></i>
				List User
			</a>
			<b class="arrow"></b>
		</li>

		<li class="">
			<a href="#">
				<i class="menu-icon fa fa-caret-right"></i>
				Pengumuman
			</a>
			<b class="arrow"></b>
		</li>

		<li class="">
			<a href="#">
				<i class="menu-icon fa fa-caret-right"></i>
				Backup Restore
			</a>

			<b class="arrow"></b>
		</li>

		<li class="">
			<a href="">
				<i class="menu-icon fa fa-caret-right"></i>
				Export Excel
			</a>

			<b class="arrow"></b>
		</li>

		<li class="">
			<a href="logout.php" id="logout" onclick="return confirm('Apakah Anda yakin?')">
				<i class="menu-icon fa fa-caret-right"></i>
				Logout
			</a>

			<b class="arrow"></b>
		</li>
		
	</ul>
</li>


</ul><!-- /.nav-list -->

<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
	<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
</div>

<script type="text/javascript">
	try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
</script>
</div>