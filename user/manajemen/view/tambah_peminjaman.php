<h1>Tambah Data Peminjaman</h1>
<br>
<div class="panel">
	<form action="index.php?m=modul&p=simpan_peminjaman" method="post" class="form">
		<table>
			<tr>
				<td>Kode Peminjaman</td>
			</tr>
			<tr>
				<td>
					<?php
						$kode = mysqli_fetch_array(mysqli_query($con, "select substring(kd_peminjaman, 5) from peminjaman order by kd_peminjaman desc limit 1"));
						$kodeOld = $kode[0];
						$kodeNew = $kodeOld + 1;
						if($kodeNew>=1000){
							$kode_pjm = "PJM-";
						}
						else if($kodeNew>=100){
							$kode_pjm = "PJM-0";
						}
						else if($kodeNew>=10){
							$kode_pjm = "PJM-00";
						}
						else{
							$kode_pjm = "PJM-000";
						}
						
						echo "<input type='text' name='kd_pinjam' class='teks' value='$kode_pjm$kodeNew' readonly></td>";
					?>
			</tr>
			<tr>
				<td>Kode Buku</td>
			</tr>
			<tr>
				<td>
					<select name="kd_buku" class="teks">
						<option value="">Kode Buku</option>
						<?php
							$bk = mysqli_query($con, "select kd_buku, judul_buku, pengarang from buku");
							while ($dtbk = mysqli_fetch_array($bk)) {
								echo "<option value='$dtbk[kd_buku]'>$dtbk[kd_buku] , $dtbk[judul_buku] - $dtbk[pengarang]</option>";
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>ID Anggota</td>
			</tr>
			<tr>
				<td>
					<select name="id_anggota" class="teks">
						<option value="">ID Anggota</option>
						<?php
							$agt = mysqli_query($con, "select * from anggota");
							while ($dtagt = mysqli_fetch_array($agt)) {
								echo "<option value='$dtagt[id_anggota]'>$dtagt[id_anggota] , $dtagt[nama_anggota]</option>";
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Tanggal Peminjaman</td>
			</tr>
			<tr>
				<td><input type="date" name="tgl_pinjam" class="teks" value="<?php echo date("Y-m-d");?>"></td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="simpan" value="Simpan" class="btn-a">
					<input type="reset" name="reset" class="btn-b">
					<a href="index.php?m=view&p=peminjaman">
						<input type="button" name="batal" value="Batal" class="btn-b">
					</a>
				</td>
			</tr>
		</table>
	</form>
</div>