<div id="sidebar" class="sidebar responsive">
<script type="text/javascript">
	try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
</script>



<ul class="nav nav-list">
<li class="active">
	<a href="<?php echo site_url();?>">
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




</ul><!-- /.nav-list -->

<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
	<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
</div>

<script type="text/javascript">
	try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
</script>
</div>