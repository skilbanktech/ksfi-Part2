<?php

ob_start();

session_start();

include('./connection.php');



$typeofsearch = $_POST['typeofsearch'];
$daystype = $_POST['daystype'];
$days = $_POST['days'];
$weeks = $_POST['weeks'];

$months = $_POST['months'];
$createdBy = $_SESSION['Currentrole'];
$updatedBy = $_SESSION['Currentrole'];


   $select_query="select 1 from modifysearch_dates  where Typeofsearch='$typeofsearch'";
	
    $queryresult=mysql_query($select_query);
	
	$count = mysql_num_rows($queryresult);
	
	if($count !=0)
	
	{
	  $update="update modifysearch_dates set days='$days',weeks='$weeks',months='$months', updated= NOW(),updatedBy='$updatedBy' where   Typeofsearch='$typeofsearch'";
	  
	   mysql_query($update);
	
	}
	
	else
	
	{
	
	  $insert="insert into  modifysearch_dates (Typeofsearch,days,weeks,months,created,createdBy)values('$typeofsearch','$days','$weeks','$months',NOW(),'$createdBy')";

	  $result=mysql_query($insert);
  
  }
  
	  $Msg = 14;
	  
	  
	  header("Location: ./AppStatusDetails.php?Msg=".$Msg);
	  
	  ob_flush();
	  
	  exit;







?>
