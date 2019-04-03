<?php
  define('DB_SERVER', 'localhost');
  define('DB_USERNAME', 'checkmateadmin');
  define('DB_PASSWORD', 'checkmate1');
  define('DB_DATABASE', 'TCMDB');
  $db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

  if ($db -> connect_errno) {
  return $myssqli->connect_error;
  }

  //echo ' Success...' . $db->host_info . $db->server_info;
?>
