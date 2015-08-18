

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta charset="utf-8" />
  <title>Login Page - ASKA (Administrasi Sistem Kepegawaian)</title>
  <link rel="shortcut icon" href="favicon.ico" />
  <meta name="description" content="User login page" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

  <!-- bootstrap & fontawesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/4.1.0/css/font-awesome.min.css" />
  
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/select2.css" />
  <!-- text fonts -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/fonts.googleapis.com.css" />

  <!-- ace styles -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.min.css" />

  <!--[if lte IE 9]>
  <link rel="stylesheet" href="assets/css/ace-part2.min.css" />
  <![endif]-->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-rtl.min.css" />

  <!--[if lte IE 9]>
  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
  <![endif]-->


</head>

<body class="login-layout blur-login" OnLoad="document.login.username.focus();">
<div class="main-container">
<div class="main-content">
<div class="row">
<div class="col-sm-10 col-sm-offset-1">
<div class="login-container">
<div class="center">
 
  <span class="white"><h5>Aplikasi Perpustakaan</h5></span>
</div>

<div class="space-6"></div>
<div id="loading" style="text-align: center"></div>
<div class="position-relative">
  <div id="login-box" class="login-box visible widget-box no-border">
    <div class="widget-body">
      <div class="widget-main">
        <h4 class="header blue lighter bigger">
          <i class="ace-icon fa fa-coffee green"></i>
          Please Enter Your Information
        </h4>

        <div class="space-6"></div>

        <form name="form" id="loginF" method="post" action="<?php echo $action;?>" class="form-horizontal">
          <fieldset>
          
          
            <div class="form-group">
            <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <input type="text"  name="username" id="username" value="" class="form-control"  placeholder="Username" />
                              <i class="ace-icon fa fa-user"></i>
                            </span>
            </label>
            </div>
            
            <div class="form-group">
            <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <input type="password" name="password"  value="" id="passlogin" class="form-control" placeholder="Password" />
                              <i class="ace-icon fa fa-lock"></i>
                            </span>
            </label>
            </div>
            
            <div class="space"></div>

            <div class="clearfix">
             

              <div class="form-group">            
              <button class="width-35 pull-right btn btn-sm btn-primary">
                <i class="ace-icon fa fa-key"></i>
                <span class="bigger-110">Login</span>
              </button>
              <div>
            </div>

            <div class="space-4"></div>
          </fieldset>
        </form>
       
     
      </div><!-- /.widget-main -->

      <div class="toolbar clearfix">
      

      </div>
    </div><!-- /.widget-body -->
  </div><!-- /.login-box -->

  




<div class="navbar-fixed-top align-right">
  <br />
  &nbsp;
  <a id="btn-login-dark" href="#">Dark</a>
  &nbsp;
  <span class="blue">/</span>
  &nbsp;
  <a id="btn-login-blur" href="#">Blur</a>
  &nbsp;
  <span class="blue">/</span>
  &nbsp;
  <a id="btn-login-light" href="#">Light</a>
  &nbsp; &nbsp; &nbsp;
</div>
</div>
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.main-content -->
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="<?php echo base_url();?>assets/js/jquery.2.1.1.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
<!--[if IE]>
<script src="assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

<!--[if IE]>
<script type="text/javascript">
  window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

</body>
</html>
