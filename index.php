 <?php
require_once 'Codebase/autoload.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Client Token</title>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<link rel="stylesheet" type="text/css"  href="css/style.css"/>
	<script type="text/javascript" src="js/FormFiddler.js"></script>
</head>
<body>
	<form id="clienttokenform" method="post" action="IntegrationFlows/CustomerCreate.php">
		<div id="body">
			<div id="banner">
				<h2 type="bannertext">Make The Client Token</h2>
			</div>

			<div id="contentbox">
				<div id="banner">
					<h3 type="bannertext">Token Parameters</h3>
				</div>
				<div id="maindiv">
					<input type="checkbox" class="checkbox" unchecked> 
					<p class="text">Customer ID:</p>
					<input name="customerId" value="" class="input" name="Customer_Id" disabled>
				</div>

				<div class="maindiv">
					<input type="checkbox" class="checkbox" unchecked>
					<p class="text">Merchant Account ID:</p> 
					<input name="merchantAccountId" value="" class="input" disabled>
				</div>
				<!-- Deprecated Values 
				<div class="maindiv">
					<input type="checkbox" class="checkbox" unchecked>
					<p class="text">SEPA Mandate Acceptance Location:</p> 
					<input name="sepaMandateAcceptanceLocation" value="" class="input" disabled>
				</div>

				<div class="maindiv">
					<input type="checkbox" class="checkbox" unchecked>
					<p class="text">SEPA Mandate Type:</p> 
					<input name="sepaMandateType" value="" class="input" disabled>
				</div>
				-->
				<div class="maindiv">
					<input type="checkbox" class="checkbox" unchecked>
					<p class="text">Version:</p> 
					<input name="version" value="2" class="input" disabled>
				</div>
			</div>
				<div id="contentbox">
					<div id="banner">
						<h3 type="bannertext">Option Parameters</h3>
					</div>
					<div class="maindiv">
						<input type="checkbox" class="checkbox" unchecked>
						<p class="text">Make Default:</p> 
						<input name="makeDefault" value="1" class="input" disabled>
					</div>
					<div class="maindiv">
						<input type="checkbox" class="checkbox" unchecked>
						<p class="text">Verify Card:</p> 
						<input name="verifyCard" value="1" class="input" disabled=>
					</div>
					<div class="maindiv">
						<input type="checkbox" class="checkbox" unchecked>
						<p class="text">Fail On Duplicate Payment Method:</p> 
						<input name="failOnDuplicatePaymentMethod" value="1" class="input" disabled>
					</div>
				</div>
			<input type="submit" class="button" value="HF v2 Customer+PaymentMethod Create">
		</div>
	</form>
</body>
</html>