<?php

if (isset($_SESSION['userid'])) {
    $info->type ="collectlogin";
    echo json_encode($info);
}else {
    $info->type ="collectlogin";
    echo json_encode($info);
}


?>