<?php
session_start();
$email =$_POST['email'];
$password = $_POST['password'];
$newPassword = $_POST['newPassword'];


//database connection
include('./connection.php');


	//to send the information into the database
	
	$select_query="Select * from student_details where email='".$email."' and password='".$password."'";

	$select_record=mysql_query($select_query);

	if((mysql_num_rows($select_record)!=0))
	{	
	$add_new="Update student_details set password='".$newPassword."' where email='".$email."' and password='".$password."'";

	$add_query=mysql_query($add_new);
	header("Location: ./MyAccount.php");		
		
	}
	else
	{
		header("Location: ./changePassword.php");
		//echo ("Invalid email address or password");
	}
	mysql_close($con);
 
?>