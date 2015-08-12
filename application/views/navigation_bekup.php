<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
         
          <a class="brand" style="text-align: left; margin-left: -70px;" href="<?php echo base_url();?>">Sistem Pelayanan Perizinan </a>
		  
		  <?php
			#if ($this->session->userdata('login') == "TRUE")
			#{
			
			
		  ?>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="<?php echo base_url();?>"><i class="icon-th-list icon-white"></i> Beranda</a></li>
			  
          <?php 
			if ($this->session->userdata('login') == TRUE)
			{
		
				$query = $this->module_model->get_all();
				foreach($query->result() as $values) {
					$idModule = $values->idModule;
					$namaModule = $values->namaModule;
					$linkModule = $values->linkModule;
					
					//check sub module
					$getSub = $this->submodule_model->get_all_tampil($idModule)->result();
					$jumSub = $this->submodule_model->get_all_data($idModule);
					if ($jumSub > 0)
					{
					
					
					?>
					<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-search icon-white"></i> <?php echo $values->namaModule;?> <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<?php
							foreach($getSub as $rows) {
								?>
								<li><a href="<?php echo base_url();?><?php echo $rows->namaSubmodule;?>"><i class="icon-home"></i> <?php echo $rows->labelSubmodule;?></a></li>
								<?php
							}
						?>
					</ul>
					
					
					  </li> 
					  <?php
					  }
					  
					  else {
							?>
							<li><a href="<?php echo $value->namaLink;?>"><i class="icon-th-list icon-white"></i> <?php echo $values->namaModule;?></a></li>
							<?php
					  }
					  ?>
					<?php
					
				}
			}
				?>
				
				
			     
             
			  
			  
			  
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