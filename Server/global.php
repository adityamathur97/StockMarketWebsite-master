<?php
header("Access-Control-Allow-Origin: *");
//server file
$home = "http://localhost/profile.php";
$login = "http://localhost/login.php";
$serverpath = "http://localhost/server/" ; //web service path
$key = "27bb39ab1fmsh702fce735c7a349p1f81d7jsn72e8d4a35975"; //finance api key


 function mksession(){
     global $login;
    session_start();
    if(!isset($_SESSION['Username'])){header("Location: $login");}
    else{}
     
 }


 
function isauth( $user, $auth){
    if($auth==md5($user)){return 1;}
    else{echo "Incorrect auth";
        return 0;
}
}



?>


<?php
// $home = "http://localhost/profile.html";
// $login = "http://localhost/login.php";
// $serverpath = "http://localhost/script/new/" ; //web service path
// $key = "27bb39ab1fmsh702fce735c7a349p1f81d7jsn72e8d4a35975"; //finance api key

?>


