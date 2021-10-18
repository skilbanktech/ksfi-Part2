<?php


   session_start();
   
if(isset($_SESSION['AppID']))
			   {
			   $id=$_SESSION['AppID']; 
			   
			   }
			   else
			   {
				  $id=""; 
			   }
		
		include('./connection.php');
		
		 include('common/class_Common.php');
						  
        $objCommon=new Common();
			
			$sql="select reference_id,cash,spdc_cheque,spdc_amount,spdc_bank,applicant_bank,Repayment_tenure,secondEmailTo  from sanctionmail_details where reference_id='$id'"; 
			
			$select_record=mysql_query($sql);
			
			$row= mysql_fetch_row($select_record);
			
			$sanctionmail_col= array('reference_id','cash','spdc_cheque','spdc_amount','spdc_bank','applicant_bank','Repayment_tenure','secondEmailTo');
		    if($row)

            {

             $fetch = array_combine($sanctionmail_col,$row); 
			 
			}
		
           $selectquery="select firstname,lastname,email,typeofLoan,mobile from student_details where reference_id='$id'";
		   
		   $select_record1= mysql_query($selectquery);
		   
		   $row1= mysql_fetch_row($select_record1);
		   
		   $col= array('firstname','lastname','email','typeofLoan','mobile');
		   
		    if($row1)

            {

             $fetch1 = array_combine($col,$row1); 
			 
			}
			
		   $selectquery2="select amount from course_details where reference_id='$id'";
		   
		   $select_record2= mysql_query($selectquery2);
		   
		   $row2= mysql_fetch_row($select_record2);
		   
		   $col2= array('amount');
		   
		    if($row2)

            {

             $fetch2 = array_combine($col2,$row2); 
			 
			}
			
			//update sanction status in  loan_decisioning
			
			$update_loan_decisioning="update loan_decisioning set sanction_status='Yes',sanction_release_date=NOW() where reference_id='$id'";
							   
							   mysql_query($update_loan_decisioning);
							   
		     $update_details="update student_details set sanction='Approved' where reference_id='$id'";
							   
							   mysql_query($update_details);
		
		   
		  
	$applemail=$fetch1['email'];	
	
 
    $to= $applemail;
	
	$mobile = $fetch1['mobile'];
   
    $typeofLoan =$fetch1['typeofLoan'];

  $mail_from= "loan@ksfi.co.in"; 	

        // $cc="";

		$headers = "From: ".$mail_from." <".$mail_from.">\r\n"; 	

		// Contact subject

		$ksfisubject =" Reference Id:".$id." Sanction  Mail of ".$fetch1['firstname']." for 
			". $typeofLoan ." of Rs. ". $fetch2['amount'] ." for ". $fetch['Repayment_tenure'] ."MONTHS"; 	

		// Details

		$body = "";

		$body .= "Dear ".$fetch1['firstname'].",\r\n";

		$body .= "  This mail is a confirmation for the loan sanction against the application for ". $typeofLoan ." to ".$fetch1['firstname']." ".$fetch1['lastname']." \r\n";
		
		$body .= "	We would be doing the funds transfer of Rs  ".$fetch2['amount']." very soon to your account..\r\n"; 
		
		$body .= "The Disbursement will be made subject to below conditions:\r\n\n\n";

		$body .= "1. Wholly signed and completed loan agreement of KASHMIR FINANCE PRIVATE LTD.\r\n";

		$body .= "2. Processing Fees transfer of Rs  ". $fetch['cash']."  to be credited in the account of Kashmir Finance Pvt Ltd.\r\n";

		$body .= "3. ".$fetch['spdc_cheque']."SPDC's of Rs  ". $fetch['spdc_amount']." each from  ". $fetch['spdc_bank']." bank account to be deposited with Kashmir Finance Pvt Ltd.\r\n";
		
		$body .= "4. All Interest and EMI payments to be deducted from ". $fetch['applicant_bank']." bank account through ECS/PDC/NACH/CASH/ANY OTHER ONLINE TRANSFER system.\r\n";
		
		$body .= "5. A total of INR ". $fetch['cash']." has to be serviced as interest during the duration of Loan at an IRR ".  $fetch['cash'].".\r\n";
		
	    $body .= "6. ECS/PDC/NACH form to be filled and signed if applicable. \r\n";
		
		$body .= "7. The repayment tenure is of  ".$fetch['Repayment_tenure']." months.\r\n\n\n";
		
		

		$body .="Thanks & Regard \r\n";
		
        $body .="For KSFi i.e. Kashmir Finance Pvt Ltd\r\n\n";
		
		$body .="Team Customer Service\r\n";
		
		$body .="Mail Id: Customerservice@ksfi.co.in\r\n";
		
		$body .="Authorised Signatory (Applicable In case the sanction letter is to be printed)\r\n";
		
		$body .="Disclaimer (Applicable in case the sanction letter is sent by mail):\r\n";
		
		$body .="This is an automatically generated email – please do not reply to it. If you have any please email us at Customerservice@ksfi.co.in\r\n";

     

		// Enter your email address

		$to = $applemail; 

		//echo ($body);			



		if (mail($to,$subject,$body,$headers))

		{
			
			$mail_status = "success";
			
			
			
					//send otp to mobile
				$sendmessage="Your KSFi loan amount ". $fetch2['amount']." is sanctioned.For more details check your Email";
				
				  $debug=false;
				// single chg
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
				
				
				//echo  $apiurl;
		
			}//end if condition
			
			
			
			$ksfi_email=$fetch['secondEmailTo'];
			
			
			$ksfisubject =" Reference Id:".$id." Sanction  Mail of ".$fetch1['firstname']." for 
			". $typeofLoan ." of Rs. ". $fetch2['amount'] ." for ". $fetch['Repayment_tenure'] ."MONTHS"; 	

		
		$ksfibody = "";

		$ksfibody .= "Dear KSFI User,\r\n";

		$ksfibody .= "  This mail is a confirmation for the loan sanction against the application for ". $typeofLoan ." to ".$fetch1['firstname']." ".$fetch1['lastname']." \r\n";
		
		$ksfibody .= "	We would be doing the funds transfer of Rs ".$fetch2['amount']." very soon to your account..\r\n\n\n"; 
		
		$ksfibody .= "The Disbursement will be made subject to below conditions:\r\n\n";

		$ksfibody .= "1. Wholly signed and completed loan agreement of KASHMIR FINANCE PRIVATE LTD.\r\n";

		$ksfibody .= "2. Processing Fees transfer of Rs ".$fetch['cash']." to be credited in the account of Kashmir Finance Pvt Ltd.\r\n";

		$ksfibody .= "3. ".$fetch['spdc_cheque']." SPDC's of Rs ".$fetch['spdc_amount']." each from ". $fetch['spdc_bank']." bank account to be deposited with Kashmir Finance Pvt Ltd.\r\n";
		
		$ksfibody .= "4. All Interest and EMI payments to be deducted from ". $fetch['applicant_bank']." bank account through ECS/PDC/NACH/CASH/ANY OTHER ONLINE TRANSFER system.\r\n";
		
		$ksfibody .= "5. A total of INR ". $fetch['cash']." has to be serviced as interest during the duration of Loan at an IRR ".  $fetch['cash'].".\r\n";
		
	    $ksfibody .= "6. ECS/PDC/NACH form to be filled and signed if applicable. \r\n";
		
		$ksfibody .= "7. The repayment tenure is of ".$fetch['Repayment_tenure']." months.\r\n\n\n";
		
		
		
		$ksfibody .= "Thanks & Regard \r\n";
		
        $ksfibody .="For KSFi i.e. Kashmir Finance Pvt Ltd\r\n\n";
		
		$ksfibody .="Team Customer Service\r\n";
		
		$ksfibody .="Mail Id: Customerservice@ksfi.co.in\r\n";
		
		$ksfibody .="Authorised Signatory (Applicable In case the sanction letter is to be printed)\r\n";
		
		$ksfibody .="Disclaimer (Applicable in case the sanction letter is sent by mail):\r\n";
		
		$ksfibody .="This is an automatically generated email – please do not reply to it. If you have any please email us at Customerservice@ksfi.co.in\r\n";

		
		
		 if (mail($ksfi_email ,$ksfisubject,$ksfibody,$headers))

                        {

                                    $mail_status = "success";
									
									
									
									

						}


     $Msg = 11;

		//$Msg ="sent successfully.";
   
    //header('Location:./DisplayLoanAgreement.php?refid='.$id);
	
      header("Location: ./sanction_mail.php?Msg=".$Msg."&refid=".$id);
	exit();


?>