<?php
session_start();
$reference_id =$_POST['referenceID'];
$name = $_POST['name'];
$location = $_POST['location'];
$mobile = $_POST['mobile'];


//database connection
include('./connection.php');


	//to send the information into the database
	if($_SESSION['usertype'] == 'Partner'){
	$select_query="Select * from student_details where reference_id like '%".$reference_id."%' and firstname like'%".$name."%'and city like '%".$location."%'and mobile like '%".$mobile."%'and source like '%".$_SESSION['firstname']."%'";
	}
	else
	{
	$select_query="Select * from student_details where reference_id like '%".$reference_id."%' and firstname like'%".$name."%'and city like '%".$location."%'and mobile like '%".$mobile."%'";
	}
	$select_record=mysql_query($select_query);
	
	if((mysql_num_rows($select_record)!=0))
	{	
		$inforow= mysql_fetch_row($select_record);
		$infocol = array('reference_id','firstname','middlename','lastname','dob','email','password','address','street1','street2','state','district','city','pincode','stdcode','phone','mobile','phone1','prevUniversity','prevCollege','prevCourse','marks','prefer_day','prefer_time','query','app_date','source');

		$loggedinfo = array_combine($infocol,$inforow);
	
	
		// put in session 
	
	        //$_SESSION['username'] = $loggedinfo['username'];
			//$_SESSION['id'] = $loggedinfo['reference_id'];
			header("Location: ./ApplicationStatus.php");	
			//echo ("Successfully logged in.");	
		
	}
	else
	{
		header("Location: ./index.php");
		//echo ("Invalid email address or password");
	}
	mysql_close($con);
 
?>