<?php
//turns out trying to pull all the array keys (as values) from the client library itself will take some inginuity

$client_token_parameters_array = array('customerId' => '', 'merchantAccountId' => '', 'version' => '', 'sepaMandateAcceptanceLocation' => '', 'sepaMandateType' => '');

$client_token_option_parameters_array = array('failOnDuplicatePaymentMethod' => '', 'makeDefault' => '', 'verifyCard' => '');

$customer_parameters_array = array('company' => '', 'email' => 'fax', 'firstName' => '', 'lastName' => '', 'id' => '', 'phone' => '', 'website' => '', 'paymentMethodNonce' => '');

$credit_card_parameters_array = array('cardholderName' => '', 'token' => '');

$credit_card_billing_parameters_array = array('company' => '', 'countryCodeAlpha3' => '', 'extendedAddress' => '', 'firstName' => '', 'lastName' => '', 'locality' => '', 'postalCode' => '', 'region' => '', 'streetAddress');

$credit_card_option_parameters_array = array('failOnDuplicatePaymentMethod' => '', 'makeDefault' => '', 'verificationAmount' => '', 'verificationMerchantAccountId' => '', 'verifyCard' => '');

//Future developments will include completed arrays
$transaction_parameters_array = array('amount' => '', 'paymentMethodToken' => '');

$transaction_options_parameters_array = array('submitForSettlement' => '');
?>