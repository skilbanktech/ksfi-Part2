<?php
session_start();
$email =$_POST['email'];

$newemail=$_POST['newemail'];
 
 
 
include('common/class_Common.php');

$objCommon=new Common();


//database connection
include('./connection.php');


	$sql="insert Request_Useremailchange(current_email,newemail,request_date)values('$email','$newemail',NOW())";
	
	mysql_query($sql);
	
	  
	  	$Msg = 26;

		
		header("Location: ./AppStatusDetails.php?Msg=".$Msg);
	  
	
	
	mysql_close($con);
 
?>