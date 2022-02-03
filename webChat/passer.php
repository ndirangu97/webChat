<?php

require_once('./server/connection.php');
$DATA_RAW = file_get_contents('php://input');
$DATA_OBJECT = json_decode($DATA_RAW);

session_start();
$err="";

if (!isset($_SESSION['adminuserid'])) {
		if ($DATA_OBJECT->type != "adminlogin") {
			$info->type = "logout";
			echo json_encode($info);
			die;
		}
	
}


if ($DATA_OBJECT->type=='adminlogin') {
    
    include_once('./includes/adminloginInclude.php');
}
elseif ($DATA_OBJECT->type=='adminlaunch') {
    
    include_once('./includes/adminmessagesInclude.php');
}
elseif ($DATA_OBJECT->type=='startadminChat') {
    
    include_once('./includes/startadminchatInclude.php');
}
elseif ($DATA_OBJECT->type=='adminSendText') {
    
    include_once('./includes/adminsendtextInclude.php');
}
elseif ($DATA_OBJECT->type=='fetch') {
    
    include_once('./includes/superadminInclude.php');
}
elseif ($DATA_OBJECT->type=='logout') {
    
    include_once('./includes/admlogoutInclude.php');
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