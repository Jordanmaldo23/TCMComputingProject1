<?php
  define('DB_SERVER', 'localhost');
  define('DB_USERNAME', 'checkmateadmin');
  define('DB_PASSWORD', 'checkmate1');
  define('DB_DATABASE', 'TCMDB');
  $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

  if (!$db) {
    die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
  }

  echo ' Success...' . mysqli_get_host_info($db);

  $sql = "select * from tcmdb.tcm_users";
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  echo "</br>" . $row['tcm_users_id'] . "</br>";
  echo $row['tcm_users_username'] . "</br>";
  echo $row['tcm_users_password'] . "</br>";
?>
