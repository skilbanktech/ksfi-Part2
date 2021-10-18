<?php

//database connection
include('./connection.php');

    $id=$_POST['myradio'];
    //echo $id;
//$locationid=$id."country";

//$partnernameexact = $_POST['C20120600008Name'];
//$partnername = $_POST[$locationid];

//$location=$_POST[$locationid];

//echo $partnernameexact;
//echo $partnername;
//$location=$_POST['country'];
//echo $location;
$partnercontrolname=$id."cmbName";
$partnername = $_POST[$partnercontrolname];

$select_record="Select * from contact_details where id='".$id."' ";
$select_query=mysql_query($select_record) or die(mysql_error());
$row= mysql_fetch_row($select_query);
        
        

	if($row){
     
     

	$col = array('id','fname','lname','email','phone','state','city','amount','information','date','iam','other','purposeofcontact','course','location','partnername');
	$fetch = array_combine($col,$row); 
		
		

	$fname=$fetch['fname'];
	$lname=$fetch['lname'];
	$email=$fetch['email'];	
	$Mobile=$fetch['phone'];
	}
	
	

	//fetch partener detail
$partner_record="select * from login_details where username='".$partnername."'";
$partner_queary=mysql_query($partner_record);
$partner_row= mysql_fetch_row($partner_queary);

if($partner_row)
{
$partner_col = array('user_id','firstname','lastname','username','usertype','password','location','role','mobile');
$partner_fetch = array_combine($partner_col,$partner_row); 
	
	$p_fname=$partner_fetch['firstname'];
	
}


//echo $select_record;
if((mysql_num_rows($select_query) !=0))
{

	$add_new="UPDATE  contact_details SET partnername='$partnername' where id='$id'";
 
	//echo($add_new);
        //echo "\n";

	$add_query=mysql_query($add_new);
        
        $Msg = 6;
        
        // Mail of sender
		$mail_from= "loan@ksfi.co.in";
		 // $cc="";
        $headers = "From: ".$mail_from." <".$mail_from.">\r\n"; 

	// Contact subject
		$subject ="New lead assign";
		// Details

		$body = "";
		$body .= "Dear ".$p_fname.",\r\n";



		$body .= "This following lead is assign to you.\r\n";



		$body .= "the details are.\r\n\n\n";

		$body .= "Reference ID is ".$id."\r\n\n\n"; 

		$body .= "Applicant name is:".$fname."\r\n"; 

		$body .= "Email/Username:".$email."\r\n";

		$body .= "Phone:".$Mobile."\r\n\n\n";
		$body .= "Best Regards,\r\n";

		$body .= "KSF Team.\r\n";

 	 	$to = "$partnername";
 	 	//echo $subject;
 	 	//echo $to;
 	 	//echo $body ;
 	 	//echo $headers;
 	 	
 	 	if (mail($to,$subject,$body,$headers))
		{


		}

		//$Msg ="New Record failed.";
		header("Location: ./AppStatusDetails.php?Msg=".$Msg);

}
mysql_close($con)
?>
