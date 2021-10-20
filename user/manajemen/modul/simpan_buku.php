<?php
	//ambil data dari form ======================================================================================================================
	$kd_buku = $_POST['kd_buku'];
	$judul_buku = $_POST['judul_buku'];
	$pengarang = $_POST['pengarang'];
	$penerbit = $_POST['penerbit'];
	$tahun = $_POST['tahun'];
	$stok = $_POST['stok'];
	$gambar = $_FILES['gambar']['name'];

	//menyimpan data ============================================================================================================================
	if($gambar == ""){
		$sql = mysqli_query($con, "insert into buku values ('$kd_buku','$judul_buku','$pengarang','$penerbit','$tahun',$stok,$stok,'')");
	}
	else{
		$sql = mysqli_query($con, "insert into buku values ('$kd_buku','$judul_buku','$pengarang','$penerbit','$tahun',$stok,$stok,'$kd_buku-$gambar')");
		if($sql){
			$move = move_uploaded_file($_FILES['gambar']['tmp_name'],'../../image/site/buku/'.$kd_buku.'-'.$gambar);
		}
	}

	//feedback berhasil atau gagal ================================================================================================================
	if ($sql) {
		echo "	<div class='panel-berhasil'>
					<center>
					<h2>Data berhasil ditambahkan</h2>
					<a href='index.php?m=view&p=buku'><input type='button' value='Tampil Data' class='btn-a'></a>
				</div>";
	}
	else {
		echo "	<div class='panel-gagal'>
					<center>
					<h2>Data gagal ditambahkan, silahkan coba bebrapa saat lagi!</h2>
					<a href='index.php?m=view&p=tambah_buku'><input type='button' value='Coba Lagi' class='btn-a'></a>
					<br><a href='index.php?m=view&p=buku'><input type='button' value='Tampil Data' class='btn-a'></a>
				</div>";
	}
?>