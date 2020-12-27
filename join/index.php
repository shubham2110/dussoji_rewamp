<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=edge,chrome=1">
<meta charset = "utf-8"><title>HostComm</title>
<script src="https://hostcommservers.com/external_api.js"></script>
<meta name = "viewport" content = "width=device-width, initial-scale = 1 shrink-to-fit = no">

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<style>

html{
 width:100%;
 height:100%;
 margin:0;
 padding:0;
}

 body{
  width:100%;
  height:100%;
  margin:0;
 padding:0;
 }

</style>
</head>
<body>
<?php if(isset($_POST['pass'])){ ?>
  <button class="btn-primary btn btn-md" style="visibility:hidden; position:absolute;" id="modal_btn" data-toggle="modal" data-target="#share_modal"><span class="glyphicon glyphicon-share-alt"></span></button>

<div class="modal" id="share_modal">
    <div class="modal-dialog">
      <div class="modal-content">
       <div class="modal-header">
          <h4 class="modal-title" style="text-align:center">Invite Others</h4>
          <button type="button" class="close" data-dismiss="modal" onclick="show_share_btn()">&times;</button>
        </div>
        <div class="modal-body"> 
          <div class="row" style="padding-left:2%; padding-right:1%;">
            <p style="text-align:center">  Share these details with people you want in the meeting</p>
          </div>
          <div class="row" style="padding-left:2%; padding-right:1%;">
	  <p "text-align:center">  Meeting URL: https://hostcommservers.com/hostcomm/join/<?php echo($_GET['id']) ?></p>
          </div>
          <div class="row" style="padding-left:2%; padding-right:1%;">
            <p "text-align:center">  Meeting ID: <?php echo($_GET['id']) ?>
          </div>
          <div class="row" style="padding-left:2%; padding-right:1%;">
            <p "text-align:center">  Password: <?php echo $_POST['pass']; ?>
          </div>
          <input type="hidden" name="share_details" id="share_details" value=" Meeting URL: https://hostcommservers.com/hostcomm/join/<?php echo($_GET['id']) ?> Meeting ID: <?php echo($_GET['id']) ?> Password: 1234">
        </div>
        <div class="modal-footer">
         <button type="button" class="btn btn-primary" onclick = "copy_text()">COPY</button>
        </div>
      </div>
    </div>
  </div>


<script>

 function copy_text() {
  var copyText = document.getElementById("share_details");
  copyText.type="text"
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");
  copyText.type="hidden"
  /* Alert the copied text */
  alert("Your meeting details have been copied to clipboard");
}

function show_share_btn(){
 document.getElementById("modal_btn").style.visibility="visible";
}


</script>
<?php } ?>

    
    
    <div class="row" style="width:100%; height:100%; text-align:center; padding:0; margin:0;" id="iframe_container">
</div>
 <script>

	 
   const domain = 'hostcommservers.com';
const options = {
roomName: "<?php echo($_GET['id']) ?>",
    width:'100%',
    height:'100%',
    userInfo:{
      
      displayName:"" 
      
    },
    parentNode : document.getElementById('iframe_container'),
    
    
    interfaceConfigOverwrite: { TOOLBAR_BUTTONS: [
        'microphone', 'camera', 'closedcaptions', 'desktop',
	   'fullscreen',
        'fodeviceselection', 'hangup', 'profile', 'chat', 'recording',
        'livestreaming', 'etherpad', 'settings', 'raisehand',
        'filmstrip' , 'feedback', 'stats', 'shortcuts',
        'tileview', 'videobackgroundblur', 'download', 'help', 'mute-everyone',
        'e2ee' , 'security' , 'videoquality'
    ]
    }
    
    ,
    noSSL:false
};

function myFunction_admin(){
	api.executeCommand('password', "1234");
	resetauth();
	api.executeCommand('toggleLobby', true);        
}



function myFunction_user(){
 
	resetauth(); 
	var a= JSON.parse(window.localStorage.getItem('features/base/settings'));
    if ( ! (a == null) && ! (a == "") && ! (String(a["displayName"]) == "undefined"))
    {
    var displayName=a["displayName"];
    console.log('Setting DisplayName as:' + String(displayName));
    api.executeCommand('displayName', 'Fellow Jister');
    api.executeCommand('displayName', String(displayName));
    
    }  
    
}




function reset(){
          window.location.replace("/");
}

<?php if(true || "checkauth") { ?>
function setauth(){
	var username="123456";

	var authpass="<?php echo hash('sha256', '123456'.'randomhashnotveryeasytofindhelloworldSurendrasingh'); ?>";

	var id=username.concat('@hostcommservers.com');
	
	window.localStorage.setItem('xmpp_password_override', authpass);
	window.localStorage.setItem('xmpp_username_override', id);
	
}
<?php } ?>


function resetlocal()
{
        window.localStorage.setItem('sessionId', '');
	window.localStorage.setItem('xmpp_password_override', '');
	window.localStorage.setItem('xmpp_username_override', '');
 
}

function resetauth(){
	var username="wrongid";
	var authpass="wrongpassword";
	var id=username.concat('@hostcommservers.com');
        window.localStorage.setItem('sessionId', '');
	window.localStorage.setItem('xmpp_password_override', '');
	window.localStorage.setItem('xmpp_username_override', '');

}
resetlocal();
  setauth();
var api = new JitsiMeetExternalAPI(domain, options);
api.executeCommand('subject', "");

</script>

<script type="text/javascript">
    $(window).on('load',function(){
        $('#share_modal').modal('show');
    });
</script>


<script>
    // when local user has joined the video conference 

    api.addEventListener('videoConferenceJoined', (response) => {
        setTimeout(myFunction_admin, 1000);
    });
    

api.addEventListener('readyToClose', (response) => {
	resetauth();    
	setTimeout(reset, 3000);
	    
    });
document.addEventListener('contextmenu', event => event.preventDefault());
 </script>

</body>
</html>