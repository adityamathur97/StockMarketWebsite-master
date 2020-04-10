<?php
require "connection.php";
require "global.php";
	session_start();
	$user =  $_SESSION['Username'];

	session_unset();
	session_destroy();

	$fields_string='';
	$fields = array('user' => urlencode($user));
	foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
	rtrim($fields_string, '&');
	
	$curl = curl_init();
	curl_setopt($curl,CURLOPT_URL, $serverpath."serverlogout.php");
	curl_setopt($curl,CURLOPT_POST, count($fields));
	curl_setopt($curl,CURLOPT_POSTFIELDS, $fields_string);
	curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);


	$response = curl_exec($curl);
	$err = curl_error($curl);
	if ($err) {
		echo "cURL Error #:" . $err;}

	header("Location: $login"); 

	
?>