<?php

ob_start();

session_start();

include('./connection.php');

include('common/class_Common.php');

$objCommon=new Common();




$firstname=$_POST['firstname'];

$lastname = $_POST['lastname'];

$email = $_POST['email'];

$usertype='Partner';

$url = $_POST['url'];

$EducationCounsellor=$_POST['EducationCounsellor'];

$LoanAgency=$_POST['LoanAgency'];

$TrainingInstitute=$_POST['TrainingInstitute'];

$VerificationAgency=$_POST['VerificationAgency'];




if($EducationCounsellor!='')
{
	
$Role = $EducationCounsellor;

}
if($LoanAgency!='')
{
	
$Role = $LoanAgency;

}
if($TrainingInstitute!='')
{
	
$Role = $TrainingInstitute;

}

if($EducationCounsellor!=''&&$TrainingInstitute!='')
{
	
$Role = $EducationCounsellor.",".$TrainingInstitute;

}
if($LoanAgency!=''&&$TrainingInstitute!='')
{
	
$Role = $LoanAgency.",".$TrainingInstitute;;

}

if($VerificationAgency!='')
{
	
$Role = $VerificationAgency;

}




$mobile=stripslashes(trim($_POST['mobile']));

$mail=explode("@",$email);

$password = $mail[0];


//echo "mobile".$mobile;

$state = "";

$district = "";

$city = "";


		
$state = $_POST['country'];

$district = $_POST['state'];

$city = $_POST['city'];


$bankdetails=$_POST['bankdetails'];

$branchadd = $_POST['branchadd'];

$accountNo=$_POST['accountNo'];

$accountholder=$_POST['accountholder'];

$bankname = $_POST['bankname'];

$branchname=$_POST['branchname'];

$ifsccode = $_POST['ifsccode'];

$micr = $_POST['micr'];

$typeofcompany = $_POST['typeofcompany'];



$state= $objCommon->GetStateName($state);

//confirmation_code

$confirm_code=md5($email."#".$mobile);

$reference_id = "P".date('Y').date('m').str_pad("1","05","0",STR_PAD_LEFT);

$docpath = './partnerdoc/'.$reference_id;
If(!file_exists('./partnerdoc/$reference_id'))
{ 
    $createsid = mkdir($docpath, 0777); 
}

$target_path = "./partnerdoc/$reference_id/";
$target_path = $target_path.basename($_FILES['file']['name']); 
//echo "basefile".basename($_FILES['file']['name']);



if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path))
{
} 


$name=basename($_FILES['file']['name']);

//to send the information into the databases

	$select_query="Select * from login_details where username='".$email."' ";

	$select_record=mysql_query($select_query);
	


	if((mysql_num_rows($select_record)==0)&& (isset($_SESSION['useridentity'])))

	{	
	
	
	  
	$add_new="Insert into login_details(reference_id,firstname,lastname,username,usertype,password,state,district,city,location,role,mobile,activestatus,confirmationcode,webpage_url,docname,created)
           values('$reference_id','$firstname ','$lastname','$email','$usertype','$password','$state','$district','$city','$city','$Role','$mobile','0','$confirm_code','$url','$name',NOW())";
		   
		   
		   
   
       $add_bankdetails = "Insert into partner_bank_details(reference_id,borrowertype,bankdetails,accountNo,accountholder,
                       
					   bankname,branchname,branchadd,ifsccode,micr,typeofcompany,created)
					   values('$reference_id','Borrower','$bankdetails','$accountNo','$accountholder','$bankname','$branchname','$branchadd','$ifsccode','$micr','$typeofcompany',NOW())";
					   
			mysql_query($add_bankdetails);	
			
		   
		   
		   
		   

	        //echo($add_new);

	       $add_query=mysql_query($add_new);
	
	
	    	// Mail of sender

		$mail_from= "partner@ksfi.co.in"; 	

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

		$body .= "Userid:".$email."\r\n";

		$body .= "Password:".$password."\r\n\n";
		
		$body .=  $objCommon->getemailendmsg();
		
       
	 

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

		$sendmessage .= "You have successfully registered.\r\n";

        $sendmessage .=  "Your login details are:\r\n";

		$sendmessage .= "Userid:".$email."\r\n";

		$sendmessage .= "Password:".$password."\r\n\n";
		
		
		
	
		
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

			$ksfisubject ="Partner Registration: ".$firstname; 

	

			// Details

			$ksfibody = "";

			$ksfibody .= "Dear KSFi User,\r\n";

			$ksfibody .= "An online  partner registration  filled by ".$firstname."\r\n";

			$ksfibody .= " Email Address:".$email."\r\n";

            $ksfibody .= " Mobile:".$mobile."\r\n";
			
			
			$ksfibody .= " Role:".$Role."\r\n"; 
			
			$ksfibody .= "Click this link to Activate User Account - http://localhost/ksfi2/confirmation.php?passkey=$confirm_code\r\n\n";




           if (mail($mail_from ,$ksfisubject,$ksfibody,$headers))

                        {
						
						  $mail_status="success";
						}

                    // $Msg=0;
					 
	          header("Location: ./send_internalLogin.php?email=".$email);		

			  	return $curl_scraped_page;
	}

	else

	{

		header("Location: ./partnerregister.php");

		//echo ("Invalid email address or password");

	
	}
// unset the session of user identity
	 unset($_SESSION['useridentity']);	

?>
