<?php
ob_start();

$userid= $_POST['userid'];  
$firstname =$_POST['firstname'];
$lastname =$_POST['lastname'];
$email =$_POST['email'];
$usertype =$_POST['cmbUser'];
$Role =$_POST['cmbUsertype'];
$password = $_POST['password'];
//$location = $_POST['countrySelect'];
$Mobile= $_POST['mobile'];
//echo $Mobile;
$cityarr= $_POST['listofcity'];
$location="";
//echo $cityarr;
if(!empty($cityarr)) {
	//echo "got citylist";
	$cityarrsize =  sizeof($cityarr);
	$i=1;
    foreach($cityarr as $check) 
    {   
	    $location=$location.$check;
    	if ( $i < $cityarrsize )
    	{   			
    		$location=$location.','; 		
    	}		   			
		$i++;
     }          
     }

 // echo $location;  





//database connection
include('./connection.php');


	//to send the information into the databases
	
	

	$select_query="Select * from login_details where email='".$email."' and password='".$password."'";
	$select_record=mysql_query($select_query);
	
	

	if((mysql_num_rows($select_record)==0))
	{		

	$add_new="update login_details set firstname='$firstname',lastname='$lastname',username='$email',usertype='$usertype',password='$password',
		  location='$location',role='$Role',mobile='$Mobile' where user_id=$userid";

	//echo($add_new);
	$add_query=mysql_query($add_new);
      
      

        $Msg = 13;
		header("Location: ./AppStatusDetails.php?Msg=".$Msg);
	}
	else
	{
	    $Msg = 14;

	    header("Location: ./AppStatusDetails.php?Msg=".$Msg);

			//echo ("Invalid email address or password");
	}
ob_flush();
mysql_close($con);

?>