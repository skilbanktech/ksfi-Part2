 <?php
ob_start();
 
 session_start();

 if(isset($_GET['activelink']))
 {
 
 $link =  $_GET['actionlink'];
 
 $activelink =  $_GET['activelink'];

  $_SESSION['activelink']=$activelink;
 
 
 }
 
 else   {
 if(isset($_POST['myradio']))
			  
			   {
				   
                $id=$_POST['myradio'];
			   
			    //set session for applicant id
			   $_SESSION['AppID']=$id;
               }
			   elseif(isset($_SESSION['AppID']))
			   {
			   $id=$_SESSION['AppID']; 
			   }
			   
		$link = $_POST[$id.'cmblink'];  
		//echo $link;
	}		   
			

echo '<script>window.location.href="'.$link.'"</script>';			
			//header("Location:".$link);
			ob_flush();   
			exit();   
			   ?>