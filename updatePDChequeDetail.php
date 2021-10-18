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
            //$id=$_SESSION['id'];

            $email = $_SESSION['email'];

            }

$paymentype=$_POST['payType'];
$amount =$_POST['amount'];
$checkno = $_POST['checkNo'];
$bankname = $_POST['bankname'];
$branchname=$_POST['branchname'];
$ifscCode = $_POST['ifsccode'];
$branchadd = $_POST['branchadd'];
$presenDate = date("Y-m-d",strtotime($_POST['datepicker1']));
$presenstatus = $_POST['PresentationStatus'];
$cashdepositedby=$_POST['CashDepositedBy'];
$bouncedreasons=$_POST['bouncedreasons'];
$depositorname=$_POST['Depositorname'];
$accountNo=$_POST['accountNo'];


$id=$_POST['no'];
$referenceID=$_POST['refid'];
//database connection
If(!file_exists($referenceID)){ 
$createsid = mkdir($referenceID, 0777); 
}          
 
$target_path = "$referenceID/";

$target_path = $target_path.$checkno. basename( $_FILES['file']['name']); 
//echo($target_path);

if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path))

{
} else{
	$Msg = 4;
}
$fileatt = $target_path; // Path to the file 
//$fileatt_type = "jpg"; // File Type 

$fileatt_name = $checkno.$_FILES['file']['name']; // Filename that will be used for the file as the attachment 

//echo ($fileatt_name);
$filehandle = fopen($fileatt,'r'); 

$content = fread($filehandle,filesize($fileatt)); 

fclose($filehandle); 

$content= chunk_split(base64_encode($content));

$uid = md5(uniqid(time())); 

if(basename( $_FILES['file']['name']) !="")
{
$name = $checkno.basename( $_FILES['file']['name']);
}
else
{
$name="";
}

//database connection

include('./connection.php');

if(!$con)

{
	die("Cannot create database".mysql_error());
}

	//$add_new="Insert into document_details(reference_id,usertype,doc_type,doc_date) values ('$id','$usertype','$doc_type',sysdate())";

    $add_new="update pdcheck_details set amount='$amount',checkno='$checkno',bankname='$bankname',branchname='$branchname',ifsccode='$ifscCode',branchaddress='$branchadd',
	presentationdate='$presenDate',presentationstatus='$presenstatus',cashdepositedby='$cashdepositedby',docname='$name',paymentype='$paymentype',bouncedreasons='$bouncedreasons',
	depositorname='$depositorname',accountno='$accountNo'
	where check_id='$id'";


	//echo($add_new);

	$add_query=mysql_query($add_new);
	if ($add_query)
	{ 	

			$Msg = 9;
	}
	else
	{
			$Msg = 10;
	}		
       header("Location: ./AppStatusDetails.php?Msg=".$Msg);		
if($presenstatus=="Bounced")
{
$cc=$email;
$headers = "From: loan@ksfi.co.in <loan@ksfi.co.in>\r\n"."CC: ".$cc." <".$cc.">\r\n"; 
$headers .= "Reply-To: ".$email."\n";
$headers .= "MIME-Version: 1.0\r\n";  
$headers .= "Content-Type: multipart/mixed; boundary=\"".$referenceID."\"\r\n\r\n";  $headers .= "This is a multi-part message in MIME format.\r\n";  
$body .= "--".$uid."\r\n";  
$body .= "Content-type:text/plain; charset=iso-8859-1\r\n";  $body.= "Content-Transfer-Encoding: 7bit\r\n\r\n";  
$body .= "Dear Sir/Madam,\r\n";
$body .= "Cheque Bounced.\r\n\n\n";
$body .= "--".$referenceID."\r\n";  
$body .= $content."\r\n\r\n";  
// Contact subject
//$subject = $id." has uploaded:".$fileatt_name; 
$subject = $referenceID." has Bounced Cheque"; 
// Mail of sender
$mail_from= $email; 
// Enter your email address
$to = "loan@ksfi.co.in"; 

if (mail($to,$subject,$body,$headers)) // to uncomment
{

}
else  // to uncomment
{	
		$Msg = 10;
		//header("Location: ./AppStatusDetails.php?Msg=".$Msg);
}
}
mysql_close($con);
ob_flush();

?> 