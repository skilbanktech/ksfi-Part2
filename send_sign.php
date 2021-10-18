 <?php
 
 
 
 require_once('./connection.php');
 
 
	require_once('./common/Class_Scoring.php');
							  
	$objCommon = new ApplicationScoring();
	
 //parameters
 $email_para=$_POST['email'];
 $mobile_para=$_POST['mobile'];
 $Location_para=$_POST['Location'];
 

$parameter="";


$email= $objCommon->getscoring_api($email_para,'email');
$mobile= $objCommon->getscoring_api($mobile_para,'mobile');
$Location= $objCommon->getscoring_api($Location_para,'city');

$score= $email+$mobile+$Location;

 // products array
    $products_arr=array();
    $products_arr["result"]=array();
 
   
        $product_item=array(
            "score" => $score,
            "Score Recommendation" => ""
           
        );
 
        array_push($products_arr["result"], $product_item);
    
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show products data in json format
    echo json_encode($products_arr);



			
			
	
		
		
		?>
		