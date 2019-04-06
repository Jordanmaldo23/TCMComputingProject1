<?php session_start(); if (session_status() == 2) {session_destroy();}?>
<html lang="en">
<head>
  <title>Homepage</title>
  <meta charset="utf-8">
  <!--
  <style> body {background-image: url("https://img.memecdn.com/you-amp-039-ve-just-activated-my-trap-card_fb_4015157.jpg");}</style>
  -->
</head>
<body>
  <div>
      <h1> CHECKMATE COMPUTING WEB INDEX </h1>
      <?php
        include('db_config.php');
        if($_SERVER['REQUEST_METHOD'] == "POST") {
          $error = "";
          $user = $db->real_escape_string($_POST['username']);
          $pass = $db->real_escape_string($_POST['password']);
          $sql = "SELECT DISTINCT tcm_users_password,tcm_users_admin,tcm_users_id from tcmdb.tcm_users where tcm_users_username = '$user'";
          $result = $db->query($sql);
          if( $result->num_rows > 0){
            while($row = $result->fetch_assoc()){
              if(password_verify($pass, $row['tcm_users_password']) == true){
                //echo "Login Success </br>";
                session_start();
                $_SESSION['username'] = $user;
                $_SESSION['admin_check'] = $row['tcm_users_admin'];
                $_SESSION['id'] = $row['tcm_users_id'];
                header( "refresh:0;url=Main/Jordan.php" );
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
      <form method ="post" action="">
          <input type="text" placeholder="Username:"name="username"></br>
          <input type="password" placeholder="Password:" name="password"></br>
          <input type="submit" value="Login"><span> or </span>
          <button type="button" value="Register" onclick="window.location.href = 'register.php';">Register</button>
      </form>
      <p style="color: #cc0000;"><?php if(empty($error)==false){echo $error;}?><p>
      <ul>
        <!--<li><a href="index.html">Index</a></li>-->
        <li><a href="Main/Jordan.php">Jordan</a></li>
        <li><a href="marauderwebsite/marauder.php">Marauder</a></li>
        <li><a href="Information/cnjoku96.html">cnjoku96</a></li>
        <li><a href="Information/toxic.php">Toxic</a></li>
        <!--<li><a style="background-color: white; color: black;" href="Information/db_config.php">DB CONFIG</a></li>-->
      </ul>
      <p> No <b>NSFW, NFSL, or shitposts</b> on this website anymore. Click <a href="Information/about.html">here</a> to learn more.</p>
    </div>
</body>
</html>
