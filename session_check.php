<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
echo $_SESSION['username'];
echo "</br>" . $_SESSION['admin_check'];
echo "</br>" . $_SESSION['id'];
if(!isset($_SESSION['username']) || $_SESSION['username'] == null){
    header("location:../index.php");
  }
?>
