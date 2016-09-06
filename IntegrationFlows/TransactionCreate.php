 <?php
require_once '../Codebase/autoload.php';
$crunched = new CustomerAndPaymentMethodCruncher($_POST);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Transaction Create</title>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<link rel="stylesheet" type="text/css"  href="../css/style.css"/>
	<script type="text/javascript" src="../js/FormFiddler.js"></script>
</head>
<body>
	<form id="transactioncreateform" method="post" action="Final.php">
		<div id="body">
			<div id="banner">
				<h2 type="bannertext">Next Step; create a transaction</h2>
			</div>

			<div id="contentbox">
				<div id="banner">
					<h2 type="bannertext">Transaction Parameters</h2>
				</div>

				<div class="maindiv">
					<input type="checkbox" class="checkbox" checked>
					<p class="text">Amount:</p> 
					<input name="amount" value="100.00" class="input">
				</div>
			</div>

			<div id="contentbox">

				<div id="banner">
					<h2 type="bannertext">Transaction Option Parameters</h2>
				</div>

				<div class="maindiv">
					<p class="text" style="display: inline-block;margin-top: 5px">Submit For Settlement? (true):</p> 
					<input name="submitForSettlement" value="1" hidden>
				</div>
			</div>
				<input hidden name="paymentMethodToken" value=<?php echo $your_payment_method_token ?>>
			</div>
			<input type="submit" class="button" value="Transaction Sale">

			<div class="maindiv"">
				<a href="../index.php" class="button">Restart<a/>
			</div>
		</div>		
	</form>
</body>
</html>

