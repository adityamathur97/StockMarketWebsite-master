
<?php
///Session authorisation
// require "connection.php";
// require "new/global.php";

// $user= $_POST["user"];

// echo md5('travel');

// //http://localhost/Project%20WT/script/login.php?Email=iamds96@gmail.com&Pass=123456789;

// //http://localhost/Project%20WT/script/new/serverlogin.php?EmailID=iamds96@gmail.com&password=123456789

$memcache = new Memcache;
 $memcache->connect("localhost",11211); # You might need to set "localhost" to "127.0.0.1"
 echo "Server's version: " . $memcache->getVersion() . "<br />\n";
 $tmp_object = new stdClass;
 $tmp_object->str_attr = "test";
 $tmp_object->int_attr = 123;
 $memcache->set("key",$tmp_object,false,10);
 echo "Store data in the cache (data will expire in 10 seconds)<br />\n";
 echo "Data from the cache:<br />\n";
 var_dump($memcache->get("key"));

echo date('Y-m-d', strtotime('2019-12-31' . ' +1 day'));
?>

