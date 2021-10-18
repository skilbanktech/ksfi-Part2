<?php

include('./connection.php');

$id=$_POST['id'];

$driverId=$_POST['driverId'];

$typeofscoring=$_POST['typeofscoring'];

$applicantType=$_POST['applicantType'];

$score=$_POST['score'];

if($applicantType=='student')
{

   $coborrowerid='0';

}
elseif($applicantType=='coborrower1')

{
   $coborrowerid='1';
}

elseif($applicantType=='coborrower2')
{
   $coborrowerid='2';
}


  include('common/Class_Scoring.php');


				$val= new ApplicationScoring();

			
			    $table=$val->getTableName($typeofscoring);


 if($typeofscoring =='range')
								
	 {



				$rangefrom=$_POST['Range_From'];

				$rangeTo=$_POST['Range_To'];

               mysql_query("update $table set Range_From='$rangefrom' ,Range_To ='$rangeTo',weightage='$score', typeofapplicant='$applicantType',  coborrowerid='$coborrowerid'  where id='$id'");

    }
	elseif($typeofscoring =='options')	
	{
			
		$options=$_POST['options'];

		 

               mysql_query("update $table set options='$options' ,weightage='$score',typeofapplicant='$applicantType',  coborrowerid='$coborrowerid'  where id='$id'");	
			
			
			
	}
	elseif($typeofscoring =='contactdetails')	
	{
		
          $options=$_POST['options'];
		  
        mysql_query("update $table set options='$options' ,weightage='$score', typeofapplicant='$applicantType',  coborrowerid='$coborrowerid' where id='$id'");			
	}
	elseif($typeofscoring =='category')	
	{
		
          $category=$_POST['category'];
		  
        mysql_query("update $table set TypeOfCategories='$category' ,weightage='$score' ,typeofapplicant='$applicantType',  coborrowerid='$coborrowerid' where id='$id'");			
	}
	
	

header('location:Read_scoringdetails.php?typeofScoring='.$typeofscoring.'&driver='.$driverId);












?>