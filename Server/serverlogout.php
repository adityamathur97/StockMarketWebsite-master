<?php
header("Access-Control-Allow-Origin: *");
	require "connection.php";
	// print_r ($_REQUEST);
	//echo $_REQUEST['CURLOPT_HTTPHEADER'];

	$user =  $_REQUEST['user'];

	$sql = "DELETE FROM sessionauth WHERE username='$user';";
	$resp = array();

	if ($conn->query($sql) === TRUE) { echo "1"; 
	} else {echo "-1";}
	

	$conn->close();
?>