<?php

session_start();


             include('./connection.php');

          include('common/class_Common.php');
						  
             $objCommon=new Common();
			 
			    if(($_SESSION['usertype'] == 'Employee') || ($_SESSION['usertype'] == 'Partner') || ($_SESSION['usertype'] == 'Agency') || ($_SESSION['usertype'] == 'Institute'))

            {

            $reference_id=$_SESSION['AppID'];

            //$email=$_POST[''];

            }

            else 

            {

            $reference_id=$_SESSION['id'];

            $email = $_SESSION['email'];

            }
			$select = "Select firstname,loantype,typeofLoan from student_details where reference_id = '$reference_id'";

			$record=mysql_query($select); 

			$count= mysql_num_rows($record);
			
			if($count!=0)
			{
				$table1='student_details';
				$table2='course_details';
				
				
			}
			else
			{
				$table1='registration_details';
				$table2='registration_details';
					
			}

			

			$select_query = "Select firstname,loantype,typeofLoan from $table1 where reference_id = '$reference_id'";

			$select_record=mysql_query($select_query); 

			



			$row= mysql_fetch_row($select_record);

				

			if($row)

					{

						$col = array( 'firstname','loantype','typeofLoan');



						$fetch = array_combine($col,$row); 
						
						}
						
					 if($fetch['loantype']=='Others')	
					{
								
			             $otherloans='yes';
					}
					else
					{
						$otherloans='No';
						
					}

					
			$select_query1 = "Select amount from $table2 where reference_id = '$reference_id'";
								 
								 

			$select_record1=mysql_query($select_query1); 

			$row1= mysql_fetch_array($select_record1);

        
           $amount=$row1['amount'];
		   
		   
		   $select_query2 = "Select  bankstatement,min_days from uploadbankstatement_basedonloan where $amount between loanrange_to and loanrange_from";
								 
								 
            //echo $select_query2;
		   $select_record2=mysql_query($select_query2); 

		   $row2= mysql_fetch_array($select_record2);

        
           $bankstatement=$row2['bankstatement'];
		   $min_days=$row2['min_days'];
		   
		  


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



<script language="javascript" src="js/jquery-1.6.2.min.js" type="text/javascript">

 </script>

 <script language="javascript" src="js/common.js" type="text/javascript">

 </script>

<script language="javascript" src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript">

</script>

  <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">--->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  
  function  validateincomeproof(form)
 {
	 var file1= document.getElementById('file1');
	 var file2= document.getElementById('file2');
	 var file3= document.getElementById('file3');
	 
     var file5= document.getElementById('file5');
	 var file6= document.getElementById('file6');
	
	 
	
		
	
	/*if(file1.value=='')
	{
		alert("You didn't upload Color photo");
		
		activetab(0);
		
		return false;
	}
	if(file2.value=='')
	{
		alert("You didn't upload Identity Proof");
		
		activetab(1);
		
		return false;
	}
	<?php if($amount>=50000) { ?>
	if(file3.value=='')
	{
		alert("You didn't upload Residence Proof");
		
		activetab(2);
		
		return false;
	}
	if(file5.value=='')
	{
		alert("You didn't upload Income Proof");
		
		activetab(3);
		
		return false;
	}
	<?php } ?>
	if(file6.value=='')
	{
		alert("You didn't upload Bank Statement");
		
		
		
		return false;
	}*/
	
	
	
	return true; 
 }
 
 function previousTab(tabindex)
 
 {
	
	activetab(tabindex); 
	 
	 
 }
 function activetab(tabindex)
 {
   $("#tabs").tabs();
	
     $( "#tabs" ).tabs({ active: tabindex });
 }
 
 
 
  function  activetabs(tabindex,form,fileId) 
{

	
	var file= document.getElementById(fileId);
	
	if(file.value=='')
	{
		
		alert("You didn't choose any Document proof");
		return false;
		
		
	}
	else
	{
	//alert();
	
    $("#tabs").tabs();
	
    $( "#tabs" ).tabs({ active: tabindex });
	
     var form = $('#'+form)[0];

		// Create an FormData object 
        var data = new FormData(form);
  
  
    $.ajax({
            type: 'POST',
            url: 'send_documentupload.php',
            data: data,
			 mimeTypes:"multipart/form-data",
			processData: false,
        contentType: false,
			 cache: false,
			 
      success:  function(data){
	       
	  }
	  });
	  
	  
	}
	return true;
}  
   
	
</script>
  <script>
  $( function() {
     $( "#tabs" ).tabs();
	 
	  } );
	 
  </script>
<script>
function showotherdocument(fld,fld1,state,fileId)
{
	//alert(fileID);
	
	document.getElementById(fileId).disabled=false;
	
	
	if(document.getElementById('addmorefiles')!= undefined)
	{ 

       document.getElementById('addmorefiles').disabled=false;
		
	}
	
		if(state=='true')//show the table
		{
			
         document.getElementById(fld1).style.display='';	
	
	    }
		 else if(state=='false')
		{
		  document.getElementById(fld1).style.display='none';	
			 
		}
		if(fld.value=='Own House')
		{
		  document.getElementById(fileId).disabled=true;
	      document.getElementById('uploadrentagree').style.display='none';	
	    }
		
		else if(fld.value=='Rented')
		{
	    document.getElementById('uploadrentagree').style.display='';
		document.getElementById('utilitybills').style.display='none';
		
	    }
		
		else if(fld.value=='Self Employed')
		{
		  document.getElementById(fileId).disabled=true;
	      document.getElementById('selfemployed').style.display='';	
		  document.getElementById('incomeproof').style.display="none";
		  document.getElementById('incomeproof1').style.display="none";
	      document.getElementById('incomeproof2').style.display="none";
          document.getElementById('salarycreditaccount').style.display="none";
        
		}
		else if(fld.value=='Salaried')
		{
		  document.getElementById(fileId).disabled=true;
		  document.getElementById("span").textContent="";
		  document.getElementById('selfemployed').style.display='none';	
	      document.getElementById('incomeproof').style.display='';
		  document.getElementById('salarycreditaccount').style.display="";
			
		}
		else if(fld.value=='Other')
		{
		document.getElementById(fileId).disabled=true;	
			
		}
		
		
}

function onSelectsalaried(fld,fld1,fld2,selval,cont,fld3)
{

	if(fld1=='ITR'&&fld.value=='Yes')
	{
	 document.getElementById('file5').disabled=false;
		
	  document.getElementById('selfemployed1').style.display="none";
		
	  document.getElementById('selfemployed2').style.display="none";
	
	}
	 
	if(fld.value=='Yes')
	{
	  document.getElementById('file5').disabled=false;
		
      document.getElementById("span").textContent=cont;
	  
	  //insert selected value
	  document.getElementById(fld2).value=selval;
	 
	  
	}
	else if(fld.value=='No')
	{
		
      document.getElementById('file5').disabled=true;
	  
      if(fld1=='form16')
		{
			
		  document.getElementById('file5').disabled=false;
			
		  document.getElementById('span').textContent=cont;
		  
		  //insert selected value
		  document.getElementById(fld2).value=selval;
		 
		
		}
		else
		{
			document.getElementById("span").textContent="";
	  
	        document.getElementById(fld3).style.display="";
		}
	  
		 
	}
	
	if(fld1=='salaryslip'&&fld.value=='Yes')
	{
	  document.getElementById('incomeproof1').style.display="none";
		
	  document.getElementById('incomeproof2').style.display="none";
	
	}
	
	
	}



function addmorefieldstoupload(tableid)
{
	
	var addmorefileds = document.getElementById(tableid);
	
	addmorefileds.innerHTML+='<tr><td><input type="file" name="file[]"></td></tr>';
	
}
function togglefile(fld,fld1,fld2)
{
   if(fld=='show')
   {
   
	
	document.getElementById(fld1).style.display="";
	document.getElementById(fld2).style.display="none";
	}
	else 
   {

	document.getElementById(fld1).style.display="none";
	document.getElementById(fld2).style.display="none";
	}
}

function showTestFiletoUpload(fld1,fld2,fld3)
{
   
    document.getElementById(fld1).hidden=false;
	document.getElementById(fld2).style.display="";
	document.getElementById(fld1).textContent="Upload "+ fld3 +" Test   ";
	
}
	
	

</script>
<style>
tr {
  
    
    text-align:left;
}

</style>

 
</head>
<body>
<body id="Body">

<div align="center">


    <div align="center" class="skinwrapper">

		<?php  include('./common/common_mainmenu.php'); ?>

 
<div id="tabs">
  <ul>
  <li><a href="#tabs-1">Photo</a></li>
    <li ><a href="#tabs-2" >Identity Proof</a></li>
	<?php if($otherloans=='No') { ?>
	
	<li ><a href="#tabs-12" >Academic Documents</a></li>
	
	<?php }?>
 <?php if($amount>=50000) { ?>
    <li><a href="#tabs-3">Residence Proof</a></li>
 <?php } ?>
<?php if($amount>=50000) { ?>	 
	 <li><a href="#tabs-4">Income Proof</a></li>
<?php } ?>
	 <li><a href="#tabs-5">Bank Statement</a></li>
  </ul>
  <div  id="tabs-1" style="background-color:white">
  <form id="form1"   action=""  enctype="multipart/form-data" method="post" name="form1" >		

  <table  align="center">
        <tr>
		    <td class="heading" colspan="3">Upload Photo</td>
		</tr>
		<tr height="20px">
		
		</tr>
		<tr>
		     <td>
			  <input type="hidden"  name="no" value="<?php echo $reference_id; ?>">
			   <input type="hidden"  name="AppType" value="Borrower">
			    <input type="hidden" name="AppStep" value="Application Docs">
				
			    <input type="hidden" name="DocType1" value="Color Photo">
			 
			 </td>
	    </tr>
			<td>
			Color Photo of <?php echo $fetch['firstname'];?>:  <input type="file"  name="file[]" id="file1"   accept=".jpg,.jpeg,.gif,.png"  size="42" >
			<br/><br/>
			(Files Allowed:.jpg,.jpeg,.gif,.png)
			
			</td>
	    </tr><br>
		<tr height="20px">
		
		</tr>
		<tr>
		
		 <td align="center" colspan="4">
		 
		 <input name="submit" type="button" id="action" style="font-size: 16px;" class="nextbutton" value="Skip" onclick="activetab('1')">
		 
		 <input name="submit" type="button" id="action" style="font-size: 16px;" class="nextbutton" onclick="activetabs('1','form1','file1');" value="Upload" >
		  
		
		</tr>
		
  </table>
  </form>
  
     </div>
	 <div  id="tabs-2" style="background-color:white">
	 
	 <form id="form2"   action=""  enctype="multipart/form-data" method="post" name="form2" >		

	 <table  align="center" width="650px">
        <tr>
		   <td class="heading" colspan="3">Upload Identity Proof</td>
		</tr>
		<tr height="20px">
		
		</tr>
		<tr>
		     <td>
			  <input type="hidden"  name="no" value="<?php echo $reference_id; ?>">
			   <input type="hidden"  name="AppType" value="Borrower">
			    <input type="hidden" name="AppStep" value="Application Docs">
				
			    <input type="hidden" name="DocType1" value="Identity Proof">
			 
			 </td>
	    </tr>
		<tr>
			<td align="left">Identity Proof</td>
			<td>:</td>
			<td>
			     <input  type="radio" id="identityproof" name="typeofproof" value="Adhar Card" onclick="showotherdocument(this,'idproof','false','file2')">Adhar Card
		         <input  type="radio" id="identityproof" name="typeofproof" value="Pan Card" onclick="showotherdocument(this,'idproof','false','file2')">Pan Card
				 
				 <input  type="radio" id="identityproof" name="typeofproof" value="Other" onclick="showotherdocument(this,'idproof','true','file2')">Other
				   
			</td>
		
			</tr>
			
			<tr id="idproof" style="display:none">
			
			<td align="left"> Select  any of these documents </td>
			<td>:</td>
			    <td><input type="radio" id="identityproof" name="subproof1" value="passport" onclick="showotherdocument(this,'idproof','true','file2')" >Passport
				<input type="radio" id="identityproof" name="subproof1" value="bankpassbook" onclick="showotherdocument(this,'idproof','true','file2')">Bank Passbook with first page
			</td>
		</tr>
		
		<tr height="20px"></tr>
		
		<tr align="center" colspan="4" border="1">
		
		    <td  align="center" colspan="4" border="1">
			
			<input type="file"  id="file2" name="file[]" accept=".jpg,.jpeg,.gif,.png,.txt,.doc,.pdf,.xls, .xlsx"    disabled='disabled' size="42" >
			<br/><br/>
			(Files Allowed:.txt,.jpg,.jpeg,.gif,.png,.pdf,.doc,.xls, .xlsx)
			
		    
			</td>
		</tr><br>
		<tr height="20px">
		
		</tr>
		<tr align="center" colspan="4">
		
		 <td align="center" colspan="4">
		 <input name="submit" type="button" id="action" style="font-size: 16px;" class="nextbutton" value="Skip" onclick="activetab('2')">
		 <input name="" type="button" id="action" style="font-size: 16px;" class="nextbutton" onclick="previousTab(0);" value="Previous" >
		 <input name="submit" type="button" id="action" style="font-size: 16px;" class="nextbutton" onclick="activetabs('2','form2','file2');" value="Upload" >
		</tr>
		
  </table>
  </form>
     </div>
<?php if($otherloans=='No') { ?>	 
	 <div  id="tabs-12" style="background-color:white">
	 
	 <form id="form12"   action=""  enctype="multipart/form-data" method="post" name="form12" >		

	 <table  align="center" width="690px">
        <tr>
		   <td class="heading" colspan="3">Previous Academic Documents</td>
		</tr>
		<tr height="20px">
		
		</tr>
		<tr>
		     <td>
			  <input type="hidden"  name="no" value="<?php echo $reference_id; ?>">
			   <input type="hidden"  name="AppType" value="Borrower">
			    <input type="hidden" name="AppStep" value="Application Docs">
				
			    <input type="hidden" name="DocType1" value="Previous Academic Documents">
			 
			 </td>
	    </tr>
		
			
		<tr height="20px"></tr>
		
		<tr align="center" colspan="4" border="1">
		
		    <td  align="center" colspan="4" border="1">
				
			<span id="" style="color:#2766D4" align="left">Upload 10th Certificate&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>:<input type="file"  id="file12" name="file[]" accept=".jpg,.jpeg,.gif,.png,.txt,.doc,.pdf,.xls, .xlsx"     size="42" >
			<br/><br/>
			<span id="" style="color:#2766D4" align="left">Upload 12th Certificate&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>:<input type="file"  id="file12" name="file[]" accept=".jpg,.jpeg,.gif,.png,.txt,.doc,.pdf,.xls, .xlsx"   size="42" >
			<br/><br/>
			<span id="" style="color:#2766D4" align="left">Upload Graduation Certificate&nbsp;</span>:<input type="file"  id="file12" name="file[]" accept=".jpg,.jpeg,.gif,.png,.txt,.doc,.pdf,.xls, .xlsx"   size="42" >
			<br/><br/>
			<span id="PG" style="color:#2766D4">Upload PG Certificate&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span><input  type="file"  id="PGdoc" name="file[]" accept=".jpg,.jpeg,.gif,.png,.txt,.doc,.pdf,.xls, .xlsx"    size="42" >
			<br/><br/>
		
			
			(Files Allowed:.txt,.jpg,.jpeg,.gif,.png,.pdf,.doc,.xls, .xlsx)
			
		    
			</td>
		</tr><br>
		<tr height="20px">
		
		</tr>
			
		<tr>
		   <td class="heading" colspan="3">Entrance/Eligibily Test Documents</td>
		</tr>
		<tr height="20px">
		
		</tr>
		<tr>
			<td align="left">Type of  Entrance/Eligibily Test</td>
			<td>:</td>
			<td>
			     <input  type="radio" id="Entrance_test" name="Entrance_test" value=""  onclick="togglefile('show','domestic','international')">National 
				 <input  type="radio" id="Entrance_test" name="Entrance_test" value="" onclick="togglefile('show','international','domestic')">International
				 
			</td>
		
			</tr>
		
			<tr id="domestic" style="display:none">
			<td align="left">Name of Entrance/Eligibily Test</td>
			<td>:</td>
			<td>
				 <input  type="radio" id="domestictest" name="domestictest" value="CAT" onclick="showTestFiletoUpload('entrancetest','entrancetestdoc','CAT')">CAT
				 <input  type="radio" id="domestictest" name="domestictest" value="CET" onclick="showTestFiletoUpload('entrancetest','entrancetestdoc','CET')">CET
				 <input  type="radio" id="domestictest" name="domestictest" value="MAT" onclick="showTestFiletoUpload('entrancetest','entrancetestdoc','MAT')">MAT
				 <input  type="radio" id="domestictest" name="domestictest" value="Other" onclick="showTestFiletoUpload('entrancetest','entrancetestdoc','Other')">Other
				 
				   
			</td>
		
			</tr>
			<tr id="international" style="display:none">
			<td align="left">Name of Entrance/Eligibily Test</td>
			<td>:</td>
			<td>
			     <input  type="radio" id="internationaltest" name="internationaltest" value="TOFEL" onclick="showTestFiletoUpload('entrancetest','entrancetestdoc','TOFEL')" >TOFEL
				 <input  type="radio" id="internationaltest" name="internationaltest" value="IELTS" onclick="showTestFiletoUpload('entrancetest','entrancetestdoc','IELTS')" >IELTS
				 <input  type="radio" id="internationaltest" name="internationaltest" value="GRE" onclick="showTestFiletoUpload('entrancetest','entrancetestdoc','GRE')">GRE
				 <input  type="radio" id="internationaltest" name="internationaltest" value="GMAT" onclick="showTestFiletoUpload('entrancetest','entrancetestdoc','GMAT')">GMAT
				 <input  type="radio" id="internationaltest" name="internationaltest" value="SAT" onclick="showTestFiletoUpload('entrancetest','entrancetestdoc','SAT')">SAT
				
				 
				   
			</td>
		
			</tr>
			<tr align="center" colspan="4" border="1">
		
		    <td  align="center" colspan="4" border="1">
				<span id="entrancetest" style="color:#2766D4" hidden="hidden">Upload Entrance Test &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><input style="display:none" type="file"  id="entrancetestdoc" name="file[]" accept=".jpg,.jpeg,.gif,.png,.txt,.doc,.pdf,.xls, .xlsx"    size="42" >
			<br/><br/>
			<tr height="20px">
		
		</tr>
			
			<tr>
		   <td class="heading" colspan="3">Course Documents</td>
		</tr>
		
		<tr height="20px">
		
		</tr>
		<tr align="center" colspan="4" border="1">
		
		    <td  align="center" colspan="4" border="1">
			
		
			
			<span id="" style="color:#2766D4" align="left">Upload Fees Structure&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>:<input type="file"  id="file12" name="file[]" accept=".jpg,.jpeg,.gif,.png,.txt,.doc,.pdf,.xls, .xlsx"    size="42" >
			<br/><br/>
			<span id="" style="color:#2766D4">Upload Admission Letter&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>:<input type="file"  id="file12" name="file[]" accept=".jpg,.jpeg,.gif,.png,.txt,.doc,.pdf,.xls, .xlsx"    size="42" >
			
			
			
		    
			</td>
		</tr><br>
			
		<tr height="20px">
		
		</tr>
		<tr align="center" colspan="4">
		
		 <td align="center" colspan="4">
		 <input name="submit" type="button" id="action" style="font-size: 16px;" class="nextbutton" value="Skip" onclick="activetab('3')">
		 <input name="" type="button" id="action" style="font-size: 16px;" class="nextbutton" onclick="previousTab(1);" value="Previous" >
		 <input name="submit" type="button" id="action" style="font-size: 16px;" class="nextbutton" onclick="activetabs('3','form12','file12');" value="Upload" >
		</tr>
		
  </table>
  </form>
     </div>
	 
	 <?php } ?>
	 
	 <?php if($amount>=50000) { ?>
	 
	 <div  id="tabs-3" style="background-color:white">
	 
	 <form id="form3"   action=""  enctype="multipart/form-data" method="post" name="form3" >		

	 <table  align="center" width="650px">
        <tr>
		   <td class="heading" colspan="3">Upload Residence Proof</td>
		</tr>
		<tr height="20px">
		
		</tr>
		<tr>
		     <td>
			  <input type="hidden"  name="no" value="<?php echo $reference_id; ?>">
			   <input type="hidden"  name="AppType" value="Borrower">
			    <input type="hidden" name="AppStep" value="Application Docs">
				
			    <input type="hidden" name="DocType1" value="Residence Proof">
			 
			 </td>
	    </tr>
		<tr>
			<td align="left">Residence</td>
			<td>:</td>
			<td>
			     <input  type="radio" id="residenceproof" name="typeofproof" value="Own House" onclick="showotherdocument(this,'resiproof','true','file3')">Own 
		         <input  type="radio" id="residenceproof" name="typeofproof" value="Rented" onclick="showotherdocument(this,'resiproof','false','file3')">Rented
				
			</td>
		
			</tr>
			
			<tr id="resiproof" style="display:none">
			
			<td align="left">Select Type</td>
			<td>:</td>
			    <td><input type="radio" id="subresiproof" name="subproof1" value="Utility Bill" 
				onclick="showotherdocument(this,'utilitybills','true','file3')">Utility bills
				<input type="radio" id="subresiproof" name="subproof1" value="Sale Deed" 
				onclick="showotherdocument(this,'utilitybills','false','file3')">Sale Deed
			</td>
		</tr>
		<tr id="utilitybills" style="display:none">
			
			<td align="left">Select Utility Bill</td>
			<td>:</td>
			    <td><input type="radio" id="utilitybill" name="subproof2" value="Gas" 
				onclick="showotherdocument(this)">Gas
				<input type="radio" id="utilitybill" name="subproof2" value="Electricity" 
				onclick="showotherdocument(this)">Electricity
				<input type="radio" id="utilitybill" name="subproof2" value="Maintenance" 
				onclick="showotherdocument(this)">Maintenance
				<input type="radio" id="utilitybill" name="subproof2" value="Property Tax" 
				onclick="showotherdocument(this)">Property Tax
			</td>
		</tr>
		
		<tr height="20px"></tr>
		
		<tr align="center" colspan="4" >
		
		    <td  align="center" colspan="4" >
			<span id="uploadrentagree" style="display:none;color:#2766D4"> Upload Rental Agreement</span>
			<input type="file"   disabled='disabled' name="file[]" id="file3"  accept=".jpg,.jpeg,.gif,.png,.txt,.doc,.pdf,.xls, .xlsx"  size="42" >
			<br/><br/>
			(Files Allowed:.jpg,.jpeg,.gif,.png,.pdf,.doc,.xls, .xlsx)
			
			</td>
			
			
	    </tr>
		
		<tr height="20px">
		
		</tr>
		<tr align="center" colspan="4">
		
		 <td align="center" colspan="4">
		 <input name="submit" type="button" id="action" style="font-size: 16px;" class="nextbutton" value="Skip" onclick="activetab('<?php if($otherloans=='No') { echo "4"; }else { echo "3"; }?>')">
		 <input name="" type="button" id="action" style="font-size: 16px;" class="nextbutton" onclick="previousTab(<?php if($otherloans=='No') { echo "2"; }else { echo "1"; }?>);" value="Previous" >
		 <input name="submit" type="button" id="action" style="font-size: 16px;" class="nextbutton" onclick="activetabs('<?php if($otherloans=='No') { echo "4"; }else { echo "3"; }?>','form3','file3');" value="Upload" >
		</tr>
	
		
  </table>
  </form>
     </div>
	 
 <?php } ?>
<?php if($amount>=50000) { ?>
	 <div  id="tabs-4" style="background-color:white">
  <form id="form4"   action=""  enctype="multipart/form-data" method="post" name="form4" >

  <table  align="center" width="600px" >
        <tr>
		    <td class="heading" colspan="3">Upload Income Proof</td>
		</tr>
		<tr height="20px">
		
		</tr>
			<tr>
		     <td>
			  <input type="hidden"  name="no" value="<?php echo $reference_id; ?>">
			   <input type="hidden"  name="AppType" value="Borrower">
			    <input type="hidden" name="AppStep" value="Application Docs">
				
			    <input type="hidden" name="DocType1" value="Income Proof">
			 
			 </td>
	    </tr>
		
		<tr>
			<td align="left">Income Proof</td>
		<td>:</td>
			<td>
			     <input  type="radio" id="income_proof" name="typeofproof" value="Salaried" 
				 onclick="showotherdocument(this,'incomeproof','true','file5')">Salaried
		         <input  type="radio" id="income_proof" name="typeofproof" value="Self Employed" 
				 onclick="showotherdocument(this,'incomeproof','false','file5')">Self Employed
				
			</td>
		
			</tr>
			<tr id="incomeproof" style="display:none" >
			
			<td align="left">Do you have salary slips?</td>
			<td>:</td>
			    <td><input type="radio" id="salaryslip" name="salaryslip" value="Yes"
				onclick="onSelectsalaried(this,'salaryslip','subproof1','Salaryslips','Upload 3 months Salary Slips','incomeproof1')">Yes
				<input type="radio" id="salaryslip" name="salaryslip" value="No"  
				onclick="onSelectsalaried(this,'salaryslip','subproof1','Salaryslips','Upload 3 months Salary Slips','incomeproof1')">No
				
			</td>
		</tr>
		<tr id="incomeproof1" style="display:none" >
			
			<td align="left">Do you have appointment letter?</td>
			<td>:</td>
			    <td><input type="radio" id="appointment" name="appointment" value="Yes"
				onclick="onSelectsalaried(this,'appointment','subproof1','Appointment Letter','Upload Appointment Letter','incomeproof2')">Yes
				<input type="radio" id="appointment" name="appointment" value="No"  
				onclick="onSelectsalaried(this,'appointment','subproof1','Appointment Letter','Upload Appointment Letter','incomeproof2')">No
				
			</td>
		</tr>
		<tr id="incomeproof2" style="display:none" >
			
			<td align="left">Do you have Form16?</td>
			<td>:</td>
			    <td><input type="radio" id="form16" name="form16" value="Yes"
				onclick="onSelectsalaried(this,'form16','subproof1','Form16','Upload Form16','')">Yes
				<input type="radio" id="form16" name="form16" value="No"  
				onclick="onSelectsalaried(this,'form16','subproof1','Salary Certificate','Upload Salary Certificate','')">No
				
			</td>
			<td>
			<input type="hidden" id="subproof1" name="subproof1"  value="">
			<input type="hidden" id="subproof2" name="subproof2"  value="">
			</td>
		</tr>
		
		
			
			
		
		<tr id="selfemployed" style="display:none" >
			
			<td align="left">Do you have ITR of last 2 financial years?</td>
			<td>:</td>
			    <td><input type="radio" id="ITR" name="ITR" value="Yes"
				onclick="onSelectsalaried(this,'ITR','subproof2','ITR of 2 years','Upload ITR of last 2 financial years','selfemployed1')">Yes
				
				<input type="radio" id="ITR" name="ITR" value="No"  
				onclick="onSelectsalaried(this,'ITR','subproof2','ITR of 2 years','Upload ITR of last 2 financial years','selfemployed1')">No
				
				
			</td>
			
		</tr>
		<tr id="selfemployed1" style="display:none" >
			
			<td align="left">Do you have Audited Financial Statements?</td>
			<td>:</td>
			    <td><input type="radio" id="Audited" name="Audited" value="Yes"
				onclick="onSelectsalaried(this,'Audited','subproof2','Audited Financial Statements','Upload Audited Financial Statements','selfemployed2')">Yes
				
				<input type="radio" id="Audited" name="Audited" value="No"  
				onclick="onSelectsalaried(this,'Audited','subproof2','Audited Financial Statements','Upload Audited Financial Statements','selfemployed2')">No
				
				
			</td>
			
		</tr>
				<tr id="selfemployed2" style="display:none" >
			
			<td align="left">Do you have Shop and Establishment certificate?</td>
			<td>:</td>
			    <td><input type="radio" id="Shop" name="Shop" value="Yes"
				onclick="onSelectsalaried(this,'Shop','subproof2','Shop and Establishment','Upload Shop and Establishment certificate','selfemployed3')">Yes
				
				<input type="radio" id="Shop" name="Shop" value="No"  
				onclick="onSelectsalaried(this,'Shop','subproof2','Shop and Establishment','Upload Shop and Establishment certificate','selfemployed3')">No
				
				
			</td>
			
		</tr>
				
		</table>
		
		<table align="center">
		<tr height="20px">
		
		</tr>
		
		
		<tr>
			<td>
			<span id="span" style="color:#2766D4"> </span>
			
			<input type="file"  name="file[]" id="file5"   disabled="disabled" accept=".jpg,.jpeg,.gif,.png,.txt,.doc,.pdf,.xls, .xlsx" size="42" >
			<br/><br/>
			(Files Allowed:.jpg,.jpeg,.gif,.png,.pdf,.doc,.xls, .xlsx)
			
			</td>
			<td>
			
			<input type="button" onclick="addmorefieldstoupload('uploadmorefiles2')"  id="addmorefiles" disabled="disabled" value="Upload more file">
			</td>
			
			
	    </tr>
		
	</table>
	<table align="center" id="uploadmorefiles2">
		
		
	</table>
	<table align="center">
	<tr height="20px">
		
		</tr>
		<tr>
		
		 <td align="center" colspan="4">
		 <input name="submit" type="button" id="action" style="font-size: 16px;" class="nextbutton" value="Skip" onclick="activetab('<?php if($otherloans=='No') { echo "5"; }else { echo "4"; }?>')">
		 <input name="" type="button" id="action" style="font-size: 16px;" class="nextbutton" onclick="previousTab(<?php if($otherloans=='No') { echo "3"; }else { echo "2"; }?>);" value="Previous" >
		 <input name="submit" type="button" id="action" style="font-size: 16px;" class="nextbutton" onclick="activetabs('<?php if($otherloans=='No') { echo "5"; }else { echo "4"; }?>','form4','file5');" value="Upload" >
		</tr>
		
  </table>
  </form>
  
     </div>
<?php } ?>
	  <div  id="tabs-5" style="background-color:white">
  		
<form id="form5"   action="send_documentupload.php"  enctype="multipart/form-data" method="post" name="form5" onsubmit="return validateincomeproof(this);">		
  <table  align="center">
        <tr>
		    <td class="heading" colspan="3">Upload Bank Statement</td>
		</tr>
		<tr height="20px">
		
		</tr>
		<tr>
		     <td>
			  <input type="hidden"  name="no" value="<?php echo $reference_id; ?>">
			   <input type="hidden"  name="AppType" value="Borrower">
			    <input type="hidden" name="AppStep" value="Application Docs">
				
			    <input type="hidden" name="DocType1" value="Bank Statement">
			 
			 </td>
	    </tr>
		<tr>
			<td>
			 Upload minimum <?php echo $bankstatement."  ".$min_days; ?>  Bank Statement   
			</td>
			
		</tr>
		<tr  id="salarycreditaccount" style="display:none">
			<td>
			Is your salary credited in your  account?
			</td>
			<td>:</td>
			    <td><input type="radio" id="salary_credited" name="salary_credited" value="Yes">Yes
				<input type="radio" id="salary_credited" name="salary_credited" value="No">No
				</td>
			
		</tr>
		</table>
		<table align="center">
		<tr height="20px">
		
		</tr>
		
		<tr>
			<td>
			<input type="file"  name="file[]" id="file6"   size="42" accept=".jpg,.jpeg,.gif,.png,.txt,.doc,.pdf,.xls, .xlsx">
			
			<input type="button" onclick="addmorefieldstoupload('uploadmorefiles1')" value="Upload more file">
			<br/><br/>
			(Files Allowed:.jpg,.jpeg,.gif,.png,.pdf,.doc,.xls, .xlsx)
			</td>
	    </tr>
	</table>
	<table align="center" id="uploadmorefiles1">
		
		
	</table>
	<table align="center">
	<tr height="20px">
		
		</tr>
		<tr>
		
		 <td align="center" colspan="4">
		 <input name="" type="button" id="action" style="font-size: 16px;" class="nextbutton" onclick="previousTab('<?php if($otherloans=='No') { echo "4"; }else { echo "3"; }?>');" value="Previous" >
		<input name="submit" type="Submit" id="action" style="font-size: 16px;" class="nextbutton"  value="Submit" >
		</tr>
		
  </table>
  </form>
  
     </div>
</div>
 
 
				<table border="0" cellpadding="0" cellspacing="0" width="978">

						<tr>

							<td class="line" colspan="2" height="1">

							<!--<img alt="" height="1" src="images/pixel.gif" width="1">---></td>

						</tr>

						<tr class="bgfooter">

							<td colspan="1" height="25" width="22">

							<img alt="" height="1" src="images/pixel.gif" width="22"></td>

							<td id="dnn_BottomPane" align="left" class="footer" nowrap="nowrap">

							<table border="0" cellpadding="0" cellspacing="0" width="100%">

								<tr>

									<td align="left" class="normal">

									<a class="Normal" href="disclaimer.html" target="_self">

									Disclaimer</a>&nbsp;&nbsp; |&nbsp;&nbsp;

									<a class="Normal" href="privacypolicy.html" target="_self">

									Privacy Policy</a></td>

								</tr>

							</table>

							</td>

						</tr>

						<tr>

							<td  class="line" colspan="2" height="1">

							<!--<img alt="" height="1" src="images/pixel.gif" width="1">--></td>

						</tr>

					</table>

					

					<table border="0" cellpadding="0" cellspacing="0" width="978">

						<tr>

							<td height="20px" width="27px"></td>

							<td align="left" class="footer">

							<div class="skinfooter"> Copyright &copy; 2011 KSFi Pvt Ltd.</div>

							</td>

						</tr>

					</table>

					</td>

					<td background="images/rtoutline.jpg" class="rtbgborder" width="12px">

					</td>

				</tr>

			</table>

		</div>

	</form>

</div>



</body>



</html>
   