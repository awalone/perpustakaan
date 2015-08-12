<?php


$check = mysql_query("SELECT * FROM perpustakaan_pinjaman_temp WHERE temp_session='$session_id' ORDER BY temp_id DESC LIMIT 1");


$row=mysql_fetch_array($check);

?>

<div class="showbox"> <?php echo "Judul Buku : ". $row['temp_id_buku']; ?> &nbsp;&nbsp;<a href="#" id="del-<?php echo $row['temp_id'];?>">x</a><br /><br /></div>