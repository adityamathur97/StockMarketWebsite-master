<?php
require "connection.php";
require "global.php";
$user= $_REQUEST["user"];
$name= $_REQUEST["name"];
$ac= $_REQUEST["account"];
$route= $_REQUEST["routing"];

$qry = "INSERT INTO bank ( `user`,`name`, `ac`, `route`) VALUES('$user','$name','$ac','$route' );";
$result = $conn->query($qry);
if (!$result) {
    trigger_error('Invalid query: ' . $conn->error);
}

echo $result;
$conn->close();


?>