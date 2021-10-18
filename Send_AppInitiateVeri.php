<?php



ob_start();

//database connection

include('./connection.php');



$id=$_POST['myradio'];



$Agencycontrolname=$id."Agency";

$AgencyEmail= $_POST[$Agencycontrolname];

$partnercontrolname=$id."Name";

$partnername = $_POST[$partnercontrolname];

//echo $partnercontrolname;

//echo "Partner".$partnername;



//fetch studentDetail

$select_record="select reference_id,firstname,middlename,lastname,dob,email,password,address,street1,street2,state,district,city,pincode,stdcode,phone,mobile,phone1,prevUniversity,prevCollege,prevCourse,marks,prefer_day,prefer_time,query,app_date,source,mail_status,update_date,partnername,app_status,employment,business,designation,income,bankbal,appworking,verifyagencyname,verificationstatus from student_details where reference_id='".$id."'";

$select_query=mysql_query($select_record) or die(mysql_error());

$row= mysql_fetch_row($select_query);

        

if($row)

{    

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

	$Mobile=$fetch['mobile'];

}



$select_query2="Select * from coapplicant_details where reference_id ='".$id."'";

$select_record2=mysql_query($select_query2); 

$row2= mysql_fetch_row($select_record2);

	        

if($row2){

     

	$col2 = array('reference_id','coborrowerid','relation','relative','cfirstname','cmiddlename','clastname','cdob',

'cpanno','cemail','caddress','cstreet1','cstreet2','cstate','cdistrict','ccity','cpincode','cstdcode','cphone','cmobile','cphone1',

'cemployment','cbusiness','cdesignation','cincome','cloan','housingamt','caramt','jeepamt','twowheeleramt','consamt','totamt',

'cbankbal','samestudadd','housingemi','caremi','jeepemi','twowheeleremi','consemi','totemi');

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

	$Co_Mobile=$fetch2['cmobile'];

}

	

//echo "Agency email".$AgencyEmail;



//fetch partener detail

$Agency_record="select user_id,firstname,lastname,username,usertype,password,location,role from login_details where username='".$AgencyEmail."'";

$Agency_queary=mysql_query($Agency_record);

$Agency_row= mysql_fetch_row($Agency_queary);



if($Agency_row)

{
	$Agency_col = array('user_id','firstname','lastname','username','usertype','password','location','role','mobile');
	$Agency_fetch = array_combine($Agency_col,$Agency_row); 

	$A_fname=$Agency_fetch['firstname'];

}



if((mysql_num_rows($select_query) !=0))

{

	$add_new="update student_details set verifyagencyname='$AgencyEmail',verificationstatus='$VeriStatus' where reference_id='$id'";



    	$add_query=mysql_query($add_new);

	$Msg = 6;

	
	// Mail of sender

 //	$mail_from= $_SESSION['internal_email'];

  //      echo $_SESSION['internal_email'];

  //      echo "mail_from:".$mail_from;

        $mail_from =  "loan@ksfi.co.in";

        $ksfiloanid = "loan@ksfi.co.in";



	$cc=$partnername.",".$ksfiloanid;

        $headers = "From: ".$mail_from." <".$mail_from.">\r\n"."Cc: ".$cc."\r\n";

	// Contact subject

	$subject ="Verification Initiated for Ref.No.".$id;

	// Details



	$body = "";

	$body .= "Dear ".$A_fname.",\r\n";

	$body .= "The following lead is initiated by KSFi and assigned to you. Please complete the field verification and telephone verification as desired and agreed as per KSFi norms with a turnaround time of 24 hours.\r\n\n";

	$body .= "The Applicant details are as below:\r\n";

	$body .= "Reference ID:".$id."\r\n"; 

	$body .= "Applicant name:".$fname." ".$mname." ".$lname.",\r\n";

	$body .= "Applicant Address:".$address." ".$street1." ".$street2." ".$state." ".$district." ".$city." ".$pincode.",\r\n";

	$body .= "Mobile:".$Mobile."\r\n\n";

	$body .= "The CoApplicant details are as below:\r\n";

	$body .= "CoApplicant name:".$Co_fname." ".$Co_mname." ".$Co_lname.",\r\n";

	$body .= "CoApplicant Address:".$Co_Address." ".$Co_cstreet1." ".$Co_cstreet2." ".$Co_ccity."  ".$Co_cdistrict." ".$Co_cstate." ".$Co_cpincode.",\r\n";

	$body .= "Mobile:".$Mobile."\r\n\n";



	$body .= "Best Regards,\r\n";

	$body .= "KSF Team.\r\n";

  // echo $body;

  	$to = $AgencyEmail;

  	$VeriStatus="";

  	if (mail($to,$subject,$body,$headers))

	{

           $Msg = 11;

           $VeriStatus="Send";

	}

	else

	{

	   $Msg = 12;

	   $VeriStatus="Send Failed";

	}
	
	header("Location: ./AppStatusDetails.php?Msg=".$Msg);

}


mysql_close($con);
ob_flush();
?>