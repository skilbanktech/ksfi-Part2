

<?php

include('./connection.php');



session_start();

     $Currentrole=$_SESSION['Currentrole'];

	$select_rolerights="select * from rolerights where role in ($Currentrole)"; 

		$record_roleright=mysql_query($select_rolerights);

		$btnassign="";

		$restrictapp="";     //--------- 7 - Partner/Field Officer/Institute

		$btnSendDoc="";

		$btnApplicationStatus="";

		$btnApplication="";

		$btnModify="";

		$InitiateVeri="";

                $btnAccMgrassign="";

                $btnDeleteData="";
               
			   
			   $btnScoring="";
			   
			   $creditAppraisalMemo="";
			   
			   $loanCalculator="";
			   
			   $PDChequeDetails="";
			   $addpaymentdetails="";
				

		while ($row_rolerights = @mysql_fetch_assoc($record_roleright))

		{		 		

                    if($row_rolerights['rights_id']=="1")  //assign SendDoc

                    {

                        $btnSendDoc=$row_rolerights['rights_id'];

                    }

                    else if($row_rolerights['rights_id']=="2")//assign ApplicationStatus

                    {

                        $btnApplicationStatus=$row_rolerights['rights_id'];

                    }

                    else if($row_rolerights['rights_id']=="3") //assign view Application

                    {

                        $btnApplication=$row_rolerights['rights_id'];

                    }

                    else if($row_rolerights['rights_id']=="4")//Assign Modify

                    {

                        $btnModify=$row_rolerights['rights_id'];

                    }

                    else if($row_rolerights['rights_id']=="5") //btnassign

                    {

                        $btnassign=$row_rolerights['rights_id'];

                    }	 

                    else if($row_rolerights['rights_id']=="7") //restrictApp

                    {

                        $restrictapp=$row_rolerights['rights_id'];

                    }

                    

                    else if($row_rolerights['rights_id']=="11")	//initiate Veri

                    {

                        $InitiateVeri=$row_rolerights['rights_id'];

                    }

                    else if($row_rolerights['rights_id']=="19") //btnAccMgr_assign

                    {

                        $btnAccMgrassign=$row_rolerights['rights_id'];

                    }

                    else if($row_rolerights['rights_id']=="20") //Delete

                    {

                        $btnDeleteData=$row_rolerights['rights_id'];

                    }
					 else if($row_rolerights['rights_id']=="21") //Delete

                    {

                        $btnScoring=$row_rolerights['rights_id'];

                    }
					else if($row_rolerights['rights_id']=="30") //Delete

                    {

                       $creditAppraisalMemo=$row_rolerights['rights_id'];

                    }
					else if($row_rolerights['rights_id']=="31") //Delete

                    {

                       $loanCalculator=$row_rolerights['rights_id'];

                    }
					else if($row_rolerights['rights_id']=="32") //Delete

                    {

                       $PDChequeDetails=$row_rolerights['rights_id'];

                    }
					else if($row_rolerights['rights_id']=="33") //Delete

                    {

                       $addpaymentdetails=$row_rolerights['rights_id'];

                    }
					
					
					
					
					
					

                    

		}
		
		
		 $ASOquery="select username from login_details where role='Service Manager' or role='Field Officer' or role='Service Officer'";

                $ASOrecord=mysql_query($ASOquery);

                $ASOoption="";

                while($ASOrow1 = @mysql_fetch_assoc($ASOrecord))

                {

                    $username=$ASOrow1["username"];

                    $ASOoption.="<OPTION VALUE=\"$username\">".$username;

                }
				
				
		 	$query="select username from login_details where usertype = 'Partner' or role='Partner' or role='Agency' or role='Field Officer' or role='Service Officer' or role='Service Manager'";

                $record=mysql_query($query);

                $option="";

                while($row11 = @mysql_fetch_assoc($record))

                {

                    $username=$row11["username"];

                    $option.="<OPTION VALUE=\"$username\">".$username;

                }

         //seleted application id
          $selrefID = $_POST['selrefID'];
		  
		  $_SESSION['AppID']=$selrefID;
		  
		  $reference_id_encoded = rtrim(strtr(base64_encode($selrefID), '+*', '-_'), '=');
		  
		  
		  	$selectDetail="select * from initiateverification where reference_id = '$selrefID'";
             //      echo($selectDetail);
                                        $recorddetails=mysql_query($selectDetail);
                                        $row2= @mysql_fetch_assoc($recorddetails);
										
										if($row2)
										{
										$ResidenceVeri=$row2['ResidenceVeri'];
										$EmploymentVeri=$row2['EmploymentVeri'];
										$OffTelephoneVeri=$row2['OffTelephoneVeri'];
										$EnrollmentVeri=$row2['EnrollmentVeri'];
   
                                        $internal_email=$_SESSION['internal_email'];
                                        $FieldEmail=$row2['FieldEmail'];
										$TeleEmail=$row2['TeleEmail'];
										$EnrolEmail=$row2['EnrolEmail'];
										}
										else
										{
										$ResidenceVeri="";
										$EmploymentVeri="";
										$OffTelephoneVeri="";
										$EnrollmentVeri="";
                                        $internal_email="";
                                        $FieldEmail="";
										$TeleEmail="";
										$EnrolEmail="";
											
										}

		  
		  //set id in session 


        $Query_one="select distinct p.reference_id as DocValue,s.reference_id,s.firstname,s.lastname,s.city,s.mobile,s.email,

                    s.app_date,s.course,s.amount, s.app_status, s.VerificationStatus,s.partnername , AppliedBy, AccManager,s.typeofLoan 

                    from(Select s.reference_id,s.firstname,s.lastname,s.city,s.mobile,s.email,s.app_date,c.course,c.amount, s.app_status,

                    s.VerificationStatus,s.partnername, s.AppliedBy, s.AccManager,s.typeofLoan ";

                

                $Query_Two =" left join  document_details p on s.reference_id =p.reference_id";

 
	 
	 $select_query1 = "$Query_one from student_details s inner join course_details c on s.reference_id=c.reference_id ) s

                       $Query_Two where  s.reference_id='$selrefID'";
	 
	 $result1=mysql_query($select_query1);
	
	 $squery =  "SELECT doc_name FROM document_details where reference_id='".$selrefID."'";

	        $sresult =  mysql_query($squery);
			
			$row_count = mysql_num_rows($sresult);
			
	        echo $row_count;
			

		 
			  
			while ($row1 = @mysql_fetch_assoc($result1) ) {

			//echo $_SESSION['role'];			

                  $email=$row1['email'];
				  
	              $select_fblink="select * from fblogin_details where email='$email' ";
	 
                  $fblink_result=mysql_query($select_fblink);
                   
				  $fetch_array = mysql_fetch_array($fblink_result);
	       	        
				  
				   if($fetch_array)
				   {
					  $link = $fetch_array['link'];
				   }
                  else {				   
					  $link=""; 
				   }
				   
                 
				 
				  
			 print'<tr><td class="formHeader">Reference ID</td> <td>: '.$row1['reference_id'].'</td></tr>'	
			
			.'<tr><td class="formHeader">Open the Application</td><td>: ' ?>
			<select  id="<?php echo $row1['reference_id'].'cmblink' ; ?>"  name="<?php echo $row1['reference_id'].'cmblink' ; ?>"   onchange="this.form.submit();">
			<option>Select</option>
		    <?php  if ($btnApplication!="") { ?>
			
			 <option value="EditApplication.php?Mode=VIEW">View Application</option>
			 <?php } ?>
			  <?php  if ($btnModify!="") { ?> 
			<option value="EditApplication.php">Modify Application</option>
			  <?php } ?>
			  
			    <?php  if ($btnSendDoc!="") {   ?>
				
		      
				<option value="DocumentUpload.php">Document Center</option>
				<option  value="./ssl/capturevideo.php?ref=<?php echo $reference_id_encoded;?>">Capture Video</option>
				
			
              
               
				 
							<?php  } ?>
							
			
			<option value="ViewAplication.php">Print Application</option>
			  <?php  if ($btnScoring!="") { ?>   
			
			<option value="scoring/send_applicationRefId.php?type=App">Application Scoring</option>
			
			<?php  } ?>
			 <?php  if ($InitiateVeri!="") { ?> 
			 <option value="InitiateVerification.php">InitiateVerification</option>
			<?php } ?>
			   <?php  if ($btnApplicationStatus!="") { ?> 
			   <option value="ApplicationStatus.php">Application Status</option>
			
			<?php } ?>
			
			<?php  if ($creditAppraisalMemo!="") { ?>
							
				 <option value="./verification/credit_appraisal_memo.php">Credit Appraisal memo</option>
				
            <?php } ?>
			
				<?php  if ($loanCalculator!="") { ?>
							
				 <option value="./amort/loan_amort.php">Loan Calculator</option>
				
            <?php } ?>
			<?php  if ($addpaymentdetails!="") { ?>
			
		      	<option value="./PDChequeDetail.php">Add Payment Details</option>
				
			<?php } ?>
			
		
			 <?php if($_SESSION['usertype']=='Employee') 
		{?>
			 
			  <?php if($ResidenceVeri!='' &&  $FieldEmail==$internal_email) { ?>
			 <option  value="./verification/ResidenceVerification.php">ResidenceVerification</option>
			 <?php } ?>
             <?php if($FieldEmail==$internal_email) { ?>
			 <option  value="./verification/EmploymentVerification.php">EmploymentVerification</option>
			  <?php } ?>
              <?php if($TeleEmail==$internal_email) { ?>
		     <option  value="./verification/Telephoneverification.php">TelephoneVerification</option>
			  <?php } ?>
	           <?php if($EnrolEmail==$internal_email) { ?>
             <option  value="./verification/Enroll_Ment.php">EnrollmentVerification</option>

              <?php  }  ?>
						 
			 <option  value="./ssl/video.php">Capture Video</option>


	 <?php } ?>     

                                
			
			
			</select> <?php  print '</td></tr>'	

			.'<tr><td class="formHeader">First Name</td><td>: '.$row1['firstname'].'</td></tr>'

			.'<tr><td class="formHeader">Last Name</td><td>: '.$row1['lastname'].'</td></tr>'				

			.'<tr><td class="formHeader" style="width: 85px">City</td><td>: '.$row1['city'].'</td></tr>'

			.'<tr><td class="formHeader" style="width: 85px">Mobile</td><td>: '.$row1['mobile'].'</td></tr>'

                        .'<tr><td class="formHeader" style="width: 85px">Email</td><td>: '.$row1['email'].'</td></tr>'				

			.'<tr><td class="formHeader" style="width: 100px">Application Date</td><td>: '.$row1['app_date'].'</td></tr>'

                        .'<tr><td class="formHeader" style="width: 100px">Course Name</td><td>: '.$row1['course'].'</td></tr>'

                        .'<tr><td class="formHeader" style="width: 100px">Loan Amount</td><td>: '.$row1['amount'].'</td></tr>'
						
						 .'<tr><td class="formHeader" style="width: 100px">Loan Type</td><td>: '.$row1['typeofLoan'].'</td></tr>'
						
				

                        .'<tr><td class="formHeader" style="width: 100px">Application Status</td><td>: '.$row1['app_status'].'</td></tr>';

                       // '<input type="hidden" id="'.$row['reference_id'].'myAssignAccMgr" name="'.$row['reference_id'].'myAssignAccMgr" value="'.$row2['ResidenceVeri'].'" >';;

             if($_SESSION['usertype'] !='student')

            {

             print '<tr><td class="formHeader" style="width: 100px">Verification Status</td><td>: '.$row1['VerificationStatus'].'</td></tr>';

            }             

            // ---------------- New field added- Account Manager -----------------  <?php  if ($btnAccMgrassign!="") { 

            $AccManager = "";

            if(isset($row1['AccManager']))

            {

                $AccManager=$row1['AccManager'];

            }

            print '<tr><td class="formHeader" style="width: 100px" >Account Manager</td><td>: ';

            print '<input id="'.$row1['reference_id'].'txtAccMgr" name="'.$row1['reference_id'].'txtAccMgr" value="'.$AccManager.'" disabled="disabled"';

            if(!isset($row1['AccManager']))

            {  print ' style="Display:none"';

            }

            print '/>';

            if ($btnAccMgrassign!="") 

            {

            print '<select id="'.$row1['reference_id'].'cmbAccMgr" 

                            value="'.$row1['AppliedBy'].'" 

                            name="'.$row1['reference_id'].'cmbAccMgr" size="1" onchange="OnSOChangeAssign(this)"';



            //if($btnAccMgrassign=="")

            //{

              //  print  ' style="Display:none"';

            //}

            print '>';

            print '<option>Select</option>'.$ASOoption.'</select>';

            }

            print '</td></tr>';   

                 

            //----------------- Assigned Service Representative Combo --------------------	        

            $id= $row1['reference_id']; 

           

            $PartnerName=$row1['partnername'];

            print '<tr> <td id="AssignedSR" name="AssignedSR" class="formHeader" style="width: 100px">Service Representative</td><td>: ';

            print '<input id="'.$row1['reference_id'].'txtName" name="'.$row1['reference_id'].'txtName" value="'.$PartnerName.'"';

            if(!isset($row1['partnername']))

            {	    

                  print ' style="Display:none"';                                                    

            }	  

            print ' disabled="disabled" />';

            if ($btnassign!="")

            {

            print '<select id="'.$row1['reference_id'].'cmbName" 

                            name="'.$row1['reference_id'].'cmbName"  size="1" onchange="OnChangeAssign(this)">

                            <option>Select</option>'.$option.'</select>';  

            }

           // if($btnassign=="")

	    //{

                //   print     ' style="Display:none"';

           // }

            print '</td></tr>';

              

            if($row1['DocValue']!= "")

            {

                print  '<tr><td class="formHeader" style="width: 100px">Document Uploaded</td><td>: Yes</td></tr>';

            }

            else 

            {

                print '<tr><td class="formHeader" style="width: 100px">Document Uploaded</td><td>: No</td></tr>';      

            }

           print '<tr><td class="formHeader" style="width: 100px">Applied By</td><td>: '.$row1['AppliedBy'].

         //        .'<input type="hidden" id="'.$row['reference_id'].'myEmpVeri" name="'.$row['reference_id'].'myEmpVeri" value="'.$row2['EmploymentVeri'].'" >'.

                   '</td>'.

           '</tr>';	

           

           

    } 	?>	 
	
<tr><td>&nbsp;</td></tr>
<tr><td colspan="3">

<?php  if ($btnAccMgrassign!="") { ?>

                              <input type='submit' name="btnAccMgrassign" 

                                     value="Assign" onclick="setaction('send_AssignAccMgr.php');">                      

                            <?php  }  ?>

                         

                                

                     <?php  if ($btnDeleteData!="" &&  $Currentrole=="Admin") {?>

  <script type="text/javascript">

      function ConfirmDelete()

      {

            var selectedapp = document.getElementById("currentlyselRefID").value;

            if (selectedapp == null || selectedapp == 'undefined')

                return;

                       

            if (confirm("Deleting Data will permanently delete the application - "+ selectedapp + "'s data. Do you want to continue?"))

                 location.href='Deletedata.php?refid='+selectedapp;

      }

  </script>

 <input type="button" name="btndelete" value="DeleteData"  onclick="ConfirmDelete();">
 
                 <?php } ?>
				 
				 </td></tr> 
				 





 