<?php
	//ambil data dari form ======================================================================================================================
	$kd_pengembalian = $_POST['kd_kembali'];
	$kd_peminjaman = $_POST['kd_pinjam'];
	$tgl_kembali = $_POST['tgl_kembali'];
	
	$cek = mysqli_fetch_array(mysqli_query($con, "select * from peminjaman where kd_peminjaman = '$kd_peminjaman'"));
	$cekKesamaan = mysqli_fetch_array(mysqli_query($con, "select * from pengembalian where kd_pengembalian = '$kd_pengembalian'"));
	$cek_kd_bk = mysqli_fetch_array(mysqli_query($con, "select kd_buku from peminjaman where kd_peminjaman = '$cekKesamaan[kd_peminjaman]'"));

	if($cekKesamaan['kd_peminjaman'] == $kd_peminjaman) {
		//menyimpan data =======================================================================================================================
		$sql = mysqli_query($con, "update pengembalian set kd_peminjaman = '$kd_peminjaman', tgl_kembali = '$tgl_kembali'where kd_pengembalian = '$kd_pengembalian'");
	}
	else {
		//menyimpan data =======================================================================================================================
		$sql = mysqli_query($con, "update pengembalian set kd_peminjaman = '$kd_peminjaman', tgl_kembali = '$tgl_kembali'where kd_pengembalian = '$kd_pengembalian'");
		
		if($sql){
			//update data buku tersedia ====================================================================================================
			//kd buku database
			$cek1 = mysqli_fetch_array(mysqli_query($con, "select * from buku where kd_buku = '$cek_kd_bk[kd_buku]'"));
			$tersedia1 = $cek1['tersedia'] - 1;
		
			$update1 = mysqli_query($con, "update buku set tersedia = '$tersedia1' where kd_buku = '$cek_kd_bk[kd_buku]'");

			//kd buku form
			$cek2 = mysqli_fetch_array(mysqli_query($con, "select * from buku where kd_buku = '$cek[kd_buku]'"));
			$tersedia2 = $cek2['tersedia'] + 1;
			
			$update2 = mysqli_query($con, "update buku set tersedia = '$tersedia2' where kd_buku = '$cek[kd_buku]'");
		}
		
	}

	//feedback berhasil atau gagal ==============================================================================================================
	if ($sql) {
		echo "	<div class='panel-berhasil'>
					<center>
					<h2>Data berhasil diupdate</h2>
					<a href='index.php?m=view&p=pengembalian'><input type='button' value='Tampil Data' class='btn-a'></a>
				</div>";
	}
	else {
		echo "	<div class='panel-gagal'>
					<center>
					<h2>Data gagal diupdate, silahkan coba bebrapa saat lagi!</h2>
					<a href='index.php?m=view&p=edit_pengembalian&kd_pengembalian=$kd_pengembalian'><input type='button' value='Coba Lagi' class='btn-a'></a>
					<br><a href='index.php?m=view&p=pengembalian'><input type='button' value='Tampil Data' class='btn-a'></a>
				</div>";
	}
?>