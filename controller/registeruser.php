<?php 
//error_reporting(E_ALL);
//ini_set('display_errors', '1');

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
            case 'registeruser':
               if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 5) ) 
               {
                   $aResult['error'] = 'Error in arguments!';
               }
               else 
               {
                   $fname=$_POST['arguments'][0];
                   $lname=$_POST['arguments'][1];
           $email=$_POST['arguments'][2];
                   $mobile=$_POST['arguments'][3];
           $pass=$_POST['arguments'][4];

           $_SESSION["email"]=$email;
                   
                   //connection for Database
                    $con=new DbConnector();

                     $my_query="select uemail from d_registration where uemail like '$email'";
                    $result = $con->query($my_query);
                    if(($con->getNumRows($result) == 0))
          {
              $pass=password_hash($pass, PASSWORD_DEFAULT);
                      $my_query = "INSERT INTO d_registration (fname, lname, uemail, upassword, urole, avatar, phone) VALUES ('$fname','$lname', '$email', '$pass', 'USER', 'upload/18354578.jpg', '$mobile')";
                     

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
                     $aResult['error'] ='already present';
                  }
            }
      break;

      case 'loginuser':
               if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 2) ) 
               {
                   $aResult['error'] = 'Error in arguments!';
               }
               else 
               {
                   
           $email=$_POST['arguments'][0];
           $pass=$_POST['arguments'][1];
                   
                   //connection for Database
                    $con=new DbConnector();

                     $my_query="select upassword,uemail,urole from d_registration where uemail like '$email'";
                    $result = $con->query($my_query);
                    if(($con->getNumRows($result) ==1))
          {
              $row=$con->fetchArray($result);
                        $dbpass=$row['upassword'];
                        $dbemail=$row['uemail'];
                        $dbrole=$row['urole'];
                        
                        if (password_verify($pass,$dbpass) && $dbemail==$email) 
                        {
                          $_SESSION["email"]=$email;
                          if($dbrole=="ADMIN"){
                            $aResult['result'] ='admin success';
                        }else if($dbrole=="USER"){
                          $aResult['result'] ='user success';
                        }else if($dbrole=='SUB'){
                              $aResult['result']='subscriber success';
                          }
                        } 
                        else
                         {
                            $aResult['error'] ='login failed';
                         }
                   
                  }
                  else
                  {
                     $aResult['error'] ='not present';
                  }
            }
      break;

      case 'updateuser':
               if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 6) ) 
               {
                   $aResult['error'] = 'Error in arguments!';
               }
               else 
               {
                   
           $fname=$_POST['arguments'][0];
           $lname=$_POST['arguments'][1];
                   $orgname=$_POST['arguments'][2];
           $loc=$_POST['arguments'][3];
           $phone=$_POST['arguments'][4];
           $dob=$_POST['arguments'][5];
                   $email=$_POST['arguments'][6];
                   //connection for Database
                    $con=new DbConnector();

                     $my_query="select uemail from d_registration where uemail like '$email'";
                    $result = $con->query($my_query);
                    if(($con->getNumRows($result) ==1))
          {
              $my_query="update d_registration set fname='$fname', lname='$lname', orgname='$orgname', geoloc='$loc', phone='$phone', birthdate='$dob' where uemail like '$email'";
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
                            $aResult['error'] ='not found';
                         }
                   
                  }
      break;

      case 'passchange':
               if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 3) ) 
               {
                   $aResult['error'] = 'Error in arguments!';
               }
               else 
               {
                   
                     $old=$_POST['arguments'][0];
                     $npass=$_POST['arguments'][1];
                     $cpass=$_POST['arguments'][2];
                     $email=$_SESSION['email'];
                   //connection for Database
                    $con=new DbConnector();

                     $my_query="select upassword from d_registration where uemail like '$email'";

                    $result = $con->query($my_query);
                    if(($con->getNumRows($result) ==1))
                    {
                        $row=$con->fetchArray($result);
                        $dbpass=$row['upassword'];
                        
                        if(password_verify($old,$dbpass))
                        {
                          $npass=password_hash($npass, PASSWORD_DEFAULT);
                         $my_query="update d_registration set upassword='$npass' where uemail like '$email'";
                         $resultins = $con->query($my_query);
                           if($resultins)
                           {
                     
                               $aResult['result'] ='Insert successfully done';
                         
                           }
                            else
                           {
                            $aResult['error'] ='insert failed';
                           }
                       } else{
                        $aResult['error']='not match';
                       }    
                   
                  }
                }
      break;

      case 'removeacc':
               if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 1) ) 
               {
                   $aResult['error'] = 'Error in arguments!';
               }
               else 
               {
                   
                     $val=$_POST['arguments'][0];
                    
                     $email=$_SESSION['email'];
                   //connection for Database
                    $con=new DbConnector();

                     $my_query="delete from d_registration where uemail like '$email'";

                    $result = $con->query($my_query);
                    
                           if($result)
                           {
                               session_destroy();
                               $aResult['result'] ='delete successfully done';
                         
                           }
                            else
                           {
                            $aResult['error'] ='insert failed';
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
