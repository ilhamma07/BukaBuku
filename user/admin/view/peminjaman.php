<h1>Data Peminjaman Buku</h1>
<br>
<div class="panel">
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
			$batas=15;
    		$pg=isset($_GET['pg'])?$_GET['pg']:"";
        	if(empty($pg)) {
        	    $posisi=0;
        	    $pg=1;
        	}
        	else {
        	    $posisi=($pg-1)*$batas;
        	}
			$sql = mysqli_query($con,"select * from peminjaman limit $posisi,$batas");
			if(mysqli_num_rows($sql) > 0) {
				while ($dataPeminjaman = mysqli_fetch_array($sql)) {
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
			else {
				echo "	<tr>
							<td colspan='6' align='center'>Data tidak tersedia</td>
						<tr>
					";
			}
			
			//hitung jumlah data
			$jml_data = mysqli_num_rows(mysqli_query($con, "select * from peminjaman"));
			
			//Jumlah halaman
			$JmlHalaman = ceil($jml_data/$batas); //ceil digunakan untuk pembulatan keatas
			
			//Navigasi ke sebelumnya		
			if ($pg>1) {
				$link=$pg-1;
				$prev="<a href='index.php?m=view&p=peminjaman&?pg=$link' class='btn-pg'>&lArr;</a>";
			} 
			else {
				$prev="<a href='#' class='btn-pg'>&lArr;</a>";
			}

			//Navigasi nomor
			$nmr = '';
			for ($i=1;$i<=$JmlHalaman;$i++) {
				if ($i==$pg)
					{
	    				$nmr.="<a href='#' class='btn-pgactive'>$i</a>";
					}
				else {
	    			$nmr.="<a href='index.php?m=view&p=peeminjaman&pg=$i' class='btn-pg'>$i</a>";
				}
			}
			
			//Navigasi ke selanjutnya
			if ($pg<$JmlHalaman ) {
				$link2=$pg+1;
				$next="<a href='index.php?m=view&p=peminjaman&pg=$link2' class='btn-pg'>&rArr;</a>";
			}
			else {
				$next="<a href='#' class='btn-pg'>&rArr;</a>";
			}
		?>
		<tr><th colspan="10">Jumlah Data :<b> <?php echo $jml_data; ?></b> </th></tr>
	<?php
		//Tampilkan navigasi
		echo "<tr>
            	<td colspan='6' align='center'>
            		$prev $nmr $next
            	</td>
    		</tr>";
	?>
	</table>
</div>