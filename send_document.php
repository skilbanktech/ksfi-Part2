<?php
ob_start();
session_start();

if(($_SESSION['usertype'] == 'Employee') || ($_SESSION['usertype'] == 'Partner') || ($_SESSION['usertype'] == 'Institute' )
   || ($_SESSION['usertype'] == 'Agency') )
{
    $id=$_POST['no'];
    $email = $_SESSION['internal_email'];
}
else 
{
    $id=$_SESSION['id'];
    $email = $_SESSION['email'];
}
//echo "id";
//echo $id;

$usertype = $_POST['AppType'];
$app_step= $_POST['AppStep'];
$doc_type = $_POST['DocType1'];

If(!file_exists($id))
{ 
    $createsid = mkdir($id, 0777); 
}
$target_path = "$id/";
$target_path = $target_path . basename( $_FILES['file']['name']); 
echo basename( $_FILES['file']['name']);
if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path))
{
} 
else{
$Msg = 3;
//$Msg ="Application Status insertion failed.";
header("Location: ./AppStatusDetails.php?Msg=".$Msg);
// echo "There was an error uploading the file, please try again!";
}

$fileatt = $target_path; // Path to the file 

//$fileatt_type = "jpg"; // File Type 

$fileatt_name = $_FILES['file']['name']; // Filename that will be used for the file as the attachment 

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


//database connection

include('./connection.php');
        
if($id!=""&&(file_exists($target_path)))
{
    $loginquery = "select doc_name from document_details WHERE reference_id='$id'"; 
    $select_loginrecord1=mysql_query($loginquery);
    $login_row= mysql_fetch_row($select_loginrecord1); 
        if($login_row)
            {     
            $login_col = array('doc_name');
            $agency_fetch = array_combine($login_col,$login_row);
            }
            if($agency_fetch['doc_name']== basename( $_FILES['file']['name']))
            {
                $Msg = 19;
                header("Location: ./AppStatusDetails.php?Msg=".$Msg);
            }

            else
            {	
        //$add_new="Insert into document_details(reference_id,usertype,doc_type,doc_date) values ('$id','$usertype','$doc_type',sysdate())";
        $add_new="Insert into document_details(reference_id,usertype,doc_type,doc_date,doc_name,email,app_step) 
        values('$id','$usertype','$doc_type',sysdate(),'$name','$email','$app_step')";

            //echo($add_new);

            $add_query=mysql_query($add_new);

            if ($add_query)
            { 
                    if (mail($to,$subject,$body,$headers)) // to uncomment
                    {
                        $Msg = 2;
                    }
                    else
                    {
                        $Msg = 3;
                    }
            $Msg= 2;
            }
            else
            {
            $Msg = 3;
            }

            header("Location: ./AppStatusDetails.php?Msg=".$Msg);
        }
}
else
{
     $Msg = 20;
    header("Location: ./AppStatusDetails.php?Msg=".$Msg);
}
mysql_close($con);


 ob_flush();



?> 