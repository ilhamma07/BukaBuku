<h1>Data Buku</h1>
<br>
<div class="panel">
	<a href="index.php?m=view&p=tambah_buku&r=5" class="btn-a">Tambah Data</a>
	<br>
	<br>
	<table class="datatable">
		<tr>
			<th>Kode Buku</th>
			<th>Judul Buku</th>
			<th>Pengarang</th>
			<th>Penerbit</th>
			<th>Tahun</th>
			<th>Buku Tersedia</th>
			<th>Buku Dipinjam</th>
			<th>Stok</th>
			<th>Foto</th>
			<th>Aksi</th>
		</tr>
		<?php
		$batas = 10;
		$pg = isset($_GET['pg']) ? $_GET['pg'] : "";
		if (empty($pg)) {
			$posisi = 0;
			$pg = 1;
		} else {
			$posisi = ($pg - 1) * $batas;
		}
		$sql = mysqli_query($con, "select * from buku limit $posisi,$batas");
		if (mysqli_num_rows($sql) > 0) {
			while ($dataBuku = mysqli_fetch_array($sql)) {
				echo "	<tr class='tr'>
								<td>$dataBuku[kd_buku]</td>
								<td>$dataBuku[judul_buku]</td>
								<td>$dataBuku[pengarang]</td>
								<td>$dataBuku[penerbit]</td>
								<td>$dataBuku[tahun]</td>
								<td>$dataBuku[tersedia]</td>";
				$sql_cek = mysqli_num_rows(mysqli_query($con, "select * from peminjaman where kd_buku = '$dataBuku[kd_buku]'"));
				$kdbk = mysqli_fetch_array(mysqli_query($con, "select * from peminjaman where kd_buku = '$dataBuku[kd_buku]'"));
				if ($kdbk != null) {
					$sql_cek2 = mysqli_num_rows(mysqli_query($con, "select * from pengembalian where kd_peminjaman = '$kdbk[kd_peminjaman]'"));
				}
				if ($sql_cek > 0) {
					if ($sql_cek2 > 0) {
						$dipinjam = $sql_cek - $sql_cek2;
					} else {
						$dipinjam = $sql_cek;
					}
				} else {
					$dipinjam = 0;
				}
				echo "	<td>$dipinjam</td>
								<td>$dataBuku[stok]</td>
								<td><img src='../../image/site/buku/$dataBuku[foto]' class='img'></td>
								<td>
									<a href='index.php?m=view&&p=edit_buku&kd_buku=$dataBuku[kd_buku]' class='btn-edit'><span class='glyphicon glyphicon-edit'></span></a>
									<a href='index.php?m=modul&&p=hapus_buku&kd_buku=$dataBuku[kd_buku]' class='btn-hapus' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?');\"><span class='glyphicon glyphicon-trash'></span></a>
								</td>
							<tr>
					";
			}
		} else {
			echo "	<tr>
							<td colspan='10' align='center'>Data tidak tersedia</td>
						<tr>
					";
		}

		//hitung jumlah data
		$jml_data = mysqli_num_rows(mysqli_query($con, "select * from buku"));

		//Jumlah halaman
		$JmlHalaman = ceil($jml_data / $batas); //ceil digunakan untuk pembulatan keatas

		//Navigasi ke sebelumnya		
		if ($pg > 1) {
			$link = $pg - 1;
			$prev = "<a href='index.php?m=view&p=buku&?pg=$link' class='btn-pg'>&lArr;</a>";
		} else {
			$prev = "<a href='#' class='btn-pg'>&lArr;</a>";
		}

		//Navigasi nomor
		$nmr = '';
		for ($i = 1; $i <= $JmlHalaman; $i++) {
			if ($i == $pg) {
				$nmr .= "<a href='#' class='btn-pgactive'>$i</a>";
			} else {
				$nmr .= "<a href='index.php?m=view&p=buku&pg=$i' class='btn-pg'>$i</a>";
			}
		}

		//Navigasi ke selanjutnya
		if ($pg < $JmlHalaman) {
			$link2 = $pg + 1;
			$next = "<a href='index.php?m=view&p=buku&pg=$link2' class='btn-pg'>&rArr;</a>";
		} else {
			$next = "<a href='#' class='btn-pg'>&rArr;</a>";
		}
		?>
		<tr>
			<th colspan="10">Jumlah Data :<b> <?php echo $jml_data; ?></b> </th>
		</tr>
		<?php
		//Tampilkan navigasi
		echo "<tr>
            	<td colspan='10' align='center'>
            		$prev $nmr $next
            	</td>
    		</tr>";
		?>
	</table>
</div>