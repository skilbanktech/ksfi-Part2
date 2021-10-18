<!DOCTYPE html>
<html>
<body>

<?php
$myfile = fopen("./R20120700013/adhar.jpg", "r") or die("Unable to open file!");
$image="./R20120700013/adhar.jpg"; //this can also be a url
$filename = basename($image);
$file_extension = strtolower(substr(strrchr($filename,"."),1));
switch( $file_extension ) {
    case "gif": $ctype="image/gif"; break;
    case "png": $ctype="image/png"; break;
    case "jpeg":$ctype="image/jpeg"; break;
    case "jpg": $ctype="image/jpg"; break;
    default:
}

header('Content-type: ' . $ctype);
$image = file_get_contents($image);
echo $image;
?>

</body>
</html>