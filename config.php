<?php 
session_start();if(!isset($_SESSION["email"])){header("location:auth-login-basic.html");}

$keyId = 'rzp_test_Xqte2sPSpWu8Wf';
$keySecret = 'DNIAnAyrm7mz8a8ahQR2Dref';
$displayCurrency = 'IND';

//These should be commented out in production
// This is for error reporting
// Add it to config.php to report any errors
error_reporting(E_ALL);
ini_set('display_errors', 1);
