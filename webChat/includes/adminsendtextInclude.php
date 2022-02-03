<?php

print_r ($DATA_OBJECT);

$sql=false;
$log=false;

$log['userid']=$DATA_OBJECT->user;
$sql='SELECT * FROM users WHERE userid=:userid LIMIT 1';

$results=$DB->read($sql,$log);

if (is_array($results)) {
    echo 'woe';
    $results=$results[0];
    $username=$results->username;
}

$data=false;
$query=false;

$content="";

$data['message']=$DATA_OBJECT->message;
$data['reciever']=$DATA_OBJECT->user;
$data['username']=$username;
$data['sender']='adin';

$query="INSERT INTO chats(sender,message,username,reciever) VALUES(:sender,:message,:username,:reciever)";
$DB->write($query,$data);

$sql=false;
$log=false;

$log['sender']=$_SESSION['adminuserid'];

$sql="SELECT * FROM chats WHERE sender=:sender||reciever=:sender";
$results=$DB->read($sql,$log);
if (is_array($results)) {
    
    foreach ($results as $row) {
       
        if ($row->sender==$_SESSION['userid']) {
            $content.=rightMessage($row);
        }elseif ($row->reciever==$_SESSION['userid']) {
            $content.=leftMessage($row);
        }
    }
   

    $info->message=$content;
    $info->type='adminreplytext';

    echo(json_encode($info));
    
}








?>