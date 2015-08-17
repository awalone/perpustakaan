
<style type="text/css">


.load {
color:#06C;
}

.space { 
margin-bottom:25px; 
margin-top:10px;
}
.showbox { 
border-bottom:1px #09C solid; 
width:490px; 
color:#033;
font-weight:bold;
word-wrap:break-word;
padding:10px; 
font-size:14px; 
font-family:Tahoma, Geneva, sans-serif; 
margin-bottom:5px;
}
</style>



<script type="text/javascript">
	

	


	$(function(){
		$(".save_temp").click(function(){
			var kode_anggota = $("#kode-anggota").val();
			var kode_buku    = $("#kode-buku").val();
			
			var session_id   = $("#session_id").val();
			$("#flash").show();
			$("#flash").fadeIn(400).html('<span class="load">Loading..</span>');
			$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>peminjaman/add_temp",
				data: {
					kode_anggota: kode_anggota,
					kode_buku : kode_buku,
					session_id : session_id
				},
				cache: true,
				success: function(html){
					$("#show").after(html);
					$("#flash").hide();
				}  
			});
			return false;
		});


		

	});
</script>
<div class="page-content">
<div class="page-content-area">


<div class="row">
<div class="col-xs-12">
<!-- PAGE CONTENT BEGINS -->


					<div class="widget-box">
<div class="widget-header widget-header-blue widget-header-flat">
	<h4 class="widget-title lighter">Transaksi Peminjaman</h4>
	<small>
	<i class="icon-double-angle-right"></i>
	<span class="label label-info arrowed-in-right arrowed">Mohon isi data dengan langkap</span>
	</small>
	<div class="widget-toolbar">
		
	</div>
</div>
					
					<div class="widget-body">
					<div class="widget-main">
					<div class="row-fluid">
						
							<!--PAGE CONTENT BEGINS-->

						<form class="form-horizontal" method="POST" role="form" enctype='multipart/form-data'>
							
								<input type="hidden" name="session_id" id="session_id" class="col-xs-10 col-sm-5" value="<?php echo $session_id;?>">
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="nama">Data Anggota:</label> 
									<div class="col-sm-7">
										<input type="text" name="nama" id="nama" class="col-xs-10 col-sm-5" placeholder="Data Anggota" value="">
										<input type="hidden" name="kode-anggota" id="kode-anggota" value="" />
										&nbsp;&nbsp;<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><b>Cari</b> <span class="glyphicon glyphicon-search"></span></button>
									</div>
								</div>

							
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="nama">Judul Buku:</label> 
									<div class="col-sm-7">
										<input type="text" name="judul" id="judul" class="col-xs-10 col-sm-5" placeholder="Judul Buku" value="">
										<input type="hidden" name="kode-buku" id="kode-buku" value="" />
										&nbsp;&nbsp;<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal1"><b>Cari Buku</b> <span class="glyphicon glyphicon-search"></span></button> <input class="btn btn-success btn-big btn-next save_temp" type="button" name="kirim_daftar" value="Input">
									</div>
								</div>								
					
							
								<div class="form-actions">
									
									<a class="btn btn-success btn-big btn-next" href="<?php echo site_url();?>/peminjaman/selesai_temp/" type="button">Selesai</a>
								
									<a href="#" class="btn" type="reset">
										<i class="icon-undo bigger-110"></i>
										RESET
									</a>
									
								</div>
				
								</form>
								</div>
								</div>
								</div>



								<!--show data -->
								<div class="space"></div>
								<div id="flash" align="left"  ></div>
								
								<div id="show" align="left">

									
								</div>

								<?php
										$sql = mysql_query("select *from perpustakaan_pinjaman_temp WHERE temp_session='$session_id' ORDER BY temp_id DESC") or die(mysql_error());
										$nums = mysql_num_rows($sql);
										if ($nums > 0)
										{
											while ($row = mysql_fetch_array($sql))
											{
												?>
												<div class="showbox">
												Judul Buku : <?php echo $row['temp_id_buku']; ?><br />
												&nbsp;<a href="#" id="del-<?php echo $row['temp_id'];?>">&nbsp;&nbsp;x</a><br /><br /></div>
												<?php
											}
										}
										
									?>

								<!--end show data -->



								<!-- Modal -->
								<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:800px">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Data Buku</h4>
                    </div>
                    <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
						                            <thead>
						                                <tr>
						                                    <th>Kode Buku</th>
						                                    <th>Judul Buku</th>
															<th>Pengarang</th>
						                                </tr>
						                            </thead>
						                            <tbody>
						                                <?php

						                              
						                               foreach($buku as $ags) {
						                                    ?>
						                                    <tr class="pilih-buku" data-id-buku="<?php echo $ags->buku_id; ?>" data-judul="<?php echo $ags->buku_judul;?>">
						                                        <td><?php echo $ags->buku_kode; ?></td>
						                                        <td><?php echo $ags->buku_judul; ?></td>
																<td><?php echo $ags->buku_pengarang; ?></td>
						                                    </tr>
						                                    <?php
						                                }
						                                
						                                ?>
						                            </tbody>
						                        </table>  
						                    </div>
						                </div>
						            </div>
						        </div>
								<!-- end modal buku-->	






						        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:800px">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Lookup Mahasiswa</h4>
                    </div>
                    <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
						                            <thead>
						                                <tr>
						                                    <th>Kode Anggota</th>
						                                    <th>Nama Lengkap</th>
															<th>NIM</th>
						                                </tr>
						                            </thead>
						                            <tbody>
						                                <?php

						                              
						                               foreach($anggota as $ags) {
						                                    ?>
						                                    <tr class="pilih" data-id-anggota="<?php echo $ags->anggota_id; ?>" data-nama="<?php echo $ags->anggota_nama;?>">
						                                        <td><?php echo $ags->anggota_kode; ?></td>
						                                        <td><?php echo $ags->anggota_nama; ?></td>
																<td><?php echo $ags->anggota_nim; ?></td>
						                                    </tr>
						                                    <?php
						                                }
						                                
						                                ?>
						                            </tbody>
						                        </table>  
						                    </div>
						                </div>
						            </div>
						        </div>
						    

						        

				
	
<!-- PAGE CONTENT ENDS -->
</div><!-- /.col -->
</div>

