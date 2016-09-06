 <?php
require_once '../Codebase/autoload.php';

new ClientTokenCruncher($_POST);

$clientToken = Braintree_ClientToken::generate(
$client_token_parameters
);

$decoded_token = json_decode(base64_decode($clientToken));

?>
<!DOCTYPE html>
<html>
<head>
	<title>Customer Create</title>
	<script src="https://js.braintreegateway.com/js/braintree-2.27.0.min.js"></script>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<link rel="stylesheet" type="text/css"  href="../css/style.css"/>
	<script type="text/javascript" src="../js/FormFiddler.js"></script>
</head>
<body>
	<button id="revealbutton" class="button">Reveal Decoded Client Token</button>
	<div id="revealcontents" style="white-space: pre-wrap;width: 80%" hidden>
		<pre><?php print_r($decoded_token );?></pre>
	</div>
	<br>
	<form id="customercreateform" method="post" action="TransactionCreate.php">
		<div id="body">
			<div id="banner">
				<h2 type="bannertext">Now Make That Customer Object And Payment Token</h2>
			</div>

			<div id="contentbox">
				<div id="maindiv">
					<!-- replace this with something fancier --> 
					<br><a href="https://developers.braintreepayments.com/reference/general/testing/php#credit-card-numbers" target="_blank"> Try some of these cards</a>
				</div>
			
				<div id="banner">
					<h3 type="bannertext">Hosted Fields</h3>
				</div>
				<div class="hostedfieldsdiv">
					<label for="card">Card Number</label>
    				<div id="card" class="hf"></div>

    				<label for="cvv">CVV</label>
    				<div id="cvv" class="hf"></div>

    				<label for="exp">Expiration Date</label>
    				<div id="exp" class="hf"></div>

    				<div id="paypalcontainer"></div>
				</div>
			</div>

			<div id="contentbox">
				<div id="banner">
					<h3 type="bannertext">Customer Parameters</h3>
				</div>

				<div id="maindiv">
					<input type="checkbox" class="checkbox" unchecked> 
					<p class="text">Customer ID:</p>
					<input name="id" value="" class="input" name="Customer_Id" disabled>
				</div>

				<div class="maindiv">
					<input type="checkbox" class="checkbox" unchecked>
					<p class="text">Company:</p> 
					<input name="company" value="" class="input" disabled>
				</div>

				<div class="maindiv">
					<input type="checkbox" class="checkbox" unchecked>
					<p class="text">Email Address:</p> 
					<input name="email" value="" class="input" disabled>
				</div>

				<div class="maindiv">
					<input type="checkbox" class="checkbox" unchecked>
					<p class="text">Fax:</p> 
					<input name="fax" value="" class="input" disabled>
				</div>

				<div class="maindiv">
					<input type="checkbox" class="checkbox" checked>
					<p class="text">First Name:</p> 
					<input name="firstName" value="Jon" class="input" >
				</div>

				<div class="maindiv">
					<input type="checkbox" class="checkbox" checked>
					<p class="text">Last Name:</p> 
					<input name="lastName" value="Snow" class="input" >
				</div>

				<div class="maindiv">
					<input type="checkbox" class="checkbox" unchecked>
					<p class="text">Phone:</p> 
					<input name="phone" value="" class="input" disabled>
				</div>

				<div class="maindiv">
					<input type="checkbox" class="checkbox" unchecked>
					<p class="text">Website:</p> 
					<input name="website" value="" class="input" disabled>
				</div>

			</div>
			
			<div id="contentbox">
				<div ID="banner">
					<h3 type="bannertext">Billing Address</h3>
				</div>

				<div class="maindiv">
					<input type="checkbox" class="checkbox" unchecked>
					<p class="text">Company:</p> 
					<input name="company" value="" class="input" disabled>
				</div>

				<div class="maindiv">
					<input type="checkbox" class="checkbox" unchecked>
					<p class="text">Country Code (Alpha 3):</p> 
					<input name="countryCodeAlpha3" value="" class="input" disabled>
				</div>

				<div class="maindiv">
					<input type="checkbox" class="checkbox" unchecked>
					<p class="text">Region:</p> 
					<input name="region" value="" class="input" disabled>
				</div>

				<div class="maindiv">
					<input type="checkbox" class="checkbox" unchecked>
					<p class="text">Locality:</p> 
					<input name="locality" value="" class="input" disabled>
				</div>

				<div class="maindiv">
					<input type="checkbox" class="checkbox" checked>
					<p class="text">Street Address:</p> 
					<input name="streetAddress" value="800 S Avenue Q" class="input" >
				</div>

				<div class="maindiv">
					<input type="checkbox" class="checkbox" unchecked>
					<p class="text">Extended Address:</p> 
					<input name="streetAddress" value="" class="input" disabled>
				</div>

				<div class="maindiv">
					<input type="checkbox" class="checkbox" checked>
					<p class="text">Postal Code:</p> 
					<input name="postalCode" value="55555" class="input" >
				</div>

			</div>

			<div id="contentbox">
				<div ID="banner">
					<h3 type="bannertext">Credit Card Options</h3>
				</div>

				<div class="maindiv">
					<input type="checkbox" class="checkbox" unchecked>
					<p class="text">Make Default:</p> 						
					<input name="makeDefault" value="1" class="input" disabled>
				</div>

				<div class="maindiv">
					<input type="checkbox" class="checkbox" unchecked>
					<p class="text">Fail On Duplicate Payment Method:</p> 
					<input name="failOnDuplicatePaymentMethod" value="1" class="input" disabled>
				</div>

				<div class="maindiv">
					<input type="checkbox" class="checkbox" unchecked>
					<p class="text">Verification Merchant Account ID:</p> 
					<input name="verificationMerchantAccountId" value="1" class="input" disabled>
				</div>

				<div class="maindiv">
					<input type="checkbox" class="checkbox" unchecked>
					<p class="text">Verification Amount:</p> 
					<input name="verificationAmount" value="1.00" class="input" disabled>
				</div>

				<div class="maindiv">
					<p class="text" style="display: inline-block;margin-top: 5px">Verify Card (true)</p> 
					<input name="verifyCard" value="1" class="input" hidden>		
				</div>
			</div>

			<div id="contentbox">
				<div ID="banner">
					<h3 type="bannertext">Credit Card Options</h3>
				</div>

				<div class="maindiv">
					<input type="checkbox" class="checkbox" checked>
					<p class="text">Cardholder Name:</p> 						
					<input name="cardholderName" value="Jon Snow" class="input" >
				</div>

				<div class="maindiv">
					<input type="checkbox" class="checkbox" unchecked>
					<p class="text">Token Value:</p> 
					<input name="token" value="" class="input" disabled>	
				</div>
			</div>
			<input type="submit" class="button">

				<div class="maindiv"">
					<a href="../index.php" class="button">Restart<a/>
				</div>
		</div>
	</form>
</body>
<script>
    var nonceInput;
    var checkoutForm = document.querySelector('#customercreateform');
    function writeNonceToForm(nonce) {
      if (!nonceInput) {
        nonceInput = document.createElement('input');
        nonceInput.name = 'paymentMethodNonce';
        nonceInput.type = 'hidden';
        checkoutForm.appendChild(nonceInput);
      }
      nonceInput.value = nonce;
    }
    braintree.setup("<?php echo($clientToken); ?>", 'custom', {
      id: 'customercreateform',
      hostedFields: {
        number: {selector: '#card', placeholder: '•••• •••• •••• ••••'},
        cvv: {selector: '#cvv', placeholder: '•••'},
        expirationDate: {selector: '#exp', placeholder: 'mm/yyyy'}
      },
      paypal: {
        container: "paypalcontainer",
        singleUse: false,
        amount: 100,
        currency: 'USD',
        enableShippingAddress: 'false',
        onSuccess: function (obj) {
        alert("onSuccess thrown" + obj);
      	}
      },
      onError: function (err) {
      	alert(err.message);
        },
      onPaymentMethodReceived: function (payload) {
        writeNonceToForm(payload.nonce);
        HTMLFormElement.prototype.submit.call(checkoutForm);
        }
    });
 </script>
</html>