<?php 
session_start();

if($_POST['username'] != ""){
	
        
	include_once("dbconnect.php");
	mysql_select_db("a1751844_baiscop");
	
        $username = $_POST['username'];
	$query = mysql_query("SELECT Number,Name,Region from Members where Number='".$username."'") or die(mysql_error());
	$row = mysql_fetch_row($query) or die(mysql_error());
//        $row =mysql_fetch_array($query);
        
        var_dump($row);
	
	$Usernumber = $row[0]["Number"];
	$Username = $row[0]["Name"];
	$Userregion = $row[0]["Region"];	
	 	
        echo $Usernumber;
	
	if($username == $Usernumber){
            
		$_SESSION['username'] = $username;
		$_SESSION['profilename'] = $Username;
		
		header("Location: index.php");		
		
	}
        else{		
		
		echo "<script>
		alert('Username or Password Incorrect! Please check and login again. Or signUp for a new Account');
		window.location.href='login.php';
		</script>";
		
		//echo "<h2> Incorrect username or password.<br />
		//Please try again. </h2>";
	}
}
else{
	echo "<script>
		alert('Please enter username and password to proceed');
		window.location.href='login.php';
		</script>";
}
?>