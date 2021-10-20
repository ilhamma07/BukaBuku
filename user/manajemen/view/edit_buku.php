<h1>Edit Data Buku</h1>
<br>
<div class="panel">
	<?php 
		$kd = $_REQUEST['kd_buku'];
		$sql = mysqli_query($con, "select * from buku where kd_buku = '$kd'");
		$dataBuku = mysqli_fetch_array($sql);
		echo "
			<form action='index.php?m=modul&p=update_buku' method='post' class='form' enctype='multipart/form-data'>
				<table>
					<tr>
						<td>Kode Buku</td>
					</tr>
					<tr>
						<td><input type='text' name='kd_buku' class='teks' readonly value='$dataBuku[kd_buku]'></td>
					</tr>
					<tr>
						<td>Judul Buku</td>
					</tr>
					<tr>
						<td><input type='text' name='judul_buku' class='teks' autofocus value='$dataBuku[judul_buku]'></td>
					</tr>
					<tr>
						<td>Pengarang</td>
					</tr>
					<tr>
						<td><input type='text' name='pengarang' class='teks' value='$dataBuku[pengarang]'></td>
					</tr>
					<tr>
						<td>Penerbit</td>
					</tr>
					<tr>
						<td><input type'text' name='penerbit' class='teks' value='$dataBuku[penerbit]'></td>
					</tr>
						<tr>
						<td>Tahun</td>
					</tr>
					<tr>
						<td>
							<select name='tahun' class='select'>";
								$thn=1950;
									for ($i=0; $i < 80; $i++) { 
										if($dataBuku[tahun] == $thn){
											echo "<option value='$thn' selected>$thn</option>";
										}
										else {
											echo "<option value='$thn'>$thn</option>";
										}
									$thn = $thn + 1;
									}
							echo"</select>
						</td>
					</tr>
					<tr>
						<td>Stok</td>
					</tr>
					<tr>
						<td><input type='number' name='stok' class='teks' value='$dataBuku[stok]'></td>
					</tr>
					<tr>
						<td>Gambar Sampul</td>
					</tr>
					<tr>
						<td><input type='file' name='gambar'></td>
					</tr>
					<tr>
						<td>
							<input type='submit' name='simpan' value='Update' class='btn-a'>
							<input type='reset' name='reset' class='btn-b'>
							<a href='index.php?m=view&p=buku'>
								<input type='button' name='batal' value='Batal' class='btn-b'>
							</a>
						</td>
					</tr> 
				</table>
			</form>
		";
	?>
</div>