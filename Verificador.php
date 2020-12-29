<?php

	$CID = 'AS3G22vXdgKE3Bl6vLiMS8M8g1ZVLPIuzfy3hFfrq6WQKAt3cknvXSAzBdLiDkCMtQn-0CJok_8KlHYl';
	$SID = 'ELGW18uMT4wfrgQ4EkHCsifq7yelWd_8QkUAyKIbedJujzhAmV7q_I9VfMiEuY3t_VxlMxWPEpUyxjE2';
	$AccessToken = 'A21AALwpitan1oXVrraUuhxy24NKXya8dzmWPGVeHEuewA7w7INWsVBdBKqGkvNnZJCSc19UO9af0CwWc4KohTYkgRoD2J5Zw';
	$paymentID = $_REQUEST['paymentID'];
	$paymentToken = $_REQUEST['paymentToken'];
	$PaymentsUrl = 'https://api.sandbox.paypal.com/v1/payments/payment/';
	echo '<br><b>Client Id : </b>' . $CID . '<br><b>Secrent Id : </b>' . $SID . '<br><b>paymentToken : </b>' . $paymentToken . '<br>';
	echo '<b>paymentToken : </b>' . $paymentToken . '<br><b>paymentID : </b>' . $paymentID;

	$Venta = curl_init($PaymentsUrl . $paymentID);
	$headers = array();
	$headers[] = 'Authorization: Bearer ' . $AccessToken;
	$headers[] = 'Content-Type: application/json';
	curl_setopt($Venta, CURLOPT_HTTPHEADER, $headers);
	$RespVenta = curl_exec($Venta);
	print_r($RespVenta);

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, 'https://api-m.sandbox.paypal.com/v1/oauth2/token');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
	curl_setopt($ch, CURLOPT_USERPWD, $CID . ':' . $SID);

	$headers = array();
	$headers[] = 'Content-Type: application/json';
	$headers[] = 'Accept-Language: en_US';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$server_output = curl_exec($ch);

	print_r($server_output);

	######################################################################################
	####################################  EJEMPLO 01  ####################################
	######################################################################################
/*
	#https://incarnate.github.io/curl-to-php/
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, 'https://api-m.sandbox.paypal.com/v1/oauth2/token');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
	curl_setopt($ch, CURLOPT_USERPWD, $CID . ":" . $SID);

	$headers = array();
	$headers[] = 'Accept: application/json';
	$headers[] = 'Accept-Language: en_US';
	$headers[] = 'Content-Type: application/x-www-form-urlencoded';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$response = curl_exec($ch);
	print_r($response);
*/
/*
	######################################################################################
	####################################  EJEMPLO 01  ####################################
	######################################################################################
	#https://stackoverflow.com/questions/18913345/curl-posting-with-header-application-x-www-form-urlencoded
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL,"https://api-m.sandbox.paypal.com/v1/oauth2/token");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS,"grant_type=client_credentials");
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
	curl_setopt($ch, CURLOPT_USERPWD, $CID . ':' . $SID);

	// receive server response ...
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$server_output = curl_exec ($ch);
	var_dump($server_output);
	curl_close ($ch);

*/
	######################################################################################
	####################################  EJEMPLO 01  ####################################
	######################################################################################
/*
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL,"http://xxxxxxxx.xxx/xx/xx");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS,
	            "dispnumber=567567567&extension=6");
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));


	// receive server response ...
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$server_output = curl_exec ($ch);

	curl_close ($ch);
*/

	######################################################################################
	####################################  EJEMPLO 01  ####################################
	######################################################################################
/*
	$request_body = 'grant_type=client_credentials';
	$ch = curl_init('https://api-m.sandbox.paypal.com/v1/oauth2/token');
	curl_setopt($ch, CURLOPT_HEADER, 'Accept: application/json');
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
	curl_setopt($ch, CURLOPT_POSTFIELDS, $request_body);
	curl_setopt($ch, CURLOPT_USERPWD, $CID . ":" . $SID);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	$response = curl_exec($ch);
	print_r($response);
*/

	######################################################################################
	####################################  EJEMPLO 01  ####################################
	######################################################################################
/*
	//$Login = curl_init('https://api-m.sandbox.paypal.com/v2/checkout/orders');
	$Login = curl_init('https://api-m.sandbox.paypal.com/v1/oauth2/token');
	curl_setopt($Login, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
	curl_setopt($Login, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($Login, CURLOPT_HEADER, 'Accept: application/json');
	curl_setopt($Login, CURLOPT_USERPWD, $CID . ":" . $SID);
	
	$Resp = curl_exec($Login);
	$Obj = json_decode($Resp);
	print_r($Obj);
*/

	######################################################################################
	####################################  EJEMPLO 01  ####################################
	######################################################################################
/*
	$curl = curl_init();

	curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.sandbox.paypal.com/v1/identity/openidconnect/tokenservice",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "grant_type=authorization_code&code={authorization_code}",
			CURLOPT_HTTPHEADER => array(
			"authorization: Basic Y2xpZW50SUQ6Y2xpZW50U2VjcmV0"
		),
	));

	$response = curl_exec($curl);
	print_r($response);
	$err = curl_error($curl);

	curl_close($curl);

*/

	######################################################################################
	####################################  EJEMPLO 01  ####################################
	######################################################################################
/*
	print_r($_POST);
	print_r($_GET);
	//$Login = curl_init('https://api-m.sandbox.paypal.com/v2/checkout/orders');
	$Login = curl_init('https://api-m.sandbox.paypal.com/v1/oauth2/token');
	curl_setopt($Login, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($Login, CURLOPT_HEADER, 'Accept: application/json');
	curl_setopt($Login, CURLOPT_USERPWD, $CID . ":" . $SID);
	curl_setopt($Login, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
	$Resp = curl_exec($Login);
	//print_r($Resp);
	$Obj = json_decode($Resp);
	$AccessToken = $Obj->access_token;
	print_r($AccessToken);
*/
/*
	######################################################################################
	####################################  EJEMPLO 01  ####################################
	######################################################################################
	#ORIGINAL TUTORIAL
	$Login = curl_init('https://api-m.sandbox.paypal.com/v1/oauth2/token');
	curl_setopt($Login, CURLOPT_RETURNTRANSFER,TRUE);
	curl_setopt($Login, CURLOPT_USERPWD, $CID . ":" . $SID);
	curl_setopt($Login, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
	$Resp = curl_exec($Login);
	print_r($Resp);
*/
/*
	######################################################################################
	####################################  EJEMPLO 01  ####################################
	######################################################################################
	#ORIGINAL TUTORIAL
	$Login = curl_init('https://api.sandbox.paypal.com/v1/oauth2/token');
	curl_setopt($Login, CURLOPT_RETURNTRANSFER,TRUE);
	curl_setopt($Login, CURLOPT_USERPWD, $CID . ":" . $SID);
	curl_setopt($Login, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
	$Resp = curl_exec($Login);
	print_r($Resp);
*/

?>

