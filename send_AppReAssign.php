<?php

//database connection
include('./connection.php');


$id=$_POST['myradio'];
$partnercontrolname=$id."Name";

//fetch studentDetail
$select_record="update student_details set partnername=null where reference_id='".$id."'";
$select_query=mysql_query($select_record) or die(mysql_error());

//fetch partener detail
//header("Location: ./DisplaySearchResult.php");
$Msg = 6;

header("Location: ./AppStatusDetails.php?Msg=".$Msg);
mysql_close($con)
?>
