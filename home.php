<?php
	$buku = mysqli_fetch_array(mysqli_query($con, "select sum(stok) as jml from buku"));
	if ($buku['jml'] > 0) {
		$jmlBuku = $buku['jml'];
	}
	else{
		$jmlBuku = 0;
	}
	
	$jmlJudul = mysqli_num_rows(mysqli_query($con, "select * from buku"));
	
	$jmlAnggota = mysqli_num_rows(mysqli_query($con, "select * from anggota"));
		
	$dipinjam = mysqli_fetch_array(mysqli_query($con, "select sum(tersedia) as tersedia from buku"));
	$jDipinjam = $dipinjam['tersedia'];
	$jmlDipinjam = $jmlBuku - $jDipinjam;
?>
<center><h1><font size='7'>Selamat Datang</font></h1><h3>di Laman Perpustakaan BukaBuku</h3></center>
<br>
<div class='panel-item'>
	<div class='col-blue'><span class='glyphicon glyphicon-book'></span></div>
		<div class='col-white'>
			<font size='6'><?php echo $jmlBuku; ?></font>
			<br>Total Buku
		</div>
	</div>
	<div class='panel-item'>
		<div class='col-red'><span class='glyphicon glyphicon-th-list'></span></div>
		<div class='col-white'>
			<font size='6'><?php echo $jmlJudul; ?></font>
			<br>Total Judul
		</div>
	</div>
	<div class='panel-item'>
		<div class='col-green'><span class='glyphicon glyphicon-user'></span></div>
		<div class='col-white'>
			<font size='6'><?php echo $jmlAnggota; ?></font>
			<br>Total Anggota
	</div>
	</div>
	<div class='panel-item'>
		<div class='col-orange'><span class='glyphicon glyphicon-list-alt'></span></div>
		<div class='col-white'>
			<font size='6'><?php echo $jmlDipinjam; ?></font>
			<br>Total Dipinjam
	</div>
</div>