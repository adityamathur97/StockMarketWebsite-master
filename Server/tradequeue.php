<?php
header("Access-Control-Allow-Origin: *");
	require "connection.php";

  $sql = "SELECT EmailID, Username, Password, MobileNo FROM tbluser";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> Email ID: ". $row["EmailID"]. " Username: ". $row["Username"]. "Password: " . $row["Password"] . "Mobile Number:" . $row["MobileNo"] "<br>";
    }
} else {
    echo "No user found";
}

$conn->close();
?>

</body>
</html>
