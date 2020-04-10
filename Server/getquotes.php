<?php
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);

header("Access-Control-Allow-Origin: *");

$curl = curl_init();
$symstr = $_GET["symbols"];
//$arr = ["BAC","GOOG", "AXP", "NBEV"];
//$symstr = implode(",",$arr);

// echo $symstr;
// echo "\n\n</br></br></br>";


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
        $arr = array();
         foreach($resp->{'quoteResponse'}->{"result"} as $r) {
            array_push( $arr ,array($r->{"symbol"},$r->{"regularMarketPrice"} ));
            }
        echo json_encode($arr);
        }


// //$response = '{"quoteResponse":{"result":[{"language":"en-US","region":"US","quoteType":"EQUITY","triggerable":true,"quoteSourceName":"Delayed Quote","regularMarketPrice":33.42,"regularMarketTime":1574888430,"regularMarketChange":0.069999695,"regularMarketVolume":31501516,"market":"us_market","preMarketChange":0.1699028,"preMarketChangePercent":0.5094537,"preMarketTime":1574864954,"preMarketPrice":33.5199,"postMarketChangePercent":-0.26928887,"postMarketTime":1574902570,"postMarketPrice":33.33,"postMarketChange":-0.08999634,"regularMarketChangePercent":0.20989415,"regularMarketPreviousClose":33.35,"fullExchangeName":"NYSE","longName":"Bank of America Corporation","sourceInterval":15,"exchangeTimezoneName":"America/New_York","exchangeTimezoneShortName":"EST","pageViews":{"shortTermTrend":"DOWN","midTermTrend":"UP","longTermTrend":"UP"},"gmtOffSetMilliseconds":-18000000,"esgPopulated":false,"tradeable":true,"priceHint":2,"exchangeDataDelayedBy":0,"shortName":"Bank of America Corporation","marketState":"POSTPOST","exchange":"NYQ","symbol":"BAC"},{"language":"en-US","region":"US","quoteType":"EQUITY","triggerable":true,"quoteSourceName":"Delayed Quote","regularMarketPrice":1312.99,"regularMarketTime":1574888401,"regularMarketChange":-0.5600586,"regularMarketVolume":996329,"market":"us_market","preMarketChange":2.13,"preMarketChangePercent":0.162156,"preMarketTime":1574864880,"preMarketPrice":1315.68,"postMarketChangePercent":-0.15917607,"postMarketTime":1574899736,"postMarketPrice":1310.9,"postMarketChange":-2.0899658,"regularMarketChangePercent":-0.04263702,"regularMarketPreviousClose":1313.55,"fullExchangeName":"NasdaqGS","longName":"Alphabet Inc.","sourceInterval":15,"exchangeTimezoneName":"America/New_York","exchangeTimezoneShortName":"EST","pageViews":{"shortTermTrend":"DOWN","midTermTrend":"UP","longTermTrend":"UP"},"gmtOffSetMilliseconds":-18000000,"esgPopulated":false,"tradeable":true,"priceHint":2,"exchangeDataDelayedBy":0,"shortName":"Alphabet Inc.","marketState":"POSTPOST","exchange":"NMS","symbol":"GOOG"},{"language":"en-US","region":"US","quoteType":"EQUITY","triggerable":true,"quoteSourceName":"Delayed Quote","regularMarketPrice":120.33,"regularMarketTime":1574888594,"regularMarketChange":0.5400009,"regularMarketVolume":2578122,"market":"us_market","preMarketChange":0.389999,"preMarketChangePercent":0.325651,"preMarketTime":1574864404,"preMarketPrice":120.15,"postMarketChangePercent":0.008305915,"postMarketTime":1574892774,"postMarketPrice":120.34,"postMarketChange":0.009994507,"regularMarketChangePercent":0.45078966,"regularMarketPreviousClose":119.79,"fullExchangeName":"NYSE","longName":"American Express Company","sourceInterval":15,"exchangeTimezoneName":"America/New_York","exchangeTimezoneShortName":"EST","pageViews":{"shortTermTrend":"UP","midTermTrend":"UP","longTermTrend":"UP"},"gmtOffSetMilliseconds":-18000000,"esgPopulated":false,"tradeable":true,"priceHint":2,"exchangeDataDelayedBy":0,"shortName":"American Express Company","marketState":"POSTPOST","exchange":"NYQ","symbol":"AXP"},{"language":"en-US","region":"US","quoteType":"EQUITY","triggerable":true,"quoteSourceName":"Delayed Quote","regularMarketPrice":2.16,"regularMarketTime":1574888401,"regularMarketChange":0.05000019,"regularMarketVolume":1155991,"market":"us_market","preMarketChange":0.00999999,"preMarketChangePercent":0.47393322,"preMarketTime":1574863796,"preMarketPrice":2.12,"postMarketChangePercent":-1.3888875,"postMarketTime":1574897655,"postMarketPrice":2.13,"postMarketChange":-0.029999971,"regularMarketChangePercent":2.3696775,"regularMarketPreviousClose":2.11,"fullExchangeName":"NasdaqCM","longName":"New Age Beverages Corporation","sourceInterval":15,"exchangeTimezoneName":"America/New_York","exchangeTimezoneShortName":"EST","pageViews":{"shortTermTrend":"UP","midTermTrend":"UP","longTermTrend":"UP"},"gmtOffSetMilliseconds":-18000000,"esgPopulated":false,"tradeable":true,"priceHint":4,"exchangeDataDelayedBy":0,"shortName":"New Age Beverages Corporation","marketState":"POSTPOST","exchange":"NCM","symbol":"NBEV"}],"error":null}}';

// $resp = json_decode($response);

// //echo  $resp->{'quoteResponse'}->{"result"}[0]->{"symbol"}  .": " . $resp->{'quoteResponse'}->{"result"}[0]->{"preMarketPrice"};
// echo "\n\n</br></br></br>";
// $arr = array();

// foreach($resp->{'quoteResponse'}->{"result"} as $r) {
//     array_push( $arr ,array($r->{"symbol"},$r->{"regularMarketPrice"} ));
// //    echo $r->{"symbol"}.": ". $r->{"regularMarketPrice"} .'<br>'
// }

// echo json_encode($arr);
