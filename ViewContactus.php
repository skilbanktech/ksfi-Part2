<?php
session_start();
//echo $_SESSION['captcha'];
function _generateRandom($length=6)
{

$_rand_src = array(
		array(48,57) //digits
		, array(97,122) //lowercase chars
		, array(65,90) //uppercase charsc
	);
	srand ((double) microtime() * 1000000);
	$random_string = "";
	for($i=0;$i<$length;$i++){
		$i1=rand(0,sizeof($_rand_src)-1);
		$random_string .= chr(rand($_rand_src[$i1][0],$_rand_src[$i1][1]));
	}
	return $random_string;
	
}
$rand = _generateRandom(6);
$_SESSION['captcha'] = $rand;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml">

<head id="Head">
<meta content="First Education Loans in India, Fast Education Loans" name="description">
<meta content="Financial Consultancy, Education Loans" name="keywords">
<meta content="copy; 2011 KSFi Ltd." name="COPYRIGHT">
<meta content="KSFi Ltd" name="AUTHOR">
<meta content="DOCUMENT" name="RESOURCE-TYPE">
<meta content="GLOBAL" name="DISTRIBUTION">
<meta content="INDEX, FOLLOW" name="ROBOTS">
<meta content="1 DAYS" name="REVISIT-AFTER">
<meta content="GENERAL" name="RATING">
<meta content="RevealTrans(Duration=0,Transition=1)" http-equiv="PAGE-ENTER">
<title>Education Loans KSF Pvt Ltd.</title>
<link id="GenSkin" href="css/skin.css" rel="stylesheet" type="text/css">
<link id="KSFSkin" href="css/ksfi.css" rel="stylesheet" type="text/css">
<script language="javascript" src="js/contactus.js" type="text/javascript"> </script>
<script language="javascript" src="js/copy_state.js" type="text/javascript"> </script>
<script language="javascript" src="js/common.js" type="text/javascript"> </script>
<style type="text/css">

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
	<form id="ViewContactus"  method="post" name="ViewContactus" >
			<?php include('./common/common_mainmenu.php'); ?>
			<!-- #BeginEditable "Content" -->
			
					
                                             <?php 
                                            	include('./connection.php');
                                                $id=$_POST['myradio'];

                                                

                                                $select_query = "Select * from contact_details where id = '$id'";
                                                $select_record=mysql_query($select_query); 
                                                
                                                $row= mysql_fetch_row($select_record);
        
	if($row){
     
	$col = array('id','fname','lname','email','phone','state','city','amount','information','date','iam','other','purposeofcontact','course','location','partnername');
	$fetch = array_combine($col,$row); 
	}
                                            ?>
                                            
					<table align="center" border="0" width="450">
						
						<tr>
							<td height="5"></td>
						</tr>
                                                <tr><td>
                                                        I am a
                                                    </td>
                                                    <td>:</td>
                                                    <td><select name="iama" id="iama" onchange="validateIam(this)" disabled="disabled">
                                                            <option>Select</option>
                                                            <option <?php if($row){
								if($fetch['iam'] == 'Student')
								{        echo "selected='selected'";      }	}										     
								 ?>>Student</option>
                                                            <option <?php if($row){
								if($fetch['iam'] == 'Parent')
								{        echo "selected='selected'";      }	}										     
								 ?>>Parent</option>
                                                            <option <?php if($row){
								if($fetch['iam'] == 'Institute Authority')
								{        echo "selected='selected'";      }	}										     
								 ?>>Institute Authority</option>
                                                            <option <?php if($row){
								if($fetch['iam'] == 'Loan Agent')
								{        echo "selected='selected'";      }	}										     
								 ?>>Loan Agent</option>
                                                            <option <?php if($row){
								if($fetch['iam'] == 'Education Consultant')
								{        echo "selected='selected'";      }	}										     
								 ?>>Education Consultant</option>
                                                            <option <?php if($row){
								if($fetch['iam'] == 'Education Counselor')
								{        echo "selected='selected'";      }	}										     
								 ?>>Education Counselor</option>
                                                            <option <?php if($row){
								if($fetch['iam'] == 'Other')
								{        echo "selected='selected'";      }	}										     
								 ?>>Other</option>
                                                        </select> </td>
                                                </tr>
                                                
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td><input id="txtiama" alt="" name="txtiama" size="40" type="text" readonly="readonly"
                                                             value="<?php if($row) { echo $fetch['other']; } ?>"  > </td>
                                                    </tr>
                                                    
                                                        <tr>
                                                        <td>Purpose of contact</td>
                                                        <td>:</td>
                                                        <td>
                                                           <select name="purposeofcontact" id="purposeofcontact" disabled="disabled">
                                                            <option>Select</option>
                                                            <option <?php if($row){
								if($fetch['purposeofcontact'] == 'looking for a loan')
								{        echo "selected='selected'";      }	}										     
								 ?>>looking for a loan</option>
                                                            <option <?php if($row){
								if($fetch['purposeofcontact'] == 'want to become a loan service partner')
								{        echo "selected='selected'";      }	}										     
								 ?>>want to become a loan service partner</option>
                                                            <option <?php if($row){
								if($fetch['purposeofcontact'] == 'Institute Authority')
								{        echo "selected='selected'";      }	}										     
								 ?>>Institute Authority</option>
                                                            <option <?php if($row){
								if($fetch['purposeofcontact'] == 'Looking for information on course/college')
								{        echo "selected='selected'";      }	}										     
								 ?>>Looking for information on course/college</option>
                                                            <option <?php if($row){
								if($fetch['purposeofcontact'] == 'Want to associate as a Trainer/Consultant')
								{        echo "selected='selected'";      }	}										     
								 ?>>Want to associate as a Trainer/Consultant</option>
                                                        </select>  
                                                        </td>
                                                    </tr>
                                                    
						<tr>
							<td>First Name</td>
							<td>:</td>
							<td>
							<input id="fname" alt="" name="fname" size="40" type="text" readonly="readonly"
                                                               value="<?php if($row) { echo $fetch['fname']; } ?>" ></td>
						</tr>
						<tr>
							<td>Last Name</td>
							<td>:</td>
							<td>
							<input id="lname" name="lname" size="40" type="text" readonly="readonly"
                                                               value="<?php if($row) { echo $fetch['lname']; } ?>"></td>
						</tr>
						<tr>
							<td>Email Address</td>
							<td>:</td>
							<td>
							<input id="email" name="email" size="40" type="text" readonly="readonly"
                                                               value="<?php if($row) { echo $fetch['email']; } ?>" ></td>
						</tr>
						<tr>
							<td>Contact No.</td>
							<td>:</td>
							<td>
							<input id="phone" maxlength="10" name="phone" size="40" type="text" readonly="readonly"
                                                               value="<?php if($row) { echo $fetch['phone']; } ?>"  ></td>
						</tr>
						<tr>
							<td>State</td>
							<td>:</td>
							<td>
							
                                                           <input id="countrySelect" maxlength="10" name="country" size="40" type="text" readonly="readonly"
                                                               value="<?php if($row) { echo $fetch['state']; } ?>"  >
                                                           
                                                        </td>
						</tr>
						<tr>
							<td>City</td>
							<td>:</td>
							<td>
                                                         
							
                                                           <input id="countrySelect" maxlength="10" name="country" size="40" type="text" readonly="readonly"
                                                               value="<?php if($row) { echo $fetch['city']; } ?>"  > 
							</td>
						</tr>
                                                
						<tr>
							<td>Loan Amount Looking for</td>
							<td>:</td>
							<td>
							<input id="amount" maxlength="7" name="amount" size="40" type="text" readonly="readonly"
                                                               value="<?php if($row) { echo $fetch['amount']; } ?>" ></td>
						</tr>
                                                
                                                <tr>
							<td>Course Name</td>
							<td>:</td>
							<td>
							<input id="course"  name="course" size="40" type="text" readonly="readonly"
                                                               value="<?php if($row) { echo $fetch['course']; } ?>" ></td>
						</tr>
                                                
                                                
						<tr>
							<td>Additional Comment/Querry</td>
							<td>:</td>
							<td>
							<textarea id="addInfo" cols="32" name="addInfo" rows="3" readonly="readonly"
                                                                  ><?php if($row) { echo $fetch['information']; } ?></textarea></td>
						</tr>
						
						<tr>
							<td align="center" colspan="3">
							<input name="btnBack" type="button" value="Back" onclick="history.back(-1)" /></input>
                                                        </td>
						</tr>
					</table>
					
					<table border="0" cellpadding="0" cellspacing="0" width="978">
						<tr>
							<td class="line" colspan="2" height="1">
							<img alt="" height="1" src="images/pixel.gif" width="1"></td>
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
							<td class="line" colspan="2" height="1">
							<img alt="" height="1" src="images/pixel.gif" width="1"></td>
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
