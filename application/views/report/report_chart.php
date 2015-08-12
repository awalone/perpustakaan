	 <legend style="position: static;">Grafik Data Perizinan</legend>
     
<fieldset class="scheduler-border">
		<legend class="scheduler-border">Kriteria Pencarian</legend>
		<form method='post' action='<?php echo $search;?>'>
		<table width="100%" style="border-spacing: 0px;">
			<tr style="padding: 0px;">
				<td>Jenis Izin</td>
				<td>
					<?php $value = set_value('selected', isset($selected) ? $selected : ''); 
					 echo form_dropdown('jenis_izin',$jenis_izin, $value); ?>
					
					
				</td>
			</tr>
			<tr>
				<td>Tgl. Registrasi</td>
				<td><input type='text' name='mulai' id='datepicker-example1' style='font-size: 14px;height: 20px; width: 100px;' value=""> S.D 
<input type='text' name='selesai' id='datepicker-example2' style='font-size: 14px;height: 20px; width: 100px;' value=""></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="cari" /></td>
			</tr>
		</table>	
		</form>
	</fieldset>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/highcharts/highcharts.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/highcharts/modules/exporting.js"></script>

<style>
.chart-wrapper { position: relative; padding-bottom: 40%; width:95%; float:left; } 
</style>

<script type="text/javascript">
   
   var chart;
   $(document).ready(function() {
    chart = new Highcharts.Chart({
     chart: {
      renderTo: 'container',
      defaultSeriesType: 'column',
	  marginTop: 10,
	  marginRight: 0
	  
     },
     title: {
      text: '<?php echo $judul_grap; ?>'
     },
     
     xAxis: {
      categories: [
       'Mariso',
	   'Mamajang',
       'Makassar',
       'Ujung Pandang',
       'Wajo',
       'Bontoala',
       'Tallo',
       'ujung Tanah',
       'Panakkukang',
       'Tamalate',
       'Biringkanaya',
       'Manggala',
       'Rappocini',
	   'Tamalanrea'
      ]
     },
     yAxis: {
      min: 0,
      title: {
       text: 'Jumlah'
      }
     },
     legend: {
      layout: 'vertical',
      backgroundColor: '#FFFFFF',
      align: 'left',
      verticalAlign: 'top',
      x: 100,
      y: 70,
      floating: true,
      shadow: true
     },
     tooltip: {
      formatter: function() {
       return ''+
        this.x +': '+ this.y +' pemohon';
      }
     },
     plotOptions: {
      column: {
       pointPadding: 0.1,
       borderWidth: 0
      }
     },
            series: [{
      name: 'Arsip',
      data: [<?php echo $mariso_arsip.",
						".$mamajang_arsip.",
						".$makassar_arsip.",
						".$ujungpandang_arsip.",
						".$wajo_arsip.",
						".$bontoala_arsip.",
						".$tallo_arsip.",
						".$ujungtanah_arsip.",
						".$panakkukang_arsip.",
						".$tamalate_arsip.",
						".$biringkanaya_arsip.",
						".$manggala_arsip.",
						".$rappocini_arsip.",
						".$tamalanrea_arsip; ?>]
     
     }, {
      name: 'Registrasi',
       data: [<?php echo $mariso_registrasi.",
						".$mamajang_registrasi.",
						".$makassar_registrasi.",
						".$ujungpandang_registrasi.",
						".$wajo_registrasi.",
						".$bontoala_registrasi.",
						".$tallo_registrasi.",
						".$ujungtanah_registrasi.",
						".$panakkukang_registrasi.",
						".$tamalate_registrasi.",
						".$biringkanaya_registrasi.",
						".$manggala_registrasi.",
						".$rappocini_registrasi.",
						".$tamalanrea_registrasi; ?>]
     
     }]
    });
     
     
   });
     
  </script>
 

 
<!-- 3. Add the container --><br /><br />	
  <div id="container" style="width: 1200px; height: 500px; margin-left: -20px; margin: 0 auto"></div>
