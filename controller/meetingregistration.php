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
            case 'meetingsub':
               if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 6) ) 
               {
                   $aResult['error'] = 'Error in arguments!';
               }
               else 
               {
                   $meetname=$_POST['arguments'][0];
                   $meettop=$_POST['arguments'][1];
				   $meettpass=$_POST['arguments'][2];
                   $datetime=$_POST['arguments'][3];
                   $minute=$_POST['arguments'][4];
                   $meetatten=$_POST['arguments'][5];

				   $email=$_SESSION["email"];
                   
                   
                   $date = strtotime($datetime);
                  
                   $date=date('Y-m-d H:i:s' , $date);

                   $minute=(int)$minute;
                   
                  
                   // $expdate=$date;
                   $expdate = new DateTime($date);
				   $expdate->add(new DateInterval('PT' . $minute . 'M'));
				   $expdate = $expdate->format('Y-m-d H:i:s');

				   $myuid = uniqid('dus');
				   
                   //connection for Database
                    $con=new DbConnector();

                      $my_query="INSERT INTO `u_meetings`(`uemail`, `mname`, `mtopic`, `mpass`, `mdatetime`, `mexpdatetime`, `mduration`, `mattend`, `muniq`) VALUES ('$email','$meetname','$meettop','$meettpass',' $date ','$expdate','$minute','$meetatten','$myuid')";

                      //$my_query = "INSERT INTO u_meetings (uemail, stopic, sfeedback) VALUES ('$email', '$stopic', '$sfeedback')";
                     
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
	    break;

	    case 'meetingupdate':
               if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 7) ) 
               {
                   $aResult['error'] = 'Error in arguments!';
               }
               else 
               {
                   $uniqid=$_POST['arguments'][0];
                   $meetname=$_POST['arguments'][1];
				   $meettop=$_POST['arguments'][2];
                   $meettpass=$_POST['arguments'][3];
                   $datetime=$_POST['arguments'][4];
                   $minute=$_POST['arguments'][5];
                   $meetatten=$_POST['arguments'][6];
                   
				   $email=$_SESSION["email"];
                   
                   $date = strtotime($datetime);
                   $date=date('Y-m-d H:i:s' , $date);
                  
                   $minute=(int)$minute;
                   
                  
                   // $expdate=$date;
                   $expdate = new DateTime($date);
				   $expdate->add(new DateInterval('PT' . $minute . 'M'));
				   $expdate = $expdate->format('Y-m-d H:i:s');
                    
                   //connection for Database
                    $con=new DbConnector();
                     $my_query="UPDATE u_meetings SET mname = '$meetname', mtopic = '$meettop', mpass = '$meettpass', mdatetime = '$date', mexpdatetime = '$expdate', mduration = '$minute', mattend='$meetatten' WHERE muniq='$uniqid';";
                     
                    
    	             $resultins = $con->query($my_query);
    	             if($resultins)
					 {
					 	 
					  $aResult['result'] ='update successfully done';
   						
					 }
					 else
					 {
					 	$aResult['error'] ='insert failed';
					 }
                 	}
	    break;

	    case 'displaydetails':
               if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 1) ) 
               {
                   $aResult['error'] = 'Error in arguments!';
               }
               else 
               {
                   $uniqid=$_POST['arguments'][0];
                   

				   $email=$_SESSION["email"];
                   
				   
                   //connection for Database
                    $con=new DbConnector();
                     $my_query="select * from u_meetings where muniq like '$uniqid'";
                     
                     
    	             $result = $con->query($my_query);

    	            $result = $con->query($my_query);
					while(($row=$con->fetchArray($result)))
					{
					        $json[]= array(
					                'mname'=>$row['mname'],
					                'mtopic'=>$row['mtopic'],
					                'mpass'=>$row['mpass'],
					                'mdatetime'=>$row['mdatetime'],
					                'mduration'=>$row['mduration'],
					                'mattend'=>$row['mattend']
					            );
					}
					        if(!empty($json)){
					        // $jsonstring = json_encode($json);
					        // echo $jsonstring;
					        	 $aResult['result'] =$json;
					        }
					        else{
					        	$aResult['error'] ='fetch failed';
					            // echo "false";
					        }
                 	}
	    break;
         
        case 'cancelmeet':
               if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 1) ) 
               {
                   $aResult['error'] = 'Error in arguments!';
               }
               else 
               {
                   
                     $uniqid=$_POST['arguments'][0];
                    
                     $email=$_SESSION['email'];
                   //connection for Database
                    $con=new DbConnector();

                     $my_query="delete from u_meetings where muniq like '$uniqid'";

                    $result = $con->query($my_query);
                    
                           if($result)
                           {
                               
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
