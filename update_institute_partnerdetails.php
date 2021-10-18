	<?php
	
	session_start();
	
	include('./connection.php');
	
	// partner id
	$employee_id=$_SESSION['user_id'];
	
	
	$course_id=$_POST['course_id'];
	
	
	$coursetitle_name =$_POST['coursetitle_name'];
	$course_name = $_POST['course_name'];
	$course_type= $_POST['course_type'];
	$course_duration_years= $_POST['course_duration_years'];
	$course_duration_months= $_POST['course_duration_months'];
	$sessions_of_program= $_POST['sessions_of_program'];
	$conditional_offer_beforetraining= $_POST['conditional_offer_beforetraining'];
	$conditional_offer_companyname= $_POST['conditional_offer_companyname'];
    $unconditional_offer_beforetraining= $_POST['unconditional_offer_beforetraining'];
	$unconditional_offer_companyname= $_POST['unconditional_offer_companyname'];
	$corporate_tieup= $_POST['corporate_tieup'];
	$corporate_tieup_companyname= $_POST['corporate_tieup_companyname'];
	$industry_type= $_POST['industry_type'];
	$other_industrytype= $_POST['other_industrytype'];
	$nsdc_approval = $_POST['nsdc_approval'];
	$location_number= $_POST['location_number'];
	$company_location = $_POST['company_location'];
	$other_companylocation= $_POST['other_companylocation'];
	$previous_recruited_companies= $_POST['previous_recruited_companies'];
	$jobskill_type= $_POST['jobskill_type'];
	$monthly_salary= $_POST['monthly_salary'];
	$newtraining_program= $_POST['newtraining_program'];
	$newtrainingprogram_years= $_POST['newtrainingprogram_years'];
	$students_trained= $_POST['students_trained'];
	$students_placed= $_POST['students_placed'];
	$basic_qualification= $_POST['basic_qualification'];
	$degree_qualification= $_POST['degree_qualification'];
	$other_degree_qualification= $_POST['other_degree_qualification'];
	$masters_education= $_POST['masters_education'];
	$other_master_education= $_POST['other_master_education'];
	$eligibility_test= $_POST['eligibility_test'];
	$test_name= $_POST['test_name'];
	$written_test= $_POST['written_test'];
    $personal_interview= $_POST['personal_interview'];
	$group_discussion= $_POST['group_discussion'];
	$previous_academic_percentage= $_POST['previous_academic_percentage'];
	$cutoff_percentage= $_POST['cutoff_percentage'];
	$tution_fees= $_POST['tution_fees'];
	$examination_fees= $_POST['examination_fees'];
	$studymaterials_cost= $_POST['studymaterials_cost'];
	$travelling_expenses= $_POST['travelling_expenses'];
	$transportation_expenses= $_POST['transportation_expenses'];
	$owner_training_experience= $_POST['owner_training_experience'];
	$owner_trainingexperience_years= $_POST['owner_trainingexperience_years'];
    $corporate_driven_institute= $_POST['corporate_driven_institute'];
	$updatedby= $_POST['updatedby'];
	$corporate_driveninstitute_years= $_POST['corporate_driveninstitute_years'];

	$owner_industry_experience= $_POST['owner_industry_experience'];
	 $owner_industryexperience_years= $_POST['owner_industryexperience_years'];
	 $owner_course_experience= $_POST['owner_course_experience'];
	 $owner_courseexperience_years= $_POST['owner_courseexperience_years'];
	 $NSDC_standard_content= $_POST['NSDC_standard_content'];
	 $institute_inhouse= $_POST['institute_inhouse'];
	 $industry_approved_content= $_POST['industry_approved_content'];
	 $trainers_qualification= $_POST['trainers_qualification'];
	 $delivery_model= $_POST['delivery_model'];
	
	
	
	
	
	
	$sql="update  institute_partnerdetails  set coursetitle_name='$coursetitle_name' ,course_name='$course_name' ,course_type='$course_type',course_duration_months='$course_duration_months',course_duration_years='$course_duration_years',
	sessions_of_program='$sessions_of_program',conditional_offer_beforetraining='$conditional_offer_beforetraining',
	conditional_offer_companyname='$conditional_offer_companyname',
    unconditional_offer_beforetraining='$unconditional_offer_beforetraining' ,unconditional_offer_companyname='$unconditional_offer_companyname',corporate_tieup='$corporate_tieup',corporate_tieup_companyname='$corporate_tieup_companyname' ,industry_type='$industry_type',
	other_industrytype='$other_industrytype',nsdc_approval='$nsdc_approval' ,location_number='$location_number',company_location ='$company_location',other_companylocation='$other_companylocation',previous_recruited_companies='$previous_recruited_companies',
	jobskill_type='$jobskill_type',monthly_salary='$monthly_salary',newtraining_program='$newtraining_program',newtrainingprogram_years='$newtrainingprogram_years',
	students_trained='$students_trained',students_placed='$students_placed',
	basic_qualification='$basic_qualification',degree_qualification='$degree_qualification',other_degree_qualification='$other_degree_qualification',masters_education='$masters_education',other_master_education='$other_master_education',eligibility_test='$eligibility_test',test_name='$test_name',written_test='$written_test',
    personal_interview='$personal_interview',group_discussion='$group_discussion',previous_academic_percentage='$previous_academic_percentage',cutoff_percentage='$cutoff_percentage',tution_fees='$tution_fees',examination_fees='$examination_fees',studymaterials_cost='$studymaterials_cost',
	travelling_expenses='$travelling_expenses',transportation_expenses='$transportation_expenses',owner_training_experience='$owner_training_experience',
	owner_trainingexperience_years='$owner_trainingexperience_years',
		corporate_driven_institute='$corporate_driven_institute',
		updatedby='$updatedby',corporate_driveninstitute_years='$corporate_driveninstitute_years',
		owner_industry_experience='$owner_industry_experience',owner_industryexperience_years='$owner_industryexperience_years',
		  owner_course_experience='$owner_course_experience',owner_courseexperience_years='$owner_courseexperience_years',
		  NSDC_standard_content='$NSDC_standard_content', institute_inhouse='$institute_inhouse',
		  industry_approved_content='$industry_approved_content',trainers_qualification='$trainers_qualification',
		  delivery_model='$delivery_model',updated=NOW() where employee_id=$employee_id and course_id='$course_id' ";
	
	
	
	//echo $sql;
	mysql_query($sql);
	
	
	header('Location:read_Training_Institutedetails.php');
	
	exit;
	
	
	
	
	
	?>