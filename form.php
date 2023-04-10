



<!--html data is here  -->





<?php
//[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]
function generate_refresh_token()
{
$post=[
    'refresh_token' =>  'Your Access Token',
    'client_id'     =>  'Your Client Id',
    'client_secret' =>  'Your Client Secret',
    'grant_type'    =>  'refresh_token'

];

$ch= curl_init();
curl_setopt( $ch,CURLOPT_URL,"https://accounts.zoho.in/oauth/v2/token" );
curl_setopt( $ch,CURLOPT_POST, 1);
curl_setopt( $ch,CURLOPT_POSTFIELDS, http_build_query($post) );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true);
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt( $ch,CURLOPT_HTTPHEADER, array('Content_Type:application/json') );



$response= curl_exec($ch);
$response=json_decode($response);
// echo '<pre>';print_r($response);
echo $response->access_token;
$access_dataa = $response->access_token;

// $access_dataa = file_get_contents($response->access_token);
echo $access_dataa;

}
generate_refresh_token();

//[[[[[[[[[[[[[[[[[[[[[[[[]]]]]]]]]]]]]]]]]]]]]]]]

include 'formreg.php';
$last=$_REQUEST['last'];
$first=$_REQUEST['first'];


class InsertRecords
{
    global $access_dataa;
public function execute(){
$curl_pointer = curl_init();

$curl_options = array();
$url = "https://www.zohoapis.in/crm/v2.1/Leads";
$access_token=z$access_dataa;

$curl_options[CURLOPT_URL] =$url;
$curl_options[CURLOPT_RETURNTRANSFER] = true;
$curl_options[CURLOPT_HEADER] = 1;
$curl_options[CURLOPT_CUSTOMREQUEST] = "POST";
$requestBody = array();
$recordArray = array();
$recordObject = array();
$recordObject["Company"]="ambala ";
$recordObject["Last_Name"]=$_REQUEST['last'];
$recordObject["First_Name"]=$_REQUEST['first'];
$recordObject["State"]="haryana";



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
var_dump($headerMap);
var_dump($jsonResponse);
var_dump($responseInfo['http_code']);

}

}
(new InsertRecords())->execute();
?>
