 <?php 
 session_start();
 
 include('common/class_Common.php');
						  
   $val=new Common();
  
  include('./connection.php');
  
 // partner id
	$employee_id=$_SESSION['user_id'];
  
  $select_query= "Select course_id,coursetitle_name,course_name,course_type,course_duration_years,course_duration_months,sessions_of_program,conditional_offer_beforetraining,conditional_offer_companyname,unconditional_offer_beforetraining,unconditional_offer_companyname,corporate_tieup,corporate_tieup_companyname,industry_type,other_industrytype,nsdc_approval,location_number,company_location,other_companylocation,previous_recruited_companies,jobskill_type,monthly_salary,newtraining_program,newtrainingprogram_years,students_trained,students_placed,basic_qualification,degree_qualification,other_degree_qualification,masters_education,other_master_education,eligibility_test,test_name,written_test,personal_interview,group_discussion,previous_academic_percentage,cutoff_percentage,tution_fees,examination_fees,studymaterials_cost,travelling_expenses,transportation_expenses,owner_training_experience,owner_trainingexperience_years,corporate_driven_institute,corporate_driveninstitute_years from institute_partnerdetails where employee_id='$employee_id'";
  
//echo($select_query);
$result = mysql_query($select_query); 
$count=mysql_num_rows($result);



?>  
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml">

<!-- #BeginTemplate "webtemplate.dwt" -->

<head id="Head">
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta content="First Education Loans in India, Fast Education Loans" name="description" />
<meta content="Financial Consultancy, Education Loans" name="keywords" />
<meta content="&amp;copy; 2011 KSFi Ltd." name="COPYRIGHT" />
<meta content="KSFi Ltd" name="AUTHOR" />
<meta content="DOCUMENT" name="RESOURCE-TYPE" />
<meta content="GLOBAL" name="DISTRIBUTION" />
<meta content="INDEX, FOLLOW" name="ROBOTS" />
<meta content="1 DAYS" name="REVISIT-AFTER" />
<meta content="GENERAL" name="RATING" />
<meta content="RevealTrans(Duration=0,Transition=1)" http-equiv="PAGE-ENTER" />
<title>Education Loans KSF Pvt Ltd.</title>

<link id="KSFSkin" href="css/ksfi.css" rel="stylesheet" type="text/css">



<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/bootstrap-submenu.min.js" defer></script>
<style>

<style>

.formHeader,td{
	
	
	text-align:center;
}

/*  Define the background color for all the EVEN background rows  */
	.TFtable tr:nth-child(even){

   background: #d0dafd none repeat scroll 0 0;
    border-bottom: 1px solid #fff;
    border-top: 1px solid transparent;
    color: #669;
    padding: 8px;
		
		
	}
/*  Define the background color for all the odd background rows  */
	.TFtable tr:nth-child(odd){
	
	 border-bottom: 1px solid #fff;
    border-top: 1px solid transparent;

		background: ;
		
		
	}
</style>


</head>

<body id="Body">



	
		
<div align="center">
<?php  include_once('./common/bootstrap_common_mainmenu.php'); ?>

	



<form  action='update_institute_partnerdetails.php' method='post' border='0'>
    
	<?php if($count!=0)
		
	{ ?>
	
	<table   width="600" align="left"  >
			
	
	
         <tr >
                    <h3 align="center" colspan="6">List Of Registered Courses</h3>
					<td><a href="institute_partner.php"  class="button" style="color:000">Add New Course</a></td>
            </tr>
		</table>	
			
	<table  cellpadding="3" class="TFtable" cellspacing="0" border="1" width="900" align="center" style="font-size: 14px" >
			
	<tr height="20px"></tr>
	
	
	<tr>
	    
		 <th class="formHeader">Title of the Course </th>
	     <th class="formHeader">Name of the Course </th>
	     <th class="formHeader">Course Type </th>
	     <th class="formHeader">Name of the Location </th>
	     <th class="formHeader">Specific Sessions Of The Program </th>
		 <th class="formHeader">Action</th>
		
		
		
	</tr>
	<?php while($row = mysql_fetch_array($result)) { ?>
	<tr>
	    
		<td><?php echo $row['coursetitle_name']; ?> </td>
	    <td><?php echo $row['course_name']; ?></td>
	    <td><?php echo $row['course_type']; ?> </td>
	    <td><?php echo $row['company_location']; ?></td>
	    <td><?php echo $row['sessions_of_program'];?></td>
		<td><a href="institute_partner.php?course_id=<?php echo $row['course_id']; ?>">Edit</a></td>
		
		
	</tr>
	
	<?php } ?>    
	</table>
	  <?php   }  else { ?>
	
	<table align="center">
	<tr height="90">
	     <td>
		Click here to <a href="institute_partner.php"> Add new course details  </a>
		</td>
   </tr>
  
	<?php  } ?>
 </table>
 
 <table>
       <tr height="20"></tr>
 </table>
</form>


<!-------footer---------->
							
							
					<table style="width:100%; height:30px; background-color:#87CEFA; color:#778899; text-align:center; font-size:12px">		
							<tr><td> &copy; 2011 KSFi  Pvt Ltd.-<a class="Normal" style="color:#778899;" href="disclaimer.html" target="_self">
									Disclaimer</a>&nbsp;&nbsp; |&nbsp;&nbsp;
									<a class="Normal" style="color:#778899;" href="privacypolicy.html" target="_self">
									Privacy Policy</a></td></tr>
							</table>
					
	</div>



</body>



</html>

		