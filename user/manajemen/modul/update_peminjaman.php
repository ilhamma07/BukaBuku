<?php
	//ambil data dari form ======================================================================================================================
	$kd_peminjaman = $_POST['kd_pinjam'];
	$kd_buku = $_POST['kd_buku'];
	$id_anggota = $_POST['id_anggota'];
	$tgl_pinjam = $_POST['tgl_pinjam'];
	
	//cek kesamaan id buku ====================================================================================================================
	$cek = mysqli_fetch_array(mysqli_query($con, "select * from peminjaman where kd_peminjaman = '$kd_peminjaman'"));

	if($cek['kd_buku'] == $kd_buku) {

		//menyimpan data =======================================================================================================================
		$sql = mysqli_query($con, "update peminjaman set kd_buku = '$kd_buku', id_anggota = '$id_anggota', tgl_pinjam = '$tgl_pinjam' where kd_peminjaman = '$kd_peminjaman'");
	}
	else {

		//menyimpan data =======================================================================================================================
		$sql = mysqli_query($con, "update peminjaman set kd_buku = '$kd_buku', id_anggota = '$id_anggota', tgl_pinjam = '$tgl_pinjam' where kd_peminjaman = '$kd_peminjaman'");

		if($sql){
			//update data buku tersedia ============================================================================================================
			//kd buku di database
			$cek1 = mysqli_fetch_array(mysqli_query($con, "select * from buku where kd_buku = '$cek[kd_buku]'"));
			$tersedia1 = $cek1['tersedia'] + 1;
		
			$update1 = mysqli_query($con, "update buku set tersedia = '$tersedia1' where kd_buku = '$cek[kd_buku]'");

			//kd buku di form
			$cek2 = mysqli_fetch_array(mysqli_query($con, "select * from buku where kd_buku = '$kd_buku'"));
			$tersedia2 = $cek2['tersedia'] - 1;
			
			$update2 = mysqli_query($con, "update buku set tersedia = '$tersedia2' where kd_buku = '$kd_buku'");	
		}
	}

	//feedback berhasil atau gagal ==============================================================================================================
	if ($sql) {
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