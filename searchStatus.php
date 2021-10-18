<?php

session_start();
         
		 include('./connection.php');
		 if(isset($_SESSION['internal_email']))
    {
       
     
       if($_SESSION['usertype']=='Agency' || $_SESSION['Currentrole']=="'Verification Agency'")
        {
            header("Location: ./SearchforAgency.php");       
        }
       /* elseif($_SESSION['Currentrole']=="'Training Institute'")
        {
			
		   $employee_id= $_SESSION['user_id'];
	       $select_query= "Select *  from institute_partnerdetails where employee_id='$employee_id'  ";
           $result = mysql_query($select_query); 
           $count=mysql_num_rows($result);//show  the form if previous course details are not exist
          if($count==0)
          {
			  
	       header("Location: ./institute_partner.php");
		   
		  }
		  else
		  {
			header("Location: ./read_Training_Institutedetails.php");  
		  }
        }*/
		else
        {
            
			//echo'<script>window.location.href="./search_loanapplications.php"</script>';
			header("Location: ./search_loanapplications.php");  
			exit();
        }
		
		
		   
    }
	else
	{
		header("Location: ./intLogin.php?Role=Employee");
		
	}

   
	
	?>