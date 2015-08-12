<?php $tgl = array('','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember'); 
$m = explode("/",$main_view);
?>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div style="padding:5px 20px 5px 20px; height:80px; text-align:center; display:table; margin:0 auto;vertical-align:middle">
            <span style="padding-right:20px; float:left">
            <img src="<?php echo base_url();?>assets/img/Makassar.png" width="70px"></span>
            <div style=" height:80px; display:table-cell; vertical-align:middle">
                <span class="textheader">
                SISTEM INFORMASI PELAYANAN PERIZINAN (SIPP)</span>	
                <br />
                <span class="aplikasion"><?php echo $this->session->userdata('nm_loket'); ?></span>
            </div>
        </div>
        <div style="padding:2px 2px 2px 2px; margin-bottom:2px; background-color:#CCCCCC; font-size:15px; font-weight:bold ">
			<div style="background:#009999; border-radius: 4px 4px 4px 4px; padding:0px 8px 0px 8px; ">	
			<?php 
            echo "<span  style=\"float:left; padding:0 0 0 30px; color:white; text-shadow: 0 1px 1px rgba(0, 0, 0, 0.75);\">";
            echo "Tanggal : ".date("d")." ".$tgl[date("n")]." ".date("Y")." "; 
                        echo " | Loket : ".$this->session->userdata('loket');
            echo "</span> ";				
            echo "<span  style=\"padding-left:50px; color:red; \">";
           // echo "<i> ~ Aplikasi Registrasi Permohonan Izin</i>";
            echo "</span>";				
            echo "<span style=\"float:right; padding:0 30px 0 0px; color:white; text-shadow: 0 1px 1px rgba(0, 0, 0, 0.75);\">";
                        echo " Pengguna : ".$this->session->userdata('namaLengkap')." | <a href=".base_url()."index.php/manajemenLogin/change_password/>Ganti Password</a> | <a href=".base_url()."index.php/login/logout/>Keluar</a>";
            echo "</span>";				
                     ?>
            </div>
         </div>
		 <?php
		
		 ?>
      </div>
        <div class="container">  
          <div class="nav-collapse collapse">
            <ul class="nav">
              <!--<li><a class="btn btn-primary btn-lg" href="<?php echo base_url();?>"><i class="icon-home icon-white"></i> Beranda</a></li>!-->
			  <?php
			  if ($this->session->userdata('login') == TRUE) {
			  	$is_menuatas = FALSE;
			  	$modul = mysql_query("select id_akses AS id,nama_module AS nama, link_module AS link  from tbl_aksesmodule AS a
										left join tbl_module AS m ON m.id_module = a.id_module
										where id_login = '".$this->session->userdata('idLogin')."'
									AND menu_posisi = 'atas' AND menu_aktif = '1' AND ISNULL(akses_parent) 
									order by urutan Asc");
				
				while($data = mysql_fetch_array($modul,1))
				{	
					$is_menuatas = TRUE;
					$subquery = mysql_query("select nama_module AS nama, link_module AS link from tbl_aksesmodule AS a
										left join tbl_module AS m ON m.id_module = a.id_module
										where id_login = '".$this->session->userdata('idLogin')."' AND menu_posisi = 'atas' AND
									menu_aktif = '1' AND akses_parent = '".$data['id']."'
								");
					$sub = "<ul class=\"dropdown-menu\">";
					while ($submodul = mysql_fetch_array($subquery,1))
					{
						$sub  .= "<li><a href=\"".base_url()."index.php/".$submodul['link']."\"><i class=\"icon-circle-arrow-down\"></i> ".$submodul['nama']."</a></li>";
					}
					$sub .= "</ul>";
					//echo $data['link']." == ".$m[0];
					if($data['link'] == $m[0])
						$class = 'active';
					else
						$class = '';
					if(mysql_num_rows($subquery)>0)
						echo "<li><a class=\"btn2 btn-primary2 btn-lg\" href=\"\"class=\"dropdown-toggle\" data-toggle=\"dropdown\" ><i class=\"icon-cog icon-white\"></i> ".$data['nama']."<b class=\"caret\"></b></a>".$sub."</li>";
					else
						echo "<li><a class=\"$class btn2 btn-primary2 btn-lg\" href=\"".base_url()."index.php/".$data['link']."\"><i class=\"icon-cog icon-white\"></i> ".$data['nama']."</a></li>";
				}
				?>
					
					
				<!--		<li><a class="btn btn-primary btn-lg" href="<?php //echo base_url();?>index.php/kategoriPerusahaan"><i class="icon-circle-arrow-down icon-white"></i> Referensi Kategori Perusahaan</a></li> !-->
				<?php
			  }
			  ?>
			  
            
            </ul>
          </div>
        </div>
    </div>