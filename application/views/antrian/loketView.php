
	<h2>Program Antrian</h2>
	<center>
		
	 <?php
	 if($_POST['ulang'] <> '')
					{
						$jp = $_POST['ulang'];	
					}
					else {
						$jp = "";							
					}
					
					//	echo 'hello'.$_POST['ulang'].'aa';
					$loket = $this->session->userdata('loket');
					$kodeLoket = substr($loket,0,1);

					$date = date('Y-m-d');
					
					
					if ($loket == "" || $this->session->userdata('login') == TRUE)
					
					{ 	
						
						echo "<h1>LOKET $loket</h1>";
						
						
						$sqlGroup = mysql_query("select * from tbl_antri where SUBSTR(id_loket,1,1) = '$kodeLoket'
						AND DATE(tgl_antri) = DATE(NOW()) AND reset = '0' order by no_antri desc LIMIT 1") or die(mysql_error()) ;
						
						if(mysql_num_rows($sqlGroup) > 0)
						{	
							
							$data = mysql_fetch_array($sqlGroup);
							$counter_akhir = $data['no_antri'];
							$antrian = $counter_akhir;
						}
						else
						{
							$antrian = "BELUM ADA";
							$counter_akhir = 0;
						}
							
						#echo $loket;
						#echo $counter_akhir;
						if($jp == 'Reset')
						{
							$sqli = mysql_query("UPDATE tbl_antri SET reset = '1' where SUBSTR(id_loket,1,1) = '$kodeLoket'
							AND DATE(tgl_antri) = DATE(NOW()) and reset = '0'") or die(mysql_error()) ;
						}
						else if($jp == 'Panggil Baru')
						{
			  				
							
							$antrian = $counter_akhir + 1;
							#$checkByLoket = mysql_query("select *from tbl_antri where id_loket = '$loket'");
							$sqli = "insert into tbl_antri set id_loket='$loket' ,no_antri='$antrian'";

							mysql_query($sqli)or die(mysql_error());
							
						}
						else if($jp == 'Panggil Ulang')
						{
							$antrian = $_POST['antrian'];
							#echo 'PANGGIL ULANG';
							if($antrian == 'BELUM ADA')
							{
								echo 'Antrian Sebelumnya Belum Ada';
							}
							else
							{
								$sqli = "insert into tbl_antri set tgl_antri=NOW(), no_antri='$antrian', id_loket='$loket'";
								#echo $sqli;
								mysql_query($sqli);	
							}
						}
						?>
	
						<div class="kontainer"><h1>ANTRIAN <?php echo $antrian; ?></h1></div>
						<form action="?loket=<?php echo $loket ?>" method="post" enctype="multipart/form-data">
							<input name="ulang" type="submit" class="btn btn-info btn-large" value="Panggil Baru" />
							<input name="ulang" type="submit" class="btn btn-large" value="Panggil Ulang">
							 <a class="btn btn-large btn-danger" href="<?php echo site_url("loginLoket/logout");  ?>"><i class="icon-ok-circle icon-white"></i> Ganti Loket</a>
							
							<input type="hidden" name="antrian" value="<?php echo $antrian; ?>" />
					</form>
					
					
					</center>
				</div>
<?php
//redirect("/registrasi/add");
}
else {
	redirect('login');
}
	 ?>
		
