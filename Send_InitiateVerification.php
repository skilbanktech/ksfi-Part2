<?php
//echo 'page start';
ob_start();
session_start();

include('common/class_Common.php');
$objCommon=new Common();

include_once('common/Constants.php');
 
$UserEmailID= $_SESSION['internal_email'];

$id=$_POST['no'];
$ksfiloanid="ksfi.co.in";
$residenceVeri="";
$OffTelephoneVeri="";
$ResiTelephoneVeri="";
$EmploymentVeri="";
$cmbFieldVeriUserType="";
$FieldEmail="";
$cmbOffTelephoneUsertype="";
$OffEmailID="";
$cmbEnrolVeriUserType="";
$EnrolEmailID="";
$resiVeriApp="";
$resiVeriCOApp1="";
$resiVeriCOApp2="";
$EmpveriApp="";
$empVeriCoApp1="";
$empVeriCoApp2="";
$OffTeleVeriApp ="";
$OffTelephoneCoApp1="";
$OffTelephoneCoApp2="";
$ResiTelephoneApp="";
$ResiTelephoneCoApp1="";
$ResiTelephoneCoApp2="";
$EnrolApp="";

if(isset($_POST['chkFieldVeri']))
{
        $fieldveri=$_POST['chkFieldVeri'];
      
//-------------------Residence Verification--------------------		
        if(isset($_POST['resiApp']))
        {
                $residenceVeri.= $_POST['resiApp'].'.';
                $resiVeriApp = $_POST['resiApp'];
        }
        if(isset($_POST['resiCoApp1']))
        {
                $residenceVeri.= $_POST['resiCoApp1'].'.';
                $resiVeriCOApp1 = $_POST['resiCoApp1'];
        }
        if(isset($_POST['resiCoApp2']))
        {
                $residenceVeri.= $_POST['resiCoApp2'].'.';
                $resiVeriCOApp2 = $_POST['resiCoApp2'];
        }
//-------------------Employment Verification--------------------		
        if(isset($_POST['chkEmploymentApp']))
        {
                $EmploymentVeri.= $_POST['chkEmploymentApp'].'.';
                $EmpveriApp=$_POST['chkEmploymentApp'];
        }
        if(isset($_POST['chkEmploymentCoApp1']))
        {
                $EmploymentVeri.= $_POST['chkEmploymentCoApp1'].'.';
                $empVeriCoApp1= $_POST['chkEmploymentCoApp1'];
        }
        if(isset($_POST['chkEmploymentCoApp2']))
        {
                $EmploymentVeri.= $_POST['chkEmploymentCoApp2'].'.';
                $empVeriCoApp2= $_POST['chkEmploymentCoApp2'];
        }
    $cmbFieldVeriUserType=$_POST['cmbFieldVeriUserType'];
    $FieldEmail=$_POST['FieldEmail'];
}
  
//-------------------Telephone Verification--------------------	
if(isset($_POST['chkTelephoneVeri']))
{
        $teleVeri=$_POST['chkTelephoneVeri'];

        if(isset($_POST['chkOffTelephoneApp']))
        {
                $OffTelephoneVeri.= $_POST['chkOffTelephoneApp'].'.';
                $OffTeleVeriApp = $_POST['chkOffTelephoneApp'];
        }
        if(isset($_POST['chkOffTelephoneCoApp1']))
        {
                $OffTelephoneVeri.= $_POST['chkOffTelephoneCoApp1'].'.';
                $OffTelephoneCoApp1= $_POST['chkOffTelephoneCoApp1'];
        }
        if(isset($_POST['chkOffTelephoneCoApp2']))
        {
                $OffTelephoneVeri.= $_POST['chkOffTelephoneCoApp2'].'.';
                $OffTelephoneCoApp2= $_POST['chkOffTelephoneCoApp2'];
        }

        if(isset($_POST['chkResiTelephoneApp']))
        {
                $ResiTelephoneVeri.= $_POST['chkResiTelephoneApp'].'.';
                $ResiTelephoneApp= $_POST['chkResiTelephoneApp'];
        }
        if(isset($_POST['chkResiTelephoneCoApp1']))
        {
                $ResiTelephoneVeri.= $_POST['chkResiTelephoneCoApp1'].'.';
                $ResiTelephoneCoApp1= $_POST['chkResiTelephoneCoApp1'];
        }
        if(isset($_POST['chkResiTelephoneCoApp2']))
        {
                $ResiTelephoneVeri.= $_POST['chkResiTelephoneCoApp2'].'.';
                $ResiTelephoneCoApp2= $_POST['chkResiTelephoneCoApp2'];
        }

        $cmbOffTelephoneUsertype=$_POST['cmbOffTelephoneUsertype'];
        $OffEmailID=$_POST['OffEmailID'];
}

//-------------------Enrolment Verification--------------------	
     if(isset($_POST['chkEnrolmentveri']))
     {
  //      echo($EnrolApp);
      $enrolveri=$_POST['chkEnrolmentveri'];
		$EnrolApp= $_POST['chkEnrolmentveri'];
		$EnrolApp="Borrower";	
		
        $cmbEnrolVeriUserType=$_POST['cmbEnrolVeriUserType'];
		$EnrolEmailID=$_POST['EnrolEmailID'];
	
     }

$remark=$_POST['remark'];

//$Agencycontrolname=$id."Agency";
$AgencyEmail= $_POST['FieldEmail'];

//$partnercontrolname=$id."Name";
//$partnername = $_POST[$partnercontrolname]; 
 
 /*$collegeaddress= $objCommon->GetCollegeAddress($id);
 echo($collegeaddress);*/


//echo $partnercontrolname;
//echo "Partner".$partnername;
include('./connection.php');

	 $initiateRecordCheck="select idInitiateVeri,ResidenceVeri,EnrollmentVeri,OffTelephoneVeri,Remark,InitiatedDate,VerificationStatus,reference_id,ResiTelephoneVeri,EmploymentVeri,
FieldUsertype,FieldEmail,TeleUsertype,TeleEmail,EnrolUsertype,EnrolEmail,Initiatedby,ResiVeriStatus,OffTeleVeriStatus,EnrolVeriStatus,EmpVeriStatus,ResiTeleVeriStatus,FieldVeri,TeleVeri,EnrolVeri from initiateverification where reference_id='".$id."' order by InitiatedDate desc";

//echo 'checking values';         

         $allcols= array('idInitiateVeri','ResidenceVeri','EnrollmentVeri','OffTelephoneVeri','Remark','InitiatedDate','VerificationStatus','reference_id','ResiTelephoneVeri','EmploymentVeri','FieldUsertype','FieldEmail','TeleUsertype','TeleEmail','EnrolUsertype','EnrolEmail','Initiatedby','ResiVeriStatus','OffTeleVeriStatus','EnrolVeriStatus','EmpVeriStatus','ResiTeleVeriStatus','FieldVeri','TeleVeri','EnrolVeri');
         
        
                
          $run_initiated=mysql_query($initiateRecordCheck);
           $existingrow = mysql_fetch_row($run_initiated);
    
           if ($existingrow)
           {
                //  echo "  row found";
            $fetchedExistingVal = array_combine($allcols,$existingrow); 
           }
           
            $existingFieldCol = array($fetchedExistingVal['ResidenceVeri'],$fetchedExistingVal['EmploymentVeri'],$fetchedExistingVal['FieldUsertype'],$fetchedExistingVal['FieldEmail']);
            $newvaluesFieldCol = array($residenceVeri,$EmploymentVeri,$cmbFieldVeriUserType,$FieldEmail);
            $retValuechangeFieldCol =  $objCommon->HasArrayValueChanged($existingFieldCol,$newvaluesFieldCol);
           
            $existingTelCol = array($fetchedExistingVal['OffTelephoneVeri'],$fetchedExistingVal['ResiTelephoneVeri'],$fetchedExistingVal['TeleUsertype'],$fetchedExistingVal['TeleEmail']);
            $newvaluesTeleCol = array($OffTelephoneVeri,$ResiTelephoneVeri,$cmbOffTelephoneUsertype,$OffEmailID);
            $retValuechangeTeleCol =  $objCommon->HasArrayValueChanged($existingTelCol,$newvaluesTeleCol);

          //  echo $retValuechangeTeleCol;

            $exisitingEnrol = array($fetchedExistingVal['EnrollmentVeri'],$fetchedExistingVal['EnrolUsertype'],$fetchedExistingVal['EnrolEmail']);
            $newvaluesEnrollCol = array($EnrolApp,$cmbEnrolVeriUserType,$EnrolEmailID);
            $retValuechangeEnrollCol =  $objCommon->HasArrayValueChanged($exisitingEnrol,$newvaluesEnrollCol);
          
           if (mysql_num_rows($run_initiated) != 0)
             {
             $update="update initiateverification set ResidenceVeri='$residenceVeri',EnrollmentVeri='$EnrolApp',OffTelephoneVeri='$OffTelephoneVeri',ResiTelephoneVeri='$ResiTelephoneVeri',
			EmploymentVeri='$EmploymentVeri',Remark='$remark',InitiatedDate=sysdate(),FieldUsertype='$cmbFieldVeriUserType',FieldEmail='$FieldEmail', 
			TeleUsertype='$cmbOffTelephoneUsertype',TeleEmail='$OffEmailID',EnrolUsertype='$cmbEnrolVeriUserType',EnrolEmail='$EnrolEmailID',Initiatedby='$UserEmailID',
			FieldVeri='$fieldveri',TeleVeri='$teleVeri',EnrolVeri='$enrolveri' where reference_id='".$id."'";			
           //    echo "$update";
	        $add_query1=mysql_query($update);
             }
             else
            {
			$add_new="Insert into initiateverification(reference_id,ResidenceVeri,EnrollmentVeri,OffTelephoneVeri,ResiTelephoneVeri,
			EmploymentVeri,Remark,InitiatedDate,FieldUsertype,FieldEmail, TeleUsertype,TeleEmail,EnrolUsertype,EnrolEmail,Initiatedby,FieldVeri,TeleVeri,EnrolVeri) 
			values('$id','$residenceVeri','$EnrolApp',
			'$OffTelephoneVeri','$ResiTelephoneVeri','$EmploymentVeri','$remark',sysdate(),'$cmbFieldVeriUserType','$FieldEmail',
			'$cmbOffTelephoneUsertype','$OffEmailID','$cmbEnrolVeriUserType','$EnrolEmailID','$UserEmailID','$fieldveri','$teleVeri','$enrolveri')";
		
//echo "$add_new";	

	        $add_query=mysql_query($add_new);
			}
       
	//echo $add_query;

	/*if ($add_query)
	{ 	
			$Msg = 2;
	}
	else
	{
			$Msg = 3;
	}*/


//fetch studentDetail
$select_record="select reference_id,firstname,middlename,lastname,dob,email,password,address,street1,street2,state,district,city,pincode,stdcode,phone,mobile,
phone1,prevUniversity,prevCollege,prevCourse,marks,prefer_day,prefer_time,query,app_date,source,mail_status,update_date,partnername,app_status,employment,business,designation,
income,bankbal,appworking,verificationstatus,Empaddress,Empstreet1,Empstreet2,Empcountry,Empstate,
    Empcity,Emppincode,Empstdcode,Empphone from student_details where reference_id='".$id."'";
$select_query=mysql_query($select_record) or die(mysql_error());
$row= mysql_fetch_row($select_query);
        
if($row)
{    
	$col = array('reference_id','firstname','middlename','lastname','dob','email','password','address','street1','street2','state','district','city','pincode',
	'stdcode','phone','mobile','phone1','prevUniversity','prevCollege','prevCourse','marks','prefer_day','prefer_time','query','app_date','source','mail_status',
	'update_date','partnername','app_status','employment','business','designation','income','bankbal','appworking','verificationstatus','Empaddress','Empstreet1','Empstreet2',
	'Empcountry','Empstate','Empcity','Emppincode','Empstdcode','Empphone');
	$fetch = array_combine($col,$row); 	
	
	$fname=$fetch['firstname'];
	$mname=$fetch['middlename'];
	$lname=$fetch['lastname'];
	$address=$fetch['address'];
	$street1=$fetch['street1'];
	$street2=$fetch['street2'];
	$state=$fetch['state'];
	$district=$fetch['district'];
	$city=$fetch['city'];
	$pincode=$fetch['pincode'];
	$Mobile=$fetch['mobile'];
	$Empaddress=$fetch['Empaddress'];
	$Empstreet1=$fetch['Empstreet1'];
	$Empstreet2=$fetch['Empstreet2'];
	$Empcountry=$fetch['Empcountry'];
	$Empstate=$fetch['Empstate'];
        $Empcity=$fetch['Empcity'];
        $Emppincode=$fetch['Emppincode'];
        $Empstdcode=$fetch['Empstdcode'];
        $Empphone=$fetch['Empphone'];
        $appbusiness=$fetch['business'];
    $appdesignation=$fetch['designation'];

    
}

    $select_query6 = "select * from collegeaddressdetail where reference_id = '$id'";
	$select_record6=mysql_query($select_query6); 
	//or die(mysql_error());	
	$row6= mysql_fetch_row($select_record6);       
    if($row6)
    {     
	$col6 = array('reference_id','address','street1','street2','state','district','city','pincode','stdcode','phone','Email','ContactPerson','college');
	$fetch6 = array_combine($col6,$row6); 
	
      $Coladdress=$fetch6['address'];
      $Colstreet1=$fetch6['street1'];
      $Colstreet2=$fetch6['street2'];
      $Colstate=$fetch6['state'];
      $Coldistrict=$fetch6['district'];
      $Colcity=$fetch6['city'];
      $Colpincode=$fetch6['pincode'];
      $Colstdcode=$fetch6['stdcode'];
      $Colphone=$fetch6['phone'];
	}


$cobo1rrowerid="";
$cobo2rrowerid ="";
$select_query2="Select * from coapplicant_details where reference_id ='".$id."'";
$select_record2=mysql_query($select_query2); 
	        
while ($row_coborrower = @mysql_fetch_assoc($select_record2))
{    
	//$col2 = array('reference_id','coborrowerid','relation','relative','cfirstname','cmiddlename','clastname','cdob',
  //'cpanno','cemail','caddress','cstreet1','cstreet2','cstate','cdistrict','ccity','cpincode','cstdcode','cphone','cmobile','cphone1',
  //'cemployment','cbusiness','cdesignation','cincome','cloan','housingamt','caramt','jeepamt','twowheeleramt','consamt','totamt',
 //'cbankbal','samestudadd','housingemi','caremi','jeepemi','twowheeleremi','consemi','totemi');
	//$fetch2 = array_combine($col2,$row2); 
	
	if($row_coborrower['coborrowerid']=='1')
	{
	$cobo1rrowerid=$row_coborrower['coborrowerid'];
	$Co1_fname=$row_coborrower['cfirstname'];
	$Co1_mname=$row_coborrower['cmiddlename'];
	$Co1_lname=$row_coborrower['clastname'];
	$Co1_Address=$row_coborrower['clastname'];
	$Co1_cstreet1=$row_coborrower['cstreet1'];
	$Co1_cstreet2=$row_coborrower['cstreet2'];
	$Co1_cstate=$row_coborrower['cstate'];
	$Co1_cdistrict=$row_coborrower['cdistrict'];
	$Co1_ccity=$row_coborrower['ccity'];
        $Co1_cpincode=$row_coborrower['cpincode'];
	$Co1_Mobile=$row_coborrower['cmobile'];
	
	$Co1_cempaddress=$row_coborrower['cempaddress'];
	$Co1_cempstreet1=$row_coborrower['cempstreet1'];
	$Co1_cempstreet2=$row_coborrower['cempstreet2'];
	$Co1_cempstate=$row_coborrower['cempstate'];
	$Co1_cempdistrict=$row_coborrower['cempdistrict'];
	$Co1_cempcity=$row_coborrower['cempcity'];
        $Co1_cemppincode=$row_coborrower['cemppincode'];
	$Co1_cempstdcode=$row_coborrower['cempstdcode'];
	$Co1_cempphone=$row_coborrower['cempphone'];
	$Co1_cbusiness=$row_coborrower['cbusiness'];
	$Co1_cdesignation=$row_coborrower['cdesignation'];
	}
	
	if($row_coborrower['coborrowerid']=='2')
	{
	$cobo2rrowerid=$row_coborrower['coborrowerid'];
	$Co2_fname=$row_coborrower['cfirstname'];
	$Co2_mname=$row_coborrower['cmiddlename'];
	$Co2_lname=$row_coborrower['clastname'];
	$Co2_Address=$row_coborrower['clastname'];
	$Co2_cstreet1=$row_coborrower['cstreet1'];
	$Co2_cstreet2=$row_coborrower['cstreet2'];
	$Co2_cstate=$row_coborrower['cstate'];
	$Co2_cdistrict=$row_coborrower['cdistrict'];
	$Co2_ccity=$row_coborrower['ccity'];
        $Co2_cpincode=$row_coborrower['cpincode'];
	$Co2_Mobile=$row_coborrower['cmobile'];
	
	$Co2_cempaddress=$row_coborrower['cempaddress'];
	$Co2_cempstreet1=$row_coborrower['cempstreet1'];
	$Co2_cempstreet2=$row_coborrower['cempstreet2'];
	$Co2_cempstate=$row_coborrower['cempstate'];
	$Co2_cempdistrict=$row_coborrower['cempdistrict'];
	$Co2_cempcity=$row_coborrower['cempcity'];
        $Co2_cemppincode=$row_coborrower['cemppincode'];
	$Co2_cempstdcode=$row_coborrower['cempstdcode'];
	$Co2_cempphone=$row_coborrower['cempphone'];
        $Co2_cdesignation=$row_coborrower['cdesignation'];
        $Co2_cbusiness=$row_coborrower['cbusiness'];
	}	 
}
	

if((mysql_num_rows($select_query) !=0) )
{
	//$add_new="update student_details set verifyagencyname='$AgencyEmail' where reference_id='$id'";
       // $add_query=mysql_query($add_new);
	
	$cc=$partnername.",".$ksfiloanid.",".$UserEmailID;
	$subject ="Verification Initiated for Ref.No.".$id;   //Contact subject
	 // Details
        $fieldveribody="";
	$televeribody="";
	$enrolveribody="";
	
	$body = "";
	$body .= "The Borrower details are as below:\r\n";
	$body .= "Reference ID:".$id."\r\n"; 
	$body .= "Borrower name:".$fname." ".$mname." ".$lname.",\r\n";
	
		if($resiVeriApp =="Borrower")
		{
		    $fieldveribody="Borrower Address:".$address." ".$street1." ".$street2." ".$state." ".$district." ".$city." ".$pincode.",\r\n";
		}
				
		if($EmpveriApp=="Borrower")
		{
			$fieldveribody .= "Borrower Employment Address:".$Empaddress." ".$Empstreet1." ".$Empstreet2." ".$Empcity."  ".$Empstate." ".$Empcountry." ".$Emppincode.",\r\n";
		}
			
        if($ResiTelephoneApp !="")
		{
			$televeribody = "Borrower Mobile:".$Mobile."\r\n\n";
		}
			
		if($OffTeleVeriApp=="Borrower")
		{
			$televeribody .= "Borrower Office telephone Verification:\r\n"; 
			$televeribody .= "Employer Bussiness name:".$appbusiness."\r\n"; 
			$televeribody .= "Designation:".$appdesignation."\r\n"; 
			$televeribody .= "Office Phone No:".$Empstdcode." ".$Empphone."\r\n"; 
		}
				        
        $select_query6 = "select * from collegeaddressdetail where reference_id = '$id'";
		$select_record6=mysql_query($select_query6); //or die(mysql_error());	
		$row6= mysql_fetch_row($select_record6);
		       
	    if($row6)
	    {     
                    $col6 = array('reference_id','address','street1','street2','state','district','city','pincode','stdcode','phone','Email','ContactPerson','college');
                    $fetch6 = array_combine($col6,$row6); 
			
		      $Coladdress=$fetch6['address'];
		      $Colstreet1=$fetch6['street1'];
		      $Colstreet2=$fetch6['street2'];
		      $Colstate=$fetch6['state'];
		      $Coldistrict=$fetch6['district'];
		      $Colcity=$fetch6['city'];
		      $Colpincode=$fetch6['pincode'];
		      $Colstdcode=$fetch6['stdcode'];
		      $Colphone=$fetch6['phone'];
		      $ColContactPerson=$fetch6['ContactPerson'];
	      
		      if($EnrolApp!="")
		      {
                         $enrolveribody .=  "Borrower College Address:".$Coladdress." ".$Colstreet1." ".$Colstreet2." ".$Colcity."  ".$Coldistrict." ".$Colstate." ".$Colpincode.",\r\n";
                         $enrolveribody .=  "Phone No:".$Colstdcode." ".$Colphone." ,\r\n";
		         $enrolveribody .=  "Contact Person Name:".$ColContactPerson." ,\r\n";
		      }
		}


	if($cobo1rrowerid !="")
	{
			$body .= "The CoBorrower-1 details are as below:\r\n";
			$body .= "CoBorrower-1 name:".$Co1_fname." ".$Co1_mname." ".$Co1_lname.",\r\n";
			
			if($resiVeriCOApp1 =="Co-Borrower1")
			{
                            $fieldveribody .= "CoBorrower-1 Address:".$Co1_Address." ".$Co1_cstreet1." ".$Co1_cstreet2." ".$Co1_ccity."  ".$Co1_cdistrict." ".$Co1_cstate." ".$Co1_cpincode.",\r\n";
			}
						
			if($empVeriCoApp1=="Co-Borrower1")
			{
                            $fieldveribody .= "CoBorrower-1 Employment Address:".$Co1_cempaddress." ".$Co1_cempstreet1." ".$Co1_cempstreet2." ".$Co1_cempcity."  ".$Co1_cempdistrict." ".$Co1_cempstate." ".$Co1_cemppincode.",\r\n";
			}
			
			if($ResiTelephoneCoApp1 !="")
			{
                            $televeribody .= "CoBorrower-1 Mobile No:".$Co1_Mobile."\r\n\n";
			}
				   
		      if($OffTelephoneCoApp1!="")
		      {
		      	  $televeribody .= "CoBorrower-1 Office telephone Verification:s\r\n"; 
                          $televeribody .= "Employer Bussiness name:".$Co1_cbusiness."\r\n"; 
                          $televeribody .= "Designation:".$$Co1_cdesignation."\r\n"; 
                          $televeribody .= "Office Phone No:".$Co1_cempstdcode." ".$Co1_cempphone."\r\n"; 
		      }
   }
	
    if($cobo2rrowerid !="")
    {
		    $body .= "The CoBorrower-2 details are as below:\r\n";
			$body .= "CoBorrower-2 name:".$Co2_fname." ".$Co2_mname." ".$Co2_lname.",\r\n";
			
			if($resiVeriCOApp2=="Co-Borrower2")
			{
			  	$fieldveribody .= "CoBorrower-2 Address:".$Co2_Address." ".$Co2_cstreet1." ".$Co2_cstreet2." ".$Co2_ccity."  ".$Co2_cdistrict." ".$Co2_cstate." ".$Co2_cpincode.",\r\n";
			}
			
		
			if($empVeriCoApp2=="Co-Borrower2")
		    {
				$fieldveribody .= "CoBorrower-2 Employment Address:".$Co2_cempaddress." ".$Co2_cempstreet1." ".$Co2_cempstreet2." ".$Co2_cempcity."  ".$Co2_cempdistrict." ".$Co2_cempstate." ".$Co2_cemppincode.",\r\n";
			}
			
			if($ResiTelephoneCoApp2 !="")
			{
			  $televeribody .= "CoBorrower-2 Mobile No:".$Co2_Mobile."\r\n\n";
			}				
				
			 if($OffTelephoneCoApp2!="")
		      {
		      	  $televeribody .= "CoBorrower-2 Office telephone Verification:\r\n"; 
                          $televeribody .= "Employer Bussiness name:".$Co2_cbusiness."\r\n"; 
                          $televeribody .= "Designation:".$$Co2_cdesignation."\r\n"; 
                          $televeribody .= "Office Phone No:".$Co2_cempstdcode." ".$Co2_cempphone."\r\n"; 
		      }
	}	

    $to = "";
    $FieldVeriStatus="";
    $TeleVeriStatus="";
    $EnrolVeriStatus="";	
    
	if($FieldEmail !="" && $retValuechangeFieldCol==true )
	{
		 $FieldEmailFirstName= $objCommon->FetchFirstName($FieldEmail);	
		 $fiverifirstline ="Dear ".$FieldEmailFirstName.",\r\n";
	
		 $fiverifirstline .="The following lead is initiated by KSFi and assigned to you. Please complete the Field Verification as desired and agreed as per KSFi norms with a turnaround time of 24 hours.\r\n\n";
		
	     $Fieldbody =$fiverifirstline.$body;
	     $Fieldbody .=$fieldveribody;	
		 $to = $FieldEmail;
		 $FieldVeriStatus= $objCommon->SendingMail($subject,$Fieldbody,$cc,$to);


	}
	 if($OffEmailID !="" &&  $retValuechangeTeleCol==true )
	{
		 $TeleEmailFirstName= $objCommon->FetchFirstName($OffEmailID );	
		 $televerifirstline ="Dear ".$TeleEmailFirstName.",\r\n";
	
		 $televerifirstline .="The following lead is initiated by KSFi and assigned to you. Please complete the Telephone Verification as desired and agreed as per KSFi norms with a turnaround time of 24 hours.\r\n\n";
	
	     $telebody =$televerifirstline .$body;
		 $telebody .=$televeribody;
		 $to = $OffEmailID;
		$TeleVeriStatus= $objCommon->SendingMail($subject,$telebody,$cc,$to);
	}
	 if($EnrolEmailID !="" && $retValuechangeEnrollCol==true)
	{
		$EnrolEmailFirstName= $objCommon->FetchFirstName($EnrolEmailID);	
		$Enrolverifirstline ="Dear ".$EnrolEmailFirstName.",\r\n";
	
		$Enrolverifirstline .="The following lead is initiated by KSFi and assigned to you. Please complete the Enrolment Verification as desired and agreed as per KSFi norms with a turnaround time of 24 hours.\r\n\n";
	    
	    $Enrolbody =$Enrolverifirstline .$body;
	
		$Enrolbody .=$enrolveribody;
		//echo($Enrolbody);
		$to = $EnrolEmailID;
		$EnrolVeriStatus= $objCommon->SendingMail($subject,$Enrolbody,$cc,$to);
	}
	
  	  	
  	/*if($FieldVeriStatus=="0")
  	{
  	 $FieldVeriStatus="Initiated";
  	}
  	else if($FieldVeriStatus=="1")
  	{
  	$FieldVeriStatus="Initiated Send Failed";
  	}

  	
  	if($TeleVeriStatus=="0")
  	{
  	 $TeleVeriStatus="Initiated";
  	}
  	else if($TeleVeriStatus=="1")
  	{
  	$TeleVeriStatus="Initiated Send Failed";
  	}


    if($EnrolVeriStatus=="0")
  	{
  	 $EnrolVeriStatus="Initiated";
  	}
  	else if($EnrolVeriStatus=="1")
  	{
  	$EnrolVeriStatus="Initiated Send Failed";
  	}*/
  	$VeriStatus="";
  	
  	if($FieldVeriStatus==Initiated_Fail || $TeleVeriStatus==Initiated_Fail || $EnrolVeriStatus==Initiated_Fail)
  	{
  	$VeriStatus="Initiated Send Failed";
  	$Msg="12";
  	}
  	else if($FieldVeriStatus==Initiated && $TeleVeriStatus==Initiated && $EnrolVeriStatus==Initiated){
  	$VeriStatus="Initiated";
  	$Msg="11";
  	}
 // echo $FieldVeriStatus;
 // echo $VeriStatus;
 	 	
	$add_new1="update InitiateVerification set ResiVeriStatus='$FieldVeriStatus',EmpVeriStatus='$FieldVeriStatus',OffTeleVeriStatus='$TeleVeriStatus',ResiTeleVeriStatus='$TeleVeriStatus',
	EnrolVeriStatus='$EnrolVeriStatus' where reference_id='".$id."'";
    $add_query1=mysql_query($add_new1);
    //echo $add_new1;
      
    $add_new2="update student_details set VerificationStatus='$VeriStatus' where reference_id='$id'";
    $add_query2=mysql_query($add_new2);
				$Msg= 11;
    header("Location: ./AppStatusDetails.php?Msg=".$Msg);
}
mysql_close($con);
ob_flush();
?>