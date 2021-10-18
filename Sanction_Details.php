<?php require_once("../common/comHeader.php"); ?>
<?php
ob_start();
session_start();
include('../common/connection.php');
//$reference_id=$_POST['myradio'];
//$_SESSION['ReferenceId']=$reference_id;
//$selectsanctionquery ="select ReferenceId,SanctionId,SanctionAmount,SanctionDate,SanctionBy,AmortId,ProposedPayment,Sanction from SanctionDetails where ReferenceId='".$reference_id."'";
$selectsanctionquery ="select ReferenceId,SanctionId,SanctionAmount,SanctionDate,SanctionBy,AmortId,ProposedPayment,Sanction from SanctionDetails where ReferenceId='1'";

$ResultsanctionforId=mysql_query($selectsanctionquery); 
$sanctionRow = mysql_fetch_row($ResultsanctionforId);
if($sanctionRow)
{
$col1= array('ReferenceId','SanctionId','SanctionAmount','SanctionDate','SanctionBy','AmortId','ProposedPayment','Sanction');
$fetchsanctioninfo = array_combine($col1,$sanctionRow);  
}

// fetch record from loandetails and radio populate
//$selectloanquery="select LoanId,Amount,LoanStatus from LoanDetails where ReferenceId='1'";
//$ResultLoanforId=mysql_query($selectloanquery);
//$LoanRow = mysql_fetch_row($ResultLoanforId);
//echo ($selectloanquery);
//while($LoanRow = @mysql_fetch_assoc($ResultLoanforId))
//{
	//print '<tr>'
	//.'<td><input type="radio" name="myradio" value="'.$LoanRow['LoanId'].'" id="'.$LoanRow ['LoanId'].'"></td>'
	//.'<td>'.$LoanRow['Amount'].'</td>'
	//.'<td>'.$LoanRow['LoanStatus'].'</td>';
	//print '</tr>';
//}
?>


<script type="text/javascript">
 $(function()
			{
			$("#txtsanctiondate").datepicker({
			changeMonth: true,
			changeYear: true,
			maxDate:new Date(),
			yearRange:"c-100:c+1",
                        dateFormat: "dd-mm-yy"             
		});
});
function ValidateSanctionDetails(theForm)
{
     reason = validateEmptyField(theForm.txtrefid,true,'Reference Id');
     reason += validateEmptyField(theForm.txtsanctionid,true,'Sanction Id');
	 reason += validateNumericOnly(theForm.txtsanctionamount,true,0,10,'Sanction Amount');
	 reason += validateEmptyField(theForm.txtsanctiondate,true,'Disbursement Date');
     reason += validateEmptyField(theForm.txtsanctionby,true,'Disbursement By');
	 reason += validateEmptyField(theForm.txtamortId,true,'Amort Details');
	 reason += validateEmptyField(theForm.txtproposedpayment,true,'Proposed Payment');
	 if (reason != "")
		  	{
			    alert("Some fields need correction:\n" + reason);
			    return false;
		  	}
			return true;	 
}
/*function Enablebutton()
{
if(rdbsanction=="Approved")
 {
	 document.Form.LoanSubmit.disabled=true;
	 document.Form.LoanModify.disabled=true;
	 document.Form.LoanView.disabled=true;
 }
else
{
	 document.Form.LoanSubmit.disabled=false;
	 document.Form.LoanModify.disabled=false;
	 document.Form.LoanModify.disabled=false;
	 
}
}*/
function EnableDisableButton(refid)
{
	rdbsanction=refid.value;
	if(rdbsanction=="Approved")
	{
        document.getElementById('LoanSubmit').style.display='none'
		document.getElementById('LoanModify').hidden=false;
		document.getElementById('LoanView').hidden=false;
    } 
    else
    {
        document.getElementById('LoanSubmit').style.display='none'
		document.getElementById('LoanModify').hidden=true;
		document.getElementById('LoanView').hidden=true;

    }
    
}
</script>

<form id="FrmSanctionDetails" method="post" enctype="multipart/form-data" autocomplete="off" onsubmit="return ValidateSanctionDetails(this);">
<table align="center" width="500" border="2">
<tr>
	<td align="center" colspan="2">
	<label id="lblformname">Appraisal Memorandum</label>
	</td>
</tr>
</table>
<br>
<table width="500" align="center" border="2">
<tr>
<td>
<label id="lblrefid">Reference Id:</label>
</td>
<td>
<input name="txtrefid" id="txtrefid" type="text" alt="" size="40" value="<?php if($sanctionRow){echo $fetchsanctioninfo['ReferenceId'];}?>">
</td>
</tr>
<tr>
	<td>
	<label id="lblsanctionid">Sanction Id:</label>
	</td>
	<td>
	<input name="txtsanctionid" type="text" size="40" alt="" value="<?php if($sanctionRow){echo $fetchsanctioninfo['SanctionId'];}?>">
	</td>
</tr>
<tr>
	<td>
	<label id="lblamount">Sanction Amount:</label>
	</td>
	<td>
	<input name="txtsanctionamount" type="text" size="40" alt="" value="<?php if($sanctionRow){echo $fetchsanctioninfo['SanctionAmount'];}?>">
	</td>
</tr>
<tr>
	<td>
	<label id="lblsanctiondate">Date Of Sanction:</label>
	</td>
	<td>
	<input name="txtsanctiondate" id="txtsanctiondate" type="text" size="40" alt="" value="<?php if($sanctionRow){echo $fetchsanctioninfo['SanctionDate'];}?>"> 
	</td>
</tr>
<tr>
	<td>
	<label id="lblsanctionby">Sanction By:</label>
	</td>
	<td>
	<input name="txtsanctionby" type="text" size="40" alt="" value="<?php if($sanctionRow){echo $fetchsanctioninfo['SanctionBy'];}?>">

	</td>
</tr>
<tr>
	<td>
	<label id="lblamortdetails">Amort Id:</label>
	</td>
	<td>
	<input name="txtamortId" type="text" readonly="readonly" size="40" alt="" value="<?php if($sanctionRow){echo $fetchsanctioninfo['AmortId'];}?>"> 
	</td>
</tr>
<tr>
	<td>
	<label id="lblproposedpayment">Proposed Payment:</label>
	</td>
	<td>
	<input name="txtproposedpayment" type="text" size="40"  alt="" value="<?php if($sanctionRow){echo $fetchsanctioninfo['ProposedPayment'];}?>">
	</td>
</tr>
<tr>
<td>
<label id="lblSanction">Sanction:</label>
</td>
<td>
<input name="rdbsanction" id="rdbapproved" type="radio" value="Approved" onclick="EnableDisableButton(this)" size="40"
            <?php if($sanctionRow)
			{
			if($fetchsanctioninfo['Sanction']=='Approved')
			{
			echo "checked='checked'"; 
			}
			}
			?>> Approved
<input name="rdbsanction" id="rdbdecline" type="radio" onclick="EnableDisableButton(this)" value="Decline" size="40"
            <?php if($sanctionRow)
			{
			if($fetchsanctioninfo['Sanction']=='Decline')
			{
			echo "checked='checked'"; 
			}
			}
			?>>Decline
</td>
</tr>
<tr>
	<td align="center" colspan="2">
	<input name="btnsubmit" type="submit" value="submit" onclick="setactionforform('Send_SanctionDetailsconnection.php','FrmSanctionDetails');">
	</td>
</tr>
</table>
<br>
<table width="100%">
    <tbody><tr><td height="20" class="heading" align="center" >

						 Loan Details</td></tr></tbody></table>
						 <table id="box-table-a" align="center" border="1" cellpadding="3" cellspacing="3" style="width: 570px; height: 24px; margin-left: 20px;">
					<thead>
					
					<tr>
						<th class="formHeader">Select</th>
						<th class="formHeader">Loan ID</th>
						<th class="formHeader">Loan Status</th>
                    </tr>
                    </thead>
                    <tr>
<td colspan="6" align="center">
<input name="LoanSubmit" id="LoanSubmit" type="submit" value="Add Loan" onclick="setactionforform('LoanDetails.php','FrmSanctionDetails');">
<input name="LoanModify" id="LoanModify" type="submit" value="Modify Loan" onclick="setactionforform('LoanDetails.php','FrmSanctionDetails');">
<input name="LoanView" id="LoanView" type="submit" value="View Loan" onclick="setactionforform('View_Loanprint.php','FrmSanctionDetails');">
</td>
</tr>
<?php
//$LoanId =$_POST['txtloanid'];
//$Amount = $_POST['txtloanamount'];
//$LoanStatus = $_POST['txtloanstatus'];
$selectloanquery="select LoanId,Amount,LoanStatus from LoanDetails where ReferenceId='1'";
//echo $selectloanquery;
$ResultLoanforId=mysql_query($selectloanquery);
//$LoanRow = mysql_fetch_row($ResultLoanforId);
while($LoanRow = @mysql_fetch_assoc($ResultLoanforId))
{
	print '<tr>'
	.'<td><input type="radio" name="myradio" value="'.$LoanRow['LoanId'].'" id="'.$LoanRow ['LoanId'].'"></td>'
	.'<td>'.$LoanRow['Amount'].'</td>'
	.'<td>'.$LoanRow['LoanStatus'].'</td>';
	print '</tr>';
}
?>
</table>
</form>
<?php require_once("../common/comFooter.php"); ?>