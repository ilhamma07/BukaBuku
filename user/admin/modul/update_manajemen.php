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

	//sumary data foto =======================================================================================================================
	$file = mysqli_fetch_array(mysqli_query($con, "select foto from manajemen where id_manajemen='$id_manajemen'"));

	//menyimpan data ==========================================================================================================================
	if($gambar == ""){
		$sql = mysqli_query($con, "update manajemen set nama_manajemen = '$nama_manajemen', tgl_lahir = '$tgl_lahir', jenkel = '$jenkel', alamat = '$alamat', no_hp = '$no_hp', username = '$user', password = '$pass' where id_manajemen = '$id_manajemen'");
	}
	else{	
		$sql = mysqli_query($con, "update manajemen set nama_manajemen = '$nama_manajemen', tgl_lahir = '$tgl_lahir', jenkel = '$jenkel', alamat = '$alamat', no_hp = '$no_hp', username = '$user', password = '$pass', foto = '$id_manajemen-$gambar' where id_manajemen = '$id_manajemen'");
		if ($sql) {
			unlink('../../image/manajemen/'.$file['foto']);
			$move = move_uploaded_file($_FILES['gambar']['tmp_name'],'../../image/manajemen/'.$id_manajemen.'-'.$gambar);
		}
	}

	//feedback berhasil atau gagal =============================================================================================================
	if ($sql) {
		echo "	<div class='panel-berhasil'>
					<center>
					<h2>Data berhasil diupdate</h2>
					<a href='index.php?m=view&p=manajemen'><input type='button' value='Tampil Data' class='btn-a'></a>
				</div>";
	}
	else {
		echo "	<div class='panel-gagal'>
					<center>
					<h2>Data gagal diupdate, silahkan coba bebrapa saat lagi!</h2>
					<a href='index.php?m=view&p=edit_manajemen&id_manajemen=$id_manajemen'><input type='button' value='Coba Lagi' class='btn-a'></a>	
					<br><a href='index.php?m=view&p=manajemen'><input type='button' value='Tampil Data' class='btn-a'></a>
				</div>";
	}
?>