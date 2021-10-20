<?php
	$sql = mysqli_fetch_array(mysqli_query($con, "select id_manajemen from manajemen where username = '$_SESSION[username]'"));
	echo "<span class='glyphicon glyphicon-user'></span>$_SESSION[username]";
?>