<?php
header("Access-Control-Allow-Origin: *");
	require "connection.php";
	// print_r ($_REQUEST);
	//echo $_REQUEST['CURLOPT_HTTPHEADER'];

	$Email =  $_REQUEST['EmailID'];
	$Pass = $_REQUEST['password'];

	$sql = "SELECT * FROM TblUser WHERE EmailID = '$Email' AND Password = '$Pass'";
	$result = $conn->query($sql);
	$resp = array();

	if ($result->num_rows == 1) {
		$row = $result->fetch_assoc();
		$Username = $row['Username'];
		$Mob = $row['MobileNo'];
		$addr = $row['address'];
		$EmailID = $row['EmailID'];
		$Bal = $row['Balance'];
		$authkey = md5($Username);
		array_push( $resp ,array($Username, $EmailID, $Bal, $authkey, $Mob, $addr  ));

		$sql2 = "INSERT INTO sessionauth (`username`, `authkey`) VALUES ( '$Username', '$authkey');";
		// $result2 = $conn->query($sql2);
		if ($conn->query($sql2) === TRUE) { //echo "New record created successfully"; 
		} 
			else { $sql3 = "UPDATE sessionauth SET authkey = '$authkey' WHERE username = '$Username'; ";	
					if ($conn->query($sql3) === TRUE) { //echo "New record created successfully"; 
					} else {echo -1;}
				}

		echo json_encode($resp);
	}
	
	else {'<script type="text/javascript">alert("Please enter correct creditential");window.location.href = "../html/login.html";</script>';	    
	    echo -1;
	}

	$conn->close();
?>