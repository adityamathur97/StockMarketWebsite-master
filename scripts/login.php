<?php
	//require "connection.php";
	require "global.php";
	session_start();
	if (session_status() == PHP_SESSION_ACTIVE) {echo '<script type="text/javascript">window.location.href = "'.$home.'";</script>';  }

	$Email = $_GET['Email'];
	$Pass = $_GET['Pass'];
	$fields_string='';
	$fields = array('EmailID' => urlencode($Email),'password' => urlencode($Pass));
	
	foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
	rtrim($fields_string, '&');
	
	$curl = curl_init();
	curl_setopt($curl,CURLOPT_URL, $serverpath."serverlogin.php");
	curl_setopt($curl,CURLOPT_POST, count($fields));
	curl_setopt($curl,CURLOPT_POSTFIELDS, $fields_string);
	curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);


	$response = curl_exec($curl);
	$err = curl_error($curl);
	if ($err) {
		echo "cURL Error #:" . $err;}
	
	if ($response!="-1") { 
		$response = json_decode($response);
		$Username = $response[0][0];
		session_start();
		$_SESSION["EmailID"] = $response[0][1];
	    $_SESSION["Username"] = $response[0][0];
		$_SESSION["Balance"] = $response[0][2];
		$_SESSION["authkey"] = $response[0][3];
		$_SESSION["mobile"] = $response[0][4];
		$_SESSION["address"] = $response[0][5];
		
		echo  $_SESSION["EmailID"]. $_SESSION["Username"];
		echo '<script type="text/javascript">window.location.href = "'.$home.'";</script>';	 
		//header("Location: $home"); 

	} else {	    
		echo '<script type="text/javascript">alert("Please enter correct creditential");</script>';
		//echo '<script type="text/javascript">window.location.href = "'.$login.'";</script>';	    
		 header("Location: $login?fail=true"); 

		exit; 

	}
	$conn->close();
?>