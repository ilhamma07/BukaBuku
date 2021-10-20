<?php 
	$kd = $_REQUEST['kd_peminjaman'];

	$cek = mysqli_num_rows(mysqli_query($con, "select kd_peminjaman from pengembalian where kd_peminjaman = '$kd'"));
	if($cek > 0) {
		$sql = mysqli_query ($con, "delete from peminjaman where kd_peminjaman = '$kd'");
	}
	else{
		$buku = mysqli_fetch_array(mysqli_query($con, "select kd_buku from peminjaman where kd_peminjaman = '$kd'"));
		$ambil_tersedia = mysqli_fetch_array(mysqli_query($con, "select tersedia from buku where kd_buku = '$buku[kd_buku]'"));
		$tersedia = $ambil_tersedia['tersedia'] + 1;
		$update = mysqli_query($con, "update buku set tersedia = '$tersedia' where kd_buku = '$buku[kd_buku]'");
		$sql = mysqli_query ($con, "delete from peminjaman where kd_peminjaman = '$kd'");
	}
	

	if($sql) {
		echo "	<div class='panel-berhasil'>
					<center>
					<h2>Data berhasil dihapus</h2>
					<a href='index.php?m=view&p=peminjaman'><input type='button' value='Tampil Data' class='btn-a'></a>
				</div>";
	}
	else {
		echo "	<div class='panel-gagal'>
					<center>
					<h2>Data gagal dihapus, silahkan coba beberapa saat lagi</h2>
					<a href='index.php?m=view&p=peminjaman'><input type='button' value='Kembali' class='btn-a'></a>
				</div>";
	}
?>