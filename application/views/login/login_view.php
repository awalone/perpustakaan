	<center>
        
        <div class="span6">
        <div class="well">
      <!--  <legend><center>Silahkan Login <br />Untuk Masuk Ke Loket Antrian</center></legend> !-->
        
        <form method="POST" action="<?php echo $action;?>" accept-charset="UTF-8">
        
	    <?php
	    
		$pesan = $this->session->flashdata('pesan');
		echo $pesan == '' ? '' : '<div class="alert alert-error"><a close="close" data-dismis="alert" href="#"> x </a>' . $pesan . '</div>';
	    
	  $registerBerhasil = $this->session->flashdata('message');
	  echo $registerBerhasil == '' ? '' : '<div class="alert alert-success"><a close="close" data-dismis="alert" href="#"></a>' . $registerBerhasil . '</div>';
		if (isset($error))
		{
		    ?>
			
			<div class="alert alert-error">
			    <a class="close" data-dismiss="alert" href="#">x</a>Incorrect Username or Password!
			</div>
		    <?php
		}
	    ?>
	   
	  
	  Username : <input class="span3" placeholder="Username" type="text" name="username" style="height: 40px; width: 330px; font-size: 20px; font-weight: bolder; letter-spacing: 1;"><br />
        Password: <input class="span3" placeholder="Password" type="password" name="password" style="height: 40px; width: 330px; font-size: 20px; font-weight: bolder; letter-spacing: 1;">
         <p>
   <!-- Remember Me :  !-->
    <?php //echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
  </p>
        <button class="btn-info btn-large" type="submit">Login</button>
        <button class="btn-large btn-warning" type="reset">Reset</button>
        
        </form>
        
        <span style="color:#D3E7EE;">&nbsp;</span>
        </div>
   
		</center>