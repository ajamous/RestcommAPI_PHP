<?php 

/*


AUTHOR: AMEED JAMOUS
Description: This script aims to simplify the usage of the Restcomm Curl Examples in PHP for sending SMS, Voice, Fax and other API calls
right from your PHP script.


*/

//Restcomm Account SID

$api_login ="ENTER ACCOUNT SID";


//Restcomm Auth Token
$api_key = 'ENTER ACCOUNT TOKEN';


$base_url_sms = "cloud.restcomm.com/restcomm/2012-04-24/Accounts/$api_login/SMS/Messages";


// initialising CURL

$ch = curl_init();
$Customer = 19542400000;
$From = 1234567334;
$Body = "This is a test SMS message from PHP Script using Restcomm API";

$params = array(
                'To' => $Customer, 
                'From' => $From,
                'Body' => $Body
                
                );
//query against api. URL


curl_setopt($ch, CURLOPT_URL,"https://$api_login:$api_key@$base_url_sms");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
http_build_query($params));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec ($ch);
curl_close ($ch);
//analyze JSON output
echo "server_output:$server_output";
