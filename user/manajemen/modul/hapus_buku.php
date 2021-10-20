<?php 
	$kd = $_REQUEST['kd_buku'];
	$cek = mysqli_query($con, "select foto from buku where kd_buku = '$kd'");
	$name = mysqli_fetch_array($cek);
	$file = $name['foto'];

	$sql = mysqli_query ($con, "delete from buku where kd_buku = '$kd'");

	if($sql) {
		if(!empty($file)){
			unlink('../../image/site/buku/'.$file);
		}

		echo "	<div class='panel-berhasil'>
					<center>
					<h2>Data berhasil dihapus</h2>
					<a href='index.php?m=view&p=buku'><input type='button' value='Tampil Data' class='btn-a'></a>
				</div>";
	}
	else {
		echo "	<div class='panel-berhasil'>
					<center>
					<h2>Data gagal dihapus, silahkan coba beberapa saat lagi</h2>
					<a href='index.php?m=view&p=buku'><input type='button' value='Tampil Data' class='btn-a'></a>
				</div>";
	}
?>