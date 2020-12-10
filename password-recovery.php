<!DOCTYPE html>
<!--
********************************************
Version: 1.0
Name: Hostcomm Support Main User Dashboard
Developed By: www.impactcart.in
All Rights & License Reserved by Damodar IT Solutions Pvt. Ltd.
Author: Shyam Shanbhag
Contact: shyam@ditsolutions.net
Deployed for: www.hostcommservers.com
********************************************
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Password Recovery - Hostcomm Video</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="assets/img/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/img/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/img/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/img/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="assets/img/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="assets/img/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="assets/img/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="assets/img/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="assets/img/favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="assets/img/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="assets/img/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="assets/img/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="assets/img/favicon-128.png" sizes="128x128" />

    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.27.0/feather.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <!-- Basic forgot password form-->
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header justify-content-center">
                                    <h2 class="page-header-title my-2 text-center">Password Recovery</h2>
                                </div>
                                <div class="card-body">



                                    <?php
require_once('database/database.php');
$con=new DbConnector();
if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) 
&& ($_GET["action"]=="reset") && !isset($_POST["action"])){
  $key = $_GET["key"];
  $email = $_GET["email"];
  $curDate = date("Y-m-d H:i:s");
  $query = "SELECT * FROM `password_reset_temp` WHERE `key` like '$key' and `email` like '$email'";
    $res =$con->query($query);
  $row = mysqli_num_rows($res);
  if ($row==""){
  $error .= '<h2>Invalid Link</h2>
<p>The link is invalid/expired. Either you did not copy the correct link
from the email, or you have already used the key in which case it is 
deactivated.</p>
<p><a href="/hostcomm/auth-password-basic.html">
Click here</a> to reset password.</p>';
 }else{
  $row = mysqli_fetch_assoc($res);
  $expDate = $row['expDate'];
  if ($expDate >= $curDate){
  ?>
                                    
                                    <form method="post" action="" name="update">
                                        <input type="hidden" name="action" value="update" />
                                        <div class="form-group">
                                        <label class="small mb-1" for="pass1">Enter New Password:</label>
                                        <input class="form-control py-4" type="password" name="pass1" maxlength="15" required />
                                        </div>
                                        
                                        <div class="form-group">
                                        <label class="small mb-1" for="pass2">Re-Enter New Password:</label>
                                        <input class="form-control py-4" type="password" name="pass2" maxlength="15" required />
                                        </div>
                                        <input type="hidden" name="email" value="<?php echo $email;?>" />
                                       
                                        
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="/hostcomm/auth-login-basic.html">Return to login</a>
                                            <button type="submit" class="btn btn-primary">Reset Password</button>
                                        </div>
                                    </form>
                                    <?php
}else{
$error .= "<h2>Link Expired</h2>
<p>The link is expired. You are trying to use the expired link which 
as valid only 24 hours (1 days after request).<br /><br /></p>".$expDate." ".$expDate;
            }
      }
if($error!=""){
  echo "<div class='error'>".$error."</div><br />";
  } 
} // isset email key validate end
 
 
if(isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"]=="update")){
$error="";
$pass1 = mysqli_real_escape_string($con,$_POST["pass1"]);
$pass2 = mysqli_real_escape_string($con,$_POST["pass2"]);
$email = $_POST["email"];
$curDate = date("Y-m-d H:i:s");
if ($pass1!=$pass2){
$error.= "<p>Password do not match, both password should be same.<br /><br /></p>";
  }
  if($error!=""){
echo "<div class='error'>".$error."</div><br />";
}else{
$pass1 = password_hash($pass1, PASSWORD_DEFAULT);
$query1="UPDATE `d_registration` SET `upassword` like '$pass1' WHERE `uemail` like '$email'";
 $res1=$con->query($query1);
      
$query2="DELETE FROM `password_reset_temp` WHERE `email` like '$email'";
       $res2=$con->query($query2);
 
echo '<div class="error"><p>Congratulations! Your password has been updated successfully.</p>
<p><a href="/hostcomm/auth-login-basic.html">
Click here</a> to Login.</p></div><br />';
   } 
}
?>










                                    
                                </div>
                                <!-- <div class="card-footer text-center">
                                    <div class="small"><a href="auth-register-basic.html">Need an account? Sign up!</a></div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        
        <div id="layoutAuthentication_footer">
            <footer class="footer mt-auto footer-dark">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 small">&copy; 2020, <span>Hostcomm Video</span>. All Rights Reserved<br> Powered by <a href="https://ditsolutions.net" target="_blank"><span>D IT Solutions</span></a></div>
                        <!-- <div class="col-md-6 small">Copyright &copy; Your Website 2020</div>-->
                        <div class="col-md-6 text-md-right small">
                            <a href="#!">Privacy Policy</a>
                            &middot;
                            <a href="#!">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>
