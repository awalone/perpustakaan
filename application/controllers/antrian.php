<?php

		class Antrian extends CI_Controller {
			
				function __construct() {
					
							parent::__construct();	
							$this->load->model('Antrian_model','antrian', TRUE);
					
				}	
				
				function index() {
					
					
						redirect('antrian/loket/'.$this->session->userdata('idLoket'));
					
						
						
				}
				
				
				function tampil()
				{
					
					//	if ($this->session->userdata('login') == TRUE)
					//	{
							$this->load->view('antrian/tampilan');
					//	}
				//		else {
				//			redirect('loginLoket');
				//		}
						
				}
				
				
				function cek()
				{
							$group = $this->session->userdata('groupLoket');
							$sql = mysql_query("select * from tbl_antri order by id_antri asc LIMIT 4");
							
								
								$td = 2;
								echo "<div class=\"leaderboard2\">";
								echo "<table width='100%'><tr>";
								$cntr = 0;
								$tambahan = '';
								#$sql = mysql_query("select * from tbl_antri order by id_antri desc LIMIT 4") or die(mysql_error()) ;
								$sql = mysql_query("select * from tbl_antri where DATE(tgl_antri) = DATE(NOW()) and terpanggil = '0' order by tgl_antri asc LIMIT 4 ") or die(mysql_error()) ;
								#echo 'belum';
								if(mysql_num_rows($sql))
								{	
									$data = mysql_fetch_array($sql,1);
									$tcounter = $data['no_antri'];
									$loket = substr($data['id_loket'],1,1);
									$hurufloket = substr($data['id_loket'],0,1);
									$edit = mysql_query("update tbl_antri set terpanggil = '1' where id_antri = ".$data['id_antri']) ;
									#echo "update tbl_antri set terpanggil = '1' where id_antri = ".$data['id_antri'];
									$show_counter = $tcounter;
									$show_loket = $loket;
									$show_hurufloket = $hurufloket;
									while($plus = mysql_fetch_array($sql,1))
									{
										$tambahan .= "<h1>ANTRIAN ".$plus['no_antri']." DI LOKET ".$plus['id_loket']."</h1>";
									}
								}
								else
								{
									$sql = mysql_query("select * from tbl_antri where DATE(tgl_antri) = DATE(NOW()) and terpanggil = '1' Order By tgl_antri desc LIMIT 1") ;
									$show = mysql_fetch_array($sql,1);
									$show_counter = $show['no_antri'];
									$show_loket = substr($show['id_loket'],1,1);
									$show_hurufloket = substr($show['id_loket'],0,1);
									$tcounter = 'no';
									$loket = 'no';
									$hurufloket = 'no';
								}	

									$sql = mysql_query("SELECT a.id_loket AS idLoket , MAX(a.tgl_antri) AS maxTime, MAX(a.id_antri) AS maxId, 
( SELECT `no_antri` FROM tbl_antri WHERE id_antri = MAX(a.id_antri) LIMIT 1)
AS noAntri
FROM tbl_antri AS a
LEFT JOIN tbl_loket AS l ON a.`id_loket` = l.`id_loket`
WHERE DATE(a.tgl_antri) = DATE(NOW()) AND a.terpanggil = '1' 
GROUP BY l.id_loket 
ORDER BY maxId DESC LIMIT 1,5 
") ;
									while($show = mysql_fetch_array($sql,1))
									{ //$show = mysql_fetch_array($sql,1);
									$show_counter_t[] = $show['noAntri'];
									$show_loket_t[] = substr($show['idLoket'],1,1);
									$show_hurufloket_t[] = substr($show['idLoket'],0,1);
									}
									if(isset($show_counter_t[0]))
										{ $show_c[0] = $show_counter_t[0]; $show_l[0] = $show_loket_t[0]; $show_h[0] = $show_hurufloket_t[0]; }
										else
										{ $show_c[0] = ''; $show_l[0] = ''; $show_h[0] = '';}
									if(isset($show_counter_t[1]))
										{ $show_c[1] = $show_counter_t[1]; $show_l[1] = $show_loket_t[1]; $show_h[1] = $show_hurufloket_t[1]; }
										else 
										{ $show_c[1] = ''; $show_l[1] = ''; $show_h[1] = '';}
									if(isset($show_counter_t[2]))
										{ $show_c[2] = $show_counter_t[2]; $show_l[2] = $show_loket_t[2]; $show_h[2] = $show_hurufloket_t[2]; }
										else 
										{ $show_c[2] = ''; $show_l[2] = ''; $show_h[2] = '';}
									if(isset($show_counter_t[3]))
										{ $show_c[3] = $show_counter_t[3]; $show_l[3] = $show_loket_t[3]; $show_h[3] = $show_hurufloket_t[3]; }
										else 
										{ $show_c[3] = ''; $show_l[3] = ''; $show_h[3] = '';}
							
								$h = array("Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
								$b = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
								$hari= date('w');
								$tanggal= date('d');
								$bulan = date('n');
								$tahun = date('Y');
								$jam= date('h:i:s');
								
								
								echo "<td style=\"border: 3px solid #eee; background-color: rgb(237, 250, 225);\" width=\"50%\" rowspan=\"3\">
									<h1 style=\"line-height: 1.0;font-size: 50px; font-family: 'Telex',Tahoma,sans-serif;\">
											<center>Nomor Antrian<br /><span style=\"font-size: 170px;\">
								$show_hurufloket $show_counter </span></center></h1>
								<h1 style=\"line-height: 1.0;font-size: 50px; font-family: 'Telex',Tahoma,sans-serif; color:#000\">
											<center>Loket<br /><span style=\"font-size: 170px;\">
								$show_loket </span></center></h1>
								
								</td>
								<td colspan=\"2\" style=\"font-size: 30px; text-align: center; background-color: cadetblue; color: whitesmoke;padding: 25px 0 25px 0px; \">
									 ".$h[$hari].", ".$tanggal." ".$b[$bulan]." ".$tahun.". Pukul - ".$jam."
								</td>
								</tr>
								<tr>
								<td style=\"border: 3px solid #eee; background: #F6F8C3; \" width=\"25%\">
									<h1 style=\"line-height: 1.0;font-size: 30px; font-family: 'Telex',Tahoma,sans-serif;\">
									<center>Nomor Antrian<br /><span style=\"font-size: 50px;\">
									".$show_h[0]." ".$show_c[0]." </span></center></h1>
									<h1 style=\"line-height: 1.0;font-size: 30px; font-family: 'Telex',Tahoma,sans-serif; color:#000\">
									<center>Loket<br /><span style=\"font-size: 50px;\">
									".$show_l[0]." </span></center></h1>
								</td>
								<td style=\"border: 3px solid #eee; background: #F6F8C3; \" width=\"25%\">
									<h1 style=\"line-height: 1.0;font-size: 30px; font-family: 'Telex',Tahoma,sans-serif;\">
									<center>Nomor Antrian<br /><span style=\"font-size: 50px;\">
									".$show_h[1]." ".$show_c[1]." </span></center></h1>
									<h1 style=\"line-height: 1.0;font-size: 30px; font-family: 'Telex',Tahoma,sans-serif; color:#000\">
									<center>Loket<br /><span style=\"font-size: 50px;\">
									".$show_l[1]." </span></center></h1>
								
								</td>
								</tr>
								<tr>
								<td style=\"border: 3px solid #eee; background: #F6F8C3; \" width=\"25%\">
									<h1 style=\"line-height: 1.0;font-size: 30px; font-family: 'Telex',Tahoma,sans-serif;\">
									<center>Nomor Antrian<br /><span style=\"font-size: 50px;\">
									".$show_h[2]." ".$show_c[2]." </span></center></h1>
									<h1 style=\"line-height: 1.0;font-size: 30px; font-family: 'Telex',Tahoma,sans-serif; color:#000\">
									<center>Loket<br /><span style=\"font-size: 50px;\">
									".$show_l[2]." </span></center></h1>
								</td>
								<td style=\"border: 3px solid #eee; background: #F6F8C3; \" width=\"25%\">
									<h1 style=\"line-height: 1.0;font-size: 30px; font-family: 'Telex',Tahoma,sans-serif;\">
									<center>Nomor Antrian<br /><span style=\"font-size: 50px;\">
									".$show_h[3]." ".$show_c[3]." </span></center></h1>
									<h1 style=\"line-height: 1.0;font-size: 30px; font-family: 'Telex',Tahoma,sans-serif; color:#000\">
									<center>Loket<br /><span style=\"font-size: 50px;\">
									".$show_l[3]." </span></center></h1>
								</td>
								";
								echo "</tr></table></div>";
								echo "<br /><br />";
									
								#echo $show_counter;
							
							
						echo "<div id=\"counter\" style=\"visibility:hidden\">".$tcounter."</div>";
							echo "<div id=\"hurufloket\" style=\"visibility:hidden\">".$hurufloket."</div>";
							echo "<div id=\"loket\" style=\"visibility:hidden\">".$loket."</div>";
							echo "<div id=\"temp\" style=\"visibility:hidden\">".((isset($ttemp)) ? $ttemp : '')."</div>";
							?>
							<audio id="suarabelhuruf" src="<?php echo base_url();?>assets/rekaman/<?php echo $hurufloket; ?>.wav"></audio>
							<audio id="suarabelloket1" src="<?php echo base_url();?>assets/rekaman/<?php echo $loket; ?>.wav"></audio> 
						<?php
						$panjang=strlen($tcounter);
						$antrian=$tcounter;
						#echo $panjang;
						for($i=0;$i<$panjang;$i++){
						?>
							<audio id="suarabel<?php echo $i; ?>" src="<?php echo base_url();?>assets/rekaman/<?php echo substr($tcounter,$i,1); ?>.wav" ></audio>   		        
					<?php
						}
					
					
							
				}
				
				
				
				function loket()
				{
						if ($this->session->userdata('login') == TRUE)
						{
							$data['main_view'] = 'antrian/loketView';
							$data['title'] = "Antrian";
							$this->load->view('template', $data);
							redirect("/registrasi/add");
						}
						else {
							redirect('loginLoket');
						}
					
					
					

					
				}
			
		}

?>