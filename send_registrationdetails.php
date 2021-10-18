<?php

ob_start();

session_start();

include('./connection.php');

include('common/class_Common.php');



$objCommon=new Common();


 include('common/common_mail.php');
						  
             $val=new Commonfunction();



$firstname=$_POST['firstname'];



$lastname = $_POST['lastname'];




$email = $_POST['email'];


$mobile=stripslashes(trim($_POST['mobile']));

$mail=explode("@",$email);

$password = $mail[0];



$prevCourse = $_POST['prevCourse'];

$prevUniversity = $_POST['prevUniversity'];


$college = $_POST['college'];

$course = $_POST['course'];

$verified=$_POST['verified'];

$loantype=$_POST['loantype'];

$typeofLoan=$_POST['typeofLoan'];

$vehicleloan_type=$_POST['vehicleloanType'];


$amount = stripslashes(trim($_POST['amount']));


$state = "";

$district = "";

$city = "";

if($loantype=='Others')
	
	{
		

$password = $objCommon->randomPassword($firstname);

		
$state = $_POST['country'];

$district = $_POST['state'];

$city = $_POST['city'];

$state= $objCommon->GetStateName($state);

$amount = stripslashes(trim($_POST['amount1']));

	}

if(isset($_POST['link'])&& $_POST['link']!='' )
{

$link = $_POST['link'];

}
else
{
	
	$link='';
	
	
}

$squery =  "SELECT refid, contactid FROM params";

$sresult =  mysql_query($squery);

$row= mysql_fetch_row($sresult);



if($row)

{

	$col = array('refid','contactid');

	$comb = array_combine($col,$row);

	$id = $comb['refid'];

	$id++;

	$update_query = "Update params set refid =$id";  

	//echo $update_query;

	 mysql_query($update_query);

	$reference_id = "R".date('Y').date('m').str_pad($id,"05","0",STR_PAD_LEFT);

	//echo $reference_id;

}
      
	  
	  if(($_SESSION['usertype'] == 'Employee') || ($_SESSION['usertype'] == 'Partner')|| ($_SESSION['usertype'] == 'Agency') || ($_SESSION['usertype'] == 'Institute') )

           {
			   $verified=$_SESSION['usertype'];
			   
			   
		   }





	//get previous course name by its id
	$sql1=mysql_query("SELECT previous_course FROM previous_courselist where id='$prevCourse'");
	
	$fetch_arr=mysql_fetch_array($sql1);
	
	$previous_course=$fetch_arr['previous_course'];
	
	 

    if($loantype=='Others')
	{
	 $query = "select id from registration_details where  mobile='$mobile'";
	}
	else
	{
	  $query = "select id from registration_details where email = '$email'";
		
	}
     $select_record1 = mysql_query($query);

     $count_rows = mysql_num_rows($select_record1);    

	
   //echo $query; 
  

    if( ($count_rows == 0 ) && (isset($_SESSION['setuseridentity'])))

    {

       if($verified!='')
	  {		   
       
		   $sql= "insert into 
		  registration_details(firstname,lastname,email,password,mobile,prevCourse,prevUniversity,college,course,amount,facebooklink,verified,
		   state,district,city,loantype,typeofLoan,vehicleloanType,created) values('$firstname',
		  '$lastname','$email','$password','$mobile','$prevCourse','$prevUniversity','$college','$course','$amount','$link','$verified','$state',
		  '$district','$city','$loantype','$typeofLoan','$vehicleloan_type',NOW())";

			$result=mysql_query($sql);
	   
	   
	   //echo $sql;
   
   
   
   
         	// Mail of sender

		$mail_from= "loan@ksfi.co.in"; 	

        // $cc="";

		$headers = "From: ".$mail_from." <".$mail_from.">\r\n"; 	

		// Contact subject

		$subject ="KSFi  Login Details"; 	

		// Details

		$body = "";
		
	    

		$body .= "Dear ".$firstname.",\r\n";

		$body .= "Thanks for contacting us.\r\n";

		$body .= "You have successfully registered.\r\n";

        $body .=  "Your login details are:\r\n";

		$body .= "Email/Username:".$email."\r\n";

		$body .= "Password:".$password."\r\n";
       
	 

		// Enter your email address

		$to = "$email"; 

		//echo ($body);			



		if (mail($to,$subject,$body,$headers))

		{
		
		
		 $mail_status="success";
		
		
		}
		
		
	//----------send login details to mobile---------//
		
		$sendmessage = "";
			
		$sendmessage .= "Dear ".$firstname.",\r\n";

		$sendmessage .= "You have successfully registered for ".$typeofLoan.".\r\n";

        $sendmessage .=  "Your login details are:\r\n";

		$sendmessage .= "Userid:".$mobile."\r\n";

		$sendmessage .= "Password:".$password."\r\n";
		
          $debug=false;
     
	    $apiurl =  $objCommon->send_otp_sms($mobile, $sendmessage, $debug);
		
		//echo $apiurl;
	       $ch = curl_init($apiurl);

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		$curl_scraped_page = curl_exec($ch);
		
		curl_close($ch);
		
		if ($debug) {
			echo "Response: <br><pre>" . $curl_scraped_page . "</pre><br>";
		}
		
		
	
   
   
   
   
   
          // Contact subject

			$ksfisubject ="New Registration: ".$firstname; 

	

			// Details

			$ksfibody = "";

			$ksfibody .= "Dear KSFi User,\r\n";

			$ksfibody .= "An online registration  filled by ".$firstname."\r\n";

			$ksfibody .= " Email Address:".$email."\r\n";

            $ksfibody .= " Mobile:".$mobile."\r\n";
			
			if($loantype!='Others')
	    {
			
			$ksfibody .= " Previous course:".$previous_course."\r\n";
			
			$ksfibody .= " Previous University:".$prevUniversity."\r\n";
			
			$ksfibody .= " College of study:".$college."\r\n";
			
			$ksfibody .= " Course:".$course."\r\n";
			
		}

			$ksfibody .= " Loan amount is ".$amount."\r\n"; 



           if (mail($mail_from ,$ksfisubject,$ksfibody,$headers))

                        {
						
						  $mail_status="success";
						}
						
						
	   
            //set email in session
   
            $_SESSION['registeredemail']=$email;	  
						//set session
		     $_SESSION['email'] = $email;
				$mail=explode("@",$email);
				
			 $_SESSION['mobile'] = $mobile;
			
			if(!isset($_SESSION['internal_email']))
			{
				$_SESSION['firstname'] = $firstname;
				//$_SESSION['id'] = $reference_id;
				
				$_SESSION['name'] = $firstname;
				
			   $_SESSION['usertype'] = 'Student';
			   $_SESSION['Currentrole'] = 'student';
			
			}
			
			
		  

						
		        header("Location: ./thanks.php");
				 
				 	return $curl_scraped_page;
		
				
   
                  exit();

   
   
      }
	  
	  else 
		  
		  {   
		   $Msg = 4;
	   
	  
 

		//$Msg ="New Record failed.";

		header("Location: ./AppStatusDetails.php?Msg=".$Msg);
		  
		  
		  
		  
		  }
	}
   
   else
   
   {
   
       $Msg = 24;
	   
	  
 

		//$Msg ="New Record failed.";

		header("Location: ./AppStatusDetails.php?Msg=".$Msg);
   
   }
   
	 unset($_SESSION['setuseridentity']);

		

?>
