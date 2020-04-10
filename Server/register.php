<?php
header("Access-Control-Allow-Origin: *");
	require "connection.php";
	require "global.php";

	
	$fname = $_REQUEST['fname'];
   //$fname= 'Navdeep';
	$lname = $_REQUEST['lname'];
	$Mobile = $_REQUEST['Mob'];
	$Email = $_REQUEST['Email'];
	$UserName = $_REQUEST['UserName'];	
	$Pass = $_REQUEST['Password'];
	$CnfPass = $_REQUEST['CnfPassword'];
 
  // logging error message to given log file 
		$log_file = "./my-errors.log";
		error_log($qry, 3, $log_file); 
	if ($Pass == $CnfPass) {
		
   $qry = "INSERT INTO `tbluser` ( `fname` ,`lname`, `EmailID`, `Username`, `Password`, `MobileNo`, `Balance` , `address`) VALUES ('$fname', '$lname', '$Email', '$UserName', '$Pass', '$Mobile' , 100000 , 'address' );";    
   echo $qry;
		if ($conn->query($qry) === TRUE) {
			global $login;		    	   	   	        
			echo $qry;
			header("Location: $login");
		} else {
		    echo $qry;
		}
		$conn->close();	
	} else {				
		echo '<script type="text/javascript">alert("Password not match!");window.location.href = "../index.php";</script>';
		echo 'NOTOK';
		
	}
	
?>