<?php
function generate_refresh_token()
{

    $post=[
        'refresh_token' =>  'Your Refresh token',
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
    echo '<pre>';print_r($response);
    // $token = $response->access_token;

}
generate_refresh_token();
?>