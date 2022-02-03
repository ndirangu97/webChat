<?php

unset($_SESSION['adminuserid']);

session_destroy();

$info->message='logged out successfully in successfully';
$info->type='logout';
echo json_encode($info);




?>