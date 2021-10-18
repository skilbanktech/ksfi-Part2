<?php
session_start();

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
<link id="KSFSkin" href="./css/skin.css" rel="stylesheet" type="text/css">
<link id="KSFSkin" href="./css/ksfi.css" rel="stylesheet" type="text/css">

<link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="./bootstrap/js/jquery.min.js"></script>
<script src="./bootstrap/js/bootstrap.min.js"></script>
<script src=".=./bootstrap/js/bootstrap-submenu.min.js" defer></script>



<style>

a.nextbutton
{

background-color: #008CBA;
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;border-radius:4px;

}

</style>
 
</head>

<body>

<div align="center">
<?php 

include('./common/bootstrap_common_mainmenu.php'); 

include('./common/common_submenu.php'); ?>



 <table><tr height="50"><td></td></tr></table>		

             <div class="container">
				   
				  <div class="row">
                    <div class="col-lg-12" align="center"> 
							
							
							<?php


                             if(isset($_GET['Msg']))
							 {
				             	$Msg = $_GET['Msg'];

                                if($Msg == 0)
								 {
				 
							   echo '<p  align="center">Uploaded successfully.
                                
								</p>';
								
								 }
							 }
								
								 
								 
								 ?>
								
							
								
					</div>
		          </div>
				 

				

                </div>
				
				 <table><tr height="120"><td></td></tr></table>
				
				
<!-------footer---------->
							
							
<table style="width:100%; height:30px; background-color:#87CEFA; color:#778899; text-align:center; font-size:12px">		
  <tr>
      <td> &copy; 2011 KSFi Pvt Ltd.-<a class="Normal" style="color:#778899;" href="disclaimer.html" target="_self">
									Disclaimer</a>&nbsp;&nbsp; |&nbsp;&nbsp;
									<a class="Normal" style="color:#778899;" href="privacypolicy.html" target="_self">
									Privacy Policy</a>
		</td>
  </tr>
</table>
				
				
		
	
 
<script type="text/javascript"><!--
    var pager = new Pager('box-table-a',10); 
    pager.init(); 
    pager.showPageNav('pager', 'pageNavPosition'); 
    pager.showPage(1);
//--></script>
		
	
	
</div>


</div>



</body>



<!-- #EndTemplate -->



</html>