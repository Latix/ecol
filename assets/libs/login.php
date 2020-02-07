<?php

$userLogin = function ($email, $password, $conn){

  if(!empty($email) && !empty($password)){
      if($conn->query("SELECT * FROM `users` WHERE email = '$email' AND password = '$password' AND status = '1'")->num_rows > 0){
          $det = $conn->query("SELECT * FROM `users` WHERE email = '$email' AND password = '$password' AND status = '1'")->fetch_assoc();
          $_SESSION['admin_id'] = $det['id'];
          return true;
      }else{ return false; }
  }
}
?>
