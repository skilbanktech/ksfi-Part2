<?php

	
session_start();

          include('./connection.php');

          include('common/class_Common.php');
						  
             $objCommon=new Common();
			 

			 $select_entrancetest=mysql_query("SELECT id,TestName FROM entrancetest_list");
	   
	    //select id for course in application_scoringfields_list table
            $courseid=$objCommon->getIdofrecord('application_scoringfields_list','actual_field_name','course');
			
			$collegeid=$objCommon->getIdofrecord('application_scoringfields_list','actual_field_name','college');
			
			$universityid=$objCommon->getIdofrecord('application_scoringfields_list','actual_field_name','university');
			
			
		//generate otp
			$OTP=$objCommon->OTP();
			
		    $emailOTP=$objCommon->smallAlphabets_OTP();
			
			$loanType="Vocational Education";
			
			if(isset($_GET['loan']))//if user applies from url /loans get loan type
			{
		     $loantype=$_GET['loan'];	
			 
			    if($loantype =='v')
				{
				  $loanType='Vocational Education';	
				}
				elseif($loantype =='H')
				{
					$loanType='Higher Education';
					
				}
			}
			  //set  the session to check the user 
			$_SESSION['setuseridentity']='applicant';
			

          

?>
<!DOCTYPE html>
<html lang="en">
<head>
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
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/bootstrap-submenu.min.js" defer></script>
<link id="KSFSkin" href="css/bootstrap_skin.css" rel="stylesheet" type="text/css">

<link id="KSFSkin" href="css/ksfi.css" rel="stylesheet" type="text/css">

<link type="text/css" href="css/cupertino/jquery-ui-1.8.16.custom.css" rel="stylesheet">

<script language="javascript" src="js/copy_state.js" type="text/javascript"></script>

<script language="javascript" src="js/registrationform.js" type="text/javascript">

 </script>
 <script language="javascript" src="js/loanApplication.js" type="text/javascript"></script>
 
 
 
<link href="bootstrap/css/bootstrap-dropdownhover.css" rel="stylesheet">

<script language="javascript" src="js/jquery-1.6.2.min.js" type="text/javascript"></script>

 <script language="javascript" src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>


 <script language="javascript" src="js/common.js" type="text/javascript">
</script>


 <script type="text/javascript">
               
					$(document).ready(function(){
                    $("#course").autocomplete({
					
					source:'getautocomplete.php?term='+ $('#course').val()+'&field=options&table=options_scoring_list&fieldname=field_id&id=<?php echo $courseid;?>',
                        minLength:1
                    });
                });
		        $(document).ready(function(){
                    $("#college").autocomplete({
					
					source:'getautocomplete.php?term='+ $('#college').val()+'&field=options&table=options_scoring_list&fieldname=field_id&id=<?php echo $collegeid;?>',
                        minLength:1
                    });
                });
           
				 
        </script>
		
				
		
<?php  if(isset($_SESSION['fbemail']))  { ?>
		
<?php   }  else { ?>
<script language="javascript" src="js/facebook.js" type="text/javascript"></script>
 <?php }  ?>


<style type="text/css">

.btn { background: #ffb248;}
.btn_red {background: #ED6347; color: #FFF;}

.btn:hover {background: #E4E4E2;}
.btn_red:hover {background: #C12B05;}


label{
float:left;
}


</style>



<link type="text/css" href="bootstrap/css/bootstrapmultislider.css" rel="stylesheet">


</head> 
<body>
<div class="bs-example">
    
	
							
			<div style="background-color:white">
               <table width="100%" style="background-color:white">	
						<tr height="15px"></tr>
						<tr><td align="left">			
						 <span align="left" >
                           <img alt="KSF Logo" src="images/img2.gif" class="img-responsive"/></span></td>
						        <td align="right">
			                               
			                               <span align="right"  valign="top">
											<?php // Inialize session
											//session_start();
											if (!isset($_SESSION['name'])) { ?>
											<a href="./signup.php" style="font-size: 16px;"  class="button">Apply for Loan</a>
											<div class="dropdown" >
												  <a href="#" style="font-size: 16px;"  class="button"><img src="images/employee.png" alt="Vocational loans
												  " style="height:20px;width:20px;">&nbsp;&nbsp;Login &nbsp;&nbsp;<span class="caret"></span></a>
												  <div class="dropdown-content">
													<a href="./login.php"  style="font-size:14px" align="left">Student</a>
													<a href="./login.php"  style="font-size:14px" align="left">Loan Applicant</a>
													<a href="intLogin.php?Role=Employee" style="font-size:14px" align="left">Employee</a>
													<a href="intLogin.php?Role=Partner"  style="font-size:14px" align="left" >Partner/Agency</a>
												  </div>
												</div>
																							<?php }else { echo "Welcome,  ".$_SESSION['name']; ?>&nbsp;&nbsp;|&nbsp;&nbsp;
											<a class="normal" href="logout.php">
											Logout</a>&nbsp;&nbsp;|&nbsp;&nbsp;
											<?php }
											if (isset($_SESSION['usertype'])) {
											if ($_SESSION['usertype'] == 'student') { ?>
											<a class="normal" href="MyAccount.php">
											My Account</a>
                                                                                        <?php
                                                                                        }elseif ($_SESSION['usertype']=='Agency') { ?>
                                                                                        <a class="normal" href="SearchforAgency.php">
											My Account</a>
                                                                                      	<?php }else {   ?>
											<a class="normal" href="searchStatus.php">
											My Account</a><?php } } ?>&nbsp;&nbsp;</span>
								            
								            
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
	<form id="msform"    method="post"  action="send_registrationdetails.php"  name="loanApplication" onsubmit="return validateLoanApplicationshortFormOnSubmit(this,'1')">
	
<!-----------------contact details slider1-------------->
<!-- fieldsets -->
       
		
<fieldset>

<h2 class="fs-title">sign up</h2>
<h3 class="fs-subtitle">Tell us your contact details</h3>

 <input type="text" name="firstname"  class="form-control" id="firstname"   
 value="<?php  if(isset($_SESSION['socialLogin_user_fname'])) { echo $_SESSION['socialLogin_user_fname']; } ?>" placeholder="First Name" /> 
  <input type="text" name="lastname" class="form-control" id="lastname"  value="<?php if(isset($_SESSION['socialLogin_user_lname'])) { echo $_SESSION['socialLogin_user_lname']; }?>"placeholder="Last Name"  />   
  <input type="text" name="email"   class="form-control" id="email"
             value="<?php if(isset($_SESSION['socialLogin_email'])) { echo $_SESSION['socialLogin_email'];  } ?>"  placeholder="Email"  /> 
			  
			   <input type="hidden" id="LoanType" name="loantype"  class="action-button" style="width:200px;" value="Educational Loans">
			   
			   <input type="hidden" id="typeofloans"  name="typeofLoan"  class="action-button" style="width:200px;"
			          value="<?php echo $loanType; ?>" >
	    <input id="mobile" maxlength="10"  class="form-control" name="mobile" size="40" type="text" placeholder="Mobile">
		<input type="hidden" id="phone1" maxlength="10" name="phone1" size="40">
		<input type="hidden" id="stdcode" maxlength="10" name="stdcode" size="40" ><input type="hidden" id="phone" maxlength="10" name="phone" size="40" >
		<input type="hidden" name="confirm_sentotp"  id="confirm_sentotp"  /> 
	<input type="hidden" name="showOTPtoApplicant"  id="showOTPtoApplicant"   value="<?php if(!isset($_SESSION['usertype'])) //if applicant is applying
			  	{  echo "yes"; }  else {  echo "no";?>	
				 
				 <?php } ?>"/>		

    <input type="hidden" name="setnextslide"  id="setnextslide"  />  				 
<input type="submit" id="confirm1"  class="submit action-button"  value="Next" onclick="validateLoanApplicationshortFormOnSubmit(this,'1');"  />




</fieldset>


<!-----------------OTP slider2-------------->
<?php if(!isset($_SESSION['usertype'])) 
	   

		 {  ?>
<fieldset>

<h2 class="fs-title">sign up</h2>
<h3 class="fs-subtitle">Verification</h3>
 <input type="text" name="verifyOTP"  class="form-control" id="verifyOTP" placeholder="Enter the OTP"/> 
<input type="hidden" name="otp"   id="otp" value="<?php echo $OTP; ?>" />  
<input type="hidden" name="emailotp"   id="emailotp" value="<?php echo $emailOTP; ?>" />  

<input type="hidden" name="verified"  id="verified" />  
<input type="hidden" name="link" value="<?php echo $_SESSION['fblink'];?>">
<input type="submit" id="confirm3"  class="action-button"  value="Next" onclick="validateLoanApplicationshortFormOnSubmit(this,'1');"  />

</fieldset>

		 <?php } ?>
<!-----------------Previous course details slider3-------------->

<fieldset id="fd1">
<h2 class="fs-title">sign up</h2>
<h3 class="fs-subtitle">Tell us about your previous course details </h3>
<input id="prevUniversity" class="form-control" name="prevUniversity"  type="text" size="40" placeholder="Previous University">
	<select id="prevCourse" name="prevCourse"  class="form-control"   >
     <option value=""> Select Previous Course</option>
      <?php
		 $tablename='previous_courselist';
         $cloumnname='previous_course';
         $objCommon->getoptions($tablename,$cloumnname);
	?></select>

 <!--<input type="button" name="previous" class="previous action-button" value="Previous" />--->
<input type="submit" id="confirm2"  class="action-button"  value="Next" onclick="validateLoanApplicationshortFormOnSubmit(this,'1')"  />

 </fieldset>
 
 
 
 
 <!-----------------Present course details slider4-------------->

<fieldset>
<h2 class="fs-title">sign up</h2>
<h3 class="fs-subtitle">Tell us about your present course details </h3>Course Name(which you are planning to join)

<input id="course" maxlength="45" class="form-control" name="course" size="40" type="text" placeholder="Course">
College Name(which you are planning to join)
<input id="college" maxlength="100" name="college"  class="form-control" size="40" type="text" placeholder="College"/> 


				
Enter the Loan Amount
<input id="amount" maxlength="7" class="form-control" name="amount" size="40" type="text" placeholder="Loan Amount">

 <input type="submit" name="submit" id="disablenext3"  class="submit action-button" value="Submit" onclick="return validateLoanApplicationshortFormOnSubmit(this,'1')" />
 
</fieldset>


<fieldset>
<h2 class="fs-title">sign up</h2>
<h3 class="fs-subtitle">Tell us about your location</h3>


 <select id="countrySelect" class="form-control"  name="country" onchange="populateState('countrySelect','stateSelect'); populateCity('countrySelect','citySelect')" size="1"></select><br>
			   <select id="stateSelect" class="form-control"  name="state" size="1"></select>
				<script type="text/javascript">initCountry('','countrySelect','stateSelect','citySelect');</script><br>
				<select class="form-control" id="citySelect"  name="city" size="1"></select><br>
				<script type="text/javascript">initCountry('','countrySelect','stateSelect','citySelect');</script>
<input id="amount1" maxlength="7" class="form-control" name="amount1" size="40" type="text" placeholder="Loan Amount">

 <input type="submit" name="submit" id="disablenext2"  class="submit action-button" value="Submit" onclick="return validateLoanApplicationshortFormOnSubmit(this,'1')" />
 
</fieldset>



</form>



<!-- jQuery easing plugin --> 
<script src="bootstrap/js/jquery.easing.min.js" type="text/javascript"></script> 
<script language="javascript" src="bootstrap/js/bootstrapmultislider.js" type="text/javascript"></script>

<div id="pageNavPosition" align="center"> </div>
					<div style="border-top:1px solid blue; margin-top:520px; color:#fff; text-align:center;">
	
							<img alt="" height="1" src="images/pixel.gif" class="img-responsive" width="1">
							<img alt="" height="1" src="images/pixel.gif"class="img-responsive" width="22">
							
									<a class="Normal" style="color:black;" href="disclaimer.html" target="_self">
									Disclaimer</a>&nbsp;&nbsp; |&nbsp;&nbsp;
									<a class="Normal" style="color:black;" href="privacypolicy.html" target="_self">
									Privacy Policy</a>
							<img alt="" height="1" src="images/pixel.gif" class="img-responsive" width="1">
							<div class="skinfooter"> Copyright &copy; 2011 KSFi Pvt Ltd.</div>
							
					<span background="images/rtoutline.jpg" class="img-responsive" width="12px">
				
		</div>
	
 
<script type="text/javascript"><!--
    var pager = new Pager('box-table-a',10); 
    pager.init(); 
    pager.showPageNav('pager', 'pageNavPosition'); 
    pager.showPage(1);
//--></script>
		
	
	
</div>


</body>
</html>                                		