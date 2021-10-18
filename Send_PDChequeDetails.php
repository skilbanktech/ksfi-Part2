<?php
ob_start();
session_start();
$checkid=$_POST['ID'];
$payType=$_POST['payType'];
$amount =$_POST['amount'];
$checkno = $_POST['checkNo'];

$email = $_POST['email'];
$mobile=$_POST['mobile'];
$applicantType=$_POST['applicantType'];
$frequency = $_POST['frequency'];
$debitType=$_POST['debitType'];

$accountholder=$_POST['accountholder'];
$accountNo=$_POST['accountNo'];
$bankname = $_POST['bankname'];
$branchname=$_POST['branchname'];
$ifscCode = $_POST['ifsccode'];
$branchadd = $_POST['branchadd'];


if($payType=='ECS'||$payType=='ECS and SPDC')
	
{
	$accountholder2=$_POST['accountholder2'];
	$accountno2=$_POST['accountNo2'];
	$bankname2 = $_POST['bankname2'];
	$branchname2=$_POST['branchname2'];
	$ifscCode2 = $_POST['ifsccode2'];
	$branchadd2 = $_POST['branchadd2'];

}
else
{
	$accountholder2="";
	$accountNo2="";
	$bankname2 = "";
	$branchname2="";
	$ifscCode2 = "";
	$branchadd2 ="";
	
}
$UMRN=$_POST['UMRN'];



$numofcheques = $_POST['selectednumofcheques'];

$LoanTenure = $_POST['LoanTenure'];

if($payType=='Cheque')
	
	{
	$numofpayments = $numofcheques;
		
	}
	elseif($payType=='ECS'||$payType=='ECS and SPDC')
	{
		$numofpayments = $LoanTenure;
	}

//echo"cheq:".$numofcheques;

$presenDate = date("Y-m-d",strtotime($_POST['datepicker1']));
$presenstatus = $_POST['PresentationStatus'];
$cashdepositedby=$_POST['CashDepositedBy'];
$bouncedreasons=$_POST['bouncedreasons'];
$depositorname=$_POST['Depositorname'];


 include('./connection.php');

 
//database connection
 if(($_SESSION['usertype'] == 'Employee') || ($_SESSION['usertype'] == 'Partner'))
            {
            $id=$_POST['refid'];

            $email = $_SESSION['internal_email'];
            }
            else 
            {
            $id=$_SESSION['id'];

            $email = $_SESSION['email'];

            }
 
$basefilename = basename( $_FILES['file']['name']);
$fullfilename = $_FILES['file']['name'];
$tmpsourcefilepath = $_FILES['file']['tmp_name'];
//echo($basefilename);
//echo($fullfilename);

//echo($tmpsourcefilepath);


  if($basefilename !="")  
  {
	  
		If(!file_exists($id)){ 

		$createsid = mkdir($id, 0777); 

		}
     
$target_path = "$id/";

$target_path = $target_path.$checkno. $basefilename; 
//echo($target_path);

if (move_uploaded_file($tmpsourcefilepath , $target_path))
{

} else{
	$Msg = 4;
}
$fileatt = $target_path; // Path to the file 
//$fileatt_type = "jpg"; // File Type 

$fileatt_name = $checkno.$fullfilename; // Filename that will be used for the file as the attachment 

//echo ($fileatt_name);
$filehandle = fopen($fileatt,'r'); 

$content = fread($filehandle,filesize($fileatt)); 

fclose($filehandle); 

$content= chunk_split(base64_encode($content));

$uid = md5(uniqid(time())); 

if($basefilename !="")
{
$name =$checkno.$basefilename;
}
else
{
$name="";
}
}
else
{
$name="";
}





	  
	  if($checkid!='')
	  {
		 
		  
		$update_query = "update pdcheck_details set amount='$amount',checkno='$checkno',bankname='$bankname',branchname='$branchname',ifsccode='$ifscCode',branchaddress='$branchadd',presentationdate='$presenDate',presentationstatus='$presenstatus',cashdepositedby='$cashdepositedby',docname='$name',paymentype='$payType',bouncedreasons='$bouncedreasons',depositorname='$depositorname',accountno='$accountNo',email='$email',mobile='$mobile',applicantType='$applicantType',debitType='$debitType',frequency='$frequency',UMRN='$UMRN',
		accountholder='$accountholder'
		where check_id=$checkid and reference_id='$id'";
		
         $add_query=mysql_query($update_query);
		  
		  
		  
	  }
	  
	  else
   {
		  
		 	$i="1";

          if($payType=='Cheque'||$payType=='ECS'||$payType=='ECS and SPDC')
				
			 {
				 for($i=$i;$i<=$numofpayments;$i++)
					{
						
						if($payType=='Cheque')
						{
						
						   $checkno=$_POST['chequelist'.$i];
						}
					  else
					  {
						  $checkno=$i;
					  }
					  
			  if($checkno!='')
			  {
			
				$add_new="insert into pdcheck_details(reference_id,amount,checkno,bankname,branchname,ifsccode,branchaddress,presentationdate,presentationstatus,cashdepositedby,docname,paymentype,bouncedreasons,depositorname,accountno,email,mobile,applicantType,debitType,frequency,UMRN,accountholder,LoanTenure,bankname2,branchname2,ifsccode2,accountholder2,accountno2,branchaddress2,created) 
				values('$id','$amount','$checkno','$bankname','$branchname','$ifscCode','$branchadd','$presenDate','$presenstatus','$cashdepositedby','$name','$payType','$bouncedreasons','$depositorname','$accountNo','$email','$mobile','$applicantType','$debitType','$frequency','$UMRN','$accountholder','$LoanTenure','$bankname2','$branchname2','$ifsccode2','$accountholder2','$accountno2','$branchadd2',Now())";
		  
		  
		  $add_query=mysql_query($add_new);
		   
			  }
			
			
			}//loop ends
			
			$i="1";
			
			if($payType=='ECS and SPDC')
			{
				
			    for($i=$i;$i<=$numofcheques;$i++)
				 {
						
						   $checkno1=$_POST['chequelist'.$i];
						
					  
					  if($checkno1!='')
					  {
					
						$add_new1="insert into pdcheck_details(reference_id,amount,checkno,bankname,branchname,ifsccode,branchaddress,presentationdate,presentationstatus,cashdepositedby,docname,paymentype,bouncedreasons,depositorname,accountno,email,mobile,applicantType,debitType,frequency,UMRN,accountholder,LoanTenure,bankname2,branchname2,ifsccode2,accountholder2,accountno2,branchaddress2,created) 
						values('$id','$amount','$checkno','$bankname','$branchname','$ifscCode','$branchadd','$presenDate','$presenstatus','$cashdepositedby','$name','$payType','$bouncedreasons','$depositorname','$accountNo','$email','$mobile','$applicantType','$debitType','$frequency','$UMRN','$accountholder','$LoanTenure','$bankname2','$branchname2','$ifsccode2','$accountholder2','$accountno2','$branchadd2',Now())";
				  
				  
						 $add_query1=mysql_query($add_new1);
				   
					  }
			
			
			}//loop end	
				
		  }//end if condition
			
		}else
		{
			$add_new="insert into pdcheck_details(reference_id,amount,checkno,bankname,branchname,ifsccode,branchaddress,presentationdate,presentationstatus,cashdepositedby,docname,paymentype,bouncedreasons,depositorname,accountno,email,mobile,applicantType,debitType,frequency,UMRN,accountholder,LoanTenure,bankname2,branchname2,ifsccode2,accountholder2,accountno2,branchaddress2,created) 
			values('$id','$amount','$checkno','$bankname','$branchname','$ifscCode','$branchadd','$presenDate','$presenstatus','$cashdepositedby','$name','$payType','$bouncedreasons','$depositorname','$accountNo','$email','$mobile','$applicantType','$debitType','$frequency','$UMRN','$accountholder','$LoanTenure','$bankname2','$branchname2','$ifsccode2','$accountholder2','$accountno2','$branchadd2',Now())";
		 
		  $add_query=mysql_query($add_new);
		   
			
		}
	
}
	//echo($add_new);

	

		

	if ($add_query)

	{ 	

			$Msg = 7;
          //echo("Payment Detail Save Successfully");

	}

	else

	{

			$Msg = 8;
        // echo("Payment Detail Saving Failed");

	}
         
		header("Location: ./AppStatusDetails.php?Msg=".$Msg);



mysql_close($con);



 ob_flush();

?> 