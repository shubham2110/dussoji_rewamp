<?php  
session_start();
require_once('../database/database.php');

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
            case 'submitsupport':
               if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 2) ) 
               {
                   $aResult['error'] = 'Error in arguments!';
               }
               else 
               {
                   $stopic=$_POST['arguments'][0];
                   $sfeedback=$_POST['arguments'][1];
				   

				   $email=$_SESSION["email"];
                   
                   //connection for Database
                    $con=new DbConnector();

                     $my_query="select uemail from d_registration where uemail like '$email'";
                    $result = $con->query($my_query);
                    if(($con->getNumRows($result) == 1))
					{
   						
                      $my_query = "INSERT INTO u_support (uemail, stopic, sfeedback) VALUES ('$email', '$stopic', '$sfeedback')";
                     

    	             $resultins = $con->query($my_query);
    	             if($resultins)
					 {
					 	 
					  $aResult['result'] ='Insert successfully done';
   						
					 }
					 else
					 {
					 	$aResult['error'] ='insert failed';
					 }
                 	}
                  else
                  {
                  	 session_destroy();
                     $aResult['error'] ='not present';
                  }
	          }
	    break;

case 'submitfeed':
               if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 4) ) 
               {
                   $aResult['error'] = 'Error in arguments!';
               }
               else 
               {
                   $flag=$_POST['arguments'][0];
                   $prob=$_POST['arguments'][1];
				   $exp=$_POST['arguments'][2];
				   $sugg=$_POST['arguments'][3];

				   $email=$_SESSION["email"];
                   
                   //connection for Database
                    $con=new DbConnector();

                     $my_query="select uemail from d_registration where uemail like '$email'";
                    $result = $con->query($my_query);
                    if(($con->getNumRows($result) == 1))
					{
   						
                      $my_query = "INSERT INTO u_feedback (`uemail`, `feedstar`, `feedanswer`, `feedexep`, `feedsugg`) VALUES ('$email',$flag, '$prob', '$exp', '$sugg')";
                     

    	             $resultins = $con->query($my_query);
    	             if($resultins)
					 {
					 	 
					  $aResult['result'] ='Insert successfully done';
   						
					 }
					 else
					 {
					 	$aResult['error'] ='insert failed';
					 }
                 	}
                  else
                  {
                  	 session_destroy();
                     $aResult['error'] ='not present';
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
