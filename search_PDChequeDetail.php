<?php session_start();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml">
<!-- #BeginTemplate "webtemplate.dwt" -->
<head id="Head">
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
<link type="text/css" href="css/cupertino/jquery-ui-1.8.16.custom.css" rel="stylesheet" >
<script language="javascript" src="js/contactus.js" type="text/javascript"> </script>
<script language="javascript" src="js/jquery-1.6.2.min.js" type="text/javascript">
</script>
<script language="javascript" src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript">
</script>
<script type="text/javascript">
			$(function()
			{
			$( "#fdate" ).datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange:"c-10:c+10",
                        dateFormat: "yy-mm-dd"
                        
		});
		
                	$( "#tdate" ).datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange:"c-100:c+10",
                        dateFormat: "yy-mm-dd"
                        
		});

			});
		</script>
<style type="text/css">
.auto-style2 {
	background-image: url('images/rtoutline.jpg');
}
.auto-style3 {
	margin-left: 2px;
	margin-bottom: 2px;
}
.auto-style4 {
	margin-left: 0px;
}
.verticalmenu
{
	/*font: bold 12px arial, helvetica, sans-serif; */
	font-weight:bold;
	font-size:21px;
	background:#99CCFF;
}
.pg-normal {
                color: black;
                font-weight: normal;
                text-decoration: none;    
                cursor: pointer;    
}
.pg-selected {
                color: black;
                font-weight: bold;        
                text-decoration: underline;
                cursor: pointer;
}

</style>
</head>

<body id="Body">

<noscript></noscript>
<div align="center">
	<form id="searchStatus" action="DisplaySearchPDCheque.php" autocomplete="off" enctype="multipart/form-data" method="post" name="Form" onsubmit="return SearchAppStatus(this)" style="height: 100%;">
			<?php include('./common/common_mainmenu.php'); ?>						
           
					<!-- #BeginEditable "Content" -->
					<table align="center">
								<tr><td height="50"></td></tr>
								<tr>
									<td class="heading" colspan="3">Search PDC Cheque Details</td>                                                                      
                                     <tr>
									<td>Reference ID</td>
									<td>&nbsp;</td>
									<td>
									<input id="refid" name="refid" size="20" type="text" readonly="readonly"
                                                               value="<?php echo $_POST['myradio']; ?>">
                                            </td>
								</tr>                                                                     
                                   <tr>
									<td>From&nbsp; Date</td>
									<td>:</td>
									<td>
									<input name="fdate" id="fdate" size="40"  type="text"></td>
								</tr>
                                                                 <tr>
									<td>To&nbsp; Date</td>
									<td>:</td>
									<td>
									<input name="tdate" id="tdate" size="40"  type="text"></td>
								</tr>
                                                                
								<tr>
									<td>Payment Type</td>
									<td>:</td>
									<td>
									<select id="payType" name="payType" size="1">
							<option></option>
							<option>Cheque</option>
							<option>ECS</option>
							<option>DDM</option>
							<option>SI</option>
							<option>Cash</option>
							</select></td>
								</tr>
                                                                
								<tr>
									<td>Amount</td>
									<td>:</td>
									<td>
									<input name="amount" size="40" type="text"></td>
								</tr>
								<tr>
									<td>Cheque No.</td>
									<td>:</td>
									<td>
									<input name="checkno" size="40" type="text"></td>
								</tr>
                                                                
                                                                 
								<tr>
									<td align="center" colspan="3">
									<input name="submit" type="submit" value="Search"></td>
								</tr>
								<tr><td height="50"></td></tr>
								 <tr><td colspan="2">
                                     <input type="hidden" name="no" value="<?php echo $_POST['myradio'];  ?>"></input>
                                  
                                                                    </td></tr>

							</table>
					<!-- #EndEditable -->
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

<!-- #EndTemplate -->

</html>
