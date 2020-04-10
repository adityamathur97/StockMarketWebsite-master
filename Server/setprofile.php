<?php
header("Access-Control-Allow-Origin: *");
	require "connection.php";
	$user = $_REQUEST['Username'];
	$fname = $_REQUEST['fname'];
	$lname = $_REQUEST['lname'];
	$email = $_REQUEST['EmailID'];
	$mobile = $_REQUEST['Mobileno'];
	$addr = $_REQUEST['address'];
	if(isset($_REQUEST['Update']))
	{
		echo 'updating';
		$qry =  "UPDATE TblUser SET fname='$fname',lname='$lname', EmailID='$email',MobileNo= '$mobile',address='$addr' where Username='$user'";
		if ($conn->query($qry) === TRUE) {
	        echo '<script type="text/javascript">alert("User profile saved");window.location.href = "../profile.php";</script>';
		} else { echo $conn->error;
		    echo '<script type="text/javascript">alert("Please try again later");window.location.href = "../profile.php";</script>';
		}
		$conn->close();


	}

	else { echo 'creating';


		$qry = "INSERT INTO TblUser(fname,lname,EmailID,MobileNo,Balance,address) VALUES('$fname', '$lname', '$email','$mobile','$addr');";
		if ($conn->query($qry) === TRUE) {
	        echo '<script type="text/javascript">alert("User profile saved");window.location.href = "../profile.php";</script>';
		} else { echo $conn->error;
		   echo '<script type="text/javascript">alert("Please try again later");window.location.href = "../profile.php";</script>';
		}
		$conn->close();

	}
?>
