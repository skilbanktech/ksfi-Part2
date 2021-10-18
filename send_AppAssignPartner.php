<?php
ob_start();
         //database connection
	include('./connection.php');

         $id=$_POST['myradio'];
            
         $partnercontrolname=$id."cmbName";
         $partnername = $_POST[$partnercontrolname];

  //-----------------------------------------------  student_details  -------------------------------------------------------------------

         $select_record="select reference_id,firstname,middlename,lastname,email,address,street1,street2,state,district,city,pincode,mobile from student_details where reference_id='".$id."'";
         $select_query=mysql_query($select_record) or die(mysql_error());
	$row= mysql_fetch_row($select_query);
        
	if($row){
     
	$col = array('reference_id','firstname','middlename','lastname','dob','email','password','address','street1','street2','state','district','city','pincode','stdcode','phone','mobile','phone1','prevUniversity','prevCollege','prevCourse','marks','prefer_day','prefer_time','query','app_date','source','mail_status','update_date','partnername','app_status','employment','business','designation','income','bankbal','appworking','verifyagencyname','verificationstatus');

	$fetch = array_combine($col,$row); 
	
	$fname=$fetch['firstname'];
	$mname=$fetch['middlename'];
	$lname=$fetch['lastname'];
	$address=$fetch['address'];
	$street1=$fetch['street1'];
	$street2=$fetch['street2'];
	$state=$fetch['state'];
	$district=$fetch['district'];
	$city=$fetch['city'];
	$pincode=$fetch['pincode'];

	$email=$fetch['email'];	
	$Mobile=$fetch['mobile'];
	}

$select_query2="Select reference_id,coborrowerid, cfirstname,cmiddlename,clastname,cemail,caddress,cstreet1,cstreet2,cstate,cdistrict,ccity,cpincode,cmobile
                 from coapplicant_details where reference_id ='".$id."'";
   $select_record2=mysql_query($select_query2); 
	$row2= mysql_fetch_row($select_record2);
	        
	 if($row2)
             {
                $col2 = array('reference_id','coborrowerid','cfirstname','cmiddlename','clastname',
                            'cemail','caddress','cstreet1','cstreet2','cstate','cdistrict','ccity','cpincode','cmobile');
                $fetch2 = array_combine($col2,$row2); 

                $Co_fname=$fetch2['cfirstname'];
                $Co_mname=$fetch2['cmiddlename'];
                $Co_lname=$fetch2['clastname'];
                $Co_Address=$fetch2['clastname'];
                $Co_cstreet1=$fetch2['cstreet1'];
                $Co_cstreet2=$fetch2['cstreet2'];
                $Co_cstate=$fetch2['cstate'];
                $Co_cdistrict=$fetch2['cdistrict'];
                $Co_ccity=$fetch2['ccity'];
                $Co_cpincode=$fetch2['cpincode'];
                $Co_cemail=$fetch2['cemail'];
                $Co_Mobile=$fetch2['cmobile'];
            }	
           
//-----------------------------------------------  course_details-------------------------------------------------------------------
        
        $Course_query1 = "Select reference_id,course,duedate,amount from course_details where reference_id = '$id'";
	$Course_record1=mysql_query($Course_query1); 
	//or die(mysql_error());	

	$row_Course= mysql_fetch_row($Course_record1);
        if($row_Course)
          {
            $col_Course= array('reference_id','course','duedate','amount',);
            $fetch_Course = array_combine($col_Course,$row_Course); 	
	
            $course=$fetch_Course['course'];
            $amount=$fetch_Course['amount'];	
            $duedate=$fetch_Course['duedate'];		
	  }

//-----------------------------------------------  collegeaddressdetail (PartnerName) -------------------------------------------------------------------
        
$partner_record="select college from collegeaddressdetail where reference_id='$id'";
$partner_queary=mysql_query($partner_record);
$partner_row= mysql_fetch_row($partner_queary);

if($partner_row)
{
$partner_col = array('college');
$partner_fetch = array_combine($partner_col,$partner_row); 
	
	$college=$partner_fetch['college'];
}

//-----------------------------------------------  login_details (PartnerName) -------------------------------------------------------------------
        
$partner_record="select user_id,firstname from login_details where username='".$partnername."'";
$partner_queary=mysql_query($partner_record);
$partner_row= mysql_fetch_row($partner_queary);

if($partner_row)
{
$partner_col = array('user_id','firstname');
$partner_fetch = array_combine($partner_col,$partner_row); 
	
	$p_fname=$partner_fetch['firstname'];
}



if((mysql_num_rows($select_query) !=0))
{
$add_new="update student_details set partnername='$partnername' where reference_id='$id'";

	$add_query=mysql_query($add_new);
	$Msg = 18;
	
	
	// Mail of sender
		$mail_from= "loan@ksfi.co.in";

        $headers = "From: ".$mail_from." <".$mail_from.">\r\n";
        $headers .= "Cc: ".$mail_from."\r\n";

	// Contact subject
		$subject ="New lead assigned - Ref No:".$id."|City:".$city."|Amount:".$amount;
		// Details

		$body = "";
		$body .= "Dear ".$p_fname.",\r\n\n";

		$body .= "This following lead is assigned to you.Please call up the customer, meet him and get the required documents collected for speedy processing of the loan. Ensure maximum service to the customer without any issues and concerns within a turnaround time of 24 hours.\r\n\n";

		$body .= "The Applicant details are as below:.\r\n";

		$body .= "Reference ID:".$id."\r\n"; 
		$body .= "Applicant name:".$fname." ".$mname." ".$lname.",\r\n";
		$body .= "Applicant Address:".$address." ".$street1." ".$street2." ".$state." ".$district." ".$city." ".$pincode.",\r\n";
		$body .= "Email ID:".$email."\r\n";
		$body .= "Mobile:".$Mobile."\r\n\n";
		
		$body .= "The CoApplicant Details are as below:\r\n"; 
		$body .= "CoApplicant name:".$Co_fname." ".$Co_mname." ".$Co_lname.",\r\n";
		$body .= "CoApplicant Address:".$Co_Address." ".$Co_cstreet1." ".$Co_cstreet2." ".$Co_cstate." ".$Co_cdistrict." ".$Co_ccity." ".$Co_cpincode.",\r\n";
		$body .= "Email ID:".$Co_cemail."\r\n";
		$body .= "Mobile:".$Co_Mobile."\r\n\n";

		$body .= "The Loan Details are:\r\n"; 
		$body .= "Loan Amount:".$amount."\r\n";
		$body .= "Course Name:".$course."\r\n";
        $body .= "College Name:".$college."\r\n";
		 $body .= "Due Date of fees:".$duedate."\r\n\n";

		$body .= "Best Regards,\r\n";

		$body .= "KSF Team.\r\n";
 	 	$to = "$partnername";
 	 	
 	 	if (mail($to,$subject,$body,$headers))
		{


		}
	header("Location: ./AppStatusDetails.php?Msg=".$Msg);
}

ob_flush();
mysql_close($con);
?>