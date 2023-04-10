<?php

class InsertRecords
{
public function execute(){
$curl_pointer = curl_init();

$curl_options = array();
$id="481904000000352001";
$url = "https://www.zohoapis.in/crm/v2.1/Leads/$id";

$access_token="1000.7a31dc129604eebc95f52bb621cdbfed.6c75b3ec4a04be5dad2b2d21bc2904e0";

$curl_options[CURLOPT_URL] =$url;
$curl_options[CURLOPT_RETURNTRANSFER] = true;
$curl_options[CURLOPT_HEADER] = 1;
$curl_options[CURLOPT_CUSTOMREQUEST] = "GET";
$requestBody = array();
$recordArray = array();
$recordObject = array();
$recordObject["Phone"]="";
$recordObject["Company"]=" ";
$recordObject["Last_Name"]="";
$recordObject["First_Name"]="";
$recordObject["State"]="";



$recordArray[] = $recordObject;
$requestBody["data"] =$recordArray;
$curl_options[CURLOPT_POSTFIELDS]= json_encode($requestBody);
$headersArray = array();

$headersArray[] = "Authorization". ":" . "Zoho-oauthtoken " . $access_token;

$curl_options[CURLOPT_HTTPHEADER]=$headersArray;

curl_setopt_array($curl_pointer, $curl_options);

$result = curl_exec($curl_pointer);
$responseInfo = curl_getinfo($curl_pointer);
curl_close($curl_pointer);
list ($headers, $content) = explode("\r\n\r\n", $result, 2);
if(strpos($headers," 100 Continue")!==false){list( $headers, $content) = explode( "\r\n\r\n", $content , 2);
}
$headerArray = (explode("\r\n", $headers, 50));
$headerMap = array();
foreach ($headerArray as $key) {
if (strpos($key, ":") != false) {
$firstHalf = substr($key, 0, strpos($key, ":"));
$secondHalf = substr($key, strpos($key, ":") + 1);
$headerMap[$firstHalf] = trim($secondHalf);
}
}
$jsonResponse = json_decode($content, true);
if ($jsonResponse == null && $responseInfo['http_code'] != 204) {list ($headers, $content) = explode("\r\n\r\n", $content, 2);
$jsonResponse = json_decode($content, true);
}
print_r($headerMap);
print_r($jsonResponse);
print_r($responseInfo['http_code']);

}

}
(new InsertRecords())->execute();
?>
