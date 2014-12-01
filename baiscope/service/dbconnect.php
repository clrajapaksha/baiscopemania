<?php
		mysql_connect("localhost", "mora", "password" )or die(mysql_error()); 
		mysql_select_db("baiscopedb") or die(mysql_error()); 
echo $dbconnect;
?>
