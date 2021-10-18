<?php
session_start();

 

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">


<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml">



<!-- #BeginTemplate "webtemplate.dwt" -->



<head id="Head">

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta content="First Education Loans in India, Fast Education Loans" name="description" />
<meta content="Financial Consultancy, Education Loans" name="keywords" />
<meta content="&amp;copy; 2011 KSFi Ltd." name="COPYRIGHT" />
<meta content="KSFi Ltd" name="AUTHOR" />
<meta content="DOCUMENT" name="RESOURCE-TYPE" />
<meta content="GLOBAL" name="DISTRIBUTION" />
<meta content="INDEX, FOLLOW" name="ROBOTS" />
<meta content="1 DAYS" name="REVISIT-AFTER" />
<meta content="GENERAL" name="RATING" />
<meta content="RevealTrans(Duration=0,Transition=1)" http-equiv="PAGE-ENTER" />
<title>Education Loans KSF Pvt Ltd.</title>
<link id="KSFSkin" href="css/ksfi.css" rel="stylesheet" type="text/css">
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/bootstrap-submenu.min.js"></script>
<link href="bootstrap/css/bootstrap-dropdownhover.css" rel="stylesheet">

<style>

a.nextbutton
{

background-color: #008CBA;
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;border-radius:4px;

}

</style>
 
</head>

<body>

<div align="center">
<div class="bs-example" >
    
	
							
			<div style="background-color:white">
               <table width="100%" style="background-color:white">	
						<tr height="15px"></tr>
						<tr><td align="left">			
						 <span align="left" >
                           <img alt="KSF Logo" src="images/img2.gif" class="img-responsive"/></span></td>
						        <td align="right">
			                               
			                               <span align="right"  valign="top">
											
										
											<a href="./signup.php" style="font-size: 16px;"  class="button">Apply for Loan</a>
											<div class="dropdown" >
												  <a href="#" style="font-size: 16px;"  class="button"><img src="images/employee.png" style="height:20px;width:20px;">&nbsp;&nbsp;Login &nbsp;&nbsp;<span class="caret"></span></a>
												  <div class="dropdown-content">
													<a href="./login.php"  style="font-size:14px" align="left">Student</a>
													<a href="./login.php"  style="font-size:14px" align="left">Loan Applicant</a>
													<a href="intLogin.php?Role=Employee" style="font-size:14px" align="left">Employee</a>
													<a href="intLogin.php?Role=Partner"  style="font-size:14px" align="left" >Partner/Agency</a>
												  </div>
												</div>
																						
								            
								            
                </td></tr> <tr height="18px"></tr>
			</table>
        </div> 
    <nav role="navigation" class="navbar navbar-default" style="background-color:#6495ed">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" style="font-size:16px" href="index.html">Home</a>
        </div>
        <!-- Collection of nav links and other content for toggling -->
        <div id="navbarCollapse" align="left" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                
                 <li><a href="services.html"  style="font-size:15px">Services</a> </li>
             <li><a href="aboutus.html" style="font-size:15px">About Us</a></li>
             <li><a href="location.html"  style="font-size:15px">Location</a></li>
             <li><a href="contactus.html" style="font-size:15px">Contact us</a></li>
            </ul>
       
        </div>
    </nav>

 <table><tr height="50"><td></td></tr></table>		

             <div class="container">
				   
				  <div class="row">
                    <div class="col-lg-12" align="center"> 
							
							
							<?php


                             if(isset($_GET['Msg']))
							 {
				             	$Msg = $_GET['Msg'];

                                if($Msg == 0)
								 {
				 
							   echo '<p  align="center">Thank You for Registering. 
								We will contact you shortly.
                                
								</p>';
								
								 }
							 }
								 else
								 {
									 
						       echo '<p  align="center">Thanks for contacting us. 
								<br>Your login details are sent to your emailid.
                                <br>Do you want to process your loan immediately by applying now.<br>
								</p><br>';
								echo '<a href="loan_application.php" class="nextbutton" >Yes</a>&nbsp;&nbsp;&nbsp;
							   <a href="logout.php" class="nextbutton">No,Thanks I will apply later</a></td>';
									 
								 }
								 
								 
								 ?>
								
							
								
					</div>
		          </div>
				 

				

                </div>
				
				 <table><tr height="120"><td></td></tr></table>
				
				
<!-------footer---------->
							
							
<table style="width:100%; height:30px; background-color:#87CEFA; color:#778899; text-align:center; font-size:12px">		
  <tr>
      <td> &copy; 2011 KSFi Pvt Ltd.-<a class="Normal" style="color:#778899;" href="disclaimer.html" target="_self">
									Disclaimer</a>&nbsp;&nbsp; |&nbsp;&nbsp;
									<a class="Normal" style="color:#778899;" href="privacypolicy.html" target="_self">
									Privacy Policy</a>
		</td>
  </tr>
</table>
				
				
		
	
 
<script type="text/javascript"><!--
    var pager = new Pager('box-table-a',10); 
    pager.init(); 
    pager.showPageNav('pager', 'pageNavPosition'); 
    pager.showPage(1);
//--></script>
		
	
	
</div>


</div>



</body>



<!-- #EndTemplate -->



</html>