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

Selamat datang <h1><?php echo $_SESSION['nama']; ?></h1>
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


<div class="dipinjam">
	<div class="dipinjam-header">
		<h2><font style="color: #fff;">Buku yang belum dikembalikan</font></h2>
	</div>
	<div class="dipinjam-content">
		<table class="datatable">
		<tr>
			<th>Kode Peminjaman</th>
			<th>Kode Buku</th>
			<th>Judul Buku</th>
			<th>ID Anggota</th>
			<th>Nama Anggota</th>
			<th>Tanggal Dipinjam</th>
		</tr>
		<?php
			$sql1 = mysqli_query($con,"select * from peminjaman");
			if(mysqli_num_rows($sql1) > 0) {
				while ($dataPeminjaman = mysqli_fetch_array($sql1)) {
					$sql2 = mysqli_num_rows(mysqli_query($con,"select * from pengembalian where kd_peminjaman = '$dataPeminjaman[kd_peminjaman]'"));
					if($sql2==0){
					$dataJudul = mysqli_fetch_array(mysqli_query($con,"select judul_buku from buku where kd_buku = '$dataPeminjaman[kd_buku]'"));
					$dataNama = mysqli_fetch_array(mysqli_query($con,"select nama_anggota from anggota where id_anggota = '$dataPeminjaman[id_anggota]'"));
					echo "	<tr class='tr'>
								<td>$dataPeminjaman[kd_peminjaman]</td>
								<td>$dataPeminjaman[kd_buku]</td>
								<td>$dataJudul[judul_buku]</td>
								<td>$dataPeminjaman[id_anggota]</td>
								<td>$dataNama[nama_anggota]</td>
								<td>$dataPeminjaman[tgl_pinjam]</td>
							<tr>
					";
					}
				}
			}
			else {
				echo "	<tr>
							<td colspan='7' align='center'>Data tidak tersedia</td>
						<tr>
					";
			}
		?>
	</table>
	</div>
</div>