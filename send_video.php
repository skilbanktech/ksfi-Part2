<?php

session_start();

include('./connection.php');

$borrower_type=$_POST['borrw_type'];

$verif_type=$_POST['verif_type'];

$name=$_POST['fileName'];


//echo $verif_type;

$id= $_POST['refid'];
    
if(isset($_POST['borrw_type']))
{
$usertype = 'Applicant';
$app_step= 'Approval Docs';
$doc_type = 'Verification Docs';

}
else
{
$usertype = 'Applicant';
$app_step= 'Application Docs';
$doc_type = 'Photo ID';
	
}




$docpath = './'.$id;
 


$name=$_POST['fileName'];


rename('./uploads/'.$name,'./'.$id.'/'.$name);



$add_new="Insert into document_details(reference_id,usertype,doc_type,doc_date,doc_name,email,app_step,borrower_type,verif_type) 
values('$id','$usertype','$doc_type',sysdate(),'$name','$email','$app_step','$borrower_type','$verif_type')"; 

mysql_query($add_new) ; 


//echo $add_new;
// success report
$Msg = 0;

//echo "success";
if(isset($_SESSION['id']))
{
	header("Location:./fullApplication.php");
}
else
{
	header("Location: ./uploadedmsg.php?Msg=".$Msg);

}

?>
