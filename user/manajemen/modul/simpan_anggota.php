<?php
	//ambil data dari form ======================================================================================================================
	$id_anggota = $_POST['id_anggota'];
	$nama_anggota = $_POST['nama_anggota'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$jenkel = $_POST['jenkel'];
	$alamat = $_POST['alamat'];
	$no_hp = $_POST['no_hp'];
	$gambar = $_FILES['gambar']['name'];

	//menyimpan data =======================================================================================================
	if($gambar == ""){
		$sql = mysqli_query($con, "insert into anggota values ('$id_anggota','$nama_anggota','$tgl_lahir','$jenkel','$alamat','$no_hp','')");
	}
	else{	
		$sql = mysqli_query($con, "insert into anggota values ('$id_anggota','$nama_anggota','$tgl_lahir','$jenkel','$alamat','$no_hp','$id_anggota-$gambar')");
		if($sql){
			$move = move_uploaded_file($_FILES['gambar']['tmp_name'],'../../image/anggota/'.$id_anggota.'-'.$gambar);
		}
	}

	//feedback berhasil atau gagal =============================================================================================================
	if ($sql) {
		echo "	<div class='panel-berhasil'>
					<center>
					<h2>Data berhasil ditambahkan</h2>
					<a href='index.php?m=view&p=anggota'><input type='button' value='Tampil Data' class='btn-a'></a>
				</div>";
	}
	else {
		echo "	<div class='panel-gagal'>
					<center>
					<h2>Data gagal ditambahkan, silahkan coba bebrapa saat lagi!</h2>
					<a href='index.php?m=view&p=tambah_anggota'><input type='button' value='Coba Lagi' class='btn-a'></a>	
					<br><a href='index.php?m=view&p=anggota'><input type='button' value='Tampil Data' class='btn-a'></a>
				</div>";
	}
?>