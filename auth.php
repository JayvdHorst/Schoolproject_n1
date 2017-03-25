<?php

require 'vendor/autoload.php';

$client = new \GuzzleHttp\Client(['verify' => false]);
//$guzzleClient = new \GuzzleHttp\Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false, ), ));
//$client->setHttpClient($guzzleClient);

$url = 'https://radiomanager.pluxbox.com/api/v1/';

//Set your credentials
$api_key = 'GYojLYk1Lq1OK5yNFayYPM6fa';
$api_secret = 'n2fmx6HS09eGWfLHTxIFdDlEVdHlE5dyZzwocwSU';

//Create random string
$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
for ($nonce = '', $cl = strlen($chars)-1, $i = 0; $i < 32; $nonce .= $chars[mt_rand(0, $cl)], ++$i);

//Save timestamp in a variable to be sure it fixed through the process
$time = time();

//For GET and DELETE requests the body should be NULL
$auth_string = sprintf("%s:%s:%s:%s", $time, $nonce, $api_key, NULL);

//Hash the string with hmac algoritm and sha256 bit encryption
$auth_string = hash_hmac('sha256', $auth_string, $api_secret);

//Base64 encode the string to shorten and have ASCII for sending
$auth_string = base64_encode($auth_string);

?>

