<?php

$wsdl = "D:/TOOLS/xampp-7-4-19/htdocs/WSDL_Dev/crswsdev.wsdl";
$client = new SoapClient($wsdl, [ 'soap_version' => SOAP_1_1 ]);

// var_dump($client->__getFunctions()); 
// var_dump($client->__getTypes()); 
// var_dump($client->__getLastRequest()); 

$post_data = new stdClass();
$post_data->data = new stdClass();

date_default_timezone_set("Asia/Kuala_Lumpur");
$curr_date = date("Y-m-d");
$curr_time = date("H:i:s");

$curr_date_time = $curr_date."T".$curr_time;
// echo $curr_date_time; return false;

$agency_code = '201002';
$branch_code = 'ICTJOHOR';
$user_id = 'User001';
$transaction_code = 'T2';
$req_date_time = $curr_date_time;
$ic_number = $_GET['ic'];
$req_indicator = 'C';

$params = array(
              'AgencyCode' => $agency_code,
              'BranchCode' => $branch_code,
              'UserId' => $user_id,
              'TransactionCode' => $transaction_code,
              'RequestDateTime' => $req_date_time,
              'ICNumber' => $ic_number,
              'RequestIndicator' => $req_indicator
          );

$result = $client->enquireUserData($params);
// var_dump($result);

$post_data->data = $result;
header('Content-Type: application/json');
echo json_encode($post_data);
?>