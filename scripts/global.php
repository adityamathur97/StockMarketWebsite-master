<?php

$home = "http://localhost/profile.php";
$login = "http://localhost/login.php";
$index = "http://localhost/index.php";
$serverpath = "http://167.172.209.156/" ; //web service path
$key = "27bb39ab1fmsh702fce735c7a349p1f81d7jsn72e8d4a35975"; //finance api key


 function mksession(){
     global $login;
    session_start();
    if(!isset($_SESSION['Username'])){header("Location: $login");}
    else{}
     
 }



?>