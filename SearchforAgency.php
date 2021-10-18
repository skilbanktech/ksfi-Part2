<?php session_start();

 if(isset($_SESSION['internal_email']))
    {
		
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
<link id="KSFSkin" href="css/skin.css" rel="stylesheet" type="text/css">
<link id="KSFSkin" href="css/ksfi.css" rel="stylesheet" type="text/css">

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/bootstrap-submenu.min.js" defer></script>


<script language="javascript" src="js/contactus.js" type="text/javascript"> </script>
 <script language="javascript" src="js/common.js" type="text/javascript"> </script>
 <link type="text/css" href="css/cupertino/jquery-ui-1.8.16.custom.css" rel="stylesheet" >

<script language="javascript" src="js/jquery-1.6.2.min.js" type="text/javascript">
 </script>

<script language="javascript" src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript">
 </script>
<script type="text/javascript">
			$(function()
			{
			$( "#fdate" ).datepicker({
			changeMonth: true,
			changeYear: true,
			maxDate:new Date(),
			yearRange:"c-100:c+1",
                        dateFormat: "yy-mm-dd"
                        
		});
		
                	$( "#tdate" ).datepicker({
			changeMonth: true,
			changeYear: true,
			maxDate:new Date(),
			yearRange:"c-100:c+1",
                        dateFormat: "yy-mm-dd"
                        
		});

			});
			
   function onclickClearall()
	
	{
	
	
	document.getElementById('fdate').value="";
	document.getElementById('tdate').value="";
	document.getElementById('location').value="";
	document.getElementById('referenceID').value="";
	document.getElementById('name').value="";
	document.getElementById('mobile').value="";
	document.getElementById('email').value="";
	
	
	
	
	}

		</script>
<style type="text/css">
.auto-style2 {
	background-image: url('images/rtoutline.jpg');
}
.auto-style3 {
	margin-left: 2px;
	margin-bottom: 2px;
}
.auto-style4 {
	margin-left: 0px;
}
.verticalmenu
{
	/*font: bold 12px arial, helvetica, sans-serif; */
	font-weight:bold;
	font-size:21px;
	background:#99CCFF;
}
.pg-normal {
                color: black;
                font-weight: normal;
                text-decoration: none;    
                cursor: pointer;    
}
.pg-selected {
                color: black;
                font-weight: bold;        
                text-decoration: underline;
                cursor: pointer;
}

</style>
</head>

 
</head>

<body id="Body">



	<form id="searchStatus" action="DisplayAgencySearch.php" autocomplete="off" enctype="multipart/form-data" method="post" name="Form" onsubmit="return SearchAppStatus(this)" style="height: 100%;">
		
<div align="center">
	<?php include('./common/bootstrap_common_mainmenu.php'); ?>

	
					<!-- #BeginEditable "Content" -->
					
						<table align="center">
								<tr><td height="50" style="width: 71px"></td></tr>
								<tr>
									<td class="heading" colspan="3">Search 
									Initiated Application</td>
                                     <tr><td>&nbsp;</td></tr>                                                          
                                                                          <tr>
									<td style="width: 71px">From Date</td>
									<td>:</td>
									<td>
									<input name="fdate" id="fdate"  size="40" class="form-control border-input"  type="text" value="<?php  echo $fromdate;  ?>"></td>
								</tr>
                                                                 <tr>
									<td style="width: 71px">To Date</td>
									<td>:</td>
									<td>
									<input name="tdate" id="tdate" size="40"  class="form-control border-input" type="text" value="<?php  echo $current_date;  ?>"></td>
								</tr>
                                                                
								<tr>
									<td style="width: 71px">Reference ID</td>
									<td>:</td>
									<td>
									<input name="referenceID" size="40" placeholder="Reference ID" class="form-control border-input" type="text"></td>
								</tr>
								<tr>
									<td style="width: 71px">Name</td>
									<td>:</td>
									<td>
									<input name="name" size="40" placeholder="Name" class="form-control border-input" type="text"></td>
								</tr>
								<tr>
									<td style="width: 71px">Location</td>
									<td>:</td>
									<td>
									<input name="location" size="40"  placeholder="Location" class="form-control border-input" type="text"></td>
								</tr>
							<!--	<tr>
									<td style="width: 71px">Mobile</td>
									<td>:</td>
									<td>
									<input name="mobile" size="40" maxlength="10" type="text"></td>
								</tr> 
                                                        -->
                                                                <tr>
									<td style="width: 71px">Applicant Email</td>
									<td>:</td>
									<td>
									<input name="email" class="form-control border-input" placeholder="Applicant Email" size="40" type="text"></td>
								</tr>
                                    <tr><td>&nbsp;</td></tr>                            
                                                                 
								<tr>
									<td align="center" colspan="3">
									<input name="submit" style="font-size:16px" type="submit" value="Search">
								
									
									<input name="Reset" style="font-size:16px" type="button" value="Reset"  onclick="onclickClearall();">
									
									<a href="SearchforAgency.php"><input name="submit" type="button" value="Refresh" ></a>
                                   
                                      </td>
								</tr>
								<tr><td height="90" style="width: 71px"></td></tr>
						</table></form>
					<!-- #EndEditable -->
				<?php include('./common/bootstrap_commonFooter.php');?>
				
				<?php }  else { 	header("Location: ./intLogin.php?Role=Employee");  } //redirect to login page if user is logged in?>