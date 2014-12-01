<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function createProfile($userNumber){
    
    include_once("dbconnect.php");
    mysql_select_db("a1751844_baiscop");

    $query = mysql_query("SELECT * FROM Members WHERE Number='".$userNumber."'") or die(mysql_error());
    $count = mysql_num_rows($query);
    
    echo $count;
    
    if($count>0){
        echo 'Profile Already Exists';
    }
    else{
	$query = mysql_query("INSERT INTO Members (Number) VALUES ('".$userNumber."')") or die(mysql_error());
        echo "Profile Creation Successful";
    }
    
}

function loadShowsToProfile($basicinfo, $urlinfo){
    
    include_once("dbconnect.php");
    mysql_select_db("a1751844_baiscop");

    $query = mysql_query("SELECT * FROM Members WHERE Number='".$userNumber."'") or die(mysql_error());
    $count = mysql_num_rows($query);
    
    echo $count;
    
    if($count>0){
        echo 'Profile Already Exists';
    }
    else{
	$query = mysql_query("INSERT INTO Members (Number) VALUES ('".$userNumber."')") or die(mysql_error());
        echo "Profile Creation Successful";
    }
    
}

function loadMoviesToProfile($number, $basicinfo, $urlinfo){
    
    include_once("dbconnect.php");
    mysql_select_db("a1751844_baiscop");

//    $query = mysql_query("SELECT * FROM Members WHERE Number='".$userNumber."'") or die(mysql_error());
//    $count = mysql_num_rows($query);
//    
//    echo $count;
    $currentdate;
    for ($index = 0; $index < count($basicinfo); $index++) {
        
        $query = mysql_query("INSERT INTO Movie_information (Number, Movie_title, Torrent_url, Date) VALUES ('".$number."','".$basicinfo[$index]['Title']."','".$urlinfo[$index]['URL']."','".$currentdate."')") or die(mysql_error());
            
    }
    
    echo "Profile Creation Successful";
    
    
}

