<?php
header("Access-Control-Allow-Origin: *");
require "connection.php";
require "global.php";
$user= $_POST["user"];
//$user = "Deepanshu";
function isauth($auth, $user){
    if($auth==md5($user)){echo '';}
    else{echo "Incorrect auth";
        exit();}

}

?>