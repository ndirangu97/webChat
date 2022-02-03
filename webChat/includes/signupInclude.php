<?php

//first to validate details before entry to db
  if(empty($DATA_OBJECT->username))
  {
      $err .= "Please enter a valid username . <br>";
      
  }else
  {
      if(strlen($DATA_OBJECT->username) < 3)
      {
          $err  .= "username must be at least 3 characters long. <br>";
      }

      if(!preg_match("/^[a-z A-Z 0-9]*$/", $DATA_OBJECT->username))
      {
          $err .= "Please enter a valid username . <br>";
      }
      if(strlen($DATA_OBJECT->username) >10)
      {
          $err  .= "username must not be more than 10 characters long. <br>";
      }
      
  }
  if(empty($DATA_OBJECT->email))
  {
      $err .= "Please enter a valid email . <br>";
      
  }
  if (!filter_var($DATA_OBJECT->email, FILTER_VALIDATE_EMAIL)) {
      $err .= "Please enter a valid email format . <br>";
  }
  if(strlen($DATA_OBJECT->email) >30)
  {
      $err  .= "email must not be more than 30  characters long. <br>";
  }

  if(empty($DATA_OBJECT->password))
  {
      $err .= "Please enter a valid password. <br>";
      
  }
  if(strlen($DATA_OBJECT->password) <6)
  {
      $err  .= "password must  be more than 6  characters long. <br>";
  }

  if ($DATA_OBJECT->password!=$DATA_OBJECT->password2) {
      
    $err  .= "password is not equal to validation password. <br>";
  }


  $log=false;
  $log['email']=$DATA_OBJECT->email;
  $sql='SELECT * FROM USERS WHERE email=:email LIMIT 1';

  $read=$DB->read($sql,$log);
  if (is_array($read)) {
    $err  .= "email already registered. <br>";
  }

  if ( $err=="") {
        echo 'hello';

      $password=password_hash($DATA_OBJECT->password,PASSWORD_DEFAULT);  

      $data=false;
      $data['email']=$DATA_OBJECT->email;
      $data['username']=$DATA_OBJECT->username;
      $data['password']=$password;
      $data['userid']=$DB->generateuserid(60);

      $query='INSERT INTO USERS(userid,username,email,password) VALUES(:userid,:username,:email,:password)';
      $write=$DB->write($query,$data);

      if ($write) {
        $info->message='saved to db';
        $info->type='signup';
  
        echo json_encode($info); 
      }
  }else {
      $info->message=$err;
      $info->type='signup';

      echo json_encode($info);
  }


?>
