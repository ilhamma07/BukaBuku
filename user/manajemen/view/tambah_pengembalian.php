<h1>Tambah Data Pengembalia</h1>
<br>
<div class="panel">
	<form action="index.php?m=modul&p=simpan_pengembalian" method="post" class="form">
		<table>
			<tr>
				<td>Kode Pengembalian</td>
			</tr>
			<tr>
				<td>
					<?php
						$kode = mysqli_fetch_array(mysqli_query($con, "select substring(kd_pengembalian, 5) from pengembalian order by kd_pengembalian desc limit 1"));
						$kodeOld = $kode[0];
						$kodeNew = $kodeOld + 1;
						if($kodeNew>=1000){
							$kode_pjm = "KBL-";
						}
						else if($kodeNew>=100){
							$kode_pjm = "KBL-0";
						}
						else if($kodeNew>=10){
							$kode_pjm = "KBL-00";
						}
						else{
							$kode_pjm = "KBL-000";
						}
						
						echo "<input type='text' name='kd_kembali' class='teks' value='$kode_pjm$kodeNew' readonly></td>";
					?>
			</tr>
			<tr>
				<td>Kode Peminjaman</td>
			</tr>
			<tr>
				<td>
					<select name="kd_pinjam" class="teks">
						<option value="">Kode Pemninjaman</option>
						<?php
							$pnj = mysqli_query($con, "select kd_peminjaman, kd_buku, id_anggota from peminjaman");
							while ($dtpnj = mysqli_fetch_array($pnj)) {
								$bk = mysqli_fetch_array(mysqli_query($con, "select judul_buku from buku where kd_buku = '$dtpnj[kd_buku]'"));
								$agt = mysqli_fetch_array(mysqli_query($con, "select nama_anggota from anggota where id_anggota = '$dtpnj[id_anggota]'"));
								$cek = mysqli_num_rows(mysqli_query($con, "select kd_peminjaman from pengembalian where kd_peminjaman = '$dtpnj[kd_peminjaman]'"));
								if($cek == 0){
									echo "<option value='$dtpnj[kd_peminjaman]'>$dtpnj[kd_peminjaman] , $dtpnj[kd_buku] : $bk[judul_buku] - $dtpnj[id_anggota] : $agt[nama_anggota]</option>";
								}
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Tanggal Pengembalian</td>
			</tr>
			<tr>
				<td><input type="date" name="tgl_kembali" class="teks" value="<?php echo date("Y-m-d");?>"></td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="simpan" value="Simpan" class="btn-a">
					<input type="reset" name="reset" class="btn-b">
					<a href="index.php?m=view&p=pengembalian">
						<input type="button" name="batal" value="Batal" class="btn-b">
					</a>
				</td>
			</tr>
		</table>
	</form>
</div>