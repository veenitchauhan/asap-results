<?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://idp.myabilitynetwork.com/connect/token',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'grant_type=password&username=joel%40asap-results.com&password=Asap%40123*&scope=openid%20ability%3Aaccessapi',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded',
    'Authorization: Basic YXNhcC1yZXN1bHRzOm00ZGVRR3E1NEl3YnVBWE9GRWJGZEE9PQ==',
  ),
));

$response = json_decode(curl_exec($curl));

print_r($response->access_token);
die;
// curl_close($curl);
// echo '<pre>';
// echo $response;