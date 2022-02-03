<?php

unset($_SESSION['userid']);

session_destroy();

$info->type = "logout";
echo json_encode($info);

die;


?>