<?php

$log=false;
$sql=false;
$log['userid']=$DATA_OBJECT->chatid;
$sql='SELECT * FROM chats  WHERE sender=:userid';

$mess="";

$results=$DB->read($sql,$log);
if (is_array($results)) {
    foreach ($results as $row) {
        $mess.= rightMessage($row);
    }
}

$info->message=$mess;
$info->type='startadminchat';

echo json_encode($info);



?>