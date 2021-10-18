<?php session_start();?>



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
<script language="javascript" src="js/copy_state.js" type="text/javascript"> </script>
<script language="javascript" src="js/loanApplication.js" type="text/javascript">
 </script>
<script language="javascript" src="js/jquery-1.6.2.min.js" type="text/javascript">
 </script>
 <script language="javascript" src="js/common.js" type="text/javascript">
 </script>
<script language="javascript" src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript">
 </script>


<script type="text/javascript">
			$(function()
			{
			$( "#datepicker1" ).datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange:"c-10:c+10"
		    });			
			});
</script>

<script type="text/javascript"> 
        $(function () { 
            $('input:radio[id$=AppStep1]').click(function () { 
                if (this.checked) { 
                    $('div[id$=Applicantpanel]').show('slow'); 
                } 
                else { 
                    $('div[id$=Applicantpanel]').hide('slow'); 
                } 
            });   
        }); 
     
    </script> 
    

<style type="text/css">
.auto-style2 {
	background-image: url('js/images/rtoutline.jpg');
}
.auto-style3 {
	margin-left: 2px;
	margin-bottom: 2px;
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

<body id="Body">

<noscript></noscript>
<div align="center">
	<form id="Form" autocomplete="off" enctype="multipart/form-data" method="post" name="Form" onsubmit="return validatePDCCheckDetailForm(this)" style="height: 100%;">
			<?php include('./common/common_mainmenu.php'); ?>
			<!-- #BeginEditable "Content" -->
			
					<!-- #BeginEditable "Content" -->
					<?php					
					//database connection
	include('./connection.php');
    
     if(($_SESSION['usertype'] == 'Employee') || ($_SESSION['usertype'] == 'Partner'))
            {
            $reference_id=$_POST['no'];
            //$email=$_POST[''];
            }
            else 
            {
            $reference_id=$_POST['no'];
            $email = $_SESSION['email'];
            }

    $id=$_POST['myradio'];
    
	$select_query = "select * from pdcheck_details where check_id= '$id'";
	$select_record=mysql_query($select_query); 
	//or die(mysql_error());
	

	$row= mysql_fetch_row($select_record);
        
	if($row){   
	$col = array('check_id','reference_id','amount','checkno','bankname','branchname','ifsccode','branchaddress','presentationdate','presentationstatus','cashdepositedby','docname','paymentype','bouncedreasons','depositorname','accountno');
	$fetch = array_combine($col,$row); 
	}
            
 ?> 
  <?php 
					if($_SESSION['usertype'] == 'student'){ ?>

					<table border="0" cellpadding="0" cellspacing="0" width="978">
						<tr height="15px" class="verticalmenu" >
							 <td align="center" >
									<a style="font-size:12px;font-weight:bold" href="downloadapplication.php">Download Application</a></td>
                                                         <td align="center">
									<a style="font-size:12px;font-weight:bold" href="EditApplication.php">My Application</a></td>
									<td align="center">
									<a style="font-size:12px;font-weight:bold" href="DocumentUpload.php">Document Center</a></td>
									<td align="center" >
									<?php  if ($_SESSION['row_count'] <= 1) { ?>
											<a style="font-size:12px;font-weight:bold" href="ApplicationStatus.php">My Application Status</a>											
                                                                                            <?php }else {  ?>
											<a style="font-size:12px;font-weight:bold" href="searchStatus.php">My Application Status</a><?php }?>
									</td>
									<td align="center">
									<a style="font-size:12px;font-weight:bold" href="changePassword.php">Change Password</a>
							</td>
						</tr>
					</table>
<?php } ?>
					<table align="center">
					<tr><td height="20" colspan="2"></td></tr>
								<tr>
									<td class="heading" colspan="2"> 
									PDC Payment Detail</td>
								</tr>
                                <tr><td height="10">Reference ID</td>
								<td height="10"><input id="refid" name="refid" size="20" type="text" readonly="readonly"
                                                               value="<?php echo $reference_id; ?>">
                                                               </td></tr>
                                                               <tr><td height="10">
																   Monthly 
																   Payment</td>
								<td height="10"><input maxlength="6" name="amount" id="amount" type="text"  disabled="disabled"
								value="<?php if($row) { echo $fetch['amount']; } ?>"></td></tr>
								
								<tr><td style="height: 10px">Payment Type</td>
								<td style="height: 10px"><select id="payType" name="payType" size="1" onchange="return onSelectedIndexChangeCheque(this,'CashDepositedBy','checkNo','ifsccode','file')" disabled="disabled">
							<option>Select</option>
							<option <?php if($row){
								if($fetch['paymentype'] == 'Cheque')
								{        echo "selected='selected'";      }	}										     
								 ?> >Cheque</option>
                            <option <?php if($row){
								if($fetch['paymentype'] == 'ECS')
								{        echo "selected='selected'";      }	}										     
								 ?> >ECS</option>
                            <option <?php if($row){
								if($fetch['paymentype'] == 'DDM')
								{        echo "selected='selected'";      }	}										     
								 ?> >DDM</option>
                             <option <?php if($row){
								if($fetch['paymentype'] == 'SI')
								{        echo "selected='selected'";      }	}										     
								 ?> >SI</option>
                             <option <?php if($row){
								if($fetch['paymentype'] == 'Cash')
								{        echo "selected='selected'";      }	}										     
								 ?> >Cash</option>

							</select></td></tr>

								<tr><td class="servicesText">Cheque/Referenced No.</td>
									<td class="servicesText">
									<input maxlength="8" name="checkNo" id="checkNo" type="text"
									value="<?php if($row) { echo $fetch['checkno']; } ?>" disabled="disabled"></td></tr>
									<tr><td style="height: 17px; width: 139px;">Account No.</td><td style="height: 17px">
								<input maxlength="18" name="accountNo" id="accountNo" type="text" disabled="disabled"
								value="<?php if($row) { echo $fetch['accountno']; } ?>"	></td></tr>

								<tr><td style="height: 17px">
									Bank Name</td><td style="height: 17px">
									<input maxlength="50" name="bankname" id="bankname" type="text"
									value="<?php if($row) { echo $fetch['bankname']; } ?>" disabled="disabled"></td></tr>
								<tr><td>
									Branch Name</td><td>
									<input maxlength="50" name="branchname" id="branchname" type="text"
									value="<?php if($row) { echo $fetch['branchname']; } ?>" disabled="disabled"></td></tr>
									<tr><td>
									Branch Location</td><td>
									<input maxlength="100" name="branchadd" id="branchadd" type="text"
									value="<?php if($row) { echo $fetch['branchaddress']; } ?>" disabled="disabled"></td></tr>
								<tr><td>
									IFSC Code</td><td>
									<input maxlength="18" name="ifsccode" id="ifsccode" type="text"
									value="<?php if($row) { echo $fetch['ifsccode']; } ?>" disabled="disabled"></td></tr>
								
								<tr><td style="height: 26px">
									Presentation/Deposited Date</td>
									<td style="height: 26px">
									<input id="datepicker1" name="datepicker1" size="40" type="text" disabled="disabled"
                                                               value="<?php if($row) { 
                                                                   $originaldate= $fetch['presentationdate'];
                                                               
                                                             $newdate=date("d-m-Y",strtotime($originaldate));
                                                             echo "$newdate";
                                                               
                                                               } ?>">							    </td></tr>
								<tr><td>
									Presentation Status</td><td>
									<select id="PresentationStatus" name="PresentationStatus" size="1" 
									onchange="return onPresentationStatusChanged(this,'bouncedreasons')" disabled="disabled">
									<option>Select</option>
							<option <?php if($row){
								if($fetch['presentationstatus'] == 'To be Presented')
								{        echo "selected='selected'";      }	}										     
								 ?> >To be Presented</option>
                            <option <?php if($row){
								if($fetch['presentationstatus'] == 'Awaited')
								{        echo "selected='selected'";      }	}										     
								 ?> >Awaited</option>
                            <option <?php if($row){
								if($fetch['presentationstatus'] == 'Cleared')
								{        echo "selected='selected'";      }	}										     
								 ?> >Cleared</option>
                             <option <?php if($row){
								if($fetch['presentationstatus'] == 'Bounced')
								{        echo "selected='selected'";      }	}										     
								 ?> >Bounced</option>
							</select></td></tr>
								<tr><td>
									 Bounced Reasons</td><td>
							<select id="bouncedreasons" name="bouncedreasons" size="1" disabled="disabled">
							<option>Select</option>
							<option <?php if($row){
								if($fetch['bouncedreasons'] == 'Signature Mismatch')
								{        echo "selected='selected'";      }	}										     
								 ?> >Signature Mismatch</option>
                            <option <?php if($row){
								if($fetch['bouncedreasons'] == 'account Closed')
								{        echo "selected='selected'";      }	}										     
								 ?> >account Closed</option>
                            <option <?php if($row){
								if($fetch['bouncedreasons'] == 'Cheque MultiDated')
								{        echo "selected='selected'";      }	}										     
								 ?> >Cheque MultiDated</option>
                             <option <?php if($row){
								if($fetch['bouncedreasons'] == 'Wrong Cheque Details')
								{        echo "selected='selected'";      }	}										     
								 ?> >Wrong Cheque Details</option>
                             <option <?php if($row){
								if($fetch['bouncedreasons'] == 'Not Counter Signed')
								{        echo "selected='selected'";      }	}										     
								 ?> >Not Counter Signed</option>
                             <option <?php if($row){
								if($fetch['bouncedreasons'] == 'InSufficient Funds')
								{        echo "selected='selected'";      }	}										     
								 ?> >InSufficient Funds</option>
								 							</select>
</td></tr>
<tr><td>
									<label id="lblCashDeposited" disabled="disabled">Cash Deposited By</label></td><td>
									<select id="CashDepositedBy" name="CashDepositedBy" size="1" disabled="disabled"
									onchange="return onCashDepositedByChanged(this,'Depositorname')">
									<option>Select</option>
							<option <?php if($row){
								if($fetch['cashdepositedby'] == 'Employee')
								{        echo "selected='selected'";      }	}										     
								 ?> >Employee</option>
                            <option <?php if($row){
								if($fetch['cashdepositedby'] == 'Partner ')
								{        echo "selected='selected'";      }	}										     
								 ?> >Partner</option>
                            <option <?php if($row){
								if($fetch['cashdepositedby'] == 'Depositor')
								{        echo "selected='selected'";      }	}										     
								 ?> >Depositor</option>
  							</select></td></tr>
  							<tr><td>Depositor name</td><td>
									<input maxlength="50" name="Depositorname" id="Depositorname" type="text" disabled="disabled"></td></tr>

								<tr><td colspan="2">
									<div class="heading">Uploaded  Document</div>
							<table id="box-table-a" class="auto-style4" style="width: 938px">
									<thead>
									<tr>
									 <th  width="700px">Document Name</th>
                                     </tr>							
									<?php
								echo "<td>"; 
		if ($row) {
	      print '<tr>'
           .'<td><a href="'.$reference_id.'/'.$fetch['docname'] .'">'.$fetch['docname'].'</td>'  
        .'</tr>';
        }	
        ?>			
										</thead>
									</table>
</td></tr>
								<tr><td>
									&nbsp;</td><td>
									&nbsp;</td></tr>
								<tr><td height="10" colspan="2"></td></tr>
								<tr>
									<td align="center" colspan="2">
									<input name="submit" type="submit" value="Submit" disabled="disabled" >
                                                                        <?php if(($_SESSION['usertype'] == 'Employee') || ($_SESSION['usertype'] == 'Partner')){ ?>
                                                                        <input name="btnBack" type="button" value="Back" onclick="history.back(-1)"> <?php } ?></td>
								</tr>
								<tr><td height="10" colspan="2"></td>
                                                                </tr>
                                                                <tr><td colspan="2">
                                  <input type="hidden" name="no" value="<?php echo $_POST['myradio']; ?>">                                                                    </td></tr>
							</table>
							
									<div id="pageNavPosition" align="center"> </div>

					<!-- #EndEditable -->
					<table border="0" cellpadding="0" cellspacing="0" width="978">
						<tr>
							<td class="line" colspan="2" height="1">
							<img alt="" height="1" src="js/images/pixel.gif" width="1"></td>
						</tr>
						<tr class="bgfooter">
							<td colspan="1" height="25" width="22">
							<img alt="" height="1" src="js/images/pixel.gif" width="22"></td>
							<td id="dnn_BottomPane" align="left" class="footer" nowrap="nowrap">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td align="left" class="normal">
									<a class="Normal" href="disclaimer.html" target="_self">
									Disclaimer</a>&nbsp;&nbsp; |&nbsp;&nbsp;
									<a class="Normal" href="privacypolicy.html" target="_self">
									Privacy Policy</a></td>
								</tr>
							</table>
							</td>
						</tr>
						<tr>
							<td class="line" colspan="2" height="1">
							<img alt="" height="1" src="js/images/pixel.gif" width="1"></td>
						</tr>
					</table>
					
					<table border="0" cellpadding="0" cellspacing="0" width="978">
						<tr>
							<td height="20px" width="27px"></td>
							<td align="left" class="footer">
							<div class="skinfooter"> Copyright &copy; 2011 KSFi Pvt Ltd.</div>
							</td>
						</tr>
					</table>
					</td>
					<td background="js/images/rtoutline.jpg" class="rtbgborder" width="12px">
					</td>
				</tr>
			</table>
		</div>
	</form>
</div>
<script type="text/javascript"><!--
    var pager = new Pager('box-table-a',10); 
    pager.init(); 
    pager.showPageNav('pager', 'pageNavPosition'); 
    pager.showPage(1);
//--></script>

</body>

<!-- #EndTemplate -->

</html>
