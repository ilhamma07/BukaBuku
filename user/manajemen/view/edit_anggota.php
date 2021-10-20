<h1>Edit Data Anggota</h1>
<br>
<div class="panel">
	<?php
		$kd = $_REQUEST['id_anggota'];
		$sql = mysqli_query($con, "select * from anggota where id_anggota = '$kd'");
		$dataAnggota = mysqli_fetch_array($sql);
		echo "
			<form action='index.php?m=modul&p=update_anggota' method='post' class='form' enctype='multipart/form-data'>
				<table>
					<tr>
						<td>ID Anggota</td>
					</tr>
					<tr>
						<td><input type='text' name='id_anggota' class='teks' value='$dataAnggota[id_anggota]' readonly></td>
					</tr>
					<tr>
						<td>Nama Anggota</td>
					</tr>
					<tr>
						<td><input type='text' name='nama_anggota' class='teks' value='$dataAnggota[nama_anggota]' autofocus></td>
					</tr>
					<tr>
						<td>Tanggal Lahir</td>
					</tr>
					<tr>
						<td><input type='date' name='tgl_lahir' class='teks' value='$dataAnggota[tgl_lahir]'></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
					</tr>
					<tr>
						<td>
							<select name='jenkel' class='teks'>";
							if($dataAnggota[jenkel] = 'L'){
								echo "	<option value='L' selected>Laki - Laki</option>
										<option value='P'>Perempuan</option>		
								";
							}
							else {
								echo "	<option value='L'>Laki - Laki</option>
										<option value='P' selected>Perempuan</option>";
							}	
								
							echo"</select>
						</td>
					</tr>
					<tr>
						<td>Alamat</td>
					</tr>
					<tr>
						<td>
							<textarea name='alamat' class='teks'>$dataAnggota[alamat]</textarea>
						</td>
					</tr>
					<tr>
						<td>Nomor Hp</td>
					</tr>
					<tr>
						<td><input type='number' name='no_hp' class='teks' value='$dataAnggota[no_hp]'></td>
					</tr>
					<tr>
						<td>Foto Diri</td>
					</tr>
					<tr>
						<td><input type='file' name='gambar'></td>
					</tr>
					<tr>
						<td>
							<input type='submit' name='simpan' value='Simpan' class='btn-a'>
							<input type='reset' name='reset' class='btn-b'>
							<a href='index.php?m=view&p=anggota'>
								<input type='button' name='batal' value='Batal' class='btn-b'>
							</a>
						</td>
					</tr>
				</table>
			</form>
		";
	?>
</div>