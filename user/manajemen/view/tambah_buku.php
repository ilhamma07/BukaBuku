<h1>Tambah Data Buku</h1>
<br>
<div class="panel">
	<form action="index.php?m=modul&p=simpan_buku" method="post" class="form" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Kode Buku</td>
			</tr>
			<tr>
				<td>
					<?php
						$kode = mysqli_fetch_array(mysqli_query($con, "select substring(kd_buku, 4) from buku order by kd_buku desc limit 1"));
						$kodeOld = $kode[0];
						$kodeNew = $kodeOld + 1;
						if($kodeNew>=1000){
							$kode_bk = "BK-";
						}
						else if($kodeNew>=100){
							$kode_bk = "BK-0";
						}
						else if($kodeNew>=10){
							$kode_bk = "BK-00";
						}
						else{
							$kode_bk = "BK-000";
						}
						
						echo "<input type='text' name='kd_buku' class='teks' value='$kode_bk$kodeNew' readonly></td>";
					?>
			</tr>
			<tr>
				<td>Judul Buku</td>
			</tr>
			<tr>
				<td><input type="text" name="judul_buku" class="teks" autofocus required></td>
			</tr>
			<tr>
				<td>Pengarang</td>
			</tr>
			<tr>
				<td><input type="text" name="pengarang" class="teks"></td>
			</tr>
			<tr>
				<td>Penerbit</td>
			</tr>
			<tr>
				<td><input type="text" name="penerbit" class="teks"></td>
			</tr>
			<tr>
				<td>Tahun</td>
			</tr>
			<tr>
				<td>
					<select name="tahun" class="select">
						<?php
							$thn=2030;
							for ($i=0; $i < 80; $i++) { 
								echo "<option value='$thn'>$thn</option>";
								$thn = $thn - 1;
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Stok</td>
			</tr>
			<tr>
				<td><input type="number" name="stok" class="teks" required placeholder="0"></td>
			</tr>
			<tr>
				<td>Gambar Sampul</td>
			</tr>
			<tr>
				<td><input type="file" name="gambar"></td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="simpan" value="Simpan" class="btn-a">
					<input type="reset" name="reset" class="btn-b">
					<a href="index.php?m=view&p=buku">
						<input type="button" name="batal" value="Batal" class="btn-b">
					</a>
				</td>
			</tr>
		</table>
	</form>
</div>