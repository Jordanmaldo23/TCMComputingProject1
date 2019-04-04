<?php
  include('db_config.php');

  if($_SERVER['REQUEST_METHOD'] == "POST") {
    $error = "";
    $user = $db->real_escape_string($_POST['username']);
    $pass = $db->real_escape_string($_POST['password']);
    $sql = "SELECT DISTINCT tcm_users_password,tcm_users_admin from tcmdb.tcm_users where tcm_users_username = '$user'";
    $result = $db->query($sql);
    if( $result->num_rows > 0){
      while($row = $result->fetch_assoc()){
        if($pass == $row['tcm_users_password']){
          //echo "Login Success </br>";
          session_start();
          $_SESSION['username'] = $user;
          $_SESSION['admin_check'] = $row['tcm_users_admin'];
          header( "refresh:0;url=Information/Jordan.php" );
        }
        else {
          $error = "Invalid Username or Password";
        }
      }
    } else {
      $error = "Invalid Username or Password.";
      //echo $error;
      //header( "refresh:3;url=index.html" );
    }
  }

  //echo "With username: " . $_SESSION['username'] . "</br> Admin Status: " . $_SESSION['admin_check'];
  $db->close();
  //if(session_status() == 2){session_destroy();} //temporary destory session to not save cookie.
 ?>
