<?php
ob_start();
    if(!isset($_SESSION['username']))
    {
        session_start();
    }
	if(isset($_GET['email']))
	{
	$email=$_GET['email'];
	$mail=explode("@",$email);

	$password = $mail[0];
		
		
	}
	else{
    $email =$_POST['email'];
    $password = $_POST['password'];
	
	}
    $UserType = $_POST['UserRole'];
 //   $UserRole = $_POST['PartnerUser'];
    $UserType = trim($UserType);

    //database connection
    include('./connection.php');
//$mysqli = new mysqli("localhost","root","","ksf");

    //to send the information into the database
    $select_query="Select user_id,firstname,lastname,username,usertype,password,location,role,mobile from login_details where username='".$email."' and password='".$password."'"; //."' and usertype='".$UserRole."'";
    $select_record=mysql_query($select_query);
    //echo $select_query;
    $inforow= mysql_fetch_row($select_record);

    if($inforow)
    {   
        $infocol = array('user_id','firstname','lastname','username','usertype','password','location','role','mobile');
        $loggedinfo = array_combine($infocol,$inforow); 
        }

    if((mysql_num_rows($select_record)!=0))
    {	
        // put in session 
		$_SESSION['user_id']=$loggedinfo['user_id'];
		
        $_SESSION['firstname'] = $loggedinfo['firstname'];
        $_SESSION['usertype'] = trim($loggedinfo['usertype']);
       // $_SESSION['Currentrole']=trim($loggedinfo['role']);
        $_SESSION['internal_email'] = $loggedinfo['username'];
        $mail=explode("@",$loggedinfo['username']);

        $_SESSION['name'] = $mail[0];
		
		
		//check if it is multiple roles exists or not
		if (strpos($loggedinfo['role'], ',') != false) {
			
		$curr_role=trim($loggedinfo['role']);
		
		$arrvalue = explode(",",$curr_role);
		
		$delimit_value_currentrole = implode("','",$arrvalue);
		$currentrole="'".$delimit_value_currentrole."'";
		
		$_SESSION['Currentrole']=$currentrole;
		}
		else
		{
		 $curr_role=	trim($loggedinfo['role']);
		 
		 $_SESSION['Currentrole']="'".$curr_role."'";
			
		}
		
		
		//echo'<script>window.location.href="./searchStatus.php"</script>';
		header("Location:./searchStatus.php");
		exit();



    }
    else
    {
            header("Location: ./intLogin.php?Role=$UserType");
			exit();
    }

    mysql_close($con);
    ob_flush();
?>