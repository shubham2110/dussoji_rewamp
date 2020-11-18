<?php 
session_start();
require_once('../database/database.php');


$sentotp=$_SESSION["randomnumber"];

 $aResult = array();

  if( !isset($_POST['functionname']) ) 
  	{ 
  		$aResult['error'] = 'No function name!';
  	}

    if( !isset($_POST['arguments']) )
    { 
    	$aResult['error'] = 'No function arguments!'; 
    }

    if( !isset($aResult['error']) ) 
    {

        switch($_POST['functionname']) 
        {
            case 'verifypayment':
               if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 1) ) 
               {
                   $aResult['error'] = 'Error in arguments!';
               }
               else 
               {
               	
                    $con=new DbConnector('lms2');

                    $emailid=$_POST['arguments'][0];
                    $my_query = "select payment_verified,u_email from user_registration where u_email like '$emailid'";

    	             $resultins = $con->query($my_query);
                  while(($row=$con->fetchArray($resultins)))
                  {
                     $json[]= array(
                     'payment_verified'=>$row['payment_verified'],
                     'email'=>$row['u_email']
                     
                     );

                  }if(empty($json))
                  {
                    $aResult['result'] ='Payment not verified';
                  }
                  else
                  {
                    $aResult['error'] = 'payment verified';
                   }
        
               
               }
	    break;
	    default:
	           $aResult['error'] = 'Not found function '.$_POST['functionname'].'!';
	           break;
	  }
    }


    echo json_encode($aResult);

?> 