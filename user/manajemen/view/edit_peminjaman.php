<h1>Edit Data Anggota</h1>
<br>
<div class="panel">
	<?php 
		$kd = $_REQUEST['kd_peminjaman'];
		$sql = mysqli_query($con, "select * from peminjaman where kd_peminjaman = '$kd'");
		$dataPeminjaman = mysqli_fetch_array($sql);
		echo "<form action='index.php?m=modul&p=update_peminjaman' method='post' class='form'>
				<table>
					<tr>
						<td>Kode Peminjaman</td>
					</tr>
					<tr>
						<td>
							<input type='text' name='kd_pinjam' class='teks' value='$dataPeminjaman[kd_peminjaman]' readonly></td>
					</tr>
					<tr>
						<td>Kode Buku</td>
					</tr>
					<tr>
						<td>
							<select name='kd_buku' class='teks'>
								<option value=''>Kode Buku</option>";

									$bk = mysqli_query($con, "select kd_buku, judul_buku, pengarang from buku");
									while ($dtbk = mysqli_fetch_array($bk)) {
										if ($dtbk[kd_buku] == $dataPeminjaman[kd_buku]) {
											echo "<option value='$dtbk[kd_buku]' selected>$dtbk[kd_buku] , $dtbk[judul_buku] - $dtbk[pengarang]</option>";
										}
										else {
											echo "<option value='$dtbk[kd_buku]'>$dtbk[kd_buku] , $dtbk[judul_buku] - $dtbk[pengarang]</option>";
										}	
									}
					echo "</select>
				</td>
			</tr>
			<tr>
				<td>ID Anggota</td>
			</tr>
			<tr>
				<td>
					<select name='id_anggota' class='teks'>
						<option value=''>ID Anggota</option>";

							$agt = mysqli_query($con, "select * from anggota");
							while ($dtagt = mysqli_fetch_array($agt)) {
								if($dtagt[id_anggota] == $dataPeminjaman[id_anggota]){
									echo "<option value='$dtagt[id_anggota]' selected>$dtagt[id_anggota] , $dtagt[nama_anggota]</option>";
								}
								else {
									echo "<option value='$dtagt[id_anggota]'>$dtagt[id_anggota] , $dtagt[nama_anggota]</option>";
								}
							}
					echo "</select>
				</td>
			</tr>
			<tr>
				<td>Tanggal Peminjaman</td>
			</tr>
			<tr>
				<td><input type='date' name='tgl_pinjam' class='teks' value='$dataPeminjaman[tgl_pinjam]'></td>
			</tr>
			<tr>
				<td>
					<input type='submit' name='simpan' value='Simpan' class='btn-a'>
					<input type='reset' name='reset' class='btn-b'>
					<a href='index.php?m=view&p=peminjaman'>
						<input type='button' name='batal' value='Batal' class='btn-b'>
					</a>
				</td>
			</tr>
		</table>
	</form>
		";
	?>	
</div>