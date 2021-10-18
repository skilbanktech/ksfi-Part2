<?php

ob_start();

include('./connection.php');


  $id=$_POST['myradio'];



    $select_query = "Select current_email,newemail from request_useremailchange where id = '$id'";

    $select_record=mysql_query($select_query); 

	//or die(mysql_error());

	

	$row= mysql_fetch_row($select_record);

        

	if($row){   

	$col = array('current_email','newemail');

	$fetch = array_combine($col,$row); 

	}


    $current_email=$fetch['current_email'];//current mailid
		   
    $newemail=$fetch['newemail'];//requested mailid
	
	//update requested email id  in login details
	$update="update login_details set username='$newemail'  where username='$current_email'";
	
	
	$result=mysql_query($update);
	
	//delete record from request_useremailchange table 
	$delete="delete  from request_useremailchange where id='$id'";
	
	mysql_query($delete);

	 $Msg = 15;
     
	 header("Location: ./AppStatusDetails.php?Msg=".$Msg);
	 
	 
ob_flush();
mysql_close($con);
	

?>
