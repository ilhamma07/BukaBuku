<?php 
	$kd = $_REQUEST['id_manajemen'];
	$cek = mysqli_query($con, "select foto from manajemen where id_manajemen = '$kd'");
	$name = mysqli_fetch_array($cek);
	$file = $name['foto'];

	$sql = mysqli_query ($con, "delete from manajemen where id_manajemen = '$kd'");

	if($sql) {
		if(!empty($file)){
			unlink('../../image/manajemen/'.$file);
		}

		echo "	<div class='panel-berhasil'>
					<center>
					<h2>Data berhasil dihapus</h2>
					<a href='index.php?m=view&p=manajemen'><input type='button' value='Tampil Data' class='btn-a'></a>
				</div>";
	}
	else {
		echo "	<div class='panel-gagal'>
					<center>
					<h2>Data gagal dihapus, silahkan coba beberapa saat lagi</h2>
					<a href='index.php?m=view&p=manajemen'><input type='button' value='Kembali' class='btn-a'></a>
				</div>";
	}
?>