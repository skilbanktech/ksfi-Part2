<?php



ob_start();


session_start();

 $id=$_SESSION['id'];
 

   //    echo $id;




include('common/class_Common.php');



$objCommon=new Common();


$fullname = $_POST['fullname'];


$email = $_POST['email'];

$dob = date("Y-m-d",strtotime($_POST['datepicker']));


$coborrowerdetails = $_POST['coborrowerdetails'];



//start Applicant Address:

$address = $_POST['address'];

$street1 = $_POST['street1'];

$street2 = $_POST['street2'];


if((isset($_POST['country']))||(isset($_POST['country1'])))
{
if(isset($_POST['country']))
{
	if($_POST['country']!='')
	{
	$state = $_POST['country'];
	}
}
else
{
$state = $_POST['country1'];
}
}


if((isset($_POST['state']))||(isset($_POST['state1'])))
{
if(isset($_POST['state']))
{
	if($_POST['state']!='')
	{
	$district = $_POST['state'];
	}
}
else
{
$district = $_POST['state1'];
}
}


if((isset($_POST['city']))||(isset($_POST['city1'])))
{
if(isset($_POST['city']))
{
	if($_POST['city']!='')
	{
	$city = $_POST['city'];
	}
}
else
{
$city = $_POST['city1'];
}
}






$stdcode=stripslashes(trim($_POST['stdcode']));

$phone=stripslashes(trim($_POST['phone']));

$mobile=stripslashes(trim($_POST['mobile']));


//coapplicant details

$cfullname=$_POST['cfullname'];





$cdob = date("Y-m-d",strtotime($_POST['datepicker1']));


$cemail =$_POST['cemail'];

$caddress =$_POST['caddress'];

$cstreet1 =$_POST['cstreet1'];

$cstreet2 =$_POST['cstreet2'];


$firstname=$_POST['firstname'];

$middlename = $_POST['middlename'];

$lastname = $_POST['lastname'];



$cfirstname=$_POST['cfirstname'];

$cmiddlename = $_POST['cmiddlename'];

$clastname = $_POST['clastname'];



if(isset($_POST['same']))

{

    $csame=$_POST['same'];

}

else

{

    $csame=$_POST['same'];

}

$cstate=$_POST['ccountry'];

if($cstate=='')

    $cstate =$_POST['ccountry1'];



$cdistrict =$_POST['cstate'];

if($cdistrict=='')

    $cdistrict =$_POST['cstate1'];



$ccity =$_POST['ccity'];

if($ccity =='')

    $ccity =$_POST['ccity1'];
	

$cstdcode=stripslashes(trim($_POST['cstdcode']));

$cphone=stripslashes(trim($_POST['cphone']));

$cmobile=stripslashes(trim($_POST['cmobile']));






 $state= $objCommon->GetStateName($state);
 
 $cstate= $objCommon->GetStateName($cstate);

 
 
 
$usertype='Applicant';

$doc_type="Self Declaration";


$app_step='Application Docs';

//database connection

include('./connection.php');


      
	



   //   update student details  

    $add_new = "update student_details set firstname='$firstname',middlename='$middlename',lastname='$lastname', dob='$dob',email='$email',address='$address',street1='$street1',street2='$street2',state='$state',district='$district',city='$city',stdcode='$stdcode',

    phone='$phone',mobile='$mobile' where reference_id ='$id'"; 
	

  //echo($add_new);

	$add_query=mysql_query($add_new);
	
	 $add_new2="UPDATE coapplicant_details SET cfirstname='$cfirstname',cmiddlename='$cmiddlename',clastname='$clastname', cdob='$cdob',cemail='$cemail',caddress='$caddress',cstreet1='$cstreet1',cstreet2='$cstreet2',

                cstate='$cstate',cdistrict='$cdistrict',ccity='$ccity',cstdcode='$cstdcode',cphone='$cphone',cmobile='$cmobile',samestudadd='$csame'

                where reference_id='$id' and coborrowerid=1";

       

//    echo($add_new2);

//    echo "\n";

                $add_query2=mysql_query($add_new2);

	
	$name='SelfDeclaration.pdf';


if($id!="")

{

    $loginquery = "select * from document_details WHERE reference_id='$id' and  doc_name='$name'"; 

    $select_loginrecord1=mysql_query($loginquery);	
	
	$countrows=mysql_num_rows($select_loginrecord1);
	
	
	if($countrows==0)
	{
	
	$autogenerated='1';
	//insert selfdeclaration details in table
	// $objCommon->insertdocInfoindb($id,$usertype,$doc_type,$name,$email,$app_step,$autogenerated);
	  $add_new="Insert into document_details(reference_id,usertype,doc_type,doc_date,doc_name,email,app_step,autogenerated) 

        values('$id','$usertype','$doc_type',sysdate(),'$name','$email','$app_step','$autogenerated')";



            //echo($add_new);



            $add_query=mysql_query($add_new);
	}
	
	
	}
		  
		
	
	
require('WriteHTML.php');

$pdf=new PDF_HTML();

$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15);

$pdf->AddPage();
$pdf->Image('images/img2.gif');
$pdf->SetFont('Arial','',10);
if($coborrowerdetails=='Yes'){
$pdf->WriteHTML('<br>Dear '.$fullname.' and '. $cfullname.',<br>Thank you for applying for education loan from KSFi. Your details as confirmed by you is below.<br><br>');
}
else { 
$pdf->WriteHTML('<br>Dear '.$fullname.',<br>Thank you for applying for education loan from KSFi. Your details as confirmed by you is below.<br><br>'); 
}
$pdf->SetFont('Arial','',10); 

$pdf->SetFont('Arial','',10); 
$pdf->WriteHTML('Name: '.$fullname.'<br>Date of Birth: '.$dob.'			          Email: '.$email.'<br>Address: '.$address.','.$street1.','.$street2.'<br>State: '.$state.'		                 	   District: '.$district.'			                     City: '.$city.'<br>Phone: '.$stdcode.'-'.$phone.'			             Mobile: '.$mobile.'<br><br>');
$pdf->SetFont('Arial','',10); 

$pdf->SetFont('Arial','',10); 
if($coborrowerdetails=='Yes'){
$pdf->WriteHTML('Name: '.$cfullname.'<br> Date of Birth: '.$cdob.'			          Email: '.$cemail.'<br>Address: '.$caddress.','.$cstreet1.','.$cstreet2.'<br>State: '.$cstate.'		                 	   District: '.$cdistrict.'			                     City: '.$ccity.'<br>Phone: '.$cstdcode.'-'.$cphone.'			             Mobile: '.$cmobile.'<br><br>');

}

$pdf->SetFont('Arial','B',10);
$pdf->WriteHTML('<u>Self Declaration by applicant and co-applicants</u><br><br>');
$pdf->SetFont('Arial','',10);
$pdf->WriteHTML('1.I/We agree that all information provided in this student loan application form is true and correct.<br>2.I/We authorize Kashmir Finance Pvt. Ltd. and its partner companies/agents to verify the information provided by me/us in this application which includes residence verification, employmentverification, and telephone verification.<br>3.I/We understand and acknowledge that Kashmir Finance Pvt. Ltd. Shall have the absolute discretion, without assigning any reason (unless required by applicable law), to reject our application and that Kashmir Finance Pvt. Ltd.  shall not be responsible/liable in any manner whatsoever to me/us for such rejection, or any delay in notifying me/us of such rejection and any costs, losses, damage or expenses or other consequences, caused by such rejection, or any delay in notifying me/us of such rejection, of my/our application.<br>4.I/We have being explained and I/We have understand, acknowledge and agree that the rate of interest on the loan applied, would be dependent on variable risk related parameters,    with respect to our credit history as well as other information provided by us, at time and during of the processing of loan, and other factors like cost of funds and operational costs of Kashmir Finance Pvt Ltd.<br>5.I/We Declare that I have not availed any educational loan from any other bank/financial Institution.<br>6.I/We Confirm that I have not defaulted on any other loan or have no insolvency proceedings against me nor I have been adjudicated as insolvent.<br>7.I/We understand that this online application form in itself is not a complete set of information for loan application requirement. This has to be supported with hard copy of Kashmir Finance Pvt Ltd Loan application form on paper, along with supporting documents duly filled as well as signed by myself, should be submitted at the nearest Kashmir Finance Pvt Ltd office or customer service office.<br><br>I/We unconditionally  agree to the above terms and conditions.<br><br>');

$pdf->SetFont('Arial','I',10);

$pdf->WriteHTML('This is an auto-generated agreement and does not require a signature<br>');
If(!file_exists($id))

{ 

    $createsid = mkdir($id, 0777); 

}

$target_path = "$id/";
$pdf->Output($id.'/SelfDeclaration.pdf','F'); 





//$pdf->Output(); 
//header("Content-disposition: attachment; filename=SelfDeclaration.pdf");
//header("Content-type: application/pdf");
//readfile($pdf->Output());



//mail format



$target_path = $target_path . basename( 'SelfDeclaration.pdf'); 

$fileatt = $target_path; // Path to the file 



//$fileatt_type = "jpg"; // File Type 



$fileatt_name = 'SelfDeclaration.pdf'; // Filename that will be used for the file as the attachment 



$filehandle = fopen($fileatt,'r'); 



$content = fread($filehandle,filesize($fileatt)); 



fclose($filehandle); 



$content= chunk_split(base64_encode($content));



$uid = md5(uniqid(time())); 



$name = basename( $_FILES['file']['name']);



$cc=$email;



$headers = "From: loan@ksfi.co.in <loan@ksfi.co.in>\r\n"."CC: ".$cc." <".$cc.">\r\n"; 



$headers .= "Reply-To: ".$email."\n";



$headers .= "MIME-Version: 1.0\r\n";  



$headers .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";  $headers .= "This is a multi-part message in MIME format.\r\n";  



$body .= "--".$uid."\r\n";  



$body .= "Content-type:text/plain; charset=iso-8859-1\r\n";  $body.= "Content-Transfer-Encoding: 7bit\r\n\r\n";  



$body .= "Dear Sir/Madam,\r\n";



$body .= "Please find below attached document file.\r\n\n\n";


$body .='<html><body><table><tr><td>';
			
			$body .='<br><table width="500px">';
			
			$body .='<tr><td>';
			
			$body .='<img  border=0 src="http://www.ksfi.co.in/images/img2.gif" alt="KSFI" /><br>';
			
			$body .='<br></td></tr>';
			
			$body .='<tr><td><h4>Dear '.$fullname.' and '. $cfullname.',</h4><br></td></tr>';
		
		    $body .= "<tr><td>Thank you for applying for education loan from KSFi. Your details as confirmed by you is below.<br></td></tr>";
			
			
			 
			 
		    $body .= "<tr><td>Reference_id:".$id."</td>";
			
           $body .= "<tr><td>Name:".$fullname."</td>";
		   
		   if($coborrowerdetails=='Yes'){
		   
			$body .= "<td>Name:".$cfullname."</td></tr>";
			
		   }
			$body .= "<tr><td>Date of Birth:".$dob."</td>";
			$body .= "<td>Date of Birth:".$cdob."</td></tr>";
			$body .= "<tr><td>Email:".$email."</td>";
			$body .= "<td>Email:".$cemail."</td></tr>";
			$body .= "<tr><td>Address:".$address.','.$street1.','.$street2."</td>";
		   
			$body .= "<td>Address:".$caddress.','.$cstreet1.','.$cstreet2."<br></td></tr>";
			
			
			$body .= "<tr><td>State:".$state."</td>";
			$body .= "<td>State:".$cstate."</td></tr>";
			$body .= "<tr><td>District:".$district."</td>";
			$body .= "<td>District:".$cdistrict."</td></tr>";
			
			$body .= "<tr><td>city:".$city."</td>";
			$body .= "<td>city:".$ccity."</td></tr>";
			
			$body .= "<TD>Phone:".$stdcode."-".$phone."</TD>";
			$body .= "<TD>Phone:".$cstdcode."-".$cphone."</TD></tr>";
			$body .= "<td>Mobile:".$mobile."</td></tr>";
			$body .= "<TD>Mobile:".$cmobile."</TD></tr></table></td><tr>";
			

            $body .= "<tr><td><u>Self Declaration by applicant and co-applicants</u></td><tr>";

			$body .= "<tr><td>1.1.I/We agree that all information provided in this student loan application form is true and correct.<br>2.I/We authorize Kashmir Finance Pvt. Ltd. and its partner companies/agents to verify the information provided by me/us in this application which includes residence verification, employmentverification, and telephone verification.<br>3.I/We understand and acknowledge that Kashmir Finance Pvt. Ltd. Shall have the absolute discretion, without assigning any reason (unless required by applicable law), to reject our application and that Kashmir Finance Pvt. Ltd.  shall not be responsible/liable in any manner whatsoever to me/us for such rejection, or any delay in notifying me/us of such rejection and any costs, losses, damage or expenses or other consequences, caused by such rejection, or any delay in notifying me/us of such rejection, of my/our application.<br>4.I/We have being explained and I/We have understand, acknowledge and agree that the rate of interest on the loan applied, would be dependent on variable risk related parameters,with respect to our credit history as well as other information provided by us, at time and during of the processing of loan, and other factors like cost of funds and operational costs of Kashmir Finance Pvt Ltd.<br>5.I/We Declare that I have not availed any educational loan from any other bank/financial Institution.<br>6.I/We Confirm that I have not defaulted on any other loan or have no insolvency proceedings against me nor I have been adjudicated as insolvent.<br>7.I/We understand that this online application form in itself is not a complete set of information for loan application requirement. This has to be supported with hard copy of Kashmir Finance Pvt Ltd Loan application form on paper, along with supporting documents duly filled as well as signed by myself, should be submitted at the nearest Kashmir Finance Pvt Ltd office or customer service office.<br><br>I/We unconditionally  agree to the above terms and conditions.<br></td></tr></table></body></html>";
			
   


$body .= "--".$uid."\r\n";  







$body .= "Content-Type: application/octet-stream;name=\"".$fileatt_name."\"\r\n"; 







$body .= "Content-Transfer-Encoding: base64\r\n";  







$body .= "Content-Disposition: attachment;filename=\"".$fileatt_name."\"\r\n\r\n";  







$body .= $content."\r\n\r\n";  







$body .= "--".$uid."--"; 







// Contact subject







//$subject = $id." has uploaded:".$fileatt_name; 



$subject = $id." has uploaded ".$doc_type." of ".$usertype." :".$fileatt_name; 







// Mail of sender







$mail_from= $email; 







// Enter your email address







$to = "loan@ksfi.co.in"; 



if (mail($to,$subject,$body,$headers)) // to uncomment

                    {

                       $mailstatus="success";
					   
                    }
					
					
					
					$reference_id_encoded = rtrim(strtr(base64_encode($id), '+*', '-_'), '=');
					
					 header('location:./ssl/capturephoto.php?refid='.$reference_id_encoded);
	
mysql_close($con);

ob_flush();

?>