<?php
	//ambil data dari form ======================================================================================================================
	$kd_buku = $_POST['kd_buku'];
	$judul_buku = $_POST['judul_buku'];
	$pengarang = $_POST['pengarang'];
	$penerbit = $_POST['penerbit'];
	$tahun = $_POST['tahun'];
	$stok = $_POST['stok'];
	$gambar = $_FILES['gambar']['name'];

	//summary data foto ==================================================================================================
	$file = mysqli_fetch_array(mysqli_query($con, "select foto from buku where kd_buku = '$kd_buku'"));


	//cek data buku pada tabel peminjaman =================================================================================
	$sql_cek = mysqli_num_rows(mysqli_query($con, "select * from peminjaman where kd_buku = '$kd_buku'"));
	$cekTersedia = mysqli_fetch_array(mysqli_query($con, "select tersedia, stok from buku where kd_buku = '$kd_buku'"));
	if($sql_cek > 0){
		$tersedia = $cekTersedia['stok'] - $sql_cek;
	}
	else {
		if($stok > $cekTersedia['stok']){
			$selisih =  $stok - $cekTersedia['stok'];
			$tersedia = $cekTersedia['tersedia'] + $selisih;
		}
		else if($stok < $cekTersedia['stok']){
			$selisih = $cekTersedia['stok'] - $stok;
			$tersedia = $cekTersedia['tersedia'] - $selisih;
		}
		else {
			$tersedia = $cekTersedia['tersedia'];
		}
	}

	//untuk update data ==========================================================================================================================
	if (empty($gambar)) {
		$sql = mysqli_query($con, "update buku set judul_buku = '$judul_buku', pengarang = '$pengarang', penerbit = '$penerbit', tahun = '$tahun', stok = '$stok', tersedia='$tersedia' where kd_buku = '$kd_buku'");
	}
	else {
		$sql = mysqli_query($con, "update buku set judul_buku = '$judul_buku', pengarang = '$pengarang', penerbit = '$penerbit', tahun = '$tahun', stok = '$stok', tersedia = '$tersedia', foto = '$kd_buku-$gambar' where kd_buku = '$kd_buku'");

		if ($sql) {
			unlink('../../image/site/buku/'.$file['foto']);
			$move = move_uploaded_file($_FILES['gambar']['tmp_name'],'../../image/site/buku/'.$kd_buku.'-'.$gambar);
		}
	}

	//feedback berhasil atau gagal ================================================================================================================
	if ($sql) {
		echo "	<div class='panel-berhasil'>
					<center>
					<h2>Data berhasil diupdate</h2>
					<a href='index.php?m=view&p=buku'><input type='button' value='Tampil Data' class='btn-a'></a>
				</div>";
	}
	else {
		echo "	<div class='panel-gagal'>
					<center>
					<h2>Data gagal diupdate, silahkan coba bebrapa saat lagi!</h2>
					<a href='index.php?m=view&p=edit_buku&kd_buku=$kd_buku'><input type='button' value='Coba Lagi' class='btn-a'></a>
					<br><a href='index.php?m=view&p=buku'><input type='button' value='Tampil Data' class='btn-a'></a>
				</div>";
	}
?>