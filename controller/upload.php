<?php
session_start();
require_once('../database/database.php');
$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["fileid"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

  $check = getimagesize($_FILES["fileid"]["tmp_name"]);
  if($check !== false) {
    if ($_FILES["fileid"]["size"] <= 500000) {
  
    move_uploaded_file($_FILES["fileid"]["tmp_name"], "../$target_file");
    $uploadOk = 1;
}else{
	$uploadOk = 0;
}
    
  } else {
   	
    $uploadOk = 0;
  }

  if($uploadOk){
  	$con=new DbConnector();
                      $email=$_SESSION["email"];
                     $my_query="update d_registration set avatar='$target_file' where uemail like '$email'";
                     $resultins = $con->query($my_query);
                    
                   if($resultins)
                   {
                    header("location:../account-profile.php");
              
                   }
                    else
                    {
                     echo "<script>alert('upload failed');</script>";
                    }
  }

?>

disabled="<?php if($dbrole=="USER") echo "true";?>"