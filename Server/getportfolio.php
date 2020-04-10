<?php
header("Access-Control-Allow-Origin: *");
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);

require "connection.php";
require "global.php";
// $user= $_GET["user"];
$user = "Deepanshu";

$qry = "select symbol,qty,price from portfolio where Username = '$user'";
$result = $conn->query($qry);
$symbols = "";





if($result->num_rows > 0){
    $arr = array();
        while($row = $result->fetch_assoc()){
            $symbol = $row["symbol"];
            array_push( $arr ,$symbol);

        }
    $symstr = implode(",",$arr);
}





$curl = curl_init();


curl_setopt_array($curl, array(
	CURLOPT_URL => "https://apidojo-yahoo-finance-v1.p.rapidapi.com/market/get-quotes?region=US&lang=en&symbols=$symstr",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => array(
		"x-rapidapi-host: apidojo-yahoo-finance-v1.p.rapidapi.com",
		"x-rapidapi-key: 27bb39ab1fmsh702fce735c7a349p1f81d7jsn72e8d4a35975"
	),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
            // echo $response;
        $resp = json_decode($response);
        $arr2 = array();
         foreach($resp->{'quoteResponse'}->{"result"} as $r) {
            array_push( $arr2 ,array($r->{"regularMarketPrice"} ));
            }
        //echo json_encode($arr2);
        }











        $result = $conn->query($qry);

        if($result->num_rows > 0){
            $resp = array();
            while($row = $result->fetch_assoc()){
                $symbol = $row["symbol"];
                $qty = $row['qty'];
                $price = $row['price'];
                $currentprice = 520;

                // $change = (($currentprice - $price) / (($currentprice + $price) / 2)) * 100;
                // $change = number_format((float)$change, 2, '.', '');
                array_push( $resp ,array($symbol,$qty, $price,$currentprice));
                
            
            }

            for($i = 0; $i < count($resp); ++$i) {
                $resp[$i][3] = $arr2[$i][0];
            }



            echo json_encode($resp);
        }
        else {
            echo $conn->error;
        }

$conn->close();

?>