
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
		//$this->load->view('addRunning'); // to add javascript action and css
	?>
	
	
	
  </head>

  <body onLoad="startclock()">
	
    <?php
		
		$this->load->view('navigation');
	?>
	
	
    <div class="container">
	
	
		
	 <?php
		$this->load->view($main_view);
	 ?>
		

      <footer class="well">
        <p>Sistem Informasi Permohonan Perizinan</p>
		<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
      </footer>

    </div> <!-- /container -->

  </body>
</html>
