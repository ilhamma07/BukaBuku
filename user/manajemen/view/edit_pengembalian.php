<h1>Edit Data Pengembalia</h1>
<br>
<div class="panel">
	<?php 
		$kd = $_REQUEST['kd_pengembalian'];
		$sql = mysqli_query($con, "select * from pengembalian where kd_pengembalian = '$kd'");
		$dataPengembalian = mysqli_fetch_array($sql);
		echo "<form action='index.php?m=modul&p=update_pengembalian' method='post' class='form'>
				<table>
					<tr>
						<td>Kode Pengembalian</td>
					</tr>
					<tr>
						<td><input type='text' name='kd_kembali' class='teks' value='$dataPengembalian[kd_pengembalian]' readonly></td>
					</tr>
					<tr>
						<td>Kode Peminjaman</td>
					</tr>
					<tr>
						<td>
							<select name='kd_pinjam' class='teks'>
								<option value=''>Kode Pemninjaman</option>";
									$pnj = mysqli_query($con, 'select kd_peminjaman, kd_buku, id_anggota from peminjaman');
									while ($dtpnj = mysqli_fetch_array($pnj)) {
										$bk = mysqli_fetch_array(mysqli_query($con, "select judul_buku from buku where kd_buku = '$dtpnj[kd_buku]'"));
										$agt = mysqli_fetch_array(mysqli_query($con, "select nama_anggota from anggota where id_anggota = '$dtpnj[id_anggota]'"));
										if ($dataPengembalian[kd_peminjaman] == $dtpnj[kd_peminjaman]) {
											echo "<option value='$dtpnj[kd_peminjaman]' selected>$dtpnj[kd_peminjaman] , $dtpnj[kd_buku] : $bk[judul_buku] - $dtpnj[id_anggota] : $agt[nama_anggota]</option>";
										}
										else {
											echo "<option value='$dtpnj[kd_peminjaman]'>$dtpnj[kd_peminjaman] , $dtpnj[kd_buku] : $bk[judul_buku] - $dtpnj[id_anggota] : $agt[nama_anggota]</option>";
										}
									}
							echo "</select>
						</td>
					</tr>
					<tr>
						<td>Tanggal Pengembalian</td>
					</tr>
					<tr>
						<td><input type='date' name='tgl_kembali' class='teks' value='$dataPengembalian[tgl_kembali]'></td>
					</tr>
					<tr>
						<td>
							<input type='submit' name='simpan' value='Simpan' class='btn-a'>
							<input type='reset' name='reset' class='btn-b'>
							<a href='index.php?m=view&p=pengembalian'>
								<input type='button' name='batal' value='Batal' class='btn-b'>
							</a>
						</td>
					</tr>
				</table>
			</form>
		";
	?>
</div>