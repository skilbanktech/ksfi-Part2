<?php

session_start();

 
$name=$_POST['video-filename'];
$filePath = './uploads/' . $_POST['video-filename'];

// path to ~/tmp directory
$tempName = $_FILES['video-blob']['tmp_name'];

// move file from ~/tmp to "uploads" directory
if (!move_uploaded_file($tempName, $filePath)) {
    // failure report
    echo 'Problem saving file: '.$tempName;
  //  die();
}


     echo"success";
?>