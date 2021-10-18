


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


             if(isset($_SESSION['AppID']))
			   {
			   $id=$_SESSION['AppID']; 
			   
			   }
		
			$sql="select reference_id,cash,spdc_cheque,spdc_amount,spdc_bank,applicant_bank,total_INR,IRR,Repayment_tenure from sanctionmail_details where reference_id='$id'"; 
			
			$select_record=mysql_query($sql);
			
			$row= mysql_fetch_row($select_record);
			
			$count=mysql_num_rows($select_record);
			
			
			
			
			$sanctionmail_col= array('reference_id','cash','spdc_cheque','spdc_amount','spdc_bank','applicant_bank','total_INR','IRR','Repayment_tenure');
		    if($row)

            {

             $fetch = array_combine($sanctionmail_col,$row); 
			 
			}
		
						
	
		  
		?> 
 

    <table align="center"  style="background-color:white;">	
	<form id="searchStatus" action="send_sanctionmail_details.php" autocomplete="off" enctype="multipart/form-data" method="post" name="Form" onsubmit="return SearchAppStatus(this)" style="height: 100%;">

								<tr><td height="50"></td></tr>

                                   <tr>
									<td class="heading" colspan="3">Sanction Mail Details</td></tr>
									    <tr><td>&nbsp;</td></tr>              
                                          
                                 <tr>
								 <td>Reference Id</td>
									<td>:</td>
									<td><input name="reference_id"  id="reference_id"   class="form-control border-input"  type="text" class=""  readonly='readonly' value="<?php echo $id;?>"  ></td>	
                                  </tr>									
                            <tr>
									<td>PF cheque / Cash of Rs</td>
									<td>:</td>
									<td>
										<input name="cash"  id= "cash"   type="text" class="form-control border-input" 
										value="<?php if($row) { echo $fetch['cash']; } else { echo ""; } ?>">
									</td>
								</tr><br>
                                                                 <tr>
									<td style="width: 71px">SPDC'S cheques</td>
									<td>:</td>
									<td>
									<input name="spdc_cheque"  id= "spdc_cheque"   type="text" class="form-control border-input"  value="<?php if($row) { echo $fetch['spdc_cheque']; } else { echo ""; } ?>" ></td>
								</tr>
								<tr>
									<td style="width: 71px">SPDC's of Rs</td>
									<td>:</td>
									<td><input name="spdc_amount"  id= "spdc_amount"   type="text" class="form-control border-input" value="<?php if($row) { echo $fetch['spdc_amount']; } else { echo ""; } ?>" ></td>
									
								</tr>
                                                                
								<tr>
									<td style="width: 71px">SPDC's Bank Account</td>
									<td>:</td>
									<td><input name="spdc_bank"  id= "spdc_bank"   type="text" class="form-control border-input" value="<?php if($row) { echo $fetch['spdc_bank']; } else { echo ""; } ?>" ></td>
								</tr>
								<tr>
									<td style="width: 71px">Name of Applicant's Bank </td>
									<td>:</td>
									<td><input name="applicant_bank"  id= "applicant_bank"   type="text" class="form-control border-input" value="<?php if($row) { echo $fetch['applicant_bank']; } else { echo ""; } ?>"></td>
								</tr>
								<tr>
									<td style="width: 71px">Total Amount Rs.</td>
									<td>:</td>
									<td><input name="total_INR"  id= "total_INR"   type="text" class="form-control border-input" value="<?php if($row) { echo $fetch['total_INR']; } else { echo ""; } ?>" ></td>
								</tr>
								<tr>
									<td style="width: 71px">IRR</td>
									<td>:</td>
									<td><input name="IRR"  id= "IRR"   type="text" class="form-control border-input" value="<?php if($row) { echo $fetch['IRR']; } else { echo ""; } ?>" ></td>
								</tr>
								
								
								<tr>
									<td style="width: 71px">Repayment tenure in Months</td>
									<td>:</td>
									<td><input name="Repayment_tenure"  id= "Repayment_tenure"   type="text" class="form-control border-input" value="<?php if($row) { echo $fetch['Repayment_tenure']; } else { echo ""; } ?>" ></td>
								</tr>
                                                               
								
								<tr>
								    <td height="20">
									</td>
								
								</tr>
                                                        
                                                                 
								<tr>
								<?php if($count==0){ ?>        
								
									<td  align="center" colspan="3">
									
									<input name="submit"  style="font-size:16px" type="submit" value="Submit">
								
						                                 

									</td>
									 <?php } else  { ?>
									 
									<td  align="center" colspan="3">
									
									<input name="submit"  style="font-size:16px" type="submit" value="Update">
								
						                                 

									</td>
									 <?php  } ?>
									
								</tr>
								
								
								<tr><td height="50" style="width: 71px"></td></tr>
	
	</form></table>

	
	<?php include('./common/bootstrap_commonFooter.php');?>
	
	<?php }  else { 	header("Location: ./intLogin.php?Role=Employee");  } //redirect to login page if user is logged in?>
	