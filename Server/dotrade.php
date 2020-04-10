<?php
header("Access-Control-Allow-Origin: *");
//ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
// http://localhost/server/dotrade.php?user=Deepanshu&mode=buy&symbol=nbev&qty=50&price=50&recur=1&date=2019-12-04
require "connection.php";
require "global.php";
//$auth = $_GET['auth'];
$user= $_REQUEST["user"];
// $date = 'NULL';
if(isset($_REQUEST["date"])) {$date= $_REQUEST["date"];}  else {$date='NULL';}
$mode= $_REQUEST["mode"];
$symbol= $_REQUEST["symbol"];
$qty= $_REQUEST["qty"];
$price = $_REQUEST["price"];
$date = $_REQUEST["date"];
if(isset($_REQUEST["recur"])) {$recur= $_REQUEST["recur"];}  else {$recur=0;}
//$recur = $_REQUEST["recur"];


$id = uniqid('',True);
$sql = "INSERT INTO `tradequeue` ( qid ,`Username`, `Symbol`, `Transaction`, `Qty`, `Price`, `doAt` , recur) VALUES ('$id', '$user', '$symbol', '$mode', '$qty', '$price', '$date' , $recur );";    
// echo $sql;
                
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }







$conn->close();

?>