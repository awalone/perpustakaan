
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sistem Informasi Perizinan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="root" >
	<?php
		$this->load->view('adding'); //to add css and javascript source
		$this->load->view('addRunning'); // to add javascript action and css
	?>
	
	
	
  </head>

  <body onLoad="startclock()">
	
    <?php
		
		$this->load->view('navigation');
	?>
	
    <div class="container">
	
		<ul class="thumbnails">
	
	
	
	<li class="span4">
	
		<div class="thumbnail">
		<div class="module bg-content1">
			<div class="modcontent">
				<div class="modcontent-inner clearfix">
					<div style="text-align: center;width: 330px; margin: 1em 0.8em; float: left;">
						<img src="<?php echo base_url();?>assets/img/vector.jpg">
					</div>
					<p>
					<center><h4>Aplikasi Antrian</h4>
						<a href="<?php echo site_url("antrian"); ?>" title="untuk login , lihat table tbl_loket">Antrian</a> | <a href="#">Loket</a>
					</center>
					</p>
				</div>
			</div>
			</div>
		</div>
	
	</li>
	
	<li class="span4">
	
		<div class="thumbnail">
		<div class="module bg-content1">
			<div class="modcontent">
				<div class="modcontent-inner clearfix">
					<div style="text-align: center;width: 330px; margin: 1em 0.8em; float: left;">
						<img src="<?php echo base_url();?>assets/img/vector.jpg">
					</div>
					<p>
					<center><h4>Aplikasi Sistem Informasi Perizinan</h4>
						<a href="#">Administrasi</a>
					</center>
					</p>
				</div>
			</div>
			</div>
		</div>
	
	</li>
	
	<li class="span4">
	
		<div class="thumbnail">
		<div class="module bg-content1">
			<div class="modcontent">
				<div class="modcontent-inner clearfix">
					<div style="text-align: center;width: 330px; margin: 1em 0.8em; float: left;">
						<img src="<?php echo base_url();?>assets/img/vector.jpg">
					</div>
					<p>
					<center><h4>Aplikasi Sistem Informasi Perizinan</h4>
						<a href="#">Administrasi</a>
					</center>
					</p>
				</div>
			</div>
			</div>
		</div>
	
	</li>
	
<li class="span4">
	
		<div class="thumbnail">
		<div class="module bg-content1">
			<div class="modcontent">
				<div class="modcontent-inner clearfix">
					<div style="text-align: center;width: 330px; margin: 1em 0.8em; float: left;">
						<img src="<?php echo base_url();?>assets/img/vector.jpg">
					</div>
					<p>
					<center><h4>Aplikasi Antrian</h4>
						<a href="#" title="untuk login , lihat table tbl_loket">Antrian</a> | <a href="#">Loket</a>
					</center>
					</p>
				</div>
			</div>
			</div>
		</div>
	
	</li>
	
	<li class="span4">
	
		<div class="thumbnail">
		<div class="module bg-content1">
			<div class="modcontent">
				<div class="modcontent-inner clearfix">
					<div style="text-align: center;width: 330px; margin: 1em 0.8em; float: left;">
						<img src="<?php echo base_url();?>assets/img/vector.jpg">
					</div>
					<p>
					<center><h4>Aplikasi Sistem Informasi Perizinan</h4>
						<a href="#">Administrasi</a>
					</center>
					</p>
				</div>
			</div>
			</div>
		</div>
	
	</li>
	
	<li class="span4">
	
		<div class="thumbnail">
		<div class="module bg-content1">
			<div class="modcontent">
				<div class="modcontent-inner clearfix">
					<div style="text-align: center;width: 330px; margin: 1em 0.8em; float: left;">
						<img src="<?php echo base_url();?>assets/img/vector.jpg">
					</div>
					<p>
					<center><h4>Aplikasi Sistem Informasi Perizinan</h4>
						<a href="#">Administrasi</a>
					</center>
					</p>
				</div>
			</div>
			</div>
		</div>
	
	</li>
		
	
	
</ul>
	
		

      <footer class="well">
        <p>Sistem Informasi Permohonan Perizinan</p>
      </footer>

    </div> <!-- /container -->

  </body>
</html>
