<?php
session_start();
include('./connection.php');



	 $select_query1="SELECT reference_id,firstname ,lastname,email,mobile,prevCourse,prevUniversity,college,course,amount,partnername,AccManager,serviceRep,created 
                    
					FROM  registration_details ";
		 
		 $select_record1= mysql_query($select_query1);
	
          {
	        $count_newcourses1=mysql_num_rows($select_record1);
	   
		 } if($select_record1)
		 {
			 $count_newcourses1=1;
		 }
		 else
		{
		  $count_newcourses1=0;
		}
		
		


?>
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
 
 
 <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">--->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <style>
  .dropbtn {
  background-color: #3498DB;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
  
}

#dropdown {
  position: relative;
  display: inline-block;
  
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
   height:600%;
  
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
 
 
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
.heading{ 
background:#E6F0FA; 
font:bold 12px;
 text-align:center;
 
 }

}
</style>
<script>

	
	function onclickClearall()
	
	{
	
	
	document.getElementById('fdate').value="";
	document.getElementById('tdate').value="";
	document.getElementById('location').value="";
	document.getElementById('referenceID').value="";
	document.getElementById('name').value="";
	document.getElementById('mobile').value="";
	document.getElementById('email').value="";
	document.getElementById('app_status').value="";
	
	
	
	}

    </script>	

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
<script>
function selectedapplication(fld)
 
 {
	var link="";
 //selected application id
    var selectedapp = fld.id
	
	//alert(selectedapp);
	
	//selected link
	var link= document.getElementById('link').value;
	

	document.getElementById('selectedAppl').value=selectedapp;
	
	
	window.location.href=link+"?id="+selectedapp;
	
	
	

 }
</script>
<script>
 function onselectShowContent(sel_queue,link,heading) {
	 
     var searchloans=document.getElementById('searchloans');
	 
	var searchbutton1= document.getElementById('searchbutton1');
	
	var searchbutton2= document.getElementById('searchbutton2');
	
	//hide the submit button 
	searchbutton1.hidden=true;
	
	searchbutton2.hidden=false;
	
	//disable the application status 
	document.getElementById('app_status').disabled=true;
	
	if(sel_queue!='')
	{
	 
     document.getElementById('sel_queue').value=sel_queue;
	 
	 document.getElementById('link').value =link;
	 
	 document.getElementById('sub_heading').value =heading;
	 
	}
	
	else{
		
		sel_queue=document.getElementById('sel_queue').value;
	 
	    link=document.getElementById('link').value;
		
		heading=document.getElementById('sub_heading').value ;
	 
	}
	 
	var fdate=document.getElementById('fdate').value;
	var tdate=document.getElementById('tdate').value;
	var location=document.getElementById('location').value;
	var referenceID=document.getElementById('referenceID').value;
	var name=document.getElementById('name').value;
	var mobile=document.getElementById('mobile').value;
	var email=document.getElementById('email').value;
	var app_status=document.getElementById('app_status').value;
	var typeofLoan=document.getElementById('typeofLoan').value;
	
	 
	
 var dataserialize="heading="+heading+"&sel_queue="+sel_queue+"&fdate="+fdate+"&tdate="+tdate+"&location="+location+"&referenceID="+referenceID+"&name="+name+"&mobile="+mobile+"&email="+email+"&app_status="+app_status+"&typeofLoan="+typeofLoan;
		   
		   var url="";
		   
		   if(sel_queue=='pendingdocs'||sel_queue=='PDD')
		   {
			   url="documents_pendingAppl.php";
		   }
		   else
		   {
			  url ="get_processing_queuedetails.php";
		   }
	       
	   $.ajax({
           type: "POST",
           url: url,
           data: dataserialize, // serializes the form's elements.
           success: function(data)
           {
			   
			  
			  
			    $('#app').html(data);
				
	  
             
           }
         });

}

function viewpage()

{
	
	
	
	var selectedapp=document.getElementById('selectedAppl').value;

		
	window.location.href="./EditApplication.php?id="+selectedapp;
	
	
}

		function displaydate(id)	
		{
			
			$( id ).datepicker({
			changeMonth: true,
			changeYear: true,
			maxDate:new Date(),
			yearRange:"c-100:c+1",
                        dateFormat: "yy-mm-dd"
		}).focus();  
		 }
		
		
</script>
<style>
body{
	background-color:white;
	
}
</style>
</head>
<body id="Body">

<div align="center">


		<?php  include('./common/bootstrap_common_mainmenu.php');  ?>
					<!-- #BeginEditable "Content" -->
					<table>
	

<div class="container">
    <div class="row">
        <div class="col-md-3">
 	 <div class="dropdown" id="dropdown" >
  <button onclick="myFunction()" class="dropbtn">Process Queue&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="caret"
  style="color:white"></span></button>
  <div id="myDropdown" class="dropdown-content">
   <a href="javascript:void(0)" onclick="onselectShowContent('leads','','Leads')" align="left">Leads</a>
  <a href="javascript:void(0)" onclick="onselectShowContent('Application','EditApplication.php','Applications')" align="left">Applications </a>
  <a href="javascript:void(0)" onclick="onselectShowContent('pendingdocs','DocumentUpload.php','Documents Pending')" align="left">Documents Pending  </a>
  <a href="javascript:void(0)" onclick="onselectShowContent('verfication','./verification/ResidenceVerification.php','Verification Pending')"align="left">Verification Pending  </a>
  <a href="javascript:void(0)" onclick="onselectShowContent('sanctionpending','sanction_mail.php','Sanction Pending')" align="left">Sanction Pending</span></a>
  <a href="javascript:void(0)" onclick="onselectShowContent('PFP','credit_appraisal_memo.php','Processing Fee Pending')" align="left">Processing Fee Pending </span></a>
  <a href="javascript:void(0)" onclick="onselectShowContent('SC_PP','credit_appraisal_memo.php','Sanction completed,PF pending ',)" align="left">Sanction completed,PF pending </span></a>
  <a href="javascript:void(0)" onclick="onselectShowContent('DP','ApplicationStatus.php','Disbursement Pending')" align="left">Disbursement Pending</span></a>
  <a href="javascript:void(0)" onclick="onselectShowContent('PDD','DocumentUpload.php','Post Disbursement docs')" align="left">Post Disbursement docs</span></a>
  <!--<a href="javascript:void(0)" onclick="onselectShowContent('BS','','Billing & Servicing')">Billing & Servicing </span></a>--->
  </div>
</div>
</div></div>
    <div class="row">
        <div class="col-md-7"  id="app" >
	     
		 
		 </div>
		 
		 
		 
		 
		 
 <div class="col-md-5" id="app"   >
<form id="searchStatus" action="send_DisplaySearchresult.php" autocomplete="off" enctype="multipart/form-data" method="post"  onsubmit="return SearchAppStatus(this)" > 
	  <div class="form-group" class="heading">Search Applications</div>
	<div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
							<input name="fdate"  id= "fdate" placeholder="From Date"  type="text" class="form-control border-input"  value="<?php if(isset($prevsearch)) {  echo $fdate;  }   else {  echo $fromdate;  } ?>" 
								onclick="displaydate('#fdate')">
							

		</div></div>
		
	 <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
							<input name="tdate" id="tdate" placeholder="To Date" size="40" class="form-control border-input"  type="text" value="<?php if(isset($prevsearch)) {  echo $tdate;  }   else {  echo $current_date;  } ?>" onclick="displaydate('#tdate')" >
        </div></div>
		<div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
							<input name="location"  id="location" placeholder="Location" class="form-control border-input"  type="text" value="<?php if(isset($prevsearch)) {  echo $location;  }   ?>">

		</div></div>	

	 <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
	                   

					   <input name="referenceID" id="referenceID" placeholder="Reference ID"  class="form-control border-input"  size="40" type="text" value="<?php if(isset($prevsearch)) {  echo $reference_id;  }   ?>">
	   </div></div>
	   
	   <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
							<input name="name" id="name" title ="search with single letter eg:r"  placeholder="Name"  class="form-control border-input"   size="40" type="text" value="<?php if(isset($prevsearch)) {  echo $name;  }   ?>">
							

		</div></div>
		
	 <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
							<input name="mobile"  id="mobile"  maxlength="10"  placeholder="Mobile" class="form-control border-input"  type="text" value="<?php if(isset($prevsearch)) {  echo $mobile;  }   ?>">
        </div></div>
		<div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
							<input name="email"  id="email" placeholder="Applicant Email" class="form-control border-input"  type="text" value="<?php if(isset($prevsearch)) {  echo $email;  }   ?>">

		</div></div>	

	 <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
	                   

					   <input name="app_status"  id="app_status" placeholder="Application Status" class="form-control border-input"  size="40" type="text" value="<?php if(isset($prevsearch)) {  echo $app_status;  }   ?>">
	   </div></div>
	    <div class="form-group">
	   
	                          <div class="col-md-10 col-md-offset-1">
								
										<select id="typeofLoan" placeholder="Loan Type" class="form-control border-input"  name="typeofLoan" size="1"

                                    <?php if($readonly) echo 'disabled=disabled'; 

                                ?> onchange="return onchangetypeofLoan(this);">
                             <option value=""> Select Loan Type</option>
                            <option <?php 

                                    if(isset($prevsearch)) { if( $typeofLoan == 'Vocational Education')

                                    {        echo "selected='selected'";  }    }										     

                                    ?> >Vocational Education</option>
									
						<option <?php 

                                    if(isset($prevsearch)) { if( $typeofLoan == 'Higher Education')

                                    {        echo "selected='selected'";      } }										     

                                    ?> >Higher Education</option>
									

                            <option <?php 

                                    if(isset($prevsearch)) { if( $typeofLoan== 'Vehicle Finance')

                                    {        echo "selected='selected'";     } }										     

                                    ?> >Vehicle Finance</option>



                           <option <?php 

                                    if(isset($prevsearch)) { if( $typeofLoan == 'Livelihood Loan')

                                    {        echo "selected='selected'";  }    }										     

                                    ?> >Livelihood Loan</option>
									
							     <option <?php 

                                    if(isset($prevsearch)) { if( $typeofLoan == 'SME Loans')

                                    {        echo "selected='selected'";      } }										     

                                    ?> >SME Loans</option>
									
									
									
									
                            </select>
							

		</div></div>
		
		<input type="hidden" value="" id="selectedAppl" >
								<input type="hidden" value="" id="sel_queue" value="" >
								<input type="hidden" value="" id="link" value="" >
								<input type="hidden" value="" id="sub_heading" value="" >										
		<a href="javascript:void(0);" onclick="onselectShowContent('','')">	<input id="searchbutton2" name="submit"  style="font-size:16px" type="button" value="Search" hidden='hidden'></a>
								
							     <input name="submit" id="searchbutton1" style="font-size:16px" type="submit" value="Search"></a>
								
									
									<input name="Reset"  style="font-size:16px" type="button" value="Reset"  onclick="onclickClearall();">
									
									<a href=""><input name="submit" type="button" value="Refresh" ></a>
		

                   </form>
                                                               
	 </div></div></div>
	

		
		 
 



<?php include('./common/bootstrap_commonFooter.php');?>

			
	