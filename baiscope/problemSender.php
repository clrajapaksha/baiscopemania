<?php
ini_set('error_log', 'sms-app-error.log');
require_once 'libs/Log.php';
require_once 'libs/SMSReceiver.php';
require_once 'libs/SMSSender.php';
require_once 'service/index.php';


function sendQuizTo($number){
	$rawQuiz = getQuiz();
	$quiz = "".$rawQuiz[0]["Question"].
	"\n\n1. ".$rawQuiz[0]["Choice1"].
	"\n2. ".$rawQuiz[0]["Choice2"].
	"\n3. ".$rawQuiz[0]["Choice3"].
	"\n4. ".$rawQuiz[0]["Choice4"];
	//$quiz = "dummy message";
	$ans = $rawQuiz[0]["Answer"];
	addUser($number);
	addCurrentAnswer($number, $ans);
	try{
		 $sender = new SMSSender(SERVER_URL, APP_ID, APP_PASSWORD);
         $sender->sms($quiz, $number);
	}
	catch (Exception $e){
		$logger->WriteLog($e->getErrorCode() . ' ' . $e->getErrorMessage());
	}
}

function sendQuizToFriend($user, $number){
	$msg = "Hi, Your Friend (user of ".$user.") has challenged you. To accept the challenge please dial #818";
	try{
		 $sender = new SMSSender(SERVER_URL, APP_ID, APP_PASSWORD);
         $sender->sms($msg, $number);
	}
	catch (Exception $e){
		$logger->WriteLog($e->getErrorCode() . ' ' . $e->getErrorMessage());
	}
}

?>

