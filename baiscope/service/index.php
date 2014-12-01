<?php
//require 'profile.php';

function getRecommendation($moviename){
    $moviename = strtolower($moviename);
    $moviename = str_replace(" ", "+", $moviename);
    
    $jsoninput = file_get_contents("http://www.tastekid.com/ask/ws?q=".$moviename."%2F%2Fmovies&format=JSON");
    $data = json_decode($jsoninput,true);
    
    return $data;
}

function getMovieLink($moviename){
    $moviename = strtolower($moviename);
    $moviename = str_replace(" ", "+", $moviename);
    
    $jsoninput1 = file_get_contents("http://www.imdbapi.com/?i=&t=".$moviename);    
    $interdata = json_decode($jsoninput1,true);
    $jsoninput2 = file_get_contents("http://yts.re/api/listimdb.json?imdb_id=".$interdata['imdbID']);
    $data = json_decode($jsoninput2,true);
    
    return $data['MovieList'][0]['TorrentUrl'];
}

function nextEpisode($tvshow){
    $tvshow = strtolower($tvshow);
    $tvshow = str_replace(" ", "", $tvshow);
    
    $jsoninput = file_get_contents("http://epguides.frecar.no/show/".$tvshow."/next/");
    $data = json_decode($jsoninput,true);
    
    return $data;
}

function getLastEpisode($tvshow){
    $tvshow = strtolower($tvshow);
    $tvshow = str_replace(" ", "", $tvshow);
    
    $jsoninput = file_get_contents("http://epguides.frecar.no/show/".$tvshow."/last/");
    $data = json_decode($jsoninput,true);
    
    return $data;
}

function getQuiz(){
	
	//include_once("dbconnect.php");
	mysql_select_db("baiscopedb");

        $query = mysql_query("SELECT * FROM Movie_Quiz ORDER BY RAND( ) LIMIT 5") or die(mysql_error());
	$response = array();
	
	while($row_one=mysql_fetch_array($query)){
		array_push($response, $row_one);
	}
        
        return $response;
}

function getInitialMovieSet(){
	
	include_once("dbconnect.php");
	mysql_select_db("a1751844_baiscop");

        $query = mysql_query("SELECT Title FROM Random_movie_set ORDER BY RAND( ) LIMIT 5") or die(mysql_error());
	$response = array();
	
	while($row_one=mysql_fetch_array($query)){
		array_push($response, $row_one);
	}
       
        return $response;
        
}

function getInitialTVShowSet(){
	
	include_once("dbconnect.php");
	mysql_select_db("a1751844_baiscop");

        $query = mysql_query("SELECT * FROM Trending_shows ORDER BY RAND( ) LIMIT 5") or die(mysql_error());
	$response = array();
	
	while($row_one=mysql_fetch_array($query)){
		array_push($response, $row_one);
	}
       
        return $response;
        
}

function addUser($teladdress){
    
    $teladdress=  substr($teladdress, 4);
    
    include_once("dbconnect.php");
    mysql_select_db("baiscopedb");
    
    $query = mysql_query("INSERT INTO Members (Number) VALUES ('".$teladdress."')") or die(mysql_error());
    
}

function addCurrentAnswer($usernumber,$answer){
    
    include_once("dbconnect.php");
    mysql_select_db("baiscopedb");
    
    $query = mysql_query("UPDATE Members SET Current_answer = '".$answer."' WHERE Number = '".$usernumber."'") or die("Error it is");
}

function getAnswer($usernumber){
    
    include_once("dbconnect.php");
    mysql_select_db("baiscopedb");
    
    $query = mysql_query("SELECT Current_answer FROM Members WHERE Number = '".$usernumber."'") or die(mysql_error());
    $row = mysql_fetch_row($query);
    
    return $row[0];    
}

//file_put_contents("hourlydump.txt.gz", fopen("https://kickass.so/hourlydump.txt.gz", 'r'));
//
//$file_name = 'hourlydump.txt.gz';
//
//// Raising this value may increase performance
//$buffer_size = 4096; // read 4kb at a time
//$out_file_name = str_replace('.gz', '', $file_name);
////
//// Open our files (in binary mode)
//$file = gzopen($file_name, 'rb');
//$out_file = fopen($out_file_name, 'wb');
//
//// Keep repeating until the end of the input file
//while(!gzeof($file)) {
//    // Read buffer-size bytes
//    // Both fwrite and gzread and binary-safe
//    fwrite($out_file, gzread($file, $buffer_size));
//}
////
////// Files are done, close files
//fclose($out_file);
//gzclose($file);
//    
//
//function getTorrentLink($tvshow){
//
//    $file = fopen("hourlydump.txt", "r");
//    while(!feof($file)){
//        $line = fgets($file);
//        
//        if (strpos($line,$tvshow) !== false) {
//            $linkResponse = explode('|', $line);            
//        }
//        else {
//            echo "TV show not available";
//        }
//        
//    }
//    fclose($file);
//    
//    return $linkResponse[4];
//}


//echo getTorrentLink('How I Met Your Mother');
//echo getMovieLink('Edge of Tomorrow');
//createProfile('94775471301');
//getQuiz();

//$testshow = getInitialTVShowSet();

//echo $testshow[0]['Show'];

?>
