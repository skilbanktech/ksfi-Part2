<?php
session_start();

if(isset($_POST['email']))
{

	$userid = $_POST['email'];
}
elseif(isset($_GET['mob']))
 {
    $mobile_encoded = $_GET['mob'];
	
  //decode
	$userid = base64_decode(strtr($mobile_encoded, '-_', '+*'));
 
 }
 elseif(isset($_GET['email']))
 {
    $email_encoded = $_GET['email'];
	
  //decode
	$userid = base64_decode(strtr($email_encoded, '-_', '+*'));
 
 }
 
 
 //$userid=$email;
 


//$password = $_POST['password'];


//database connection
include('./connection.php');

	if (strpos($userid, '@') !== false)
	{

	   $select_query="Select reference_id,firstname,lastname,email,password,mobile from student_details where email='".$userid."'";	
				
	}	
    else
	{
	   $select_query="Select reference_id,firstname,lastname,email,password,mobile from student_details where mobile='".$userid."'";
	   
	}
 
	$select_record=mysql_query($select_query);
	$row_count1 = mysql_num_rows($select_record);
	//to send the information into the database
	
     $row_count=0;
	
	if($row_count1 ==0)
	{
	
		if (strpos($userid, '@') !== false)
		{

		  $select_query="Select reference_id,firstname,lastname,email,password,mobile  from registration_details where email='".$userid."'";
		}
		else
			{
				
			$select_query="Select reference_id,firstname,lastname,email,password,mobile  from registration_details where mobile='".$userid."'";	
			}
		//echo $select_query;
	$select_record=mysql_query($select_query);
	$row_count = mysql_num_rows($select_record);
	
	 
	
	  }
	  
	
	  
	  
	  if($row_count1 !=0 || $row_count !=0)
	  {
	    $inforow= mysql_fetch_row($select_record);
		$infocol = array('reference_id','firstname','lastname','email','password','mobile');
		$loggedinfo = array_combine($infocol,$inforow);
	
	    $id=$loggedinfo['reference_id'];
		// put in session 7
			$_SESSION['row_count'] = $row_count; //multiple application with same email ID
            $_SESSION['firstname'] = $loggedinfo['firstname'];
			$_SESSION['id'] = $loggedinfo['reference_id'];
			$_SESSION['email'] = $loggedinfo['email'];
			$_SESSION['mobile'] = $loggedinfo['mobile'];
			$mail=explode("@",$loggedinfo['email']);
			

			$_SESSION['name'] = $loggedinfo['firstname'];
			$_SESSION['usertype'] = 'student';
			$_SESSION['Currentrole'] = 'student';
			
			$squery =  "SELECT doc_name FROM document_details where reference_id='".$id."'";

	        $sresult =  mysql_query($squery);
			
			$row_count_doc = mysql_num_rows($sresult);
			
			if($row_count_doc < 4)
			{
				header("Location: ./upload_documents.php");//return to upload documents page 
			   
			}
			
			else
			{
				 header("Location: ./MyAccount.php");
				
			}
		
	}
	
	else
	    {
	
		 header("Location: ./login.php");
		//echo ("Invalid email address or password");
	}
	mysql_close($con);
 
?>

