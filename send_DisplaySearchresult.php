<?php
ob_start();

session_start();

	       $reference_id =$_POST['referenceID'];  

			$name = $_POST['name']; 
			$location = $_POST['location']; 

			$mobile = $_POST['mobile']; 

			$email = $_POST['email']; 
			
			$app_status = $_POST['app_status']; 

			$fdate = $_POST['fdate']; 

            $tdate = $_POST['tdate'];   
			
			$typeofLoan = $_POST['typeofLoan'];   
			//database connection
			
			



			include('./connection.php');

			                       

                        if($fdate != "")

                        {

                            $fdate = $_POST['fdate'];

                        }

                        else

                        {

                            $fdate="2010-01-01";

                        }

                        

                        if($tdate != "")

                        { 

                            $fdate = $_POST['fdate'];

                        }

                        else

                        {

                            $tdate=getdate();



                           // echo getdate();

                            

                            $tdate= date('Y')."-".date('m')."-".date('d');

                            //$tdate="2012-05-18";

                            

                         }
						 
			
		     $_SESSION['searchreference_id']= $reference_id;
			 $_SESSION['searchname']= $name;
			 $_SESSION['searchlocation']= $location;
			 $_SESSION['searchmobile']= $mobile;
			 $_SESSION['searchemail']= $email;
			 $_SESSION['searchapp_status']= $app_status;
			 $_SESSION['searchfdate']= $fdate;
			 $_SESSION['searchtdate']= $tdate; 
			 $_SESSION['typeofLoan']= $typeofLoan;

                  header('Location:DisplaySearchResult.php');

                  ob_flush();
				  
                  exit;


?>