<?php
ob_start();

//database connection
include('./connection.php');

   $id=$_POST['myradio'];

$Accpartnercontrolname=$id."cmbAccMgr";
$Accpartnername = $_POST[$Accpartnercontrolname];


 $serviceRepcontrolname=$id."cmbName";
 $serviceRep = $_POST[$serviceRepcontrolname];
 
  $partnercontrolname=$id."cmbPTName";
 $partnername = $_POST[$partnercontrolname];
 
 

//fetch studentDetail
$select_record11="select reference_id, AccManager from registration_details where mobile='".$id."'";
$select_query11=mysql_query($select_record11) or die(mysql_error());


if((mysql_num_rows($select_query11) !=0))
{
    $add_new11="update registration_details set AccManager='$Accpartnername' where mobile='$id'";
    $add_query11=mysql_query($add_new11);
    if ($add_query11)
    {
        $Msg = 16;
    }
    else
    {
        $Msg = 17;
    }
}
else
{   $Msg = 17;
}

if($partnername!='')
{


  //-----------------------------------------------  student_details  -------------------------------------------------------------------



         $select_record="select * from registration_details where mobile='".$id."'";

         $select_query=mysql_query($select_record) or die(mysql_error());

	

if((mysql_num_rows($select_query) !=0))

{

$add_new="update registration_details set partnername='$partnername' where mobile='$id'";



	$add_query=mysql_query($add_new);

	$Msg = 16;

}

}
if($serviceRep!='')
{


  //-----------------------------------------------  student_details  -------------------------------------------------------------------



         $select_record="select * from registration_details where mobile='".$id."'";

         $select_query=mysql_query($select_record) or die(mysql_error());

	

if((mysql_num_rows($select_query) !=0))

{

$add_new="update registration_details set serviceRep='$serviceRep' where mobile='$id'";



	$add_query=mysql_query($add_new);

	$Msg = 16;

}

}

header("Location: ./AppStatusDetails.php?Msg=".$Msg);


ob_flush();
mysql_close($con);
?>