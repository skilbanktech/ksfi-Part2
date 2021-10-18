<?php

ob_start();



$fname =$_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone=stripslashes(trim($_POST['phone']));
$state = $_POST['country'];
$city = $_POST['city'];
$amount = stripslashes(trim($_POST['amount']));
$addInfo = $_POST['addInfo'];

$iam=$_POST['iama'];
$other=$_POST['txtiama'];
$purposeofcontact=$_POST['purposeofcontact'];
$course=$_POST['course'];

if($amount == '')
$amount = 0;

if($state=='AP')
$state='Andhra Pradesh';
else if($state=='AS')
$state='Assam';
else if($state=='AR')
$state='Arunachal Pradesh';
else if($state=='GU')
$state='Gujrat';
else if($state=='BH')
$state='Bihar';
else if($state=='HR')
$state='Haryana';
else if($state=='HP')
$state='Himachal Pradesh';
else if($state=='JK')
$state='Jammu & Kashmir';
else if($state=='KR')
$state='Karnataka';
else if($state=='KE')
$state='Kerala';
else if($state=='MP')
$state='Madhya Pradesh';
else if($state=='MH')
$state='Maharashtra';
else if($state=='MN')
$state='Manipur';
else if($state=='ME')
$state='Meghalaya';
else if($state=='MI')
$state='Mizoram';
else if($state=='NG')
$state='Nagaland';
else if($state=='OR')
$state='Orissa';
else if($state=='PU')
$state='Punjab';
else if($state=='RA')
$state='Rajasthan';
else if($state=='SI')
$state='Sikkim';
else if($state=='TN')
$state='Tamil Nadu';
else if($state=='TR')
$state='Tripura';
else if($state=='UP')
$state='Uttar Pradesh';
else if($state=='WB')
$state='West Bengal';
else if($state=='DL')
$state='Delhi';
else if($state=='GA')
$state='Goa';
else if($state=='PO')
$state='Pondichery';
else if($state=='LA')
$state='Lakshdweep';
else if($state=='DD')
$state='Daman & Diu';
else if($state=='DN')
$state='Dadra & Nagar';
else if($state=='CH')
$state='Chandigarh';
else if($state=='AN')
$state='Andaman & Nicobar';
else if($state=='UT')
$state='Uttaranchal';
else if($state=='JH')
$state='Jharkhand';
else //if($state=='CT')
$state='Chattisgarh';



$headers = "Reply-To: ".$email."\n";

// Contact subject
$subject ="mail from $fname"; 

// Mail of sender
$mail_from="$email"; 

// Details
$body="\n from: $fname <$mail_from> \n  State: $state \n City: $city \n Contact No.: $phone \n Loan Amount: $amount \n Additional Information: $addInfo."; 

// Enter your email address

$to ="loan@ksfi.co.in";

 if (mail($to,$subject,$body,$headers)) {

    //header("Location: http://www.skilbank.com/thanks.html");

	//exit();

  }  else {

  

   		$Msg = 4;

		//$Msg ="email sending failed.";

		header("Location: ./AppStatusDetails.php?Msg=".$Msg);



  }

//database connection

include('./connection.php');

	

if(!$con)

{

	die("Cannot create database".mysql_error());

}

$squery =  "SELECT refid,contactid FROM params";

$sresult =  mysql_query($squery);



$row= mysql_fetch_row($sresult);

if	($row)

{

	$col = array('refid','contactid');

	$comb = array_combine($col,$row);

	$id = $comb['contactid'];

	$id++;

	$update_query = "Update params set contactid =$id";  

	 mysql_query($update_query);

	$contact_id = "C".date('Y').date('m').str_pad($id,"05","0",STR_PAD_LEFT);

}


//to send the information into the database
//$name=stripslashes(trim($_POST['name']));
$select_record="Select * from contact_details where fname='".$fname."' and information='".$addInfo."' and email='".$email."'";
$select_query=mysql_query($select_record) or die(mysql_error());


if((mysql_num_rows($select_query)==0))
{
	
	$add_new="Insert into contact_details(id,fname,lname,email,phone,state,city,amount,information,date,iam,other,purposeofcontact,course,location,partnername) 
        values ('$contact_id','$fname','$lname','$email',$phone,'$state','$city',$amount,'$addInfo',sysdate(),'$iam','$other','$purposeofcontact','$course',null,null)";
	//echo($add_new);
	$add_query=mysql_query($add_new);
	//echo("add query return value:");
	if ($add_query)
	{
		//echo "New Record Added.";
		header("Location: askforApply.php");
	}
	else 
	{
		$Msg = 4;
		//$Msg ="New Record failed.";
header("Location: ./AppStatusDetails.php?Msg=".$Msg);


	}
	
}
else
//echo "Duplicate Record Not Allowed";
header("Location: askforApply.php");

ob_flush();



mysql_close($con);



 

?>



