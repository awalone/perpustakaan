<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
         
          <a class="brand" style="text-align: left;" href="<?php echo base_url();?>">Sistem Pelayanan Perizinan </a>
		  
		  <?php
			#if ($this->session->userdata('login') == "TRUE")
			#{
			
			
		  ?>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="<?php echo base_url();?>"><i class="icon-th-list icon-white"></i> Beranda</a></li>
			  
          <?php 
				
		  ?>
         <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-search icon-white"></i> Manajemen <b class="caret"></b></a>
				<ul class="dropdown-menu">
			  	<li><a href="<?php echo base_url();?>manajemen"><i class="icon-time"></i> Manajemen Waktu</a></li>
					<li><a href="<?php echo base_url();?>module"><i class="icon-glass"></i> Manajemen Module</a></li>
					<li><a href="<?php echo base_url();?>manajemenGroup"><i class="icon-glass"></i> Manajemen Group</a></li>
					<li><a href="<?php echo base_url();?>manajemenUser"><i class="icon-user"></i> Manajemen User </a></li>
					<li><a href="<?php echo base_url();?>manajemenLevelUser"><i class="icon-user"></i> Manajemen Level User </a></li>
				</ul>
				
			  </li>      
              
              <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-star icon-white"></i> Referensi <b class="caret"></b></a>
				<ul class="dropdown-menu">
			  	<li><a href="<?php echo base_url();?>kecamatan"><i class="icon-circle-arrow-down"></i> Referensi Kecamatan</a></li>
					
					
				</ul>
				
			  </li> 
			  <?php
			  
			  ?>
			  <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-envelope icon-white"></i> Perizinan <b class="caret"></b></a>
				<ul class="dropdown-menu">
			  	<li><a href="<?php echo base_url();?>izinBangunan"><i class="icon-home"></i> Izin Mendirikan Bangunan</a></li>
			  	<li><a href="<?php echo base_url();?>izinReklame"><i class="icon-circle-arrow-down"></i> Izin Pemasangan Reklame</a></li>
					<li><a href="<?php echo base_url();?>izinGangguan"><i class="icon-circle-arrow-down"></i> Izin Gangguan</a></li>
					<li><a href="<?php echo base_url();?>izinKepariwisataan"><i class="icon-circle-arrow-down"></i> Izin Usaha Kepariwisataan</a></li>
					<li><a href="<?php echo base_url();?>izinPerdagangan"><i class="icon-circle-arrow-down"></i> Izin Usaha Perdagangan</a></li>
					<li><a href="<?php echo base_url();?>izinIndustri"><i class="icon-circle-arrow-down"></i> Izin Usaha Industri</a></li>
					<li><a href="<?php echo base_url();?>tandaDaftarIndustri"><i class="icon-circle-arrow-down"></i> Tanda Daftar Industri</a></li>
					<li><a href="<?php echo base_url();?>izinLembaga"><i class="icon-circle-arrow-down"></i> Izin Penyelenggaraan Lembaga Latihan Swasta</a></li>
					<li><a href="<?php echo base_url();?>izinInfokom"><i class="icon-circle-arrow-down"></i> Izin Usaha Infokom</a></li>
					<li><a href="<?php echo base_url();?>tandaDaftarPerusahaan"><i class="icon-circle-arrow-down"></i> Tanda Daftar Perusahaan</a></li>
					
					
					
					
				</ul>
				
			  </li> 
			  
			  
			  <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-envelope icon-white"></i> Antrian <b class="caret"></b></a>
				<ul class="dropdown-menu">
			  	<li><a href="<?php echo base_url();?>antrian/tampil"><i class="icon-home"></i> Antrian</a></li>
			  	<li><a href="<?php echo base_url();?>antrian"><i class="icon-circle-arrow-down"></i> Loket</a></li>
					
					
				</ul>
				
			  </li> 
			  
			  
            </ul>
			
			<ul class="nav pull-right">
			
				<li><a href="#"><b><span id="date"></span>, <span id="clocks"></span></span></b></a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-comment icon-white"></i> Profile <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="#"><i class="icon-leaf"></i> Login</a></li>
						<li><a href="#"><i class="icon-leaf"></i> Registrasi</a></li>
						<li><a href="<?php echo base_url();?>login/logout"><i class="icon-leaf"></i> Logout</a></li>
						<li><a href="#"><i class="icon-leaf"></i> Change Profile</a></li>
					</ul>
				</li>
			</ul>
			</div><!--/.nav-collapse -->
			
			<?php
			#}
			?>
        </div>
      </div>
    </div>