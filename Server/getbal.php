<?php
header("Access-Control-Allow-Origin: *");
require "connection.php";
require "global.php";
$user= $_REQUEST["user"];
$authkey = $_REQUEST['auth'];

// isauth($user,$authkey);

//$user = "Deepanshu";

$qry = "select Balance from tbluser where Username = '$user'";
$result = $conn->query($qry);
$symbols = "";

if($result->num_rows > 0){
    $resp = array();
    while($row = $result->fetch_assoc()){
        $bal = $row['Balance'];
        array_push( $resp ,array($bal));
        // echo '</tr>';
    }

    echo json_encode($resp);
}
$conn->close();

?>