<?php
	//ambil data dari form ======================================================================================================================
	$id_anggota = $_POST['id_anggota'];
	$nama_anggota = $_POST['nama_anggota'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$jenkel = $_POST['jenkel'];
	$alamat = $_POST['alamat'];
	$no_hp = $_POST['no_hp'];
	$gambar = $_FILES['gambar']['name'];

	//sumary data foto =======================================================================================================================
	$file = mysqli_fetch_array(mysqli_query($con, "select foto from anggota where id_anggota='$id_anggota'"));

	//menyimpan data ==========================================================================================================================
	if($gambar == ""){
		$sql = mysqli_query($con, "update anggota set nama_anggota = '$nama_anggota', tgl_lahir = '$tgl_lahir', jenkel = '$jenkel', alamat = '$alamat', no_hp = '$no_hp' where id_anggota = '$id_anggota'");
	}
	else{	
		$sql = mysqli_query($con, "update anggota set nama_anggota = '$nama_anggota', tgl_lahir = '$tgl_lahir', jenkel = '$jenkel', alamat = '$alamat', no_hp = '$no_hp', foto = '$id_anggota-$gambar' where id_anggota = '$id_anggota'");
		if ($sql) {
			unlink('../../image/anggota/'.$file['foto']);
			$move = move_uploaded_file($_FILES['gambar']['tmp_name'],'../../image/anggota/'.$id_anggota.'-'.$gambar);
		}
	}

	//feedback berhasil atau gagal =============================================================================================================
	if ($sql) {
		echo "	<div class='panel-berhasil'>
					<center>
					<h2>Data berhasil diupdate</h2>
					<a href='index.php?m=view&p=anggota'><input type='button' value='Tampil Data' class='btn-a'></a>
				</div>";
	}
	else {
		echo "	<div class='panel-gagal'>
					<center>
					<h2>Data gagal diupdate, silahkan coba bebrapa saat lagi!</h2>
					<a href='index.php?m=view&p=edit_anggota&id_anggota=$id_anggota'><input type='button' value='Coba Lagi' class='btn-a'></a>	
					<br><a href='index.php?m=view&p=anggota'><input type='button' value='Tampil Data' class='btn-a'></a>
				</div>";
	}
?>