


<?php




class UpdateRecords
{
    public function execute(){


        $access_token="1000.3604a66d7d6bbab2307b25084a87dfa7.b0b27cb2764f10e2748a0b3a2a5e0afd";
        $curl_pointer = curl_init();
        
        $curl_options = array();
        $url = "https://www.zohoapis.in/crm/v2.1/Leads";
        
        $curl_options[CURLOPT_URL] =$url;
        $curl_options[CURLOPT_RETURNTRANSFER] = true;
        $curl_options[CURLOPT_HEADER] = 1;
        $curl_options[CURLOPT_CUSTOMREQUEST] = "PUT";
        $requestBody = array();
        $recordArray = array();
        $recordObject = array();
        $recordObject["Company"]="FieldAPIValue";
        $recordObject["Last_Name"]="3477061000007420006";
        $recordObject["First_Name"]="3477061000007420006";
        $recordObject["State"]="FieldAPIValue";
        $recordObject["id"]="481904000000352001";

        
        
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
        if(strpos($headers," 100 Continue")!==false){
            list( $headers, $content) = explode( "\r\n\r\n", $content , 2);
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
        if ($jsonResponse == null && $responseInfo['http_code'] != 204) {
            list ($headers, $content) = explode("\r\n\r\n", $content, 2);
            $jsonResponse = json_decode($content, true);
        }
        var_dump($headerMap);
        var_dump($jsonResponse);
        var_dump($responseInfo['http_code']);
        
    }
    
}
(new UpdateRecords())->execute();