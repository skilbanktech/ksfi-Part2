<?php
 
  session_start();
  
if(($_SESSION['usertype'] == 'Employee') || ($_SESSION['usertype'] == 'Partner')|| ($_SESSION['usertype'] == 'Institute') )
   {

           $reference_id=$_POST['myradio'];
   }
   else 
   {
           $reference_id=$_SESSION['id'];
   }
			
   $_SESSION['refId']=$reference_id;

include('./connection.php');
			
//set default  null value for noOfApplicants  in scoringcriteria
		mysql_query("update  scoringcriteria set noOfApplicants=''  where id='1'" );

  header('location:scoring/Application_scoring.php');
?>