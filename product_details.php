<?php session_start();?>
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



<link id="KSFSkin" href="css/ksfi.css" rel="stylesheet" type="text/css">


<link type="text/css" href="css/cupertino/jquery-ui-1.8.16.custom.css" rel="stylesheet">

<script language="javascript" src="js/jquery-1.6.2.min.js" type="text/javascript"></script>

 <script language="javascript" src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
 
 <script language="javascript" src="js/contactus.js" type="text/javascript"> </script>
 <script src="js/common.js" defer></script>

 <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">--->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <style type="text/css">

 @media print {

	.noprint {
display: none;
}
 }
 label{
float:left;

}

label,a,input[type="text"]
{
    font-size:13px;
	font-family: Arial, Helvetica, sans-serif;
}
#heading { color: #111; font-family: 'Helvetica Neue', sans-serif; font-size: 275px; font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center; }

</style>
<script>
$(function()

			{

			$( "#datepicker" ).datepicker({

			changeMonth: true,

			changeYear: true,

			maxDate:new Date(),

			yearRange:"c-100:c+1",

                        dateFormat: "dd-mm-yy"

                        

	

		});

		$( "#datepicker1" ).datepicker({

			changeMonth: true,

			changeYear: true,

			maxDate:new Date(),

			yearRange:"c-100:c+1",

                        dateFormat: "dd-mm-yy"



		});

		$( "#datepicker2" ).datepicker({

			changeMonth: true,

			changeYear: true,

			minDate:new Date(),

			yearRange:"c-1:c+1",

                        dateFormat: "dd-mm-yy"

		});

		

			});
</script>

  </head>
<body>

<div align="center">


		<?php  include('./common/bootstrap_common_mainmenu.php'); 


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
			   
			   
			   
			   $select_product=mysql_query("select typeofLoan from student_details where reference_id='$id'");
			   
			   $fetchrow=mysql_fetch_array($select_product);
			   
			   $typeofLoan=$fetchrow['typeofLoan'];
			   
			   
			   
			   
        $select_query="select Product,Product_cost, margin_money, loanamount, Tranche_number, disbursed_amount, purpose, TypeOfProduct, MakeOfProduct, ModelOfProduct, Loan_tenure, Product_requested, GracePeriod, Moratorium_period, Subventionamount, EMIAmount, AdvanceEMIpaid, EMIamount_INR, Partner_loanAmount, InterestPayment, InterestPaymentDate, EMIDate, Advance_EMI_months, Advance_EMI_INR, Entity_name, deductionOfInterest, ModeOfpayment from  product_details where reference_id='$id'";


//echo $select_query;
         $result= mysql_query($select_query);

        $row= mysql_fetch_row($result);
		
		if($row)
			
		{
			$col = array('Product','Product_cost', 'margin_money', 'loanamount', 'Tranche_number', 'disbursed_amount', 'purpose', 'TypeOfProduct', 'MakeOfProduct', 'ModelOfProduct', 'Loan_tenure', 'Product_requested', 'GracePeriod', 'Moratorium_period', 'Subventionamount', 'EMIAmount', 'AdvanceEMIpaid', 'EMIamount_INR', 'Partner_loanAmount', 'InterestPayment', 'InterestPaymentDate', 'EMIDate', 'Advance_EMI_months', 'Advance_EMI_INR', 'Entity_name', 'deductionOfInterest', 'ModeOfpayment');
			
			        $fetch = array_combine($col,$row); 
					
				
			
		}






		?>
					<!-- #BeginEditable "Content" -->
					

<form id="Form" autocomplete="off" enctype="multipart/form-data" method="post" name="Form" action="Send_product_details.php"
              align="center"  onsubmit="return validateResiVerificationForm(this);" >

<div class="container">
<table  id="printTable"><!-- refer verification page -->

 
   <div class="form-group" class="heading" style="color: #111; font-family: 'Helvetica Neue', sans-serif; font-size: 20px; font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center;">Product Details</div>
   <hr>
   <br><br>
 <div class="row">
	  <div class="form-group">
     
    
    

    <div class="col-md-6">
	<label id="Label1">Reference Id</label>
   
        <input  name="reference_id" class="form-control border-input"  readonly='readonly' type="text"  value="<?php echo $id; ?>" />
   </div>
  
  <div class="col-md-6">
	<label id="Label1">Product</label>
   
        <input  name="Product" class="form-control border-input"  readonly='readonly' type="text"  value="<?php if($row) { if($fetch['Product']!='') { echo $fetch['Product']; }  } else { echo $typeofLoan; } ?>" />
   </div>
  
   </div>
   </div></br>
 
  <div class="row">
	  <div class="form-group">
        <div class="col-md-6"><label id="">Total Cost of Product/Invoice Value
</label>
    <input  name="Product_cost" id="Product_cost" class="form-control border-input" type="text" onkeypress="return isNumber(event)" value="<?php if($row) { echo  
	$fetch['Product_cost']; } ?>" required/>
	</div>
    
    

    <div class="col-md-6">
	<label id="Label1">Margin Money to be paid by borrower</label>
   
        <input  name="margin_money" class="form-control border-input" type="text" onkeypress="return isNumber(event)"  value="<?php if($row) { echo  $fetch['margin_money']; } ?>" required/>
   </div>
   </div>
   </div></br>

  <div class="row">
	  <div class="form-group">
        <div class="col-md-6"><label id="">Loan Sanctioned amount in INR
</label>
    <input  name="loanamount" class="form-control border-input" readonly="readonly" type="text" onkeypress="return isNumber(event)"  value="<?php if($row) { echo  $fetch['loanamount']; } ?>" required/>
	</div>
    
    

    <div class="col-md-6">
	<label id="Label1">Tranche number of the current disbursement
</label>
   
        <input  name="Tranche_number" class="form-control border-input" type="text"  value="<?php if($row) { echo  $fetch['Tranche_number']; } ?>" required/>
   </div>
   </div>
   </div></br><div class="row">
	  <div class="form-group">
        <div class="col-md-6"><label id="">Total Loan amount disbursed
</label>
    <input  name="disbursed_amount" class="form-control border-input" type="text"  onkeypress="return isNumber(event)" value="<?php if($row) { echo  $fetch['disbursed_amount']; } ?>" required/>
	</div>
    
    

    <div class="col-md-6">
	<label id="Label1">Purpose(s) for which loan is disbursed</label>
   
        <input  name="purpose" class="form-control border-input" type="text"  value="<?php if($row) { echo  $fetch['purpose']; } ?>" required/>
   </div>
   </div>
   </div></br><div class="row">
	  <div class="form-group">
        <div class="col-md-6"><label id="">Type of Product/Machine/Vehicle/Scheme or Items financed by this loan
</label>
    <input  name="TypeOfProduct" class="form-control border-input" type="text"  value="<?php if($row) { echo  $fetch['TypeOfProduct']; } ?>" required/>
	
	
	</div>
    
    

    <div class="col-md-6">
	<label id="Label1">Make of Product/Machine/Vehicle/Scheme or Items financed by this loan</label>
   
        <input  name="MakeOfProduct" class="form-control border-input" type="text"  value="<?php if($row) { echo  $fetch['MakeOfProduct']; } ?>" required/>
   </div>
   </div>
   </div></br><div class="row">
	  <div class="form-group">
        <div class="col-md-6"><label id="">Model of Product/Machine/Vehicle/Scheme or Items financed by this loan
</label>
    <input  name="ModelOfProduct" class="form-control border-input" type="text"  value="<?php if($row) { echo  $fetch['ModelOfProduct']; } ?>" required/>
	</div>
    
    

    <div class="col-md-6">
	<label id="Label1">Total Loan tenure in months</label>
   
        <input  name="Loan_tenure" class="form-control border-input" type="text" onkeypress="return isNumber(event)"  value="<?php if($row) { echo  $fetch['Loan_tenure']; } ?>" required/>
   </div>
   </div>
   </div></br><div class="row">
	  <div class="form-group">
        <div class="col-md-6"><label id="">Product requested 
</label>
    
	
	<select   class="form-control border-input"    name="Product_requested"  size="1" required>
       <option  Value="Flexi" <?php if($row){
            if($fetch['Product_requested'] == 'Flexi')
            {        echo "selected='selected'";      }} else { echo "selected='selected'";  } 	?> >Flexi</option>         
    <option Value="Advance EMI" <?php if($row){
            if($fetch['Product_requested'] == 'Advance EMI')
            {        echo "selected='selected'";      }}	?> >Advance EMI</option>
    <option  Value="Standard" <?php if($row){
            if($fetch['Product_requested'] == 'Standard')
            {        echo "selected='selected'";      }}	?> >Standard</option>
		<option Value="EMI" <?php if($row){
            if($fetch['Product_requested'] == 'EMI')
            {        echo "selected='selected'";      }}	?> >EMI</option>
   
		<option  Value="Step-up" <?php if($row){
            if($fetch['Product_requested'] == 'Step-up')
            {        echo "selected='selected'";      }}	?> >Step-up</option>
		</select>
	</div>
    
    

    <div class="col-md-6">
	<label id="Label1">Grace Period in months</label>
   
        <input  name="GracePeriod" class="form-control border-input" type="text" onkeypress="return isNumber(event)" value="<?php if($row) { echo  $fetch['GracePeriod']; } ?>" required/>
   </div>
   </div>
   </div></br>
   <div class="row">
	  <div class="form-group">
      <div class="col-md-6">
	<label id="Label1">Principal Moratorium period in number of months</label>
   
        <input  name="Moratorium_period" class="form-control border-input" type="text"  onkeypress="return isNumber(event)"  value="<?php if($row) { echo  $fetch['Moratorium_period']; } ?>" required/>
   </div>
   <div class="col-md-6">
	<label id="Label1">Subvention amount from the Vendor/Partner in INR</label>
   
        <input  name="Subventionamount" class="form-control border-input" type="text"  onkeypress="return isNumber(event)" value="<?php if($row) { echo  $fetch['Subventionamount']; } ?>" required/>
   </div>
   </div>
   </div></br>
   <div class="row">
	  <div class="form-group">
        <div class="col-md-6"><label id="">EMI Amount in INR
</label>
    <input  name="EMIAmount" class="form-control border-input" type="text"  onkeypress="return isNumber(event)" value="<?php if($row) { echo  $fetch['EMIAmount']; } ?>" required/>
	</div>
    
    

    <div class="col-md-6">
	<label id="Label1">Advance EMI paid for in months(for loans where EMI is paid in advance)</label>
   
        <input  name="AdvanceEMIpaid" class="form-control border-input" type="text"  onkeypress="return isNumber(event)" value="<?php if($row) { echo  $fetch['AdvanceEMIpaid']; } ?>" required/>
   </div>
   </div>
   </div></br>
   <div class="row">
	  <div class="form-group">
        <div class="col-md-6"><label id="">Advance EMI amount in INR(for loans where EMI is paid in advance)
</label>
    <input  name="EMIamount_INR" class="form-control border-input" type="text" onkeypress="return isNumber(event)"  value="<?php if($row) { echo  $fetch['EMIamount_INR']; } ?>" required/>
	</div>
    
    

    <div class="col-md-6">
	<label id="Label1">Subvention % from the Vendor/Partner of the loan amount</label>
   
        <input  name="Partner_loanAmount" class="form-control border-input" type="text" onkeypress="return isNumber(event)"  value="<?php if($row) { echo  $fetch['Partner_loanAmount']; } ?>" required/>
   </div>
   </div>
   </div></br>
  
   <div class="row">
	  <div class="form-group">
        <div class="col-md-6"><label id="">Interest Payment amount( for Principal Moratorium Loans) in INR
</label>
    <input  name="InterestPayment" class="form-control border-input" type="text" onkeypress="return isNumber(event)"  value="<?php if($row) { echo  $fetch['InterestPayment']; } ?>" required/>
	</div>
    
    

    <div class="col-md-6">
	<label id="Label1">Interest Payment start date( for Principal Moratorium Loans)</label>
   
        <input  name="InterestPaymentDate" id="datepicker" class="form-control border-input" type="text"  value="<?php if($row) { echo  $fetch['InterestPaymentDate']; } ?>" required/>
   </div>
   </div>
   </div></br>
   <div class="row">
	  <div class="form-group">
        <div class="col-md-6"><label id="">Principal and Interest payment (both combined) i.e. EMI amount
</label>
    <input  name="EMIAmount" class="form-control border-input" type="text"  onkeypress="return isNumber(event)" value="<?php if($row) { echo  $fetch['EMIAmount']; } ?>" required/>
	</div>
    
    

    <div class="col-md-6">
	<label id="Label1">Principal and Interest payment i.e. EMI start date
</label>
   
        <input  name="EMIDate" class="form-control border-input" id="datepicker1" type="text"  value="<?php if($row) { echo  $fetch['EMIDate']; } ?>" required/>
   </div>
   </div>
   </div></br>
   <div class="row">
	  <div class="form-group">
        <div class="col-md-6"><label id="">Equated monthly Principal payment (Advance EMI products) in months
</label>
    <input  name="Advance_EMI_months" class="form-control border-input" type="text" onkeypress="return isNumber(event)"  value="<?php if($row) { echo  $fetch['Advance_EMI_months']; } ?>" required/>
	</div>
    
    

    <div class="col-md-6">
	<label id="Label1">Equated monthly Principal payment (Advance EMI products) in INR</label>
   
        <input  name="Advance_EMI_INR" class="form-control border-input" type="text"  onkeypress="return isNumber(event)" value="<?php if($row) { echo  $fetch['Advance_EMI_INR']; } ?>" required/>
   </div>
   </div>
   </div></br>
   <div class="row">
	  <div class="form-group">
        <div class="col-md-6"><label id="">Entity name for disbursement of funds on behalf of the borrower(s)
</label>
    <input  name="Entity_name" class="form-control border-input" type="text"  value="<?php if($row) { echo  $fetch['Entity_name']; } ?>" required/>
	</div>
    
    

    <div class="col-md-6">
	<label id="Label1">Disbursement amount to the entity on behalf of borrower after deduction of interest and subvention</label>
   
        <input  name="deductionOfInterest" class="form-control border-input" type="text"  onkeypress="return isNumber(event)" value="<?php if($row) { echo  $fetch['deductionOfInterest']; } ?>" required/>
   </div>
   </div>
   </div></br>
   <div class="row">
	  <div class="form-group">
        <div class="col-md-6"><label id="">Mode of payment 

</label>
   
	<select   class="form-control border-input"    name="ModeOfpayment"  size="1" required>
                <option value="">Select</option>
    <option Value="NACH" <?php if($row){
            if($fetch['ModeOfpayment'] == 'NACH')
            {        echo "selected='selected'";      }}	?> >NACH</option>
    <option  Value="ECS" <?php if($row){
            if($fetch['ModeOfpayment'] == 'ECS')
            {        echo "selected='selected'";      }}	?> >ECS</option>
		<option Value="DDM" <?php if($row){
            if($fetch['ModeOfpayment'] == 'DDM')
            {        echo "selected='selected'";      }}	?> >DDM</option>
    <option  Value="SI" <?php if($row){
            if($fetch['ModeOfpayment'] == 'SI')
            {        echo "selected='selected'";      }}	?> >SI</option>
		<option  Value="PDC" <?php if($row){
            if($fetch['ModeOfpayment'] == 'PDC')
            {        echo "selected='selected'";      }}	?> >PDC's</option>
		<option  Value="CASH" <?php if($row){
            if($fetch['ModeOfpayment'] == 'CASH')
            {        echo "selected='selected'";      }}	?> >CASH</option>
		<option  Value="NEFT" <?php if($row){
            if($fetch['ModeOfpayment'] == 'NEFT')
            {        echo "selected='selected'";      }}	?> >NEFT</option>
		<option  Value="IMPS" <?php if($row){
            if($fetch['ModeOfpayment'] == 'IMPS')
            {        echo "selected='selected'";      }}	?> >IMPS</option>
		<option  Value="MMT" <?php if($row){
            if($fetch['ModeOfpayment'] == 'MMT')
            {        echo "selected='selected'";      }}	?> >MMT</option>
		<option  Value="BHIM" <?php if($row){
            if($fetch['ModeOfpayment'] == 'BHIM')
            {        echo "selected='selected'";      }}	?> >BHIM</option>
		<option  Value="UPI" <?php if($row){
            if($fetch['ModeOfpayment'] == 'UPI')
            {        echo "selected='selected'";      }}	?> >UPI</option>
		</select>
	</div></div>
    
   </div>
   
   </div></br>
   <div class="row">
	  <div class="form-group">
        <div class="col-md-12">
    <input  name="submit"  type="submit"  value="submit" />
	</div></div>
    
   </div>
   
   </div></br>
   </table>
   
   </form>
   </div>
   </div>
   </div>
   <?php include('./common/bootstrap_commonFooter.php');?>

	
	
   