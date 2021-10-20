<center><h1>Dafar Buku</h1></center>
<div class="panel">
	<center>
	<table>
		<?php
			$sql = mysqli_query($con, "select * from buku");
			$jml = mysqli_num_rows($sql);
			$jml = $jml/2;
			$batas = 3;
			for($i = 0; $i < $jml; $i++){
				if(empty($pg)) {
        	    	$posisi=0;
        	    	$pg=1;
        		}
        		else {
        	   		$posisi=($pg-1)*$batas;
        		}
        		if($pg%2==0){
        			echo "<tr>";
        		}
        		$sql2 = mysqli_query($con, "select * from buku limit $posisi,$batas");
				while ($data = mysqli_fetch_array($sql2)) {
					echo "
						<td>
							<table  class='daftar'>	
								<tr>
									<td colspan='3' height='100px' align='center'><img src='image/site/buku/$data[foto]' class ='img_buku'></td>
								</tr>
								
								<tr>
									<td width='90px'>Judul Buku</td>
									<td>:</td>
									<td>$data[judul_buku]</td>
								</tr>
								<tr>
									<td>Pengarang</td>
									<td>:</td>
									<td>$data[pengarang]</td>
								</tr>
								<tr>
									<td>Penerbit</td>
									<td>:</td>
									<td>$data[penerbit], $data[tahun]</td>
								</tr>
								<tr>
									<td>Buku Tersedia</td>
									<td>:</td>
									<td>$data[tersedia]</td>
								</tr>
							</table>
						<td>
					";	
				}
				if($pg%2==0){
        			echo "</tr>";
        		}
				$pg = $pg+1;
			}
		?>
	</table>
</div>