 <?php 
 session_start();
 
 include('common/class_Common.php');
						  
   $val=new Common();
   
   $course_id=$_GET['course_id'];
  
  include('./connection.php');
  
 // partner id
	$employee_id=$_SESSION['user_id'];
  
  $select_query= "Select course_id,coursetitle_name,course_name,course_type,course_duration_years,course_duration_months,sessions_of_program,conditional_offer_beforetraining,conditional_offer_companyname,unconditional_offer_beforetraining,unconditional_offer_companyname,corporate_tieup,corporate_tieup_companyname,industry_type,other_industrytype,nsdc_approval,location_number,company_location,other_companylocation,previous_recruited_companies,jobskill_type,monthly_salary,newtraining_program,newtrainingprogram_years,students_trained,students_placed,basic_qualification,degree_qualification,other_degree_qualification,masters_education,other_master_education,eligibility_test,test_name,written_test,personal_interview,group_discussion,previous_academic_percentage,cutoff_percentage,tution_fees,examination_fees,studymaterials_cost,travelling_expenses,transportation_expenses,owner_training_experience,owner_trainingexperience_years,corporate_driven_institute,corporate_driveninstitute_years,owner_industry_experience,
		owner_industryexperience_years,owner_course_experience,owner_courseexperience_years,NSDC_standard_content,
    institute_inhouse,industry_approved_content,trainers_qualification,delivery_model from institute_partnerdetails where employee_id='$employee_id' and course_id='$course_id' ";
  
//echo($select_query);
$result = mysql_query($select_query); 
$count=mysql_num_rows($result);

$row = mysql_fetch_array($result);


?>  
<!doctype html>
<html lang="en">
<head>
 
 
  
 
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
    function ShowHideDiv(val,id) {
		
	 var fld = document.getElementById(id);
		if(val=='show')
		{
        
         fld.style.display ="";
		}
		else if(val=='hide')
			
		{
		 fld.style.display ="none";
        }
       
    }
	
	</script>
<script>
function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData();
})


</script>
<style type="text/css">
 tr {
  
    
    text-align:left;
}

.auto-style2 {

	background-image: url('images/rtoutline.jpg');

}

.auto-style3 {

	margin-left: 2px;

	margin-bottom: 2px;

}

</style>

</head>

<body id="Body">

<div align="center">



    <div align="center" class="skinwrapper">

		<?php  include('./common/common_mainmenu.php'); ?>

 


<form  action='update_institute_partnerdetails.php' method='post' border='0'>
    <table  cellpadding="3" cellspacing="0" align="center" id="printTable" width="800" style="font-size: 14px">
	<tr  bgcolor="#00bfff">
                    <td align="center" colspan="2">Institute Partnership Details</td>
					
            </tr>
	<tr>
	<td>&nbsp;</td></tr>
	<tr>
	<td>
	<input type="hidden" name="course_id" id="course_id" value="<?php echo $row['course_id']; ?>"/> 
	</td>
	</tr>
          <tr>
            <td>Title of the Course :</td>
            <td>
			    <input type="text" name="coursetitle_name" id="coursetitle_name" placeholder="Title of the Course" style="width:200px; height:30px" value="<?php if($row) { echo $row['coursetitle_name']; } ?>" required/> 
			</td>
			
        </tr>
		<tr>
            <td>Name of the Course :</td>
            <td>
			    <input type="text" name="course_name" placeholder="Course Name" style="width:200px; height:30px" value="<?php  if($row) { echo $row['course_name']; } ?>" required/> 
			</td>
			
        </tr>
		<tr>
            <td>Course Type :</td>
            <td>
			    <select name="course_type" style="width:200px; height:30px" required>
				<option><?php if($row) { echo $row['course_type']; } ?></option>
				<option>Full Time Training Program</option>
				<option>Part Time Training Program</option>
				<option>Online or Correspondence</option>
				</select>
			</td>
			
        </tr>
		<tr>
            <td>Complete Duration of Training Progarm :</td>
            <td>
			    
				<select name="course_duration_years"  id="course_duration_years" style="width:79px;height:30px" required>
				     <option><?php  if($row) { echo $row['course_duration_years']; } ?></option>
					 <option value="0">0</option>
					 <option value="1">1</option>
					 <option value="2">2</option>
					 <option value="3">3</option>
					 <option value="4">4</option>
					 <option value="5">5</option>
					 <option value="6">6</option>
					 <option value="7">7</option>
					 <option value="8">8</option>
					 <option value="9">9</option>
					 <option value="10">10</option>
					 <option value="11">11</option>
					 <option value="12">12</option>
					 <option value="13">13</option>
					 <option value="14">14</option>
					 <option value="15">15</option>
					 <option value="16">16</option>
					 <option value="17">17</option>
					 <option value="18">18</option>
					 <option value="19">19</option>
					 <option value="20">20</option>
					 <option value="21">21</option>
					 <option value="22">22</option>
					 <option value="23">23</option>
					 <option value="24">24</option>
					 <option value="25">25</option>
					 
			</select>
					
            <select name="course_duration_months"  id="course_duration_months" style="width:79px;height:30px" required>
			<option><?php  if($row) { echo $row['course_duration_months']; } ?></option>  
					<option value="00">0</option>
					<option value="01">1</option>
					<option value="02">2</option>
					<option value="03">3</option>
					<option value="04">4</option>
					<option value="05">5</option>
					<option value="06">6</option>
					<option value="07">7</option>
					<option value="08">8</option>
					<option value="09">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					</select>
			</td>
			
        </tr>
		<tr>
            <td>Specific Sessions Of The Program :</td>
            <td>
			    <select name="sessions_of_program" style="width:200px; height:30px" >
				<option><?php if($row) { echo $row['sessions_of_program']; } ?></option>
				<option>Classroom Theoritical Secession In Hrs</option>
				<option>Classroom Practical Secession In Hrs</option>
				<option>Industry Visit  days</option>
				<option>On The Job Training  Program In Months</option>
				<option>Apprenticeship In Months</option>
				<option>Paid Internship Program In Months</option>
				</select>
			</td>
			
        </tr>
		 <tr>
            <td>Is there Conditional Offer letter before training :</td>
			<td><input type='radio' name='conditional_offer_beforetraining' value='Yes'<?php if($row) {  if($row['conditional_offer_beforetraining']=='Yes'){ echo 'checked';} } ?> id="chkYes" onclick="ShowHideDiv('show','conditionaloffer')">Yes
						   <input type='radio' name='conditional_offer_beforetraining' value='No' <?php if($row) {  if($row['conditional_offer_beforetraining']=='No'){ echo 'checked';} }?> id="chkNo"onclick="ShowHideDiv('hide','conditionaloffer')">No</td>
			<tr><td>
    <td id="conditionaloffer" style="display: none">
    Company Name :
	<br>
	
	<input type="text" name="conditional_offer_companyname" placeholder="If yes name the company" style="width:200px; height:30px" value="<?php echo $row['conditional_offer_companyname']; ?>" /></td>
</td></tr>
        </tr>
		 <tr>
            <td>Is there Un-Conditional Offer letter before training :</td>
            <td><input type="radio" name="unconditional_offer_beforetraining" value="Yes" <?php if($row['unconditional_offer_beforetraining']=='Yes'){ echo 'checked';}?>  id="chYes" onclick="ShowHideDiv('show','unconditionoffer')">Yes
			<input type="radio" name="unconditional_offer_beforetraining" value="No" <?php if($row['unconditional_offer_beforetraining']=='No'){ echo 'checked';}?>  onclick="ShowHideDiv('hide','unconditionoffer')">No</td>
			
			<tr><td>
    <td id="unconditionoffer" style="display: none">
    Company Name :
	<br>
	
	<input type="text" placeholder="If yes name the company" name="unconditional_offer_companyname" value="<?php echo $row['unconditional_offer_companyname']; ?>"  style="width:200px; height:30px"/></td>
</td></tr>
		
        </tr>
		
        <tr>
            <td>Is there any Corporate Tie-up for recruitment :</td>
           <td><input type="radio" name="corporate_tieup" value="Yes" <?php if($row['corporate_tieup']=='Yes'){ echo 'checked';}?> id="cYes" onclick="ShowHideDiv('show','corporatetieup')" >Yes
			<input type="radio" name="corporate_tieup" value="No" <?php if($row['corporate_tieup']=='No'){ echo 'checked';}?>   onclick="ShowHideDiv('hide','corporatetieup')">No</td>
			<tr><td>
			<td id="corporatetieup" style="display: none">
			Company Name :
			<br>
	
	<input type="text" placeholder="If yes name the company" name="corporate_tieup_companyname" value="<?php echo $row['corporate_tieup_companyname']; ?>" style="width:200px; height:30px"/></td>
</td></tr>
		
			
        </tr>
       
		<tr>
  <td>Type of Industry catering to :</td>
  <td> 
  
			<select style="width:200px; height:30px" id="course_details" type="text" name="industry_type" onchange="enableIndustry(this)" >
			
			 <?php
	
		$table_name1='industry';
		$col_name1='name';
		$arrvalue=$row['industry_type'];
	 
	 
	    $val->getoptionsfromdbchecked($table_name1,$col_name1,$arrvalue);
	    ?>
		</select>
		<br>
         <div id="coursedetails_panel"  style="display:none">

	    <input type="text" placeholder="If Others Specify" name="other_industrytype" value="<?php echo $row['other_industrytype']; ?>"style="width:200px; height:30px" >
       
	   
		</div>
</td></tr>
<tr>
            <td>Is it Approved by NSDC Program :</td>
            <td><input type="radio" name="nsdc_approval" value="Yes" <?php if($row['nsdc_approval']=='Yes'){ echo 'checked';}?> id="nsdc_approval">Yes
			<input type="radio" name="nsdc_approval" value="No" <?php if($row['nsdc_approval']=='No'){ echo 'checked';}?> id="nsdc_approval">No</td>
			
        </tr>
		<tr>
<td>Number of Locations(cities/districts) :</td>
			<td>
			    <input type="number" name="location_number" placeholder="Number of Locations" value="<?php echo $row['location_number']; ?>" style="width:200px; height:30px" /> 
			</td>
			
		</td>
		</tr>
		
		<tr>
<td>Name of the Location :</td>
			<td>
			<select style="width:200px; height:30px"  id="company_location" type="text" name="company_location" onchange="enableLocation(this)" >
			
			 <?php
	
		$table_name='searchjoblocationlist';
		$col_name='name';
		$arrvalue=$row['company_location'];
	 
	    $val->getoptionsfromdbchecked($table_name1,$col_name1,$arrvalue);
	    ?>
		</select>
		<br>
<div id="location_panel"  style="display:none">

	    <input type="text" placeholder="If Others Specify" name="other_companylocation" value="<?php echo $row['other_companylocation']; ?>" style="width:200; height:30px" >
       
	   
		</div>
		</td>
		</tr>
		 
		 <tr>
<td>Companies Previously Recruited From Institute :</td>
			<td>
			<input type="text" name="previous_recruited_companies" placeholder="Companies" value="<?php echo $row['previous_recruited_companies']; ?>" style="width:200px; height:30px" /> 
		</td>
		</tr>
		<tr>
<td>Type of Job the skill provides :</td>
			<td>
			 <select name="jobskill_type" style="width:200px; height:30px"  >
				<option><?php echo $row['jobskill_type'];  ?></option>
				<option>Basic entry level</option>
				<option>Specialised entry level</option>
				<option>Lateral recruit</option>
				</select>
			
		</td>
		</tr>
		 <tr>
<td>Monthly Gross Income expected :</td>
			<td> <select name="monthly_salary" style="width:200px; height:30px"  id="salary" >
			   <option><?php echo $row['monthly_salary'];  ?></option>
                        <option value="2500-3000">
						2500-3000</option>
						<option value="3000-4000">
						3000-4000</option>
						<option value="4000-5000">
						4000-5000</option>
						<option value="5000-10,000">
						5000-10,000</option>
						<option value="10,000-15,000">
						10,000-15,000</option>
						<option value="15,000-20,000">
						15,000-20,000</option>
						<option value="20,000-30,000">
						20,000-30,000</option>
						<option value="30,000-40,000">
						30,000-40,000</option>
						<option value="greaterthan50,000">
						>50,000</option>

                     </select>
		
			
		</td>
		</tr>
		<tr>
<td>Is it New Training Program :</td>
			
			<td><input type="radio" name="newtraining_program" value="Yes" <?php if($row['newtraining_program']=='Yes'){ echo 'checked';}?>  id="checkYes" onclick="ShowHideDiv('hide','newtrainingprogram')">Yes
			<input type="radio" name="newtraining_program" value="No" <?php if($row['newtraining_program']=='No'){ echo 'checked';}?>  id="checkNo" onclick="ShowHideDiv('show','newtrainingprogram')">No</td>
			
			
		<tr><td>
    <td id="newtrainingprogram" style="display: none">
    If no,how many years is it going on :
	<br>
	
	<select name="newtrainingprogram_years" style="width:200px; height:30px" >
	<option><?php echo $row['newtrainingprogram_years'];  ?></option>
	<option>0</option>
	<option>1</option>
	<option>2</option>
	<option>3</option>
	<option>4</option>
	<option>5</option>
	<option>6</option>
	<option>7</option>
	<option>8</option>
	<option>9</option>
	<option>10</option>
	<option>11</option>
	<option>12+</option>
	
	</select></td>
</td></tr>
		</tr>
		<tr>
<td>No Of Students Already Trained :</td>
			<td>
			<select name="students_trained" style="width:200px; height:30px" >
				<option><?php echo $row['students_trained'];  ?></option>
				<option> <10 </option>
				<option><30</option>
				<option><50</option>
				<option><100</option>
				<option><500</option>
				<option><1000</option>
				<option><5000</option>
				<option>>5000</option>
		</td>
		</tr>
		<tr>
<td>No Of Students Placed by the Institute :</td>
			<td>
			<input type="number" name="students_placed" placeholder="Approximate Number" value="<?php echo $row['students_trained'];  ?>" style="width:200px; height:30px">
		</td>
		</tr>
		<tr>
	<td>&nbsp;</td></tr>
		<tr bgcolor="#00bfff">
                    <td align="center" colspan="2">Eligibility Criteria Details</td>
					
            </tr>
			<tr>
	<td>&nbsp;</td></tr>
		<tr>
<td>Please select Basic Education :</td>
			<td>
			
			<select style="width:200px; height:30px"  id="basic_qualification" type="text" name="basic_qualification" onchange="enableQualification(this)" >
			
			 <?php
	
		$table_name3='qualificationlevel_list';
		$col_name3='name';
		$arrvalue=$row['basic_qualification'];
	 
	    $val->getoptionsfromdbchecked($table_name1,$col_name1,$arrvalue);
	    ?>
		</select>
		<br>
<div id="qualification_panel"  style="display:none">

	    <select style="width:200px; height:30px"  id="degree_qualification" type="text" name="degree_qualification" onchange="enableDegree(this)" >
			
			 <?php
	
		$table_name4='qualification_list';
		$col_name4='qualification';
		$arrvalue=$row['degree_qualification'];
	 
	    $val->getoptionsfromdbchecked($table_name1,$col_name1,$arrvalue);
	    ?>
		</select>
       
	   
		</div>
		
<div id="degree_panel"  style="display:none">

	    <input type="text" placeholder="If Others Specify" name="other_degree_qualification" value="<?php echo $row['other_degree_qualification'];  ?>"style="width:200px; height:30px" >
       
	   
		</div>
		</td>
		</tr>
		<tr>
<td>Please select Masters Education :</td>
			<td>
			<select style="width:200px; height:30px"  id="masters" type="text" name="masters_education" onchange="enableMasters(this)" >
		
			 <?php
	
		$table_name5='masters_list';
		$col_name5='name';
		$arrvalue=$row['masters_education'];
		
	 
	    $val->getoptionsfromdbchecked($table_name1,$col_name1,$arrvalue);
	    ?>
		</select>
		<br>
<div id="masters_panel"  style="display:none">

	    <input type="text" placeholder="If Others Specify" name="other_master_education" value="<?php echo $row['other_master_education'];  ?>" style="width:200px; height:30px" >
       
	   
		</div>
		</td>
		</tr>
		<tr>
<td>Eligibility Test :</td>
			
			<td><input type="radio" name="eligibility_test" value="Yes" <?php if($row['eligibility_test']=='Yes'){ echo 'checked';}?>  id="eligibility_test">Yes
			<input type="radio" name="eligibility_test" value="No" <?php if($row['eligibility_test']=='No'){ echo 'checked';}?>  id="eligibility_test">No</td>
		
		</tr>
		<tr>
<td>Name of the Test :</td>
			<td>
			<input type="text" name="test_name" value="<?php echo $row['test_name'];  ?>" placeholder="GMAT/XAT/Institute specific one name if any" style="width:200px; height:30px">
		
		</td>
		</tr>
		<tr>
<td>Written Test :</td>
			
			<td><input type="radio" name="written_test" value="Yes" <?php if($row['written_test']=='Yes'){ echo 'checked';}?>  id="written_test">Yes
			<input type="radio" name="written_test" value="No" <?php if($row['written_test']=='No'){ echo 'checked';}?>  id="written_test">No</td>
		
		</tr>
		<tr>
<td>Personal Interview :</td>
			
			<td><input type="radio" name="personal_interview" value="Yes" <?php if($row['personal_interview']=='Yes'){ echo 'checked';}?> id="personal_interview">Yes
			<input type="radio" name="personal_interview" value="No" <?php if($row['personal_interview']=='No'){ echo 'checked';}?> id="personal_interview">No</td>
		
		</tr>
		<tr>
<td>Group Discussion :</td>
			
			<td><input type="radio" name="group_discussion" value="Yes" <?php if($row['group_discussion']=='Yes'){ echo 'checked';}?> id="group_discussion">Yes
			<input type="radio" name="group_discussion" value="No" <?php if($row['group_discussion']=='No'){ echo 'checked';}?> id="group_discussion">No
		</td>
		</tr>
		
		<tr>
<td>Previous Academic Percentage :</td>
			
			<td><input type="radio" name="previous_academic_percentage" value="Yes" <?php if($row['previous_academic_percentage']=='Yes'){ echo 'checked';}?> id="ckYes" onclick="ShowHideDiv('show','previousacademic_percentage')">Yes
			<input type="radio" name="previous_academic_percentage" onclick="ShowHideDiv('hide','previousacademic_percentage')" value="No" <?php if($row['previous_academic_percentage']=='No'){ echo 'checked';}?> id="eligibility_test">No
		</td>
		<tr><td>
    <td id="previousacademic_percentage"  style="display: none">
    If Yes,cut off Percentage/CGPA :
	<br>
	<input type="text" name="cutoff_percentage" value="<?php echo $row['cutoff_percentage'];  ?>" placeholder="If Yes,cut off Percentage/CGPA" style="width:200px; height:30px"/></td>
</td></tr>
		</tr>
		<tr>
	<td>&nbsp;</td></tr>
		<tr bgcolor="#00bfff">
                    <td align="center" colspan="2">Fees and Expenses Details</td>
					
            </tr>
			<tr>
	<td>&nbsp;</td></tr>
		<tr>
<td>Tution Fees :</td>
			<td>
			<input type="number" name="tution_fees" id="tution_fees" placeholder="Tution fees" value="<?php echo $row['tution_fees'];  ?>" style="width:200px; height:30px" />
		</td>
		</tr>
		<tr>
<td>Examination Fees :</td>
			<td>
			<input type="number" name="examination_fees" id="examination_fees" placeholder="Examination fees" value="<?php echo $row['examination_fees'];  ?>" style="width:200px; height:30px" />
		</td>
		</tr>
		<tr>
<td>Cost of Study Materials :</td>
			<td>
			<input type="number" name="studymaterials_cost" id="studymaterials_cost" placeholder="Cost of Study Materials" value="<?php echo $row['studymaterials_cost'];  ?>" style="width:200px; height:30px" />
		</td>
		</tr>
		<tr>
<td>Travelling Expenses :</td>
			<td>
			<input type="number" name="travelling_expenses" id="travelling_expenses" placeholder="Travelling Expenses" value="<?php echo $row['travelling_expenses'];  ?>" style="width:200px; height:30px" />
		</td>
		</tr>
		<tr>
<td>Transportation Expenses :</td>
			<td>
			<input type="number" name="transportation_expenses" id="transportation_expenses" value="<?php echo $row['transportation_expenses'];  ?>" placeholder="Transportation Expenses" style="width:200px; height:30px" />
		</td>
		</tr>
		<tr>
<td>Owner/ Promoter's training experience :</td>
			
			<td><input type="radio" name="owner_training_experience" value="Yes" <?php if($row['owner_training_experience']=='Yes'){ echo 'checked';}?> id="chekYes" onclick="ShowHideDiv('show','owner_trainingexperience_years')">Yes
			<input type="radio" name="owner_training_experience" value="No" <?php if($row['owner_training_experience']=='No'){ echo 'checked';}?> id="owner_training_experience" onclick="ShowHideDiv('hide','owner_trainingexperience_years')">No
		</td>
		<tr><td>
    <td id="trainingexperience"  style="display: none">
    If yes mention in years :
	<br>
	<select name="owner_trainingexperience_years" style="width:200px; height:30px" >
	<option><?php echo $row['owner_trainingexperience_years'];  ?></option>
	<option>0</option>
	<option>1</option>
	<option>2</option>
	<option>3</option>
	<option>4</option>
	<option>5</option>
	<option>6</option>
	<option>7</option>
	<option>8</option>
	<option>9</option>
	<option>10</option>
	<option>11</option>
	<option>12+</option>
	
	</select></td>
</td></tr>
<tr>
<td>Owner/ Promoter's Industry experience :</td>
			
			<td><input type="radio" name="owner_industry_experience" <?php if($row['owner_industry_experience']=='Yes'){ echo 'checked';}?> value="Yes" id="chekYes" onclick="ShowHideDiv('show','industryexperience')">Yes
			<input type="radio" name="owner_industry_experience" <?php if($row['owner_industry_experience']=='No'){ echo 'checked';}?> value="No" id="owner_industry_experience" onclick="ShowHideDiv('hide','industryexperience')">No
		</td>
		<tr><td>
    <td id="industryexperience"  style="display: none">
    If yes mention in years :
	<br>
	<select name="owner_industryexperience_years" style="width:200px; height:30px" >
	<option ><?php echo $row['owner_trainingexperience_years'];  ?></option>
	<option>0</option>
	<option>1</option>
	<option>2</option>
	<option>3</option>
	<option>4</option>
	<option>5</option>
	<option>6</option>
	<option>7</option>
	<option>8</option>
	<option>9</option>
	<option>10</option>
	<option>11</option>
	<option>12+</option>
	
	</select></td>
</td></tr>
		</tr>
		<tr>
<td>Owner/Promoter's experience relevance to course :</td>
			
			<td><input type="radio" name="owner_course_experience" <?php if($row['owner_course_experience']=='Yes'){ echo 'checked';}?> value="Yes" id="chekYes" onclick="ShowHideDiv('show','courseexperience')">Yes
			<input type="radio" name="owner_course_experience" <?php if($row['owner_course_experience']=='No'){ echo 'checked';}?> value="No" id="owner_course_experience" onclick="ShowHideDiv('hide','courseexperience')">No
		</td>
		<tr><td>
    <td id="courseexperience"  style="display: none">
    If yes mention in years :
	<br>
	<select name="owner_courseexperience_years" style="width:200px; height:30px" >
	<option><?php echo $row['owner_courseexperience_years'];  ?>-</option>
	<option>0</option>
	<option>1</option>
	<option>2</option>
	<option>3</option>
	<option>4</option>
	<option>5</option>
	<option>6</option>
	<option>7</option>
	<option>8</option>
	<option>9</option>
	<option>10</option>
	<option>11</option>
	<option>12+</option>
	
	</select></td>
</td></tr>
		</tr>
		</tr>
		<tr>
<td>Corporate driven Institute(Run as and by a Company) :</td>
			
			<td><input type="radio" name="corporate_driven_institute" value="Yes" <?php if($row['corporate_driven_institute']=='Yes'){ echo 'checked';}?>  id="cekYes" onclick="ShowHideDiv('show','corporatedriven_institute')">Yes
			<input type="radio" name="corporate_driven_institute" value="No" <?php if($row['corporate_driven_institute']=='No'){ echo 'checked';}?>  id="corporate_driven_institute" onclick="ShowHideDiv('hide','corporatedriven_institute')">No
		</td>
		<tr><td>
    <td id="corporatedriven_institute"  style="display: none">
    If yes mention in years :
	<br>
	<select name="corporate_driveninstitute_years" style="width:200px; height:30px" >
	<option><?php echo $row['corporate_driveninstitute_years']; ?></option>
	<option>0</option>
	<option>1</option>
	<option>2</option>
	<option>3</option>
	<option>4</option>
	<option>5</option>
	<option>6</option>
	<option>7</option>
	<option>8</option>
	<option>9</option>
	<option>10</option>
	<option>11</option>
	<option>12+</option>
	
	</select></td>
</td></tr>

</tr>

<tr>
<td>NSDC standard Content:</td>
			
		<td><input type="radio" name="NSDC_standard_content"<?php if($row['NSDC_standard_content']=='Yes'){ echo 'checked';}?> value="Yes" onclick="ShowHideDiv('hide','NSDC_standardcontent')">Yes
		<input type="radio" name="NSDC_standard_content" <?php if($row['NSDC_standard_content']=='No'){ echo 'checked';}?> value="No" id="cekYes"  id="NSDC_standard_content" onclick="ShowHideDiv('show','NSDC_standardcontent')">No
		</td>
		<tr>
		 <td id="NSDC_standardcontent" style="display: none">
    Institute's inhouse developed content :
	
	   <input type="radio" name="institute_inhouse" <?php if($row['institute_inhouse']=='Yes'){ echo 'checked';}?> value="Yes" >Yes
		<input type="radio" name="institute_inhouse" <?php if($row['institute_inhouse']=='No'){ echo 'checked';}?> value="No"  id="Institute_inhouse" >No
		</td>
       </td></tr>
   <tr>
      <td>Industry approved content(govt/semi govt/other pvt):</td>
			
		<td><input type="radio" name="industry_approved_content" <?php if($row['industry_approved_content']=='Yes'){ echo 'checked';}?> value="Yes" >Yes
		<input type="radio" name="industry_approved_content"  <?php if($row['industry_approved_content']=='No'){ echo 'checked';}?> value="No"  id="industry_approved_content" >No
		</td>
		
   </tr>
    <tr>
      <td>Trainers Qualification:</td>
			
		<td><input type="text" name="trainers_qualification" value="<?php echo $row['trainers_qualification'];  ?>" >
		
		</td>
		
   </tr>
   <tr>
      <td>Delivery Model:</td>
			
		<td><input type="text" name="delivery_model" value="<?php echo $row['delivery_model'];  ?>" >
		
		</td>
		
   </tr>
		
		
	<tr>
			<td>&nbsp;</td></tr>
           <td align="center" colspan="3">                
             
             
                 
            </td>
        </tr>
		
    </table>
	   <input type='submit' value='Update' id="noprint" />
	     <a href="read_Training_Institutedetails.php"><input type='button' value='cancel' ></a>
	<input  type="button" onclick="printData()" value="print" >
</form>

<?php include('./common/comFooter.php');?>