<?php
  include '../session_check.php';
  include '../db_config.php';
  $age=$fname=$lname=$location=$email=$signature=$bio=$pic=$dname="";
  $temp = $_SESSION['id'];
  $sql = "SELECT DISTINCT * from tcm_profiles where tcm_users_id =" . $_SESSION['id'];
  $result = $db->query($sql);
  $resultcheck = $result->num_rows;
  if (($resultcheck) < 1 ) {
    $sql = "INSERT INTO tcm_profiles (tcm_users_id )
            VALUES ('$temp')";
    $db->query($sql);
  } else {
    while ($array=$result->fetch_assoc()) {
        $dname = $array['tcm_profiles_dname'];
        $age = $array['tcm_profiles_age'];
        $fname = $array['tcm_profiles_fname'];
        $lname = $array['tcm_profiles_lname'];
        $location = $array['tcm_profiles_location'];
        $email = $array['tcm_profiles_email'];
        $signature = $array['tcm_profiles_signature'];
        $bio = $array['tcm_profiles_bio'];
        $pic = $array['tcm_profiles_picture'];
      }
  }?>
<html lang="en">
  <head>
    <title>Main</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
      body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
      }
      #bodyNav{
        background-color: #333;
        overflow: hidden;
      }
      #bodyNav a {
        float: left;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
      }
      #bodyNav a:hover {
        background-color: #ddd;
        color: black;
      }
      #bodyNav a.active {
        background-color: #8c2d28;
        color: white;
      }
      #bodyHeader {
        background-color: lightgray;
        color: black;
        padding: 10px;
        text-align: center;
      }
      #bodyBody {
        color: black;
        text-align: Center;
      }
      #bodyFooter {
        background-color: lightgray;
        bottom: 0;
        position: fixed;
        width: 100%;
        color: black;
        padding: 1px;
        text-align: center;
      }
    </style>
  </head>

<!--Will be moving the Styling to seperate .css file (lines 80-89)-->

  <body>
      <div id = "bodyNav">
        <a href="main.php">News</a>
        <a href="forum.php">Forum</a>
        <a href="search.php">Profile Search</a>
        <a class = "active" href="settings.php">Profile Settings</a>
        <a href="../index.php">Logout</a>
      </div>
      <div id = "bodyHeader">
        <h3> Profile Page </h3>
      </div>

<!--Profile Picture and Profile settings form-->

      <div id = bodyBody>
        <p>Profile Settings</p>
        <img src="<?php echo $pic;?>" alt="Profile_Picture" width="200" height="200"></img>

        <form method ="post" action="" id="userform">
          <label>Profile Picture (url): </label><input type="text"name="pic" value="<?php echo $pic;?>"></br>
          <label>Display Name: </label><input required type="text" name="dname" value="<?php echo $dname;?>"></br>
          <label>First Name: </label><input type="text" name="fname" value="<?php echo $fname;?>"></br>
          <label>Last Name: </label><input type="text" name="lname" value="<?php echo $lname;?>"></br>
          <label>Email Address: </label><input type="text" name="email" value="<?php echo $email;?>"></br>
          <label>Location: </label><input type="text" name="location" value="<?php echo $location;?>"></br>
          <label>Age: </label><input type="number" name="age" step="1" value="<?php echo $age;?>"></br>
          <label>Signature: </label><input type="text" name="signature" value="<?php echo $signature;?>"></br>
          <label>Bio:</label><textarea rows="4" cols="50" name="bio" form="userform" maxlength="280"><?php echo $bio;?></textarea></br>
          <input type="submit" value="Update Profile">
        </form>
      </div>
      <div id = "bodyFooter">
        <p>This page was created by <b>Team Checkmate</b>.&copy; Test 2019.</p>
      </div>

      <!--script runs if they hit submit(php script updates information in the database with user input)-->

      <?php
        if($_SERVER['REQUEST_METHOD'] == "POST"){
          $dname = $db->real_escape_string($_POST['dname']);
          $fname = $db->real_escape_string($_POST['fname']);
          $lname = $db->real_escape_string($_POST['lname']);
          $email = $db->real_escape_string($_POST['email']);
          $location = $db->real_escape_string($_POST['location']);
          $age = $db->real_escape_string($_POST['age']);
          $signature = $db->real_escape_string($_POST['signature']);
          $bio = $db->real_escape_string($_POST['bio']);
          $pic = $db->real_escape_string($_POST['pic']);
      $sql = "UPDATE tcm_profiles
              SET
              tcm_profiles_dname = '$dname',
              tcm_profiles_fname ='$fname',
              tcm_profiles_lname = '$lname',
              tcm_profiles_email = '$email',
              tcm_profiles_location = '$location',
              tcm_profiles_age = '$age',
              tcm_profiles_signature = '$signature',
              tcm_profiles_bio = '$bio',
              tcm_profiles_picture = '$pic'
              WHERE tcm_users_id =". $_SESSION['id'];
      $db->query($sql);
      header('refresh:0; url=settings.php');
    }
    $db->close();
      ?>
  </body>
</html>
