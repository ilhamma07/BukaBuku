</!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
	<?php include "config/koneksi/koneksi.php";?>
	<link rel="stylesheet" type="text/css" href="config/css/external-css.css">
	<link rel="stylesheet" type="text/css" href="config/css/external-menu.css">
	<link rel="stylesheet" type="text/css" href="config/css/icon.css">

<body>
	<div id="nav">
		<div id="header"><a href="index.php"><span class="glyphicon glyphicon-signal"></span>BukaBuku</a></div>
		<div id="menu"><?php include "menu.php";?></div>
	</div>
	<div id="wrapper">
		<div id="content">
			<?php
				if(isset($_GET['p'])){
					$page = $_GET['p'];
					include $page.".php";
				}
				else {
					include "home.php";
				}
			?>
		</div>
	</div>
	<div id="footer">
		<div class="footer1">
			AKADEMI
			<br><br><a href="https://uniku.ac.id/" class="a-footer">Universitas Kuningan</a>
			<br><a href="" class="a-footer">SMK PUI Cikijing</a>

		</div>
		<div class="footer2">
			PARTNER
			<br><br><a href="https://tekno4school.blogspot.com/" class="a-footer">Tekno4school</a>
		</div>
		<div class="footer3"><center>Hak Cipta &copy 2019 | BukaBuku</div>
	</div>
</body>
</html>