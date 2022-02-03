<?php


//first to validate details before entry to db

  if(empty($DATA_OBJECT->email))
  {
      $err .= "Please enter a  email . <br>";
      
  }


  if(empty($DATA_OBJECT->password))
  {
      $err .= "Please enter a valid password. <br>";
      
  }


  if ( $err=="") {
    $log=false;
    $log['email']=$DATA_OBJECT->email;
    $sql='SELECT * FROM USERS WHERE email=:email LIMIT 1';
  
    $results=$DB->read($sql,$log);

    if (is_array($results)) {
     $results=$results[0];

     if (password_verify($DATA_OBJECT->password,$results->password)) {
         $_SESSION['userid']=$results->userid;
         $_SESSION['username']=$results->username;
         $info->message='logged in successfully';
         $info->type='login';

         echo json_encode($info);
     }
    }
  }else {
      $info->message=$err;
      $info->type='signup';

      echo json_encode($info);
  }


?>










