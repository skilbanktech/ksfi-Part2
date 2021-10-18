<?php

include('./connection.php');

$reference_id=$_POST['reference_id'];

$Product=$_POST['Product'];
$Product_cost=$_POST['Product_cost'];
$margin_money=$_POST['margin_money'];
$loanamount=$_POST['loanamount'];
$Tranche_number=$_POST['Tranche_number'];
$disbursed_amount=$_POST['disbursed_amount'];
$purpose=$_POST['purpose'];
$TypeOfProduct=$_POST['TypeOfProduct'];
$MakeOfProduct=$_POST['MakeOfProduct'];
$ModelOfProduct=$_POST['ModelOfProduct'];
$Loan_tenure=$_POST['Loan_tenure'];
$Product_requested=$_POST['Product_requested'];

$GracePeriod=$_POST['GracePeriod'];
$Moratorium_period=$_POST['Moratorium_period'];
$Subventionamount=$_POST['Subventionamount'];
$EMIAmount=$_POST['EMIAmount'];
$AdvanceEMIpaid=$_POST['AdvanceEMIpaid'];
$EMIamount_INR=$_POST['EMIamount_INR'];
$Partner_loanAmount=$_POST['Partner_loanAmount'];
$InterestPayment=$_POST['InterestPayment'];
$InterestPaymentDate=$_POST['InterestPaymentDate'];
$EMIAmount=$_POST['EMIAmount'];
$EMIDate=$_POST['EMIDate'];
$Advance_EMI_months=$_POST['Advance_EMI_months'];
$Advance_EMI_INR=$_POST['Advance_EMI_INR'];
$Entity_name=$_POST['Entity_name'];
$deductionOfInterest=$_POST['deductionOfInterest'];
$ModeOfpayment=$_POST['ModeOfpayment'];

$select_query="select * from   product_details where reference_id='$reference_id'";

$res= mysql_query($select_query);

$count=mysql_num_rows($res);

if($count==0)
{

       $sql="INSERT Into product_details (reference_id,Product, Product_cost, margin_money, loanamount, Tranche_number, disbursed_amount, purpose, TypeOfProduct, MakeOfProduct, ModelOfProduct, Loan_tenure, Product_requested, GracePeriod, Moratorium_period, Subventionamount, EMIAmount, AdvanceEMIpaid, EMIamount_INR, Partner_loanAmount, InterestPayment, InterestPaymentDate, EMIDate, Advance_EMI_months, Advance_EMI_INR, Entity_name, deductionOfInterest, ModeOfpayment,created) VALUES ('$reference_id','$Product', '$Product_cost', '$margin_money', '$loanamount', '$Tranche_number', '$disbursed_amount', '$purpose', '$TypeOfProduct', '$MakeOfProduct', '$ModelOfProduct', '$Loan_tenure', '$Product_requested', '$GracePeriod', '$Moratorium_period', '$Subventionamount', '$EMIAmount', '$AdvanceEMIpaid', '$EMIamount_INR', '$Partner_loanAmount', '$InterestPayment', '$InterestPaymentDate', '$EMIDate', '$Advance_EMI_months', '$Advance_EMI_INR', '$Entity_name', '$deductionOfInterest', '$ModeOfpayment',NOW())";

}

else
	
	{
		$sql="update product_details set Product='$Product',Product_cost='$Product_cost', margin_money='$margin_money', loanamount='$loanamount', Tranche_number='$Tranche_number', disbursed_amount='$disbursed_amount', purpose='$purpose', TypeOfProduct='$TypeOfProduct', MakeOfProduct='$MakeOfProduct', ModelOfProduct='$ModelOfProduct', Loan_tenure='$Loan_tenure', Product_requested='$Product_requested', GracePeriod='$GracePeriod', Moratorium_period='$Moratorium_period', Subventionamount='$Subventionamount', EMIAmount='$EMIAmount', AdvanceEMIpaid='$AdvanceEMIpaid', EMIamount_INR='$EMIamount_INR', Partner_loanAmount='$Partner_loanAmount', InterestPayment='$InterestPayment', InterestPaymentDate='$InterestPaymentDate', EMIDate='$EMIDate', Advance_EMI_months='$Advance_EMI_months', Advance_EMI_INR='$Advance_EMI_INR', Entity_name='$Entity_name', deductionOfInterest='$deductionOfInterest', ModeOfpayment='$ModeOfpayment',updated=Now()  where reference_id='$reference_id'"; 
		
		
	}
		//echo $sql;

		$result=mysql_query($sql);

         header('Location:./send_loanAgreement.php?id='.$reference_id);

          exit();







?>