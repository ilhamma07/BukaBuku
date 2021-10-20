<?php 
	$kd = $_REQUEST['id_anggota'];
	$cek = mysqli_query($con, "select foto from anggota where id_anggota = '$kd'");
	$name = mysqli_fetch_array($cek);
	$file = $name['foto'];

	$sql = mysqli_query ($con, "delete from anggota where id_anggota = '$kd'");

	if($sql) {
		if(!empty($file)){
			unlink('../../image/anggota/'.$file);
		}

		echo "	<div class='panel-berhasil'>
					<center>
					<h2>Data berhasil dihapus</h2>
					<a href='index.php?m=view&p=anggota'><input type='button' value='Tampil Data' class='btn-a'></a>
				</div>";
	}
	else {
		echo "	<div class='panel-gagal'>
					<center>
					<h2>Data gagal dihapus, silahkan coba beberapa saat lagi</h2>
					<a href='index.php?m=view&p=anggota'><input type='button' value='Kembali' class='btn-a'></a>
				</div>";
	}
?>