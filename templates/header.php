<?php
// pre html functions.. get rid of getaddress.php, retaddress.php

// todo: session based anti request-spam system ..

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>DogeCoin Wallet!</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="http://code.jquery.com/jquery-2.0.3.min.js" /></script>
	<script src="js/bootstrap.min.js" /></script>
	<script src="js/functions.js" /></script>
	<link rel="shortcut icon" href="favicon.ico">
</head>
<body>
	<div class="topbar">
		<div class="fill">
			<div class="container">
				<a class="brand" href="/">InstaDoge Wallet</font><font style="font-size: 9px; "></font> </a>
				<ul class="nav">
				<?			
				mnu_btn("index.php", "Home", "index.php");
				if (isset($_SESSION["key"]))
				mnu_btn("vault?key=$_SESSION[key]", "My Vault");		
				foreach ($adminips as $allowed) {
					if ($_SERVER['REMOTE_ADDR'] == $allowed) {
						mnu_btn("server", "Server");
						break;
					}												
				}							 
				if ($_SESSION["key"])
				mnu_btn("logout", "Logout");
				?>
				</ul>
				<form action="" class="pull-right">
				<input class="input-small" type="text" placeholder="Switch key.." style="width: 150px;">
				</form>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="content">
		<!-- END HEADER.PHP -->
		<?php 
		if ($maintenance == true && !in_array($_SERVER['REMOTE_ADDR'], $adminips)) {			
			include("./maintenance.php");				
			include("footer.php");
			die();
		}
		?>