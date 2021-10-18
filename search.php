<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
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
<script language="javascript" src="js/contactus.js" type="text/javascript"> </script>

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

<noscript></noscript>
<div align="center">
	<form id="searchStatus" autocomplete="off" enctype="multipart/form-data" method="post" name="Form" onsubmit="return search_OnSubmit(this)" style="height: 100%;">
		<div align="center" class="skinwrapper">
			<table align="center" border="0" cellpadding="0" cellspacing="0" class="auto-style2" style="width: 1007px; height: 400px">
				<tr>
					<td background="images/lftoutline.jpg" class="ltbgborder" width="12px">
					</td>
					<td class="bgheader" height="98">
					<table border="0" cellpadding="0" cellspacing="0" width="978">
						<tr>
							<td height="20" style="width: 14px">
							<img alt="" height="1" src="images/pixel.gif" width="37"></td>
							<td style="width: 264px"></td>
							<td style="width: 332px">
							<img alt="" height="1" src="images/pixel.gif" width="295"></td>
							<td></td>
						</tr>
						<tr>
							<td height="78" style="width: 14px"></td>
							<td align="left" style="width: 264px" valign="top">
							<img alt="KSF Logo" src="images/img2.gif"> </td>
							<td align="right" style="width: 332px" valign="top">
							<table border="0" cellpadding="0" cellspacing="0" class="auto-style3" style="width: 120%; height: 58px">
								<tr>
									<td height="11px" style="width: 395px">
									<img alt="" height="11" src="images/pixel.gif" width="1"></td>
								</tr>
								<tr>
									<td id="dnn_topPane3" align="right" style="width: 395px" valign="top">
									<table  border="0" cellpadding="0" cellspacing="0"  width="100%">
										<tr>
											<td align="right">
											&nbsp;&nbsp;
											<a class="normal" href="index.php">Home</a>&nbsp;&nbsp; 
											|&nbsp;&nbsp;
											<a class="Normal" href="contactus.php">
											Contact Us</a>&nbsp;&nbsp; |&nbsp;&nbsp;
											<a class="Normal" href="sitemap.php">
											Site Map</a>&nbsp;&nbsp; |&nbsp;&nbsp;
											<a class="Normal" href="loan_application.php">
											Apply for a Loan</a></td>
										</tr>
										<tr><td>&nbsp;
										</td></tr>
										<tr>
										<td align="right"  valign="top" width="100%">
											<?php // Inialize session
											session_start();
											if (!isset($_SESSION['firstname'])) { ?>
											<a class="normal" href="index.php">Login</a>
											<?php }else { echo "Welcome,  ".$_SESSION['name']; ?>&nbsp;&nbsp;|&nbsp;&nbsp;
											<a class="normal" href="logout.php">
											Logout</a>&nbsp;&nbsp;|&nbsp;&nbsp;
											<?php 
											if ($_SESSION['usertype'] == 'student') { ?>
											<a class="normal" href="MyAccount.php">
											My Account</a>
											<?php }else {  ?>
											<a class="normal" href="searchStatus.php">
											My Account</a><?php } }?>&nbsp;&nbsp;</td>
										</tr>
									</table>
									</td>
								</tr>
								<tr>
									<td height="10px" style="width: 395px">
									<img alt="" height="10" src="images/pixel.gif" width="1"></td>
								</tr>
							</table>
							</td>
							<td width="15px">
							<img alt="" height="1" src="images/pixel.gif" width="15"></td>
						</tr>
					</table>
					<table border="0" cellpadding="0" cellspacing="0" width="978">
						<tr bgcolor="#6495ED">
							<td style="height: 20px">
							<div id="menu">
								<ul>
									<li>
									<a href="index.php">HOME</a></li>
								</ul>
								<ul>
									<li>
									<a href="services.php">SERVICES</a> </li>
								</ul>
								<ul>
									<li>
									<a href="aboutus.php">ABOUT US</a></li>
								</ul>
								<ul>
									<li>
									<a href="location.php">LOCATION</a></li>
								</ul>
								<ul>
									<li>
									<a href="contactus.php">CONTACT US</a></li>
								</ul>
							</div>
							</td>
						</tr>
						<tr>
							<td height="8">
							<img alt="" height="1" src="images/pixel.gif" width="8"></td>
						</tr>
					</table>
					<!-- #BeginEditable "Content" -->
					<table align="center">
								<tr><td height="50"></td></tr>
								<tr>
									<td class="heading" colspan="3">Search Student Application</td>
								<tr>
									<td>Reference ID</td>
									<td>:</td>
									<td>
									<input name="referenceID" size="40" type="text"></td>
								</tr>
								<tr>
									<td>Name</td>
									<td>:</td>
									<td>
									<input name="name" size="40" type="text"></td>
								</tr>
								<tr>
									<td>Location</td>
									<td>:</td>
									<td>
									<input name="location" size="40" type="text"></td>
								</tr>
								<tr>
									<td>Mobile</td>
									<td>:</td>
									<td>
									<input name="mobile" size="40" maxlength="10" type="text"></td>
								</tr>

								<tr>
									<td align="center" colspan="3">
									<input name="submit" type="submit" value="Search" onclick="setaction('sendsearch.php');"></td>
								</tr>
								<tr><td height="50"></td></tr>
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
