<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/docs.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/js/google-code-prettify/prettify.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/login.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
   
  
  </head>

  <body data-target=".bs-docs-sidebar" class="bodylogin">

    <!-- Navbar
    ================================================== -->
	<?php
	if ($this->session->userdata('login') == TRUE)
	{
		$this->load->view('navigation');
	}
	?>
<!-- Subhead
================================================== -->

   <div class="headerlogin">
Sistem Informasi Pelayanan Perizinan Kota Makassar
</div>


  <div class="container" style="min-height: 430px; padding-top:20px">

    <!-- Docs nav
    ================================================== -->
      
      <div class="span9">

		<?php
		$this->load->view($main_view);
		?>
      </div>
    </div>

  
</div>
<div class="loginfooter">Copyright &copy; 2013. Kantor Pelayanan Administrasi Perizinan (KPAP) - Pemerintah Kota Makassar</div>

	<?php
		$this->load->view('adding');
	?>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    

  </body>
</html>
