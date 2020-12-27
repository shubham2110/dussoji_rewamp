
function createaccount(){
    
    
    var f = $("#create_account").find('.form-group'),
      ferror = false,
      emailExp = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;

    f.children('input').each(function() { // run all inputs

      var i = $(this); // current input
      var rule = i.attr('data-rule');

      if (rule !== undefined) {
        var ierror = false; // error flag for current input
        var pos = rule.indexOf(':', 0);
        if (pos >= 0) {
          var exp = rule.substr(pos + 1, rule.length);
          rule = rule.substr(0, pos);
        } else {
          rule = rule.substr(pos + 1, rule.length);
        }

        switch (rule) {
          case 'required':
            if (i.val() === '') {
              ferror = ierror = true;
            }
            break;

          case 'minlen':
            if (i.val().length < parseInt(exp)) {
              ferror = ierror = true;
            }
            break;

          case 'email':
            if (!emailExp.test(i.val())) {
              ferror = ierror = true;
            }
            break;

          case 'checked':
            if (!i.attr('checked')) {
              ferror = ierror = true;
            }
            break;

          case 'regexp':
            exp = new RegExp(exp);
            if (!exp.test(i.val())) {
              ferror = ierror = true;
            }
            break;
        }
        i.next('.validate').html((ierror ? (i.attr('data-msg') !== undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
      }
    });
    f.children('textarea').each(function() { // run all inputs

      var i = $(this); // current input
      var rule = i.attr('data-rule');

      if (rule !== undefined) {
        var ierror = false; // error flag for current input
        var pos = rule.indexOf(':', 0);
        if (pos >= 0) {
          var exp = rule.substr(pos + 1, rule.length);
          rule = rule.substr(0, pos);
        } else {
          rule = rule.substr(pos + 1, rule.length);
        }

        switch (rule) {
          case 'required':
            if (i.val() === '') {
              ferror = ierror = true;
            }
            break;

          case 'minlen':
            if (i.val().length < parseInt(exp)) {
              ferror = ierror = true;
            }
            break;
        }
        i.next('.validate').html((ierror ? (i.attr('data-msg') != undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
      }
    });
    
    
    
    var mobile=telInput.intlTelInput("getNumber");
  if ($.trim(telInput.val()) || $("#inputMobile").val() == "") {
     if (!telInput.intlTelInput("isValidNumber") || $("#inputMobile").val() == "") {
    console.log(telInput.intlTelInput("getValidationError"));
         $(".valid-phone").html("Please enter a valid phone number");
         ferror=true;
        }
    else {
        $(".valid-phone").html("");
    }}
    
   if (ferror) return false;
    else { 
    

  var fname=document.getElementById("inputFirstName").value;
  var lname=document.getElementById("inputLastName").value;
  var email=document.getElementById("inputEmailAddress").value;
   
  var pass=document.getElementById("inputPassword").value;
  var conpass=document.getElementById("inputConfirmPassword").value;

  if(pass!=conpass){
    alert("Passwords does'nt match");
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
    
    var f = $("#meeting_create").find('.form-group'),
      ferror = false,
      emailExp = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;

    f.children('input').each(function() { // run all inputs

      var i = $(this); // current input
      var rule = i.attr('data-rule');

      if (rule !== undefined) {
        var ierror = false; // error flag for current input
        var pos = rule.indexOf(':', 0);
        if (pos >= 0) {
          var exp = rule.substr(pos + 1, rule.length);
          rule = rule.substr(0, pos);
        } else {
          rule = rule.substr(pos + 1, rule.length);
        }

        switch (rule) {
          case 'required':
            if (i.val() === '') {
              ferror = ierror = true;
            }
            break;

          case 'minlen':
            if (i.val().length < parseInt(exp)) {
              ferror = ierror = true;
            }
            break;

          case 'email':
            if (!emailExp.test(i.val())) {
              ferror = ierror = true;
            }
            break;

          case 'checked':
            if (!i.attr('checked')) {
              ferror = ierror = true;
            }
            break;

          case 'regexp':
            exp = new RegExp(exp);
            if (!exp.test(i.val())) {
              ferror = ierror = true;
            }
            break;
        }
        i.next('.validate').html((ierror ? (i.attr('data-msg') !== undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
      }
    });
    f.children('textarea').each(function() { // run all inputs

      var i = $(this); // current input
      var rule = i.attr('data-rule');

      if (rule !== undefined) {
        var ierror = false; // error flag for current input
        var pos = rule.indexOf(':', 0);
        if (pos >= 0) {
          var exp = rule.substr(pos + 1, rule.length);
          rule = rule.substr(0, pos);
        } else {
          rule = rule.substr(pos + 1, rule.length);
        }

        switch (rule) {
          case 'required':
            if (i.val() === '') {
              ferror = ierror = true;
            }
            break;

          case 'minlen':
            if (i.val().length < parseInt(exp)) {
              ferror = ierror = true;
            }
            break;
        }
        i.next('.validate').html((ierror ? (i.attr('data-msg') != undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
      }
    });
    
    
    
  var meethour=document.getElementById("num_hours").value;
  var meetmin=document.getElementById("num_minutes").value;
  if((meethour== "00 hrs" && meetmin=="00 mins") || (meethour=="Hours" || meetmin=="Minutes")){
   ferror=true;
      $(".duration-valid").html("Enter valid meeting duration");
  } else {
      $(".duration-valid").html("");
  }
    
    
    var meetsms=telInput.intlTelInput("getNumber");
  if ($.trim(telInput.val()) || $("#smsinvite").val() == "") {
     if (!telInput.intlTelInput("isValidNumber") || $("#smsinvite").val() == "") {
    console.log(telInput.intlTelInput("getValidationError"));
         $(".valid-phone").html("Please enter a valid phone number");
         ferror=true;
        }
    else {
        $(".valid-phone").html("");
    }}
    
    
    var meettdate=document.getElementById("date").value;
    var meettime=document.getElementById("inputTime").value;
    if(meettdate==""){
        $(".time-valid").html("Please enter date first");
        ferror=true;
    }
    else if(meettime==""){
        $(".time-valid").html("Please enter time of meeting");
        ferror=true;
    }
    else{
        var date = new Date($('#date').val());
  day = date.getDate();
        
    var curr_date = new Date($('#date').attr('min'));
        dayc = curr_date.getDate();
        if(day==dayc){
            var time = $('#inputTime').val().split(':');
    var hh = time[0];
    var mm = time[1];
            
            var d = new Date();
var n = d.getTimezoneOffset();//for uk
var ans = new Date(d.getTime() + n * 60 * 1000);

            
            var curr_hh=ans.getHours();
            var curr_mm=ans.getMinutes();
            
            if(hh<curr_hh || (hh==curr_hh && mm<curr_mm)){
                $(".time-valid").html("Enter a valid time");
                ferror=true;
            
        } else
            $(".time-valid").html("");
        
    } else
            $(".time-valid").html("");
    
    }
    
    
    
    
    
    //attendees
    var meetatten=document.getElementById("inputAttendees").value;
    if(meetatten===""){
        $(".valid-attend").html("Please enter atleast one email");
        ferror=true;
    }
    else{
        
        if(meetatten.indexOf(",")===-1 && !emailExp.test(meetatten)){
                $(".valid-attend").html("Please enter a valid email <br> Note : No spaces are allowed");
                ferror=true;
        }
        else{
            var res=meetatten.split(",");
            var c="";
            for(i=0;i<res.length;i++){
                if(!emailExp.test(res[i]))
                    c+=(i+1)+",";
            }
            if(c!=""){
                c=c.substring(0, c.length-1);
                $(".valid-attend").html("Please enter valid emails : "+c+"<br> Note : No spaces are allowed");
                ferror=true;
            }
            else
                $(".valid-attend").html("");
        }
        
    }
    
    
    
    
    
    if (ferror) return false;
    else {
    

  var meetname=document.getElementById("inputName").value;
  var meettop=document.getElementById("inputTopic").value;
  var meettpass=document.getElementById("inputPassword").value;
  
  
  
  var hours=parseInt(meethour.split(" "));
  var min=parseInt(meetmin.split(" "));
  
  
  


  
   
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
    data: {functionname: 'meetingsub', arguments: [meetname,meettop,meettpass,datetime,minut,meetatten,meetsms]},

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
  
}}

function validateresc(){

  document.getElementById("meetingName").disabled=false;
  document.getElementById("topic").disabled=false;
  document.getElementById("password").disabled=false;
  document.getElementById("schedule_date").disabled=false;
  document.getElementById("schedule_time").disabled=false;
  document.getElementById("schedule_duration").disabled=false;
  document.getElementById("reschedule_1").hidden=true;
  document.getElementById("save_1").hidden=false;
  
}

function savemeeting(){
  
    
    
    var f = $(".reschedule-form").find('.form-group'),
      ferror = false,
      emailExp = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;

    f.children('input').each(function() { // run all inputs

      var i = $(this); // current input
      var rule = i.attr('data-rule');

      if (rule !== undefined) {
        var ierror = false; // error flag for current input
        var pos = rule.indexOf(':', 0);
        if (pos >= 0) {
          var exp = rule.substr(pos + 1, rule.length);
          rule = rule.substr(0, pos);
        } else {
          rule = rule.substr(pos + 1, rule.length);
        }

        switch (rule) {
          case 'required':
            if (i.val() === '') {
              ferror = ierror = true;
            }
            break;

          case 'minlen':
            if (i.val().length < parseInt(exp)) {
              ferror = ierror = true;
            }
            break;

          case 'email':
            if (!emailExp.test(i.val())) {
              ferror = ierror = true;
            }
            break;

          case 'checked':
            if (!i.attr('checked')) {
              ferror = ierror = true;
            }
            break;

          case 'regexp':
            exp = new RegExp(exp);
            if (!exp.test(i.val())) {
              ferror = ierror = true;
            }
            break;
        }
        i.next('.validate').html((ierror ? (i.attr('data-msg') !== undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
      }
    });
    f.children('textarea').each(function() { // run all inputs

      var i = $(this); // current input
      var rule = i.attr('data-rule');

      if (rule !== undefined) {
        var ierror = false; // error flag for current input
        var pos = rule.indexOf(':', 0);
        if (pos >= 0) {
          var exp = rule.substr(pos + 1, rule.length);
          rule = rule.substr(0, pos);
        } else {
          rule = rule.substr(pos + 1, rule.length);
        }

        switch (rule) {
          case 'required':
            if (i.val() === '') {
              ferror = ierror = true;
            }
            break;

          case 'minlen':
            if (i.val().length < parseInt(exp)) {
              ferror = ierror = true;
            }
            break;
        }
        i.next('.validate').html((ierror ? (i.attr('data-msg') != undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
      }
    });
    
    
    var meettdate=document.getElementById("schedule_date").value;
  var meettime=document.getElementById("schedule_time").value;
    if(meettdate==""){
        $(".time-res").html("Please enter date first");
        ferror=true;
    }
    else if(meettime==""){
        $(".time-res").html("Please enter time of meeting");
        ferror=true;
    }
    else{
        var date = new Date($('#schedule_date').val());
  day = date.getDate();
        
    var curr_date = new Date($('#schedule_date').attr('min'));
        dayc = curr_date.getDate();
        if(day==dayc){
            var time = $('#schedule_time').val().split(':');
    var hh = time[0];
    var mm = time[1];
            
            var d = new Date();
var n = d.getTimezoneOffset();
var ans = new Date(d.getTime() + n * 60 * 1000);

            
            var curr_hh=ans.getHours();
            var curr_mm=ans.getMinutes();
            
            if(hh<curr_hh || (hh==curr_hh && mm<curr_mm)){
                $(".time-res").html("Enter a valid time");
                ferror=true;
            } else
            $(".time-res").html("");
            
        } else
            $(".time-res").html("");
        
    }
    
    
    
    if (ferror) return false;
    else {

       
  var meetname=document.getElementById("meetingName").value;
  var meettop=document.getElementById("topic").value;
  var meettpass=document.getElementById("password").value;
  
  var meethour=document.getElementById("schedule_duration").value;
  var uniqid=document.getElementById("uniqid").value;

  //var hours=parseInt(meethour.split(" "));
  
     var datetime=meettdate + ' ' + meettime;

     var minut=parseInt(meethour);

     jQuery.ajax({
    type: "POST",
    url: 'controller/meetingregistration.php',
    dataType: 'json',
    data: {functionname: 'meetingupdate', arguments: [uniqid,meetname,meettop,meettpass,datetime,minut]},

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

  
}}

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
                      var user=data.result[0].user;
                      var host=data.result[0].host;
                      document.getElementById("meetingName").value=data.result[0].mname;
                      document.getElementById("topic").value=data.result[0].mtopic;
                      document.getElementById("password").value=data.result[0].mpass;
                      var schedule_date=data.result[0].mdatetime.split(" ");
                      document.getElementById("schedule_date").value=schedule_date[0];
                      document.getElementById("schedule_time").value=schedule_date[1];
                      document.getElementById("schedule_duration").value=data.result[0].mduration;
                      document.getElementById("uniqid").value=uniqu;
                       if(user==host){
                      document.getElementById("meetsms").value=data.result[0].msms;
                       document.getElementById("inputAttendes").value=data.result[0].mattend;
                           $("#inputAttendes").parent().show();
                           $("#meetsms").parent().parent().show();
                           $("#reschedule_1").show();
                           $("#save_1").show();
                           $("#cancel_schedule_1").show();
                           $("label[for='meetsms']").show();
                       }
                       else{
                           $("#inputAttendes").parent().hide();
                           $("#meetsms").parent().parent().hide();
                           $("#reschedule_1").hide();
                           $("#save_1").hide();
                           $("#cancel_schedule_1").hide();
                           $("label[for='meetsms']").hide();
                       }                   
                  }

                  
    }
  });
}
}



function meetcancel(){
  var uniqud=document.getElementById("uniqid").value;
  //alert("Sure you want to cancel meeting?");
    
    
var r = confirm("Sure you want to cancel meeting?");
  if (r == true) {
      
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

}



function sendsms(){
    var topic=$("#topic").val();
    var uniq=$("#uniqid").val();
    var mobile=$("#meetsms").val();
    var time=$("#schedule_time").val();
    var date=$("#schedule_date").val();
    var pass=$("#pass").val();
    
    jQuery.ajax({
    type: "POST",
    url: 'controller/meetingregistration.php',
    dataType: 'json',
    data: {functionname: 'sendsms', arguments: [topic,uniq,mobile,time,date,pass]},

    success: function (data, textstatus) 
    {
                  if(('error' in data) )     
                      alert(data.error);
           else 
                 alert("SMS sent.");
    }
  });
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
