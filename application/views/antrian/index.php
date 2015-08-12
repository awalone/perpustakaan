<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Aplikasi Suara Antrian</title>
</head>
<body >
        <div ><a  href="<?php echo $antrian;?>" ><h1>Tampilkan Antrian</h1></a></div>
        <div ><a  href="<?php echo $loket;?>" ><h1>Loket</h1></a></div>
        
        <?php
        		echo "Id Loket : ". $idLoket;
        		echo "<br />";
        		echo "Nama Loket : ". $namaLoket;
        
        ?>
        
</body>
</html>
