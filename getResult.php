<?php
include("database.php");

$id=$_POST['id'];
$table=$_POST['table'];

if(isset($_COOKIE['rateLikeChnage'."_".$id]))
    echo "error|| You've already voted for this tweet";
else{
    $fieldName='votes';
    $query="update $table set $fieldName=$fieldName+1 where ID='$id'";
    $res=mysql_query($query);
    
    $query="select $fieldName from  $table where ID='$id'";
    $res=mysql_query($query);
    $result=mysql_fetch_array($res);
    $count=$result[$fieldName];
    
    $expire=time()+60*60*24*30; //30days
    setcookie("rateLikeChnage"."_".$id, "rateLikeChnage"."_".$id, $expire);
   echo "success||".$count;
}
?>