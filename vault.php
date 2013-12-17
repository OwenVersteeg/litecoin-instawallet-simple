<?
include ("core/wallet.php");

if ($_GET ['key'] && $addr->verKey ( $_GET ['key'] )) {
	$ltcaddr = $addr->verKey ( $_GET ['key'] );
	if (! isset ( $_SESSION ["key"] )) {
		$_SESSION ["key"] = $_GET ["key"];
		header ( "location: vault?key=" . $_GET ["key"] );
	}
} else
	$ltcaddr = "Error";

include ('templates/header.php');

// index page
?>

<div class="page-header">
	<h1 align="center">
		<? echo "{$ltcaddr}"; ?>
	</h1>
</div>
<div class="row">
	<div class="span10">
<?php
if ($_GET ['key']) {
	if ($addr->verKey ( $_GET ['key'] )) {
		$ltcaddr = $addr->verKey ( $_GET ['key'] );
		// sets/updates
		// session_key with
		// valid provided ...
		if ($_POST ['amount'] && $_POST ['address']) {
			try {
				$addr->sanitizedSend ( $_POST ['address'], $ltcaddr, $_GET ['key'], str_replace ( ",", ".", $_POST ['amount'] ) );
				echo '<div class="alert-message success" data-alert="alert"><a class="close" onclick="\$().alert()" href="#">&times</a><p>Successfully sent ' . $_POST ['amount'] . " DOGE to " . $_POST ['address'] . '</p></div>';
			} catch ( Exception $erar ) {
				switch ($erar->getMessage ()) {
					
					case "INVALID_AMT" :
						echo srserr ( "What sort-of amount is that!? Trying to exploit?" );
						break;
					case "INVALID_ADDR" :
						echo srserr ( "Sending {$_POST['amount']} to {$_POST['address']} failed: Invalid litecoin address" );
						break;
					case "SEND_FAILED" :
						echo srserr ( "Sending {$_POST['amount']} to {$_POST['address']} failed: Not enough funds in your account, if you are SURE you have enough money, please contact an admin" );
						break;
					case "LOW_BALANCE" :
						echo srserr ( "Sending {$_POST['amount']} to {$_POST['address']} failed: Not enough funds in your account, Remember some transactions require a 2% transaction fee, if you are SURE you have enough money, please contact an admin" );
						break;
					default :
						echo srserr ( "Well fuck, something bad happened...and my script hasn't detected why, please contact an admin IMMEDIETLY" );
				}
			}
		}
		
		echo srsnot ( "<strong>IMPORTANT!</strong> DO <strong>NOT</strong> LOSE THIS LINK, IT IS LINKED TO YOUR ACCOUNT, IF YOU LOSE THIS LINK, YOU HAVE LOST ACCESS TO YOUR ACCOUNT AND WE WILL NOT BE ABLE TO RETRIEVE IT FOR YOU... <br>
		<br>
		<center><a href=http://instadoge.net/vault?key={$_GET['key']} style=\"font-size: 12px;\">http://instadoge.net/vault?key={$_GET['key']}</a> (ctrl+b to bookmark)</center>" );
		?>
		<p><h2>Balance: <? echo $addr->ltc->getbalance ( $_GET ['key'], 3 ) ?> </h2><i style='font-size: 9px; padding-top:0px;margin-top:0px;'>Deposits updated after 3 confirms, 2% of transaction added for fee</i></p>
		<h4>Send DOGE:</h4>

		<form action='' method='POST'>
        <table>

        <tr>
        <td><label>Address:</label></td>
		<td colspan='2'><input style='display:block; width:100%' type='text' id='address' name='address' required=''></td>
		</tr>

		<tr>
		<td><label>Amount:</label></div></td>
		<td><input type='text' id='amount' name='amount' required='' onchange='calculateWithdrawal(0.0001, 8);' onkeypress='this.onchange();' onpaste='this.onchange();' oninput='this.onchange();'></td>
		</tr>

		<tr>
		<td><div ><label>Fee:</label>
		</div></td><td><input type='text' id='transferfee' name='transferfee' readonly>
		</td>

		<tr>
		<td><div ><label>Total DOGE:</label>
		</div></td><td><input type='text' id='totalfunds' name='totalfunds' readonly>
		</td>

		</tr><tr><td colspan='3'><input type='submit' class='btn success'value='SEND'/></td></tr>
		</tbody>
		</table>
		</form>
		
		
		<br> <br>
		<table style="width: 560px;">
			<thead>
				<tr>
					<td>
						<h4>Security:</h4>
						<i>This will require you to enter a password every every time you want to access your vault</i>
					</td>
				</tr>
			</thead>
			<tr>
				<td style="border: 0px;">
					<form class='form-stacked'>
						<label for="pass">Set A Password</label>
						<input type='password'id='pass' name='pass' /><br>
						<label for="pass2">Retype</label>
						<input type='password'id='pass2' name='pass2'/>
						<input type='submit' class='btn success' value='SET' />
						<br>
						

					</form>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
		</table>
				<?
		
		echo "<h4>Your last 15 transactions:</h4>";
		
		echo "<div style=\"margin-right: 20px;\"><table class='bordered-table condensed-table zebra-striped'><tr><td>Confirms</td><td>Transaction ID</td><td>Amount</td><td>Fee</td></tr>";
		
		$dump = array_reverse ( $addr->ltc->listtransactions ( $_GET ['key'], "15" ) );
		
		foreach ( $dump as $herp ) {
			if ($herp ['account'] == $_GET ['key']) {
				echo "<tr><td>" . $herp ['confirmations'] . "</td><td><input type='text' value='" . $herp ['txid'] . "' style='margin: 0px; width:360px;'/></td><td>" . $herp ['amount'] . "</td><td>" . ($herp ['fee'] ? $herp ['fee'] : 0) . "</td></tr>";
			}
		}
		echo "</table></div>";
		$addr->PDO_Conn = NULL;
	
	} else {
		echo srserr ( "INVALID KEY..." );
	}
} else {
	echo srserr ( "Why are you on this page? You haven't even set a key..." );
}
?>
          </div>


<?

include ("templates/sidebar.php");
include ('templates/footer.php');