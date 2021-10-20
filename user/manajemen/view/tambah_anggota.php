<h1>Tambah Data Anggota</h1>
<br>
<div class="panel">
	<form action="index.php?m=modul&p=simpan_anggota" method="post" class="form" enctype="multipart/form-data">
		<table>
			<tr>
				<td>ID Anggota</td>
			</tr>
			<tr>
				<td>
					<?php
						$kode = mysqli_fetch_array(mysqli_query($con, "select substring(id_anggota, 5) from anggota order by id_anggota desc limit 1"));
						$kodeOld = $kode[0];
						$kodeNew = $kodeOld + 1;
						if($kodeNew>=1000){
							$kode_bk = "AGT-";
						}
						else if($kodeNew>=100){
							$kode_bk = "AGT-0";
						}
						else if($kodeNew>=10){
							$kode_bk = "AGT-00";
						}
						else{
							$kode_bk = "AGT-000";
						}
						
						echo "<input type='text' name='id_anggota' class='teks' value='$kode_bk$kodeNew' readonly></td>";
					?>
				</td>
			</tr>
			<tr>
				<td>Nama Anggota</td>
			</tr>
			<tr>
				<td><input type="text" name="nama_anggota" class="teks" required></td>
			</tr>
			<tr>
				<td>Tanggal Lahir</td>
			</tr>
			<tr>
				<td><input type="date" name="tgl_lahir" class="teks" required></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
			</tr>
			<tr>
				<td>
					<select name="jenkel" class="teks">
						<option value="L">Laki - Laki</option>
						<option value="P">Perempuan</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Alamat</td>
			</tr>
			<tr>
				<td>
					<textarea name="alamat" class="teks" required></textarea>
				</td>
			</tr>
			<tr>
				<td>Nomor Hp</td>
			</tr>
			<tr>
				<td><input type="number" name="no_hp" class="teks" required></td>
			</tr>
			<tr>
				<td>Foto Diri</td>
			</tr>
			<tr>
				<td><input type="file" name="gambar"></td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="simpan" value="Simpan" class="btn-a">
					<input type="reset" name="reset" class="btn-b">
					<a href="index.php?m=view&p=anggota">
						<input type="button" name="batal" value="Batal" class="btn-b">
					</a>
				</td>
			</tr>
		</table>
	</form>
</div>