<?php
session_start();
require_once('../database/database.php');
$date="";
$time="";
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
                $meetsms=$_POST['arguments'][6];

                $email=$_SESSION['email'];

                $date = strtotime($datetime);

                $date=date('Y-m-d H:i:s' , $date);

                $minute=(int)$minute;


                // $expdate=$date;
                $expdate = new DateTime($date);
                $expdate->add(new DateInterval('PT' . $minute . 'M'));
                $expdate = $expdate->format('Y-m-d H:i:s');

                $myuid = uniqid('hos');

                 
                //sending mails to attendees
                $mails=explode(",",$meetatten);
                for($i=0; $i<count($mails); $i++){
                    $subject="Impactmeet Support";
                    $to = $mails[$i];
                    $message = '
        <html>
            <head>
                <title>Impactmeet Support</title>
            </head>
            <body>
            <p>Dear user,</p>
<p>Please click on the following link to join Hostcomm Support Meeting scheduled on '.$datetime.'</p>
<p>-------------------------------------------------------------</p>
<p><a href="https://hostcommservers.com/hostcomm/join/'.$myuid.'">
https://hostcommservers.com/hostcomm/join/'.$myuid.'</a></p>
<p>-------------------------------------------------------------</p>
<p>Topic :'.$meettop.'</p>
<p>Duration: '.$minute.'
<p>ID: '.$myuid.'</p>
<p>Passcode: '.$meettpass.'</p><br>
<p>Thanks,</p>
<p>Hostcomm Team</p>
            </body>
        </html>'; 
                    $headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
                    $headers .= "From: Hostcomm Support<support@hostcommservers.com>\r\n"."Reply-To: <support@hostcommservers.com>\r\n";

                    mail($to, $subject, $message, $headers);
                }
                 

                $mes='Please join Hostcomm Support on '.$datetime.' at
https://hostcommservers.com/hostcomm/join/'.$myuid.'  
Topic: '.$meettop.'
ID: '.$myuid.'
Passcode: '.$meettpass;
               


                //connection for Database
                $con=new DbConnector();

                $my_query="INSERT INTO `u_meetings`(`uemail`, `mname`, `mtopic`, `mpass`, `mdatetime`, `mexpdatetime`, `mduration`, `mattend`, `smsinvite`, `muniq`) VALUES ('$email','$meetname','$meettop','$meettpass',' $date ','$expdate','$minute','$meetatten','$meetsms','$myuid')";

                //$my_query = "INSERT INTO u_meetings (uemail, stopic, sfeedback) VALUES ('$email', '$stopic', '$sfeedback')";

                $resultins = $con->query($my_query);
                if($resultins)
                {

                    $aResult['result'] ='Insert successfully done';
                
                     $sent=sendsms($meetsms,$mes);
                if($sent=="false"){
                    $aResult['result'].='SMS Sent Successfully. ';
                }
                else
                    $aResult['error'].=$sent;
                    

                }
                else
                {
                    $aResult['error'] ='insert failed. ';
                }
            }
            break;

        case 'meetingupdate':
            if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 5) ) 
            {
                $aResult['error'] = 'Error in arguments!';
            }
            else 
            {
                $con=new DbConnector();
                $uniqid=$_POST['arguments'][0];
                $meetname=$_POST['arguments'][1];
                $meettop=$_POST['arguments'][2];
                $meettpass=$_POST['arguments'][3];
                $datetime=$_POST['arguments'][4];
                $minute=$_POST['arguments'][5];


                $email=$_SESSION["email"];

                $date = strtotime($datetime);
                $date=date('Y-m-d H:i:s' , $date);

                $minute=(int)$minute;


                // $expdate=$date;
                $expdate = new DateTime($date);
                $expdate->add(new DateInterval('PT' . $minute . 'M'));
                $expdate = $expdate->format('Y-m-d H:i:s');




                $query="select * from u_meetings where muniq like '$uniqid'";
                $res = $con->query($query);

                $row=$con->fetchArray($res);
                $attend=$row['mattend'];
                $meetsms=$row['smsinvite'];
                 $host=$row['uemail'];
                   
                   if($host==$email){
                //sending mails to attendees
                $mails=explode(",",$attend);
                for($i=0; $i<count($mails); $i++){
                    $subject="Hostcomm Support";
                    $to = $mails[$i];
                    $message = '
        <html>
            <head>
                <title>Hostcomm Support</title>
            </head>
            <body>
            <p>Dear user,</p>
<p>Please click on the following link to join Hostcomm Support Meeting scheduled on '.$datetime.'</p>
<p>-------------------------------------------------------------</p>
<p><a href="https://hostcommservers.com/hostcomm/join/'.$uniqid.'">
https://hostcommservers.com/hostcomm/join/'.$uniqid.'</a></p>
<p>-------------------------------------------------------------</p>
<p>Topic :'.$meettop.'</p>
<p>Duration: '.$minute.'
<p>ID: '.$uniqid.'</p>
<p>Passcode: '.$meettpass.'</p><br>
<p>Thanks,</p>
<p>Hostcomm Team</p>
            </body>
        </html>'; 
                    $headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
                    $headers .= "From: Hostcomm Support<support@hostcommservers.com>\r\n"."Reply-To: <support@hostcommservers.com>\r\n";

                    mail($to, $subject, $message, $headers);
                }

                


                               //Your message to send, Add URL encoding here.

                $mes='Please join Hostcomm Support on '.$datetime.' at

https://hostcommservers.com/hostcomm/join/'.$uniqid.'  

Topic: '.$meettop.'
ID: '.$uniqid.'
Passcode: '.$meettpass;
                 


                //connection for Database

                $my_query="UPDATE u_meetings SET mname = '$meetname', mtopic = '$meettop', mpass = '$meettpass', mdatetime = '$date', mexpdatetime = '$expdate', mduration = '$minute' WHERE muniq='$uniqid';";


                $resultins = $con->query($my_query);
                if($resultins)
                {

                    $aResult['result'] ='update successfully done';
                   
                    $sent=sendsms($meetsms,$mes);
                if($sent=="false"){
                    $aResult['result'].='SMS Sent Successfully';
                }
                else
                    $aResult['error'].=$sent;
                    
                }
                else
                {
                    $aResult['error'] ='insert failed';
                }


                   }
                else
                $aResult['error'] ='Wrong User Operation';

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
                        'user'=>$email,
                        'host'=>$row['uemail'],
                        'mname'=>$row['mname'],
                        'mtopic'=>$row['mtopic'],
                        'mpass'=>$row['mpass'],
                        'mdatetime'=>$row['mdatetime'],
                        'mduration'=>$row['mduration'],
                        'mattend'=>$row['mattend'],
                        'msms'=>$row['smsinvite']
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
               
                   $con=new DbConnector();
                     $uniqid=$_POST['arguments'][0];
                    
                     $email=$_SESSION['email'];
                   
                   $query="select * from u_meetings where muniq like '$uniqid'";
    	             $res = $con->query($query);
                   
                   $row=$con->fetchArray($res);
                   
                   $host=$row['uemail'];
                   
                   if($host==$email){
                   

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
                   }else 
                    $aResult['error'] ='Wrong User Operation';    

            }
            break;

        case 'sendsms':
            if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 5) ) 
            {
                $aResult['error'] = 'Error in arguments!';
            }
            else 
            {


                $meettop=$_POST['arguments'][0];
                $myuid=$_POST['arguments'][1];
                $meetsms=$_POST['arguments'][2];
                $time=$_POST['arguments'][3];
                $date=$_POST['arguments'][4];
                $pass=$_POST['arguments'][5];
               
                $mes='Please join Hostcomm Support on '.$date.' '.$time.' at

https://hostcommservers.com/hostcomm/join/'.$myuid.'  

Topic: '.$meettop.'
ID: '.$myuid.'
Passcode: '.$pass;
            $sent=sendsms($meetsms,$mes);
                if($sent=="false"){
                    $aResult['result']='SMS Sent Successfully';
                }
                else
                    $aResult['error']=$sent;
            }
            break;  
        default:
            $aResult['error'] = 'Not found function '.$_POST['functionname'].'!';
            break;
    }
}

function sendsms($mob,$mes){
    
      //sms invite

                //Your authentication key
                $authKey = "323118AMt52vy7z45f76c5c3P1";

                //Multiple mobiles numbers separated by comma
                $mobileNumber = $mob;

                //Sender ID,While using route4 sender id should be 6 characters long.
                $senderId = "DAMSMS";

                //Your message to send, Add URL encoding here.

               
                $message = urlencode($mes);

                //Define route 
                $route = "4";
                //Prepare you post parameters
                $postData = array(
                    'authkey' => $authKey,
                    'mobiles' => $mobileNumber,
                    'message' => $message,
                    'sender' => $senderId,
                    'route' => $route
                );

                //API URL
                $url="http://api.msg91.com/api/sendhttp.php";

                // init the resource
                $ch = curl_init();
                curl_setopt_array($ch, array(
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => $postData
                    //,CURLOPT_FOLLOWLOCATION => true
                ));


                //Ignore SSL certificate verification
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


                //get response
                $output = curl_exec($ch);
                $err="false";

                //Print error if any
                if(curl_errno($ch))
                {
                    $err= 'sms-error:' . curl_error($ch);
                }

                curl_close($ch);
                if($err!="")
                    $aResult['error']=$err;
                //echo $output;
    return $err;
}


echo json_encode($aResult);
?>
