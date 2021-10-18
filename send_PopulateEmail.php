<?php 

include('./connection.php');





$selval1=$_POST['value1'];

$selval2=$_POST['value2'];








$select1="select distinct username from login_details where role='$selval1' ";


$query_result1=mysql_query($select1);


 

 $json = array();
 
 while($row=mysql_fetch_array($query_result1))
				{
				
				
						 echo '<option value="'.$row['username'].'">' . $row['username'] . "</option>";
					}
					
				
		
					
				//echo json_encode($json);
 
 





?>