


<?php  

session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml">



<head id="Head">

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

<link id="KSFSkin" href="css/skin.css" rel="stylesheet" type="text/css">

<link id="KSFSkin" href="css/ksfi.css" rel="stylesheet" type="text/css">


<link type="text/css" href="css/cupertino/jquery-ui-1.8.16.custom.css" rel="stylesheet">

<script language="javascript" src="js/jquery-1.6.2.min.js" type="text/javascript"></script>

<script language="javascript" src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript">

</script>
<script language="javascript" src="js/paging.js" type="text/javascript"> </script>


		  <!--tab model links---->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
  
  <script>
  $( function() {
     $( "#tabs" ).tabs();
	 
	  } );
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
		
	
	</head>
	<body id="Body">
	
	

<?php include('./common/common_mainmenu.php'); 

				 
				$current_date=date('Y-m-d');
		$currentdate=date("Y/m/d");
		
		$currentdate=strtotime($currentdate);
		$days_older=30;
		
		$date = strtotime("-".$days_older."day", $currentdate);
		
				 $fromdate= date('Y-m-d', $date);
		
						 ?>

								
  <table align="center"   style="background-color:white;width:50%">
<form action="newcourse_registration.php" method="post"  style="background-color:#f4f4f4">	
								 <table align="center"   style="background-color:white;width:500px">	
								<tr><td height="50"></td></tr>



								<tr>



									<td class="heading" colspan="3">Search New Course Details</td></tr>

                               <tr>
									<td style="width: 71px">From Date</td>
									<td>:</td>
									<td>
									<input name="fromdate" id="fdate5" size="40"  type="text" value="<?php echo $fromdate; ?>" onclick="displaydate('#fdate5')"></td>
								</tr>
                                                                 <tr>
									<td style="width: 71px">To Date</td>
									<td>:</td>
									<td>
									<input name="todate" id="tdate5" size="40"  type="text" value="<?php echo $current_date; ?>"  onclick="displaydate('#tdate5')" ></td>
								</tr>
								<tr>



									<td>Reference ID</td>



									<td>:</td>



									<td>



									<input name="referenceID" size="40" type="text"></td>



								</tr>



								<tr>



									<td>Course Name</td>



									<td>:</td>



									<td>



									<input name="name" size="40" type="text"></td>



								</tr>
								<tr>
								
									<td  align="center" colspan="3">
									    <input name="submit" type="submit" value="Search">
								     </td>
								</tr>

	
		
	
	


                                        </form></table>

	<?php include('./common/comFooter.php');?>

	