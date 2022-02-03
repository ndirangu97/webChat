<?php

$log=false;
$log['admin']='adin';
$sql='SELECT * FROM chats  WHERE sender!=:admin GROUP BY sender';

$mess="";

$results=$DB->read($sql,$log);
if (is_array($results)) {
    foreach ($results as $row) {
        $mess.=adminmessages($row);
    }
}

$info->message=$mess;
$info->type='messages';

echo json_encode($info);    








?>