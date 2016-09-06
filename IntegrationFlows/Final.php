 <?php
require_once '../Codebase/autoload.php';

/*
//Sort out the POST data into the varous API call arrays
$transaction_parameters = array_intersect_key($_POST, $transaction_parameters_array);
$transaction_options_parameters = array_intersect_key($_POST, $transaction_options_parameters_array);

//Label the API call arrays and nest them as needed
if ($transaction_options_parameters !== NULL) {
    $options_add = array('options' => $transaction_options_parameters);
    $transaction_parameters = array_merge($transaction_parameters, $options_add);
}

//Run the API call
$transaction_create = Braintree_Transaction::sale(
$transaction_parameters
);

//relevant responses
if ($transaction_create->success) {
	$your_transaction_id = $transaction_create->transaction->id;
	$result = 1;
	//links to the control panel
    echo(' <h1 type="bannertext">Success! Money Aquired!</h1> <br> The transaction is: <a href=https://sandbox.braintreegateway.com/merchants/' . $your_merchant_id . '/transactions/' . $your_transaction_id . '> ' . $your_transaction_id .'</a><br>');
    echo('<button id="revealbutton" class="button">Reveal Result Object</button><div id="revealcontents" style="white-space: pre-wrap;width: 80%" hidden><pre>'); print_r($transaction_create); echo("</pre></div>");
}
else if ($transaction_create->success == false && $transaction_create->errors == NULL) {
	$your_transaction_id = $transaction_create->transaction->id;
	$result = 2;
    echo('<h1 type="bannertext">The Transaction failed</h1> <br> The transaction is: <a href=https://sandbox.braintreegateway.com/merchants/' . $your_merchant_id . '/transactions/' . $your_transaction_id . '> ' . $your_transaction_id .'</a><br>' );
    if ($customer_create->transaction->gatewayRejectionReason == false) {
    echo('The Processor Response Text is: ' . $transaction_create->processorResponseText . '<br/>');
    echo('The Processor Response Code is: ' . $transaction_create->transaction->processorResponseCode);
	}
	else {
    echo('The Gateway Rejection Reason is: ' . $transaction_create->transaction->gatewayRejectionReason . '<br/>');
	}
	echo('<button id="revealbutton" class="button">Reveal Result Object</button><div id="revealcontents" style="white-space: pre-wrap;width: 80%" hidden><pre>'); print_r($transaction_create); echo("</pre></div>");
} else {
	$result = 3;
    echo('<h1 type="bannertext">Validation Error Triggered!</h1> <br>Validation errors:<br/>');
    foreach (($transaction_create->errors->deepAll()) as $error) {
        echo("- " . $transaction_create->message . "<br/>");

    }
}
*/
new TransactionCruncher($_POST);
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
	<form id="transactioncreateform" method="post" action="final.php">
		<div id="body">
			<!-- Best practices for web development suggest to give the ol' razzle dazzle in the form of an animated gif every now and then -->
			</div>
			<br>
			<div id="contentbox" style="border: none">
				<div id="resultgif">
					<img src="../img/<?php echo$gifresult ?>.gif">
				</div>
				<div class="maindiv"">
					<a href="../index.php" class="button">Restart<a/>
				</div>
			</div>
		</div>		
	</form>
</body>
</html>

