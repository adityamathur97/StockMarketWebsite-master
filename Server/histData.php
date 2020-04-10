<?php
header("Access-Control-Allow-Origin: *");
require "global.php";

$curl = curl_init();
$period1 = $_GET["period1"];
$period2 = $_GET["period2"];
$symbol = $_GET["symbol"];
$frequency = $_GET["frequency"];


curl_setopt_array($curl, array(
	CURLOPT_URL => "https://apidojo-yahoo-finance-v1.p.rapidapi.com/stock/v2/get-historical-data?frequency=$frequency&filter=history&period1=$period1&period2=$period2&symbol=$symbol",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => array(
		"x-rapidapi-host: apidojo-yahoo-finance-v1.p.rapidapi.com",
		"x-rapidapi-key: $key"
	),
));


$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	//echo $response;



$resp = json_decode($response);
//echo json_encode($resp);
//echo "\n\n</br></br></br>";
$arr = array();

foreach($resp->{'prices'} as $r) {
	$epoch = $r->{"date"};
	array_push( $arr ,array((date('r', $epoch)),$r->{"low"} ));
}

echo json_encode($arr);
}
?>
