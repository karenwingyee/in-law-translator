<?php

/**********MYSQL Settings****************/

$host="localhost";

$databasename="in-law-translator";

$user="root";

$pass="";
/**********MYSQL Settings****************/

$conn=mysql_connect($host,$user,$pass);

if($conn){
	$db_selected = mysql_select_db($databasename, $conn);
	
		if (!$db_selected) {
			die ('Connection failed: ' . mysql_error());
		}

}else{
	die('Not connected : ' . mysql_error());
}

?>