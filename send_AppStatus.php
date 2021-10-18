<?php

ob_start();
session_start();

$reference_id=$_POST['referenceID'];
$username= $_POST['firstname'];
$internal_email= $_POST['internal_email'];
$status= $_POST['status'];
$comments= $_POST['comments'];

//database connection
include('./connection.php');



//to send the information into the database
	//inserting student details
	$add_new="Insert into loanstatus(reference_id,updation_date,username,internal_email,status,comments) values ('$reference_id',sysdate(),'$username','$internal_email','$status','$comments')";
    $add_query=mysql_query($add_new);
    if($_SESSION['usertype'] == 'Employee')
    {
        $Update_AppStatus="update student_details set app_status='".$status."' where reference_id='".$reference_id."'";
        //echo($add_new);
        $Update_query=mysql_query($Update_AppStatus);
    }
	
    if ($add_query)
    {	
            $select_query="Select reference_id,firstname,middlename,lastname,dob,email,password,address,street1,street2,state,district,
                        city,pincode,stdcode,phone,mobile,phone1,prevUniversity,prevCollege,prevCourse,marks,prefer_day,prefer_time,query,
                        app_date,source,mail_status,update_date,partnername from student_details where reference_id='".$reference_id."'";
            $select_record=mysql_query($select_query);

                if (mysql_num_rows($select_record) != 0)
                {	
                    $inforow= mysql_fetch_row($select_record);
                    $infocol = array('reference_id','firstname','middlename','lastname','dob','email','password','address','street1','street2','state','district',
                        'city','pincode','stdcode','phone','mobile','phone1','prevUniversity','prevCollege','prevCourse','marks','prefer_day','prefer_time','query',
                        'app_date','source','mail_status','update_date','partnername');

                    $info = array_combine($infocol,$inforow);
//echo($info);
                    $firstname = $info['firstname'];
                    $email = $info['email'];
                    $referenceidformail = $info['reference_id']; 

                    //echo($referenceidformail);
                    $headers = "Reply-To: "."loan@ksfi.co.in"."\n";

                    // Contact subject
                    $subject =$referenceidformail."(".$firstname.")App Status Updated by ".$username; 

                    // Mail of sender
                    $mail_from= $internal_email; 
                    // Details
                    $ksfibody = "";
                    $ksfibody .= "Dear KSFi User,\r\n\n";
                    $ksfibody .= "Loan Application Status of ".$referenceidformail." is updated.\r\n";
                    $ksfibody .= "User Email: ".$email."  Name: ".$firstname."\r\n"; 
                    $ksfibody .= "Status: ".$status."\r\n";
                    $ksfibody .= "Comments: ".$comments."\r\n\n\n";
                 
                    //  echo($ksfibody);
                    // echo($subject);
                    //echo ($body);
                    if (mail($mail_from,$subject,$ksfibody,$headers))
                    {
                   
                            if ($_SESSION['usertype'] == 'Employee')
                            {
                                $sendemail=$_POST['sendemail'];

                                    if($sendemail == 'on')

                                    {
                                        $body = "";
                                        $body .= "Dear ".$firstname.",\r\n\n\n";
                                        $body .= "Your Loan Application Status is updated.\r\n";
                                        $body .= "Your application status details are:\r\n"; 
                                        $body .= "Status: ".$status."\r\n";
                                        $body .= "Comments: ".$comments."\r\n\n\n";
                                        $body .= "Best Regards,\r\n";
                                        $body .= "KSF Team.\r\n";

                                          // Contact subject
                                        $subUser =$referenceidformail."(".$firstname.") App Status Updated by ".$username; 

                                        $cc=$_POST['oemail'].",".$internal_email.",".$_POST['semail'];
                                            //Enter your email address
                                        $to = $email.","."$cc"; 
           
                                            if (mail($to,$subUser,$body,$headers))
                                                {
                                                } 
                                    }
                            	}  
                               } 
                             else 
                                {
                                    $Msg = 4;
                                    //"Email sending failed.";
                                    header("Location: ./AppStatusDetails.php?Msg=".$Msg);
                                }
           
                    } 
                    
            $Msg = 1;
            header("Location: ./AppStatusDetails.php?Msg=".$Msg);
	}
	else 
	{	
            $Msg = 0;
            header("Location: ./AppStatusDetails.php?Msg=".$Msg);

	 }
ob_flush();
mysql_close($con);
 
?>