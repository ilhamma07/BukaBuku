<script type="text/javascript">
	function Cek() {
		var pass1 = document.getElementById('pass1').value;
		var pass2 = document.getElementById('pass2').value;
		if (pass1 != pass2) {
			alert ("Password tidak sesuai");
		}
	}
</script>
<h1>Edit Data Manajemen</h1>
<br>
<div class="panel">
	<?php
		$kd = $_REQUEST['id_manajemen'];
		$sql = mysqli_query($con, "select * from manajemen where id_manajemen = '$kd'");
		$dataManajemen = mysqli_fetch_array($sql);
		echo "
			<form action='index.php?m=modul&p=update_manajemen' method='post' class='form' enctype='multipart/form-data'>
				<table>
					<tr>
						<td>ID Manajemen</td>
					</tr>
					<tr>
						<td>
							<input type='text' name='id_manajemen' class='teks' value='$dataManajemen[id_manajemen]' readonly></td>
						</td>
					</tr>
					<tr>
						<td>Nama Manajemen</td>
					</tr>
					<tr>
						<td><input type='text' name='nama_manajemen' class='teks' value='$dataManajemen[nama_manajemen]' required></td>
					</tr>
					<tr>
						<td>Tanggal Lahir</td>
					</tr>
					<tr>
						<td><input type='date' name='tgl_lahir' class='teks' value='$dataManajemen[tgl_lahir]' required></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
					</tr>
					<tr>
						<td>
							<select name='jenkel' class='teks'>";
							if ($dataManajemen[jenkel] == 'L') {
								echo "<option value='L' selected>Laki - Laki</option>
									<option value='P'>Perempuan</option>";
							}
							else {
								echo "<option value='L'>Laki - Laki</option>
									<option value='P'>Perempuan</option>";
							}
							echo "</select>
						</td>
					</tr>
					<tr>
						<td>Alamat</td>
					</tr>
					<tr>
						<td>
							<textarea name='alamat' class='teks' required>$dataManajemen[alamat]</textarea>
						</td>
					</tr>
					<tr>
						<td>Nomor Hp</td>
					</tr>
					<tr>
						<td><input type='number' name='no_hp' class='teks' value='$dataManajemen[no_hp]' required></td>
					</tr>
					<tr>
						<td>Username</td>
					</tr>
					<tr>
						<td><input type='text' name='user' class='teks' value='$dataManajemen[username]' required></td>
					</tr>
					<tr>
						<td>Password</td>
					</tr>
					<tr>
						<td><input type='password' name='pass1' id='pass' class='teks' required></td>
					</tr>
					<tr>
						<td>Foto Diri</td>
					</tr>
					<tr>
						<td><input type='file' name='gambar'></td>
					</tr>
					<tr>
						<td>
							<input type='submit' name='simpan' value='Simpan' class='btn-a' onclick='Cek();'>
							<input type='reset' name='reset' class='btn-b'>
							<a href='index.php?m=view&p=manajemen'>
								<input type='button' name='batal' value='Batal' class='btn-b'>
							</a>
						</td>
					</tr>
				</table>
			</form>
		";
	?>
</div>