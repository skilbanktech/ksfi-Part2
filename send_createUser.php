<?php



$firstname =$_POST['firstname'];

$lastname =$_POST['lastname'];

$email =$_POST['email'];
$usertype =$_POST['cmbUser'];
$Role =$_POST['cmbUsertype'];
$password = $_POST['password'];

//$location = $_POST['countrySelect'];

$Mobile= $_POST['mobile'];

//echo $Mobile;

$cityarr= $_POST['listofcity'];

$location="";

//echo $cityarr;

if(!empty($cityarr)) {

	//echo "got citylist";

	$cityarrsize =  sizeof($cityarr);

	$i=1;

    foreach($cityarr as $check) 

    {   

	    $location=$location.$check;

    	if ( $i < $cityarrsize )

    	{   			

    		$location=$location.','; 		

    	}		   			

		$i++;

     }          

     }

  echo $location;  





//database connection

include('./connection.php');





	//to send the information into the databases

	$select_query="Select * from login_details where email='".$email."' and password='".$password."'";

	$select_record=mysql_query($select_query);

	if((mysql_num_rows($select_record)==0))

	{	
	    /*  if($usertype=="Service Manager" || $usertype=="Service Officer"||$usertype=="Field Officer")
	      {

	        $getusertype="Employee";

	      }

	      else if($usertype=="Partner")

	      {

	        $getusertype="Partner";

	      }

	      else if($usertype=="Agency")

	      {

	         $getusertype="Agency";
	      } */

	$add_new="Insert into login_details(firstname,lastname,username,usertype,password,location,role,mobile)
            values('$firstname ','$lastname','$email','$usertype','$password','$location','$Role','$Mobile')";

	//echo($add_new);

	$add_query=mysql_query($add_new);



	header("Location: ./intLogin.php");		

	}

	else

	{

		header("Location: ./createUser.php");

		echo ("Invalid email address or password");

	}

mysql_close($con);



?>