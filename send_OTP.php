
<?php
ob_start();


  include('common/class_Common.php');
						  
             $objCommon=new Common();

$otp=$_POST['otp'];

$email=$_POST['email'];

$mobile1=$_POST['mobile'];

$firstname=$_POST['firstname'];


//send OTP to mail
		   
		$mail_from= "loan@ksfi.co.in"; 	

        // $cc="";

		$headers = "From: ".$mail_from." <".$mail_from.">\r\n"; 	

		// Contact subject

		$subject ="KSFi Registration  One Time Password(OTP)"; 	

		
		$body = "";
		
		// Details
		 
				
		$body .= "Dear ".$firstname.",\r\n" ;

		$body .= "Welcome to the ksfi registration process.\r\n";
		
		$body .= "Your OTP is: ".$otp."\r\n";

	 

		// Enter your email address

		$to = "$email"; 
		
	//	$debug=false;

		//echo ($body);
		
		
	
	

		if (mail($to,$subject,$body,$headers))

		{
		
		
		$mail_status="success";
		
		
		}
		
		
	//$getmobile//  array('user1' => $mobile1,'user2' => '','user3' => '');
		

		
		//send otp to mobile
		$sendmessage="Your KSFi confirmation code is  ".$otp;
		
          $debug=false;
     	// single chg
	    $apiurl =  $objCommon->send_otp_sms($mobile1, $sendmessage, $debug);
		
		//echo $apiurl;
	      $ch = curl_init($apiurl);

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		$curl_scraped_page = curl_exec($ch);
		
		
		curl_close($ch);
		
		if ($debug) {
			echo "Response: <br><pre>" . $curl_scraped_page . "</pre><br>";
		}
		
		
		echo  $apiurl;
		
		
		
		?>