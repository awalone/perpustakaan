<?php
	//Initialisasi nilai untuk nomor loket
	//Pada kasus nyata nomor loket dimabil pada saat login  
	//sesuai dengan data pada tabel admin
	$loket="1";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Aplikasi Suara Antrian</title>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script type="text/javascript" >
$(document).ready(function(){
	$("#play").click(function(){
		document.getElementById('suarabel').play();		
	});
	
	
});

 var xmlhttp;
 
</script>
</head>
<body >
		<audio id="suarabel" src="Airport_Bell.mp3"></audio>
		<audio id="suarabelnomorurut" src="rekaman/nomor-urut.wav"  ></audio> 
		<audio id="suarabelsuarabelloket" src="rekaman/loket.wav"  ></audio> 
		<audio id="belas" src="rekaman/belas.wav"  ></audio> 
		<audio id="sebelas" src="rekaman/sebelas.wav"  ></audio> 
   <audio id="puluh" src="rekaman/puluh.wav"  ></audio> 
   <audio id="sepuluh" src="rekaman/sepuluh.wav"  ></audio> 
   <audio id="ratus" src="rekaman/ratus.wav"  ></audio> 
   <audio id="seratus" src="rekaman/seratus.wav"  ></audio> 
		<?php
/*			 $location_counter = "data.txt";
			 $location_date = "date.txt";
			 $itis = date ("d");
			 
			 // Hari baru?    
			$aday = join('', file($location_date));
			trim($aday);
		
			if("$aday"=="$itis"){
				//Cari hari ini
				$tcounter = join('', file($location_counter));
				trim($tcounter);
				$tcounter++;
				
				$fp = fopen($location_counter,"w");
				fputs($fp, $tcounter);
				fclose($fp);
			}else{
				//hari baru
				$fp = fopen($location_counter,"w");
				fputs($fp, 0);
				fclose($fp);
				$tcounter = join('', file($location_counter));
				trim($tcounter);
				$tcounter++;
				//tulis hari baru
				$fp = fopen($location_counter,"w");
				fputs($fp, $tcounter);
				fclose($fp);
				//tulis di date.txt
				$fp = fopen($location_date,"w");
				fputs($fp, $itis);
				fclose($fp);	
			}

			$panjang=strlen($tcounter);
			$antrian=$tcounter;
			
			for($i=0;$i<$panjang;$i++){
		?>
        		<audio id="suarabel<?php echo $i; ?>" src="rekaman/<?php echo substr($tcounter,$i,1); ?>.wav" ></audio>   		        
        <?php
			}
*/		?>
        <div class="kontainer"><a id="konter" href="index.php" ><h1><?php echo $antrian; ?></h1></a></div>
	<div id="cek"></div>
	<div style="font-size:24px; background:#99FF66"> Selamat Datang di Dinas Perizinan Kota Makassar</div>
</body>
</html>
<script type="text/javascript">
function mulai(){
//alert('aaaa');
	//MAINKAN SUARA BEL PADA SAAT AWAL
	document.getElementById('suarabel').pause();
	document.getElementById('suarabel').currentTime=0;
	document.getElementById('suarabel').play();
			
	//SET DELAY UNTUK MEMAINKAN REKAMAN NOMOR URUT		
	totalwaktu=document.getElementById('suarabel').duration*1000;	

	//MAINKAN SUARA NOMOR URUT		
	setTimeout(function() {
			document.getElementById('suarabelnomorurut').pause();
			document.getElementById('suarabelnomorurut').currentTime=0;
			document.getElementById('suarabelnomorurut').play();
	}, totalwaktu);
	totalwaktu=totalwaktu+1000;
	
		if(counter < 10){
			
			setTimeout(function() {
					document.getElementById('suarabel0').pause();
					document.getElementById('suarabel0').currentTime=0;
					document.getElementById('suarabel0').play();
				}, totalwaktu);
			
			totalwaktu=totalwaktu+1000;
	
		}else if(counter ==10){
			//JIKA 10 MAKA MAIKAN SUARA SEPULUH
				setTimeout(function() {
						document.getElementById('sepuluh').pause();
						document.getElementById('sepuluh').currentTime=0;
						document.getElementById('sepuluh').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
		
			}else if(counter ==11){
				//JIKA 11 MAKA MAIKAN SUARA SEBELAS

				setTimeout(function() {
						document.getElementById('sebelas').pause();
						document.getElementById('sebelas').currentTime=0;
						document.getElementById('sebelas').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;

			}else if(counter < 20){
				//JIKA 12-20 MAKA MAIKAN SUARA ANGKA2+"BELAS"
	
				setTimeout(function() {
						document.getElementById('suarabel1').pause();
						document.getElementById('suarabel1').currentTime=0;
						document.getElementById('suarabel1').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('belas').pause();
						document.getElementById('belas').currentTime=0;
						document.getElementById('belas').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;

			}else if(counter < 100){				
				//JIKA PULUHAN MAKA MAINKAN SUARA ANGKA1+PULUH+AKNGKA2

				setTimeout(function() {
						document.getElementById('suarabel0').pause();
						document.getElementById('suarabel0').currentTime=0;
						document.getElementById('suarabel0').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('puluh').pause();
						document.getElementById('puluh').currentTime=0;
						document.getElementById('puluh').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('suarabel1').pause();
						document.getElementById('suarabel1').currentTime=0;
						document.getElementById('suarabel1').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				
			}else{
				//JIKA LEBIH DARI 100 
				//Karena aplikasi ini masih sederhana maka logina konversi hanya sampai 100
				//Selebihnya akan langsung disebutkan angkanya saja 
				//tanpa kata "RATUS", "PULUH", maupun "BELAS"
		i = 0;
		for(k=0;k<counter.length;k++){
		totalwaktu=totalwaktu+1000;
		setTimeout(function() { 
						alert('suarabel'+i);
						document.getElementById('suarabel'+i).pause();
						document.getElementById('suarabel'+i).currentTime=0;
						document.getElementById('suarabel'+i).play();
						i++;
					}, totalwaktu);
		}
		}

		
		
		totalwaktu=totalwaktu+1000;
		setTimeout(function() {
						document.getElementById('suarabelsuarabelloket').pause();
						document.getElementById('suarabelsuarabelloket').currentTime=0;
						document.getElementById('suarabelsuarabelloket').play();
					}, totalwaktu);
		
		totalwaktu=totalwaktu+1000;
		setTimeout(function() {//alert(loket);
						document.getElementById('suarabelloket1').pause();
						document.getElementById('suarabelloket1').currentTime=0;
						document.getElementById('suarabelloket1').play();
						playing()
					}, totalwaktu);	
		
}
function playing()
{
	setwaktu = window.setInterval(function(){
	
	 if (window.XMLHttpRequest)
	   {// code for IE7+, Firefox, Chrome, Opera, Safari
	   xmlhttp=new XMLHttpRequest();
	   }
	 else
	   {// code for IE6, IE5
	   xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	   }
	 xmlhttp.onreadystatechange=function()
	   {
	   if (xmlhttp.readyState==4 && xmlhttp.status==200)
		 {
		 divisi=xmlhttp.responseText; 
		 }
	   } 
	 xmlhttp.open("POST","<?php echo site_url("antrian/cek"); ?>",false);
	 xmlhttp.send();
	document.getElementById('cek').innerHTML = divisi;
	counter = document.getElementById('counter');
	counter = counter.innerHTML;
	loket = document.getElementById('loket');
	loket = parseInt(loket.innerHTML);
	//alert(loket);
	if(counter != 'no') 
	{//alert(temp);
	clearTimeout(setwaktu);
	mulai();
	}
	//alert('aaa');
	},1000)
}
var loket = '';
playing();
</script>
