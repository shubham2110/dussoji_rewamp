<?php 
error_reporting(E_ALL);
require_once('../database/database.php');
//connection for Database
$con=new DbConnector();

if(isset($_POST["email"]) && (!empty($_POST["email"]))){
$email = $_POST["email"];
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$email = filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$email) {
   $error .="Invalid email address please type a valid email address!";
   }else{
   $sel_query = "SELECT * FROM `d_registration` WHERE uemail like '$email'";
   $results =$con->query($sel_query);
   $row = mysqli_num_rows($results);
   if ($row==""){
   $error .= "No user is registered with this email address!";
   }
  }
   if($error!=""){
        echo json_encode(array('status' => $error));
   }
    else{
   $expFormat = mktime(
   date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
   );
   $expDate = date("Y-m-d H:i:s",$expFormat);
   $key = md5(2418*2+$email);
   $addKey = substr(md5(uniqid(rand(),1)),3,10);
   $key = $key . $addKey;
// Insert Temp Table
$ins="INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES ('$email', '$key', '$expDate')";
  $res =$con->query($ins);      
       
       $subject="Password Recovery - Hostcomm Support";
       $to = $email;
  $message = '
        <html>
            <head>
                <title>Password Recovery</title>
            </head>
            <body>
            <p>Dear user,</p>
<p>Please click on the following link to reset your password.</p>
<p>-------------------------------------------------------------</p>
<p><a href="https://www.hostcommservers.com/hostcomm/password-recovery.php?key='.$key.'&email='.$email.'&action=reset" target="_blank">
https://www.hostcommservers.com/hostcomm/password-recovery.php?key='.$key.'&email='.$email.'&action=reset</a></p>
<p>-------------------------------------------------------------</p>
<p>Please be sure to copy the entire link into your browser.
The link will expire after 1 day for security reason.</p>
<p>If you did not request this forgotten password email, no action 
is needed, your password will not be reset. However, you may want to log into 
your account and change your security password as someone may have guessed it.</p> <br>
<p>Thanks,</p>
<p>Hostcomm Support</p>
            </body>
        </html>'; 
  $headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
$headers .= "From: Hostcomm Support<support@hostcommservers.com>\r\n"."Reply-To: <support@hostcommservers.com>\r\n";
        
if(mail($to, $subject, $message, $headers)){
       
     echo json_encode(array('status' => 'success'));  
       
   }
    else{
         echo json_encode(array('status' => $error));
    }
   }
   
}

?>
