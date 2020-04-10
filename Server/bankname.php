<?php
require "connection.php";
require "global.php";
$user= $_REQUEST["user"];
//$authkey = $_REQUEST["auth"];
//$authkey = 'ds';
// if(!isauth($user,$authkey)){exit();}



$qry = "select name,ac,route from bank where user = '$user'";

$result = $conn->query($qry);
$symbols = "";

if (!$result) {
    trigger_error('Invalid query: ' . $conn->error);
}

if($result->num_rows > 0){
    $resp = array();
    while($row = $result->fetch_assoc()){
        $name = $row["name"];
        $ac = $row["ac"];
        $route = $row["route"];
        array_push( $resp ,array($name,$ac,$route));
        // echo '</tr>';
    }

    echo json_encode($resp);
}
$conn->close();

?>