<?php


$sql=false;
$log=false;

$log['sender']=$_SESSION['userid'];

$content="";

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
    $info->type='text';

    echo(json_encode($info));
    
}

?>