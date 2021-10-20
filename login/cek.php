<link rel="stylesheet" type="text/css" href="../config/css/login.css">
<link rel="stylesheet" type="text/css" href="../config/css/icon.css">
<?php
	include "../config/koneksi/koneksi.php";

	session_start();
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	
	$sql1 = mysqli_query ($con, "select * from admin where username='$user' && password='$pass'");
	$sql2 = mysqli_query ($con, "select * from manajemen where username='$user' && password='$pass'");

	if (mysqli_num_rows ($sql1) >=1)
	{
		$data = mysqli_fetch_array($sql1);
		$_SESSION['username'] = $user;
		header('location:../user/admin/index.php');
	}
	else if (mysqli_num_rows ($sql2) >=1)
	{
		$data = mysqli_fetch_array($sql2);
		$_SESSION['username'] = $user;
		$_SESSION['nama'] = $data['nama_manajemen'];
		header('location:../user/manajemen/index.php');
	}
	else {
		echo "	<div class='panel-gagal'>
					<center>
					<h2><span class='glyphicon glyphicon-warning-sign'></span>Login Gagal</h2>
					<a href='login.php'><input type='button' value='Coba Lagi' class='masuk'></a>
					<a href='../index.php'><input type='button' value='Batal' class='batal'></a>
				</div>";
	}
?>