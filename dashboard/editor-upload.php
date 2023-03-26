<?php 
include_once('config.php');
if(empty($_FILES['file']))
{
  exit();	
}
$errorImgFile = "./img/img_upload_error.jpg";
$temp = explode(".", $_FILES["file"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);
$destinationFilePath = './img-uploads/'.$newfilename ;
if(!move_uploaded_file($_FILES['file']['tmp_name'], $destinationFilePath)){
  echo $errorImgFile;
}
else{
  echo $destinationFilePath;
  mysqli_query($con,"INSERT INTO uploads(`file`)
VALUES ('$destinationFilePath')");
}

?>