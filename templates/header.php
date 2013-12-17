<?php
// pre html functions.. get rid of getaddress.php, retaddress.php

// todo: session based anti request-spam system ..

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>DogeCoin instaWallet!</title>
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Le styles -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
		<script src="js/bootstrap.js" /></script>


		<!-- Le fav and touch icons -->
		<link rel="shortcut icon" href="favicon.ico">
	</head>
	<body>
		<div class="topbar">
			<div class="fill">
				<div class="container">
					<a class="brand" href="/">Dogecoin Wallet</font><font style="font-size: 9px; "></font> </a>
					<ul class="nav">
					<?
					// menu					
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
					<!--<form action="" class="pull-right">
					<input class="input-small" type="text" value="Switch key.." style="width: 150px;">
					</form>-->
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
			// put something here to tell admin that its active so dosnt forget... 
			?>