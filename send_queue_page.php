<script language="javascript" src="js/jquery.min.js" type="text/javascript"> </script>
<script language="javascript" src="js/paging.js" type="text/javascript"> </script>

<script type="text/javascript">

    var pager = new Pager('box-table-a',5); 

    pager.init(); 

    pager.showPageNav('pager', 'pageNavPosition'); 

    pager.showPage(1);
</script>

<?php

include('./connection.php');


$selectedlink=$_POST['selectedlink'];



   $select_query1="SELECT reference_id,firstname ,lastname,email,mobile,app_date
                    
					FROM student_details where  app_status='Applied' ";



		 
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



<?php print'<table  id="box-table-a"  border="1" align="right" style="background-color:white"   width="100%" > ';?>



<?php  if($count_newcourses1!=0) {   


   print' <tr>   
	     <th>Select</th>
	     <th> Reference_id </th>
	   
		  <th>First Name</th>
		  
		  <th> Last Name </th>
		
		   <th>Email</th>
		   
		   <th>Mobile</th>
		   
		
		
		 
		 <th>Application Date</th>
	
	    
	
		
	
	</tr>';
	
	?>
  
       <?php
	   
	   
	  while($row1=mysql_fetch_array($select_record1))
	   {
	   
	   
	   $referenceid=$row1['reference_id'];
	   
	       $email=$row1['email'];
		   
		   $mob=$row1['mobile'];
		   
		   // encode
       $mob_encoded = rtrim(strtr(base64_encode($mob), '+*', '-_'), '=');
	   
	   
	   
	 
		   $select_query2=mysql_query("select * from document_details where reference_id='$referenceid'");
		   
		   $count_rows=mysql_num_rows($select_query2);
	   
	if($count_rows!=0 && $count_rows<4) {
		
		$select_query3="select * from student_details where reference_id='$referenceid'";
		$result_query3=mysql_query($select_query3);
		echo $count_rows;
	
		
	?>
	
	
	
	<?php
	    
	       print'<tr><td><input type="radio"  id="'.$row1['reference_id'].'"myBtn"  class="links"  name="myradio" value="'.$row1['reference_id'].'" id="'.$row1['reference_id'].'"

	        onclick="selectedapplication(this)" /></td>'	       ?>
	    
	     <td>
		 
		 <?php if($referenceid!='') { ?>
		 
		<a  style="color:#483D8B" href="EditApplication.php?myradio=<?php echo $row1['reference_id'];  ?>"><?php echo $row1['reference_id'];  ?></a>
		 
		 <?php } else { ?>
		 
		 <a  style="color:#483D8B;" href="loan_application.php?mob=<?php echo $mob_encoded;?> ">Apply for Loan</a>
		 
		 <?php } ?>
		 
		 </td>
	
	    
	    
		  <td><?php echo $row1['firstname'];  ?> </td>
		  <td><?php echo  $row1['lastname'];  ?></td>
		  <td><?php echo  $row1['email'];  ?></td>
		  <td><?php echo  $row1['mobile'];  ?></td>
		  
		 <?php if($selectedlink=='leads')
		 {?>
		  <td><?php echo  $row1['created'];  ?></td>
		  
		 <?php } else { ?>
		  
		 <td><?php echo  $row1['app_date'];  ?></td>
         <?php } ?>
	   
	</tr>
	
	
<?php } } } ?>
	
	
	<div id="pageNavPosition" align="right"> </div>
	</table>
	
	
		 