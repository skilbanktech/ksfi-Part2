<?php

include('./connection.php');

if(isset($_GET['id']))
 {
	 $id= $_GET['id'];
				 
}


include('common/class_Common.php');



$objCommon=new Common();




			   
			  
			   
        $select_query="select Product,Product_cost, margin_money, loanamount, Tranche_number, disbursed_amount, purpose, TypeOfProduct, MakeOfProduct, ModelOfProduct, Loan_tenure, Product_requested, GracePeriod, Moratorium_period, Subventionamount, EMIAmount, AdvanceEMIpaid, EMIamount_INR, Partner_loanAmount, InterestPayment, InterestPaymentDate, EMIDate, Advance_EMI_months, Advance_EMI_INR, Entity_name, deductionOfInterest, ModeOfpayment from  product_details where reference_id='$id'";


//echo $select_query;
         $result= mysql_query($select_query);

        $row= mysql_fetch_row($result);
		
		
		if($row)
			
		{
			
		
			$col = array('Product','Product_cost', 'margin_money', 'loanamount', 'Tranche_number', 'disbursed_amount', 'purpose', 'TypeOfProduct', 'MakeOfProduct', 'ModelOfProduct', 'Loan_tenure', 'Product_requested', 'GracePeriod', 'Moratorium_period', 'Subventionamount', 'EMIAmount', 'AdvanceEMIpaid', 'EMIamount_INR', 'Partner_loanAmount', 'InterestPayment', 'InterestPaymentDate', 'EMIDate', 'Advance_EMI_months', 'Advance_EMI_INR', 'Entity_name', 'deductionOfInterest', 'ModeOfpayment');
			
			        $fetch = array_combine($col,$row); 
					$Product=$fetch['Product'];
					$Product_cost=$fetch['Product_cost'];
					$margin_money=$fetch['margin_money'];
					$loanamount=$fetch['loanamount'];
					$Tranche_number=$fetch['Tranche_number'];
					$disbursed_amount=$fetch['disbursed_amount'];
					$purpose=$fetch['purpose'];
					$TypeOfProduct=$fetch['TypeOfProduct'];
					$MakeOfProduct=$fetch['MakeOfProduct'];
					$ModelOfProduct=$fetch['ModelOfProduct'];
					$Loan_tenure=$fetch['Loan_tenure'];
					$Product_requested=$fetch['Product_requested'];

					$GracePeriod=$fetch['GracePeriod'];
					$Moratorium_period=$fetch['Moratorium_period'];
					$Subventionamount=$fetch['Subventionamount'];
					$EMIAmount=$fetch['EMIAmount'];
					$AdvanceEMIpaid=$fetch['AdvanceEMIpaid'];
					$EMIamount_INR=$fetch['EMIamount_INR'];
					$Partner_loanAmount=$fetch['Partner_loanAmount'];
					$InterestPayment=$fetch['InterestPayment'];
					$InterestPaymentDate=$fetch['InterestPaymentDate'];
					$EMIAmount=$fetch['EMIAmount'];
					$EMIDate=$fetch['EMIDate'];
					$Advance_EMI_months=$fetch['Advance_EMI_months'];
					$Advance_EMI_INR=$fetch['Advance_EMI_INR'];
					$Entity_name=$fetch['Entity_name'];
					$deductionOfInterest=$fetch['deductionOfInterest'];
					$ModeOfpayment=$fetch['ModeOfpayment'];
			 
		}




 $fname = $objCommon->checkRecordexists('firstname','student_details','reference_id',$id);
 $mname = $objCommon->checkRecordexists('middlename','student_details','reference_id',$id);
 $lname = $objCommon->checkRecordexists('lastname','student_details','reference_id',$id);
 $city = $objCommon->checkRecordexists('city','student_details','reference_id',$id);
 $appdate = $objCommon->checkRecordexists('app_date','student_details','reference_id',$id);
 $address = $objCommon->checkRecordexists('address','student_details','reference_id',$id);
 $state = $objCommon->checkRecordexists('state','student_details','reference_id',$id);
 $district = $objCommon->checkRecordexists('district','student_details','reference_id',$id);


 $timestamp = strtotime($appdate);

 $app_date = date('j.n.Y', $timestamp); // d.m.YYYY
 $time = date('H:i', $timestamp); // HH:ss
 
 $cfname = $objCommon->checkRecordexists('cfirstname','coapplicant_details','reference_id',$id,'coborrowerid','1');
 $cmname = $objCommon->checkRecordexists('cmiddlename','coapplicant_details','reference_id',$id,'coborrowerid','1');
 $clname = $objCommon->checkRecordexists('clastname','coapplicant_details','reference_id',$id,'coborrowerid','1');
 $caddress = $objCommon->checkRecordexists('caddress','coapplicant_details','reference_id',$id,'coborrowerid','1');
 
 $cofname = $objCommon->checkRecordexists('cfirstname','coapplicant_details','reference_id',$id,'coborrowerid','2');
 $comname = $objCommon->checkRecordexists('cmiddlename','coapplicant_details','reference_id',$id,'coborrowerid','2');
 $coaddress = $objCommon->checkRecordexists('caddress','coapplicant_details','reference_id',$id,'coborrowerid','2');
 
 $amount = $objCommon->checkRecordexists('amount','course_details','reference_id',$id);
 $rupees_amount= $objCommon->numberTowords($amount);
 $rupees_amount=ucwords($rupees_amount);
 //convert rs to rupees
 $sanctionamount=$loanamount;
 
$rupees= $objCommon->numberTowords($sanctionamount);
 $rupees=ucwords($rupees);
//echo $rupees;

$PF_amount = $objCommon->checkRecordexists('PF_amount','credit_appraisal_analysisdetails','reference_id',$id);

if($PF_amount=='')
{
 $PF_amount=0;
}


//the date 
$day=date("d");
$month=date("F");
$year=date("Y");

require('WriteHTML.php');

$pdf=new PDF_HTML();

$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15);

$pdf->AddPage();
$pdf->Image('images/img2.gif');



$pdf->SetFont('Arial','B',12);
$pdf->WriteHTML('<br><br><br><br>');
$pdf->Cell(0, 0, 'AGREEMENT FOR KASHMIR FINANCE PRIVATE LIMITED (KSFi)', 0, 0, 'C', 0);
$pdf->WriteHTML('<br>');
$pdf->Cell(0, 0, '('.$Product.' LOANS)', 0, 0, 'C', 0);

$pdf->WriteHTML('<br><br><br><br>');
$pdf->SetFont('Arial','',10);
$pdf->WriteHTML('This Agreement executed on this,the '.$day.' Day of '.$month.' '.$year.'<br><br>');
$pdf->WriteHTML('By<br><br>');
$pdf->WriteHTML('(1)'.$fname." ".$mname." ".$lname.'<br><br>');
if($cfname!='')
{
$pdf->WriteHTML('(2)'.$cfname." ".$cmname." ".$clname.'<br><br>');
}
if($cofname!='')
{
$pdf->WriteHTML("(3) ".$cofname." ".$comname." ".$colname."(Herein after referred to as the Borrower's).<br><br>");
}

$pdf->WriteHTML('Which expression shall where the context so admits include his/her/their legal heirs, executors, administrators, successors and assigns in favor of the Kashmir Finance Pvt Ltd, as a Non-Bank Finance Company registered under the companies Act 1956, and having its registered Office at Mumbai and service centers amongst other places '.$city.' 
(Herein after referred to as "KSFi" which expression shall where the context so admits, include its successors and assigns).
<br><br>');
$pdf->WriteHTML('Whereas KSFi referred to as the "Kashmir Finance Private Limited (KSFI)" has loan products "'.$Product.' LOANS" for financial assistance to the needy and deserving customers, so as to enable them to continue acquisition of desired needs anywhere in India. (Herein after referred to as "the loan", which shall include the product as changed by request and modified from time to time).<br><br>');

$pdf->WriteHTML("Whereas the Borrower(s) having understood the terms and conditions of the Loan applied requested KSFi with application
Dated ".$app_date."	to grant a loan to the extent of Rs ".$amount." 	(Rupees. ".$rupees_amount." Only)
For the express purpose of enabling the Borrowers) / Borrower to undergo and fulfill their desired financing needs and Loan requirements for Home Improvements, Consumer products and for purchasing Mobile and Computer accessories and other home improvement equipment's as per the financing needs as mentioned in the loan application.<br><br>");

$pdf->WriteHTML("And whereas, KSFi has on execution of this agreement in accordance with the terms and conditions mentioned herein and on providing other securities and on execution of further documents as required by KSFi from time to time, agreed to grant/ granted to the Borrower(s) a loan of Rs.".$sanctionamount." (Rupees. ".$rupees." Only) (Herein after referred to as: the loan)<br><br>");

$pdf->WriteHTML("Now in consideration of the above, the Borrower(s) hereby agree/s, undertake/s, assure/s and declare/s as follows.<br><br>");
$pdf->WriteHTML("1.	The Borrower(s) having understood the terms and conditions of the loan, agree(s) that he/ she/ they shall be bound by the terms and conditions of the loan and/or the relative sanction order and/or the rules and regulations of the Scheme under which the loan is granted /agreed to be granted and the amendments that may me made thereto from time to time. The Borrower(s) shall furnish all such information as KSFi may reasonably require to the satisfaction of KSFi on the due compliance with the terms and conditions of the loan and/or the sanction order or otherwise at such time, in such form and containing such particulars as KSFi may call for / require from time to time.
<br><br>");
$pdf->WriteHTML("The Loan application shall be deemed to constitute the basis of this agreement as well as tranche specific Loan Agreement Summary Schedule and of the loan advanced / to be advanced by KSFi hereunder and the Borrower(s) hereby warrants the correctness of each and every one of the statement and particulars herein contained and undertake(s) to carry out the proposal therein set forth.
<br><br>");
$pdf->WriteHTML("2.	The Borrower(s) shall pay interest on the loan amount to a maximum at the rate of percent per annum with monthly interest and compounded, except when the Borrower(s) have opted for principal moratorium product where interest is paid during such product period on simple interest basis, rising and falling therewith calculated respectively on the monthly balance of the amount due, throughout the currency of the loan KSFi shall at any time without any notice or intimation to the Borrower(s) be entitled to charge nearest at such higher rates than the rate herein before mentioned in accordance with the rate / KSFi's lending rate revised or varied by KSFi and KSFi is not bound to give any notice to the Borrower(s) in regard and the Borrower(s) agree(s) for such variation or revision. The Borrower(s) specifically agree(s) that the rate of interest amount and loan period under this agreement shall be dynamic in the event of a product change request during the loan tenure by borrowers and which is accepted and approved by KSFi and an execution of subsequent tranche specific Loan Agreement Summary Schedule encompassing the interest rate and loan period terms agreed in this agreement, in the due course of continuation as well as enforceability of all other terms and conditions including the rate of interest and loan period as per this agreement.<br><br>");

$pdf->WriteHTML("3.	The Borrower(s) specifically agree(s) that the principal amount under this agreement and tranche specific Loan Agreement Summary Schedule shall always include and / or shall deem to include also the interest calculated else there is product change request by borrowers which is duly approved by KSFi and an updated tranche specific Loan Agreement Summary Schedule is executed encompassing all terms and conditions of this loan agreement, and debited to the loan account with monthly rest from time to time cumulatively in accordance with the product selected. The Borrower(s) also undertake(s) to pay additional interest at such rates, as may be fixed by KSFi from time to time over and above the rate mentioned above, in case the Borrower(s) default(s) in paying the installments, interest and other charges, and/or in the event of violation of any of the terms and conditions of this agreement, and /or violation of terms and conditions of product change requests in between the due course of loan repayment and/or the account becoming irregular, without prejudice to other rights and remedies of KSFi.
<br><br>");

$pdf->WriteHTML("4.	The Borrower(s) shall pay processing fee of Rs ".$PF_amount."<br><br>");

$pdf->WriteHTML("5.	The duration of the repayment tenure as mentioned in the loan application, against which the Loan is sanctioned by KSFi, is ".$Loan_tenure." Months (hereinafter referred to as the 'Loan Tenure'), the Loan Tenure period shall not
include any further Period required for adjustment of delay in payments on account of failure of the borrowers, inability to continue with the livelihood due to various reasons etc. and the Borrower(s) shall be required to repay the loan amount together with interest, costs and other charges as per the terms of sanction order and as per the terms and conditions of this agreement.<br><br>");
$pdf->WriteHTML("6.	The Borrower(s) agree(s) and undertake(s) to pay the periodical interest applied in the loan account then and there as and when the same falls due, during the currency of product selection as mentioned above. The outstanding balance at the end of the 'interest completion period' as arrived upon by KSFi, together with accrued interest/Emi/principal and interest, as per product opted during the tenure, product changed by Borrower(s) request, cost of KSFi and all other charges involved like insurance, servicing and tracking the Borrower(s) shall be repaid by the Borrowers) upfront during the loan disbursement or in monthly installments over a period of the loan tenure or periodically like Quarterly, Semi-Annually or Annually as per the latest current executed Loan agreement summary schedule as agreed by the Borrower(s). The first of such installment shall be repaid as per the latest current Loan agreement Summary schedule executed between KSFi and Borrowers) which would keep on getting amended on request from the Borrower(s) and each of the subsequent installments on or before the same day on succeeding months or with the time frame mentioned as per the latest current Loan Summary Schedule to a maximum of days as per the product selected by the Borrower(s). In case students secure employment before the said date, repayment should begin from the succeeding month of such employment based on the product selected at the given point of time as per the Loan Agreement summary schedule.<br><br>");
$pdf->WriteHTML("If any installment, interest or any other amounts payable under this agreement is not paid on the due dates as per the agreement of KSFi to accept the repayment of the said loan in installments, shall at the option of KSFi forthwith determine and the whole balance outstanding in the account shall immediately thereupon be payable to KSFi and KSFi can recall entire loan amount and take necessary steps for enforcing the security, provide that KSFi may not always in its description forthwith enforce its rights under the security.<br><br>");
$pdf->WriteHTML("7.	The Borrower(s) hereby charges and hypothecates to KSFi the equipment's/ assets/ articles purchased by availing loan which are more specifically described in the schedule hereto and/or the details which shall be submitted separately after accruing the assets/ equipment's which shall also from part of this agreement, as security for the said loan together with all interests, costs, expenses etc. The security mentioned herein shall also include those things which may come into existence by modification, accretion, maintenance or otherwise become an integral part of adjunct of the hypothecated assets/ equipment's.<br><br>");


$pdf->WriteHTML("8.	The Borrower(s) shall keep the said assets/ equipment's at the Borrower's risk and expenses in good condition and fully insured against the loss, fire or damages as may be required by KSFi from time to time such basis and for such value as may be satisfactory to KSFi with such insurance company of repute to the approved of in writing by KSFi and Borrower shall pay all premium for insurance including its renewal. KSFi may at its discretion cause the assets/ equipment's to be insured against any loss or damage as it may deem fit and proper and the Borrower authorizes KSFi to debit such amounts to the loan account then and there. In case of any claim arising under such insurance, the proceeds thereof shall at the option of KSFi either be applied towards replacement thereof as far as possible or towards satisfaction of KSFi's dues as here under. The Borrower shall pay rent, fees, taxes etc. payable in respect of said assets/ equipment's as and when the same become due.<br><br>");
$pdf->WriteHTML("9.	The Borrower(s) shall permit KSFi or its officers and agents from time to time and at all times to enter upon and remain in the premises wherein the hypothecated assets/ equipment's are kept and to verify, inspect and to take possession thereof. KSFi at its option shall be entitled to take possession of the hypothecated assets 'equipment's without intervention of the court and to dispose of the same through private/ public sale and to appropriate the proceeds towards the liability of the Borrowers.<br><br>");
$pdf->WriteHTML("10.	The Borrower(s) expressly agree(s) to notify KSFi the receipt of any simultaneous payable/non-repayable financial assistance immediately while the processing and disbursement of this loan and upon receiving such notification KSFi is at liberty to decide as to the continuation of the loan arrangement.<br><br>");
$pdf->WriteHTML("11.	The Borrower(s) agree(s) to notify KSFi about any other charge in his/her/their financial condition.<br><br>");
$pdf->WriteHTML("12.	The Borrower(s) hereby agree(s) to keep KSFi informed from time to time of change of address if any.<br><br>");
$pdf->WriteHTML("13.	If the Borrower(s) be more than one individual, each one of them mutually agree that each one or any of them is/are authorized or empowered by the other(s) of them to admit and acknowledge the Borrower(s) individual and collective liability to KSFi by any payment into the account(s) or by way of express writing in any manner or otherwise and any such admission and acknowledgment of the liability by one or more of them shall be constructed and deemed to have been made on behalf of each and all of them jointly and severally.<br><br>");
$pdf->WriteHTML("14.	Nothing herein contained shall prejudice any rights or remedies of KSFi in respect of any other present or future security, guarantee obligation or decree for any indebtedness or liability of Borrower(s) to KSFi.<br><br>");
$pdf->WriteHTML("15.	Notwithstanding anything contained herein, KSFi is at liberty to recall the loan and demand repayment of the same with accrued interest, additional interest, cost, charges and other expenses at any time during the continuance of the loan without assigning any reason whatsoever, if KSFi considers that it is necessary for the best interest of KSFi. The Borrower(s) hereby agree(s) to repay the loan together with accrued interest, additional interest, cost, charges and other expenses immediately on such demand made by KSFi without any demur and without raising any objection whatsoever.<br><br>");
$pdf->WriteHTML("16.	At KSFi's calling, the Borrower/s shall take all steps that would be required for assigning such portion of his/her/their monthly income, whether of a recurring nature or not, to be derived by way of employment, business or any other kind of income, as security in favor of KSFi for due repayment of all the amounts payable by the Borrowers to KSFi in respect of the borrowed Finance through loan Facility. For the purpose of assigning such future income to KSFi, the Borrowers undertake to execute necessary deed of assignment and other documents in the form and manner as may be necessary and duly prescribed by KSFi in its sole discretion.<br><br>");
$pdf->WriteHTML("a)	The Borrowers hereby irrevocably appoint KSFi to be attorneys for an in the name of the Borrowers (whether itself or through their agents and nominees) and as such attorneys to do all such acts, deeds and things and to execute all such documents, transfers, assignments as may be required by KSFi from time to time.<br><br>");


$pdf->WriteHTML("17.The Borrower/s understand/s that as a pre-condition, relating to grant of the loans/ advances/ other non-fund-based credit facilities to him/her/them, KSFi requires his/her/their consent for the disclosure by KSFi of, information and date relating to him/her/them, of the credit facility availed of/to be availed, by him/ her/ them, obligations assumed/to be assumed, by him/ her/ them, in relation thereto and default, if any, committed by him/her/them, in discharge thereof. Accordingly, the Borrower/s hereby agrees/s and give consent for the disclosure by KSFi of all or any such;<br><br>");
$pdf->WriteHTML("a.	Information and data relating to him/her/them;
b.	The information or data relating to any credit facility availed of/to be availed, by him/her/them, and
  	c.	Default, if any, committed by him/her/them, in discharge of his/ her/their obligation, as KSFi may deem appropriate and necessary, to disclose and furnish to Credit Information Bureau (India) Ltd. and any other agency authorized in this behalf by RBI.<br><br>");

$pdf->WriteHTML("The Borrower/s declares/s that the information and data furnished by him/her/them to KSFi are true and correct. The Borrower/s undertake/s that:<br><br>");

$pdf->WriteHTML("a.	The Credit Information Bureau (India) Ltd. and any other agency so authorized may use, process the said information and data disclosed
by KSFi in the manner as deemed fit by them; and
b.	The Credit Information Bureau (India) Ltd. and any other agency so authorized may furnish for consideration. The proceeds information and also data or products thereof prepared by them, KSFi/ Financial Institutions and other credit grantors or registered users, as may be specified by the Reserve Bank in this behalf.<br><br>");

$pdf->WriteHTML("In witness whereof the Borrower(s) has/ have executed this agreement the day and year first above written at----------------------------------..<br><br>");
$pdf->WriteHTML("
Name of Borrower(s)	                                               Signature of Borrower(s)	   
<br>");

$pdf->WriteHTML("
".$fname ." ". $mname." ". $lname                                                                                      
."<br><br><br>");

if($cfname!='') {
	
	$pdf->WriteHTML("
	Name of Borrower(s)	                                               Signature of Borrower(s)	                               
	<br>");


	$pdf->WriteHTML("
	".$cfname ." ". $cmname." ". $clname                                                                                      
	."<br><br><br>");
}

if($cofname!='') {
	
	$pdf->WriteHTML("
	Name of Borrower(s)	                                               Signature of Borrower(s)	                              
	<br>"); 


	$pdf->WriteHTML("
	".$cofname ." ". $comname." ". $colname                                                                                      
	."<br><br><br>");
}

// add a page
$pdf->AddPage();

$pdf->Cell(0, 0, 'DEMAND PROMISSORY NOTE', 0, 0, 'C', 0, '', 3);
$pdf->WriteHTML("                                                                                                                                     Place:".$city."<br>
                                                                                                                                    Date:".$day." ".$month." ".$year."<br><br>
        Rupees:".$rupees_amount."<br>
        On Demand, We<br><br>
");

$pdf->WriteHTML($fname ." ". $mname." ". $lname . " address:". $address."");

 if($cfname!='') {

$pdf->WriteHTML (",Co-Borrower1:".$cfname ." ". $cmname." ". $clname . " address:". $caddress);

 }
 if($cofname!='') {

$pdf->WriteHTML (",Co-Borrower2:".$cofname ." ". $comname." ". $colname . " address:". $coaddress);

 }
 $pdf->WriteHTML ("  Jointly and severally Promise to pay THE KASHMIR FINANCE PRIVATE LIMITED (KSFI)

Or order the sum of Rupees ".$rupees." Only

together with interest at the rate of-------------per cent per annum with monthly interest, for value received against our Loan application for the desired Loan being taken by us/me.



<br><br>");



$pdf->WriteHTML("
Name of Borrower(s)	                                               Signature of Borrower(s)	   
<br>");

$pdf->WriteHTML("
".$fname ." ". $mname." ". $lname                                                                                      
."<br><br><br>");

if($cfname!='') {
	
	$pdf->WriteHTML("
	Name of Borrower(s)	                                               Signature of Borrower(s)	                               
	<br>");


	$pdf->WriteHTML("
	".$cfname ." ". $cmname." ". $clname                                                                                      
	."<br><br><br>");
}

if($cofname!='') {
	
	$pdf->WriteHTML("
	Name of Borrower(s)	                                               Signature of Borrower(s)	                              
	<br>"); 


	$pdf->WriteHTML("
	".$cofname ." ". $comname." ". $colname                                                                                      
	."<br><br><br>");
}

// add a page
$pdf->AddPage();

$pdf->Cell(0, 0, 'Loan Agreement Summary Schedule', 0, 0, 'C', 0, '', 3);

$pdf->WriteHTML("<br><br>
We the Borrower/s hereby agree(s) that the granting of this Loan Agreement Summary schedule is a apart of the Loan Agreement of KSFi and shall be purely at the discretion of KSFi and that notwithstanding anything herein before contained, KSFi shall, at its absolute discretion, on the requisition from the customers would be the final decision maker in approving the loan agreement summary schedule request as well as the tranche schedule as per the accepted product change request of the borrowers . Further to this effect we the borrower/s hereby agree(s),understand and accept the norm of the latest Loan Agreement Summary schedule as the final agreed and accepted repayment schedule and would supersede all previous schedule of the sanction loans as well as disbursement of tranche/tranches respectively.
<br><br>");


$width_cell=array(128,30,20,30);
$pdf->SetFillColor(193,229,252); // Background color of header 

$pdf->SetFont('Arial','',8);

$pdf->Cell($width_cell[0],10,'Total Cost of Product/Invoice Value',1,0,'L',false); // First header column 
$pdf->Cell($width_cell[1],10,''.$Product_cost.'',1,1,'C',false); // Second header column
$pdf->Cell($width_cell[0],10,'Margin Money to be paid by borrower',1,0,'L',false); 
$pdf->Cell($width_cell[1],10,''.$margin_money.'',1,1,'C',false); 	
$pdf->Cell($width_cell[0],10,'Loan Sanctioned amount in INR',1,0,'L',false); 
$pdf->Cell($width_cell[1],10,''.$loanamount.'',1,1,'C',false); 			
$pdf->Cell($width_cell[0],10,'Tranche number of the current disbursement',1,0,'L',false); 
$pdf->Cell($width_cell[1],10,''.$Tranche_number.'',1,1,'C',false); 		
$pdf->Cell($width_cell[0],10,'Total Loan amount disbursed',1,0,'L',false); 
$pdf->Cell($width_cell[1],10,''.$disbursed_amount.'',1,1,'C',false); 		
$pdf->Cell($width_cell[0],10,'Purpose(s) for which loan is disbursed',1,0,'L',false); 
$pdf->Cell($width_cell[1],10,''.$purpose.'',1,1,'C',false); 		
$pdf->Cell($width_cell[0],10,'Type of Product/Machine/Vehicle/Scheme or Items financed by this loan',1,0,'L',false); 
$pdf->Cell($width_cell[1],10,''.$TypeOfProduct.'',1,1,'C',false); 		
$pdf->Cell($width_cell[0],10,'Make of Product/Machine/Vehicle/Scheme or Items financed by this loan',1,0,'L',false); 
$pdf->Cell($width_cell[1],10,''.$MakeOfProduct.'',1,1,'C',false); 		
$pdf->Cell($width_cell[0],10,'Model of Product/Machine/Vehicle/Scheme or Items financed by this loan',1,0,'L',false); 
$pdf->Cell($width_cell[1],10,''.$ModelOfProduct.'',1,1,'C',false); 		
	
$pdf->Cell($width_cell[0],10,'Total Loan tenure in months',1,0,'L',false); 
$pdf->Cell($width_cell[1],10,''.$Loan_tenure.'',1,1,'C',false); 		
$pdf->Cell($width_cell[0],10,'Product requested (Advance EMI/Standard/EMI/Flexi/Step-up)',1,0,'L',false); 
$pdf->Cell($width_cell[1],10,''.$Product_requested.'',1,1,'C',false); 		
$pdf->Cell($width_cell[0],10,'Grace Period in months',1,0,'L',false); 
$pdf->Cell($width_cell[1],10,''.$GracePeriod.'',1,1,'C',false); 		
$pdf->Cell($width_cell[0],10,'Principal Moratorium period in number of months',1,0,'L',false); 
$pdf->Cell($width_cell[1],10,''.$Moratorium_period.'',1,1,'C',false); 		
$pdf->Cell($width_cell[0],10,'EMI Amount in INR',1,0,'L',false); 
$pdf->Cell($width_cell[1],10,''.$EMIAmount.'',1,1,'C',false); 		
$pdf->Cell($width_cell[0],10,'Advance EMI paid for in months(for loans where EMI is paid in advance)',1,0,'L',false); 
$pdf->Cell($width_cell[1],10,''.$AdvanceEMIpaid.'',1,1,'C',false); 		
$pdf->Cell($width_cell[0],10,'Advance EMI amount in INR(for loans where EMI is paid in advance)',1,0,'L',false); 
$pdf->Cell($width_cell[1],10,''.$EMIamount_INR.'',1,1,'C',false); 		
$pdf->Cell($width_cell[0],10,'Subvention % from the Vendor/Partner of the loan amount',1,0,'L',false); 
$pdf->Cell($width_cell[1],10,''.$Partner_loanAmount.'',1,1,'C',false); 		
$pdf->Cell($width_cell[0],10,'Subvention amount from the Vendor/Partner in INR',1,0,'L',false); 
$pdf->Cell($width_cell[1],10,''.$Partner_loanAmount.'',1,1,'C',false); 		
	
$pdf->Cell($width_cell[0],10,'Interest Payment amount( for Principal Moratorium Loans) in INR',1,0,'L',false); 
$pdf->Cell($width_cell[1],10,''.$InterestPayment.'',1,1,'C',false); 		
$pdf->Cell($width_cell[0],10,'Interest Payment start date( for Principal Moratorium Loans)',1,0,'L',false); 
$pdf->Cell($width_cell[1],10,''.$InterestPaymentDate.'',1,1,'C',false); 		
$pdf->Cell($width_cell[0],10,'Principal and Interest payment (both combined) i.e. EMI amount',1,0,'L',false); 
$pdf->Cell($width_cell[1],10,''.$EMIAmount.'',1,1,'C',false); 		
$pdf->Cell($width_cell[0],10,'Principal and Interest payment i.e. EMI start date',1,0,'L',false); 
$pdf->Cell($width_cell[1],10,''.$EMIDate.'',1,1,'C',false); 		
$pdf->Cell($width_cell[0],10,'Equated monthly Principal payment (Advance EMI products) in months',1,0,'L',false); 
$pdf->Cell($width_cell[1],10,''.$Advance_EMI_months.'',1,1,'C',false); 		
$pdf->Cell($width_cell[0],10,'Equated monthly Principal payment (Advance EMI products) in INR',1,0,'L',false); 
$pdf->Cell($width_cell[1],10,''.$Advance_EMI_INR.'',1,1,'C',false); 		
$pdf->Cell($width_cell[0],10,'Entity name for disbursement of funds on behalf of the borrower(s)',1,0,'L',false); 
$pdf->Cell($width_cell[1],10,''.$Entity_name.'',1,1,'C',false); 		
$pdf->Cell($width_cell[0],10,'Disbursement amount to the entity on behalf of borrower after deduction of interest and subvention',1,0,'L',false); 
$pdf->Cell($width_cell[1],10,''.$deductionOfInterest.'',1,1,'C',false); 		
$pdf->Cell($width_cell[0],10,"Mode of payment i.e.(NACH/ECS/DDM/SI/PDC's/CASH/NEFT/IMPS/MMT/WALLET/BHIM UPI)",1,0,'L',false); 
$pdf->Cell($width_cell[1],10,''.$ModeOfpayment.'',1,1,'C',false);



$pdf->WriteHTML("<br><br><br><br>");






$pdf->SetFont('Arial','I',10);

$pdf->WriteHTML('This is an auto-generated agreement and does not require a signature<br>');

$target_path='loanAgreement/'.$id;
If(!file_exists($target_path))

{ 

    $createsid = mkdir($target_path, 0777); 

}




$pdf->Output($target_path.'/loanagreement.pdf','F');





/*$pdf->Output(); */

/*header("Content-Type: application/octet-stream");
header("Content-disposition: attachment; filename=loanagreement.pdf");
header("Content-type: application/pdf");
header("Content-Length: " . filesize("loanagreement.pdf"));
readfile($pdf->Output());*/



//mail format

header('location:'.$target_path.'/loanagreement.pdf');






?>