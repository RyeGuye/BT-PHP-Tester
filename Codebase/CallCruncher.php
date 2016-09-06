<?php

class ClientTokenCruncher {
	//Process selected values for the client token 
	public function __construct($the_post) {

		$client_token_parameters = array_intersect_key($the_post, $client_token_parameters_array);
		$client_token_option_parameters = array_intersect_key($the_post, $client_token_option_parameters_array);

		if ($client_token_option_parameters !== NULL) {
		    $options_add = array('options' => $client_token_option_parameters);
		    $client_token_parameters = array_merge($client_token_parameters, $options_add);
		}
	}
}

class CustomerAndPaymentMethodCruncher {
	//Process selected values for a customer and a payment method token 
	public function __construct($the_post) {
		include 'Configuration.php';
		include 'BTarrays.php';
		global $your_payment_method_token;
		//Sort out the POST data into the varous API call arrays
		$customer_parameters = array_intersect_key($the_post, $customer_parameters_array);
		$credit_card_parameters = array_intersect_key($the_post, $credit_card_parameters_array);
		$credit_card_option_parameters = array_intersect_key($the_post, $credit_card_option_parameters_array);
		$credit_card_billing_parameters = array_intersect_key($the_post, $credit_card_billing_parameters_array);

		//Check the nonce
		$the_nonce = $the_post["paymentMethodNonce"];
		$nonce_info = Braintree_PaymentMethodNonce::find($the_nonce);

		//Label the API call arrays and nest them as needed
		if ($nonce_info = 'creditCard') {
			if (empty($credit_card_parameters) !== true) {
		        if (empty($credit_card_option_parameters) !== true) {
		            $options_add = array('options' => $credit_card_option_parameters); 
		            $credit_card_parameters = array_merge($credit_card_parameters, $options_add);
		        }
		        if (empty($credit_card_billing_parameters) !== true) {
		            $billing_add = array('billingAddress' => $credit_card_billing_parameters); 
		            $credit_card_parameters = array_merge($credit_card_parameters, $billing_add);
		        }
		    $credit_card_add = array('creditCard' => $credit_card_parameters);
			}
		    $credit_card_add = array('creditCard' => $credit_card_parameters);
		    $customer_parameters = array_merge($customer_parameters, $credit_card_add);
		}

		//Run the API call
		$customer_create = Braintree_Customer::create(
		    $customer_parameters
		);

		//relevant responses
		if ($customer_create->success) {
			$your_customer_id = $customer_create->customer->id;
			$your_payment_method_token = $customer_create->customer->paymentMethods[0]->token;
			//links to the control panel
		    echo(' <h1 type="bannertext">That went well</h1> <br> Your new Customer ID is: <a href=https://sandbox.braintreegateway.com/merchants/' . $your_merchant_id . '/customers/' . $your_customer_id . ' target="_blank"> ' . $your_customer_id .'</a><br>');
		    echo('Your payment method is: <a href=https://sandbox.braintreegateway.com/merchants/' . $your_merchant_id . '/payment_methods/any/' . $your_payment_method_token . ' target="_blank"> ' . $your_payment_method_token . '</a><br>');
		    //no verifications for credit cards
		    if (empty($customer_create->customer->paypalAccounts) == true) {
		    echo('Your credit card verification is: <a href=https://sandbox.braintreegateway.com/merchants/' . $your_merchant_id . '/verifications/' . $customer_create->customer->paymentMethods[0]->verification->id . ' target="_blank"> ' . $customer_create->customer->paymentMethods[0]->verification->id . '</a><br>');
			}
			echo('<button id="revealbutton" class="button">Reveal Result Object</button><div id="revealcontents" style="white-space: pre-wrap;width: 80%" hidden><pre>'); print_r($customer_create); echo("</pre></div>");
			//echo('</div><input hidden name="paymentMethodToken" value="'); echo($your_payment_method_token); echo('"></div>');
			return $your_payment_method_token;
		}
		else if ($customer_create->success == false) {
			//only a verification will remain
		    echo('<h1 type="bannertext">The verification failed</h1> <br> Your credit card verification is: <a href=https://sandbox.braintreegateway.com/merchants/' . $your_merchant_id . '/verifications/' . $customer_create->verification->id . ' target="_blank"> ' . $customer_create->verification->id . '</a><br>' );
		    if ($customer_create->verification->gatewayRejectionReason == false) {
		    echo('The Processor Response Text is: ' . $customer_create->verification->processorResponseText . '<br>');
		    echo('The Processor Response Code is: ' . $customer_create->verification->processorResponseCode . '<br>');
			}
			else {
		    echo('The Gateway Rejection Reason is: ' . $customer_create->verification->gatewayRejectionReason . '<br>');
			}
			echo('<button id="revealbutton" class="button">Reveal Result Object</button><div id="revealcontents" style="white-space: pre-wrap;width: 80%" hidden><pre>'); print_r($customer_create); echo("</pre></div>");
		} else {
		    echo('<h1 type="bannertext">Validation Errors triggered</h1> <br>Validation errors:<br/>');
		    foreach (($customer_create->errors->deepAll()) as $error) {
		        echo("- " . $customer_create->message . "<br>");
		    }
		}
	}
}

class TransactionCruncher {
	//Process selected values for a transaction 
	public function __construct($the_post) {
		include 'Configuration.php';
		include 'BTarrays.php';
		global $gifresult;
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
			$gifresult = 1;
			//links to the control panel
		    echo(' <h1 type="bannertext">Success! Money Aquired!</h1> <br> The transaction is: <a href=https://sandbox.braintreegateway.com/merchants/' . $your_merchant_id . '/transactions/' . $your_transaction_id . ' target="_blank"> ' . $your_transaction_id .'</a><br>');
		    echo('<button id="revealbutton" class="button">Reveal Result Object</button><div id="revealcontents" style="white-space: pre-wrap;width: 80%" hidden><pre>'); print_r($transaction_create); echo("</pre></div>");
		}
		else if ($transaction_create->success == false && $transaction_create->errors == NULL) {
			$your_transaction_id = $transaction_create->transaction->id;
			$gifresult = 2;
		    echo('<h1 type="bannertext">The Transaction failed</h1> <br> The transaction is: <a href=https://sandbox.braintreegateway.com/merchants/' . $your_merchant_id . '/transactions/' . $your_transaction_id . ' target="_blank"> ' . $your_transaction_id .'</a><br>' );
		    if ($customer_create->transaction->gatewayRejectionReason == false) {
		    echo('The Processor Response Text is: ' . $transaction_create->processorResponseText . '<br/>');
		    echo('The Processor Response Code is: ' . $transaction_create->transaction->processorResponseCode);
			}
			else {
		    echo('The Gateway Rejection Reason is: ' . $transaction_create->transaction->gatewayRejectionReason . '<br/>');
			}
			echo('<button id="revealbutton" class="button">Reveal Result Object</button><div id="revealcontents" style="white-space: pre-wrap;width: 80%" hidden><pre>'); print_r($transaction_create); echo("</pre></div>");
		} else {
			$gifresult = 3;
		    echo('<h1 type="bannertext">Validation Error Triggered!</h1> <br>Validation errors:<br/>');
		    foreach (($transaction_create->errors->deepAll()) as $error) {
		        echo("- " . $transaction_create->message . "<br/>");

		    }
		}
	}
}
?>