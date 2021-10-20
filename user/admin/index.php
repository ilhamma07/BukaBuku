</!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
	<?php 
		include "../../config/koneksi/koneksi.php";
		include "../../config/security/security.php";
	?>
	<link rel="stylesheet" type="text/css" href="../../config/css/internal-css.css">
	<link rel="stylesheet" type="text/css" href="../../config/css/internal-menu.css">
	<link rel="stylesheet" type="text/css" href="../../config/css/icon.css">

<body>
	<div id="nav">
		<div id="header"><span class="glyphicon glyphicon-signal"></span>BukaBuku</div>
		<div id="profile"><?php include "profile.php";?></div>
	</div>
	<div id="sidebar">
		<div id="menu"><?php include "menu.php";?></div>	
		<div id="footer"><center>Hak Cipta &copy 2019 | BukaBuku</div>
	</div>
	<div id='row'>
		<a href='index.php' class='a-blue'><span class='glyphicon glyphicon-home'></span></a> /
		<?php
			if (!isset($_REQUEST['p'])) {
				echo "Dashboard";
			}
			else {
				$ex = explode("_", $_REQUEST['p']);
				for($i = 0; $i < count($ex);$i++){
					echo ucwords($ex[$i])." ";
				}	
			}
		?>
	</div>
	<div id='content'>
		<?php
			if(isset($_GET['p'])){
				$module = $_GET['m'];
				$page = $_GET['p'];
				include $module."/".$page.".php";
			}
			else {
				include "home.php";
			}
		?>
	</div>
</body>
</html>