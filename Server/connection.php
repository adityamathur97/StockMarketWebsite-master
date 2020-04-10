<?php
header("Access-Control-Allow-Origin: *");
	$servername = "localhost";
	$username = "ds";
	$password = "123456789";//"3dbf54dc7d23c4b45e8e17a9c1002a2ef2a8f04e0ee5d329";
	$database = "stockmarketsimulator";


  $conn = mysqli_connect($servername, $username, $password, $database);



?>