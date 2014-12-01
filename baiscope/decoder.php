<?php


ini_set('error_log', 'sms-app-error.log');
require_once 'libs/Log.php';
require_once 'libs/SMSReceiver.php';
require_once 'libs/SMSSender.php';

//require '/opt/lampp/htdocs/ideamart/service/index.php';



$logger = new Logger();

function movieResponseDecode($param,$addrss) {
    $responseMsg = "unsuccessful";
    $logger = new Logger();  
    if ($param != null) {
        try {

            $sender = new SMSSender(SERVER_URL, APP_ID, APP_PASSWORD);
            $details="Requested Movie\n".$param."\n link is ".getMovieLink($param);
            $recommend_str= getRecommendation($param);
            $top_rec=$recommend_str['Similar']['Results'][0]['Name'];
            
            for($x = 1 ; $x < 5 ; $x++){
					$other_rec.=$x.". ".$recommend_str['Similar']['Results'][$x]['Name']."\n";
			}
            
            $details="Top Recommended: ".$top_rec."\nlink is:\n".getMovieLink($param)."\nAlso watch:\n".$other_rec;
            $sender->sms($details, $addrss);
            $responseMsg="successful";
            
            
        } catch (Exception $e) {
            $logger->WriteLog($e->getErrorCode() . ' ' . $e->getErrorMessage());
        }
    }

    return $responseMsg;
}

function tvShowsResponseDecode($param,$address) {
    $responseMsg = "successful";
    if ($param != null) {
        $sender = new SMSSender(SERVER_URL, APP_ID, APP_PASSWORD);
			$nextRes = nextEpisode($param);
            $details="The next episode of\n".$param."\n is S".$nextRes['episode']['season']." Ep".$nextRes['episode']['number'];
            $sender->sms($details, $address);
            $responseMsg="successful";
            
    }

    return $responseMsg;
}

?>
