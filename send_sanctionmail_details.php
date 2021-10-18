<?php

include('./connection.php');
session_start();
	$reference_id=$_POST['reference_id'];
$cash=$_POST['cash'];
$spdc_cheque=$_POST['spdc_cheque'];
$spdc_amount=$_POST['spdc_amount'];
$spdc_bank=$_POST['spdc_bank'];
$applicant_bank=$_POST['applicant_bank'];
$total_INR=$_POST['total_INR'];
$IRR=$_POST['IRR'];
$Repayment_tenure=$_POST['Repayment_tenure'];
$secondmail=$_POST['secondmail'];


             
			$select="select * from sanctionmail_details where reference_id='$reference_id'";
            			
			
			$select_record1=mysql_query($select);
			
			$count1 = mysql_num_rows($select_record1);
			
			if($count1 ==0)
			{
			 $sql1="insert into sanctionmail_details(reference_id,cash,spdc_cheque,spdc_amount,spdc_bank,applicant_bank,total_INR,IRR,Repayment_tenure)values('$reference_id','$cash','$spdc_cheque','$spdc_amount','$spdc_bank','$applicant_bank','$total_INR',
			 '$IRR','$Repayment_tenure')";
			 
			}
			
			
			else
			{
			 
			 $sql1="update sanctionmail_details  set
			 cash='$cash',spdc_cheque='$spdc_cheque',spdc_amount='$spdc_amount',spdc_bank='$spdc_bank',applicant_bank='$applicant_bank',total_INR='$total_INR',IRR='$IRR',Repayment_tenure='$Repayment_tenure',
			 secondEmailTo='$secondmail' where reference_id='$reference_id'";
			}
			
			 $result=mysql_query($sql1);
			 
			 
			 
			 $id=$reference_id;
			 
			
		
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
			 
             $id=$_POST['reference_id'];
		   
			 ?>
		   
		  		<tr align="left">
									<td style="font-size:14px">
									Subject: Reference Id:<?php echo $id ?> Sanction  Mail of <?php echo $fetch1['firstname']; ?> for 
			                        <?php echo $typeofLoan; ?> of <?php echo  $fetch2['amount']; ?> for <?php echo $Repayment_tenure; ?> Months<br/><br/>
									
									Dear <?php  if($row1) { echo $fetch1['firstname']." ".$fetch1['lastname']; } ?>,<br/><br/>
									
									
									This mail is a confirmation for the loan sanction against the application for  <?php  if($row1) {  echo $fetch1['typeofLoan']; } ?> to <?php if($row1) { echo $fetch1['firstname']." ".$fetch1['lastname']; } ?> .<br/>
									We would be doing the funds transfer of Rs <?php if($row2) { echo $fetch2['amount']; } ?> very soon to your account. <br/><br/><br/>
									The Disbursement will be made subject to below conditions:<br/><br/>
									1. Wholly signed and completed loan agreement of KASHMIR FINANCE PRIVATE LTD.<br/><br/>
									2. Processing Fees transfer of Rs <?php echo  $cash; ?>  to be credited in the account of Kashmir Finance Pvt Ltd.<br/><br/>
									3.<?php echo  $spdc_cheque; ?> SPDC's of Rs <?php echo $spdc_amount; ?> each from <?php echo $spdc_bank; ?> bank account to be deposited with Kashmir Finance Pvt Ltd.<br/><br/>
									4.All Interest and EMI payments to be deducted from <?php echo $applicant_bank; ?> bank account through ECS/PDC/NACH/CASH/ANY OTHER ONLINE TRANSFER system.<br/><br/>
									5.A total of INR <?php echo $total_INR ;?> has to be serviced as interest during the duration of Loan at an IRR <?php echo $IRR; ?><br/><br/>
									6. ECS/PDC/NACH form to be filled and signed if applicable. <br/><br/>
									7. The repayment tenure is of <?php  echo $Repayment_tenure ; ?> months.<br/><br/><br/>
									
									 Thanks & Regard <br/>
		
									For KSFi i.e. Kashmir Finance Pvt Ltd<br/>
									
									Team Customer Service<br/>
									
									Mail Id: Customerservice@ksfi.co.in<br/>
									
									Authorised Signatory (Applicable In case the sanction letter is to be printed)<br/>
									
									Disclaimer (Applicable in case the sanction letter is sent by mail)<br/>
									
									This is an automatically generated email – please do not reply to it. If you have any please email us at Customerservice@ksfi.co.in<br/>

		
									
                                    </td></tr>
									
									<tr style="height:20px"  ></tr>
									<tr><td align="center"><a href="sanction_mail.php"><input type="button" value="Edit" class="submit"></a>
									<a href="send_sanctionmail.php"><input type="button" value="Send Mail" class="submit"></a>
									</td></tr>
			 
			// header('location:sanction_mail_preview.php');
			 //exit();
			
			
			 
			 

