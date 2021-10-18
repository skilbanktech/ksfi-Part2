<?php

session_start();

include('./connection.php');


 if($_SESSION['usertype'] == 'Employee') 
 {
		
		$_SESSION['loginid']='1';
		$_SESSION['usertype'] = 'admin';
	 
	 
	 
 }
 else 
 {
	 
	 

		$id= $_SESSION['id'];


		$sql = "SELECT id,usertype FROM student_examtaken_dtl where student_id='$id'";
				
		$result = mysql_query($sql);



		$count= mysql_num_rows($result);

		if($count==0) {
				
			$fetch = mysql_fetch_array($sql);
			
			$student_id = $fetch['id'];
					 
					 
			$_SESSION['id']=$id;
			$_SESSION['loginid']=$student_id;
			$_SESSION['usertype'] = 'Student';

		}
    
 }
				 header("Location:/index.php");
				exit();

?>