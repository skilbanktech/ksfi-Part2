<?php

$id = $_GET['refid'];

include('./connection.php');

include('./common/class_Common.php');



$objCommon=new Common();


$photo =  $objCommon->randomPassword('Photo');

$filename =  $photo . '.jpg';

$filepath = './'.$id.'/';




if(!is_dir($filepath))
	
	mkdir($filepath);


if(isset($_FILES['webcam'])){	
	move_uploaded_file($_FILES['webcam']['tmp_name'], $filepath.$filename);
	
	echo $filename;
	
	
	
}

$usertype='Applicant';

$doc_type="Photo";


$app_step='Application Docs';


$select_query="Select * from document_details where reference_id='$id' and doc_type='".$doc_type."'";

                    $select_record=mysql_query($select_query);

                    $row_count = mysql_num_rows($select_record);
					
					
					
					
					
					if($row_count!=0)
						
				{
					$row = mysql_fetch_array($select_record);
					
				    $doc_name = $row['doc_name'];
					
					$unlinkpath="./".$id."/".$doc_name;
					
					unlink($unlinkpath);
							
				$query = "update  document_details set 	doc_name='$filename' where reference_id='$id' and doc_type='$doc_type'";
							
			    }
						
		     else
							
			{
								
			    $query = "Insert into document_details(reference_id,usertype,doc_type,doc_date,doc_name,app_step) 

			      values('$id','$usertype','$doc_type',sysdate(),'$filename','$app_step')";

			}
					
					
	if($photo!=''){
				$add_query=mysql_query($query);
				
		 }


?>
