<?php

ob_start();

session_start();



include('common/class_Common.php');



$objCommon=new Common();

if( $_POST['refID']!="")

{ 

     $reference_id=$_POST['refID'];

}

elseif( $_SESSION['id']!="")

{ 

$reference_id=$_SESSION['id'];

}

else



$reference_id=$_POST['no'];



if($_SESSION['usertype'] == 'Partner')

    $source = $_SESSION['firstname'];

else if($_SESSION['usertype'] == 'Employee')

    $source = $_SESSION['KSFi'];

else

    $source = 'Applicant';



$loantype=$_POST['loantype'];




$firstname=$_POST['firstname'];

$middlename = $_POST['middlename'];

$lastname = $_POST['lastname'];

$dob = date("Y-m-d",strtotime($_POST['datepicker']));

$adharcardno = $_POST['adharcardno'];

$panno = $_POST['panno'];



$gender=$_POST['gender'];

$marital_status=$_POST['marital_status'];

$email = $_POST['email'];

if($loantype=='Others')
{
$bankdetails=$_POST['bankdetails'];

$branchadd = $_POST['branchadd'];

$accountNo=$_POST['accountNo'];

$accountholder=$_POST['accountholder'];

$bankname = $_POST['bankname'];

$branchname=$_POST['branchname'];

$ifsccode = $_POST['ifsccode'];

$micr = $_POST['micr'];
if(isset($_POST['AssetType']))
	{

      $AssetType=$_POST['AssetType'];

      $AssetName=$_POST['AssetName'];

	  $AssetBrand=$_POST['AssetBrand'];
	}

}
else
{
$bankdetails="No";

$branchadd = "";

$accountNo="";

$bankname = "";

$branchname="";

$ifsccode = "";

$micr = "";

$AssetType="";

$AssetName="";

$AssetBrand="";
}



$mail=explode("@",$email);

$password = $mail[0];

$address = $_POST['address'];

$street1 = $_POST['street1'];

$street2 = $_POST['street2'];





$loanrequiredforcourseType = $_POST['loanrequiredforcourseType'];


if($loantype=='Others')
{
	$typeofLoan=$_POST['typeofLoan'];
	
}
else
{
	$typeofLoan=$loanrequiredforcourseType;

	
}
$vehicleloanType=$_POST['vehicleloanType'];


$state = $_POST['country1'];

$mstate= $_POST['country'];
if($mstate!="")

{

    $state=$mstate;

}

$district =$_POST['state1'];

$mdistinct=$_POST['state'];

if($mdistinct!="")

{   

    $district=$mdistinct;  

}

$city = $_POST['city1'];

$mcity=$_POST['city'];

if($mcity!="")

{  

    $city=$mcity;   

}


$yearsInResidence= $_POST['yearsInResidence'];

$ResidentialStatus= $_POST['ResidentialStatus'];

$residentialstatus_others= $_POST['residentialstatus_others'];


if(isset($_POST['sameadd']))

{

$per_same=$_POST['sameadd'];

}

else

{

$per_same=$_POST['sameadd'];

}

$per_address = $_POST['per_address'];

$per_street1 = $_POST['per_street1'];

$per_street2 = $_POST['per_street2'];

$per_state = $_POST['per_country1'];



$mstate1= $_POST['per_country'];
if($mstate1!="")

{

    $per_state=$mstate1;

}

$per_district =$_POST['per_state1'];

$mdistinct1=$_POST['per_stateSelect'];

if($mdistinct1!="")

{   

    $per_district=$mdistinct1;  

}

$per_city = $_POST['per_city1'];

$mcity1=$_POST['per_citySelect'];

if($mcity1!="")

{  

    $per_city=$mcity1;   

}



$pincode=stripslashes(trim($_POST['pincode']));

$stdcode=stripslashes(trim($_POST['stdcode']));

$phone=stripslashes(trim($_POST['phone']));

$mobile=stripslashes(trim($_POST['mobile']));

$phone1=stripslashes(trim($_POST['phone1']));



//start Applicant employemnt Address:

$empaddress = $_POST['Empaddress'];

$empstreet1 = $_POST['Empstreet1'];

$empstreet2 = $_POST['Empstreet2'];

$empstate = $_POST['Empcountry1'];

$mempstate = $_POST['Empcountry'];

if($mempstate !="")

{

    $empstate =$mempstate ;

}

$empdistrict = $_POST['Empstate1'];

$mempdistrict = $_POST['Empstate'];

if($mempdistrict !="")

{

    $empdistrict =$mempdistrict ;

}

$empcity = $_POST['Empcity1'];

$mempcity = $_POST['Empcity'];

if($mempcity !="")

{

    $empcity =$mempcity ;

}



$emppincode=stripslashes(trim($_POST['Emppincode']));

$empstdcode=stripslashes(trim($_POST['Empstdcode']));

$empphone=stripslashes(trim($_POST['Empphone']));

$BusiRec = $_POST['BusiRec'];



//end Applicant employemnt Address;



$prevUniversity = $_POST['prevUniversity'];

$prevCollege = $_POST['prevCollege'];

$prevCourse = $_POST['prevCourse'];

$category_prevcourse = $_POST['category_prevcourse'];

if($category_prevcourse=='Select')

$category_prevcourse='';

$category_prevcourseothers = $_POST['category_prevcourseothers'];




if($_POST['Percentage']!='')
{
$marks = $_POST['Percentage'];
}
elseif($_POST['CGPA_Grade']!='')
{
$marks = $_POST['CGPA_Grade'];
}
elseif($_POST['CGPA_Gradepoints']!='')
{
$marks = $_POST['CGPA_Gradepoints']." outof ". $_POST['CGPA_outof_GradePoint'];
}

$MaxmarksObtainedIn=$_POST['marks'];



$entranceTest=$_POST['entranceTest'];

if($entranceTest=='Yes')
{
	$typeoftest=$_POST["writtentest"];

	$nameofEntTest=$_POST['nameofEntTest'];

	$entranceScore = $_POST["entrancetestscore"];

	$specifyotherTest = $_POST["specifyotherTest"];

	$GDScore=$_POST["GDScore"];

	$PIScore=$_POST["PIScore"];
}
else
{
  $typeoftest="";
  
  $specifyotherTest="";
  
  $GDScore=0;
  
  $PIScore=0;

}


$appworking=$_POST['work'];

$employment=$_POST['employment'];

$employment_other=$_POST['employment_other'];




$business=$_POST['business'];


$designation=$_POST['designation'];

$yearsInEmployement=$_POST['yearsInEmployement'];

$income=$_POST['income'];

$bankbal=$_POST['bankbal'];

if($bankbal== '')

$bankbal=0;





$prefer_day = "";



if(isset($_POST['anyday']))

    $prefer_day .= 'Any Day.';



if(isset($_POST['monday']))

    $prefer_day .= 'Monday.';



if(isset($_POST['tuesday']))

    $prefer_day .= 'Tuesday.';



if(isset($_POST['wednesday']))

    $prefer_day .= 'Wednesday.';



if(isset($_POST['thursday']))

    $prefer_day .= 'Thursday.';



if(isset($_POST['friday']))

    $prefer_day .= 'Friday.';



if(isset($_POST['saturday']))

    $prefer_day .= 'Saturday.';



if(isset($_POST['sunday']))

    $prefer_day .= 'Sunday.';







$prefer_time = "";

if(isset($_POST['anytime']))

    $prefer_time.= 'Any Time.';



if(isset($_POST['morning']))

    $prefer_time.= $_POST['morning_time'].'.';



if(isset($_POST['afternoon']))

    $prefer_time.= $_POST['afternoon_time'].'.';



if(isset($_POST['evening']))

    $prefer_time.= $_POST['evening_time'].'.';



$query = $_POST['query'];

$studyCountry = $_POST['studyCountry'];

$otherCountry = $_POST['otherCountry'];

$university = $_POST['university'];

$college = $_POST['college'];




//Start College Address:

$Coladdress = $_POST['Coladdress'];

$Colstreet1 = $_POST['Colstreet1'];

$Colstreet2 = $_POST['Colstreet2'];

$Colstate = $_POST['Colcountry1'];

$mColstate = $_POST['Colcountry'];

if($mColstate !="")

{

    $Colstate =$mColstate;

}



$Coldistrict = $_POST['Colstate1'];

$mColdistrict = $_POST['Colstate'];

if($mColdistrict !="")

{

    $Coldistrict =$mColdistrict ;

}



$Colcity = $_POST['Colcity1'];

$mColcity = $_POST['Colcity'];

if($mColcity !="")

{

    $Colcity =$mColcity ;

}

if(isset($_POST['csameadd']))

{

$cper_same=$_POST['csameadd'];

}

else

{

$cper_same=$_POST['csameadd'];

}

$cper_address = $_POST['cper_address'];

$cper_street1 = $_POST['cper_street1'];

$cper_street2 = $_POST['cper_street2'];

$cper_state = $_POST['cper_country1'];





$cmstate1= $_POST['cper_country'];
if($cmstate1!="")

{

    $cper_state=$cmstate1;

}

$cper_district =$_POST['cper_state1'];

$cmdistinct1=$_POST['cper_stateSelect'];

if($cmdistinct1!="")

{   

    $cper_district=$cmdistinct1;  

}

$cper_city = $_POST['cper_city1'];

$cmcity1=$_POST['cper_citySelect'];

if($cmcity1!="")

{  

    $cper_city=$cmcity1;   

}





$Colpincode=stripslashes(trim($_POST['Colpincode']));

$Colstdcode=stripslashes(trim($_POST['Colstdcode']));

$Colphone=stripslashes(trim($_POST['Colphone']));



$ContactPName=$_POST['ContactPName'];

$CollegeEmail=$_POST['CollegeEMail'];

//end college Address:

$course = $_POST['course'];



$courseCatgry1= $_POST['courseCategory1'];

if($courseCatgry1!='')

{

  $courseCategory= $_POST['courseCategory1'];
}
else
{
   $courseCategory= $_POST['courseCategory'];
}

$otherCourse = $_POST['otherCourse'];

$typeCourse = $_POST['courseType'];




$loanMonth = $_POST['loanMonth'];

$loanYear = $_POST['loanYear1'];

$loanYear1=$_POST['loanYear'];



if($loanYear1!="")

{

    $loanYear=$loanYear1;

}



$duedate = date("Y-m-d",strtotime($_POST['datepicker2']));

$totalfees=stripslashes(trim($_POST['totalfees']));

$amount = stripslashes(trim($_POST['amount']));

$SelfContribution=stripslashes(trim($_POST['SelfContribution']));

$duration = $_POST['duration'];

$durationIn = $_POST['DurationIn'];

$security = $_POST['security'];






if($SelfContribution == '')

$SelfContribution = 0;


if($totalfees == '')

$totalfees = 0;

//start Applicant Assets  :

$assets=$_POST['assets'];


$immovablePropertyvalue=stripslashes(trim($_POST['immovablePropertyvalue']));


$governmentsecuritiesvalue=stripslashes(trim($_POST['governmentsecuritiesvalue']));


$insurancepoliciesvalue=stripslashes(trim($_POST['insurancepoliciesvalue']));


$chits_kurisvalue=stripslashes(trim($_POST['chits_kurisvalue']));


$sharesvalue=stripslashes(trim($_POST['sharesvalue']));


$MFsvalue=stripslashes(trim($_POST['MFsvalue']));


$debenturesvalue=stripslashes(trim($_POST['debenturesvalue']));


$BankFixedDepositsvalue=stripslashes(trim($_POST['BankFixedDepositsvalue']));


$ProvidentFundvalue=stripslashes(trim($_POST['ProvidentFundvalue']));


$GoldOrnamentsvalue=stripslashes(trim($_POST['GoldOrnamentsvalue']));


$VehiclesSelfOwnedvalue=stripslashes(trim($_POST['VehiclesSelfOwnedvalue']));


$OtherAssetsvalue=stripslashes(trim($_POST['OtherAssetsvalue']));

$totAssets=stripslashes(trim($_POST['totAssets']));




$immovablePropertyCollateral=$_POST['immovablePropertyCollateral'];


$governmentsecuritiesCollateral=$_POST['governmentsecuritiesCollateral'];


$insurancepoliciesCollateral=$_POST['insurancepoliciesCollateral'];


$chits_kurisCollateral=$_POST['chits_kurisCollateral'];


$sharesCollateral=$_POST['sharesCollateral'];


$MFsCollateral=$_POST['MFsCollateral'];


$debenturesCollateral=$_POST['debenturesCollateral'];


$BankFixedDepositsCollateral=$_POST['BankFixedDepositsCollateral'];


$ProvidentFundCollateral=$_POST['ProvidentFundCollateral'];


$GoldOrnamentsCollateral=$_POST['GoldOrnamentsCollateral'];


$VehiclesSelfOwnedCollateral=$_POST['VehiclesSelfOwnedCollateral'];


$OtherAssetsCollateral=$_POST['OtherAssetsCollateral'];


//end  Applicant Assets  :




$relation = $_POST['relation'];

$relative = $_POST['relative'];

$cfirstname = $_POST['cfirstname'];

$cmiddlename = $_POST['cmiddlename'];

$clastname = $_POST['clastname'];

$cdob = date("Y-m-d",strtotime($_POST['datepicker1']));

$cadharcardno = $_POST['cadharcardno'];

$cpanno = $_POST['cpanno'];

$cemail =$_POST['cemail'];


$cbankdetails=$_POST['cbankdetails'];

$cbranchadd = $_POST['cbranchadd'];

$caccountNo=$_POST['caccountNo'];

$caccountholder=$_POST['caccountholder'];

$cbankname = $_POST['cbankname'];

$cbranchname=$_POST['cbranchname'];

$cifsccode = $_POST['cifsccode'];

$cmicr = $_POST['cmicr'];




$caddress =$_POST['caddress'];

$cstreet1 =$_POST['cstreet1'];

$cstreet2 =$_POST['cstreet2'];

if(isset($_POST['same']))

{

    $csame=$_POST['same'];

}

else

{

    $csame=$_POST['same'];

}

$cstate=$_POST['ccountry'];

if($cstate=='')

    $cstate =$_POST['ccountry1'];



$cdistrict =$_POST['cstate'];

if($cdistrict=='')

    $cdistrict =$_POST['cstate1'];



$ccity =$_POST['ccity'];

if($ccity =='')

    $ccity =$_POST['ccity1'];
	




$cyearsInResidence = $_POST['cyearsInResidence1'];

if($cyearsInResidence == '')

$cyearsInResidence =$_POST['cyearsInResidence'];



$cResidentialStatus = $_POST['cResidentialStatus1'];

if($cResidentialStatus == '')

$cResidentialStatus =$_POST['cResidentialStatus'];


$cresidentialstatus_others= $_POST['cresidentialstatus_others'];


if(isset($_POST['cosameadd']))

{

$coper_same=$_POST['cosameadd'];

}

else

{

$coper_same=$_POST['cosameadd'];

}

$coper_address = $_POST['coper_address'];

$coper_street1 = $_POST['coper_street1'];

$coper_street2 = $_POST['coper_street2'];

$coper_state = $_POST['coper_country1'];





$comstate1= $_POST['coper_country'];
if($comstate1!="")

{

    $coper_state=$comstate1;

}

$coper_district =$_POST['coper_state1'];

$comdistinct1=$_POST['coper_stateSelect'];

if($comdistinct1!="")

{   

    $coper_district=$comdistinct1;  

}

$coper_city = $_POST['coper_city1'];

$comcity1=$_POST['coper_citySelect'];

if($comcity1!="")

{  

    $coper_city=$comcity1;   

}


 
 


$cpincode=stripslashes(trim($_POST['cpincode']));

$cstdcode=stripslashes(trim($_POST['cstdcode']));

$cphone=stripslashes(trim($_POST['cphone']));

$cmobile=stripslashes(trim($_POST['cmobile']));

$cphone1=stripslashes(trim($_POST['cphone1']));

$cemployment =$_POST['cemployment'];


$cemployment_other=$_POST['cemployment_other'];


$cbusiness =$_POST['cbusiness'];



//start employemnt Co-Borrower 1 Address:

$cempaddress= $_POST['cempaddress'];

$cempstreet1= $_POST['cempstreet1'];

$cempstreet2= $_POST['cempstreet2'];

$cempState= $_POST['cempcountry1'];

$mcempState= $_POST['cempcountry'];

if($mcempState!="")

{

    $cempState=$mcempState;

}



$cempdistinct= $_POST['cempstate1'];

$mcempdistinct= $_POST['cempstate'];

if($mcempdistinct!="")

{

    $cempdistinct=$mcempdistinct;

}



$cempcity= $_POST['cempcity1'];

$mcempcity= $_POST['cempcity'];

if($mcempcity!="")

{

    $cempcity=$mcempcity;

}



$cemppincode=stripslashes(trim($_POST['cemppincode']));

$cempstdcode=stripslashes(trim($_POST['cempstdcode']));

$cempphone=stripslashes(trim($_POST['cempphone']));



//end employemnt Co-Borrower 1 Address;



$cdesignation =$_POST['cdesignation'];

$cyearsInEmployement =$_POST['cyearsInEmployement'];


//start Co-Borrower 1 Assets  :


$cassets=$_POST['cassets'];

$cimmovablePropertyvalue=stripslashes(trim($_POST['cimmovablePropertyvalue']));


$cgovernmentsecuritiesvalue=stripslashes(trim($_POST['cgovernmentsecuritiesvalue']));


$cinsurancepoliciesvalue=stripslashes(trim($_POST['cinsurancepoliciesvalue']));


$cchits_kurisvalue=stripslashes(trim($_POST['cchits_kurisvalue']));


$csharesvalue=stripslashes(trim($_POST['csharesvalue']));


$cMFsvalue=stripslashes(trim($_POST['cMFsvalue']));


$cdebenturesvalue=stripslashes(trim($_POST['cdebenturesvalue']));


$cBankFixedDepositsvalue=stripslashes(trim($_POST['cBankFixedDepositsvalue']));


$cProvidentFundvalue=stripslashes(trim($_POST['cProvidentFundvalue']));


$cGoldOrnamentsvalue=stripslashes(trim($_POST['cGoldOrnamentsvalue']));


$cVehiclesSelfOwnedvalue=stripslashes(trim($_POST['cVehiclesSelfOwnedvalue']));


$cOtherAssetsvalue=stripslashes(trim($_POST['cOtherAssetsvalue']));


$ctotAssets=stripslashes(trim($_POST['ctotAssets']));




$cimmovablePropertyCollateral=$_POST['cimmovablePropertyCollateral'];


$cgovernmentsecuritiesCollateral=$_POST['cgovernmentsecuritiesCollateral'];


$cinsurancepoliciesCollateral=$_POST['cinsurancepoliciesCollateral'];


$cchits_kurisCollateral=$_POST['cchits_kurisCollateral'];


$csharesCollateral=$_POST['csharesCollateral'];


$cMFsCollateral=$_POST['cMFsCollateral'];


$cdebenturesCollateral=$_POST['cdebenturesCollateral'];


$cBankFixedDepositsCollateral=$_POST['cBankFixedDepositsCollateral'];


$cProvidentFundCollateral=$_POST['cProvidentFundCollateral'];


$cGoldOrnamentsCollateral=$_POST['cGoldOrnamentsCollateral'];


$cVehiclesSelfOwnedCollateral=$_POST['cVehiclesSelfOwnedCollateral'];


$cOtherAssetsCollateral=$_POST['cOtherAssetsCollateral'];


//end  Co-Borrower 1 Assets  :



$cincome =$_POST['cincome'];

$cloan =$_POST['cloan'];



$chousingamt=stripslashes(trim($_POST['housingamt']));

$ccaramt=stripslashes(trim($_POST['caramt']));

$cjeepamt=stripslashes(trim($_POST['jeepamt']));

$ctwowheeleramt=stripslashes(trim($_POST['twowheeleramt']));

$cconsamt=stripslashes(trim($_POST['consamt']));

$ctotamt=stripslashes(trim($_POST['totamount']));

$chousingemi=stripslashes(trim($_POST['housingemi']));

$ccaremi=stripslashes(trim($_POST['caremi']));

$cjeepemi=stripslashes(trim($_POST['jeepemi']));

$ctwowheeleremi=stripslashes(trim($_POST['twowheeleremi']));

$cconsemi=stripslashes(trim($_POST['consemi']));

$ctotemi=stripslashes(trim($_POST['totemi']));

$cbankbal =stripslashes(trim($_POST['cbankbal']));


if($loantype=='Others')
{
	if(isset($_POST['chkpanel1']))

	{

		$coborrower1 = 'Co-Borrower1';

	}

	else

	{

		$coborrower1 = '';

	}
}
else
{

$coborrower1 = 'Co-Borrower1';
}


if(isset($_POST['chkpanel2']))

{

    $coborrower2 = 'Co-Borrower2';

}

else

{

    $coborrower2 = '';

}



$corelation = $_POST['corelation'];

$corelative = $_POST['corelative'];

$cofirstname = $_POST['cofirstname'];

$comiddlename = $_POST['comiddlename'];

$colastname = $_POST['colastname'];

$codob = date("Y-m-d",strtotime($_POST['datepicker3']));

$coadharcardno = $_POST['coadharcardno'];

$copanno = $_POST['copanno'];

$coemail =$_POST['coemail'];

$cobankdetails=$_POST['cobankdetails'];

$cobranchadd = $_POST['cobranchadd'];

$coaccountNo=$_POST['coaccountNo'];

$coaccountholder=$_POST['coaccountholder'];

$cobankname = $_POST['cobankname'];

$cobranchname=$_POST['cobranchname'];

$coifsccode = $_POST['coifsccode'];

$comicr = $_POST['comicr'];






$coaddress =$_POST['coaddress'];

$costreet1 =$_POST['costreet1'];

$costreet2 =$_POST['costreet2'];

if(isset($_POST['cosame']))

{

    $cosame=$_POST['cosame'];

}

else

{

    $cosame=$_POST['cosame'];

}

$costate=$_POST['cocountry'];

if($costate=='')

$costate =$_POST['cocountry1'];



$codistrict =$_POST['costate'];

if($codistrict=='')

    $codistrict =$_POST['costate1'];



$cocity =$_POST['cocity'];

if($cocity=='')

    $cocity =$_POST['cocity1'];
	
	
	
$coyearsInResidence =$_POST['coyearsInResidence1'];
if($coyearsInResidence == '')

    $coyearsInResidence =$_POST['coyearsInResidence'];
	
	
	
	$coResidentialStatus= $_POST['coResidentialStatus1'];

if($coResidentialStatus == '')

    $coResidentialStatus =$_POST['coResidentialStatus'];


$coresidentialstatus_others= $_POST['coresidentialstatus_others'];

echo $coresidentialstatus_others;
$copincode=stripslashes(trim($_POST['copincode']));

$costdcode=stripslashes(trim($_POST['costdcode']));

$cophone=stripslashes(trim($_POST['cophone']));

$comobile=stripslashes(trim($_POST['comobile']));

$cophone1=stripslashes(trim($_POST['cophone1']));

$coemployment =$_POST['coemployment'];

$coemployment_other=$_POST['coemployment_other'];

$cobusiness =$_POST['cobusiness'];

$codesignation =$_POST['codesignation'];

$coyearsInEmployement =$_POST['coyearsInEmployement'];




//start Co-Borrower2 employment Address:

$coempaddress= $_POST['coempaddress'];

$coempstreet1= $_POST['coempstreet1'];

$coempstreet2= $_POST['coempstreet2'];

$coempstate= $_POST['coempcountry1'];

$mcoempstate= $_POST['coempcountry'];

if($mcoempstate!="")

{

    $coempstate=$mcoempstate;

}



$coempdistinct= $_POST['coempstate1'];

$mcoempdistinct= $_POST['coempstate'];

if($mcoempdistinct!="")

{

    $coempdistinct=$mcoempdistinct;

}



$coempcity= $_POST['coempcity1'];

$mcoempcity= $_POST['coempcity'];

if($mcoempcity !="")

{

    $coempcity=$mcoempcity;

}



$coemppincode=stripslashes(trim($_POST['coemppincode']));

$coempstdcode=stripslashes(trim($_POST['coempstdcode']));

$coempphone=stripslashes(trim($_POST['coempphone']));

//end Co-Borrower2 employment  Address:



//start Co-Borrower 2 Assets :


$coassets=$_POST['coassets'];

$coimmovablePropertyvalue=stripslashes(trim($_POST['coimmovablePropertyvalue']));


$cogovernmentsecuritiesvalue=stripslashes(trim($_POST['cogovernmentsecuritiesvalue']));


$coinsurancepoliciesvalue=stripslashes(trim($_POST['coinsurancepoliciesvalue']));


$cochits_kurisvalue=stripslashes(trim($_POST['cochits_kurisvalue']));


$cosharesvalue=stripslashes(trim($_POST['cosharesvalue']));


$coMFsvalue=stripslashes(trim($_POST['coMFsvalue']));


$codebenturesvalue=stripslashes(trim($_POST['codebenturesvalue']));


$coBankFixedDepositsvalue=stripslashes(trim($_POST['coBankFixedDepositsvalue']));


$coProvidentFundvalue=stripslashes(trim($_POST['coProvidentFundvalue']));


$coGoldOrnamentsvalue=stripslashes(trim($_POST['coGoldOrnamentsvalue']));


$coVehiclesSelfOwnedvalue=stripslashes(trim($_POST['coVehiclesSelfOwnedvalue']));


$coOtherAssetsvalue=stripslashes(trim($_POST['coOtherAssetsvalue']));

$cototAssets=stripslashes(trim($_POST['cototAssets']));





$coimmovablePropertyCollateral=$_POST['coimmovablePropertyCollateral'];


$cogovernmentsecuritiesCollateral=$_POST['cogovernmentsecuritiesCollateral'];


$coinsurancepoliciesCollateral=$_POST['coinsurancepoliciesCollateral'];


$cochits_kurisCollateral=$_POST['cochits_kurisCollateral'];


$cosharesCollateral=$_POST['cosharesCollateral'];


$coMFsCollateral=$_POST['coMFsCollateral'];


$codebenturesCollateral=$_POST['codebenturesCollateral'];


$coBankFixedDepositsCollateral=$_POST['coBankFixedDepositsCollateral'];


$coProvidentFundCollateral=$_POST['coProvidentFundCollateral'];


$coGoldOrnamentsCollateral=$_POST['coGoldOrnamentsCollateral'];


$coVehiclesSelfOwnedCollateral=$_POST['coVehiclesSelfOwnedCollateral'];


$coOtherAssetsCollateral=$_POST['coOtherAssetsCollateral'];



//end  Co-Borrower 2 Assets : 




$coincome =$_POST['coincome'];

$coloan =$_POST['coloan'];

$cohousingamt=stripslashes(trim($_POST['cohousingamt']));

$cocaramt=stripslashes(trim($_POST['cocaramt']));

$cojeepamt=stripslashes(trim($_POST['cojeepamt']));

$cotwowheeleramt=stripslashes(trim($_POST['cotwowheeleramt']));

$coconsamt=stripslashes(trim($_POST['coconsamt']));

$cototamt=stripslashes(trim($_POST['cototamount']));



$cohousingemi=stripslashes(trim($_POST['cohousingemi']));

$cocaremi=stripslashes(trim($_POST['cocaremi']));

$cojeepemi=stripslashes(trim($_POST['cojeepemi']));

$cotwowheeleremi=stripslashes(trim($_POST['cotwowheeleremi']));

$coconsemi=stripslashes(trim($_POST['coconsemi']));

$cototemi=stripslashes(trim($_POST['cototemi']));

$cobankbal =stripslashes(trim($_POST['cobankbal']));





/*if($phone == '')



$phone=0;



if($mobile == '')



$mobile=0;



if($phone1 == '')



$phone1=0;



if($stdcode == '')



$stdcode=0;





if($pincode == '')



$pincode=0;

*/







/*if($cphone == '')



$cphone=0;



if($cmobile == '')



$cmobile=0;



if($cphone1 == '')



$cphone1 =0;



if($cstdcode == '')



$cstdcode=0; 



if($cpincode == '')



$cpincode=0;

*/









/*if($cophone == '')



$cophone=0;



if($comobile == '')



$comobile=0;



if($cophone1 == '')



$cophone1 =0;



if($costdcode == '')



$costdcode=0; 



if($copincode == '')



$copincode=0;*/


if($immovablePropertyvalue== '')


$immovablePropertyvalue=0;


if($governmentsecuritiesvalue== '')


$governmentsecuritiesvalue=0;


if($insurancepoliciesvalue== '')


$insurancepoliciesvalue=0;


if($chits_kurisvalue== '')


$chits_kurisvalue=0;

if($sharesvalue== '')


$sharesvalue=0;


if($MFsvalue== '')

$MFsvalue=0;


if($debenturesvalue== '')

$debenturesvalue=0;


if($BankFixedDepositsvalue== '')

$BankFixedDepositsvalue=0;


if($ProvidentFundvalue== '')

$ProvidentFundvalue=0;



if($GoldOrnamentsvalue== '')

$GoldOrnamentsvalue=0;



if($VehiclesSelfOwnedvalue== '')


$VehiclesSelfOwnedvalue=0;


if($OtherAssetsvalue== '')


$OtherAssetsvalue=0;

if($totAssets== '')


$totAssets=0;






if($cimmovablePropertyvalue== '')


$cimmovablePropertyvalue=0;


if($cgovernmentsecuritiesvalue== '')

$cgovernmentsecuritiesvalue=0;


if($cinsurancepoliciesvalue== '')

$cinsurancepoliciesvalue=0;


if($cchits_kurisvalue== '')

$cchits_kurisvalue=0;

if($csharesvalue== '')

$csharesvalue=0;


if($cMFsvalue== '')

$cMFsvalue=0;


if($cdebenturesvalue== '')

$cdebenturesvalue=0;


if($cBankFixedDepositsvalue== '')

$cBankFixedDepositsvalue=0;


if($cProvidentFundvalue== '')

$cProvidentFundvalue=0;



if($cGoldOrnamentsvalue== '')

$cGoldOrnamentsvalue=0;



if($cVehiclesSelfOwnedvalue== '')


$cVehiclesSelfOwnedvalue=0;


if($cOtherAssetsvalue== '')


$cOtherAssetsvalue=0;

if($ctotAssets== '')


$ctotAssets=0;





if($coimmovablePropertyvalue== '')


$coimmovablePropertyvalue=0;


if($cogovernmentsecuritiesvalue== '')

$cogovernmentsecuritiesvalue=0;


if($coinsurancepoliciesvalue== '')

$coinsurancepoliciesvalue=0;


if($cochits_kurisvalue== '')

$cochits_kurisvalue=0;

if($cosharesvalue== '')

$cosharesvalue=0;


if($coMFsvalue== '')

$coMFsvalue=0;


if($codebenturesvalue== '')

$codebenturesvalue=0;


if($coBankFixedDepositsvalue== '')

$coBankFixedDepositsvalue=0;


if($coProvidentFundvalue== '')

$coProvidentFundvalue=0;



if($coGoldOrnamentsvalue== '')

$coGoldOrnamentsvalue=0;



if($coVehiclesSelfOwnedvalue== '')


$coVehiclesSelfOwnedvalue=0;


if($coOtherAssetsvalue== '')


$coOtherAssetsvalue=0;


if($cototAssets== '')


$cototAssets=0;




if($amount == '')



$amount =0;



if($chousingamt== '')



$chousingamt=0;



if($ccaramt== '')



$ccaramt=0;



if($cjeepamt== '')



$cjeepamt=0;



if($ctwowheeleramt== '')



$ctwowheeleramt=0;



if($cconsamt== '')



$cconsamt=0;



if($ctotamt== '')



$ctotamt=0;



if($cbankbal== '')



$cbankbal=0;



if($chousingemi== '')



$chousingemi=0;



if($ccaremi== '')



$ccaremi=0;



if($cjeepemi== '')



$cjeepemi=0;



if($ctwowheeleremi== '')



$ctwowheeleremi=0;



if($cconsemi== '')



$cconsemi=0;



if($ctotemi== '')



$ctotemi=0;





if($cohousingamt== '')



$cohousingamt=0;



if($cocaramt== '')



$cocaramt=0;



if($cojeepamt== '')



$cojeepamt=0;



if($cotwowheeleramt== '')



$cotwowheeleramt=0;



if($coconsamt== '')



$coconsamt=0;



if($cototamt== '')



$cototamt=0;



if($cobankbal== '')



$cobankbal=0;



if($cohousingemi== '')



$cohousingemi=0;



if($cocaremi== '')



$cocaremi=0;



if($cojeepemi== '')



$cojeepemi=0;



if($cotwowheeleremi== '')



$cotwowheeleremi=0;



if($coconsemi== '')



$coconsemi=0;



if($cototemi== '')



$cototemi=0;



 $state= $objCommon->GetStateName($state);

 echo($state);



 $cstate= $objCommon->GetStateName($cstate);

 echo($cstate);

 

 $costate= $objCommon->GetStateName($costate);

 echo($costate);



$empstate = $objCommon->GetStateName($empstate);

 echo($empstate);



$Colstate = $objCommon->GetStateName($Colstate);

 echo($Colstate);



$cempState= $objCommon->GetStateName($cempState);

 echo($cempState);



$coempstate= $objCommon->GetStateName($coempstate);

 echo($coempstate);





//database connection

include('./connection.php');



//to send the information into the database

$select_record="Select * from student_details where reference_id='".$reference_id."'";
$select_query=mysql_query($select_record) or die(mysql_error());



if((mysql_num_rows($select_query) != 0))

{	

	//inserting student details

	$add_new="UPDATE  student_details SET firstname='$firstname',middlename='$middlename',lastname='$lastname',dob='$dob',
	 adharcardno='$adharcardno',panno='$panno',gender='$gender',marital_status='$marital_status',
	 email='$email',bankdetails='$bankdetails',                        

    address='$address',street1='$street1',street2='$street2',state='$state',district='$district',city='$city',yearsInResidence='$yearsInResidence',ResidentialStatus='$ResidentialStatus',residentialstatus_others='$residentialstatus_others',pincode='$pincode',
	per_sameadd='$per_same',per_address='$per_address',
	per_street1='$per_street1',per_street2='$per_street2',per_state='$per_state',per_district='$per_district',per_city='$per_city',stdcode='$stdcode',

    phone='$phone',mobile='$mobile',phone1='$phone1',prevUniversity='$prevUniversity',prevCollege='$prevCollege',prevCourse='$prevCourse',category_prevcourse = '$category_prevcourse',category_prevcourseothers = '$category_prevcourseothers',marks='$marks',MaxmarksObtainedIn='$MaxmarksObtainedIn',entranceTest='$entranceTest',typeoftest='$typeoftest',GDScore='$GDScore',PIScore='$PIScore',

    prefer_day='$prefer_day',prefer_time='$prefer_time',query='$query',update_date=sysdate(),source='$source',mail_status='Processing',appworking='$appworking',

    employment='$employment',employment_other='$employment_other',business='$business',designation='$designation',yearsInEmployement='$yearsInEmployement',income='$income',bankbal='$bankbal',Empaddress='$empaddress',Empstreet1='$empstreet1',

    Empstreet2='$empstreet2',Empcountry='$empstate',Empstate='$empdistrict', Empcity='$empcity',Emppincode='$emppincode',Empstdcode='$empstdcode',Empphone='$empphone',

    BusiRec='$BusiRec',loantype='$loantype',typeofLoan='$typeofLoan',vehicleloanType='$vehicleloanType', 
	
	AssetType='$AssetType',AssetName='$AssetName',AssetBrand='$AssetBrand'  where reference_id='$reference_id'";

 

echo($add_new);

echo "\n";



	$add_query=mysql_query($add_new);
	
	  if($bankdetails=='Yes')
	{
		$select_bankdetails="select bankdetails from bank_details where reference_id = '$id' and borrowertype='Borrower'";
					   
			$result_bankdetails = mysql_query($select_bankdetails);
			
			$count_bankdetails=mysql_num_rows($result_bankdetails);
			
			if($count_bankdetails>0)
			{
	
		      $add_bankdetails="UPDATE  bank_details SET  accountNo='$accountNo',accountholder='$accountholder',bankname='$bankname',branchname='$branchname',branchadd='$branchadd',
		      ifsccode='$ifsccode',micr='$micr' ,  created=NOW() WHERE  reference_id='$reference_id' and borrowertype='Borrower'"; 
			}
			else
			{
			   $add_bankdetails = "Insert into bank_details(reference_id,borrowertype,bankdetails,accountNo,accountholder,
                       
					   bankname,branchname,branchadd,ifsccode,micr,created)
					   values('$reference_id','Borrower','$bankdetails','$accountNo','$accountholder','$bankname','$branchname','$branchadd','$ifsccode','$micr',NOW())";
					   
			}
	
     	mysql_query($add_bankdetails);
	
	   echo $add_bankdetails;
	}
	
	if($loantype=='Others')
{
	
	$add_OtherLoans="UPDATE  OtherLoans_details SET firstname='$firstname',middlename='$middlename',lastname='$lastname',dob='$dob',
	 adharcardno='$adharcardno',panno='$panno',gender='$gender',marital_status='$marital_status',email='$email',

    address='$address',street1='$street1',street2='$street2',state='$state',district='$district',city='$city',yearsInResidence='$yearsInResidence',ResidentialStatus='$ResidentialStatus',residentialstatus_others='$residentialstatus_others',pincode='$pincode',stdcode='$stdcode',

    phone='$phone',mobile='$mobile',phone1='$phone1',
    prefer_day='$prefer_day',prefer_time='$prefer_time',query='$query',update_date=sysdate(),source='$source',mail_status='Processing',appworking='$appworking',

    employment='$employment',employment_other='$employment_other',business='$business',designation='$designation',yearsInEmployement='$yearsInEmployement',income='$income',bankbal='$bankbal',Empaddress='$empaddress',Empstreet1='$empstreet1',

    Empstreet2='$empstreet2',Empcountry='$empstate',Empstate='$empdistrict', Empcity='$empcity',Emppincode='$emppincode',Empstdcode='$empstdcode',Empphone='$empphone',

    BusiRec='$BusiRec',loantype='$loantype',typeofLoan='$typeofLoan',vehicleloanType='$vehicleloanType' where reference_id='$reference_id'";

 



	$OtherLoansquery=mysql_query($add_OtherLoans);
}
	
	
	//reset array values
	$arr=0;
	
	
	//clear all before inserting and updating the entrance test details
	mysql_query("delete from test_score where reference_id='$reference_id'");
	
	
 if($entranceTest=='Yes')
 {
	
	//insert and update entrance test details in  test_score table
	foreach ($nameofEntTest as $entTest )

     {
		  
		 
              if($entTest=='Other')	
            { 	
			 $insertquery = "insert into test_score (reference_id,testName,score,otherEntTest)values('$reference_id','$entTest','$entranceScore[$arr]','$specifyotherTest')";
			}
			
			else
			{
			  $insertquery  ="insert into test_score (reference_id,testName,score)values('$reference_id','$entTest','$entranceScore[$arr]')";
			}
			
			mysql_query($insertquery);
			$arr+=0+1; 
		}
			 
		
	 }
  
	elseif($entranceTest=='No')

	{

       mysql_query("delete from test_score where reference_id='$reference_id'");

	}	
	
	
	 
										   
	
	
	$add_new11="update  applicant_assets_details set 
	assets_investments='$assets',immovablePropertyvalue='$immovablePropertyvalue',
	governmentsecuritiesvalue='$governmentsecuritiesvalue',insurancepoliciesvalue='$insurancepoliciesvalue',
	chits_kurisvalue='$chits_kurisvalue',
	
	sharesvalue='$sharesvalue',MFsvalue='$MFsvalue',debenturesvalue='$debenturesvalue',BankFixedDepositsvalue='$BankFixedDepositsvalue',ProvidentFundvalue='$ProvidentFundvalue',GoldOrnamentsvalue='$GoldOrnamentsvalue',
	
	VehiclesSelfOwnedvalue='$VehiclesSelfOwnedvalue',OtherAssetsvalue='$OtherAssetsvalue',total_AssetsAmount='$totAssets',immovablePropertyCollateral='$immovablePropertyCollateral',governmentsecuritiesCollateral='$governmentsecuritiesCollateral',insurancepoliciesCollateral='$insurancepoliciesCollateral',
	chits_kurisCollateral='$chits_kurisCollateral',
	
	sharesCollateral='$sharesCollateral',MFsCollateral='$MFsCollateral',
	debenturesCollateral='$debenturesCollateral',BankFixedDepositsCollateral='$BankFixedDepositsCollateral',
	ProvidentFundCollateral='$ProvidentFundCollateral',
	GoldOrnamentsCollateral='$GoldOrnamentsCollateral',
	
	VehiclesSelfOwnedCollateral='$VehiclesSelfOwnedCollateral',OtherAssetsCollateral='$OtherAssetsCollateral' where reference_id='$reference_id' ";

echo("--------->");

echo($add_new11);

	$add_query11=mysql_query($add_new11);

	



        $courseAddRecord="select 1 from course_details where reference_id='$reference_id'";

         $run_courseColAdd=mysql_query($courseAddRecord);

     if (mysql_num_rows($run_courseColAdd) != 0)

             {

                //update course details

                $add_course_details="UPDATE course_details SET studyCountry='$studyCountry',otherCountry='$otherCountry',university='$university',course='$course',

                courseCategory='$courseCategory',otherCourse='$otherCourse',typeCourse='$typeCourse',loanrequiredforcourseType='$loanrequiredforcourseType',loanMonth='$loanMonth',loanYear='$loanYear',duedate='$duedate',

                amount='$amount',SelfContribution='$SelfContribution' ,totalfees='$totalfees', duration='$duration', durationtype='$durationIn',security='$security' 

                where reference_id='$reference_id'";  

                 $add_newcoursequery6=mysql_query($add_course_details);	

             }

      else

      {

           $add_course_details="Insert into course_details(reference_id,studyCountry,otherCountry,university,course,courseCategory,otherCourse,typeCourse,loanrequiredforcourseType,loanMonth,loanYear,duedate,amount,SelfContribution,duration,totalfees,security,durationtype

			    values('$reference_id','$studyCountry','$otherCountry','$university','$course','$courseCategory','$otherCourse','$typeCourse','$loanrequiredforcourseType','$loanMonth','$loanYear','$duedate','$amount','$SelfContribution','$duration','$totalfees','$security','$durationIn')";

                 $add_newcoursequery6=mysql_query($add_course_details);	                    

    

      }

 echo $add_course_details;

echo "\n";

            $add_query1=mysql_query($add_new1);	

	

	 $ColllegeAddRecord="select * from collegeaddressdetail where reference_id='$reference_id'";

         $run_ColAdd=mysql_query($ColllegeAddRecord);

    

           if (mysql_num_rows($run_ColAdd) != 0)

             {

                //upadate college address detail

                    $add_new6="update collegeaddressdetail set address='$Coladdress',street1= '$Colstreet1',street2='$Colstreet2',

                    state='$Colstate',district='$Coldistrict',city='$Colcity',pincode='$Colpincode',stdcode='$Colstdcode',

                    phone='$Colphone',Email='$CollegeEmail',ContactPerson='$ContactPName',college='$college'

                    where reference_id='$reference_id'";    

                    echo($add_new6);

                    $add_query6=mysql_query($add_new6);	

             }

             else

             {   

                 //  //insert college address detail

	            $add_new5="Insert into collegeaddressdetail(reference_id,address,street1,street2,state,district,city,pincode,stdcode,phone,Email,ContactPerson,college)

			    values('$reference_id','$Coladdress','$Colstreet1','$Colstreet2','$Colstate','$Coldistrict','$Colcity','$Colpincode','$Colstdcode','$Colphone','$CollegeEmail','$ContactPName','$college')";

                    echo($add_new5);

                    $add_query5=mysql_query($add_new5);	

             }


         //---------if new college and new course is selected-----------//	

//select id for course  in application_scoringfields_list table
            $courseid=$objCommon->getIdofrecord('application_scoringfields_list','actual_field_name','course');
			
			
			  //select id for college  in application_scoringfields_list table
            $collegeid=$objCommon->getIdofrecord('application_scoringfields_list','actual_field_name','college');
			
			
			$select_query1=mysql_query("SELECT options FROM `options_scoring_list` where  field_id='$courseid' and options='$course' ");
			
			$select_query2=mysql_query("SELECT options FROM `options_scoring_list` where  field_id='$collegeid' and options='$college' ");
			
			//check whether newcourse_collegedetails_list having record  with same referenceID 
			$sql6=mysql_query("select Reference_id from newcourse_collegedetails_list where Reference_id='$reference_id' ");
			
			//count rows
			$count_rows=mysql_num_rows($sql6);
			
			
			
			$count_coursesexists=mysql_num_rows($select_query1);
			
			$count_collegeexsists=mysql_num_rows($select_query2);
			
		if($count_coursesexists==0 || $count_collegeexsists==0 )
        {
		    if($count_rows!=0)
           {		   
		
		      mysql_query("update  newcourse_collegedetails_list set course='$course',college ='$college'  where Reference_id='$reference_id'");
		      
		   }
           else 
		   {

              mysql_query("insert into newcourse_collegedetails_list(Reference_id,course,college) values('$reference_id','$course','$college') ");

           }	   
		
		}
        else
        {    
		
		  	   
           mysql_query("delete from newcourse_collegedetails_list where Reference_id='$reference_id'");
		      

        }		

	

	



	//co-borrower-1 details

          $CoBo1RecordCheck="select * from coapplicant_details where reference_id='$reference_id' and coborrowerid='1'";

          $run_CoBo1=mysql_query($CoBo1RecordCheck);

    
	 if($coborrower1 != '')

       {

           if (mysql_num_rows($run_CoBo1) != 0)

             {
				 
			



	        $add_new2="UPDATE coapplicant_details SET relation='$relation',relative='$relative',cfirstname='$cfirstname',cmiddlename='$cmiddlename',

                clastname='$clastname',cdob='$cdob',cadharcardno='$cadharcardno',cpanno='$cpanno',cemail='$cemail',cbankdetails='$cbankdetails',
				 caddress='$caddress',cstreet1='$cstreet1',cstreet2='$cstreet2',

                cstate='$cstate',cdistrict='$cdistrict',ccity='$ccity',cyearsInResidence='$cyearsInResidence',
				cResidentialStatus='$cResidentialStatus',cresidentialstatus_others='$cresidentialstatus_others',
				cper_sameadd='$cper_same',cper_address='$cper_address',
	            cper_street1='$cper_street1',cper_street2='$cper_street2',cper_state='$cper_state',cper_district='$cper_district',cper_city='$cper_city',
				cpincode='$cpincode',cstdcode='$cstdcode',cphone='$cphone',cmobile='$cmobile',

                cphone1='$cphone1',cemployment='$cemployment',cemployment_other='$cemployment_other',cbusiness='$cbusiness',cdesignation='$cdesignation',
				cyearsInEmployement='$cyearsInEmployement',cincome='$cincome',cloan='$cloan',

                housingamt='$chousingamt',caramt='$ccaramt',jeepamt='$cjeepamt',twowheeleramt='$ctwowheeleramt',consamt='$cconsamt',totamt='$ctotamt',

                cbankbal='$cbankbal',samestudadd='$csame',housingemi='$chousingemi',caremi='$ccaremi',jeepemi='$cjeepemi',twowheeleremi='$ctwowheeleremi',

                consemi='$cconsemi',totemi='$ctotemi',cempaddress='$cempaddress',cempstreet1='$cempstreet1',cempstreet2='$cempstreet2',

                cempstate='$cempState',cempdistrict='$cempdistinct',cempcity='$cempcity',cemppincode='$cemppincode',cempstdcode='$cempstdcode',cempphone='$cempphone'

                where reference_id='$reference_id' and coborrowerid=1";

       

  // echo($add_new2);

//    echo "\n";

                $add_query2=mysql_query($add_new2);
				
	if($cbankdetails=='Yes')
	{
		
		$select_bankdetails1="select bankdetails from bank_details where reference_id = '$id' and borrowertype='Coborrower1'";
					   
			$result_bankdetails1 = mysql_query($select_bankdetails1);
			
			$count_bankdetails1=mysql_num_rows($result_bankdetails1);
			
			if($count_bankdetails1>0)
			{
	
	          $add_bankdetails="UPDATE  bank_details SET  accountNo='$caccountNo',accountholder='$caccountholder',bankname='$cbankname',branchname='$cbranchname',branchadd='$cbranchadd',
              ifsccode='$cifsccode',micr='$cmicr', created=NOW() WHERE  reference_id='$reference_id' and borrowertype='Coborrower1'"; 
			}
			else{
				$add_cbankdetails = "Insert into bank_details(reference_id,borrowertype,bankdetails,accountNo,accountholder,
                       
					   bankname,branchname,branchadd,ifsccode,micr,created)
					   values('$reference_id','Coborrower1','$cbankdetails','$caccountNo','$caccountholder','$cbankname','$cbranchname','$cbranchadd','$cifsccode','$cmicr',NOW())";
					   
			   }
			
			
	
	mysql_query($add_cbankdetails);
	}
	
	
				
				
				$add_new7="update  coapplicant_assets_details set 
	cassets_investments='$cassets',cimmovablePropertyvalue='$cimmovablePropertyvalue',
	cgovernmentsecuritiesvalue='$cgovernmentsecuritiesvalue',cinsurancepoliciesvalue='$cinsurancepoliciesvalue',
	cchits_kurisvalue='$cchits_kurisvalue',
	
	csharesvalue='$csharesvalue',cMFsvalue='$cMFsvalue',cdebenturesvalue='$cdebenturesvalue',cBankFixedDepositsvalue='$cBankFixedDepositsvalue',cProvidentFundvalue='$cProvidentFundvalue',cGoldOrnamentsvalue='$cGoldOrnamentsvalue',
	
	cVehiclesSelfOwnedvalue='$cVehiclesSelfOwnedvalue',cOtherAssetsvalue='$cOtherAssetsvalue',ctotal_AssetsAmount='$ctotAssets',cimmovablePropertyCollateral='$cimmovablePropertyCollateral',
	cgovernmentsecuritiesCollateral='$cgovernmentsecuritiesCollateral',cinsurancepoliciesCollateral='$cinsurancepoliciesCollateral',
	cchits_kurisCollateral='$cchits_kurisCollateral',
	
	csharesCollateral='$csharesCollateral',cMFsCollateral='$cMFsCollateral',cdebenturesCollateral='$cdebenturesCollateral',cBankFixedDepositsCollateral='$cBankFixedDepositsCollateral',cProvidentFundCollateral='$cProvidentFundCollateral',cGoldOrnamentsCollateral='$cGoldOrnamentsCollateral',
	
	cVehiclesSelfOwnedCollateral='$cVehiclesSelfOwnedCollateral',cOtherAssetsCollateral='$cOtherAssetsCollateral' where reference_id='$reference_id' and coborrowerid=1 ";

echo("--------->");

echo($add_new7);

	$add_query7=mysql_query($add_new7);
	
	
	

            }
          

             else

            {

                $add_new2="Insert into coapplicant_details(reference_id,coborrowerid,relation,relative,cfirstname,cmiddlename,clastname,cdob,cadharcardno,cpanno,cemail,cbankdetails,caddress,cstreet1,

	cstreet2,cstate,cdistrict,ccity,cyearsInResidence,cResidentialStatus,cresidentialstatus_others,cpincode,cper_sameadd,cper_address,
	cper_street1,cper_street2,cper_state,cper_district,cper_city,cstdcode,cphone,cmobile,cphone1,cemployment,cemployment_other,cbusiness,cdesignation,cyearsInEmployement,cincome,cloan,housingamt,caramt,jeepamt,twowheeleramt,

	consamt,totamt,cbankbal,samestudadd,housingemi,caremi,jeepemi,twowheeleremi,consemi,totemi,cempaddress,cempstreet1,cempstreet2,

    cempstate,cempdistrict,cempcity,cemppincode,cempstdcode,cempphone)values ('$reference_id',1,'$relation','$relative','$cfirstname',

	'$cmiddlename','$clastname','$cdob','$cadharcardno','$cpanno','$cemail','$cbankdetails','$caddress','$cstreet1','$cstreet2','$cstate','$cdistrict','$ccity','$cyearsInResidence','$cResidentialStatus','$cresidentialstatus_others','$cpincode','$cper_same','$cper_address','$cper_street1','$cper_street2','$cper_state','$cper_district',
	    '$cper_city','$cstdcode','$cphone',

	'$cmobile','$cphone1','$cemployment','$cemployment_other','$cbusiness','$cdesignation','$cyearsInEmployement','$cincome','$cloan',$chousingamt,$ccaramt,$cjeepamt,$ctwowheeleramt,$cconsamt,$ctotamt,

	'$cbankbal','$csame','$chousingemi','$ccaremi','$cjeepemi','$ctwowheeleremi','$cconsemi','$ctotemi','$cempaddress','$cempstreet1','$cempstreet2',

    '$cempState','$cempdistinct','$cempcity','$cemppincode','$cempstdcode','$cempphone')";

echo($add_new2);

                $add_query2=mysql_query($add_new2);
				
				
				 if($cbankdetails=='Yes')
	{
       $add_cbankdetails = "Insert into bank_details(reference_id,borrowertype,bankdetails,accountNo,accountholder,
                       
					   bankname,branchname,branchadd,ifsccode,micr,created)
					   values('$reference_id','Coborrower1','$cbankdetails','$caccountNo','$caccountholder','$cbankname','$cbranchname','$cbranchadd','$cifsccode','$cmicr',NOW())";
					   
			mysql_query($add_cbankdetails);		   
	}			
				
				
	
				
				$add_new7="Insert into coapplicant_assets_details(reference_id,coborrowerid,cassets_investments,cimmovablePropertyvalue,cgovernmentsecuritiesvalue,cinsurancepoliciesvalue,
	cchits_kurisvalue,
	
	csharesvalue,cMFsvalue,cdebenturesvalue,cBankFixedDepositsvalue,cProvidentFundvalue,cGoldOrnamentsvalue,
	
	cVehiclesSelfOwnedvalue,cOtherAssetsvalue,ctotal_AssetsAmount,cimmovablePropertyCollateral,cgovernmentsecuritiesCollateral,cinsurancepoliciesCollateral,
	cchits_kurisCollateral,
	
	csharesCollateral,cMFsCollateral,cdebenturesCollateral,cBankFixedDepositsCollateral,cProvidentFundCollateral,cGoldOrnamentsCollateral,
	
	cVehiclesSelfOwnedCollateral,cOtherAssetsCollateral) values ('$reference_id',1,'$cassets','$cimmovablePropertyvalue','$cgovernmentsecuritiesvalue',
	
	'$cinsurancepoliciesvalue','$cchits_kurisvalue','$csharesvalue','$cMFsvalue','$cdebenturesvalue','$cBankFixedDepositsvalue',
	
	'$cProvidentFundvalue','$cGoldOrnamentsvalue','$cVehiclesSelfOwnedvalue','$cOtherAssetsvalue','$ctotAssets','$cimmovablePropertyCollateral','$cgovernmentsecuritiesCollateral',
	
	'$cinsurancepoliciesCollateral','$cchits_kurisCollateral','$csharesCollateral','$cMFsCollateral','$cdebenturesCollateral','$cBankFixedDepositsCollateral',
	
	'$cProvidentFundCollateral','$cGoldOrnamentsCollateral','$cVehiclesSelfOwnedCollateral','$cOtherAssetsCollateral')";

echo("--------->");

//echo($add_new7);

	$add_query7=mysql_query($add_new7);



                }

			}
			 
			  else

    {



        //co-borrower1 details

          $CoBo1RecordCheckto="select * from coapplicant_details where reference_id='$reference_id' and coborrowerid='1'";

          $run_CoBo1to=mysql_query($CoBo1RecordCheckto);

          if (mysql_num_rows($run_CoBo1to) != 0)

             {

              $DeleteCoBo1="delete from coapplicant_details where reference_id='$reference_id' and coborrowerid='1'";

			  
			 // echo $DeleteCoBo1;
              $run_DeleteCoBo1=mysql_query($DeleteCoBo1);
			  
			  $DeleteCoBo11="delete from coapplicant_assets_details where reference_id='$reference_id' and coborrowerid='1'";
			  
             mysql_query($DeleteCoBo11);

             }
	}

//----------  co-borrower-2 details  ------------------//

	if($coborrower2 != '')

	{

//   echo "co-borrower2";echo "\n";

	     //co-borrower2 details

          $CoBo2RecordCheck="select * from coapplicant_details where reference_id='$reference_id' and coborrowerid='2'";

          $run_CoBo2=mysql_query($CoBo2RecordCheck);

    

           if (mysql_num_rows($run_CoBo2) != 0)

             {

	        $add_new3="UPDATE coapplicant_details SET relation='$corelation',relative='$corelative',cfirstname='$cofirstname',cmiddlename='$comiddlename',

            clastname='$colastname',cdob='$codob',cadharcardno='$coadharcardno',cpanno='$copanno',cemail='$coemail',cbankdetails='$cobankdetails',
			 caddress='$coaddress',cstreet1='$costreet1',cstreet2='$costreet2',cstate='$costate',

            cdistrict='$codistrict',ccity='$cocity',cyearsInResidence='$coyearsInResidence',cResidentialStatus='$coResidentialStatus',cresidentialstatus_others='$coresidentialstatus_others',
			cper_sameadd='$coper_same',cper_address='$coper_address',
	        cper_street1='$coper_street1',cper_street2='$coper_street2',cper_state='$coper_state',cper_district='$coper_district',cper_city='$coper_city',
			cpincode='$copincode',cstdcode='$costdcode',cphone='$cophone',cmobile='$comobile',cphone1='$cophone1',cemployment='$coemployment',cemployment_other='$coemployment_other',

            cbusiness='$cobusiness',cdesignation='$codesignation',cyearsInEmployement='$coyearsInEmployement',
			cincome='$coincome',cloan='$coloan',housingamt='$cohousingamt',caramt='$cocaramt',jeepamt='$cojeepamt',

            twowheeleramt='$cotwowheeleramt',consamt='$coconsamt',totamt='$cototamt',cbankbal='$cobankbal',samestudadd='$cosame',

            housingemi='$cohousingemi',caremi='$cocaremi',jeepemi='$cojeepemi',twowheeleremi='$cotwowheeleremi',consemi='$coconsemi',totemi='$cototemi'

            ,cempaddress='$coempaddress',cempstreet1='$coempstreet1',cempstreet2='$coempstreet2',

            cempstate='$coempstate',cempdistrict='$coempdistinct',cempcity='$coempcity',cemppincode='$coemppincode',cempstdcode='$coempstdcode',cempphone='$coempphone'

            WHERE coapplicant_details.reference_id ='$reference_id' and coborrowerid=2";            



      echo($add_new3);



  //    echo "\n";

	        $add_query3=mysql_query($add_new3);
			
			
				if($cobankdetails=='Yes')
	{
				$select_bankdetails2="select bankdetails from bank_details where reference_id = '$id' and borrowertype='Coborrower2'";
					   
			$result_bankdetails2 = mysql_query($select_bankdetails2);
			
			$count_bankdetails2=mysql_num_rows($result_bankdetails2);
			
			if($count_bankdetails2>0)
			{
	
	          $add_cobankdetails="UPDATE  bank_details SET  accountNo='$coaccountNo',accountholder='$coaccountholder',bankname='$cobankname',branchname='$cobranchname',branchadd='$cobranchadd',
              ifsccode='$coifsccode',micr='$comicr', created=NOW() WHERE  reference_id='$reference_id' and borrowertype='Coborrower2'"; 
			}
			else
			{
				$add_cobankdetails = "Insert into bank_details(reference_id,borrowertype,bankdetails,accountNo,accountholder,
                       
					   bankname,branchname,branchadd,ifsccode,micr,created)
					   values('$reference_id','Coborrower2','$cobankdetails','$coaccountNo','$coaccountholder','$cobankname','$cobranchname','$cobranchadd','$coifsccode','$comicr',NOW())";
					   
			
				}
	
	       mysql_query($add_cobankdetails);
	 }
	
			$add_new8="update  coapplicant_assets_details set 
	cassets_investments='$coassets',cimmovablePropertyvalue='$coimmovablePropertyvalue',
	cgovernmentsecuritiesvalue='$cogovernmentsecuritiesvalue',cinsurancepoliciesvalue='$coinsurancepoliciesvalue',
	cchits_kurisvalue='$cochits_kurisvalue',
	
	csharesvalue='$cosharesvalue',cMFsvalue='$coMFsvalue',cdebenturesvalue='$codebenturesvalue',cBankFixedDepositsvalue='$coBankFixedDepositsvalue',cProvidentFundvalue='$coProvidentFundvalue',cGoldOrnamentsvalue='$coGoldOrnamentsvalue',
	
	cVehiclesSelfOwnedvalue='$coVehiclesSelfOwnedvalue',cOtherAssetsvalue='$coOtherAssetsvalue',ctotal_AssetsAmount='$cototAssets',cimmovablePropertyCollateral='$coimmovablePropertyCollateral',cgovernmentsecuritiesCollateral='$cogovernmentsecuritiesCollateral',cinsurancepoliciesCollateral='$coinsurancepoliciesCollateral',
	cchits_kurisCollateral='$cochits_kurisCollateral',
	
	csharesCollateral='$cosharesCollateral',cMFsCollateral='$coMFsCollateral',cdebenturesCollateral='$codebenturesCollateral',cBankFixedDepositsCollateral='$coBankFixedDepositsCollateral',cProvidentFundCollateral='$coProvidentFundCollateral',cGoldOrnamentsCollateral='$coGoldOrnamentsCollateral',
	
	cVehiclesSelfOwnedCollateral='$coVehiclesSelfOwnedCollateral',cOtherAssetsCollateral='$coOtherAssetsCollateral' where reference_id='$reference_id' and coborrowerid=2 ";

echo("--------->");

echo($add_new8);

	$add_query8=mysql_query($add_new8);


            }

             else

            {

            $add_new3="Insert into coapplicant_details(reference_id,coborrowerid,relation,relative,cfirstname,cmiddlename,clastname,cdob,cadharcardno,cpanno,cemail,cbankdetails,caddress,cstreet1,

	    cstreet2,cstate,cdistrict,ccity,cyearsInResidence,cResidentialStatus,cresidentialstatus_others,cpincode,
		cper_sameadd,cper_address,
	cper_street1,cper_street2,cper_state,cper_district,cper_city,cstdcode,cphone,cmobile,cphone1,cemployment,cemployment_other,cbusiness,cdesignation,cyearsInEmployement,cincome,cloan,housingamt,caramt,jeepamt,twowheeleramt,

	    consamt,totamt,cbankbal,samestudadd,housingemi,caremi,jeepemi,twowheeleremi,consemi,totemi,cempaddress,cempstreet1,cempstreet2,

    cempstate,cempdistrict,cempcity,cemppincode,cempstdcode,cempphone)values ('$reference_id',2,'$corelation','$corelative','$cofirstname','$comiddlename',

	    '$colastname','$codob','$coadharcardno','$copanno','$coemail','$cobankdetails','$coaddress','$costreet1','$costreet2','$costate','$codistrict','$cocity','$coyearsInResidence','$coResidentialStatus','$coresidentialstatus_others','$copincode','$cper_same','$cper_address','$cper_street1','$cper_street2','$cper_state','$cper_district',
	    '$cper_city','$costdcode','$cophone','$comobile','$cophone1',

	    '$coemployment','$coemployment_other','$cobusiness','$codesignation','$coyearsInEmployement','$coincome','$coloan',$cohousingamt,$cocaramt,$cojeepamt,$cotwowheeleramt,$coconsamt,$cototamt,'$cobankbal','$cosame',

	    $cohousingemi,$cocaremi,$cojeepemi,$cotwowheeleremi,$coconsemi,$cototemi,'$coempaddress','$coempstreet1','$coempstreet2',

    '$coempstate','$coempdistinct','$coempcity','$coemppincode','$coempstdcode','$coempphone')";
echo($add_new3);

            $add_query3=mysql_query($add_new3);
			
			if($cobankdetails=='Yes')
	{
       $add_cobankdetails = "Insert into bank_details(reference_id,borrowertype,bankdetails,accountNo,accountholder,
                       
					   bankname,branchname,branchadd,ifsccode,micr,created)
					   values('$reference_id','Coborrower2','$cobankdetails','$coaccountNo','$coaccountholder','$cobankname','$cobranchname','$cobranchadd','$coifsccode','$comicr',NOW())";
					   
			mysql_query($add_cobankdetails);		   
	}	
			
			$add_new8="Insert into coapplicant_assets_details(reference_id,coborrowerid,cassets_investments,cimmovablePropertyvalue,cgovernmentsecuritiesvalue,cinsurancepoliciesvalue,
		 cchits_kurisvalue,
	
		csharesvalue,cMFsvalue,cdebenturesvalue,cBankFixedDepositsvalue,cProvidentFundvalue,cGoldOrnamentsvalue,
		
		cVehiclesSelfOwnedvalue,cOtherAssetsvalue,ctotal_AssetsAmount,cimmovablePropertyCollateral,cgovernmentsecuritiesCollateral,cinsurancepoliciesCollateral,
	cchits_kurisCollateral,
	
	csharesCollateral,cMFsCollateral,cdebenturesCollateral,cBankFixedDepositsCollateral,cProvidentFundCollateral,cGoldOrnamentsCollateral,
	
	cVehiclesSelfOwnedCollateral,cOtherAssetsCollateral) values ('$reference_id',2,'$coassets','$coimmovablePropertyvalue','$cogovernmentsecuritiesvalue',
		
		'$coinsurancepoliciesvalue','$cochits_kurisvalue','$cosharesvalue','$coMFsvalue','$codebenturesvalue','$coBankFixedDepositsvalue',
		
		'$coProvidentFundvalue','$coGoldOrnamentsvalue','$coVehiclesSelfOwnedvalue','$coOtherAssetsvalue','$cototAssets','$coimmovablePropertyCollateral','$cogovernmentsecuritiesCollateral',
	
	'$coinsurancepoliciesCollateral','$cochits_kurisCollateral','$cosharesCollateral','$coMFsCollateral','$codebenturesCollateral','$coBankFixedDepositsCollateral',
	
	'$coProvidentFundCollateral','$coGoldOrnamentsCollateral','$coVehiclesSelfOwnedCollateral','$coOtherAssetsCollateral')";

echo("--------->");

//echo($add_new7);

	$add_query8=mysql_query($add_new8);

			
			
            }

	}

    else

    {

//        echo "co-borrower3";

        //co-borrower2 details

          $CoBo2RecordCheckto="select * from coapplicant_details where reference_id='$reference_id' and coborrowerid='2'";

          $run_CoBo2to=mysql_query($CoBo2RecordCheckto);

          if (mysql_num_rows($run_CoBo2to) != 0)

             {

              $DeleteCoBo2="delete from coapplicant_details where reference_id='$reference_id' and coborrowerid='2'";

			  
			 // echo $DeleteCoBo2;
              $run_DeleteCoBo2=mysql_query($DeleteCoBo2);
			  
			  $DeleteCoBo3="delete from coapplicant_assets_details where reference_id='$reference_id' and coborrowerid='2'";

			  
			 // echo $DeleteCoBo2;
              $run_DeleteCoBo3=mysql_query($DeleteCoBo3);

             }

	    // $add_new3="Insert into coapplicant_details(reference_id,coborrowerid,relation,relative,cfirstname,cmiddlename,clastname,cdob,cpanno,cemail,caddress,cstreet1,cstreet2,cstate,cdistrict,ccity,cpincode,cstdcode,cphone,cmobile,cphone1,cemployment,cbusiness,cdesignation,cincome,cloan,housingamt,caramt,jeepamt,twowheeleramt,consamt,totamt,cbankbal)values ('$reference_id',2,'$corelation','$corelative','$cofirstname','$comiddlename','$colastname','$codob','$copanno','$coemail','$coaddress','$costreet1','$costreet2','$costate','$codistrict','$cocity',$copincode,$costdcode,$cophone,$comobile,$cophone1,'$coemployment','$cobusiness','$codesignation','$coincome','$coloan',$cohousingamt,$cocaramt,$cojeepamt,$cotwowheeleramt,$coconsamt,$cototamt,'$cobankbal')";

        }



	if ($add_query)

	{	

//		if($_SESSION['firstname'] != "");

//		{

//			$_SESSION['firstname'] = $firstname;

//

//			$_SESSION['id'] = $reference_id;

//

//			$_SESSION['email'] = $email;

//

//			$_SESSION['name'] = $password;

//

//			$_SESSION['usertype'] = 'student';

//

//		}



		// Mail of sender

		$mail_from= "loan@ksfi.co.in"; 	

		//$headers = "From: ".$mail_from." <".$mail_from.">\r\n"; 	

		// Contact subject

		//$subject ="KSF Account Details"; 

		// Details

		//$body = "";

		//$body .= "Dear ".$firstname.",\r\n";

		//$body .= "Thank you applying to KSFi Education loans.\r\n";

		//$body .= "You have successfully applied for loan.\r\n\n\n";

		//$body .= "Your Reference ID  is ".$reference_id."\r\n\n\n"; 

		//$body .= "Your login details are:\r\n"; 

		//$body .= "Email/Username:".$email."\r\n";

		//$body .= "Password:".$password."\r\n\n\n";

		//$body .= "For speeding up your loan process please follow the process below:\r\n";

		//$body .= "a) Download the application form.\r\n";

		//$body .= "b) Fill the application form in english in capital letters.\r\n";

		//$body .= "c) Collect all supporting documents required as mentioned in page 4, section I of the downloaded application form.\r\n";

		//$body .= "d) Submit it to the nearest ksfi customer service centre.\r\n";

		//$body .= "e) Also contact 09920783432/022-65932385 for further support on the same.\r\n";

		//$body .= "f) For any written querries you can also sent a mail to customerservice@ksfi.co.in\r\n\n\n";

		//$body .= "Best Regards,\r\n";

		//$body .= "KSF Team.\r\n";

		

		// Enter your email address

		//$to = "$email"; 

		//echo ($body);					

		//if (mail($to,$subject,$body,$headers))

		//{

	    //header("Location: ./fullApplication.php");

		//exit();

		$mail_status = "Success";

		$add_new="Update student_details set mail_status='".$mail_status." where reference_id='".$reference_id."'";

		$add_query=mysql_query($add_new);



        // Contact subject

		$ksfisubject ="New Loan Applied:".$reference_id; 



	  //  echo($ksfisubject);

		$ksfibody = "";

		$ksfibody .= "Dear KSFi User,\r\n";

		$ksfibody .= "An online application is filled by ".$firstname."\r\n";

		$ksfibody .= " Email Address:".$email."\r\n";

                $ksfibody .= " Mobile:".$mobile."\r\n";

		$ksfibody .= " Reference ID  is ".$reference_id."\r\n"; 



                $ksfiheaders = "From: ".$mail_from." <".$email.">\r\n"; 

        //echo($ksfibody);

         //echo($ksfisubject);



        if (mail($mail_from ,$ksfisubject,$ksfibody,$headers))

            {

                $mail_status = "success";

            }

		//} else{

		//echo("<p>Message delivery failed...</p>");		

		//$mail_status = "Failed";

		//$add_new="Update student_details set mail_status='".$mail_status."' where reference_id='".$reference_id."'";

		//$add_query=mysql_query($add_new);

		//      }

		//echo "New Records Added.";

	header("Location: ./updatemsg.php");

	}

	else

	{

		$Msg = 4;

		//$Msg ="New Record failed.";

  header("Location: ./updatemsg.php?Msg=");

	}

}

else

{

    $Msg = 5;

    //$Msg ="Duplicate Records cannot be added.";

 header("Location: ./updatemsg.php?Msg=");

}      

 ob_flush();

mysql_close($con);

?>