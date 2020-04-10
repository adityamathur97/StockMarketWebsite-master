<?php
	require "connection.php";
	require "global.php";

	
	$fname = $_REQUEST['fname'];
	$lname = $_REQUEST['lname'];
	$Mobile = $_REQUEST['Mob'];
	$Email = $_REQUEST['Email'];
	$UserName = $_REQUEST['UserName'];	
	$Pass = $_REQUEST['Password'];
	$CnfPass = $_REQUEST['CnfPassword'];


	$fields_string='';
	$fields = array('fname' => urlencode($fname),'lname' => urlencode($lname),'Mob' => urlencode($Mobile),'Email' => urlencode($Email),'UserName' => urlencode($UserName),'Password' => urlencode($Pass), 'CnfPassword' => urlencode($CnfPass));
	
	foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
	rtrim($fields_string, '&');
	$curl = curl_init();
	curl_setopt($curl,CURLOPT_URL, $serverpath."register.php");
	curl_setopt($curl,CURLOPT_POST, count($fields));
	curl_setopt($curl,CURLOPT_POSTFIELDS, $fields_string);
	curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);


	$response = curl_exec($curl);
	$err = curl_error($curl);
	if ($err) {
		echo "cURL Error #:" . $err;}
	
	if ($response!="NOTOK") { 
		echo 'in';
		echo $response.'<-';
		$response = json_decode($response);
		$Username = $response[0][0];
		session_start();
		$_SESSION["EmailID"] = $response[0][1];
	    $_SESSION["Username"] = $response[0][0];
		$_SESSION["Balance"] = $response[0][2];
		$_SESSION["authkey"] = $response[0][3];
		echo $response.$UserName;
		//echo  $_SESSION["EmailID"]. $_SESSION["Username"];
		echo '<script type="text/javascript">window.location.href = "'.$home.'";</script>';	 
		//header("Location: $home"); 

	} else {
		echo 'Error, user exists';	    
		echo '<script type="text/javascript">alert("Error, username exists");</script>';
		//echo '<script type="text/javascript">window.location.href = "'.$login.'";</script>';	    
		 //header("Location: $login?fail=true"); 

		exit; 

	}






	// if ($Pass == $CnfPass) {
	// 	$qry = "INSERT INTO TblUser(fname, lname,EmailID, Username, Password,MobileNo,Balance) VALUES('$fname','$lname','$Email', '$UserName', '$Pass','$Mobile',100000);";
	// 	if ($conn->query($qry) === TRUE) {
	// 		global $login;		    	   	   	        
	// 		echo 'OK';
	// 		header("Location: $login");
	// 	} else {
	// 	    echo $qry;
	// 	}
	// 	$conn->close();	
	// } else {				
	// 	echo '<script type="text/javascript">alert("Password not match!");window.location.href = "../index.php";</script>';
		
	// }


	
	
?>