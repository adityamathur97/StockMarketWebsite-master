<?php
header("Access-Control-Allow-Origin: *");
require "connection.php";
require "global.php";
$user= $_REQUEST["user"];
$authkey = $_REQUEST["auth"];
//$authkey = 'ds';
if(!isauth($user,$authkey)){exit();}



$qry = "select fname,lname,EmailID, Mobileno, Balance, address from tbluser where Username = '$user'";
$result = $conn->query($qry);
$symbols = "";

if($result->num_rows > 0){
    $resp = array();
    while($row = $result->fetch_assoc()){
        $fname = $row["fname"];
        $lname = $row["lname"];
        $email = $row["EmailID"];
        $Mobile = $row["Mobileno"];
        $bal = $row['Balance'];
        $addr = $row['address'];
        array_push( $resp ,array($fname,$lname,$email,$Mobile,$bal,$addr));
        // echo '</tr>';
    }

    echo json_encode($resp);
}
$conn->close();

?>