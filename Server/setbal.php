<?php
header("Access-Control-Allow-Origin: *");
require "connection.php";
require "global.php";
$user= $_GET["user"];
$add = $_GET["add"];

$qry = "UPDATE tbluser SET Balance = Balance + $add WHERE  Username= '$user';";
echo $qry;
$result = $conn->query($qry);

if (!$result) {
    trigger_error('Invalid query: ' . $conn->error);
}

//else{echo "yay";}

//echo $result;
$conn->close();


?>