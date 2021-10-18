


<?php  

session_start();

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

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"></link>
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/bootstrap-submenu.min.js"></script>
<script src="js/common.js"></script>

<?php if(isset($_GET['Msg']))
	

	{ ?>
		
	<script> 
	
		
		//alert();
	var id='<?php echo  $_GET['refid']; ?>';
	
	var conf= confirm("Sent Successfully .Do you want to continue with Loan Agreement");
	
	if(conf)
		
		{

			window.location.href="./DisplayLoanAgreement.php?refid="+id;
			
			
		}
		else
		{
			
			window.location.href="./search_loanapplications.php";
			
		}

	

	</script>
		
<?php	} ?>

<link id="KSFSkin" href="css/ksfi.css" rel="stylesheet" type="text/css"></link>


  
 
  
  <style>

.modalbox .box {
    background-color: rgba(0,0,0,0.4);
    margin: 0 auto;
    min-width: 390px;
    padding: 50px;
    width: 40%;
    margin-top: 100px;
    }
    .modalbox .title {
    border-bottom: 1px solid #ccc;
    font-family: verdana;
    font-size: 18px;
    letter-spacing: 0.2em;
    margin: 0;
    padding: 0 0 10px;
    text-transform: uppercase;
    color: #fff;
        }
    .modalbox .content {
    display: block;
    font-family: Verdana;
	
    font-size: 16px;
    line-height: 22px;
    padding: 10px 0 0;
    color: #fff;
        }
    .modalbox .close1 {
    color: #fff;
    display: block;
    float: right;
    font-family: Verdana;
    font-size: 18px;
    height: 25px;
    text-decoration: none;
        }


.modalbox{
    display: none;
    position: fixed;
    z-index: 9999;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    color:#333333;
    }

.modalbox:target {
    display: block;
    outline: none;
}


.link-modal{
    width: 90%;
    text-align: center;
    margin: 0 auto;
    padding-top: 400px;
    padding-left: 15px;
}


.link-modal a{
    border: 1px solid #fff;
    color: #fff;
    font-family: Verdana;
    font-size: 20px;
    letter-spacing: 0.3em;
    padding: 10px;
    text-decoration: none;
    text-transform: uppercase;
}

</style>
  
<script>
function showsanctionform()
{
   $('#myModal').modal('show');
  
   
}

    
</script>	
	
<script>

 function submitsanctionDetails()
 {
	
	
	 var reference_id=$("#reference_id").val();
	 var cash=$("#cash").val();
	 var spdc_cheque=$("#spdc_cheque").val();
	 var spdc_amount=$("#spdc_amount").val();
	 var spdc_bank=$("#spdc_bank").val();
	 var applicant_bank=$("#applicant_bank").val();
	 var total_INR=$("#total_INR").val();
	 var IRR=$("#IRR").val();
	 var Repayment_tenure=$("#Repayment_tenure").val();
	 var secondmail=$("#secondmail").val();
	 
	 var reason="";
	 
	 
      reason= validateEmptyField('cash',true,'Cash');
			if (reason!= "")

		{

				alert("Some fields need correction:\n"+reason);
				
				return false;

		} 
	reason= validateEmptyField('spdc_cheque',true,'spdc cheque');
	if (reason!= "")

		{

				alert("Some fields need correction:\n"+reason);
				
				return false;

		} 
		reason= validateEmptyField('spdc_amount',true,'spdc amount');
	if (reason!= "")

		{

				alert("Some fields need correction:\n"+reason);
				
				return false;

		} 
	 
	 reason= validateEmptyField('spdc_bank',true,'spdc bank');
	if (reason!= "")

		{

				alert("Some fields need correction:\n"+reason);
				
				return false;

		} 
		reason= validateEmptyField('applicant_bank',true,'applicant_bank');
	if (reason!= "")

		{

				alert("Some fields need correction:\n"+reason);
				
				return false;

		}
		reason= validateEmptyField('total_INR',true,'total INR');
	if (reason!= "")

		{

				alert("Some fields need correction:\n"+reason);
				
				return false;

		}
		reason= validateEmptyField('IRR',true,'IRR');
	if (reason!= "")

		{

				alert("Some fields need correction:\n"+reason);
				
				return false;

		}
		reason= validateEmptyField('Repayment_tenure',true,'Repayment_tenure');
	if (reason!= "")

		{

				alert("Some fields need correction:\n"+reason);
				
				return false;

		}
		
	 if (secondmail== "")

		{

				alert("Some fields need correction:\n you didn't select Add Second Email To");
				
				return false;

		}
		
		
		

	
	var dataserialize="reference_id="+reference_id+"&cash="+cash+"&spdc_cheque="+spdc_cheque+"&spdc_amount="+spdc_amount+
	                 "&spdc_bank="+spdc_bank+"&applicant_bank="+applicant_bank+"&Repayment_tenure="+Repayment_tenure+
					 "&total_INR="+total_INR+"&IRR="+IRR+"&secondmail="+secondmail;
 

    $.ajax({
           type: "POST",
           url: 'send_sanctionmail_details.php',
           data: dataserialize, // serializes the form's elements.
           success: function(data)
           {
			   
			   //alert(data);
			   
			    $('#popup').html(data);
				$('#myModal').modal('show');
	  
             
           }
         });





 }
 
	  
 function validateEmptyField(fld1,requiredField,fieldname) {
	
	 
  var fld=document.getElementById(fld1);
  

    var error = "";

    fld.style.background = 'White';

    if (fld.readOnly==false && fld.value == "") {



        if(requiredField == true)

        {



            fld.style.background = 'Yellow'; 



            error = "You didn't enter "+ fieldname + ".\n"



        }

    } 

  /*  else 

    {

        fld.style.background = 'White';



    }

*/

    return error;   



}



</script>
	</head>
	<body id="Body">
	
	

<?php include('./common/bootstrap_common_mainmenu.php'); 

				 include('./connection.php');
								 
	
		
		
		
		if(isset($_SESSION['AppID']))
			   {
			   $id=$_SESSION['AppID']; 
			   
			   }
			   
			   elseif(isset($_GET['id']))
			   {
				 $id= $_GET['id'];
				 
				 $_SESSION['AppID']=$id;
				   
			   }

			   else
			   {
				  $id=""; 
			   }
			   

		//current date
		
			
			$sql="select reference_id,cash,spdc_cheque,spdc_amount,spdc_bank,applicant_bank,Repayment_tenure,total_INR,IRR from sanctionmail_details where reference_id='$id'"; 
			
			
			$select_record=mysql_query($sql);
			
			$row= mysql_fetch_row($select_record);
			
			$count=mysql_num_rows($select_record);
			
			
			
			
			$sanctionmail_col= array('reference_id','cash','spdc_cheque','spdc_amount','spdc_bank','applicant_bank','Repayment_tenure','total_INR','IRR');
		    if($row)

            {

             $fetch = array_combine($sanctionmail_col,$row); 
			 
			}
		
           $selectquery="select firstname,lastname,typeofLoan from student_details where reference_id='$id'";
		   
		   $select_record1= mysql_query($selectquery);
		   
		   $row1= mysql_fetch_row($select_record1);
		   
		   $col= array('firstname','lastname','typeofLoan');
		   
		    if($row1)

            {

             $fetch1 = array_combine($col,$row1); 
			 
			}
			
		   $selectquery2="select amount from course_details where reference_id='$id'";
		   
		   $select_record2= mysql_query($selectquery2);
		   
		   $row2= mysql_fetch_row($select_record2);
		   
		   $col2= array('amount');
		   
		    if($row2)

            {

             $fetch2 = array_combine($col2,$row2); 
			 
			}
		   $selectUserDetail="select user_id,firstname,lastname,username,usertype,password,location,role,mobile from login_details where username='".$_SESSION['internal_email']."'";

		$userDetail_record=mysql_query($selectUserDetail);

                $row_user= mysql_fetch_row($userDetail_record);

        

                if($row_user)

                {

                    $col_user = array('user_id','firstname','lastname','username','usertype','password','location','role','mobile');

                    $fetch3 = array_combine($col_user,$row_user); 

                }
				
				$selectquery2="select amount from course_details where reference_id='$id'";
		   
		   $select_record2= mysql_query($selectquery2);
		   
		   $row2= mysql_fetch_row($select_record2);
		   
		   $col2= array('amount');
		   
		    if($row2)

            {

             $fetch2 = array_combine($col2,$row2); 
			 
			}
			
			 $typeofLoan =$fetch1['typeofLoan'];
			 

		   
		  
		?> 
 

    <table align="center"  style="background-color:white;">	
	<form id="sanctionform"  autocomplete="off" enctype="multipart/form-data" method="post" name="Form" onsubmit="return sumbitsanctionDetails();" style="height: 100%;">

								<tr><td height="20"></td></tr>

                                   <tr>
									<td class="heading" colspan="3">Sanction Mail</td></tr>
									    <tr><td>&nbsp;</td></tr>  


                             									
                                                                        
                           
									<tr><td><input type="hidden" id="reference_id" name="reference_id" value="<?php echo $id;?>"></td></tr>
									
									
									<table align="center">
									<tr align="left">
									<td style="font-size:14px">
									
									Dear <?php  if($row1) { echo $fetch1['firstname']." ".$fetch1['lastname']; } ?>,<br/><br/>
									
									
									This mail is a confirmation for the loan sanction against the application for <?php  if($row1) {  echo $fetch1['typeofLoan']; } ?> to <?php if($row1) { echo $fetch1['firstname']." ".$fetch1['lastname']; } ?> .<br/>
									We would be doing the funds transfer of Rs <?php if($row2) { echo $fetch2['amount']; } ?> very soon to your account. <br/><br/><br/>
									The Disbursement will be made subject to below conditions:<br/><br/>
									1. Wholly signed and completed loan agreement of KASHMIR FINANCE PRIVATE LTD.<br/><br/>
									2. Processing Fees transfer of Rs <input type="text" id="cash" placeholder="Enter the Amount" oninput="allowonlynumeric(cash)"  name="cash"  value="<?php if($row) { echo $fetch['cash'];  } else { echo ''; } ?>" required> to be credited in the account of Kashmir Finance Pvt Ltd.<br/><br/>
									3.<input type="text" id="spdc_cheque" placeholder="Enter No. of Cheques" 
									oninput="allowonlynumeric(spdc_cheque)" name="spdc_cheque" value="<?php if($row) { echo $fetch['spdc_cheque'];  } else { echo ""; } ?>" required> SPDC's of Rs <input type="text" id="spdc_amount" placeholder="Enter the Amount" oninput="allowonlynumeric(spdc_amount)" name="spdc_amount" value="<?php if($row) { echo $fetch['spdc_amount'];  } else { echo ""; } ?>" required> each from <input type="text"  id="spdc_bank" name="spdc_bank" placeholder="Enter the Bank Name"  value="<?php if($row) { echo $fetch['spdc_bank'];  } else { echo ""; } ?>" required> bank account to be deposited with Kashmir Finance Pvt Ltd.<br/><br/>
									4.All Interest and EMI payments to be deducted from <input type="text" id="applicant_bank" name="applicant_bank" placeholder="Enter the Bank Name"  value="<?php if($row) { echo $fetch['applicant_bank'];  } else { echo ""; } ?>" required> bank account through ECS/PDC/NACH/CASH/ANY OTHER ONLINE TRANSFER system.<br/><br/>
									5.A total of INR <input type="text"  id="total_INR" oninput="allowonlynumeric(total_INR)" placeholder="Enter the Amount"  name="total_INR" value="<?php if($row) { echo $fetch['total_INR'];  } else { echo ""; } ?>" required> has to be serviced as interest during the duration of Loan at an IRR <input type="text" id="IRR" placeholder="Enter the IRR" name="IRR" value="<?php if($row) { echo $fetch['IRR'];  } else { echo ""; } ?>" required>.<br/><br/>
									6. ECS/PDC/NACH form to be filled and signed if applicable. <br/><br/>
									7. The repayment tenure is of <input type="text" id="Repayment_tenure" placeholder="Enter No. of Months" oninput="allowonlynumeric(Repayment_tenure)" name="Repayment_tenure" value="<?php if($row) { echo $fetch['Repayment_tenure'];  } else { echo ""; } ?>" required> months.<br/><br/>
									
                                    </td></tr>
									<tr style="height:20px"  ></tr>
								    <tr><td>
									Add Second Email To :
									
								
									
									<?php 
									
									$query="select username from login_details where role='Partner' or role='Field Officer' or role='Service Officer' or role='Service Manager'";

									$record=mysql_query($query);

									$option="";

									while($row1 = @mysql_fetch_assoc($record))

									{

										$username=$row1["username"];

										$option.="<OPTION  id='employemail' name='employemail' VALUE=\"$username\">".$username;

									}
									

                                   ?>
			      <select id="secondmail" name="secondmail"><option value="">Select</option><?php echo $option; ?></select>

									
									
									</select>
									</td>
				
				
								</tr>
                                                        
                                                                 
								
									
									
									
                                   
								   <tr align="center"><td  height="20"></td></tr>
								    <tr>
									<td align="center">
										
										<input type="button" class="submit" value="Preview Sanction Mail" onclick="submitsanctionDetails()" >
									  </td>
									
									
									</tr>
									
									<tr><td height="80"></td></tr>

                                    </table>
									

  
	
	 <div id="myModal" class="modal" role="dialog" >
  <div class="modal-dialog" style="background-color:black">
    <!-- Modal content-->
    <div class="modal-content" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sanction Mail Preview</h4>
      </div>
     <div class="modal-body" >
	  <div align="Left">
	 
	<table align="center" id="popup">
							
									</table>
				
		   
				
		   
	 
	  </div><br/>
	  

		   
		   
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
			</form></table>
							
	

	
	<?php include('./common/bootstrap_commonFooter.php');?>
	
	