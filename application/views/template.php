

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>Dashboard - ASKA Admin</title>

	<meta name="description" content="overview &amp; stats" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<link rel="shortcut icon" href="favicon.ico" />
	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/4.1.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.custom.min.css" />
	
	
	<script src="<?php echo base_url();?>assets/js/jquery-1.8.3.min.js"></script>
	
	<?php

		if (isset($libraryAssets))
		{
			$this->load->view($libraryAssets);
		}


	?>
	<!-- page specific plugin styles -->

	<!-- text fonts -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/fonts.googleapis.com.css" />

	<!-- ace styles -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.min.css" id="main-ace-style" />

	<!--[if lte IE 9]>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-part2.min.css" />
	<![endif]-->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-skins.min.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-rtl.min.css" />

	
	

<style>

	.error_message {
		color: red;
		font-weight: bolder;
	}

		.preload-wrapper {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1000;
    background-color:#000;opacity:0.4;filter:alpha(opacity=40);
}
#preloader_7 {
    display: block;
    position: relative;
    left: 50%;
    top: 50%;
    width: 150px;
    height: 150px;
    margin: -75px 0 0 -75px;
    border-radius: 50%;
    border: 3px solid transparent;
    border-top-color: #3498db;

    -webkit-animation: spin 2s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
    animation: spin 2s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */

    z-index: 1001;
}

    #preloader_7:before {
        content: "";
        position: absolute;
        top: 5px;
        left: 5px;
        right: 5px;
        bottom: 5px;
        border-radius: 50%;
        border: 3px solid transparent;
        border-top-color: #e74c3c;

        -webkit-animation: spin 3s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
        animation: spin 3s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */
    }

    #preloader_7:after {
        content: "";
        position: absolute;
        top: 15px;
        left: 15px;
        right: 15px;
        bottom: 15px;
        border-radius: 50%;
        border: 3px solid transparent;
        border-top-color: #f9c922;

        -webkit-animation: spin 1.5s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
          animation: spin 1.5s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */
    }

    @-webkit-keyframes spin {
        0%   { 
            -webkit-transform: rotate(0deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(0deg);  /* IE 9 */
            transform: rotate(0deg);  /* Firefox 16+, IE 10+, Opera */
        }
        100% {
            -webkit-transform: rotate(360deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(360deg);  /* IE 9 */
            transform: rotate(360deg);  /* Firefox 16+, IE 10+, Opera */
        }
    }
    @keyframes spin {
        0%   { 
            -webkit-transform: rotate(0deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(0deg);  /* IE 9 */
            transform: rotate(0deg);  /* Firefox 16+, IE 10+, Opera */
        }
        100% {
            -webkit-transform: rotate(360deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(360deg);  /* IE 9 */
            transform: rotate(360deg);  /* Firefox 16+, IE 10+, Opera */
        }
    }

	</style>
	<!--[if lte IE 9]>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-ie.min.css" />
	<![endif]-->

	<!-- inline styles related to this page -->

	<!-- ace settings handler -->
	<script src="<?php echo base_url();?>assets/js/ace-extra.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/time.js" type="text/javascript"></script>
	
	<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->
    	<!--[if lte IE 8]>
	<script src="<?php echo base_url();?>assets/js/html5shiv.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body class="skin-3">
<!-- Preloader -->
	<script type="text/javascript">
	
$(window).load(function() { $(".preload-wrapper").fadeOut("slow"); })

	</script>
<div class="preload-wrapper">
    <div id="preloader_7"></div>
 
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
	
</div>
<div id="navbar" class="navbar navbar-default">
<script type="text/javascript">
	try{ace.settings.check('navbar' , 'fixed')}catch(e){}
</script>

<div class="navbar-container" id="navbar-container">
<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler">
	<span class="sr-only">Toggle sidebar</span>

	<span class="icon-bar"></span>

	<span class="icon-bar"></span>

	<span class="icon-bar"></span>
</button>

<div class="navbar-header pull-left">
	<a href="#" class="navbar-brand">
		<small>
			<i class="fa fa-eye"></i>
			ASKA Admin
		</small>
	</a>
</div>

<div class="navbar-buttons navbar-header pull-right" role="navigation">
<ul class="nav ace-nav">
<li class="grey">
	<a data-toggle="dropdown" class="dropdown-toggle" href="#">
		<i class="ace-icon fa fa-tasks"></i>
		<span class="badge badge-grey">4</span>
	</a>

	<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
		<li class="dropdown-header">
			<i class="ace-icon fa fa-check"></i>
			4 Tasks to complete
		</li>

		<li>
			<a href="#">
				<div class="clearfix">
					<span class="pull-left">Software Update</span>
					<span class="pull-right">65%</span>
				</div>

				<div class="progress progress-mini">
					<div style="width:65%" class="progress-bar"></div>
				</div>
			</a>
		</li>

		<li>
			<a href="#">
				<div class="clearfix">
					<span class="pull-left">Hardware Upgrade</span>
					<span class="pull-right">35%</span>
				</div>

				<div class="progress progress-mini">
					<div style="width:35%" class="progress-bar progress-bar-danger"></div>
				</div>
			</a>
		</li>

		<li>
			<a href="#">
				<div class="clearfix">
					<span class="pull-left">Unit Testing</span>
					<span class="pull-right">15%</span>
				</div>

				<div class="progress progress-mini">
					<div style="width:15%" class="progress-bar progress-bar-warning"></div>
				</div>
			</a>
		</li>

		<li>
			<a href="#">
				<div class="clearfix">
					<span class="pull-left">Bug Fixes</span>
					<span class="pull-right">90%</span>
				</div>

				<div class="progress progress-mini progress-striped active">
					<div style="width:90%" class="progress-bar progress-bar-success"></div>
				</div>
			</a>
		</li>

		<li class="dropdown-footer">
			<a href="#">
				See tasks with details
				<i class="ace-icon fa fa-arrow-right"></i>
			</a>
		</li>
	</ul>
</li>

<li class="purple">
	<a data-toggle="dropdown" class="dropdown-toggle" href="#">
		<i class="ace-icon fa fa-bell icon-animated-bell"></i>
		<span class="badge badge-important">8</span>
	</a>

	<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
		<li class="dropdown-header">
			<i class="ace-icon fa fa-exclamation-triangle"></i>
			8 Notifications
		</li>

		<li>
			<a href="?id=list_user">
				<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
												Userid Pegawai Baru
											</span>
					<span class="pull-right badge badge-info">+12</span>
				</div>
			</a>
		</li>

		<li>
			<a href="#">
				<i class="btn btn-xs btn-primary fa fa-user"></i>
				Bob just signed up as an editor ...
			</a>
		</li>

		<li>
			<a href="#">
				<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-xs no-hover btn-success fa fa-shopping-cart"></i>
												Permintaan Cuti
											</span>
					<span class="pull-right badge badge-success">+8</span>
				</div>
			</a>
		</li>

		<li>
			<a href="#">
				<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-xs no-hover btn-info fa fa-twitter"></i>
												Followers
											</span>
					<span class="pull-right badge badge-info">+11</span>
				</div>
			</a>
		</li>

		<li class="dropdown-footer">
			<a href="#">
				See all notifications
				<i class="ace-icon fa fa-arrow-right"></i>
			</a>
		</li>
	</ul>
</li>

<li class="green">
	<a data-toggle="dropdown" class="dropdown-toggle" href="#">
		<i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
		<span class="badge badge-success">2</span>
	</a>

	<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
		<li class="dropdown-header">
			<i class="ace-icon fa fa-envelope-o"></i>
			2 Messages
		</li>

		<li class="dropdown-footer">
			<a href="?id=msg">
				See all messages
				<i class="ace-icon fa fa-arrow-right"></i>
			</a>
		</li>
	</ul>
</li>

<li class="light-blue">
	<a data-toggle="dropdown" href="#" class="dropdown-toggle">
		<img class="nav-user-photo" src="/aska/examples/f0648889.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									andez								</span>

		<i class="ace-icon fa fa-caret-down"></i>
	</a>

	<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
		<li>
			<a href="?id=set">
				<i class="ace-icon fa fa-cog"></i>
				Settings
			</a>
		</li>

		<li>
			<a href="?id=profil">
				<i class="ace-icon fa fa-user"></i>
				Profile
			</a>
		</li>

		<li class="divider"></li>

		<li>
			<a href="<?php echo site_url();?>/login/logout" id="logout" onclick="return confirm('Apakah Anda yakin?')">
				<i class="ace-icon fa fa-power-off"></i>
				Logout
			</a>
		</li>
	</ul>
</li>
</ul>
</div>
</div><!-- /.navbar-container -->
</div>

<div class="main-container" id="main-container">
<script type="text/javascript">
	try{ace.settings.check('main-container' , 'fixed')}catch(e){}
</script>



<?php
	
	$this->load->view('sidebar');

	


	//untuk main view
	?>

	<div class="main-content">
		<?php
			$this->load->view('breadcrumbs');

			$this->load->view($main_view);
		?>


</div><!-- /.main-content -->



	<?php



	$this->load->view('main_footer');
?>



<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
	<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->




<!-- <![endif]-->

<!--[if IE]>
<script src="<?php echo base_url();?>assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

<!--[if IE]>
<script type="text/javascript">
	window.jQuery || document.write("<script src='<?php echo base_url();?>assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
<script type="text/javascript">
	if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url();?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

<script src="<?php echo base_url();?>assets/js/sts.js"></script>
<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
<script src="<?php echo base_url();?>assets/js/excanvas.min.js"></script>
<![endif]-->
<script src="<?php echo base_url();?>assets/js/jquery-ui.custom.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.ui.touch-punch.min.js"></script>


<!-- ace scripts -->
<script src="<?php echo base_url();?>assets/js/ace-elements.min.js"></script>
<script src="<?php echo base_url();?>assets/js/ace.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>





<script type="text/javascript">
	
	jQuery(function($) {


		

		<?php
       if (isset($fungsiJS)) {
       	$this->load->view($fungsiJS);
       }
		?>        		

        $.validator.setDefaults({
            submitHandler: function () {
                statusv();

            }

        });


    });


</script><!-- inline scripts related to this page -->

</body>
</html>
	