<?php
	//ambil data dari form ======================================================================================================================
	$id_manajemen = $_POST['id_manajemen'];
	$nama_manajemen = $_POST['nama_manajemen'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$jenkel = $_POST['jenkel'];
	$alamat = $_POST['alamat'];
	$no_hp = $_POST['no_hp'];
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$gambar = $_FILES['gambar']['name'];


	//cek data id_manajemen pada tabel manajemen =======================================================================================================
	$qrCek = mysqli_query($con, "select * from manajemen where username = '$user'");
	$cek = mysqli_num_rows($qrCek);
	if($cek > 0){
		echo "	<div class='panel-gagal'>
					<center>
					<h2>Username yang dimasukan telah dipakai</h2>
					<a href='index.php?m=view&p=tambah_manajemen'><input type='button' value='Coba Lagi' class='btn-a'></a>	
					<br><a href='index.php?m=view&p=manajemen'><input type='button' value='Tampil Data' class='btn-a'></a>
				</div>";
	}
	else {

		//menyimpan data ==========================================================================================================================
		if($gambar == ""){
			$sql = mysqli_query($con, "insert into manajemen values ('$id_manajemen','$nama_manajemen','$tgl_lahir','$jenkel','$alamat','$no_hp','$user','$pass','')");
		}
		else{	
			$sql = mysqli_query($con, "insert into manajemen values ('$id_manajemen','$nama_manajemen','$tgl_lahir','$jenkel','$alamat','$no_hp','$user','$pass','$id_manajemen-$gambar')");
			if($sql){
				$move = move_uploaded_file($_FILES['gambar']['tmp_name'],'../../image/manajemen/'.$id_manajemen.'-'.$gambar);
			}
		}


		//feedback berhasil atau gagal =============================================================================================================
		if ($sql) {
			echo "	<div class='panel-berhasil'>
						<center>
						<h2>Data berhasil ditambahkan</h2>
						<a href='index.php?m=view&p=manajemen'><input type='button' value='Tampil Data' class='btn-a'></a>
					</div>";
		}
		else {
			echo "	<div class='panel-gagal'>
						<center>
						<h2>Data gagal ditambahkan, silahkan coba bebrapa saat lagi!</h2>
						<a href='index.php?m=view&p=tambah_manajemen'><input type='button' value='Coba Lagi' class='btn-a'></a>	
						<br><a href='index.php?m=view&p=manajemen'><input type='button' value='Tampil Data' class='btn-a'></a>
					</div>";
		}
	}
?>