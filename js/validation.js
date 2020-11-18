
function createaccount(){

  var fname=document.getElementById("inputFirstName").value;
  var lname=document.getElementById("inputLastName").value;
  var email=document.getElementById("inputEmailAddress").value;
    var mobile = telInput.intlTelInput("getNumber");
  var pass=document.getElementById("inputPassword").value;
  var conpass=document.getElementById("inputConfirmPassword").value;

  if(fname=="" || lname =="" || email=="" || pass=="" || conpass==""|| mobile==""){
    alert("Please fill all the details");
    document.getElementById("inputFirstName").value="";
    document.getElementById("inputLastName").value="";
    document.getElementById("inputEmailAddress").value="";
    document.getElementById("inputMobile").value = "";
    document.getElementById("inputPassword").value="";
    document.getElementById("inputConfirmPassword").value="";
  }
  else
  {

  if(pass!=conpass){
    alert("Passwords dosent match");
    document.getElementById("inputPassword").value="";
        document.getElementById("inputConfirmPassword").value="";
  }else{
    jQuery.ajax({
    type: "POST",
    url: 'controller/registeruser.php',
    dataType: 'json',
    data: {functionname: 'registeruser', arguments: [fname,lname,email,mobile,pass]},

    success: function (data, textstatus) 
    {
                  if(('error' in data) ) 
                  {
                      yourVariable = data["error"];

                      if(yourVariable =="already present")
                      {
                      alert("Email ID already present. Please login!");
                      window.location.href = '/hostcomm/auth-login-basic.html';
                     }else if(yourVariable =="insert failed"){
                      alert("Internal Error contact Admin!");
                      window.location.href = '/hostcomm/auth-login-basic.html';
                     }

                  }
           else 
                   {
                             
                  window.location.href = '/hostcomm/index.php';
                                           
                  }

                  
    }
  });
  }
}
}

function loginaccount(){
  var email=document.getElementById("inputEmailAddress").value;
  var pass=document.getElementById("inputPassword").value;

  if(email == "" || pass==""){
    alert("Please fill the details");
    document.getElementById("inputEmailAddress").value="";
    document.getElementById("inputPassword").value="";
  }else{
    jQuery.ajax({
    type: "POST",
    url: 'controller/registeruser.php',
    dataType: 'json',
    data: {functionname: 'loginuser', arguments: [email,pass]},

    success: function (data, textstatus) 
    {
	    	console.log(data);
                  if(('error' in data) ) 
                  {
                      yourVariable = data["error"];

                      if(yourVariable =="login failed")
                      {
                      alert("Invalid Email ID or Password");
                      window.location.href = '/hostcomm/auth-login-basic.html';
                     }else if(yourVariable =="not present"){
                      alert("Please register ");
                      window.location.href = '/hostcomm/auth-register-basic.html';
                     }

                  }
           else 
                   {
                  yourVariable = data["result"]; 
                  if(yourVariable=="admin success"){
                    window.location.href = '/hostcomm/index.php';
                  } else if(yourVariable=="user success") {
                    window.location.href = '/hostcomm/index.php';
                  } else if(yourVariable=="subscriber success"){
                      window.location.href='/hostcomm/index.php';
                  }       
                  
                                           
                  }

                  
    }
  });
  }
}

function editchange(){
 
 //document.getElementById("inputUsername").disabled=false;
 document.getElementById("inputFirstName").disabled=false;
 document.getElementById("inputLastName").disabled=false;
 document.getElementById("inputOrgName").disabled=false;
 document.getElementById("inputLocation").disabled=false;
//document.getElementById("inputEmailAddress").disabled=false;
document.getElementById("inputPhone").disabled=false;
document.getElementById("inputBirthday").disabled=false;
document.getElementById("editchanges").disabled=true;
document.getElementById("savechanges").disabled=false;
}
function savechange(){

var uname=document.getElementById("inputUsername").value;
var fname=document.getElementById("inputFirstName").value;
var lname=document.getElementById("inputLastName").value;
var orgname=document.getElementById("inputOrgName").value;
var loc=document.getElementById("inputLocation").value;
var email=document.getElementById("inputEmailAddress").value;
var phone=document.getElementById("inputPhone").value;
var dob=document.getElementById("inputBirthday").value;

if(uanme="" || fname== "" || lname=="" || orgname=="" || loc=="" || email=="" || phone=="" || dob=="")
{
   alert("Please fill all the details");
    document.getElementById("inputFirstName").value="";
    document.getElementById("inputLastName").value="";
    document.getElementById("inputUsername").value="";
    document.getElementById("inputOrgName").value="";
    document.getElementById("inputLocation").value="";
    document.getElementById("inputPhone").value="";
    document.getElementById("inputBirthday").value="";
}else{
jQuery.ajax({
    type: "POST",
    url: 'controller/registeruser.php',
    dataType: 'json',
    data: {functionname: 'updateuser', arguments: [fname,lname,orgname,loc,phone,dob,email]},

    success: function (data, textstatus) 
    {
                  if(('error' in data) ) 
                  {
                      yourVariable = data["error"];
                      alert("Contact admin!");
                       window.location.href = '/hostcomm/auth-login-basic.html';
                      

                  }
           else 
                   {
                             
                  window.location.href = '/hostcomm/account-profile.php';
                                           
                  }

                  
    }
  });
}
}

function uploadimage(){ 
 document.getElementById("upload").addEventListener('click', document.getElementById("fileid").click());
}

function uploadfile(){
var form=document.getElementById("sendfile");
  form.submit();
}

function changepass(){
  var opass=document.getElementById("currentPassword").value;
  var npass=document.getElementById("newPassword").value;
  var cpass=document.getElementById("confirmPassword").value;
  $flag=1;
  if(opass=="" || npass=="" || cpass=="")
  {
    alert("All details need to be filled");
    document.getElementById("currentPassword").value="";
    document.getElementById("newPassword").value="";
    document.getElementById("confirmPassword").value="";
  }
  else
  {
    if(npass==cpass){
   jQuery.ajax({
    type: "POST",
    url: 'controller/registeruser.php',
    dataType: 'json',
    data: {functionname: 'passchange', arguments: [opass,npass,cpass]},

    success: function (data, textstatus) 
    {
                  if(('error' in data) ) 
                  {
                      yourVariable = data["error"];
                      if(yourVariable=="not match"){
                        alert("Wrong password. Please try again");
                        window.location.href = '/hostcomm/account-security.php';
                      }else if(yourVariable=="insert failed"){
                        alert("Something went wrong! Contact admin");
                        window.location.href = '/hostcomm/account-security.php';
                      }
                      

                  }
           else 
                   {
                       alert("Password updated successfully");      
                  window.location.href = '/hostcomm/account-security.php';
                                           
                  }

                  
    }
  });

}else{
  alert("Password dosen't match");
  document.getElementById("currentPassword").value="";
    document.getElementById("newPassword").value="";
    document.getElementById("confirmPassword").value="";
}

}}
function removeacc(){
alert("Sure you want to remove account");

jQuery.ajax({
    type: "POST",
    url: 'controller/registeruser.php',
    dataType: 'json',
    data: {functionname: 'removeacc', arguments: [1]},

    success: function (data, textstatus) 
    {
                  if(('error' in data) ) 
                  {
                      yourVariable = data["error"];
                      if(yourVariable=="insert failed"){
                        alert("Cannot remove the account");
                        window.location.href = '/hostcomm/account-security.php';
                      }
                      

                  }
           else 
                   {
                       alert("Account removed successfully");      
                  window.location.href = '/hostcomm/auth-login-basic.html';
                                           
                  }

                  
    }
  });

}

function submitsup(){

var selected=document.getElementById("inputProblem").value;
var message=document.getElementById("inputMessage").value;
if(selected=="" || message==""){
  alert("Please fill All details");
  document.getElementById("inputProblem").value="";
  document.getElementById("inputMessage").value="";
}else{

jQuery.ajax({
    type: "POST",
    url: 'controller/submitform.php',
    dataType: 'json',
    data: {functionname: 'submitsupport', arguments: [selected,message]},

    success: function (data, textstatus) 
    {
                  if(('error' in data) ) 
                  {
                      yourVariable = data["error"];
                      if(yourVariable=="not present"){
                        alert("Something happend! Contact admin");
                        window.location.href = '/hostcomm/auth-login-basic.html';
                      }else if(yourVariable=="insert failed"){
                         
                        alert("Support not submitted");
                         window.location.href = '/hostcomm/index.php';
                      }
                      

                  }
           else 
                   {
                       alert("Thanks for your comments ! Will get back to you soon");      
                  window.location.href = '/hostcomm/index.php';
                                           
                  }

                  
    }
  });

}
}

function submitfeed(){

  var star1=document.getElementById("star-1").checked;
  var star2=document.getElementById("star-2").checked;
  var star3=document.getElementById("star-3").checked;
  var star4=document.getElementById("star-4").checked;
  var star5=document.getElementById("star-5").checked;

  var prob=document.getElementById("feed_problem").value;

  var poor=document.getElementById("poor").checked;
  var good=document.getElementById("good").checked;
  var best=document.getElementById("best").checked;

  var sugg=document.getElementById("feed_suggestion").value;
  var flag=0;
  
  var exp="notfill";
  if(star1){
   flag=1;
  }else if(star2){
    flag=2;
  }
  else if(star3){
    flag=3;
  }
  else if(star4){
    flag=4;
  }
  else if(star5){
    flag=5;
  }
  
  if(poor){
   exp="poor";
  }else if(good){
    exp="good";
  }else if(best){
    exp="best";
  }
 
 if(flag==0 || exp=="notfill" || prob=="" || sugg==""){
  alert("Please fill All details");
  document.getElementById("star-1").checked=false;
  document.getElementById("star-2").checked=false;
  document.getElementById("star-3").checked=false;
  document.getElementById("star-4").checked=false;
  document.getElementById("star-5").checked=false;
  document.getElementById("poor").checked=false;
  document.getElementById("good").checked=false;
  document.getElementById("best").checked==false;
  document.getElementById("feed_suggestion").value="";
  document.getElementById("feed_problem").value="";
 }else{

jQuery.ajax({
    type: "POST",
    url: 'controller/submitform.php',
    dataType: 'json',
    data: {functionname: 'submitfeed', arguments: [flag,prob,exp,sugg]},

    success: function (data, textstatus) 
    {
                  if(('error' in data) ) 
                  {
                      yourVariable = data["error"];
                      if(yourVariable=="not present"){
                        alert("Something happend! Contact admin");
                        window.location.href = '/hostcomm/auth-login-basic.html';
                      }else if(yourVariable=="insert failed"){
                         
                        alert("Support not submitted");
                         window.location.href = '/hostcomm/index.php';
                      }
                      

                  }
           else 
                   {
                       alert("Woow notted your comments");      
                  window.location.href = '/hostcomm/index.php';
                                           
                  }

                  
    }
  });

 }

}

function createmeeting(){

  var meetname=document.getElementById("inputName").value;
  var meettop=document.getElementById("inputTopic").value;
  var meettpass=document.getElementById("inputPassword").value;
  var meettdate=document.getElementById("date").value;
  var meettime=document.getElementById("inputTime").value;
  var meethour=document.getElementById("num_hours").value;
  var meetmin=document.getElementById("num_minutes").value;
  var meetatten=document.getElementById("inputAttendees").value;
  
  var hours=parseInt(meethour.split(" "));
  var min=parseInt(meetmin.split(" "));

  
  var flag=0;
  // if(meethour== "00 hrs" && meetmin=="00 mins"){
  //  flag=0;
  // }else if(meethour=="Hours" && meetmin=="Minutes"){
  //   flag=0;
  // }else if(hours>=1 && meetmin<=50){
  //   flag=1;
  // }else{
  //   flag=1;
  // }

  if((meethour== "00 hrs" && meetmin=="00 mins") && (meethour=="Hours" && meetmin=="Minutes")){
   flag=0;
  }else{
    if((hours>=1 && min<=50) || (hours<=23 && min>=1)){
      flag=1;
    }
  }


  if(meetname=="" || meettop=="" || meettpass=="" || meettdate=="" || meettime=="" || meetatten=="" || flag==0){
    alert("Please fill all details or check for meeting duration");
    document.getElementById("inputName").value="";
    document.getElementById("inputTopic").value="";
    document.getElementById("inputPassword").value="";
    document.getElementById("date").value="";
    document.getElementById("inputTime").value="";
    document.getElementById("num_hours").value="";
    document.getElementById("num_minutes").value="";
    document.getElementById("inputAttendees").value="";
  }else{
   
   var datetime=meettdate + ' ' + meettime + ':00';

   var minut=parseInt(hours*60+min);
   // var hours=parseInt(meethour.split(" "));
   // var min=parseInt(meetmin.split(" "));
   
   //var expdate=datetime.setMinutes(datetime.getMinutes()+minut,0,0);
   
   //var expdatetime=datetime.addhours()
   jQuery.ajax({
    type: "POST",
    url: 'controller/meetingregistration.php',
    dataType: 'json',
    data: {functionname: 'meetingsub', arguments: [meetname,meettop,meettpass,datetime,minut,meetatten]},

    success: function (data, textstatus) 
    {
                  if(('error' in data) ) 
                  {
                      yourVariable = data["error"];
                      if(yourVariable=="insert failed")
                      {
                        alert("Failed! Contact admin");
                        //window.location.href = '/hostcomm/index.php';
                      }
                      

                  }
           else 
                   {
                       alert("Meeting successfully Added");      
                       window.location.href = '/hostcomm/index.php';
                                           
                  }

                  
    }
  });
  }
}

function validateresc(){

  document.getElementById("meetingName").disabled=false;
  document.getElementById("topic").disabled=false;
  document.getElementById("password").disabled=false;
  document.getElementById("schedule_date").disabled=false;
  document.getElementById("schedule_time").disabled=false;
  document.getElementById("schedule_duration").disabled=false;
  document.getElementById("inputAttendes").disabled=false;
  document.getElementById("reschedule_1").hidden=true;
  document.getElementById("save_1").hidden=false;
  
}

function savemeeting(){
  // var meetname=meetingName;
  // var meettop=topic;
  // var meettpass=password;
  // var meettdate=schedule_date;
  // var meettime=schedule_time;
  // var meethour=schedule_duration;
  // var meetatten=inputAttendees;
  // var uniqid=uniqid;
  var meetname=document.getElementById("meetingName").value;
  var meettop=document.getElementById("topic").value;
  var meettpass=document.getElementById("password").value;
  var meettdate=document.getElementById("schedule_date").value;
  var meettime=document.getElementById("schedule_time").value;
  var meethour=document.getElementById("schedule_duration").value;
  var meetatten=document.getElementById("inputAttendes").value;
  var uniqid=document.getElementById("uniqid").value;

  //var hours=parseInt(meethour.split(" "));
  if(meetname=="" || meettop=="" || meettpass=="" || meettdate=="" || meettime=="" || meetatten=="" || meethour==""){
    alert("Please fill all details");
  }else{
     var datetime=meettdate + ' ' + meettime;

     var minut=parseInt(meethour);

     jQuery.ajax({
    type: "POST",
    url: 'controller/meetingregistration.php',
    dataType: 'json',
    data: {functionname: 'meetingupdate', arguments: [uniqid,meetname,meettop,meettpass,datetime,minut,meetatten]},

    success: function (data, textstatus) 
    {
                  if(('error' in data) ) 
                  {
                      yourVariable = data["error"];
                      if(yourVariable=="insert failed")
                      {
                        alert("Failed! Contact admin");
                        //window.location.href = '/hostcomm/index.php';
                      }
                      

                  }
           else 
                   {
                       alert("Meeting updated successfully");      
                       window.location.href = '/hostcomm/index.php';
                                           
                  }

                  
    }
  });

  }
}

function fetchdata(uniqid){
var uniqu=uniqid;

if(uniqu!=""){
  jQuery.ajax({
    type: "POST",
    url: 'controller/meetingregistration.php',
    dataType: 'json',
    data: {functionname: 'displaydetails', arguments: [uniqu]},

    success: function (data, textstatus) 
    {
                  if(('error' in data) ) 
                  {
                      yourVariable = data["error"];
                      if(yourVariable=="insert failed")
                      {
                        alert("Failed! Contact admin");
                        //window.location.href = '/hostcomm/index.php';
                      }
                      

                  }
           else 
                   {
                      document.getElementById("meetingName").value=data.result[0].mname;
                      document.getElementById("topic").value=data.result[0].mtopic;
                      document.getElementById("password").value=data.result[0].mpass;
                      document.getElementById("inputAttendes").value=data.result[0].mattend;
                      var schedule_date=data.result[0].mdatetime.split(" ");
                      document.getElementById("schedule_date").value=schedule_date[0];
                      document.getElementById("schedule_time").value=schedule_date[1];
                      document.getElementById("schedule_duration").value=data.result[0].mduration;
                      document.getElementById("uniqid").value=uniqu;
                                           
                  }

                  
    }
  });
}
}

function joinmeeting(){
 var url="https://hostcommservers.com/hostcomm/join/";
 var uniqid= document.getElementById("uniqid").value;
 var finalurl=url+uniqid;
 window.open(finalurl);
}

function meetcancel(){
  var uniqud=document.getElementById("uniqid").value;
  alert("Sure you want to cancel meeting?");

  jQuery.ajax({
    type: "POST",
    url: 'controller/meetingregistration.php',
    dataType: 'json',
    data: {functionname: 'cancelmeet', arguments: [uniqud]},

    success: function (data, textstatus) 
    {
                  if(('error' in data) ) 
                  {
                      yourVariable = data["error"];
                      if(yourVariable=="insert failed"){
                        alert("Cannot remove the Meeting");
                        window.location.href = '/hostcomm/index.php';
                      }
                      

                  }
           else 
                   {
                       alert("Meeting has been canceled");      
                      window.location.href = '/hostcomm/index.php';
                                           
                  }

                  
    }
  });
}

function loadmeets(){

}

function logout(){
  jQuery.ajax({
    type: "POST",
    url: 'controller/logout.php',
    dataType: 'json',
    data: {functionname: 'logout', arguments: [1]},

    success: function (data, textstatus) 
    {
                  if(('error' in data) ) 
                  {
                    
                      window.location.href = '/hostcomm/auth-login-basic.html';

                  }
           else 
                   {
                          
                      window.location.href = '/hostcomm/auth-login-basic.html';
                                           
                  }

                  
    }
  });
}
