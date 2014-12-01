<?php

// ==========================================
// Ideamart : Sample PHP SMS API
// ==========================================
// Author : Pasindu De Silva
// Licence : MIT License
// http://opensource.org/licenses/MIT
// ==========================================

ini_set('error_log', 'sms-app-error.log');
require_once 'libs/Log.php';
require_once 'libs/SMSReceiver.php';
require_once 'libs/SMSSender.php';
require_once 'service/dbconnect.php';

define('SERVER_URL', 'http://localhost:7000/sms/send');
define('APP_ID', 'APP_000001');
define('APP_PASSWORD', 'password');

$logger = new Logger();

try {

    // Creating a receiver and intialze it with the incomming data
    $receiver = new SMSReceiver(file_get_contents('php://input'));
    
    //Creating a sender
    $sender = new SMSSender(SERVER_URL, APP_ID, APP_PASSWORD);

    $message = $receiver->getMessage(); // Get the message sent to the app
    $address = $receiver->getAddress(); // Get the phone no from which the message was sent 
    
    $number = substr($address, 4);
    $ans = getAnswer($number);


    //list($key, $opt) = explode(" ", $message);
    $logger->WriteLog($receiver->getAddress());//strcmp($message,$ans

    if (false) {
        // Send a broadcast message to all the subcribed users
        $response = $sender->sms("Congradulations! You won the challenge. To send this challenge to your friend dial #678", $address);
    } else {

        // Send a SMS to a particular user
        $response = $sender->sms('Your answer is wrong. Try again. To send this challenge to your friend dial #678'.$number, $address);
    }
} catch (SMSServiceException $e) {

    $logger->WriteLog($e->getErrorCode() . ' ' . $e->getErrorMessage());
}

/*function movieResponseDecode($param,$addrss) {
    $responseMsg = "unsuccessful";
    $logger = new Logger();  
    if ($param != null) {
        try {

            $sender = new SMSSender(SERVER_URL, APP_ID, APP_PASSWORD);
            $sender->sms($param, $addrss);
            $responseMsg="successful";
            
        } catch (Exception $e) {
            $logger->WriteLog($e->getErrorCode() . ' ' . $e->getErrorMessage());
        }
    }

    return $responseMsg;
}

function tvShowsResponseDecode($param) {
    $response = "sucessful";

    if ($param != null) {
        
    }

    return $response;
}*/

?>
