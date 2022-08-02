<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$authorization = "Authorization: Bearer eyJhbGciOiJSUzI1NiIsImtpZCI6IkI5QTI3QTZBMDRCMEZCOUY0QzlGNTE2NTkwMEQwQjI2NUM2RkI3NTAiLCJ0eXAiOiJKV1QiLCJ4NXQiOiJ1YUo2YWdTdy01OU1uMUZsa0EwTEpseHZ0MUEifQ.eyJuYmYiOjE2NTk0MzU5ODIsImV4cCI6MTY1OTQzOTU4MiwiaXNzIjoiaHR0cHM6Ly9pZHAubXlhYmlsaXR5bmV0d29yay5jb20iLCJhdWQiOlsiaHR0cHM6Ly9pZHAubXlhYmlsaXR5bmV0d29yay5jb20vcmVzb3VyY2VzIiwiYWJpbGl0eTphY2Nlc3NhcGkiXSwiY2xpZW50X2lkIjoiYXNhcC1yZXN1bHRzIiwianRpIjoiODZlMTUyNjQtNGFkZi00Y2ZiLWJkODUtZmQyMmYzNWU0ODk3Iiwic3ViIjoiNGQxNTZkMTEtM2Q2Ny00MzdmLTgyNTctZmI2MjZhOWUwMjgxIiwiZW1haWwiOiJqb2VsQGFzYXAtcmVzdWx0cy5jb20iLCJnaXZlbl9uYW1lIjoiSm9lbCIsImZhbWlseV9uYW1lIjoiTmVsc29uIiwiYWJpbGl0eSI6eyJjcm1BY2NvdW50TnVtYmVyIjoiMTAyMzAyMSIsImFjY291bnRLZXkiOiIvYzFOakN3RDRNaGlOa1JWM1h1MFltdCtISUU9In0sImFiaWxpdHk6ZW50aXRsZW1lbnRzIjpbeyJhY2NvdW50S2V5IjoiL2MxTmpDd0Q0TWhpTmtSVjNYdTBZbXQrSElFPSIsImVudGl0bGVtZW50IjoiYWJpbGl0eTphY2Nlc3NhcGkifSx7ImFjY291bnRLZXkiOiIvYzFOakN3RDRNaGlOa1JWM1h1MFltdCtISUU9IiwiZW50aXRsZW1lbnQiOiJhYmlsaXR5OmFjY2Vzc2FsbHBheWVyZWxpZ2liaWxpdHkifV19.mAA6Py1MDhF467mdAvYPk4EDrS3Ie1drrLjvrw_ay19_phfLhJMX58lY57vIZNUgts-L8v3iEHCTFOkHimhU5zSU-EV88ki_dA_f0PF_V6fAioFkVzPYIUgFW6s5A3ytteh2-bAjpFr8-FcIgSSMBjRwfymQK_xnLIV45ysgLTGsf880eFfQwauR7Zlu4bYyyo8Hz25Lc3jhXzWW-TojM_X3bYWu7Zb0riwAIm3kkT1qGW-y8eavVHXXD7zbFEpTTDbK8Ii32kkA-8iR-hTfQQ5tzQaG6qSC0cWgswR_DWopCjH53qZw0WP8BmWRoFZ6c8jjxa6Hzmg8776aX4tAWg";

$host = 'https://api.abilitynetwork.com/v1/eligibilities';
$username = 'joel@asap-results.com';
$password = 'Asap@123*';
$client_id = 'asap-results';
$client_secret = 'm4deQGq54IwbuAXOFEbFdA==';

$post = [
    "eligibilityRequest" => [
        [
            "provider" => [
                "npi" => 1902846306,
                "lastName" => "ASAP Results, LLC"
            ],
            "subscriber" => [
                "memberIdentifier" => "71345808",
                "firstName" => "Angela",
                "lastName" => "Jenkins",
                "dateOfBirth" => "1963-07-19"
            ],
            "serviceDates" => [
                "start" => "2021-11-15"
            ],
            "serviceTypeCodes" => [
                "serviceTypeCode" => ["30"]
            ],
            "payerIdentifier" => 10351
        ]
    ]
];
$patientRecord = json_encode($post);

// echo '<pre>';
// echo $patientRecord;
// die;

$ch = curl_init($host);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $patientRecord);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$return = curl_exec($ch);
curl_close($ch);

echo '<pre>';
var_dump($return);
echo '</pre>';
