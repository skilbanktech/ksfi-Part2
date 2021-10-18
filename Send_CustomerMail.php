<?php
ob_start();
session_start();
 if(($_SESSION['usertype'] == 'Employee') || ($_SESSION['usertype'] == 'Partner'))
            {
            //$id=$_POST['no'];
            $email = $_SESSION['internal_email'];
            }
            else 
            {
           // $id=$_SESSION['id'];
            $email = $_SESSION['email'];
            }
           // echo $id;
           // echo $email;
           include('./connection.php');
if(!empty($_POST['check_list'])) {
    foreach($_POST['check_list'] as $check) {
             //echoes the value set in the HTML form for each checked checkbox.
              //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
                         //in your case, it would echo whatever $row['Report ID'] is equivalent to.
            list($referenceID,$checkID)=split('[.]', $check);    
           
            
            
            

            

    $select_record="select * from pdcheck_details where check_id= '".$checkID."' and reference_id='".$referenceID."'";
    $select_query=mysql_query($select_record);
    $row= mysql_fetch_row($select_query);        
	if($row){    
	$col = array('check_id','reference_id','amount','checkno','bankname','branchname','ifsccode','branchaddress','presentationdate',
	'presentationstatus','cashdepositedby','docname','paymentype','bouncedreasons','depositorname','accountno');
	$fetch = array_combine($col,$row); 	
		
		

	$amount=$fetch['amount'];	
	$presentationdate=$fetch['presentationdate'];
	}		
	$select_record1="select * from student_details where reference_id='".$referenceID."'";
    $select_query1=mysql_query($select_record1);
    $row1= mysql_fetch_row($select_query1);   
   if($row1)
   {
   $col1 = array('reference_id','firstname','middlename','lastname','dob','email','password','address','street1','street2','state','district',
            'city','pincode','stdcode','phone','mobile','phone1','prevUniversity','prevCollege','prevCourse','marks','prefer_day',
            'prefer_time','query','app_date','source','mail_status','update_date','partnername','app_status','employment','business','designation','income','bankbal','appworking');
   $fetch1 = array_combine($col1,$row1); 
   $p_fname=$fetch1['firstname'];
   $p_Mname=$fetch1['middlename'];
   $p_lname=$fetch1['lastname'];
   $S_email=$fetch1['email'];
   }       
        // Mail of sender
		$mail_from= "loan@ksfi.co.in";
		 // $cc="";
        $headers = "From: ".$mail_from." <".$mail_from.">\r\n"; 

	// Contact subject
		$subject ="Loan Payment Reminder";
		// Details

		$body = "";
		$body .= "Dear ".$p_fname." ".$p_Mname." ".$p_lname.",\r\n";

		$body .= "This is Payment Reminder Mail.\r\n";
		
		

        $body .= "Your payment of amount ".$amount." is due on ".$presentationdate.". Please maintain the required balance..\r\n";

		$body .= "the details are.\r\n\n\n";

		$body .= "Reference ID is ".$referenceID."\r\n\n\n";
		
		

        $body .= "Payment ID is ".$checkID."\r\n\n\n";

		$body .= "Applicant name is:".$p_fname."\r\n"; 

		$body .= "Amount: ".$amount."\r\n\n\n";
		
		

		$body .= "Due Date: ".$presentationdate."\r\n\n\n";
		
		

		$body .= "Best Regards,\r\n";

		$body .= "KSF Team.\r\n";

 	 	$to = "$S_email";
 	 	//echo $subject;
 	 	//echo $to;
 	 	//echo $body ;
 	 	//echo $headers;
 	 	
 	 	

 	 	if (mail($to,$subject,$body,$headers))
		{
            $Msg = 11;
		}
		else
		{
		   $Msg = 12;
		}

		//$Msg ="New Record failed.";
		header("Location: ./AppStatusDetails.php?Msg=".$Msg);

}           
}
       $Msg = 12;

        header("Location: ./AppStatusDetails.php?Msg=".$Msg);

//echo($RefPaymentID)

//$reference_ID=$RefPaymentID.split("."); 

//echo($reference_ID[0]);

mysql_close($con);
 ob_flush();

?> 