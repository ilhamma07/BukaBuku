<?php
	//ambil data dari form ======================================================================================================================
	$kd_pengembalian = $_POST['kd_kembali'];
	$kd_peminjaman = $_POST['kd_pinjam'];
	$tgl_kembali = $_POST['tgl_kembali'];
	
	//cek data buku ====================================================================================================================
	$cekPinjam = mysqli_fetch_array(mysqli_query($con, "select * from peminjaman where kd_peminjaman = '$kd_peminjaman'"));
	$cek = mysqli_fetch_array(mysqli_query($con, "select * from buku where kd_buku = '$cekPinjam[kd_buku]'"));
	//menyimpan data =======================================================================================================================
	$sql = mysqli_query($con, "insert into pengembalian values ('$kd_pengembalian','$kd_peminjaman','$tgl_kembali')");
	
	//feedback berhasil atau gagal ==============================================================================================================
	if ($sql) {
		//update data buku tersedia ============================================================================================================
		$tersedia = $cek['tersedia'] + 1;
		$update = mysqli_query($con, "update buku set tersedia = '$tersedia' where kd_buku = '$cek[kd_buku]'");

		echo "	<div class='panel-berhasil'>
					<center>
					<h2>Data berhasil ditambahkan</h2>
					<a href='index.php?m=view&p=pengembalian'><input type='button' value='Tampil Data' class='btn-a'></a>
				</div>";
	}
	else {
		echo "	<div class='panel-gagal'>
					<center>
					<h2>Data gagal ditambahkan, silahkan coba bebrapa saat lagi!</h2>
					<a href='index.php?m=view&p=tambah_pengembalian'><input type='button' value='Coba Lagi' class='btn-a'></a>
					<br><a href='index.php?m=view&p=pengembalian'><input type='button' value='Tampil Data' class='btn-a'></a>
				</div>";
	}
?>