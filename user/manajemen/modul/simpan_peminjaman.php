<?php
	//ambil data dari form ======================================================================================================================
	$kd_peminjaman = $_POST['kd_pinjam'];
	$kd_buku = $_POST['kd_buku'];
	$id_anggota = $_POST['id_anggota'];
	$tgl_pinjam = $_POST['tgl_pinjam'];
	
	//cek ketersediaan buku ====================================================================================================================
	$cek = mysqli_fetch_array(mysqli_query($con, "select * from buku where kd_buku = '$kd_buku'"));

	if($cek['tersedia'] > 0) {
		//menyimpan data =======================================================================================================================
		$sql = mysqli_query($con, "insert into peminjaman values ('$kd_peminjaman','$kd_buku','$id_anggota','$tgl_pinjam')");
	}
	else {
		$sql = false;
	}

	//feedback berhasil atau gagal ==============================================================================================================
	if ($sql) {
		//update data buku tersedia ============================================================================================================
		$tersedia = $cek['tersedia'] - 1;
		$update = mysqli_query($con, "update buku set tersedia = '$tersedia' where kd_buku = '$kd_buku'");

		echo "	<div class='panel-berhasil'>
					<center>
					<h2>Data berhasil ditambahkan</h2>
					<a href='index.php?m=view&p=peminjaman'><input type='button' value='Tampil Data' class='btn-a'></a>
				</div>";
	}
	else {
		echo "	<div class='panel-gagal'>
					<center>
					<h2>Data gagal ditambahkan, silahkan coba bebrapa saat lagi!</h2>
					<a href='index.php?m=view&p=tambah_peminjaman'><input type='button' value='Coba Lagi' class='btn-a'></a>
					<br><a href='index.php?m=view&p=peminjaman'><input type='button' value='Tampil Data' class='btn-a'></a>
				</div>";
	}
?>