


<?php  

session_start();
 if(isset($_SESSION['internal_email']))
    {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml">



<head id="Head">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta content="First Education Loans in India, Fast Education Loans" name="description">

<meta content="Financial Consultancy, Education Loans" name="keywords">

<meta content="&amp;copy; 2011 KSFi Ltd." name="COPYRIGHT">

<meta content="KSFi Ltd" name="AUTHOR">

<meta content="DOCUMENT" name="RESOURCE-TYPE">

<meta content="GLOBAL" name="DISTRIBUTION">

<meta content="INDEX, FOLLOW" name="ROBOTS">

<meta content="1 DAYS" name="REVISIT-AFTER">

<meta content="GENERAL" name="RATING">

<meta content="RevealTrans(Duration=0,Transition=1)" http-equiv="PAGE-ENTER">

<title>Education Loans KSF Pvt Ltd.</title>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/bootstrap-submenu.min.js" defer></script>

<link id="KSFSkin" href="css/skin.css" rel="stylesheet" type="text/css">

<link id="KSFSkin" href="css/ksfi.css" rel="stylesheet" type="text/css">

<link type="text/css" href="css/cupertino/jquery-ui-1.8.16.custom.css" rel="stylesheet">
<script language="javascript" src="js/jquery-1.6.2.min.js" type="text/javascript"></script>

 <script language="javascript" src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
 
 
 <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">--->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
  
  <script>
  $( function() {
     $( "#tabs" ).tabs();
	 
	  } );
  </script>
  <script type="text/javascript">
                $(document).ready(function(){
                    $("#location").autocomplete({
					source:'getautocomplete.php?term='+ $('#location').val()+'&field=city&table=student_details',
                        minLength:1
                    });
                });
				
				$(document).ready(function(){
                    $("#app_status").autocomplete({
					source:'getautocomplete.php?term='+ $('#app_status').val()+'&field=app_status&table=student_details',
                        minLength:1
                    });
                });
				
 </script>
  
  
<script type="text/javascript">
		function displaydate(id)	
		{
			
			$( id ).datepicker({
			changeMonth: true,
			changeYear: true,
			maxDate:new Date(),
			yearRange:"c-100:c+1",
                        dateFormat: "yy-mm-dd"
		}).focus();  
		 }
		
		</script>
		
	<script>

	
	function onclickClearall()
	
	{
	
	
	document.getElementById('fdate').value="";
	document.getElementById('tdate').value="";
	document.getElementById('location').value="";
	document.getElementById('referenceID').value="";
	document.getElementById('name').value="";
	document.getElementById('mobile').value="";
	document.getElementById('email').value="";
	document.getElementById('app_status').value="";
	
	
	
	}

    </script>	
	</head>
	<body id="Body">
	
	

<?php include('./common/bootstrap_common_mainmenu.php'); 

				 include('./connection.php');
								 
	
		
		include('common/class_Common.php');

        $objCommon=new Common();

		//current date
		 $current_date=date('Y-m-d');
		 
		 $typeofsearch='Search Loan Applications';
		
		//get  default from date
		$fromdate=$objCommon->Set_defaultfromdate($typeofsearch);
		
		
			
						
		//show previous search results  only on select of back button from searchresults page.    
		if(isset($_GET['prevsearch']))
     {		
	 
	 
	        $prevsearch=$_GET['prevsearch'];
			
			$reference_id = $_SESSION['searchreference_id'];

			$name = $_SESSION['searchname'];

			$location = $_SESSION['searchlocation'];

			$mobile = $_SESSION['searchmobile'];

			$email = $_SESSION['searchemail'];
			
			$app_status = $_SESSION['searchapp_status'];

			$fdate = $_SESSION['searchfdate'];

            $tdate =  $_SESSION['searchtdate'];
			
			$typeofLoan =  $_SESSION['typeofLoan'];
			
			
			if($fdate=='2010-01-01'||$fdate=='0000-00-00')
			{
			  $fdate='';
			}
			
			
		
   }
		  
		?> 
 

    <table align="center"  style="background-color:white;">	
	<form id="searchStatus" action="DisplaySearchPDCheque.php" autocomplete="off" enctype="multipart/form-data" method="post" name="Form" onsubmit="return SearchAppStatus(this)" style="height: 100%;">

								<tr><td height="50"></td></tr>

                                   <tr>
									<td class="heading" colspan="3">Search PDCheque Details</td></tr>
									    <tr><td>&nbsp;</td></tr>              
                                                                        
                            <tr>
									<td>From Date</td>
									<td>:</td>
									<td>
								<input name="fdate"  id= "fdate"   type="text" class="form-control border-input"  value="<?php if(isset($prevsearch)) {  echo $fdate;  }   else {  echo $fromdate;  } ?>" 
								onclick="displaydate('#fdate')"></td>
								</tr><br>
                                                                 <tr>
									<td style="width: 71px">To Date</td>
									<td>:</td>
									<td>
									<input name="tdate" id="tdate" size="40" class="form-control border-input"  type="text" value="<?php if(isset($prevsearch)) {  echo $tdate;  }   else {  echo $current_date;  } ?>" onclick="displaydate('#tdate')" ></td>
								</tr>
								<tr>
									<td style="width: 71px">Location</td>
									<td>:</td>
									<td><input name="location"  id="location" placeholder="Location" class="form-control border-input"  type="text" value="<?php if(isset($prevsearch)) {  echo $location;  }   ?>"></td>
									
								</tr>
                                                                
								<tr>
									<td style="width: 71px">Reference ID</td>
									<td>:</td>
									<td>
									<input name="referenceID" id="referenceID" placeholder="Reference ID"  class="form-control border-input"  size="40" type="text" value="<?php if(isset($prevsearch)) {  echo $reference_id;  }   ?>"></td>
								</tr>
								<tr>
									<td style="width: 71px">Payment Type</td>
									<td>:</td>
									<td><select id="payType" name="payType" size="1" class="form-control border-input" >

										<option></option>

										<option>Check</option>

										<option>Cash</option>

										</select></td>
								</tr>
								
								<tr>
									<td style="width: 71px">Amount</td>
									<td>:</td>
									<td>
									<input name="amount" 
									id="amount" 
									placeholder="Amount"  class="form-control border-input"  size="40" type="text" ></td>
								</tr>
								<tr>
									<td style="width: 71px">Check No.</td>
									<td>:</td>
									<td>
									<input name="checkno" 
									id="checkno" 
									placeholder="Check No."  class="form-control border-input"  size="40" type="text" ></td>
								</tr>
								
								
								
								
                                                                
								</tr>

								
								<tr>
								    <td height="20">
									</td>
								
								</tr>
                                                                
                                                                 
								<tr>
								
									<td  align="center" colspan="3">
									
									<input name="submit"  style="font-size:16px" type="submit" value="Search">
								
									
									<input name="Reset"  style="font-size:16px" type="button" value="Reset"  onclick="onclickClearall();">
									
									<a href="searchStatus.php"><input name="submit" type="button" value="Refresh" ></a>
                                   

									</td>
									
								</tr>
								<tr><td height="50" style="width: 71px"></td></tr>
	
	</form></table>

	
	<?php include('./common/bootstrap_commonFooter.php');?>
	
	<?php }  else { 	header("Location: ./intLogin.php?Role=Employee");  } //redirect to login page if user is logged in?>
	