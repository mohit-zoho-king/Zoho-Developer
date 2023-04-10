<?php
function generate_access_token()
{

    $post=[
        'code'          =>  'Your API Console',
        'redirect_uri'  =>  'https://example.com/callbackurl',
        'client_id'     =>  'Your Client ID',
        'client_secret' =>  'Your Client Secret',
        'grant_type'    =>  'authorization_code'

    ];
    $ch= curl_init();
    curl_setopt( $ch,CURLOPT_URL,"https://accounts.zoho.in/oauth/v2/token" );
    curl_setopt( $ch,CURLOPT_POST, 1);
    curl_setopt( $ch,CURLOPT_POSTFIELDS, http_build_query($post) );
    curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true);
    curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt( $ch,CURLOPT_HTTPHEADER, array('Content_Type:application/x-www-form-urlencoded') );

    $response= curl_exec($ch);
    $response=json_decode($response);

    echo '<pre>';print_r($response);

}
generate_access_token();
?>