<?php
session_start();
$email =$_POST['email'];

$userid=$email ;//either email or mobile


 
include('common/class_Common.php');

$objCommon=new Common();


//database connection
include('./connection.php');


	//to send the information into the database
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
	
	
	$firstname = $loggedinfo['firstname'];
	$email = $loggedinfo['email'];
	$password = $loggedinfo['password'];


	// Mail of sender
	$mail_from= "loan@ksfi.co.in"; 	
	$headers = "From: ".$mail_from." <".$mail_from.">\r\n"; 


	// Contact subject
	$subject ="KSF Account Details"; 
	
	// Details
	$body = "";
	$body .= "Dear ".$firstname.",\r\n";
	$body .= "Your login details are:\r\n"; 
	$body .= "Email/Username:".$email."\r\n";
	$body .= "Password:".$password."\r\n\n\n";
	$body .= "Best Regards,\r\n";
	$body .= "KSF Team.\r\n";

	// Enter your email address
	$to = $email; 
	//----------send login details to mobile---------//
		
		$sendmessage = "";
			
		$sendmessage .= "Dear ".$firstname.",\r\n";

	
        $sendmessage .=  "Your login details are:\r\n";

		$sendmessage .= "Userid:".$mobile."\r\n";

		$sendmessage .= "Password:".$password."\r\n";
		
          $debug=false;
     
	    $apiurl =  $objCommon->send_otp_sms($mobile, $sendmessage, $debug);
		
		//echo $apiurl;
	    $ch = curl_init($apiurl);
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		$curl_scraped_page = curl_exec($ch);
		
		
		curl_close($ch);
		
		if ($debug) {
			echo "Response: <br><pre>" . $curl_scraped_page . "</pre><br>";
		}
		
	//echo ($body);
	if (mail($to,$subject,$body,$headers))
	{
    	header("Location: ./index.php");
		
			return $curl_scraped_page;
			
	      exit();
	} else {
   echo("<p>Message delivery failed...</p>");
	}
	//echo ("Invalid email address or password");
	header("Location: ./forgotpassword.php");
	}
	else
	{
		//echo ("Invalid Email Address");
		header("Location: ./forgotpassword.php");
	}
	mysql_close($con);
 
?>