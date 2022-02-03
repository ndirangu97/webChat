<?php

require_once('./server/connection.php');
$DATA_RAW = file_get_contents('php://input');
$DATA_OBJECT = json_decode($DATA_RAW);

session_start();
$err="";



//assign differenet datatypes to different routs
if ($DATA_OBJECT->type=='signup') {
    include_once('./includes/signupInclude.php');
}
elseif ($DATA_OBJECT->type=='login') {
    include_once('./includes/loginInclude.php');
}
elseif ($DATA_OBJECT->type=='sendText') {
    
    include_once('./includes/sendTextInclude.php');
}
elseif ($DATA_OBJECT->type=='launch') {
    
    include_once('./includes/sendTextInclude.php');
}
elseif ($DATA_OBJECT->type=='superadmin') {
    
    include_once('./includes/superadminInclude.php');
}
elseif ($DATA_OBJECT->type=='prevMessages') {
    
    include_once('./includes/prevmessagesInclude.php');
}
elseif ($DATA_OBJECT->type=='logout') {
    
    include_once('./includes/logoutinclude.php');
}
elseif ($DATA_OBJECT->type=='collect') {
    
    include_once('./includes/collectInclude.php');
}






function leftMessage($row)
{
 
    return(
        "
        <div class='msgLeft'>$row->message</div>
        "
    );
}
function rightMessage($row)
{
    return(
        "
        <div class='msgRight'>$row->message</div>
        "
    );
}
function adminmessages($row)
{
    return(
        "<div class='userChats' id='$row->sender' onclick='startChat(event)' >
        <img src='./images/icons/chat.png' id='$row->sender' >
        <div class='date' id='$row->sender'>
            $row->date
        </div>
        <div class='newChat' id='$row->sender'>
            3
        </div>
    </div>
        "
    );
}





?>