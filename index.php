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
      <p >Index Page</p>
      <h1> CHECKMATE COMPUTING WEB INDEX </h1>
      <?php include 'tcm_login.php';?>
      <form method ="post" action="">
          <input type="text" placeholder="Username:"name="username"><br/>
          <input type="password" placeholder="Password:" name="password"><br/>
          <input type="submit" value="Login"><span> or </span>
          <button type="button" value="Register" onclick="window.location.href = 'tcm_register.php';">Register</button>
      </form>
      <p style="color: #cc0000;"><?php if(empty($error)==false){echo $error;}?><p>
      <ul>
        <!--<li><a href="index.html">Index</a></li>-->
        <li><a href="Information/Jordan.php">Jordan</a></li>
        <li><a href="marauderwebsite/marauder.php">Marauder</a></li>
        <li><a href="Information/cnjoku96.html">cnjoku96</a></li>
        <li><a href="Information/toxic.html">Toxic</a></li>
        <!--<li><a style="background-color: white; color: black;" href="Information/db_config.php">DB CONFIG</a></li>-->
      </ul>
      <p> No <b>NSFW, NFSL, or shitposts</b> on this website anymore. Click <a href="Information/about.html">here</a> to learn more.</p>
    </div>
</body>
</html>
