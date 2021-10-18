<?php



if(isset($_GET['ref']))
{
$reference_id=$_GET['ref'];

}
elseif(isset($_POST['ref']))
{
	
	$reference_id=$_POST['ref'];
	
	$photo=$_POST['photo'];
	
	$IdentityProof=$_POST['IdentityProof'];
	
	$AcademicDocument=$_POST['AcademicDocuments'];
	
	$IncomeProof=$_POST['IncomeProof'];
	
	$ResidenceProof=$_POST['ResidenceProof'];
	
	$BankStatement=$_POST['BankStatement'];
	
    $secondmail=$_POST['secondmail'];
	
	$mailTo=$_POST['mailTo'];
	
	$mailToksfi=$_POST['mailToksfi'];
}




    
 
   $mailTo=explode(",",$mailTo);
   $mailToksfi=explode(",",$mailToksfi);
   

  
	 
	   
	 
	    include('./connection.php');
     
	 $select_query = "Select reference_id,firstname,middlename,lastname,email,mobile,loantype from student_details where reference_id = '$reference_id'";

	 $select_record=mysql_query($select_query); 

	 $row= mysql_fetch_array($select_record);
	 
	 $email=$row['email'];
	
	
     $select_query1 = "Select amount from course_details where reference_id = '$reference_id'";
								 
	 $select_record1=mysql_query($select_query1); 

	 $row1= mysql_fetch_array($select_record1);

   	 $select_query2 = "Select cemail from coapplicant_details where coborrowerid=1 and reference_id = '$reference_id'";
	 
	 $select_record2=mysql_query($select_query2); 

		 $row2= mysql_fetch_array($select_record2);
		 
	$select_query3 = "Select cemail from coapplicant_details where coborrowerid=2  and reference_id = '$reference_id'";
	 
	 $select_record3=mysql_query($select_query3); 

		 $row3= mysql_fetch_array($select_record3);


     if($row['loantype']=='Others')	
					{
								
			              $otherloans='yes';
					}
					else
					{
						$otherloans='No';
						
					}
					
	 
	    $mailarry=array();
		
   foreach($mailTo as $mail)
   
   
   {
	   
	   if($mail=='Applicant')
		   
       { 
	     $mailarry[]= $email;
		
	   }
	   elseif($mail=='CoApplicant1')
		   
       {
	     $mailarry[]= $row2['cemail'];
		
	   }
	   elseif($mail=='CoApplicant2')
		   
       {
	      $mailarry[]= $row3['cemail'];
		
	   }
    
	   
   }
   
 
   
   
     // comma in the array 
	$mailList = implode(', ', $mailarry); 
	  
	// Display the comma separated list 
	//print_r($mailList); 
	  
	    $mailksfiarry=array(); 
		
		
	 foreach($mailToksfi as $mailksfi)
   
   
   {
	   
	   if($mailksfi=='loan')
		   
       { 
	     $mailksfiarry[]= "loan@ksfi.co.in";
		
	   }
	   elseif($mailksfi=='add')
		   
       {
	     $mailksfiarry[]= $secondmail;
		
	   }
	  
    
	   
   }
   
   if (strpos($mailksfiarry, ',') !== false) {
   
    // comma in the array 
	$mailtoksfiList = implode(', ', $mailksfiarry); 
	
   }
   
  
	
	 
	 $amount=$row1['amount'];
	 
	 $email=$row['email'];
	 
	 $firstname=$row['firstname'];
	 
	 $mobile=$row['mobile'];

    
		$mobile_encoded = rtrim(strtr(base64_encode($mobile), '+*', '-_'), '=');
	
	   
	  // echo $mobile_encoded;
	   
	

     


	// Mail of sender

		$mail_from= "loan@ksfi.co.in"; 	

        // $cc="";

		$headers = "From: ".$mail_from." <".$mail_from.">\r\n"; 	

		// Contact subject

		$subject ="Reference ID: ".$reference_id." ".$firstname.",Loan Amount:".$amount."Status:Documents Pending"; 

		// Details

		$body = "";

		$body .= "Dear ".$firstname.",\r\n\n\n";

		$body .= "Thanks for applying to KSFi Education loans.\r\n";

		
		$body .= "Your Reference ID  is ".$reference_id."\r\n\n"; 

		$body .= "For speeding up your loan process please upload the documents  mentioned below:.\r\n\n";               
        
		
		
		
		if($photo!='') {	$body .= "Photos:".$photo."\r\n"; }
			
	
		if($IdentityProof!='') {	$body .= "Identity Proof:".$IdentityProof."\r\n"; }
		
		if($AcademicDocument!='') {	$body .= "Academic Document:".$AcademicDocument."\r\n"; }
		
		if($IncomeProof!='') {	$body .= "Income Proof:".$IncomeProof."\r\n"; }
		
		if($ResidenceProof!='') { $body .= "Residence Proof:".$ResidenceProof."\r\n"; }
		
		if($BankStatement!='') { $body .= "Bank Statement:".$BankStatement."\r\n\n"; }
			
			 
	    $body .="click this link to upload the documents - http://localhost/ksfi2/applConfirmation.php?sign=$mobile_encoded\r\n\n";

		$body .= "For any written querries you can also sent a mail to customerservice@ksfi.co.in\r\n";

		$body .= "Best Regards,\r\n";

		$body .= "KSFi Team.\r\n\n\n";
		
		$body .="This is an automated response. Please do not reply to this email.";


  
     

		// Enter your email address

		$to =  "rajani.b@ksfi.co.in";

		//echo ($body);			



		if (mail($mailList,$subject,$body,$headers))

		{

	    	//header("Location: ./fullApplication.php");

			//exit();

 			$mail_status = "Success";

			$add_new="Update student_details set docReminder_mail='Sent Successfully',docReminder_maildate=Now() where reference_id='".$reference_id."'";

			$add_query=mysql_query($add_new);

          
		//echo $add_new;
	   
		
	

       	    // Contact subject

			$ksfisubject ="Reference ID: ".$reference_id." ".$firstname.",Loan Amount:".$amount."Status:Documents Pending"; 

	

			// Details

			$ksfibody = "";

			$ksfibody .= "Dear KSFi User,\r\n\n";

			$ksfibody .= "An online application is filled by ".$firstname. " has to upload the documents mentioned below:\r\n\n";

			if($photo!='') {	$ksfibody .= "Photos:".$photo."\r\n"; }
			
	
				if($IdentityProof!='') {	$ksfibody .= "Identity Proof:".$IdentityProof."\r\n"; }
				
				if($AcademicDocument!='') {	$ksfibody .= "Academic Document:".$AcademicDocument."\r\n"; }
				
				if($IncomeProof!='') {	$ksfibody .= "Income Proof:".$IncomeProof."\r\n"; }
				
				if($ResidenceProof!='') {	$ksfibody .= "Residence Proof:".$ResidenceProof."\r\n"; }
				
				if($BankStatement!='') {	$ksfibody .= "Bank Statement:".$BankStatement."\r\n\n"; }
			
			 $ksfibody .= "Best Regards,\r\n";

		     $ksfibody .= "KSFi Team.\r\n\n\n";
			 
			 $ksfibody .="This is an automated response. Please do not reply to this email.";


  


             $mail_to=$secondmail;
			 
			 
            //$ksfiheaders = "From: ".$mail_from." <".$email.">\r\n"; 



  

                    if (mail($mailtoksfiList ,$ksfisubject,$ksfibody,$headers))

                        {

                                    $mail_status = "Failed";
						}
						
						
		}
						
?>