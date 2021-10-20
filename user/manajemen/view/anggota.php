<h1>Data Anggota</h1>
<br>
<div class="panel">
	<a href="index.php?m=view&p=tambah_anggota" class="btn-a">Tambah Data</a>
	<br>
	<br>
	<table class="datatable">
		<tr>
			<th>ID Anggota</th>
			<th>Nama</th>
			<th>Tanggal Lahir</th>
			<th>Jenis Kelamin</th>
			<th>Alamat</th>
			<th>Nomor Hp</th>
			<th>Foto</th>
			<th>Aksi</th>
		</tr>
		<?php
			$batas=10;
    		$pg=isset($_GET['pg'])?$_GET['pg']:"";
        	if(empty($pg)) {
        	    $posisi=0;
        	    $pg=1;
        	}
        	else {
        	    $posisi=($pg-1)*$batas;
        	}

			$sql = mysqli_query($con,"select * from anggota limit $posisi,$batas");
			if(mysqli_num_rows($sql) > 0) {
				while ($dataAnggota = mysqli_fetch_array($sql)) {
					if($dataAnggota['jenkel']=='L'){
        				$jenkel = 'Laki - Laki';
        			}
        			else{
        				$jenkel = 'Perempuan';
        			}
					echo "	<tr class='tr'>
								<td>$dataAnggota[id_anggota]</td>
								<td>$dataAnggota[nama_anggota]</td>
								<td>$dataAnggota[tgl_lahir]</td>
								<td>$jenkel</td>
								<td>$dataAnggota[alamat]</td>
								<td>$dataAnggota[no_hp]</td>
								<td><img src='../../image/anggota/$dataAnggota[foto]' class='img'></td>
								<td>
									<a href='index.php?m=view&&p=edit_anggota&id_anggota=$dataAnggota[id_anggota]' class='btn-edit'><span class='glyphicon glyphicon-edit'></span></a>
									<a href='index.php?m=modul&&p=hapus_anggota&id_anggota=$dataAnggota[id_anggota]' class='btn-hapus' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?');\"><span class='glyphicon glyphicon-trash'></span></a>
								</td>
							<tr>
					";
				}
			}
			else {
				echo "	<tr>
							<td colspan='10' align='center'>Data tidak tersedia</td>
						<tr>
					";
			}
			
			//hitung jumlah data
			$jml_data = mysqli_num_rows(mysqli_query($con, "select * from anggota"));
			
			//Jumlah halaman
			$JmlHalaman = ceil($jml_data/$batas); //ceil digunakan untuk pembulatan keatas
			
			//Navigasi ke sebelumnya		
			if ($pg>1) {
				$link=$pg-1;
				$prev="<a href='index.php?m=view&p=anggota&?pg=$link' class='btn-pg'>&lArr;</a>";
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
	    			$nmr.="<a href='index.php?m=view&p=anggota&pg=$i' class='btn-pg'>$i</a>";
				}
			}
			
			//Navigasi ke selanjutnya
			if ($pg<$JmlHalaman ) {
				$link2=$pg+1;
				$next="<a href='index.php?m=view&p=anggota&pg=$link2' class='btn-pg'>&rArr;</a>";
			}
			else {
				$next="<a href='#' class='btn-pg'>&rArr;</a>";
			}
		?>
		<tr><th colspan="10">Jumlah Data :<b> <?php echo $jml_data; ?></b> </th></tr>
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