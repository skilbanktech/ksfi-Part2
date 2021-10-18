
<?php


if(isset($_GET['ref']))
{
$reference_id=$_GET['ref'];

}
elseif(isset($_POST['ref']))
{
	
	$reference_id=$_POST['ref'];
	
	$selectedDocs=$_POST['selectedDocs'];
	
	$secondmail=$_POST['secondmail'];
}
	
 
   $seldocs=explode(",",$selectedDocs);
   
  
	   
	 
	    include('./connection.php');
     
	 $select_query = "Select reference_id,firstname,middlename,lastname,email,mobile,loantype from student_details where reference_id = '$reference_id'";

	 $select_record=mysql_query($select_query); 

	 $row= mysql_fetch_array($select_record);
	
	
     $select_query1 = "Select amount from course_details where reference_id = '$reference_id'";
								 
	 $select_record1=mysql_query($select_query1); 

	 $row1= mysql_fetch_array($select_record1);


     if($row['loantype']=='Others')	
					{
								
			              $otherloans='yes';
					}
					else
					{
						$otherloans='No';
						
					}
					
	 
	 $amount=$row1['amount'];
	 
	 $email=$row['email'];
	 
	 $firstname=$row['firstname'];
	 
	 $mobile=$row['mobile'];



     


	// Mail of sender

		$mail_from= "loan@ksfi.co.in"; 	

        // $cc="";

		$headers = "From: ".$mail_from." <".$mail_from.">\r\n"; 	

		// Contact subject

		$subject ="KSF Account Details"; 	

		// Details

		$body = "";

		$body .= "Dear ".$firstname.",\r\n";

		$body .= "Thank you applying to KSFi Education loans.\r\n";

		$body .= "You have successfully applied for loan.\r\n\n\n";

		$body .= "Your Reference ID  is ".$reference_id."\r\n\n\n"; 

		$body .= "For speeding up your loan process please upload the documents  mentioned below:.\r\n";               
        
		foreach($seldocs as $seldoc)
     {
        $body .= $seldoc."\r\n";
		
		
	 }
      

		$body .= "For any written querries you can also sent a mail to customerservice@ksfi.co.in\r\n\n\n";

		$body .= "Best Regards,\r\n";

		$body .= "KSF Team.\r\n";

     

		// Enter your email address

		$to = $email; 

		//echo ($body);			



		if (mail($to,$subject,$body,$headers))

		{

	    	//header("Location: ./fullApplication.php");

			//exit();

 			$mail_status = "Success";

			$add_new="Update student_details set docReminder_mail='Sent Successfully',docReminder_maildate=Now() where reference_id='".$reference_id."'";

			$add_query=mysql_query($add_new);

          
		//echo $add_new;
	   
		
	

       	    // Contact subject

			$ksfisubject ="Reminder for filling the full application form"; 

	

			// Details

			$ksfibody = "";

			$ksfibody .= "Dear KSFi User,\r\n";

			$ksfibody .= "An online application is filled by ".$firstname. " has to upload the documents mentioned below:\r\n";

			
				foreach($seldocs as $seldoc)
			 {
				$ksfibody .= $seldoc."\r\n";
				
				
			 }
			 
			 $ksfibody .= "Best Regards,\r\n";

		     $ksfibody .= "KSF Team.\r\n";


             $mail_to=$secondmail;
			 
			 
            //$ksfiheaders = "From: ".$mail_from." <".$email.">\r\n"; 



  

                    if (mail($mail_to ,$ksfisubject,$ksfibody,$headers))

                        {

                                    $mail_status = "Failed";
						}
						
						
		}
						
?>








