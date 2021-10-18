<?php require_once("../common/comHeader.php"); ?>
<?php
include('../common/connection.php');
$selectloanquery ="select ReferenceId,SanctionId,LoanId,Amount,DisbursementDate,DisbursedBy,AmortType,ProposedPayment,LoanStatus from LoanDetails where ReferenceId='4'";
$ResultloanforId=mysql_query($selectloanquery ); 
$loanRow = mysql_fetch_row($ResultloanforId);
if($loanRow)
{
$col1= array('ReferenceId','SanctionId','LoanId','Amount','DisbursementDate','DisbursedBy','AmortType','ProposedPayment','LoanStatus');
$fetchloaninfo = array_combine($col1,$loanRow);  
}
?>

<script type="text/javascript">
 $(function()
			{
			$("#txtdisdate").datepicker({
			changeMonth: true,
			changeYear: true,
			maxDate:new Date(),
			yearRange:"c-100:c+1",
                        dateFormat: "dd-mm-yy"             
		});
});
function ValidateloanDetails(theForm)
{
     reason = validateEmptyField(theForm.txtrefid,true,'Reference Id');
     reason += validateEmptyField(theForm.txtsanctionid,true,'Sanction Id');
     reason += validateEmptyField(theForm.txtloanid,true,'Loan Id');
	 reason += validateNumericOnly(theForm.txtloanamount,true,0,10,'Loan Amount');
	 reason = validateEmptyField(theForm.txtdisdate,true,'Disbursement Date');
     reason += validateEmptyField(theForm.txtdisburseby,true,'Disbursement By');
	 reason += validateEmptyField(theForm.txtloanstatus,true,'Loan Status');
	 reason += validateEmptyField(theForm.txtproposedpayment,true,'Proposed Payment');
}
</script>
<form id="LoanDetails" action="Send_Loandetails.php" method="post" onsubmit="return ValidateloanDetails(this);">
<table align="center" width="500" border="2">
<tr>
	<td align="center" colspan="2">
	<label id="lblformname">Loan Details</label>
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
<input name="txtrefid" id="txtrefid" type="text" alt="" size="40" value="<?php if($loanRow){echo $fetchloaninfo['ReferenceId'];}?>"></td>
</tr>
<tr>
<td>
<label id="lblsanctionid">Sanction Id:</label>
</td>
<td>
<input name="txtsanctionid" id="txtsanctionid" type="text" alt="" size="40" value="<?php if($loanRow){echo $fetchloaninfo['SanctionId'];}?>"></td>
</tr>
<tr>
	<td>
	<label id="lblloanid">Loan Id:</label>
	</td>
	<td>
	<input name="txtloanid" id="txtloanid" type="text" size="40" value="<?php if($loanRow){echo $fetchloaninfo['LoanId'];}?>">
   </td>
</tr>
<tr>
	<td>
	<label id="lblloanamount">Loan Amount:</label>
	</td>
	<td>
	<input name="txtloanamount" id="txtloanamount" type="text" size="40" value="<?php if($loanRow){echo $fetchloaninfo['Amount'];}?>">
	</td>
</tr>
<tr>
	<td>
	<label id="lblloanamount">Disbursement Date:</label>
	</td>
	<td>
	<input name="txtdisdate" id="txtdisdate" type="text" size="40" value="<?php if($loanRow){echo $fetchloaninfo['DisbursementDate'];}?>">
	</td>
</tr>
<tr>
	<td>
	<label id="lblloanamount">Disbursed By:</label>
	</td>
	<td>
	<input name="txtdisburseby" id="txtdisburseby" type="text" size="40" value="<?php if($loanRow){echo $fetchloaninfo['DisbursedBy'];}?>">
	</td>
</tr>
<tr>
	<td>
	<label id="lblamorttype">Amort Type:</label>
	</td>
	<td>
	<input name="rdbamorttype" id="rdbamtbased" type="radio" value="AmountBased"
	 <?php if($loanRow)
			{
			if($fetchloaninfo['AmortType']=='AmountBased')
			{
			echo "checked='checked'"; 
			}
			}
			?>>AmountBased
	<input name="rdbamorttype" type="radio" id="rdbintbased" value="InterestBased"
	 <?php if($loanRow)
			{
			if($fetchloaninfo['AmortType']=='InterestBased')
			{
			echo "checked='checked'"; 
			}
			}
			?>>InterestBased
	</td>
</tr>
<tr>
	<td>
	<label id="lblproposedpayment">Proposed Payment:</label>
	</td>
	<td>
	<input name="txtproposedpayment" id="txtproposedpayment" type="text" size="40" value="<?php if($loanRow){echo $fetchloaninfo['ProposedPayment'];}?>"> 
	</td>
</tr>
<tr>
	<td>
	<label id="lblloanstatus">Loan Status:</label>
	</td>
	<td>
	<input name="txtloanstatus" id="txtloanstatus" type="text" size="40" value="<?php if($loanRow){echo $fetchloaninfo['LoanStatus'];}?>"> 
	</td>
</tr>
<tr>
	<td align="center" colspan="2">
	<input name="btnsubmit" type="submit" value="Print" onclick="javascript:window.print();">
	</td>
</tr>
</table>
</form>

<?php require_once("../common/comFooter.php"); ?>