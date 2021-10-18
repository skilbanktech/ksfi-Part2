
<?php
ob_start();
session_start();

function reArrayFiles($file)
{
    $file_ary = array();
    $file_count = count($file['name']);
    $file_key = array_keys($file);
    
    for($i=0;$i<$file_count;$i++)
    {
        foreach($file_key as $val)
        {
            $file_ary[$i][$val] = $file[$val][$i];
        }
    }
    return $file_ary;
}

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

if(isset($_POST['typeofproof']))
{
$typeofproof = $_POST['typeofproof'];
}
else {
$typeofproof = "";
}
if(isset($_POST['subproof1']))
{
$subdoctype1 = $_POST['subproof1'];
}
else {
$subdoctype1 = "";
}
if(isset($_POST['subproof2']))
{
$subdoctype2 = $_POST['subproof2'];
}
else {
$subdoctype2 = "";
}



If(!file_exists($id))
{ 
    $createsid = mkdir($id, 0777); 
}
$target_path = "$id/";


$file = $_FILES['file'];

if(!empty($file))
{
     
	 $file_desc = reArrayFiles($file);
    //print_r($file_desc);
    
    foreach($file_desc as $val)
    {
		$name=$val['name'];
		
        $target_path = $target_path . basename($name); 


echo $target_path;

//echo basename( $_FILES['file']['name']);
if (move_uploaded_file($val['tmp_name'], $target_path))
{
} 
else{
$Msg = 2;
//$Msg ="Application Status insertion failed.";
header("Location: ./AppStatusDetails.php?Msg=".$Msg);
// echo "There was an error uploading the file, please try again!";
}

$fileatt = $target_path; // Path to the file 

//$fileatt_type = "jpg"; // File Type 

$fileatt_name = $name; // Filename that will be used for the file as the attachment 

$filehandle = fopen($fileatt,'r'); 

$content = fread($filehandle,filesize($fileatt)); 

fclose($filehandle); 

$content= chunk_split(base64_encode($content));

$uid = md5(uniqid(time())); 

$name = basename( $val['name']);

$cc=$email;

$headers = "From: loan@ksfi.co.in <loan@ksfi.co.in>\r\n"."CC: ".$cc." <".$cc.">\r\n"; 

$headers .= "Reply-To: ".$email."\n";

$headers .= "MIME-Version: 1.0\r\n";  

$headers .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";  $headers .= "This is a multi-part message in MIME format.\r\n";  


$body = "--".$uid."\r\n";  

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
        
if($id!="")
{
    
if($name!='')
{
           
        //$add_new="Insert into document_details(reference_id,usertype,doc_type,doc_date) values ('$id','$usertype','$doc_type',sysdate())";
        $add_new="Insert into document_details(reference_id,usertype,doc_type,doc_date,doc_name,email,app_step,typeofproof,subdoctype1,subdoctype2) 
        values('$id','$usertype','$doc_type',sysdate(),'$name','$email','$app_step','$typeofproof','$subdoctype1','$subdoctype2')";

          //  echo($add_new);

            $add_query=mysql_query($add_new);
		
            if ($add_query)
            { 
                    if (mail($to,$subject,$body,$headers)) // to uncomment
                    {
                        $Msg = 2;//Documents sent successfully
                    }
                    else
                    {
                        $Msg = 3;
                    }
            
            }
			
	 
     }
           
}
else
{
  // echo "You can not upload Documents without reference Id";
  
    $Msg = 20;
  

}

}//close for loop
}//close if condition checking file is not empty

 header("Location: ./loan_application.php");
mysql_close($con);


 ob_flush();



?> 