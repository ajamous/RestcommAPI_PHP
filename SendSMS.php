<?php 

/*


AUTHOR: AMEED JAMOUS
Description: This script aims to simplify and provides a starting point to the usage of the Restcomm Curl Examples in PHP for sending SMS, Voice, Fax and other API calls
right from your PHP script.


## CURL EXAMPLE - SEND SMS WITHOUT CALLBACK URL


curl -X POST https://cloud.restcomm.com/restcomm/2012-04-24/Accounts/AC531572e9282f68e50f80d11c635bdbd3/SMS/Messages \
--data-urlencode "From=15017122661" \    #Sender
--data-urlencode "Body=Hello There" \    #Message Body
--data-urlencode "To=971503851000" \     #To Number
-u ACCOUNTSID:AuthTOKEN    #Account SID & #AUTH TOKEN


<Response>

 <SMSMessage>
    <Sid>SM614919f651ef46a9833f4830b62a3844</Sid>
    <DateCreated>Wed, 8 May 2019 10:57:45 +0000</DateCreated>
    <DateUpdated>Wed, 8 May 2019 10:57:45 +0000</DateUpdated>
    <DateSent/>
    <AccountSid>AC531572e9282f68e50f80d11c6350000</AccountSid>
    <From>15017122661</From>
    <To>971503851000</To>
    <Body>Hello There</Body>
    <Status>queued</Status>
    <Direction>outbound-api</Direction>
    <Price>0</Price>
    <PriceUnit>USD</PriceUnit>
    <ApiVersion>2012-04-24</ApiVersion>
    <Uri>/2012-04-24/Accounts/AC531572e9282f68e50f80d11c635bdbd3/SMS/Messages/SM614919f651ef46a9833f4830b62a3844</Uri>
  </SMSMessage>

<Response>
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
