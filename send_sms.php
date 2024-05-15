<?php
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();
date_default_timezone_set("Asia/Dhaka");
$current_date = date("d M, Y");
$id = $_GET['id'];
$student = $db_handle->runQuery("select * from contest_data where id = '$id'");

$name = $student[0]['student_name'];
$number = $student[0]['phone'];
$userid = $student[0]['unique_id'];

// API endpoint
$url = 'https://app.smsnoc.com/api/http/sms/send';

// Data to be sent in JSON format
$data = array(
    'api_token' => '187|9F3gntgqbEyU30jkJckcUB2tc3hLybGmktKNMp1s18cfeafb',
    'recipient' => '88'.$number,
    'sender_id' => '8809617611301',
    'type' => 'plain',
    'message' => $name.', your payment is successful for "Frogbid Academy" Coloring Book Contest. ID: ['.$userid.']. Save this message for later.'
);

// Encode the data in JSON format
$postData = json_encode($data);

// Initialize curl
$ch = curl_init($url);

// Set the Content-Type header to application/json
$headers = array(
    'Content-Type: application/json',
    'Accept: application/json'
);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Set other curl options
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the request
$response = curl_exec($ch);

// Check for errors
if ($response === false) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    echo "
        <script>
                alert('Your Message Sent Successful');
                window.location.href = 'Print_Receipt?id=$id'
        </script>
                ";
}

// Close curl
curl_close($ch);
?>