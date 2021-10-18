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

$loanrequiredforcourseType = $_POST['loanrequiredforcourseType'];



$loanMonth = $_POST['loanMonth'];

$loanYear = $_POST['loanYear1'];

$loanYear1=$_POST['loanYear'];



if($loanYear1!="")

{

    $loanYear=$loanYear1;

}




$duration = $_POST['duration'];

$durationIn = $_POST['DurationIn'];

$security = $_POST['security'];





//database connection

include('./connection.php');



//to send the information into the database

$select_record="Select * from student_details where reference_id='".$reference_id."'";

$select_query=mysql_query($select_record) or die(mysql_error());



if((mysql_num_rows($select_query) != 0))

{	

	//inserting student details

	$add_new="UPDATE  student_details SET entranceTest='$entranceTest',typeoftest='$typeoftest',GDScore='$GDScore',PIScore='$PIScore'

    where reference_id='$reference_id'";

 

echo($add_new);

echo "\n";



	$add_query=mysql_query($add_new);
	
	
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
		echo $insertquery;	 
		
	 }
	 
	 
  
	elseif($entranceTest=='No')

	{

       mysql_query("delete from test_score where reference_id='$reference_id'");

	}	
	
	
	 
										    $courseAddRecord="select 1 from course_details where reference_id='$reference_id'";

         $run_courseColAdd=mysql_query($courseAddRecord);

     if (mysql_num_rows($run_courseColAdd) != 0)

             {

                //update course details

                $add_course_details="UPDATE course_details SET studyCountry='$studyCountry',otherCountry='$otherCountry',university='$university',course='$course',

                courseCategory='$courseCategory',otherCourse='$otherCourse',typeCourse='$typeCourse',loanrequiredforcourseType='$loanrequiredforcourseType',loanMonth='$loanMonth',loanYear='$loanYear',

                 duration='$duration', durationtype='$durationIn',security='$security' 

                where reference_id='$reference_id'";  

                 $add_newcoursequery6=mysql_query($add_course_details);	

             }

      else

      {

           $add_course_details="Insert into course_details(reference_id,studyCountry,otherCountry,university,course,courseCategory,otherCourse,typeCourse,loanrequiredforcourseType,loanMonth,loanYear,duration,security,durationtype

			    values('$reference_id','$studyCountry','$otherCountry','$university','$course','$courseCategory','$otherCourse','$typeCourse','$loanrequiredforcourseType','$loanMonth','$loanYear','$duration','$security','$durationIn')";

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

			 
			 
			  //select id for course  in application_scoringfields_list table
            $courseid=$objCommon->getIdofrecord('application_scoringfields_list','actual_field_name','course');
			
			
			   //select id for college  in application_scoringfields_list table
            $collegeid=$objCommon->getIdofrecord('application_scoringfields_list','actual_field_name','college');
			
			
			$select_query1=mysql_query("SELECT options FROM `options_scoring_list` where  field_id='$courseid' and options='$course' ");
			
			$select_query2=mysql_query("SELECT options FROM `options_scoring_list` where  field_id='$collegeid' and options='$college' ");
			
			
			$count_coursesexists=mysql_num_rows($select_query1);
			
			$count_collegeexsists=mysql_num_rows($select_query2);
			
			
				//check whether newcourse_collegedetails_list having record  with same referenceID 
			$sql6=mysql_query("select Reference_id from newcourse_collegedetails_list where Reference_id='$reference_id' ");
			
			//count rows
			$count_rows=mysql_num_rows($sql6);
			
			
			
		
			
			
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


           header("Location: ./scoring/newcourse_ranking.php?id=".$reference_id);		   
		
		}
        else
        {    
		
		  	   
           mysql_query("delete from newcourse_collegedetails_list where Reference_id='$reference_id'");
		   
             $Msg = 4;

			//$Msg ="Duplicate Records cannot be added.";

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