<?php

ini_set('error_log', 'ussd-app-error.log');

require 'libs/MoUssdReceiver.php';
require 'libs/MtUssdSender.php';
require 'class/operationsClass.php';
require 'libs/Log.php';
//require 'db.php';
require 'decoder.php';
require 'problemSender.php';
require 'service/dbconnect.php';#
#####
$production=false;
$isUssdType=true;	

	if($production==false){
		$ussdserverurl ='http://localhost:7000/ussd/send';
	}
	else{
		$ussdserverurl= 'https://api.dialog.lk/ussd/send';
	}

define('SERVER_URL', 'http://localhost:7000/sms/send');
define('APP_ID', 'APP_000001');
define('APP_PASSWORD', 'password');


$receiver 	= new UssdReceiver();
$sender 	= new UssdSender($ussdserverurl,'APP_000001','password');
$operations = new Operations();

$receiverSessionId = $receiver->getSessionId();
$content 			= 	$receiver->getMessage(); // get the message content
$address 			= 	$receiver->getAddress(); // get the sender's address
$requestId 			= 	$receiver->getRequestID(); // get the request ID
$applicationId 		= 	$receiver->getApplicationId(); // get application ID
$encoding 			=	$receiver->getEncoding(); // get the encoding value
$version 			= 	$receiver->getVersion(); // get the version
$sessionId 			= 	$receiver->getSessionId(); // get the session ID;
$ussdOperation 		= 	$receiver->getUssdOperation(); // get the ussd operation


$responseMsg = array(
    "main" =>  
    "Baiscope Mania
    
1. Movies
2. TV Shows
3. Quiz-Up Challenge

99. Exit"
);

static $movieList;
$tvshowsList = array(
	"The Walking Dead",
	"American Horror Story",
	"Arrow",
	"Game of Thrones",
	"The Big Bang Theory"
);


if ($ussdOperation  == "mo-init") { 
   
	try {
		mysql_connect("localhost", "mora", "password" )or die(mysql_error()); 
		mysql_select_db("baiscopedb") or die(mysql_error()); 
		$sessionArrary=array( "sessionid"=>$sessionId,"tel"=>$address,"menu"=>"main","pg"=>"","others"=>"");

  		$operations->setSessions($sessionArrary);

		$sender->ussd($sessionId, $responseMsg["main"],$address );

	} catch (Exception $e) {
			$sender->ussd($sessionId, 'Sorry error occured try again',$address );
	}
	
}else {

	$flag=0;
	
  	$sessiondetails=  $operations->getSession($sessionId);
  	$cuch_menu=$sessiondetails['menu'];
  	$operations->session_id=$sessiondetails['sessionsid'];
	
		switch($cuch_menu ){
		
			case "main": 	// Following is the main menu
					switch ($receiver->getMessage()) {
						case "1":
							$operations->session_menu="movies";
							$operations->saveSesssion();
							$movieList=getInitialMovieSet();
							$list = handle_movieList($movieList);
							$sss  = store_movieList($movieList,$operations,$sessionId);
							$sender->ussd($sessionId,$list,$address );
							break;
						case "2":
							$operations->session_menu="tvshows";
							$operations->saveSesssion();
							$tvshowsList=getInitialTVShowSet();
							$list = handle_TVList($tvshowsList);
							$sss  = store_tvList($tvshowsList,$operations,$sessionId);
							$sender->ussd($sessionId,$list,$address );
							break;
						case "3":
							$operations->session_menu="challenge";
							$operations->saveSesssion();
							$responseMsg = array(
									"challenge" =>  
    									"Baiscope Challenge
    									
1. Test me
2. Challange to friend

99. Exit"
									);
								$sender->ussd($sessionId,$responseMsg["challenge"],$address );
							break;
						default:
							$operations->session_menu="main";
							$operations->saveSesssion();
							$sender->ussd($sessionId, $responseMsg["main"],$address );
							break;
					}
					break;
			case "movies":
				switch ($receiver->getMessage()) {
						case "1":
							$resList=$operations->getMovieList($sessionId);
							$operations->session_menu=$resList[0]['list'];
							$operations->saveSesssion();
							$res=movieResponseDecode($resList[0]['list'],$address);
							$sender->ussd($sessionId,$res,$address );
							break;
						case "2":
							$resList=$operations->getMovieList($sessionId);
							$operations->session_menu=$resList[1]['list'];
							$operations->saveSesssion();
							$res=movieResponseDecode($resList[1]['list'],$address);
							$sender->ussd($sessionId,$res,$address );
							break;
						case "3":
						$resList=$operations->getMovieList($sessionId);
							$operations->session_menu=$resList[2]['list'];
							$operations->saveSesssion();
							$res=movieResponseDecode($resList[2]['list'],$address);
							$sender->ussd($sessionId,$res,$address );
							break;
						case "4":
							$resList=$operations->getMovieList($sessionId);
							$operations->session_menu=$resList[3]['list'];
							$operations->saveSesssion();
							$res=movieResponseDecode($resList[3]['list'],$address);
							$sender->ussd($sessionId,$res,$address );
							break;
						case "5":
							$resList=$operations->getMovieList($sessionId);
							$operations->session_menu=$resList[4]['list'];
							$operations->saveSesssion();
							$res=movieResponseDecode($resList[4]['list'],$address);
							$sender->ussd($sessionId,$res,$address );
							break;
						default:
							$operations->session_menu="movies";
							$operations->saveSesssion();
							$sender->ussd($sessionId, $responseMsg["main"],$address );
							break;
						}
		//		$sender->ussd($sessionId,'You have selected the movie '.$receiver->getMessage(),$address ,'mt-fin');
				break;
			case "tvshows":
				switch ($receiver->getMessage()) {
						case "1":
							$resList=$operations->getTVList($sessionId);
							$operations->session_menu=$resList[0]['list'];
							$operations->saveSesssion();
							$res=tvShowsResponseDecode($resList[0]['list'],$address);
							$sender->ussd($sessionId,$res,$address );
							break;
						case "2":
							$resList=$operations->getTVList($sessionId);
							$operations->session_menu=$resList[1]['list'];
							$operations->saveSesssion();
							$res=tvShowsResponseDecode($resList[1]['list'],$address);
							$sender->ussd($sessionId,$res,$address );
							break;
						case "3":
							$resList=$operations->getTVList($sessionId);
							$operations->session_menu=$resList[2]['list'];
							$operations->saveSesssion();
							$res=tvShowsResponseDecode($resList[2]['list'],$address);
							$sender->ussd($sessionId,$res,$address );
							break;
						case "4":
							$resList=$operations->getTVList($sessionId);
							$operations->session_menu=$resList[3]['list'];
							$operations->saveSesssion();
							$res=tvShowsResponseDecode($resList[3]['list'],$address);
							$sender->ussd($sessionId,$res,$address );
							break;
						case "5":
							$resList=$operations->getTVList($sessionId);
							$operations->session_menu=$resList[4]['list'];
							$operations->saveSesssion();
							$res=tvShowsResponseDecode($resList[4]['list'],$address);
							$sender->ussd($sessionId,$res,$address );
							break;
						default:
							$operations->session_menu="tvshows";
							$operations->saveSesssion();
							$sender->ussd($sessionId, $responseMsg["main"],$address );
							break;
				}	
				break;	
				###
			case "challenge":
				switch($receiver->getMessage()){
					case "1":
							$operations->session_menu="challenge";
							$operations->session_others=$receiver->getMessage();
							$operations->saveSesssion();
							$sender->ussd($sessionId,'Quiz will be sent as a text message',$address ,'mt-fin');
							sendQuizTo($address);
						
						break;
					case "2":
							$operations->session_menu="number";
							$operations->session_others=$receiver->getMessage();
							$operations->saveSesssion();
							$sender->ussd($sessionId,'Enter friends phone number',$address ,'mt-fin');
							
							
						break;
					default:
							$operations->session_menu="challenge";
							$operations->saveSesssion();
							$sender->ussd($sessionId, $responseMsg["main"],$address );
						break;
				}	
				break;	
				
			case "number":
						$pNumber = $receiver->getMessage();
						$sender->ussd($sessionId,'Quiz will be sent as a text message',$address ,'mt-fin');
						$pNumber = "tel:".$pNumber;
						$user = substr($address,4);
						sendQuizToFriend($user,$pNumber);
				break;
			default:
					$operations->session_menu="main";
					$operations->saveSesssion();
					$sender->ussd($sessionId,'Incorrect option',$address );
				break;
		}

echo("got here");
	
}

function handle_movieList($mList){
	$listLength = count($mList);
	$list = "";
		for($x = 0 ; $x < $listLength ; $x++ ){
			$list.=($x+1);
			$list.= $mList[$x]['Title'];
			$list.="\n";
		}
			return $list;
}
function handle_TVList($mList){
	$listLength = count($mList);
	$list = "";
		for($x = 0 ; $x < $listLength ; $x++ ){
			$list.=($x+1);
			$list.= $mList[$x]['Show'];
			$list.="\n";
		}
			return $list;
}

function store_movieList($lista,$operations,$sessionId){
	
	$operations->setMovieList($sessionId,$lista);

	
}

function store_tvList($lista,$operations,$sessionId){
	
	$operations->setTVList($sessionId,$lista);

	
}
